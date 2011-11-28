use webtool;

CREATE TABLE t_website(
	id int primary key auto_increment,
	title varchar(32) not null unique,
	url varchar(128) not null unique,
	grade int default 0,
	cid int default 0,
	image varchar(256) null,
	icon varchar(256) null,
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
	seq int not null default 0,
	create_time TIMESTAMP default now()
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE t_website_order(
	id int primary key auto_increment,
	wid int not null unique,
	score int not null default 0,
	create_time TIMESTAMP default now()
)ENGINE=InnoDB DEFAULT CHARSET=utf8;