<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Session;

class ProductsController extends Controller
{
    public function register_product_page(){
        if(Session::has('AdminloginId')){
            $data = User::where('id','=',Session::get('AdminloginId'))->first();
            return view('admin.Products.register-product',compact('data'));
        }
        return view('login');
    }
    public function register_product(Request $request){
        $request->validate([
            'title'=>'required',
            'company'=>'required',
            'publication_date'=>'required',
            'description'=>'required|min:15|max:200',
            'price'=>'required',
            'image'=>'required',

        ]);
        $product = new Product();
        $product->title = $request->title;
        $product->company = $request->company;
        $product->publication_date = $request->publication_date;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->cover_image = $request->image;
        $res = $product->save();
        if($res){
            return back()->with('success','Product registered successfully');
        }
        else{
            return back()->with('fail','something wrong happen.Try later');
        }
    }
    public function show_products(){
        if(Session::has('AdminloginId')){
            $data = User::where('id','=',Session::get('AdminloginId'))->first();
            $products = Product::all();
            return view('admin.Products.show-product',compact('data','products'));
        }
        return view('login');
    }
    public function edit_product($id){
        if(Session::has('AdminloginId')){
            $data = User::where('id','=',Session::get('AdminloginId'))->first();
            $product_data = Product::where('id','=',$id)->first();
            return view('admin.Products.edit-product',compact('data','product_data'));
        }
        return view('login');

    }
    public function update_product(Request $request){
        $request->validate([
            'title'=>'required',
            'company'=>'required',
            'publication_date'=>'required',
            'description'=>'required|min:15|max:200',
            'price'=>'required',
            'image'=>'required',

        ]);
        $id = $request->id;
        $title = $request->title;
        $company = $request->company;
        $publication_date = $request->publication_date;
        $description = $request->description;
        $price = $request->price;
        $cover_image = $request->image;
        $res = Product::where('id','=',$id)->update([
            'id'=>$id,
            'title'=>$title,
            'company'=>$company,
            'publication_date'=>$publication_date,
            'description'=>$description,
            'price'=>$price,
            'cover_image'=>$cover_image
        ]);
        if($res){
            return back()->with('success','Product updated successfully');
        }
        else{
            return back()->with('fail','something wrong happen.Try later');
        }

    }
    public function delete_product($id){

        $res = Product::where('id','=',$id)->delete();
        if($res){
            return back()->with('success','Product deleted successfully');
        }
        else{
            return back()->with('fail','something wrong happen.Try later');
        }

    }
}
