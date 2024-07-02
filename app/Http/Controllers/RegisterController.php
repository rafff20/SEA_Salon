<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Sign Up',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'phoneNumber' => ['required', 'regex:/^08[0-9]{9,11}$/', 'unique:users'],
            'password' => 'required|min:5|max:255',
            
        ]);

        

        User::create($validatedData);

        return redirect('/login')->with('success', 'Registration successful, please login!');
    }
}
