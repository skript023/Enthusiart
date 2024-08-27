<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\gallery;
use App\Models\favorite;
use Carbon\Carbon;

class GalleryController extends Controller
{
    public function gallery()
    {
        $galleries = gallery::paginate(9);
        $favoriteIds = [];
        
        if (auth()->check()) 
        {
            $favoriteIds = favorite::where('user_id', auth()->user()->id)->pluck('gallery_id')->toArray();
        }

        return view('gallery', [
            'galleries' => $galleries,
            'favoriteIds' => $favoriteIds
        ]);
    }

    public function detail(Request $request)
    {
        try
        {
            $gallery = gallery::findOrFail($request->id);
            $favoriteIds = [];

            if (auth()->check()) 
            {
                $favoriteIds = favorite::where('user_id', auth()->user()->id)->pluck('gallery_id')->toArray();
            }

            return view('detail', [
                'art' => $gallery,
                'favoriteIds' => $favoriteIds
            ]);
        }
        catch (\Throwable $th)
        {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function create(Request $request)
    {
        $request->validate([
            'artwork_name' => 'required',
            'artist_name' => 'required',
            'materials' => 'required',
            'dimension' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
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
            $filename = $data['artwork_name'] . '.' . $extension;
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
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
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
            $filename = $data['artwork_name'] . '.' . $extension;
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
