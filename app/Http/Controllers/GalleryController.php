<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\gallery;

class GalleryController extends Controller
{
    public function index()
    {
        return view('gallery', [
            'galleries' => gallery::all()
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'artwork_name' => 'required',
            'artist_name' => 'required',
            'materials' => 'required',
            'dimension' => 'required',
            'description' => 'required',
            'year' => 'required'
        ]);

        $data = $request->only([
            'artwork_name',
            'artist_name',
            'materials',
            'dimension',
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

    public function update(Request $request)
    {
        $request->validate([
            'artwork_name' => 'required',
            'artist_name' => 'required',
            'materials' => 'required',
            'dimension' => 'required',
            'description' => 'required',
            'year' => 'required'
        ]);

        $data = $request->only([
            'artwork_name',
            'artist_name',
            'materials',
            'dimension',
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

    public function delete(Request $request)
    {
        $gallery = gallery::find($request->id);

        if (isset($gallery))
        {
            $gallery->delete();

            return redirect()->intended('/myartwork');
        }

        return back();
    }
}
