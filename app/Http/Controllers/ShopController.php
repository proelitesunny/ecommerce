<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Order;
use App\Enquiry;
use App\WishList;
use App\Address;
use App\Review;
use App\Slide;
use Auth;

class ShopController extends Controller
{
    public function index(){
        $slides = Slide::all();
    	$categories = Category::all();
    	$products = Product::where('is_active', 1)->orderBy('created_at', 'desc')->paginate(9);
    	return view('shop.index', compact('categories', 'products', 'slides'));
    }

    public function categories($id){
    	$cat = Category::where('id', $id)->pluck('name')->first();
    	$categories = Category::all();
    	$products = Category::find($id)->products()->where('is_active', 1)->orderBy('created_at', 'desc')->paginate(9);
    	return view('shop.categories', compact('products', 'cat', 'categories'));
    }

    public function search(Request $request){
        $categories = Category::all();
        $products = Product::where('name', 'like', '%'.$request->q.'%')->paginate(10);
        return view('shop.search', compact('categories', 'products'));
    }

    public function products($id){
    	$product = Product::find($id);
    	$categories = Category::all();
    	return view('shop.product', compact('product', 'categories'));
    }

    public function cart(Request $request){
    	$orders = session()->get('orders');
        $items = array();
        
    	$categories = Category::all();
    	
    	if(!empty($orders)){
            foreach ($orders as $order) {
                foreach ($order as $key => $value) {
                    array_push($items, $key);
                }
            }
    		$products = Product::find($items);
    		$error = false;
    	}
    	else{
    		$error = true;
    		$products = [];
    	}
    	return view('shop.cart', compact('categories', 'products', 'error'));
    }

    public function addToCart(Request $request){
    	$request->session()->push('orders', [
            $request->product_id => 1
        ]);
        if($request->has('buynow'))
            return redirect('placeorder');
        else
    	   return back()->with('message', 'Added to cart successfully...');
    }

    public function removeFromCart($id, Request $request){
    	$orders = $request->session()->get('orders');
        foreach ($orders as $order_key => $order) {
            foreach ($order as $key => $value) {
                if($key == $id){
                    unset($orders[$order_key]);
                }
            }
        }
        $request->session()->put('orders', $orders);
    	return back();
    }

    public function updateCart($id, Request $request){
        $orders = $request->session()->get('orders');
        foreach ($orders as $order_key => $order) {
            foreach ($order as $key => $value) {
                if($key == $id){
                    $orders[$order_key][$id] = $request->quantity;
                }
            }
        }
        $request->session()->put('orders', $orders);
        return back();
    }

    public function placeOrder(Request $request){
        $orders = $request->session()->get('orders');
        if(!empty($orders)){
            $addresses = Auth::user()->addresses()->orderBy('created_at', 'DESC')->get();
            $error = false;
            $amount = 0;
            foreach ($orders as $order) {
                foreach ($order as $key => $value) {
                    $product = Product::find($key);
                    if($product->promotional_price == null)
                        $amount += ($product->price * $value);
                    else
                        $amount += ($product->promotional_price * $value);
                }
            }
        }
        
        else{
            $error = true;
            $amount = 0;
        }
    	return view('shop.placeorder', compact('amount', 'error', 'addresses'));
    }

    public function confirmOrder(Request $request){

        $messages = [
            'address.required' => 'Please select the delivery address',
            'payment.required' => 'Choose payment method from available option'
        ];

        $this->validate($request, [
            'address' => 'required',
            'payment' => 'required'
        ], $messages);

        $deliveryaddress = Address::find($request->address);

        $orders = $request->session()->get('orders');
        foreach ($orders as $order_key => $order) {
            foreach ($order as $key => $value) {

                $product = Product::find($key);

                if($product->promotional_price == null)
                    $amount = ($product->price * $value);
                else
                    $amount = ($product->promotional_price * $value);

                $order = new Order;
                $order->product_id = $key;
                $order->user_id = Auth::user()->id;
                $order->quantity = $value;
                $order->price = $amount;
                $order->address = $deliveryaddress->address;
                $order->pin = $deliveryaddress->pin;
                $order->landmark = $deliveryaddress->landmark;
                $order->mobile = $deliveryaddress->mobile;
                $order->payment = $request->payment;
                $order->save();
            }
            unset($orders[$order_key]);
            $request->session()->put('orders', $orders);
        }
        return redirect('thankyou')->with('message', 'success');
    }

