<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //  I added this to combat undefined type Auth error
use Symfony\Component\Console\Input\Input;

class PostController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();

        return view('posts.post', ['categories' => $categories]);
    }

    public function addPost(Request $request) {
        $this->validate($request, [
            'post_title' => 'required',
            'post_body' => 'required',
            'category_id' => 'required',
            'post_image' => 'required'
        ]);

        $posts = new Post;
        $posts->post_title = $request->input('post_title');
        $posts->post_body = $request->input('post_body');
        $posts->category_id = $request->input('category_id');
        $posts->user_id = Auth::user()->id;
        // $fileName = time().'.'.$request->profile_pic->extension(); 
        
        if($request->hasFile('post_image')) {
            $fileName = $request->file('post_image');
            $fileName = $posts->user_id . '.' . $request->post_image->extension();  
            $request->post_image->move(public_path('posts'), $fileName);
            $posts->post_image = $fileName; // saving the fileName in our model for upload to database
        }
        
        $posts->save();
        return redirect('/home')->with('success', 'Posts published successfully');
        //return 'Validation passed';
    }
}
