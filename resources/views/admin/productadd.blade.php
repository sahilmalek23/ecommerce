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
  $name = $categoryId = $price = $dp = $description = $remarks = $editId = $image = '';
  $subBtn = "Save";
  if ($productData) {
    $editId = $productData->id;
    $name = $productData->name;
    $categoryId = $productData->category_id;
    $price = $productData->price;
    $dp = $productData->dp;
    $description = $productData->description;
    $remarks = $productData->remarks;
    $image = $productData->image;
    $subBtn = "Update";
  }
@endphp
   
<div class="col-12">
  <h2 class="page-title">Product {{$subBtn}}</h2>              
  <div class="card-deck">                
    <div class="card shadow mb-4">                  
      <div class="card-body">
        <form action="{{route('admin.product.submit')}}" method="post" enctype="multipart/form-data">

          @csrf
          <input type="hidden" name="editId" value="{{$editId}}">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" value="{{$name}}" name="name" id="name" placeholder="Name">
            </div>
          </div>
          @error('name')
            <div class="text-danger text-right">{{ $message }}</div>
          @enderror

          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Category</label>
            <div class="col-sm-9">
              <select class="form-control select2" name="category" id="category">
                <option selected disabled value="">Select Categroy</option>                
                @foreach ($categorys as $category)
                <option @if($categoryId == $category->id) selected @endif value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
              </select>
            </div>
          </div>
          @error('category')
            <div class="text-danger text-right">{{ $message }}</div>
          @enderror                    

          {{-- <div class="form-group row ">
            <label  class="col-sm-3 col-form-label">Remarks</label>
            <div class="col-sm-9">
              <textarea class="form-control" name="remarks" id="remarks" rows="4" placeholder="remarks">{{ $remarks }}</textarea>
            </div>
          </div>  
          @error('remarks')
            <div class="text-danger text-right">{{ $message }}</div>
          @enderror --}}
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
          <input type="hidden" name="description" id="description" value="">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Description</label>
            <div class="col-sm-9">
              <div id="editor">
                 {!!$description!!}                                            
              </div>
            </div>
          </div> 
          @error('description')
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
  <script>
    $('form').submit(function () {
      var $description = $('.ql-editor').html();
      $('#description').val($description);
    });
  </script>
@endsection