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




                <div id="sort-option-container">
                    <div class="row">
                        <div class="col-sm-2"><p><span><i class="fas fa-sort"></i></span>Sort By</p></div>
                        <div class="col-sm-2"><p  onclick="sortTable(0)"  id="opt">Operator name
                                <span id="opt-up"><i class="fas fa-sort-up"></i></span>
                                <span id="opt-down-1" hidden><i class="fas fa-sort-down"></i></span>
                                <span id="opt-down-2"><i class="fas fa-sort-down"></i></span>
                            </p></div>
                        <div class="col-sm-2"><p  onclick="sortTable(3)" id="ctype">Coach type
                                <span id="opt-up-1"><i class="fas fa-sort-up"></i></span>
                                <span id="opt-down-3" hidden><i class="fas fa-sort-down"></i></span>
                                <span id="opt-down-4"><i class="fas fa-sort-down"></i></span></p></div>
                        <div class="col-sm-2"><p  onclick="sortTable(6)" id="savailable">Seat available
                                <span id="opt-up-2"><i class="fas fa-sort-up"></i></span>
                                <span id="opt-down-5" hidden><i class="fas fa-sort-down"></i></span>
                                <span id="opt-down-6"><i class="fas fa-sort-down"></i></span></p></div>
                        <div class="col-sm-2"><p  onclick="sortTable(7)" id="fare">Fare
                                <span id="opt-up-3"><i class="fas fa-sort-up"></i></span>
                                <span id="opt-down-7" hidden><i class="fas fa-sort-down"></i></span>
                                <span id="opt-down-8"><i class="fas fa-sort-down"></i></span></p></div>

                        <div class="col-sm-2"><p id="filter">Filter  <span><i class="fas fa-sort-down"></i></span></p>
                            <div id="filter-list">
                                <ul>
                                    <li>Bus Type</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>