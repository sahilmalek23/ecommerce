@extends('website.layout.main')

@section('css')    
    <style>
        .dropdown-item {
            font-size: 16px;
        }
        .form-group input {
            height: 41px;
            border-radius: 30px;
            width:120px;
        }
        .form-group select {
            height: 41px;
            border-radius: 10px;
            width:100%;
            font-size: 16px;
        }
        .page-link {
            padding: .5rem 1.75rem;
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
                            <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- listing Area Start -->

    <div class="">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-tittle mb-50">
                    <div class="row">
                        <div class="col-6">
                            <h2 style="font-size: 25px;">Shop with us</h2>
                        </div>
                        <div class="col-6">
                            @empty(!$category)
                                <h3 class="text-right"><b>Category:</b> {{ $category->title }}</h3>
                            @endempty
                        </div>
                    </div>
                        <p class="d-none">Browse from 230 latest items</p>
                    </div>
                </div>
            </div>  
            <div class="row my-4 d-none">
                <div class="col-6">
                    <label class="d-inline">Filter: </label>
                    <div class="dropdown d-inline">
                        <button class="genric-btn success medium dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                            Price
                        </button>
                        <div class="dropdown-menu">
                            <p class="dropdown-item border-bottom" href="#">The highest price is Rs. 799.00</p>
                            <div class="dropdown-item">
                                <div class="d-inline-block">
                                    <span>&#8377;</span>
                                    <div class="form-group d-inline-block">                                        
                                        <input type="number" class="form-control" id="startprice" placeholder="From">
                                    </div>                                
                                </div>
                                <div class="d-inline-block">
                                    <span>&#8377;</span>
                                    <div class="form-group d-inline-block">                                        
                                        <input type="number" class="form-control" id="startprice" placeholder="To">
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <label class="d-inline">Sort By: </label>
                    <div class="form-group d-inline-block ">    
                        <select class="form-control" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        </select>
                    </div>
                </div>           
            </div>                      
            <div class="row">                
                <div class="col-12">
                    <!--? New Arrival Start -->
                    <div class="new-arrival new-arrival2">
                        <div class="row">
                            @foreach ($productList as $PData)                                
                                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                                        <a href="{{route('product.detail', $PData['psid'])}}">
                                            <div class="single-new-arrival mb-50 text-center wow " data-wow-duration="1s"
                                                data-wow-delay=".1s">
                                                <div class="popular-img">
                                                    <img src="{{  asset('storage') ."/". $PData['image'] }}" alt="{{$PData['name']}}">
                                                    
                                                </div>
                                                <div class="popular-caption">
                                                    <h3><a href="{{route('product.detail', $PData['psid'])}}">{{$PData['name']}}</a></h3>                                
                                                    <span> &#8377; {{$PData['price']}}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                            @endforeach                            
                        </div>
                        <div class="d-flex justify-content-center">
                            {{ $productMasterList->links() }}
                        </div>
                    </div>
                    <!--? New Arrival End -->
                </div>
            </div>
        </div>
    </div>


        
@endsection

@section('script') 

@endsection
