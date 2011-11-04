use mytool;

CREATE TABLE t_md5_num6(
	k varchar(16) not null primary key,
	md5 varchar(16) not null unique
)ENGINE=InnoDB DEFAULT CHARSET=utf8;