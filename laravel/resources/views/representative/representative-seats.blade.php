
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Representative home</title>

    <!-- Google font -->
    <link rel="stylesheet" href="../css/google.font.">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Latest compiled and minified CSS -->
    <!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"-->



    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="../css/footer-design.css" />
    <link type="text/css" rel="stylesheet"  href="../css/header-design.css"/>
    <link rel="stylesheet" href="../css/seat-list-style.css">
    <link rel="stylesheet" href="../css/admin/add-bus-style.css">
    <!-- Custom Styles-->
    <link href="../assets/css/custom-styles.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />

    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>

    </style>

    <script>

        history.pushState(null, null, document.URL);
        window.addEventListener('popstate', function () {
            history.pushState(null, null, document.URL);
        });

        var layout,label;
        layout = new Array(15);
        label = new Array(15);
        var i,j;
        for(i=0;i<15;i++){
            label[i] = new Array(6);
            layout[i] = new Array(6);
            for(j=0;j<6;j++){
                layout[i][j] = '_';
                label[i][j] = 'X' ;
            }
        }

        function set_width(columns) {
            var div = document.getElementById("details-seat-view");
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
                div.style.width = "66%";
                div.style.marginLeft = "17%";
            }
            else if(columns==2){
                div.style.width = "60%";
                div.style.marginLeft = "20%";
            }
        }

        function initialization(layout) {

            //alert('hello');

            //document.getElementById("pp").innerHTML=username+tripID;

            var decker_num = layout['decker'];
            var rows = layout['rows'];
            var columns = layout['columns'];

            var bus_layout = layout;

            var right = document.getElementById("details-seat-view");
            // if( !isNaN(rows) && !isNaN(columns)){
            set_width(columns);
            var up = "<div id=\"front-side\">\n" +
                "                                <div class=\"row\">\n" +
                "                                    <div class=\"col-sm-3 col-sm-offset-1\"><strong>Gate</strong></div>\n" +
                "                                    <div class=\"col-sm-4 col-sm-offset-4\"><strong>Driver</strong></div>\n" +
                "                                </div>\n" +
                "                            </div>\n";

            var pos=0;
            var idx,idx1;
            for(idx=0; idx<rows; idx++){
                up = up  + "<div id=\"seat-view-group\">";
                if(columns==4){
                    for(idx1=0; idx1<3; idx1++){
                        if(bus_layout[idx][idx1].localeCompare("Economy")==0){
                            up = up + "<div class=\"col-sm-2\">" +
                                "  <span onclick='select_seat("+pos+")'><i id="+pos+" class=\"fas fa-couch fa-2x\" " +
                                "style=\"color: #CCCCCB;\"></i></span></div>";
                        }
                        else if(bus_layout[idx][idx1].localeCompare("Business")==0){
                            up = up + "<div class=\"col-sm-2\">" +
                                "  <span onclick='select_seat("+pos+")'><i id="+pos+" class=\"fas fa-couch fa-2x\" " +
                                "style=\"color: #4b88a6;\"></i></span></div>";
                        }
                        else if(bus_layout[idx][idx1].localeCompare("Blocked")==0){
                            up = up + "<div class=\"col-sm-2\">" +
                                "  <span onclick='select_seat("+pos+")'><i id="+pos+" class=\"fas fa-couch fa-2x\" " +
                                "style=\"color: #3c3c3c;\"></i></span></div>";
                        }
                    }
                    up = up + "<div class=\"col-sm-2\"><span></span></div>";
                    for(idx1=3; idx1<6; idx1++){
                        if(bus_layout[idx][idx1].localeCompare("Economy")==0){
                            up = up + "<div class=\"col-sm-2\">" +
                                "  <span onclick='select_seat("+pos+")'><i id="+pos+" class=\"fas fa-couch fa-2x\" " +
                                "style=\"color: #CCCCCB;\"></i></span></div>";
                        }
                        else if(bus_layout[idx][idx1].localeCompare("Business")==0){
                            up = up + "<div class=\"col-sm-2\">" +
                                "  <span onclick='select_seat("+pos+")'><i id="+pos+" class=\"fas fa-couch fa-2x\" " +
                                "style=\"color: #4b88a6;\"></i></span></div>";
                        }
                        else if(bus_layout[idx][idx1].localeCompare("Blocked")==0){
                            up = up + "<div class=\"col-sm-2\">" +
                                "  <span onclick='select_seat("+pos+")'><i id="+pos+" class=\"fas fa-couch fa-2x\" " +
                                "style=\"color: #3c3c3c;\"></i></span></div>";
                        }
                    }
                }
                else if(columns==3){
                    for(idx1=0; idx1<3; idx1++){
                        if(bus_layout[idx][idx1].localeCompare("Economy")==0){
                            up = up + "<div class=\"col-sm-3\">" +
                                "  <span onclick='select_seat("+pos+")'><i id="+pos+" class=\"fas fa-couch fa-2x\" " +
                                "style=\"color: #CCCCCB;\"></i></span></div>";
                        }
                        else if(bus_layout[idx][idx1].localeCompare("Business")==0){
                            up = up + "<div class=\"col-sm-3\">" +
                                "  <span onclick='select_seat("+pos+")'><i id="+pos+" class=\"fas fa-couch fa-2x\" " +
                                "style=\"color: #4b88a6;\"></i></span></div>";
                        }
                        else if(bus_layout[idx][idx1].localeCompare("Blocked")==0){
                            up = up + "<div class=\"col-sm-3\">" +
                                "  <span onclick='select_seat("+pos+")'><i id="+pos+" class=\"fas fa-couch fa-2x\" " +
                                "style=\"color: #3c3c3c;\"></i></span></div>";
                        }
                    }
                    up = up + "<div class=\"col-sm-2\"><span></span></div>";
                    for(idx1=3; idx1<6; idx1++){
                        if(bus_layout[idx][idx1].localeCompare("Economy")==0){
                            up = up + "<div class=\"col-sm-3\">" +
                                "  <span onclick='select_seat("+pos+")'><i id="+pos+" class=\"fas fa-couch fa-2x\" " +
                                "style=\"color: #CCCCCB;\"></i></span></div>";
                        }
                        else if(bus_layout[idx][idx1].localeCompare("Business")==0){
                            up = up + "<div class=\"col-sm-3\">" +
                                "  <span onclick='select_seat("+pos+")'><i id="+pos+" class=\"fas fa-couch fa-2x\" " +
                                "style=\"color: #4b88a6;\"></i></span></div>";
                        }
                        else if(bus_layout[idx][idx1].localeCompare("Blocked")==0){
                            up = up + "<div class=\"col-sm-3\">" +
                                "  <span onclick='select_seat("+pos+")'><i id="+pos+" class=\"fas fa-couch fa-2x\" " +
                                "style=\"color: #3c3c3c;\"></i></span></div>";
                        }
                    }
                }
                else if(columns==5){
                    for(idx1=0; idx1<3; idx1++){
                        if(bus_layout[idx][idx1].localeCompare("Economy")==0){
                            up = up + "<div class=\"col-sm-2\">" +
                                "  <span onclick='select_seat("+pos+")'><i id="+pos+" class=\"fas fa-couch fa-2x\" " +
                                "style=\"color: #CCCCCB;\"></i></span></div>";
                        }
                        else if(bus_layout[idx][idx1].localeCompare("Business")==0){
                            up = up + "<div class=\"col-sm-2\">" +
                                "  <span onclick='select_seat("+pos+")'><i id="+pos+" class=\"fas fa-couch fa-2x\" " +
                                "style=\"color: #4b88a6;\"></i></span></div>";
                        }
                        else if(bus_layout[idx][idx1].localeCompare("Blocked")==0){
                            up = up + "<div class=\"col-sm-2\">" +
                                "  <span onclick='select_seat("+pos+")'><i id="+pos+" class=\"fas fa-couch fa-2x\" " +
                                "style=\"color: #3c3c3c;\"></i></span></div>";
                        }
                    }
                    up = up + "<div class=\"col-sm-1\"><span></span></div>";
                    for(idx1=3; idx1<6; idx1++){
                        if(bus_layout[idx][idx1].localeCompare("Economy")==0){
                            up = up + "<div class=\"col-sm-2\">" +
                                "  <span onclick='select_seat("+pos+")'><i id="+pos+" class=\"fas fa-couch fa-2x\" " +
                                "style=\"color: #CCCCCB;\"></i></span></div>";
                        }
                        else if(bus_layout[idx][idx1].localeCompare("Business")==0){
                            up = up + "<div class=\"col-sm-2\">" +
                                "  <span onclick='select_seat("+pos+")'><i id="+pos+" class=\"fas fa-couch fa-2x\" " +
                                "style=\"color: #4b88a6;\"></i></span></div>";
                        }
                        else if(bus_layout[idx][idx1].localeCompare("Blocked")==0){
                            up = up + "<div class=\"col-sm-2\">" +
                                "  <span onclick='select_seat("+pos+")'><i id="+pos+" class=\"fas fa-couch fa-2x\" " +
                                "style=\"color: #3c3c3c;\"></i></span></div>";
                        }
                    }
                }
                else if(columns==6){
                    for(idx1=0; idx1<3; idx1++){
                        if(bus_layout[idx][idx1].localeCompare("Economy")==0){
                            up = up + "<div class=\"col-sm-2\">" +
                                "  <span onclick='select_seat("+pos+")'><i id="+pos+" class=\"fas fa-couch fa-2x\" " +
                                "style=\"color: #CCCCCB;\"></i></span></div>";
                        }
                        else if(bus_layout[idx][idx1].localeCompare("Business")==0){
                            up = up + "<div class=\"col-sm-2\">" +
                                "  <span onclick='select_seat("+pos+")'><i id="+pos+" class=\"fas fa-couch fa-2x\" " +
                                "style=\"color: #4b88a6;\"></i></span></div>";
                        }
                        else if(bus_layout[idx][idx1].localeCompare("Blocked")==0){
                            up = up + "<div class=\"col-sm-2\">" +
                                "  <span onclick='select_seat("+pos+")'><i id="+pos+" class=\"fas fa-couch fa-2x\" " +
                                "style=\"color: #3c3c3c;\"></i></span></div>";
                        }
                    }
                    for(idx1=3; idx1<6; idx1++){
                        if(bus_layout[idx][idx1].localeCompare("Economy")==0){
                            up = up + "<div class=\"col-sm-2\">" +
                                "  <span onclick='select_seat("+pos+")'><i id="+pos+" class=\"fas fa-couch fa-2x\" " +
                                "style=\"color: #CCCCCB;\"></i></span></div>";
                        }
                        else if(bus_layout[idx][idx1].localeCompare("Business")==0){
                            up = up + "<div class=\"col-sm-2\">" +
                                "  <span onclick='select_seat("+pos+")'><i id="+pos+" class=\"fas fa-couch fa-2x\" " +
                                "style=\"color: #4b88a6;\"></i></span></div>";
                        }
                        else if(bus_layout[idx][idx1].localeCompare("Blocked")==0){
                            up = up + "<div class=\"col-sm-2\">" +
                                "  <span onclick='select_seat("+pos+")'><i id="+pos+" class=\"fas fa-couch fa-2x\" " +
                                "style=\"color: #3c3c3c;\"></i></span></div>";
                        }
                    }
                }
                else if(columns==2){
                    for(idx1=0; idx1<3; idx1++){
                        if(bus_layout[idx][idx1].localeCompare("Economy")==0){
                            up = up + "<div class=\"col-sm-4\">" +
                                "  <span onclick='select_seat("+pos+")'><i id="+pos+" class=\"fas fa-couch fa-2x\" " +
                                "style=\"color: #CCCCCB;\"></i></span></div>";
                        }
                        else if(bus_layout[idx][idx1].localeCompare("Business")==0){
                            up = up + "<div class=\"col-sm-4\">" +
                                "  <span onclick='select_seat("+pos+")'><i id="+pos+" class=\"fas fa-couch fa-2x\" " +
                                "style=\"color: #4b88a6;\"></i></span></div>";
                        }
                        else if(bus_layout[idx][idx1].localeCompare("Blocked")==0){
                            up = up + "<div class=\"col-sm-4\">" +
                                "  <span onclick='select_seat("+pos+")'><i id="+pos+" class=\"fas fa-couch fa-2x\" " +
                                "style=\"color: #3c3c3c;\"></i></span></div>";
                        }
                    }
                    up = up + "<div class=\"col-sm-3\"><span></span></div>";
                    for(idx1=3; idx1<6; idx1++){
                        if(bus_layout[idx][idx1].localeCompare("Economy")==0){
                            up = up + "<div class=\"col-sm-4\">" +
                                "  <span onclick='select_seat("+pos+")'><i id="+pos+" class=\"fas fa-couch fa-2x\" " +
                                "style=\"color: #CCCCCB;\"></i></span></div>";
                        }
                        else if(bus_layout[idx][idx1].localeCompare("Business")==0){
                            up = up + "<div class=\"col-sm-4\">" +
                                "  <span onclick='select_seat("+pos+")'><i id="+pos+" class=\"fas fa-couch fa-2x\" " +
                                "style=\"color: #4b88a6;\"></i></span></div>";
                        }
                        else if(bus_layout[idx][idx1].localeCompare("Blocked")==0){
                            up = up + "<div class=\"col-sm-4\">" +
                                "  <span onclick='select_seat("+pos+")'><i id="+pos+" class=\"fas fa-couch fa-2x\" " +
                                "style=\"color: #3c3c3c;\"></i></span></div>";
                        }
                    }
                }
                up = up + "</div>";
            }

            right.innerHTML = up;

            document.getElementById('seat-show').style.display = 'block';
        }

        function initialization_edit(data) {

            //alert('hello');

            //document.getElementById("pp").innerHTML=username+tripID;

            var decker_num = data['decker'];
            var rows = data['rows'];
            var columns = data['columns'];
            layout = data;

            var bus_layout = layout;

            var right = document.getElementById("details-seat-view-edit");
            // if( !isNaN(rows) && !isNaN(columns)){
            //set_width(columns);
            var up = "<div id=\"front-side\">\n" +
                "                                <div class=\"row\">\n" +
                "                                    <div class=\"col-sm-3 col-sm-offset-1\"><strong>Gate</strong></div>\n" +
                "                                    <div class=\"col-sm-4 col-sm-offset-4\"><strong>Driver</strong></div>\n" +
                "                                </div>\n" +
                "                            </div>\n";

            var pos=0;
            var idx,idx1;
            for(idx=0; idx<rows; idx++){
                up = up  + "<div id=\"seat-view-group\">";
                for(idx1=0; idx1<6; idx1++){
                    if(bus_layout[idx][idx1].localeCompare("Economy")==0){
                        up = up + "<div class=\"col-sm-2\" id=\"id-"+idx+"-"+idx1+">" +
                            "<span class=\"hoverable\" onclick=\"select_seat_edit("+idx+","+idx1+")\">\n" +
                            "<i class=\"fas fa-couch fa-2x\" id='"+idx+"-"+idx1+"' style=\"color: forestgreen;\">"+
                            "</i></span></div>";
                    }
                    else if(bus_layout[idx][idx1].localeCompare("Business")==0){
                        up = up + "<div class=\"col-sm-2\" id=\"id-"+idx+"-"+idx1+">" +
                            "<span class=\"hoverable\" onclick=\"select_seat_edit("+idx+","+idx1+")\">\n" +
                            "<i class=\"fas fa-couch fa-2x\" id='"+idx+"-"+idx1+"' style=\"color: #4b88a6;\">"+
                            "</i></span></div>";
                    }
                    else if(bus_layout[idx][idx1].localeCompare("Blocked")==0){
                        up = up + "<div class=\"col-sm-2\" id=\"id-"+idx+"-"+idx1+">" +
                            "<span class=\"hoverable\" onclick=\"select_seat_edit("+idx+","+idx1+")\">\n" +
                            "<i class=\"fas fa-couch fa-2x\" id='"+idx+"-"+idx1+"' style=\"color: #3c3c3c;\">"+
                            "</i></span></div>";
                    }
                    else{
                        up = up + "<div class=\"col-sm-2\" id=\"id-"+idx+"-"+idx1+">" +
                            "<span class=\"hoverable\" onclick=\"select_seat_edit("+idx+","+idx1+")\">\n" +
                            "<i class=\"fas fa-couch fa-2x\" id='"+idx+"-"+idx1+"' style=\"color: #CCCCCB;\">"+
                            "</i></span></div>";
                    }
                }
                up = up + "</div>";
            }

            right.innerHTML = up;
        }

        function  editLayout() {
            document.getElementById("seat-show").style.display = "none";
            document.getElementById("edit-layout").style.display = 'block';
        }

        function select_seat_edit(i,j) {
            //jQuery("#id-"+i+"-"+j).append("<div class='add-label-container'>hello</div>");
            //var hval = document.getElementById("row-column-label").innerText;
            var str = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                var div = document.createElement("row");
                //div.setAttribute("class", "add-label-container");
                div.setAttribute("id", "selected-seat");

                var innerhtml =
                    "<div class='col-sm-3'>" +
                    "<div class='form-group'>" +
                    "<span class='form-label'>Category</span>" +
                    "<select class='form-control' name='category' id='category'>" ;
                if(layout[i][j].localeCompare("Economy")==0){
                    innerhtml = innerhtml + "<option>Economy</option>" +
                        "<option>Business</option>" + "<option>Blocked</option>";
                }
                else if(layout[i][j].localeCompare("Business")==0){
                    innerhtml = innerhtml + "<option>Business</option>" +
                        "<option>Economy</option>" + "<option>Blocked</option>" ;
                }
                else{
                    innerhtml = innerhtml  + "<option>Blocked</option>" + "<option>Business</option>" +
                        "<option>Economy</option>" ;
                }
                innerhtml = innerhtml +    "</select>" +
                    "</div>" +
                    "</div>" +
                    "<div class='col-sm-3'>" +
                    "<div class='form-group'>" +
                    "<button class='form-control input-3 btn-success' type='button' onclick='add_seat(" + i + "," + j + ")'>" +
                    "Add </button>" +
                    "</div>" +
                    "</div>" +
                    "<div class='col-sm-3'>" +
                    "<div class='form-group'>" +
                    "<button class='form-control input-3 btn-success' type='button' onclick='remove_seat(" + i + "," + j + ")'>" +
                    "Remove </button>" +
                    "</div>" +
                    "</div>" +
                    "<div class='col-sm-3'>" +
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

            /*     else{

                     alert("Seat has been removed from list");
                 } */

        }
        function remove_seat(i,j) {
            label[i][j] = "X";
            layout[i][j] = "_";
            document.getElementById(i+"-"+j).style.color = "#CCCCCB";
            document.getElementById("layout-input").value = JSON.stringify(layout);

            var div = document.getElementById("selected-seat");
            div.parentNode.removeChild(div);
            document.getElementById("add-label-container").style.display = "none";
        }

        function add_seat(i,j) {
            //alert("hello");
            //var row = document.getElementById("rows").value;
            //row = parseInt(row);
            //if(i<row) {
                var category = document.getElementById("category").value;
                layout[i][j] = category;
                //var lab = document.getElementById("label").value;
                //label[i][j] = lab;

                var div = document.getElementById("selected-seat");
                div.parentNode.removeChild(div);
                document.getElementById("add-label-container").style.display = "none";

                if (category.localeCompare("Economy")==0)
                    document.getElementById(i + "-" + j).style.color = "forestgreen";
                else if (category.localeCompare("Business")==0) {
                    document.getElementById(i + "-" + j).style.color = "#4b88a6";
                }
                else
                    document.getElementById(i + "-" + j).style.color = "#3c3c3c";

                document.getElementById("layout-input").value = JSON.stringify(layout);
                //document.getElementById("label-input").value = JSON.stringify(label);
            //}

        }
        function cancel_seat() {
            var div = document.getElementById("selected-seat");
            div.parentNode.removeChild(div);
            document.getElementById("add-label-container").style.display = "none";
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


    </script>

</head>

<body>

<div id="header">
    <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #120A2A;">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="../representative-home" style="color: white;"><span>
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
                        <a class="navbar-brand" href="#" style="color: white;">Representative</a>
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

    <div id="wrapper" >

        <nav class="navbar-default navbar-side" role="navigation" style="height: content-box">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="../representative-home">
                            <i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="../representative-buses/{{\Illuminate\Support\Facades\Session::get('rep-username')}}">
                            <i class="fa fa-truck"></i>Buses</a>
                    </li>

                    <li style="background-color: forestgreen;margin-right: -10px;">
                        <a href="../representative-seats/{{\Illuminate\Support\Facades\Session::get('rep-username')}}">
                            <i class="fa fa-sitemap"></i>Seats</a>
                    </li>
                    <li>
                        <a href="../representative-availability/{{\Illuminate\Support\Facades\Session::get('rep-username')}}">
                            <i class="fa fa-check-circle"></i> Availability</a>
                    </li>
                    <li>
                        <a href="../representative-routes">
                            <i class="fa fa-road"></i> Routes</a>
                    </li>
                    <li>
                        <a href="../representative-trips/{{\Illuminate\Support\Facades\Session::get('rep-username')}}">
                            <i class="fa fa-road"></i> Trips</a>
                    </li>
                    <li>
                        <a href="../representative-places">
                            <i class="fa fa-map-marker"></i>Places</a>
                    </li>
                    <li>
                        <a href="../representative-reports/{{\Illuminate\Support\Facades\Session::get('rep-username')}}">
                            <i class="fa fa-list"></i> Reports</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Welcome  <small> {{\Illuminate\Support\Facades\Session::get('rep-username')}}</small>
                        </h1>
                    </div>
                </div>

                <div class="row">
                    <form class="form-horizontal" method="post" action="../representative-seats/{{
                    \Illuminate\Support\Facades\Session::get('rep-username')}}">
                        {{csrf_field()}}
                        <div class="form-group{{ $errors->has('coach_no') ? ' has-error' : '' }}">
                            <label for="coach_no" class="col-md-4 control-label">Coach No</label>

                            <div class="col-md-4">
                                <input id="coach_no" type="text" class="form-control" name="coach_no" value="{{ old('coach_no') }}" required>

                                @if ($errors->has('coach_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('coach_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-success">Search</button>
                        </div>
                    </form>
                </div>
                <!--row ends here-->

                <div class="row"  style="margin-top: 20px;">
                    <div class="col-sm-4 col-sm-offset-4" id="seat-show" style="display: none;">
                        <button type="button" class="btn btn-success" style="margin-left: 20px;"
                         onclick="editLayout()">Edit Layout</button>
                        <div id="details-seat-view"  style="margin-top: 10px;">

                        </div>
                    </div>

                    @if(isset($layout))
                        <script>
                            var data = <?php echo json_encode($layout) ?>;
                            initialization(data);
                        </script>
                    @endif
                </div>

                <div class="row">
                    <div class="form-group{{ $errors->has('bus_layout') ? ' has-error' : '' }}">
                        <label for="bus_layout" class="col-md-3 control-label"></label>
                        <div class="col-md-6" id="edit-layout" style="display: none;">


                            <div id="details-seat-view-edit" style="margin-left: 0%;width: 100%; border: 1px solid grey;">

                                @if(isset($layout))
                                    <script>
                                        var data = <?php echo json_encode($layout) ?>;
                                        initialization_edit(data);
                                    </script>
                                @endif
                            </div>
                            <form id="layout-edit" method="post" action="../representative-seats-edit/{{
                                \Illuminate\Support\Facades\Session::get('rep-username')}}">
                                {{csrf_field()}}
                                <input type="text" name="layout" id="layout-input" hidden>
                                <button type="submit" class="btn btn-success" style="margin-top: 15px;">
                                    Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /. PAGE INNER  -->                                <!-- /. ROW  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

@else

    <div class="container" style="min-height: 500px;">
        <h2 style="text-align: center;margin-top: 100px;">
            Please login first .........</h2>
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

<div id="add-label-container"></div>

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

