@extends('layouts.app')
@section('css')
@endsection
@section('content')
<div class="page-header">
	<h2>Payments</h2>
</div>
<div class="row">
	<div class="col-sm-12">
		<table class="table table-condensed table-bordered">
			<thead>
				<tr>
					<th>Name</th>
					<th>Date</th>
					<th>Mode</th>
					<th>Code</th>
					<th>Amount</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($payments as $payment)
				<tr>
					<td>{{$payment->name}}</td>
					<td>{{$payment->date}}</td>
					<td>{{$payment->mode}}</td>
					<td>{{$payment->code}}</td>
					<td>{{$payment->amount}}</td>
					<td><a href="/payment/{{$payment->id}}" class="btn btn-sm btn-info">View</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection
@section('scripts')
@endsection