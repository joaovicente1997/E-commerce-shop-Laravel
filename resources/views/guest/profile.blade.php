@extends('layouts.layout')

@section('content')
<div class="container">
	<font color="white">
	<form method="post" action="{{ route('guest.update', $user->id) }}" enctype="multipart/form-data">
          @method('PATCH')
          @csrf
          <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name" value="{{ $user->name }}"/>
          </div>
          <div class="form-group">
              <label for="email">Email :</label>
              <input type="email" min="0" class="form-control" name="email" value="{{ $user->email }}"/>
          </div>
          <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" name="password"/>
          </div>
          <div>
          @if($user->image)
            Old Image
            <br/>
            <img src="{{ url('img/users/' . $user->image) }}" width="200" height="200" />
          @endif
          </div>
          <br/>
          <div class="form-group">
              <input type="file" name="image" id="image">
          </div>
          <br/>
          <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </font>
  </div>
@endsection