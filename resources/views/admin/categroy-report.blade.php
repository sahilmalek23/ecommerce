@extends('admin.layout.main')

@section('css')    
    
@endsection

@section('main')
    <h2 class="page-title">Product Master Report</h2>

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
                                {{-- <th>Entry Date</th> --}}
                                <th>Image</th>
                                <th>Title</th>                                
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categoryList as $catData)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    {{-- <td>{{ $catData->entrydate }}</td> --}}
                                    <td><a class=" d-flex align-content-center justify-content-center" href="{{  asset('storage') ."/". $catData->image }}" data-lightbox="image-{{ $loop->iteration }}" data-title=""><span class="fe fe-24 fe-eye btn btn-primary fe-16"></span></a></td>
                                    <td>{{ $catData->title }}</td>
                                    <td>
                                        <div class="d-flex align-content-center justify-content-evenly">
                                            <a href="{{route('admin.product.categroy.form', $catData->id)}}" class="nav-link text-primary"><span class="fe fe-16 fe-edit"></span></a>
                                            <a href="{{route('admin.product.categroy.delete', $catData->id)}}" class="nav-link text-danger"><span class="fe fe-16 fe-trash-2"></span></a>
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