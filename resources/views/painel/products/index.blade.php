@extends('site.templates.painel')

@section('content')
	<h1>Listagem de Produtos</h1>

	<a href="{{route('produtos.create')}}" class="btn btn-dark btn-block" style="margin-bottom: 4px; font-weight: bold; letter-spacing: 1px;">Cadastrar</a>
	<table class="table" style="width: 100%; margin: 0 auto; border: 1px solid #d3d3d3;">
		<thead class="thead-dark">
			<tr>
				<th>Nome</th>
				<th>Descrição</th>
				<th></th>
			</tr>
		</thead>
		<tbody class="table-striped">
			@foreach($products as $product)
			<tr>
				<td>{{$product->name}}</td>
				<td style="width: 60%;">{{$product->description}}</td>
				<td>
					<a href="{{route('produtos.edit', $product->id)}}"><i class="material-icons" style="color: #191970; cursor: pointer;">mode_edit</i></a>
					<a href="{{route('produtos.show', $product->id)}}"><i class="material-icons" style="color: #8B0000; cursor: pointer;">find_in_page</i></i></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<hr>
	<div class="alert" style="margin: 0 auto; width: 180px;">
		{!! $products->links() !!}
	</div>
@endsection

@push('scripts')
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endpush