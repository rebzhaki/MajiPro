@extends('layouts.app')
@section('css')
@endsection
@section('content')
<div class="page-header">
	<h2>Role</h2>
</div>
<div class="row">
<div class="col-sm-6">
	<div class="card w-75">
	<div class="card-body">
	<h5 class="card-title">Register Role</h5>
		<form action="/role" method="POST">
			@csrf

			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control">
			</div>
			<div class="form-group">
				<label>Description</label>
				<textarea name="description" class="form-control"></textarea>
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