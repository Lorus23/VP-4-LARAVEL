<?php
/**
 * Created by PhpStorm.
 * User: saatbazarkanov
 * Date: 09.07.2018
 * Time: 2:07
 */

namespace App\Http;
use App\Category;
use App\Product;
use App\News;


class Usage
{
    const NEWS_LIMIT = 3;

    public static function index()
    {
        $categories = Category::all();
        $data['categories'] = $categories;
        $news = News::latest()->limit(self::NEWS_LIMIT)->get();
        $data['news'] = $news;
        $randomProduct = new Product;
        $random = $randomProduct->inRandomOrder()->first();
        $data['random'] = $random;
        return $data;
    }

}