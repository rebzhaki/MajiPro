@extends('layouts.app')
@section('css')
@endsection
@section('content')
<div class="page-header">
	<h2>Bills</h2>
</div>
<div class="row">
	<div class="col-sm-6">
	<div class="card">
	 	<div class="card-body">
		<table class="table table-condensed table-bordered">		
			<tbody>
				<tr><th>Name</th><td>{{$bill->customer->name}}</td></tr>
				<tr><th>Start Date</th><td>{{date_format(date_create($bill->start_date),'D dS M Y')}}</td></tr>
				<tr><th>End Date</th><td>{{date_format(date_create($bill->end_date),'D dS M Y')}}</td></tr>
				<tr><th>Date</th><td>{{date_format(date_create($bill->date),'D dS M Y')}}</td></tr>
				<tr><th>Status</th><td>{{$bill->status}}</td></tr>
				@foreach($bill->billItems as $item)
				<tr><th>{{$item->narrative}}</th><td>Kes. {{number_format($item->amount,2)}}</td></tr>
				@endforeach
				<tr><th>Balance</th><td>Kes. {{number_format($bill->balance,2)}}</td></tr>
				<tr><th>Amount</th><td>Kes. {{number_format($bill->amount,2)}}</td></tr>
			</tbody>
		</table>
		<form action="/bill/{{$bill->id}}" method="POST">
			@csrf
			@method('DELETE')
			<div class="btn-group">
			<a href="/bill/{{$bill->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
			<button type="submit" class="btn btn-sm btn-danger">Delete</button>
			</div>
		</form>
	</div>
</div>
</div>
</div>

@endsection
@section('scripts')
@endsection