<?php

namespace App\Http\Controllers;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
// use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
// use Illuminate\Notifications\Notifiable;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

use App\User;
use App\Post;
use App\Role;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {    


        $user_id = auth()->user()->id;
        // Entrust::hasRole('Manager');
     
         if (auth()->user()->hasRole('Member')){
            $id = auth()->user()->id;           
             $posts = User::find($id)->posts;
            
            return view('admin\allposts', compact('posts'));
            
           
         }
         else if(auth()->user()->hasRole('Manager')){
            $users = User::all();
            $id = 1;
            return view('manager\dashboard');
         }
         else{
             return "No Role Is Assighned To You";
         }
    }
}
