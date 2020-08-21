<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use Auth;

class ProfileController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('profiles.profile');
    }

    public function addProfile(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'designation' => 'required',
            'profile_pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $profile = new Profile;
        $profile->name = $request->input('name');
        $profile->designation = $request->input('designation');
        $profile->user_id = Auth::user()->id;
        $fileName = time().'.'.$request->profile_pic->extension();  
   
        $request->profile_pic->move(public_path('uploads'), $fileName);
        $profile->profile_pic = $fileName; // saving the fileName in our model for upload to database
        $profile->save();
   
        return redirect('home')
            ->with('success','You have successfully upload file.')
            ->with('profile_pic',$fileName);
            // The second with method is only used if am displaying images on 
            // the site as they are uploaded so i transfer the image from my controller using the above method
    }
}
