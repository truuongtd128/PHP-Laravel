@extends('layouts.admin')

@section('css')
<!-- Add any custom CSS here if needed -->
@endsection

@section('content')
<div class="content">

    <!-- Start Content -->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Management Orders</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive myaccount-table text-center">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                              <tr>
                                <th colspan="2">Recipient Information</th>
                              </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td>{{ $order->recipient_name }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $order->recipient_email }}</td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>{{ $order->recipient_phone }}</td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>{{ $order->recipient_address }}</td>
                                </tr>
                                <tr>
                                    <td>Total Amount</td>
                                    <td>{{ $order->total_amount }}</td>
                                </tr>
                                <tr>
                                    <td>Payment Status</td>
                                    <td>{{ $order->payment_status }}</td>
                                </tr>
                                <tr>
                                    <td>Sub Total</td>
                                    <td>{{ $order->sub_total }}</td>
                                </tr>
                                <tr>
                                    <td>Shipping Fee</td>
                                    <td>{{ $order->shipping_fee }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive myaccount-table text-center">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>Thumbnail</th>
                                    <th>Product Code</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Sub Total</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->order_detail as $item)
                                @php
                                    $product = $item->product;
                                @endphp
                                    <tr>
                                        <td>
                                            <img class="img-fluid" width="70px" src="{{ Storage::url($product->image) }}" alt="">
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
      
        <!-- End Content -->
    </div> <!-- container-xxl -->
</div> <!-- content -->
@endsection

@section('js')

<!-- Add any custom JS here if needed -->
@endsection
