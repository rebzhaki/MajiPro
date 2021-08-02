@extends('layouts.app')
@section('css')
@endsection
@section('content')

<div class="page-header">
	<h2>Consumption</h2>
</div>
<div class="row">
	<div class="col-sm-6">
		<div class="card">
			<div class="card-body">
		
		<table class="table table-condensed table-bordered">		
			<tbody>
				<tr><th>Name</th><td>{{$consumption->customer->name}}</td></tr>
				<tr><th>Consumption</th><td>{{$consumption->consumption}}</td></tr>
				<tr><th>Date</th><td>{{$consumption->date}}</td></tr>
			</tbody>
		</table>		
		<form action="/consumption/{{$consumption->id}}" method="POST">
			@csrf
			@method('DELETE')

			<div class="btn-group">
			<a href="/consumption/{{$consumption->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
			<button type="submit" class="btn btn-sm btn-danger">Delete</button>
			</div>
		</form>
	</div>
	</div>
	</div>
</div>
@endsection
@section('scripts')
@endsection