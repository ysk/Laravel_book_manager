<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }


    public function privacy()
    {
        return view('pages.privacy');
    }

}
