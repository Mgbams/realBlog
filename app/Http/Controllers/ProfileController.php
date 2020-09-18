<?php

namespace App\Http\Controllers;

use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //  I added this to combat undefined type Auth error
use App\Profile;

class ProfileController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($user)
    {
        //dd($user);

        $user = \App\User::findorFail($user);

        return view('profiles.index', [
            "user" => $user
        ]);
    }

    public function edit(\App\User $user)
    { // Another way of getting the users
        $this->authorize('update', $user->profile); //Protecting route
        return view('profiles.edit', compact('user'));
    }

    public function update(\App\User $user)
    {
        $this->authorize('update', $user->profile); //Protecting route
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => ''
        ]);

        if (request('image')) {

            $imagePath = request('image')->store('profile', 'public'); //Path to our image

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();
        }

        $user->profile->update(array_merge(
            $data,
            ['image' => $imagePath]
        ));

        // dd($data);
        return redirect("/profile/{$user->id}");
    }

    /* public function addProfile(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'designation' => 'required',
            'profile_pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $profile = new Profile;
        $profile->name = $request->input('name');
        $profile->designation = $request->input('designation');
        $profile->user_id = Auth::user()->id;
        // $fileName = time().'.'.$request->profile_pic->extension();  
        $fileName = $profile->user_id . '.' . $request->profile_pic->extension();  
        $request->profile_pic->move(public_path('uploads'), $fileName);
        $profile->profile_pic = $fileName; // saving the fileName in our model for upload to database

        // dd($profile);
        $profile->save();

        return redirect('home')
            ->with('success','You have successfully upload file.')
            ->with([
                'profile_pic' => $fileName
                ]);
    }*/
}
