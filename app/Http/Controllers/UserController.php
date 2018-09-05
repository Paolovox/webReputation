<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('settings');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $request->validate([
            'old_password' => 'required|string|min:6|confirmed',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $user = Auth::user();
        $old = $request->input('old_password');
        $new = $request->input('password');
        if(Hash::check($old, $user->password)) {
            $user->password = Hash::make($new);
            $user->save();
        } else {
            return redirect()->route('settings.index')->with('error','La password attuale e errata');
        }

        return redirect()->route('settings.index')->with('success','Password con successo');
    }


}
