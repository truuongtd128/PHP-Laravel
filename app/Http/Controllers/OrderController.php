<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Mail\OrderConfirm;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Auth::user()->order;
        $type_status_pending = Order::PENDING;

        $type_status_shipped = Order::SHIPPED;
     
        

       
        return view('clients.orders.index', compact('orders','type_status_pending','type_status_shipped'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $carts = session()->get('cart',[]);
        if (!empty($carts)) {
            $total = 0 ;
            $subTotal = 0;

            foreach ($carts as $item ) {
                $subTotal +=  $item['price'] * $item['quantity'];
            }
            $shipping = 30;
            $total=  $subTotal +  $shipping ;
            return view('clients.orders.create', compact('carts','total','subTotal','shipping'));
        }
        return redirect()->route('cart.list');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request)
    {
        if($request->isMethod('POST')) {
            DB::beginTransaction();

            try {
                $params = $request->except('_token');
                $params['order_code'] = $this->genUnicoe();
                $order = Order::query()->create($params);

                $orderId = $order->id;
                $carts = session()->get('cart',[]);

                foreach ($carts as $key => $item) {
                   $subTotal =  $item['price'] *  $item['quantity'];
                   $order->order_detail()->create([
                    'order_id' => $orderId  ,
                    'product_id' =>  $key,
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'total_amount' =>  $subTotal,
                   ]);
                }

                DB::commit();
                Mail::to($order->recipient_email)->queue(new OrderConfirm($order));
                session()->put('cart',[]);

                return redirect()->route('orders.index')->with('Succses', 'Adđ Order product success !');

            } catch (\Exception $e) {
                DB::rollBack();
             

                return redirect()->route('cart.list')->with('error', 'Error');
            }
        }
    }

    public function genUnicoe() {
        do {
            $oderCode = 'TDT-' . Auth::id() . '-' . now()->timestamp;
        } while (Order::where('order_code', $oderCode)->exists());
        return $oderCode;
    }
 
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::query()->findOrFail($id);
        $statusOrder = Order::STATUS;
        $statusPayment = Order::PAYMENT;

        return view('clients.orders.show', compact('order','statusOrder','statusPayment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::query()->findOrFail($id);

        try {
            DB::beginTransaction();

            if ($request->has('cancelled')) {
                $order->update(['status' => Order::CANCELLED ]);
            }elseif ($request->has('delivered')){
                $order->update(['status' => Order::DELIVERED  ]);
            }

            DB::commit();
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
