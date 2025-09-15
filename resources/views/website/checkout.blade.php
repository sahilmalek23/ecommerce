@extends('website.layout.main')

@section('css')
    <style>
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
        .copan-code {
            border: 2px solid #1f2b7b;
            border-radius: 24px;
        }
        .promo-input {
            border: none !important;
            border-radius: 21px !important;
            padding-left: 20px !important;
        }
        .form-control {
            height: 39px;
            font-size: 14px;
            border: 1px solid #b2c8d3;
            border-radius: 5px;
        }
        {{-- #country,
        #state, #billing_state, #billing_country {
            display: none !important;            
        } --}}
        .list {
            max-height: 235px !important;
            overflow-y: scroll !important;
        }
        .qtybage {
            position: absolute;
            right: -7px;
            background: #9f78ff;
            padding: 0px 7px;
            border-radius: 27px;
            color: white;
            font-size: 13px;
            top: -6px;
        }
        .required-fild {
            color: red;
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
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('cart') }}">Cart</a></li>
                            <li class="breadcrumb-item"><a href="#">Shipping</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        @if($cartList->isNotEmpty())
            <form action="{{ route('purchase') }}" method="post" id="checkout">
                 @csrf
                <div class="row mb-40">
                    <div class="col-lg-8">
                        <h2 class="font-weight-bold font-size my-3">Shipping Address</h2>
                        <div class="row mt-5">
                        
                            {{-- Shipping Address Form --}}
                            <div class="col-md-12 mb-3">
                                <div class="mb-2 form-group">
                                    <select class="form-control w-100" id="country" required="">
                                        <option>India</option>
                                    </select>
                                    {{-- <label for="country" class="sameslect">Country/Region</label>                                     --}}
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="mb-2 form-group">
                                    <input type="text" name="firstname" class="form-control" id="firstName" placeholder="First Name" value="">
                                    <label for="firstName">First Name <span class="required-fild">*</span></label>
                                </div>                                                            
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="mb-2 form-group">
                                    <input type="text" name="lastname" class="form-control" id="lastName" placeholder="Last Name" value="">
                                    <label for="lastName">Last Name </label>
                                </div>
                            </div>
                            
                            <div class="col-md-12 mb-3">
                                <div class="mb-2 form-group">
                                    <input type="text" name="address" id="address" class="form-control" placeholder="Address">
                                    <label for="address">Address <span class="required-fild">*</span></label>
                                </div>
                                
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="mb-2 form-group">
                                    <input type="text" name="apartment" id="apartment" class="form-control" placeholder="apartment, suite, etc. (optional)">
                                    <label for="apartment">apartment, suite, etc. (optional) <span class="required-fild">*</span></label>
                                </div>                                
                            </div>
                            <div class="col-md-4 col-sm-6 mb-3">
                                <div class="mb-2 form-group">
                                    <input type="text" name="city" id="city" class="form-control" placeholder="City">
                                    <label for="city">City <span class="required-fild">*</span></label>
                                </div>                                
                            </div>
                            <div class="col-md-4 col-sm-6 mb-3">
                                <div class="mb-2 form-group">
                                    <select class="form-control" id="state"  name="state">
                                        <option disabled selected>Select a state <span class="required-fild">*</span></option>
                                        @foreach($indiaRegions as $state)
                                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                    {{-- <label for="state" class="sameslect">State</label> --}}
                                </div>                                
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="mb-2 form-group">
                                    <input type="text" name="pincode" id="pincode" class="form-control" placeholder="PINcode">
                                    <label for="pincode">PIN code <span class="required-fild">*</span></label>
                                </div>                                
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="mb-2 form-group">
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone">
                                    <label for="phone">Phone <span class="required-fild">*</span></label>
                                </div>                                 
                            </div>
                        </div>

                        <h2 class="font-weight-bold font-size my-3">Billing address</h2>
                        <div class="d-block my-3">
                            <div class="d-flex mt-5">
                                <div class="custom-control confirm-radio mb-1">
                                    <input id="sameship" name="sameship" value="1" type="radio" class="" checked required="">
                                    <label class="" for="sameship"></label>
                                </div>
                                <p class="pl-3">Same as shipping address</p>
                            </div>
                            <div class="d-flex">
                                <div class="custom-control confirm-radio">
                                    <input id="diffbill" name="sameship" value="0" type="radio" class="" required="">
                                    <label class="" for="diffbill"></label>
                                </div>
                                <p class="pl-3">Use a different billing address</p>
                            </div>
                        </div>
                        {{-- @if($errors->has('bill_firstname') || $errors->has('bill_lastname') || $errors->has('bill_address') || $errors->has('bill_apartment') || $errors->has('bill_city') || $errors->has('bill_state') || $errors->has('bill_pincode') || $errors->has('bill_phone'))
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    document.getElementById('diffbill').checked = true;
                                    document.getElementById('billing_address_form').style.display = 'block';
                                });
                            </script>
                        @endif --}}
                        {{-- Hidden Billing Address Form --}}
                        <div id="billing_address_form" style="display: none;">
                            <div class="row mt-3">
                                <div class="col-md-6 mb-3">
                                    <div class="mb-2 form-group">
                                        <input type="text" name="bill_firstname" class="form-control" id="billing_firstName" placeholder="First Name">
                                        <label for="billing_firstName">First Name <span class="required-fild">*</span></label>
                                    </div>                                    
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="mb-2 form-group">
                                        <input type="text" name="bill_lastname" class="form-control" id="billing_lastName" placeholder="Last Name">
                                        <label for="billing_lastName">Last Name</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="mb-2 form-group">
                                        <input type="text" name="bill_address" id="billing_address" class="form-control" placeholder="Address">
                                        <label for="billing_address">Address <span class="required-fild">*</span></label>
                                    </div>                                    
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="mb-2 form-group">
                                        <input type="text" name="bill_apartment" id="billing_apprtment" class="form-control" placeholder="apartment, suite, etc. (optional)">
                                        <label for="billing_apprtment">apartment, suite, etc. (optional) <span class="required-fild">*</span></label>
                                    </div>                                    
                                </div>
                                <div class="col-md-4 col-sm-6 mb-3">
                                    <div class="mb-2 form-group">
                                        <input type="text" name="bill_city" id="billing_city" class="form-control" placeholder="City">
                                        <label for="billing_city">City <span class="required-fild">*</span></label>
                                    </div>                                    
                                </div>
                                
                                <div class="col-md-4 col-sm-6 mb-3">
                                    <div class="mb-2 form-group">
                                        <select class="form-control d-block w-100" id="billing_state" name="bill_state">
                                            <option value="" disabled selected>Select a state <span class="required-fild">*</span></option>
                                            @foreach($indiaRegions as $state) 
                                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                        {{-- <label for="billing_state" class="sameslect">State</label> --}}
                                    </div>                                    
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="mb-2 form-group">
                                        <input type="text" name="bill_pincode" id="billing_pincode" class="form-control" placeholder="PINcode">
                                        <label for="billing_pincode">PIN code <span class="required-fild">*</span></label>
                                    </div>                                    
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="mb-2 form-group">
                                        <input type="text" name="bill_phone" id="billing_phone" class="form-control" placeholder="Phone">
                                        <label for="billing_phone">Phone <span class="required-fild">*</span></label>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                    
                        {{-- Order Summary --}}
                        @php
                            $subtotal = $cartList->sum('totalamount');
                            $deliveryFee = 0; // static for now
                            $total = $subtotal - $discount + $deliveryFee;
                        @endphp
                        @foreach($cartList as $item)
                        <input type="hidden" name="promocode" value="{{ request('promocode') }}">
                        <hr>
                        <div class=" d-flex">
                            <span class="atcp-img position-relative">
                                <span class="qtybage">{{ $item->qty }}</span>
                                <img src="{{asset('storage/'. $item->image)}}" alt="" class="addtimg" width="80px">
                            </span>
                            <div class="ml-4 flex-fill">
                                <div class="d-flex">
                                    <h3 class="font-weight-bold flex-fill ">{{ $item->name }}</h3>                                
                                </div>
                                <p class="m-0">Size: <span>{{ $item->size }}</span></p>
                                <div class="d-flex">
                                    <p class="mb-0 flex-fill align-self-center pt-3">&#8377; {{ $item->dp }}</p>                        
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <hr>
                        <h2 class="font-weight-bold my-3">Order Summary</h2>

                        <div class="d-flex mt-5">
                            <p class="flex-fill">Subtotal</p>
                            <p class=""><b>&#8377; {{ $subtotal }}</b></p>
                        </div>
                        <div class="d-flex">
                            <p class="flex-fill">Discount</p>
                            <p class=""><b>&#8377; {{ $discount }}</b></p>
                        </div>
                        <div class="d-flex border-bottom">
                            <p class="flex-fill">Delivery Fee</p>
                            <p class=""><b>&#8377; {{ $deliveryFee }}</b></p>
                        </div>

                        <div class="d-flex mt-3">
                            <p class="flex-fill">Total</p>
                            <p class=""><b>&#8377; {{ $total }}</b></p>
                        </div>
                        
                        <button type="submit" class="w-100 genric-btn primary circle arrow d-block mt-5">Proceed to Payment</button>
                    </div>
                </div>
            </form>
        @else
            <div class="row">
                <div class="col-12 text-center py-5">
                    <h4>Your cart is empty. You cannot proceed to checkout.</h4>
                    <a href="{{ route('shop') }}" class="genric-btn primary circle arrow mt-3">Continue Shopping</a>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('script') 
