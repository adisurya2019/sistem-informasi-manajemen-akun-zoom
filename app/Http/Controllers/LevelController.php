<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function dashboard(){
        return view('dashboard.home');
    }
}
