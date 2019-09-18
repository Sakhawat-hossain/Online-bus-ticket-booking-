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
<p id="pp"></p>
@php
    $name=$phn=$gender=$email=$create=$update="";
    $i = 0;
@endphp

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
                            <a class="navbar-brand" href="../representative-home" style="color: white;">Representative</a>
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
        @if (session()->has("message"))
        <div class="alert alert-success">
        <p>{{session("message")}}</p>
        </div>

        @endif
        @if (session()->has("error_msg"))
        <div class="alert alert-danger">
        <p>{{session("error_msg")}}</p>
        </div>

        @endif
    <div class="container bootstrap snippet" style="min-height: 450px;">

        <div class="row">
            <div class="col-sm-10">
                @foreach ($info as $item)
                <h1>{{$item->first_name}}{{" "}}{{$item->last_name}}</h1></div>

                @endforeach
            <div class="col-sm-2">
                <a href="/users" class="pull-right"><img title="profile image" style="width: 150px;" class="img-circle img-responsive"
                                                        src="https://bootdey.com/img/Content/avatar/avatar1"></a>
            </div>
        </div>

        <div class="row">

            <div class="col-sm-3">
                <!--left col-->

                <ul class="list-group">
                    <li class="list-group-item text-muted">Profile</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Enterprise</strong></span>{{$enterprise}} </li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Role</strong></span>Representative </li>

                    <li class="list-group-item text-right"><span class="pull-left"><strong>Joined</strong></span>{{$c}} </li>
                    @foreach ($info as $item)
                <li class="list-group-item text-right"><span class="pull-left"><strong>Full name</strong></span> {{$item->first_name}}{{" "}}{{$item->last_name}}</li>

                    @endforeach
                </ul>

                <ul class="list-group">
                    <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i> </li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Total trips</strong></span>{{$num_trips}}</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Last update</strong></span>{{$u}}</li>
                </ul>

            </div>
            <!--/col-3-->

            <div class="col-sm-9">

                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
                    <li ><a href="#address" data-toggle="tab">Address</a></li>

                    <li><a href="#trips" data-toggle="tab">Trips</a></li>
                    <li><a href="#settings" data-toggle="tab">Edit</a></li>
                </ul>

                <div class="tab-content">

                    <div class="tab-pane active" id="home">
                        <!--/table-resp-->
                        <div id="home-box">
                            @if(isset($username))
                                <div id="home-row"><p><strong>Username : </strong>{{$username}}</p></div>
                                @foreach ($info as $item)
                                <div id="home-row"><p><strong>Full name : </strong>{{$item->first_name}}{{" "}}{{$item->last_name}}</p></div>



                                <div id="home-row"><p><strong>Email : </strong>{{$item->email}}</p></div>

                                <div id="home-row"><p><strong>Phone no : </strong>{{$item->phone_no}}</p></div>

                                @endforeach

                            @endif
                        </div>

                    </div>

                    <div class="tab-pane" id="address">
                            <!--/table-resp-->
                            <div id="home-box">

                                    @foreach ($address as $item)
                                    <div id="home-row"><p><strong>Place Name :   </strong>{{$item->name}}</p></div>



                                    <div id="home-row"><p><strong>Thana :  </strong>{{$item->thana}}</p></div>

                                    <div id="home-row"><p><strong>District :  </strong>{{$item->district}}</p></div>
                                    <div id="home-row"><p><strong>House# & Road#:  </strong>{{$item->house_road}}</p></div>


                                    @endforeach


                            </div>

                        </div>

                    <!--/tab-pane-->

                    <div class="tab-pane" id="trips">
                        <hr>
                        <div class="table-responsive">
                            <div class="table table-header"><h3>Trips Created by you</h3></div>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Starting Point</th>
                                    <th>Departure time</th>
                                    <th>Date</th>
                                    <th>Enterprise</th>
                                    <th>Coach_no</th>
                                    <th>type</th>
                                    {{-- <th>Cost(Bussness/Economy)</th> --}}

                                </tr>
                                </thead>
                                <tbody id="items">
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach ($trips as $item)
                                        <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$item->from}}</td>
                                        <td>{{$item->to}}</td>
                                        <td>{{$item->starting_point}}</td>
                                        <td>{{$item->departure_time}}</td>
                                        <td>{{$item->date}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->coach_no}}</td>
                                        <td>{{$item->type}}</td>

                                        </tr>

                                        @php
                                        $i++;
                                     @endphp

                                    @endforeach

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
                        @php $username=Session::get('rep-username');@endphp
                        <form class="form" method="post" action="{{route('representative.update',['id' => $username])}}" id="registrationForm">
                            {{csrf_field()}}
                            {{method_field('PATCH')}}

                            <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="first_name">
                                            <h4>First Name</h4></label>
                                            @foreach ($info as $item)
                                                <input type="text" class="form-control" name="first_name" id="first_name" value="{{$item->first_name}}" title="Edit your First Name.">

                                            @endforeach
                                    </div>
                                </div>
                                <div class="form-group">

                                        <div class="col-xs-6">
                                                <label for="last_name">
                                                    <h4>Last Name</h4></label>
                                                    @foreach ($info as $item)
                                                        <input type="text" class="form-control" name="last_name" id="last_name" value="{{$item->last_name}}" title="Edit your Last Name.">

                                                    @endforeach
                                            </div>
                                </div>


                            <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="first_name">
                                            <h4>Email</h4></label>
                                            @foreach ($info as $item)
                                                <input type="email" class="form-control" name="email" id="email" value="{{$item->email}}" title="Edit your email." required>

                                            @endforeach
                                    </div>
                                </div>
                                <div class="form-group">

                                        <div class="col-xs-6">
                                                <label for="last_name">
                                                    <h4>Phone no</h4></label>
                                                    @foreach ($info as $item)
                                                        <input type="tel" class="form-control" name="phone_no" id="phone_no" value="{{$item->phone_no}}" title="Edit phone_no." required>

                                                    @endforeach
                                            </div>
                                </div>


                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="password">
                                        <h4>Password</h4></label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password." required>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="password2">
                                        <h4>Verify</h4></label>
                                    <input type="password" class="form-control" name="re-password" id="re-password" placeholder="confirm-password" title="enter your password2." onkeyup="check();" required>
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
                                            <h3>Address update</h3><hr>
                                    </div>
                             </div>

                             <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="first_name">
                                            <h4>Place Name</h4></label>
                                            @foreach ($address as $item)
                                                <input type="text" class="form-control" name="place_name" id="first_name" value="{{$item->name}}" title="Edit your Place Name." required>

                                            @endforeach
                                    </div>
                                </div>
                                <div class="form-group">

                                        <div class="col-xs-6">
                                                <label for="last_name">
                                                    <h4>Thana</h4></label>
                                                    @foreach ($address as $item)
                                                        <input type="text" class="form-control" name="thana" id="thana" value="{{$item->thana}}" title="Edit your Thana." required>

                                                    @endforeach
                                            </div>
                                </div>

                                <div class="form-group">

                                        <div class="col-xs-6">
                                            <label for="first_name">
                                                <h4>District</h4></label>
                                                @foreach ($address as $item)
                                                    <input type="text" class="form-control" name="district" id="district" value="{{$item->district}}" title="Edit your District Name." required>

                                                @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group">

                                            <div class="col-xs-6">
                                                    <label for="last_name">
                                                        <h4>House & Road #</h4></label>
                                                        @foreach ($address as $item)
                                                            <input type="text" class="form-control" name="house_road" id="house_road" value="{{$item->house_road}}" title="Edit your house road#.">

                                                        @endforeach
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
@else
     <div class="container" style="min-height: 500px;">
            <h2 style="text-align: center;margin-top: 100px;">
            Log in First.........</h2>
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

</body>
</html>

