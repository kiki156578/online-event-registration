<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //function 
    public function about(){
       $name = "kiki";
       return view("pages/about", ['name' => $name]);
    }

}
