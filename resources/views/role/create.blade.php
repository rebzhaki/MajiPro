@extends('layouts.app')
@section('css')
@endsection
@section('content')

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
			
			<button class="btn btn-sm btn-success" type="submit">Save</button>
		</form>
	</div>
</div>

	</div>
</div>
@endsection
@section('scripts')
@endsection