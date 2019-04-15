<?php

namespace App\Http\Controllers;
use App\User;
use Auth;
use File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\http\Requests;
class UserController extends Controller
{
    
    public function postSignup(Request $request)
    {
        $this->validate($request,[
            'first_name' => 'required|max:120',
            'email'      => 'email|required|unique:users',
            'password'   => 'required|min:6'
        ]);
        $user = new User();

        $user->first_name = $request['first_name'];
        $user->email = $request['email']; 
        $user->password = bcrypt($request['password']);

        $user->save();
        Auth::login($user);
        return redirect()->route('dashboard');
    }

    public function postSignin(Request $request)
    {
        $this->validate($request,[
            'email'      => 'required',
            'password'   => 'required'
        ]);

        if(Auth::attempt(['email'=>$request['email'],'password'=>$request['password']]))
        {
                return redirect()->route('dashboard');
        }
                return redirect()->back();
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
    public function getAccount()
    {
        return view('account',['user'=>Auth::user()]);
    }
    public function postSaveaccount(Request $request)
    {
        $this->validate($request,[
            'first_name' => 'required|max:120'
        ]);
        $user = Auth::user();
        $user->first_name = $request['first_name'];
        $user->update();
        $file = $request->file('image');
        $filename = $request['first_name'] .'-' . $user->id . '.jpg';
        if($file)
        {
            Storage::disk('local')->put($filename,file::get($file));
        }
        return redirect()->route('account');
    }
    public function getUserimage($filename)
    {
        $file = Storage::disk('local')->get($filename);
        return new Response($file,200);
    }
}
