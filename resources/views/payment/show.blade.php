@extends('layouts.app')
@section('css')
@endsection
@section('content')
<div class="row">
	<div class="col-sm-6">
		<table class="table table-condensed table-bordered">		
			<tbody>
				<tr><th>Name</th><td>{{$payment->name}}</td></tr>
				<tr><th>Date</th><td>{{$payment->date}}</td></tr>
				<tr><th>Narrative</th><td>{{$payment->narrative}}</td></tr>
				<tr><th>Mode</th><td>{{$payment->mode}}</td></tr>
				<tr><th>Code</th><td>{{$payment->code}}</td></tr>
				<tr><th>Amount</th><td>{{$payment->amount}}</td></tr>
			</tbody>
		</table>
		<a href="/payment/{{$payment->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
		<form action="/payment/{{$payment->id}}" method="POST">
			@csrf
			@method('DELETE')
			<button type="submit" class="btn btn-sm btn-danger">Delete</button>
		</form>
	</div>
</div>
@endsection
@section('scripts')
@endsection