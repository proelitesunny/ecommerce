@extends('layouts.shop')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-header">Your Cart</h1>
		</div>
	</div>

	@if($error==true)
		<h1 class="text-center">
			<span class="small">You have not added any product to your cart.</span>
		</h1>
		<div class="text-center">
			<a href="{{url('/')}}" class="btn btn-link">
				Continue Shopping
			</a>
		</div>
	@else
		<div class="row">
			<div class="col-md-8">
				<?php 
					$price=0; 
					$totalprice = 0;
				?>
				@foreach($products as $product)
					<?php
						$orders = session()->get('orders');
						foreach ($orders as $order) {
			                foreach ($order as $key => $value) {
			                    if($key == $product->id){
			                    	$quantity = $value;
			                    	if($product->promotional_price == null)
			                    		$price = $product->price * $quantity;
			                    	else
			                    		$price = $product->promotional_price * $quantity;
			                    	break 2;
			                	}
			                }
			            }
		            ?>
					<?php $totalprice+=$price; ?>
					<div class="panel panel-default">
						<div class="panel-body">
							<form method="POST" action="{{url('removefromcart/'.$product->id)}}" class="pull-right">
								{{csrf_field()}}
								<button class="btn btn-warning btn-sm">
									<span class="glyphicon glyphicon-remove"></span>
								</button>
							</form>
							<img src="{{asset('img/products/'.$product->image)}}" alt="" width="50">
							{{$product->name}}<br>
							
							<form class="form-inline" method="POST" action="{{url('updatecart/'.$product->id)}}">
								{{csrf_field()}}
								<div class="form-group">
									<label for="quantity" class="control-label">
										Quantity: 
									</label>
									<input type="number" name="quantity" min="1" class="form-control" value="{{$quantity}}">
								</div>
								<button class="btn btn-sm btn-info">
									Update Quantity
								</button>
							</form>
							<span class="pull-right">
								Rs. {{$price}}
							</span>
						</div>
					</div>
				@endforeach
			</div>
			<div class="col-md-4">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Price Details
					</div>
					<div class="panel-body">
						Items
						<span class="pull-right">Rs. {{$totalprice}}</span>
						<br>
						Delivery Charges
						<span class="pull-right">Free</span>
						<hr>
						Total
						<span class="pull-right">Rs. {{$totalprice}}</span>
					</div>
					<div class="panel-footer text-right">
						<a href="{{url('placeorder')}}" class="btn btn-info">Place Order</a>
					</div>
				</div>
			</div>
		</div>
	@endif

@endsection