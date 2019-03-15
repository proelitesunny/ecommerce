@extends('layouts.shop-full-width')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-header">Help</h1>
			<p>It's our pleasure to help you. Please choose one of the following action to start.</p>
		</div>
	</div>

	<div class="row text-center">
		<div class="col-md-4">
			<a href="{{url('help/cancelorder')}}">
				<div class="panel panel-default">
					<div class="panel-heading">
						<span class="glyphicon glyphicon-remove fa-5x"></span>
						<h4>Cancel Order</h4>
					</div>
				</div>
			</a>
		</div>
		<div class="col-md-4">
			<a href="{{url('help/trackorder')}}">
				<div class="panel panel-default">
					<div class="panel-heading">
						<span class="fa fa-bus fa-5x"></span>
						<h4>Track your Order</h4>
					</div>
				</div>
			</a>
		</div>
		<div class="col-md-4">
			<a href="{{url('help/enquiry')}}">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<span class="fa fa-question fa-5x"></span>
						<h4>Other Enquries</h4>
					</div>
				</div>
			</a>
		</div>
	</div>
	@if(session('message'))
		<div class="alert alert-success">
			{{session('message')}}
		</div>
	@endif
	<form method="POST" action="{{url('help/enquiry')}}">
		{{csrf_field()}}
		<div class="form-group{{$errors->has('title') ? ' has-error' : ''}}">
			<label for="title" class="control-label">Title:</label>
			<input type="text" name="title" class="form-control" value="{{old('title')}}">

			@if($errors->has('title'))
				<div class="help-block">
					<strong>{{$errors->first('title')}}</strong>
				</div>
			@endif
		</div>
		<div class="form-group{{$errors->has('message') ? ' has-error' : ''}}">
			<label for="message" class="control-label">Message:</label>
			<textarea rows="5" class="form-control" name="message"></textarea>

			@if($errors->has('message'))
				<div class="help-block">
					<strong>{{$errors->first('message')}}</strong>
				</div>
			@endif
		</div>
		<button class="btn btn-success">Submit</button>
	</form>
@endsection