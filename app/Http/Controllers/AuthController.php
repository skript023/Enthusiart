<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try
        {
            $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);

            $credentials = $request->only(['email', 'password']);

            if (filter_var($request->username, FILTER_VALIDATE_EMAIL))
            {
                $user = User::where('email', $request->email)->first();


                $credentials['email'] = $user->email;
            }

            if (auth()->attempt($credentials, $request->remember))
            {
                $request->session()->regenerate();

                if (auth()->user()->role == 'admin') 
                {
                    return redirect()->intended('/dashboard');
                } 
                else 
                {
                    return redirect()->intended('/');
                }

                // return redirect()->intended('/');
            }
            else
            {
                return back()->with('error','The provided credentials do not match our records.');
            }
        }
        catch (\Throwable $th)
        {
            return back()->with('error', $th->getMessage());
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
