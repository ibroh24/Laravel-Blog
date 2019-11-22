<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.profile')->with('user', Auth::user());
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            // 'password' => 'required|password',
        ]);

        $userUpdate = Auth::user();
        if($request->hasFile('avatar')){
            $avatar = $request->avatar;
            $avatarNewName = time().$avatar->getClientOriginalName();
            $avatar->move('uploads/postImages', $avatarNewName);

            $userUpdate->profile->avatar = 'uploads/postImages/'.$avatarNewName;
            $userUpdate->profile->save();
        }
        if($request->hasFile('password')){
            $userUpdate->password = bcrypt($request->password);
            $userUpdate->save();
        }
        $userUpdate->name = $request->name;
        $userUpdate->profile->youtube = $request->youtube;
        $userUpdate->profile->facebook = $request->facebook;
        $userUpdate->profile->about = $request->about;

        $userUpdate->save();
        $userUpdate->profile->save();

        Session::flash('success', 'Your profile updated successfully');

        return redirect()->route('post.index');

        
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
