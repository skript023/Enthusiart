<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    function callbackMidtrans(Request $request)
    {
        try
        {
            $data = $request->only([
                'order_id',
                'transaction_id',
                'merchant_id',
                'gross_amount',
                'currency',
                'payment_type',
                'transaction_status',
                'transaction_time',
                'fraud_status',
                'expiry_time',
            ]);
            
            $order = order::where('invoice_number', $request->order_id)->firstOrFail();

            if (in_array($request->transaction_status, ['settlement', 'capture']))
            {
                $payment = payment::updateOrCreate(['transaction_id' => $request->transaction_id], $data);

                // $order = order::findOrFail($request->order_id);
                $order->status = 'Success';
                $order->save();

                return response()->json([
                    'message' => 'Payment and Order Status updated successfully',
                    'success' => true
                ], 200);
            }

            if ($request->transaction_status == 'pending' && $request->status_code == 201)
            {
                payment::create($data);

                return response()->json([
                    'message' => 'Created payment successfully',
                    'success' => true
                ], 201);
            }

            $payment = payment::where('transaction_id', $request->transaction_id)->first();

            $payment->transaction_status = $data['transaction_status'];

            $payment->save();

            return response()->json([
                'message' => 'Payment updated successfully',
                'success' => true
            ]);
        }
        catch (\Throwable $th)
        {
            return response()->json([
                'message' => 'Created payment failed, error code: ' + $th->getCode(),
                'success' => false
            ], 500);
        }
    }
}
