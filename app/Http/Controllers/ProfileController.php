<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Illuminate\Support\Facades\Auth;
use Validator;

class ProfileController extends Controller
{


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //プロフィール編集ページを表示
        $user = User::find(Auth::id());
        return view('profile.edit', ['user' => $user]);
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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'profile_text' => 'required|string|max:2048',
        ]);

        //プロフィール編集ページからPOST(PUT)されて更新する
        $user = User::find(Auth::id());
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->hasfile('profile_image')){
            $path = $request->file('profile_image')->store('public/avatar');
            $user->profile_image = basename($path);
        };
        $user->profile_text = $request->profile_text;
        $user->save();

        session()->flash('changedProfile_message', 'プロフィールを更新しました');

        // 二重送信対策
        $request->session()->regenerateToken();

        return view('profile.edit', compact('user'));
    }

}
