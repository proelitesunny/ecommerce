@extends('layouts.dash')

@section('page-header', 'Order Details')
@section('content')
	<div class="panel panel-default">
		<div class="panel-heading"><strong>Item Details</strong></div>
		<div class="panel-body">
			<table class="table">
				<thead>
					<tr>
						<th>Image</th>
						<th>Name</th> 
						<th>Quanity</th>
						<th>Price</th>
						<th>Total</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<td>
						<img src="{{asset('img/products/'.$order->product->image)}}" width="150">
					</td>
					<td>
						{{$order->product->name}}<br>
						{{$order->product->description}}
					</td>
					<td>{{$order->quantity}}</td>
					<td>{{$order->price}}</td>
					<td></td>
					<td>
						@if(session('message'))
							<div class="alert alert-success">
								{{session('message')}}
							</div>
						@endif
						<form method="POST" action="{{url('admin/status/'.$order->id)}}">
							{{csrf_field()}}
							<div class="radio">
								<input type="radio" name="status" value="a" {{$order->status == 'a' ? 'checked' : ''}}>Awaiting Confirmation
							</div>
							<div class="radio">
								<input type="radio" name="status" value="c" {{$order->status == 'c' ? 'checked' : ''}}>Confirmed
							</div>
							<div class="radio">
								<input type="radio" name="status" value="s" {{$order->status == 's' ? 'checked' : ''}}>Shipped
							</div>
							<div class="radio">
								<input type="radio" name="status" value="d" {{$order->status == 'd' ? 'checked' : ''}}>Delivered
							</div>
							@if($order->status == 'd')
								<button class="btn btn-success btn-sm disabled" type="button">		Update Status
								</button>
							@else
								<button class="btn btn-success btn-sm">Update Status</button>
							@endif
						</form>
					</td>
				</tbody>
			</table>
		</div>
	</div>
@endsection