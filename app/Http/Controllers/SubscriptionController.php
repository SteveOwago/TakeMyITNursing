<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Laravel\Cashier\Cashier;
use Stripe\Stripe;
use Stripe\Plan;
use Stripe\Subscription;
use Stripe\Customer;
use App\Models\User;
use App\Services\PaymentService;
use Stripe\PaymentMethod;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // public function retrievePlans()
    // {
    //     $key = \config('services.stripe.secret');
    //     $stripe = new \Stripe\StripeClient($key);
    //     $plansraw = $stripe->plans->all();
    //     $plans = $plansraw->data;

    //     foreach ($plans as $plan) {
    //         $prod = $stripe->products->retrieve(
    //             $plan->product,
    //             []
    //         );
    //         $plan->product = $prod;
    //     }
    //     return $plans;
    // }
    // public function showSubscription()
    // {
    //     $plans = $this->retrievePlans();
    //     $user = Auth::user();

    //     return view('seller.pages.subscribe', [
    //         'user' => $user,
    //         'intent' => $user->createSetupIntent(),
    //         'plans' => $plans
    //     ]);
    // }
    // public function processSubscription(Request $request)
    // {
    //     $user = Auth::user();
    //     $paymentMethod = $request->input('payment_method');

    //     $user->createOrGetStripeCustomer();
    //     $user->addPaymentMethod($paymentMethod);
    //     $plan = $request->input('plan');
    //     try {
    //         $user->newSubscription('default', $plan)->create($paymentMethod, [
    //             'email' => $user->email
    //         ]);
    //     } catch (\Exception $e) {
    //         return back()->withErrors(['message' => 'Error creating subscription. ' . $e->getMessage()]);
    //     }

    //     return redirect()->route('home')->with('success', 'Subscription created successfully');
    // }

    public function subscribe(Request $request)
    {
        // $plans = Plan::all();
        if ($request->user()->subscribed('default')) {
            $plan = new PaymentService();
            $planName = $plan->getCurrentUserSubscriptionPlan();
            return redirect()->route('dashboard')->with('success', 'You are subscribed to ' . strtoupper($planName));
        }
        $key = \config('services.stripe.secret');
        $stripe = new \Stripe\StripeClient($key);
        $plansraw = $stripe->plans->all(['expand' => ['data.product']]);;
        $plans = $plansraw->data; // Get all available subscription plans from Stripe
        return view('seller.pages.subscribe', compact('plans'));
    }

    public function processSubscription(Request $request)
    {
        $user = $request->user(); // Get the authenticated user

        // Retrieve selected plan and payment token from the form
        $planId = $request->input('plan');
        $paymentMethodToken = $request->input('payment_method_token');

        // Create or retrieve the Stripe customer associated with the user
        // Create or retrieve the Stripe customer associated with the user
        $customer = $user->createOrGetStripeCustomer();
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        // Attach the payment method to the customer
        $paymentMethod = PaymentMethod::retrieve($paymentMethodToken);
        $paymentMethod->attach(['customer' => $customer->id]);

        $customer->invoice_settings->default_payment_method = $paymentMethod->id;
        $customer->save();
        // Subscribe the customer to the selected plan
        $subscription = $user->newSubscription('default', $planId)->create($paymentMethod->id);
        $subscription->update(['default_payment_method' => $paymentMethod->id]);
        // Replace with your subscription ID
        $subscriptionPlan = new PaymentService();
        $subscriptionId = $subscriptionPlan->getStripePlanID();

        $subscriptionPlan = Subscription::retrieve($subscriptionId);

        $currentPeriod_end = date('Y-m-d H:i:s', $subscriptionPlan->current_period_end);

        $subscription->update(['ends_at' => $currentPeriod_end]);

        // Process any necessary logic after successful subscription
        //Payment Update
        $subscriptionAmount = $subscriptionPlan->items->data[0]->plan->amount;
        Payment::create([
            'user_id' => $user->id,
            'subscription_id' => $subscription->id,
            'amount' => $subscriptionAmount,
        ]);

        return redirect()->back()->with('success', 'Subscription successful!');
    }

    public function cancelSubscription(Request $request)
    {
        $user = $request->user(); // Get the authenticated user

        Stripe::setApiKey(config('services.stripe.secret'));

        // Retrieve the user's subscription
        $subscription = $user->subscription('default');

        // Cancel the subscription
        $subscription->cancel();

        // Process any necessary logic after successful subscription cancellation

        return redirect()->back()->with('success', 'Subscription canceled successfully.');
    }
}
