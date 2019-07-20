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

    <style>
        #cancel-mgs{
            margin-bottom: 20px;
            margin-top: 20px;
            width: 80%;
            margin-left: 15%;
        }
        #cancel-form{
            margin-top: 40px;
            width: 60%;
            margin-left: 20%;
            background-color: whitesmoke;
            padding-top: 15px;
            padding-left: 50px;
        }
        #cancel-form input{
            width: 300px;
            height: 35px;
            margin-top: 15px;
            margin-left: 10px;
            padding-left: 15px;
        }
        #cancel-form button{
            margin-top: 20px;
            margin-left: 130px;
            margin-bottom: 20px;
        }
    </style>
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
        <h2 style="text-align: center;">Ticket Cancellation</h2>
        <div id="cancel-mgs">
            <lu>
                <li><a href="../../cancel-refund-policy">Read cancel and refund policy carefully before cancel ticket</a> </li>
                <li>Insert correct information before sending cancellation request</li>
            </lu>
        </div>

        <div id="cancel-form">
            <span>Ticket No : </span> <input name="ticketNo" type="text" style="margin-left: 55px;" required><br>
            <span>Date of Payment : </span> <input name="paymentDate" type="date" required><br>
            <span>Payment Method : </span> <input name="paymentMethod" type="text" required><br>
            <span>TrxID : </span> <input name="trxID" type="text" style="margin-left: 80px;" required> <br>
            <span>Mobile No : </span><input name="mobileNo" type="text" style="margin-left: 50px;" required><span class="text-muted"> (where should be refund)</span>
            <br><button class="btn btn-warning">Submit</button>
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



