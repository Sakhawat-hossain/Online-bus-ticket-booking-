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
        function confirm_ticket(idx,id,empID) {
            //alert('Confirm ticket');
            jQuery.ajax({
                type:'GET',
                url:'update-ticket-status/active/'+id+"/"+empID,
                data:'',
                async:false,
                success:function(data) {
                    //jQuery("#pp").html("<p>"+data.seat_status+"</p>");
                    //seat_status=data.seat_status;
                },
                error:function() {
                    $("#pp").text("error-1");
                }
            });
            var tr_val = document.getElementById("myTable").rows[idx].cells;
            tr_val[5].innerHTML = 'active';
            tr_val[5].style.color = 'forestgreen';

            tr_val[7].innerHTML = '<button class="btn btn-primary" ' +
                'onclick="cancel_confirm('+idx+','+id+','+empID+')">Cancel</button>';
        }
        function cancel_confirm(idx,id,empID) {
            //alert('Cancel confirm');
            jQuery.ajax({
                type:'GET',
                url:'update-ticket-status/pending/'+id+"/"+empID,
                data:'',
                async:false,
                success:function(data) {
                    //jQuery("#pp").html("<p>"+data.seat_status+"</p>");
                    //seat_status=data.seat_status;
                },
                error:function() {
                    $("#pp").text("error-1");
                }
            });
            var tr_val = document.getElementById("myTable").rows[idx].cells;
            tr_val[5].innerHTML = 'pending';
            tr_val[5].style.color = 'brown';

            tr_val[7].innerHTML = '<button class="btn btn-success" ' +
                'onclick="confirm_ticket('+idx+','+id+','+empID+')">Confirm</button>';
        }
        function confirm_cancel(idx,id,empID) {
            //alert('Confirm ticket cancellation');
            jQuery.ajax({
                type:'GET',
                url:'update-ticket-status/cancelled/'+id+"/"+empID,
                data:'',
                async:false,
                success:function(data) {
                    //jQuery("#pp").html("<p>"+data.seat_status+"</p>");
                    //seat_status=data.seat_status;
                },
                error:function() {
                    $("#pp").text("error-1");
                }
            });
            var tr_val = document.getElementById("myTable").rows[idx].cells;
            tr_val[5].innerHTML = 'cancelled';
            tr_val[5].style.color = 'forestgreen';

            tr_val[7].innerHTML = '<button class="btn btn-primary" ' +
                'onclick="cancel_confirm_cancel('+idx+','+id+','+empID+')">Cancel</button>';
        }
        function cancel_confirm_cancel(idx,id,empID) {
            //alert('Cancel confirm');
            jQuery.ajax({
                type:'GET',
                url:'update-ticket-status/cancelling/'+id+"/"+empID,
                data:'',
                async:false,
                success:function(data) {
                    //jQuery("#pp").html("<p>"+data.seat_status+"</p>");
                    //seat_status=data.seat_status;
                },
                error:function() {
                    $("#pp").text("error-1");
                }
            });
            var tr_val = document.getElementById("myTable").rows[idx].cells;
            tr_val[5].innerHTML = 'cancelling';
            tr_val[5].style.color = 'brown';

            tr_val[7].innerHTML = '<button class="btn btn-success" ' +
                'onclick="confirm_cancel('+idx+','+id+','+empID+')">Confirm</button>';
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
                        <i class="glyphicon glyphicon-home"></i></span>Online bus booking</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="employee-home">Home</a></li>
                    <li><a href="#footer">About</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if(\Illuminate\Support\Facades\Session::has('employee-username'))
                        @php $username=Session::get('employee-username');@endphp
                        <li><a href="{{url('employee/'.$username)}}"><span style="margin-right: 8px;"><i class="fas fa-user-tie"></i>
                                    {{\Illuminate\Support\Facades\Session::get('employee-username')}}</span></a> </li>
                        <li><a href="employee-logout"><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>

                    @else
                        <li><a href="employee-sign-in"><span class="glyphicon glyphicon-user"></span> Sign in</a></li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
<div id="t"></div>
    <div class="container" style="min-height: 500px;">

    @if(\Illuminate\Support\Facades\Session::has('employee-username'))
        <form method="post" action="employee-search-ticket-with-filter">
            {{csrf_field()}}
            <div id="search-option-container">
                <div class="row">
                    <!--div class="col-sm-2">
                        <div class="form-group">
                            <span class="form-label">From</span>
                            <select class="form-control" name="from">

                            </select>
                            <span class="select-arrow"></span>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <span class="form-label">To</span>
                            <select class="form-control" name="to">

                            </select>
                            <span class="select-arrow"></span>
                        </div>
                    </div-->
                    <div class="col-sm-2">
                        <div class="form-group">
                            <span class="form-label">Transaction Id</span>
                            <input id="trxID" class="form-control" name="trxID" onkeyup="filterByTrxID()">
                            <span class="select-arrow"></span>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <span class="form-label">Booking Date</span>
                            <input id="booking_time" class="form-control" type="date" name="booking_time"
                                   oninput="filterByBooking()">
                        </div>
                    </div>
                    <div class="col-sm-2" hidden>
                        <div class="form-group">
                            <span class="form-label">Enterprise</span>
                            <select class="form-control" name="bus_name">
                                <option>All</option>
                                @foreach($buses as $bus)
                                    @foreach($bus as $b)

                                    <option>{{$b}}</option>

                                    @endforeach
                                @endforeach
                            </select>
                            <span class="select-arrow"></span>
                        </div>
                    </div>

                    @if($ticket_status == 'cancelling')
                    <div class="form-btn" style="margin-top: 20px;float: right;margin-right:80px;">
                        <button type="submit" class="btn btn-success" name="ticket_status" value="pending">Pending</button>
                    </div>
                    @else
                    <div class="form-btn" style="margin-top: 20px;float: right;margin-right:80px;">
                        <button type="submit" class="btn btn-success" name="ticket_status" value="cancelling">Cancelling</button>
                    </div>
                    @endif
                </div>

            </div>

            <div id="sort-option-container">
                <div class="row">
                    <div class="col-sm-2"></div>

                    <div class="col-sm-2" hidden><p id="filter">Filter  <span><i class="fas fa-sort-down"></i></span></p>
                        <div id="filter-list">
                            <ul>
                                <li>Bus Type</li>
                            </ul>
                        </div>
                    </div>
                    <!--div class="form-btn" style="margin-top: 10px;float: right;margin-right:80px;">
                        <button type="submit" class="btn btn-default" name="sendval" value="next">Next Day</button>
                    </div>
                    <div class="form-btn" style="margin-top: 10px;float: right;margin-right:20px;">
                        <button type="submit" class="btn btn-default" name="sendval" value="prev">Prev Day</button>
                    </div-->

                </div>
            </div>
        </form>

        <table class="table table-hover table-dark" id="myTable">
            <thead>
            <tr>
                <th scope="col">Username</th>
                <th scope="col">Mobile No</th>
                <th scope="col">Boarding point</th>
                <th scope="col">Booking Time</th>
                <th scope="col">Amount</th>
                <th scope="col">Status</th>
                <th scope="col">Trx ID</th>
                <th scope="col">Action</th>

            </tr>
            </thead>

            <tbody>

            @php $idx = 1; $id=\Illuminate\Support\Facades\Session::get("employeeID");@endphp
            @foreach ($tickets as $ticket)
                @php $j=0; $status=''; @endphp
                <tr id="{{$idx}}">
                    @foreach($ticket as $t)
                        @if($j==7)
                            <td>
                                @if($ticket_status == 'pending')
                                <button class="btn btn-success" onclick="confirm_ticket({{$idx}},{{$t}},{{$id}})">Confirm</button>
                                @else
                                    <button class="btn btn-success" onclick="confirm_cancel({{$idx}},{{$t}},{{$id}})">Confirm</button>
                                @endif
                            </td>
                        @elseif($j==5)
                        <td style="color: brown">{{$t}}</td>
                        @else
                            <td>{{$t}}</td>
                        @endif
                            @php $j= $j+1;@endphp
                     @endforeach
                </tr>
                @php $idx = $idx+1; @endphp
            @endforeach

            </tbody>
        </table>
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
    function filterByTrxID() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("trxID");
        filter = input.value;//.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[4];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.indexOf(filter) == 0) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
    function filterByBooking() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("booking_time");
        filter = input.value;//.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[3];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.indexOf(filter) == 0) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>


</body>
</html>