CREATE DATABASE IF NOT EXISTS appDB;
CREATE USER IF NOT EXISTS 'admin'@'%' IDENTIFIED BY 'password';
GRANT SELECT,UPDATE,INSERT ON appDB.* TO 'admin'@'%';
FLUSH PRIVILEGES;

USE appDB;
CREATE TABLE IF NOT EXISTS users (
  ID INT(11) NOT NULL AUTO_INCREMENT,
  username VARCHAR(20) NOT NULL,
  phone VARCHAR(11) NOT NULL,
  pass VARCHAR(20) NOT NULL,
  PRIMARY KEY (ID)
);

INSERT INTO users (username, phone, pass) values ('Alex', '89180000000', 'alex');
INSERT INTO users (username, phone,  pass) values ('Bob', '89181111111', 'bob');
INSERT INTO users (username, phone, pass) values ('Kate', '89182222222', 'kate');
INSERT INTO users (username, phone, pass) values ('Lilo', '89183333333', 'lilo');
