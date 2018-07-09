<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Usage;
use App\Order;

class ProductController extends Controller
{
    const PRODUCTS_LIMIT_INDEX_PAGE = 6;

    public function index()
    {

        $data = Usage::index();
        $products = Product::latest()->limit(self::PRODUCTS_LIMIT_INDEX_PAGE)->get();
        $data['products'] = $products;
        return view('front.index', $data);

    }

    public function viewProduct($id)
    {
        $data = Usage::index();
        $data['product'] = Product::find($id);


        return view('front.oneProduct', $data);
    }

    public function categoryProducts($id)
    {
        $data = Usage::index();
        $products = Product::where('category_id', $id)->get();
        $data['products'] = $products;
        $data['cat'] = Category::find($id);
        return view('front.category', $data);
    }

    public function adminProductList()
    {
        $data['products'] = Product::all();
        return view('admin.product.list',$data);
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(Request $request, Product $productModel)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|integer|min:1',
            'price' => 'required',
            'description' => 'required'
        ]);

        $productModel->create($request->all());
        return redirect()->route('home');
    }

    public function edit($id)
    {
        $data['product'] = Product::findOrFail($id);

        return view('admin.product.edit', $data);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|integer|min:1',
            'price' => 'required|integer',
            'description' => 'required'
        ]);
        Product::find($id)->update($request->all());
        return redirect()->route('home');
    }

    public function delete($id)
    {
        Product::destroy($id);
        return redirect()->route('home');
    }



}
