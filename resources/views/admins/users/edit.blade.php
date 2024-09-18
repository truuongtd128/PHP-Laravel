@extends('layouts.admin')

@section('css')
<!-- Add any custom CSS here if needed -->
@endsection

@section('content')
<div class="content">

    <!-- Start Content -->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Update User</h4>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <form action="{{ route('admins.users.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{$user->name}}">
                            @error('name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{$user->email }}">
                            @error('email')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">User Type</label>
                            <select id="type" name="type" class="form-control @error('type') is-invalid @enderror">
                                <option value="">Select User Type</option>
                                <option value="admin" {{ old('type', $user->type) == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="member" {{ old('type', $user->type) == 'member' ? 'selected' : '' }}>Member</option>
                            </select>
                            @error('type')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                       

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Content -->
    </div> <!-- container-xxl -->
</div> <!-- content -->
@endsection

@section('js')
<script>
    function showImage(event) {
        const imgCategory = document.getElementById('img_category'); 
        const file = event.target.files[0];


        console.log(imgCategory);
        
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                imgCategory.src = e.target.result;
                imgCategory.style.display = 'block';
            };
            
            reader.readAsDataURL(file);
        } else {
            imgCategory.style.display = 'none'; // Ẩn hình ảnh nếu không có tệp
        }
    }
</script>
<!-- Add any custom JS here if needed -->
@endsection
