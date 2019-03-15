@extends('layouts.dash')

@section('page-header', 'All Products')

@section('content')
	@if(session('message'))
		<div class="alert alert-success">
			{{session('message')}}
		</div>
	@endif
	<div class="text-center">
		{{$products->links()}}
	</div>
	<table class="table">
		<thead>
			<tr>
				<th></th>
				<th>Name</th>
				<th>Category</th>
				<th>Price</th>
				<th>Active</th>
				<th>Last updated at</th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($products as $product)
				<tr>
					<td><img src="{{asset('img/products/'.$product->image)}}" width="70"></td>
					<td>{{$product->name}}</td>
					<td>
						{{isset($product->category->name) ? $product->category->name : 'Uncategorized'}}
					</td>
					<td>{{$product->price}}</td>
					<td>{{$product->is_active ? 'Yes' : 'No'}}</td>
					<td>{{$product->updated_at->toFormattedDateString()}}</td>
					<td>
						<a href="products/{{$product->id}}/edit" class="btn btn-primary">
							<span class="glyphicon glyphicon-edit"></span>
						</a>
					</td>
					<td>
						<form method="POST" action="{{url('admin/products/'.$product->id)}}">
							{{csrf_field()}}
							{{ method_field('DELETE') }}
							<button class="btn btn-danger" onclick="return confirm('Are you sure?')">
								<span class="glyphicon glyphicon-remove"></span>
							</button>
						</form>
					</td>
					<td>
						@if($product->is_active)
							<form method="POST" action="{{url('admin/products/'.$product->id.'/active')}}">
								{{csrf_field()}}
								{{method_field('PUT')}}
								<input type="hidden" name="is_active" value="0">
								<button class="btn btn-danger">Disable</button>
							</form>
						@else
							<form method="POST" action="{{url('admin/products/'.$product->id.'/active')}}">
								{{csrf_field()}}
								{{method_field('PUT')}}
								<input type="hidden" name="is_active" value="1">
								<button class="btn btn-success">Enable</button>
							</form>
						@endif
					</td>
					<td>
						<a href="{{url('admin/products/features/'.$product->id)}}" class="btn btn-info">
							Manage Features
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<div class="text-center">
		{{$products->links()}}
	</div>
@endsection