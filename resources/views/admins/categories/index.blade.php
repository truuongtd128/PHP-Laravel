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
                <h4 class="fs-18 fw-semibold m-0">Management Category </h4>
            </div>
        </div>

        <!-- start row -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title align-content-center mb-0">Management Category</h4>
                    <a href="{{route('admins.categories.create')}}" class="btn btn-success">Add Category</a>
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
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $item)
                                    
                                <tr>
                                    <th scope="row">{{$item->id}}</th>
                                    <td>
                                        <img src="{{ Storage::url($item->thumbnail)}}" alt="" width="100px">
                                    </td>
                                    <th scope="row">{{$item->name}}</th>
                                    <td>
                                        <a href="{{route('admins.categories.edit', $item->id)}}"><i class="mdi mdi-pencil text-muted fs-18 rounded-2 border p-1 me-1"></i></a>
                                        <form action="{{route('admins.categories.destroy', $item->id)}}" method="POST" class="d-inline"
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
        {{  $category->links('pagination::bootstrap-4') }}
    </div> <!-- container-fluid -->
</div> <!-- content -->
@endsection
@section('js')
   
@endsection