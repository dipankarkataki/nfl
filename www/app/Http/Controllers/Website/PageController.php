<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function home(){
        return view('web.pages.index');
    }

    public function gameRules(){
        return view('web.pages.gamerules');
    }

    public function privacyPolicy(){
        return view('web.pages.docs.privacy');
    }

    public function termsAndCondition(){
        return view('web.pages.docs.terms');
    }
}
