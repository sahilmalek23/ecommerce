@extends('admin.layout.main')

@section('main')

@php
  
@endphp
   
{{-- <div class="col-12"> --}}
  <h2 class="page-title">Size Add</h2>              
  <div class="card-deck">                
    <div class="card shadow mb-4">                  
      <div class="card-body">
        <form action="{{route('admin.product.subproduct.submit')}}" method="post">

          @csrf

          <input type="hidden" name="productId" value="{{$productId}}">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Size</label>
            <div class="col-sm-9">
              <select class="form-control select2" name="size" id="size">
                <option selected disabled value="">Select Size</option>                
                @foreach ($sizeData as $size)
                <option  value="{{$size->id}}">{{$size->size}}</option>
                @endforeach
              </select>
            </div>
          </div>
          @error('size')
            <div class="text-danger text-right">{{ $message }}</div>
          @enderror

          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Price</label>
            <div class="col-sm-9">
              <input name="price" class="form-control" id="price">
            </div>
          </div>
          @error('price')
            <div class="text-danger text-right">{{ $message }}</div>
          @enderror

          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Discount Price</label>
            <div class="col-sm-9">
              <input name="dp" class="form-control" id="dp">
            </div>
          </div>
          @error('dp')
            <div class="text-danger text-right">{{ $message }}</div>
          @enderror

          
          <div class="form-group mb-2">
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div> <!-- / .card-desk-->  
{{-- </div> --}}


<h2 class="page-title">Product Size Report</h2>

<div class="row my-4">
    <!-- Small table -->
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-body">
                <!-- table -->
                <table class="table datatables" id="dataTable-1">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Entry Date</th>                            
                            <th>Size</th>
                            <th>Price</th>
                            <th>Discount Price</th>                                  
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productSub as $proSubData)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $proSubData->entrydate }}</td>
                                <td>{{ $proSubData->size }}</td>
                                <td>{{ $proSubData->price }}</td>
                                <td>{{ $proSubData->dp }}</td>                                
                                <td>
                                    <div class="d-flex align-content-center justify-content-evenly">
                                        <a href="{{-- route('admin.product.add', $proMasData->id) --}}" class="nav-link text-primary d-none"><span class="fe fe-16 fe-edit"></span></a>
                                        <a href="{{ route('admin.product.subproduct.delete', $proSubData->id)}}" class="nav-link text-danger"><span class="fe fe-16 fe-trash-2"></span></a>
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