<?php

namespace App\Http\Controllers;

use App\Models\Insurance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function dashboard()
    {
        $users = User::where('admin', '=', false)->get();
        $countedUser = User::where('admin', '=', false)->count();
        $acceptedInsurance = Insurance::where('etat', '=', 'valider')->count();

        return view('admin.dashboard', compact('users', 'countedUser', 'acceptedInsurance'));
    }

    public function connect(Request $request)
    {
        //dd($request);
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($request->email !== 'admin2023@gmail.com') {
            return back()->withErrors(['email' => "Informations invalides"]);
        }

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return Redirect::route('dashboard');
        }
    }

    public function logout()
    {
        Auth::logout(); 
        return Redirect::route('login');
    }
}
