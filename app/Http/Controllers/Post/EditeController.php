<?php

namespace App\Http\Controllers\Post;
use App\Category;
use App\Posts;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditeController extends Controller
{
    public function updatePost(Request $request)
    {
//        dd($request->text);
        $post = Posts::find($request->id);
        $post->update(['name' => $request->name, 'content' => $request->text]);

        $post->name = $request->name;
        $post->content = $request->text;
        $post->save();
        return redirect()->route('post');
    }
}
// 	name +	img +	video +	trailer +	age_rating +	year +	country +	tagline +	producer +	genre_id +	time +	starring_id +	text

