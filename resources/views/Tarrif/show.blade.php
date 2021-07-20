@extends('layouts.app')
@section('css')
@endsection
@section('content')
<div class="page-header">
	<h2>Tarrif</h2>
</div>
<div class="row">
	<div class="col-sm-6">
		<table class="table table-condensed table-bordered">		
			<tbody>
				<tr><th>Name</th><td>{{$tarrif->name}}</td></tr>
				<tr><th>Description</th><td>{{$tarrif->description}}</td></tr>
				<tr><th>Price</th><td>{{$tarrif->price}}</td></tr>
			</tbody>
		</table>
		<a href="/tarrif/{{$tarrif->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
		<form action="/tarrif/{{$tarrif->id}}" method="POST">
			@csrf
			@method('DELETE')
			<button type="submit" class="btn btn-sm btn-danger">Delete</button>
		</form>
	</div>
</div>
@endsection
@section('scripts')
@endsection