
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
        <title>'Welcome to dashboard</title>
            {{--inlcude header--}}
         
   

    <!-- Google font -->
    <link rel="stylesheet" href="css/google.font.css">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet"  href="css/header-design.css"/>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Latest compiled and minified CSS -->
    <!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"-->



    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/footer-design.css" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />

    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>

        history.pushState(null, null, document.URL);
        window.addEventListener('popstate', function () {
            history.pushState(null, null, document.URL);
        });

        var check = function() {
            if (document.getElementById('from').value ==
                document.getElementById('to').value) {
                document.getElementById('pass-message').style.color = 'red';
                document.getElementById('pass-message').innerHTML = 'Source and Destination should be different';
            }else{
                document.getElementById('pass-message').innerHTML = '';
            }
        }

    </script>


    
</head>

<body>
  {{--inlcude header--}}
  <div id="header">
        <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #120A2A;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="representative-home" style="color: white;"><span>
                            <i class="glyphicon glyphicon-home"></i></span>Online bus booking</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="representative-home">Home</a></li>
                    <li><a href="#footer">Contact</a></li>
                    <li><a href="#footer">About</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if(\Illuminate\Support\Facades\Session::has('rep-username'))
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#" style="color: white;">Representative</a>
                        </div>
                        <li><a href="representative/{{\Illuminate\Support\Facades\Session::get('rep-username')}}">
                                <span style="margin-right: 8px;"><i class="fas fa-user-tie"></i>
                                        {{\Illuminate\Support\Facades\Session::get('rep-username')}}</span></a> </li>
                        <li><a href="representative-logout"><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>
                    @else
                        <li><a href="representative-sign-in"><span class="glyphicon glyphicon-log-in"></span> Sign in</a></li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>

