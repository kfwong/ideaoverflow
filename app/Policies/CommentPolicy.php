<?php

namespace App\Policies;

use App\User;
use App\Comment;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class CommentPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        // this authorization check execute before all other checks
        // if matched, then it is early returned
        // otherwise, the policy fall through other checks

        // allow all access if user is admin
        if ($user->role == 'admin') {
            return true;
        }
    }

    /**
     * Determine whether the user can create comments.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function store(User $user)
    {
        // only if user is logged in
        if(Auth::check()){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the comment.
     *
     * @param  \App\User  $user
     * @param  \App\Comment  $comment
     * @return mixed
     */
    public function update(User $user, Comment $comment)
    {
        // only if it is comment owner
        if($user->id == $comment->user_id){
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the comment.
     *
     * @param  \App\User  $user
     * @param  \App\Comment  $comment
     * @return mixed
     */
    public function destroy(User $user, Comment $comment)
    {
        // only if it is comment owner
        if($user->id == $comment->user_id){
            return true;
        }

        return false;
    }
}
