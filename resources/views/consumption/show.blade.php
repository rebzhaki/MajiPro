@extends('layouts.app')
@section('css')
@endsection
@section('content')

<div class="page-header">
	<h2>Consumption</h2>
</div>
<div class="row">
	<div class="col-sm-6">
		<table class="table table-condensed table-bordered">		
			<tbody>
				<tr><th>Name</th><td>{{$consumption->name}}</td></tr>
				<tr><th>Consumption</th><td>{{$consumption->consumption}}</td></tr>
				<tr><th>Date</th><td>{{$consumption->date}}</td></tr>
			</tbody>
		</table>
		<a href="/consumption/{{$consumption->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
		<form action="/consumption/{{$consumption->id}}" method="POST">
			@csrf
			@method('DELETE')
			<button type="submit" class="btn btn-sm btn-danger">Delete</button>
		</form>
	</div>
</div>
@endsection
@section('scripts')
@endsection