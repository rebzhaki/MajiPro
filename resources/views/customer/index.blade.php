@extends('layouts.app')
@section('content')
<div class="page-header">
	<h2>Customers</h2>
</div>
<div class="row">
	<div class="col-sm-12">
		<table class="table table-condensed table-bordered">
			<thead>
				<tr>
					<th>First Name</th>
					<th>Middle Name</th>
					<th>Last Name</th>
					<th>ID Number</th>
					<th>Address</th>
					<th>Tarrif</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($customers as $customer)
				<tr>
				
					<td>{{$customer->first_name}}</td>
					<td>{{$customer->middle_name}}</td>
					<td>{{$customer->last_name}}</td>		
					<td>{{$customer->ID_number}}</td>					
					<td>{{$customer->address}}</td>					
					<td>{{$customer->tarrif_id}}</td>
					<td><a href="/customer/{{$customer->id}}" class="btn btn-sm btn-info">View</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection