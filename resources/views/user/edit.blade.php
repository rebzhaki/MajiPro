@extends('layouts.app')
@section('css')
@endsection
@section('content')


<div class="row">
	<div class="col-sm-6">
		
		<form action="/user/{{$user->id}}" method="POST">
			@csrf
		<div class="card w-75">
			<div class="card-body">
				<h5 class="card-title">Register User</h5>
			<div class="form-group">
				<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" name="email" class="form-control">
			</div>
			<div class="form-group">
				<label>Phone</label>
				<input type="text" name="phone" class="form-control">
			</div>
			
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control">
			</div>
			<div class="form-group">
				<label>Role</label>
				<input type="text" name="role_id" class="form-control">
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