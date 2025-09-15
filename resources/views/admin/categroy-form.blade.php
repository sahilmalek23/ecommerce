@extends('admin.layout.main')

@section('css')    
  <style>
    .ql-container {
      height: 185px;
    }  
  </style>    
@endsection

@section('main')

@php 
  $title = $image = $editId = '';
  $subBtn = 'Save';
  if ($categoryData) {
    $editId = $categoryData->id;
    $title = $categoryData->title;
    $image = $categoryData->image;
    $subBtn = "Update";
  }
@endphp
<div class="col-12">
  <h2 class="page-title">Category</h2>              
  <div class="card-deck">                
    <div class="card shadow mb-4">                  
      <div class="card-body">
        <form action="{{route('admin.product.categroy.submit')}}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="editId" value="{{$editId}}">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Title</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" value="{{$title}}" name="title" id="title" placeholder="Title">
            </div>
          </div>
          @error('title')
            <div class="text-danger text-right">{{ $message }}</div>
          @enderror
          
          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">Image</label>
            <div class="col-sm-9">
              @if($image == '')
                <input type="file" class="form-control" name="image" id="image" placeholder="Image">
              @else
              <div class='d-flex'>
                <input type="file" class="form-control" name="image" id="image" placeholder="Image">
                <a class=" d-flex align-content-center justify-content-center" href="{{  asset('storage') ."/". $image }}" data-lightbox="image-" data-title="">
                  <span class="fe fe-24 fe-eye btn btn-primary fe-16"></span>
                </a>
              </div>
              @endif
            </div>
          </div>
          @error('image')
            <div class="text-danger text-right">{{ $message }}</div>
          @enderror

          <div class="form-group mb-2">
            <button type="submit" class="btn btn-primary">{{$subBtn}}</button>
          </div>
        </form>
      </div>
    </div>
  </div> <!-- / .card-desk-->  
</div>
@endsection

@section('script')
    
@endsection