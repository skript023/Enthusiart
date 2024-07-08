<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\favorite;

class FavoriteController extends Controller
{

    public function favorite()
    {
        $favorites = favorite::where('user_id', auth()->user()->id)->with('gallery')->get();
        return view('favorite', ['favorites' => $favorites]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'gallery_id' => 'required'
        ]);

        $data = $request->only([
            'gallery_id'
        ]);

        $data['user_id'] = auth()->user()->id;

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

    public function delete($id)
    {
        $favorite = favorite::where('user_id', auth()->user()->id)->where('gallery_id', $id)->first();

        if ($favorite) {
            $favorite->delete();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
}