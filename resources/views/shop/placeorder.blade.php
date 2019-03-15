@extends('layouts.shop-full-width')

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-primary">
				<div class="panel-heading">
					Place Order
				</div>
				<div class="panel-body">
					@if($error == true)
						<h1 class="text-center">
							<span class="small">
								Nothing to purchase
							</span>
						</h1>
						<div class="text-center">
							<a href="{{url('/')}}" class="btn btn-link">
								Continue Shopping
							</a>
						</div>
					@else
						<form class="form-horizontal" method="POST" action="{{url('confirmorder')}}">
							{{csrf_field()}}
							<div class="form-group">
								<label class="control-label col-md-4">Amount Payable</label>
								<div class="col-md-6">
									<p class="form-control-static">Rs. {{$amount}}</p>
								</div>	
							</div>

							<div class="form-group{{$errors->has('address') ? ' has-error' : ''}}">
								<label class="control-label col-md-4">Delivery Address</label>
								<div class="col-md-6">
									@foreach($addresses as $address)
										<div class="radio">
											<label>
												<input type="radio" name="address" value="{{$address->id}}">
													<strong>{{$address->mobile}}</strong><br>
													{{$address->address}}<br>
													{{$address->landmark}}
													{{$address->pin}}
											</label>
										</div>
									@endforeach
									@if ($errors->has('address'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('address') }}</strong>
	                                    </span>
	                                @endif
	                                <br>
	                                <a href="{{url('myaddresses')}}" class="btb btn-link">
	                                	Add new address
	                                </a>
								</div>
							</div>

							<div class="form-group{{$errors->has('payment') ? ' has-error' : ''}}">
								<label class="col-md-4 control-label">Payment</label>
								<div class="col-md-6">
									<div class="radio">
									  	<label>
									  		<input type="radio" name="payment" value="COD">COD
									  	</label>
									</div>
									@if ($errors->has('payment'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('payment') }}</strong>
	                                    </span>
	                                @endif
								</div>
							</div>

							<div class="text-right">
								<button class="btn btn-success btn-lg">
									Confirm Order
								</button>
							</div>
						</form>
					@endif
				</div>
			</div>
		</div>
	</div>
			
@endsection