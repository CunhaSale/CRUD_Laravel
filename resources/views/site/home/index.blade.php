@extends('site.templates.default')

@section('content')

<a href="{{url('painel')}}"><h1>Click -> Ir para Home <- Click</h1></a>
{{$var1 or 'TesteVar'}}<hr>

@if ($linguagem == 'JavaScript')
	<p>{{$linguagem}}</p>
	@else
		<p>Não é uma linguagem de programação.</p>
@endif

<hr>

@for($i = 1; $i < 6; $i++)
	<p>{{$i}}</p>
@endfor

<hr>

{{--@if(count($cidades) > 0)
	@foreach($cidades as $cidade)
		<p>João já morou na cidade de {{$cidade}}</p>
	@endforeach
	@else
		<p>Não foi encontrado dados.</p>
@endif

<hr>--}}

@forelse($cidades as $cidade)
	<p>Maria já morou na cidade de {{$cidade}}</p>
	@empty
		<p>Não foi encontrado dados.</p>
@endforelse

<hr>

@include('site.includes.sidebar')


@endsection
@push('scripts')
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endpush