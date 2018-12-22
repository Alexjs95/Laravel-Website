<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function indexPage() {
        return view('pages.index');
    }

    public function aboutPage() {
        return view('pages.about');
    }

    public function servicesPage() {
        $data = array(
            'title' => 'Services'

        );
        return view('pages.services')->with ($data);
    }
}

