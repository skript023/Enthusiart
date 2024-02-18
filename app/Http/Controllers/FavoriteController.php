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
}
