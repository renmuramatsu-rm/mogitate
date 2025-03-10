<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Season;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index(Request $request)

    {
        $sort = $request->input('sort', 'asc');

        $products = Product::orderBy('price', $sort)->Paginate(6);

        return view('index', compact('products', 'sort'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $products = Product::keywordSearch($keyword)->paginate(6);

        return view('index', compact('products', 'keyword'));
    }

    public function show($product_id)
    {
        $product = Product::find($product_id);

        return view('show', compact('product'));
    }
    public function update(ProductRequest $request)
    {
        $productData = $request->only(['name','price','description']);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $productData['image'] = $path;
        }
        $product = Product::findOrFail($request->id);$product->update($productData);

        $selectedSeasons = $request->input('season', []); 
        $seasonIds = Season::whereIn('name', (array) $selectedSeasons)->pluck('id')->toArray();
        $product->seasons()->sync($seasonIds);

        
        return redirect('/products');
    }

    public function destroy(ProductRequest $request)
    {
        Product::find($request->id)->delete();
        return redirect('/products');
    }
}
