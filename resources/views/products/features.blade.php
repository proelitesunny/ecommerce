@extends('layouts.dash')

@section('page-header', $product->name)

@section('content')
	<div class="row">
		<div class="col-md-6">
			<legend>Add new Feature</legend>
			@if(session('addmessage'))
				<div class="alert alert-success">
					{{session('addmessage')}}
				</div>
			@endif
			<form method="POST" action="{{url('admin/products/addfeature/'.$product->id)}}">
				{{csrf_field()}}
				<div class="form-group{{$errors->has('name')?' has-error':''}}">
					<label class="control-label">Feature Name:</label>
					<input type="text" name="name" class="form-control">
					@if($errors->has('name'))
						<span class="help-block">
							<strong>{{$errors->first('name')}}</strong>
						</span>
					@endif
				</div>
				<div class="form-group{{$errors->has('detail')?' has-error':''}}">
					<label class="control-label">Feature Details:</label>
					<input type="text" name="detail" class="form-control">
					@if($errors->has('detail'))
						<span class="help-block">
							<strong>{{$errors->first('detail')}}</strong>
						</span>
					@endif
				</div>
				<button class="btn btn-success">Add Feature</button>
			</form>
		</div>
		<div class="col-md-6">
			<legend>Existing Features</legend>
				@if(session('removemessage'))
					<div class="alert alert-danger">
						{{session('removemessage')}}
					</div>
				@endif
				
					<table class="table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Value</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($product->features as $feature)
								<tr>
									<td>{{$feature->name}}</td>
									<td>{{$feature->detail}}</td>
									<td>
										<form method="POST" action="{{url('admin/products/removefeature/'.$feature->id)}}">
											{{csrf_field()}}
											<button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
												<span class="glyphicon glyphicon-remove"></span>
											</button>
										</form>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
		</div>

	</div>
@endsection