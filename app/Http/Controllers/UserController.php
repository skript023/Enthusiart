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
            return back()->with('error', $th->getMessage());
        }
    }

    public function update(Request $request)
    {
        try
        {
            $request->validate([
                'fullname' => 'required',
                'email' => 'required:|email:dns',
            ]);

            $data = $request->only([
                'fullname',
                'email',
                'phone',
                'address'
            ]);

            if ($request->hasFile('image'))
            {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = auth()->user()->fullname . '.' . $extension;
                $file->storePubliclyAs('uploads/avatar', $filename, "public");

                $data['image'] = $filename;
            }

            $user = user::find($request->id);

            $user->update($data);

            return redirect()->intended('/user/profile');
        }
        catch (\Throwable $th)
        {
            return back()->with('error', $th->getMessage());
        }
    }

    public function update_password(Request $request)
    {
        try
        {
            $request->validate([
                'password' => 'required|confirmed|min:6',
                'current_password'=> 'required',
            ]);

            $data = $request->only([
                'password',
                'current_password',
            ]);

            $user = user::find($request->id);
            if (Hash::check($data['current_password'], $user->password))
            {
                $data['password'] = Hash::make($data['password']);
                $user->update($data);

                return redirect()->intended('/user/profile');
            }

            return back()->with('error','Failed update profile');
        }
        catch (\Throwable $th)
        {
            return back()->with('error', $th->getMessage());
        }
    }
}
