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
            <a href="{{route('users.create')}}" class="btn btn-success">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Add a user
            </a>
      </div>
      <br />
      <table class="table">
        <thead>
            <tr>
              <td>Image</td>
              <td>Name</td>
              <td>Email</td>
              <td>Role</td>
              <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td><img src="{{ url('img/users/' . $user->image) }}" width="50" height="50" /></td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>@if($user->isAdmin ==0)
                      User
                    @else
                      Admin
                    @endif
                </td>
                <td><a href="{{ route('users.edit',$user->id)}}" class="btn btn-primary">Edit</a></td>
            </tr>
            @endforeach
        </tbody>
      </table>
    <div>
</div>
@endsection