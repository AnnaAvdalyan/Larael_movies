<?php

namespace App\Http\Controllers;

use App\Category;
use App\Movies;
use App\Posts;
use App\Starring;
use App\User;

//use Auth;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashbord()
    {
        $users = User::all();
        $newUsers = User::orderBy('id', 'DESC')->take(5)->get();
        return view('/admin/dashbord', ['users' => $users, 'newUsers' => $newUsers]);
    }

    public function productList()
    {
        return view('admin/product-list');
    }

    public function productEdit()
    {
        $cat = Category::all();
        return view('admin/product-edit', ['cat' => $cat]);
    }

    public function categoryList()
    {
        $cat = Category::all();
        return view('admin/category-list', ['cat' => $cat]);
    }

    public function allUsers()
    {
        $users = User::all();
        return view('/admin/allUsers', ['users' => $users]);
    }

    public function allMovies()
    {
//        $movies = Movies::all();
//        $movies->users;
        $movies = Movies::find(1)->users;
        dd($movies);
        $ganre = json_decode($movies[0]->genre_id);
        dd($ganre[0]->cat_name);
//            return view('/admin/allMovies', ['movies' => $movies]);
    }

    public function addActor()
    {
        return view('/admin/addActor');
    }

    public function addActorCheck(Request $request)
    {


        $valid = $request->validate([
            'name' => 'required|min:4|max:100',
            'date_of_birth' => 'required|min:4',
            'place_of_birth' => 'required|min:4',
            'education' => 'required|min:4|max:100',
            'debut' => 'required|min:4',
            'family' => 'required|min:4',
            'text' => 'required|min:4',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        if ($request->hasFile('img')) {
            $image = $request->img;
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('assets/images/actors/', $imageName);
        }

        $review = new Starring();
        $review->name = $request->input('name');
        $review->img = "assets/images/actors/$imageName";
        $review->gallery = 'null';
        $review->date_of_birth = $request->input('date_of_birth');
        $review->place_of_birth = $request->input('place_of_birth');
        $review->family = $request->input('family');
        $review->education = $request->input('education');
        $review->debut = $request->input('debut');
        $review->biography = $request->input('text');
        $review->status = 'active';
        $review->user_id = Auth::user()->id;
        $review->save();
        return redirect()->route('addActor')->with('success', 'Actor successfully added.');

    }

    public function allActor()
    {
        $actor = Starring::all();
        return view('/admin/allActor', ['actors' => $actor]);
    }

    public function actor($id)
    {
        $actor = Starring::find(+$id);
        return view('/admin/actor', ['actor' => $actor]);
    }

    public function actorDelete($id)
    {
        $actor = Starring::find(+$id);
        if (File::exists(public_path($actor->img))) {
            File::delete(public_path($actor->img));
        }
        $actor->delete();
        return redirect()->route('allActor')->with('deleted', 'Actor is deleted.');
    }

    public function actorEdit($id)
    {
        $actor = Starring::find(+$id);
        return view('/admin/addActor', ['actor' => $actor]);
    }

    public function editActorCheck(Request $request, $id)
    {
        $actor = Starring::find(+$id);
        if ($actor->user_id == Auth::user()->id) {
            $valid = $request->validate([
                'name' => 'required|min:4|max:100',
                'date_of_birth' => 'required|min:4',
                'place_of_birth' => 'required|min:4',
                'education' => 'required|min:4|max:100',
                'debut' => 'required|min:4',
                'family' => 'required|min:4',
                'text' => 'required|min:4',
            ]);
            if ($request->hasFile('img')) {
                if (File::exists(public_path($actor->img))) {
                    File::delete(public_path($actor->img));
                }
                $image = $request->img;
                $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move('assets/images/actors/', $imageName);

                $actor->img = 'assets/images/actors/' . $imageName;
            }

            $actor->name = $request->input('name');
            $actor->date_of_birth = $request->input('date_of_birth');
            $actor->place_of_birth = $request->input('place_of_birth');
            $actor->family = $request->input('family');
            $actor->education = $request->input('education');
            $actor->debut = $request->input('debut');
            $actor->biography = $request->input('text');
            $actor->status = 'active';
            $actor->save();
            return redirect()->route('allActor')->with('success', 'Actor successfully edited.');

        } else {
            return view('/home');
        }
    }

    public function addMovieCheck(Request $request)
    {

        $valid = $request->validate([
            'name' => 'required|min:4|max:100',
            'year' => 'required|min:1|max:100',
            'age_rating' => 'required|min:1|max:100',
            'country' => 'required|min:1|max:100',
            'tagline' => 'required|min:1|max:100',
            'producer' => 'required|min:1|max:100',
            'time' => 'required|min:1|max:100',
            'genre_id' => 'required|min:1|max:100',
            'starring_id' => 'required|min:1|max:100',
            'text' => 'required|min:4',
        ]);
        if ($request->hasFile('img')) {
            $image = $request->img;
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('assets/images/movies/', $imageName);
        }

        if ($request->hasFile('video')) {
            $videoFilenameWithExt = $request->file('video')->getClientOriginalName();
            $videoFilename = pathinfo($videoFilenameWithExt, PATHINFO_FILENAME);
            $videoExtension = $request->file('video')->getClientOriginalExtension();
            $videoFileNameToStore = uniqid() . '.' . $videoFilename . '_' . time() . '.' . $videoExtension;
            $videoPath = $request->file('video')->move('assets/video/movies/', $videoFileNameToStore);
        } else {
            $videoFileNameToStore = 'defolte.mp3';

        }
        if ($request->hasFile('trailer')) {
            $trailerFilenameWithExt = $request->file('trailer')->getClientOriginalName();
            $trailerFilename = pathinfo($trailerFilenameWithExt, PATHINFO_FILENAME);
            $trailerExtension = $request->file('trailer')->getClientOriginalExtension();
            $trailerFileNameToStore = uniqid() . '.' . $trailerFilename . '_' . time() . '.' . $trailerExtension;
            $trailerPath = $request->file('trailer')->move('assets/video/trailer/', $trailerFileNameToStore);
        } else {
            $trailerFileNameToStore = 'defolte.mp3';
        }
        $genre_id = json_encode($request->genre_id);
        $starring_id = json_encode($request->starring_id);
        $review = new Movies();
        $review->name = $request->input('name');
        $review->img = "assets/images/movies/$imageName";
        $review->video = "assets/video/movies/$videoFileNameToStore";
        $review->trailer = "assets/video/trailer/$trailerFileNameToStore";
        $review->age_rating = $request->input('age_rating');
        $review->year = $request->input('year');
        $review->country = $request->input('country');
        $review->tagline = $request->input('tagline');
        $review->producer = $request->input('producer');
        $review->genre_id = $genre_id;
        $review->starring_id = $starring_id;
        $review->text = $request->input('text');
        $review->time = $request->input('time');
        $review->status = 'active';
        $review->user_id = Auth::user()->id;
        $review->save();
        return redirect()->route('addMoviesPage')->with('success', 'Actor successfully edited.');
    }
//
//    public function adminAddPost_check(Request $request)
//    {
//        $valid = $request->validate([
//            'name' => 'required|min:4|max:100',
//            'year' => 'required|min:1|max:100',
////            'status'  => 'required|min:3|max:100',
//            'content' => 'required|min:4',
//            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
//        ]);
//        if ($request->hasFile('image')) {
//            $image = $request->image;
//            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
//            $image->move('assets/images/posts/', $imageName);
//        }
////        $path = $request->image->store('avatar', 'public');
//
//        $review = new Posts();
//        $review->name = $request->input('name');
//        $review->content = $request->input('content');
//        $review->image = $imageName;
//        $review->status = 'active';
//        $review->year = $request->input('year');
//        $review->categories_id = $request->input('cat_id');
//        $review->save();
//
//        return redirect()->route('home');
//    }


}
