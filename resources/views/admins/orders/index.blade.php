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
                <h4 class="fs-18 fw-semibold m-0">Management Orders </h4>
            </div>
        </div>

        <!-- start row -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title align-content-center mb-0">Management Orders</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="table-responsive">
                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{session('success')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                            
                        @endif

                        @if (session('error'))
                        <div class="alert alert-error alert-dismissible fade show" role="alert">
                            {{session('error')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                            
                        @endif



                        <table class="table table-striped mb-0">
                            <thead>
                                    <tr>
                                        <th class="pro-thumbnail">Product Code</th>
                                        <th class="pro-title">Status</th>
                                        <th class="pro-title">Order date</th>
                                        <th class="pro-subtotal">Total</th>
                                        <th class="pro-subtotal">Status</th>
                                        <th class="pro-subtotal">Action</th>
                                        {{-- <th class="pro-remove">Remove</th> --}}
                                    </tr>
                            </thead>
                            <tbody>
                                @foreach ($listOrder as $key => $item)
                                        
                                <tr>
                                    <td>
                                        <a href="{{ route('orders.show',$item->id) }}"> {{$item->order_code}}</a>
                                     
                                    </td>

                                    <td>
                                        {{$item->status}}
                                    </td>
                                    
                                    <td>
                                        {{ $item->created_at->format('d-m-Y') }}
                                    </td>
                                    <td>
                                        {{$item->total_amount}}
                                    </td>

                                    <td>
                                        {{$item->total_amount}}
                                    </td>

                                    <td>

                                        <form action="{{ route('admins.orders.update', $item->id)}}" method="post" >
                                            @csrf
                                            @method('PUt')
                                            <select name="status" class="form-select w-75" id="" 
                                            onchange="confirmSubmit(this)" data-default-value="{{ $item->status}}">
    
                                                @foreach ($statusOrder as $key =>  $value)
                                                    <option value="{{ $key }}" {{$key == $item->status ? 'selected' : '' }}
                                                        {{$key == $type_cancel ? 'disabled' : '' }}
                                                        >{{ $value}}
                                                      
                                                    </option>
                                                @endforeach
                                            </select>
    
                                        </form>
                                    </td>
                                    <td>
                                   
                                        <a href="{{route('admins.orders.show', $item->id)}}"><i class="mdi mdi-eye text-muted fs-18 rounded-2 border p-1 me-1"></i></a>
                                      @if ($item->status == $type_cancel)
                                      <form action="{{route('admins.orders.destroy', $item->id)}}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Are you sure ?')">
                                       @csrf
                                       @method('DELETE')
                                       <button type="submit" class="border-0 bg-white"><i class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1"></i></button>
                                       
                                   </form>
                                          
                                      @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{  $listOrder->links('pagination::bootstrap-4') }}
    </div> <!-- container-fluid -->
</div> <!-- content -->
@endsection

@section('js')

<script>
function confirmSubmit(selectElement) {
    var form = selectElement.form;
    var selectedOption = selectElement.options[selectElement.selectedIndex].text;
    var defaultValue = selectElement.getAttribute('data-default-value');

    if (confirm('Are you sure you want to change status to "' + selectedOption + '"?')) {
        form.submit();
    } else {
        selectElement.value = defaultValue;
    }
}

</script>
   
@endsection