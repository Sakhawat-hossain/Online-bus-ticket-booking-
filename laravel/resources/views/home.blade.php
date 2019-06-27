<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Booking Form HTML Template</title>

	<!-- Google font -->
	<link rel="stylesheet" href="css/google.font.">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Latest compiled and minified CSS -->
<!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"-->



	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
    <style>
        
    </style>

</head>

<body>
	<div id="homepage-background">
        <div id="header">
                <div id="login_button">
                    <! http://localhost:8000/>
                    <a href="user/create">
                        <button type="button" class="btn btn-default" style="right-margin:10px;">Register</button>
                    </a>
                    <a href="signin">
                        <button type="button" class="btn btn-default">Sign in</button>
                    </a>
                </div>
        </div>
        
			<div id="booking"> 
                <div class="booking-form">
                    <form method="post">
                        <div class="row">
				            <div class="col-sm-6">
								<div class="form-group">
									<span class="form-label">From</span>
                                    <select class="form-control" name="from">
                                        <option>Dhaka</option>
                                        <option>Rangpur</option>
                                        <option>Bogura</option>
                                    </select>
								    <span class="select-arrow"></span>
								</div>
				            </div>
                            <div class="col-sm-6">
								<div class="form-group">
									<span class="form-label">To</span>
                                    <select class="form-control" name="from">
                                        <option>Dhaka</option>
                                        <option>Rangpur</option>
                                        <option>Bogura</option>
                                    </select>
							       <span class="select-arrow"></span>
								</div>
							</div>
                        </div>
                        
                        <div class="row">
				            <div class="col-sm-6">
								<div class="form-group">
									<span class="form-label">Deperture Date</span>
									<input class="form-control" type="date" name="checkin" required>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<span class="form-label">Return Date (*optional)</span>
									<input class="form-control" type="date" name="checkout">
							    </div>
                            </div>
                        </div>
                        
                        <div class="form-btn">
				            <button class="submit-btn" name="send">Search</button>
                        </div>
                    </form>
                </div>
				<!--div class="row">
					<div class="col-md-7 col-md-push-5">
						<div class="booking-cta">
							<h1>Make your reservation</h1>
							<p>Wellcome to our website.
							</p>
						</div>
					</div>
                    
					<div class="col-md-4 col-md-pull-7">
						<div class="booking-form">
							<form method="get">
                                <div class="form-group">
									<span class="form-label">From</span>
									<select class="form-control" name="from">
										<option>Dhaka</option>
										<option>Rangpur</option>
                                        <option>Bogura</option>
								    </select>
									<span class="select-arrow"></span>
								</div>
								<div class="form-group">
									<span class="form-label">To</span>
									<select class="form-control" name="to">
										<option>Dhaka</option>
										<option>Rangpur</option>
                                        <option>Bogura</option>
								    </select>
									<span class="select-arrow"></span>
								</div>
                                
                                <div class="form-group">
									<span class="form-label">Type</span>
									<select class="form-control" name="type">
										<option>AC</option>
										<option>Non-AC</option>
								    </select>
									<span class="select-arrow"></span>
								</div>
                                
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">Check In</span>
											<input class="form-control" type="date" name="checkin" required>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">Check out</span>
											<input class="form-control" type="date" name="checkout">
										</div>
									</div>
								</div>
								<div class="form-btn">
									<button class="submit-btn" name="send">Check availability</button>
								</div>
							</form>
						</div>
					</div>
				</div-->
			</div>
        <div id="operator-container">
            <div class="container">
                <h1>AVAILABLE BUS OPERATORS</h1>
                
                <div class="row-space">
                    <div class="row">
                        <div class="col-sm-3">
                            <span><i class="fas fa-bus" style="color:#154360;"></i>  AK Travels</span>
                        </div>
                        <div class="col-sm-3">
                            <span><i class="fas fa-bus" style="color:#154360;"></i>  Hanif Paribahan</span>
                        </div>
                        <div class="col-sm-3">
                            <span><i class="fas fa-bus" style="color:#154360;"></i>  Nabil</span>
                        </div>
                        <div class="col-sm-3">
                            <span><i class="fas fa-bus" style="color:#154360;"></i>  Dipjol Enterprise</span>
                        </div>
                    </div>
                </div>
                
                <div class="row-space">
                    <div class="row">
                        <div class="col-sm-3">
                            <span><i class="fas fa-bus" style="color:#154360;"></i>  AK Travels</span>
                        </div>
                        <div class="col-sm-3">
                            <span><i class="fas fa-bus" style="color:#154360;"></i>  Hanif Paribahan</span>
                        </div>
                        <div class="col-sm-3">
                            <span><i class="fas fa-bus" style="color:#154360;"></i>  Nabil</span>
                        </div>
                        <div class="col-sm-3">
                            <span><i class="fas fa-bus" style="color:#154360;"></i>  Dipjol Enterprise</span>
                        </div>
                    </div>
                </div>
                
                <div class="row-space">
                    <div class="row">
                        <div class="col-sm-3">
                            <span><i class="fas fa-bus" style="color:#154360;"></i>  AK Travels</span>
                        </div>
                        <div class="col-sm-3">
                            <span><i class="fas fa-bus" style="color:#154360;"></i>  Hanif Paribahan</span>
                        </div>
                        <div class="col-sm-3">
                            <span><i class="fas fa-bus" style="color:#154360;"></i>  Nabil</span>
                        </div>
                        <div class="col-sm-3">
                            <span><i class="fas fa-bus" style="color:#154360;"></i>  Dipjol Enterprise</span>
                        </div>
                    </div>
                </div>
                
                <div class="row-space">
                    <div class="row">
                        <div class="col-sm-3">
                            <span><i class="fas fa-bus" style="color:#154360;"></i>  AK Travels</span>
                        </div>
                        <div class="col-sm-3">
                            <span><i class="fas fa-bus" style="color:#154360;"></i>  Hanif Paribahan</span>
                        </div>
                        <div class="col-sm-3">
                            <span><i class="fas fa-bus" style="color:#154360;"></i>  Nabil</span>
                        </div>
                        <div class="col-sm-3">
                            <span><i class="fas fa-bus" style="color:#154360;"></i>  Dipjol Enterprise</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="operator-container">
            <div class="container">
                <h1>AVAILABLE BUS ROUTES</h1>
                
                <div class="row-space">
                    <div class="row">
                        <div class="col-sm-3">
                            <span><i class="fas fa-map-marker-alt" style="color:#154360;"></i>  AK Travels</span>
                        </div>
                        <div class="col-sm-3">
                            <span><i class="fas fa-map-marker-alt" style="color:#154360;"></i>  Hanif Paribahan</span>
                        </div>
                        <div class="col-sm-3">
                            <span><i class="fas fa-map-marker-alt" style="color:#154360;"></i>  Nabil</span>
                        </div>
                        <div class="col-sm-3">
                            <span><i class="fas fa-map-marker-alt" style="color:#154360;"></i>  Dipjol Enterprise</span>
                        </div>
                    </div>
                </div>
                
                <div class="row-space">
                    <div class="row">
                        <div class="col-sm-3">
                            <span><i class="fas fa-bus" style="color:#154360;"></i>  AK Travels</span>
                        </div>
                        <div class="col-sm-3">
                            <span><i class="fas fa-bus" style="color:#154360;"></i>  Hanif Paribahan</span>
                        </div>
                        <div class="col-sm-3">
                            <span><i class="fas fa-bus" style="color:#154360;"></i>  Nabil</span>
                        </div>
                        <div class="col-sm-3">
                            <span><i class="fas fa-bus" style="color:#154360;"></i>  Dipjol Enterprise</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="operator-container">
            <div class="container">
                <h1 style="padding-right:50px;">WE ACCEPT</h1>
                
                <div class="row-space">
                    <div class="row">
                        <div class="col-lm-3">
                            <img src="img/bkash-logo.png" class="img-rounded">
                        </div>
                        <div class="col-lm-3">
                            <img src="img/dbbl-logo.jpg">
                        </div>
                        <div class="col-lm-3">
                            <img src="img/rocket-logo.png">
                        </div>
                        <div class="col-lm-3">
                            <img src="img/mkash-logo.png">
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        
        <div id="footer">
            <div class="container">
                <div class="row-space">
                    <div class="row">
                        <div class="col-sm-4">
                            <h2>Online Tickets</h2>
                            <span style="color:#154360;">onlinetickets.com is a premium online booking portal which allows you to purchase tickets for various bus services, launch services, movies and events across the country.</span>
                        </div>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-3">
                            <h2>Company Info</h2>
                            <a href="term-conditions"><li>Terms and Conditins</li></a>
                            <a href="faq"><li>FAQ</li></a>
                            <a href="privacy-policy"><li>Privacy Policy</li></a>
                        </div>
                        <div class="col-sm-3">
                            <h2>About Online Tickets</h2>
                            <a href="about-us"><li>About Us</li></a>
                            <a href="contact-info"><li>Contact Us</li></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>