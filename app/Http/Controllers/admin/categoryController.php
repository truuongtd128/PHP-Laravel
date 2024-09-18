<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::orderBy('id', 'desc')->paginate(10);

        return view('admins.categories.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        return view('admins.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriesRequest $request)
    {
        if($request->isMethod('POST')){
            $param = $request->except('_token');

            if($request->hasFile('thumbnail')){
                $filepath = $request->file('thumbnail')->store('uploads/categories','public');
            }else {
                $filepath =null;
            }
            $param['thumbnail'] = $filepath;
            Category::create($param);
            return redirect()->route('admins.categories.index')->with('success','Added category successfully');
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
        $data = 'helo';
        $category = Category::findOrFail($id);
        return view('admins.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->isMethod('PUT')){
            $param = $request->except('_token','_method');
            $category = Category::findOrFail($id);

            if($request->hasFile('thumbnail')){
                if($category->thumbnail && Storage::disk('public')->exists($category->thumbnail) ){
                    Storage::disk('public')->delete($category->thumbnail);
                }
                $filepath = $request->file('thumbnail')->store('uploads/categories','public');
            }else {
                $filepath =$category->thumbnail;
            }
            $param['thumbnail'] = $filepath;

            $category->update($param);

            return redirect()->route('admins.categories.index')->with('success','Updated category successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
    

        if($category->thumbnail && Storage::disk('public')->exists($category->thumbnail) ){
            Storage::disk('public')->delete($category->thumbnail);
        }
        return redirect()->route('admins.categories.index')->with('success','Delete category successfully');
    }
}
