<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'image',
        'product_code',
        'quantity',
        'is_type',
        'import_date',
        'view',
        'is_new',
    ];

    protected $casts = [
        'view' => 'boolean',
        'is_new' =>  'boolean',
        'is_type' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function product_gallery()
    {
        return $this->hasMany(Gallery::class, 'product_id');
    }
    
}