<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    public function indexPage()
    {
        return view('admin.pages.users.index');
    }

    public function list(Request $request)
    {
        $list = User::query();
        return datatables()->eloquent($list)->toJson();
    }

    public function addPage()
    {
        return view('admin.pages.users.add');
    }

    public function add(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $username_check=User::where('username',$request->username)->exists();
        if($username_check){
            return redirect()->back()->with(['error'=>'Username '.$request->username.' sudah digunakan']);
        }
        $user = new User();
        $user->name= ucwords($request->nama);
        $user->username = Str::slug($request->username,'.');
        $user->password = $request->password;
        $user->save();

        return redirect('/admin/users')->with(['success'=>'User '.$request->nama.' berhasil ditambahkan']);
    }

    public function editPage($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with(['error' => 'ID ' . $id . ' tidak ditemukan']);
        }
        $data['user'] = $user;
        return view('admin.pages.users.update',$data);
    }

    public function edit(Request $request,$id)
    {
        $validate = Validator::make($request->all(), [
            'nama' => 'required',
            'username' => 'required',
            // 'password' => 'required'
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with(['error' => 'ID ' . $id . ' tidak ditemukan']);
        }

        $username_check = User::where('username', $request->username)->where('id','!=',$id)->exists();
        if ($username_check) {
            return redirect()->back()->with(['error' => 'Username ' . $request->username . ' sudah digunakan']);
        }

        $user->name = ucwords($request->nama);
        $user->username = Str::slug($request->username, '.');
        if($request->filled('password')){
            $user->password = $request->password;
        }
        $user->save();

        return redirect('/admin/users')->with(['success' => 'User ' . $request->nama . ' berhasil diubah']);
    }

    public function remove($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with(['error' => 'ID ' . $id . ' tidak ditemukan']);
        }
        $user->delete();

        return redirect('/admin/users')->with(['success' => 'User ' . $user->nama . ' berhasil dihapus']);
    }
}
