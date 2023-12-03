<?php
session_start();
if (isset($_SESSION["reg_name"])) {
    $name = $_SESSION["reg_name"];
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Login Form</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link href="favicon.ico" rel="shortcut icon">
        <link rel="stylesheet" href="assets/css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/animate.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/nexus1.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/responsive.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/custom.css" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=PT+Sans" type="text/css" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Roboto:400,300" rel="stylesheet" type="text/css">
    </head>

    <body>
        <div id="body-bg">
            <ul class="social-icons pull-right hidden-xs">
                <li class="social-rss">
                    <a href="#" target="_blank" title="RSS"></a>
                </li>
                <li class="social-twitter">
                    <a href="https://twitter.com/login?lang=en" target="_blank" title="Twitter"></a>
                </li>
                <li class="social-facebook">
                    <a href="https://www.facebook.com" target="_blank" title="Facebook"></a>
                </li>
                <li class="social-googleplus">
                    <a href="https://accounts.google.com/signin/v2/identifier?hl=en-US&flowName=GlifWebSignIn&flowEntry=ServiceLogin" target="_blank" title="GooglePlus"></a>
                </li>
            </ul>
            <div id="pre-header" class="container" style="height: 40px">
            </div>
            <div id="header">
                <div class="container">
                    <div class="row">
                        <div class="logo">
                            <a href="index.html" title="">
                                <img src="assets/img/Design.png" style="height: 80px;" alt="Logo" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="hornav" class="container no-padding">
                <div class="row">
                    <div class="col-md-12 no-padding">
                        <div class="text-center visible-lg">

                        </div>
                    </div>
                </div>
            </div>
            <div id="post_header" class="container" style="height: 40px">
            </div>
            <div id="content-top-border" class="container">
            </div>
            <div id="content">
                <div class="container background-white">
                    <div class="container">
                        <div class="row margin-vert-30">
                            <div class="col-md-6 col-md-offset-3 col-sm-offset-3">
                                <form class="login-page" method="post">
                                    <div class="login-header margin-bottom-30">
                                        <h2>Your Booking Details</h2>
                                    </div>
                                    <div class="input-group margin-bottom-20">
                                        <?php
                                        $con = mysqli_connect("localhost", "root", "", "tour_database");
                                        if (!$con)
                                            die("cannot connect to server");
                                        else {
                                            $book_id = $_GET["id"];
                                            $class = $_GET["class"];
                                            if ($class = "1STAR" || $class = "2STAR" || $class = "3STAR" || $class = "4STAR" || $class = "5STAR") {
                                                $sql = "SELECT * FROM hotel_search WHERE hotel_id = $book_id";
                                                $rs = mysqli_query($con, $sql);
                                                $row = mysqli_fetch_row($rs);
                                                $referrer = $_SERVER['HTTP_REFERER'];
                                                if (mysqli_num_rows($rs) > 0) {
                                                    $no_of_traveller = $_GET["traveller"];

                                                    $email = $_GET["email"];
                                                    echo "<p>Name: $name</p>";
                                                    echo "<p>Email: $email</p>";
                                                    echo "<p>Booking Id: $book_id</p>";
                                                    echo "<p>Number of Traveller: $no_of_traveller</p>";
                                                    echo "<p>Hotel Name: $row[1]</p>";
                                                    echo "<p>Hotel Class: $row[2]</p>";
                                                    echo "<p>Hotel Location: $row[3]</p>";
                                                    echo "<p>Room Type: $row[4]</p>";
                                                    echo "<p>Room Price: $row[5]</p>";
                                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                        require __DIR__ . "/vendor/autoload.php";

                                                        $stripe_secret_key = "sk_test_51OGKRDLTlinqyYUr9gofHxlictq5WgnMaGmglvdkZh3OwP80MiL0zlyFf7vq7eCYJREllqsx948iCzNNov5coPAo006JS32Y8B";

                                                        \Stripe\Stripe::setApiKey($stripe_secret_key);

                                                        $checkout_session = \Stripe\Checkout\Session::create([
                                                            "mode" => "payment",
                                                            "success_url" => "http://localhost/FYP-TourWeb/success.php",
                                                            "cancel_url" => "$referrer",
                                                            "line_items" => [
                                                                [
                                                                    "quantity" => 1,
                                                                    "price_data" => [
                                                                        "currency" => "myr",
                                                                        "unit_amount" => intval(str_replace("RM", "", $row[5]))*100* $no_of_traveller,
                                                                        "product_data" => [
                                                                            "name" => "$name, $email, $book_id, $no_of_traveller person, $row[1], $row[2], $row[3], $row[4]",
                                                                        ]
                                                                    ]
                                                                ]
                                                            ]
                                                        ]);

                                                        http_response_code(303);
                                                        header("Location:" . $checkout_session->url);
                                                    }
                                                }
                                            }
                                            if ($class = "Round Trip" || $class = "One Way") {
                                                $sql = "SELECT * FROM flight_search WHERE flight_id = $book_id";
                                                $rs = mysqli_query($con, $sql);
                                                $row = mysqli_fetch_row($rs);
                                                $referrer = $_SERVER['HTTP_REFERER'];
                                                if (mysqli_num_rows($rs) > 0) {
                                                    $no_of_traveller = $_GET["traveller"];

                                                    $email = $_GET["email"];
                                                    echo "<p>Name: $name</p>";
                                                    echo "<p>Email: $email</p>";
                                                    echo "<p>Flight Id: $book_id</p>";
                                                    echo "<p>Number of Traveller: $no_of_traveller</p>";
                                                    echo "<p>Flight Name: $row[1]</p>";
                                                    echo "<p>Flight From: $row[2]</p>";
                                                    echo "<p>Flight To: $row[3]</p>";
                                                    echo "<p>Flight Departure Time: $row[4]</p>";
                                                    echo "<p>Flight Arrival Time: $row[5]</p>";
                                                    echo "<p>Class: $row[6]</p>";
                                                    echo "<p>Flight Type: $row[7]</p>";
                                                    echo "<p>Flight Price: $row[8]</p>";
                                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                        require __DIR__ . "/vendor/autoload.php";

                                                        $stripe_secret_key = "sk_test_51OGKRDLTlinqyYUr9gofHxlictq5WgnMaGmglvdkZh3OwP80MiL0zlyFf7vq7eCYJREllqsx948iCzNNov5coPAo006JS32Y8B";

                                                        \Stripe\Stripe::setApiKey($stripe_secret_key);

                                                        $checkout_session = \Stripe\Checkout\Session::create([
                                                            "mode" => "payment",
                                                            "success_url" => "http://localhost/FYP-TourWeb/success.php",
                                                            "cancel_url" => "$referrer",
                                                            "line_items" => [
                                                                [
                                                                    "quantity" => 1,
                                                                    "price_data" => [
                                                                        "currency" => "myr",
                                                                        "unit_amount" => intval(str_replace("RM", "", $row[8]))*100*$no_of_traveller, 
                                                                        "product_data" => [
                                                                            "name" => "$name, $email, $book_id, $no_of_traveller person, $row[1], Flight From: $row[2] to $row[3] ,Flight Time: $row[4] -> $row[5],$row[6], $row[7]",
                                                                        ]
                                                                    ]
                                                                ]
                                                            ]
                                                        ]);

                                                        http_response_code(303);
                                                        header("Location:" . $checkout_session->url);
                                                    }
                                                }
                                            }
                                            if ($class = "AC2_TIER" || $class = "AC3_TIER" || $class = "CC" || $class = "AC1" || $class = "2S" || $class = "SLEEPER") {
                                                $sql = "SELECT * FROM train_search WHERE train_id = $book_id";
                                                $rs = mysqli_query($con, $sql);
                                                $row = mysqli_fetch_row($rs);
                                                $referrer = $_SERVER['HTTP_REFERER'];
                                                if (mysqli_num_rows($rs) > 0) {
                                                    $no_of_traveller = $_GET["traveller"];

                                                    $email = $_GET["email"];
                                                    echo "<p>Name: $name</p>";
                                                    echo "<p>Email: $email</p>";
                                                    echo "<p>Train Id: $book_id</p>";
                                                    echo "<p>Number of Traveller: $no_of_traveller</p>";
                                                    echo "<p>Train Name: $row[1]</p>";
                                                    echo "<p>Train From: $row[2]</p>";
                                                    echo "<p>Train To: $row[3]</p>";
                                                    echo "<p>Train Departure Time: $row[4]</p>";
                                                    echo "<p>Train Arrival Time: $row[5]</p>";
                                                    echo "<p>Class: $row[6]</p>";
                                                    echo "<p>Travel Type: $row[7]</p>";
                                                    echo "<p>Train Price: $row[8]</p>";
                                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                        require __DIR__ . "/vendor/autoload.php";

                                                        $stripe_secret_key = "sk_test_51OGKRDLTlinqyYUr9gofHxlictq5WgnMaGmglvdkZh3OwP80MiL0zlyFf7vq7eCYJREllqsx948iCzNNov5coPAo006JS32Y8B";

                                                        \Stripe\Stripe::setApiKey($stripe_secret_key);

                                                        $checkout_session = \Stripe\Checkout\Session::create([
                                                            "mode" => "payment",
                                                            "success_url" => "http://localhost/FYP-TourWeb/success.php",
                                                            "cancel_url" => "$referrer",
                                                            "line_items" => [
                                                                [
                                                                    "quantity" => 1,
                                                                    "price_data" => [
                                                                        "currency" => "myr",
                                                                        "unit_amount" => intval(str_replace("RM", "", $row[8]))*100*$no_of_traveller,
                                                                        "product_data" => [
                                                                            "name" => "$name, $email, $book_id, $no_of_traveller person, $row[1], Train From: $row[2] to $row[3], Train Time: $row[4] -> $row[5] , $row[6], $row[7]",
                                                                        ]
                                                                    ]
                                                                ]
                                                            ]
                                                        ]);

                                                        http_response_code(303);
                                                        header("Location:" . $checkout_session->url);
                                                    }
                                                }
                                            }
                                            if ($class = "Economy class" || $class = "Business class" || $class = "Premium class" || $class = "First class") {
                                                $sql = "SELECT * FROM destinations WHERE destination_id = $book_id";
                                                $rs = mysqli_query($con, $sql);
                                                $row = mysqli_fetch_row($rs);
                                                $referrer = $_SERVER['HTTP_REFERER'];
                                                if (mysqli_num_rows($rs) > 0) {
                                                    $no_of_traveller = $_GET["traveller"];

                                                    $email = $_GET["email"];
                                                    echo "<p>Name: $name</p>";
                                                    echo "<p>Email: $email</p>";
                                                    echo "<p>Booking Id: $book_id</p>";
                                                    echo "<p>Number of Traveller: $no_of_traveller</p>";
                                                    echo "<p>Destination Name: $row[1]</p>";
                                                    echo "<p>Tour Date: $row[2]</p>";
                                                    echo "<p>Tour Period: $row[3]</p>";
                                                    echo "<p>Travel By: $row[5]</p>";
                                                    echo "<p>Hotel Name: $row[6] ($row[7])</p>";
                                                    echo "<p>Tour Price: $row[8]</p>";
                                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                        require __DIR__ . "/vendor/autoload.php";

                                                        $stripe_secret_key = "sk_test_51OGKRDLTlinqyYUr9gofHxlictq5WgnMaGmglvdkZh3OwP80MiL0zlyFf7vq7eCYJREllqsx948iCzNNov5coPAo006JS32Y8B";

                                                        \Stripe\Stripe::setApiKey($stripe_secret_key);

                                                        $checkout_session = \Stripe\Checkout\Session::create([
                                                            "mode" => "payment",
                                                            "success_url" => "http://localhost/FYP-TourWeb/success.php",
                                                            "cancel_url" => "$referrer",
                                                            "line_items" => [
                                                                [
                                                                    "quantity" => 1,
                                                                    "price_data" => [
                                                                        "currency" => "myr",
                                                                        "unit_amount" => intval(str_replace("RM", "", $row[8]))*100*$no_of_traveller,
                                                                        "product_data" => [
                                                                            "name" => "$name, $email, $book_id, $no_of_traveller person, $row[1], Tour Date: $row[2] , $row[3], $row[5] , $row[6] ($row[7])",
                                                                        ]
                                                                    ]
                                                                ]
                                                            ]
                                                        ]);

                                                        http_response_code(303);
                                                        header("Location:" . $checkout_session->url);
                                                    }
                                                }
                                            }
                                            if ($class = "Compact" || $class = "SUV" || $class = "Sedan") {
                                                $sql = "SELECT * FROM cab_search WHERE cab_id = $book_id";
                                                $rs = mysqli_query($con, $sql);
                                                $row = mysqli_fetch_row($rs);
                                                $referrer = $_SERVER['HTTP_REFERER'];
                                                if (mysqli_num_rows($rs) > 0) {
                                                    $no_of_traveller = $_GET["traveller"];

                                                    $email = $_GET["email"];
                                                    echo "<p>Name: $name</p>";
                                                    echo "<p>Email: $email</p>";
                                                    echo "<p>Cab Booking Id: $book_id</p>";
                                                    echo "<p>Number of Traveller: $no_of_traveller</p>";
                                                    echo "<p>Cab Class: $row[1]</p>";
                                                    echo "<p>Cab From: $row[2]</p>";
                                                    echo "<p>Cab To: $row[3]</p>";
                                                    echo "<p>Cab Price: $row[4]</p>";
                                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                        require __DIR__ . "/vendor/autoload.php";

                                                        $stripe_secret_key = "sk_test_51OGKRDLTlinqyYUr9gofHxlictq5WgnMaGmglvdkZh3OwP80MiL0zlyFf7vq7eCYJREllqsx948iCzNNov5coPAo006JS32Y8B";

                                                        \Stripe\Stripe::setApiKey($stripe_secret_key);

                                                        $checkout_session = \Stripe\Checkout\Session::create([
                                                            "mode" => "payment",
                                                            "success_url" => "http://localhost/FYP-TourWeb/success.php",
                                                            "cancel_url" => "$referrer",
                                                            "line_items" => [
                                                                [
                                                                    "quantity" => 1,
                                                                    "price_data" => [
                                                                        "currency" => "myr",
                                                                        "unit_amount" => intval(str_replace("RM", "", $row[4]))*100*$no_of_traveller,
                                                                        "product_data" => [
                                                                            "name" => "$name, $email, $book_id, $no_of_traveller person, $row[1], Cab From: $row[2] to $row[3]",
                                                                        ]
                                                                    ]
                                                                ]
                                                            ]
                                                        ]);

                                                        http_response_code(303);
                                                        header("Location:" . $checkout_session->url);
                                                    }
                                                }
                                            } else {
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button class="btn btn-primary pull-right" type="submit" name="btn1">PROCEED TO PAYMENT</button>
                                        </div>
                                    </div>
                                    <hr>
                                </form>
                                <?php

                                // if(isset($_POST["btn1"]))
                                // {

                                // 	$book_id=$_GET["id"];
                                // 	echo "<script>alert('Booking Successful. Your Booking Id is $book_id')</script>";
                                // 	echo "<script>window.location.href='user_login.php'</script>";	
                                // }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="content-bottom-border" class="container">
            </div>
            <div id="base">
                <div class="container padding-vert-30 margin-top-60">
                    <div class="row">
                        <div class="col-md-4 margin-bottom-20">
                            <h3 class="margin-bottom-10">Contact Details</h3>
                            <p>
                                <span class="fa-phone">Telephone:</span>(+6)04-8995230
                                <br>
                                <span class="fa-envelope">Email:</span>
                                <a href="mailto:mrinaldas969@gmail.com">info@mndas.com</a>
                                <br>
                                <span class="fa-link">Website:</span>
                                <a href="index.html">www.TragendaTour&Travel.com</a>
                            </p>
                            <p><br><b>Address :</b>
                                <br>77, Lorong Lembah Permai Tiga,
                                <br>11200 Tanjong Bungah,
                                <br>Pulau Pinang,
                                <br>Malaysia.
                            </p>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-3 margin-bottom-20 padding-vert-30 text-center">
                            <h3 class="color-gray margin-bottom-10">Join our Newsletter</h3>
                            <p>
                                Sign up for our newsletter for all the
                                <br>latest news and information
                            </p>
                            <input type="email">
                            <br>
                            <button class="btn btn-primary btn-lg margin-top-20" style="background-color:aqua" type="button"><a href="assets/Brochure1.docx">Subscribe</a></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div id="footer">
                <div class="container">
                    <div class="row">
                        <div id="footermenu" class="col-md-8">
                        </div>
                        <div id="copyright" class="col-md-4">
                            <p class="pull-right" style="width: 400px; background-color: cadetblue; color: white; text-align: center;">&copy; Copyright Tragenda Tours And Treavel 2000. All Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript" src="assets/js/jquery.min.js" type="text/javascript"></script>
            <script type="text/javascript" src="assets/js/bootstrap.min.js" type="text/javascript"></script>
            <script type="text/javascript" src="assets/js/scripts.js"></script>
            <script type="text/javascript" src="assets/js/jquery.isotope.js" type="text/javascript"></script>
            <script type="text/javascript" src="assets/js/jquery.slicknav.js" type="text/javascript"></script>
            <!-- Animate on Scroll-->
            <script type="text/javascript" src="assets/js/jquery.visible.js" charset="utf-8"></script>
            <!-- Sticky Div -->
            <script type="text/javascript" src="assets/js/jquery.sticky.js" charset="utf-8"></script>
            <!-- Slimbox2-->
            <script type="text/javascript" src="assets/js/slimbox2.js" charset="utf-8"></script>
            <!-- Modernizr -->
            <script src="assets/js/modernizr.custom.js" type="text/javascript"></script>
            <!-- End JS -->
    </body>

    </html>
<?php
}
?>