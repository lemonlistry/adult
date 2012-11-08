/*
SQLyog 企业版 - MySQL GUI v8.14 
MySQL - 5.5.16 : Database - i
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`i` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `i`;

/*Table structure for table `i_ad` */

DROP TABLE IF EXISTS `i_ad`;

CREATE TABLE `i_ad` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `title` varchar(255) NOT NULL COMMENT '广告名称',
  `position` int(11) NOT NULL COMMENT '广告位置, 0首页轮播',
  `href` varchar(255) NOT NULL COMMENT '广告链接',
  `path` varchar(255) DEFAULT NULL COMMENT '广告图片路径',
  `category` int(11) NOT NULL COMMENT '广告类别',
  `type` tinyint(1) NOT NULL COMMENT '广告类型(0为图片，1为文字)',
  `status` tinyint(1) NOT NULL COMMENT '广告状态(0为无效，1为有效)',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `Index_category_type_status` (`category`,`type`,`status`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='广告表';

/*Data for the table `i_ad` */

insert  into `i_ad`(`id`,`title`,`position`,`href`,`path`,`category`,`type`,`status`,`create_time`) values (2,'43',0,'43','43',0,0,0,1347010955);

/*Table structure for table `i_attr_value_rel` */

DROP TABLE IF EXISTS `i_attr_value_rel`;

CREATE TABLE `i_attr_value_rel` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `item_id` int(11) DEFAULT NULL COMMENT '商品ID',
  `attr_id` int(11) DEFAULT NULL COMMENT '属性ID',
  `attr_value_id` int(11) DEFAULT NULL COMMENT '属性值ID',
  PRIMARY KEY (`id`),
  KEY `Index_item_id` (`item_id`),
  KEY `Index_attr_id` (`attr_id`),
  KEY `Index_attr_value_id` (`attr_value_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='商品属性值关系表';

/*Data for the table `i_attr_value_rel` */

/*Table structure for table `i_attribute` */

DROP TABLE IF EXISTS `i_attribute`;

CREATE TABLE `i_attribute` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '属性ID',
  `cid` int(11) NOT NULL COMMENT '分类ID',
  `name` varchar(255) NOT NULL COMMENT '属性名称',
  `type` tinyint(1) NOT NULL COMMENT '属性类型(0为单选，1为复选，2为下拉框)',
  `level` int(11) NOT NULL COMMENT '属性排序',
  PRIMARY KEY (`id`),
  KEY `Index_cid` (`cid`),
  KEY `Index_level` (`level`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='商品属性表';

/*Data for the table `i_attribute` */

/*Table structure for table `i_attribute_value` */

DROP TABLE IF EXISTS `i_attribute_value`;

CREATE TABLE `i_attribute_value` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `attr_id` int(11) DEFAULT NULL COMMENT '属性ID',
  `value` varchar(255) DEFAULT NULL COMMENT '属性值',
  `level` int(11) DEFAULT NULL COMMENT '属性值排序',
  PRIMARY KEY (`id`),
  KEY `Index_attr_id` (`attr_id`),
  KEY `Index_level` (`level`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='商品属性值表';

/*Data for the table `i_attribute_value` */

/*Table structure for table `i_b_log` */

DROP TABLE IF EXISTS `i_b_log`;

CREATE TABLE `i_b_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `module` varchar(20) NOT NULL COMMENT '模块',
  `level` varchar(10) NOT NULL COMMENT '级别',
  `request_url` varchar(255) NOT NULL COMMENT '请求地址',
  `request_type` varchar(10) NOT NULL COMMENT '请求类型',
  `browse` varchar(255) NOT NULL COMMENT '浏览器',
  `client_ip` varchar(20) NOT NULL COMMENT '客户端IP',
  `file_name` varchar(255) NOT NULL COMMENT '请求文件名',
  `line_number` int(11) NOT NULL COMMENT '文件行数',
  `msg` varchar(255) NOT NULL COMMENT '日志信息',
  `param` text NOT NULL COMMENT '请求参数',
  `operator` varchar(255) NOT NULL COMMENT '操作证',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `Index_module` (`module`),
  KEY `Index_operator` (`operator`),
  KEY `Index_create_time` (`create_time`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='操作日志表';

/*Data for the table `i_b_log` */

insert  into `i_b_log`(`id`,`module`,`level`,`request_url`,`request_type`,`browse`,`client_ip`,`file_name`,`line_number`,`msg`,`param`,`operator`,`create_time`) values (1,'passport','INFO','http://127.0.0.9/backend/index.php?r=passport/default/updatepassword&old_password=111111&new_password=111111&confirm_password=111111','GET','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\backend\\protected\\modules\\passport\\controllers\\DefaultController.php',67,'密码更新成功','Array\n(\n    [r] => passport/default/updatepassword\n    [old_password] => 111111\n    [new_password] => 111111\n    [confirm_password] => 111111\n)\n','admin',1346747001),(2,'passport','INFO','http://127.0.0.9/backend/index.php?r=passport/default/updatepassword&old_password=111111&new_password=123456&confirm_password=123456','GET','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\backend\\protected\\modules\\passport\\controllers\\DefaultController.php',67,'密码更新成功','Array\n(\n    [r] => passport/default/updatepassword\n    [old_password] => 111111\n    [new_password] => 123456\n    [confirm_password] => 123456\n)\n','admin',1346747090),(3,'passport','INFO','http://127.0.0.9/backend/index.php?r=passport/default/updatepassword&old_password=123456&new_password=111111&confirm_password=111111','GET','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\backend\\protected\\modules\\passport\\controllers\\DefaultController.php',67,'密码更新成功','Array\n(\n    [r] => passport/default/updatepassword\n    [old_password] => 123456\n    [new_password] => 111111\n    [confirm_password] => 111111\n)\n','admin',1346747104),(4,'passport','INFO','http://127.0.0.9/backend/index.php?r=passport/role/updaterole&id=1','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\passport\\controllers\\RoleController.php',54,'角色更新成功','Array\n(\n    [r] => passport/role/updaterole\n    [id] => 1\n    [Role] => Array\n        (\n            [name] => admin\n            [desc] => admin1\n            [id] => 1\n        )\n\n)\n','admin',1346753048),(5,'passport','INFO','http://127.0.0.9/backend/index.php?r=passport/role/addrole','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\passport\\controllers\\RoleController.php',28,'角色添加成功','Array\n(\n    [r] => passport/role/addrole\n    [Role] => Array\n        (\n            [name] => 66\n            [desc] => 66\n            [id] => 0\n        )\n\n)\n','admin',1346753145),(6,'passport','INFO','http://127.0.0.9/backend/index.php?r=passport/role/deleterole&id=1','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\passport\\controllers\\RoleController.php',64,'角色删除成功','Array\n(\n    [r] => passport/role/deleterole\n    [id] => 1\n    [ajax] => 1\n)\n','admin',1346753150),(7,'passport','INFO','http://127.0.0.9/backend/index.php?r=passport/role/addrole','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\passport\\controllers\\RoleController.php',28,'角色添加成功','Array\n(\n    [r] => passport/role/addrole\n    [Role] => Array\n        (\n            [name] => 6767\n            [desc] => 7676\n            [id] => 0\n        )\n\n)\n','admin',1346807496),(8,'passport','INFO','http://127.0.0.9/backend/index.php?r=passport/role/updaterole&id=3','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\passport\\controllers\\RoleController.php',46,'角色更新成功','Array\n(\n    [r] => passport/role/updaterole\n    [id] => 3\n    [Role] => Array\n        (\n            [name] => 6767\n            [desc] => 767688\n            [id] => 3\n        )\n\n)\n','admin',1346807500),(9,'passport','INFO','http://127.0.0.9/backend/index.php?r=passport/role/deleterole&id=3','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\passport\\controllers\\RoleController.php',64,'角色删除成功','Array\n(\n    [r] => passport/role/deleterole\n    [id] => 3\n    [ajax] => 1\n)\n','admin',1346807503),(10,'passport','INFO','http://127.0.0.9/backend/index.php?r=passport/user/updateuser&id=1','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\passport\\controllers\\UserController.php',63,'用户更新成功','Array\n(\n    [r] => passport/user/updateuser\n    [id] => 1\n    [User] => Array\n        (\n            [role_id] => 2\n            [username] => admin\n            [password] => 96e79218965eb72c92a549dd5a330112\n            [id] => 1\n        )\n\n)\n','admin',1346807592),(11,'passport','INFO','http://127.0.0.9/backend/index.php?r=passport/user/adduser','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\passport\\controllers\\UserController.php',37,'用户添加成功','Array\n(\n    [r] => passport/user/adduser\n    [User] => Array\n        (\n            [role_id] => 2\n            [username] => 4354\n            [password] => 5454\n            [id] => 0\n        )\n\n)\n','admin',1346807622),(12,'passport','INFO','http://127.0.0.9/backend/index.php?r=passport/role/addrole','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\passport\\controllers\\RoleController.php',28,'角色添加成功','Array\n(\n    [r] => passport/role/addrole\n    [Role] => Array\n        (\n            [name] => 6656\n            [desc] => 5656\n            [id] => 0\n        )\n\n)\n','admin',1346807629),(13,'passport','INFO','http://127.0.0.9/backend/index.php?r=passport/user/adduser','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\passport\\controllers\\UserController.php',37,'用户添加成功','Array\n(\n    [r] => passport/user/adduser\n    [User] => Array\n        (\n            [role_id] => 4\n            [username] => 656\n            [password] => 6565\n            [id] => 0\n        )\n\n)\n','admin',1346807635),(14,'passport','INFO','http://127.0.0.9/backend/index.php?r=passport/user/updateuser&id=3','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\passport\\controllers\\UserController.php',62,'用户更新成功','Array\n(\n    [r] => passport/user/updateuser\n    [id] => 3\n    [User] => Array\n        (\n            [role_id] => 4\n            [username] => 656454\n            [password] => e615c82aba461681ade82da2da38004a\n            [id] => 3\n        )\n\n)\n','admin',1346807640),(15,'passport','INFO','http://127.0.0.9/backend/index.php?r=passport/user/updateuser&id=3','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\passport\\controllers\\UserController.php',62,'用户更新成功','Array\n(\n    [r] => passport/user/updateuser\n    [id] => 3\n    [User] => Array\n        (\n            [role_id] => 2\n            [username] => 656454\n            [password] => d3ecc7f253f90d22fadbff4b5d9b3877\n            [id] => 3\n        )\n\n)\n','admin',1346807645),(16,'passport','INFO','http://127.0.0.9/backend/index.php?r=passport/user/deleteuser&id=2','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\passport\\controllers\\UserController.php',83,'用户删除成功','Array\n(\n    [r] => passport/user/deleteuser\n    [id] => 2\n    [ajax] => 1\n)\n','admin',1346807649),(17,'passport','INFO','http://127.0.0.9/backend/index.php?r=passport/user/adduser','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\passport\\controllers\\UserController.php',37,'用户添加成功','Array\n(\n    [r] => passport/user/adduser\n    [User] => Array\n        (\n            [role_id] => 4\n            [username] => 123\n            [password] => 3232\n            [id] => 0\n        )\n\n)\n','admin',1346807684),(18,'passport','INFO','http://127.0.0.9/backend/index.php?r=passport/resource/addresource','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\passport\\controllers\\ResourceController.php',28,'资源添加成功','Array\n(\n    [r] => passport/resource/addresource\n    [Resource] => Array\n        (\n            [name] => 45\n            [tag] => t\n            [desc] => 455\n            [id] => 0\n        )\n\n)\n','admin',1346807726),(19,'passport','INFO','http://127.0.0.9/backend/index.php?r=passport/resource/addresource','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\passport\\controllers\\ResourceController.php',28,'资源添加成功','Array\n(\n    [r] => passport/resource/addresource\n    [Resource] => Array\n        (\n            [name] => 455\n            [tag] => t5\n            [desc] => ttt\n            [id] => 0\n        )\n\n)\n','admin',1346807915),(20,'passport','INFO','http://127.0.0.9/backend/index.php?r=passport/user/adduser','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\passport\\controllers\\UserController.php',37,'用户添加成功','Array\n(\n    [r] => passport/user/adduser\n    [User] => Array\n        (\n            [role_id] => 2\n            [username] => 1234\n            [password] => 23343\n            [id] => 0\n        )\n\n)\n','admin',1346807964),(21,'passport','INFO','http://127.0.0.9/backend/index.php?r=passport/user/updateuser&id=5','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\passport\\controllers\\UserController.php',62,'用户更新成功','Array\n(\n    [r] => passport/user/updateuser\n    [id] => 5\n    [User] => Array\n        (\n            [role_id] => 2\n            [username] => 1234\n            [password] => 38b8e8fe30cd2f6f7e79f6be6905fabb\n            [id] => 5\n        )\n\n)\n','admin',1346807967),(22,'passport','INFO','http://127.0.0.9/backend/index.php?r=passport/role/updaterole&id=2','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\passport\\controllers\\RoleController.php',46,'角色更新成功','Array\n(\n    [r] => passport/role/updaterole\n    [id] => 2\n    [Role] => Array\n        (\n            [name] => 66323\n            [desc] => 663232\n            [id] => 2\n        )\n\n)\n','admin',1346808056),(23,'passport','INFO','http://127.0.0.9/backend/index.php?r=passport/role/addrole','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\passport\\controllers\\RoleController.php',28,'角色添加成功','Array\n(\n    [r] => passport/role/addrole\n    [Role] => Array\n        (\n            [name] => 665654\n            [desc] => 3242312\n            [id] => 0\n        )\n\n)\n','admin',1346808064),(24,'passport','INFO','http://127.0.0.9/backend/index.php?r=passport/user/adduser','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\passport\\controllers\\UserController.php',37,'用户添加成功','Array\n(\n    [r] => passport/user/adduser\n    [User] => Array\n        (\n            [role_id] => 2\n            [username] => 123342\n            [password] => 2323\n            [id] => 0\n        )\n\n)\n','admin',1346808084),(25,'passport','INFO','http://127.0.0.9/backend/index.php?r=passport/resource/addresource','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\passport\\controllers\\ResourceController.php',28,'资源添加成功','Array\n(\n    [r] => passport/resource/addresource\n    [Resource] => Array\n        (\n            [name] => 45321\n            [tag] => t32\n            [desc] => 5465\n            [id] => 0\n        )\n\n)\n','admin',1346808114),(26,'passport','INFO','http://127.0.0.9/backend/index.php?r=passport/resource/addresource','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\passport\\controllers\\ResourceController.php',28,'资源添加成功','Array\n(\n    [r] => passport/resource/addresource\n    [Resource] => Array\n        (\n            [name] => 1\n            [tag] => 1\n            [desc] => 1\n            [id] => 0\n        )\n\n)\n','admin',1346808130),(27,'passport','INFO','http://127.0.0.9/backend/index.php?r=passport/resource/updateresource&id=5','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\passport\\controllers\\ResourceController.php',46,'资源更新成功','Array\n(\n    [r] => passport/resource/updateresource\n    [id] => 5\n    [Resource] => Array\n        (\n            [name] => 1\n            [tag] => 13\n            [desc] => 1\n            [id] => 5\n        )\n\n)\n','admin',1346808137),(28,'passport','INFO','http://127.0.0.9/backend/index.php?r=passport/resource/deleteresource&id=5','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\passport\\controllers\\ResourceController.php',64,'资源删除成功','Array\n(\n    [r] => passport/resource/deleteresource\n    [id] => 5\n    [ajax] => 1\n)\n','admin',1346808139),(29,'passport','INFO','http://127.0.0.9/backend/index.php?r=passport/resource/addresourcebind','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\passport\\controllers\\ResourceController.php',99,'资源绑定添加成功','Array\n(\n    [r] => passport/resource/addresourcebind\n    [Path] => Array\n        (\n            [resource_id] => 1\n            [path] => 323\n        )\n\n    [ResourceRelate] => Array\n        (\n            [id] => 0\n        )\n\n)\n','admin',1346809612),(30,'passport','INFO','http://127.0.0.9/backend/index.php?r=passport/resource/addresourcebind','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\passport\\controllers\\ResourceController.php',99,'资源绑定添加成功','Array\n(\n    [r] => passport/resource/addresourcebind\n    [Path] => Array\n        (\n            [resource_id] => 1\n            [path] => 7676\n        )\n\n    [ResourceRelate] => Array\n        (\n            [id] => 0\n        )\n\n)\n','admin',1346809617),(31,'passport','INFO','http://127.0.0.9/backend/index.php?r=passport/resource/updateresourcebind&id=2','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\passport\\controllers\\ResourceController.php',116,'资源绑定更新成功','Array\n(\n    [r] => passport/resource/updateresourcebind\n    [id] => 2\n    [Path] => Array\n        (\n            [resource_id] => 1\n            [path] => 76766565\n            [id] => 2\n        )\n\n)\n','admin',1346809721),(32,'passport','INFO','http://127.0.0.9/backend/index.php?r=passport/resource/updateresourcebind&id=2','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\passport\\controllers\\ResourceController.php',116,'资源绑定更新成功','Array\n(\n    [r] => passport/resource/updateresourcebind\n    [id] => 2\n    [Path] => Array\n        (\n            [resource_id] => 3\n            [path] => 76766565\n            [id] => 2\n        )\n\n)\n','admin',1346809724),(33,'passport','INFO','http://127.0.0.9/backend/index.php?r=passport/resource/deleteresourcebind&id=2','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\passport\\controllers\\ResourceController.php',141,'资源绑定删除成功','Array\n(\n    [r] => passport/resource/deleteresourcebind\n    [id] => 2\n    [ajax] => 1\n)\n','admin',1346809728),(34,'passport','INFO','http://127.0.0.9/backend/index.php?r=core/href/addhref','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\HrefController.php',27,'友情链接添加成功','Array\n(\n    [r] => core/href/addhref\n    [Href] => Array\n        (\n            [title] => 76\n            [target] => 76\n            [position] => 67\n            [status] => 0\n            [path] => 7676\n            [type] => 0\n            [id] => 0\n        )\n\n)\n','admin',1347009375),(35,'passport','INFO','http://127.0.0.9/backend/index.php?r=core/href/addhref','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\HrefController.php',27,'友情链接添加成功','Array\n(\n    [r] => core/href/addhref\n    [Href] => Array\n        (\n            [title] => 87\n            [target] => 87\n            [position] => 0\n            [status] => 0\n            [path] => 87\n            [type] => 0\n            [id] => 0\n        )\n\n)\n','admin',1347009580),(36,'core','INFO','http://127.0.0.9/backend/index.php?r=core/href/updatehref&id=1','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\HrefController.php',45,'友情链接更新成功','Array\n(\n    [r] => core/href/updatehref\n    [id] => 1\n    [Href] => Array\n        (\n            [title] => 1\n            [target] => 1\n            [position] => 0\n            [status] => 0\n            [path] => 999\n            [type] => 0\n            [id] => 1\n        )\n\n)\n','admin',1347009692),(37,'core','INFO','http://127.0.0.9/backend/index.php?r=core/href/updatehref&id=1','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\HrefController.php',45,'友情链接更新成功','Array\n(\n    [r] => core/href/updatehref\n    [id] => 1\n    [Href] => Array\n        (\n            [title] => 1\n            [target] => 1\n            [position] => 0\n            [status] => 0\n            [path] => 99999\n            [type] => 0\n            [id] => 1\n        )\n\n)\n','admin',1347009697),(38,'Href','INFO','http://127.0.0.9/backend/index.php?r=core/href/deletehref&id=1','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\HrefController.php',64,'友情链接删除成功','Array\n(\n    [r] => core/href/deletehref\n    [id] => 1\n    [ajax] => 1\n)\n','admin',1347009743),(39,'core','INFO','http://127.0.0.9/backend/index.php?r=core/information/addinformation','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\InformationController.php',27,'资讯添加成功','Array\n(\n    [r] => core/information/addinformation\n    [Information] => Array\n        (\n            [title] => 3443\n            [content] => 4343\n            [status] => 0\n            [type] => 0\n            [id] => 0\n        )\n\n)\n','admin',1347010453),(40,'core','INFO','http://127.0.0.9/backend/index.php?r=core/information/addinformation','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\InformationController.php',27,'资讯添加成功','Array\n(\n    [r] => core/information/addinformation\n    [Information] => Array\n        (\n            [title] => 6565\n            [content] => 6565\n            [status] => 0\n            [type] => 0\n            [id] => 0\n        )\n\n)\n','admin',1347010458),(41,'core','INFO','http://127.0.0.9/backend/index.php?r=core/information/updateinformation&id=3','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\InformationController.php',45,'资讯更新成功','Array\n(\n    [r] => core/information/updateinformation\n    [id] => 3\n    [Information] => Array\n        (\n            [title] => 6565\n            [content] => 65655665\n            [status] => 1\n            [type] => 1\n            [id] => 3\n        )\n\n)\n','admin',1347010465),(42,'core','INFO','http://127.0.0.9/backend/index.php?r=core/information/deleteinformation&id=3','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\InformationController.php',64,'资讯删除成功','Array\n(\n    [r] => core/information/deleteinformation\n    [id] => 3\n    [ajax] => 1\n)\n','admin',1347010467),(43,'core','INFO','http://127.0.0.9/backend/index.php?r=core/ad/addad','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\AdController.php',27,'广告添加成功','Array\n(\n    [r] => core/ad/addad\n    [Ad] => Array\n        (\n            [title] => 43\n            [position] => 0\n            [path] => 43\n            [href] => 43\n            [category] => 34\n            [status] => 0\n            [type] => 0\n            [id] => 0\n        )\n\n)\n','admin',1347010955),(44,'core','INFO','http://127.0.0.9/backend/index.php?r=core/ad/addad','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\AdController.php',27,'广告添加成功','Array\n(\n    [r] => core/ad/addad\n    [Ad] => Array\n        (\n            [title] => 43\n            [position] => 0\n            [path] => 43\n            [href] => 43\n            [category] => 0\n            [status] => 0\n            [type] => 0\n            [id] => 0\n        )\n\n)\n','admin',1347011036),(45,'core','INFO','http://127.0.0.9/backend/index.php?r=core/ad/updatead&id=3','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\AdController.php',45,'广告更新成功','Array\n(\n    [r] => core/ad/updatead\n    [id] => 3\n    [Ad] => Array\n        (\n            [title] => 43\n            [position] => 0\n            [path] => 43432\n            [href] => 4323\n            [category] => 0\n            [status] => 1\n            [type] => 0\n            [id] => 3\n        )\n\n)\n','admin',1347011042),(46,'core','INFO','http://127.0.0.9/backend/index.php?r=core/ad/deletead&id=3','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\AdController.php',64,'广告删除成功','Array\n(\n    [r] => core/ad/deletead\n    [id] => 3\n    [ajax] => 1\n)\n','admin',1347011045),(47,'core','INFO','http://127.0.0.9/backend/index.php?r=core/href/addhref','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\HrefController.php',32,'友情链接添加成功','Array\n(\n    [r] => core/href/addhref\n    [Href] => Array\n        (\n            [title] => 98\n            [target] => 98\n            [position] => 0\n            [status] => 0\n            [path] => \n            [type] => 0\n            [id] => 0\n        )\n\n)\n','admin',1347071274),(48,'core','INFO','http://127.0.0.9/backend/index.php?r=core/href/addhref','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\HrefController.php',32,'友情链接添加成功','Array\n(\n    [r] => core/href/addhref\n    [Href] => Array\n        (\n            [title] => 76767\n            [target] => 7676\n            [position] => 0\n            [status] => 0\n            [path] => \n            [type] => 0\n            [id] => 0\n        )\n\n)\n','admin',1347071589),(49,'core','INFO','http://127.0.0.9/backend/index.php?r=core/href/updatehref&id=5','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\HrefController.php',50,'友情链接更新成功','Array\n(\n    [r] => core/href/updatehref\n    [id] => 5\n    [Href] => Array\n        (\n            [title] => 76767\n            [target] => 7676767\n            [position] => 0\n            [status] => 0\n            [path] => \n            [type] => 0\n            [id] => 5\n        )\n\n)\n','admin',1347071786),(50,'core','INFO','http://127.0.0.9/backend/index.php?r=core/href/updatehref&id=5','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\HrefController.php',58,'友情链接更新成功','Array\n(\n    [r] => core/href/updatehref\n    [id] => 5\n    [Href] => Array\n        (\n            [title] => 76767\n            [target] => 7676767\n            [position] => 0\n            [status] => 0\n            [path] => \n            [type] => 0\n            [id] => 5\n        )\n\n)\n','admin',1347071869),(51,'core','INFO','http://127.0.0.9/backend/index.php?r=core/href/updatehref&id=5','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\HrefController.php',58,'友情链接更新成功','Array\n(\n    [r] => core/href/updatehref\n    [id] => 5\n    [Href] => Array\n        (\n            [title] => 76767\n            [target] => 7676767\n            [position] => 0\n            [status] => 0\n            [path] => \n            [type] => 0\n            [id] => 5\n        )\n\n)\n','admin',1347071873),(52,'core','INFO','http://127.0.0.9/backend/index.php?r=core/href/updatehref&id=5','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\HrefController.php',58,'友情链接更新成功','Array\n(\n    [r] => core/href/updatehref\n    [id] => 5\n    [Href] => Array\n        (\n            [title] => 76767\n            [target] => 7676767\n            [position] => 0\n            [status] => 0\n            [path] => \n            [type] => 0\n            [id] => 5\n        )\n\n)\n','admin',1347071876),(53,'core','INFO','http://127.0.0.9/backend/index.php?r=core/href/updatehref&id=5','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\HrefController.php',58,'友情链接更新成功','Array\n(\n    [r] => core/href/updatehref\n    [id] => 5\n    [Href] => Array\n        (\n            [title] => 767678787\n            [target] => 7676767\n            [position] => 0\n            [status] => 0\n            [path] => \n            [type] => 0\n            [id] => 5\n        )\n\n)\n','admin',1347071880),(54,'core','INFO','http://127.0.0.9/backend/index.php?r=core/href/updatehref&id=4','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\HrefController.php',64,'友情链接更新成功','Array\n(\n    [r] => core/href/updatehref\n    [id] => 4\n    [Href] => Array\n        (\n            [title] => 98\n            [target] => 98\n            [position] => 0\n            [status] => 0\n            [path] => \n            [type] => 0\n            [id] => 4\n        )\n\n)\n','admin',1347072063),(55,'core','INFO','http://127.0.0.9/backend/index.php?r=core/href/updatehref&id=5','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\HrefController.php',64,'友情链接更新成功','Array\n(\n    [r] => core/href/updatehref\n    [id] => 5\n    [Href] => Array\n        (\n            [title] => 767678787\n            [target] => 7676767\n            [position] => 0\n            [status] => 0\n            [path] => \n            [type] => 0\n            [id] => 5\n        )\n\n)\n','admin',1347072069),(56,'core','INFO','http://127.0.0.9/backend/index.php?r=core/href/updatehref&id=2','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\HrefController.php',64,'友情链接更新成功','Array\n(\n    [r] => core/href/updatehref\n    [id] => 2\n    [Href] => Array\n        (\n            [title] => 76\n            [target] => 76\n            [position] => 0\n            [status] => 0\n            [path] => \n            [type] => 0\n            [id] => 2\n        )\n\n)\n','admin',1347072115),(57,'core','INFO','http://127.0.0.9/backend/index.php?r=core/href/updatehref&id=2','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\HrefController.php',64,'友情链接更新成功','Array\n(\n    [r] => core/href/updatehref\n    [id] => 2\n    [Href] => Array\n        (\n            [title] => 76\n            [target] => 76\n            [position] => 0\n            [status] => 0\n            [path] => \n            [type] => 0\n            [id] => 2\n        )\n\n)\n','admin',1347072127),(58,'core','INFO','http://127.0.0.9/backend/index.php?r=core/href/updatehref&id=3','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\HrefController.php',64,'友情链接更新成功','Array\n(\n    [r] => core/href/updatehref\n    [id] => 3\n    [Href] => Array\n        (\n            [title] => 87\n            [target] => 87\n            [position] => 0\n            [status] => 0\n            [path] => \n            [type] => 0\n            [id] => 3\n        )\n\n)\n','admin',1347072154),(59,'core','INFO','http://127.0.0.9/backend/index.php?r=core/href/updatehref&id=2','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\HrefController.php',64,'友情链接更新成功','Array\n(\n    [r] => core/href/updatehref\n    [id] => 2\n    [Href] => Array\n        (\n            [title] => 76\n            [target] => 76\n            [position] => 0\n            [status] => 0\n            [path] => \n            [type] => 0\n            [id] => 2\n        )\n\n)\n','admin',1347072215),(60,'core','INFO','http://127.0.0.9/backend/index.php?r=core/href/updatehref&id=2','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\HrefController.php',64,'友情链接更新成功','Array\n(\n    [r] => core/href/updatehref\n    [id] => 2\n    [Href] => Array\n        (\n            [title] => 76\n            [target] => 76\n            [position] => 0\n            [status] => 0\n            [path] => \n            [type] => 0\n            [id] => 2\n        )\n\n)\n','admin',1347072223),(61,'core','INFO','http://127.0.0.9/backend/index.php?r=core/href/updatehref&id=2','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\HrefController.php',64,'友情链接更新成功','Array\n(\n    [r] => core/href/updatehref\n    [id] => 2\n    [Href] => Array\n        (\n            [title] => 763\n            [target] => 763\n            [position] => 0\n            [status] => 0\n            [path] => \n            [type] => 0\n            [id] => 2\n        )\n\n)\n','admin',1347072229),(62,'core','INFO','http://127.0.0.9/backend/index.php?r=core/href/updatehref&id=2','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\HrefController.php',64,'友情链接更新成功','Array\n(\n    [r] => core/href/updatehref\n    [id] => 2\n    [Href] => Array\n        (\n            [title] => 763\n            [target] => 763\n            [position] => 0\n            [status] => 0\n            [path] => \n            [type] => 0\n            [id] => 2\n        )\n\n)\n','admin',1347072237),(63,'core','INFO','http://127.0.0.9/backend/index.php?r=core/ad/addad','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\AdController.php',33,'广告添加成功','Array\n(\n    [r] => core/ad/addad\n    [Ad] => Array\n        (\n            [title] => 87\n            [position] => 0\n            [path] => \n            [href] => 87\n            [category] => 0\n            [status] => 0\n            [type] => 0\n            [id] => 0\n        )\n\n)\n','admin',1347072588),(64,'core','INFO','http://127.0.0.9/backend/index.php?r=core/ad/updatead&id=3','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\AdController.php',64,'广告更新成功','Array\n(\n    [r] => core/ad/updatead\n    [id] => 3\n    [Ad] => Array\n        (\n            [title] => 87\n            [position] => 0\n            [path] => \n            [href] => 87\n            [category] => 0\n            [status] => 0\n            [type] => 0\n            [id] => 3\n        )\n\n)\n','admin',1347072630),(65,'core','INFO','http://127.0.0.9/backend/index.php?r=core/ad/updatead&id=3','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\AdController.php',64,'广告更新成功','Array\n(\n    [r] => core/ad/updatead\n    [id] => 3\n    [Ad] => Array\n        (\n            [title] => 8798\n            [position] => 0\n            [path] => \n            [href] => 87\n            [category] => 0\n            [status] => 0\n            [type] => 0\n            [id] => 3\n        )\n\n)\n','admin',1347072639),(66,'core','INFO','http://127.0.0.9/backend/index.php?r=core/ad/deletead&id=3','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\AdController.php',87,'广告删除成功','Array\n(\n    [r] => core/ad/deletead\n    [id] => 3\n    [ajax] => 1\n)\n','admin',1347072880),(67,'core','INFO','http://127.0.0.9/backend/index.php?r=core/href/deletehref&id=2','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\HrefController.php',87,'友情链接删除成功','Array\n(\n    [r] => core/href/deletehref\n    [id] => 2\n    [ajax] => 1\n)\n','admin',1347072889),(68,'core','INFO','http://127.0.0.9/backend/index.php?r=core/brand/addbrand','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\BrandController.php',33,'品牌添加成功','Array\n(\n    [r] => core/brand/addbrand\n    [Brand] => Array\n        (\n            [name] => 87\n            [logo] => \n            [desc] => 87\n            [sort] => 87\n            [recommend] => 0\n            [id] => 0\n        )\n\n)\n','admin',1347073461),(69,'core','INFO','http://127.0.0.9/backend/index.php?r=core/brand/updatebrand&id=2','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\BrandController.php',64,'品牌更新成功','Array\n(\n    [r] => core/brand/updatebrand\n    [id] => 2\n    [Brand] => Array\n        (\n            [name] => 87\n            [logo] => \n            [desc] => 87\n            [sort] => 8787\n            [recommend] => 1\n            [id] => 2\n        )\n\n)\n','admin',1347073588),(70,'core','INFO','http://127.0.0.9/backend/index.php?r=core/brand/updatebrand&id=2','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\BrandController.php',64,'品牌更新成功','Array\n(\n    [r] => core/brand/updatebrand\n    [id] => 2\n    [Brand] => Array\n        (\n            [name] => 8787\n            [logo] => \n            [desc] => 8787\n            [sort] => 8787\n            [recommend] => 1\n            [id] => 2\n        )\n\n)\n','admin',1347073595),(71,'core','INFO','http://127.0.0.9/backend/index.php?r=core/brand/updatebrand&id=2','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\BrandController.php',64,'品牌更新成功','Array\n(\n    [r] => core/brand/updatebrand\n    [id] => 2\n    [Brand] => Array\n        (\n            [name] => 8787\n            [logo] => \n            [desc] => 8787\n            [sort] => 8787\n            [recommend] => 1\n            [id] => 2\n        )\n\n)\n','admin',1347073605),(72,'core','INFO','http://127.0.0.9/backend/index.php?r=core/brand/updatebrand&id=2','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\BrandController.php',64,'品牌更新成功','Array\n(\n    [r] => core/brand/updatebrand\n    [id] => 2\n    [Brand] => Array\n        (\n            [name] => 8787\n            [logo] => \n            [desc] => 8787\n            [sort] => 8787\n            [recommend] => 1\n            [id] => 2\n        )\n\n)\n','admin',1347073632),(73,'core','INFO','http://127.0.0.9/backend/index.php?r=core/brand/updatebrand&id=2','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\BrandController.php',64,'品牌更新成功','Array\n(\n    [r] => core/brand/updatebrand\n    [id] => 2\n    [Brand] => Array\n        (\n            [name] => 8787\n            [logo] => \n            [desc] => 878776\n            [sort] => 878767\n            [recommend] => 1\n            [id] => 2\n        )\n\n)\n','admin',1347073954),(74,'core','INFO','http://127.0.0.9/backend/index.php?r=core/brand/updatebrand&id=1','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\BrandController.php',64,'品牌更新成功','Array\n(\n    [r] => core/brand/updatebrand\n    [id] => 1\n    [Brand] => Array\n        (\n            [name] => 176\n            [logo] => \n            [desc] => 23232\n            [sort] => 1\n            [recommend] => 1\n            [id] => 1\n        )\n\n)\n','admin',1347073963),(75,'core','INFO','http://127.0.0.9/backend/index.php?r=core/brand/addbrand','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\BrandController.php',33,'品牌添加成功','Array\n(\n    [r] => core/brand/addbrand\n    [Brand] => Array\n        (\n            [name] => 76\n            [logo] => \n            [desc] => 76\n            [sort] => 76\n            [recommend] => 0\n            [id] => 0\n        )\n\n)\n','admin',1347073971),(76,'core','INFO','http://127.0.0.9/backend/index.php?r=core/brand/deletebrand&id=1','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\BrandController.php',87,'品牌删除成功','Array\n(\n    [r] => core/brand/deletebrand\n    [id] => 1\n    [ajax] => 1\n)\n','admin',1347074011),(77,'core','INFO','http://127.0.0.9/backend/index.php?r=core/ad/deletead&id=1','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\AdController.php',87,'广告删除成功','Array\n(\n    [r] => core/ad/deletead\n    [id] => 1\n    [ajax] => 1\n)\n','admin',1347074014),(78,'core','INFO','http://127.0.0.9/backend/index.php?r=core/brand/deletebrand&id=3','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\BrandController.php',87,'品牌删除成功','Array\n(\n    [r] => core/brand/deletebrand\n    [id] => 3\n    [ajax] => 1\n)\n','admin',1347074049),(79,'core','INFO','http://127.0.0.9/backend/index.php?r=core/brand/deletebrand&id=2','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\BrandController.php',87,'品牌删除成功','Array\n(\n    [r] => core/brand/deletebrand\n    [id] => 2\n    [ajax] => 1\n)\n','admin',1347074058),(80,'core','INFO','http://127.0.0.9/backend/index.php?r=core/brand/addbrand','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\BrandController.php',33,'品牌添加成功','Array\n(\n    [r] => core/brand/addbrand\n    [Brand] => Array\n        (\n            [name] => 87\n            [logo] => \n            [desc] => 87\n            [sort] => 87\n            [recommend] => 0\n            [id] => 0\n        )\n\n)\n','admin',1347074092),(81,'core','INFO','http://127.0.0.9/backend/index.php?r=core/brand/updatebrand&id=4','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\BrandController.php',64,'品牌更新成功','Array\n(\n    [r] => core/brand/updatebrand\n    [id] => 4\n    [Brand] => Array\n        (\n            [name] => 87\n            [logo] => \n            [desc] => 87\n            [sort] => 87\n            [recommend] => 0\n            [id] => 4\n        )\n\n)\n','admin',1347074098),(82,'core','INFO','http://127.0.0.9/backend/index.php?r=core/brand/deletebrand&id=4','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\BrandController.php',87,'品牌删除成功','Array\n(\n    [r] => core/brand/deletebrand\n    [id] => 4\n    [ajax] => 1\n)\n','admin',1347074102),(83,'core','INFO','http://127.0.0.9/backend/index.php?r=core/information/addinformation','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\InformationController.php',27,'资讯添加成功','Array\n(\n    [r] => core/information/addinformation\n    [Information] => Array\n        (\n            [title] => 5454\n            [status] => 0\n            [type] => 0\n            [content] => <p><img src=\"http://127.0.0.9/backend/assets/f1a5b487/php/../../../upload/information/15331347091333.jpg\" style=\"float:none;\" title=\"证书.jpg\" border=\"0\" hspace=\"0\" vspace=\"0\" /><br /></p>\n            [id] => 0\n        )\n\n)\n','admin',1347091387),(84,'core','INFO','http://127.0.0.9/backend/index.php?r=core/information/addinformation','POST','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1096.1 Safari/536.6','127.0.0.1','E:\\Dropbox\\shadow\\backend\\protected\\modules\\core\\controllers\\InformationController.php',27,'资讯添加成功','Array\n(\n    [r] => core/information/addinformation\n    [Information] => Array\n        (\n            [title] => 3232\n            [status] => 0\n            [type] => 0\n            [content] => <p><img src=\"http://127.0.0.9/backend/assets/f1a5b487/php/../../../upload/information/36331347091590.png\" style=\"float:none;\" title=\"真实性核验单.png\" /></p><p><img src=\"http://127.0.0.9/backend/assets/f1a5b487/php/../../../upload/information/36171347091590.jpg\" style=\"float:none;\" title=\"证书.jpg\" /></p><p><br /></p>\n            [id] => 0\n        )\n\n)\n','admin',1347091602);

/*Table structure for table `i_b_path` */

DROP TABLE IF EXISTS `i_b_path`;

CREATE TABLE `i_b_path` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `resource_id` int(11) NOT NULL COMMENT '资源ID',
  `path` varchar(255) NOT NULL COMMENT '路径',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `Index_resource_id` (`resource_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='资源对应路径表';

/*Data for the table `i_b_path` */

insert  into `i_b_path`(`id`,`resource_id`,`path`,`create_time`) values (1,1,'323',NULL);

/*Table structure for table `i_b_prime` */

DROP TABLE IF EXISTS `i_b_prime`;

CREATE TABLE `i_b_prime` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `role_id` int(11) NOT NULL COMMENT '角色ID',
  `resource_id` int(11) NOT NULL COMMENT '资源ID',
  PRIMARY KEY (`id`),
  KEY `Index_role_id` (`role_id`),
  KEY `Index_resource_id` (`resource_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='权限表';

/*Data for the table `i_b_prime` */

insert  into `i_b_prime`(`id`,`role_id`,`resource_id`) values (11,2,1),(12,4,3),(13,5,4);

/*Table structure for table `i_b_resource` */

DROP TABLE IF EXISTS `i_b_resource`;

CREATE TABLE `i_b_resource` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(255) NOT NULL COMMENT '名称',
  `tag` varchar(255) NOT NULL COMMENT '标签',
  `desc` varchar(255) NOT NULL COMMENT '描述',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `Index_tag` (`tag`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='资源表';

/*Data for the table `i_b_resource` */

insert  into `i_b_resource`(`id`,`name`,`tag`,`desc`,`create_time`) values (1,'45','t','455',1346807725),(3,'455','t5','ttt',1346807915),(4,'45321','t32','5465',1346808114);

/*Table structure for table `i_b_role` */

DROP TABLE IF EXISTS `i_b_role`;

CREATE TABLE `i_b_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(20) NOT NULL COMMENT '角色名称',
  `desc` varchar(255) NOT NULL COMMENT '角色描述',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='角色表';

/*Data for the table `i_b_role` */

insert  into `i_b_role`(`id`,`name`,`desc`,`create_time`) values (2,'66323','663232',1346753145),(4,'6656','5656',1346807628),(5,'665654','3242312',1346808064);

/*Table structure for table `i_b_user` */

DROP TABLE IF EXISTS `i_b_user`;

CREATE TABLE `i_b_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `username` varchar(20) NOT NULL COMMENT '用户名称',
  `password` char(32) NOT NULL COMMENT '密码',
  `role_id` int(11) NOT NULL COMMENT '角色ID',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `Index_username_password` (`username`,`password`),
  KEY `Index_role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='管理员用户表';

/*Data for the table `i_b_user` */

insert  into `i_b_user`(`id`,`username`,`password`,`role_id`,`create_time`) values (1,'admin','96e79218965eb72c92a549dd5a330112',2,2147483647),(3,'656454','96e79218965eb72c92a549dd5a330112',2,1346807635),(4,'123','96e79218965eb72c92a549dd5a330112',4,1346807684),(5,'1234','96e79218965eb72c92a549dd5a330112',2,1346807964),(6,'123342','96e79218965eb72c92a549dd5a330112',2,1346808084);

/*Table structure for table `i_brand` */

DROP TABLE IF EXISTS `i_brand`;

CREATE TABLE `i_brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(80) NOT NULL COMMENT '品牌名称',
  `desc` text NOT NULL COMMENT '品牌描述',
  `logo` varchar(255) NOT NULL COMMENT '品牌logo',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '品牌排序',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态，0为无效，1为有效',
  `recommend` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否推荐,0为否,1为是',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `Index_sort` (`sort`),
  KEY `Index_recommend` (`recommend`),
  KEY `Index_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='品牌表';

/*Data for the table `i_brand` */

/*Table structure for table `i_category` */

DROP TABLE IF EXISTS `i_category`;

CREATE TABLE `i_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(80) NOT NULL COMMENT '分类名称',
  `desc` varchar(255) NOT NULL COMMENT '分类描述',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '父类ID',
  `path` varchar(255) NOT NULL COMMENT '分类路径',
  `sort` int(11) DEFAULT NULL COMMENT '分类排序',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `Index_parent_id` (`parent_id`),
  KEY `Index_sort` (`sort`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='分类表';

/*Data for the table `i_category` */

/*Table structure for table `i_category_brand_rel` */

DROP TABLE IF EXISTS `i_category_brand_rel`;

CREATE TABLE `i_category_brand_rel` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `cid` int(11) NOT NULL COMMENT '分类ID',
  `bid` int(11) NOT NULL COMMENT '品牌ID',
  PRIMARY KEY (`id`),
  KEY `Index_cid` (`cid`),
  KEY `Index_bid` (`bid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='分类和品牌关系表';

/*Data for the table `i_category_brand_rel` */

/*Table structure for table `i_delivery_address` */

DROP TABLE IF EXISTS `i_delivery_address`;

CREATE TABLE `i_delivery_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `id_default` tinyint(1) NOT NULL COMMENT '是否是默认地址,0为否,1为是',
  `province` varchar(80) NOT NULL COMMENT '省份',
  `city` varchar(80) NOT NULL COMMENT '城市',
  `region` varchar(80) NOT NULL COMMENT '区',
  `street` varchar(255) NOT NULL COMMENT '街道',
  `zip_code` varchar(20) NOT NULL COMMENT '邮编',
  `name` varchar(80) NOT NULL COMMENT '收货人姓名',
  `mobile` char(11) DEFAULT NULL COMMENT '收货人手机',
  `phone` varchar(20) DEFAULT NULL COMMENT '电话号码',
  `area_code` varchar(20) DEFAULT NULL COMMENT '区号',
  `ext_number` varchar(20) DEFAULT NULL COMMENT '分机号',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `Index_uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='收货地址表';

/*Data for the table `i_delivery_address` */

/*Table structure for table `i_email_check` */

DROP TABLE IF EXISTS `i_email_check`;

CREATE TABLE `i_email_check` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `code` char(4) NOT NULL COMMENT '验证码',
  `serial_number` int(11) NOT NULL COMMENT '序号',
  `expired_time` int(11) NOT NULL COMMENT '过期时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `Index_uid_serial_number` (`uid`,`serial_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='邮箱验证表';

/*Data for the table `i_email_check` */

/*Table structure for table `i_href` */

DROP TABLE IF EXISTS `i_href`;

CREATE TABLE `i_href` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `title` varchar(255) NOT NULL COMMENT '友情链接名称',
  `target` varchar(255) NOT NULL COMMENT '友情链接地址',
  `position` tinyint(1) NOT NULL COMMENT '友情链接位置(0为首页)',
  `type` tinyint(1) NOT NULL COMMENT '友情链接类型(0为图片，1为文字)',
  `path` varchar(255) DEFAULT NULL COMMENT '友情链接图片路径',
  `status` tinyint(1) NOT NULL COMMENT '友情链接状态(0为无效,1为有效)',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `Index_type` (`type`),
  KEY `Index_status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='友情链接表';

/*Data for the table `i_href` */

insert  into `i_href`(`id`,`title`,`target`,`position`,`type`,`path`,`status`,`create_time`) values (3,'87','87',0,0,'/href/201209081042341295.jpg',0,1347009580),(4,'98','98',0,0,'/href/201209081041035739.jpg',0,1347071274),(5,'767678787','7676767',0,0,'/href/201209081041097059.jpg',0,1347071589);

/*Table structure for table `i_information` */

DROP TABLE IF EXISTS `i_information`;

CREATE TABLE `i_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '资讯ID',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `content` longtext COMMENT '内容',
  `type` tinyint(1) DEFAULT NULL COMMENT '资讯类型,0为首页资讯',
  `status` tinyint(1) DEFAULT NULL COMMENT '资讯状态,0为无效,1为有效',
  `create_time` int(11) DEFAULT NULL COMMENT '发布时间',
  PRIMARY KEY (`id`),
  KEY `Index_type` (`type`),
  KEY `Index_status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='资讯表';

/*Data for the table `i_information` */

insert  into `i_information`(`id`,`title`,`content`,`type`,`status`,`create_time`) values (1,'1','323232',1,1,1),(2,'3443','4343',0,0,1347010453);

/*Table structure for table `i_item` */

DROP TABLE IF EXISTS `i_item`;

CREATE TABLE `i_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '产品ID',
  `item_name` varchar(255) NOT NULL COMMENT '产品名称',
  `item_sn` varchar(255) NOT NULL COMMENT '产品编号',
  `item_point` decimal(15,2) NOT NULL DEFAULT '0.00' COMMENT '积分',
  `item_price` decimal(15,2) NOT NULL COMMENT '市场价',
  `category_one` int(11) NOT NULL COMMENT '一级分类',
  `category_two` int(11) NOT NULL COMMENT '二级分类',
  `category_three` int(11) NOT NULL COMMENT '三级分类',
  `brand_id` int(11) NOT NULL COMMENT '品牌ID',
  `share` int(11) NOT NULL DEFAULT '0' COMMENT '分享次数',
  `view` int(11) NOT NULL DEFAULT '0' COMMENT '浏览次数',
  `volume` int(11) NOT NULL DEFAULT '0' COMMENT '成交次数',
  `collect` int(11) NOT NULL DEFAULT '0' COMMENT '收藏次数',
  `is_shelve` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否上架(0为下架，1为上架)',
  `is_delete` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否删除(0为删除，1为正常)',
  `is_free_postage` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否免邮费 (0为不免，1为免邮费)',
  `desc` longtext NOT NULL COMMENT '产品描述',
  `keyword_id` int(11) DEFAULT '0' COMMENT '关键词ID',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `Index_item_sn` (`item_sn`),
  UNIQUE KEY `Index_item_name` (`item_name`),
  KEY `Index_item_price` (`item_price`),
  KEY `Index_category_one` (`category_one`),
  KEY `Index_category_two` (`category_two`),
  KEY `Index_category_three` (`category_three`),
  KEY `Index_brand_id` (`brand_id`),
  KEY `Index_is_shelve` (`is_shelve`),
  KEY `Index_is_delete` (`is_delete`),
  KEY `Index_keyword` (`keyword_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='商品表';

/*Data for the table `i_item` */

insert  into `i_item`(`id`,`item_name`,`item_sn`,`item_point`,`item_price`,`category_one`,`category_two`,`category_three`,`brand_id`,`share`,`view`,`volume`,`collect`,`is_shelve`,`is_delete`,`is_free_postage`,`desc`,`keyword_id`,`create_time`) values (1,'3266666666','32','0.00','32.00',32,32,32,32,0,0,0,0,0,1,0,'323232',0,323);

/*Table structure for table `i_item_recommend` */

DROP TABLE IF EXISTS `i_item_recommend`;

CREATE TABLE `i_item_recommend` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键, 自增',
  `item_id` int(11) NOT NULL COMMENT '产品ID',
  `img_path` varchar(255) NOT NULL COMMENT '推荐图片地址',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '推荐状态，(0为停用，1为启用)',
  `type` tinyint(1) NOT NULL COMMENT '推荐类型，(0为首页群英会前6，1为首页群英会7， 2为首页群英会8, 3为列表页大号，4为列表页中号，5为列表页小号， 6为列表页情趣)',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `Index_item_id` (`item_id`),
  KEY `Index_status_type` (`status`,`type`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `i_item_recommend` */

insert  into `i_item_recommend`(`id`,`item_id`,`img_path`,`status`,`type`,`create_time`) values (1,1,'1',1,0,4343);

/*Table structure for table `i_keyword` */

DROP TABLE IF EXISTS `i_keyword`;

CREATE TABLE `i_keyword` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `keyword` varchar(255) NOT NULL COMMENT '关键字',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='关键字表';

/*Data for the table `i_keyword` */

/*Table structure for table `i_logistics` */

DROP TABLE IF EXISTS `i_logistics`;

CREATE TABLE `i_logistics` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `order_id` int(11) NOT NULL COMMENT '订单ID',
  `express_name` varchar(255) NOT NULL COMMENT '快递公司名称',
  `express_number` varchar(255) NOT NULL COMMENT '快递单号',
  `note` varchar(255) DEFAULT NULL COMMENT '备注',
  `send_time` int(11) NOT NULL COMMENT '发货时间',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `Index_order_id` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='物流信息表';

/*Data for the table `i_logistics` */

/*Table structure for table `i_member` */

DROP TABLE IF EXISTS `i_member`;

CREATE TABLE `i_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键，用户ID，自增',
  `username` varchar(255) NOT NULL COMMENT '用户名称',
  `password` char(32) NOT NULL COMMENT '用户密码，MD5加密',
  `email` varchar(255) NOT NULL COMMENT '用户邮箱',
  `mobile` varchar(255) DEFAULT NULL COMMENT '用户手机',
  `register_ip` char(15) NOT NULL COMMENT '注册IP',
  `isblocked` tinyint(4) NOT NULL COMMENT '账号状态，是否已经锁定(0为已锁定，1为正常)',
  `is_actived_mobile` tinyint(1) NOT NULL COMMENT '手机是否激活(0为不激活，1为已经激活)',
  `is_actived_email` tinyint(1) NOT NULL COMMENT 'email是否激活(0为不激活，1为已经激活)',
  `create_time` int(11) DEFAULT NULL COMMENT '注册时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `Index_username` (`username`),
  UNIQUE KEY `Index_email` (`email`),
  UNIQUE KEY `Index_mobile` (`mobile`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='会员表';

/*Data for the table `i_member` */

insert  into `i_member`(`id`,`username`,`password`,`email`,`mobile`,`register_ip`,`isblocked`,`is_actived_mobile`,`is_actived_email`,`create_time`) values (1,'1','1','1','1','1',1,1,1,1);

/*Table structure for table `i_mobile_check` */

DROP TABLE IF EXISTS `i_mobile_check`;

CREATE TABLE `i_mobile_check` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `code` char(4) NOT NULL COMMENT '验证码',
  `serial_number` int(11) NOT NULL COMMENT '序号',
  `expired_time` int(11) NOT NULL COMMENT '过期时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `Index_serial_number` (`uid`,`serial_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='手机验证表';

/*Data for the table `i_mobile_check` */

/*Table structure for table `i_order` */

DROP TABLE IF EXISTS `i_order`;

CREATE TABLE `i_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `no` char(24) NOT NULL COMMENT '订单编号,格式为[NOYmdHis00000001]',
  `uid` int(11) NOT NULL COMMENT '用户id',
  `discount_price` decimal(15,2) NOT NULL COMMENT '折后价格',
  `discount` decimal(15,2) NOT NULL COMMENT '订单折扣',
  `normal_price` decimal(15,2) NOT NULL COMMENT '正常价格',
  `item_num` int(11) NOT NULL COMMENT '订单中商品数量',
  `status` tinyint(1) NOT NULL COMMENT '订单状态,0为未付款，1为已付款，2为已发货，3为确认收货，4为换货，5为退货，6为交易成功',
  `pay_type` tinyint(1) NOT NULL COMMENT '0为网银在线，1为支付宝，2为电子钱包，3为线下转账，4为礼品卡, 5为paypal',
  `note` text COMMENT '备注',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `success_time` int(11) NOT NULL COMMENT '成交时间',
  PRIMARY KEY (`id`),
  KEY `Index_no` (`no`),
  KEY `Index_uid` (`uid`),
  KEY `Index_status` (`status`),
  KEY `Index_pay_type` (`pay_type`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='订单表';

/*Data for the table `i_order` */

insert  into `i_order`(`id`,`no`,`uid`,`discount_price`,`discount`,`normal_price`,`item_num`,`status`,`pay_type`,`note`,`create_time`,`success_time`) values (1,'1',1,'1.00','1.00','1.00',1,1,1,NULL,1,1);

/*Table structure for table `i_order_item_rel` */

DROP TABLE IF EXISTS `i_order_item_rel`;

CREATE TABLE `i_order_item_rel` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `order_id` int(11) NOT NULL COMMENT '订单ID',
  `item_id` int(11) NOT NULL COMMENT '商品ID',
  `num` int(11) DEFAULT NULL COMMENT '商品数量',
  PRIMARY KEY (`id`),
  KEY `Index_order_id` (`order_id`),
  KEY `Index_item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='商品订单关系表';

/*Data for the table `i_order_item_rel` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
