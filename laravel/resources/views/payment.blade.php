<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bus details</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link rel="stylesheet" href="../../css/payment-style.css">
    <link rel="stylesheet" href="../../css/header-design.css">
    <link rel="stylesheet" href="../../css/footer-design.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <style>
        .payment-step-container {
            padding:15px 25px;
        }

        @media only screen and (max-width: 480px) {
            .payment-step-container {
                margin:8px 0px;
            }
        }

        .payment-step {
            height:175px;
            position:relative;
            border-radius:20px;
            border:2px solid #b25552;
            padding-top:10px;
        }

        .index {
            position: absolute;
            right: -8px;
            top: -8px;
            display: inline-block;
            border-radius: 8px;
            border: 2px solid #b25552;
            z-index: 3;
            min-width: 34px;
            background-color: white;
            font-weight: normal;
        }
    </style>

    <script>

        function checkTrxID() {
            var trxID=document.getElementById("trxID").value;
           // document.getElementById('pp').innerHTML=trxID;
        }

    </script>

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
            @if(isset($senddata))
                @if($senddata->get('payment-method')=='Bkash')

                <div class="kl-main-content">

                    <div style="text-align:center;width:100%;">

                        <div style="display:inline-block;min-width:70%;padding:5px 8px">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div style="float:left;clear:both;text-align:left;">
                                        <div style="color:#ff3399;text-decoration:underline;">Please use the following steps to pay now!</div>
                                        <ul style="padding:15px 0px 15px 45px;list-style-type:decimal;">
                                            <li>Go to bKash Menu by dialing *247#</li>
                                            <li>Choose 'Payment' option by pressing '3'</li>
                                            <li>Enter our Merchant wallet number : 01780941550</li>
                                            <li>Enter BDT. amount you have to pay : xxxx</li>
                                            <li>Enter a reference against your payment : xxxx</li>
                                            <li>Enter the counter number : 1</li>
                                            <li>Now enter your PIN to confirm: xxxx</li>
                                            <li>Done! You will get a confirmation SMS</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div style="float:right;">
                                        <img src="../../img/bkash-logo.png" style="float:right;padding-right:10px;max-width:200px;">
                                    </div>
                                </div>
                            </div>
                            <div style="clear:both;position:relative;">
                                <label style="background-color:#963637;color:white;padding:3px 8px;float:left">How to Make Payment Through bKash <span style="font-weight:bold">:</span> </label>
                                <div class="row" style="padding:0px;clear:both">
                                    <div class="col-sm-3 payment-step-container">
                                        <div class="payment-step" style="display:flex;justify-content:center;align-items:center;font-weight:bold;font-size:1.3em">
                                            <div class="index">1</div>
                                            *247#
                                        </div>
                                        <div style="padding:5px">
                                            Dial *247# on your bKash activated mobile phone
                                        </div>
                                    </div>
                                    <div class="col-sm-3 payment-step-container">
                                        <div class="payment-step">
                                            <div class="index">2</div>
                                            <ul style="text-align:left;display:inline-block;list-style-type:decimal;">
                                                <li>Send Money</li>
                                                <li>Buy Airtime</li>
                                                <li style="color:red;font-size:1.4em;font-weight:bold">Payment</li>
                                                <li>Cash Out</li>
                                                <li>Remittance</li>
                                                <li>My bKash</li>
                                                <li>Helpline</li>
                                            </ul>
                                            <!--div style="position:absolute;width:100%;bottom:10px">
                                                <div style="width:100px;border-radius:5px;border:2px solid #b25552;font-weight:bold;margin:auto">3</div>
                                            </div-->
                                        </div>
                                        <div style="padding:5px;font-weight:bold">
                                            Press '3' to select 'Payment'
                                        </div>
                                    </div>
                                    <div class="col-sm-3 payment-step-container">
                                        <div class="payment-step">
                                            <div class="index">3</div>
                                            <span style="font-weight:bold">Enter Merchant bKash No.</span>
                                            <div style="position:absolute;width:100%;bottom:10px">
                                                <div style="width:100px;border-radius:5px;border:2px solid #b25552;font-weight:bold;margin:auto">01780941550</div>
                                            </div>
                                        </div>
                                        <div style="padding:5px;font-weight:bold">
                                            Enter '01780941550'
                                        </div>
                                    </div>
                                    <div class="col-sm-3 payment-step-container">
                                        <div class="payment-step">
                                            <div class="index">4</div>
                                            <span style="font-weight:bold">Enter Amount:</span>
                                            <div style="position:absolute;width:100%;bottom:10px">
                                                <div style="width:100px;border-radius:5px;border:2px solid #b25552;font-weight:bold;margin:auto">xxxx</div>
                                            </div>
                                        </div>
                                        <div style="padding:5px;font-weight:bold">
                                            Enter 'Amount'
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="padding:0px;clear:both">
                                    <div class="col-sm-3 payment-step-container">
                                        <div class="payment-step">
                                            <div class="index">5</div>
                                            <span style="font-weight:bold">Enter Reference:</span>
                                            <div style="position:absolute;width:100%;bottom:10px">
                                                <div style="width:100px;border-radius:5px;border:2px solid #b25552;font-weight:bold;margin:auto">xxxx</div>
                                            </div>
                                        </div>
                                        <div style="padding:5px;font-weight:bold">
                                            Enter your reference number 'xxxx'
                                        </div>
                                    </div>
                                    <div class="col-sm-3 payment-step-container">
                                        <div class="payment-step">
                                            <div class="index">6</div>
                                            <span style="font-weight:bold">Enter Counter No:</span>
                                            <div style="position:absolute;width:100%;bottom:10px">
                                                <div style="width:100px;border-radius:5px;border:2px solid #b25552;font-weight:bold;margin:auto">1</div>
                                            </div>
                                        </div>
                                        <div style="padding:5px;font-weight:bold">
                                            Press '1' to proceed
                                        </div>
                                    </div>
                                    <div class="col-sm-3 payment-step-container">
                                        <div class="payment-step">
                                            <div class="index">7</div>
                                            Payment
                                            <ul>
                                                <li>To: 01780941550</li>
                                                <li>Amount: TK xxxx</li>
                                                <li>Reference: xxxx</li>
                                                <li>Counter: 1</li>
                                            </ul>
                                            Enter PIN to confirm:
                                            <div style="position:absolute;width:100%;bottom:10px">
                                                <div style="width:100px;border-radius:5px;border:2px solid #b25552;font-weight:bold;margin:auto">xxxx</div>
                                            </div>
                                        </div>
                                        <div style="padding:5px;font-weight:bold">
                                            Enter your bKash Menu PIN to confirm payment
                                        </div>
                                    </div>
                                    <div class="col-sm-3 payment-step-container">
                                        <div class="payment-step">
                                            <div class="index">8</div>
                                            <label style="font-weight:bold">bKash</label>
                                            <ul style="text-align:left;padding:5px 10px;">
                                                <li>Payment TK.xxxx to 01780941550 successful.</li>
                                                <li>Ref xxxx.Counter.1</li>
                                                <li>Fee TK. XX.XX</li>
                                                <li>Balance TK.XXXX.XX</li>
                                                <li>TrxID XXXXXXX at 16/07/2019 14:35</li>
                                            </ul>
                                        </div>
                                        <div style="padding:5px;font-weight:bold">
                                            Customer will receive a payment confirmation SMS
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div id="payment-confirm">
                    <div class="row">
                        <form method="post" action="../../confirm-ticket/{{\Illuminate\Support\Facades\Session::get('username')}}/{{$senddata->get('tripID')}}">
                            {{csrf_field()}}
                            <p><strong>Seat Fare : </strong>&nbsp; {{$senddata->get('fare')}} Tk</p>
                            <p><strong>Service Charge : </strong>&nbsp; {{$senddata->get('sc')}} Tk</p>
                            <p><strong>Total : </strong>&nbsp; {{$senddata->get('total')}} Tk</p>
                            <input name="boarding" value="{{$senddata->get('boarding')}}" hidden>
                            <input name="dropping" value="{{$senddata->get('dropping')}}" hidden>
                            <input name="tripID" value="{{$senddata->get('tripID')}}" hidden>
                            <input name="total" value="{{$senddata->get('total')}}" hidden>
                            <input name="sc" value="{{$senddata->get('sc')}}" hidden>
                            <input name="payment-method" value="{{$senddata->get('payment-method')}}" hidden>
                            <div class="row">
                                <div class="col-sm-5">
                                    <span><strong>Inter TrxID to confirm payment</strong> &nbsp;</span>
                                    <input style="text-align: center;height: 35px; " type="text" id="trxID" name="trxID" placeholder="Ex - XXXXXXXXXX" required>
                                    @if ($senddata->has('trxIDstatus'))
                                        <span class="help-block">
                                        <strong>{{ $senddata->get('trxIDstatus') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-sm-1"><button class="btn btn-success">Confirm</button></div>
                            </div>
                        </form>
                    </div>
                </div>

                @else
                    <h3>Payment method not allowed</h3>
                @endif
            @else
                <h2>Go home</h2>
            @endif


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