<script src="{{asset('website/js/custom/checkout.js')}}"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    $(document).ready(function() {
        $('input[name="sameship"]').on('change', function() {
            if ($('#diffbill').is(':checked')) {
                $('#billing_address_form').slideDown('fast');
            } else {
                $('#billing_address_form').slideUp('fast');
            }
        });  

        $('#checkout').on('submit', function (e) {
            e.preventDefault();
            if ($(this).valid()){ 
                $.ajax({
                    url: "{{ route('purchase') }}",
                    method: 'POST',
                    async: false,
                    data: $(this).serialize(),
                    success: function(response) {                        
                        if (response.status) {                            
                            var orderInfo = {
                                amount: response.amount,
                                orderid: response.id,
                                name: response.name,
                                phone: response.phone,
                                invoicemasterid: response.invoicemasterid,
                            };
                            PaymentFunction(orderInfo);
                        }                        
                    },
                    error: function(xhr) {
                        var error = xhr.responseJSON;
                        if (error.inputerror !== undefined) {
                            var inputerrors = error.inputerror;
                            for(const inerrorKey in inputerrors) {                                
                                var label = `<label class="error">${inputerrors[inerrorKey][0]}</label>`;
                                $(`[name = '${inerrorKey}']`).closest('.form-group').after(label);                                
                            }
                        }

                        toastr.error(error.msg, "Error");
                    }
                });  
            }    
        });                                                   
    });
