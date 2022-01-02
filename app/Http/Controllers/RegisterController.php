<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Login;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\Unique;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index', [
            
        ]);
    }

    public function add(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:users',
            'level' => 'required',
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => 'required|min:5|max:255',
            'password-confirm' => 'required_with:password|same:password|min:5',
            'agree' => 'required',
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        // $request->session()->flash('success', 'Registration successfull! Please login');

        return redirect('/login')->with('success', 'Registration successfull! Please login');
    }
}
