@extends('layouts.shop-full-width')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-header">Help</h1>
			<p>It's our pleasure to help you. Please choose one of the following action to start.</p>
		</div>
	</div>

	<div class="row text-center">
		<div class="col-md-4">
			<a href="{{url('help/cancelorder')}}">
				<div class="panel panel-default">
					<div class="panel-heading">
						<span class="glyphicon glyphicon-remove fa-5x"></span>
						<h4>Cancel Order</h4>
					</div>
				</div>
			</a>
		</div>
		<div class="col-md-4">
			<a href="{{url('help/trackorder')}}">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<span class="fa fa-bus fa-5x"></span>
						<h4>Track your Order</h4>
					</div>
				</div>
			</a>
		</div>
		<div class="col-md-4">
			<a href="{{url('help/enquiry')}}">
				<div class="panel panel-default">
					<div class="panel-heading">
						<span class="fa fa-question fa-5x"></span>
						<h4>Other Enquries</h4>
					</div>
				</div>
			</a>
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
						<th>Tracking Id</th>
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
						<td>{{$order->price}}</td>
						
						<td></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection