<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {

        $users =User ::orderBy('id')->paginate(10);
        return view('admin.pages.user.create', compact('users'));

    }

    public function edit(User $user)
    {

        return view('admin.pages.user.edit', compact('user'));
    }

    public function create()
    {
        return view('admin.pages.user.create');
    }

    public function store(Request $request)
    {

        $user_arr = [];
        foreach ($request->all() as $key => $value) {
            if ($key == '_token') continue;//skip token
            $user_arr[$key] = $value;
        }

        if ($request->has('password')) {
            $user_arr['password'] = Hash::make($request->password);
        }

        User ::create($user_arr);
        return redirect()->route('users.all.index')->with(['success' => " تم  بنجاح"]);
    }

    public function update(Request $request, User $user)
    {

        $update_arr = [];
        foreach ($request->all() as $key => $value) {
            /**
             * 'title' => 'My Title'
             * $key => $value
             */
            if ($key == '_token') continue;//skip token
            $update_arr[$key] = $value;
        }

//        if ($request->hasFile('photo')) {
//            $update_arr['photo'] = $request->photo->user('public/user/photo');
//        }




        $user->update($update_arr);
        return redirect()->route('users.all.index')->with(['success' => " تم  بنجاح"]);
    }

    public function delete(User $user)
    {

        $user->delete();
        return redirect()->route('users.all.index')->with(['error' => " تم  بنجاح"]);
    }


}


