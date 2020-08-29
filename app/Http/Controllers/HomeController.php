<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //  I added this to combat undefined type Auth error
use App\User;
use App\Post;
use App\Profile;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::all();
        $auth = Auth::user()->id;
        $profile =  DB::table('users')
                ->join('profiles', 'users.id', '=', 'profiles.user_id')
                ->select('users.*', 'profiles.*')
                ->where(['profiles.user_id' => $auth])
                ->first();
       
        return view('home', ['profiles' => $profile, 'posts' => $posts]);
    }
}
