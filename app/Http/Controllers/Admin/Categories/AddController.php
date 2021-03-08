<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Category;
use App\Posts;
use App\User;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddController extends Controller
{
    public function addCategory()
    {
        $newCategory = Category::orderBy('id', 'DESC')->get();
            return view('admin/addCategory',['categories' =>$newCategory ]);

    }

    public function addCategoryCheck(Request $request)
    {
        $valid = $request->validate([
            'name' => 'required|min:4|max:100',
        ]);
        $review = new Category();
        $review->cat_name = $request->input('name');
        $review->img = 'category.png';
        $review->status = 'active';
        $review->parent_id = '-1';

        $review->save();

        return redirect()->route('addCategory')->with('success', 'Product successfully added.');
    }
    public function editCategory(Request $request,$id){
        $editCategory = Category::find(+$id);
        $newCategory = Category::orderBy('id', 'DESC')->get();
            return view('admin/addCategory',['categories' =>$newCategory,'editCategory'=> $editCategory ]);
            return view('home');
    }

    public function editCategoryCheck(Request $request){
            $category = Category::find($request->id);
            $category->cat_name = $request->name;
            $category->save();
            return redirect()->route('addCategory')->with('success', 'Category  successfully edited.');
    }


    public function deleteCategory( $id)
    {
            $category = Category::find(+$id);
            $category->delete();
            return redirect()->route('addCategory')->with('success', 'Category  successfully deleted.');
    }
}
