<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard(){
        if(Session::has('AdminloginId')){
            $data = User::where('id','=',Session::get('AdminloginId'))->first();
            $users=User::all();
            $products=Product::all();
            return view('admin.dashboard',compact('data','users','products'));
        }
        return view('login');
    }
    public function announcement(){
        if(Session::has('AdminloginId')){
            $data = User::where('id','=',Session::get('AdminloginId'))->first();
            $products = Product::all();
            return view('admin.announcement',compact('data','products'));
        }
        return view('login');
    }

    public function register_page(){
        if(Session::has('AdminloginId')){
            $data = User::where('id','=',Session::get('AdminloginId'))->first();
            return view('admin.users.register-user',compact('data'));
        }
        return view('login');
    }
    public function register_user(Request $request){
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'username'=>'required',
            'password'=>'required|min:5|max:20',
            'birthdate'=>'required',
            'permission'=>'required',
            'image'=>'required',

        ]);
        $user = new User();
        $user->first_name = $request->firstname;
        $user->last_name = $request->lastname;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->birth_date = $request->birthdate;
        $user->permission = $request->permission;
        $user->image = $request->image;
        $res = $user->save();
        if($res){
            return back()->with('success','User registered successfully');
        }
        else{
            return back()->with('fail','something wrong happen.Try later');
        }

    }
    public function show_users(){
        if(Session::has('AdminloginId')){
            $data = User::where('id','=',Session::get('AdminloginId'))->first();
            $users=User::all();
            return view('admin.users.show-users',compact('data','users'));
        }
        return view('login');
    }

    public function edit_user($id){
        if(Session::has('AdminloginId')){
            $data = User::where('id','=',Session::get('AdminloginId'))->first();
            $user_data = User::where('id','=',$id)->first();
            return view('admin.users.edit-user',compact('data','user_data'));
        }
        return view('login');

    }
    public function update_user(Request $request){
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'username'=>'required',
            'password'=>'required|min:5|max:20',
            'birthdate'=>'required',
            'image'=>'required',

        ]);
        $id = $request->id;
        $first_name = $request->firstname;
        $last_name = $request->lastname;
        $username = $request->username;
        $password = Hash::make($request->password);
        $birth_date = $request->birthdate;
        $image = $request->image;
        $res = User::where('id','=',$id)->update([
            'id'=>$id,
            'first_name'=>$first_name,
            'last_name'=>$last_name,
            'username'=>$username,
            'password'=>$password,
            'birth_date'=>$birth_date,
            'image'=>$image
        ]);
        if($res){
            return back()->with('success','User updated successfully');
        }
        else{
            return back()->with('fail','something wrong happen.Try later');
        }

    }
    public function delete_user($id){

        $res = User::where('id','=',$id)->delete();
        if($res){
            return back()->with('success','User deleted successfully');
        }
        else{
            return back()->with('fail','something wrong happen.Try later');
        }

    }
    public function settings(){
        if(Session::has('AdminloginId')){
            $data = User::where('id','=',Session::get('AdminloginId'))->first();
            return view('admin.updatepw',compact('data'));
        }
        return view('login');
    }
    public function update_pw(Request $request){
        $request->validate([
            'oldpassword'=>'required',
            'password'=>'sometimes|confirmed',

        ]);
        $user = User::where('id', '=', Session::get('AdminloginId'))->first();

        if(Hash::check($request->oldpassword,$user->password)){
            $res = User::where('id','=',$user->id)->update([
                'password'=>Hash::make($request->password)
            ]);
            if($res){
                return back()->with('success','Password updated successfully');
            }
        }
        else{
            return back()->with('fail','something wrong happen.Try later');
        }
    }
    public function search(){
        if(Session::has('AdminloginId')){
        if (request()->input('search')) {
            $products = Product::where('title', 'LIKE', '%' . request()->input('search') . '%')
                ->orwhere('description', 'LIKE', '%' . request()->input('search') . '%')->get();
        } else {
            $products = Product::all();
        }
        $data = User::where('id','=',Session::get('AdminloginId'))->first();
        return view('admin.announcement', [
            'products' => $products,
            'data' => $data
        ]);
        }
        return view('login');
    }
    public function product_desc($id){
        if(Session::has('AdminloginId')){
            $data = User::where('id','=',Session::get('AdminloginId'))->first();
            $product = Product::where('id','=',$id)->first();
            return view('admin.Products.show-product-desc',compact('data','product'));
        }
        return view('login');
    }

}
