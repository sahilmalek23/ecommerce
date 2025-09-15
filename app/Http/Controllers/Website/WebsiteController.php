<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProductMaster;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\StockTransaction;
use App\Models\InvoiceDetail;
use App\Models\PromoCode;
use Illuminate\Support\Facades\Auth;
use App\Models\InvoiceMaster;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Validator;  
use App\Helper\CommanHelper as CHClass;
use App\Models\Category;

class WebsiteController extends Controller
{
    public function index() {
        
        $Category = Category::select('id', 'title', 'image')->where('status', '0')->get();

        $productMasterList =  ProductMaster::select('id','name', 'image')
        ->where('status', '0')
        ->orderBy('entrydate', 'desc')
        ->take('8')
        ->get();

         
        
        $collection = collect();
        foreach($productMasterList as $PMData) {            
            $product = DB::table('product_sub_master as PSM')
            ->join('size as PS', 'PSM.size', '=','PS.id')
            ->select('PSM.id', 'PSM.dp', 'PS.size')
            ->where('PSM.status', '0')
            ->where('PSM.product_id', $PMData->id)
            ->take('1')
            ->orderBy('PSM.size', 'ASC')
            ->first(); 
                       
            if ($product) {
                $collection->push([
                    'psid' => $product->id,
                    'name' => $PMData->name,
                    'price' => $product->dp,
                    'image' => $PMData->image,
                ]);
            }
            
        }

        // return $collection;
        $response = [];
        $response['productList'] = $collection;
        $response['Category'] = $Category;
        return view('website.home', $response);
    }
    public function shop(Request $request) {
        $category = Category::where('status', '0')->find($request->catid);

        $productMasterList = ProductMaster::select('id', 'name', 'image')
            ->where('status', '0')
            ->orderBy('entrydate', 'desc');

        if ($request->filled('catid')) {
            $productMasterList->where('category_id', $request->catid);
        }

        $productMasterList = $productMasterList->paginate(20);        
        

        // Category::find();
        
        
        $collection = collect();
        foreach($productMasterList as $PMData) {            
            $product = DB::table('product_sub_master as PSM')
            ->join('size as PS', 'PSM.size', '=','PS.id')
            ->select('PSM.id', 'PSM.dp', 'PS.size')
            ->where('PSM.status', '0')
            ->where('PSM.product_id', $PMData->id)
            ->take('1')
            ->orderBy('PSM.size', 'ASC')
            ->first(); 
                       
            if ($product) {
                $collection->push([
                    'psid' => $product->id,
                    'name' => $PMData->name,
                    'price' => $product->dp,
                    'image' => $PMData->image,
                ]);
            }
            
        }

        // return $collection;
        $response = [];
        $response['productList'] = $collection;
        $response['productMasterList'] = $productMasterList;
        $response['category'] = $category;
        return view('website.shop', $response);
    }

    public function productDetail($id) {
        $product = Product::where('id', $id)
        ->where('status', '0')
        ->first();

        if ($product) {
            $productMaster = ProductMaster::select('id','name', 'description', 'image')
            ->where('id', $product->product_id)
            ->where('status', '0')
            ->first();
            if (!$productMaster) {
                abort(404);
            }

        }

        $productAvailableSize = DB::table('product_sub_master as PSM')
        ->join('size as PS', 'PSM.size', '=', 'PS.id')
        ->where('PSM.product_id', $product->product_id)
        ->select('PSM.id', 'PSM.size as sizeid', 'PS.size')
        ->orderBy('PSM.size', 'ASC')
        ->where('PSM.status', '0')
        ->get();
        
        $productImages = ProductImage::where('product_id', $product->product_id)
        ->where('status', '0')
        ->get();

        
        $availableStock = StockTransaction::where('product_sub_id', $id)
        ->select(DB::raw('COALESCE(SUM(stock), 0) as stock'))
        ->first();
        
        $response = [];
        $response['product'] = $product;
        $response['productMaster'] = $productMaster;
        $response['productAvailableSize'] = $productAvailableSize;
        $response['productImages'] = $productImages;
        $response['availableStock'] = $availableStock;
        // return $response;
        return view('website.productdetail', $response);
    }
    
