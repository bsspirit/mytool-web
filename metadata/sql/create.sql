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

CREATE TABLE t_finance_balance(
	id int primary key auto_increment,
	date int not null,
	money float not null default 0,
	pay_type varchar(16) null,
	pay_mode varchar(16) null,
	description varchar(512) null,
	create_time TIMESTAMP default now()
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE t_blog_content(
	id int primary key auto_increment,
	title varchar(64) not null,
	content MEDIUMTEXT null,
	create_time TIMESTAMP default now()
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE t_dict_word(
	word varchar(32) primary key,
	phonet varchar(32) null,
	create_time TIMESTAMP default now()
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE t_dict_tag(
	id int primary key auto_increment,
	name varchar(32) unique not null,
	create_time TIMESTAMP default now()
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE t_dict_tag_word(
	id int primary key auto_increment,
	tid int not null,
	word varchar(32) not null,
	unique(tid,word),
	create_time TIMESTAMP default now()
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE t_dict_explain(
	id int primary key auto_increment,
	word varchar(32) null,
	type varchar(8) null,
	word_cn varchar(64) null,
	sentence varchar(256) null,
	sentence_cn varchar(256) null,
	create_time TIMESTAMP default now()
)ENGINE=InnoDB DEFAULT CHARSET=utf8;



