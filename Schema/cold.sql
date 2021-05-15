create database if not exists coldProduct;

use coldProduct;

create table if not exists User(
id_user int not null auto_increment,
email varchar(50) not null,
password varchar(50) not null,
constraint pk_iduser primary key (id_user)
)engine=InnoDB;
insert into user(email,password ) value  ('navarroEze@gmail.com' , '123456');

drop table category;
create table if not exists category(
id_category int not null auto_increment,
name varchar(50) not null unique,
constraint pk_idcategory primary key (id_category)
)engine=InnoDB;
drop table brand;

create table if not exists brand(
id_brand int not null auto_increment,
name varchar(50) not null unique,
idcategory int not null,
constraint pk_idbrand primary key (id_brand),
constraint fk_idcategory foreign key (idcategory) references category(id_category)
)engine = InnoDB;

create table if not exists gasType(
id_gasType int not null auto_increment,
name varchar(20) not null,
constraint pk_idgasType primary key (id_gasType)
)engine = InnoDB;

insert into gastype (name) value ('R22'),('R404A/R22'),('R404'),('R407C'),('R12');

create table if not exists aplication(
id_aplication int not null auto_increment,
name varchar(50) not null ,
constraint pk_idaplication primary key (id_aplication)
)engine = InnoDB;

insert into aplication (name) value ('Media Temperatura'),('Baja Temperatura'),('Alta Temperatura'),('Aire Acond'),('Media/Baja Temperatura');

create table if not exists Power(
id_power int not null auto_increment,
description varchar(20) not null ,
constraint pk_idpower primary key (id_power)
)engine = InnoDB;

insert into power(description) value ('1/2 HP'),('1/3 HP'),('3/4 HP'),('1 HP'),('1 1/2 HP'),('1 1/3 HP'),('1 3/4 HP'),
('2 HP'),('2 1/2 HP'), (' 2 1/3 HP'),('2 3/4 HP'),('3 HP'),('4 HP'),('5 HP'),('6 HP') ;

create table if not exists descriptionProduct(
id_dp int not null auto_increment,
idgasType int ,
idaplication int ,
idpower int,
constraint pk_iddp primary key (id_dp),
constraint fk_idgastype foreign key (idgastype) references gastype (id_gastype),
constraint fk_idaplication foreign key (idaplication) references aplication(id_aplication),
constraint fk_idpower foreign key (idpower) references power ( id_power)
)engine = InnoDB;

create table if not exists Product(
id_product int not null auto_increment,
code varchar(50) not null,
idcategory int not null,
idbrand int not null,
iddescriptionP int not null,
idprovider int not null,
dataSheet varchar(50) not null,
quantity int not null,
price_dollar DECIMAL(10, 2) DEFAULT 0 not null,
price_buy DECIMAL(10, 2) DEFAULT 0 not null,
price_pesos DECIMAL(10, 2) DEFAULT 0 not null,
price_Iva DECIMAL(10, 2) DEFAULT 0 not null,
price_sale DECIMAL(10, 2) DEFAULT 0 not null,
constraint pk_idproduct primary key (id_product),
constraint fk_idcategory foreign key (idcategory) references category(id_category) on update CASCADE ,
constraint fk_idbrand foreign key (idbrand) references brand(id_brand) on update CASCADE,
constraint fk_iddescriptionP foreign key (iddescriptionP) references descriptionProduct(id_dp) on update CASCADE,
constraint fk_idprovider foreign key (idprovider) references provider(id_provider) on update CASCADE
)engine = InnoDB;

DELIMITER $$
create procedure deleteCategory(idcategorys int)
BEGIN
declare idproduct int default 0;
select id_product into idproduct from product where idcategory = idcategorys;
if(idproduct <> 0) then
SIGNAL sqlstate '11111' SET MESSAGE_TEXT = 'Result consisted of more than one row', MYSQL_ERRNO = 9999;
else 
delete from category where id_category = idcategorys;
end if;
END $$
DELIMITER ;

DELIMITER $$
create procedure deleteBrand(idbrands int)
BEGIN
declare idproduct int default 0;
select id_product into idproduct from product where idbrand = idbrands;
if(idproduct <> 0) then
SIGNAL sqlstate '11111' SET MESSAGE_TEXT = 'Result consisted of more than one row', MYSQL_ERRNO = 9999;
else 
delete from brand where id_brand = idbrands;
end if;
END $$
DELIMITER ;

DELIMITER $$
create procedure deleteGasType(idgasTypes int)
BEGIN
declare iddp int default 0;
select id_dp into iddp from descriptionProduct where idgastype = idgasTypes;
if(iddp <> 0) then
SIGNAL sqlstate '11111' SET MESSAGE_TEXT = 'Result consisted of more than one row', MYSQL_ERRNO = 9999;
else 
delete from gasType where id_gasType = idgasTypes;
end if;
END $$
DELIMITER ;

DELIMITER $$
create procedure deleteAplication(idAplications int)
BEGIN
declare iddp int default 0;
select id_dp into iddp from descriptionProduct where idAplication = idAplications;
if(iddp <> 0) then
SIGNAL sqlstate '11111' SET MESSAGE_TEXT = 'Result consisted of more than one row', MYSQL_ERRNO = 9999;
else 
delete from Aplication where id_Aplication = idAplications;
end if;
END $$
DELIMITER ;

DELIMITER $$
create procedure deletePower(idPowers int)
BEGIN
declare iddp int default 0;
select id_dp into iddp from descriptionProduct where idPower = idPowers;
if(iddp <> 0) then
SIGNAL sqlstate '11111' SET MESSAGE_TEXT = 'Result consisted of more than one row', MYSQL_ERRNO = 9999;
else 
delete from Power where id_Power = idPowers;
end if;
END $$
DELIMITER ;