    public function about() {
        return view('website.about');
    }

    public function contact() {
        return view('website.contact');
    }

    private function getCartList($data = []) {        
        if (Auth::check()) {
            $sessionId = Auth::user()->id;
            $data['sessionId'] = $sessionId;
            $data['searchColumn'] = "userid";                             
        } else {
            $sessionId = session()->get('purchase');                
            $data['sessionId'] = $sessionId;
            $data['searchColumn'] = "randomsession";
        }

        $sessionId = $data['sessionId'];
        $searchColumn = $data['searchColumn'];
        return DB::table('invoicedetail as ID')
        ->join('product_sub_master as PSM', 'ID.productid', '=', 'PSM.id')
        ->join('product_master as PM', 'PSM.product_id', '=', 'PM.id')
        ->join('size as S', 'PSM.size', '=', 'S.id')
        ->select('ID.qty', 'ID.totalamount', 'PSM.dp', 'PSM.price', 'PM.name', 'PM.image', 'S.size', 'PSM.id as psid')
        ->where('ID.'.$searchColumn, $sessionId)
        ->where('ID.status', '3')
        ->where('PSM.status', '0')
        ->where('PM.status', '0')
        ->get();
    }

    private function validateCart(Request $request) {
        $removedItems = collect();
        if ($request->session()->exists('purchase') || Auth::check()) {
            $sessionId = $request->session()->get('purchase');
            if (Auth::check()) {
                $sessionId = Auth::user()->id;
                $searchColumn = "userid";                
            } else {
                $sessionId = $request->session()->get('purchase');
                $searchColumn = "randomsession";
            }

            // First, get all item IDs from the user's cart
            $cartItems = InvoiceDetail::where($searchColumn, $sessionId)->where('status', '3')->get();
    
            foreach ($cartItems as $item) {
                // Check if product and product master exist and are active
                $product = DB::table('product_sub_master as PSM')
                    ->join('product_master as PM', 'PSM.product_id', '=', 'PM.id')
                    ->where('PSM.id', $item->productid)
                    ->where('PSM.status', '0')
                    ->where('PM.status', '0')
                    ->select('PM.name')
                    ->first();
    
                if (!$product) {
                    // Product is invalid, remove it from cart
                    // Attempt to get the name of the product for the notification message
                    $productInfo = DB::table('product_sub_master as PSM')
                        ->leftJoin('product_master as PM', 'PSM.product_id', '=', 'PM.id')
                        ->where('PSM.id', $item->productid)
                        ->select('PM.name')
                        ->first();
                    
                    $removedItems->push($productInfo->name ?? 'An item');
                    $item->delete();
                }
            }
    
            if ($removedItems->isNotEmpty()) {
                $request->session()->flash('cart_warning', 'Some items in your cart are no longer available and have been removed: ' . $removedItems->unique()->implode(', '));
            }
        }
        return $removedItems;
    }

    public function cart(Request $request) {
        $this->validateCart($request);

        $response = [];
        $cartList = collect();
        if ($request->session()->exists('purchase') || Auth::check()) {                                                
            $cartList = $this->getCartList();
        }
    
        $response['InvoiceDetail'] = $cartList;
        return view('website.cart', $response);
    }

