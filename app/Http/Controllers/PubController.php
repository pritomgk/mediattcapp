<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PubController extends Controller
{
    
    public function contact_us(){

        return view('public_view.contact_us');

    }
    
    public function contact_message(){

        return view('public_view.contact_us');

    }

}
