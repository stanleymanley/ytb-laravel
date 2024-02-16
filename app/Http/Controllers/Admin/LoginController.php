<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function indexPage()
    {
        if(Auth::check()){
            return redirect('/admin/dashboard');
        }
        return view('admin.pages.auth.login');
    }

    public function signin(Request $request)
    {

        $validate = Validator::make($request->all(),[
            'username' => 'required',
            'password' => 'required'
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $user=User::where('username',$request->username)->first();
        if(!$user){
            return redirect()->back()->with(['error'=>'Akun tidak ditemukan']);
        }

        if (!$user || !Hash::check($request->password, $user->password)) {
            return redirect()->back()->with(['error' => 'Username atau password anda salah']);
        }

        Auth::login($user);
        return redirect('/admin/dashboard')->with(['login_success' => 'Selamat datang']);
    }
}
