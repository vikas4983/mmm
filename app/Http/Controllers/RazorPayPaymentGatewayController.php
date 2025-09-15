<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Plan;
use App\Models\RazorPayPaymentGateway;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Razorpay\Api\Api;

class RazorPayPaymentGatewayController extends Controller
{
    public function order(Request $request)
    {
        $user = Auth::check();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login first');
        }
        $data = $request->all();
        return view('razorpay.order', compact('data'));
    }
    public function makePayment(Request $request)
    {

        $selectedPlan = Plan::where('id', $request->plan_id)->first();
        if (!$selectedPlan) {
            return redirect()->back()->with('error', 'Something went wrong, please try again');
        }
        $user = Auth::user();
        $api = new Api(
            config('services.razorpay.key'),
            config('services.razorpay.secret')
        );
        $currentDate = Carbon::now();
        $key = config('services.razorpay.key');

        $order = $api->order->create([
            'receipt' => 'order_' . uniqid(),
            'amount' => $selectedPlan->offer_price * 100,
            'currency' => 'INR',
            'payment_capture' => 1
        ]);
        $existingPayment = RazorPayPaymentGateway::where('user_id', $user->id)
            ->where('plan_id', $selectedPlan->id)
            ->where('status', 1)
            ->where('expiry_date', '>', $currentDate)
            ->latest()
            ->first();

        if (!$existingPayment) {
            try {
                $payment = RazorPayPaymentGateway::create([
                    'user_id' => $user->id,
                    'plan_id' => $selectedPlan->id,
                    'amount' => $selectedPlan->offer_price,
                    'order_id' => $order['id'],
                    'status' => 0,
                    'expiry_date' =>  $currentDate->copy()->addDays((int) ($selectedPlan->duration)),

                ]);

                $selectedPlanId = $selectedPlan->id;
                $selectedPlanPrice = $selectedPlan->offer_price;

                return view('razorpay.makePayment', compact('payment', 'key', 'user', 'selectedPlanId', 'selectedPlanPrice'));
            } catch (\Throwable $e) {
                return redirect()->back()->with('error', 'Payment verification failed: ' . $e->getMessage());
            }
        }
        return redirect()->route('dashboard')->with('success', 'You already have an active plan');
    }

    public function success(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login first');
        }
        $currentDate = Carbon::now();
        $user = Auth::user();
        if (!$request->razorpay_payment_id || !$request->razorpay_order_id) {
            return redirect()->back()->with('error', 'Something went wrong, please try again');
        }
        $paymentRecord = RazorPayPaymentGateway::where('order_id', $request->razorpay_order_id)->first();
        if (!$paymentRecord) {
            return redirect()->back()->with('error', 'Order not found, please try again');
        }
        try {
            $api = new Api(
                config('services.razorpay.key'),
                config('services.razorpay.secret')
            );
            $payment = $api->payment->fetch($request->razorpay_payment_id);
            if ($payment->status === 'captured') {
                $paymentRecord->update([
                    'status' => '1'
                ]);
                $plan = Plan::findOrFail($request->selectedPlanId);
                $previousPayment = Payment::where('user_id', $user->id)
                    ->where('expiry_date', '>', $currentDate)
                    ->where('is_paid', 1)
                    ->latest('created_at')
                    ->first();
                $contact = $plan->allow_contact;
                $expiry = $currentDate->copy()->addDays((int) $plan->duration);
                if ($previousPayment) {
                    $contact += $previousPayment->contact;
                    $expiry = Carbon::parse($previousPayment->expiry_date)->addDays((int) $plan->duration);
                }
                Payment::create([
                    'user_id'     => $user->id,
                    'plan_id'     => $plan->id,
                    'contact'     => $contact,
                    'expiry_date' => $expiry,
                    'is_paid'     => 1,
                ]);

                return redirect()->route('dashboard')->with('success', 'Payment has been successful');
            }
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Payment verification failed: ' . $e->getMessage());
        }
    }

    public function failed(Request $request)
    {
        $orderId =   RazorPayPaymentGateway::where('order_id', $request->razorpay_order_id)->first();
        if (!$orderId) {
            return redirect()->route('plan')->with('error', 'Something went wrong');
        }
        $orderId->update([
            'status' => 2, // Failed payment

        ]);
        return redirect()->route('plan')->with('error', 'Your payment has been cancelled. Try again or complete the payment later.');
    }
    public function cancelled(Request $request)
    {
        $orderId =   RazorPayPaymentGateway::where('order_id', $request->razorpay_order_id)->first();
        if (!$orderId) {
            return redirect()->route('plan')->with('error', 'Something went wrong');
        }
        $orderId->update([
            'status' => 3, // User cancelled the payment

        ]);
        return redirect()->route('plan')->with('error', 'You have cancelled the payment');
    }
}
