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
    Review VARCHAR(1000),
    Sentimental_Score DECIMAL(10,5)
);

CREATE TABLE Ratings (
    Rating_ID VARCHAR(10) PRIMARY KEY,
    Org_ID VARCHAR(10),
    Item_ID VARCHAR(10),
    Rating DECIMAL(10,5)
);

CREATE TABLE Aggregate_Ratings (
    Item_ID VARCHAR(10) PRIMARY KEY,
    Org_ID VARCHAR(10),
    Rating_Score DECIMAL(10,5), 
    Review_Score DECIMAL(10,5),
    Combined_Score DECIMAL(10,5)
);

CREATE TABLE Rankings (
    Item_ID VARCHAR(10) PRIMARY KEY,
    Org_ID VARCHAR(10),
    Weighted_Score DECIMAL(10,2)
);
