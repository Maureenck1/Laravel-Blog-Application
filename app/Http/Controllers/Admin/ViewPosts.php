<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\facades\Input;
use App\Post;
Use App\User;
class ViewPosts extends Controller
{
    public function individualPosts(){
        $id = auth()->user()->id;
// return $id;
        $posts = User::find($id)->posts;

        return view('admin\allposts', compact('posts'));

    }

    public function personalDetails(){
        return view('admin\personalDetails');
    }

    //This method id used to update the user details of the users.
    public function updateUser(){
        $name = Input::get('name');
        $id = Input::get('id');
        $email = Input::get('email');
        $role = Input::get('role');

        $User = User::find($id);
        $User->name = $name;
        $User->email = $email;

        $User->save();
        $User->roles()->sync($role);
        
        $users = User::all();
        $id = 1;
        $message = "The User Has Been Updated.";
        return view('admin\users', compact('users','id','message'));

    }

}
