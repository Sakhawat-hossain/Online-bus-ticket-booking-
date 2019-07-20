<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bus details</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link rel="stylesheet" href="css/header-design.css">
    <link rel="stylesheet" href="css/footer-design.css">
    <link rel="stylesheet" href="css/cancel-refund-policy.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>
<body>
@php //dd($seat_info[3]); @endphp
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

    <div class="container" style="min-height: 500px;width: 90%;">
        <div id="cancel-refund-container">
            <div class="row">
                <div class="col-sm-4">
                    <h3 style="text-align: center;color: forestgreen">Cancellations and Refunds</h3>
                    <div id="link-background"><a href="#cancel-policy">
                        <ul><li>Cancellation Policy</li></ul></a>
                    </div>
                    <div id="link-background"><a href="#refund-policy">
                            <ul><li>Cancellation Policy</li></ul></a>
                    </div>
                    <div id="link-background"><a href="#cancel-eligibility">
                            <ul><li>Cancellation Eligibility</li></ul></a>
                    </div>
                    <div id="link-background"><a href="#refund-timeline">
                            <ul><li>Timeline of Refund</li></ul></a>
                    </div>
                    <div id="link-background"><a href="#refund-amount">
                            <ul><li>Amount of Refund</li></ul></a>
                    </div>
                    <div id="link-background"><a href="#special-cir">
                            <ul><li>Special Circumstance</li></ul></a>
                    </div>
                </div>
                <div class="col-sm-8" style="margin-left: -50px;margin-top: 50px;">
                    <p><strong>Before buying a ticket, customers are requested to read the following cancellation
                            and refund policies carefully.</strong></p>

                    <h3 id="cancel-policy">Cancellation Policy</h3>
                    <p>Tickets bought through onlineticket.com can be cancelled as per the cancellation policy below.
                        However, as a ticket selling agent, onlineticket.com is bound to comply with the terms set by
                        the operator whose ticket it is selling. So, if the operator/event organizer denies refund even
                        though claim was made within the terms mentioned here, onlineticket.com will be unable to issue such refund.</p>

                    <h4 style="padding-top: 10px;">Auto cancellation</h4>
                    <h5>No Show</h5>
                    <ul><l>The Ticket will be automatically cancelled if the passenger fails to report at the boarding station
                            15 minutes before scheduled departure time. In such cases, bus operators’ opinion will be counted as final.</l></ul>

                    <h5>Failure to pay</h5>
                    <ul>
                        <li>No ticket will be activated unless the customer has paid the full amount mentioned on the screen.</li>
                        <li>For mobile payments, it is the responsibility of the customer to verify and activate his ticket himself. onlineticket.com
                            sometimes does the verification for the customer as a courtesy, but it is not Shohoz.com’s responsibility or service promise.</li>
                        <li>Tickets will be automatically canceled if customer does not confirm payment within 30 minutes
                            of reservation in case of mobile payments, 15 minutes in case of internet banking and upon arrival
                            of delivery man, in case of COD. For mobile payments customer must complete payment and also verify ticket within this
                            stipulated time. During Eid sales month, Shohoz.com will not do any verifications on behalf of the customers.
                        </li>
                    </ul>

                    <h4 style="padding-top: 15px;" id="cancel-eligibility">Ticket cancellation eligibility</h4>
                    <h5 style="padding-top: 10px;">Regular Time (Non-Eid Period)</h5>
                    <p>To be eligible for refund, customer must cancel the ticket and provide accurate refund information (detailed below)
                        within a certain number of hours before the trip time, as outlined below.</p>

                    <table class="table table-bordered">
                        <thead>
                            <th colspan="3">Operator &nbsp;&nbsp;</th>
                            <th>Hours Before Departure</th>
                            <th colspan="2">Remarks</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="3">Hanif Paribahan</td>
                                <td>10</td>
                                <td colspan="2">Excluding 11:00 pm to 06:00 am</td>
                            </tr>
                        </tbody>
                    </table>

                    <p>Customers will be eligible for refund after the grace period mentioned above only if</p>
                    <ul>
                        <li>the trip was cancelled after the grace period AND</li>
                        <li>the customer has filed for the refund within 24 hours of the cancelled trip time AND</li>
                        <li>the bus operator has confirmed that the customer has not traveled. Confirmation of travel is
                            solely at the discretion of the bus operator. In case of dispute, onlineticket.com is bound to
                            take the bus operators decision as final.</li>
                    </ul>

                    <h5 style="padding-top: 10px;">During Eid</h5>
                    <ul>
                        <li>For eid tickets, customers are eligible for refund ONLY if the operator cancels the trip and
                            cannot provide an alternative arrangement.</li>
                    </ul>

                    <h3 style="padding-top: 20px;" id="refund-policy">Refund Policy</h3>

                    <h5 style="padding-top: 10px;">Regular Time (Non-Eid Period)</h5>
                    <ul>
                        <li>No ticket will be refunded unless it has been cancelled as per the cancellation policy above.</li>
                        <li>No refunds will be processed without a written request in the correct format (as outlined below)
                            sent to refunds@onlineticket.com within the timeframe requirement given above</li>
                        <li>Refund Request Format
                            <ul>
                                <li>Mobile number used while buying the ticket</li>
                                <li>Date of payment</li>
                                <li>Method of Payment (e.g., bkash)</li>
                                <li>Mobile payment trxID (for mobile payments)</li>
                                <li>Where refund should be given to:
                                    <ul>
                                        <li>Personal bKash Number (If paid through bkash) OR</li>
                                        <li>OR Bank details (if paid through card/online baking/DBBL mobile banking)
                                            with Account Number, Bank Account Name, Bank Name, Branch Name and Routing Code.</li>
                                        <li>No cash refund given</li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <h5 style="padding-top: 10px;">During Eid</h5>
                    <ul>
                        <li>Customers MUST claim refund at the operator’s counters in case of trip cancellations.</li>
                    </ul>

                    <h4 style="padding-top: 15px;" id="refund-timeline">Timeline of refund</h4>

                    <h5 style="padding-top: 10px;">Regular Time (Non-Eid Period)</h5>
                    <ul>
                        <li>Upon receiving refund requests accurately in the format outlined above, onlineticket.com will process refund within 10 business days
                            (excluding holidays / weekends), subject to verification by the transportation operator/event organizer.</li>
                        <li>For clarity, timing commitment starts from the time of receiving the ACCURATE information, mistakes will cause delays</li>
                    </ul>

                    <h5 style="padding-top: 10px;">During Eid</h5>
                    <ul>
                        <li>Customer must claim refund from bus operator’s counter before trip time</li>
                    </ul>

                    <h4 style="padding-top: 15px;" id="refund-amount">Amount of refund</h4>
                    <ul>
                        <li>Fees charged by payment gateways, credit / debit cards, mobile payment gateways (e.g. bKash) are non-refundable due to the
                            policies of the respective organizations, which is beyond onlineticket.com's control.</li>
                        <li>As per policy of an operator, onlineticket.com may deduct a certain percentage (%) of the ticket
                            price towards cancellation fee, where-ever applicable.</li>
                        <li>For refunds through mobile payment gateways (e.g. bKash), a fee is charged by the mobile payment
                            company which will be deducted from the eligible refund amount. Similar condition will apply if
                            the bank charges any such additional fee.</li>
                    </ul>

                    <h4 style="padding-top: 15px;" id="special-cir">Special circumstances</h4>
                    <ul>
                        <li>Customers are requested not to pay
                        <ul>
                            <li>by mobile payments before booking/reserving the ticket or</li>
                            <li>by any means other than our accepted modes of payments. In such cases, we will not be able to process any refund.</li>
                        </ul></li>
                        <li>If a customer has made an excess payment for a ticket accidentally, he is eligible for refund but he
                            must claim for the refund within 24 hours of making the payment</li>
                    </ul>
                </div>
            </div>
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

</body>
</html>




