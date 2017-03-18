<?php

namespace App\Http\Controllers;

use App\Post;

class PostController extends Controller
{
    /**
     * Show the post.
     * 
     * @param User $user
     * @return Response
     */
    public function view($id){

        $post = Post::find($id);

        if (!$post) {
            abort(404);
        }

        $this->authorize('view', Post::class);

        $title = $post->title;
        $content = $post->description;
        $authorId = $post->user_id;

        return " Post title: $title <br><br>\n Content: $content <br><br>\n Author ID: $authorId";
    }

    /**
     * Show the form to create a new post.
     *
     * @return Response
     */
    public function create(){

        $this->authorize('create', Post::class);

        return "Show the create form";
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
