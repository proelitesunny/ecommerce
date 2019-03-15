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
<div class="col-md-12 text-center">
    {{$products->links()}}    
</div>

@foreach($products as $product)
    <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
            <img src="{{asset('img/products/'.$product->image)}}" alt="">
            
            <div class="caption text-center"> 
                <h4>
                    <a href="{{url('products/'.$product->id)}}">
                        {{$product->name}}
                    </a>
                </h4>
                @if($product->promotional_price == null)
                    <h4>Rs. {{$product->price}}</h4>
                @else
                    <h4>Rs. <del>{{$product->price}}</del> {{$product->promotional_price}}</h4>
                @endif
                <p>{{$product->description}}</p>
            </div>
            <div class="ratings">  
                @if(!empty($items) and in_array($product->id, $items))
                    <button class="btn btn-primary disabled">Added to cart</button>
                    <br>
                @else
                    <form method="POST" action="{{url('addtocart')}}">
                        {{method_field('PUT')}}
                        {{csrf_field()}}
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <button class="btn btn-primary">Add to Cart</button>
                    </form>
                @endif

                @if(Auth::check())
                    <br>
                    <form method="POST" action="{{url('addtowishlist/'.$product->id)}}">
                        {{csrf_field()}}
                        <button class="btn btn-warning">Add to Wish List</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endforeach

<div class="col-md-12 text-center">
    {{$products->links()}}    
</div>