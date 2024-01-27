<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\gallery;

class GalleryController extends Controller
{
    function index()
    {
        $categories = category::all();

        return view('categories', [
            'categories' => $categories
        ]);
    }

    function create(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $data = $request->only([
            'name'
        ]);

        try 
        {
            $user = gallery::create($data);

            return redirect()->intended('/');
        } 
        catch (\Throwable $th) 
        {

            return back();
        }
    }

    function update(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $data = $request->only([
            'name'
        ]);

        $gallery = gallery::find($request->id);

        try 
        {
            $gallery->update($data);

            return redirect()->intended('/');
        } 
        catch (\Throwable $th) 
        {
            return back();
        }
    }

    function delete(Request $request)
    {
        $gallery = gallery::find($request->category);

        if (isset($gallery))
        {
            $gallery->delete();

            return redirect()->intended('/dashboard/users');
        }

        return back();
    }
}
