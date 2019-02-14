@extends('layouts.master')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="container">
    <div class="uper">
      @if(session()->get('success'))
        <div class="alert alert-success">
          {{ session()->get('success') }}  
        </div><br />
      @endif
      <div class="class-btn-insert">
            <a href="{{route('products.create')}}" class="btn btn-success">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Add a product
            </a>
      </div>
      <br />
      <table class="table">
        <thead>
            <tr>
              <td>Image</td>
              <td>Name</td>
              <td>Price</td>
              <td>Description</td>
              <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td><img src="{{ url('img/products/' . $product->image) }}" width="50" height="50" /></td>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->description}}</td>
                <td><a href="{{ route('products.edit',$product->id)}}" class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="{{ route('products.destroy', $product->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    <div>
</div>
@endsection