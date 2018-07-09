<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Auth;
use App\Http\Usage;
use Swift_SmtpTransport;
use Swift_Mailer;
use Swift_Message;


class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Usage::index();
        $orders = new Order();
        $data['orders'] = $orders->where('user_id', Auth::user()->id);
        return view('front.order', $data);

    }

    public function orderList()
    {
        $data['orders'] = Order::all();
        return view('admin.order.list', $data);
    }


    public function orderCheckout()
    {
        if ($this->saveOrder()) {
            //отправка сообщения
            $name = Auth::user()->name;
            $admin = User::where('role', 'admin')->first();
            $adminEmail = $admin->email;
            $adminName = $admin->name;

            $transport = (new Swift_SmtpTransport('smtp.mail.ru', '587', 'tls'))
                ->setUsername('email')
                ->setPassword('password');
            $mailer = new Swift_Mailer($transport);
            $message = (new Swift_Message('Новый заказ'))
                ->setFrom(['email' => 'name'])
                ->setTo([$adminEmail => $adminName])
                ->setBody("Поступил новый заказ. Посмотрите свежие заказы в таблицу 'Заказы'");
            $mailer->send($message);
        }
        return redirect()->route('home');

    }

    public function saveOrder()
    {
        $order = new Order();
        $order->user_name = Auth::user()->name;
        $order->user_id = Auth::user()->id;
        $order->products = json_encode($_SESSION['products']);
        return $order->save();
    }

}