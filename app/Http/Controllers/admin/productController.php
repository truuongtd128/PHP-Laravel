<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::orderBy('id', 'desc')->paginate(7);

        return view('admins.products.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::query()->get();

        return view('admins.products.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(ProductRequest $request)
    {
        // dd(12312312);

        if ($request->isMethod('POST')) {
            $param = $request->except('_token');

            $param['is_new'] = $request->has('is_new') ? 1 : 0;




            if ($request->hasFile('image')) {
                $param['image'] = $request->file('image')->store('uploads/products', 'public');
            } else {
                $param['image'] = null;
            }

            $product = Product::query()->create($param);
            $producID = $product->id;

            if ($request->hasFile('list_image')) {
                foreach ($request->file('list_image') as $thumbnail) {
                    if ($thumbnail) {
                        $path = $thumbnail->store('uploads/productsthumbnail/id_' . $producID, 'public');
                        $product->product_gallery()->create([
                            'product_id' => $producID,
                            'thumbnail' => $path,
                        ]);
                    }
                }
            }
            return redirect()->route('admins.products.index')->with('success', 'Add product success !');
        }
    }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $listCate = Category::query()->get();
        $listPro = Product::query()->findOrFail($id);
        return view('admins.products.edit', compact('listCate', 'listPro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

       
        if ($request->isMethod('PUT')) {
            $param = $request->except('_token', '_method');
            $param['is_new'] = $request->has('is_new') ? 1 : 0;
    
            $product = Product::findOrFail($id);
    
            // Xử lý hình ảnh chính của sản phẩm
            if ($request->hasFile('image')) {
                if ($product->image && Storage::disk('public')->exists($product->image)) {
                    Storage::disk('public')->delete($product->image);
                }
                $param['image'] = $request->file('image')->store('uploads/products', 'public');
            } else {
                $param['image'] = $product->image;
            }
    
            // Xử lý danh sách ảnh
            if ($request->hasFile('list_image')) {
                $currentImageIds = $product->product_gallery->pluck('id')->toArray();
    
                // Xóa ảnh không còn trong danh sách
                foreach ($currentImageIds as $id) {
                    if (!array_key_exists($id, $request->file('list_image', []))) {
                        $product_gallery = Gallery::find($id);
                        if ($product_gallery && Storage::disk('public')->exists($product_gallery->thumbnail)) {
                            Storage::disk('public')->delete($product_gallery->thumbnail);
                            $product_gallery->delete();
                        }
                    }
                }
    
                // Thêm hoặc cập nhật ảnh
                foreach ($request->file('list_image') as $key => $thumbnail) {
                    if ($thumbnail->isValid()) {
                        if (!in_array($key, $currentImageIds)) {
                            // Thêm ảnh mới
                            $path = $thumbnail->store('uploads/productsthumbnail/id_' . $id, 'public');
                            $product->product_gallery()->create([
                                'product_id' => $id,
                                'thumbnail' => $path,
                            ]);
                        } else {
                            // Cập nhật ảnh hiện tại
                            $product_gallery = Gallery::find($key);
                            if ($product_gallery && Storage::disk('public')->exists($product_gallery->thumbnail)) {
                                Storage::disk('public')->delete($product_gallery->thumbnail);
                            }
                            $path = $thumbnail->store('uploads/productsthumbnail/id_' . $id, 'public');
                            $product_gallery->update([
                                'thumbnail' => $path,
                            ]);
                        }
                    }
                }
            }
    
            $product->update($param);
    
            return redirect()->route('admins.products.index')->with('success', 'Update product success!');
        }
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        if ($product->thumbnail && Storage::disk('public')->exists($product->thumbnail)) {
            Storage::disk('public')->delete($product->thumbnail);
        }
        $path = 'uploads/productsthumbnail/id_' . $id;
        $product->product_gallery()->delete();
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->deleteDirectory($path);
        }
        $product->delete();
        return redirect()->route('admins.products.index')->with('success', 'Delete product success !');
    }
}
