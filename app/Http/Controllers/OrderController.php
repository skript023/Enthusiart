<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gallery;

class OrderController extends Controller
{
    public function checkout($id)
    {
        $art = gallery::findOrFail($id);

        return view('checkout', [
            'art' => $art
        ]);
    }
}
