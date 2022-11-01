<?php

namespace App\Http\Controllers;

use App\Models\Product as Product;
use App\Http\Resources\Product as ProductResource;
use Illuminate\Http\Request;

class ProductController extends Controller
{
 
    public function index()
    {
        $products = Product::paginate(15);
        return ProductResource::collection($products);
    }

    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->input('name');
        $product->code_bar = $request->input('code_bar');
        $product->description = $request->input('description');
        $product->photo = $request->input('photo');
        $product->quantity = $request->input('quantity');

        if($product->save()) {
            return new ProductResource($product);
        }
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return new ProductResource($product);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($request->id);
        $product->name = is_null($request->name) ? $product->name : $request->name;
        $product->code_bar = is_null($request->code_bar) ? $product->code_bar : $request->code_bar;
        $product->description = is_null($request->description) ? $product->description : $request->description;
        $product->photo = is_null($request->photo) ? $product->photo : $request->photo;
        $product->quantity = is_null($request->quantity) ? $product->quantity : $request->quantity;
    
        if($product->save()){
          return new ProductResource($product);
        }    
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if($product->delete()) {
            return new ProductResource($product);
        }
    }
}
