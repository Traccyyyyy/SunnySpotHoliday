/* 2. create database SunnySpot*/
CREATE DATABASE IF NOT EXISTS SunnySpot;
/* 2. use the newly created database */
USE SunnySpot;
-- 3. create tables and columns with data types, pk, fk, auto increment
CREATE TABLE Cabin (
    cabinID BIGINT AUTO_INCREMENT PRIMARY KEY,
    cabinType VARCHAR(150),
    cabinDescription VARCHAR(255),
    pricePerNight BIGINT(10),
    pricePerWeek DECIMAL(10,2),
    photo VARCHAR(50)
);
CREATE TABLE Inclusion (
    incID BIGINT AUTO_INCREMENT PRIMARY KEY,
    incName VARCHAR(50),
    incDetails VARCHAR(255)
);
CREATE TABLE Admin (
    staffID BIGINT AUTO_INCREMENT PRIMARY KEY,
    userName VARCHAR(100),
    password VARCHAR(100),
    firstName VARCHAR(50),
    lastName VARCHAR(200),
    address VARCHAR(200),
    mobile VARCHAR(8)
);
CREATE TABLE Log (
    logID BIGINT AUTO_INCREMENT PRIMARY KEY,
    loginDateTime TIMESTAMP,
    logoutDateTime TIMESTAMP,
    staffID BIGINT,
    FOREIGN KEY (staffID) REFERENCES Admin(staffID)
);
CREATE TABLE CabinInclusion (
    cabinIncID BIGINT AUTO_INCREMENT PRIMARY KEY,
    cabinID BIGINT,
    incID BIGINT,
    FOREIGN KEY (cabinID) REFERENCES Cabin(cabinID),
    FOREIGN KEY (incID) REFERENCES Inclusion(incID) 
);
-- Task1.5b
-- INSERT INTO Cabin(cabinType,cabinDescription,pricePerNight,pricePerWeek,photo) VALUES ("test cabin 2","test cabin with invalid data","-552","625","insertCabin1.jpg");
ALTER TABLE Cabin MODIFY pricePerNight BIGINT(10) UNSIGNED;
-- INSERT INTO Cabin(cabinType,cabinDescription,pricePerNight,pricePerWeek,photo) VALUES ("test cabin 3","test cabin with invalid data","52","625","insertCabin1.jpg");
ALTER TABLE Cabin MODIFY pricePerWeek DECIMAL(10,2) CHECK (pricePerWeek<=pricePerNight*5);
-- INSERT INTO Cabin(cabinType,cabinDescription,pricePerNight,pricePerWeek,photo) VALUES ("test cabin 4","test cabin without an image","100","500","no image");
ALTER TABLE Cabin
ALTER COLUMN photo SET DEFAULT "testCabin.jpg";

--Task 2 POpulate tables 
-- 1.	Populate the Cabin table 
INSERT INTO Cabin(cabinType,cabinDescription,pricePerNight,pricePerWeek,photo) 
VALUES ("Standard Cabin sleeps 4","A 2 bedroom cabin with double in main and either double or 2 singles in the second bedroom ","100","500","stCabin.jpg");

INSERT INTO Cabin(cabinType,cabinDescription,pricePerNight,pricePerWeek,photo) 
VALUES ("Standard open plan cabin sleeps 4 ","An open plan cabin with double bed and set of bunks","120","600","stOpenCabin.jpg");

INSERT INTO Cabin(cabinType,cabinDescription,pricePerNight,pricePerWeek,photo) 
VALUES ("Deluxe cabin sleeps 4 ","A 2 bedroom cabin with queen bed and 2 singles in the second bedroom","140","700","deluxCabin.jpg");

INSERT INTO Cabin(cabinType,cabinDescription,pricePerNight,pricePerWeek,photo) 
VALUES ("Villa sleeps 4 ","A 2 bedroom cabin with queen bed plus another bedroom with 2 single beds","150","750","villa.jpg");

INSERT INTO Cabin(cabinType,cabinDescription,pricePerNight,pricePerWeek,photo) 
VALUES ("Spa villa sleeps 4","A 2 bedroom cabin with queen bed plus another bedroom with 2 single beds and spa bath","200","1000","spaVilla.jpg");

INSERT INTO Cabin(cabinType,cabinDescription,pricePerNight,pricePerWeek,photo) 
VALUES ("Grass powered site","Powered sites on grass","40","200","grassPower.jpg");

INSERT INTO Cabin(cabinType,cabinDescription,pricePerNight,pricePerWeek,photo) 
VALUES ("Slab powered ","Powered sites with slab ","50","250","slabPower.jpg");

-- 2.	Populate Admin table with 2 users of your choice. 
INSERT INTO Admin(
    userName,
    password,
    firstName,
    lastName,
    address,
    mobile)
VALUES ("Owner","jj123 ","Jack","Jones","123 sunny st,qld","123 123");
INSERT INTO Admin(
    userName,
    password,
    firstName,
    lastName,
    address,
    mobile)
VALUES ("Staff1","st123 ","Jane","Jones","123 sunny st,qld","456 456");
-- 3.	Populate the Inclusion table with records 
INSERT INTO Inclusion(incName,incDetails)
VALUES ("1 bathroom",""),("1+ bathroom","1 bathroom and separate toilet"),("2 bathroom",""),("Air conditioner","Reverse cycle"),
("Ceiling fans",""),("Bunk bed",""),("2 single beds",""),("Double bed",""),("Dishwasher",""),("DVD Player",""),("Hair dryer",""); 
-- 4.	Insert the correct data to represent the following inclusions in the cabininclusion table: 
INSERT INTO CabinInclusion(cabinID,incID)
VALUES ("1","1");
INSERT INTO CabinInclusion(cabinID,incID)
VALUES ("2","2");
INSERT INTO CabinInclusion(cabinID,incID)
VALUES ("3","3"),("4","3"),("5","3");
INSERT INTO CabinInclusion(cabinID,incID)
VALUES ("3","4"),("4","4"),("5","4");
INSERT INTO CabinInclusion(cabinID,incID)
VALUES ("2","5");
INSERT INTO CabinInclusion(cabinID,incID)
VALUES ("1","6"),("2","6");
INSERT INTO CabinInclusion(cabinID,incID)
VALUES ("3","7"),("4","7"),("5","7");
INSERT INTO CabinInclusion(cabinID,incID)
VALUES ("1","8"),("2","8"),("3","8"),("4","8"),("5","8");
INSERT INTO CabinInclusion(cabinID,incID)
VALUES ("4","9"),("5","9");
INSERT INTO CabinInclusion(cabinID,incID)
VALUES ("3","10"),("4","10"),("5","10");
INSERT INTO CabinInclusion(cabinID,incID)
VALUES ("2","11"),("3","11"),("4","11"),("5","11");
