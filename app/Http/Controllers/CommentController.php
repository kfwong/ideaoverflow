<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    /**
     * Store a newly created comment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        Auth::loginUsingId(1);

        $this->validate($request, [
            'body' => 'required',
        ]);

        $comment = new Comment();

        $comment->fill($request->all());

        $comment->user_id = Auth::user()->id;
        $comment->post_id = $post->id;

        $comment->save();

        Session::flash('message', "Comment added successfully.");

        Auth::logout();

        return Redirect::to('/posts/' . $post->id);
    }

    /**
     * Show the form for editing the specified comment.
     *
     * @param  Post     $post
     * @param  Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, Comment $comment)
    {
        // probably don't need this method

        return view('welcome');
    }

    /**
     * Update the specified comment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post     $post
     * @param  Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $post_id, Comment $comment)
    {

        Auth::loginUsingId(1);

        $this->validate($request, [
            'body' => 'required',
        ]);

        $comment->fill($request->all());
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $post_id;

        $comment->save();

        Session::flash('message', 'Comment' . $comment->id . 'updated!');

        //Auth::logout();

        return Redirect::to('/posts/'. $post_id);
    }

    /**
     * Remove the specified comment from storage.
     *
     * @param  Post     $post
     * @param  Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, Comment $comment)
    {

        $comment->delete();

        Session::flash('message', "Comment" .  $comment->id . "deleted.");

        return Redirect::to('/posts/'. $post->id);
    }
}
