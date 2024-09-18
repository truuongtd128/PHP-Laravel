<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductHomeController extends Controller
{
    public function detailProdcut(string $id) {
        $product = Product::query()->findOrFail($id);
        $listPro = Product::query()->get();

        return view('clients.products.detailProduct',compact('product','listPro'));
    }

    public function productHome() {
        
        $category = Category::query()->get();
        $products = Product::query()->get();
        return view('homepro',compact('category','products'));
    }

}   
