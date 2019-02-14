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
    Update User
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
      <form method="post" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
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
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="isAdmin" value="1">
            <label class="form-check-label" for="isAdmin">
                Admin?
            </label>
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
  </div>
</div>
@endsection