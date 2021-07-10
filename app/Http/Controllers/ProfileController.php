<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Profile;
use Auth;
class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {   
        $user = Auth::user();
        $id = Auth::id();

        if ( $user->profile ==  null) {

            $profile = Profile::create([
                'city'=> 'cairo',
                'bio' => 'hello world',
            	'facebook'=> 'https://www.facebook.com',
            	'gender'  => 'male',
                'user_id' => $id ,
                'photo'=> 'uplouds/users/'.'difult.jpg'
            ]);
            
        }
        return view('users.profile')->with('user',$user);
    }
 
       public function update(Request $request)
    {
        $this->validate($request,[
            'city'=> 'required',
            'name'=> 'required',
            'bio' => 'required',
        	'facebook'=> 'required',
        	'gender'  => 'required',
        ]);
        $user =Auth::user();
        
        $user->profile->city = $request->city;
        if ($request->has('photo')) {
            $photo = $request->photo;
            $newPhoto = time().$photo->getClientOriginalExtension();
            $photo->move('uplouds/users',$newPhoto);
            $user->profile->photo = 'uplouds/users/'.$newPhoto;
            $user->save();
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile->bio = $request->bio;
        $user->profile->gender = $request->gender;
        $user->profile->facebook = $request->facebook;
        $user->save();
        $user->profile->save();
        if ($request->has('password')) {
            $user->password =bcrypt($request->password);
            $user->save();
        }
        return redirect()->back();
    }

    
    public function destroy($id)
    {
        //
    }
}
