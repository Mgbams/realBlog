<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('categories.category');
    }

    public function addCategory(Request $request) {
        // $user =$request->Input('category');
        $this->validate($request, [
            'category' => 'required'
        ]);
        $category = new Category;
        $category->category = $request->input('category');
        $category->save();
        return redirect('/category')->with('response', 'Your data has been saved');
    }
}
