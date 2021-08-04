@extends('layouts.app')
@section('css')
@endsection
@section('content')
<div class="page-header">
	<div class="row">
		<div class="col-sm-6">	<h2>Customer</h2>
		</div>
	<div class="col-sm-6">
		<div class="row">
			<div class="btn-group">
				@can('Consumption')
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#consumptionModal">
	  		<i class="fa fa-plus"></i> Enter Consumption
	 		</button>
	 		@endcan

	 		@can('Bills')
	 			<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#billModal">
	  			<i class="fa fa-plus"></i> Generate Bill
	 		</button>
	 		@endcan

	 		@can('Payments')
	 			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#paymentModal">
	  			<i class="fa fa-plus"></i> Enter Payment
	 		</button>
	 		@endcan
	 		</div>
	 	</div>
	 </div>
	</div>
</div>
<div class="row">
<div class="col-sm-4">
 <div class="card">
 <div class="card-body">
    <div class="avatar"><img src="/img/avatar.png" width="100%"/></div>
  				<h4 style="text-align:center">{{$customer->name}}</h4>
		<table class="table table-condensed table-bordered">		
			<tbody>
				<tr><th>ID Type</th><td>{{$customer->ID_type}}</td></tr>
				<tr><th>ID Number</th><td>{{$customer->ID_number}}</td></tr>
				<tr><th>LR Number</th><td>{{$customer->LR_number}}</td></tr>
				<tr><th>Address</th><td>{{$customer->address}}</td></tr>
				<tr><th>Location</th><td>{{$customer->location}}</td></tr>
				<tr><th>Place ID</th><td>{{$customer->place_id}}</td></tr>
				<tr><th>Latitude</th><td>{{$customer->latitude}}</td></tr>
				<tr><th>Longitude</th><td>{{$customer->longitude}}</td></tr>
				<tr><th>Tarrif</th><td>{{$customer->tarrif->name??''}}</td></tr>
			</tbody>
		</table>
		
		<form action="/customer/{{$customer->id}}" method="POST">
			@csrf
			@method('DELETE')
			<div class="btn-group">
			<a href="/customer/{{$customer->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
			<button type="submit" class="btn btn-sm btn-danger">Delete</button>
			</div>
		</form>
	</div>
	</div>
	</div>
	<div class="col-sm-8">
		<div class="row">
		<div class="col-sm-6">
		<div class="row g-3">
		<div class="card col-sm-6 statistic-card">
		<div class="card-body">
		<h5 class="statistic-header">Consumption</h5>
		<h6 class="statistic">{{$customer->consumptions()->sum('consumption')}} <small>m<sup>3</sup></small></h6>
		</div>
		</div>
		<div class="card col-sm-6 statistic-card">
		<div class="card-body">
		<h5 class="statistic-header">Billed consumption</h5>
		<h6 class="statistic">0 <small>m<sup>3</sup></small></h6>
		</div>
		</div>
		</div>
		<div class="row g-3">
		<div class="card col-sm-6 statistic-card">
		<div class="card-body">
		<h5 class="statistic-header">Total bills</h5>
		<h6 class="statistic">0 <small>KES</small></h6>
		</div>
		</div>
		<div class="card col-sm-6 statistic-card">
		<div class="card-body">
		<h5 class="statistic-header">Total payments</h5>
		<h6 class="statistic">0 <small>KES</small></h6>
		</div>
		</div>
		</div>
		</div>
		<div class="col-sm-6">
		Graph Space
		</div>
		</div>
		<div class="row mt-5">
		<div class="col-sm-12">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
		  <li class="nav-item">
		    <a class="nav-link active" id="consumption-tab" data-toggle="tab" href="#consumption" role="tab" aria-controls="consumption" aria-selected="true">Consumption</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" id="bill-tab" data-toggle="tab" href="#bill" role="tab" aria-controls="bill" aria-selected="false">Bills</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" id="payment-tab" data-toggle="tab" href="#payment" role="tab" aria-controls="payment" aria-selected="false">Payments</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" id="communication-tab" data-toggle="tab" href="#communication" role="tab" aria-controls="communication" aria-selected="false">Communication</a>
		  </li>
		</ul>
		<div class="tab-content" id="myTabContent">
		  <div class="tab-pane fade show active" id="consumption" role="tabpanel" aria-labelledby="consumption-tab">
		  <table class="table table-condensed table-bordered mt-3">
			<thead>
				<tr>
					<th>Date</th>
					<th>Previous Reading</th>
					<th>Current Reading</th>
					<th>Consumption (m<sup>3</sup>)</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($customer->consumptions as $consumption)
				<tr>
					<td>{{date_format(date_create($consumption->date),'D dS M Y')}}</td>
					<td>{{$consumption->previous_reading}}</td>
					<td>{{$consumption->current_reading}}</td>
					<td>{{$consumption->consumption}}m<sup>3</sup></td>
					<td><a href="/consumption/{{$consumption->id}}" class="btn btn-sm btn-info">View</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
		  </div>
		  <div class="tab-pane fade" id="bill" role="tabpanel" aria-labelledby="bill-tab">
		  <table class="table table-condensed table-bordered mt-3">
			<thead>
				<tr>
					<th>Date</th>
					<th>Status</th>
					<th>Balance</th>
					<th>Amount</th>
					<th>Start Date</th>
					<th>End Date</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($customer->bills as $bill)
				<tr>
					<td>{{date_format(date_create($bill->date),'D dS M Y')}}</td>
					<td>{{$bill->status}}</td>
					<td>{{$bill->balance}}</td>
					<td>{{$bill->amount}}</td>
					<td>{{date_format(date_create($bill->start_date),'D dS M Y')}}</td>
					<td>{{date_format(date_create($bill->end_date),'D dS M Y')}}</td>
					<td><a href="/bill/{{$bill->id}}" class="btn btn-sm btn-info">View</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
		</div>
		  <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
		  <table class="table table-condensed table-bordered">
			<thead>
				<tr>
					<th>Date</th>
					<th>Mode</th>
					<th>Code</th>
					<th>Amount</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($customer->payments as $payment)
				<tr>
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
		  <div class="tab-pane fade" id="communication" role="tabpanel" aria-labelledby="communication-tab">...</div>
		</div>
		</div>
		</div>	

  </div>
 

  </div>
		</div>
	</div>
