<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InvoiceDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\InvoiceMaster;
use Razorpay\Api\Invoice;

class UserInvoiceController extends Controller
{
    public function index($status=null) {
        $type = '1';
        $title = 'Pending Orders Report';
        if ($status == 4) {
            $type = '4';
            $title = 'Dispatch Orders Report';
        } else if ($status == 5) {
            $type = '5';
            $title = 'Delivered Orders Report';
        }
        $orders = DB::table('invoice_master as IM')
        ->join('users as U', 'IM.userid', '=', 'U.id')
        ->where('IM.status', $type)
        ->select('IM.id', 'IM.entrydate', DB::raw("DATE_FORMAT(IM.entrydate,'%d/%m/%Y %l:%i %p') as orderdate"),'U.email', 'IM.invoiceno', 'IM.finaltotal','IM.status', 'IM.order_id')
        ->addSelect(DB::raw("
            CASE payment_status
                WHEN '0' THEN 'Pending'
                WHEN '1' THEN 'Success'
                WHEN '2' THEN 'Failed'
                ELSE 'Unknown'
            END as paymentstatus
        ")
        )
        ->orderByDesc('IM.entrydate')
        ->get();
        $response = [];
        $response['orders'] = $orders;
        $response['title'] = $title;
        return view('admin.orders-report', $response);
    }

    public function OrdersDetail($orderId) {   
        $status =  DB::raw("CASE
            WHEN IM.status = '0' THEN 'Pending'
            WHEN IM.status = '1' THEN 'Processing'
            WHEN IM.status = '4' THEN 'Shipped'
            WHEN IM.status = '5' THEN 'Delivered'
            WHEN IM.status = '6' THEN 'Returned'
            ELSE 'Unknown'
        END as statusname");            
        $OrderMain = DB::table('invoice_master as IM')
        ->join('india_regions as IRS', 'IM.state', '=', 'IRS.id')
        ->join('india_regions as IRB', 'IM.bill_state', '=', 'IRB.id')
        ->join('users as U', 'IM.userid', '=', 'U.id')
        ->select('IM.*',$status,'U.email as useremail','IRS.name as sstate', 'IRB.name as billstate')
        ->where('IM.id', $orderId)
        ->first();
        
        if (blank($OrderMain)) {
            abort(404);
        }

        $ProductOrderDetail = DB::table('invoicedetail as ID')
        ->join('product_sub_master as PSM', 'ID.productid', '=', 'PSM.id')
        ->join('product_master as PM', 'PSM.product_id', '=', 'PM.id')
        ->join('size as S', 'PSM.size', '=', 'S.id')
        ->select('PM.image as proimg', 'PM.name as proname', 'S.size', 'ID.qty', 'ID.dp')
        ->where('ID.orderid', $orderId)
        ->get();
        
        $respons = [];
        $respons['ordermain'] = $OrderMain;
        $respons['proorderdetaillist'] = $ProductOrderDetail;
        return view('admin.order-detail', $respons);
    }

    public function OrderAction($orderId=null, $status=null) {        
        $OrderInfo = InvoiceMaster::findOrFail($orderId);

        $response = [];
        $response['status'] = 'Error';
        $response['msg'] = 'Some Error Occurred';

        if ($OrderInfo->status < $status) {
            $response['status'] = 'Success';
            $data = [];
            if ($status == 4) {
                $OrderInfo->status = '4';
                $data['status'] = '4';
                $response['msg'] = 'Order Dispatch Successfully.';
            } else if ($status == 5) {
                $OrderInfo->status = '5';
                $data['status'] = '5';
                $response['msg'] = 'Order Delivered Successfully.';
            }
            
            InvoiceDetail::where('orderid', '=',$OrderInfo->id)->update($data);
            $OrderInfo->save();
        }
        return redirect()->back()->with($response);
    }
}
