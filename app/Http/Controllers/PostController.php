<?php

namespace App\Http\Controllers;

use App\Post;

class PostController extends Controller
{
    public function view($id){

        $this->authorize('view', Post::class);

        return "view";
    }

    public function create(){

        $this->authorize('create', Post::class);

        return "create";
    }

    public function update($id){

        $this->authorize('update', Post::class);

        return "update";
    }

    public function delete($id){

        $this->authorize('delete', Post::class);

        return "delete";
    }
}
