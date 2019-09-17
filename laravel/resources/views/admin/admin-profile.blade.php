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
                    <li class="active"><a href="../admin-home">Home</a></li>
                    <li><a href="#footer">Contact</a></li>
                    <li><a href="#footer">About</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if(\Illuminate\Support\Facades\Session::has('admin-username'))
                        <div class="navbar-header">
                            <a class="navbar-brand" href="../admin-home" style="color: white;">Admin</a>
                        </div>
                        <li><a href="../admin-profile/{{\Illuminate\Support\Facades\Session::get('admin-username')}}"><span style="margin-right: 8px;"><i class="fas fa-user-tie"></i>
                                        {{\Illuminate\Support\Facades\Session::get('admin-username')}}</span></a> </li>
                        <li><a href="../admin-logout"><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>
                    @else
                        <li><a href="../admin-sign-in"><span class="glyphicon glyphicon-log-in"></span> Sign in</a></li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
 @if(\Illuminate\Support\Facades\Session::has('admin-username'))
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
    <div class="container bootstrap snippet" style="min-height: 370px;">

        <div class="row">
            <div class="col-sm-10">
                
                <h1>{{$username}}</h1></div>

               
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
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Role</strong></span>Admin </li>

                    <li class="list-group-item text-right"><span class="pull-left"><strong>Joined</strong></span>{{$c}} </li>
                  
                <li class="list-group-item text-right"><span class="pull-left"><strong>Full name</strong></span> {{$username}}</li>

                    
                </ul>

                <ul class="list-group">
                    <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i> </li>
                
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Last update</strong></span>{{$u}}</li>
                </ul>

            </div>
            <!--/col-3-->
            
            <div class="col-sm-9">

                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
                   
                    
                    
                    
                </ul>

                <div class="tab-content">

                    <div class="tab-pane active" id="home">
                        <!--/table-resp-->
                        <div id="home-box">
                            @if(isset($username))
                                <div id="home-row"><p><strong>Username : </strong>{{$username}}</p></div>
                               
                                <div id="home-row"><p><strong>Full name : </strong></p></div>

                               

                                <div id="home-row"><p><strong>Email : </strong></p></div>

                                <div id="home-row"><p><strong>Phone no : </strong></p></div>

                               

                            @endif
                        </div>

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

