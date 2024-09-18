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
                <h4 class="fs-18 fw-semibold m-0">Management User </h4>
            </div>
        </div>

        <!-- start row -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title align-content-center mb-0">Management User</h4>
                    <a href="{{route('admins.users.create')}}" class="btn btn-success">Add User</a>
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
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $item)
                                    
                                <tr>
                                    <td scope="row">{{$item->id}}</td>
                                   
                                    <td scope="row">{{$item->name}}</td>
                                    <td scope="row">{{$item->email}}</td>
                                    <td scope="row">{{$item->password}}</td>
                                    <td scope="row">{{$item->type}}</td>
                                    <td>
                                        <a href="{{route('admins.users.edit', $item->id)}}"><i class="mdi mdi-pencil text-muted fs-18 rounded-2 border p-1 me-1"></i></a>
                                        <form action="{{route('admins.users.destroy', $item->id)}}" method="POST" class="d-inline"
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
        {{  $user->links('pagination::bootstrap-4') }}
    </div> <!-- container-fluid -->
</div> <!-- content -->
@endsection
@section('js')
   
@endsection