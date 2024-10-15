CREATE DATABASE RateUs;

USE RateUs;

CREATE TABLE Organisation(
    ID varchar(10) PRIMARY KEY,
    Name varchar(200),
    Owner_id varchar(10),
    Logo varchar(100),
    Address varchar(200),
    Listed_On DATE DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE User_(
    ID varchar(10) PRIMARY KEY,
    Name varchar(100),
    Email varchar(200),
    Contact varchar(12),
    Password varchar(300),
    Created_ON DATE DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Items(
    ID varchar(10) PRIMARY KEY,
    Item_Name varchar(100),
    Org_ID varchar(10),
    Added_On DATE DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Reviews (
    Review_ID VARCHAR(10) PRIMARY KEY,
    Org_ID VARCHAR(10),
    Item_ID VARCHAR(10),
    Review VARCHAR(1000)
);

CREATE TABLE Ratings (
    Rating_ID VARCHAR(10) PRIMARY KEY,
    Item_ID VARCHAR(10),
    Rating DECIMAL(3,1) CHECK (Rating >= 1 AND Rating <= 10)
);

CREATE TABLE Aggregate_Ratings (
    Item_ID VARCHAR(10) PRIMARY KEY,
    Rating DECIMAL(3,1) CHECK (Rating >= 1 AND Rating <= 10)
);

CREATE TABLE Sentimental_Scores (
    Review_ID VARCHAR(10) PRIMARY KEY,
    Sentimental_Score INT CHECK (Sentimental_Score IN (0, 1))
);