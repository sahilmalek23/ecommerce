@extends('admin.layout.main')

@section('css')    
    
@endsection

@section('main')
    <h2 class="page-title">Order Details</h2>

    <div class="row my-4">
        <!-- Small table -->
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body ">
                    <!-- table -->
                    <h3>Order Information</h3>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <p><b>Order ID:</b> #{{ $ordermain->id }}</p>
                            <p><b>Invoice Number:</b> {{ $ordermain->invoiceno }}</p>
                            <p><b>Order Date:</b> {{date('F j, Y', strtotime($ordermain->entrydate))}}</p>
                        </div>
                        <div class="col-sm-4">
                            <p><b>Order Status:</b> {{ $ordermain->statusname }}</p>
                            <p><b>PromoCode:</b> {{ $ordermain->promocode }}</p>
                            <p><b>Discount:</b> &#8377; {{ $ordermain->discount }}</p>
                        </div>
                        <div class="col-sm-4">
                            <p><b>Delivery Fee:</b> &#8377; {{ $ordermain->deliveryfee }}</p>
                            <p><b>Total Amount:</b> &#8377; {{ $ordermain->finaltotal }}</p>
                        </div>
                    </div>
                    <h3>Shipping Address</h3>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <p><b>Receiver Name:</b> {{ $ordermain->firstname ."". $ordermain->lastname }}</p>
                            <p><b>Address:</b> {{ $ordermain->address }}</p>
                            <p><b>Apartment:</b> {{ $ordermain->apartment }}</p>
                        </div>
                        <div class="col-sm-4">
                            <p><b>city:</b> {{ $ordermain->city }}</p>
                            <p><b>State:</b> {{ $ordermain->sstate }}</p>
                        </div>
                        <div class="col-sm-4">
                            <p><b>Pincode:</b> {{ $ordermain->pincode }}</p>
                            <p><b>Phone:</b> {{ $ordermain->phone }}</p>
                        </div>
                    </div>
                    @if($ordermain->same_ship == 0)
                        <h3>Billing  Address</h3>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <p><b>Receiver Name:</b> {{ $ordermain->bill_firstname ."". $ordermain->bill_lastname }}</p>
                                <p><b>Address:</b> {{ $ordermain->bill_address }}</p>
                                <p><b>Apartment:</b> {{ $ordermain->bill_apartment }}</p>
                            </div>
                            <div class="col-sm-4">
                                <p><b>city:</b> {{ $ordermain->bill_city }}</p>
                                <p><b>State:</b> {{ $ordermain->billstate }}</p>
                            </div>
                            <div class="col-sm-4">
                                <p><b>Pincode:</b> {{ $ordermain->bill_pincode }}</p>
                                <p><b>Phone:</b> {{ $ordermain->bill_phone }}</p>
                            </div>
                        </div>
                    @endif

                    <h3>Order Product</h3>
                    <hr>
                    <table class="table datatables display table-striped " id="dataTable-1">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>   
                                <th>Image</th>                                                             
                                <th>Name</th>
                                <th>Size</th>                                
                                <th>Qty</th>
                                <th>Price</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($proorderdetaillist as $orderPro)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>                                    
                                    <td><a class=" d-flex align-content-center justify-content-center" href="{{  asset('storage') ."/". $orderPro->proimg }}" data-lightbox="image-{{ $loop->iteration }}" data-title=""><span class="fe fe-24 fe-eye btn btn-primary fe-16"></span></a></td>
                                    <td>{{ $orderPro->proname }}</td>
                                    <td>{{ $orderPro->size }}</td>
                                    <td>{{ $orderPro->qty }}</td>
                                    <td>{{ $orderPro->dp }}</td>
                                </tr>
                            @endforeach                            
                        </tbody>
                    </table>                    
                    <hr>
                    @if ($ordermain->status == 1)                        
                        <a href="{{route('admin.order.action', [$ordermain->id, 4])}}" class="btn btn-primary">Dispatch (Accepte)</a>
                    @elseif ($ordermain->status == 4)   
                        <a href="{{route('admin.order.action', [$ordermain->id, 5])}}" class="btn btn-primary">Delivered</a>                     
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    
@endsection