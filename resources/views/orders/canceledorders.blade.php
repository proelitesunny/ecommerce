@extends('layouts.dash')

@section('page-header', 'Canceled Orders')
@section('content')
	<table class="table">
		<thead>
			<th>Order Id</th>
			<th>Item info</th>
			<th>Quantity</th>
			<th>Order Date</th>
			<th>Ordered by</th>
			<th>Price</th>
		</thead>
		<tbody>
			@foreach($orders as $order)
				<tr>
					<td>{{$order->id}}</td>
					<td>
						<img src="{{asset('img/products/'.$order->product->image)}}" width="50">
						
							{{$order->product->name}}<br>
							
						
					</td>
					<td>{{$order->quantity}}</td>
					<td>{{$order->created_at->toFormattedDateString()}}</td>
					<td>{{$order->user->email}}</td>
					<td>
						{{$order->price}}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection