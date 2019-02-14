@extends('layouts.master')

@section('content')
<style>
  .uper {
    margin: 40px auto;
    width: 700px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Product
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" name="name" value={{ $product->name }} />
        </div>
        <div class="form-group">
          <label for="price">Price :</label>
          <input type="number" min="0" class="form-control" name="price" value={{ $product->price }} />
        </div>
        <div class="form-group">
          <label for="description">Description:</label>
          <input type="textarea" class="form-control" name="description" value={{ $product->description }} />
        </div>
        <div>
          @if($product->image)
            Old Image
            <br/>
            <img src="{{ url('img/products/' . $product->image) }}" width="200" height="200" />
          @endif
        </div>
        <br/>
        <div class="form-group">
            <input type="file" name="image" id="image">
        </div>
        <br/>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection