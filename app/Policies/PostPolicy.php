<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PostPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability){
        // this authorization execute before all other checks
        // if matched, then it is early returned

        // allow all access if user is admin
        if($user->role == 'admin'){
            return true;
        }

        // otherwise, the policy fall through other checks
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        // only allow login user
        if(Auth::check()){
            return true;
        }

        return false;

    }

    public function store(User $user){

        // only allow login user
        if(Auth::check()){
            return true;
        }

        return false;
    }

    public function edit(User $user, Post $post){

        // allow if it is post owner
        if($user->id == $post->user_id){
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function update(User $user, Post $post)
    {
        // allow if it is post owner
        if($user->id == $post->user_id){
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function destroy(User $user, Post $post)
    {
        // allow if it is post owner
        if( $user->id == $post->user_id){
            return true;
        }

        return false;
    }

    public function like(User $user){
        // only allow login user
        if(Auth::check()){
            return true;
        }

        return false;
    }

}
