<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $table = 'product_galleries';
    protected $fillable = [
        'product_id',
        'thumbnail'
    ];

    protected $casts = [];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
