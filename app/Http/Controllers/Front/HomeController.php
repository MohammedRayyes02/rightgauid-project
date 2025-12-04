<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        return view('front.home');
    }
   public function hospitals(){
        return view('front.hospitals');
    }

public function aboutUs(){
    return view('front.about-us');
}

public function hospitalDetails(){
    return view('front.hospital-details');
}

}
