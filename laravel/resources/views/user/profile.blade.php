<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from https://bootdey.com  -->
    <!--  All snippets are MIT license https://bootdey.com/license -->
    <title>profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">

    <link type="text/css" rel="stylesheet"  href="../css/header-design.css"/>
    <link type="text/css" rel="stylesheet"  href="../css/footer-design.css"/>

    <style>
        #home-box{
            margin-top: 40px;
        }
        #home-row{
            padding-left: 50px;
            height: 50px;
        }
    </style>


    <script>
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

@php
    $name=$phn=$gender=$email=$create=$update="";
    $i = 0;
@endphp

<div id="header">
    <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #120A2A; color: red;">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="../home" style="color: white;"><span>
                        <i class="glyphicon glyphicon-home"></i></span>Online ticket booking</a>
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
                    <li><a href="../signin/create"><span class="glyphicon glyphicon-log-in"></span> Sign in</a></li>
                @endif
            </ul>
        </div>
    </nav>
</div>

<div class="container bootstrap snippet" style="min-height: 350px;">

    <div class="row">
        <div class="col-sm-10">
            <h1>{{\Illuminate\Support\Facades\Session::get('username')}}</h1></div>
        <div class="col-sm-2">
            <a href="/users" class="pull-right"><img title="profile image" style="width: 150px;" class="img-circle img-responsive" src="https://bootdey.com/img/Content/avatar/avatar1.png"></a>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-3">
            <!--left col-->

            <ul class="list-group">
                <li class="list-group-item text-muted">Profile</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Joined</strong></span> {{$userdata->create}}</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Real name</strong></span> {{$userdata->first_name}}{{' '}}{{$userdata->last_name}}</li>
            </ul>

            <ul class="list-group">
                <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Total tickets</strong></span>
                    @if(isset($ticketNum)) {{$ticketNum}} @endif
                </li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Last update</strong></span> {{$userdata->update}}</li>
            </ul>

        </div>
        <!--/col-3-->
        
        <div class="col-sm-9">

            <ul class="nav nav-tabs" id="myTab">
                <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
                <li><a href="#tickets" data-toggle="tab">Tickets</a></li>
                <li><a href="#messages" data-toggle="tab">Messages</a></li>
                <li><a href="#settings" data-toggle="tab">Edit</a></li>
            </ul>

            <div class="tab-content">

                <div class="tab-pane active" id="home">
                    <!--/table-resp-->
                    <div id="home-box">
                        @if(isset($userdata))
                            <div id="home-row"><p><strong>Username : </strong>{{\Illuminate\Support\Facades\Session::get('username')}}</p></div>

                            <div id="home-row"><p><strong>Full name : </strong>{{$userdata->first_name}}{{' '}}{{$userdata->last_name}}</p></div>

                            <div id="home-row"><p><strong>Email : </strong>{{$userdata->email}}</p></div>

                            <div id="home-row"><p><strong>Phone no : </strong>{{$userdata->phn}}</p></div>

                            <div id="home-row"><p><strong>Gender : </strong>{{$userdata->gender}}</p></div>

                        @endif
                    </div>

                </div>

                <div class="tab-pane" id="tickets">
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Departure Date</th>
                                    <th>Bus</th>
                                    <th>Type</th>
                                    <th>Seat</th>
                                    <th>Fare </th>
                                    <th>Booking Date </th>
                                </tr>
                            </thead>

                            <tbody id="items">
                            @php $i=1; @endphp
                            @if(isset($ticketdata))
                                @foreach($ticketdata as $tdata)
                                    <tr><td>{{$i}}</td>
                                    @foreach($tdata as $td)
                                        <td>{{$td}}</td>
                                    @endforeach
                                    </tr>
                                    @php $i=1+$i; @endphp
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                        <hr>
                    </div>
                    <!--/table-resp-->

                </div>
                <!--/tab-pane-->

                <div class="tab-pane" id="messages">
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Sent messages </th>
                            </tr>
                            </thead>
                            <tbody id="items">
                            <tr>
                                <td>1</td>
                                <td>No message has been sent yet</td>
                            </tr>
                            </tbody>
                        </table>
                        <hr>
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4 text-center">
                                <ul class="pagination" id="myPager"></ul>
                            </div>
                        </div>
                    </div>
                    <!--/table-resp-->

                    <hr>

                </div>

                <!--/tab-pane-->
                <div class="tab-pane" id="settings">

                    <hr>
                    @php $username=Session::get('username');@endphp
                    <form class="form" method="post" action="{{route('user.update',['id' => $username])}}" id="registrationForm">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="first_name">
                                    <h4>First name</h4></label>
                                <input type="text" class="form-control" name="first_name" value="{{$userdata->first_name}}" id="first_name" placeholder="first name" title="enter your first name if any.">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="last_name">
                                    <h4>Last name</h4></label>
                                <input type="text" class="form-control" name="last_name" value="{{$userdata->last_name}}" id="last_name" placeholder="last name" title="enter your last name if any.">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="phone">
                                    <h4>Phone</h4></label>
                                <input type="text" class="form-control" name="phone" value="{{$userdata->phn}}" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="email">
                                    <h4>Email</h4></label>
                                <input type="email" class="form-control" name="email" value="{{$userdata->email}}" id="email" placeholder="you@email.com" title="enter your email.">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="password">
                                    <h4>Password</h4></label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="password2">
                                    <h4>Verify</h4></label>
                                <input type="password" class="form-control" name="re-password" id="re-password" placeholder="confirm-password" title="enter your password2." onkeyup="check();">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <p id="pass-message" style="padding: 10px;"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                <!--button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button-->
                            </div>
                        </div>
                    </form>
                </div>
                <!--/tab-pane-->
            </div>
            <!--/tab-content-->
        </div>
        <!--/col-9-->
    </div>
    <!--/row-->
</div>

<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

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

</body>
</html>