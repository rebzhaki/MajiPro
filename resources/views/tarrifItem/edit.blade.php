@extends('layouts.app')
@section('css')
@endsection
@section('content')
<div class="page-header">
	<h2>Tarrif</h2>
</div>
<div class="row">
	<div class="col-sm-6">
		
		<form action="/tarrifItem/{{$tarrifItem->id}}" method="POST">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label>Levy Name</label>
				<input type="text" name="name" class="form-control" value="{{$tarrifItem->name}}">
			</div>
			<div class="form-group">
				<label>Levy Type</label>
				<select name="type" class="form-control">
					<option value="">choose...</option>
					@if($tarrifItem->type == 'Fixed Amount')
					<option value="Fixed Amount" selected="selected">Fixed Amount</option>
					@else
					<option value="Fixed Amount">Fixed Amount</option>
					@endif
					@if($tarrifItem->type == 'Amount per cubic meter')
					<option value="Amount per cubic meter" selected="selected">Amount per cubic meter</option>
					@else
					<option value="Amount per cubic meter">Amount per cubic meter</option>
					@endif
					@if($tarrifItem->type == '% of consumption')
					<option value="% of consumption" selected="selected">% of all consumption</option>
					@else
					<option value="% of consumption">% of all consumption</option>
					@endif
				</select>
			</div>
			<div class="form-group">
				<label>Amount</label>
				<input type="text" name="amount" class="form-control" value="{{$tarrifItem->amount}}">
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