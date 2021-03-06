<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // throw new \Exception("Error Processing Request", 1);

        return view('home')->withArticles(\App\Article::all());
    }
}
