<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\gallery;

class ArtworkController extends Controller
{
    public function myArtworks(Request $request)
    {
        $artworks = gallery::with(['user'])->where('user_id', auth()->user()->id)->get();

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
                'image' => 'required|file|max:2048',
                'category' => 'required',
                'artwork_name' => 'required',
                'year' => 'required',
                'dimension' => 'required',
                'materials' => 'required'
            ]);

            $data = $request->only([
                'artist_name',
                'image',
                'category',
                'artwork_name',
                'year',
                'dimension',
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
}