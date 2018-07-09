<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home');
    }

    public function emailUpdate($id,Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        $email = new User();
        $email->find($id)->update($request->all());
        return redirect()->route('home');
    }
}
