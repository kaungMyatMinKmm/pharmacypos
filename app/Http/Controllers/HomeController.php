<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use App\User;
use App\Sale;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $stocks = Stock::all();
        $users = User::all();
        $sales = Sale::all();

        return view('home', compact('stocks','users', 'sales')); 
    }


}
