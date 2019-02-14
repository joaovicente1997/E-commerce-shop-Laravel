@extends('layouts.master')

@section('content')
<div class="container">
	<br/>
	<div class="row justify-content-center">
		<img class ="center" src="./img/brimol.jpg" alt="no logo" width="200" height="200">
	</div>
	<br/>
	<div class="row justify-content-center">
		<div class="card">
			<div class="card-header justify-content-center">Home Page of Admin Interface of Brimol</div>

			<div class="card-body content-center">
				@if(session('status'))
					<div class="alert alert-success" role="alert">
						{{ session('status') }}
					</div>
				@endif
				You are logged in!
			</div>
		</div>
	</div>
</div>
@endsection