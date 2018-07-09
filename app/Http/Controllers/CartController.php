<?php
/**
 * Created by PhpStorm.
 * User: Sayat
 * Date: 009 09.07.18
 * Time: 13:08
 */

namespace App\Http\Controllers;

use App\Http\Cart;
use App\Product;
use App\Http\Usage;


class CartController
{
    public function actionAdd($id)
    {
        // Добавляем товар в корзину
        Cart::addProduct($id);
        // Возвращаем пользователя на страницу с которой он пришел
        return redirect()->back();
    }

    public function actionDelete($id)
    {
        // Удаляем заданный товар из корзины
        Cart::deleteProduct($id);

        // Возвращаем пользователя в корзину
        header("Location: /cart");
    }

    public function index()
    {
        $data = Usage::index();

        // Получим идентификаторы и количество товаров в корзине
        $productsInCart = Cart::getProducts();

        if ($productsInCart) {
            // Если в корзине есть товары, получаем полную информацию о товарах для списка
            // Получаем массив только с идентификаторами товаров
            $productsIds = array_keys($productsInCart);

            // Получаем массив с полной информацией о необходимых товарах
                $data['products'] = Product::whereRaw('id',$productsIds)->get();


            // Получаем общую стоимость товаров
            $data['totalPrice'] = Cart::getTotalPrice($data['products']);

        }
        return view('front.cart', $data);


    }


}