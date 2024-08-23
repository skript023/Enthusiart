<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\gallery;
use App\Models\order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalRevenue = order::where('status', 'success')->sum('total_price');
        $totalOrders = order::count();

        return view('admin.dashboard', compact('totalRevenue', 'totalOrders'));
    }

    public function user()
    {
        $users = User::all();
        return view('admin.user', compact('users'));
    }

    public function store(Request $request)
    {
        try
        {
            $request->validate([
                'fullname' => 'required',
                'email' => 'required',
                'password' => 'required',
                'role' => 'required|in:artist,art_enthusiast,admin',
            ]);

            $data = $request->only([
                'fullname',
                'email',
                'password',
                'role', 
                'phone',
                'address'
            ]);

            $data['email_verified_at'] = now();
            $data['password'] = Hash::make($data['password']);

            User::create($data);

            return back()->with('success', 'User added successfully');
        }
        catch (\Throwable $th)
        {
            return back()->with('error', $th->getMessage());
        }
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.editUser', compact('user'));
    }

    public function updateUser(Request $request)
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
                'address',
                'role'
            ]);

            $user = user::find($request->id);

            $user->update($data);

            return back()->with('success', 'Data updated successfully');
        }
        catch (\Throwable $th)
        {
            return back()->with('error', $th->getMessage());
        }
    }

    public function remove(Request $request)
    {
        $user = User::find($request->id);

        if (isset($user))
        {
            $user->delete();

            return back()->with('success', 'Artwork deleted successfully');
        }

        return back();
    }

    public function post()
    {
        $posts = gallery::all();
        return view('admin.post', compact('posts'));
    }

    public function upload(Request $request)
    {
        try
        {
            $request->validate([
                'artist_name' => 'required',
                'image' => 'required|file|max:8192',
                // 'category' => 'required',
                'artwork_name' => 'required',
                'year' => 'required',
                'dimension' => 'required',
                'price' => 'required',
                'stock' => 'required',
                'description' => 'required',
                'materials' => 'required'
            ]);

            $data = $request->only([
                'artist_name',
                'image',
                // 'category',
                'artwork_name',
                'year',
                'dimension',
                'price',
                'stock',
                'description',
                'materials'
            ]);

            $data['user_id'] = auth()->user()->id;

            if ($request->hasFile('image'))
            {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = $data['artwork_name'] . '.' . $extension;
                $file->storePubliclyAs('uploads/arts', $filename, "public");

                $data['image'] = $filename;
            }

            gallery::create($data);

            return back()->with('success', 'Artwork posted successfully');
        }
        catch (\Throwable $th)
        {
            dd($th);
            toastr()->error('Upload artwork Failed');

            return back();
        }
    }

    public function editArtwork($id)
    {
        $post = gallery::findOrFail($id);
        return view('admin.editArt', compact('post'));
    }

    public function updateArtwork(Request $request)
    {
        $request->validate([
            'artwork_name' => 'required',
            'artist_name' => 'required',
            'materials' => 'required',
            'dimension' => 'required',
            'price' => 'required',
            'stock' => 'required',
            // 'description' => 'required',
            'year' => 'required'
        ]);

        $data = $request->only([
            'artwork_name',
            'artist_name',
            'materials',
            'dimension',
            'price',
            'stock',
            'description',
            'year'
        ]);

        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = auth()->user()->fullname . '.' . $extension;
            $file->storePubliclyAs('uploads/arts', $filename, "public");

            $data['image'] = $filename;
        }

        $post = gallery::find($request->id);

        try
        {
            $post->update($data);

            return back()->with('success', 'Artwork updated successfully');
        }
        catch (\Throwable $th)
        {
            return back();
        }
    }

    public function delete(Request $request)
    {
        $post = gallery::find($request->id);

        if (isset($post))
        {
            $post->delete();

            return back();
        }

        return back();
    }

    public function order()
    {
        $orders = order::with(['user', 'artwork', 'payment'])->get();

        return view('admin.order', compact('orders'));
    }
}
