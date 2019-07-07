INSERT INTO `boardings` (`id`,`routeID`, `placeID`) VALUES
(1, 1, 100),
(2, 1, 200),
(3, 2, 300),
(4, 3, 400);


INSERT INTO `buses` (`id`, `name`, `coach_no`, `rID`) VALUES
(1, 'Hanif Poribahon', 'TXB 102', 1),
(2, 'Hanif Poribahon', 'TXB 105', 3),
(3, 'Nabil Poribahon', 'TXD 101', 2),
(4, 'Nabil Poribahon', 'TXD 108', 3),

(5, 'Shohag Poribahon', 'TXS 205', 1),
(6, 'Shogag Poribahon', 'TXS 305', 3),
(7, 'Ena Poribahon', 'TXE 205', 3);

INSERT INTO `seat_infos` (`id`, `busID`, `seatNo`, `status`,`category`) VALUES
(1, '1','A1','available', 'Business'),
(2, '1','A2','available', 'Business'),
(3, '1','A3','available', 'Business'),
(4, '1','A4','available', 'Business'),

(5, '1','B1','available', 'Economy'),
(6, '1','B2','available', 'Economy'),
(7, '1','B3','available','Economy'),
(8, '1','B4','available', 'Economy'),

(9, '1','C1','available', 'Economy'),
(10, '1','C2','available','Economy'),
(11, '1','C3','available', 'Economy'),
(12, '1','C4','available','Economy'),


(13, '1','D1','available', 'Economy'),
(14, '1','D2','available','Economy'),
(15, '1','D3','available', 'Economy'),
(16, '1','D4','available','Economy'),

(17, '1','E1','available', 'Economy'),
(18, '1','E2','available','Economy'),
(19, '1','E3','available', 'Economy'),
(20, '1','E4','available','Economy');



INSERT INTO `trips` (`tripID`, `routeID`,`departure_time`,`arrival_time`, `date`, `comment`,`busID`,`rID`) VALUES
(1, 1, '13:00:00','7:30:00','2018-05-20', '1', 1,1),
(2, 1, '20:00:00','7:30:00','2018-05-22', '2', 2,3),
(3, 2, '13:00:00','7:30:00','2018-06-05', '1',4,3);


INSERT INTO `routes` (`id`,`from`, `to`) VALUES
(1, 'Dhaka','Rangpur'),
(2, 'Dhaka','Dinajpur'),
(3, 'Dhaka','Nilphamari'),
(4, 'Dhaka','Thakurgoan'),
(5, 'Dhaka','Panchagorh'),
(6, 'Dhaka','Kurigram'),
(7, 'Dhaka','Bogura'),
(8, 'Dhaka','Rajshahi'),
(9, 'Dhaka','Pabna'),
(10, 'Dhaka','Gaibandha'),
(11, 'Dhaka','Naogaon'),
(12, 'Dhaka','Sirajgonj'),
(13, 'Dhaka','Natore'),
(14, 'Dhaka','Joypurhat'),
(15, 'Sylhet','Dhaka'),
(16, 'Dhaka','Cumilla'),
(17, 'Dhaka','Chattogram'),
(18, 'Dhaka','Cox`s Bazar'),
(19, 'Dhaka','Khulla'),
(20, 'Dhaka','Kushtia'),
(21, 'Dhaka','Barisal'),
(22, 'Dhaka','Bagerhat'),
(23, 'Dhaka','Kuakata'),
(24, 'Sylhet','Rangpur'),
(25, 'Chattogram','Rangpur'),
(26, 'Khulla','Rangpur'),
(27, 'Barisal','Rangpur'),
(28, 'Chattogram','Sylhet'),
(29, 'Cox`s Bazar','Rangpur'),
(30, 'Rangpur','Dhaka');

INSERT INTO `places` (`id`,`name`) VALUES
(1, 'Kallanpur'),
(2, 'Gabtoli'),
(3, 'Kolabagan'),
(4, 'Hatirpul'),
(5, 'Hemayetpur'),
(6, 'Majar Road'),
(7, 'Savar'),
(8, 'Baipyl'),
(9, 'Uttora'),
(10, 'Abdullahpur'),
(11, 'Kamarpara bus stand'),
(12, 'Modern more'),
(13, 'Mithapukur'),
(14, 'Jaigirhat'),
(15, 'Shathibari'),
(16, 'Pirgonj'),
(17, 'Polashbari'),
(18, 'Bogura'),
(19, 'Paglapir'),
(20, 'Saidpur'),
(21, 'Chandra'),
(22, 'Gobindogonj'),
(23, 'Ghoraghat'),
(24, 'Birampur'),
(25, 'Fulbari'),
(26, 'Birgonj'),
(27, 'Dinajpur terminal'),
(28, 'Aminbazar'),
(29, 'Dhamrai'),
(30, 'Nabinagar');


INSERT INTO `Boardings` (`routeID`, `placeID`) VALUES
(1,3),
(1,4),
(1,5),
(1,6),
(1,7),
(1,8),
(1,9),
(1,10),
(1,28),
(1,29),
(1,30),
(30,11),
(30,12),
(30,13),
(30,14),
(30,15),
(30,16),
(30,17),
(30,18),
(30,22);

INSERT INTO `trips` (`routeID`,`departure_time`,`arrival_time`, `date`, `comment`,`busID`,`rID`) VALUES
(1, '9:00 PM','5:00 AM','2019-07-05', 'available', 1,1),
(1, '10:00 PM','6:00 AM','2019-07-05', 'available', 2,1),
(1, '11:00 PM','7:00 AM','2019-07-05', 'available',3,1),

(30, '9:00 PM','5:00 AM','2019-07-07', 'available', 1,1),
(30, '10:00 PM','6:00 AM','2019-07-07', 'available', 2,1),
(30, '11:00 PM','7:00 AM','2019-07-07', 'available',3,1);

UPDATE `buses` SET
`total_seat` = 40 WHERE `type` = 'non-AC';

UPDATE `buses` SET
`total_seat` = 30 WHERE `type` = 'AC';

UPDATE `buses` SET
`available_seat` = 40 WHERE `type` = 'non-AC';

UPDATE `buses` SET
`available_seat` = 30 WHERE `type` = 'AC';

UPDATE `routes` SET
`starting_point` = 'Kallanpur' WHERE `from` = 'Dhaka';

UPDATE `routes` SET
`starting_point` = 'Kamarpara' WHERE `from` = 'Rangpur';

UPDATE `trips` SET
`b/e` = '1200/1000' WHERE `busID` = 2;

UPDATE `trips` SET
`b/e` = '1200/1000' WHERE `busID` = 4;
