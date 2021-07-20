@extends('layouts.app')
@section('css')
@endsection
@section('content')
<div class="page-header">
	<h2>Register Bill</h2>
</div>

<div class="row">
	<div class="col-sm-6">
		<form action="/bill" method="POST">
			@csrf
		<div class="card w-75">
			<div class="card-body">
				<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control">
			</div>
			<div class="form-group">
				<label>Start Date</label>
				<input type="date" name="start_date" class="form-control">
			</div>
			<div class="form-group">
				<label>End Date</label>
				<input type="date" name="end_date" class="form-control">
			</div>
			<div class="form-group">
				<label>Date</label>
				<input type="date" name="date" class="form-control">
			</div>
			<div class="form-group">
				<label>Status</label>
				<select id="status" class="form-select">
					<option selected>choose..</option>
					<option>pending</option>
					<option>cleared</option>
				</select>
			</div>
			<div class="form-group">
				<label>Balance</label>
				<input type="text" name="balance" class="form-control">
			</div>
			<div class="form-group">
				<label>Amount</label>
				<input type="text" name="amount" class="form-control">
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