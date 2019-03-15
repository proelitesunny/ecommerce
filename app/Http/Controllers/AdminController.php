<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
	public function __construct(){
		$this->middleware(['auth', 'admin']);
	}
    public function users(){
    	$admins = User::where('role', 'admin')->get();
    	$staffs = User::where('role', 'staff')->get();
    	$customers = User::where('role', 'customer')->get();

    	return view('users', compact('admins', 'staffs', 'customers'));
    }

    public function makeAdmin($id){
    	$user = User::find($id);
    	$user->role = 'admin';
    	$user->save();
    	return back()->with('message', 'User data updated...');
    }
    public function makeStaff($id){
    	$user = User::find($id);
    	$user->role = 'staff';
    	$user->save();
    	return back()->with('message', 'User data updated...');
    }
    public function makeCustomer($id){
    	$user = User::find($id);
    	$user->role = 'customer';
    	$user->save();
    	return back()->with('message', 'User data updated...');
    }
    public function removeUser($id){
        $user = User::find($id);
        $user->orders()->delete();
        $user->enquiries()->delete();
        $user->wishlists()->delete();
        $user->addresses()->delete();
        $user->delete();
        return back()->with('message', 'User removed successfully...');
    }
}
