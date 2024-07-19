<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gallery;
use App\Models\order;

class OrderController extends Controller
{
    public function checkout($id)
    {
        $art = gallery::findOrFail($id);

        return view('checkout', [
            'art' => $art
        ]);
    }

    public function order (Request $request)
    {
        try {
            $request->validate([
                'fullname' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'price' => 'required',
            ]);
    
            $data = $request->only([
                'price',
                'fullname',
                'email',
                'phone',
                'address'
            ]);
    
            $data['status'] = 'on progress';
            $data['art_id'] = $request->id;
            
            $order = order::create($data);
            $art = gallery::findOrFail($order->art_id);
    
            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;
    
            $params = array(
                'transaction_details' => array(
                    'order_id' => $order->id,
                    'gross_amount' => $order->price,
                ),
                'customer_details' => array(
                    'fullname' => $data['fullname'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                ),
            );
            
            $snapToken = \Midtrans\Snap::getSnapToken($params);
    
            return view('transaction', [
                'fullname' => $data['fullname'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'address' => $data['address'],
                'art' => $art,
                'snapToken' => $snapToken
            ]);
        } 
        catch (\Throwable $th) 
        {
            dd($th);
            // throw $th;
        }
    }
}
