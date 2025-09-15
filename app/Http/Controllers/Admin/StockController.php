<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\StockTransaction;
use App\Models\Product;

class StockController extends Controller
{
    public function StockReport() {
        $StockList = DB::table('product_master as PM')
        ->join('product_sub_master as PSM', 'PM.id', '=', 'PSM.product_id')
        ->join('size as PS', 'PSM.size', '=', 'PS.id')
        ->leftJoin('stock_transaction as ST', 'PSM.id', '=', 'ST.product_sub_id')
        ->select('PSM.id as ProSubId','PM.name as productname', 'PS.size', DB::raw("IF(PSM.`status` = '0', 'active', 'delete') as status"))
        ->addSelect(
    DB::raw('COALESCE(SUM(CASE WHEN ST.stock > 0 THEN ST.stock ELSE 0 END), 0) as inwardstock'),
            DB::raw('ABS(SUM(CASE WHEN ST.stock < 0 THEN ST.stock ELSE 0 END)) as outwardstock'),
            DB::raw('COALESCE(SUM(ST.stock), 0) as totalstock')
        )
        ->whereIn('PM.status', ['0', '1'])
        ->groupBy('PSM.id')
        ->get();    

        $response = [];
        $response['StockList'] = $StockList;
        return view('admin.stockreport', $response);
    }

    public function Add($id) {
        $response = [];
        $response['productId'] = $id;
        return view('admin.stockadd', $response);
    }

    public function AddSubmit(Request $request) {
        $adminId = Auth::guard('admin')->user()->id;
        $request->validate([
            'stock' => ['required', 'numeric']
        ]);
        
        $productId = $request->productId;
        Product::findOrFail($productId);

        $data = [];
        $data['entrydate'] = now();
        $data['type'] = 'AP';
        $data['stock'] = $request->stock;
        $data['product_sub_id'] = $productId;
        $data['addedby'] = $adminId;
        $StockTranResponse = StockTransaction::insert($data);

        $response = [];
        $response['status'] = 'Error';
        $response['msg'] = 'Some Error Occurred';
        if ($StockTranResponse) {
            $response['status'] = 'Success';
            $response['msg'] = 'Stock Added Successfully.';
        }
        return redirect()->route('admin.stock.report')->with($response);
    }
}
