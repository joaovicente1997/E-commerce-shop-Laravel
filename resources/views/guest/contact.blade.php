@extends('layouts.layout')

@section('content')
<br/>
	<div class="container" align="left">
		@if(Session::has('flash_message'))
			<div class="alert alert-success">{{ Session::get('flash_message') }}</div>
		@endif
		<form method="post" action="{{ route('contact.store') }}">
			@csrf
			<div class="form-group">
				<font color="white">Nome Completo:</font>
				<input type="text" class="form-control" name="name">
				@if ($errors->has('name'))
				<small class="form-text invalid-feedback">{{ $errors->first('name') }}</small>
				@endif
			</div>
			<div class="form-group">
				<font color="white">Email:</font>
				<input type="text" class="form-control" name="email">
				@if ($errors->has('email'))
				<small class="form-text invalid-feedback">{{ $errors->first('email') }}</small>
				@endif
			</div>
			<div class="form-group">
				<font color="white">Mensagem:</font>
				<textarea name="message" class="form-control" cols="50" rows="5"></textarea>
				@if ($errors->has('message'))
				<small class="form-text invalid-feedback">{{ $errors->first('message') }}</small>
				@endif
			</div>

			<button class="btn btn-primary">Submit</button>
		</form>

		<br/>

	</div>
@endsection