<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Produto;
use App\Reserva;

class HomeController extends Controller
{
    private $userCount;
    private $productCount;
    private $reserveCount;
    private $lastProducts;
    private $lastUsers;
    private $lastReserves;

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
    public function dashboard()
    {
        $userCount = User::count();
        $productCount = Produto::count();
        $reserveCount = Reserva::count();
        $lastProducts = Produto::orderBy('id', 'desc')->take(4)->get();
        $lastReserves = Reserva::orderBy('id', 'desc')->take(6)->get();
        $lastUsers = User::orderBy('id', 'desc')->take(6)->get();

        return view('admin.dashboard', compact('userCount','productCount', 'reserveCount', 'lastUsers', 'lastReserves', 'lastProducts'));
    }

    public function index()
    {
        return view('admin.home');
    }

    public function welcome()
    {
        return view('welcome');
    }
}
