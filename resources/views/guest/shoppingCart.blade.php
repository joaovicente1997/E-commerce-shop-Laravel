@extends('layouts.layout')

@section('content')
	@if(Session::has('cart'))
		<div class="row">
			<div class="">
				<ul class="list-group">
					@foreach($products as $product)
						<li class="list-group-item">
							<span class="badge">{{ $product['qty'] }}</span>
							<strong>{{ $product['product']['name'] }}</strong>
							<span class="label label-success">{{ $product['price'] }}</span>
							<img src="/img/products/{{ $product['product']['image']}}" widht="100" height="100">
							<div class="btn-group">
								<button class="btn btn-primary btn-xs dropdown-toogle" data-toogle="dropdown">Action <span class="caret"></span></button>
								<ul class="dropdown-menu">
									<li><a href="#">Reduce by 1</a></li>
									<li><a href="#">Reduce all</a></li>
								</ul>
							</div>
						</li>
					@endforeach
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
				<strong>Total: {{ $totalPrice }}</strong>
			</div>			
		</div>
		<hr>
		<div class="row">
			<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
				<button type="button" class="btn btn-success">Checkout</button>
			</div>			
		</div>
	@else
		<div class="row">
			<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
				<h2>No items in Cart!</h2>
			</div>			
		</div>
	@endif
@endsection