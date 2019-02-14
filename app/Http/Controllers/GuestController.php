<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Cart;
use Session;
use Auth;
use App\Produto;
use App\User;

class GuestController extends Controller
{
    private $user;
    public function welcome()
    {
        return view('welcome');
    }
    public function about(){
    	return view('guest.about');
    }

    public function contact(){
    	return view('guest.contact');
    }

    public function storeContact(Request $request){
    	$this->validate($request, [
    		'name' => 'required',
    		'email' => 'required|email',
    		'message' => 'required'
    	]);

    	$data = array(
    		'name' => $request->input('name'),
    		'email' => $request->input('email'),
    		'content' => $request->input('message')
    	);
    	//dd($data);

    	Mail::send('guest.contact-message', $data, function($msg) use($data){
    		$msg->from($data['email']);
    		$msg->to('joaopedrovicente1997@gmail.com');
    		$msg->subject('Mensagem Site');
    	});


    	return redirect()->back()->with('flash_message', 'Thank you for your message.');
    }

    public function getProducts(){
    	$products = Produto::all();
    	return view('guest.products', compact('products'));
    }

    public function showProduct($id){
        $product = Produto::findOrFail($id);

        return view('guest.showproducts', compact('product'));
    }

    public function getAddToCart(Request $request, $id)
    {
        $product = Produto::findOrFail($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        //dd($oldCart);
        if($oldCart == null){
            $oldCart = new Cart($oldCart);
        }
        
        $oldCart->add($product, $product->id);
        //dd($oldCart);
        $request->session()->put('cart', $oldCart);

        return redirect()->route('guest.products');
    }

    public function getCart(){
        if(!Session::has('cart')){
            return view('guest.shoppingCart', ['products'=>null]);
        }
        $oldCart = Session::get('cart');
        return view('guest.shoppingCart', ['products' => $oldCart->items, 'totalPrice' => $oldCart->totalPrice]);
    }

    public function profile(){
        $user = Auth::user();

        return view('guest.profile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::user();

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

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->image = $name;

        $user->save();

          return redirect('/profile')->with('success', 'User has been updated');
    }

}
