@extends('admin.layout.main')

@section('main')

@php
  
@endphp
   

<h2 class="page-title">Product Image</h2>              
<div class="card-deck">                
<div class="card shadow mb-4">                  
    <div class="card-body">
    <form action="{{route('admin.product.image.submit')}}" enctype="multipart/form-data" method="post">

        @csrf
        <input type="hidden" name="masterProductId" value="{{$productMasterId}}">
        <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label">Image</label>
        <div class="col-sm-9">
            <input type="file" class="form-control"  name="image" id="image" placeholder="Image">
        </div>
        </div>
        @error('name')
        <div class="text-danger text-right">{{ $message }}</div>
        @enderror
        
        <div class="form-group mb-2">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
    </div>
</div>
</div> <!-- / .card-desk-->  

<h2 class="page-title">Product Size Report</h2>

<div class="row my-4">
    <!-- Small table -->
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-body">
                <!-- table -->
                <table class="table datatables" id="dataTable-1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Entry Date</th>                            
                            <th>Image</th>                                                              
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ImageData as $PImage)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $PImage->entrydate }}</td>
                                <td><a class=" d-flex align-content-center justify-content-center" href="{{  asset('storage') ."/". $PImage->image }}" data-lightbox="image-{{ $loop->iteration }}" data-title=""><span class="fe fe-24 fe-eye btn btn-primary fe-16"></span></a></td>                                                                
                                <td>
                                    <div class="d-flex align-content-center justify-content-evenly">
                                        <a href="{{-- route('admin.product.add', $proMasData->id) --}}" class="nav-link text-primary d-none"><span class="fe fe-16 fe-edit"></span></a>
                                        <a href="{{ route('admin.product.image.delete', $PImage->id)}}" class="nav-link text-danger"><span class="fe fe-16 fe-trash-2"></span></a>
                                    </div>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
                
@endsection

@section('script') 
  
@endsection