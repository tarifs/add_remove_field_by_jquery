@extends('admin')
@section('title', '| User Create')
@section('content')
<div class="row">
	<div class="panel panel-info">
		<div class="panel-heading">
			+ Add New:
		</div>

		<div class="panel-body">
			{!! Form::open(array('route' => 'money_receivers.store','data-parsley-validate'=>'')) !!}

			{{Form::label('first_name','First Name:')}}
			{{Form::text('first_name',null,array('class' => 'form-control','maxlength'=>'191'))}}
			{{Form::label('last_name','Last Name:')}}
			{{Form::text('last_name',null,array('class' => 'form-control','maxlength'=>'191'))}}
			{{Form::label('initial_name','Initial Name:')}}
			{{Form::text('initial_name',null,array('class' => 'form-control','maxlength'=>'191'))}}
			{{Form::label('country','Country:')}}
			{{Form::text('country',null,array('class' => 'form-control','maxlength'=>'191'))}}
			<div class="form-group">
				<label >Select Payment Method:</label>
				<select class="form-control payment_type" name="payment_type">
					<option selected disabled>Select Any Payment Method</option>
					<option value="btc">BTC</option>
					<option value="Abra">Abra</option>
					<option value="WU">WU</option>
					<option value="MG">MG</option>
				</select>
			</div>
			<div class="btc_address hidden">
				{{Form::label('btc_address','BTC Address:')}}
				{{Form::text('btc_address',null,array('class' => 'form-control','maxlength'=>'191'))}}
			</div>
			<div class="form-group payment_category hidden">
				<label >Payment Category:</label>
				<select class="form-control" name="payment_category">
					<option selected disabled>Select Any Category</option>
					<option value="high">High Volume</option>
					<option value="low">Low Volume</option>
					<option value="china">China</option>
				</select>
			</div>

			{{Form::label('status','Status:')}}
			{{ Form::radio('status', '1' , true,array('required'=>'required')) }}Active
			{{ Form::radio('status', '0' , false,array('required'=>'required')) }}Inactive
			{{Form::submit('Submit',array('class' => 'btn btn-success btn-lg btn-block','style'=>'margin-top:20px'))}}


			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection
@section('custom_js')
	<script>
		$(".payment_type").change(function () {
			var payment_type = $(this).val();
			if (payment_type == 'WU' || payment_type == 'MG' ) {
				$('.payment_category').removeClass('hidden');
			} else {
				$('.payment_category').addClass('hidden');
			}
			if(payment_type == 'btc' || payment_type == 'Abra') {
				$('.btc_address').removeClass('hidden');
			} else {
				$('.btc_address').addClass('hidden');
			}
		})
	</script>
@endsection