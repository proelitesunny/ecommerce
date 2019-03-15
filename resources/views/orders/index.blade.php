@extends('layouts.dash')

@section('page-header', 'Orders')
@section('content')
	<table class="table">
		<thead>
			<th>Order Id</th>
			<th>Item info</th>
			<th>Order Date</th>
			<th>Ordered by</th>
			
		</thead>
		<tbody>
			@foreach($orders as $order)
				<tr>
					<td>{{$order->id}}</td>
					<td>
						<img src="{{asset('img/products/'.$order->product->image)}}" width="50">
						<a href="{{url('admin/orders/'.$order->id)}}" class="btn btn-link">
							{{$order->product->name}}
						</a>
					</td>
					<td>{{$order->created_at->toFormattedDateString()}}</td>
					<td>{{$order->user->email}}</td>
					
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection