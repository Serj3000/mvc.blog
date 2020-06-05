-- drop database mvs_blog;

create database if not exists mvs_blog;

use mvs_blog;

create table if not exists users (
id int auto_increment not null,
name varchar(50),
age int,
primary key(id)
);

-- insert users 
-- (name,age)
-- values
-- ('Nic',34);

select * from users;

create table if not exists admins (
id int auto_increment not null,
login varchar(50),
passwd varchar(50),
primary key(id)
);

-- insert admins 
-- (login,passwd)
-- values
-- ('admin','admin');

select * from admins;

create table if not exists cars (
id int auto_increment not null,
model varchar(50),
numb varchar(50),
primary key(id),
foreign key (numb) references users(id)
);

-- insert cars 
-- (model,numb)
-- values
-- ('Pntium','13575');

select * from cars;

create table if not exists news (
id int auto_increment not null,
title text null,
description text null,
primary key(id)
);

-- insert news
-- (title,description)
-- values
-- ('Новость 1','Объявление Новостей 1'),
-- ('Новость 2','Объявление Новостей 2');

select * from news;
