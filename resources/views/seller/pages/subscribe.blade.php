@extends('layouts.backend')

@section('content')
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-success text-center"><h5>Subscribe To Access Subject Exam Services</h5></div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('subscription.process') }}" method="POST" id="payment-form">
                            @csrf

                            <div class="form-group">
                                <label for="plan">Choose a Plan:</label>
                                <select name="plan" id="plan" class="form-control">
                                    @foreach ($plans as $plan)
                                        <option value="{{ $plan->id }}">{{ $plan->product->name }} -
                                            ${{ $plan->amount / 100 }} per {{ $plan->interval_count }}
                                            @if ($plan->interval_count > 1)
                                                {{ $plan->interval . 's' }}
                                            @else
                                                {{ $plan->interval }}
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                                <div class="form-group">
                                    <label for="plan">Enter Phone:</label>
                                    <input type="text" class="form-control" name="phone" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="card-holder-name">Card Holder Name</label>
                                    <input id="card-holder-name" type="text" class="form-control" value="{{auth()->user()->name}}">
                                </div>
                            </div>
                            <label><strong>Enter Card Details:</strong></label>
                            <div id="card-element" class="form-group mt-3 mb-3 font-weight-bold" style="min-height: 20px;">

                                <!-- Stripe.js will inject the card elements here -->
                            </div>

                            <button type="submit" class="btn btn-primary" id="subscribe-button">
                                Subscribe
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Initialize Stripe.js
            var stripe = Stripe('{{ config('services.stripe.key') }}');

            // Create an instance of Elements
            var elements = stripe.elements();

            // Create a card element
            var cardElement = elements.create('card');

            // Mount the card element on the page
            cardElement.mount('#card-element');


            // Handle the payment form submission
            var form = document.getElementById('payment-form');
            var submitButton = document.getElementById('subscribe-button');
            const cardHolderName = document.getElementById('card-holder-name');
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                // Disable the submit button to prevent multiple submissions
                submitButton.disabled = true;

                // Create a payment method
                stripe.createPaymentMethod('card', cardElement)
                    .then(function(result) {
                        if (result.error) {
                            // Display any errors to the user
                            var errorElement = document.getElementById('card-errors');
                            errorElement.textContent = result.error.message;

                            // Re-enable the submit button
                            submitButton.disabled = false;
                        } else {
                            // Tokenize the payment method ID
                            var paymentMethodToken = result.paymentMethod.id;

                            // Add the payment method token to the form
                            var hiddenInput = document.createElement('input');
                            hiddenInput.setAttribute('type', 'hidden');
                            hiddenInput.setAttribute('name', 'payment_method_token');
                            hiddenInput.setAttribute('value', paymentMethodToken);
                            form.appendChild(hiddenInput);

                            // Submit the form
                            form.submit();
                        }
                    });
            });
        });
    </script>
@endsection
