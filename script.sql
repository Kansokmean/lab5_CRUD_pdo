create database db_lab_five;

use db_lab_five;
create table tbl_lab (
id int unsigned not null auto_increment,
name varchar(255) not null,
gender char(1) not null,
primary key (id)
);
