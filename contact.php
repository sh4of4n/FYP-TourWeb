<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Title -->
        <title>Contact Us</title>
        <!-- Meta -->
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDl_FvUdF5rE8rQUVlEUkJDd9Dohrp4vE&callback=console.debug&libraries=maps,marker&v=beta"></script>
        <script>window.jQuery || document.write('<script src="/resources/vendor/jQUery/jquery-1.11.2.min.js"><\/script>')</script>
        <!-- Favicon -->
        <link href="favicon.ico" rel="shortcut icon">
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.css" rel="stylesheet">
        <!-- Template CSS -->
        <link rel="stylesheet" href="assets/css/animate.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/nexus.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/responsive.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/custom.css" rel="stylesheet">
        <!-- Google Fonts-->
        <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=PT+Sans" type="text/css" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Roboto:400,300" rel="stylesheet" type="text/css">
		<style>
			.map iframe {
			min-height: 17em;
			border: none;
			width:  30%;
			float:right;
			}
			.right-w3{
			float:left;
			width:48%;
			}
		</style>
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
                <!-- Spacing above header -->
            </div>
            <div id="header">
                <div class="container">
                    <div class="row">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.html" title="">
                                <img src="assets/img/Design.png" style="height: 80px;" alt="Logo" />
                            </a>
                        </div>
                        <!-- End Logo -->
                    </div>
                </div>
            </div>
            <!-- Top Menu -->
            <div id="hornav" class="container no-padding">
                <div class="row">
                    <div class="col-md-12 no-padding">
                        <div class="text-center visible-lg">
                            <ul id="hornavmenu" class="nav navbar-nav">
                                <li>
                                    <a href="index.html" class="fa-home">Home</a>
                                </li>
                                <li>
                                    <a href="pages-about-us.html" class="fa-gears">About Us</a>
                                </li>    
                                <li>
                                    <a href="gallery.html" class="fa-th">Gallery</a>
                                </li>
                                <li>
                                    <span class="fa-copy">Features</span>
									<ul>
                                        <li>
                                            <a href="destination.html">Destinations</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
									<a href="pages-sign-up.php" class="fa-font">Register/Log In</a>
                                </li>
                                <li>
                                    <a href="contact.php" class="fa-comment">Contact Us</a>
                                </li>
                            </ul>
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
                    <div class="row margin-vert-30">
                        <div class="col-md-9">
                            <div class="headline">
                                <h2>Contact Form</h2>
                            </div>
                            <form method="post">
                                <img src="assets/img/social_icons/user.png">   <label>Name</label>
                                <div class="row margin-bottom-20">
                                    <div class="col-md-6 col-md-offset-0">
                                        <input class="form-control" type="text" name="user" placeholder="" required="">
                                    </div>
                                </div>
								<img src="assets/img/social_icons/telephone.png">     <label>Telephone</label>
								<div class="row margin-bottom-20">
                                    <div class="col-md-6 col-md-offset-0">
									<input class="form-control" type="text" name="telephone" placeholder="" required="">
									</div>
								</div>
                                <img src="assets/img/social_icons/email_(1).png">     <label>Email
                                    <span class="color-red">*</span>
                                </label>
                                <div class="row margin-bottom-20">
                                    <div class="col-md-6 col-md-offset-0">
                                        <input class="form-control" type="email" name="email" placeholder="" required="">
                                    </div>
                                </div>
                                <img src="assets/img/social_icons/email_(2).png">     <label>Message</label>
                                <div class="row margin-bottom-20">
                                    <div class="col-md-8 col-md-offset-0">
                                        <textarea rows="8" name="msg" class="form-control"></textarea>
                                    </div>
                                </div>
                                <p>
                                    <button type="submit" name="btn33" class="btn btn-primary">Send Message</button>
                                </p>
                            </form>
							<?php
								
									if(isset($_POST["btn33"]))
									{
										$name=$_POST["user"];
										$phone=$_POST["telephone"];
										$email=$_POST["email"];
										$message=$_POST["msg"];
										include("connect.php");
										$sql="insert into contact_register(u_name,email,phone,message)value('".$name."','".$email."','".$phone."','".$message."')";
										$n=mysqli_query($con,$sql);
										if($n==1)
										{
											echo "<script>alert('Admin will response as soon as possible')</script>";
											echo "<script>window.location.href='contact.php'</script>";
										}
									}
								?>
                        </div>
                        <div>
                            <div>
                                <div class="panel-heading">
                                    <h3 class="panel-title">Contact Info</h3>
                                </div>
                                <div class="panel-body">
									<ul class="list-unstyled">
                                        <li>
                                            <i class="fa-phone color-primary"></i>(+6)04-8995230</li>
                                        <li>
                                            <i class="fa-envelope color-primary"></i>info@mnDas.com</li>
                                        <li>
                                            <i class="fa-home color-primary"></i>http://www.TragendaTour&Travel.com</li>
                                    </ul>
                                    <ul class="list-unstyled">
                                        <li>
                                            <strong class="color-primary">Monday-Friday:</strong>9am to 6pm</li>
                                        <li>
                                            <strong class="color-primary">Saturday:</strong>10am to 3pm</li>
                                        <li>
                                            <strong class="color-primary">Sunday:</strong>Closed</li>
                                    </ul><br><br><br><br><br><br><br><br><br><br>
									<div class="panel-heading">
										<h3 class="panel-title">Our Location</h3>
										<br>
										<gmp-map style="height: 50vh;" center="5.453365325927734,100.28486633300781" zoom="15" map-id="DEMO_MAP_ID">
                                            <gmp-advanced-marker position="5.453365325927734,100.28486633300781" title="My location">
                                            </gmp-advanced-marker>
                                        </gmp-map>
										
									</div>
                                </div>
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
                        <!-- Contact Details -->
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
                        <!-- End Contact Details -->
                        <!-- Menu -->
                        <div class="col-md-3 margin-bottom-20">
                            <h3 class="margin-bottom-10">Menu</h3>
                            <ul class="menu">
                                <li>
                                    <a href="index.html" class="fa-home">Home</a>
                                </li>
                                <li>
                                    <a href="pages-about-us.html" class="fa-gears">About Us</a>
                                </li>
                                <li>
                                    <a href="pages-sign-up.php" class="fa-font">Login</a>
                                </li>
                                <li>
                                    <a href="contact.php" class="fa-comment">Contact Us</a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <!-- End Menu -->
                        <div class="col-md-1"></div>
                        <!-- Disclaimer -->
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
                        <!-- End Disclaimer -->
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- Footer Menu -->
            <div id="footer">
                <div class="container">
                    <div class="row">
                        <div id="footermenu" class="col-md-8">
                        </div>
                        <div id="copyright" class="col-md-4">
                            <p class="pull-right">(c) 2014 Your Copyright Info</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Footer Menu -->
            <!-- JS -->
            <script type="text/javascript" src="assets/js/jquery.min.js" type="text/javascript"></script>
            <script type="text/javascript" src="assets/js/bootstrap.min.js" type="text/javascript"></script>
            <script type="text/javascript" src="assets/js/scripts.js"></script>
            <!-- Isotope - Portfolio Sorting -->
            <script type="text/javascript" src="assets/js/jquery.isotope.js" type="text/javascript"></script>
            <!-- Mobile Menu - Slicknav -->
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
<!-- === END FOOTER === -->