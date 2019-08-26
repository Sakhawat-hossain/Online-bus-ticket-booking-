<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Bus Booking System | Bookings</title>
		<!--link id="browser_favicon" rel="shortcut icon" href="resources/images/appgini-icon.png"-->

		<link rel="stylesheet" href="resources/initializr/css/paper.css">
		<link rel="stylesheet" href="resources/lightbox/css/lightbox.css" media="screen">
		<link rel="stylesheet" href="resources/select2/select2.css" media="screen">
		<link rel="stylesheet" href="resources/timepicker/bootstrap-timepicker.min.css" media="screen">
		<link rel="stylesheet" href="resources/datepicker/css/datepicker.css" media="screen">
		<link rel="stylesheet" href="resources/bootstrap-datetimepicker/bootstrap-datetimepicker.css" media="screen">
		<link rel="stylesheet" href="resources/dynamic.css.php">

		<!--[if lt IE 9]>
			<script src="resources/initializr/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		<![endif]-->
		<script src="resources/jquery/js/jquery-1.12.4.min.js"></script>
		<script>var $j = jQuery.noConflict();</script>
		<script src="resources/moment/moment-with-locales.min.js"></script>
		<script src="resources/jquery/js/jquery.mark.min.js"></script>
		<script src="resources/initializr/js/vendor/bootstrap.min.js"></script>
		<script src="resources/lightbox/js/prototype.js"></script>
		<script src="resources/lightbox/js/scriptaculous.js?load=effects"></script>
		<script src="resources/select2/select2.min.js"></script>
		<script src="resources/timepicker/bootstrap-timepicker.min.js"></script>
		<script src="resources/jscookie/js.cookie.js"></script>
		<script src="resources/datepicker/js/datepicker.packed.js"></script>
		<script src="resources/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
		<script src="common.js.php"></script>
		
	</head>
	<body>
		<div class="container theme-paper theme-compact">
			
									<nav class="navbar navbar-default navbar-fixed-top hidden-print" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- application title is obtained from the name besides the yellow database icon in AppGini, use underscores for spaces -->
				<a class="navbar-brand" href="admin"><i class="glyphicon glyphicon-home"></i> Bus Booking System</a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
															<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Jump to ... <b class="caret"></b></a>
					<ul class="dropdown-menu" role="menu"><li><a href="buses_view.php?t=1561875485"><img src="resources/table_icons/yellow_submarine.png" height="32"> Buses</a></li><li><a href="seats_view.php?t=1561875485"><img src="resources/table_icons/chair.png" height="32"> Seats</a></li><li><a href="availability_view.php?t=1561875485"><img src="resources/table_icons/accept.png" height="32"> Availability</a></li><li><a href="bookings_view.php?t=1561875485"><img src="resources/table_icons/accordion.png" height="32"> Bookings</a></li><li><a href="routes_view.php?t=1561875485"><img src="resources/table_icons/routing_go_right.png" height="32"> Routes</a></li><li><a href="customers_view.php?t=1561875485"><img src="resources/table_icons/account_balances.png" height="32"> Customers</a></li><li class="divider"></li><li><a href="hooks/summary-reports.php"><img src="hooks/summary_reports-logo-md.png" height="32"> Summary Reports</a></li></ul>
				</li>									</ul>

									<ul class="nav navbar-nav">
						<a href="admin/pageHome.php" class="btn btn-danger navbar-btn hidden-xs" title="Admin Area"><i class="glyphicon glyphicon-cog"></i> Admin Area</a>
						<a href="admin/pageHome.php" class="btn btn-danger navbar-btn visible-xs btn-lg" title="Admin Area"><i class="glyphicon glyphicon-cog"></i> Admin Area</a>
					</ul>
				
															<ul class="nav navbar-nav navbar-right hidden-xs" style="min-width: 330px;">
							<a class="btn navbar-btn btn-default" href="index.php?signOut=1"><i class="glyphicon glyphicon-log-out"></i> Sign Out</a>
							<p class="navbar-text">
								Signed in as <strong><a href="membership_profile.php" class="navbar-link">admin</a></strong>
							</p>
						</ul>
						<ul class="nav navbar-nav visible-xs">
							<a class="btn navbar-btn btn-default btn-lg visible-xs" href="index.php?signOut=1"><i class="glyphicon glyphicon-log-out"></i> Sign Out</a>
							<p class="navbar-text text-center">
								Signed in as <strong><a href="membership_profile.php" class="navbar-link">admin</a></strong>
							</p>
						</ul>
						<script>
							/* periodically check if user is still signed in */
							setInterval(function(){
								$j.ajax({
									url: 'ajax_check_login.php',
									success: function(username){
										if(!username.length) window.location = 'index.php?signIn=1';
									}
								});
							}, 60000);
						</script>
												</div>
		</nav>
						<div style="height: 70px;" class="hidden-print"></div>
			
			
			<div class="notifcation-placeholder" id="notifcation-placeholder-88472595"></div>
			<script>
				$j(function(){
					if(window.show_notification != undefined) return;

					window.show_notification = function(options){
						/* wait till all dependencies ready */
						if(window.notifications_ready == undefined){
							var op = options;
							setTimeout(function(){ /* */ show_notification(op); }, 20);
							return;
						}

						var dismiss_class = '';
						var dismiss_icon = '';
						var cookie_name = 'hide_notification_' + options.id;
						var notif_id = 'notifcation-' + Math.ceil(Math.random() * 1000000);

						/* apply provided notficiation id if unique in page */
						if(options.id != undefined){
							if(!$j('#' + options.id).length) notif_id = options.id;
						}

						/* notifcation should be hidden? */
						if(Cookies.get(cookie_name) != undefined) return;

						/* notification should be dismissable? */
						if(options.dismiss_seconds > 0 || options.dismiss_days > 0){
							dismiss_class = ' alert-dismissible';
							dismiss_icon = '<button type="button" class="close" data-dismiss="alert">&times;</button>';
						}

						/* remove old dismissed notficiations */
						$j('.alert-dismissible.invisible').remove();

						/* append notification to notifications container */
						$j(
							'<div class="alert alert-' + options['class'] + dismiss_class + '" id="' + notif_id + '">' + 
								dismiss_icon +
								options.message + 
							'</div>'
						).appendTo('#notifcation-placeholder-88472595');

						var this_notif = $j('#' + notif_id);

						/* dismiss after x seconds if requested */
						if(options.dismiss_seconds > 0){
							setTimeout(function(){ /* */ this_notif.addClass('invisible'); }, options.dismiss_seconds * 1000);
						}

						/* dismiss for x days if requested and user dismisses it */
						if(options.dismiss_days > 0){
							var ex_days = options.dismiss_days;
							this_notif.on('closed.bs.alert', function(){
								/* set a cookie not to show this alert for ex_days */
								Cookies.set(cookie_name, '1', { expires: ex_days });
							});
						}
					}

					/* cookies library already loaded? */
					if(undefined != window.Cookies){
						window.notifications_ready = true;
						return;
					}

					/* load cookies library */
					$j.ajax({
						url: 'resources/jscookie/js.cookie.js',
						dataType: 'script',
						cache: true,
						success: function(){ /* */ window.notifications_ready = true; }
					});
				})
			</script>

			
			<!-- process notifications -->
						<div style="height: 60px; margin: -15px 0 -45px;">
							</div>

						<!-- Add header template below here .. -->

