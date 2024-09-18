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
                    <h4 class="fs-18 fw-semibold m-0">Update Product</h4>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form action="{{ route('admins.products.update',$listPro->id) }}" method="POST" enctype="multipart/form-data">
                            
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Product code</label>
                                <input type="text" id="product_code" name="product_code"
                                    class="form-control @error('product_code') is-invalid @enderror"
                                    value="{{$listPro->product_code }}">
                                @error('product_code')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Product name</label>
                                <input type="text" id="name" name="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{$listPro->name }}">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Price</label>
                                <input type="number" id="price" name="price"
                                    class="form-control @error('price') is-invalid @enderror" value="{{ $listPro->price}}">
                                @error('price')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="category_id" class="form-label">Category Product</label>
                                <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror">
                                    <option value="">--Select Category --</option>
                                    @foreach ($listCate as $item)
                                        <option value="{{ $item->id }}" {{ $listPro->category_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number" id="quantity" name="quantity"
                                    class="form-control @error('quantity') is-invalid @enderror"
                                    value="{{ $listPro->quantity}}">
                                @error('quantity')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $listPro->description) }}</textarea>
                                @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            


                            <div class="mb-3">
                                <label for="is_type" class="form-label">Status</label>
                                <div class="col-sm-10 mb-3 d-flex gap-2">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="is_type" id="girdRadios1"
                                               value="1" {{ old('is_type', $listPro->is_type) == 1 ? 'checked' : '' }}>
                                        <label for="girdRadios1" class="form-check-label text-success">Active</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="is_type" id="girdRadios2"
                                               value="0" {{ old('is_type', $listPro->is_type) == 0 ? 'checked' : '' }}>
                                        <label for="girdRadios2" class="form-check-label text-danger">Null</label>
                                    </div>
                                </div>
                                @error('is_type')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            


                            <div class="mb-3">
                                <div class="form-switch mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="is_new" name="is_new" 
                                               {{ old('is_new', $listPro->is_new) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_new">New</label>
                                    </div>
                                </div>
                            </div>
                            
                    </div>

                    <div class="mb-3">
                        <label for="inport_date" class="form-label">Date Import</label>
                        <input type="date" id="inport_date" name="import_date"
                            class="form-control @error('inport_date') is-invalid @enderror"
                            value="{{ $listPro->import_date}}">
                        @error('inport_date')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-lg-6">

                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" id="image" name="image" onchange="showImage(event)"
                                class="form-control" value="{{ old('image') }}">
                            <img src="{{ Storage::url( $listPro->image)}}" id="img_category" alt="Image preview"
                                style="width: 100px; ">


                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="thumbnail" class="form-label">Album Image</label>
                        <i id="add-row" class="mdi mdi-plus text-muted fs-18 rounded-2 border ms-3 p-1"></i>
                        <table class="table align-middle table-nowrap mb0">
                            <tbody id="image-table-body">
                                @foreach ($listPro->product_gallery as $index => $thumbnail)
                                    <tr>
                                        <td class="d-flex align-items-center">
                                            <img src="{{ Storage::url($thumbnail->thumbnail) }}" id="preview_{{$index}}" alt="Image preview"
                                                style="width: 50px;" class="me-3">
                                            <input type="file" id="thumbnail"
                                             name="list_image[{{$thumbnail->id}}]"
                                            onchange="previewImage(this, {{ $index }})" class="form-control">
                                            <input type="hidden" name="list_image[{{$thumbnail->id}}]" value="{{$thumbnail->id}}">
                                        </td>
                                        <td>
                                            <i onclick="removeRow(this)" class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1"></i>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
                imgCategory.style.display = 'none'; 
            }
        }
    </script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
    var rowCount = {{ count($listPro->product_gallery) }};

    document.getElementById('add-row').addEventListener('click', function() {
        var tableBody = document.getElementById('image-table-body');

        var newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td class="d-flex align-items-center">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQrVLGzO55RQXipmjnUPh09YUtP-BW3ZTUeAA&s" id="preview_${rowCount}" alt="Image preview"
                    style="width: 50px;" class="me-3">
                <input type="file" id="thumbnail_${rowCount}" name="list_image[id_${rowCount}]"
                    onchange="previewImage(this, ${rowCount})" class="form-control">
            </td>
            <td>
                <i onclick="removeRow(this)" class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1"></i>
            </td>`;

        tableBody.appendChild(newRow);
        rowCount++;
    });
});

function previewImage(input, rowIndex) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            document.getElementById(`preview_${rowIndex}`).setAttribute('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function removeRow(element) {
    var row = element.closest('tr');
    if (row) {
        row.remove();
    }
}




    </script>
    <!-- Add any custom JS here if needed -->
@endsection
