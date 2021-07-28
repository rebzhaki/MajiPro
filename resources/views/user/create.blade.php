@extends('layouts.app')
@section('css')
@endsection
@section('content')
<div class="page-header">
	<h2>User</h2>
</div>
<div class="row">
	<div class="col-sm-6">
		
		<form action="/user" method="POST">
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
				<select class="form-control" name="role_id">
				 <option value="">Choose</option>
  				 	@foreach ($roles as $role)
       			   		<option value="{{ $role->id }}"> {{ $role->name }}</option>
       			    @endforeach
				</select>
			</div>
			<legend>Select permissions below</legend>
			@foreach($permissions as $permission)
			<div class="custom-control custom-switch">
  			  <input type="checkbox" name="permissions[]" class="custom-control-input" id="customSwitch{{$permission->id}}" value="{{$permission->name}}">
			  <label class="custom-control-label" for="customSwitch{{$permission->id}}">{{$permission->name}}</label>
			</div>
			@endforeach
			<button class="btn btn-sm btn-success" type="submit">Save</button>
		</form>

	</div>
</div>
	</div>
</div>
@endsection
@section('scripts')
@endsection