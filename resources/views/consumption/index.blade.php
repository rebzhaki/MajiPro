@extends('layouts.app')
@section('css')
@endsection
@section('content')
<div class="page-header">
	<h2>Consumption</h2>
</div>
<div class="row">
	<div class="col-sm-12">
		<table class="table table-condensed table-bordered">
			<thead>
				<tr>
					<th>Name</th>
					<th>Consumption/cubic meter</th>
					<th>Date</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($consumptions as $consumption)
				<tr>
					<td>{{$consumption->name}}</td>
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