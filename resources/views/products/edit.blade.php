@extends('layouts.dash')

@section('page-header', 'Edit Product')

@section('content')
	@if(session('message'))
		<div class="alert alert-success">
			{{session('message')}}
		</div>
	@endif
	<form class="form-horizontal" method="POST" action="{{url('admin/products/'.$product->id)}}" enctype="multipart/form-data">
		{{csrf_field()}}
		{{ method_field('PUT') }}
		<div class="form-group{{$errors->has('name') ? ' has-error' : ''}}">
			<label for="name" class="control-label col-md-4">Name</label>
			<div class="col-md-4">
				<input type="text" name="name" class="form-control" value="{{$product->name}}">

				@if($errors->has('name'))
					<span class="help-block">
						<strong>{{$errors->first('name')}}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{$errors->has('description') ? ' has-error' : ''}}">
			<label for="description" class="control-label col-md-4">Description</label>
			<div class="col-md-4">
				<textarea class="form-control" rows="5" name="description">{{$product->description}}</textarea>

				@if($errors->has('description'))
					<span class="help-block">
						<strong>{{$errors->first('description')}}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{$errors->has('category') ? ' has-error' : ''}}">
			<label for="category" class="control-label col-md-4">Category</label>
			<div class="col-md-4">
				<select name="category" class="form-control">
					<option value="">Select a category</option>
					@foreach($categories as $category)
						<option value="{{$category->id}}" 
							{{$product->category_id==$category->id ? 'selected' : ''}}>{{$category->name}}
						</option>
					@endforeach
				</select>

				@if($errors->has('category'))
					<span class="help-block">
						<strong>{{$errors->first('category')}}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{$errors->has('price') ? ' has-error' : ''}}">
			<label for="price" class="control-label col-md-4">Price</label>
			<div class="col-md-4">
				<input type="number" min="1" name="price" class="form-control" value="{{$product->price}}">

				@if($errors->has('price'))
					<span class="help-block">
						<strong>{{$errors->first('price')}}</strong>
					</span>
				@endif
			</div>
		</div>

		<!-- <div class="form-group{{$errors->has('quantity') ? ' has-error' : ''}}">
			<label for="quantity" class="control-label col-md-4">Quantity</label>
			<div class="col-md-4">
				<input type="number" min="1" name="quantity" class="form-control" value="{{$product->quantity}}">

				@if($errors->has('quantity'))
					<span class="help-block">
						<strong>{{$errors->first('quantity')}}</strong>
					</span>
				@endif
			</div>
		</div> -->

		<div class="form-group{{$errors->has('handling_time') ? ' has-error' : ''}}">
			<label for="handling_time" class="control-label col-md-4">Handling Time (In Days)</label>
			<div class="col-md-4">
				<input type="number" min="1" name="handling_time" class="form-control" value="{{$product->handling_time}}">

				@if($errors->has('handling_time'))
					<span class="help-block">
						<strong>{{$errors->first('handling_time')}}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{$errors->has('expiring_date') ? ' has-error' : ''}}">
			<label for="expiring_date" class="control-label col-md-4">Expiring Date</label>
			<div class="col-md-4">
				<input type="date" name="expiring_date" class="form-control" value="{{$product->expiring_date}}">

				@if($errors->has('expiring_date'))
					<span class="help-block">
						<strong>{{$errors->first('expiring_date')}}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{$errors->has('image') ? ' has-error' : ''}}">
			<label for="image" class="control-label col-md-4">Product Image</label>
			<div class="col-md-1">
				<img src="{{asset('img/products/'.$product->image)}}" style="width: 100%">
			</div>
			<div class="col-md-3">
				<input type="file" name="image" class="form-control">

				@if($errors->has('image'))
					<span class="help-block">
						<strong>{{$errors->first('image')}}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="col-md-4 col-md-offset-4">
			<button class="btn btn-success">Save Changes</button>
		</div>
	</form>
	<br>
	<br>
	<br>
@endsection