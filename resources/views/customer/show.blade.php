@extends('layouts.app')
@section('css')
@endsection
@section('content')
<div class="page-header">
	<h2>Customer</h2>
</div>
<div class="row">
	<div class="col-sm-6">
		<table class="table table-condensed table-bordered">		
			<tbody>
				<tr><th>First Name</th><td>{{$customer->first_name}}</td></tr>
				<tr><th>Middle Name</th><td>{{$customer->middle_name}}</td></tr>
				<tr><th>Last Name</th><td>{{$customer->last_name}}</td></tr>
				<tr><th>ID Type</th><td>{{$customer->ID_type}}</td></tr>
				<tr><th>ID Number</th><td>{{$customer->ID_number}}</td></tr>
				<tr><th>LR Number</th><td>{{$customer->LR_number}}</td></tr>
				<tr><th>Address</th><td>{{$customer->address}}</td></tr>
				<tr><th>Location</th><td>{{$customer->location}}</td></tr>
				<tr><th>Place ID</th><td>{{$customer->place_id}}</td></tr>
				<tr><th>Latitude</th><td>{{$customer->latitude}}</td></tr>
				<tr><th>Longitude</th><td>{{$customer->longitude}}</td></tr>
				<tr><th>Tarrif ID</th><td>{{$customer->tarrif_id}}</td></tr>
			</tbody>
		</table>
		<a href="/customer/{{$customer->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
		<form action="/customer/{{$customer->id}}" method="POST">
			@csrf
			@method('DELETE')
			<button type="submit" class="btn btn-sm btn-danger">Delete</button>
		</form>
	</div>
</div>
@endsection
@section('scripts')
@endsection