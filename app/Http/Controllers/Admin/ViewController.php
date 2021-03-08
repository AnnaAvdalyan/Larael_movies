<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Posts;
use App\Starring;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function addMovies()
    {
        $categories = Category::all();
        $actors = Starring::all();
        return view('admin/addMovies', ['categories' => $categories, 'actors' => $actors]);
    }


}
