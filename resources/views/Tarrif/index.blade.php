@extends('layouts.app')
@section('css')
@endsection
@section('content')
<div class="page-header">
		<div class="row">
	<div class="col-9">
		<h2>Tarrifs</h2>
	</div>
		<div class="col">
		<a href="/tarrif/create" role="button" class="btn btn-success"><i class="fas fa-plus"></i> add tarrif</a>
	</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<table class="table table-condensed table-bordered">
			<thead>
				<tr>
					<th>Name</th>
					<th>Description</th>
					<th>Price (m<sup>3</sup>)</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($tarrifs as $tarrif)
				<tr>
					<td>{{$tarrif->name}}</td>
					<td>{{$tarrif->description}}</td>
					<td>{{$tarrif->price}}</td>
					<td><a href="/tarrif/{{$tarrif->id}}" class="btn btn-sm btn-info">View</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection
@section('scripts')
@endsection