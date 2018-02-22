@extends('site.templates.painel')

@section('content')
	<h1>{{$title or 'Cadastrar Produto'}}</h1>
	@if( isset($errors) && count($errors) > 0)
		<div class="alert alert-danger">
			@foreach($errors->all() as $error)
				<p>{{$error}}</p>
			@endforeach
		</div>
	@endif
	<a href="{{url('/painel/produtos')}}" class="btn btn-block btn-danger" style="margin-bottom: 2px; font-weight: bold; letter-spacing: 1px;"><i class="material-icons" style="margin-right: 4px;">keyboard_backspace</i>Voltar</a>
	@if(isset($product))
		<form class="form" method="post" action="{{route('produtos.update', $product->id)}}">
			{!! method_field('PUT') !!}
	@else
		<form class="form" method="post" action="{{route('produtos.store')}}">
	@endif
		{!! csrf_field() !!}
		<input type="text" name="name" placeholder="Nome do produto" class="form-control" value="{{$product->name or old('name')}}" required>
		<input type="text" name="number" placeholder="Número do produto" class="form-control" style="margin: 2px 0;" value="{{$product->number or old('number')}}" required>
		<select name="category" class="form-control" style="margin: 2px 0;">
			<option >Escolha a categoria</option>
			@foreach($categorys as $category)
				<option value="{{$category}}"
				@if (isset($product) && $product->category == $category)
					selected
				@endif
				>{{$category}}</option>
			@endforeach
		</select>
		<div class="form-check form-control" style="text-align: left; padding-left: 36px;">
			<input type="checkbox" name="active" value="1" class="form-check-input" @if (isset($product) && $product->active == '1') checked @endif>
			<label class="form-check-label">Produto ativo</label>
		</div>
		<textarea rows="3" name="description" placeholder="Descrição do produto" class="form-control" style="margin: 2px 0;" required>{{$product->description or old('description')}}</textarea>
		@if(isset($product))
			<button class="btn btn-dark btn-block" style="font-weight: bold; letter-spacing: 1px;">Atualizar</button>
		@else
			<button class="btn btn-dark btn-block" style="font-weight: bold; letter-spacing: 1px;">Cadastrar</button>
		@endif
	</form>
@endsection

@push('scripts')
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endpush