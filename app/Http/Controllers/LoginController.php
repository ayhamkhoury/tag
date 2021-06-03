<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        $pageTitle = 'LOGIN';
        $page_description = 'Admin Login';
        return view('admin.login', compact('pageTitle', 'page_description'));
    }


    public function signin(Request $request)
    {
        $input = $request->only('email', 'password');
        $guard = null;
        $rules = [
            'email' => ['required'],
            'password' => ['required'],
        ];
        $validate = Validator::make($input, $rules);
        $messages = $validate->messages();
        if ($validate->fails()) {
            return redirect()->to('login')->withErrors($messages);
        }

        $isAdmin = Admin::where('email', $input['email'])->first();
        $isUser = User::where('email', $input['email'])->first();
       
        if ($isAdmin) {
            $guard = 'admin';
        }
        if ($isUser) {
            $guard = 'user';
        }
         
        if ($guard) { 
            Auth::guard($guard)->attempt(['email' => $input['email'], 'password' => $input['password'], 'type' => 0]);
            if (Auth::guard($guard)->check()) {
                 
                return redirect()->route('listraces');
            } else {
                return redirect()->route('login')->withErrors(['Incorrect Login Details']);
            }
        } else {
            return redirect()->route('login')->withErrors(['no email found']);
        }
    }
    public function logout()
    {
        @Auth::guard('admin')->logout();
        @Auth::logout();
        return redirect()->route('login');
    }

    public function store(Request $request)
    {
        //
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'family' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
        ];
        $customMessages = [
            'unique' => 'Email already registered !!'
        ];
        $validate = Validator::make($request->all(), $rules);
        $messages = $validate->messages();
        if ($validate->fails()) {
            return redirect()->route('web')->withErrors($messages);
        }

        $user = User::create([
            'name' => $request['name'],
            'family' => $request['family'],
            'email' => $request['email'],
            'password' => Hash::make('password')
           
        ]);
        Auth::loginUsingId($user->id);
     
        return redirect()->route('home');
    }

}
