@extends('layouts.app')
@section('css')
@endsection
@section('content')

<div class="page-header">
	<h2>User</h2>
</div>
<div class="row">
	<div class="col-sm-6">
		
		<div class="card w-75">
			<div class="card-body">
			<form action="/user/{{$user->id}}" method="POST">
			@csrf
			@method('PUT')
				<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control" value="{{$user->name}}">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" name="email" class="form-control" value="{{$user->email}}">
			</div>
			<div class="form-group">
				<label>Phone</label>
				<input type="text" name="phone" class="form-control" value="{{$user->phone}}">
			</div>
			
			<div class="form-group">
				<label>Password <small>Leave empty if you do not wish to change</small></label>
				<input type="password" name="password" class="form-control">
			</div>
			<div class="form-group">
				<label>Role</label>
				<select class="form-control" name="role_id">
				 <option value="">Choose</option>
  				 	@foreach ($roles as $role)
  				 	@if($user->role_id ==$role->id)
  				 	<option value="{{ $role->id }}" selected="selected"> {{ $role->name }}</option>
  				 	@else
  				 	<option value="{{ $role->id }}"> {{ $role->name }}</option>
  				 	@endif
       			    @endforeach
				</select>
			</div>

			@foreach($permissions as $permission)
			<div class="custom-control custom-switch">
				@if($user->hasPermissionTo($permission->name))
				<input type="checkbox" name="permissions[]" class="custom-control-input" id="customSwitch{{$permission->id}}" value="{{$permission->name}}" checked="checked">
				@else
				<input type="checkbox" name="permissions[]" class="custom-control-input" id="customSwitch{{$permission->id}}" value="{{$permission->name}}">
				@endif
			  <label class="custom-control-label" for="customSwitch{{$permission->id}}">{{$permission->name}}</label>
			</div>
			@endforeach
			<button class="btn btn-sm btn-success" type="submit">Save</button>
	</form>
</div>
	</div>
</div>
@endsection
@section('scripts')
@endsection