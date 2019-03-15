<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enquiry;
use App\Slide;
use Image;

class StaffController extends Controller
{
    public function __construct(){
        return $this->middleware(['auth', 'staff']);
    }
    public function answered(){
    	$enquiries = Enquiry::where('reply', '!=', null)->get();
    	return view('staff.answered', compact('enquiries'));
    }

    public function unanswered(){
    	$enquiries = Enquiry::where('reply', null)->get();
    	return view('staff.unanswered', compact('enquiries'));
    }

    public function showEnquiry($id){
    	$enquiry = Enquiry::find($id);
    	return view('staff.enquiry', compact('enquiry'));
    }

    public function submitReply($id, Request $request){
    	$this->validate($request, [
    		'reply' => 'required'
    	]);

    	$enquiry = Enquiry::find($id);
    	$enquiry->reply = $request->reply;
    	$enquiry->save();

    	return back();
    }
    public function createSlider(){
        return view('slider.create');
    }
    public function indexSlider(){
        $slides = Slide::all();
        return view('slider.index', compact('slides'));
    }
    public function storeSlider(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required'
        ]);

        $slide = new Slide;
        $slide->name = $request->name;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(800, 300)->save('img/slides/'.$filename);
            $slide->image = $filename;
        }
        $slide->save();
        return back()->with('message', 'Slide has been added...');
    }
    public function removeSlider($id){
        $slide = Slide::find($id);
        $slide->delete();
        return back()->with('message', 'Slider deleted successfully...');
    }
}
