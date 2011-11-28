use webtool;

insert into t_website(id,title,url,cid,image) values(1,"Google","www.google.com",1,"/images/404.png");
insert into t_website(id,title,url,cid,image) values(2,"奥城兴业","www.ac-999.com",2,"/images/404.png");
insert into t_website(id,title,url,cid,image) values(3,"龙仙山安吉白茶","www.100rmb.info",2,"/images/404.png");

insert into t_website_tag(wid,tag) values(1,"搜索引擎");
insert into t_website_tag(wid,tag) values(2,"奥城兴业");
insert into t_website_tag(wid,tag) values(2,"中央空调");
insert into t_website_tag(wid,tag) values(3,"安吉白茶");

insert into t_website_catalog(id,name) values(1,"常用站点");
insert into t_website_catalog(id,name) values(2,"我的网站");

insert into t_website_order(wid,score) values(1,10);
insert into t_website_order(wid,score) values(2,100);
insert into t_website_order(wid,score) values(3,99);
