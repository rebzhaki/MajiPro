@extends('layouts.app')
@section('css')
@endsection
@section('content')
<div class="page-header">
	<h2>Bills</h2>
</div>
<div class="row">
	<div class="col-sm-12">
		<table class="table table-condensed table-bordered">
			<thead>
				<tr>
					<th>Name</th>
					<th>Start Date</th>
					<th>End Date</th>
					<th>Date</th>
					<th>Status</th>
					<th>Balance</th>
					<th>Amount</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($bills as $bill)
				<tr>
					<td><a href="/customer/{{$bill->customer->id}}" style="text-decoration: none !important;" class="text-dark">{{$bill->customer->name}}</a></td>
					<td>{{$bill->start_date}}</td>
					<td>{{$bill->end_date}}</td>
					<td>{{$bill->date}}</td>
					<td>{{$bill->status}}</td>
					<td>{{$bill->balance}}</td>
					<td>{{$bill->amount}}</td>
					<td><a href="/bill/{{$bill->id}}" class="btn btn-sm btn-info">View</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection
@section('scripts')
@endsection