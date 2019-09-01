
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

        var layout,label;
        layout = new Array(10);
        label = new Array(10);
        var i,j;
        for(i=0;i<10;i++){
            label[i] = new Array(6);
            layout[i] = new Array(6);
            for(j=0;j<6;j++){
                layout[i][j] = '_';
                label[i][j] = 'X' ;
            }
        }
        function select_seat(i,j) {
            //jQuery("#id-"+i+"-"+j).append("<div class='add-label-container'>hello</div>");
            var hval = document.getElementById("row-column-label").innerText;
            var str = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            if(hval.localeCompare("Click the seat of the first row and column")==0){
                var rlabel = document.getElementById("row-col-label").value;
                var row = document.getElementById("rows").value;
                var column = document.getElementById("columns").value;
                row = parseInt(row);
                column = parseInt(column);
                var m;
                var n;
                if(i != 0 ){ alert("Please select a seat from first row.");}
                else if((j+column) > 6){alert("Please select a seat from previous columns.");}
                else if( isNaN(row) || isNaN(column)){alert("Please insert number of rows and columns.");}
                else{
                    if (rlabel.localeCompare("Label by rows") == 0) {
                        for(m=0; m<row; m++){
                            for(n=j; n<(column+j); n++){
                                var l = n-j+1;
                                label[m][n] = str.charAt(m)+l.toString(10);
                                layout[m][n] = "Economy";
                                document.getElementById(m+"-"+n).style.color = "forestgreen";
                            }
                        }
                    } else {
                        for(m=j; m<column+j; m++){
                            for(n=i; n<row+i; n++){
                                var l = toString(n-i+1);
                                layout[m][n] = str.charAt(m-j)+l;
                                label[m][n] = "Economy";
                                document.getElementById(n+"-"+m).style.color = "forestgreen";
                            }
                        }
                    }
                    document.getElementById("row-column-label").innerText = "Edit seat";
                    document.getElementById("layout-input").value = JSON.stringify(layout);
                    document.getElementById("label-input").value = JSON.stringify(label);
                }
            }
            else {
                var div = document.createElement("row");
                //div.setAttribute("class", "add-label-container");
                div.setAttribute("id", "selected-seat");

                var innerhtml =
                    "<div class='col-sm-3'>" +
                    "<div class='form-group'>" +
                    "<span class='form-label'>Label</span>" +
                    "<input class='form-control' name='label' id='label' value='"+label[i][j]+"'> " +
                    "</div>" +
                    "</div>" +
                    "<div class='col-sm-3'>" +
                    "<div class='form-group'>" +
                    "<span class='form-label'>Category</span>" +
                    "<select class='form-control' name='category' id='category'>" ;
                    if(layout[i][j].localeCompare("Economy")==0){
                        innerhtml = innerhtml + "<option>Economy</option>" +
                            "<option>Business</option>" ;
                    }
                    else{
                        innerhtml = innerhtml + "<option>Business</option>" +
                            "<option>Economy</option>" ;
                    }
                    innerhtml = innerhtml +    "</select>" +
                    "</div>" +
                    "</div>" +
                    "<div class='col-sm-2'>" +
                    "<div class='form-group'>" +
                    "<button class='form-control input-3 btn-success' type='button' onclick='add_seat(" + i + "," + j + ")'>" +
                    "Add </button>" +
                    "</div>" +
                    "</div>" +
                    "<div class='col-sm-2'>" +
                    "<div class='form-group'>" +
                    "<button class='form-control input-3 btn-success' type='button' onclick='remove_seat(" + i + "," + j + ")'>" +
                    "Remove </button>" +
                    "</div>" +
                    "</div>" +
                    "<div class='col-sm-2'>" +
                    "<div class='form-group'>" +
                    "<button class='form-control input-3 btn-warning' type='button' style='margin-left: -10px;' onclick='cancel_seat()'>" +
                    "Cancel </button>" +
                    "</div>" +
                    "</div>";

                div.innerHTML = innerhtml;

                //div.appendChild(row);
                var add_div = document.getElementById("add-label-container");
                add_div.appendChild(div);
                add_div.style.display = "block";
            }
       /*     else{

                alert("Seat has been removed from list");
            } */

        }
        function remove_seat(i,j) {
            label[i][j] = "X";
            layout[i][j] = "_";
            document.getElementById(i+"-"+j).style.color = "#CCCCCB";
            document.getElementById("layout-input").value = JSON.stringify(layout);
            document.getElementById("label-input").value = JSON.stringify(label);

            var div = document.getElementById("selected-seat");
            div.parentNode.removeChild(div);
            document.getElementById("add-label-container").style.display = "none";
        }

        function add_seat(i,j) {
            //alert("hello");
            var row = document.getElementById("rows").value;
            row = parseInt(row);
            if(i<row) {
                var category = document.getElementById("category").value;
                layout[i][j] = category;
                var lab = document.getElementById("label").value;
                label[i][j] = lab;

                var div = document.getElementById("selected-seat");
                div.parentNode.removeChild(div);
                document.getElementById("add-label-container").style.display = "none";

                if (category.localeCompare("Economy")==0)
                    document.getElementById(i + "-" + j).style.color = "forestgreen";
                else {
                    document.getElementById(i + "-" + j).style.color = "#33D1FF";
                }

                document.getElementById("layout-input").value = JSON.stringify(layout);
                document.getElementById("label-input").value = JSON.stringify(label);
            }
            else {
                alert("You can't add this seat.");
            }

        }
        function cancel_seat() {
            var div = document.getElementById("selected-seat");
            div.parentNode.removeChild(div);
            document.getElementById("add-label-container").style.display = "none";
        }

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
        function show_preview() {
            var left = document.getElementById("preview-container-left");
            var operator = document.getElementById("bus_name").value;
            var type = document.getElementById("type").value;
            var coach_no = document.getElementById("coach_no").value;
            var total_seat = document.getElementById("total_seat").value;
            var decker_num = document.getElementById("decker_num").value;
            var rows = document.getElementById("rows").value;
            var columns = document.getElementById("columns").value;

            rows  = parseInt(rows);
            columns  = parseInt(columns);
            total_seat  = parseInt(total_seat);
            decker_num  = parseInt(decker_num);

            left.innerHTML = "<p><strong>Operator : &nbsp; </strong>" + operator + "</p>" +
            "<p><strong>Bus Type : &nbsp; </strong>" + type + "</p>" +
            "<p><strong>Coach No : &nbsp; </strong>" + coach_no+ "</p>" +
            "<p><strong>Total Seats : &nbsp; </strong>" + total_seat + "</p>" +
            "<p><strong>Decker Number : &nbsp; </strong>" + decker_num + "</p>" +
            "<p><strong>Rows : &nbsp; </strong>" + rows + "</p>" +
            "<p><strong>Columns : &nbsp; </strong>" + columns + "</p>" ;

            var right = document.getElementById("preview-details-seat-view");
            if( !isNaN(rows) && !isNaN(columns)){
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
                    else if(columns==5){
                        for(idx1=0; idx1<3; idx1++){
                            if(label[idx][idx1].localeCompare("X")){
                                up = up + "<div class=\"col-sm-2\">" +
                                    "  <span><i class=\"fas fa-couch fa-2x\" style=\"color: #CCCCCB;\"></i></span></div>";
                            }
                        }
                        up = up + "<div class=\"col-sm-1\"><span></span></div>";
                        for(idx1=3; idx1<6; idx1++){
                            if(label[idx][idx1].localeCompare("X")){
                                up = up + "<div class=\"col-sm-2\">" +
                                    "  <span><i class=\"fas fa-couch fa-2x\" style=\"color: #CCCCCB;\"></i></span></div>";
                            }
                        }
                    }
                    else if(columns==6){
                        for(idx1=0; idx1<3; idx1++){
                            if(label[idx][idx1].localeCompare("X")){
                                up = up + "<div class=\"col-sm-2\">" +
                                    "  <span><i class=\"fas fa-couch fa-2x\" style=\"color: #CCCCCB;\"></i></span></div>";
                            }
                        }
                        //up = up + "<div class=\"col-sm-1\"><span></span></div>";
                        for(idx1=3; idx1<6; idx1++){
                            if(label[idx][idx1].localeCompare("X")){
                                up = up + "<div class=\"col-sm-2\">" +
                                    "  <span><i class=\"fas fa-couch fa-2x\" style=\"color: #CCCCCB;\"></i></span></div>";
                            }
                        }
                    }
                    up = up + "</div>";
                }

                right.innerHTML = up;

            }
            else{
                right.innerHTML = "<div id=\"preview-front-side\">\n" +
                    "                                <div class=\"row\">\n" +
                    "                                    <div class=\"col-sm-3 col-sm-offset-1\"><strong>Gate</strong></div>\n" +
                    "                                    <div class=\"col-sm-4 col-sm-offset-4\"><strong>Driver</strong></div>\n" +
                    "                                </div>\n" +
                    "                            </div>\n" ;
            }

            document.getElementById("preview-container").style.display = "block";
        }
        function cancel_preview() {
            document.getElementById("preview-container").style.display = "none";
        }

        function row_column_label() {
            var div = document.getElementById("row-column-label");

            var select = document.getElementById("row-col-label").value;

            if(select.localeCompare("Label by rows")==0)
                div.innerText = "Click the seat of the rows";
            else div.innerText = "Click the seat of the columns";
        }

        function resize_layout() {
            var value = document.getElementById("rows").value;

            var rows = layout.length;
            var temp1 = new Array(6);
            var temp2 = new Array(6);
            var seats = '';
            var i = 0;
            if(rows < value) {
                while (rows < value) {
                    seats = seats + "<div id='row-"+rows+"'><div id=\"seat-view-group\">\n" + "<div class=\"row\">\n";
                    for (i = 0; i < 6; i++) {
                        if (i == 2) {
                            seats = seats + "<div class='col-sm-2' id='id-" + rows + "-" + i + "'" +
                                " style='border-right: 2px dashed grey;'>" +
                                "<span class='hoverable' onclick='select_seat(" + rows + "," + i + ")'>\n" +
                                "<i class='fas fa-couch fa-2x' id='" + rows + "-" + i + "' style='color: #CCCCCB;'></i></span></div>";
                        } else {
                            seats = seats + "<div class='col-sm-2' id='id-" + rows + "-" + i + "'" +
                                "<span class='hoverable' onclick='select_seat(" + rows + "," + i + ")'>\n" +
                                "<i class='fas fa-couch fa-2x' id='" + rows + "-" + i + "' style='color: #CCCCCB;'></i></span></div>";
                        }
                        temp1[i] = "_";
                        temp2[i] = "X";
                    }
                    seats = seats + "</div></div></div>";
                    rows = rows + 1;
                    layout.push(temp1);
                    label.push(temp2);
                }
                var div = document.createElement("div");
                div.innerHTML = seats;
                document.getElementById("details-seat-view").appendChild(div);
            }
            else if(rows > value){
                while(rows > value){
                    if(rows <= 10)
                        break;
                    rows = rows - 1;
                    var temp = document.getElementById("row-"+rows);
                    temp.parentNode.removeChild(temp);
                    layout.pop();
                    label.pop();
                }
            }

        }

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
    <div>
        @if(isset($addMessage))
            <h2>{{$addMessage}}</h2>
        @endif
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new Bus</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="post" id="send-form" action="../representative-add-buses-preview/{{
                    \Illuminate\Support\Facades\Session::get('rep-username')}}">
                        {{ csrf_field() }}

                        <input type="text" name="layout" id="layout-input" hidden>
                        <input type="text" name="label" id="label-input" hidden>

                        <div class="form-group{{ $errors->has('bus_name') ? ' has-error' : '' }}">
                            <label for="bus_name" class="col-md-4 control-label">Operator Name</label>

                            <div class="col-md-6">
                                <select id="bus_name" class="form-control" name="bus_name">
                                    <option>{{$bus_name}}</option>
                                </select>

                                @if ($errors->has('bus_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bus_name') }}</strong>
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

                        <div class="form-group{{ $errors->has('total_seat') ? ' has-error' : '' }}">
                            <label for="total_seat" class="col-md-4 control-label">Total Seat</label>

                            <div class="col-md-6">
                                <input id="total_seat" type="number" class="form-control" name="total_seat" value="{{ old('total_seat') }}" required>

                                @if ($errors->has('total_seat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('total_seat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <h5 id="bus-layout"><strong>Bus Layout</strong> &nbsp;
                                    <span id="opt-up-1" hidden><i class="fas fa-sort-up"></i></span>
                                    <span id="opt-down-1"><i class="fas fa-sort-down"></i></span></h5>
                            </div>
                        </div>
                        <div id="bus-layout-bottom">

                            <div class="form-group{{ $errors->has('decker_num') ? ' has-error' : '' }}">
                                <label for="decker_num" class="col-md-4 control-label">Number of Decker</label>

                                <div class="col-md-6">
                                    <input id="decker_num" type="number" class="form-control" name="decker_num" value="{{ old('decker_num') }}" required>

                                    @if ($errors->has('decker_num'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('decker_num') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('rows') ? ' has-error' : '' }}">
                                <label for="rows" class="col-md-4 control-label">Rows</label>

                                <div class="col-md-6">
                                    <input id="rows" type="number" class="form-control" name="rows"
                                           oninput="resize_layout()" value="{{ old('rows') }}" required>

                                    @if ($errors->has('rows'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('rows') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('columns') ? ' has-error' : '' }}">
                                <label for="columns" class="col-md-4 control-label">Columns</label>

                                <div class="col-md-6">
                                    <input id="columns" type="number" class="form-control" name="columns" value="{{ old('columns') }}" required>

                                    @if ($errors->has('columns'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('columns') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <select id="row-col-label" class="form-control">
                                        <option>Label by rows</option>
                                        <option>Label by columns</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('bus_layout') ? ' has-error' : '' }}">
                                <label for="bus_layout" class="col-md-3 control-label">Layout</label>
                                <div class="col-md-8">

                                    <h4 id="row-column-label" style="text-align: center;color: forestgreen;">
                                        Click the seat of the first row and column</h4>

                                    <div id="details-seat-view" style="margin-left: 0%;width: 100%;">
                                        <div id="front-side"><div class="row">
                                                <div class="col-sm-3 col-sm-offset-1"><strong>Gate</strong></div>
                                                <div class="col-sm-4 col-sm-offset-4"><strong>Driver</strong></div> </div>
                                        </div>

                                        @for($i=0;$i<10;$i++)
                                            <div id="seat-view-group">
                                                <div class="row">
                                                    @for($j=0;$j<6;$j++)
                                                        @if($j==2)
                                                        <div class="col-sm-2" id="id-{{$i}}-{{$j}}" style="border-right: 2px dashed grey;">
                                                            <span class="hoverable" onclick="select_seat({{$i}} , {{$j}})">
                                                        <i class="fas fa-couch fa-2x" id="{{$i}}-{{$j}}" style="color: #CCCCCB;"></i></span></div>
                                                        @else
                                                         <div class="col-sm-2" id="id-{{$i}}-{{$j}}">
                                                             <span class="hoverable" onclick="select_seat({{$i}} , {{$j}})">
                                                        <i class="fas fa-couch fa-2x" id="{{$i}}-{{$j}}" style="color: #CCCCCB;"></i></span></div>
                                                         @endif
                                                    @endfor
                                                </div>
                                            </div>
                                        @endfor

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    @if ($errors->has('bus_layout'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('bus_layout') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="button" class="btn btn-primary" onclick="show_preview()">
                                    Preview
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="add-label-container"></div>
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
        <h3>Bus Layout Preview</h3>
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
        <button type="submit" class="btn btn-success" form="send-form">Confirm</button>
    </div>
</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
