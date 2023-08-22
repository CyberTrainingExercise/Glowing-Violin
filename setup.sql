create database website;
use website;
create table users(user_id int not null auto_increment, username varchar(255) not null, password varchar(255) not null, primary key (user_id));
insert into users (username, password) values ('admin','password'),('PoeTAto','potato');
create table comments(post_id int not null, poster_id int not null, content varchar(255) not null, primary key(post_id));
insert into comments(post_id, poster_id, content) values (1, 2, 'Great post, Bear! 📉📉📉😮');
