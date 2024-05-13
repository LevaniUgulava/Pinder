<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Authcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function Register()
    {
        return view('Auth.Register');
    }

    public function Login()
    {
        return view('Auth.Login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('message', 'Registered!');
    }

    public function auth(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return redirect()->back('message', 'Cant find user');
        }

        Auth::Login($user);

        return redirect('/profile');

    }

    public function Logout()
    {

        Auth::logout();
        return redirect('/login');
    }

}
