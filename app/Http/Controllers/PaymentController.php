<?php

namespace App\Http\Controllers;

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