    public function addToCart(Request $request, $buyFlag=null) {
        $productId = $request->productId;
        $qty = $request->qty;

        // Validate product existence and status
        $product = Product::where('id', $productId)
        ->where('status', '0')
        ->first();

        // Validate product master existence and status
        if ($product) {
            $productMaster = ProductMaster::select('id','name', 'description', 'image')
            ->where('id', $product->product_id)
            ->where('status', '0')
            ->first();
            if (!$productMaster) {
                abort(404);
            }

        }

        // Validate available stock
        $availableStock = StockTransaction::where('product_sub_id', $productId)
        ->select(DB::raw('COALESCE(SUM(stock), 0) as stock'))
        ->first();
        
        $response = [];
        $response['status'] = 'Error';
        $response['msg'] = 'Some Error Occurred';
        if ($availableStock) {            
            if ( $availableStock->stock < $qty) {
                $response['msg'] = "We don't have enough stock to fulfill your request.";
                return redirect()->back()->with($response);
            }
        }
        
        
        $SaveDate = now();
        $sessionId='';
        $userId = 0;
        $InvoiceDetail = [];
        // Check if session exists
        if (Auth::check()) {
            $userId = Auth::user()->id;            
            $searchColumn = 'userid';
            $searchColumnData = $userId;
        } else if ($request->session()->exists('purchase')) {
            $sessionId = $request->session()->get('purchase');                        
            $searchColumn = 'randomsession';
            $searchColumnData = $sessionId;
        } else {
            // Create new session
            $sessionId = session_create_id();
            $request->session()->put('purchase', $sessionId); 
            $searchColumn = 'randomsession';
            $searchColumnData = $sessionId;
        }
        
        $InvoiceDetail = InvoiceDetail::where($searchColumn,  $searchColumnData)
        ->where('randomsession', $sessionId)
        ->where('status', '3')
        ->where('productid', $productId)
        ->get();
        
        if (filled($InvoiceDetail)) {
            // DB::enableQueryLog();
            $data = [];                        
            $data['qty'] = $qty;
            $data['price'] = $product->price;
            $data['dp'] = $product->dp;
            $data['totalamount'] = $product->dp * $qty;
            $InvoiceResponse = InvoiceDetail::where($searchColumn, '=',$searchColumnData)            
            ->where('status', '=','3')
            ->where('productid', '=',$productId)
            ->update($data);
            // dd(DB::getQueryLog());                   
            if ($InvoiceResponse) {
                $response['status'] = 'Success';
                $response['msg'] = 'Product Update Into Cart';
            }
        } else {
            $data = [];
            $data['entrydate'] = $SaveDate;
            $data['userid'] = $userId;
            $data['randomsession'] = $sessionId;
            $data['productid'] = $productId;
            $data['qty'] = $qty;
            $data['price'] = $product->price;
            $data['dp'] = $product->dp;
            $data['totalamount'] = $product->dp * $qty;
            $data['status'] = '3';
            $InvoiceResponse = InvoiceDetail::insert($data);
            if ($InvoiceResponse) {
                $response['status'] = 'Success';
                $response['msg'] = 'Product Added Into Cart';
            }
        }

        if ($buyFlag == '1') {
            return redirect()->route('cart')->with($response);
        }
        return redirect()->back()->with($response);
    }

    public function cartItemDelete($psid, Request $request) {
        $data = [];
        if (Auth::check()) {
            $sessionId = Auth::user()->id;
            $data['sessionId'] = $sessionId;
            $data['searchColumn'] = "userid";                             
        } else {
            $sessionId = $request->session()->get('purchase');                
            $data['sessionId'] = $sessionId;
            $data['searchColumn'] = "randomsession";
        }

        $sessionId = $request->session()->get('purchase');
        InvoiceDetail::where($data['searchColumn'], $data['sessionId'])
        ->where('productid', $psid)
        ->where('status', '3')
        ->delete();
        
        $response['status'] = 'Success';
        $response['msg'] = 'Product Removed From Cart';        
        return redirect()->back()->with($response);
    }

