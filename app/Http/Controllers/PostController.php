<?php

namespace App\Http\Controllers;

use App\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        foreach ($posts as $post) {
            $post->user; // user information
            $post->tag = 'idea'; // tags where type= 'post'
            $post->comments_count = 4; // number of comments
            $post->likes_count = 14; // number of likes
        }
        return view('posts', [
            'posts' => $posts
            ]);
    }

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
