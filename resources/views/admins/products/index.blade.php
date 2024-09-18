@extends('layouts.admin')

{{-- @section('title')
    {{$title}}
@endsection --}}

@section('css')
   
@endsection
@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Management Product </h4>
            </div>
        </div>

        <!-- start row -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title align-content-center mb-0">Management Product</h4>
                    <a href="{{route('admins.products.create')}}" class="btn btn-success">Add Product</a>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="table-responsive">
                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{session('success')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                            
                        @endif


                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">image</th>
                                    <th scope="col">Product_code</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $item)
                                    
                                <tr>
                                    <th scope="row">{{$item->id}}</th>
                                    <td>
                                        <img src="{{ Storage::url($item->image)}}" alt="" width="100px">
                                    </td>
                                    <td scope="row">{{$item->product_code}}</td>
                                    <td scope="row">{{$item->name}}</td>
                                    <td scope="row">{{$item->description}}</td>
                                    <td scope="row">{{$item->quantity}}</td>
                                    <td scope="row">{{number_format($item->price)}}</td>
                                    <td scope="row">{{$item->category->name ?? 'N/A'}}</td>
                                    <td scope="row" class="{{$item->is_type == true ? 'text-success' : 'text-danger'}}">
                                        {{$item->is_type == true ? 'Active' : 'None'}}
                                        
                                    </td>
                                    <td>
                                        <a href="{{route('admins.products.edit', $item->id)}}"><i class="mdi mdi-pencil text-muted fs-18 rounded-2 border p-1 me-1"></i></a>
                                        <form action="{{route('admins.products.destroy', $item->id)}}" method="POST" class="d-inline"
                                             onsubmit="return confirm('Are you sure ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="border-0 bg-white"><i class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1"></i></button>
                                            
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{  $product->links('pagination::bootstrap-4') }}
    </div> <!-- container-fluid -->
</div> <!-- content -->
@endsection
@section('js')
   
@endsection