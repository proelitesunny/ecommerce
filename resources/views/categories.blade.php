@extends('layouts.dash')

@section('page-header', 'Categories')

@section('content')
	
	<div class="row">
		<div class="col-md-6">
			@if(session('message'))
				<div class="alert alert-success">
					{{session('message')}}
				</div>
			@endif
			<form class="form-horizontal" method="POST" action="{{url('/admin/categories')}}">
				{{csrf_field()}}
				<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
					<label class="control-label col-md-4">Name</label>
					<div class="col-md-8">
						<input type="text" name="name" class="form-control">

						@if($errors->has('name'))
							<span class="help-block">
								<strong>{{$errors->first('name')}}</strong>
							</span>
						@endif
					</div>
				</div>
				<div class="col-md-4 col-md-offset-4">
					<button class="btn btn-success">Add</button>
				</div>
			</form>
		</div>

		<div class="col-md-6">
			@if(session('deletemessage'))
				<div class="alert alert-danger">
					{{session('deletemessage')}}
				</div>
			@endif
			<ul class="list-group">
				@foreach($categories as $category)
					<li class="list-group-item">
						{{$category->name}}
						<div class="text-right">
							<form method="POST" action="{{url('admin/categories/'.$category->id)}}">
								{{csrf_field()}}
								{{method_field('DELETE')}}
								<button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
									<span class="glyphicon glyphicon-remove"></span>
								</button>

							</form>
						</div>
					</li>
				@endforeach
			</ul>
		</div>
	</div>
@endsection