@extends('layouts.layout')

@section('content')
	<div class="col-sm-3">
		<div class="card" style="width: 30rem;">
			<div class="card-body">
				<img src="{{ url('img/products/' . $product->image) }}" width="400" height="400" alt="">
				<br/>
				<br/>
				<h3>
					<b class="card-title">{{$product->name}}</b>
				</h3>
				<h4 class="card-subtitle mb-2 text-muted">Preço: {{$product->price}}€</h4>
				<p class="card-text">Descrição: {{$product->description}}</p>
				<button class="btn btn-primary">Adicionar ao Carrinho</button>
			</div>
		</div>
		<br/><br/>
	</div>
@endsection