</script>
<script>
function PaymentFunction(orderInfo) {
    var amount = orderInfo.amount;
    var orderid = orderInfo.orderid;
    var name = orderInfo.name;
    var phone = orderInfo.phone;
    var invoicemasterid = orderInfo.invoicemasterid;

    var options = {
        "key": "{{ env('RAZORPAY_KEY') }}", // Enter the Key ID generated from the Dashboard
        "amount": `${amount}`, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
        "currency": "INR",
        "name": "Cloth Business", //your business name
        "description": "Test Transaction",
        "handler": function (response) {
            response.invoicemasterid = invoicemasterid;
            VerifyPaymentStatus(response);            
        },
        "image": "{{ asset('assets/images/logo.svg') }}", //The image should be a 128x128px logo
        "order_id": `${orderid}`, //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
        "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
        "prefill": { //We recommend using the prefill parameter to auto-fill customer's contact information especially their phone number
            "name": `${name}`, //your customer's name
            "email": "{{ auth()->user()->email }}",
            "contact": `${phone}` //Provide the customer's phone number for better conversion rates 
        },
        "notes": {
            "address": "Razorpay Corporate Office"
        },
        "theme": {
            "color": "#3399cc"
        }
    };
    var rzp1 = new Razorpay(options);
    rzp1.open();   
} 

function VerifyPaymentStatus(paymentResponse) {
    paymentResponse._token = "{{ csrf_token() }}";
    console.log(paymentResponse);
    
    $.ajax({
        url: "{{ route('purchase.verify.payment') }}",
        method: 'POST',
        async: false,
        data: paymentResponse,
        success: function(response) {   

            window.location.href = "{{ route('order.confirmation','/') }}/" + response.invoicemasterid;
            
        },
        error: function(xhr) {
            var error = xhr.responseJSON; 
                    
             toastr.error(error.msg, "Error"); 
        }
    });
}
</script>
@endsection