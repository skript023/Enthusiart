<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\category;

class CategoryController extends Controller
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
            $user = category::create($data);

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

        $category = category::find($request->id);

        try 
        {
            $category->update($data);

            return redirect()->intended('/');
        } 
        catch (\Throwable $th) 
        {
            return back();
        }
    }

    function delete(Request $request)
    {
        $category = category::find($request->category);

        if (isset($category))
        {
            $category->delete();

            return redirect()->intended('/dashboard/users');
        }

        return back();
    }
}
