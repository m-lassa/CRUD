USE test_db;
DROP TABLE IF EXISTS logins;
CREATE TABLE logins (
id int(10) auto_increment,
username varchar(20) NOT NULL UNIQUE,
pass varchar(255) NOT NULL,
PRIMARY KEY  (id)
)