<div class="row"><div class="col-xs-12"><form method="post" name="myform" action="bookings_view.php"><script>function enterAction(){   if($j("input[name=SearchString]:focus").length){ $j("#Search").click(); }   return false;}</script><input id="EnterAction" type="submit" style="position: absolute; left: 0px; top: -250px;" onclick="return enterAction();"><div class="page-header"><h1><div class="row"><div class="col-sm-8"><a style="text-decoration: none; color: inherit;" href="bookings_view.php"><img src="resources/table_icons/accordion.png"> Bookings</a></div><div class="col-sm-4">		<div class="input-group" id="quick-search">
			<input type="text" id="SearchString" name="SearchString" value="" class="form-control" placeholder="Quick Search">
			<span class="input-group-btn">
				<button name="Search_x" value="1" id="Search" type="submit" onClick="document.myform.SelectedID.value = ''; document.myform.NoDV.value=1; return true;" class="btn btn-default" title="Quick Search"><i class="glyphicon glyphicon-search"></i></button>
				<button name="ClearQuickSearch" value="1" id="ClearQuickSearch" type="submit" onClick="$j('#SearchString').val(''); document.myform.SelectedID.value = ''; document.myform.NoDV.value=1; return true;" class="btn btn-default" title="Show All"><i class="glyphicon glyphicon-remove-circle"></i></button>
			</span>
		</div></div></div></h1></div><div id="top_buttons" class="hidden-print"><div class="btn-group btn-group-lg visible-md visible-lg all_records pull-left"><button type="submit" id="addNew" name="addNew_x" value="1" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Add New</button><button onClick="document.myform.NoDV.value=1; document.myform.SelectedID.value = ''; return true;" type="submit" name="Filter_x" id="Filter" value="1" class="btn btn-default"><i class="glyphicon glyphicon-filter"></i> Filter</button><button onClick="document.myform.NoDV.value=1; document.myform.SelectedID.value = ''; return true;" type="submit" name="NoFilter_x" id="NoFilter" value="1" class="btn btn-default"><i class="glyphicon glyphicon-remove-circle"></i> Show All</button></div><div class="btn-group btn-group-lg visible-md visible-lg selected_records hidden pull-left hspacer-lg"><button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" id="selected_records_more"><i class="glyphicon glyphicon-check"></i> More <span class="caret"></span></button><ul class="dropdown-menu" role="menu"><li><a href="#" id="selected_records_print_multiple_dv_sdv"><span class=""><i class="glyphicon glyphicon-print"></i> Print Preview Detail View</span></a></li><li><a href="#" id="selected_records_mass_delete"><span class="text-danger"><i class="glyphicon glyphicon-trash"></i> Delete</span></a></li><li><a href="#" id="selected_records_mass_change_owner"><span class=""><i class="glyphicon glyphicon-user"></i> Change owner</span></a></li><li><a href="#" id="selected_records_add_more_actions_link"><span class="text-info"><i class="glyphicon glyphicon-question-sign"></i> Add more actions</span></a></li></ul></div><div class="btn-group-vertical btn-group-lg visible-xs visible-sm all_records"><button type="submit" id="addNew" name="addNew_x" value="1" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Add New</button><button onClick="document.myform.NoDV.value=1; document.myform.SelectedID.value = ''; return true;" type="submit" name="Print_x" id="Print" value="1" class="btn btn-default"><i class="glyphicon glyphicon-print"></i> Print Preview</button><button onClick="document.myform.NoDV.value=1; document.myform.SelectedID.value = ''; return true;" type="submit" name="CSV_x" id="CSV" value="1" class="btn btn-default"><i class="glyphicon glyphicon-download-alt"></i> Save CSV</button><button onClick="document.myform.NoDV.value=1; document.myform.SelectedID.value = ''; return true;" type="submit" name="Filter_x" id="Filter" value="1" class="btn btn-default"><i class="glyphicon glyphicon-filter"></i> Filter</button><button onClick="document.myform.NoDV.value=1; document.myform.SelectedID.value = ''; return true;" type="submit" name="NoFilter_x" id="NoFilter" value="1" class="btn btn-default"><i class="glyphicon glyphicon-remove-circle"></i> Show All</button></div><div class="btn-group-vertical btn-group-lg visible-xs visible-sm selected_records hidden vspacer-lg"><button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" id="selected_records_more"><i class="glyphicon glyphicon-check"></i> More <span class="caret"></span></button><ul class="dropdown-menu" role="menu"><li><a href="#" id="selected_records_print_multiple_dv_sdv"><span class=""><i class="glyphicon glyphicon-print"></i> Print Preview Detail View</span></a></li><li><a href="#" id="selected_records_mass_delete"><span class="text-danger"><i class="glyphicon glyphicon-trash"></i> Delete</span></a></li><li><a href="#" id="selected_records_mass_change_owner"><span class=""><i class="glyphicon glyphicon-user"></i> Change owner</span></a></li><li><a href="#" id="selected_records_add_more_actions_link"><span class="text-info"><i class="glyphicon glyphicon-question-sign"></i> Add more actions</span></a></li></ul></div>
					<div class="pull-right flip btn-group vspacer-md tv-tools">
				<button title="Hide/Show columns" type="button" class="btn btn-default tv-toggle" data-toggle="collapse" data-target="#toggle-columns-container"><i class="glyphicon glyphicon-align-justify rotate90"></i></button>
			</div>
		
		<div class="pull-right flip btn-group vspacer-md hspacer-md tv-tools">
			<button title="Previous column" type="button" class="btn btn-default tv-scroll" onclick="AppGini.TVScroll().less()"><i class="glyphicon glyphicon-step-backward"></i></button>
			<button title="Next column" type="button" class="btn btn-default tv-scroll" onclick="AppGini.TVScroll().more()"><i class="glyphicon glyphicon-step-forward"></i></button>
		</div>
		<div class="clearfix"></div>

					<div class="collapse" id="toggle-columns-container">
				<div class="well pull-right flip" style="width: 100%; max-width: 600px;">
					<div class="row" id="toggle-columns">
						<div class="col-md-12"><button type="button" class="btn btn-default btn-block" id="show-all-columns"><i class="glyphicon glyphicon-check"></i> Show All</button></div>
						<div class="col-md-12"><button type="button" class="btn btn-default btn-block" id="toggle-columns-collapser" data-toggle="collapse" data-target="#toggle-columns-container"><i class="glyphicon glyphicon-ok"></i> Ok</button></div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		
		<script>
			$j(function(){
				/**
				 *  @brief Saves/retrieves value of column toggle status
				 *  
				 *  @param [in] col_class class of column concerned
				 *  @param [in] val boolean, optional value to save.
				 *  @return column toggle status if no value is passed
				 */
				var col_cookie = function(col_class, val){
					if(col_class === undefined) return true;
					if(val !== undefined && val !== true && val !== false) val = true;

					var cn = 'columns-' + location.pathname.split(/\//).pop().split(/\./).shift(); // cookie name
					var op = { expires: 30, path: '' }; // cookie options
					var c = Cookies.getJSON(cn) || {};

					/* if no cookie, create it and set it to val (or true if no val) */
					if(c[col_class] === undefined){
						if(val === undefined) val = true;

						c[col_class] = val;
						Cookies.set(cn, c, op);
						return val;
					}

					/* if cookie found and val provided, set cookie to new val */
					if(val !== undefined){
						c[col_class] = val;
						Cookies.set(cn, c, op);
						return val;
					}

					/* if cookie found and no val, return cookie val */
					return c[col_class];
				}

				/**
				 *  @brief shows/hides column given its class, and saves this into cookies
				 *  
				 *  @param [in] col_class class of column to show/hide
				 *  @param [in] show boolean, optional. Set to false to hide. Default is true (to show).
				 */
				var show_column = function(col_class, show){
					if(col_class == undefined) return;
					if(show == undefined) show = true;

					if(show === false) $j('.' + col_class).hide();
					else $j('.' + col_class).show();

					AppGini.TVScroll().reset();

					col_cookie(col_class, show);
				}

				/* initiate TVScroll */
				AppGini.TVScroll().less();

							/* handle toggling columns' checkboxes */
				$j('#toggle-columns-container').on('click', 'input[type=checkbox]', function(){
					show_column($j(this).data('col'), $j(this).prop('checked'));
				});

				/* get TV columns and populate the #toggle-columns section */
				$j('.table_view th').each(function(){
					var th = $j(this);

					/* ignore the record selector column */
					if(th.find('#select_all_records').length > 0) return;

					var col_class = th.attr('class');
					var label = $j.trim(th.text());

					/* Add a toggler for the column in the #toggle-columns section */
					$j(
						'<div class="col-md-6"><div class="checkbox"><label>' +
							'<input type="checkbox" data-col="' + col_class + '" checked> ' + label +
						'</label></div></div>'
					).insertBefore('#toggle-columns-collapser');

					/* load saved column status */
					var col_status = col_cookie(col_class);
					if(col_status === false) $j('#toggle-columns input[type=checkbox]:last').trigger('click');
				});

				/* handle clicking 'show all [columns]' */
				$j('#show-all-columns').click(function(){
					$j('#toggle-columns input[type=checkbox]:not(:checked)').trigger('click');
				});
			
			})
		</script>
		<p></p></div><div class="row"><div class="table_view col-xs-12 "><script>jQuery(function(){ jQuery("input[name=SearchString]").focus();  jQuery('[id=selected_records_print_multiple_dv_sdv]').click(function(){ print_multiple_dv_sdv('bookings', get_selected_records_ids()); return false; });jQuery('[id=selected_records_mass_delete]').click(function(){ mass_delete('bookings', get_selected_records_ids()); return false; });jQuery('[id=selected_records_mass_change_owner]').click(function(){ mass_change_owner('bookings', get_selected_records_ids()); return false; });jQuery('[id=selected_records_add_more_actions_link]').click(function(){ add_more_actions_link('bookings', get_selected_records_ids()); return false; }); });</script><div class="table-responsive"><table class="table table-striped table-bordered table-hover"><thead><tr><th style="width: 18px;" class="text-center"><input class="hidden-print" type="checkbox" title="Select all records" id="select_all_records"></th>	<th class="bookings-id_number" ><a href="bookings_view.php?SortDirection=asc&SortField=2" onClick="document.myform.SelectedID.value = ''; document.myform.NoDV.value=1; document.myform.SortDirection.value='asc'; document.myform.SortField.value = '2'; document.myform.submit(); return false;" class="TableHeader">Id number</a></th>
	<th class="bookings-fullname" ><a href="bookings_view.php?SortDirection=asc&SortField=3" onClick="document.myform.SelectedID.value = ''; document.myform.NoDV.value=1; document.myform.SortDirection.value='asc'; document.myform.SortField.value = '3'; document.myform.submit(); return false;" class="TableHeader">Fullname</a></th>
	<th class="bookings-phone" ><a href="bookings_view.php?SortDirection=asc&SortField=4" onClick="document.myform.SelectedID.value = ''; document.myform.NoDV.value=1; document.myform.SortDirection.value='asc'; document.myform.SortField.value = '4'; document.myform.submit(); return false;" class="TableHeader">Phone</a></th>
	<th class="bookings-bus" ><a href="bookings_view.php?SortDirection=asc&SortField=5" onClick="document.myform.SelectedID.value = ''; document.myform.NoDV.value=1; document.myform.SortDirection.value='asc'; document.myform.SortField.value = '5'; document.myform.submit(); return false;" class="TableHeader">Bus</a></th>
	<th class="bookings-seat" ><a href="bookings_view.php?SortDirection=asc&SortField=6" onClick="document.myform.SelectedID.value = ''; document.myform.NoDV.value=1; document.myform.SortDirection.value='asc'; document.myform.SortField.value = '6'; document.myform.submit(); return false;" class="TableHeader">Seat</a></th>
	<th class="bookings-amount" ><a href="bookings_view.php?SortDirection=asc&SortField=7" onClick="document.myform.SelectedID.value = ''; document.myform.NoDV.value=1; document.myform.SortDirection.value='asc'; document.myform.SortField.value = '7'; document.myform.submit(); return false;" class="TableHeader">Amount</a></th>
	<th class="bookings-date" ><a href="bookings_view.php?SortDirection=asc&SortField=8" onClick="document.myform.SelectedID.value = ''; document.myform.NoDV.value=1; document.myform.SortDirection.value='asc'; document.myform.SortField.value = '8'; document.myform.submit(); return false;" class="TableHeader">Date</a></th>
	<th class="bookings-time" ><a href="bookings_view.php?SortDirection=asc&SortField=9" onClick="document.myform.SelectedID.value = ''; document.myform.NoDV.value=1; document.myform.SortDirection.value='asc'; document.myform.SortField.value = '9'; document.myform.submit(); return false;" class="TableHeader">Departure Time</a></th>
	<!--th class="bookings-luggage" ><a href="bookings_view.php?SortDirection=asc&SortField=10" onClick="document.myform.SelectedID.value = ''; document.myform.NoDV.value=1; document.myform.SortDirection.value='asc'; document.myform.SortField.value = '10'; document.myform.submit(); return false;" class="TableHeader">Luggage</a></th-->
	<th class="bookings-date_booked" ><a href="bookings_view.php?SortDirection=asc&SortField=11" onClick="document.myform.SelectedID.value = ''; document.myform.NoDV.value=1; document.myform.SortDirection.value='asc'; document.myform.SortField.value = '11'; document.myform.submit(); return false;" class="TableHeader">Date booked</a></th>

	</tr>

</thead>

<tbody><!-- tv data below -->

<tr><td class="text-center"><input class="hidden-print record_selector" type="checkbox" id="record_selector_1" name="record_selector[]" value="1"></td><!-- Edit this file to change the layout of each record in the table view -->
<!-- To disable clicking of a field, remove the <a onclick="document.myform.SelectedField.value=this.parentNode.cellIndex; document.myform.SelectedID.value='1'; document.myform.submit(); return false;" href="bookings_view.php?SelectedID=1" style="display: block; padding:0px;"> and </a> formatters around it-->

<!-- If you wish to hide the table view header that contains the column titles, -->
<!-- add the following to the bookings_init() hook (in hooks/bookings.php file) -->
<!--     $options->ShowTableHeader = 0;     -->

		<td id="bookings-id_number-1" class="bookings-id_number"><a onclick="document.myform.SelectedField.value=this.parentNode.cellIndex; document.myform.SelectedID.value='1'; document.myform.submit(); return false;" href="bookings_view.php?SelectedID=1" style="display: block; padding:0px;">1001</a></td>
		<td id="bookings-fullname-1" class="bookings-fullname"><a onclick="document.myform.SelectedField.value=this.parentNode.cellIndex; document.myform.SelectedID.value='1'; document.myform.submit(); return false;" href="bookings_view.php?SelectedID=1" style="display: block; padding:0px;">Nihad mia</a></td>
		<td id="bookings-phone-1" class="bookings-phone"><a onclick="document.myform.SelectedField.value=this.parentNode.cellIndex; document.myform.SelectedID.value='1'; document.myform.submit(); return false;" href="bookings_view.php?SelectedID=1" style="display: block; padding:0px;">0172345678</a></td>
		<td id="bookings-bus-1" class="bookings-bus"><a onclick="document.myform.SelectedField.value=this.parentNode.cellIndex; document.myform.SelectedID.value='1'; document.myform.submit(); return false;" href="bookings_view.php?SelectedID=1" style="display: block; padding:0px;">TXB 102  :night</a></td>
		<td id="bookings-seat-1" class="bookings-seat"><a onclick="document.myform.SelectedField.value=this.parentNode.cellIndex; document.myform.SelectedID.value='1'; document.myform.submit(); return false;" href="bookings_view.php?SelectedID=1" style="display: block; padding:0px;">A1</a></td>
		<td id="bookings-amount-1" class="bookings-amount"><a onclick="document.myform.SelectedField.value=this.parentNode.cellIndex; document.myform.SelectedID.value='1'; document.myform.submit(); return false;" href="bookings_view.php?SelectedID=1" style="display: block; padding:0px;">500</a></td>
		<td id="bookings-date-1" class="bookings-date"><a onclick="document.myform.SelectedField.value=this.parentNode.cellIndex; document.myform.SelectedID.value='1'; document.myform.submit(); return false;" href="bookings_view.php?SelectedID=1" style="display: block; padding:0px;">06/22/2019</a></td>
		<td id="bookings-time-1" class="bookings-time"><a onclick="document.myform.SelectedField.value=this.parentNode.cellIndex; document.myform.SelectedID.value='1'; document.myform.submit(); return false;" href="bookings_view.php?SelectedID=1" style="display: block; padding:0px;">20:00:00</a></td>
		<!--td id="bookings-luggage-1" class="bookings-luggage"><a onclick="document.myform.SelectedField.value=this.parentNode.cellIndex; document.myform.SelectedID.value='1'; document.myform.submit(); return false;" href="bookings_view.php?SelectedID=1" style="display: block; padding:0px;"><i class="glyphicon glyphicon-check"></i></a></td-->
    <td id="bookings-date-1" class="bookings-date"><a onclick="document.myform.SelectedField.value=this.parentNode.cellIndex; document.myform.SelectedID.value='1'; document.myform.submit(); return false;" href="bookings_view.php?SelectedID=1" style="display: block; padding:0px;">06/18/2019</a></td>
</tr>
<!-- tv data above -->
</tbody>
	<tfoot><tr><td colspan=11>Records 1 to 1 of 1</td></tr></tfoot></table></div>
<div class="row pagination-section"><div class="col-xs-4 col-md-3 col-lg-2 vspacer-lg"><button onClick="document.myform.SelectedID.value = ''; document.myform.NoDV.value = 1; return true;" type="submit" name="Previous_x" id="Previous" value="1" class="btn btn-default btn-block"><i class="glyphicon glyphicon-chevron-left"></i> <span class="hidden-xs">Previous</span></button></div><div class="col-xs-4 col-md-4 col-lg-2 col-md-offset-1 col-lg-offset-3 text-center vspacer-lg"></div><div class="col-xs-4 col-md-3 col-lg-2 col-md-offset-1 col-lg-offset-3 text-right vspacer-lg"><button onClick="document.myform.SelectedID.value = ''; document.myform.NoDV.value=1; return true;" type="submit" name="Next_x" id="Next" value="1" class="btn btn-default btn-block"><span class="hidden-xs">Next</span> <i class="glyphicon glyphicon-chevron-right"></i></button></div></div></div><!-- possible values for current_view: TV, TVP, DV, DVP, Filters, TVDV --><input name="current_view" id="current_view" value="TV" type="hidden"><input name="SortField" value="" type="hidden"><input name="SelectedID" value="" type="hidden"><input name="SelectedField" value="" type="hidden"><input name="SortDirection" type="hidden" value=""><input name="FirstRecord" type="hidden" value="1"><input name="NoDV" type="hidden" value=""><input name="PrintDV" type="hidden" value=""><input name="DisplayRecords" value="all" type="hidden" /></div></form></div><div class="col-xs-1 md-hidden lg-hidden"></div></div>			<!-- Add footer template above here -->
			<div class="clearfix"></div>
							<div style="height: 70px;" class="hidden-print"></div>
			
		</div> <!-- /div class="container" -->
				<script src="resources/lightbox/js/lightbox.min.js"></script>
	</body>
</html>