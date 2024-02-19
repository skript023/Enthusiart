<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserController extends Controller
{
    public function store(Request $request)
    {
        try 
        {
            $request->validate([
                'fullname' => 'required', 
                'email' => 'required', 
                'password' => 'required'
            ]);
    
            $data = $request->only([
                'fullname', 
                'email',
                'password'
            ]);
    
            $data['email_verified_at'] = now();
            $data['password'] = Hash::make($data['password']);

            User::create($data);

            return redirect()->intended('/login');
        } 
        catch (\Throwable $th) 
        {

            dd($th);

            return back();
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'username' => 'required',
            'email' => 'required:|email:dns', 
            'password' => 'required|confirmed|min:6'
        ]);

        $data = $request->only([
            'fullname', 
            'username', 
            'email',
            'password'
        ]);

        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = auth()->user()->fullname . '.' . $extension;
            $file->storePubliclyAs('uploads/avatar', $filename, "public");

            $data['image'] = $filename;
        }

        $data['password'] = Hash::make($data['password']);

        $user = user::find($request->id);

        try
        {
            $user->update($data);
        }
        catch (\Throwable $th) 
        {
           
            return back();
        }

        return redirect()->intended('/dashboard/profile');
    }

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
                $user = user::where('email', $request->email)->first();
    
    
                $credentials['email'] = $user->email;
            }

            if (auth()->attempt($credentials, $request->remember)) 
            {
                $request->session()->regenerate();

                return redirect()->intended('/');
            }
            else
            {
                toastr()->error('The provided credentials do not match our records.', 'Login Failed');

                return back();
            }
        }
        catch (\Throwable $th) 
        {
            toastr()->error('Login failed, unable connect to server', 'Login Failed');

            dd($th);

            return back();
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
