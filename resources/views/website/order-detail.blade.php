@extends('website.layout.main')

@section('css')
    <style>
        .success-icon {
            color: #28a745;
            font-size: 4rem;
        }
        .order-details {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
        }
        .order-item {
            border-bottom: 1px solid #dee2e6;
            padding: 15px 0;
        }
        .order-item:last-child {
            border-bottom: none;
        }
        .product-image {
            width: 80px;
            object-fit: cover;
            border-radius: 8px;
        }

        .addtimg {
            border-radius: 1rem;
        }
        .border-radius-left {
            border-radius: 10px 0px 0px 10px !important;
        }
        .border-radius-right {
            border-radius: 0px 10px 10px 0px !important;
        }
        .add-button {
            border-radius: 17px;
        }
        .atcp-img {
            margin-top: auto;
            margin-bottom: auto;
        }
        
    </style>
@endsection

@section('main')
    <!-- breadcrumb Start-->
    <div class="page-notification">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">                            
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Orders</a></li>                            
                            <li class="breadcrumb-item " >Order Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-5">
                    <i class="fas fa-check-circle success-icon"></i>
                    <h1 class="mt-3 font-weight-bold d-none">Thank You for Your Order!</h1>
                    <p class="text-muted d-none">Your order has been successfully placed and is being processed.</p>
                </div>

                <div class="order-details">
                    <h1 class="font-weight-bold">Order Information</h1>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Order ID:</strong> #{{ $order->id }}</p>
                            <p><strong>Invoice Number:</strong> {{ $order->invoiceno }}</p>
                            <p><strong>Order Date:</strong> {{ date('F j, Y', strtotime($order->entrydate)) }}</p>
                            <p><strong>Order Status:</strong> 
                                @if($order->status == '0')
                                    <span class="badge badge-warning">Pending</span>
                                @elseif($order->status == '1')
                                    <span class="badge badge-info">Processing</span>
                                @elseif($order->status == '4')
                                    <span class="badge badge-success">Shipped</span>
                                @elseif($order->status == '5')
                                    <span class="badge badge-success">Delivered</span>
                                @elseif($order->status == '6')
                                    <span class="badge badge-danger">Returned</span>
                                @endif
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Discount:</strong> ₹{{ $order->discount }}</p>
                            <p><strong>Delivery Fee:</strong> ₹{{ $order->deliveryfee }}</p>
                            <p><strong>Total Amount:</strong> ₹{{ $order->total}}</p>
                        </div>
                    </div>
                </div>

                <div class="order-details">
                    <h1 class="font-weight-bold">Shipping Address</h1>
                    <p>
                        {{ $order->firstname }} {{ $order->lastname }},<br>
                        {{ $order->address }},<br>
                        @if($order->apartment)
                            {{ $order->apartment }},<br>
                        @endif
                        {{ $order->city }}, {{ $state }}, {{ $order->pincode }}<br>
                        Phone: {{ $order->phone }}
                    </p>
                </div>

                @if($order->same_ship == 0)
                <div class="order-details">
                    <h1 class="font-weight-bold">Billing Address</h1>
                    <p>
                        {{ $order->bill_firstname }} {{ $order->bill_lastname }}<br>
                        {{ $order->bill_address }}<br>
                        @if($order->bill_apartment)
                            {{ $order->bill_apartment }}<br>
                        @endif
                        {{ $order->bill_city }}, {{ $bill_state }} {{ $order->bill_pincode }}<br>
                        Phone: {{ $order->bill_phone }}
                    </p>
                </div>
                @endif

                <div class="order-details">
                    <h1 class="font-weight-bold">Order Items</h1>
                    @foreach($orderItems as $item)
                    <div class="order-item">
                        <div class="row align-items-center">
                            <div class="col-md-2 col-3 ">
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="product-image">
                            </div>
                            <div class="col-6">
                                <h4 class="mb-1 font-weight-bold mb-3">{{ $item->name }}</h4>
                                <p class="text-muted mb-0">Size: {{ $item->size }}</p>
                            </div>
                            <div class="col-md-4 col-3 text-right">
                                <p class="mb-3">Qty: {{ $item->qty }}</p>
                                <p class="mb-0 font-weight-bold">₹{{ $item->totalamount }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                

                <div class="text-center mt-5">
                    <a href="{{ route('orders') }}" class="genric-btn primary circle arrow">Go To Orders</a>
                </div>
            </div>
        </div>
    </div>
@endsection 