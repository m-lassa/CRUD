DROP DATABASE IF EXISTS test_db;
CREATE DATABASE test_db DEFAULT CHARACTER SET utf8 COLLATE utf8_swedish_ci;
USE test_db;
DROP TABLE IF EXISTS customers;
CREATE TABLE customers (
  id int(10) auto_increment,
  First_name varchar(25) NOT NULL,
  Last_name varchar(25) NOT NULL,
  Street text NOT NULL,
  City varchar(25) NOT NULL,
  Email varchar(25) NOT NULL,
  Phone varchar(15), 
  PRIMARY KEY  (id)
);


INSERT INTO customers (First_name, Last_name, Street, City, Email, Phone) 
VALUES  ('John','Doe','500 Pine Street','NYC', 'johndoe@mail.com','123-456-789'),
('Jim','Smith','25 25th Avenue','London', 'jimsmith9000@mail.com','987-654-321'),
('Jane','Doe','42 West Street','Kuala Lumpur', 'jane@mail.com','111-555-999');
