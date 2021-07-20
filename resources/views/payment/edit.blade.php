@extends('layouts.app')
@section('css')
@endsection
@section('content')


<div class="row">
	<div class="col-sm-6">
		<form action="/payment/{{$payment->id}}" method="POST">
			@csrf
		<div class="card w-75">
			<div class="card-body">
				<h5 class="card-title">Register Payment</h5>
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control">
			</div>
				<div class="form-group">
				<label>Date</label>
				<input type="date" name="date" class="form-control">
			</div>
			<div class="form-group">
				<label>Narrative</label>
				<textarea name="narrative" class="form-control"></textarea>
			</div>
			<div class="form-group">
				<label>Mode</label>
				<input type="text" name="mode" class="form-control">
			</div>
				<div class="form-group">
				<label>code</label>
				<input type="text" name="code" class="form-control">
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