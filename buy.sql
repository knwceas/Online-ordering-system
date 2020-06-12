-- 管理员表
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(4) NOT NULL auto_increment,
--   `Adm` int(1) NOT NULL default 0,
  `Manager` varchar(30) NOT NULL default '',
  `Password` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `admin` VALUES (1,'管理员1','1111'),(2,'管理员2','33aa');

-- 用户表
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(4) NOT NULL auto_increment,
--   `User` int(1) NOT NULL default 1,
  `username` varchar(30) NOT NULL default '',
  `password` varchar(20) NOT NULL default '',
  `address` varchar(200) NOT NULL default '',
  `tel` varchar(15) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `user` VALUES (1,'用户1','111','广东省广州市天河区','15066633311'),
(2,'用户2','33a','广东省广州市荔湾区','15066633312'),
(3,'用户3','2233','广东省肇庆市端州区','13030303030'),
(4,'用户4','33a','广东省广州市荔湾区','15066633312'),
(5,'用户5','111','广东省广州市天河区','15066633311'),
(6,'用户6','33a','广东省广州市荔湾区','15066633312'),
(7,'用户7','111','广东省广州市天河区','15066633311'),
(8,'用户8','33a','广东省广州市荔湾区','15066633312');
-- 设置缺省值，insert里面写default
-- 菜品表
DROP TABLE IF EXISTS `food`;
CREATE TABLE `food` (
  `id` int(4) NOT NULL auto_increment,
  `img_src` varchar(70) NOT NULL default '',
  `name` varchar(40)  NOT NULL default '',
  `introduce` varchar(100) NOT NULL default '',
  `price`  int(4) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO `food` VALUES (1,'images/1.jpg','猪肉肠粉','原料：肠粉专用粉、猪肉、鸡蛋、青菜、清水、盐、淀粉、酱油、鱼露、胡椒粉、油、猪油。',15),
(2,'images/2.jpg','广式蒸肠粉','原料：广东肠粉专用粉、水、鸡蛋、瑶柱、葱花、酱油。',20),
(3,'images/3.jpg','港式菠萝包','原料：高筋面粉、牛奶、酵母、全蛋液、盐、砂糖、黄油、低筋面粉、糖粉、全蛋液、盐、奶粉、黄油。',25),
(4,'images/4.jpg','水晶虾饺','原料：虾仁、澄粉、猪油、生粉、开水、肥肉、胡萝卜、金针菇、淀粉、盐、鸡精、蚝油、胡椒粉、姜粉、葱、料酒、油。',40),
(5,'images/5.jpg','潮州牛肉丸粿条','原料：粿条、牛肉丸、鱼饼、叶菜、虾干、姜、蒜、芝麻油、辣椒油、盐、鸡粉、胡椒粉。',30),
(6,'images/6.jpg','手撕鸡炒河粉','原料：手撕鸡、河粉、青菜、西红柿、玉米油、盐、老干妈辣椒酱、生抽、白糖。',20),
(7,'images/7.jpg','双皮奶','原料：鸡蛋、全脂牛奶、糖粉。',12),
(8,'images/8.jpg','干炒牛河','原料：河粉、绿豆芽、洋葱、韭黄、香葱、鲜味酱油、老抽酱油、白砂糖、芝麻香油、蚝油。',20);

-- 订单表
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `orderID` int(20) NOT NULL ,
  `userID` int(4) default NULL,
  `orderDate` datetime default NULL,
  `total_price` int(6) default NULL,
  `beizhu` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`orderID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- 这里不要设置自增




  