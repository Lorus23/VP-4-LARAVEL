<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public static function storeProduct($data)
    {
        $product = new Product();
        $product->name = $data['name'];
        $product->category_id = $data['category_id'];
        $product->description = $data['description'];
        $product->price = $data['price'];
        return $product->save();
    }
}
