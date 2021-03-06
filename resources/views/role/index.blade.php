@extends('layouts.app')
@section('css')
@endsection
@section('content')

<div class="page-header">
		<div class="row">
	<div class="col-9">
	<h2>Roles</h2>
	</div>
		<div class="col">
		<a href="/role/create" role="button" class="btn btn-success"><i class="fas fa-plus"></i> add role</a>
	</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<table class="table table-condensed table-bordered">
			<thead>
				<tr>
					<th>Name</th>
								
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($roles as $role)
				<tr>
					<td>{{$role->name}}</td>
									
					<td><a href="/role/{{$role->id}}" class="btn btn-sm btn-info">View</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection
@section('scripts')
@endsection