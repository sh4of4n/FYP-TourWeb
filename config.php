<?php
    require_once "/init.php";

    $stripedetails = array(
        "publishableKey"=>"pk_test_51OGKRDLTlinqyYUrtLZ0CJoSv4QFkPw3Y7bzXU4hOHtekr8RFeVKhgGFMMisVZXgn27GHLZjuUfpKjDxcgL2R8cI008v4lTNF3",
        "secretKey"=>"sk_test_51OGKRDLTlinqyYUr9gofHxlictq5WgnMaGmglvdkZh3OwP80MiL0zlyFf7vq7eCYJREllqsx948iCzNNov5coPAo006JS32Y8B"
    );

    \Stripe\Stripe::setApiKey($stripedetails["secretKey"]);

?>