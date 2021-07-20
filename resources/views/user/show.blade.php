@extends('layouts.app')
@section('css')
@endsection
@section('content')
<div class="row">
	<div class="col-sm-6">
		
		<table class="table table-condensed table-bordered">		
			<tbody>
				<tr><th>Name</th><td>{{$user->name}}</td></tr>
				<tr><th>Email</th><td>{{$user->email}}</td></tr>
				<tr><th>Phone</th><td>{{$user->phone}}</td></tr>
				<tr><th>Role</th><td>{{$user->role_id}}</td></tr>

			</tbody>
		</table>
		<a href="/user/{{$user->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
		<form action="/user/{{$user->id}}" method="POST">
			@csrf
			@method('DELETE')
			<button type="submit" class="btn btn-sm btn-danger">Delete</button>
		</form>
	</div>
</div>
@endsection
@section('scripts')
@endsection