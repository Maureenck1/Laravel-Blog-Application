<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
Use App\Role;
use App\Comment;
use Illuminate\Support\facades\Input;
class LoadController extends Controller
{
    public function home(){
        $posts = Post::all();
        $value ="String";
       
        return view('welcome', compact('posts','value'));
    }
    public function singleBlog($user_id,$id){
        $blogItem= Post::find($id);
        $user = Post::find($user_id)->user;
        $comments = Post::find($id)->comments;
        return view('users\singleBlog', compact('blogItem','user','comments'));

        // return $user->name;
    }

    public function handleBlogComment(){
        $name = Input::get('name');
        $email = Input::get('email');
        $comment = Input::get('comment');
        $id = Input::get('blogItemId');

        $Comment = new Comment(array(
                        'name' => $name,
                        'email' => $email,
                        'post_id' => $id,
                        'comment' => $comment,
        ));
        $Comment->save();
        return back();
    }
}
