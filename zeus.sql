CREATE TABLE IF NOT EXISTS `booking_details` (
  `booking_id` int(9) NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(20) NOT NULL,
  `drone_id` varchar(10) NOT NULL,
  `date_of_booking` date NOT NULL,
  `booking_from_date` date NOT NULL,
  `booking_to_date` date NOT NULL,
  `geo_tag` int(10) NOT NULL,
  PRIMARY KEY (`booking_id`),
  KEY `customer_id` (`customer_id`),
  KEY `drone_id` (`drone_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

CREATE TABLE IF NOT EXISTS `billing_and_invoice` (
  `invoice_id` int(10) NOT NULL AUTO_INCREMENT,
  `booking_id` int(9) NOT NULL,
  `date` date NOT NULL,
  `drone_id` varchar(10) NOT NULL,
  `duration` int(10) NOT NULL,
  `amount` int(20) NOT NULL,
  PRIMARY KEY (`invoice_id`),
  KEY `booking_id` (`booking_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

CREATE TABLE IF NOT EXISTS `drone_details` (
`reg_number` varchar(10) NOT NULL,
`drone_id` varchar(10) NOT NULL,
`model` varchar(50) NOT NULL,
`payload` int(20) NOT NULL,
`type` varchar(20) NOT NULL,
`range` int(20) NOT NULL,
`cost` int(20) NOT NULL,
PRIMARY KEY (`reg_number`),
KEY `drone_id` (`drone_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

CREATE TABLE IF NOT EXISTS `customer` (
`customer_id` int(11) NOT NULL AUTO_INCREMENT,
`fist_name` varchar(50) NOT NULL,
`last_name` varchar(50) NOT NULL,
`age` int(10) NOT NULL,
`aadhaar_number` int(10) NOT NULL,
`login_id` varchar(60) NOT NULL,
`password` varchar(50) NOT NULL,
`contact_no` int(10) NOT NULL,
PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

CREATE TABLE IF NOT EXISTS `order_status` (
`booking_id` int(9) NOT NULL AUTO_INCREMENT,
`status_id` int(10) NOT NULL,
`customer_id` varchar(20) NOT NULL,
`drone_id` varchar(10) NOT NULL,
`current_stat` varchar(20) NOT NULL,
PRIMARY KEY (`booking_id`),
KEY `status_id` (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

CREATE TABLE IF NOT EXISTS `delivery` (
`booking_id` int(9) NOT NULL AUTO_INCREMENT,
`drone_id` varchar(10) NOT NULL,
`weight` int(10) NOT NULL,
`receiver_data` varchar(50) NOT NULL,
`sender_date` varchar(50) NOT NULL,
`contents` varchar(100) NOT NULL,
PRIMARY KEY (`booking_id`),
KEY `drone_id` (`drone_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

CREATE TABLE IF NOT EXISTS `account` (
`accno` int(10) NOT NULL AUTO_INCREMENT,
`customer_id` int(11) NOT NULL ,
`login_id` varchar(60) NOT NULL,
`type` varchar(30) NOT NULL,
PRIMARY KEY (`accno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

ALTER TABLE `account`
  ADD CONSTRAINT `aacount_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;