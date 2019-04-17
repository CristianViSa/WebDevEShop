
use eshop;
-- create the table
create table if not exists personnel (
    id integer primary key AUTO_INCREMENT,
    username varchar(18) not null ,
    password text not null,
    email text,
    telephone int,
    usertype text
);

create table if not exists Smartphone (
    id integer primary key AUTO_INCREMENT,
    name varchar(18) not null ,
    store integer,
    price float,
    photo text
);
-- add an administrator
insert into personnel values(null,'cristian','cristian','b00122691@student.itb.ie', 666777888, 'admin');

-- add a staff member
insert into personnel values(null,'miguel','miguel','b00122692@student.itb.ie', 888777666, 'staff');

insert into Smartphone values(null,"Huawei p10", 288, 200, "huaweip10.jpg");
insert into Smartphone values(null,"Iphone X", 20, 1000, "iPhonex.jpg");
insert into Smartphone values(null,"Xiaomi Mi 6", 300, 400, "mi6.jpg");
insert into Smartphone values(null,"Samsung Galaxy S8", 100, 800, "s8.jpg");
insert into Smartphone values(null,"Sony Xperia XZ", 50, 300, "sonyxperiaxz.jpg");
