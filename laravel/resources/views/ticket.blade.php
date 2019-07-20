<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bus details</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link rel="stylesheet" href="../../css/ticket-style.css">
    <link rel="stylesheet" href="../../css/header-design.css">
    <link rel="stylesheet" href="../../css/footer-design.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>
<body>
@php //dd($seat_info[3]); @endphp
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
                    @if(\Illuminate\Support\Facades\Session::has('username'))
                        @php $username=Session::get('username');@endphp
                        <li><a href="{{url('user/'.$username)}}"><span style="margin-right: 8px;"><i class="fas fa-user-tie"></i>{{\Illuminate\Support\Facades\Session::get('username')}}</span></a> </li>
                        <li><a href="../../logout"><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>
                    @else
                        <li><a href="user/create"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                        <li><a href="../../sign-in"><span class="glyphicon glyphicon-log-in"></span> Sign in</a></li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>

    <div class="container" style="min-height: 500px;width: 90%;">
        <h3 style="text-align: center;">Ticket is booked successfully</h3>
        <div id="download-section">
            <div class="row"><a href="../../download-ticket/{{\Illuminate\Support\Facades\Session::get('username')}}/{{$ticketInfo->get('ticketID')}}">
                    <button style="float: right;" class="btn btn-primary">Download Ticket</button>
                </a></div>
        </div>

        <div id="ticket-container">
            <div id="ticket-container-top">
                <div class="row">
                    <div class="col-sm-7" style="border-right: 1px dashed grey;">
                        <div id="btn" style="width: 130px;">Passenger Copy</div>
                    </div>
                    <div class="col-sm-5">
                        <div id="btn" style="width: 110px;">Guide Copy</div>
                    </div>
                    <!--/div><div class="col-sm-6">
                        <button>Counter Copy</button>
                    </div-->
                </div>
            </div>
            <div id="ticket-container-bottom">
                <div class="row">
                    <div class="col-sm-7">
                        <h3 style="text-align: center;margin-top: 40px;">{{$ticketInfo->get('ticket')->bus_name}}</h3>
                        <h4 style="text-align: center;margin-top: -5px;margin-bottom: 20px;" class="text-muted">@www.onlineticket.com</h4>
                        <p>Passenger name : {{$ticketInfo->get('userdata')->first_name}}&nbsp;{{$ticketInfo->get('userdata')->last_name}}</p>
                        <div class="row">
                            <div class="col-sm-6">Mobile : {{$ticketInfo->get('userdata')->phn}}</div>
                            <div class="col-sm-6">Gender : {{$ticketInfo->get('userdata')->gender}}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">Ticket No : {{$ticketInfo->get('userdata')->phn}}X{{$ticketInfo->get('ticket')->tid}}</div>
                            <div class="col-sm-6">Age : {{$ticketInfo->get('userdata')->age}}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">Journey Dt : {{$ticketInfo->get('ticket')->journey_date}}</div>
                            <div class="col-sm-6">Booking Dt : {{$ticketInfo->get('ticket')->booking_time}}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">From : {{$ticketInfo->get('ticket')->from}}</div>
                            <div class="col-sm-6">To : {{$ticketInfo->get('ticket')->to}}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">Reporting time : {{$ticketInfo->get('ticket')->departure_time}}</div>
                            <div class="col-sm-6">Depurture time : {{$ticketInfo->get('ticket')->departure_time}}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">Seat Fare : {{$ticketInfo->get('total')}}</div>
                            <div class="col-sm-6">Total : {{$ticketInfo->get('sc')}}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">Boarding point :  {{$ticketInfo->get('ticket')->boarding_point}}  </div>
                            <div class="col-sm-6">Coach No : {{$ticketInfo->get('ticket')->coach_no}}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <p>Seats :
                                    @foreach($ticketInfo->get('seats') as $seats)
                                        @php $i=0; @endphp
                                        @foreach($seats as $seat)
                                            @if($i==0)
                                                {{$seat}} ,&nbsp;
                                            @endif
                                            @php $i=$i+1; @endphp
                                        @endforeach
                                    @endforeach</p>
                            </div>
                            <div class="col-sm-6">Coach Type : {{$ticketInfo->get('ticket')->bus_type}}</div>
                        </div>

                    </div>
                    <div class="col-sm-5"  style="border-left: 1px dashed grey;">
                        <h3 style="text-align: center;margin-top: 40px;">{{$ticketInfo->get('ticket')->bus_name}}</h3>
                        <h4 style="text-align: center;margin-top: -5px;margin-bottom: 20px;" class="text-muted">@www.onlineticket.com</h4>
                        <p>Passenger name : {{$ticketInfo->get('userdata')->first_name}}&nbsp;{{$ticketInfo->get('userdata')->last_name}}</p>
                        <div class="row">
                            <div class="col-sm-6">Mobile : {{$ticketInfo->get('userdata')->phn}}</div>
                            <div class="col-sm-6">Gender : {{$ticketInfo->get('userdata')->gender}}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">Ticket No : {{$ticketInfo->get('userdata')->phn}}X{{$ticketInfo->get('ticket')->tid}}</div>
                            <div class="col-sm-6">Age : {{$ticketInfo->get('userdata')->age}}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">Coach No : {{$ticketInfo->get('ticket')->coach_no}}</div>
                            <div class="col-sm-6">Coach Type : {{$ticketInfo->get('ticket')->bus_type}}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">Journey Date : {{$ticketInfo->get('ticket')->journey_date}}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">From : {{$ticketInfo->get('ticket')->from}}</div>
                            <div class="col-sm-6">To : {{$ticketInfo->get('ticket')->to}}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">Depurture time : {{$ticketInfo->get('ticket')->departure_time}}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">Seat Fare : {{$ticketInfo->get('total')}}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">Total : {{$ticketInfo->get('sc')}}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <p>Seats :
                                    @foreach($ticketInfo->get('seats') as $seats)
                                        @php $i=0; @endphp
                                        @foreach($seats as $seat)
                                            @if($i==0)
                                                {{$seat}} ,&nbsp;
                                            @endif
                                            @php $i=$i+1; @endphp
                                        @endforeach
                                    @endforeach</p>
                            </div>
                    </div>
                    <!--/div><div class="col-sm-3">

                    </div-->
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


