DROP DATABASE IF EXISTS `database`;
CREATE DATABASE `database`;

USE `database`;

DROP TABLE IF EXISTS `hospitals`;
CREATE TABLE `hospitals` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `category` varchar(100)
);

DROP TABLE IF EXISTS `receivers`;
CREATE TABLE `receivers` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `blood_group` varchar(100) NOT NULL,
  `category` varchar(100)
);

DROP TABLE IF EXISTS `blood_groups`;
CREATE TABLE `blood_groups` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  FOREIGN KEY (hospital_id) REFERENCES hospitals (id)
);

CREATE VIEW requests as
SELECT blood_groups.hospital_id as hospital_id, receivers.blood_group as blood_group, receivers.name as name, receivers.id as id
FROM blood_groups JOIN receivers
ON blood_groups.name = receivers.blood_group;

CREATE VIEW available_groups as
SELECT hospitals.id as hospital_id, blood_groups.name as blood_group, hospitals.name as hospital_name
FROM hospitals JOIN blood_groups
ON blood_groups.hospital_id = hospitals.id;

INSERT INTO hospitals (name, username, password, category) VALUES ('FI Hospital', 'fihospital', 'fihospital', 'hospital');
INSERT INTO hospitals (name, username, password, category) VALUES ('Apollo Hospital', 'apollohospital', 'apollohospital', 'hospital');
INSERT INTO hospitals (name, username, password, category) VALUES ('Fortis Hospital', 'fortishospital', 'fortishospital', 'hospital');
INSERT INTO hospitals (name, username, password, category) VALUES ('Kailash Hospital', 'kailashhospital', 'kailashhospital', 'hospital');
INSERT INTO hospitals (name, username, password, category) VALUES ('Yathartha Hospital', 'yatharthahospital', 'yatharthahospital', 'hospital');
INSERT INTO hospitals (name, username, password, category) VALUES ('Capital Hospital', 'capitalhospital', 'capitalhospital', 'hospital');
INSERT INTO hospitals (name, username, password, category) VALUES ('J&M Hospital', 'jnmhospital', 'jnmhospital', 'hospital');
INSERT INTO hospitals (name, username, password, category) VALUES ('Jaypee Hospital', 'jaypeehospital', 'jaypeehospital', 'hospital');

INSERT INTO blood_groups (name, hospital_id) VALUES ('B+', 1);
INSERT INTO blood_groups (name, hospital_id) VALUES ('B-', 2);
INSERT INTO blood_groups (name, hospital_id) VALUES ('AB+', 3);
INSERT INTO blood_groups (name, hospital_id) VALUES ('AB-', 4);
INSERT INTO blood_groups (name, hospital_id) VALUES ('O+', 5);
INSERT INTO blood_groups (name, hospital_id) VALUES ('O-', 6);
INSERT INTO blood_groups (name, hospital_id) VALUES ('A1+', 7);
INSERT INTO blood_groups (name, hospital_id) VALUES ('A1-', 8);
INSERT INTO blood_groups (name, hospital_id) VALUES ('A1B+', 1);
INSERT INTO blood_groups (name, hospital_id) VALUES ('A1B-', 2);
INSERT INTO blood_groups (name, hospital_id) VALUES ('A2+', 3);
INSERT INTO blood_groups (name, hospital_id) VALUES ('A2-', 4);
INSERT INTO blood_groups (name, hospital_id) VALUES ('A2B-', 5);
