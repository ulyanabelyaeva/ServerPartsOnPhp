CREATE DATABASE IF NOT EXISTS appDB;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT SELECT,UPDATE,INSERT ON appDB.* TO 'user'@'%';
FLUSH PRIVILEGES;

USE appDB;
CREATE TABLE IF NOT EXISTS users (
  ID INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(20) NOT NULL,
  phone VARCHAR(11) NOT NULL,
  pass VARCHAR(20) NOT NULL,
  PRIMARY KEY (ID)
);

INSERT INTO users (name, phone, pass) values ('Alex', '89180000000', 'alex');
INSERT INTO users (name, phone,  pass) values ('Bob', '89181111111', 'bob');
INSERT INTO users (name, phone, pass) values ('Kate', '89182222222', 'kate');
INSERT INTO users (name, phone, pass) values ('Lilo', '89183333333', 'lilo');

CREATE TABLE IF NOT EXISTS products (
  ID INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(20) NOT NULL,
  type VARCHAR(20) NOT NULL,
  PRIMARY KEY (ID)
);

INSERT INTO products (name, type) values ('Latte', 'coffee');
INSERT INTO products (name, type) values ('Espresso', 'coffee');
INSERT INTO products (name, type) values ('Americano', 'coffee');
INSERT INTO products (name, type) values ('Cappuccino', 'coffee');
INSERT INTO products (name, type) values ('Raf', 'coffee');
INSERT INTO products (name, type) values ('Black tea', 'tea');
INSERT INTO products (name, type) values ('Green tea', 'tea');
INSERT INTO products (name, type) values ('Matcha', 'tea');
INSERT INTO products (name, type) values ('Cocoa', 'cocoa');

CREATE TABLE IF NOT EXISTS types (
  ID INT(11) NOT NULL AUTO_INCREMENT,
  image VARCHAR(40) NOT NULL,
  cost INT NOT NULL,
  capacity INT NOT NULL,
  PRIMARY KEY (ID)
);


INSERT INTO types (image, cost, capacity) values ('1.png', 90, 200);
INSERT INTO types (image, cost, capacity) values ('2.png', 150, 300);
INSERT INTO types (image, cost, capacity) values ('3.png', 210, 400);
INSERT INTO types (image, cost, capacity) values ('4.png', 270, 600);