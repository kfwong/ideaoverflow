<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Display a list of all posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::withCount('comments')
        ->withCount('likes')
        ->with('user')
        ->with(['likes'=> function($query) {
            $query->where('user_id', '=', Auth::id());
        }])
        ->with(['tags'=> function($query) {
            $query->where('type','Post');
        }])
        ->orderBy('created_at', 'desc')
        ->paginate(20);

        return view('posts', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Post::class);

        return view('createpost', ['type' => 'post']);
    }

    /**
     * Store a newly created post in storage.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->authorize('store', Post::class);

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'body' => 'required',
            'type' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/posts/create')
                ->withErrors($validator)
                ->withInput();
        }

        $post = new Post();

        $post->user_id = Auth::user()->id;

        $post->fill($request->all());
        $post->save();

        $tag = Tag::where('name', $request->type)->firstOrFail();
        $tag->posts()->attach($post->id);

        Session::flash('message', 'Post created!');

        return Redirect::to('/posts/' . $post->id);

    }

    /**
     * Display the specified post.
     *
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $post = Post::withCount('comments')
            ->withCount('likes')
            ->with('user', 'comments.user','tags')
            ->with(['likes' => function ($query) {
                $query->where('user_id', '=', Auth::id());
            }])
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
    public function edit($id)
    {
        $post = Post::with(['tags' => function($query) {
            $query->where('type','Post');
        }])
                ->findOrFail($id);

        $this->authorize('edit', $post);

        return view('createpost', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified post in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'body' => 'required',
            'type' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/posts/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $post = Post::withCount('comments')
            ->withCount('likes')
            ->with('user')
            ->findOrFail($id);

        $this->authorize('update', $post);

        $post->fill($request->all());

        $post->save();

        $newtag = Tag::where('name', $request->type)->firstOrFail();
        $oldtag = $post->tags->where('type','Post');
        $post->tags()->detach($oldtag);
        $post->tags()->attach($newtag);
        
        Session::flash('message', 'Post updated!');

        return Redirect::to('/posts/' . $post->id);
    }

    /**
     * Remove the specified post from storage.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$this->authorize('delete', Post::class);

        $post = Post::findOrFail($id);

        $this->authorize('destroy', $post);

        $post->delete();

        return "Post $post->id deleted!";
    }

    public function like($id)
    {
        $this->authorize('like', Post::class);

        $post = Post::findOrFail($id);

        $post->likes()->toggle(Auth::user()->id);

        // get the updated count
        $post = Post::withCount('likes')
            ->with(['likes' => function ($query) {
                $query->where('user_id', '=', Auth::id());
            }])
            ->findOrFail($id);

        return $post;
    }

    public function viewLikers($id)
    {
        // $this->authorize('viewLikers', Post::class);
        $post = Post::findOrFail($id);
        $users = $post->likes;
        return response()->json($users);
    }
}
