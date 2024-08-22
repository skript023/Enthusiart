<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gallery;
use App\Models\order;
use App\Models\User;

class OrderController extends Controller
{
    public function checkout($id, Request $request)
    {
        $art = gallery::findOrFail($id);
        $quantity = $request->input('quantity', 1);
        $total_price = $art->price * $quantity;

        return view('checkout', [
            'art' => $art,
            'quantity' => $quantity,
            'total_price' => $total_price
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
                'quantity' => 'required',
                'total_price' => 'required'
            ]);

            $data = $request->only([
                'price',
                'fullname',
                'email',
                'phone',
                'address',
                'quantity',
                'total_price'
            ]);

            $date = now()->format('Ymd');
            $randomString = strtoupper(substr(md5(uniqid(rand(), true)), 0, 4));
            $lastOrder = order::whereDate('created_at', now()->toDateString())->latest()->first();
            $lastId = $lastOrder ? $lastOrder->id : 0;
            $nextId = $lastId + 1;

            $invoice_number = 'INV-' . $date . str_pad($nextId, 4, '0', STR_PAD_LEFT) . $randomString;
            $data['invoice_number'] = $invoice_number;

            $data['user_id'] = auth()->user()->id;
            $data['art_id'] = $request->id;
            $data['status'] = 'Waiting for Payment';
            $data['total_price'] = $data['price'] * $data['quantity'];
            
            $order = order::create($data);
            $art = gallery::findOrFail($order->art_id);
            $user = User::findOrFail($order->user_id);
            
            if ($art->stock < $order->quantity) 
            {
                return back()->with('error', 'Not enough stock available.');
            }
            
            $art->stock -= $order->quantity;
            $art->save();
            
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
                    'order_id' => $invoice_number,
                    'gross_amount' => $order->total_price,
                ),
                'customer_details' => array(
                    'fullname' => $data['fullname'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                ),
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);

            $order->snap_token = $snapToken;
            $order->save();

            return view('transaction', [
                'order' => $order,
                'user' => $user,
                'art' => $art,
                'snapToken' => $snapToken,
                'total_price' => $order->total_price,
                'quantity' => $order->quantity
            ]);
        }
            
        catch (\Throwable $th)
        {
            return back()->with('error',$th->getMessage());
            // dd($th);
        }
    }

    function updateOrderOnTransaction(Request $request)
    {
        try
        {
            $order = order::findOrFail($request->id);

            $order->status = $request->status;

            return response()->json([
                'message' => 'Order updated successfully.',
                'success' => true
            ]);
        }
        catch (\Throwable $th)
        {
            return response()->json([
                'message' => 'Failed update order, error code: ' + $th->getCode(),
                'success' => false
            ], 500);
        }
    }

    public function orderHistory(Request $request)
    {
        if (auth()->check())
        {
            $orders = order::with(['artwork','user'])->where('user_id', auth()->user()->id)->paginate(6);
            
            return view('purchase',[
                'orders' => $orders
            ]);
        }

        return redirect('/login');
    }

    public function invoice(Request $request)
    {
        try 
        {
            $invoice = order::with(['artwork','user','payment'])->where('id', $request->id)->where('user_id', auth()->user()->id)->first();
            // $invoice_number = 'INV-' . strtoupper(uniqid());
            
            return view('invoice', [
                'order' => $invoice,
                'invoice_number' => $invoice->invoice_number, //rand(0, 4294967295)
            ]);
        } 
        catch (\Throwable $th) 
        {
            return back()->with('error',$th->getMessage());
        }
    }

    public function orderSuccess($id)
    {
        try 
        {
            $order = order::findOrFail($id);

            return view('success', compact('order'));
        } 
        catch (\Throwable $th) 
        {
            return back()->with('error',$th->getMessage());
        }
    }

    public function continuePayment($id)
    {
        $order = order::findOrFail($id);
        
        if ($order->status == 'Waiting for Payment' && $order->snap_token) 
        {
            $user = auth()->user();

            return view('transaction', [
                'order' => $order,
                'snapToken' => $order->snap_token,
                'art' => $order->artwork,
                'total_price' => $order->total_price,
                'quantity' => $order->quantity,
                'user' => $user
            ]);
        }
        
        return redirect()->back()->with('error', 'Unable to continue payment.');
    }
}
