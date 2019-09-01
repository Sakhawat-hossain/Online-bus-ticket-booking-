<!DOCTYPE html>
<html lang="en">
    <head>
          <title>Bus details</title>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

        <link rel="stylesheet" href="../css/buslist-style.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/header-design.css">
        <link rel="stylesheet" href="../css/footer-design.css">
        
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

        <style>
            #edit-trip-container{
                width: 100%;
            }
        </style>
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
                $("#status").click(function () {
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

            function editTrip(idx,id) {
                var tr_id = document.getElementById("edit-trip-"+id);
                var tr_val = document.getElementById("myTable").rows[idx].cells;
                //alert();
                if(tr_id){

                }
                else{

                    var div = document.createElement("div");
                    div.setAttribute("id","edit-trip-container");
                    var username = <?php echo json_encode(Session::get('rep-username')); ?>

                        div.innerHTML = "<form method=\"post\" action='../representative-edit-trips/"+username+"/"+id+"'>" +
                        "<input name=\"_token\" value=\"{{ csrf_token() }}\" type=\"hidden\">" +
                        "<div class='row'>" +
                        "<div class='col-md-6 col-md-offset-3'>" +
                        "\n" +
                        "            <div class=\"panel panel-default\">\n" +
                        "                <div class=\"panel-heading\">Edit Trip Info</div>\n" +
                        "\n" +
                        "                <div class=\"panel-body\">" +"\n" +
                        "                        <div class=\"form-group{{ $errors->has('coach_no') ? ' has-error' : '' }}\">\n" +
                        "                            <label for=\"email\" class=\"col-md-4 control-label\" style=\"padding-top: 10px;\">Coach No</label>\n" +
                        "\n" +
                        "                            <div class=\"col-md-6\" style=\"padding-top: 10px;\">\n" +
                        "                                <input id=\"coach_no\" type=\"text\" class=\"form-control\" name=\"coach_no\" " +
                        "   value='"+ tr_val[3].innerText+"' required>\n" +
                        "\n" +
                        "                                @if ($errors->has('coach_no'))\n" +
                        "                                    <span class=\"help-block\">\n" +
                        "                                        <strong>{{ $errors->first('coach_no') }}</strong>\n" +
                        "                                    </span>\n" +
                        "                                @endif\n" +
                        "                            </div>\n" +
                        "                        </div>\n" +
                        "\n" +
                        "                        <div class=\"form-group{{ $errors->has('status') ? ' has-error' : '' }}\">\n" +
                        "                            <label for=\"status\" class=\"col-md-4 control-label\" style=\"padding-top: 10px;\">Status</label>\n" +
                        "\n" +
                        "                            <div class=\"col-md-6\" style=\"padding-top: 10px;\">\n" +
                        "<select id=\"status\" class=\"form-control\" name=\"status\">\n" +
                        "                                    <option>"+tr_val[8].innerText+"</option>\n" +
                        "                                    <option>available</option>\n" +
                        "                                    <option>done</option>\n" +
                        "                                    <option>cancelled</option>\n" +
                        "                                </select>\n" +
                        "\n" +
                        "                                @if ($errors->has('status'))\n" +
                        "                                    <span class=\"help-block\">\n" +
                        "                                        <strong>{{ $errors->first('status') }}</strong>\n" +
                        "                                    </span>\n" +
                        "                                @endif\n" +
                        "                            </div>\n" +
                        "                        </div>" +
                        "\n" +
                        "        <button type=\"button\" class=\"btn btn-warning\" style=\"margin-left: 50px;margin-top:15px;\" " +
                        "onclick=\"cancel_edit("+id+")\">Cancel</button>" +
                        "\n" +
                        "        <button type=\"submit\" class=\"btn btn-success\" style=\"margin-top: 15px;\">Submit</button>" +
                        "</div>" +
                        "</div>" +
                        "</div>" +
                        "</div>" +
                        "</div></form>";

                    var tr=document.createElement("tr"); // row id -- a-row-i, p-row-i
                    tr.setAttribute("id","edit-trip-"+id);
                    tr.style.textAlign="center";

                    var td=document.createElement("td");
                    td.colSpan=10;

                    td.appendChild(div);
                    tr.appendChild(td);
                    jQuery("table #trip-"+idx).after(tr);
                }
            }

            function cancel_edit(id) {
                var div = document.getElementById("edit-trip-"+id);
                div.parentNode.removeChild(div);
            }
        </script>
        
    </head>
    <body>
        <div class="section">

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
                                <li><a href="{{url('../representative/'.$username)}}"><span style="margin-right: 8px;"><i class="fas fa-user-tie"></i>
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


                <form method="post" action="search-trips-with-filter/{{
                    \Illuminate\Support\Facades\Session::get('rep-username')}}">
                    {{csrf_field()}}
                    <div id="search-option-container">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <span class="form-label">From</span>
                                    <select class="form-control" name="from">
                                        <option>All</option>
                                        @foreach($places as $place)
                                            @foreach($place as $pl)
                                                    <option>{{$pl}}</option>
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
                                        <option>All</option>
                                        @foreach($places as $place)
                                            @foreach($place as $pl)
                                                    <option>{{$pl}}</option>
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
                                    <span class="form-label">Departure Date</span>
                                    <input class="form-control" type="date" name="departure" >
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <span class="form-label">Type</span>
                                    <select class="form-control" name="status">
                                        <option>All</option>
                                        <option>available</option>
                                        <option>abandoned</option>
                                        <option>blocked</option>
                                    </select>
                                    <span class="select-arrow"></span>
                                </div>
                            </div>
                            <div class="form-btn" style="margin-top: 20px;float: right;margin-right:80px;">
                                <button type="submit" class="btn btn-success" name="sendval" value="normal">Search</button>
                            </div>
                        </div>

                </div>

                    <div id="sort-option-container">
                        <div class="row">
                            <div class="col-sm-3"><div class="row">
                                    <div class="col-sm-4" style="padding-top: 8px;">Filter By</div>
                                    <div class="col-sm-8" style="padding-top: 8px;margin-left: -20px;">
                                        <input type="text" name="coach_no" class="form-control" placeholder="Coach No"></div>
                                </div>
                            </div>

                            <div class="col-sm-3 col-sm-offset-1">
                                <h3>@if(isset($send_data)) {{$send_data->bus}} @endif</h3>
                            </div>
                            <div class="form-btn" style="margin-top: 10px;float: right;margin-right:80px;">
                                <a href="../representative-add-trips/{{\Illuminate\Support\Facades\Session::get('rep-username')}}">
                                    <button type="button" class="btn btn-success" >New Trip</button></a>
                            </div>
                            <div class="form-btn" style="margin-top: 10px;float: right;margin-right:40px;">
                                <button type="submit" class="btn btn-default" name="sendval" value="next">Next Day</button>
                            </div>
                            <div class="form-btn" style="margin-top: 10px;float: right;margin-right:10px;">
                                <button type="submit" class="btn btn-default" name="sendval" value="prev">Prev Day</button>
                            </div>

                        </div>
                    </div>
                </form>
                    
                <div id="table-container">
                    <table class="table" id="myTable">
                        <thead class="thead-dark">
                            <tr style="height: 60px;">
                                <th id="opt" style="padding-bottom: 20px;">From</th>
                                <th id="opt" style="padding-bottom: 20px;">To</th>
                                <th style="padding-bottom: 20px;">Starting Counter</th>
                                <th style="padding-bottom: 20px;">Coach No</th>
                                <th onclick="sortTable(4)" id="ctype" style="padding-bottom: 20px;">Coach Type
                                    <span id="opt-up-2" hidden><i class="fas fa-sort-up"></i></span>
                                    <span id="opt-sort-2"><i class="fas fa-sort"></i></span>
                                    <span id="opt-down-2" hidden><i class="fas fa-sort-down"></i></span></th>
                                <th style="padding-bottom: 20px;">Departure Date</th>
                                <th style="padding-bottom: 20px;">Departure Time</th>
                                <th onclick="sortTable(7)" id="fare" style="padding-bottom: 20px;">Fare (B/E)
                                    <span id="opt-up-4" hidden><i class="fas fa-sort-up"></i></span>
                                    <span id="opt-sort-4"><i class="fas fa-sort"></i></span>
                                    <span id="opt-down-4" hidden><i class="fas fa-sort-down"></i></span></th>
                                <th onclick="sortTable(8)" id="status" style="padding-bottom: 20px;">Status
                                    <span id="opt-up-3" hidden><i class="fas fa-sort-up"></i></span>
                                    <span id="opt-sort-3"><i class="fas fa-sort"></i></span>
                                    <span id="opt-down-3" hidden><i class="fas fa-sort-down"></i></span></th>
                            </tr>
                        </thead>

                        @if(isset($searchdata))
                            <tbody>
                            @php $idx=1 @endphp
                            @foreach($searchdata as $datarow)
                                @php $i=1 @endphp
                                <tr id="trip-{{$idx}}">
                                @foreach($datarow as $data)
                                    @if($i==10)
                                        <td><button type="button" class="btn btn-default" onclick=
                                            "editTrip({{$idx}},{{$data}})">Edit </button></td>
                                    @else
                                        <td>{{$data}}</td>
                                    @endif
                                    @php $i=1+$i @endphp
                                @endforeach
                                </tr>
                                @php $idx=1+$idx @endphp
                            @endforeach
                            </tbody>
                        @endif
                        
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
