@extends('layouts.app')
@section('css')
@endsection
@section('content')
<div class="page-header">
	<h2>Consumption</h2>
</div>

<div class="row">
	<div class="col-sm-6">
		<h5 class="card-title">Enter consumption</h5>
		<form action="/consumption" method="POST">
			@csrf
			<div class="form-group">
				<label>Date</label>
				<input type="date" name="date" class="form-control" value="{{date('Y-m-d')}}">
			</div>
			<div class="form-group">
				<label>Previous reading</label>
				<textarea name="previous_reading" class="form-control"></textarea>
			</div>
			<div class="form-group">
				<label>Current reading</label>
				<textarea name="current_reading" class="form-control"></textarea>
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