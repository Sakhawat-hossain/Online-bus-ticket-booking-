
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Register</title>

    <!-- Google font -->
    <link rel="stylesheet" href="../css/google.font.">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet"  href="../css/header-design.css"/>
    <link rel="stylesheet" href="../css/seat-list-style.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Latest compiled and minified CSS -->
    <!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"-->



    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="../css/footer-design.css" />

    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <script src="js/jquery/jquery-3.4.1.js"></script>
    <script src="js/jquery/home-query.js"></script>
    <![endif]-->
    <style>
        #preview-container{
            min-height: 200px;
            max-height: 98%;
            width: 50%;
            position: fixed;
            left: 25%;
            top: 0%;
            background-color: whitesmoke;
            border: 1px solid grey;
            display: none;
            overflow-y: scroll;
        }
        #preview-container-top{
            text-align: center;
            padding-top: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid grey;
        }
        #preview-container-middle{
            width: 100%;
            min-height: 200px;
        }
        #preview-container-left{
            width: 100%;
            height: 100%;
            padding-left: 20px;
            padding-top: 10px;
        }
        #preview-container-right{
            width: 100%;
            height: 100%;
        }
        #preview-container-bottom{
            text-align: center;
            padding-top: 15px;
            padding-bottom: 15px;
            background-color: #78341a;
        }
        #preview-container-bottom button{
            position: center;
            margin-left: 10px;
        }
        #preview-details-seat-view{
            width: 90%;
            height: auto;
            border: 1px solid #CCCCCB;
            margin-bottom: 20px;
            margin-top: 20px;
            padding-bottom: 10px;
            position: center;
            margin-left: 5%;
        }
        #preview-front-side{
            height: 50px;
            width: 99%;
            border-bottom: 1px dashed #CCCCCB;
            padding-top: 15px;
        }
        #preview-seat-view-group{
            height: 40px;
            width: 100%;
            padding-left: 10px;
            padding-top: 10px;
        }

        #add-label-container{
            height: 100px;
            width: 600px;
            position: fixed;
            display: none;
            background-color:  #555;//"#F4F6F6";
            color: white;
            top: 0px;
            left: 30%;
            padding-top: 10px;
        }
        .hoverable{}
        .hoverable :hover{
            cursor: pointer;
        }
        .input-2{
            margin-left: 10px;
        }
        .input-3{
            margin-top: 18px;
        }
    </style>
    <script>
        //var from = ['Dhaka','Rangpur','Sylhet'];

        $(document).ready(function () {
            $("#fromm").onclick(function () {
                //$("#fromm").innerText = 'hello';
                //alert('hello');

            });
        });
    </script>

</head>

<body>

<div id="header">
    <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #120A2A; color: red;">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#" style="color: white;"><span>
                        <i class="glyphicon glyphicon-home"></i></span>Online ticket booking</a>
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
                    @php $username=Session::get('rep-username');@endphp
                    <li><a href="../representative/{{\Illuminate\Support\Facades\Session::get('rep-username')}}">
                            <span style="margin-right: 8px;"><i class="fas fa-user-tie"></i>
                                    {{\Illuminate\Support\Facades\Session::get('rep-username')}}</span></a> </li>
                    <li><a href="../representative-logout"><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>
                @else
                    <li><a href="../representative/create"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                    <li><a href="../representative-sign-in"><span class="glyphicon glyphicon-log-in"></span> Sign in</a></li>
                @endif
            </ul>
        </div>
    </nav>
</div>

<div class="container" style="min-height: 500px;">
    <div>
        @if(isset($addMessage))
            <h2>{{$addMessage}}</h2>
        @endif
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" id="fromm">Add New Trip for <strong>{{$bus_name}}</strong></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="post" id="send-form" action="../representative-add-trips/{{
                    \Illuminate\Support\Facades\Session::get('rep-username')}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('from') ? ' has-error' : '' }}">
                            <label for="from" class="col-md-4 control-label">From</label>

                            <div class="col-md-6">
                                <input id="from" type="text" class="form-control" name="from" value="{{ old('from') }}" required/>

                                @if ($errors->has('from'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('from') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('to') ? ' has-error' : '' }}">
                            <label for="to" class="col-md-4 control-label">To</label>

                            <div class="col-md-6">
                                <input id="to" type="text" class="form-control" name="to" value="{{ old('to') }}" required/>

                                @if ($errors->has('to'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('to') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('starting_point') ? ' has-error' : '' }}">
                            <label for="starting_point" class="col-md-4 control-label">Starting Point</label>

                            <div class="col-md-6">
                                <input id="starting_point" type="text" class="form-control" name="starting_point" value="{{ old('starting_point') }}" required/>

                                @if ($errors->has('starting_point'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('starting_point') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label for="type" class="col-md-4 control-label">Bus Type</label>

                            <div class="col-md-6">
                                <select id="type" class="form-control" name="type">
                                    <option>AC</option>
                                    <option>non-AC</option>
                                </select>
                                @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('coach_no') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Coach No</label>

                            <div class="col-md-6">
                                <input id="coach_no" type="text" class="form-control" name="coach_no" value="{{ old('coach_no') }}" required>

                                @if ($errors->has('coach_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('coach_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('efare') ? ' has-error' : '' }}">
                            <label for="efare" class="col-md-4 control-label">Fare (Economy)</label>

                            <div class="col-md-6">
                                <input id="efare" type="text" class="form-control" name="efare" value="{{ old('efare') }}" required/>

                                @if ($errors->has('efare'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('efare') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('bfare') ? ' has-error' : '' }}">
                            <label for="bfare" class="col-md-4 control-label">Fare (Business)</label>

                            <div class="col-md-6">
                                <input id="bfare" type="text" class="form-control" name="bfare" value="{{ old('bfare') }}"/>

                                @if ($errors->has('bfare'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bfare') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                            <label for="date" class="col-md-4 control-label">Date</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control" name="date" value="{{ old('date') }}" required/>

                                @if ($errors->has('date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('dept_time') ? ' has-error' : '' }}">
                            <label for="dept_time" class="col-md-4 control-label">Departure Time</label>

                            <div class="col-md-6">
                                <input id="dept_time" type="text" class="form-control" name="dept_time"
                                       value="{{ old('dept_time') }}" placeholder="10:00 PM" required/>

                                @if ($errors->has('dept_time'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dept_time') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('arr_time') ? ' has-error' : '' }}">
                            <label for="arr_time" class="col-md-4 control-label">Arrival Time</label>

                            <div class="col-md-6">
                                <input id="arr_time" type="text" class="form-control" name="arr_time"
                                       value="{{ old('arr_time') }}" placeholder="10:00 AM" required/>

                                @if ($errors->has('arr_time'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('arr_time') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
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

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
