<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bus details</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/seat-list-style.css">
    <link rel="stylesheet" href="../css/header-design.css">
    <link rel="stylesheet" href="../css/footer-design.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#opt").click(function () {
                $("#opt-up").toggle();
                $("#opt-down-1").toggle();
                $("#opt-down-2").hide();
            });
            $("#ctype").click(function () {
                $("#opt-up-1").toggle();
                $("#opt-down-3").toggle();
                $("#opt-down-4").hide();
            });
            $("#savailable").click(function () {
                $("#opt-up-2").toggle();
                $("#opt-down-5").toggle();
                $("#opt-down-6").hide();
            });
            $("#fare").click(function () {
                $("#opt-up-3").toggle();
                $("#opt-down-7").toggle();
                $("#opt-down-8").hide();
            });
            $("#filter").click(function () {
                $("#filter-list").toggle();
            });
        });
    </script>

</head>
<body>
<div class="section">

    <div id="header">
        <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #120A2A; color: red;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#" style="color: white;"><span>
                        <i class="glyphicon glyphicon-home"></i></span>Online ticket booking</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#footer">Contact</a></li>
                    <li><a href="#footer">About</a></li>
                    <li><a href="#operator-container">Operators</a></li>
                    <li><a href="#operator-container">Routes</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if(\Illuminate\Support\Facades\Session::has('username'))
                        <li><a href="profile"><span style="margin-right: 8px;"><i class="fas fa-user-tie"></i>{{\Illuminate\Support\Facades\Session::get('username')}}</span></a> </li>
                        <li><a href="signin"><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>
                    @else
                        <li><a href="user/create"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                        <li><a href="signin/create"><span class="glyphicon glyphicon-log-in"></span> Sign in</a></li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>

    <div class="container" style="min-height: 500px;">
        <div id="main-container">
            <div id="couch-text">
                <div class="row">
                    <div class="col-sm-2"><p>
                            <span><i class="fas fa-couch  fa-3x" style="color: #DB7484;"></i></span> Booked(M)
                        </p></div>
                    <div class="col-sm-2"><p>
                            <span><i class="fas fa-couch  fa-3x" style="color: #78341a;"></i></span> Booked(F)
                        </p></div>
                    <div class="col-sm-2"><p>
                            <span><i class="fas fa-couch  fa-3x" style="color: #3c3c3c;"></i></span> Blocked
                        </p></div>
                    <div class="col-sm-2"><p>
                            <span><i class="fas fa-couch  fa-3x" style="color: #CCCCCB;"></i></span> Available
                        </p></div>
                    <div class="col-sm-2"><p>
                            <span><i class="fas fa-couch  fa-3x" style="color: forestgreen;"></i></span> Selected
                        </p></div>
                    <div class="col-sm-2"><p>
                            <span><i class="fas fa-couch  fa-3x" style="color: #4b88a6;"></i></span> Business
                        </p></div>
                </div>
            </div>

            <!--details-->
            <div id="details-container">
                <div class="row">
                    <!--left side -->
                    <div class="col-sm-4">
                        <div id="details-seat-view">
                            <div id="front-side"><p>Front</p></div>
                            <div id="seat-view-group">
                                <div class="row">
                                    <div class="col-sm-2"><span><i class="fas fa-couch fa-2x" id="A-1" style="color: #CCCCCB;"></i></span></div>
                                    <div class="col-sm-2"><span><i class="fas fa-couch fa-2x" id="B-1" style="color: #CCCCCB;"></i></span></div>
                                    <div class="col-sm-2" ><span></span></div>
                                    <div class="col-sm-2"><span><i class="fas fa-couch fa-2x" id="C-1" style="color: #CCCCCB;"></i></span></div>
                                    <div class="col-sm-2"><span><i class="fas fa-couch fa-2x" id="D-1" style="color: #CCCCCB;"></i></span></div>
                                </div>
                            </div>
                            <div id="seat-view-group">
                                <div class="row">
                                    <div class="col-sm-2"><span><i class="fas fa-couch fa-2x" id="A_1" style="color: #CCCCCB;"></i></span></div>
                                    <div class="col-sm-2"><span><i class="fas fa-couch fa-2x" id="B_1" style="color: #CCCCCB;"></i></span></div>
                                    <div class="col-sm-2" ><span></span></div>
                                    <div class="col-sm-2"><span><i class="fas fa-couch fa-2x" id="C_1" style="color: #CCCCCB;"></i></span></div>
                                    <div class="col-sm-2"><span><i class="fas fa-couch fa-2x" id="D_1" style="color: #CCCCCB;"></i></span></div>
                                </div>
                            </div>
                            <div id="seat-view-group">
                                <div class="row">
                                    <div class="col-sm-2"><span><i class="fas fa-couch fa-2x" id="A_1" style="color: #CCCCCB;"></i></span></div>
                                    <div class="col-sm-2"><span><i class="fas fa-couch fa-2x" id="B_1" style="color: #CCCCCB;"></i></span></div>
                                    <div class="col-sm-2" ><span></span></div>
                                    <div class="col-sm-2"><span><i class="fas fa-couch fa-2x" id="C_1" style="color: #CCCCCB;"></i></span></div>
                                    <div class="col-sm-2"><span><i class="fas fa-couch fa-2x" id="D_1" style="color: #CCCCCB;"></i></span></div>
                                </div>
                            </div>
                            <div id="seat-view-group">
                                <div class="row">
                                    <div class="col-sm-2"><span><i class="fas fa-couch fa-2x" id="A_1" style="color: #CCCCCB;"></i></span></div>
                                    <div class="col-sm-2"><span><i class="fas fa-couch fa-2x" id="B_1" style="color: #CCCCCB;"></i></span></div>
                                    <div class="col-sm-2" ><span></span></div>
                                    <div class="col-sm-2"><span><i class="fas fa-couch fa-2x" id="C_1" style="color: #CCCCCB;"></i></span></div>
                                    <div class="col-sm-2"><span><i class="fas fa-couch fa-2x" id="D_1" style="color: #CCCCCB;"></i></span></div>
                                </div>
                            </div>
                            <div id="seat-view-group">
                                <div class="row">
                                    <div class="col-sm-2"><span><i class="fas fa-couch fa-2x" id="A_1" style="color: #CCCCCB;"></i></span></div>
                                    <div class="col-sm-2"><span><i class="fas fa-couch fa-2x" id="B_1" style="color: #CCCCCB;"></i></span></div>
                                    <div class="col-sm-2" ><span></span></div>
                                    <div class="col-sm-2"><span><i class="fas fa-couch fa-2x" id="C_1" style="color: #CCCCCB;"></i></span></div>
                                    <div class="col-sm-2"><span><i class="fas fa-couch fa-2x" id="D_1" style="color: #CCCCCB;"></i></span></div>
                                </div>
                            </div>
                            <div id="seat-view-group">
                                <div class="row">
                                    <div class="col-sm-2"><span><i class="fas fa-couch fa-2x" id="A_1" style="color: #CCCCCB;"></i></span></div>
                                    <div class="col-sm-2"><span><i class="fas fa-couch fa-2x" id="B_1" style="color: #CCCCCB;"></i></span></div>
                                    <div class="col-sm-2" ><span></span></div>
                                    <div class="col-sm-2"><span><i class="fas fa-couch fa-2x" id="C_1" style="color: #CCCCCB;"></i></span></div>
                                    <div class="col-sm-2"><span><i class="fas fa-couch fa-2x" id="D_1" style="color: #CCCCCB;"></i></span></div>
                                </div>
                            </div>
                            <div id="seat-view-group">
                                <div class="row">
                                    <div class="col-sm-2"><span><i class="fas fa-couch fa-2x" id="A_1" style="color: #CCCCCB;"></i></span></div>
                                    <div class="col-sm-2"><span><i class="fas fa-couch fa-2x" id="B_1" style="color: #CCCCCB;"></i></span></div>
                                    <div class="col-sm-2" ><span></span></div>
                                    <div class="col-sm-2"><span><i class="fas fa-couch fa-2x" id="C_1" style="color: #CCCCCB;"></i></span></div>
                                    <div class="col-sm-2"><span><i class="fas fa-couch fa-2x" id="D_1" style="color: #CCCCCB;"></i></span></div>
                                </div>
                            </div>
                            <div id="seat-view-group">
                                <div class="row">
                                    <div class="col-sm-2"><span><i class="fas fa-couch fa-2x" id="A_1" style="color: #CCCCCB;"></i></span></div>
                                    <div class="col-sm-2"><span><i class="fas fa-couch fa-2x" id="B_1" style="color: #CCCCCB;"></i></span></div>
                                    <div class="col-sm-2" ><span></span></div>
                                    <div class="col-sm-2"><span><i class="fas fa-couch fa-2x" id="C_1" style="color: #CCCCCB;"></i></span></div>
                                    <div class="col-sm-2"><span><i class="fas fa-couch fa-2x" id="D_1" style="color: #CCCCCB;"></i></span></div>
                                </div>
                            </div>
                            <div id="seat-view-group">
                                <div class="row">
                                    <div class="col-sm-2"><span><i class="fas fa-couch fa-2x" id="A_1" style="color: #CCCCCB;"></i></span></div>
                                    <div class="col-sm-2"><span><i class="fas fa-couch fa-2x" id="B_1" style="color: #CCCCCB;"></i></span></div>
                                    <div class="col-sm-2" ><span></span></div>
                                    <div class="col-sm-2"><span><i class="fas fa-couch fa-2x" id="C_1" style="color: #CCCCCB;"></i></span></div>
                                    <div class="col-sm-2"><span><i class="fas fa-couch fa-2x" id="D_1" style="color: #CCCCCB;"></i></span></div>
                                </div>
                            </div>
                            <div id="seat-view-group">
                                <div class="row">
                                    <div class="col-sm-2"><span><i class="fas fa-couch fa-2x" id="A_1" style="color: #CCCCCB;"></i></span></div>
                                    <div class="col-sm-2"><span><i class="fas fa-couch fa-2x" id="B_1" style="color: #CCCCCB;"></i></span></div>
                                    <div class="col-sm-2" ><span></span></div>
                                    <div class="col-sm-2"><span><i class="fas fa-couch fa-2x" id="C_1" style="color: #CCCCCB;"></i></span></div>
                                    <div class="col-sm-2"><span><i class="fas fa-couch fa-2x" id="D_1" style="color: #CCCCCB;"></i></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--right side -->
                    <div class="col-sm-8">
                        <div id="booking-details">
                            <div id="booking-details-top"><h2>Booking information</h2></div>
                            <div id="booking-details-bottom">
                                <div class="row">
                                    <div class="col-sm-7">
                                        <h3>Selected seats : </h3>
                                        <div id="seat-info">
                                            <p>Business class : Seat   A-1 : 500 Tk <span><i class="far fa-times-circle" style="color: darkred;"></i></span></p>
                                            <p>Business class : Seat  A-1 : 500 Tk</p>
                                            <p>Business class : Seat  A-1 : 500 Tk</p>
                                            <p>Economy class : Seat  A-1 : 500 Tk</p>
                                            <p>Economy class : Seat  A-1 : 500 Tk</p>
                                            <p>Economy class : Seat  A-1 : 500 Tk</p>
                                        </div>
                                        <div id="service-total-info">
                                            <p><strong>Service charge :</strong> 300 Tk</p>
                                            <p><strong>Total :</strong> 3300 Tk</p>
                                        </div>
                                        <div id="buy-button">
                                            <button class="btn btn-success">Buy now</button>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <p><span><i class="fas fa-asterisk" style="color: red;"></i></span>You can buy maximum 6 tickets</p>
                                    </div>
                                </div>
                            </div>
                        </div>
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


</body>
</html>

