<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Input;
use App\Category;
class Dashboard extends Controller
{
    public function dashboard(){
        return view('manager\dashboard');
    }
    public function viewAllUsers(){

        $users = User::all();
        $id = 1;
        return view('admin\users', compact('users','id'));
    }
    public function ManageCateories(){
        $categories = Category::all();
        $id = 1;
        return view('manager\categories', compact('categories','id'));
    }

    public function addCategory(){
       $name = Input::get('name'); 
       $description = Input::get('description');
        $category = new Category( array(
                                        'Name' => $name,
                                        'Description' => $description,
        ));
        $category->save();

       return back();
    }

    public function deleteCategory(){
        $id = Input::get('id');
        $category = Category::find($id);
        $category->delete();
        return back()->with('status', 'The Category Has Been Deleted.');
    }

    public function editCategory(){
        $id = Input::get('id');
        $name = Input::get('name');
        $description = Input::get('description');
        $category = Category::find($id);
        $category->Name = $name ;
        $category->Description = $description;
        $category->save();
        return back()->with('status', 'The Category Has Been Edited.');
    }
    public function showUpload(){
        return view('manager\upload');
    }
    public function upload(Request $request){
        $file = Input::get('image');
        if($request->hasFile('image')){
            
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            // return $name;
            // $file->move(public_path().'/images/'.$name);
            $file->storeAs('public/images', $name);

            return "Saved";
        }
        // $name = $file->getClientOriginalName();

        return "No Image.";
    }

    public function searchUser(){
        $userName = Input::get('username');
        return $userName;
    }
}
