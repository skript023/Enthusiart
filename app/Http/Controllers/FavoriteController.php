<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\favorite;

class FavoriteController extends Controller
{

    public function favorite()
    {
        $favorites = favorite::where('user_id', auth()->user()->id)->with('gallery')->paginate(9);
        return view('favorite', ['favorites' => $favorites]);
    }

    public function create(Request $request)
    {
        // if (!auth()->check()) 
        // {
        //     return redirect()->route('login');
        // }

        $request->validate([
            'gallery_id' => 'required'
        ]);

        $data = $request->only([
            'gallery_id'
        ]);

        $data['user_id'] = auth()->user()->id;

        $favorite = favorite::where('user_id', $data['user_id'])
                            ->where('gallery_id', $data['gallery_id'])
                            ->first();

        if ($favorite) {
            return response()->json(['success' => false, 'message' => 'Already favorited']);
        }

        try 
        {
            favorite::create($data);
            return response()->json(['success' => true, 'message' => 'Artwork successfully added to favorite']);
        } 
        catch (\Throwable $th) 
        {
            return response()->json(['success' => false, 'message' => 'Failed to add favorite']);
        }
    }

    public function delete($id)
    {
        $favorite = favorite::where('user_id', auth()->user()->id)
                            ->where('gallery_id', $id)
                            ->first();

        if ($favorite) 
        {
            $favorite->delete();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
}