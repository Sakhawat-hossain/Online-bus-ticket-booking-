<!DOCTYPE html>
<html lang="en">
<head>
    <title>Booking details</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link rel="stylesheet" href="../../css/booking-style.css">
    <link rel="stylesheet" href="../../css/header-design.css">
    <link rel="stylesheet" href="../../css/footer-design.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <script type="text/javascript">

        function toggle_button(){
            var temp=document.getElementById('option-d').getAttribute;

            jQuery("#pp").html("<p>faltu"+temp+"</p>");
        }
        $(document).ready(function(){
            $("#payment").change(function(){
                var method = $(this).children("option:selected").text();
                if(method=='Payment Gateway'){
                    $("#error-mgs").hide();
                    $("#btn-1").hide();
                    $("#btn-2").show();
                }
                else{
                    $("#error-mgs").hide();
                    $("#btn-2").hide();
                    $("#btn-1").show();
                }
            }),
            $("#btn-2").click(function () {
                $("#error-mgs").show();
            });
        });

    </script>
</head>
<body>

<div class="section">
<div id="pp"></div>
    <div id="header">
        <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #120A2A; color: red;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="../../home" style="color: white;"><span>
                        <i class="glyphicon glyphicon-home"></i></span>Online ticket booking</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="../../home">Home</a></li>
                    <li><a href="#footer">Contact</a></li>
                    <li><a href="#footer">About</a></li>
                    <li><a href="#operator-container">Operators</a></li>
                    <li><a href="#operator-container">Routes</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if(\Illuminate\Support\Facades\Session::has('username'))
                        @php $username=Session::get('username');@endphp
                        <li><a href="{{url('user/'.$username)}}"><span style="margin-right: 8px;"><i class="fas fa-user-tie"></i>{{\Illuminate\Support\Facades\Session::get('username')}}</span></a> </li>
                        <li><a href="../../logout"><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>
                    @else
                        <li><a href="../../user/create"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                        <li><a href="../../sign-in"><span class="glyphicon glyphicon-log-in"></span> Sign in</a></li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>

    <div class="container" style="min-height: 500px;">
        <div id="ticket-user-details">
                <div id="ticket-user-details-upper">
                    <div class="row">
                        <div class="col-sm-6">
                            <div id="ticket-details">
                                <h3>Ticket Details</h3>
                                @if(isset($tripInfo))
                                    @foreach($tripInfo as $trip)
                                        @php $j=0; @endphp
                                            @foreach($trip as $dt)
                                                @if($j==0) <p><strong>From : </strong>&nbsp;{{$dt}}</p>
                                                @elseif($j==1) <p><strong>To : </strong>&nbsp;{{$dt}}</p>
                                                @elseif($j==2) <p><strong>Operator : </strong>&nbsp;{{$dt}}</p>
                                                @elseif($j==3) <p><strong>Coach Type : </strong>&nbsp;{{$dt}}</p>
                                                @elseif($j==4) <p><strong>Date : </strong>&nbsp;{{$dt}}</p>
                                                @else <p><strong>Departure Time : </strong>&nbsp;{{$dt}}</p>
                                                @endif
                                                @php $j=$j+1; @endphp
                                            @endforeach
                                    @endforeach
                                @endif
                                <p style="margin-top: 10px;"><strong>Boarding point : </strong>
                                        @if(isset($bdtf)){{$bdtf->get('boarding')}}    @endif
                                </p>
                                <p style="margin-top: 10px;"><strong>Dropping point : </strong>
                                    @if(isset($bdtf)){{$bdtf->get('dropping')}}    @endif
                                </p>
                                <p><strong>Seats : </strong></p>
                                @if(isset($seats))
                                    @foreach($seats as $seat)
                                        @php $j=0; @endphp
                                        <p style="padding-left: 70px;">
                                            @foreach($seat as $st)
                                                @if($j==0) Class : {{$st}},
                                                @elseif($j==1) Seat No : {{$st}},
                                                @else Fare : {{$st}} Tk
                                                @endif
                                                @php $j=$j+1; @endphp
                                            @endforeach
                                        </p>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div id="user-details">
                                <h3>Customer Details</h3>
                                @if(isset($userdata))
                                    <div id="home-row"><p><strong>Full name : </strong>&nbsp;{{$userdata->first_name}}{{' '}}{{$userdata->last_name}}</p></div>
                                    <div id="home-row"><p><strong>Email : </strong>&nbsp;{{$userdata->email}}</p></div>
                                    <div id="home-row"><p><strong>Phone no : </strong>&nbsp;{{$userdata->phn}}</p></div>
                                    <div id="home-row"><p><strong>Gender : </strong>&nbsp;{{$userdata->gender}}</p></div>
                                    <div id="home-row"><p><strong>Age : </strong>&nbsp;{{$userdata->age}}&nbsp;years</p></div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div id="payment-details">
                    <h3>Payment Details</h3>
                    <div class="row">
                        <div class="col-sm-5">
                            <div id="payment-details-left">
                                @php $usern=Session::get('username');      @endphp
                                <form method="post" action="{{url('payment-details',['id'=>$usern,'tripID'=>$bdtf->get('tripID')])}}">
                                    {{csrf_field()}}
                                    <p><strong>Seat Fare : </strong>&nbsp; {{$bdtf->get('fare')}} Tk</p>
                                    <p><strong>Service Charge : </strong>&nbsp; {{$bdtf->get('sc')}} Tk</p>
                                    <p><strong>Total : </strong>&nbsp; {{$bdtf->get('total')}} Tk</p>
                                    <input name="total" value="{{$bdtf->get('total')}}" hidden>
                                    <input name="sc" value="{{$bdtf->get('sc')}}" hidden>
                                    @if(isset($bdtf))<input name="boarding" value="{{$bdtf->get('boarding')}}" hidden>   @endif
                                    @if(isset($bdtf))<input name="dropping" value="{{$bdtf->get('dropping')}}" hidden>   @endif
                                    <p><strong>Payment method : </strong>
                                        <select name="payment-method" id="payment">
                                            <option id="option-d" selected>Payment Gateway</option>
                                            <option id="option-b">Bkash</option>
                                            <option id="option-r">Rocket</option>
                                            <option id="option-s">SureCash</option>
                                        </select></p>
                                    <button class="btn btn-success" id="btn-1" style="display: none;">Pay now</button>
                                </form>
                                <span class="help-block" id="error-mgs" style="color:brown; padding-left: 150px;display: none;">
                                            <strong>Select a payment gateway </strong>
                                        </span>
                                <button class="btn btn-success" id="btn-2">Pay now</button>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div id="payment-details-right">
                                <p id="bkash">Pay with BKash</p>
                                <p id="rocket">Pay with Rocket</p>
                                <p id="surecash">Pay with SureCash</p>
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


