@extends('layouts.app')
@section('css')
@endsection
@section('content')
<div class="page-header">
	<h2>User</h2>
</div>
<div class="row">
	<div class="col-sm-6">
		
		<table class="table table-condensed table-bordered">		
			<tbody>
				<tr><th>Name</th><td>{{$user->name}}</td></tr>
				<tr><th>Email</th><td>{{$user->email}}</td></tr>
				<tr><th>Phone</th><td>{{$user->phone}}</td></tr>
				<tr><th>Role</th><td>{{$user->role->name}}</td></tr>
				<tr><th>Permissions</th><td>
					<ul style="list-style: none;">
			@foreach($permissions as $permission)
				<li>@if($user->hasPermissionTo($permission->name))
				<i class="fa fa-check"></i> {{$permission->name}}
				@else
				<i class="fa fa-times"></i> {{$permission->name}}
				@endif</li>
			@endforeach
			</ul>
				</td></tr>

			</tbody>
		</table>
		
		<form action="/user/{{$user->id}}" method="POST">
			@csrf
			@method('DELETE')
			<div class="btn-group">
				<a href="/user/{{$user->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
				<button type="submit" class="btn btn-sm btn-danger">Delete</button>
				<a href="/user/" class="btn btn-sm btn-secondary">Back</a>
			</div>
		</form>
	</div>
</div>
@endsection
@section('scripts')
@endsection