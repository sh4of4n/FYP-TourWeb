<?php
	session_start();
	if(isset($_SESSION["reg_name"]))
	{
		$name=$_SESSION["reg_name"];
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
                                        <h2>Confirm Your Booking</h2>
                                    </div>
                                    <div class="input-group margin-bottom-20">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <input placeholder="Full Name" class="form-control" type="text" name="t1" value="<?= "$name"?>" disabled>
                                    </div>
                                    <div class="input-group margin-bottom-20">
                                        <span class="input-group-addon">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                        <input placeholder="Email" class="form-control" type="email" name="t2">
                                    </div>
									<div class="input-group margin-bottom-20">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <input placeholder="Number of Traveler" class="form-control" type="number" name="t3">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button class="btn btn-primary pull-right" type="submit" name="btn1">CONFIRM BOOKING</button>
                                        </div>
                                    </div>
                                    <hr>
                                </form>
								<?php
									
									if(isset($_POST["btn1"]))
									{
                                        $email=$_POST["t2"];
                                        $no_of_traveller=$_POST["t3"];
										$book_id=$_GET["id"];
                                        $class=$_GET["class"];
                                        $type=$_GET["type"];
										
                                        $con = mysqli_connect("localhost", "root", "", "tour_database");
                                        if (!$con)
                                            die("cannot connect to server");
                                        else {
                                            $sqlcheck = "SELECT * FROM bookings ";
                                            $result_check = mysqli_query($con,$sqlcheck);
                                            if(mysqli_num_rows($result_check)> 0){
                                            //     echo "Duplicate data found";
                                            // } else{
                                                
                                                $sql = "INSERT INTO bookings (id, booking_type, booking_name, booking_email, no_of_traveller, booking_status) VALUES ('$book_id','$type', '$name', '$email', '$no_of_traveller', 'Unpaid')";
                                                mysqli_query($con, $sql);
                                                $sql2 = "SELECT * FROM bookings ORDER BY booking_id DESC;";
                                                $result = mysqli_query($con,$sql2);
                                                $row = mysqli_fetch_row($result);
                                                $booking_id = $row[0];
                                            } else {
                                                echo "No bookings found";
                                            }
                                            // if (!$result) {
                                            //     die('Error: ' . mysqli_error($con));
                                            // } else {
                                            //     echo 'Data inserted successfully';
                                            // }
                                        }

										echo "<script>window.location.href='booking_details.php?booking_id=$booking_id&id=$book_id&email=$email&traveller=$no_of_traveller&class=$class'</script>";	
									}
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
                                <br>Malaysia.</p>
                        </div>
                        <div class="col-md-3 margin-bottom-20">
                            <h3 class="margin-bottom-10">Menu</h3>
                            <ul class="menu">
                                
                                <li>
                                    <a href="web/booking.php" class="fa-copy">Bookings</a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
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