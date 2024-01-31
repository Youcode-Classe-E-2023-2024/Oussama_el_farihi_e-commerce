<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request){
        $sort = $request->input('sort', 'created_at');

        $products = Product::orderBy($sort, 'asc')->paginate(6)->withPath('product');

        return view('products.index', ['products' => $products]);
    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request) {
        // dd($request);
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }
    
        $newProduct = Product::create($data);
    
        return redirect(route('product.index'));
    }

    public function edit(Product $product) {
        return view('products.edit', ['product' => $product]);
    }

    public function update(Product $product, Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        $product->update($data);

        return redirect(route('product.index'))->with('success', 'Product updated successfully');
    }

    public function delete(Product $product){
        $product->delete();
        return redirect(route('product.index'))->with('success', 'Product delete successfully');
    }

    public function show(Product $product) {
        return view('products.show', ['product' => $product]);
    }
    
    
}