    public function thankYou(){
        return view('shop.thankyou');
    }

    public function myOrders(){
        $orders = Auth::user()->orders;
        return view('shop.myorders', compact('orders'));
    }

    public function help(){
        return view('shop.help');
    }

    public function trackOrder(){
        $orders = Auth::user()->orders->where('status', 's');
        return view('shop.trackorder', compact('orders'));
    }

    public function cancelOrder(){

        $orders = Auth::user()->orders->where('status', 'c');
        return view('shop.cancelorder', compact('orders'));
    }

    public function cancel($id){
        $order = Order::find($id);
        $order->status = 'can';
        $order->save();

        return back()->with('message', 'Your order has been canceled');
    }

    public function enquiry(){
        return view('shop.enquiry');
    }

    public function submitEnquiry(Request $request){
        $messages = [
            'title.required' => 'Please Enter a title',
            'message.required' => 'Enter your query here'
        ];

        $this->validate($request, [
            'title' => 'required',
            'message' => 'required'
        ], $messages);
        
        $enquiry = new Enquiry;
        $enquiry->title = $request->title;
        $enquiry->message = $request->message;
        $enquiry->user_id = Auth::user()->id;
        $enquiry->save();
        return back()->with('message', 'You query has been submitted. We will get to you ASAP.');
    }

    public function myEnquiries(){
        $enquiries = Auth::user()->enquiries;
        return view('shop.myenquiries', compact('enquiries'));
    }

    public function myEnquiry($id){
        $enquiry = Enquiry::find($id);
        return view('shop.myenquiry', compact('enquiry'));
    }

    public function myWishList(){
        $categories = Category::all();
        $wishlists = Auth::user()->wishlists()->orderBy('created_at', 'desc')->paginate(10);
        return view('shop.mywishlist', compact('wishlists', 'categories'));
    }
    public function addToWishList($id){
        $wish = new WishList;
        $wish->user_id = Auth::user()->id;
        $wish->product_id = $id;
        $wish->save();

        return back()->with('message', 'Added to wish list successfully...');
    }
    public function removeFromWishList($id){
        $wish = WishList::find($id);
        $wish->delete();
        return back()->with('message', 'Removed from your wishlist.');
    }

    public function addAddress(Request $request){
        $messages = [
            'address.required' => 'Enter address',
            'pin.required' => 'Enter PIN',
            'landmark.required' => 'Enter any landmark',
            'landmark.max' => 'Max 50 characters are allowed',
            'mobile.required' => 'Please Enter mobile number',
            'mobile.numeric' => 'Mobile number must be numeric'
        ];
        $this->validate($request, [
            'address' => 'required',
            'pin' => 'required|max:8',
            'landmark' => 'required|max:50',
            'mobile' => 'required|numeric'
        ], $messages);

        $address = new Address;
        $address->user_id = Auth::user()->id;
        $address->address = $request->address;
        $address->pin = $request->pin;
        $address->landmark = $request->landmark;
        $address->mobile = $request->mobile;

        $address->save();
        return back()->with('addmessage', 'Address added...');
    }

    public function removeAddress($id){
        $address = Address::find($id);
        $address->delete();
        return back()->with('removemessage', 'Address removed.');
    }
    public function myAddresses(){
        $addresses = Auth::user()->addresses()->orderBy('created_at', 'DESC')->get();
        return view('shop.myaddresses', compact('addresses'));
    }

    public function addReview($id, Request $request){
        $this->validate($request, [
            'review' => 'required'
        ]);
        $review = new Review;
        $review->user_id = Auth::user()->id;
        $review->product_id = $id;
        $review->review = $request->review;

        $review->save();
        return back()->with('review', 'Your review has been submitted.');
    }
}
