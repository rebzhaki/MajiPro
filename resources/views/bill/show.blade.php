@extends('layouts.app')
@section('css')
@endsection
@section('content')
<div class="row">
	<div class="col-sm-6">
		<table class="table table-condensed table-bordered">		
			<tbody>
				<tr><th>Name</th><td>{{$bill->name}}</td></tr>
				<tr><th>Start Date</th><td>{{$bill->start_date}}</td></tr>
				<tr><th>End Date</th><td>{{$bill->end_date}}</td></tr>
				<tr><th>Date</th><td>{{$bill->date}}</td></tr>
				<tr><th>Status</th><td>{{$bill->status}}</td></tr>
				<tr><th>Balance</th><td>{{$bill->balance}}</td></tr>
				<tr><th>Amount</th><td>{{$bill->amount}}</td></tr>
			</tbody>
		</table>
		<a href="/bill/{{$bill->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
		<form action="/bill/{{$bill->id}}" method="POST">
			@csrf
			@method('DELETE')
			<button type="submit" class="btn btn-sm btn-danger">Delete</button>
		</form>
	</div>
</div>
@endsection
@section('scripts')
@endsection