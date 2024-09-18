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

                                <li class="breadcrumb-item active" aria-current="page">Order Detail</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cart main wrapper end -->
    <div class="cart-main-wrapper section-padding">
        <div class="container">
            <div class="section-bg-color">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="myaccount-content">
                            <h5>Information Order: <span class="text-danger">{{ $order->order_code }} </span></h5>
                            <div class="welcome">
                                <p>Recipient Name: <strong>{{ $order->recipient_name }}</strong></p>
                                <p>Recipient Email: <strong>{{ $order->recipient_email }}</strong></p>
                                <p>Recipient Phone: <strong>{{ $order->recipient_phone }}</strong></p>
                                <p>Order Date: <strong>{{ $order->created_at->format('d-m-Y') }}</strong></p>
                                <p>Recipient Address: <strong>{{ $order->recipient_address }}</strong></p>
                                <p>Payment Status: <strong>{{ $order->payment_status }}</strong></p>
                                <p>Status: <strong>{{ $order->status }}</strong></p>
                                <p>Sub Total: <strong>{{ number_format($order->sub_total) }} $</strong></p>
                                <p>Shipping Fee: <strong>{{ number_format($order->shipping_fee) }} $</strong></p>
                                <p>Total Amount: <strong>{{ number_format($order->total_amount) }} $</strong></p>


                            </div>
                            <p class="mb-0"></p>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="myaccount-content">
                            <h5>Product Detail</h5>
                            <div class="myaccount-table table-reponsive text-center">
                                <table class="table table-bordered">
                                    <thead class="thead-light">
                                        <tr>
                                            <td>Thumbnail</td>
                                            <td>Product Code</td>
                                            <td>Product Name</td>
                                            <td>Quantity</td>
                                            <td>Sub Total</td>
                                            <td>Total</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->order_detail as $item)
                                        @php
                                            $product = $item->product;
                                        @endphp
                                            <tr>
                                                <td>
                                                    <img class="img-fuild" width="70px" src="{{ Storage::url($product->image) }}" alt="">
                                                </td>
                                                <td>{{ $product->product_code }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>{{ $item->total_amount }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- Add any custom CSS here if needed -->
@endsection
