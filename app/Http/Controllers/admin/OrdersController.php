<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listOrder = Order::orderBy('id', 'desc')->paginate(10);
        $statusOrder = Order::STATUS;
        $type_cancel = Order::CANCELLED;

        // dd($statusOrder);

        return view('admins.orders.index', compact('listOrder', 'statusOrder','type_cancel'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::query()->findOrFail($id);
        $statusOrder = Order::STATUS;
        $statusPayment = Order::PAYMENT;

        return view('admins.orders.show', compact('order','statusOrder','statusPayment'));
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

  
    public function update(Request $request, string $id)
    {
        $order = Order::findOrFail($id);
        $currentStatus = $order->status;
        $newStatus = $request->input('status');

        $statusKeys = array_keys(Order::STATUS);

        if ($currentStatus === Order::CANCELLED) {
            return redirect()->route('admins.orders.index')->with('error', 'The order has been cancelled!');
        }

        $currentStatusIndex = array_search($currentStatus, $statusKeys);
        $newStatusIndex = array_search($newStatus, $statusKeys);

        if ($currentStatusIndex === false || $newStatusIndex === false) {
            return redirect()->route('admins.orders.index')->with('error', 'Invalid status!');
        }

        if ($newStatusIndex < $currentStatusIndex) {
            return redirect()->route('admins.orders.index')->with('error', 'Duplicate status!');
        }

        $order->status = $newStatus;
        $order->save();

        return redirect()->route('admins.orders.index')->with('success', 'Updated status successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        if($order &&   $order->order_detail() == Order::CANCELLED ) {
            $order->order_detail()->delete();
            $order->delete();

            return redirect()->back()->with('success', 'Delete order successfully!');
        }


    }
}
