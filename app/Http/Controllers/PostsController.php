<?php

namespace App\Http\Controllers;
use Image;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    //
    public function create() {
        return view('posts.create');
    }

    public function store() {

        $data = request()->validate([
            //'anotherfield' => ''  // Note, i added this to explain for a field called another that doesn't need validation
            'caption' => 'required',
            //'image' => 'required|image' // use this method or the method below for multiple validations
            'image' => ['required', 'image']
        ]);

      
        // We don't specicy the user_id here cos auth()->user() provides it; That is why i added auth() before user()
       //auth()->user()->posts()->create($data); 

       //From the above, if i get a posts on null error, it means that auth()->user() is null meaning we
       // don't have an authenticated user, so we need to sign in in order to create a post.
        //dd(request()->all());
        //dd(request('image'));
       // \App\Post::create($data);

       $imagePath = request('image')->store('uploads', 'public'); //Path to our image
       
       $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
       $image->save();

       auth()->user()->posts()->create([
           'caption' => $data['caption'],
           'image' => $imagePath
       ]); 
       //dd(request('image')->store('uploads', 'public')); // This save the file in storage->app->public->uploads
       //First parameter is the directory where we want to store our file
       //Second parameter is the driver to use e.g s3 which is an amazon drive. It stores it in amazon drive
       // and brings back our file name. In our case, since we are on local we can use public as second parameter
        
       return redirect("/profile/" . auth()->user()->id);
    }

    public function show(\App\Post $post) {// note the module binding here by using \App\Post
        //it tells it to ftch the data from post module where the id is $post  
        //dd($post);
        return view('posts.show', compact('post'));
    }
}
