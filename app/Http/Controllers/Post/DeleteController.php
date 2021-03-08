<?php

namespace App\Http\Controllers\Post;
use App\Category;
use App\Posts;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function deletePost(Request $request)
    {
        $post = Posts::find($request->id);
        $post->delete();
        return redirect()->route('post');
    }
}
