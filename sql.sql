/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 5.7.9 : Database - hostel2
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`hostel2` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `hostel2`;

/*Table structure for table `booking` */

DROP TABLE IF EXISTS `booking`;

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `checkin_date` date DEFAULT NULL,
  `checkout_date` date DEFAULT NULL,
  `rent` decimal(10,0) DEFAULT NULL,
  `bstatus` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4;

/*Data for the table `booking` */

insert  into `booking`(`booking_id`,`student_id`,`room_id`,`checkin_date`,`checkout_date`,`rent`,`bstatus`) values 
(40,12,24,'2022-11-16','2022-12-15',3219,'paid'),
(47,10,27,'2022-11-16','2022-12-16',8490,'vecated'),
(48,11,27,'2022-11-17','2022-11-27',2830,'paid'),
(51,8,27,'2022-11-17','2022-11-30',3679,'paid'),
(53,9,28,'2022-11-18','2022-11-30',396,'paid');

/*Table structure for table `card` */

DROP TABLE IF EXISTS `card`;

CREATE TABLE `card` (
  `card_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `card_no` varchar(100) DEFAULT NULL,
  `card_name` varchar(110) DEFAULT NULL,
  `exp_date` varchar(410) DEFAULT NULL,
  PRIMARY KEY (`card_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

/*Data for the table `card` */

insert  into `card`(`card_id`,`student_id`,`card_no`,`card_name`,`exp_date`) values 
(18,7,'9876456789000987','sandra','2022-11'),
(19,8,'6789456734568907','krishna','2022-11'),
(20,10,'6667876545678907','divya','2022-03'),
(21,10,'6758903567678965','sara','2022-11'),
(22,13,'3456789876543212','sdcdcd','2022-11'),
(23,13,'5675676789087654','sascs','2022-11'),
(24,9,'8474636373839202','mmm','2022-11'),
(25,9,'6464646464646464','ddd','2022-11'),
(26,13,'5467389273644444','nnn','2022-11'),
(27,13,'7898765789432344','mmm','2022-11'),
(28,12,'7894561230123456','defwe','2022-12'),
(29,12,'7894561230123456','qw','2022-07'),
(30,10,'7894561230123456','qw','2028-07'),
(31,10,'7894561230123456','fshdvh','2023-11'),
(32,11,'7412589630369852','hhhhhh','2022-12'),
(33,8,'8523697410258963','OOOOO','2022-12'),
(34,8,'7894561230123456','rqwyyei','2022-12'),
(35,9,'7410852096302134','tydueyuey','2022-07');

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(50) DEFAULT NULL,
  `cat_type` varchar(21) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Data for the table `category` */

insert  into `category`(`cat_id`,`cat_name`,`cat_type`) values 
(4,'single','1'),
(5,'DOUBLE','2'),
(7,'TRIPPLE','3');

/*Table structure for table `complaints` */

DROP TABLE IF EXISTS `complaints`;

CREATE TABLE `complaints` (
  `complaint_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(100) DEFAULT NULL,
  `complaints` varchar(100) DEFAULT NULL,
  `reply` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`complaint_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `complaints` */

insert  into `complaints`(`complaint_id`,`student_id`,`complaints`,`reply`,`date`) values 
(1,'10','ghjjkjkjkljkokjh ghhjhk','okkk','2023-05-09');

/*Table structure for table `floor` */

DROP TABLE IF EXISTS `floor`;

CREATE TABLE `floor` (
  `floor_id` int(11) NOT NULL AUTO_INCREMENT,
  `floor` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`floor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `floor` */

insert  into `floor`(`floor_id`,`floor`) values 
(1,'FIRST'),
(2,'SECOND'),
(3,'THIRD'),
(8,'FOURTH');

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `login` */

insert  into `login`(`user_name`,`password`,`user_type`,`status`) values 
('admin','admin','admin','1'),
('blah@gmail.com','admin','student','1'),
('divya@gmail.com','admin','student','1'),
('ganga@gmail.com','admin','student','1'),
('krishna@gmail.com','admin','student','1'),
('mmm@gmail.com','admin','student','1'),
('sandra@gmail.com','admin','student','1'),
('sara@gmail.com','admin','student','1'),
('staff1@gmail.com','admin','staff','1');

/*Table structure for table `payment` */

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) DEFAULT NULL,
  `payment_date` varchar(50) DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

/*Data for the table `payment` */

insert  into `payment`(`payment_id`,`booking_id`,`payment_date`,`payment_status`) values 
(16,40,'2022-11-16','paid'),
(17,46,'2022-11-16','paid'),
(18,47,'2022-11-16','paid'),
(19,48,'2022-11-16','paid'),
(20,49,'2022-11-16','paid'),
(21,51,'2022-11-16','paid'),
(22,53,'2022-11-16','paid');

/*Table structure for table `room` */

DROP TABLE IF EXISTS `room`;

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `subcat_id` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `floor_id` int(11) DEFAULT NULL,
  `room_no` varchar(50) DEFAULT NULL,
  `room_desc` varchar(50) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `npa` varchar(20) DEFAULT NULL,
  `room_status` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

/*Data for the table `room` */

insert  into `room`(`room_id`,`subcat_id`,`staff_id`,`floor_id`,`room_no`,`room_desc`,`image`,`price`,`npa`,`room_status`) values 
(16,6,0,1,'101','Single AC','image/images_6370bfc28eae0.jpg','8000','1','occupied'),
(17,7,0,2,'201','Single NonAc','image/images_6370c033d8621.jpg','6000','0','available'),
(18,8,0,3,'301','Double AC','image/images_6370c085a9072.jpg','5000','0','available'),
(24,6,0,1,'111','mm','image/images_63729440d1fd8.jpg','3333','1','occupied'),
(27,10,0,2,'007','three share non ac','image/images_6374bd5e75fe8.jpg','8500','2','available'),
(28,8,0,2,'205','FGDRTHDTM','image/images_6374cc8c4dcf5.jpg','1000','1','available');

/*Table structure for table `staff` */

DROP TABLE IF EXISTS `staff`;

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `s_fname` varchar(50) NOT NULL,
  `s_lname` varchar(50) NOT NULL,
  `s_dob` varchar(50) NOT NULL,
  `s_hname` varchar(100) NOT NULL,
  `s_dist` varchar(100) NOT NULL,
  `s_pin` varchar(100) NOT NULL,
  `s_gender` varchar(100) NOT NULL,
  `s_phno` varchar(100) NOT NULL,
  `s_status` varchar(10) NOT NULL,
  `s_identity` varchar(1000) NOT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `staff` */

insert  into `staff`(`staff_id`,`user_name`,`s_fname`,`s_lname`,`s_dob`,`s_hname`,`s_dist`,`s_pin`,`s_gender`,`s_phno`,`s_status`,`s_identity`) values 
(2,'staff1@gmail.com','aadhi','staff1','2022-05-05','qwe','ekm','676767','male','9879876543','0','image/image_6370bf210429c.png');

/*Table structure for table `student` */

DROP TABLE IF EXISTS `student`;

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `st_fname` varchar(50) NOT NULL,
  `st_lname` varchar(50) NOT NULL,
  `st_dob` varchar(50) NOT NULL,
  `st_gender` varchar(50) NOT NULL,
  `st_hname` varchar(50) NOT NULL,
  `st_dist` varchar(50) NOT NULL,
  `st_pin` varchar(50) NOT NULL,
  `st_phno` varchar(50) NOT NULL,
  `st_photo` varchar(1000) NOT NULL,
  `st_identity` varchar(1000) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

/*Data for the table `student` */

insert  into `student`(`student_id`,`user_name`,`st_fname`,`st_lname`,`st_dob`,`st_gender`,`st_hname`,`st_dist`,`st_pin`,`st_phno`,`st_photo`,`st_identity`) values 
(7,'sandra@gmail.com','Sandra','george','2022-11-13','female','qwe','ert','678900','9567890456','image/image_6370c14366347.png','image/image_6370c14365f6d.png'),
(8,'krishna@gmail.com','krishna','priya','2022-11-13','female','asdfg','tsr','678909','9876543456','image/image_6370d33893294.png','image/image_6370d33892d9d.png'),
(9,'sara@gmail.com','Sara','susan','2022-11-13','female','rty','rty','678654','8765432345','image/image_6370d435cb7cc.png','image/image_6370d435cb308.png'),
(10,'divya@gmail.com','divya','divya','2022-11-13','female','qwer','idk','678432','9876543456','image/image_6370d4bdc8e35.jpeg','image/image_6370d4bdc61b9.jpeg'),
(11,'ganga@gmail.com','ganga','nair','2022-11-13','female','ewqeqw','kollam','678932','8763894788','image/image_63711fedc383f.jpeg','image/image_63711fedc35be.jpeg'),
(12,'blah@gmail.com','blah','blah','2022-11-14','female','blah','blah','897654','9876543456','image/image_6372813bbc759.jpg','image/image_6372813bbc43c.jpg'),
(13,'mmm@gmail.com','mmm',',mmm','2022-11-14','female','dcdcs','dsed','566555','9876785434','image/image_6372819ae553f.jpg','image/image_6372819ae51b7.jpg');

/*Table structure for table `subcat` */

DROP TABLE IF EXISTS `subcat`;

CREATE TABLE `subcat` (
  `subcat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) DEFAULT NULL,
  `subcat_name` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`subcat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `subcat` */

insert  into `subcat`(`subcat_id`,`cat_id`,`subcat_name`) values 
(6,4,'AC'),
(7,4,'NON AC'),
(8,5,'AC'),
(10,7,'non ac'),
(11,5,'non ac');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
