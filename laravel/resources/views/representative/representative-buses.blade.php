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
    <link rel="stylesheet" href="../css/admin/add-bus-style.css">

    <!-- Google font -->
    <link rel="stylesheet" href="../css/google.font.">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css" />
    <!-- FontAwesome Styles-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />

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

        function set_width(columns) {
            var div = document.getElementById("preview-details-seat-view");
            if(columns==6){
                div.style.width = "96%";
                div.style.marginLeft = "2%";
            }
            else if(columns==5){
                div.style.width = "90%";
                div.style.marginLeft = "5%";
            }
            else if(columns==4){
                div.style.width = "80%";
                div.style.marginLeft = "10%";
            }
            else if(columns==3){
                div.style.width = "60%";
                div.style.marginLeft = "20%";
            }
            else if(columns==2){
                div.style.width = "60%";
                div.style.marginLeft = "20%";
            }
        }

        function showLayout(idxx,id) {
            var left = document.getElementById("preview-container-left");

            //rows  = parseInt(rows);
            //columns  = parseInt(columns);
            //total_seat  = parseInt(total_seat);
            //decker_num  = parseInt(decker_num);
            jQuery.ajax({
                type:'GET',
                url:'../get-bus-layout/'+id,
                data:'',
                async: false,
                success:function(data) {
                    var decker_num = data['decker'];
                    var rows = data['rows'];
                    var columns = data['columns'];

                    var bus_layout = data;
                    left.innerHTML = "<p><strong>Decker Number : &nbsp; </strong>" + decker_num + "</p>" +
                        "<p><strong>Rows : &nbsp; </strong>" + rows + "</p>" +
                        "<p><strong>Columns : &nbsp; </strong>" + columns + "</p>" ;

                    var right = document.getElementById("preview-details-seat-view");
                    // if( !isNaN(rows) && !isNaN(columns)){
                    set_width(columns);
                    var up = "<div id=\"preview-front-side\">\n" +
                        "                                <div class=\"row\">\n" +
                        "                                    <div class=\"col-sm-3 col-sm-offset-1\"><strong>Gate</strong></div>\n" +
                        "                                    <div class=\"col-sm-4 col-sm-offset-4\"><strong>Driver</strong></div>\n" +
                        "                                </div>\n" +
                        "                            </div>\n";

                    var idx,idx1;
                    for(idx=0; idx<rows; idx++){
                        up = up  + "<div id=\"preview-seat-view-group\">";
                        if(columns==4){
                            for(idx1=0; idx1<3; idx1++){
                                if(bus_layout[idx][idx1].localeCompare("_")){
                                    up = up + "<div class=\"col-sm-2\">" +
                                        "  <span><i class=\"fas fa-couch fa-2x\" style=\"color: #CCCCCB;\"></i></span></div>";
                                }
                            }
                            up = up + "<div class=\"col-sm-2\"><span></span></div>";
                            for(idx1=3; idx1<6; idx1++){
                                if(bus_layout[idx][idx1].localeCompare("_")){
                                    up = up + "<div class=\"col-sm-2\">" +
                                        "  <span><i class=\"fas fa-couch fa-2x\" style=\"color: #CCCCCB;\"></i></span></div>";
                                }
                            }
                        }
                        else if(columns==3){
                            for(idx1=0; idx1<3; idx1++){
                                if(bus_layout[idx][idx1].localeCompare("_")){
                                    up = up + "<div class=\"col-sm-3\">" +
                                        "  <span><i class=\"fas fa-couch fa-2x\" style=\"color: #CCCCCB;\"></i></span></div>";
                                }
                            }
                            up = up + "<div class=\"col-sm-2\"><span></span></div>";
                            for(idx1=3; idx1<6; idx1++){
                                if(bus_layout[idx][idx1].localeCompare("_")){
                                    up = up + "<div class=\"col-sm-3\">" +
                                        "  <span><i class=\"fas fa-couch fa-2x\" style=\"color: #CCCCCB;\"></i></span></div>";
                                }
                            }
                        }
                        up = up + "</div>";
                    }

                    right.innerHTML = up;

                    document.getElementById("preview-container").style.display = "block";
                },
                error:function(){
                    document.getElementById("t").innerText = 'error';
                }
            });
        }

        function cancel_preview() {
            document.getElementById("preview-container").style.display = "none";
        }
        /*
        function showLayout(idxx,id) {

            var chk=document.getElementById("layout-"+id);

            if(chk){

            }
            else{
                var tr=document.createElement("tr"); // row id -- a-row-i, p-row-i
                tr.setAttribute("id","layout-"+id);

                var td=document.createElement("td");
                td.colSpan=7;
                var p;//=document.createElement("p");
                var txt;//=document.createTextNode("Seat No : A1, Class : Business, Fare : 500 Tk");

                jQuery.ajax({
                    type:'GET',
                    url:'../get-bus-layout/'+id,
                    data:'',
                    async: false,
                    success:function(data)
                    {
                        document.getElementById("t").innerHTML = "testing";

                        var div = document.createElement("div");
                        div.setAttribute("id","bus-layout-tr");

                        var right = document.getElementById("preview-details-seat-view");
                        var columns = 3;
                        var rows = 9;
                        set_width(columns);
                        var up = "<div id=\"preview-front-side\">\n" +
                            "                                <div class=\"row\">\n" +
                            "                                    <div class=\"col-sm-3 col-sm-offset-1\"><strong>Gate</strong></div>\n" +
                            "                                    <div class=\"col-sm-4 col-sm-offset-4\"><strong>Driver</strong></div>\n" +
                            "                                </div>\n" +
                            "                            </div>\n";

                        var idx,idx1;
                        for(idx=0; idx<rows; idx++){
                            up = up  + "<div id=\"preview-seat-view-group\">";
                            if(columns==4){
                                for(idx1=0; idx1<3; idx1++){
                                    if(label[idx][idx1].localeCompare("X")){
                                        up = up + "<div class=\"col-sm-2\">" +
                                            "  <span><i class=\"fas fa-couch fa-2x\" style=\"color: #CCCCCB;\"></i></span></div>";
                                    }
                                }
                                up = up + "<div class=\"col-sm-2\"><span></span></div>";
                                for(idx1=3; idx1<6; idx1++){
                                    if(label[idx][idx1].localeCompare("X")){
                                        up = up + "<div class=\"col-sm-2\">" +
                                            "  <span><i class=\"fas fa-couch fa-2x\" style=\"color: #CCCCCB;\"></i></span></div>";
                                    }
                                }
                            }
                            else if(columns==3){
                                for(idx1=0; idx1<3; idx1++){
                                    if(label[idx][idx1].localeCompare("X")){
                                        up = up + "<div class=\"col-sm-3\">" +
                                            "  <span><i class=\"fas fa-couch fa-2x\" style=\"color: #CCCCCB;\"></i></span></div>";
                                    }
                                }
                                up = up + "<div class=\"col-sm-2\"><span></span></div>";
                                for(idx1=3; idx1<6; idx1++){
                                    if(label[idx][idx1].localeCompare("X")){
                                        up = up + "<div class=\"col-sm-3\">" +
                                            "  <span><i class=\"fas fa-couch fa-2x\" style=\"color: #CCCCCB;\"></i></span></div>";
                                    }
                                }
                            }
                            up = up + "</div>";
                        }

                        right.innerHTML = up;
                        div.appendChild(right);
                        td.appendChild(div);
                    },
                    error:function (data) {
                        document.getElementById("t").innerHTML = "error" +data;
                    }
                });

                var btn=document.createElement("button");
                btn.setAttribute("class","btn btn-default");
                btn.setAttribute("onclick","HideLayout("+id+")");
                txt=document.createTextNode("Hide");
                btn.appendChild(txt);

                td.appendChild(btn);
                tr.appendChild(td);
                jQuery("table #bus-"+idxx).after(tr);
            }

        }
         */
        function editBus(idx,id) {

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
<div id="t"></div>
    <div class="container" style="min-height: 500px;">


        <div id="search-option-container">
            <div class="row">
                <form method="post" action="../representative-buses-with-filter/{{
                    \Illuminate\Support\Facades\Session::get('rep-username')}}">
                        {{csrf_field()}}
                    <div class="col-sm-2">
                        <div class="form-group">
                            <span class="form-label">Type</span>
                            <select class="form-control" name="type">
                                <option>All</option>
                                <option>AC</option>
                                <option>non-AC</option>
                            </select>
                            <span class="select-arrow"></span>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="form-group">
                            <span class="form-label">Bus Status</span>
                            <select class="form-control" name="status">
                                <option>All</option>
                                <option>available</option>
                                <option>blocked</option>
                                <option>abandoned</option>
                            </select>
                            <span class="select-arrow"></span>
                        </div>
                    </div>

                    <div class="form-btn" style="margin-top: 20px;float: left;margin-left:20px;">
                        <button type="submit" class="btn btn-success" name="sendval" value="normal">Search</button>
                    </div>

                </form>
                <div class="form-btn" style="margin-top: 20px;float: right;margin-right:50px;">
                    <a href="../representative-add-buses/{{
                            \Illuminate\Support\Facades\Session::get('rep-username')}}">
                        <button class="btn btn-success" name="sendval" value="normal">New Bus</button></a>
                </div>
            </div>
        </div>

        <div id="sort-option-container" style="height: 10px;">
            <div class="row">
                <div class="col-sm-2" hidden><p><span><i class="fas fa-sort"></i></span>Sort By</p></div>

                <div class="col-sm-2" hidden><p id="filter">Filter  <span><i class="fas fa-sort-down"></i></span></p>
                    <div id="filter-list">
                        <ul>
                            <li>Bus Type</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

        <div id="table-container">
            <table class="table" id="myTable">
                <thead class="thead-dark">
                <tr style="height: 60px;">
                    <th style="padding-bottom: 20px;">Enterprise Name</th>
                    <th style="padding-bottom: 20px;">Coach No</th>
                    <th onclick="sortTable(2)" id="ctype" style="padding-bottom: 20px;">Coach Type
                        <span id="opt-up-2" hidden><i class="fas fa-sort-up"></i></span>
                        <span id="opt-sort-2"><i class="fas fa-sort"></i></span>
                        <span id="opt-down-2" hidden><i class="fas fa-sort-down"></i></span></th>
                    <th onclick="sortTable(3)" id="savailable" style="padding-bottom: 20px;">Total Seats
                        <span id="opt-up-3" hidden><i class="fas fa-sort-up"></i></span>
                        <span id="opt-sort-3" ><i class="fas fa-sort"></i></span>
                        <span id="opt-down-3" hidden><i class="fas fa-sort-down"></i></span></th>
                    <th onclick="sortTable(4)"  id="opt" style="padding-bottom: 20px;">Status
                        <span id="opt-up-1" hidden><i class="fas fa-sort-up"></i></span>
                        <span id="opt-sort-1"><i class="fas fa-sort"></i></span>
                        <span id="opt-down-1" hidden><i class="fas fa-sort-down"></i></span></th>
                    <th style="padding-bottom: 20px;">Bus Layout</th>
                    <th style="padding-bottom: 20px;">Edit</th>
                </tr>
                </thead>

                <tbody>
                @if(isset($buses))
                    @php $idx=1 @endphp
                    @foreach($buses as $datarow)
                        <tr id="bus-{{$idx}}">
                        @php $i=1 @endphp
                        @foreach($datarow as $data)
                            @if($i==6)
                                <td><button type="button" class="btn btn-default" onclick="showLayout({{$idx}},{{$data}})">
                                        View </button></td>
                            @elseif($i==7)
                                <td><button type="button" class="btn btn-default" onclick="editBus({{$idx}},{{$data}})">
                                        Edit </button></td>
                            @else
                                <td>{{$data}}</td>
                            @endif
                            @php $i=1+$i @endphp
                        @endforeach
                        </tr>
                        @php $idx=1+$idx @endphp
                    @endforeach
                @endif
                </tbody>
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

    <div id="preview-container">
        <div id="preview-container-top">
            <h3>Bus Layout</h3>
        </div>
        <div id="preview-container-middle">
            <div class="row">
                <div class="col-sm-6">
                    <div id="preview-container-left">
                        <h4>check</h4>
                    </div>
                </div>
                <div class="col-sm-6" style="border-left: 1px solid grey;">
                    <div id="preview-container-right">
                        <div id="preview-details-seat-view"> <!-- should be adjust -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="preview-container-bottom">
            <button type="button" class="btn btn-warning" style="margin-left: 100px;" onclick="cancel_preview()">Cancel</button>
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