    public function updateCartQty(Request $request)
    {
        $request->validate([
            'psid' => 'required|integer',
            'qty' => 'required|integer|min:1',
            'promocode' => 'nullable|string',
        ]);

        $data = [];
        if (Auth::check()) {
            $sessionId = Auth::user()->id;
            $data['sessionId'] = $sessionId;
            $data['searchColumn'] = "userid";                             
        } else {
            $sessionId = $request->session()->get('purchase');                
            $data['sessionId'] = $sessionId;
            $data['searchColumn'] = "randomsession";
        }        
    
        $product = Product::find($request->psid);
        if (!$product) {
            return response()->json(['status' => 'Error', 'msg' => 'Product not found.'], 404);
        }
    
        $availableStock = StockTransaction::where('product_sub_id', $request->psid)
            ->sum('stock');            
        
        // We check against total stock - quantity already in other carts.
        // A simple check is just check against total stock.
        if ($availableStock < $request->qty) {
            return response()->json([
                'status' => 'Error', 
                'msg' => 'Not enough stock. Only ' . $availableStock . ' items available.',
                'max_qty' => $availableStock
            ], 400);
        }
    
        $invoiceDetail = InvoiceDetail::where($data['searchColumn'], $data['sessionId'])
            ->where('productid', $request->psid)
            ->where('status', '3')
            ->first();
    
        if ($invoiceDetail) {
            
            $invoiceDetail->qty = $request->qty;
            $invoiceDetail->totalamount = $product->dp * $request->qty;
            $invoiceDetail->save();
            
            // Recalculate totals and discount            
            $cartList = $this->getCartList();
            $subtotal = $cartList->sum('totalamount');
            $discount = 0; // static for now
            if ($request->promocode) {                
                $promoCode = PromoCode::where('code', $request->promocode)        
                ->where('status', '0')
                ->first();
                                
                if ($promoCode) {
                    if ($promoCode->type == 'fixed') {
                        $discount = $promoCode->value;
                    } elseif ($promoCode->type == 'percent') {
                        $discount = ($subtotal * $promoCode->value) / 100;
                    }
    
                    if ($discount > $subtotal) {
                        $discount = $subtotal;
                    }
                    
                    $request->session()->put('promo_code.discount', round($discount, 2));
                } else {
                    $request->session()->forget('promo_code');
                }
            }
            $deliveryFee = 0; // static for now
            $total = $subtotal - $discount + $deliveryFee;
    
            return response()->json([
                'status' => 'Success',
                'msg' => 'Cart updated.',
                'subtotal' => round($subtotal, 2),
                'discount' => round($discount, 2),
                'total' => round($total, 2),
            ]);
        }
    
        return response()->json(['status' => 'Error', 'msg' => 'Item not found in cart.'], 404);
    } 
    
    public function applyPromoCode(Request $request)
    {
        $request->validate(['promocode' => 'required|string']);
        
    
        $promoCode = PromoCode::where('code', $request->promocode)
        ->where('status', '0')
        ->first();
    
        if (!$promoCode) {
            return response()->json(['status' => 'Error', 'msg' => 'Invalid or expired promo code.'], 404);
        }

        
            
        $cartList = $this->getCartList();
        $subtotal = $cartList->sum('totalamount');
    
        $discount = 0;
        if ($promoCode->type == 'fixed') {
            $discount = $promoCode->value;
        } elseif ($promoCode->type == 'percent') {
            $discount = ($subtotal * $promoCode->value) / 100;
        }
        
        // Ensure discount is not more than the subtotal
        if ($discount > $subtotal) {
            $discount = $subtotal;
        }       
    
        $deliveryFee = 0; // Or your logic for delivery fee
        $total = $subtotal - $discount + $deliveryFee;
    
        return response()->json([
            'status' => 'Success',
            'msg' => 'Promo code applied successfully!',
            'discount' => round($discount, 2),
            'total' => round($total, 2),
            'promoperc' => $promoCode->value
        ]);
    }    

    public function checkout(Request $request) {
        $removedItems = $this->validateCart($request);
        $discount = 0;
        if ($request->isMethod('post') && $request->filled('promocode')) {
            $promoResponse= $this->applyPromoCode($request);
            if ($promoResponse->getData()->status == 'Success') {
                $discount = $promoResponse->getData()->discount;
            }
        }
        if ($removedItems->isNotEmpty()) {
            return redirect()->route('cart');
        }

        $indiaRegions = DB::table('india_regions')
        ->select('id', 'name')
        ->get();

        $response = [];
        $response['indiaRegions'] = $indiaRegions;
                            
        $cartList = $this->getCartList();  

        $response['cartList'] = $cartList;
        $response['discount'] = $discount;
        return view('website.checkout', $response);
    }
    
