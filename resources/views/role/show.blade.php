@extends('layouts.app')
@section('css')
@endsection
@section('content')
<div class="page-header">
	<h2>Roles</h2>
	</div>
<div class="row">
	<div class="col-sm-6">
		<div class="card">
			<div class="card-body">
		
		<table class="table table-condensed table-bordered">		
			<tbody>
				<tr><th>Name</th><td>{{$role->name}}</td></tr>
				<tr><th>Permissions</th><td>
					<ul style="list-style: none;">
			@foreach($permissions as $permission)
				<li>@if($role->hasPermissionTo($permission->name))
				<i class="fa fa-check"></i> {{$permission->name}}
				@else
				<i class="fa fa-times"></i> {{$permission->name}}
				@endif</li>
			@endforeach
			</ul>
				</td></tr>
				
			</tbody>
		</table>
		<form action="/role/{{$role->id}}" method="POST">
			@csrf
			@method('DELETE')
			<div class="btn-group">
				<a href="/role/{{$role->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
				@can('Delete')
				<button type="submit" class="btn btn-sm btn-danger">Delete</button>
				@endcan
				<a href="/role/" class="btn btn-sm btn-secondary">Back</a>
			</div>
		</form>

			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
@endsection