@extends('layouts.app')
@section('css')
@endsection
@section('content')
<div class="page-header">
	<div class="row">
		<div class="col-sm-9">	
		<h2>Tarrif</h2>
		</div>
		<div class="col-sm-3">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tarrifModal">
	  		<i class="fa fa-plus"></i> Add tarrif item
	 		</button>
	 	</div>
</div>
</div>
<div class="row">
	<div class="col-sm-4">
	<div class="card">
		<div class="card-header">
			<h4>{{$tarrif->name}}</h4>

		<div class="card-body">
		<table class="table table-condensed table-bordered">		
			<tbody>
				<tr><th>Description</th><td>{{$tarrif->description}}</td></tr>
				<tr><th>Price (m<sup>3</sup>)</th><td>KES. {{$tarrif->price}}</td></tr>
			</tbody>
		</table>
		
		<form action="/tarrif/{{$tarrif->id}}" method="POST">
			@csrf
			@method('DELETE')
			<div class="btn-group">
			<a href="/tarrif/{{$tarrif->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
			@can('Delete')
			<button type="submit" class="btn btn-sm btn-danger">Delete</button>
			@endcan
			</div>
		</form>
		</div>
		</div>
		</div>
		</div>
		<div class="col-sm-6">
			<table class="table table-condensed table-bordered">
			<thead>
				<tr>
					<th>Name</th>
					<th>Type</th>
					<th>Amount</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($tarrif->tarrifItems as $item)
				<tr>
				<td>{{$item->name}}</td>
				<td>{{$item->type}}</td>
				<td>{{$item->amount}}</td>
				<td><form action="/tarrifItem/{{$item->id}}" method="POST">
				@csrf
				@method('DELETE')
				<div class="btn-group">
				<a href="/tarrifItem/{{$item->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
				@can('Delete')
				<button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
				@endcan
				</div>
				</form>
				</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		</div>
		


<!-- Modal -->
<div class="modal fade" id="tarrifModal" tabindex="-1" role="dialog" aria-labelledby="tarrifModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Enter consumption</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/tarrifItem" method="POST">
			@csrf
			<input type="hidden" name="tarrif_id" value="{{$tarrif->id}}">
			
			<div class="form-group">
				<label>Levy Name</label>
				<input type="text" name="name" class="form-control">
			</div>
			<div class="form-group">
				<label>Levy Type</label>
				<select name="type" class="form-control">
					<option value="">choose...</option>
					<option value="Fixed Amount">Fixed Amount</option>
					<option value="Amount per cubic meter">Amount per cubic meter</option>
					<option value="% of consumption">% of all consumption</option>
				</select>
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