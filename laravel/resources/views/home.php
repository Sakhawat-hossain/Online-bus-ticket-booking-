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
    <!-- Latest compiled and minified CSS -->
<!link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">



	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
    <style>
        #login_button{
            height: auto;
            width: auto;
            position: absolute;
            left: 80%;
            top: 5%;
        }
        #login_button button{
            color: blue;
            height: 40px;
            width: 90px;
            margin-left: 10px;
            border-radius: 3px 3px 3px 3px;
            float: left;
        }
    </style>

</head>

<body>
	<div id="booking" class="section">
        
                <div id="login_button">
                    <! http://localhost:8000/>
                    <a href="user/create">
                        <button type="submit">Sign up</button>
                    </a>
                    <a href="signin">
                        <button type="submit">Sign in</button>
                    </a>
                </div>
        
		<div class="section-center">
			<div class="container"> 
				<div class="row">
					<div class="col-md-7 col-md-push-5">
						<div class="booking-cta">
							<h1>Make your reservation</h1>
							<p>Wellcome to our website.
							</p>
						</div>
					</div>
                    
					<div class="col-md-4 col-md-pull-7">
						<div class="booking-form">
							<form method="get" action="busList.php">
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
				</div>
			</div>
		</div>
	</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>