<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function profile()
    {
        return view('page.profile');
    }


    public function privacy()
    {
        return view('page.privacy');
    }


    public function contact()
    {
        return view('page.contact');
    }

}
