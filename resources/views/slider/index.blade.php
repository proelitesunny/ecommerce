@extends('layouts.dash')

@section('page-header', 'All Slides')

@section('content')
	@if(session('message'))
		<div class="alert alert-success">
			{{session('message')}}
		</div>
	@endif
	<table class="table">
		<thead>
			<tr>
				<th></th>
				<th>Name</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			@foreach($slides as $slide)
				<tr>
					<td>
						<img src="{{asset('img/slides/'.$slide->image)}}" width="300">
					</td>
					<td>{{$slide->name}}</td>
					<td>
						<form method="POST" action="{{url('admin/slider/remove/'.$slide->id)}}">
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
@endsection