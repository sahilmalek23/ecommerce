<?php 
namespace App\Helper;
use App\Models\InvoiceMaster;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class  CommanHelper {
    static function  genrateInvoice() {
        $i = 1;
        while ($i == 1) {            
            $invoiceNumber = rand(100000, 999999);
            $InvoiceExists = InvoiceMaster::where( 'invoiceno', '=',$invoiceNumber)->first();
            if (blank($InvoiceExists)) {
                $i = 0;
            }
        }
        return $invoiceNumber;
    }

    static function getCartCount() {
        if (Auth::check()) {
            $sessionId = Auth::user()->id;
            $data['sessionId'] = $sessionId;
            $data['searchColumn'] = "userid";                             
        } else {
            $sessionId = session()->get('purchase');                
            $data['sessionId'] = $sessionId;
            $data['searchColumn'] = "randomsession";
        }
        
        if (blank($sessionId)) {
            return 0;
        }

        $sessionId = $data['sessionId'];
        $searchColumn = $data['searchColumn'];
        return DB::table('invoicedetail as ID')
        ->join('product_sub_master as PSM', 'ID.productid', '=', 'PSM.id')
        ->join('product_master as PM', 'PSM.product_id', '=', 'PM.id')
        ->join('size as S', 'PSM.size', '=', 'S.id')    
        ->where('ID.'.$searchColumn, $sessionId)
        ->where('ID.status', '3')
        ->where('PSM.status', '0')
        ->where('PM.status', '0')
        ->count();
    }
}


