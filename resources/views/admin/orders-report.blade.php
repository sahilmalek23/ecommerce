@extends('admin.layout.main')

@section('css')    
    
@endsection

@section('main')
    <h2 class="page-title">{{ $title }}</h2>

    <div class="row my-4">
        <!-- Small table -->
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body ">
                    <!-- table -->
                    <table class="table datatables display table-striped " id="dataTable-1">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>   
                                <th>Order Details</th>                                                             
                                <th>Order Date</th>
                                <th>Email</th>                                
                                <th>Invoice No</th>
                                <th>Order Id</th>
                                <th>Payment Status</th>
                                <th>Paid Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><a href="{{route('admin.order.detail.report', $order->id)}}" class="nav-link text-primary"><span class="fe fe-16 fe-book"></span></a></td>
                                    <td>{{ $order->orderdate }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->invoiceno }}</td>
                                    <td>{{ $order->order_id }}</td>
                                    <td>{{ $order->paymentstatus }}</td>
                                    <td>{{ $order->finaltotal }}</td>
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