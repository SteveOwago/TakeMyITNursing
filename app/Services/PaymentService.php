<?php

namespace App\Services;


use Illuminate\Support\Facades\Auth;
use Stripe\Price;
use Stripe\Product;
/**
 * Class PaymentService.
 */
class PaymentService
{
    //Get User Account Subscription type.
    public function getCurrentUserSubscriptionPlan()
    {
        $user = Auth::user(); // Get the authenticated user

        // Check if the user has an active subscription
        if ($user->subscribed('default')) {
            $subscription = $user->subscription('default');
            $stripePlanId = $subscription->stripe_id;
            $stripePriceId = $subscription->stripe_price;

            // Retrieve the product and plan details from Stripe
            \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
            $price = Price::retrieve($stripePriceId);
            $product = Product::retrieve($price->product);

            return $product->name;
        }

        return null; // User doesn't have an active subscription
    }
}
