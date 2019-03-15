@extends('layouts.shop')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-header">Your Wish List</h1>
		</div>
	</div>
	@if(session('message'))
		<div class="alert alert-danger">
			{{session('message')}}
		</div>
	@endif

	<div class="panel panel-default">
		<div class="panel-heading"><strong>Item Details</strong></div>
		<div class="panel-body">
			<table class="table">
				<thead>
					<tr>
						<th>Image</th>
						<th>Name</th> 
						<th>Price</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($wishlists as $wishlist)
					<tr>
						<td>
							<img src="{{asset('img/products/'.$wishlist->product->image)}}" width="150">
						</td>
						<td>
							{{$wishlist->product->name}}<br>
							{{$wishlist->product->description}}
						</td>
						<td>
							@if($wishlist->product->promotional_price == null)
								{{$wishlist->product->price}}
							@else
								<del>{{$wishlist->product->price}}</del> {{$wishlist->product->promotional_price}}
							@endif
						</td>
						<td>
							
							<form method="POST" action="{{url('removefromwishlist/'.$wishlist->id)}}">
								{{csrf_field()}}
								<div class="text-right">
									<button class="btn btn-danger" onclick="return confirm('Are you sure?')">
										<span class="glyphicon glyphicon-remove"></span>
									</button>
								</div>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection