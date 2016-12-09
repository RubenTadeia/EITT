USE ist175268;

SET FOREIGN_KEY_CHECKS = 0; /* Disable foreign key checking.*/
drop table if exists persona;
drop table if exists plant;
drop table if exists own;
drop table if exists request;
drop table if exists shopping;
SET FOREIGN_KEY_CHECKS = 1; /* Enable foreign key checking.*/


create table IF NOT EXISTS persona(
    name  varchar(60) NOT NULL,
    password  varchar(30) NOT NULL,
    email  varchar(60) NOT NULL,
    primary key(email)
    );


create table IF NOT EXISTS plant(
    serial_number  integer NOT NULL,
    name  varchar(30) NOT NULL,
    water  integer NOT NULL,
    batery  integer NOT NULL,
    image varchar(255),
    primary key(serial_number)
    );


create table IF NOT EXISTS own(
    email  varchar(60) NOT NULL,
    serial_number  integer NOT NULL,
    primary key(email, serial_number),
    foreign key(email) references persona(email),
    foreign key(serial_number) references plant(serial_number)
    );

    
create table IF NOT EXISTS request(
    request_id  integer NOT NULL AUTO_INCREMENT,
    number_orders  integer NOT NULL,
    morada  varchar(100) NOT NULL,
    primary key(request_id)
    );


create table IF NOT EXISTS shopping(
    email  varchar(60) NOT NULL,
    request_id  integer NOT NULL,
    primary key(email, request_id),
    foreign key(email) references persona(email),
    foreign key(request_id) references request(request_id)
    );