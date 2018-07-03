#管理员表
create table `motion_admin`(
`id` int(11) unsigned not null AUTO_INCREMENT,
`username` varchar(20) not null default  '' COMMENT '姓名',
`password` varchar(32) not null default '' COMMENT '密码',
`create_time` int(11)  unsigned not null default 0  COMMENT '创建时间',
`update_time` int(11)  unsigned not null default 0  COMMENT '更新时间',
primary key(`id`),
unique key username(`username`)
)engine=innodb AUTO_INCREMENT=1 default charset=utf8;
INSERT INTO `motion_admin`(username,password,create_time,update_time) 
VALUES ( 'admin','e10adc3949ba59abbe56e057f20f883e','1521725536', '1521951698');

#教师表
create table `motion_teacher`(
`id` int(11) unsigned not null AUTO_INCREMENT,
`username` varchar(20) not null default  '' COMMENT '用户名',
`realname` varchar(20) not null default  '' COMMENT '真实姓名',
`sex` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0男，1女',
`password` varchar(32) not null default '' COMMENT '密码',
`tel` varchar(20) not null default '' COMMENT '电话',
`email` varchar(20) not null default '' COMMENT '邮箱',
`create_time` int(11)  unsigned not null default 0  COMMENT '创建时间',
`update_time` int(11)  unsigned not null default 0  COMMENT '更新时间',
primary key(`id`),
unique key username(`username`)
)engine=innodb AUTO_INCREMENT=1 default charset=utf8;

#用户表
create table `motion_user`(
`id` int(11) unsigned not null AUTO_INCREMENT,
`username` varchar(20) not null default  '' COMMENT '姓名',
`realname` varchar(20) not null default  '' COMMENT '真实姓名',
`sex` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0男，1女',
`password` varchar(32) not null default '' COMMENT '密码',
`tel` varchar(20) not null default '' COMMENT '电话',
`email` varchar(20) not null default '' COMMENT '邮箱',
`u_course` varchar(20) default '' COMMENT '所选课程',
`create_time` int(11)  unsigned not null default 0  COMMENT '创建时间',
`update_time` int(11)  unsigned not null default 0  COMMENT '更新时间',
primary key(`id`),
unique key username(`username`)
)engine=innodb AUTO_INCREMENT=1 default charset=utf8;

#课程表
create table `motion_course`(
`id` int(11) unsigned not null AUTO_INCREMENT,
`coursename` varchar(30) not null default  '' COMMENT '课程名',
`coursetime` varchar(30) not null COMMENT '课程时间',
`cteacher` varchar(20) not null default  '' COMMENT '授课老师',
`create_time` int(11)  unsigned not null default 0  COMMENT '创建时间',
`update_time` int(11)  unsigned not null default 0  COMMENT '更新时间',
primary key(`id`),
unique key coursename(`coursename`)
)engine=innodb AUTO_INCREMENT=1 default charset=utf8;

#建议表
create table `motion_suggest`(
`id` int(11) unsigned not null AUTO_INCREMENT,
`title` varchar(50) not null default '',
`couse_id` varchar(30) not null default 0,
`teacher_id` varchar(30) not null default 0,
`suggest` text not null default '',
`create_time` int(11)  unsigned not null default 0,
`update_time` int(11)  unsigned not null default 0,
primary key(`id`),
key couse_id(`couse_id`),
key teacher_id(`teacher_id`)
)engine=innodb AUTO_INCREMENT=1 default charset=utf8;