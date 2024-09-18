@extends('layouts.client')

@section('css')
    <!-- Add any custom CSS here if needed -->
@endsection

@section('content')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="shop.html">shop</a></li>
                                <li class="breadcrumb-item active" aria-current="page">checkout</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- checkout main wrapper start -->
    <div class="checkout-page-wrapper section-padding">
        <div class="container">
            <div class="row">
                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf
                    <div class="col-lg-6">
                        <div class="checkout-billing-details-wrap">
                            <h5 class="checkout-title">Billing Details</h5>
                            <div class="billing-form-wrap">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <div class="row">
                                    <div class="single-input-item">
                                        <label for="recipient_name" class="required" class="">Name</label>
                                        <input type="text" id="name" name="recipient_name"
                                            placeholder="Email Address" value="{{ Auth::user()->name }}" />

                                        @error('recipient_name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="single-input-item">
                                        <label for="recipient_email" class="required">Email</label>
                                        <input type="text" id="recipient_email" name="recipient_email"
                                            placeholder="Company Name" value="{{ Auth::user()->email }}" />

                                        @error('recipient_email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="single-input-item">
                                        <label for="recipient_phone">Phone</label>
                                        <input type="text" id="recipient_phone" class="required" name="recipient_phone"
                                            placeholder="Company phone" value="{{ Auth::user()->phone }}" />

                                        @error('recipient_phone')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="single-input-item">
                                        <label for="recipient_address">Address</label>
                                        <input type="text" id="recipient_address" class="required"
                                            name="recipient_address" placeholder="Company phone"
                                            value="{{ Auth::user()->address }}" />

                                        @error('recipient_address')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                

                                <div class="single-input-item">
                                    <label for="note">Order Note</label>
                                    <textarea name="note" id="note" cols="30" rows="3"
                                        placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="order-summary-details">
                            <h5 class="checkout-title">Your Order Summary</h5>
                            <div class="order-summary-content">
                                <!-- Order Summary Table -->
                                <div class="order-summary-table table-responsive text-center">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Products</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($carts as $key => $item)
                                                <tr>
                                                    <td><a href="{{ route('products.detail', $key) }}">{{ $item['name'] }}<strong>x
                                                                {{ $item['quantity'] }}</strong></a>
                                                    </td>
                                                    <td>{{ $item['price'] * $item['quantity'] }} $</td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>Sub Total</td>
                                                <td><strong>{{ number_format($subTotal, 2) }} $</strong></td>
                                                <input type="hidden" name="sub_total" value="{{ $subTotal }} ">
                                            </tr>
                                            <tr>
                                                <td>Shipping</td>
                                                <td><strong>{{ number_format($shipping, 2) }} $</strong></td>
                                                <input type="hidden" name="shipping_fee" value="{{ $shipping }}">
                                            </tr>
                                            <tr>
                                                <td>Total Amount</td>
                                                <td><strong class="text-danger">{{ number_format($total, 2) }} $</strong>
                                                </td>
                                                <input type="hidden" name="total_amount" value="{{ $total }}">
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                
                                <div class="order-payment-method">
                                    <div class="single-payment-method show">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="cashon" name="" value="cash"
                                                    class="custom-control-input" checked />
                                                <label class="custom-control-label" for="cashon">Cash On Delivery</label>
                                            </div>
                                        </div>
                                        <div class="payment-method-details" data-method="cash">
                                            <p>Pay with cash upon delivery.</p>
                                        </div>
                                    </div>

                                    <div class="summary-footer-area">
                                        <div class="custom-control custom-checkbox mb-20">
                                          
                                            <button type="submit" class="btn btn-sqr">Place Order</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection

    @section('js')
        <!-- Add any custom CSS here if needed -->
    @endsection