    public function purchase(Request $request) {
        // Validate the request 
        $response = [];
        $response['status'] = false;
        $response['msg'] = 'Some Error Occurred';

        $validatorSipping = Validator::make($request->all(),[
            'firstname' => 'required|max:100',
            'lastname' => 'nullable|max:100',
            'address' => 'required',
            'apartment' => 'required|max:100',
            'city' => 'required|max:100',
            'state' => 'required|exists:india_regions,id',
            'pincode' => 'required|digits:6',
            'phone' => 'required|digits:10|regex:/^[6-9]\d{9}$/',
            'sameship' => 'required|in:0,1',
        ]);
        // exit;
        if ($validatorSipping->fails()) {            
            $errorSipping = $validatorSipping->messages()->toArray();   
            $response['msg'] = 'There is an error in your shipping address. Please check the enterd details.'; 
            $response['inputerror'] = $errorSipping;      
            return response()->json($response, 404);
        }
        

        // If same shipping address is selected, copy shipping address to billing address
        $billFirstName = $request->firstname;
        $billLastName = $request->lastname ?? '';
        $billAddress = $request->address;
        $billApartment = $request->apartment;
        $billCity = $request->city;
        $billState = $request->state;
        $billPincode = $request->pincode;
        $billPhone = $request->phone;
        // Add conditional validation for billing address if different from shipping
        if ($request->sameship == '0') {
            $validatorBill = Validator::make($request->all(),[
                'bill_firstname' => 'required|max:100',
                'bill_lastname' => 'nullable|max:100',
                'bill_address' => 'required',
                'bill_apartment' => 'required|max:100',
                'bill_city' => 'required|max:100',
                'bill_state' => 'required|exists:india_regions,id',
                'bill_pincode' => 'required|digits:6',
                'bill_phone' => 'required|digits:10|regex:/^[6-9]\d{9}$/',
            ]);

            if ($validatorBill->fails()) {            
                $errorBill = $validatorBill->messages()->toArray();   
                $response['msg'] = 'There is an error in your billing address. Please check the enterd details.'; 
                $response['inputerror'] = $errorBill;      
                return response()->json($response, 404);
            }

            $billFirstName = $request->bill_firstname;
            $billLastName = $request->bill_lastname ?? '';
            $billAddress = $request->bill_address;
            $billApartment = $request->bill_apartment;
            $billCity = $request->bill_city;
            $billState = $request->bill_state;
            $billPincode = $request->bill_pincode;
            $billPhone = $request->bill_phone;
            
        }
        

        // Validate cart items
        $cartList = $this->getCartList();
        if ($cartList->isEmpty()) {            
            $response['msg'] = 'Your cart is empty.';                                             
            return response()->json($response, 404);
        }        

        // Get cart data and calculate totals
        $subtotal = $cartList->sum('totalamount');
        $discount = 0;
        $promoperc = 0;
        // Apply promo code if exists
        if ($request->isMethod('post') && $request->filled('promocode')) {
            $promoResponse= $this->applyPromoCode($request);
            if ($promoResponse->getData()->status == 'Success') {
                $discount = $promoResponse->getData()->discount;
                $promoperc = $promoResponse->getData()->promoperc;
            }            
        } 
        
        // Calculate delivery fee and final total
        $deliveryFee = 0; // You can add logic to calculate delivery fee based on location
        $finalTotal = $subtotal - $discount + $deliveryFee;
        
        // // Generate invoice number
        // $invoiceNumber = 'INV-' . date('Ymd') . '-' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);        
        
        // Create invoice master record
        $invoiceData = [
            'entrydate' => now(),
            'userid' => Auth::id(),
            // 'invoiceno' => $invoiceNumber,            
            'qty' => $cartList->sum('qty'),
            'price' => $cartList->sum('price'),
            'dp' => $cartList->sum('dp'),
            'discount' => $discount,
            'deliveryfee' => $deliveryFee,
            'subtotal' => $subtotal,
            'finaltotal' => $finalTotal,
            'status' => '3',
            'promocode' => $request->promocode ?? null,
            'promoperc' => $promoperc,
            'payment_method' => '1',
            'payment_status' => '0', // 0 for pending, 1 for completed            
            'firstname' => $request->firstname,
            'lastname' => $request->lastname ?? '',
            'address' => $request->address,
            'apartment' => $request->apartment,
            'city' => $request->city,
            'state' => $request->state,
            'pincode' => $request->pincode,
            'phone' => $request->phone,    
            'same_ship' => $request->sameship,            
            'bill_firstname' => $billFirstName,
            'bill_lastname' => $billLastName,
            'bill_address' => $billAddress,
            'bill_apartment' => $billApartment,
            'bill_city' => $billCity,
            'bill_state' => $billState,
            'bill_pincode' => $billPincode,
            'bill_phone' => $billPhone,                        
        ];
        

        $invoiceMaster = InvoiceMaster::create($invoiceData);
        
        // Update invoice details with order ID
        if ($invoiceMaster) {

            InvoiceDetail::where('userid', Auth::id())
            ->where('status', '3')
            ->update([
                'orderid' => $invoiceMaster->id,                                
            ]);



            $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
            $orderData = [
                'receipt' => 'order_' . $invoiceMaster->id,
                'amount' => $finalTotal * 100, // Convert to paise
                'currency' => 'INR',
                'payment_capture' => 1 
            ];

            $order = $api->order->create($orderData);  

            $invoiceMaster->order_id = $order['id'];
            $invoiceMaster->save();

            $response['status'] = true;
            $response['msg'] = 'Invoice Master Inside added Successfully and Order Id Generated Successfully';
            $response['invoicemasterid'] = $invoiceMaster->id;
            $response['amount'] = $order['amount'];
            $response['id'] = $order['id'];
            $response['phone'] = $request->phone;
            $response['name'] = $request->firstname . ' ' . $request->lastname;
            return response()->json($response);
        }
        $response['msg'] = 'Invoice Master Inside and Order Id Generate Process Some Error Occoured';
        return response()->json($response, 404);

    }

