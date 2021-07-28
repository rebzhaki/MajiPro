@extends('layouts.app')
@section('css')
@endsection
@section('content')
<div class="page-header">
	<h2>Customer</h2>
</div>
<div class="row">
	<div class="col-sm-8">
		

		<div class="card w-75">
		<div class="card-body">
		<h5 class="card-title">Register Customer</h5>
				
		<form action="/customer" method="POST">
			@csrf
		  <div class="form-row">
		  		 <div class="col">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" name="first_name" class="form-control">
			</div>
			</div>
		      <div class="col">
			<div class="form-group">
				<label>Middle Name</label>
				<input type="text" name="middle_name" class="form-control">
			</div>
			</div>
					 <div class="col">
			<div class="form-group">
				<label>Last Name</label>
				<input type="text" name="last_name" class="form-control">
			</div>
			</div>
			</div>
			<div class="form-row">
			<div class="col">
			<div class="form-group">
				<label>ID Type</label>
				<select name="ID_type" class="form-control">
					<option value="">Choose..</option>
					<option value="National ID">National ID</option>
					<option value="Passport">Passport</option>
				</select>
			</div>
			</div>
			<div class="col">
		<div class="form-group">
				<label>ID Number</label>
				<input type="text" name="ID_number" class="form-control">
			</div>
			</div>
			</div>
			<div class="form-row">
			<div class="col">
			<div class="form-group">
				<label>LR Number</label>
				<input type="text" name="LR_number" class="form-control">
			</div>
			</div>
			<div class="col">
			<div class="form-group">
				<label>Address</label>
				<input type="text" name="address" class="form-control">
			</div>
			</div>
			</div>
			<div class="form-group">
				<label>Location</label>
				<input type="text" name="location" class="form-control">
			</div>
			<div class="form-group">
				<label>Place</label>
				<input type="text" name="place_id" class="form-control">
			</div>
			<div class="form-group">
				<label>Latitude</label>
				<input type="text" name="latitude" class="form-control">
			</div>
			<div class="form-group">
				<label>Longitude</label>
				<input type="text" name="longitude" class="form-control">
			</div>
			<div class="form-group">
				<label>Tarrif</label>
				<input type="text" name="tarrif_id" class="form-control">
			</div>

			<button class="btn btn-sm btn-success" type="submit">Save</button>
		</form>

	</div>
</div>
	</div>
</div>
@endsection
@section('scripts')
@endsection