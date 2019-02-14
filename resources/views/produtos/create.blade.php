@extends('layouts.master')

@section('content')
@csrf
<style>
  .uper {
    margin: 40px auto;
    width: 700px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Product
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
      <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
          <div class="form-group">
              @csrf
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="price">Price :</label>
              <input type="number" min="0" class="form-control" name="price"/>
          </div>
          <div class="form-group">
              <label for="description">Description:</label>
              <input type="textarea" class="form-control" name="description"/>
          </div>
          <div>
              <input type="file" name="image" id="image">
          </div>
          <br/>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection