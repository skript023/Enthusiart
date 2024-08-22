<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\gallery;

class ArtworkController extends Controller
{
    public function myArtworks(Request $request)
    {
        $artworks = gallery::with(['user'])->where('user_id', auth()->user()->id)->paginate(12);

        return view('myartworks', [
            'artworks' => $artworks
        ]);
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

            return redirect()->intended('/myartwork');
        }
        catch (\Throwable $th)
        {
            dd($th);
            toastr()->error('Upload artwork Failed');

            return back();
        }
    }

    public function edit($id)
    {
        $artwork = gallery::findOrFail($id);
        return view('edit', compact('artwork'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'artwork_name' => 'required',
            'artist_name' => 'required',
            'materials' => 'required',
            'dimension' => 'required',
            'price' => 'required',
            // 'description' => 'required',
            'year' => 'required'
        ]);

        $data = $request->only([
            'artwork_name',
            'artist_name',
            'materials',
            'dimension',
            'price',
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

        $artwork = gallery::find($request->id);

        try
        {
            $artwork->update($data);

            return redirect()->intended('/myartwork');
        }
        catch (\Throwable $th)
        {
            return back();
        }
    }
}
