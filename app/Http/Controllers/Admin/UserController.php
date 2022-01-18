<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Input;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\User;
use App\Post;
// use Alert;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $id = 1;
        // Alert::message('Robots are working!');
        return view('admin\users', compact('users','id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post(array(
            'title'=> $request->get('name'),
            'content'=> $request->get('message'),
            'user_id'=> auth()->user()->id
            
        ));

        $post->save();

        $id = auth()->user()->id;           
        $posts = User::find($id)->posts;
        Alert::success('Success Title', 'Added the success title');
       return view('admin\allposts', compact('posts'));
        // return redirect('admin/users')->with('status','Added Post.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = $request->get('id');
        $post = Post::find($id);
        $post->title = $request->get('title');
        $post->content = $request->get('content');

        $post->save();

        return back();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Input::get('hidden');
        $posts = Post::find($id);
        $posts->delete();
        Alert::warning('Message !!', 'The Post Has Been Deleted.');
        return back();
        // return $id;
    }

}
