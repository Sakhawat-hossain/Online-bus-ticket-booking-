INSERT INTO `tickets` (`boarding_point`,`dropping_point`,`booking_time`,`paymentID`,`userID`,`status`) VALUES
('Kallanpur','Kamarpara','2019-07-04 10:30:33','1','4','booked'),
('Kamarpara','Kallanpur','2019-07-04 10:40:33','2','4','booked');

INSERT INTO `seats` (`tripID`,`seatID`,`fare`,`status`) VALUES
(4,1,500,'available'),
(4,2,500,'available'),
(4,3,500,'available'),
(4,4,500,'available'),
(4,5,500,'available'),
(4,6,500,'available'),
(4,7,500,'available'),
(4,8,500,'available'),
(4,9,500,'available'),
(4,10,500,'available'),
(4,11,500,'available'),
(4,12,500,'available'),
(4,13,500,'available'),
(4,14,500,'available'),
(4,15,500,'available'),
(4,16,500,'available'),
(4,17,500,'available'),
(4,18,500,'available'),
(4,19,500,'available'),
(4,20,500,'available'),
(4,21,500,'available'),
(4,22,500,'available'),
(4,23,500,'available'),
(4,24,500,'available'),
(4,25,500,'available'),
(4,26,500,'available'),
(4,27,500,'available'),
(4,26,500,'available'),
(4,29,500,'available'),
(4,30,500,'available'),
(4,31,500,'available'),
(4,32,500,'available'),
(4,33,500,'available'),
(4,34,500,'available'),
(4,35,500,'available'),
(4,36,500,'available'),
(4,37,500,'available'),
(4,38,500,'available'),
(4,39,500,'available'),
(4,40,500,'available'),

(8,41,1200,'available'),
(8,42,1200,'available'),
(8,43,1200,'available'),
(8,44,1200,'available'),
(8,45,1200,'available'),
(8,46,1200,'available'),
(8,47,1000,'available'),
(8,48,1000,'available'),
(8,49,1000,'available'),
(8,50,1000,'available'),
(8,51,1000,'available'),
(8,52,1000,'available'),
(8,53,1000,'available'),
(8,54,1000,'available'),
(8,55,1000,'available'),
(8,56,1000,'available'),
(8,57,1000,'available'),
(8,58,1000,'available'),
(8,59,1000,'available'),
(8,60,1000,'available'),
(8,61,1000,'available'),
(8,62,1000,'available'),
(8,63,1000,'available'),
(8,64,1000,'available'),
(8,65,1000,'available'),
(8,66,1000,'available'),
(8,67,1000,'available'),
(8,68,1000,'available'),
(8,69,1000,'available'),
(8,70,1000,'available');


<div id="bKashFrameWrapper" style="position: fixed; overflow-y: scroll; z-index: 50000; right: 0px; bottom: 0px; left: 0px; top: 0px;"><iframe id="bKash-iFrame-391" frameborder="0" src="https://client.pay.bka.sh/checkout" name="bKash_checkout_app" style="display: block; border: none; margin: 0px; padding: 0px; height: 100%; width: 100%; transform: translate3d(0px, 0px, 0px);"></iframe></div>

<html lang="en"><head>
    <link rel="stylesheet" href="/resource/css/external/skeleton.css">
    <link rel="stylesheet" href="/resource/css/versions/1/checkout.css">
    <script src="/resource/js/master/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="/resource/js/master/bpgw.cb.site-master-1.2.0.js" type="application/javascript"></script>
    <script src="/resource/js/master/bpgw.cb.util-1.2.0.js" type="application/javascript"></script>
    <script src="/resource/js/checkout/bpgw.cb.checkout-1.2.0.js" type="application/javascript"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>-->
    <!--<meta http-equiv="Pragma" content="no-cache"/>-->
    <!--<meta http-equiv="Expires" content="0"/>-->
    <title>Checkout</title>
</head>
<body class="text-center fade-in">
<span id="container-bg"></span>
<span id="container"><form class="form-signin" action="#" method="POST" id="login_form">
    <div id="logoHolder"><img id="logo" class="mb-4" src="/resource/img/bkash_payment.png" alt="bKash logo" height="72"></div>
    <!--<h5 class='h3 mb-3 font-weight-normal' id='pageHeader'>bKash Checkout</h5>-->
    <div id="trxInfo"><b>Merchant :</b> <span id="merchant_name">BUSBD</span><br><b>Invoice no : </b><span id="merchantInvoice">OCBBCJTT4RJQKNRYWBD338a7</span><br>
        <b>Amount :</b> BDT <span id="amount_to_be_paid">1060</span>
    </div>
    <br>
    <label for="wallet" class="sr-only">Your bKash account number</label>
    <input type="text" id="wallet" name="wallet" class="form-control" placeholder="e.g 01XXXXXXXXX" required="">
    <br><input type="checkbox" id="toc" value="agreement"> I agree to the <b><a href="https://www.bkash.com/terms-of-use-checkout" target="_blank">terms and conditions</a></b><br>

    <button type="submit" id="submit_button">PROCEED</button>
    <button type="button" id="close_button">CLOSE</button>
    <div id="error"></div><div id="credit"><img src="/resource/img/16247.png" alt="16247" height="30"></div>
</form></span>

</body></html>
