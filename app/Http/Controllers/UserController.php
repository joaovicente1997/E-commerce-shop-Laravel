<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    private $user;

    public function __constructor(User $user){
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
            'name' => 'required',
            'email' =>'required',
            'password' => 'required'
        ]);

        $image = $request->file('image');

        if($image != null){
            $input['imagename']= time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/users');
            $image->move($destinationPath, $input['imagename']);

            $name = $input['imagename'];
        }else{
            $name = null;
        }

        if($request->get('isAdmin') ==1)
            $option = 1;
        else
            $option = 0;

        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'isAdmin' => $option,
            'image' => $name
        ]);

        $user->save();

        return redirect('/users')->with('success', 'User has been added');
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
        $user = User::find($id);

        return view('users.edit', compact('user'));
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
        $user = User::all()->find($id);

        request()->validate([
            'name' => 'required',
            'email' =>'required',
            'password' => 'required'
        ]);

        $image = $request->file('image');

        if($image != null){
            $input['imagename']= time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/users');
            $image->move($destinationPath, $input['imagename']);

            $name = $input['imagename'];
        }else{
            $name = null;
        }

        if($request->get('isAdmin') ==1)
            $option = 1;
        else
            $option = 0;

        $user->isAdmin = $option;
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->image = $name;

        $user->save();

          return redirect('/users')->with('success', 'User has been updated');
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
