#����Ա��
create table `motion_admin`(
`id` int(11) unsigned not null AUTO_INCREMENT,
`username` varchar(20) not null default  '' COMMENT '����',
`password` varchar(32) not null default '' COMMENT '����',
`create_time` int(11)  unsigned not null default 0  COMMENT '����ʱ��',
`update_time` int(11)  unsigned not null default 0  COMMENT '����ʱ��',
primary key(`id`),
unique key username(`username`)
)engine=innodb AUTO_INCREMENT=1 default charset=utf8;
INSERT INTO `motion_admin`(username,password,create_time,update_time) 
VALUES ( 'admin','e10adc3949ba59abbe56e057f20f883e','1521725536', '1521951698');

#��ʦ��
create table `motion_teacher`(
`id` int(11) unsigned not null AUTO_INCREMENT,
`username` varchar(20) not null default  '' COMMENT '�û���',
`realname` varchar(20) not null default  '' COMMENT '��ʵ����',
`sex` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0�У�1Ů',
`password` varchar(32) not null default '' COMMENT '����',
`tel` varchar(20) not null default '' COMMENT '�绰',
`email` varchar(20) not null default '' COMMENT '����',
`create_time` int(11)  unsigned not null default 0  COMMENT '����ʱ��',
`update_time` int(11)  unsigned not null default 0  COMMENT '����ʱ��',
primary key(`id`),
unique key username(`username`)
)engine=innodb AUTO_INCREMENT=1 default charset=utf8;

#�û���
create table `motion_user`(
`id` int(11) unsigned not null AUTO_INCREMENT,
`username` varchar(20) not null default  '' COMMENT '����',
`realname` varchar(20) not null default  '' COMMENT '��ʵ����',
`sex` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0�У�1Ů',
`password` varchar(32) not null default '' COMMENT '����',
`tel` varchar(20) not null default '' COMMENT '�绰',
`email` varchar(20) not null default '' COMMENT '����',
`u_course` varchar(20) default '' COMMENT '��ѡ�γ�',
`create_time` int(11)  unsigned not null default 0  COMMENT '����ʱ��',
`update_time` int(11)  unsigned not null default 0  COMMENT '����ʱ��',
primary key(`id`),
unique key username(`username`)
)engine=innodb AUTO_INCREMENT=1 default charset=utf8;

#�γ̱�
create table `motion_course`(
`id` int(11) unsigned not null AUTO_INCREMENT,
`coursename` varchar(30) not null default  '' COMMENT '�γ���',
`coursetime` varchar(30) not null COMMENT '�γ�ʱ��',
`cteacher` varchar(20) not null default  '' COMMENT '�ڿ���ʦ',
`create_time` int(11)  unsigned not null default 0  COMMENT '����ʱ��',
`update_time` int(11)  unsigned not null default 0  COMMENT '����ʱ��',
primary key(`id`),
unique key coursename(`coursename`)
)engine=innodb AUTO_INCREMENT=1 default charset=utf8;

#�����
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