--creating the database for use in the website
CREATE DATABASE IF NOT EXISTS `db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db`;

--parent table stores the details of users that register on the site
CREATE TABLE `parent` (
	`parent_id` int(11) NOT NULL AUTO_INCREMENT,	--id is automatically assigned and incremented 
	`name` varchar(30) NOT NULL,
	`surname` varchar(30) NOT NULL,
	`email` varchar(64) NOT NULL,
	`username` varchar(32) NOT NULL,
	`password` varchar(32) NOT NULL,
	PRIMARY KEY (`parent_id`)	
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;	--first auto increment assigned must be 1

--location table stores the tennis clubs address information
CREATE TABLE `location` (
	`location_id` int(11) NOT NULL AUTO_INCREMENT,	--id is automatically assigned and incremented 
	`name` varchar(64) NOT NULL,
	`address` varchar(128) NOT NULL,
	PRIMARY KEY (`location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;	--first auto increment assigned must be 1

--coach table stores each coaches information
CREATE TABLE `coach` (
	`coach_id` int(11) NOT NULL AUTO_INCREMENT,		--id is automatically assigned and incremented 
	`name` varchar(32) NOT NULL,
	`surname` varchar(32) NOT NULL,
	PRIMARY KEY (`coach_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;	--first auto increment assigned must be 1

--classlist table stores information on each class, has foreign key links to a location and coach
CREATE TABLE `classlist` (
	`class_id` int(11) NOT NULL AUTO_INCREMENT,		--id is automatically assigned and incremented 
	`class_name` varchar(10) NOT NULL,
	`start_time` datetime NOT NULL,
	`cost` int(6) NOT NULL,
	`coach_id` int(12) NOT NULL,
	`location_id` int(12) NOT NULL,
	PRIMARY KEY (`class_id`),
	CONSTRAINT `fk2_classlist_id` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`),	--link a class to a specific location
	CONSTRAINT `fk_classlist_id` FOREIGN KEY (`coach_id`) REFERENCES `coach` (`coach_id`)		--link a class to a specific coach
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;	--first auto increment assigned must be 1

--child table stores information on each child registered, with links to the class they were registered to and the parent that registered them 
CREATE TABLE `child` (
	`child_id` int(11) NOT NULL AUTO_INCREMENT,		--id is automatically assigned and incremented 
	`name` varchar(30) NOT NULL,
	`surname` varchar(30) NOT NULL,
	`age` int(11) NOT NULL,
	`parent_id` int(11) NOT NULL,
	`class_id` int(11) NOT NULL,
	PRIMARY KEY (`child_id`),
	CONSTRAINT `child_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `parent` (`parent_id`),		--link to their parent
	CONSTRAINT `child_id_fk2` FOREIGN KEY (`class_id`) REFERENCES `classlist` (`class_id`)		--link to their registered class
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;	--first auto increment assigned and incremented 


--inserting rows into the coach table
--no need for id primary key in insertion as automatically assigned 
INSERT INTO `coach`(`name`, `surname`) VALUES ('Dara','McLoughlin');
INSERT INTO `coach`(`name`, `surname`) VALUES ('Derek','Boland');
INSERT INTO `coach`(`name`, `surname`) VALUES ('Donal','Glennon');

--inserting rows into the location table 
INSERT INTO `location`(`name`, `address`) VALUES ('Rathgar Tennis Club', '100 Herzog Park, Rathgar, Dublin');
INSERT INTO `location`(`name`, `address`) VALUES ('Westwood Tennis Club', '10 Fairview Strand, Fairview, Dublin');

--inserting rows into the classlist table
--already have predetermined the coach and location foreign key values for each class 
INSERT INTO `classlist`(`class_name`, `start_time`, `cost`, `coach_id`, `location_id`) VALUES ('Red', '2016-01-01 15:00:00', '120', 1, 1);
INSERT INTO `classlist`(`class_name`, `start_time`, `cost`, `coach_id`, `location_id`) VALUES ('Orange', '2016-01-03 15:00:00', '120', 2, 2);
INSERT INTO `classlist`(`class_name`, `start_time`, `cost`, `coach_id`, `location_id`) VALUES ('Red', '2016-01-05 15:00:00', '120', 3, 1);






