<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class UsersController extends Controller
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('my-profile')->with('user', auth()->user());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.auth()->id(),
            'password' => 'sometimes|nullable|string|min:6|confirmed',
            'avatar' => 'sometimes|nullable|file|max:1024',
        ]);
        $user = auth()->user();
        //Upload the image and resize it
        if($request->avatar){
            $file = $request->avatar;
            $avatar_name =time().'.'.$file->getClientOriginalExtension();
            $avatar = Image::make($file);
            $avatar->resize(256, 256);
            $avatar->save('storage/users/'.$avatar_name);
            $user->avatar = 'users/' . $avatar_name;
        }
        $input = $request->except('password', 'password_confirmation');
        if(! $request->filled('password')){
            $user->fill($input)->save();

            return back()->with('success_message', 'Profile updated successfully!');
        }
        $user->password = bcrypt($request->password);
        $user->fill($input)->save();
        return back()->with('success_message', 'Profile (and password) updated successfully!');

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
