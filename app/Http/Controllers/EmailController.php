<?php

namespace App\Http\Controllers;

use App\Mail\Email;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function kirim(){
        Mail::to('kuroneko1181@gmail.com')->send(new Email());
        // return new Email();
    }
}
