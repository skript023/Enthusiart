<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function mySale(Request $request)
    {
        try 
        {
            $sales = order::with(['artwork', 'user'])
                ->whereHas('artwork', fn($query) => $query->where('user_id', auth()->user()->id))
                ->orderBy('created_at', 'desc')
                ->paginate(6);

            return view('sales', [
                'sales' => $sales,
            ]);
        } 
        catch (\Throwable $th) 
        {
            return redirect('/login');
        }
    }

    public function orderDetail($id)
    {
        try 
        {
            $order = order::with(['artwork', 'user', 'payment'])->findOrFail($id);

            return view('order', [
                'order' => $order,
                'invoice_number' => $order->invoice_number,
            ]);
        } 
        catch (\Throwable $th) 
        {
            dd($th);
        }
    }
}
