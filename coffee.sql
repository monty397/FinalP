CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL auto_increment,
  `cust_name` varchar(200) NOT NULL,
  `cust_username` varchar(200) NOT NULL,
  `cust_email` varchar(200) NOT NULL,
  `cust_address` varchar(200) NOT NULL,
  `cust_contact` varchar(200) NOT NULL,
  `cust_password` varchar(200) NOT NULL,
   PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL auto_increment,
  `emp_name` varchar(200) NOT NULL,
  `emp_username` varchar(200) NOT NULL,
  `emp_email` varchar(200) NOT NULL,
  `emp_address` varchar(200) NOT NULL,
  `emp_contact` varchar(200) NOT NULL,
  `emp_password` varchar(200) NOT NULL,
   PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `administrator` (
  `admin_id` int(11) NOT NULL auto_increment,
  `admin_name` varchar(200) NOT NULL,
  `admin_username` varchar(200) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_address` varchar(200) NOT NULL,
  `admin_contact` varchar(200) NOT NULL,
  `admin_password` varchar(200) NOT NULL,
   PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

Create TABLE `product`(
    `item_id` int(11) NOT NULL auto_increment,
    `item_name` varchar(200) NOT NULL,
    `item_price` int NOT NULL,
    `item_image` blob NOT NULL,
    PRIMARY KEY (`item_id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `orderItem` (
  `order_id` int(11) NOT NULL,
  `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `item_name` varchar(200) NOT NULL,
  `item_cost` int NOT NULL,
  `quantity` int NOT NULL,
  `item_total` int NOT NULL,
  `status` varchar(200) NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `userOrder` (
  `order_id` int(11) NOT NULL auto_increment,
  `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fname` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


