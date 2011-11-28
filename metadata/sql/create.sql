<<<<<<< HEAD
use mytool;

CREATE TABLE t_md5_num6(
	k varchar(16) not null primary key,
	md5 varchar(16) not null unique
=======
use webtool;

CREATE TABLE t_website(
	id int primary key auto_increment,
	url varchar(128) not null unique,
	grade int default 0,
	cid int default 0,
	image varchar(256) null,
	create_time TIMESTAMP default now()
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE t_website_tag(
	id int primary key auto_increment,
	wid int not null,
	tag varchar(32) not null,	
	create_time TIMESTAMP default now(),
	unique(wid,tag)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE t_website_catalog(
	id int primary key auto_increment,
	name varchar(32) not null unique,	
	create_time TIMESTAMP default now()
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE t_website_order(
	id int primary key auto_increment,
	wid int not null unique,
	score int not null default 0,
	create_time TIMESTAMP default now()
>>>>>>> e99024c3b2e1e3af681ee270ec0a8ad5b2c1f691
)ENGINE=InnoDB DEFAULT CHARSET=utf8;