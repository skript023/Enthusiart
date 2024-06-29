<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\favorite;

class FavoriteController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'gallery_id' => 'required'
        ]);

        $data = $request->only([
            'gallery_id'
        ]);

        try 
        {
            favorite::create($data);

            return back();
        } 
        catch (\Throwable $th) 
        {
            return redirect()->intended('/');
        }
    }

    public function delete(Request $request)
    {
        
    }

    function favorite(Request $request)
    {
        $favorite = favorite::find($request->gallery_id);

        if ($favorite)
        {
            $favorite->delete();

            return back();
        }
        favorite::create([
            'gallery_id' => $request->gallery_id
        ]);

        return back();
    }
}
