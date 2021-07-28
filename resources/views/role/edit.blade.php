@extends('layouts.app')
@section('css')
@endsection
@section('content')
<div class="row">
	<div class="col-sm-6">
		<form action="/role/{{$role->id}}" method="POST">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control" value="{{$role->name}}">
			</div>
			<div class="form-group">
				<label>Description</label>
				<textarea name="description" class="form-control">{{$role->description}}</textarea>
			</div>

			<legend>Select permissions below</legend>
			@foreach($permissions as $permission)
			<div class="custom-control custom-switch">
				@if($role->hasPermissionTo($permission->name))
				<input type="checkbox" name="permissions[]" class="custom-control-input" id="customSwitch{{$permission->id}}" value="{{$permission->name}}" checked="checked">
				@else
				<input type="checkbox" name="permissions[]" class="custom-control-input" id="customSwitch{{$permission->id}}" value="{{$permission->name}}">
				@endif
			  <label class="custom-control-label" for="customSwitch{{$permission->id}}">{{$permission->name}}</label>
			</div>
			@endforeach
			
			<button class="btn btn-sm btn-success" type="submit">Update</button>
		</form>
	</div>
</div>
@endsection
@section('scripts')
@endsection