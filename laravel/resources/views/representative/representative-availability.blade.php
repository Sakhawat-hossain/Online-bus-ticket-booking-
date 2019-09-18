
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
    <link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet"  href="../css/header-design.css"/>
    <link rel="stylesheet" href="../css/buslist-style.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/admin/add-bus-style.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Latest compiled and minified CSS -->
    <!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"-->



    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="../css/footer-design.css" />
    <!-- Custom Styles-->
    <link href="../assets/css/custom-styles.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />

    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <style>
        #home-box{
            margin-top: 40px;
        }
        .home-row{
            padding-left: 50px;
            height: 50px;
        }
    </style>
    <script>

        $(document).ready(function () {

        });

        history.pushState(null, null, document.URL);
        window.addEventListener('popstate', function () {
            history.pushState(null, null, document.URL);
        });
/*
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
*/
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
                <li class="active"><a href="../representative-home">Home</a></li>
                <li><a href="#footer">Contact</a></li>
                <li><a href="#footer">About</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(\Illuminate\Support\Facades\Session::has('rep-username'))
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#" style="color: white;">Representative</a>
                    </div>
                    <li><a href="../representative/{{\Illuminate\Support\Facades\Session::get('rep-username')}}">
                            <span style="margin-right: 8px;"><i class="fas fa-user-tie"></i>
                                    {{\Illuminate\Support\Facades\Session::get('rep-username')}}</span></a> </li>
                    <li><a href="../representative-logout"><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>
                @else
                    <li><a href="../representative-sign-in"><span class="glyphicon glyphicon-log-in"></span> Sign in</a></li>
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
                        <a href="../representative-home"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <!--li>
                        <a href="customers_view"><i class="fa fa-users"></i>Customers</a>
                    </li>
                    <li>
                        <a href="bookings_view"><i class="fa fa-money"></i>Bookings</a>
                    </li-->
                    <li>
                        <a href="../representative-buses/{{\Illuminate\Support\Facades\Session::get('rep-username')}}">
                            <i class="fa fa-truck"></i>Buses</a>
                    </li>

                    <li>
                        <a href="../representative-seats/{{\Illuminate\Support\Facades\Session::get('rep-username')}}">
                            <i class="fa fa-sitemap"></i>Seats</a>
                    </li>
                    <li style="background-color: forestgreen;margin-right: -10px;">
                        <a href="../representative-availability/{{\Illuminate\Support\Facades\Session::get('rep-username')}}">
                            <i class="fa fa-check-circle"></i> Availability</a>
                    </li>
                    <li>
                        <a href="../representative-routes/{{\Illuminate\Support\Facades\Session::get('rep-username')}}">
                            <i class="fa fa-road"></i> Routes</a>
                    </li>
                    <li>
                        <a href="../representative-trips/{{\Illuminate\Support\Facades\Session::get('rep-username')}}">
                            <i class="fa fa-road"></i> Trips</a>
                    </li>
                    <li>
                        <a href="../representative-places">
                            <i class="fa fa-map-marker"></i>Places</a>
                    </li>
                    <li>
                        <a href="../representative-reports/{{\Illuminate\Support\Facades\Session::get('rep-username')}}">
                            <i class="fa fa-list"></i> Reports</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">

                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a href="#home" data-toggle="tab" id="home-tab">Home</a></li>
                    <li><a href="#buses" data-toggle="tab" id="buses-tab">Buses</a></li>
                    <li><a href="#trips" data-toggle="tab" id="trips-tab">Trips</a></li>
                    <li><a href="#routes" data-toggle="tab" id="routes-tab">Routes</a></li>
                </ul>

                <div class="tab-content">

                    <div class="tab-pane active" id="home">
                        <!--/table-resp-->
                        <div class="row">
                            <div class="col-sm-4">
                                <div id="home-box" class="home-row">
                                    @if(isset($available_data))
                                        <h3>Buses</h3>
                                        <p><strong>Total Buses : </strong>{{$available_data->get('total_buses')}}</p>
                                        <p><strong>Available Buses : </strong>{{$available_data->get('total_avail')}}</p>
                                        <p><strong>Blocked Buses : </strong>{{$available_data->get('total_block')}}</p>
                                        <p><strong>Abandoned Buses : </strong>{{$available_data->get('total_abandoned')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div id="home-box" class="home-row">
                                    @if(isset($available_data))
                                        <h3>Trips</h3>
                                        <p><strong>Total Trips : </strong>{{$available_data->get('total_trips')}}</p>
                                        <p><strong>Available Trips : </strong>{{$available_data->get('total_active')}}</p>
                                        <p><strong>Previous Trips : </strong>{{$available_data->get('total_prev')}}</p>
                                        <p><strong>Cancelled Trips : </strong>{{$available_data->get('total_cancel')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div id="home-box" class="home-row">
                                    @if(isset($available_data))
                                        <h3>Routes</h3>
                                        <p><strong>Total Routes : </strong>{{$available_data->get('total_routes')}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane" id="buses">
                        <div id="table-container">
                            <table class="table" id="busTable">
                                <thead class="thead-dark">
                                <tr style="height: 60px;">
                                    <th style="padding-bottom: 20px;">Enterprise Name</th>
                                    <th style="padding-bottom: 20px;">Coach No</th>
                                    <th onclick="sortTable(2)" id="ctype" style="padding-bottom: 20px;">Coach Type
                                        <span id="opt-up-2" hidden><i class="fas fa-sort-up"></i></span>
                                        <span id="opt-sort-2"><i class="fas fa-sort"></i></span>
                                        <span id="opt-down-2" hidden><i class="fas fa-sort-down"></i></span></th>
                                    <th onclick="sortTable(3)" id="savailable" style="padding-bottom: 20px;">Total Seats
                                        <span id="opt-up-3" hidden><i class="fas fa-sort-up"></i></span>
                                        <span id="opt-sort-3" ><i class="fas fa-sort"></i></span>
                                        <span id="opt-down-3" hidden><i class="fas fa-sort-down"></i></span></th>
                                    <th onclick="sortTable(4)"  id="opt" style="padding-bottom: 20px;">Status
                                        <span id="opt-up-1" hidden><i class="fas fa-sort-up"></i></span>
                                        <span id="opt-sort-1"><i class="fas fa-sort"></i></span>
                                        <span id="opt-down-1" hidden><i class="fas fa-sort-down"></i></span></th>
                                </tr>
                                </thead>

                                <tbody>
                                <t><td>hello</td></t>
                                @if(isset($available_data))
                                    @php $idx=1 @endphp
                                    @foreach($available_data->get('buses') as $datarow)
                                        <tr id="bus-{{$idx}}">
                                            @php $i=1 @endphp
                                            @foreach($datarow as $data)
                                                @if($i==6)
                                                @elseif($i==7)
                                                @else
                                                    <td>{{$data}}</td>
                                                @endif
                                                @php $i=1+$i @endphp
                                            @endforeach
                                        </tr>
                                        @php $idx=1+$idx @endphp
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <!--/table-resp-->

                    </div>
                    <!--/tab-pane-->
                    <div class="tab-pane" id="trips">
                        <!--/table-resp-->
                        <div id="table-container">
                            <table class="table" id="tripTable">
                                <thead class="thead-dark">
                                <tr style="height: 60px;">
                                    <th id="opt" style="padding-bottom: 20px;">From</th>
                                    <th id="opt" style="padding-bottom: 20px;">To</th>
                                    <th style="padding-bottom: 20px;">Starting Counter</th>
                                    <th style="padding-bottom: 20px;">Coach No</th>
                                    <th onclick="sortTable(4)" id="ctype" style="padding-bottom: 20px;">Coach Type
                                        <span id="opt-up-2" hidden><i class="fas fa-sort-up"></i></span>
                                        <span id="opt-sort-2"><i class="fas fa-sort"></i></span>
                                        <span id="opt-down-2" hidden><i class="fas fa-sort-down"></i></span></th>
                                    <th style="padding-bottom: 20px;">Departure Date</th>
                                    <th style="padding-bottom: 20px;">Departure Time</th>
                                    <th onclick="sortTable(7)" id="fare" style="padding-bottom: 20px;">Fare (B/E)
                                        <span id="opt-up-4" hidden><i class="fas fa-sort-up"></i></span>
                                        <span id="opt-sort-4"><i class="fas fa-sort"></i></span>
                                        <span id="opt-down-4" hidden><i class="fas fa-sort-down"></i></span></th>
                                    <th onclick="sortTable(8)" id="status" style="padding-bottom: 20px;">Status
                                        <span id="opt-up-3" hidden><i class="fas fa-sort-up"></i></span>
                                        <span id="opt-sort-3"><i class="fas fa-sort"></i></span>
                                        <span id="opt-down-3" hidden><i class="fas fa-sort-down"></i></span></th>
                                </tr>
                                </thead>

                                @if(isset($available_data))
                                    <tbody>
                                    @php $idx=1 @endphp
                                    @foreach($available_data->get('trips') as $datarow)
                                        @php $i=1 @endphp
                                        <tr id="trip-{{$idx}}">
                                            @foreach($datarow as $data)
                                                @if($i==10)
                                                @else
                                                    <td>{{$data}}</td>
                                                @endif
                                                @php $i=1+$i @endphp
                                            @endforeach
                                        </tr>
                                        @php $idx=1+$idx @endphp
                                    @endforeach
                                    </tbody>
                                @endif

                            </table>
                        </div>
                    </div>
                    <!--/tab-pane-->
                    <div class="tab-pane" id="routes">

                        <!--/table-resp-->

                        <table class="table" id="routeTable">
                            <thead class="thead-dark">
                            <tr style="height: 60px;">
                                <th onclick="sortTable(2)" id="ctype" style="padding-bottom: 20px;">From
                                    <span id="opt-up-2" hidden><i class="fas fa-sort-up"></i></span>
                                    <span id="opt-sort-2"><i class="fas fa-sort"></i></span>
                                    <span id="opt-down-2" hidden><i class="fas fa-sort-down"></i></span></th>
                                <th onclick="sortTable(3)" id="savailable" style="padding-bottom: 20px;">To
                                    <span id="opt-up-3" hidden><i class="fas fa-sort-up"></i></span>
                                    <span id="opt-sort-3" ><i class="fas fa-sort"></i></span>
                                    <span id="opt-down-3" hidden><i class="fas fa-sort-down"></i></span></th>
                                <th onclick="sortTable(4)"  id="opt" style="padding-bottom: 20px;">Starting point
                                    <span id="opt-up-1" hidden><i class="fas fa-sort-up"></i></span>
                                    <span id="opt-sort-1"><i class="fas fa-sort"></i></span>
                                    <span id="opt-down-1" hidden><i class="fas fa-sort-down"></i></span></th>
                            </tr>
                            </thead>

                            <tbody>
                            @if(isset($available_data))
                                @php $idx=1 @endphp
                                @foreach($available_data->get('routes') as $datarow)
                                    <tr id="route-{{$idx}}">
                                        @php $i=1 @endphp
                                        @foreach($datarow as $data)
                                                <td>{{$data}}</td>
                                        @endforeach
                                    </tr>
                                    @php $idx=1+$idx @endphp
                                @endforeach
                            @endif
                            </tbody>
                        </table>

                    </div>
                </div>
                <!--/tab-content-->

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

