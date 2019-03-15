@extends('layouts.shop-full-width')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-header">My Addresses</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<legend>Add new address</legend>
			@if(session('addmessage'))
				<div class="alert alert-success">
					{{session('addmessage')}}
				</div>
			@endif
			<form method="POST" action="{{url('addaddress')}}">
				{{csrf_field()}}
				<div class="form-group{{$errors->has('address') ? ' has-error' : ''}}">
					<label for="address" class="control-label">Address</label>
					<input type="text" name="address" class="form-control">
					@if($errors->has('address'))
						<span class="help-block">
							<strong>{{$errors->first('address')}}</strong>
						</span>
					@endif
				</div>
				<div class="form-group{{$errors->has('pin') ? ' has-error' : ''}}">
					<label for="pin" class="control-label">Pin</label>
					<input type="text" name="pin" class="form-control">
					@if($errors->has('pin'))
						<span class="help-block">
							<strong>{{$errors->first('pin')}}</strong>
						</span>
					@endif
				</div>
				<div class="form-group{{$errors->has('landmark') ? ' has-error' : ''}}">
					<label for="landmark" class="control-label">Landmark</label>
					<input type="text" name="landmark" class="form-control">
					@if($errors->has('landmark'))
						<span class="help-block">
							<strong>{{$errors->first('landmark')}}</strong>
						</span>
					@endif
				</div>
				<div class="form-group{{$errors->has('mobile') ? ' has-error': ''}}">
					<label for="mobile" class="control-label">Mobile</label>
					<input type="text" name="mobile" class="form-control">
					@if($errors->has('mobile'))
						<span class="help-block">
							<strong>{{$errors->first('mobile')}}</strong>
						</span>
					@endif
				</div>
				<button class="btn btn-success btn-block">Add</button>
			</form>
		</div>
		<div class="col-md-8">
			<legend>Added Addresses</legend>
			@if(session('removemessage'))
				<div class="alert alert-danger">
					{{session('removemessage')}}
				</div>
			@endif
			<div class="row">
				@foreach($addresses as $address)
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<span class="text-right">
								<form method="POST" action="{{url('removeaddress/'.$address->id)}}" onclick="return confirm('Are you sure?')">
									{{csrf_field()}}
									<button class="btn btn-danger btn-sm">
										<span class="glyphicon glyphicon-remove"></span>
									</button>
								</form>
							</span>
							<strong>{{$address->mobile}}</strong><br>
							{{$address->address}}<br>
							{{$address->landmark}}
							{{$address->pin}}

						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
		
	</div>
			
@endsection