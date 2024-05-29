<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $user = User::where('username', '=', $request->username)->first();

            $credentials = [
                'username' => $data['username'],
                'password' => $data['password'],
            ];

            if (Auth::guard('user')->attempt($credentials)) {


                $permission = $user->permission;


                if ($permission == 1) {
                    $request->session()->put('AdminloginId', $user->id);
                    return redirect('admin/dashboard');
                } else {
                    $request->session()->put('UserloginId', $user->id);
                    return redirect('user/dashboard');
                }
            }

            return redirect()->back()->with('error', 'Invalid Username or Password!');
        }

        return view('login');
    }




    public function logout(){
        Auth::guard('user')->logout();
        return redirect('login');
    }
}
