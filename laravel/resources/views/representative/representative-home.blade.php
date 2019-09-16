
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Representative home</title>

    <!-- Google font -->
    <link rel="stylesheet" href="css/google.font.">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet"  href="css/header-design.css"/>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Latest compiled and minified CSS -->
    <!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"-->



    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/footer-design.css" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />

    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>

        history.pushState(null, null, document.URL);
        window.addEventListener('popstate', function () {
            history.pushState(null, null, document.URL);
        });

        var check = function() {
            if (document.getElementById('password').value ==
                document.getElementById('re-password').value) {
                document.getElementById('pass-message').style.color = 'green';
                document.getElementById('pass-message').innerHTML = 'matching';
            } else {
                document.getElementById('pass-message').style.color = 'red';
                document.getElementById('pass-message').innerHTML = 'not matching';
            }
        }

    </script>

</head>

<body>

<div id="header">
    <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #120A2A;">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#" style="color: white;"><span>
                        <i class="glyphicon glyphicon-home"></i></span>Online bus booking</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#footer">Contact</a></li>
                <li><a href="#footer">About</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(\Illuminate\Support\Facades\Session::has('rep-username'))
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#" style="color: white;">Representative</a>
                    </div>
                    <li><a href="rep-profile"><span style="margin-right: 8px;"><i class="fas fa-user-tie"></i>
                                    {{\Illuminate\Support\Facades\Session::get('rep-username')}}</span></a> </li>
                    <li><a href="representative-logout"><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>
                @else
                    <li><a href="representative-sign-in"><span class="glyphicon glyphicon-log-in"></span> Sign in</a></li>
                @endif
            </ul>
        </div>
    </nav>
</div>

@if(\Illuminate\Support\Facades\Session::has('rep-username'))

    <div id="wrapper" >

        <nav class="navbar-default navbar-side" role="navigation" style="height: content-box">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="#" style="background-color: forestgreen;margin-right: -10px;">
                            <i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <!--li>
                        <a href="customers_view"><i class="fa fa-users"></i>Customers</a>
                    </li>
                    <li>
                        <a href="bookings_view"><i class="fa fa-money"></i>Bookings</a>
                    </li-->
                    <li>
                        <a href="representative-buses/{{\Illuminate\Support\Facades\Session::get('rep-username')}}">
                            <i class="fa fa-truck"></i>Buses</a>
                    </li>

                    <li>
                        <a href="representative-seats/{{\Illuminate\Support\Facades\Session::get('rep-username')}}">
                            <i class="fa fa-sitemap"></i>Seats</a>
                    </li>
                    <li>
                        <a href="representative-availability/{{\Illuminate\Support\Facades\Session::get('rep-username')}}">
                            <i class="fa fa-check-circle"></i> Availability</a>
                    </li>
                    <li>
                        <a href="representative-routes">
                            <i class="fa fa-road"></i> Routes</a>
                    </li>
                    <li>
                        <a href="representative-trips/{{\Illuminate\Support\Facades\Session::get('rep-username')}}">
                            <i class="fa fa-road"></i> Trips</a>
                    </li>
                    <li>
                        <a href="representative-places">
                            <i class="fa fa-map-marker"></i>Places</a>
                    </li>
                    <li>
                        <a href="representative-reports/{{\Illuminate\Support\Facades\Session::get('rep-username')}}">
                            <i class="fa fa-list"></i> Reports</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Welcome  <small> {{\Illuminate\Support\Facades\Session::get('rep-username')}}</small>
                        </h1>
                    </div>
                </div>
                <!--user widgets-->
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-green">
                            <div class="panel-body">
                                <i class="fa fa-truck fa-5x"></i>
                                <h3>12</h3>
                            </div>
                            <div class="panel-footer back-footer-green">
                                <a href="representative-buses/{{\Illuminate\Support\Facades\Session::get('rep-username')}}"
                                   style="text-decoration: none;color: white"><strong>Buses</strong></a>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-sitemap fa-5x"></i>
                                <h3>10 </h3>
                            </div>
                            <div class="panel-footer back-footer-blue">
                                <a href="representative-seats/{{\Illuminate\Support\Facades\Session::get('rep-username')}}"
                                   style="text-decoration: none;color: white"><strong>Seats</strong></a>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-red">
                            <div class="panel-body">
                                <i class="fa fa fa-check-circle fa-5x"></i>
                                <h3>3 </h3>
                            </div>
                            <div class="panel-footer back-footer-red">
                                <a href="representative-availability/{{\Illuminate\Support\Facades\Session::get('rep-username')}}"
                                   style="text-decoration: none;color: white"><strong>Availability</strong></a>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-brown">
                            <div class="panel-body">
                                <i class="fa fa-road fa-5x"></i>
                                <h3>2 </h3>
                            </div>
                            <div class="panel-footer back-footer-brown">
                                <a href="routes_view" style="text-decoration: none;color: white"> <strong>Routes</strong></a>

                            </div>
                        </div>
                    </div>
                </div>
                <!--admin widgets row-->
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-red">
                            <div class="panel-body">
                                <i class="fa fa-road fa-5x"></i>
                                <h3>2 </h3>
                            </div>
                            <div class="panel-footer back-footer-red">
                                <a href="representative-trips/{{\Illuminate\Support\Facades\Session::get('rep-username')}}"
                                   style="text-decoration: none;color: white"> <strong>Trips</strong></a>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-brown">
                            <div class="panel-body">
                                <i class="fa fa-user fa-5x"></i>
                                <h3>representative</h3>
                            </div>
                            <div class="panel-footer back-footer-brown">
                                <a href="membership_profile.php" style="text-decoration:none;color: white">
                                    <strong>Account</strong></a>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-green">
                            <div class="panel-body">
                                <i class="fa fa-map-marker fa-5x"></i>
                                <h3>Places</h3>
                            </div>
                            <div class="panel-footer back-footer-green">
                                <a href="representative-places"
                                   style="text-decoration:none;color: white"><strong>Places</strong></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-list fa-5x"></i>
                                <h3>report</h3>
                            </div>
                            <div class="panel-footer back-footer-green">
                                <a href="membership_profile.php" style="text-decoration:none;color: white"><strong>Report</strong></a>

                            </div>
                        </div>
                    </div>
                </div>
                <!--row ends here-->
            </div>
            <!-- /. PAGE INNER  -->                                <!-- /. ROW  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

@else

    <div class="container" style="min-height: 500px;">
        <h2 style="text-align: center;margin-top: 100px;">
            Thank you for registration. Please wait for confirmation.........</h2>
    </div>

@endif
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

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>

