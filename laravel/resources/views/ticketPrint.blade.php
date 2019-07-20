<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bus details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/ticket-style.css">
</head>
<body>
@php //dd($seat_info[3]); @endphp
<div class="section">


    <div id="ticket-container">
        <div id="ticket-container-top">
            <div class="row">
                <div class="col-sm-7" style="border-right: 1px dashed grey;">
                    <div id="btn" style="width: 130px;">Passenger Copy</div>
                </div>
                <div class="col-sm-5">
                    <div id="btn" style="width: 110px;">Guide Copy</div>
                </div>
                <!--/div><div class="col-sm-6">
                    <button>Counter Copy</button>
                </div-->
            </div>
        </div>
        <div id="ticket-container-bottom">
            <div class="row">
                <div class="col-sm-7">
                    <h3 style="text-align: center;margin-top: 40px;">{{$ticketInfo->get('ticket')->bus_name}}</h3>
                    <h4 style="text-align: center;margin-top: -5px;margin-bottom: 20px;" class="text-muted">@www.onlineticket.com</h4>
                    <p>Passenger name : {{$ticketInfo->get('userdata')->first_name}}&nbsp;{{$ticketInfo->get('userdata')->last_name}}</p>
                    <div class="row">
                        <div class="col-sm-6">Mobile : {{$ticketInfo->get('userdata')->phn}}</div>
                        <div class="col-sm-6">Gender : {{$ticketInfo->get('userdata')->gender}}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">Ticket No : {{$ticketInfo->get('userdata')->phn}}X{{$ticketInfo->get('ticket')->tid}}</div>
                        <div class="col-sm-6">Age : {{$ticketInfo->get('userdata')->age}}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">Journey Dt : {{$ticketInfo->get('ticket')->journey_date}}</div>
                        <div class="col-sm-6">Booking Dt : {{$ticketInfo->get('ticket')->booking_time}}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">From : {{$ticketInfo->get('ticket')->from}}</div>
                        <div class="col-sm-6">To : {{$ticketInfo->get('ticket')->to}}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">Reporting time : {{$ticketInfo->get('ticket')->departure_time}}</div>
                        <div class="col-sm-6">Depurture time : {{$ticketInfo->get('ticket')->departure_time}}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">Seat Fare : {{$ticketInfo->get('total')}}</div>
                        <div class="col-sm-6">Total : {{$ticketInfo->get('sc')}}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">Boarding point :  {{$ticketInfo->get('ticket')->boarding_point}}  </div>
                        <div class="col-sm-6">Coach No : {{$ticketInfo->get('ticket')->coach_no}}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <p>Seats :
                                @foreach($ticketInfo->get('seats') as $seats)
                                    @php $i=0; @endphp
                                    @foreach($seats as $seat)
                                        @if($i==0)
                                            {{$seat}} ,&nbsp;
                                        @endif
                                        @php $i=$i+1; @endphp
                                    @endforeach
                                @endforeach</p>
                        </div>
                        <div class="col-sm-6">Coach Type : {{$ticketInfo->get('ticket')->bus_type}}</div>
                    </div>

                </div>
                <div class="col-sm-5"  style="border-left: 1px dashed grey;">
                    <h3 style="text-align: center;margin-top: 40px;">{{$ticketInfo->get('ticket')->bus_name}}</h3>
                    <h4 style="text-align: center;margin-top: -5px;margin-bottom: 20px;" class="text-muted">@www.onlineticket.com</h4>
                    <p>Passenger name : {{$ticketInfo->get('userdata')->first_name}}&nbsp;{{$ticketInfo->get('userdata')->last_name}}</p>
                    <div class="row">
                        <div class="col-sm-6">Mobile : {{$ticketInfo->get('userdata')->phn}}</div>
                        <div class="col-sm-6">Gender : {{$ticketInfo->get('userdata')->gender}}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">Ticket No : {{$ticketInfo->get('userdata')->phn}}X{{$ticketInfo->get('ticket')->tid}}</div>
                        <div class="col-sm-6">Age : {{$ticketInfo->get('userdata')->age}}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">Coach No : {{$ticketInfo->get('ticket')->coach_no}}</div>
                        <div class="col-sm-6">Coach Type : {{$ticketInfo->get('ticket')->bus_type}}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">Journey Date : {{$ticketInfo->get('ticket')->journey_date}}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">From : {{$ticketInfo->get('ticket')->from}}</div>
                        <div class="col-sm-6">To : {{$ticketInfo->get('ticket')->to}}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">Depurture time : {{$ticketInfo->get('ticket')->departure_time}}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">Seat Fare : {{$ticketInfo->get('total')}}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">Total : {{$ticketInfo->get('sc')}}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <p>Seats :
                                @foreach($ticketInfo->get('seats') as $seats)
                                    @php $i=0; @endphp
                                    @foreach($seats as $seat)
                                        @if($i==0)
                                            {{$seat}} ,&nbsp;
                                        @endif
                                        @php $i=$i+1; @endphp
                                    @endforeach
                                @endforeach</p>
                        </div>
                    </div>
                    <!--/div><div class="col-sm-3">

                    </div-->
                </div>
            </div>
        </div>
    </div>

</div>

</body>
</html>