    public function VerifyPaymentStatus(Request $request) {
        $response = [];
        $response['status'] = false;
        $response['msg'] = 'Some Error Occurred';

        $userid = Auth::id();

        $InvoiceMaster = InvoiceMaster::where('id',$request->invoicemasterid)
        ->where('order_id',$request->razorpay_order_id)
        ->where('status', '3')
        ->where('userid', $userid)
        ->first();

        if ($InvoiceMaster && !empty($request->razorpay_payment_id)) {
            $invoiceNumber = CHClass::genrateInvoice();
            $InvoiceMaster->invoiceno = $invoiceNumber;
            $InvoiceMaster->status = '1';
            $InvoiceMaster->payment_status = '1';
            $InvoiceMaster->payment_id = $request->razorpay_payment_id;
            $InvoiceMaster->save();

            $InvoiceDetailUpdateData = [];
            $InvoiceDetailUpdateData['status'] = '1';
            $InvoiceDetailUpdateData['invoiceno'] = $invoiceNumber;             
            InvoiceDetail::where('orderid', $InvoiceMaster->id)
            ->where('userid', $userid)
            ->where('status', '3')
            ->update($InvoiceDetailUpdateData);

            $getInvoiceDD = InvoiceDetail::select('productid', 'qty')
            ->where('orderid', $InvoiceMaster->id)
            ->where('userid', $userid)
            ->where('status', '1')
            ->get();

            foreach($getInvoiceDD as $detailData) {
                $insertData = [];
                $insertData['entrydate'] = now();
                $insertData['type'] = 'MP';
                $insertData['product_sub_id'] = $detailData->productid;
                $insertData['stock'] = -$detailData->qty;
                StockTransaction::insert($insertData );
            }

            if (filled($getInvoiceDD)) {
                $response['status'] = true;
                $response['msg'] = "Payment received. Your order is being processed.";
                $response['invoicemasterid'] = $InvoiceMaster->id;
                return response()->json($response);            
            }
        }else if (filled($InvoiceMaster)) {
            $InvoiceMaster->payment_status = '2';
            $InvoiceMaster->save();
        }

        
    
        $response['msg'] = 'Don’t worry! If the payment was deducted and something went wrong, your money will be refunded soon.';
        return response()->json($response, 404);
    }

