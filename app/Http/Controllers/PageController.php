<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function profile()
    {
        return view('pages.profile');
    }


    public function privacy()
    {
        return view('pages.privacy');
    }

}
