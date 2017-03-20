<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreatePostController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('createpost');
    }

    public function store()
    {
        return redirect()->action('PostController@index');
    }
}
