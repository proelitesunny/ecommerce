@extends('layouts.dash')

@section('page-header', 'Add new slide')

@section('content')
	@if(session('message'))
		<div class="alert alert-success">
			{{session('message')}}
		</div>
	@endif
	<form class="form-horizontal" method="POST" action="{{url('admin/slider')}}" enctype="multipart/form-data">
		{{csrf_field()}}
		<div class="form-group{{$errors->has('name') ? ' has-error' : ''}}">
			<label for="name" class="control-label col-md-4">Name</label>
			<div class="col-md-4">
				<input type="text" name="name" class="form-control" value="{{old('name')}}">

				@if($errors->has('name'))
					<span class="help-block">
						<strong>{{$errors->first('name')}}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{$errors->has('image') ? ' has-error' : ''}}">
			<label for="image" class="control-label col-md-4">Slider Image</label>
			<div class="col-md-4">
				<input type="file" name="image" class="form-control">

				@if($errors->has('image'))
					<span class="help-block">
						<strong>{{$errors->first('image')}}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="col-md-4 col-md-offset-4">
			<button class="btn btn-success">Add Slide</button>
		</div>
		<br>
		<br>
		<br>
	</form>
@endsection