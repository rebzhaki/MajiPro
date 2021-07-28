@extends('layouts.app')
@section('css')
@endsection
@section('content')
<div class="page-header">
	
	<div class="row">
	<div class="col-9">
	<h2>user</h2>
	</div>
		<div class="col">
		<a href="/user/create" role="button" class="btn btn-success"><i class="fas fa-plus"></i> add user</a>
	</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<table class="table table-condensed table-bordered">
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Phone Number</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
				<tr>
					<td>{{$user->name}}</td>
					<td>{{$user->email}}</td>
					<td>{{$user->phone}}</td>
					<td><a href="/user/{{$user->id}}" class="btn btn-sm btn-info">View</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection
@section('scripts')
@endsection