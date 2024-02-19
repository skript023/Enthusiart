<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\toastr;
use App\Models\User;

class UserController extends Controller
{
    public function create(Request $request)
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

        $data['email_verified_at'] = now();
        $data['password'] = Hash::make($data['password']);

        try 
        {
            $user = User::create($data);
        } 
        catch (\Throwable $th) 
        {

            toastr()->error('Registration Failed');

            return back();
        }

        return redirect()->intended('/');
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
            ExceptionMessageController::save_error($th);

            toastr()->error('Failed update profile');

            return back();
        }

        return redirect()->intended('/dashboard/profile');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        
        $credentials = $request->only(['username', 'password']);

        if (filter_var($request->username, FILTER_VALIDATE_EMAIL))
        {
            $user = user::where('email', $request->username)->first();

            if (empty($user)) 
                toastr()->error('The provided credentials do not match our records.', 'Login Failed');

            $credentials['username'] = $user->username;
        }

        try
        {
            if (auth()->attempt($credentials, $request->remember)) 
            {
                $this->recent_login($request);
                
                $request->session()->regenerate();

                return redirect()->intended('/dashboard/profile');
            }
            else
            {
                toastr()->error('The provided credentials do not match our records.', 'Login Failed');
            }
        }
        catch (\Throwable $th) 
        {
            ExceptionMessageController::save_error($th);

            toastr()->error('Login failed, unable connect to server', 'Login Failed');
        }

        return back();
    }

    public function logout(Request $request)
    {
        auth()->logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
