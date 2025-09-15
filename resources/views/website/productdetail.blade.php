@extends('website.layout.main')

@section('css')

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
                            <li class="breadcrumb-item"><a href="#">Product Details</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End-->


    <!-- About Area Start -->
    <div class="about-area mb-5">
        <div class="container">
            <form id="formdetail" action="#" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="productId" value="{{$product->id}}">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="d-flex justify-content-center">
                            <div class="w-75 slider-for">
                                <img src="{{asset('storage/'.$productMaster->image)}}" id="image-0" class="img-fluid details-big-img"
                                    alt="...">   

                                @foreach ($productImages as $PImage)
                                <img src="{{asset('storage/'.$PImage->image)}}" id="image-{{$loop->iteration}}" class="img-fluid details-big-img"
                                    alt="..."> 
                                @endforeach
                                                                                    
                            </div>
                        </div>

                        <div class="product-img mt-5 mb-5">
                            <div><img class="pimg" src="{{asset('storage/'.$productMaster->image)}}"></div>  
                            @foreach ($productImages as $PImage)
                                <div><img class="pimg" src="{{asset('storage/'.$PImage->image)}}"></div>
                            @endforeach                                          
                        </div>
                    </div>
                    <div class="col-lg-6 ">

                        <h1 class="font-weight-bold display-4">{{ $productMaster->name }}</h1>
                        <div class="mt-5 price-font">
                            <span class="pr-4"><del>&#8377; {{ $product->price }} </del></span>
                            <span>&#8377; {{ $product->dp }} </span>

                            @if ($availableStock->stock > 0 && $availableStock->stock < 6 )
                                <span class="ml-2 p-3 badge badge-warning">Low Stock</span>
                            @elseif($availableStock->stock > 0 )
                                <span class="ml-2 p-3 badge badge-success">In Stock</span>
                            @else                          
                                <span class="ml-2 p-3 badge badge-danger">Out of Stock</span>
                            @endif
                        </div>
                        <span>Taxes included.</span>
                        <div class="pt-5">
                            <p>Size</p>
                            <div>
                                @foreach ($productAvailableSize as $PAS)                                
                                    <a href="{{route('product.detail', $PAS->id)}}" class="genric-btn primary-border cu-font-size mr-2 small  circle arrow @if($PAS->sizeid == $product->size) active @endif">{{ $PAS->size }}</a>
                                @endforeach
                            </div>
                        </div>
                        <div class="pt-5">
                            <p>Quantity</p>
                            <div class="qty-sec">
                                <button type="button" id="decrement" class="qty-btn px-4 cu-font-size active small genric-btn primary">-</button>
                                <input type="text" name="qty" class="qty-input" value="1" availableStock="{{$availableStock->stock}}">
                                <button type="button" id="increment" class="qty-btn px-4 cu-font-size genric-btn small active primary">+</button>
                            </div>
                        </div>
                        <div class="pt-5">
                            @if ($availableStock->stock > 0)
                                <div class="">
                                    <button type="button" class="genric-btn d-block primary-border w-100 " id="addToCart">Add To Cart</button>
                                    <button type="button" class="genric-btn danger w-100 mt-2 buy-now-pd " id="buyNow">Buy Now</button>
                                </div>
                            @else 
                                <div class="ml-2 p-3  badge-danger">Out of Stock</div>
                            @endif
                        </div>
                        <div class="pt-5 text-justify">
                            {!!$productMaster->description!!}
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- About Area End -->

@endsection

@section('script')
    <script src="{{asset('website')}}/js/hover-extended-magnify/extm.min.js"></script>
    <script>
        $('#buyNow').click(function() {
            $('#formdetail').attr('action', '{{route('product.addtocart', '1')}}');
            $('#formdetail').submit();
        });

        $('#addToCart').click(function() {
            $('#formdetail').attr('action', '{{route('product.addtocart')}}');
            $('#formdetail').submit();
        });

        $('#image-0').extm({
          position: 'overlay'
        });

        @foreach ($productImages as $PImage)
            $('#image-' + {{$loop->iteration}}).extm({
                position: 'overlay'
            });
        @endforeach       

        $(document).ready(function(){
            var pageWidth = $(window).width();

            var slickSlide = 3;
            
            if (pageWidth <= 339) {
                slickSlide = 2;
            }
            else if (pageWidth <= 767) {
                slickSlide = 3;
            }
            else if (pageWidth <= 991) {
                slickSlide = 4;
            }
            else if (pageWidth <= 1199) {
                 slickSlide = 2;
            } 


             $('.slider-for').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '.product-img'
            });
            $('.product-img').slick({
                rtl: true,
                slidesToShow: slickSlide,
                slidesToScroll: 1,
                asNavFor: '.slider-for',
                arrows: false,
                // dots: true,
                centerMode: true,
                focusOnSelect: true                
            });


            // Increment and decrement quantity with stock validate 

            $('#increment').click(function () {
                var $qtyVal = parseInt($('.qty-input').val());
                $qtyVal++;
                var $availableStock = parseInt($('.qty-input').attr('availableStock'));
                
                if ($qtyVal > $availableStock) {
                    console.log("not stock avaliable");
                } else {
                    $('.qty-input').val($qtyVal);
                }
            });

            $('#decrement').click(function () {
                var $qtyVal = parseInt($('.qty-input').val());
                $qtyVal--;

                if ($qtyVal < 1) {
                    $('.qty-input').val(1);
                }else {
                    $('.qty-input').val($qtyVal);
                } 
            });

            $('.qty-input').on('input', function () {
                $qtyValue = this.value.replace(/[^0-9]/g, ''); 

                if ($qtyValue == '') {
                    this.value = 1;
                } else {
                    this.value = $qtyValue;
                    var $availableStock = parseInt($('.qty-input').attr('availableStock'));
                    if ($qtyValue > $availableStock) {
                        toastr.error("We don’t have enough stock to fulfill your request.", "Error");
                        this.value = 1;
                    }
                }                
            });            

        });
        
    </script>
@endsection