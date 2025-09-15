@extends('admin.layout.main')

@section('css')    
    
@endsection

@section('main')
    <h2 class="page-title">Stock Report</h2>

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
                                <th>Stock Add</th>
                                <th>Product Name</th>                                
                                <th>Size</th>
                                <th>Status</th>
                                <th>Inward</th>
                                <th>Outward</th>
                                <th>Total Stock</th>                                                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($StockList as $StockData)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><a href="{{route('admin.stock.add', $StockData->ProSubId)}}">Stock Add</a></td>                                    
                                    <td>{{ $StockData->productname }}</td>
                                    <td>{{ $StockData->size }}</td>
                                    <td>{{ $StockData->status }}</td>
                                    <td>{{ $StockData->inwardstock }}</td>
                                    <td>{{ $StockData->outwardstock }}</td>                                    
                                    <td>{{ $StockData->totalstock }}</td>                                                                          
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