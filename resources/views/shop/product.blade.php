@extends('layouts.shop')

@section('content')
<?php
    $orders = session()->get('orders');
    $items = array();
    if(!empty($orders)){
        foreach ($orders as $order) {
            foreach ($order as $key => $value) {
                array_push($items, $key);
            }
        }
    }
?>
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-header">Product Details</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="text-center">
				<img src="{{asset('img/products/'.$product->image)}}"  style="width: 100%">
			</div>
			<div class="row" style="padding: 20px;">
				<div class="col-md-6 text-right">
					@if(!empty($items) and in_array($product->id, $items))
	                    <button class="btn btn-danger btn-block disabled">
	                    	Added to cart
	                    </button>
	                    <br>
	                @else
	                    <form method="POST" action="{{url('addtocart')}}">
	                        {{method_field('PUT')}}
	                        {{csrf_field()}}
	                        <input type="hidden" name="product_id" value="{{$product->id}}">
	                        <button class="btn btn-danger btn-block">Add to Cart</button>
	                    </form>
	                @endif
				</div>
				<div class="col-md-6">
					@if(!empty($items) and in_array($product->id, $items))
	                    <a href="{{url('placeorder')}}" class="btn btn-danger btn-block">
	                    	Buy Now
	                    </a>
	                    <br>
	                @else
	                    <form method="POST" action="{{url('addtocart')}}">
	                        {{method_field('PUT')}}
	                        {{csrf_field()}}
	                        <input type="hidden" name="product_id" value="{{$product->id}}">
	                        <input type="hidden" name="buynow" value="1">
	                        <button class="btn btn-danger btn-block">Buy Now</button>
	                    </form>
	                @endif
				</div>
			</div>
		</div>
		<div class="col-md-6" style="border-left: 1px solid #e3e3e3;">
			<h2>{{$product->name}}</h2>
			<h3>{{$product->description}}</h3>
			<h3>
				@if($product->promotional_price == null)
					Price: {{$product->price}}
				@else
					Price: <del>{{$product->price}}</del> {{$product->promotional_price}}
				@endif
			</h3>
			<h3>Shipping: In {{$product->handling_time}} working days</h3>
			<h3>Category: {{$product->category->name}}</h3>
			
		</div>
	</div>

	<ul class="nav nav-tabs">
	    <li class="{{($errors->has('review') or session('review')) ? '' : 'active'}}">
	    	<a data-toggle="tab" href="#features">Features</a>
	    </li>
	    <li class="{{($errors->has('review') or session('review')) ? 'active' : ''}}">
	    	<a data-toggle="tab" href="#reviews">Reviews</a>
	    </li>
	</ul>

	<div class="tab-content">
	    <div id="features" class="tab-pane fade{{($errors->has('review') or session('review')) ? '' : ' in active'}}">
		    <h3>Product Features</h3>
		    	@foreach($product->features as $feature)
		    	<div class="row">
		    		<div class="col-md-4">
		    			{{$feature->name}}
		    		</div>
		    		<div class="col-md-4">
		    			{{$feature->detail}}
		    		</div>
		    	</div>
		    	@endforeach
		</div>
		<div id="reviews" class="tab-pane fade{{($errors->has('review') or session('review')) ? ' in active' : ''}}">
			<h3>Reviews</h3>
			<div class="row">
				<div class="col-md-6">
					@if(session('review'))
						<div class="alert alert-success">
							{{session('review')}}
						</div>
					@endif
					@if(!Auth::check())
				    	<a href="{{url('login')}}" class="btn btn-link">
				    		Please login to add review
				    	</a>
				    @else
				    	<form method="POST" action="{{url('addreview/'.$product->id)}}">
				    		{{csrf_field()}}
				    		<div class="form-group{{$errors->has('review') ? ' has-error' : ''}}">
				    			<label for="review" class="control-label">Review:</label>
				    			<textarea class="form-control" name="review"></textarea>
				    		</div>
				    		<button class="btn btn-success">Add review</button>
				    	</form>
				    @endif
				    @foreach($product->reviews as $review)
				    	<blockquote>
				    		<p>{{$review->review}}</p>
				    		<footer>By {{$review->user->name}}</footer>
				    	</blockquote>
				    @endforeach
				</div>
			</div>
		    
				    
		</div>
	</div>

@endsection