ALTER TABLE t_blog_content CHANGE content content MEDIUMTEXT NULL ;//給content增加长度

ALTER TABLE t_finance_balance CHANGE pay_type pay_type varchar(16) NULL ;
ALTER TABLE t_finance_balance CHANGE pay_mode pay_mode varchar(16) NULL ;