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

</head>
<body>

<div class="section">

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
                    @if(\Illuminate\Support\Facades\Session::has('agent-username'))
                        @php $username=Session::get('agent-username');@endphp
                        <li><a href="{{url('agent/'.$username)}}"><span style="margin-right: 8px;"><i class="fas fa-user-tie"></i>
                                    {{\Illuminate\Support\Facades\Session::get('agent-username')}}</span></a> </li>
                        <li><a href="../../agent-logout"><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>
                    @else
                        <li><a href="../../agent/create"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                        <li><a href="../../agent-sign-in"><span class="glyphicon glyphicon-log-in"></span> Sign in</a></li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>

    @if(\Illuminate\Support\Facades\Session::has('agent-username'))

    <div class="container" style="min-height: 500px;">
        <div id="ticket-user-details">
            @php $usern=Session::get('agent-username');      @endphp
            <form method="post" action="{{url('agent-confirm-ticket',['id'=>$usern,'tripID'=>$bdtf->get('tripID'),'userID'=>$bdtf->get('userID')])}}">
                {{csrf_field()}}
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
                                <p style="margin-top: 10px;"><strong>Boarding point</strong>
                                    <select name="boarding">
                                        <option>Required</option>
                                        @if(isset($bdtf))
                                            @foreach($bdtf->get('boarding') as $bd)
                                                @foreach($bd as $dt)
                                                    <option>{{$dt}}</option>
                                                @endforeach
                                            @endforeach
                                        @endif
                                    </select></p>
                                @if(\Illuminate\Support\Facades\Session::has('berror'))
                                    <p style="color: red">{{\Illuminate\Support\Facades\Session::get('berror')}}</p>
                                @endif
                                <p><strong>Dropping point</strong>
                                    <select name="dropping">
                                        <option>Optional</option>
                                        @if(isset($bdtf))
                                            @foreach($bdtf->get('dropping') as $bd)
                                                @foreach($bd as $dt)
                                                    <option>{{$dt}}</option>
                                                @endforeach
                                            @endforeach
                                        @endif
                                    </select></p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div id="user-details">
                                <h3>Customer Details</h3>
                                @if(isset($userdata))
                                    <div id="home-row"><p><strong>Full Name : </strong>&nbsp;{{$userdata->fullname}}</p></div>
                                   <div id="home-row"><p><strong>Mobile No : </strong>&nbsp;{{$userdata->phn}}</p></div>
                                    <div id="home-row"><p><strong>Gender : </strong>&nbsp;{{$userdata->gender}}</p></div>
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
                                <p><strong>Total : </strong>&nbsp; {{$bdtf->get('total')}} Tk</p>
                                <input name="total" value="{{$bdtf->get('total')}}" hidden>
                                <button class="btn btn-success">Confirm Ticket</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @else
        <h3 style="text-align: center;margin-top: 100px;">Pleage log in first</h3>

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

</div>

</body>
</html>



