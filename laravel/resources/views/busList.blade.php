<!DOCTYPE html>
<html lang="en">
    <head>
          <title>Bootstrap Example</title>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/buslist-style.css">
        <link rel="stylesheet" href="css/style.css">
        
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="section">
            <div id="header">
                <div id="login_button">
                    <! http://localhost:8000/>
                    <a href="user/create">
                        <button type="button" class="btn btn-default" style="right-margin:10px;">Register</button>
                    </a>
                    <a href="signin">
                        <button type="button" class="btn btn-default">Sign in</button>
                    </a>
                </div>
            </div>
            
            <div class="container"> 
                <div id="search-option">
                                <div class="row">
									<div class="col-sm-2">
										<div class="form-group">
											<span class="form-label">From</span>
                                            <select class="form-control" name="from">
                                                <option>Dhaka</option>
                                                <option>Rangpur</option>
                                                <option>Bogura</option>
                                            </select>
									       <span class="select-arrow"></span>
										</div>
									</div>
                                    <div class="col-sm-2">
										<div class="form-group">
											<span class="form-label">To</span>
                                            <select class="form-control" name="from">
                                                <option>Dhaka</option>
                                                <option>Rangpur</option>
                                                <option>Bogura</option>
                                            </select>
									       <span class="select-arrow"></span>
										</div>
									</div>
                                    <div class="col-sm-2">
										<div class="form-group">
											<span class="form-label">Type</span>
                                            <select class="form-control" name="from">
                                                <option>AC</option>
                                                <option>Non-AC</option>
                                            </select>
									       <span class="select-arrow"></span>
										</div>
									</div>
                                    <div class="col-sm-2">
										<div class="form-group">
											<span class="form-label">Enterprise</span>
                                            <select class="form-control" name="from">
                                                <option>Hanif</option>
                                                <option>Nabil</option>
                                                <option>Desh Travel</option>
                                                <option>Dipjol</option>
                                            </select>
									       <span class="select-arrow"></span>
										</div>
									</div>
									<div class="col-sm-2">
										<div class="form-group">
											<span class="form-label">Deperture Date</span>
											<input class="form-control" type="date" name="checkout" required>
										</div>
									</div>
                                    <div class="form-btn" style="margin-top: 20px;float: right;margin-right:80px;">
                                        <button type="button" class="btn btn-success">Search</button>
                                    </div>
								</div>
					</div>			
                    
                <div id="table-container">
                    <table class="table table-hover" >
                        <thead>
                            <tr>
                                <th>Enterprise Name</th>
                                <th>Coach No</th>
                                <th>Starting Counter</th>
                                <th>Coach Type</th>
                                <th>Departure Time</th>
                                <th>Arrival Time</th>
                                <th>Fare</th>
                                <th>Available Seats</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Hanif Enterprise</td>
                                <td>300HE</td>
                                <td>Kallanpur AC Counter</td>
                                <td>Non-AC</td>
                                <td>11.00 PM</td>
                                <td>7.00 AM</td>
                                <td>500</td>
                                <td>30</td>
                                <td><button type="button" class="btn btn-success">View seats</button></td>
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
                                <td>500</td>
                                <td>30</td>
                                <td><button type="button" class="btn btn-success">View seats</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
