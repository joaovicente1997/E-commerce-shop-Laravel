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
    Add User
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
      <form method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">
          <div class="form-group">
              @csrf
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="email">Email :</label>
              <input type="email" min="0" class="form-control" name="email"/>
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
          <br/>
          <div>
              <input type="file" name="image" id="image">
          </div>
          <br/>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection