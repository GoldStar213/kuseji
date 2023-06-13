<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Auth;

class VerifyController extends Controller
{
    public function index(Request $request) {
        $user_id = $request->id;
        $remember_token = $request->token;

        $user = User::find($user_id);

        if($user->remember_token != $remember_token) {
            return view('error');
        } else {
            $user->email_verified_at = now();

            $user->save();

            Auth::login($user);

            return redirect()->route('myItem.index');
        }
    }
}