    public function orderConfirmation($orderId = null) {
        if (!$orderId) {
            abort(404);
        }

        $userId = Auth::id();

        $order = InvoiceMaster::find($orderId);
        if (!$order) {
            abort(404);
        }

        $orderState = DB::table('india_regions')
        ->select('id', 'name')
        ->where('id', $order->state)
        ->first();
         
        $state = '';
        if (filled($orderState)) {
            $state = $orderState->name;
        }

        $bill_orderState = DB::table('india_regions')
        ->select('id', 'name')
        ->where('id', $order->bill_state)
        ->first();
        $bill_state = '';
        if (filled($bill_orderState)) {
            $bill_state = $bill_orderState->name;
        }

        // Fetch order items with product info
        $orderItems = DB::table('invoicedetail as ID')
            ->join('product_sub_master as PSM', 'ID.productid', '=', 'PSM.id')
            ->join('product_master as PM', 'PSM.product_id', '=', 'PM.id')
            ->join('size as S', 'PSM.size', '=', 'S.id')
            ->select(
                'ID.qty',
                'ID.totalamount',
                'PM.name',
                'PM.image',
                'S.size',
                'ID.productid',
                'ID.price',
                'ID.dp'
            )
            ->where('ID.orderid', $orderId)
            ->where('ID.status', '1')
            ->where('ID.userid', $userId)
            ->get();
            
        if ($orderItems->isEmpty()) {
            abort(404);
        }       
        // Add total for view compatibility
        $order->total = $order->finaltotal ?? $order->subtotal;

        return view('website.order-confirmation', [
            'order' => $order,
            'orderItems' => $orderItems,
            'state' => $state,
            'bill_state' => $bill_state,
        ]);
    }
    
    public function orders() {
        $userId = Auth::id();
        
        $invoiceList = InvoiceMaster::select('id','invoiceno', 'status')
        ->whereIn('status', ['1', '4', '5', '6'])
        ->where('userid', $userId)
        ->orderBy('id', 'desc')
        ->get();

        $orders = collect();
        foreach ($invoiceList as $invoiceData) {
            $invoiceProduct = DB::table('invoicedetail as ID')
            ->join('product_sub_master as PSM', 'ID.productid', '=', 'PSM.id')
            ->join('product_master as PM', 'PSM.product_id', '=', 'PM.id')
            ->join('size as S', 'PSM.size', '=', 'S.id')
            ->whereIn('ID.status', ['1', '4', '5', '6'])
            ->where('ID.orderid', $invoiceData->id)
            ->where('ID.userid', $userId)
            ->select('PM.name', 'ID.dp', 'S.size', 'ID.qty', 'PM.image')
            ->get();

            
            $orders->push([
                'invoiceData' => $invoiceData,
                'invoiceProduct' => $invoiceProduct,
            ]); 
            
        }
        
        $response = [];
        $response['orders'] = $orders;
        return view('website.orders', $response);
    }

    public function orderDtails($orderId = null) {
        if (!$orderId) {
            abort(404);
        }

        $userId = Auth::id();
        $order = InvoiceMaster::find($orderId);
        if (!$order) {
            abort(404);
        }
        $orderState = DB::table('india_regions')
        ->select('id', 'name')
        ->where('id', $order->state)
        ->first();
        
        $state = '';
        if (filled($orderState)) {
            $state = $orderState->name;
        }
        
        $bill_orderState = DB::table('india_regions')
        ->select('id', 'name')
        ->where('id', $order->bill_state)
        ->first();
        $bill_state = '';
        if (filled($bill_orderState)) {
            $bill_state = $bill_orderState->name;
        }
        
        
        // Fetch order items with product info
        $orderItems = DB::table('invoicedetail as ID')
            ->join('product_sub_master as PSM', 'ID.productid', '=', 'PSM.id')
            ->join('product_master as PM', 'PSM.product_id', '=', 'PM.id')
            ->join('size as S', 'PSM.size', '=', 'S.id')
            ->select(
                'ID.qty',
                'ID.totalamount',
                'PM.name',
                'PM.image',
                'S.size',
                'ID.productid',
                'ID.price',
                'ID.dp'
                )
                ->where('ID.orderid', $orderId)
                // ->where('ID.status', '1')
                ->where('ID.userid', $userId)
                ->get();
                
        if ($orderItems->isEmpty()) {
            abort(404);
        }       
        // Add total for view compatibility
        $order->total = $order->finaltotal ?? $order->subtotal;

        return view('website.order-detail', [
            'order' => $order,
            'orderItems' => $orderItems,
            'state' => $state,
            'bill_state' => $bill_state,
        ]);
    }
}
