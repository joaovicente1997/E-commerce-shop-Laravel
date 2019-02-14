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
    Add Reservation
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
      <form method="post" action="{{ route('reservas.store') }}">
          <div class="form-group">
            @csrf
              <label for="user_id">User:</label>
              <select class="form-control input-sm" name="user_id">
                  @foreach($users as $user)
                      <option value="{{ $user->id }}">{{ $user->name }}</option>

                  @endforeach
              </select>
          </div>
          <div class="form-group">
              <label for="user_id">Product:</label>
              <select class="form-control input-sm" name="product_id">
                  @foreach($products as $product)
                      <option value="{{ $product->id }}" name="product_id">{{ $product->name }}</option>
                  @endforeach
              </select>
          </div>
          <div class="form-group">
              <input type="hidden" class="form-control" name="date_reserved" value=" {{$date}}"/>
          </div>
          
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection