<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{

    /**
     * 
     * @return \Illuminate\View\View 
     */
    public function about()
    {
        return view('pages.about', ['body_id' => 'about']);
    }

    /**
     * 
     * @return \Illuminate\View\View
     */
    public function privacy()
    {
        return view('pages.privacy', ['body_id' => 'privacy']);
    }

}
