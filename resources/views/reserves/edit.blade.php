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
    Edit Reserve Status
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
      <form method="post" action="{{ route('reservas.update', $reserve->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="user_id">Status:</label>
            <select class="form-control input-sm" name="status" >
                <option value="reserved">Reserved</option>
                <option value="concluded">Concluded</option>
                <option value="paid">Paid</option>
                <option value="canceled">Canceled</option>
            </select>
            <br />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection

