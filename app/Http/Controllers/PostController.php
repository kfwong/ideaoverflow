<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Display a list of all posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $posts = Post::withCount('comments')
            ->with('user')
            ->get();

        return view('posts', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){

        //$this->authorize('create', Post::class);

        return view('welcome');
    }

    /**
     * Store a newly created post in storage.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        //$this->authorize('create', Post::class);
        /*
        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required',
        ]);*/

        $post = new Post();

        $post->fill($request->all());

        $post->save();

        Session::flash('message', 'Post created!');

        return $post;
        return view('welcome', [
            'post' => $post
        ]);
    }

    /**
     * Display the specified post.
     *
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //$this->authorize('view', Post::class);

        $post = Post::withCount('comments')
            ->with('user')
            ->findOrFail($id);

        return view('postdetail', [
            'post' => $post
        ]);
    }
		
    /**
     * Show the form for editing the specified post.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Post $post)
    {
        return view('welcome', [
            'post' => $post
        ]);
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
            'body' => 'required',
        ]);

        $post->fill($request->all());

        $post->save();

        Session::flash('message', 'Post updated!');

        return $post;

        return view('postdetail', [
            'post' => $post
        ]);
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
