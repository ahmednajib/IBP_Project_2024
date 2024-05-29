<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;

class UserController extends Controller
{
    public function dashboard(){
        if(Session::has('UserloginId')){
            $data = User::where('id','=',Session::get('UserloginId'))->first();
            $products = Product::all();
            return view('user.dashboard',compact('data','products'));
        }
        return view('login');
    }
    public function product_desc($id){
        if(Session::has('UserloginId')){
            $data = User::where('id','=',Session::get('UserloginId'))->first();
            $product = Product::where('id','=',$id)->first();
            return view('user.product.show-product-desc',compact('data','product'));
        }
        return view('login');
    }
    public function settings(){
        if(Session::has('UserloginId')){
            $data = User::where('id','=',Session::get('UserloginId'))->first();
            return view('user.updatepw',compact('data'));
        }
        return view('login');
    }
    public function update_pw(Request $request){
        $request->validate([
            'oldpassword'=>'required',
            'password'=>'sometimes|confirmed',

        ]);
        $user = User::where('id', '=', Session::get('UserloginId'))->first();

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
        if(Session::has('UserloginId')){
            if (request()->input('search')) {
                $products = Product::where('title', 'LIKE', '%' . request()->input('search') . '%')
                    ->orwhere('description', 'LIKE', '%' . request()->input('search') . '%')->get();
            } else {
                $products = Product::all();
            }
            $data = User::where('id','=',Session::get('UserloginId'))->first();
            return view('user.dashboard', [
                'products' => $products,
                'data' => $data
            ]);
        }
        return view('login');
    }

}
