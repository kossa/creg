<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy(request('orderBy', 'id'))
                ->recherche()
                ->withCount('articles')
                ->paginate(20)
                ->withQueryString();

        return view('users.index', compact('users')); // users/index.blade.php
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), User::rules());

        $data = $request->all();
        $data['password'] = bcrypt(request('password'));

        $user = User::create($data);
        $user->roles()->attach(request('roles'));

        return redirect()->route('users.index')->withSuccess(request('name') . ' was created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user->load('articles.user');

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        return request()->all();
        $this->validate(request(), User::rules(true, $user->id));

        $data = array_filter($request->all());

        if (request()->has('password') && request('password')) {
            $data['password'] = bcrypt(request('password'));
        }

        $user->update($data);
        // $user->roles()->detach();
        // $user->roles()->attach(request('roles'));
        $user->roles()->sync(request('roles'));

        return redirect()->route('users.index')->withSuccess(request('name') . ' was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return back()->withSuccess('User deleted successfully!');
    }
}
