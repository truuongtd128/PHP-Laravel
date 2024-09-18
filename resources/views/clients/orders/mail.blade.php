@component('mail::message')
    # Order confirmation

    Hello {{$order->recipient_name}},

    Thank You, This is your order information

    *** PRODUCT CODE: ** {{$order->order_code }}

    *** ORDERED PRODUCTS: ** 
    @foreach ($order->order_detail as $detail)
        - {{$detail->product->name }} x {{$detail->quantity}} : {{ number_format($detail->total_amount) }} $

    @endforeach

    *** TOTAL AMOUNT: ** {{ number_format($order->total_amount) }}

    Chúng tôi sẽ liên hệ với bạn sớm nhất để xác nhận thông tin giao hàng.

    Cảm ơn bạn đã mua sắm tại cửa hàng chúng tôi.

    Trân trọng.





@endcomponent