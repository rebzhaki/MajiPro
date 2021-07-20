@extends('layouts.app')
@section('css')
@endsection
@section('content')
<div class="row">
	<div class="col-sm-6">
		<table class="table table-condensed table-bordered">		
			<tbody>
				<tr><th>Name</th><td>{{$role->name}}</td></tr>
				<tr><th>Description</th><td>{{$role->description}}</td></tr>
				
			</tbody>
		</table>
		<form action="/role/{{$role->id}}" method="POST">
			@csrf
			@method('DELETE')
			<div class="btn-group">
				<a href="/role/{{$role->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
				<button type="submit" class="btn btn-sm btn-danger">Delete</button>
			</div>
		</form>
	</div>
</div>
@endsection
@section('scripts')
@endsection