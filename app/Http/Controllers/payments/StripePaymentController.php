<?php
    
namespace App\Http\Controllers\payments;
     
use Stripe\Stripe;
use Stripe\PaymentIntent;
use App\Http\Controllers\Controller;

class StripePaymentController extends Controller
{
    public function checkout()
    {   
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51M9lIkJiRBCGoE6wY9j3ppIhw5UzGO4UNnPrzDxVW7pzEL2P0wCR2vYziRWLknqOSj24aroCs4tA8lFUkrgLHBwW006JqG5W9K');

        		
		$amount = 100;
		$amount *= 100;
        $amount = (int) $amount;
        
        $payment_intent = PaymentIntent::create([
			'description' => 'Stripe Test Payment',
			'amount' => $amount,
			'currency' => 'AUD',
			'description' => 'Payment From All About Laravel',
			'payment_method_types' => ['card'],
		]);
		$intent = $payment_intent->client_secret;

		return view('frontend.payment.stripe',compact('intent'));

    }

    public function afterPayment()
    {
        echo 'Payment Received, Thanks you for using our services.';
    }
}