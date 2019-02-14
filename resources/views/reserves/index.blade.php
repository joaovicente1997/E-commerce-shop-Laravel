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
            <a href="{{route('reservas.create')}}" class="btn btn-success">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Make a reservation
            </a>
      </div>
      <br />
      <table class="table">
        <thead>
            <tr>
              <td>#id</td>
              <td>User</td>
              <td>Product</td>
              <td>Date</td>
              <td>Status</td>
              <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($reserves as $reserve)
            <tr>
                <td>{{$reserve->id}}</td>
                <td>{{$reserve->user->name}}</td>
                <td>{{$reserve->product->name}}</td>
                <td>{{$reserve->date_reserved}}</td>
                <td>{{$reserve->status}}</td>
                <td><a href="{{ route('reservas.edit',$reserve->id)}}" class="btn btn-primary">Edit</a></td>
            </tr>
            @endforeach
        </tbody>
      </table>
    <div>
</div>
@endsection