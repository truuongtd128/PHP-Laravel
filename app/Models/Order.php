<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    const PENDING = 'pending';
    const PROCESSING = 'processing';
    const SHIPPED = 'shipped';
    const DELIVERED = 'delivered';
    const CANCELLED = 'cancelled';
    const COMPELETE = 'compelete';
    const PAID = 'paid';
    const UNPAID = 'unpaid';

    const STATUS = [
        'pending'    => 'pending',
        'processing' =>  'processing',
        'shipped'    => 'shipped',
        'delivered'  =>  'delivered',
        'cancelled'  =>  'cancelled' ,
        'compelete'  =>  'compelete',
    ];

    const PAYMENT = [
        'unpaid' => 'uppaid',
        'paid' => 'paid',
    ];

    protected $fillable = [
        'order_code',
        'user_id',
        'recipient_name',
        'recipient_email',
        'recipient_phone',
        'recipient_address',
        'note',
        'total_amount',
        'status', 
        'payment_status',
        'sub_total',
        'shipping_fee',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function order_detail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
