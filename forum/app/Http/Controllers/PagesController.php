<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PagesController extends Controller
{
    public function indexPage() {
        if (Auth::Check()) {
        //    return view('home');
        }
        return view('pages.index');
    }

    public function aboutPage() {
        return view('pages.about');
    }
}

