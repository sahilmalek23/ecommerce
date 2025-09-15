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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Your Cart</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        @if (session('cart_warning'))
            <div class="alert alert-warning" role="alert">
                {{ session('cart_warning') }}
            </div>
        @endif
        <div class="row mb-40">
            <div class="col-lg-8">
                @foreach ($InvoiceDetail as $InvoiceProduct)
                <hr>
                <div class=" d-flex">
                    <span class="atcp-img"><img src="{{asset('storage/'. $InvoiceProduct->image)}}" alt="" class="addtimg"
                            width="80px"></span>
                    <div class="ml-4 flex-fill">
                        <div class="d-flex">
                            <h3 class="font-weight-bold flex-fill ">{{ $InvoiceProduct->name }}</h3>
                            <div>
                                <a href="{{ route('cart.item.delete', ['psid' => $InvoiceProduct->psid]) }}">
                                    <div class="p-2 rounded-circle d-flex justify-content-center align-items-center bg-danger "
                                        style="width: 27px;margin-left: auto;">
                                        <span class="ti ti-trash text-white"></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <p class="m-0">Size: <span>{{ $InvoiceProduct->size }}</span></p>
                        <div class="d-flex">
                            <p class="mb-0 flex-fill align-self-center pt-3">&#8377; {{ $InvoiceProduct->dp }}</p>
                            <div class="qty-sec add-button float-right mt-3" data-psid="{{$InvoiceProduct->psid}}">
                                <button
                                    class="qty-decrement qty-btn px-4 border-radius-left small cu-font-size active genric-btn primary">-</button>
                                <input type="text" class="qty-input" value="{{ $InvoiceProduct->qty }}" spellcheck="false" data-ms-editor="true">
                                <button
                                    class="qty-increment qty-btn border-radius-right px-4 small cu-font-size genric-btn active primary">+</button>

                            </div>
                        </div>
                    </div>
                </div>                                    
                @endforeach
            </div>
            @if($InvoiceDetail->isNotEmpty())
                @php
                    $subtotal = $InvoiceDetail->sum('totalamount');
                    $discount = 0; // static for now
                    $deliveryFee = 0; // static for now
                    $total = $subtotal - $discount + $deliveryFee;
                @endphp
                <div class="col-lg-4">
                    <hr>
                    <h2 class="font-weight-bold my-3">Order Summary</h2>

                    <div class="d-flex mt-5">
                        <p class="flex-fill">Subtotal</p>
                        <p class=""><b>&#8377; <span id="subtotal">{{ $subtotal }}</span></b></p>
                    </div>
                    <div class="d-flex">
                        <p class="flex-fill">Discount</p>
                        <p class=""><b>&#8377; <span id="discount">{{ $discount }}</span></b></p>
                    </div>
                    <div class="d-flex border-bottom">
                        <p class="flex-fill">Delivery Fee</p>
                        <p class=""><b>&#8377;  <span id="deliveryFee">{{ $deliveryFee }}</span></b></p>
                    </div>

                    <div class="d-flex mt-3">
                        <p class="flex-fill">Total</p>
                        <p class=""><b>&#8377; <span id="total">{{ $total }}</span></b></p>
                    </div>
                    <form action="{{route('checkout')}}" method="post" >
                        @csrf
                        <div class="d-flex copan-code mt-3">
                            <span class="ti-gift align-self-center pl-3 text-primary"></span>
                            <input  class="promo-input w-100 flex-fill" oninput="this.value = this.value.toUpperCase()" name="promocode" placeholder="Add Promo Code" id="promocode">
                            <button type="button" id="apply-promo-btn" class="genric-btn primary circle">Apply</button>
                        </div>
                        <button type="submit" class="genric-btn primary w-100 circle arrow d-block mt-5">Goto Checkout</button>
                    </form>

                </div>
            @endif
        </div>
        @if ($InvoiceDetail->isEmpty())
            <div class="text-center mb-10">
                <hr>
                <h4>Your cart is empty.</h4>
                <a href="{{ route('shop') }}" class="genric-btn primary circle arrow mt-3">Continue Shopping</a>
            </div>
        @endif
    </div>

@endsection

@section('script')
<script>
$(document).ready(function() {
    function updateCartQuantity(psid, qty, element) {
        var promoCode = $('input[name="promocode"]').val();
        $.ajax({
            url: '{{ route("cart.update.qty") }}',
            method: 'POST',
            async: false,
            data: {
                _token: '{{ csrf_token() }}',
                psid: psid,
                qty: qty,
                promocode: promoCode
            },
            success: function(response) {
                if (response.status === 'Success') {
                    $('#subtotal').text(response.subtotal);
                    $('#total').text(response.total);
                    // You can add a success message toastr if you want                    
                    toastr.success(response.msg, "Success");
                }
            },
            error: function(xhr) {
                var error = xhr.responseJSON;
                if (error && error.max_qty) {
                    element.val(error.max_qty);
                }
                toastr.error(error.msg, "Error");
            }
        });
    }

    $('.qty-increment').on('click', function() {
        var qtyContainer = $(this).closest('.qty-sec');
        var psid = qtyContainer.data('psid');
        var qtyInput = qtyContainer.find('.qty-input');
        var currentQty = parseInt(qtyInput.val());
        var newQty = currentQty + 1;
        qtyInput.val(newQty);
        updateCartQuantity(psid, newQty, qtyInput);
    });

    $('.qty-decrement').on('click', function() {
        var qtyContainer = $(this).closest('.qty-sec');
        var psid = qtyContainer.data('psid');
        var qtyInput = qtyContainer.find('.qty-input');
        var currentQty = parseInt(qtyInput.val());
        if (currentQty > 1) {
            var newQty = currentQty - 1;
            qtyInput.val(newQty);
            updateCartQuantity(psid, newQty, qtyInput);
        }
    });

    $('.qty-input').on('input', function() {
        this.value = this.value.replace(/[^0-9]/g, '');
    }).on('change', function() {
        var qtyInput = $(this);
        var qtyContainer = qtyInput.closest('.qty-sec');
        var psid = qtyContainer.data('psid');
        var newQty = parseInt(qtyInput.val());

        if (isNaN(newQty) || newQty < 1) {
            newQty = 1;
            qtyInput.val(1);
        }
        
        updateCartQuantity(psid, newQty, qtyInput);
    });

    $('#apply-promo-btn').on('click', function(e) {
        e.preventDefault();
        var promoCode = $('input[name="promocode"]').val();

        $.ajax({
            url: '{{ route("cart.apply.promo") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                promocode: promoCode
            },
            async: false,
            success: function(response) {
                if(response.status === 'Success') {
                    $('#discount').text(response.discount);
                    $('#total').text(response.total);
                    toastr.success(response.msg, "Success");
                }
            },
            error: function(xhr) {
                var error = xhr.responseJSON;
                toastr.error(error.msg, "Error");
            }
        });
    });
        
    });
</script>
@endsection