@if(\Illuminate\Support\Facades\Session::has('rep-username'))

    <div id="wrapper" >

       <!---include nav bar----->
       <nav class="navbar-default navbar-side" role="navigation">
           <div class="sidebar-collapse">
               <ul class="nav" id="main-menu">

                   <li>
                       <a href="representative-home"><i class="fa fa-dashboard"></i> Dashboard</a>
                   </li>

                   <li>
                       <a href="representative-buses/{{\Illuminate\Support\Facades\Session::get('rep-username')}}">
                           <i class="fa fa-truck"></i>Buses</a>
                   </li>

                   <li>
                       <a href="representative-seats/{{\Illuminate\Support\Facades\Session::get('rep-username')}}">
                           <i class="fa fa-sitemap"></i>Seats</a>
                   </li>
                   <li>
                       <a href="representative-availability/{{\Illuminate\Support\Facades\Session::get('rep-username')}}">
                           <i class="fa fa-check-circle"></i> Availability</a>
                   </li>
                   <li class="active" style="background:forestgreen; margin-right: -10px;">
                       <a href="representative-routes"><i class="fa fa-road"></i> Routes</a>
                   </li>
                   <li>
                       <a href="representative-trips/{{\Illuminate\Support\Facades\Session::get('rep-username')}}"><i class="fa fa-road"></i> Trips</a>
                   </li>
                   <li >
                       <a href="representative-places"><i class="fa fa-map-marker"></i>Places</a>
                   </li>
                   <li>
                       <a href="summary-reports"><i class="fa fa-list"></i> Reports</a>
                   </li>

               </ul>

           </div>

       </nav>
        <!-- /. NAV SIDE  -->

        {{--dynamic content--}}

        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row" >
                    <div class="col-md-12">
                        <h1 class="">
                            Dashboard <small> Routes</small> </h1><br>
                            <nav class="navbar" style=" background:black;">
                                    <div class="container-fluid">
                                      
                                        <ul class="nav navbar-nav">
                                            <li ><a href="representative-routes">All Routes</a></li>
                                            <li class="active" style="background:white;"><a href="#" style="color:black;">Add Route</a></li>
                                            <li><a href="rept-search-route">Search Route</a></li>
                                           
                                        </ul>
                                    </div>
                            </nav> 
                       
                    </div>
                </div>
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
                <div class="row" >
                        <form method="post" action="rept-add-route">
                                {{csrf_field()}}
            
                                
                                     <div class="row">

                                        <div class="col-sm-4">
                                             <div class="form-group{{ $errors->has('from') ? ' has-error' : '' }}">
                                                <span class="form-label">From</span>
                                                <input list="from" name="from" id="from" required  onkeyup="check();">
                                                @if ($errors->has('from'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('from') }}</strong>
                                                </span>
                                                @endif
                                                    <datalist id="from">
                                                            
                                                        @foreach ($places as $p)
                                                        <option value="{{$p->to}}">
        
                                                        @endforeach
                                                      
                                                    </datalist>
                                             </div>
                                        </div>
        
                                        <div class="col-sm-4">
                                                    <div class="form-group{{ $errors->has('to') ? ' has-error' : '' }}">
                                                        <span class="form-label">Destination</span>
                                                        <input list="to" name="to" id ="to" required onkeyup="check();">
                                                            @if ($errors->has('to'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('to') }}</strong>
                                                            </span>
                                                            @endif
                                                            <datalist id="to">
                                                                @foreach ($places as $p)
                                                                <option value="{{$p->to}}">
            
                                                                @endforeach
                                                            
                                                            </datalist>
                                                    </div>
                                        </div>

                                        <div class="form-group">

                                                <div class="col-xs-6">
                                                    <p id="pass-message" style="padding: 10px;"></p>
                                                </div>

                                        </div>
                                            
                                    </div>  
            
                                    <div class="row" id="bps">
            
                                            
                                                <div class="col-sm-12">
                                                    <div class="form-group{{ $errors->has('bp1') ? ' has-error' : '' }}">
                                                        <span class="form-label">Boarding Point 1</span>
                                                        <input list="bp1" name="bp1" id="bp1j">
                                                            @if ($errors->has('bp1'))
                                                                <span class="help-block">
                                                                <strong>{{ $errors->first('bp1') }}</strong>
                                                            </span>
                                                            @endif
                                                            <datalist id="bp1">
                                                                @foreach ($places as $p)
                                                                <option value="{{$p->to}}">
            
                                                                @endforeach
                                                            
                                                            </datalist>
                                                    </div>
                                                </div>

                                               
                                                
            
                                                
                                                
                                    </div>

                                    <button id="btn" type="button" onclick="addbp()"> Add more boarding point</button>

                                    <input type="hidden" name="n" id="n" value="1">
        
                                    
                                        
                                        <div class="form-btn" style="margin-top: 20px;float: right;margin-right:80px;">
                                            <button type="submit" class="btn btn-success" name="sendval" value="normal">Submit</button>
                                        </div>
                                    
                            
            
                               
                               
            
                        </form>
                </div>
        
                
                <script>
                    var i = 2;
                    function addbp() {
                        
                        document.getElementById("n").setAttribute('value' ,i);
                        var txt = document.getElementById("bps").innerHTML;
                        
                        document.getElementById("bps").innerHTML = txt+"<div class=\"col-sm-12\">"+
                                                    "<div class=\"form-group\">"+
                                                        "<span class=\"form-label\">Boarding Point "+ i+" &nbsp</span>"+
                                                        "<input name=\"bp" +i+"\" id=\"bp"+i+"\" >"+
                                                         "</div></div>"   ;
                                       
                        i++;
                        
                        
                    }
                      
        
                </script>
                        
                              
        
                
            </div>
        </div>

        
    </div>
    

@else
       
    <div class="container" style="min-height: 500px;">
        <h2 style="text-align: center;margin-top: 100px;">
           Log in First.........</h2>
    </div>

@endif
{{--inlcude footer--}}
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







    




