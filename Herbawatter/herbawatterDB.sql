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
    password  tinytext NOT NULL,
    email  varchar(60) NOT NULL,
    primary key(email)
    );


create table IF NOT EXISTS plant(
    serial_number varchar(60) NOT NULL,
    name  varchar(60) NOT NULL,
    water  varchar(10) DEFAULT 'Normal',
    batery  varchar(10) DEFAULT 'Normal',
    image varchar(255) DEFAULT 'plantinha.png',
    primary key(serial_number)
    );


create table IF NOT EXISTS own(
    email  varchar(60) NOT NULL,
    serial_number  varchar(60) NOT NULL,
    primary key(email, serial_number),
    foreign key(email) references persona(email),
    foreign key(serial_number) references plant(serial_number)
    );

    
create table IF NOT EXISTS request(
    request_id  integer NOT NULL AUTO_INCREMENT,
    number_orders  integer NOT NULL,
    morada  varchar(100) NOT NULL,
    nif  integer NOT NULL,
    primary key(request_id)
    );


create table IF NOT EXISTS shopping(
    email  varchar(60) NOT NULL,
    request_id  integer NOT NULL,
    primary key(email, request_id),
    foreign key(email) references persona(email),
    foreign key(request_id) references request(request_id)
    );