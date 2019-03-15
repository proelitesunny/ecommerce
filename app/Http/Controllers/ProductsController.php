<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Feature;
use Image;
use Storage;

class ProductsController extends Controller
{

	public function __construct(){
		$this->middleware(['auth', 'admin']);
	}
	public function index(){
		$products = Product::orderBy('created_at', 'desc')->paginate(10);
		return view('products.index', compact('products'));
	}

	public function create(){
		$categories = Category::all();
		return view('products.create', compact('categories'));
	}

	public function store(Request $request){
		$message = [
			'name.required' => 'Product name can not be empty',
			'description.required' => 'Product description can not be empty',
			'description.min' => 'Minimum 10 characters are required',
			'price.required' => 'How much your product costs?',
			'category.required' => 'Select a caegory for your product',
			'handling_time.required' => 'How much time you will take to deliver item',
			'handling_time.numeric' => 'Enter number of days',
			'expiring_date.required' => 'Expiring date cannot be empty'
		];
		$this->validate($request, [
			'name' => 'required',
			'description' => 'required|min:10',
			'price' => 'required',
			'category' => 'required|numeric',
			'handling_time' => 'required|numeric',
			'expiring_date' => 'required'
		], $message);
		
		$product = new Product;
		$product->name = $request->name;
		$product->description = $request->description;
		$product->price = $request->price;
		$product->handling_time = $request->handling_time;
		$product->expiring_date = $request->expiring_date;
		if ($request->hasFile('image')) {
	    	$image = $request->file('image');
	    	$filename = time() . '.' . $image->getClientOriginalExtension();
	    	Image::make($image)->resize(250, 250)->save('img/products/'.$filename);
	    	$product->image = $filename;
	    }
		$product->category_id = $request->category;
		$product->save();

		return back()->with('message', 'Product Added Successfully...');
	}

	public function edit($id){
		$product = Product::find($id);
		$categories = Category::all();
		return view('products.edit', compact('product', 'categories'));
	}
	public function update($id, Request $request){
		$message = [
			'name.required' => 'Product name can not be empty',
			'description.required' => 'Product description can not be empty',
			'description.min' => 'Minimum 10 characters are required',
			'price.required' => 'How much your product costs?',
			'category.required' => 'Select a caegory for your product',
			'handling_time.required' => 'How much time you will take to deliver item',
			'handling_time.numeric' => 'Enter number of days',
			'expiring_date.required' => 'Expiring date cannot be empty'
		];
		$this->validate($request, [
			'name' => 'required',
			'description' => 'required|min:10',
			'price' => 'required',
			'category' => 'required|numeric',
			'handling_time' => 'required|numeric',
			'expiring_date' => 'required'
		], $message);

		$product = Product::find($id);
		$product->name = $request->name;
		$product->description = $request->description;
		$product->price = $request->price;
		$product->handling_time = $request->handling_time;
		$product->expiring_date = $request->expiring_date;
		if ($request->hasFile('image')) {
			if (!($product->image == 'default.png')) {
				Storage::delete('img/products/'.$product->image);
			}
			
        	$image = $request->file('image');
        	$filename = time() . '.' . $image->getClientOriginalExtension();
        	Image::make($image)->resize(250, 250)->save('img/products/'.$filename);
        	$product->image = $filename;
        }
		$product->category_id = $request->category;
		$product->save();

		return back()->with('message', 'Product Details updated Successfully...');
	}

	public function destroy($id, Request $request){
		$product = Product::find($id);
		$product->delete();
		return back()->with('message', 'Product deleted Successfully...');
	}

    public function categories(){
    	$categories = Category::all();
    	return view('categories', compact('categories'));
    }

    public function addCategory(Request $request){
    	
    	$message = [
    		'name.required' => 'Please enter category name'
    	];
    	$this->validate($request, [
    		'name' => 'required'
		], $message);

    	$category = new Category;
    	$category->name = $request->name;
    	$category->save();
    	return back()->with('message', 'Category added Successfully...');
    }

    public function removeCategory($id){
    	$category = Category::find($id);
    	$category->delete();
    	return back()->with('deletemessage', 'Category deleted Successfully...');
    }

    public function active($id, Request $request){
    	$messages = [
    		'is_active' => 'Some error occured'
    	];
    	$this->validate($request, [
    		'is_active' => 'required|numeric|max:1'
    	], $messages);

    	$product = Product::find($id);
    	$product->is_active = $request->is_active;
    	$product->save();

    	return back();
    }

    public function promotional(){
    	$products = Product::where('is_active', 1)->orderBy('created_at', 'desc')->paginate(10);
    	return view('promotional', compact('products'));
    }

    public function createPromotion($id, Request $request){
    	$product = Product::find($id);
    	$product->promotional_price = $request->promotional_price;

    	$product->save();
    	return back();
    }

    public function removePromotion($id){
    	$product = Product::find($id);
    	$product->promotional_price = null;

    	$product->save();
    	return back();
    }

    public function features($id){
    	$product = Product::find($id);
    	return view('products.features', compact('product'));
    }
    public function addFeature($id, Request $request){

    	$this->validate($request, [
    		'name' => 'required',
    		'detail' => 'required'
    	]);
    	$feature = new Feature;
    	$feature->name = $request->name;
    	$feature->detail = $request->detail;
    	$feature->product_id = $id;
    	$feature->save();

    	return back()->with('addmessage', 'Feature added');
    }

    public function removeFeature($id){
    	$feature = Feature::find($id);
    	$feature->delete();
    	return back()->with('removemessage', 'Feature removed');
    }
}