</div>
</div>







<!-- consumption Modal -->
<div class="modal fade" id="consumptionModal" tabindex="-1" role="dialog" aria-labelledby="consumptionModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Enter consumption</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/consumption" method="POST">
			@csrf
			<input type="hidden" name="customer_id" value="{{$customer->id}}">
			<div class="form-group">
				<label>Date</label>
				<input type="date" name="date" class="form-control" value="{{date('Y-m-d')}}">
			</div>
			<div class="form-group">
				<label>Previous reading</label>
				<input type="number" step="0.01" name="previous_reading" class="form-control" value="{{$customer->previous_reading}}">
			</div>
			<div class="form-group">
				<label>Current reading</label>
				<input type="number" step="0.01" name="current_reading" class="form-control">
			</div>
			<button class="btn btn-sm btn-success" type="submit">Save</button>
		</form>
      </div>
  </div>
</div>
</div>





    <!-- Bill Modal -->
<div class="modal fade" id="billModal" tabindex="-1" role="dialog" aria-labelledby="billModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Generate bill</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/bill" method="POST">
			@csrf
			<input type="hidden" name="customer_id" value="{{$customer->id}}">
			<div class="form-row">
			<div class="form-group col">
				<label>Start Date</label>
				<input type="date" name="start_date" class="form-control" value="{{date('Y-m-d')}}">
			</div>
			<div class="form-group col">
				<label>End Date</label>
				<input type="date" name="end_date" class="form-control" value="{{date('Y-m-d')}}">
			</div></div>
			<div class="form-group">
				<label>Consumption in m<sup>3</sup></label>
				<input type="number" step="0.01" name="consumption" class="form-control">
			</div>
			<button class="btn btn-sm btn-success" type="submit">Save</button>
		</form>
      </div>
    </div>
  </div>
</div>

 <!-- Payment Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Enter Payment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/payment" method="POST">
			@csrf
			<input type="hidden" name="customer_id" value="{{$customer->id}}">
		
			<div class="form-group">
				<label>Date</label>
				<input type="date" name="date" class="form-control" value="{{date('Y-m-d')}}">
			</div>
			<div class="form-group">
				<label>Mode Of Payment</label>
				<select name="mode" class="form-control">
					<option value="">Choose...</option>
					<option value="Mpesa">Mpesa</option>
					<option value="Cash">Cash</option>
				</select>
			</div>
				
			<div class="form-group">
				<label>Amount in KES</label>
				<input type="number" step="0.01" name="amount" class="form-control">
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