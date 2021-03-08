<?php

namespace App\Http\Controllers;

use App\Category;
use App\Posts;
use App\User;
use Illuminate\Http\Request;
//use MBFS\Post;

class MainController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function post()
    {
//        $categories = Category::all();
//        return view('post', ['categories' => $categories]);
        $posts = Posts::all();
//        dd($posts);
        return view('post', ['posts' => $posts]);
//        return view('post');
    }

    public function addCategory()
    {
        $cat = Category::all();
        return view('addCategory', ['cat' => $cat]);
    }

    public function about()
    {
        return view('about');
    }

    public function review()
    {
        return view('review');
    }

    public function registration()
    {
        return view('registration');
    }

    public function addPost()
    {
//        return view('addPost');
        $cat = Category::all();
        return view('addPost', ['cat' => $cat]);
    }

    public function editpost(Request $request)
    {
        $post = Posts::find($request->id);
        return view('editpost', ['post' => $post]);
    }



//    public function addCategory_check(Request $request)
//    {
//        $valid = $request->validate([
//            'name' => 'required|min:4|max:100',
//        ]);
//        $review = new Category();
//        $review->cat_name = $request->input('name');
//        $review->status = $request->input('status');
//        $review->parent_id = $request->input('parent');
//
//        $review->save();
//
//        return redirect()->route('addCategoryPage');
//    }






    public function review_check(Request $request)
    {
        $valid = $request->validate([
            'email' => 'required|min:4|max:100',
            'subject' => 'required|min:4|max:100',
            'info' => 'required|min:4|max:100'
        ]);
    }

    public function registration_check(Request $request)
    {
        $valid = $request->validate([
            'fname' => 'required|min:4|max:100',
            'lname' => 'required|min:4|max:100',
            'email' => 'required|min:4|max:100',
            'country' => 'required|min:4|max:100',
            'pass' => 'min:3|required_with:confirm_pass|same:confirm_pass',
            'confirm_pass' => 'min:3'
        ]);
        $review = new User();
        $review->fname = $request->input('fname');
        $review->lname = $request->input('lname');
        $review->email = $request->input('email');
        $review->country = $request->input('country');
        $review->password = $request->input('pass');
        $review->save();

        return redirect()->route('registration');


    }

    public function postRegister(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();

        $check = $this->create($data);

        return Redirect::to("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }
}
