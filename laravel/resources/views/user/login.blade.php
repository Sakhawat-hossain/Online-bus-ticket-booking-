
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Bus Ticket Booking</title>

	<!-- Google font -->
	<link rel="stylesheet" href="../css/google.font.">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css" />
	<link type="text/css" rel="stylesheet"  href="../css/header-design.css"/>

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!-- Latest compiled and minified CSS -->
	<!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"-->



	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="../css/footer-design.css" />
	<link type="text/css" rel="stylesheet" href="../css/login-style.css"/>

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
<div id="loginpage-background">
	<div id="header">
		<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #120A2A; color: red;">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="../home" style="color: white;"><span>
                        <i class="glyphicon glyphicon-home"></i></span>Online bus booking</a>
				</div>
				<ul class="nav navbar-nav">
					<li class="active"><a href="../home">Home</a></li>
					<li><a href="#footer">Contact</a></li>
					<li><a href="#footer">About</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					@if(\Illuminate\Support\Facades\Session::has('username'))
						<li><a href="#"><span style="margin-right: 8px;"><i class="fas fa-user-tie"></i>{{\Illuminate\Support\Facades\Session::get('username')}}</span></a> </li>
						<li><a href="../signin"><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>
					@else
						<li><a href="../user/create"><span class="glyphicon glyphicon-user"></span> Register</a></li>
					@endif
				</ul>
			</div>
		</nav>
	</div>

	<div class="container">
		<div class="card">
			<div class="card-header">
				<h3>Sign in</h3>
			</div>

			<div class="card-body">
				<form method="post" action="../signin">
					{{csrf_field()}}
					<div class="input-group form-group">
						<div class="input-group-addon">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name="username" class="form-control" placeholder="username" required>
					</div>
					<div class="input-group form-group">
						<div class="input-group-addon">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="password" class="form-control" placeholder="password" required>
					</div>
					@if(\Illuminate\Support\Facades\Session::has('userwrong'))
						<!--div class="alert-danger"-->
							<p>{{\Illuminate\Support\Facades\Session::get('userwrong')}}</p>
					@endif
					<div class="form-group">
						<input type="submit" value="Sign in" name="form" class="btn float-right login_btn" style="margin-left: 50%;margin-bottom: 15px;">
					</div>
				</form>
			</div>
		</div>
	</div>

	<div id="footer">
		<div class="container">
			<div class="row-space">
				<div class="row">
					<div class="col-sm-4">
						<h2>Online Tickets</h2>
						<span>onlinetickets.com is a premium online booking portal which allows you to purchase tickets for various bus services, launch services, movies and events across the country.</span>
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