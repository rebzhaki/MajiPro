@extends('layouts.app')
@section('css')
@endsection
@section('content')

<div class="page-header">
	<h2>Consumption</h2>
</div>
<div class="row">
	<div class="col-sm-6">
		<div class="card w-75">
			<div class="card-body">
		<form action="/consumption/{{$consumption->id}}" method="POST">
			@csrf
			@method("PUT")

			<h5 class="card-title">Register consumption</h5>
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control" value="{{$consumption->name}}">
			</div>
			<div class="form-group">
				<label>Consumption</label>
				<textarea name="consumption" class="form-control"></textarea>
			</div>
			<div class="form-group">
				<label>Date</label>
				<input type="date" name="date" class="form-control" value="{{$consumption->date}}">
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