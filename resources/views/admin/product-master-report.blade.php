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
                                <th>Size Add</th>
                                <th>Image Add</th>
                                <th>Entry Date</th>
                                <th>Main Image</th>                                
                                <th>Name</th>
                                <th>Category</th>                                                                
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($proMasList as $proMasData)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><a href="{{route('admin.product.subproduct.add', $proMasData->id)}}">Sub Product Add</a></td>
                                    <td><a href="{{route('admin.product.image.add', $proMasData->id)}}">Image Add</a></td>
                                    <td>{{ $proMasData->entrydate }}</td>
                                    <td class="text-center">
                                        @if($proMasData->image == '')
                                            ---
                                        @else
                                            <a class=" d-flex align-content-center justify-content-center" href="{{  asset('storage') ."/". $proMasData->image }}" data-lightbox="image-{{ $loop->iteration }}" data-title=""><span class="fe fe-24 fe-eye btn btn-primary fe-16"></span></a>
                                        @endif
                                    </td>
                                    <td>{{ $proMasData->name }}</td>
                                    <td>{{ $proMasData->category }}</td>                                                                        
                                    <td>
                                        <div class="d-flex align-content-center justify-content-evenly">
                                            <a href="{{ route('admin.product.add', $proMasData->id) }}" class="nav-link text-primary"><span class="fe fe-16 fe-edit"></span></a>
                                            <a href="{{ route('admin.product.delete', $proMasData->id)}}" class="nav-link text-danger"><span class="fe fe-16 fe-trash-2"></span></a>
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