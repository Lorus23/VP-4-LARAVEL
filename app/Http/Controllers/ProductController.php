<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $data['products'] = $products;
        $categories = Category::all();
        $data['categories'] = $categories;

        return view('index', $data);

    }

    public function createProduct()
    {

        return view('createProduct');
    }

    public function viewProduct($id)
    {
        $data['product'] = Product::find($id);
        $categories = Category::all();
        $data['categories'] = $categories;
        return view('1product', $data);
    }

    public function store($product)
    {
        $this->validate($product, [
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);
        return view('createProduct');
//        return redirect()->route('index');
    }

    public function categoryProducts($id)
    {
        $products = Product::where('id',$id)->get();
        $data['products'] = $products;
        $categories = Category::all();
        $data['categories'] = $categories;

        return view('category', $data);
    }
}
