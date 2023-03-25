create database task;

create table userinfo(
    userid int auto_increment primary key,
    username varchar(100),
    usermobile bigint,
    useremail varchar(100),
    userpassword varchar(100),
    userstatus int
);

create table categories(
    catid int auto_increment primary key,
    catname varchar(100)
);

create table brand(
    brandid int auto_increment primary key,
    brandname varchar(100)
);

--decimal 999999.99
--longtext 2^32 - 1
create table products(
    proid int auto_increment primary key,
    prodname varchar(100),
    proprice decimal(8,2),
    prodiscount tinyint,
    prodesc longtext,
    probrid int,
    procaid int,
    propath text
);