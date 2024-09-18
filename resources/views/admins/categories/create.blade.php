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
                <h4 class="fs-18 fw-semibold m-0">Add Category</h4>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <form action="{{ route('admins.categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}">
                            @error('name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" id="image" name="thumbnail" onchange="showImage(event)" class="form-control">
                            <img src="" id="img_category" alt="Image preview" style="width: 100px; display: none">
                            
                            
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
