<?php

namespace App\Http\Controllers\Post;
use App\Category;
use App\Posts;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddController extends Controller
{
    public function addPost(Request $request)
    {
        $valid = $request->validate([
            'name'    => 'required|min:4|max:100',
            'year'    => 'required|min:1|max:100',
            'status'  => 'required|min:3|max:100',
            'content' => 'required|min:4',
            'image'   => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        if($request->hasFile('image')) {
            $image = $request->image;
            $imageName = uniqid(). '.' .$image->getClientOriginalExtension();
            $image->move('assets/images/posts/', $imageName);
        }
        $review = new Posts();
        $review->name = $request->input('name');
        $review->content = $request->input('content');
        $review->image = $imageName;
        $review->status = $request->input('status');
        $review->year = $request->input('year');
        $review->categories_id = $request->input('cat_id');
        $review->save();

        return redirect()->route('home');
    }
}
