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
    public function index(Request $request)
    {   
        $url = $request->path();
        # TODO @annahe: make the cases to constants, this is so ratchet
        switch($url) {
            case "createpostidea":
                return view('createpost', ['type'=>'Idea']);
                break;
            case "createpostproblem":
                return view('createpost', ['type'=>'Problem']);
                break;
            case "createpostproject":
                return view('createpost', ['type'=>'Project']);
                break;
            default:
                abort(404);
        }
    }

    public function store()
    {
        return redirect()->action('PostController@index');
    }
}
