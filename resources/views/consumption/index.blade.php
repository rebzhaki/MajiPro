@extends('layouts.app')
@section('css')
@endsection
@section('content')
<div class="page-header">
		<div class="row">
	<div class="col-9">
		<h2>Consumption</h2>
	</div>
		<div class="col">
		<a href="/consumption/create" role="button" class="btn btn-success"><i class="fas fa-plus"></i> add consumption</a>
	</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<table class="table table-condensed table-bordered">
			<thead>
				<tr>
					<th>Name</th>
					<th>Consumption (m<sup>3</sup>)</th>
					<th>Date</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($consumptions as $consumption)
				<tr>
					<td><a href="/customer/{{$consumption->customer->id}}" style="text-decoration: none !important; ">{{$consumption->customer->name}}</a></td>
					<td>{{$consumption->consumption}}</td>
					<td>{{$consumption->date}}</td>
					<td><a href="/consumption/{{$consumption->id}}" class="btn btn-sm btn-info">View</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection
@section('scripts')
@endsection