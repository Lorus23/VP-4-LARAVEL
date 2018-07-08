<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function adminCategoryList()
    {
        $data['categories'] = Category::all();
        return view('admin.category.list', $data);
    }

    public function createProduct()
    {
        return view('admin.category.create');
    }

    public function store(Request $request, Category $categoryModel)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        $categoryModel->create($request->all());
        return redirect()->route('home');
    }

    public function edit($id)
    {
        $data['category'] = Category::findOrFail($id);
        return view('admin.category.edit', $data);
    }

    public function update($id, Request $request)
    {
        $request->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        Category::find($id)->update($request->all());
        return redirect()->route('home');
    }

    public function delete($id)
    {
        Category::destroy($id);
        return redirect()->route('home');
    }

}
