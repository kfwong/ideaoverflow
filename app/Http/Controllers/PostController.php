<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a list of all posts.
     *
     * @return \Illuminate\Http\Response
     */

    public function view($id){

        $post = Post::withCount('comments')->findOrFail($id);

        //$this->authorize('view', Post::class);
        $post->likes_count = 10;

        return view('postdetail', [
            'post' => $post
            ]);
    }


    public function index() {
        $posts = Post::withCount('comments')->get();
        foreach ($posts as $post) {
            $post->user; // user information
            $post->tag = 'idea'; // tags where type= 'post'
            // $post->comments_count = 4; // number of comments
            $post->likes_count = 14; // number of likes
        }
        return view('posts', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        //$this->authorize('create', Post::class);

        return "Show form for creating post";
    }

    /**
     * Store a newly created post in storage.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        //$this->authorize('create', Post::class);

        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post = Post::create(['user_id' => $request->user, 'title' => $request->title, 'content' => $request->content]);

        return "Post $post->id created.";
    }

    /**
     * Display the specified post.
     *
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post){
        //$this->authorize('view', Post::class);

        $title = $post->title;
        $content = $post->content;
        $authorId = $post->user_id;

        return " Post title: $title <br><br>\n Content: $content <br><br>\n Author ID: $authorId";
    }
		
    /**
     * Show the form for editing the specified post.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return "Show form for editing post";
    }

    /**
     * Update the specified post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post){
        //$this->authorize('update', Post::class);

        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return "Post $post->id updated.";
    }

    /**
     * Remove the specified post from storage.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post){
        //$this->authorize('delete', Post::class);

        $post->delete();

        return "Post $post->id deleted.";
    }
}
