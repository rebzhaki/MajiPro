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
			
			<button class="btn btn-sm btn-success" type="submit">Update</button>
		</form>
	</div>
</div>
@endsection
@section('scripts')
@endsection