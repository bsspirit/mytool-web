use webtool;

insert into t_website(id,title,url,cid,image,icon) values(1,"Google","www.google.com",1,"/images/screen/google.com.hk.png","/images/icon/google.com.hk.ico");
insert into t_website(id,title,url,cid,image,icon) values(2,"奥城兴业","www.ac-999.com",2,"/images/screen/ac-999.com.png","/images/icon/ac-999.com.ico");
insert into t_website(id,title,url,cid,image,icon) values(3,"龙仙山安吉白茶","www.100rmb.info",2,"/images/screen/100rmb.info.png","/images/icon/100rmb.info.ico");

insert into t_website(id,title,url,cid,image) values(4,"Localhost:安吉白茶","loc.100rmb.info",3,"/images/screen/loc.100rmb.info.png");
insert into t_website(id,title,url,cid,image) values(5,"Localhost:奥城兴业","loc.ac-999.com",3,"/images/screen/loc.ac-999.com.png");
insert into t_website(id,title,url,cid,image) values(6,"Localhost:网站工具","loc.tao6s.com",3,"/images/screen/loc.tao6s.com.png");

insert into t_website(id,title,url,cid,image) values(7,"皮皮书屋","www.ppurl.com",1,"/images/screen/ppurl.com.png");
insert into t_website(id,title,url,cid,image) values(8,"WebQQ","web.qq.com",1,"/images/screen/web.qq.com.png");
insert into t_website(id,title,url,cid,image,icon) values(9,"Mahout","mahout.apahce.org",1,"/images/screen/mahout.apache.org.png","/images/icon/mahout.apache.org.ico");
insert into t_website(id,title,url,cid,image) values(10,"在线词典","dicn.cn",1,"/images/screen/dict.cn.png");
insert into t_website(id,title,url,cid,image) values(11,"GitHub","github.com",1,"/images/screen/github.com.png");


insert into t_website_tag(wid,tag) values(1,"搜索引擎");
insert into t_website_tag(wid,tag) values(2,"奥城兴业");
insert into t_website_tag(wid,tag) values(2,"中央空调");
insert into t_website_tag(wid,tag) values(3,"安吉白茶");
insert into t_website_tag(wid,tag) values(4,"安吉白茶");
insert into t_website_tag(wid,tag) values(4,"奥城兴业");
insert into t_website_tag(wid,tag) values(7,"资源下载");

insert into t_website_catalog(id,name,seq) values(1,"常用站点",1);
insert into t_website_catalog(id,name,seq) values(2,"我的网站",3);
insert into t_website_catalog(id,name,seq) values(3,"本地站点",2);

insert into t_website_order(wid,score) values(1,10);
insert into t_website_order(wid,score) values(2,100);
insert into t_website_order(wid,score) values(3,99);
insert into t_website_order(wid,score) values(4,1000);
insert into t_website_order(wid,score) values(5,999);
insert into t_website_order(wid,score) values(6,998);
insert into t_website_order(wid,score) values(7,9);
insert into t_website_order(wid,score) values(8,8);
insert into t_website_order(wid,score) values(9,7);
insert into t_website_order(wid,score) values(10,6);
