<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

class ProductController extends Controller
{
    private $product;
    private $totalPage = 8;

    public function __constructor(Product $product){
        $this->product = $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Produto::all();

        return view('produtos.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produtos.create');
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
            'price' =>'required|integer',
            'description' => 'required'
        ]);
        $image = $request->file('image');

        if($image != null){
            $input['imagename']= time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/products');
            $image->move($destinationPath, $input['imagename']);

            $name = $input['imagename'];
        }else{
            $name = null;
        }

        $product = new Produto([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'description' => $request->get('description'),
            'image' => $name
        ]);

        $product->save();

        return redirect('/products')->with('success', 'Product has been added');
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
        $product = Produto::find($id);

        return view('produtos.edit', compact('product'));
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
        $request->validate([
            'name'=>'required',
            'price'=> 'required|integer',
            'description' => 'required'
          ]);

        $image = $request->file('image');
        
        if($image != null){
            $input['imagename']= time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/products');
            $image->move($destinationPath, $input['imagename']);

            $name = $input['imagename'];
        }else{
            $name = null;
        }

          $product = Produto::find($id);
          $product->name = $request->get('name');
          $product->price = $request->get('price');
          $product->description = $request->get('description');
          $product->image = $name;

          $product->save();

          return redirect('/products')->with('success', 'Product has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Produto::find($id);
        $product->delete();

         return redirect('/products')->with('success', 'Product has been deleted Successfully');
    }
}
