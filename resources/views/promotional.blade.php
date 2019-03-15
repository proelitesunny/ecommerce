@extends('layouts.dash')

@section('page-header', 'Promotional Products')

@section('content')
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
				<th>Promotional Price</th>
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
					<td>
						@if($product->promotional_price == null)
							<form class="form-inline" method="POST" action="{{url('admin/products/'.$product->id.'/createpromotion')}}">
								{{csrf_field()}}
								<div class="form-group">
									<input type="text" name="promotional_price" class="form-control">
								</div>
								<button class="btn btn-primary">Create Promotion</button>
							</form>
						@else
							<strong>{{$product->promotional_price}}</strong>
							<form class="form-inline" method="POST" action="{{url('admin/products/'.$product->id.'/removepromotion')}}">
								{{csrf_field()}}
								
								<button class="btn btn-danger">Delete Promotion</button>
							</form>
						@endif
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<div class="text-center">
		{{$products->links()}}
	</div>
@endsection