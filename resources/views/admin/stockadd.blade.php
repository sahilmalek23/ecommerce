@extends('admin.layout.main')

@section('css')    
    
@endsection

@section('main')


<div class="col-12">
  <h2 class="page-title">Stock Add</h2>              
  <div class="card-deck">                
    <div class="card shadow mb-4">                  
      <div class="card-body">
        <form action="{{route(name: 'admin.stock.add.submit')}}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="productId" value="{{$productId}}">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Stock Qty</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="stock" id="stock" placeholder="Stock Qty">
            </div>
          </div>
          @error('stock')
            <div class="text-danger text-right">{{ $message }}</div>
          @enderror
                  
          <div class="form-group mb-2">
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div> <!-- / .card-desk-->  
</div>
@endsection

@section('script')
    
@endsection