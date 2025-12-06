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

public function blog(){
   return view('front.blog');
}

public function blogDetails(){
   return view('front.blog-details');
}

public function hospitalDetails(){
    return view('front.hospital-details');
}

public function order (){
    return view ('front.order');
}

public function servicesDetails(){
    return view('front.services-details');
}

public function contactUs(){
   return view('front.contact-us');
}

public function login(){
   return view('front.login');
}

public function forgetPassword(){
   return view('front.forget-password');
}


public function register(){
   return view('front.register');
}


public function profile(){
   return view('front.profile');
}


public function userInfo(){
   return view('front.user-info');
}


public function requestDetails(){
   return view('front.request-details');
}


public function policies(){
   return view('front.policies');
}


public function privacy(){
   return view('front.privacy');
}


}
