<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AuthManagerController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:12',
        ]);

        // $user = User::where('email', '=', $request->email)->first();
        // if($user){
        //     if(Hash::check($request->password, $user->password)){
        //         $request->session()->put('loginId', $user->id);
        //         return redirect('redirect');
        //     }else{
        //         return back()->with('fail', 'Password not matches. ');
        //     }
        // }else{
        //     return back()->with('fail', 'This email is not registered.');
        // }

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('home.userpage'));
        }
        return redirect(route('login'))->with("error", "Login details are not valid");
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:12',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();
        if($res){
            return redirect(route('register'))->with("error", "Registration failed, try again.");
        }else{
            return redirect(route('login'))->with("success", "Registration success, Login to access the app");
        }

        // $date['name'] = $request->name;
        // $data['phone'] = $request->phone;
        // $data['email'] = $request->email;
        // $data['password'] = Hash::make($request->password);
        // $user = User::create($date);
        // if(!$user){
        //     return redirect(route('register'))->with("error", "Registration failed, try again.");
        // }
        // return redirect(route('login'))->with("success", "Registration success, Login to access the app");
    }

    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }
}
