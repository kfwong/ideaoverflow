<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * Show the post.
     * 
     * @param User $user
     * @return Response
     */
    public function view($id){

        $post = Post::findOrFail($id);

        //$this->authorize('view', Post::class);

        $title = $post->title;
        $content = $post->description;
        $authorId = $post->user_id;

        return " Post title: $title <br><br>\n Content: $content <br><br>\n Author ID: $authorId";
    }

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

    /**
     * Show the form to create a new post.
     *
     * @return Response
     */
    public function create(){

        //$this->authorize('create', Post::class);

        return "Show the create form";
    }

    /**
     * Store the post.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request){

        //$this->authorize('create', Post::class);

        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $post = Post::create(['user_id' => $request->user, 'title' => $request->title, 'description' => $request->description]);

        return "Created post with <br><br>\n Post title: $post->title <br><br>\n Content: $post->description <br><br>\n Author ID: $post->user_id";
    }

    public function update(Request $request, $id){

        $post = Post::findOrFail($id);

        //$this->authorize('update', Post::class);

        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();

        return "Updated post with <br><br>\n Post title: $post->title <br><br>\n Content: $post->description <br><br>\n Author ID: $post->user_id";
    }

    public function delete($id){

        $post = Post::findOrFail($id);

        //$this->authorize('delete', Post::class);

        $post->delete();

        return "Deleted post with <br><br>\n Post title: $post->title <br><br>\n Content: $post->description <br><br>\n Author ID: $post->user_id";
    }
}
