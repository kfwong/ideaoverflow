<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::withCount('posts')
            ->withCount('comments')
            ->withCount('likes_posts')
            ->findOrFail($id);

        return view('userdetail',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::withCount('posts')
            ->withCount('comments')
            ->withCount('likes_posts')
            ->findOrFail($id);

        $this->authorize('update', $user);

        return view('useredit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:70',
            'email' => "required|unique:users,email,$id,|email",
            'description' => 'max:140',
            'avatar' => 'mimes:jpeg,png',
        ]);

        $user = User::withCount('posts')
            ->withCount('comments')
            ->withCount('likes_posts')
            ->findOrFail($id);

        $this->authorize('update', $user);

        $user->fill($request->all());

        if ($request->hasFile('avatar')) {
            $path = $request->avatar->storeAs('/img/avatars', "avatar_$id.jpg", 'public');
        }
        
        $user->save();

        Session::flash('message', 'User profile updated!');

        return view('userdetail', [
            'user' => $user
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
