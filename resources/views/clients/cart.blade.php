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

                @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{session('error')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                    
                @endif

                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{route('cart.update')}}" method="POST">
                            @csrf
                        
                        <!-- Cart Table Area -->
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="pro-thumbnail">Thumbnail</th>
                                        <th class="pro-title">Product</th>
                                        <th class="pro-price">Price</th>
                                        <th class="pro-quantity">Quantity</th>
                                        <th class="pro-subtotal">Total</th>
                                        <th class="pro-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart as $key => $item)
                                        
                                    <tr>
                                        <td class="pro-thumbnail">
                                            <a href="#"><img class="img-fluid" src="{{ Storage::url($item['image']) }}" alt="Product" /></a>
                                        <input type="hidden" name="cart[{{$key}}][image]" value="{{ ($item['image']) }}"></td>
                                        <td class="pro-title"><a href="{{ route('products.detail', $key) }}">{{ ($item['name']) }}</a>
                                            <input type="hidden" name="cart[{{$key}}][name]" value="{{ ($item['name']) }}">
                                        </td>
                                        <td class="pro-price"><span>{{ ($item['price'])  }} $</span>
                                            <input type="hidden" name="cart[{{$key}}][price]" value="{{ ($item['price']) }}">
                                        </td>
                                        <td class="pro-quantity">
                                            <div class="pro-qty"><input type="text" class="quantityInput" data-price="{{ ($item['price'])  }}" value="{{ $item['quantity'] }}" name="cart[{{$key}}][quantity]"></div>
                                        </td>
                                        <td class="pro-subtotal"><span class="subTotal">{{ ($item['price']) * ($item['quantity'])  }}</span></td>
                                        <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
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
                <div class="row">
                    <div class="col-lg-5 ml-auto">
                        <!-- Cart Calculation Area -->
                        <div class="cart-calculator-wrapper">
                            <div class="cart-calculate-items">
                                <h6>Cart Totals</h6>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <td>Sub Total</td>
                                            <td class="sub-total">{{ number_format($subTotal, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Shipping</td>
                                            <td class="shipping">{{ number_format($shipping) }}</td>
                                        </tr>
                                        <tr class="total">
                                            <td>Total</td>
                                            <td class="total-amount">{{ number_format($total, 2) }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <a href="{{route('orders.create')}}" class="btn btn-sqr d-block">Proceed Checkout</a>
                        </div>
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
