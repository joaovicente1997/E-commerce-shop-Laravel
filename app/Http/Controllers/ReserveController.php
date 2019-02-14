<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reserva;
use App\User;
use App\Produto;
use Carbon;

class ReserveController extends Controller
{
    private $reserve;

    public function __constructor(Reserva $reserve){
        $this->reserve = $reserve;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $reserves = Reserva::all();
        $users = User::all();
        $products = Produto::all();

        return view('reserves.index', compact('reserves', 'users', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $products = Produto::all();

        $date = Carbon\Carbon::today()->format('Y-m-d');

        //$status = $this->reserve->status();

        return view('reserves.create', compact('users','products', 'date'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'user_id' => 'required|integer',
            'product_id' =>'required|integer',
            'date_reserved' => 'required'
        ]);

        $reserve = new Reserva([
            'user_id' => $request->get('user_id'),
            'product_id' => $request->get('product_id'),
            'date_reserved' => $request->get('date_reserved')
        ]);

        $reserve->save();

        return redirect('/reservas')->with('success', 'Reserve has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reserve = Reserva::all()->find($id);
        if(! $reserve)
            return redirect()->back();

        $user = $reserve->user;
        $product = $reserve->product;
        $status = $reserve->status;

        return view('reserves.edit', compact('reserve','user', 'product', 'status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reserve = Reserva::all()->find($id);
        $reserve->status = $request->get('status');
        $reserve->save();

          return redirect('/reservas')->with('success', 'Product has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
