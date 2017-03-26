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

        //$this->authorize('edit', $user);

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
            'name' => 'unique:users,name|max:70',
            'username' => 'unique:users,username|max:30',
            'email' => 'unique:users,email',
            'description' => 'max:140',
        ]);

        $user = User::withCount('posts')
            ->withCount('comments')
            ->withCount('likes_posts')
            ->findOrFail($id);

        //$this->authorize('update', $user);

        /*$user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->description = $request->description;*/
        
        $user->fill($request->all());

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
