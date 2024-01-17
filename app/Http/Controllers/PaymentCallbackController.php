<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Services\Midtrans\CallbackService;
use Illuminate\Http\Request;

class PaymentCallbackController extends Controller
{
    //
    public function receive()
    {
        $callback = new CallbackService;

        if ($callback->isSignatureKeyVerified()) {
            $notification = $callback->getNotification();
            $order = $callback->getOrder();

            if ($callback->isSuccess()) {
                Checkout::where('id', $order->id)->update([
                    'payment_status' => 2,
                    'status' => 1
                ]);
            }

            if ($callback->isExpire()) {
                Checkout::where('id', $order->id)->update([
                    'payment_status' => 3,
                ]);
            }

            if ($callback->isCancelled()) {
                Checkout::where('id', $order->id)->update([
                    'payment_status' => 4,
                ]);
            }

            return response()
                ->json([
                    'success' => true,
                    'message' => 'Notification successfully processed',
                ], 200); 
                // ->header('Content-Type', 'application/json')
                // ->setStatusCode(308); // or setStatusCode(308);;
        } else {
            return response()
                ->json([
                    'error' => true,
                    'message' => 'Signature key not verified',
                ], 403);
        }
    }
}
