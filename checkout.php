<?php
    
    require __DIR__ . "/vendor/autoload.php";

    $stripe_secret_key = "sk_test_51OGKRDLTlinqyYUr9gofHxlictq5WgnMaGmglvdkZh3OwP80MiL0zlyFf7vq7eCYJREllqsx948iCzNNov5coPAo006JS32Y8B";

    \Stripe\Stripe::setApiKey($stripe_secret_key);

    $checkout_session = \Stripe\Checkout\Session::create([
        "mode" => "payment",
        "success_url" => "http://localhost/FYP-TourWeb/success.php",
        "cancel_url" => "http://localhost/FYP-TourWeb/index.html",
        "line_items" => [
            [
                "quantity" => 1,
                "price_data" => [
                    "currency" => "myr",
                    "unit_amount" => 2000,
                    "product_data" => [
                        "name" => "T-shirt"
                    ]
                ]
            ]
        ]
    ]);

    http_response_code(303);
    header("Location:" .$checkout_session->url);

?>