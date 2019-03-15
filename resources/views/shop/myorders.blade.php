@extends('layouts.shop-full-width')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-header">Your Orders</h1>
			<p>To cancel or track your order, go to help menu.</p>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading"><strong>Item Details</strong></div>
		<div class="panel-body">
			<table class="table">
				<thead>
					<tr>
						<th>Image</th>
						<th>Order Id</th> 
						<th>Name</th> 
						<th>Quanity</th>
						<th>Price</th>
						<th>Total</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					@foreach($orders as $order)
					<tr>
						<td>
							<img src="{{asset('img/products/'.$order->product->image)}}" width="150">
						</td>
						<td>{{$order->id}}</td>
						<td>
							{{$order->product->name}}<br>
							{{$order->product->description}}
						</td>
						<td>{{$order->quantity}}</td>
						<td>{{$order->product->price}}</td>
						<td></td>
						<td>
							@if($order->status == 'a')
								{{'Awaiting Confirmation'}}
							@elseif($order->status == 'c')
								{{'Confirmed'}}
							@elseif($order->status == 's')
								{{'Shipped'}}
							@elseif($order->status == 'd')
								{{'Delivered'}}
							@elseif($order->status == 'can')
								{{'Canceled'}}
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection