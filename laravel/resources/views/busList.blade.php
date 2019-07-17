<!DOCTYPE html>
<html lang="en">
    <head>
          <title>Bus details</title>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

        <link rel="stylesheet" href="css/buslist-style.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/header-design.css">
        <link rel="stylesheet" href="css/footer-design.css">
        
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

        <script>
            $(document).ready(function () {
                $("#opt").click(function () {
                    if($("#opt-up-1").is(":hidden") && $("#opt-down-1").is(":hidden")) {
                        $("#opt-sort-1").hide();
                        $("#opt-up-1").show();
                    }else{
                        $("#opt-up-1").toggle();
                        $("#opt-down-1").toggle();
                    }
                });
                $("#ctype").click(function () {
                    if($("#opt-up-2").is(":hidden") && $("#opt-down-2").is(":hidden")) {
                        $("#opt-sort-2").hide();
                        $("#opt-up-2").show();
                    }else{
                        $("#opt-up-2").toggle();
                        $("#opt-down-2").toggle();
                    }
                });
                $("#savailable").click(function () {
                    if($("#opt-up-3").is(":hidden") && $("#opt-down-3").is(":hidden")) {
                        $("#opt-sort-3").hide();
                        $("#opt-up-3").show();
                    }else{
                        $("#opt-up-3").toggle();
                        $("#opt-down-3").toggle();
                    }
                });
                $("#fare").click(function () {
                    if($("#opt-up-4").is(":hidden") && $("#opt-down-4").is(":hidden")) {
                        $("#opt-sort-4").hide();
                        $("#opt-up-4").show();
                    }else{
                        $("#opt-up-4").toggle();
                        $("#opt-down-4").toggle();
                    }
                });
                $("#filter").click(function () {
                    $("#filter-list").toggle();
                });
            });
        </script>
        
    </head>
    <body>
        <div class="section">

            <div id="header">
                <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #120A2A; color: red;">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="home" style="color: white;"><span>
                        <i class="glyphicon glyphicon-home"></i></span>Online ticket booking</a>
                        </div>
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="home">Home</a></li>
                            <li><a href="#footer">Contact</a></li>
                            <li><a href="#footer">About</a></li>
                            <li><a href="#operator-container">Operators</a></li>
                            <li><a href="#operator-container">Routes</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            @if(\Illuminate\Support\Facades\Session::has('username'))
                                @php $username=Session::get('username');@endphp
                                <li><a href="{{url('user/'.$username)}}"><span style="margin-right: 8px;"><i class="fas fa-user-tie"></i>{{\Illuminate\Support\Facades\Session::get('username')}}</span></a> </li>
                                <li><a href="logout"><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>
                            @else
                                <li><a href="user/create"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                                <li><a href="sign-in"><span class="glyphicon glyphicon-log-in"></span> Sign in</a></li>
                            @endif
                        </ul>
                    </div>
                </nav>
            </div>

            <div class="container" style="min-height: 500px;">


                <form method="post" action="search-buses-with-filter">
                    {{csrf_field()}}
                    <div id="search-option-container">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <span class="form-label">From</span>
                                    <select class="form-control" name="from">
                                        @foreach($places as $place)
                                            @foreach($place as $pl)
                                                @if($pl==$send_data->from)
                                                    <option selected>{{$pl}}</option>
                                                @else
                                                    <option>{{$pl}}</option>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </select>
                                    <span class="select-arrow"></span>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <span class="form-label">To</span>
                                    <select class="form-control" name="to">
                                        @foreach($places as $place)
                                            @foreach($place as $pl)
                                                @if($pl==$send_data->to)
                                                    <option selected>{{$pl}}</option>
                                                @else
                                                    <option>{{$pl}}</option>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </select>
                                    <span class="select-arrow"></span>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <span class="form-label">Type</span>
                                    <select class="form-control" name="type">
                                        <option>All</option>
                                        <option>AC</option>
                                        <option>Non-AC</option>
                                    </select>
                                    <span class="select-arrow"></span>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <span class="form-label">Enterprise</span>
                                    <select class="form-control" name="bus_name">
                                        <option>All</option>
                                        @foreach($buses as $bus)
                                            @foreach($bus as $pl)
                                                @if($pl==$send_data->bus)
                                                    <option selected>{{$pl}}</option>
                                                @else
                                                    <option>{{$pl}}</option>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </select>
                                    <span class="select-arrow"></span>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <span class="form-label">Departure Date</span>
                                    <input class="form-control" type="date" name="departure" value="{{$send_data->departure}}" required>
                                </div>
                            </div>
                            <div class="form-btn" style="margin-top: 20px;float: right;margin-right:80px;">
                                <button type="submit" class="btn btn-success" name="sendval" value="normal">Search</button>
                            </div>
                        </div>

                </div>

                    <div id="sort-option-container">
                        <div class="row">
                            <div class="col-sm-2"><p><span><i class="fas fa-sort"></i></span>Sort By</p></div>

                            <div class="col-sm-2" hidden><p id="filter">Filter  <span><i class="fas fa-sort-down"></i></span></p>
                                <div id="filter-list">
                                    <ul>
                                        <li>Bus Type</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-btn" style="margin-top: 10px;float: right;margin-right:80px;">
                                <button type="submit" class="btn btn-default" name="sendval" value="next">Next Day</button>
                            </div>
                            <div class="form-btn" style="margin-top: 10px;float: right;margin-right:20px;">
                                <button type="submit" class="btn btn-default" name="sendval" value="prev">Prev Day</button>
                            </div>

                        </div>
                    </div>
                </form>
                    
                <div id="table-container">
                    <table class="table" id="myTable">
                        <thead class="thead-dark">
                            <tr style="height: 60px;">
                                <th onclick="sortTable(0)"  id="opt" style="padding-bottom: 20px;">Enterprise Name
                                    <span id="opt-up-1" hidden><i class="fas fa-sort-up"></i></span>
                                    <span id="opt-sort-1"><i class="fas fa-sort"></i></span>
                                    <span id="opt-down-1" hidden><i class="fas fa-sort-down"></i></span></th>
                                <th style="padding-bottom: 20px;">Coach No</th>
                                <th style="padding-bottom: 20px;">Starting Counter</th>
                                <th onclick="sortTable(3)" id="ctype" style="padding-bottom: 20px;">Coach Type
                                    <span id="opt-up-2" hidden><i class="fas fa-sort-up"></i></span>
                                    <span id="opt-sort-2"><i class="fas fa-sort"></i></span>
                                    <span id="opt-down-2" hidden><i class="fas fa-sort-down"></i></span></th>
                                <th style="padding-bottom: 20px;">Departure Time</th>
                                <th style="padding-bottom: 20px;">Arrival Time</th>
                                <th onclick="sortTable(6)" id="savailable" style="padding-bottom: 20px;">Available Seats
                                    <span id="opt-up-3" hidden><i class="fas fa-sort-up"></i></span>
                                    <span id="opt-sort-3" ><i class="fas fa-sort"></i></span>
                                    <span id="opt-down-3" hidden><i class="fas fa-sort-down"></i></span></th>
                                <th onclick="sortTable(7)" id="fare" style="padding-bottom: 20px;">Fare (B/E)
                                    <span id="opt-up-4" hidden><i class="fas fa-sort-up"></i></span>
                                    <span id="opt-sort-4"><i class="fas fa-sort"></i></span>
                                    <span id="opt-down-4" hidden><i class="fas fa-sort-down"></i></span></th>
                                <th style="padding-bottom: 20px;">View</th>
                            </tr>
                        </thead>

                        @if(isset($searchdata))
                            @foreach($searchdata as $datarow)
                                <tbody>
                                @php $i=1 @endphp
                                @foreach($datarow as $data)
                                    @if($i==9)
                                        <td><a role="button" class="btn btn-success" href="{{url('seat-list-details',['id' => $data])}}">View seats</a></td>
                                    @else
                                        <td>{{$data}}</td>
                                    @endif
                                    @php $i=1+$i @endphp
                                @endforeach
                                </tbody>
                            @endforeach
                        @endif
                        <!--tbody>
                            <tr>
                                <td>Hanif Enterprise</td>
                                <td>300HE</td>
                                <td>Kallanpur AC Counter</td>
                                <td>Non-AC</td>
                                <td>11.00 PM</td>
                                <td>7.00 AM</td>
                                <td>30</td>
                                <td>500</td>
                                <td><a role="button" class="btn btn-success" href="{{url('seatlist/'.'1')}}">View seats</a></td>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr>
                                <td>Hanif Enterprise</td>
                                <td>300HE</td>
                                <td>Kallanpur AC Counter</td>
                                <td>Non-AC</td>
                                <td>11.00 PM</td>
                                <td>7.00 AM</td>
                                <td>30</td>
                                <td>500</td>
                                <td><button type="button" class="btn btn-success">View seats</button></td>
                            </tr>
                        </tbody-->
                        
                        
                    </table>
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

        <script>
            function sortTable(n) {
                var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
                table = document.getElementById("myTable");
                switching = true;
                //Set the sorting direction to ascending:
                dir = "asc";
                /*Make a loop that will continue until
                no switching has been done:*/
                while (switching) {
                    //start by saying: no switching is done:
                    switching = false;
                    rows = table.rows;
                    /*Loop through all table rows (except the
                    first, which contains table headers):*/
                    for (i = 1; i < (rows.length - 1); i++) {
                        //start by saying there should be no switching:
                        shouldSwitch = false;
                        /*Get the two elements you want to compare,
                        one from current row and one from the next:*/
                        x = rows[i].getElementsByTagName("TD")[n];
                        y = rows[i + 1].getElementsByTagName("TD")[n];
                        /*check if the two rows should switch place,
                        based on the direction, asc or desc:*/
                        if (dir == "asc") {
                            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                                //if so, mark as a switch and break the loop:
                                shouldSwitch= true;
                                break;
                            }
                        } else if (dir == "desc") {
                            if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                                //if so, mark as a switch and break the loop:
                                shouldSwitch = true;
                                break;
                            }
                        }
                    }
                    if (shouldSwitch) {
                        /*If a switch has been marked, make the switch
                        and mark that a switch has been done:*/
                        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                        switching = true;
                        //Each time a switch is done, increase this count by 1:
                        switchcount ++;
                    } else {
                        /*If no switching has been done AND the direction is "asc",
                        set the direction to "desc" and run the while loop again.*/
                        if (switchcount == 0 && dir == "asc") {
                            dir = "desc";
                            switching = true;
                        }
                    }
                }
            }
        </script>

    </body>
</html>
