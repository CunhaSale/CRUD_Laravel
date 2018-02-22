@extends('site.templates.painel')

@section('content')
	<h1>{{$title or 'Dados do Produto'}}</h1>
	<div style="width: 100%; float: left; margin-bottom: 2px;">
		<a href="{{route('produtos.index')}}" class="btn btn-block btn-dark" style="width: 50%; font-weight: bold;
		letter-spacing: 1px; float: left; margin-top: 8px;"><i class="material-icons" style="margin-right: 4px;">keyboard_backspace</i>Voltar</a>

		<a href="{{route('produtos.delete', $product->id)}}" class="btn btn-block btn-danger" style="width: 50%;  font-weight: bold;
		letter-spacing: 1px; float: right;"><i class="material-icons" style="margin-right: 4px;">delete</i>Excluir</a>
	</div>

	<table class="table table-striped" style="border: 1px solid #d3d3d3;">
		<tbody>
			<tr>
				<td>Ativo</td>
				<td>{{$product->active}}</td>
			</tr>
			<tr>
				<td>Número</td>
				<td>{{$product->number}}</td>
			</tr>
			<tr>
				<td>Categoria</td>
				<td>{{$product->category}}</td>
			</tr>
			<tr>
				<td>Descrição</td>
				<td>{{$product->description}}</td>			
			</tr>
		</tbody>
	</table>
	<hr>
	@if( isset($errors) && count($errors) > 0)
		<div class="alert alert-danger">
			@foreach($errors->all() as $error)
				<p>{{$error}}</p>
			@endforeach
		</div>
	@endif
@endsection

@push('scripts')
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endpush