@extends('layouts.client')

@section('css')
    <!-- Add any custom CSS here if needed -->
@endsection

@section('content')

      <!-- breadcrumb area start -->
      <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="shop.html">shop</a></li>
                                <li class="breadcrumb-item active" aria-current="page">cart</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- cart main wrapper start -->
    <div class="cart-main-wrapper section-padding">
        <div class="container">
            <div class="section-bg-color">

                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                    
                @endif

                @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{session('error')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                    
                @endif

                <div class="row">
                    <div class="col-lg-12">
                        
                        <!-- Cart Table Area -->
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="pro-thumbnail">Product Code</th>
                                        <th class="pro-title">Status</th>
                                        <th class="pro-subtotal">Total</th>
                                        <th class="pro-subtotal">Action</th>
                                        <th class="pro-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $key => $item)
                                        
                                    <tr>
                                        <td>
                                            <a href="{{ route('orders.show',$item->id) }}"> {{$item->order_code}}</a>
                                         
                                        </td>

                                        <td>
                                            {{$item->status}}
                                        </td>

                                        <td>
                                            {{$item->total_amount}}
                                        </td>

                                        <td>
                                            <a href="{{ route('orders.show',$item->id) }}" class="btn btn-sqr">View</a>
                                            <form action="{{ route('orders.update',$item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                @if ($item->status ===  $type_status_pending )
                                                <input type="hidden" name="cancelled" id="" value="1">
                                                <button type="submit" class="btn btn-sqr bg-danger" onclick="return confirm('Are you sure ? ')">Cancel</button>
                                                
                                                @elseif ($item->status ===  $type_status_shipped ) 
                                                <input type="hidden" name="delivered" id="" value="1">
                                                <button type="submit" class="btn btn-sqr bg-success" onclick="return confirm('Are you sure ? ')">Being transported</button>
                                                @endif

                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    

                                </tbody>
                            </table>
                        </div>
                        <!-- Cart Update Option -->
                        <div class="cart-update-option d-block d-md-flex justify-content-end">
                          
                            <div class="cart-update">
                                <button type="submit" class="btn btn-sqr">Update Cart</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cart main wrapper end -->

@endsection

@section('js')
    <!-- Add any custom CSS here if needed -->
@endsection
