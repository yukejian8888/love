/*
Navicat MySQL Data Transfer

Source Server         : 59.110.239.143
Source Server Version : 50556
Source Host           : 59.110.239.143:3306
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50556
File Encoding         : 65001

Date: 2018-04-11 16:50:59
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for emlog_attachment
-- ----------------------------
DROP TABLE IF EXISTS `emlog_attachment`;
CREATE TABLE `emlog_attachment` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `blogid` int(10) unsigned NOT NULL DEFAULT '0',
  `filename` varchar(255) NOT NULL DEFAULT '',
  `filesize` int(10) NOT NULL DEFAULT '0',
  `filepath` varchar(255) NOT NULL DEFAULT '',
  `addtime` bigint(20) NOT NULL DEFAULT '0',
  `width` int(10) NOT NULL DEFAULT '0',
  `height` int(10) NOT NULL DEFAULT '0',
  `mimetype` varchar(40) NOT NULL DEFAULT '',
  `thumfor` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`aid`),
  KEY `blogid` (`blogid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of emlog_attachment
-- ----------------------------

-- ----------------------------
-- Table structure for emlog_blog
-- ----------------------------
DROP TABLE IF EXISTS `emlog_blog`;
CREATE TABLE `emlog_blog` (
  `gid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `date` bigint(20) NOT NULL,
  `content` longtext NOT NULL,
  `excerpt` longtext NOT NULL,
  `alias` varchar(200) NOT NULL DEFAULT '',
  `author` int(10) NOT NULL DEFAULT '1',
  `sortid` int(10) NOT NULL DEFAULT '-1',
  `type` varchar(20) NOT NULL DEFAULT 'blog',
  `views` int(10) unsigned NOT NULL DEFAULT '0',
  `comnum` int(10) unsigned NOT NULL DEFAULT '0',
  `attnum` int(10) unsigned NOT NULL DEFAULT '0',
  `top` enum('n','y') NOT NULL DEFAULT 'n',
  `sortop` enum('n','y') NOT NULL DEFAULT 'n',
  `hide` enum('n','y') NOT NULL DEFAULT 'n',
  `checked` enum('n','y') NOT NULL DEFAULT 'y',
  `allow_remark` enum('n','y') NOT NULL DEFAULT 'y',
  `password` varchar(255) NOT NULL DEFAULT '',
  `template` varchar(255) NOT NULL DEFAULT '',
  `zsshare` int(10) unsigned NOT NULL DEFAULT '0',
  `digg` varchar(10) NOT NULL DEFAULT '0,0',
  PRIMARY KEY (`gid`),
  KEY `date` (`date`),
  KEY `author` (`author`),
  KEY `sortid` (`sortid`),
  KEY `type` (`type`),
  KEY `views` (`views`),
  KEY `comnum` (`comnum`),
  KEY `hide` (`hide`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of emlog_blog
-- ----------------------------
INSERT INTO `emlog_blog` VALUES ('11', '最全的常用正则表达式大全', '1506579230', '<section class=\"\" style=\"margin:0px;padding:1px 5px;max-width:100%;color:#3E3E3E;font-family:&quot;font-size:16px;white-space:normal;background-color:#FFFFFF;box-sizing:border-box !important;word-wrap:break-word !important;\"><section style=\"margin:5px auto;padding:0px;max-width:100%;box-sizing:border-box !important;word-wrap:break-word !important;\"><section style=\"margin:0px 29.3906px 0px 0px;padding:0px;max-width:100%;box-sizing:border-box !important;word-wrap:break-word !important;\"><section style=\"margin:0px;padding:10px 10px 6px;max-width:100%;box-sizing:border-box !important;word-wrap:break-word !important;text-align:center;\"><strong style=\"margin:0px;padding:0px;max-width:100%;box-sizing:border-box !important;word-wrap:break-word !important;\"><span style=\"margin:0px;padding:0px;max-width:100%;box-sizing:border-box !important;word-wrap:break-word !important;font-size:18px;\">一、校验数字的表达式</span></strong></section><section style=\"margin:0px;padding:0px;max-width:100%;box-sizing:border-box !important;word-wrap:break-word !important;background-image:linear-gradient(to right, #4CD964, #5AC8FA, #007AFF, #34AADC, #5856D6, #FF2D55);height:5px;\"></section><section style=\"margin:0px;padding:0px;max-width:100%;box-sizing:border-box !important;word-wrap:break-word !important;background-image:linear-gradient(#EAECEE, transparent);height:3em;transform:skew(30deg);transform-origin:0px 0px 0px;width:460.609px;\"><br style=\"margin:0px;padding:0px;max-width:100%;box-sizing:border-box !important;word-wrap:break-word !important;\" />\r\n</section></section></section></section>\r\n<pre deep=\"3\" style=\"margin-top:0px;margin-bottom:0px;padding:0px;max-width:100%;color:#3E3E3E;font-size:16px;background-color:#FFFFFF;box-sizing:border-box !important;word-wrap:break-word !important;\"> 1 数字：^[0-9]*$ \r\n 2 n位的数字：^\\d{n}$ \r\n 3 至少n位的数字：^\\d{n,}$ \r\n 4 m-n位的数字：^\\d{m,n}$ \r\n 5 零和非零开头的数字：^(0|[1-9][0-9]*)$ \r\n 6 非零开头的最多带两位小数的数字：^([1-9][0-9]*)+(.[0-9]{1,2})?$ \r\n 7 带1-2位小数的正数或负数：^(\\-)?\\d+(\\.\\d{1,2})?$ \r\n 8 正数、负数、和小数：^(\\-|\\+)?\\d+(\\.\\d+)?$ \r\n 9 有两位小数的正实数：^[0-9]+(.[0-9]{2})?$\r\n10 有1~3位小数的正实数：^[0-9]+(.[0-9]{1,3})?$\r\n11 非零的正整数：^[1-9]\\d*$ 或 ^([1-9][0-9]*){1,3}$ 或 ^\\+?[1-9][0-9]*$\r\n12 非零的负整数：^\\-[1-9][]0-9\"*$ 或 ^-[1-9]\\d*$\r\n13 非负整数：^\\d+$ 或 ^[1-9]\\d*|0$\r\n14 非正整数：^-[1-9]\\d*|0$ 或 ^((-\\d+)|(0+))$\r\n15 非负浮点数：^\\d+(\\.\\d+)?$ 或 ^[1-9]\\d*\\.\\d*|0\\.\\d*[1-9]\\d*|0?\\.0+|0$\r\n16 非正浮点数：^((-\\d+(\\.\\d+)?)|(0+(\\.0+)?))$ 或 ^(-([1-9]\\d*\\.\\d*|0\\.\\d*[1-9]\\d*))|0?\\.0+|0$\r\n17 正浮点数：^[1-9]\\d*\\.\\d*|0\\.\\d*[1-9]\\d*$ 或 ^(([0-9]+\\.[0-9]*[1-9][0-9]*)|([0-9]*[1-9][0-9]*\\.[0-9]+)|([0-9]*[1-9][0-9]*))$\r\n18 负浮点数：^-([1-9]\\d*\\.\\d*|0\\.\\d*[1-9]\\d*)$ 或 ^(-(([0-9]+\\.[0-9]*[1-9][0-9]*)|([0-9]*[1-9][0-9]*\\.[0-9]+)|([0-9]*[1-9][0-9]*)))$\r\n19 浮点数：^(-?\\d+)(\\.\\d+)?$ 或 ^-?([1-9]\\d*\\.\\d*|0\\.\\d*[1-9]\\d*|0?\\.0+|0)$</pre>\r\n<section class=\"\" style=\"margin:0px;padding:1px 5px;max-width:100%;color:#3E3E3E;font-family:&quot;font-size:16px;white-space:normal;background-color:#FFFFFF;box-sizing:border-box !important;word-wrap:break-word !important;\"><section style=\"margin:5px auto;padding:0px;max-width:100%;box-sizing:border-box !important;word-wrap:break-word !important;\"><section style=\"margin:0px 29.3906px 0px 0px;padding:0px;max-width:100%;box-sizing:border-box !important;word-wrap:break-word !important;\">\r\n<p style=\"margin-top:0px;margin-bottom:0px;padding:10px 10px 6px;max-width:100%;clear:both;min-height:1em;text-align:center;box-sizing:border-box !important;\">\r\n	<strong style=\"margin:0px;padding:0px;max-width:100%;box-sizing:border-box !important;word-wrap:break-word !important;\"><span style=\"margin:0px;padding:0px;max-width:100%;box-sizing:border-box !important;word-wrap:break-word !important;font-size:18px;\"><br style=\"margin:0px;padding:0px;max-width:100%;box-sizing:border-box !important;word-wrap:break-word !important;\" />\r\n</span></strong>\r\n</p>\r\n<p style=\"margin-top:0px;margin-bottom:0px;padding:10px 10px 6px;max-width:100%;clear:both;min-height:1em;text-align:center;box-sizing:border-box !important;\">\r\n	<strong style=\"margin:0px;padding:0px;max-width:100%;box-sizing:border-box !important;word-wrap:break-word !important;\"><span style=\"margin:0px;padding:0px;max-width:100%;box-sizing:border-box !important;word-wrap:break-word !important;font-size:18px;\">二、校验字符的表达式</span></strong>\r\n</p>\r\n<section style=\"margin:0px;padding:0px;max-width:100%;box-sizing:border-box !important;word-wrap:break-word !important;background-image:linear-gradient(to right, #4CD964, #5AC8FA, #007AFF, #34AADC, #5856D6, #FF2D55);height:5px;\"></section><section style=\"margin:0px;padding:0px;max-width:100%;box-sizing:border-box !important;word-wrap:break-word !important;background-image:linear-gradient(#EAECEE, transparent);height:3em;transform:skew(30deg);transform-origin:0px 0px 0px;width:460.609px;\"><br style=\"margin:0px;padding:0px;max-width:100%;box-sizing:border-box !important;word-wrap:break-word !important;\" />\r\n</section></section></section></section>\r\n<pre style=\"margin-top:0px;margin-bottom:0px;padding:0px;max-width:100%;color:#3E3E3E;font-size:16px;background-color:#FFFFFF;box-sizing:border-box !important;word-wrap:break-word !important;\">1 汉字：^[\\u4e00-\\u9fa5]{0,}$ \r\n2 英文和数字：^[A-Za-z0-9]+$ 或 ^[A-Za-z0-9]{4,40}$ \r\n3 长度为3-20的所有字符：^.{3,20}$ \r\n4 由26个英文字母组成的字符串：^[A-Za-z]+$ \r\n5 由26个大写英文字母组成的字符串：^[A-Z]+$ \r\n6 由26个小写英文字母组成的字符串：^[a-z]+$ \r\n7 由数字和26个英文字母组成的字符串：^[A-Za-z0-9]+$ \r\n8 由数字、26个英文字母或者下划线组成的字符串：^\\w+$ 或 ^\\w{3,20}$ \r\n9 中文、英文、数字包括下划线：^[\\u4E00-\\u9FA5A-Za-z0-9_]+$\r\n10 中文、英文、数字但不包括下划线等符号：^[\\u4E00-\\u9FA5A-Za-z0-9]+$ 或 ^[\\u4E00-\\u9FA5A-Za-z0-9]{2,20}$\r\n11 可以输入含有^%&amp;\',;=?$\\\"等字符：[^%&amp;\',;=?$\\x22]+\r\n12 禁止输入含有~的字符：[^~\\x22]+</pre>\r\n<p style=\"margin-top:0px;margin-bottom:0px;padding:0px;max-width:100%;clear:both;min-height:1em;color:#3E3E3E;font-family:&quot;font-size:16px;white-space:normal;background-color:#FFFFFF;box-sizing:border-box !important;\">\r\n	<br />\r\n</p>\r\n<section class=\"\" style=\"margin:0px;padding:1px 5px;max-width:100%;color:#3E3E3E;font-family:&quot;font-size:16px;white-space:normal;background-color:#FFFFFF;box-sizing:border-box !important;word-wrap:break-word !important;\"><section style=\"margin:5px auto;padding:0px;max-width:100%;box-sizing:border-box !important;word-wrap:break-word !important;\"><section style=\"margin:0px 29.3906px 0px 0px;padding:0px;max-width:100%;box-sizing:border-box !important;word-wrap:break-word !important;\"><section style=\"margin:0px;padding:10px 10px 6px;max-width:100%;box-sizing:border-box !important;word-wrap:break-word !important;text-align:center;\"><strong style=\"margin:0px;padding:0px;max-width:100%;box-sizing:border-box !important;word-wrap:break-word !important;\"><span style=\"margin:0px;padding:0px;max-width:100%;box-sizing:border-box !important;word-wrap:break-word !important;font-size:18px;\">三、特殊需求表达式</span></strong></section><section style=\"margin:0px;padding:0px;max-width:100%;box-sizing:border-box !important;word-wrap:break-word !important;background-image:linear-gradient(to right, #4CD964, #5AC8FA, #007AFF, #34AADC, #5856D6, #FF2D55);height:5px;\"></section><section style=\"margin:0px;padding:0px;max-width:100%;box-sizing:border-box !important;word-wrap:break-word !important;background-image:linear-gradient(#EAECEE, transparent);height:3em;transform:skew(30deg);transform-origin:0px 0px 0px;width:460.609px;\"><br style=\"margin:0px;padding:0px;max-width:100%;box-sizing:border-box !important;word-wrap:break-word !important;\" />\r\n</section></section></section></section>\r\n<pre style=\"margin-top:0px;margin-bottom:0px;padding:0px;max-width:100%;color:#3E3E3E;font-size:16px;background-color:#FFFFFF;box-sizing:border-box !important;word-wrap:break-word !important;\">1 Email地址：^\\w+([-+.]\\w+)*@\\w+([-.]\\w+)*\\.\\w+([-.]\\w+)*$ \r\n2 域名：[a-zA-Z0-9][-a-zA-Z0-9]{0,62}(/.[a-zA-Z0-9][-a-zA-Z0-9]{0,62})+/.? \r\n3 InternetURL：[a-zA-z]+://[^\\s]* 或 ^http://([\\w-]+\\.)+[\\w-]+(/[\\w-./?%&amp;=]*)?$ \r\n4 手机号码：^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\\d{8}$ \r\n5 电话号码(\"XXX-XXXXXXX\"、\"XXXX-XXXXXXXX\"、\"XXX-XXXXXXX\"、\"XXX-XXXXXXXX\"、\"XXXXXXX\"和\"XXXXXXXX)：^(\\(\\d{3,4}-)|\\d{3.4}-)?\\d{7,8}$  \r\n6 国内电话号码(0511-4405222、021-87888822)：\\d{3}-\\d{8}|\\d{4}-\\d{7} \r\n7 身份证号(15位、18位数字)：^\\d{15}|\\d{18}$ \r\n8 短身份证号码(数字、字母x结尾)：^([0-9]){7,18}(x|X)?$ 或 ^\\d{8,18}|[0-9x]{8,18}|[0-9X]{8,18}?$ \r\n9 帐号是否合法(字母开头，允许5-16字节，允许字母数字下划线)：^[a-zA-Z][a-zA-Z0-9_]{4,15}$\r\n10 密码(以字母开头，长度在6~18之间，只能包含字母、数字和下划线)：^[a-zA-Z]\\w{5,17}$\r\n11 强密码(必须包含大小写字母和数字的组合，不能使用特殊字符，长度在8-10之间)：^(?=.*\\d)(?=.*[a-z])(?=.*[A-Z]).{8,10}$  \r\n12 日期格式：^\\d{4}-\\d{1,2}-\\d{1,2}\r\n13 一年的12个月(01～09和1～12)：^(0?[1-9]|1[0-2])$\r\n14 一个月的31天(01～09和1～31)：^((0?[1-9])|((1|2)[0-9])|30|31)$  \r\n15 钱的输入格式：\r\n16    1).有四种钱的表示形式我们可以接受:\"10000.00\" 和 \"10,000.00\", 和没有 \"分\" 的 \"10000\" 和 \"10,000\"：^[1-9][0-9]*$  \r\n17    2).这表示任意一个不以0开头的数字,但是,这也意味着一个字符\"0\"不通过,所以我们采用下面的形式：^(0|[1-9][0-9]*)$  \r\n18    3).一个0或者一个不以0开头的数字.我们还可以允许开头有一个负号：^(0|-?[1-9][0-9]*)$  \r\n19    4).这表示一个0或者一个可能为负的开头不为0的数字.让用户以0开头好了.把负号的也去掉,因为钱总不能是负的吧.下面我们要加的是说明可能的小数部分：^[0-9]+(.[0-9]+)?$  \r\n20    5).必须说明的是,小数点后面至少应该有1位数,所以\"10.\"是不通过的,但是 \"10\" 和 \"10.2\" 是通过的：^[0-9]+(.[0-9]{2})?$  \r\n21    6).这样我们规定小数点后面必须有两位,如果你认为太苛刻了,可以这样：^[0-9]+(.[0-9]{1,2})?$  \r\n22    7).这样就允许用户只写一位小数.下面我们该考虑数字中的逗号了,我们可以这样：^[0-9]{1,3}(,[0-9]{3})*(.[0-9]{1,2})?$  \r\n23    8). 1到3个数字,后面跟着任意个 逗号+3个数字,逗号成为可选,而不是必须：^([0-9]+|[0-9]{1,3}(,[0-9]{3})*)(.[0-9]{1,2})?$  \r\n24    备注：这就是最终结果了,别忘了\"+\"可以用\"*\"替代如果你觉得空字符串也可以接受的话(奇怪,为什么?)最后,别忘了在用函数时去掉去掉那个反斜杠,一般的错误都在这里\r\n25 xml文件：^([a-zA-Z]+-?)+[a-zA-Z0-9]+\\\\.[x|X][m|M][l|L]$\r\n26 中文字符的正则表达式：[\\u4e00-\\u9fa5]\r\n27 双字节字符：[^\\x00-\\xff]    (包括汉字在内，可以用来计算字符串的长度(一个双字节字符长度计2，ASCII字符计1))\r\n28 空白行的正则表达式：\\n\\s*\\r    (可以用来删除空白行)\r\n29 HTML标记的正则表达式：&lt;(\\S*?)[^&gt;]*&gt;.*?|&lt;.*? /&gt;    (网上流传的版本太糟糕，上面这个也仅仅能部分，对于复杂的嵌套标记依旧无能为力)\r\n30 首尾空白字符的正则表达式：^\\s*|\\s*$或(^\\s*)|(\\s*$)    (可以用来删除行首行尾的空白字符(包括空格、制表符、换页符等等)，非常有用的表达式)\r\n31 腾讯QQ号：[1-9][0-9]{4,}    (腾讯QQ号从10000开始)\r\n32 中国邮政编码：[1-9]\\d{5}(?!\\d)    (中国邮政编码为6位数字)\r\n33 IP地址：\\d+\\.\\d+\\.\\d+\\.\\d+    (提取IP地址时有用)\r\n34 IP地址：((?:(?:25[0-5]|2[0-4]\\\\d|[01]?\\\\d?\\\\d)\\\\.){3}(?:25[0-5]|2[0-4]\\\\d|[01]?\\\\d?\\</pre>\r\n<pre style=\"margin-top:0px;margin-bottom:0px;padding:0px;max-width:100%;color:#3E3E3E;font-size:16px;background-color:#FFFFFF;box-sizing:border-box !important;word-wrap:break-word !important;\">\r\n</pre>\r\n<pre style=\"margin-top:0px;margin-bottom:0px;padding:0px;max-width:100%;color:#3E3E3E;font-size:16px;background-color:#FFFFFF;box-sizing:border-box !important;word-wrap:break-word !important;\">文章取自微信公众号趣IT，如有侵权，请及时联系删除。</pre>', '', '', '1', '3', 'blog', '83', '0', '0', 'n', 'n', 'n', 'y', 'y', '', '', '0', '0,0');
INSERT INTO `emlog_blog` VALUES ('2', 'hello', '1501211725', 'hello，大家好！', '', '', '1', '1', 'blog', '209', '3', '0', 'n', 'n', 'n', 'y', 'y', '', '', '0', '1,3');
INSERT INTO `emlog_blog` VALUES ('3', '明天会更好', '1501579094', '<span style=\"color:#999999;font-family:微软雅黑, Arial, Helvetica, sans-serif;white-space:normal;\">从明天起，做一个幸福的人。喂马，砍柴，周游世界。</span>', '', '', '1', '1', 'blog', '162', '0', '0', 'n', 'n', 'n', 'y', 'y', '', '', '0', '3,2');
INSERT INTO `emlog_blog` VALUES ('6', '那时年少', '1501744996', '北漂的人，都回不去了。究竟是我们改变了世界，还是世界改变了我们。', '', '', '1', '1', 'blog', '116', '0', '0', 'n', 'n', 'n', 'y', 'y', '', '', '0', '2,1');
INSERT INTO `emlog_blog` VALUES ('7', 'Sublime Text常用快捷键', '1501746706', '<div yne-bulb-block=\"paragraph\" style=\"white-space:pre-wrap;line-height:1.75;font-size:14px;\">\r\n	1、ctrl+n	新建文件\r\n</div>\r\n<div yne-bulb-block=\"paragraph\" style=\"white-space:pre-wrap;line-height:1.75;font-size:14px;\">\r\n	2、ctrl+s	保存\r\n</div>\r\n<div yne-bulb-block=\"paragraph\" style=\"white-space:pre-wrap;line-height:1.75;font-size:14px;\">\r\n	3、ctrl+w	关闭\r\n</div>\r\n<div yne-bulb-block=\"paragraph\" style=\"white-space:pre-wrap;line-height:1.75;font-size:14px;\">\r\n	4、ctrl+z	撤销\r\n</div>\r\n<div yne-bulb-block=\"paragraph\" style=\"white-space:pre-wrap;line-height:1.75;font-size:14px;\">\r\n	5、ctrl+y	重做或重复\r\n</div>\r\n<div yne-bulb-block=\"paragraph\" style=\"white-space:pre-wrap;line-height:1.75;font-size:14px;\">\r\n	6、ctrl+x	剪切\r\n</div>\r\n<div yne-bulb-block=\"paragraph\" style=\"white-space:pre-wrap;line-height:1.75;font-size:14px;\">\r\n	7、ctrl+c	复制\r\n</div>\r\n<div yne-bulb-block=\"paragraph\" style=\"white-space:pre-wrap;line-height:1.75;font-size:14px;\">\r\n	8、ctrl+v	粘贴\r\n</div>\r\n<div yne-bulb-block=\"paragraph\" style=\"white-space:pre-wrap;line-height:1.75;font-size:14px;\">\r\n	9、home	移动到行首\r\n</div>\r\n<div yne-bulb-block=\"paragraph\" style=\"white-space:pre-wrap;line-height:1.75;font-size:14px;\">\r\n	10、end	移动到行尾\r\n</div>\r\n<div yne-bulb-block=\"paragraph\" style=\"white-space:pre-wrap;line-height:1.75;font-size:14px;\">\r\n	11、shift+home	选择到行首\r\n</div>\r\n<div yne-bulb-block=\"paragraph\" style=\"white-space:pre-wrap;line-height:1.75;font-size:14px;\">\r\n	12、shift+end	选择到行尾\r\n</div>\r\n<div yne-bulb-block=\"paragraph\" style=\"white-space:pre-wrap;line-height:1.75;font-size:14px;\">\r\n	13、ctrl+home	移动到页首行头\r\n</div>\r\n<div yne-bulb-block=\"paragraph\" style=\"white-space:pre-wrap;line-height:1.75;font-size:14px;\">\r\n	14、ctrl+end	移动到页尾行尾\r\n</div>\r\n<div yne-bulb-block=\"paragraph\" style=\"white-space:pre-wrap;line-height:1.75;font-size:14px;\">\r\n	15、ctrl+a	全选\r\n</div>\r\n<div yne-bulb-block=\"paragraph\" style=\"white-space:pre-wrap;line-height:1.75;font-size:14px;\">\r\n	16、ctrl+]	缩进\r\n</div>\r\n<div yne-bulb-block=\"paragraph\" style=\"white-space:pre-wrap;line-height:1.75;font-size:14px;\">\r\n	17、ctrl+[	不缩进\r\n</div>\r\n<div yne-bulb-block=\"paragraph\" style=\"white-space:pre-wrap;line-height:1.75;font-size:14px;\">\r\n	18、ctrl+l	选择行，重复可依次增加选择下一行\r\n</div>\r\n<div yne-bulb-block=\"paragraph\" style=\"white-space:pre-wrap;line-height:1.75;font-size:14px;\">\r\n	19、ctrl+d	选择单词，重复可增加选择下一个相同的单词\r\n</div>\r\n<div yne-bulb-block=\"paragraph\" style=\"white-space:pre-wrap;line-height:1.75;font-size:14px;\">\r\n	20、ctrl+m 跳转到对应括号\r\n</div>\r\n<div yne-bulb-block=\"paragraph\" style=\"white-space:pre-wrap;line-height:1.75;font-size:14px;\">\r\n	21、ctrl+p	搜索项目中的文件\r\n</div>\r\n<div yne-bulb-block=\"paragraph\" style=\"white-space:pre-wrap;line-height:1.75;font-size:14px;\">\r\n	22、ctrl+shift+p 打开命令面板\r\n</div>\r\n<div yne-bulb-block=\"paragraph\" style=\"white-space:pre-wrap;line-height:1.75;font-size:14px;\">\r\n	23、ctrl+g	跳转到第几行\r\n</div>\r\n<div yne-bulb-block=\"paragraph\" style=\"white-space:pre-wrap;line-height:1.75;font-size:14px;\">\r\n	24、ctrl+f	查找\r\n</div>\r\n<div yne-bulb-block=\"paragraph\" style=\"white-space:pre-wrap;line-height:1.75;font-size:14px;\">\r\n	25、ctrl+/	当前行注释状态切换\r\n</div>\r\n<div yne-bulb-block=\"paragraph\" style=\"white-space:pre-wrap;line-height:1.75;font-size:14px;\">\r\n	26、ctrl+shift+/ 当前位置注释状态切换\r\n</div>\r\n<div yne-bulb-block=\"paragraph\" style=\"white-space:pre-wrap;line-height:1.75;font-size:14px;\">\r\n	27、Ctrl+X &nbsp;&nbsp;&nbsp;&nbsp;删除当前行\r\n</div>', '', '', '1', '3', 'blog', '123', '0', '0', 'n', 'n', 'n', 'y', 'y', '', '', '0', '3,0');
INSERT INTO `emlog_blog` VALUES ('9', '花开花落', '1503038353', '前天，做了一个梦，梦到某人对我说了句英语，具体英文不记得了，好像意思是：你是不会说谎的，在你的眼中。不知道什么意思...若要前行，就得离开现在停留的地方。现在又到了十字路口，不知何去何从。', '', '', '1', '1', 'blog', '101', '0', '0', 'n', 'n', 'n', 'y', 'y', '', '', '0', '0,0');
INSERT INTO `emlog_blog` VALUES ('10', '因为一个人，喜欢一首歌', '1503929926', '不知道不明了不想要 \r\n为什么我的心 \r\n明明是想靠近\r\n却孤单到黎明\r\n不知道不明了不想要\r\n为什么我的心\r\n那爱情的绮丽\r\n总是在孤单里\r\n才把我的最好的爱给你', '', '', '1', '4', 'blog', '102', '0', '0', 'n', 'n', 'n', 'y', 'y', '', '', '0', '0,0');
INSERT INTO `emlog_blog` VALUES ('12', '不想错过', '1507818931', '也许世上最大的过错就是错过。正如以前看到的一句话，我离开时你靠近，我靠近时你离开。再也不能随心所欲，不羁放纵。人就是贱，总是在失去后才懂得珍惜，等到失去的时候才后悔莫及。不想错过。。', '', '', '1', '1', 'blog', '100', '0', '0', 'n', 'n', 'n', 'y', 'y', '', '', '0', '0,0');
INSERT INTO `emlog_blog` VALUES ('13', '工作周报技术点', '1509325589', '<p>\r\n	1、jquery追加input文本框事件\r\n</p>\r\n<p>\r\n	html页面：\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	&lt;button type=\"button\" class=\"mb-sm btn btn-default yu-js-addrow\"&gt;追加一行&lt;/button&gt;\r\n</p>\r\n<p>\r\n	&lt;button type=\"button\" class=\"mb-sm btn btn-default yu-js-delrow\"&gt;删除选中行&lt;/button&gt;\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	js中：\r\n</p>\r\n<p>\r\n	<span style=\"background-color:#EFEFEF;font-family:宋体;font-size:12pt;\">&lt;script&gt;</span>\r\n</p>\r\n<p>\r\n	<span style=\"background-color:#EFEFEF;font-family:宋体;font-size:12pt;\">var i=0;</span>\r\n</p>\r\n<pre style=\"background-color:#FFFFFF;font-family:宋体;font-size:12pt;\"><span style=\"background-color:#efefef;\">\r\n<p>\r\n	&nbsp; &nbsp;$(document).ready(function(){\r\n</p>\r\n\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp;//追加一行\r\n</p>\r\n\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp;$(\".yu-js-addrow\").click(function(){\r\n</p>\r\n\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;var s = \"lay_time_yu_\"+i;\r\n</p>\r\n\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;var b = \"lay_time_yuu_\"+i;\r\n</p>\r\n\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;var html = \'&lt;tr&gt;&lt;input type=\"hidden\" name=\"project_id[]\" value=\"\"/&gt;\r\n</p>\r\n\r\n<p>\r\n	&lt;td&gt;&lt;input type=\"checkbox\" name=\"test\" /&gt;&lt;/td&gt;\r\n</p>\r\n\r\n<p>\r\n	&lt;td&gt;&lt;input class=\"form-control \" name=\"project_name[]\" type=\"textarea\" value=\"\"&gt;&lt;/td&gt;\r\n</p>\r\n\r\n<p>\r\n	&lt;td&gt;&lt;input class=\"form-control \'+s+\'\" &nbsp;yu=\"\'+s+\'\"onmouseover=\"yulaydate(this)\" name=\"start_time[]\" type=\"text\" value=\"\"&gt;&lt;/td&gt;\r\n</p>\r\n\r\n<p>\r\n	&lt;td&gt;&lt;input class=\"form-control \'+b+\'\" yu=\"\'+b+\'\" name=\"end_time[]\" onmouseover=\"yulaydate(this)\" type=\"text\" value=\"\"&gt;&lt;/td&gt;\r\n</p>\r\n\r\n<p>\r\n	&lt;td&gt;&lt;textarea name=\"remark[]\" class=\"form-control\" cols=\"3\"&gt;&lt;/textarea&gt;&lt;/td&gt;&lt;/tr&gt;\';\r\n</p>\r\n\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;$(\"tbody\").append(html);\r\n</p>\r\n\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;i++;\r\n</p>\r\n\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp;});\r\n</p>\r\n\r\n<p>\r\n	<br />\r\n\r\n</p>\r\n\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp;//删除选中行\r\n</p>\r\n\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp;$(\".yu-js-delrow\").click(function(){\r\n</p>\r\n\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;$(\"input[name=\'test\']:checked\").each(function(){\r\n</p>\r\n\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;$(this).parent().parent().remove();\r\n</p>\r\n\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;})\r\n</p>\r\n\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp;})\r\n</p>\r\n\r\n<p>\r\n	&nbsp; &nbsp;})\r\n</p>\r\n\r\n<p>\r\n	<br />\r\n\r\n</p>\r\n\r\n<p>\r\n	&lt;/script&gt;\r\n</p>\r\n\r\n<p>\r\n	<br />\r\n\r\n</p>\r\n\r\n<p>\r\n	&lt;td&gt;{!! Form::text(\'start_time[]\', date(\'Y-m-d\',$data[\'start_time\']),\r\n</p>\r\n\r\n<p>\r\n	[\'class\'=&gt;\'form-control lay_time1\'.$data[\"id\"],\'yu\'=&gt;\'lay_time1\'.$data[\"id\"],\'onmouseover\'=&gt;\"yulaydate(this)\"]) !!}&lt;/td&gt;\r\n</p>\r\n\r\n<p>\r\n	&lt;td&gt;{!! Form::text(\'end_time[]\', date(\'Y-m-d\',$data[\'end_time\']),\r\n</p>\r\n\r\n<p>\r\n	[\'class\'=&gt;\'form-control lay_time2\'.$data[\"id\"],\'yu\'=&gt;\'lay_time2\'.$data[\"id\"],\'onmouseover\'=&gt;\"yulaydate(this)\"]) !!}&lt;/td&gt;\r\n</p>\r\n\r\n<p>\r\n	<br />\r\n\r\n</p>\r\n\r\n<p>\r\n	引入laydate时间与日期插件：\r\n</p>\r\n\r\n<p>\r\n	function yulaydate(s){\r\n</p>\r\n\r\n<p>\r\n	&nbsp; &nbsp;var c = $(s).attr(\'yu\');\r\n</p>\r\n\r\n<p>\r\n	&nbsp; &nbsp;layui.use(\'laydate\', function(){\r\n</p>\r\n\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp;var laydate = layui.laydate;\r\n</p>\r\n\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp;laydate.render({\r\n</p>\r\n\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;elem: \'.\'+c//指定元素\r\n</p>\r\n\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;//,trigger: \'click\' //采用click弹出\r\n</p>\r\n\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp;});\r\n</p>\r\n\r\n<p>\r\n	&nbsp; &nbsp;});\r\n</p>\r\n\r\n<p>\r\n	}\r\n</p>\r\n\r\n<p>\r\n	&lt;/script&gt;\r\n</p>\r\n\r\n<p>\r\n	<br />\r\n\r\n</p>\r\n\r\n<p>\r\n	上报、汇报：通过ajax提交\r\n</p>\r\n\r\n<pre style=\"background-color:#FFFFFF;font-family:宋体;font-size:12pt;\"><span style=\"background-color:#efefef;\">&lt;</span><span style=\"color:#000080;background-color:#efefef;font-weight:bold;\">a </span><span style=\"color:#0000ff;background-color:#efefef;font-weight:bold;\">href=</span><span style=\"color:#008000;background-color:#efefef;font-weight:bold;\">\"javascript:void(0)\" </span><span style=\"color:#0000ff;background-color:#efefef;font-weight:bold;\">class=</span><span style=\"color:#008000;background-color:#efefef;font-weight:bold;\">\"dogo-click-reported\" </span><span style=\"color:#0000ff;background-color:#efefef;font-weight:bold;\">data-title=</span><span style=\"color:#008000;background-color:#efefef;font-weight:bold;\">\"</span><span style=\"background-color:#f7faff;\">{{</span><span style=\"color:#660000;background-color:#f7faff;\">$item</span><span style=\"background-color:#f7faff;\">-&gt;</span><span style=\"color:#660e7a;background-color:#f7faff;font-weight:bold;\">title</span><span style=\"background-color:#f7faff;\">}}</span><span style=\"color:#008000;background-color:#efefef;font-weight:bold;\">\" </span><span style=\"color:#0000ff;background-color:#efefef;font-weight:bold;\">title=</span><span style=\"color:#008000;background-color:#efefef;font-weight:bold;\">\"上报\" </span></pre>\r\n<pre style=\"background-color:#FFFFFF;font-family:宋体;font-size:12pt;\"><span style=\"color:#0000ff;background-color:#efefef;font-weight:bold;\">reported-data-id=</span><span style=\"color:#008000;background-color:#efefef;font-weight:bold;\">\"</span><span style=\"background-color:#f7faff;\">{{</span><span style=\"color:#660000;background-color:#f7faff;\">$item</span><span style=\"background-color:#f7faff;\">-&gt;</span><span style=\"color:#660e7a;background-color:#f7faff;font-weight:bold;\">id</span><span style=\"background-color:#f7faff;\">}}</span><span style=\"color:#008000;background-color:#efefef;font-weight:bold;\">\"</span><span style=\"background-color:#efefef;\">&gt;&lt;</span><span style=\"color:#000080;background-color:#efefef;font-weight:bold;\">i </span><span style=\"color:#0000ff;background-color:#efefef;font-weight:bold;\">class=</span><span style=\"color:#008000;background-color:#efefef;font-weight:bold;\">\"fa fa-external-link\"</span><span style=\"background-color:#efefef;\">&gt;</span> <span style=\"background-color:#efefef;\">&lt;/</span><span style=\"color:#000080;background-color:#efefef;font-weight:bold;\">i</span><span style=\"background-color:#efefef;\">&gt;</span> 上报<span style=\"background-color:#efefef;\">&lt;/</span><span style=\"color:#000080;background-color:#efefef;font-weight:bold;\">a</span><span style=\"background-color:#efefef;\">&gt;</span></pre>\r\n<pre style=\"background-color:#FFFFFF;font-family:宋体;font-size:12pt;\"><span style=\"background-color:#efefef;\">&lt;</span><span style=\"color:#000080;background-color:#efefef;font-weight:bold;\">a </span><span style=\"color:#0000ff;background-color:#efefef;font-weight:bold;\">href=</span><span style=\"color:#008000;background-color:#efefef;font-weight:bold;\">\"javascript:void(0)\" </span><span style=\"color:#0000ff;background-color:#efefef;font-weight:bold;\">class=</span><span style=\"color:#008000;background-color:#efefef;font-weight:bold;\">\"dogo-click-report\" </span><span style=\"color:#0000ff;background-color:#efefef;font-weight:bold;\">data-title=</span><span style=\"color:#008000;background-color:#efefef;font-weight:bold;\">\"</span><span style=\"background-color:#f7faff;\">{{</span><span style=\"color:#660000;background-color:#f7faff;\">$item</span><span style=\"background-color:#f7faff;\">-&gt;</span><span style=\"color:#660e7a;background-color:#f7faff;font-weight:bold;\">title</span><span style=\"background-color:#f7faff;\">}}</span><span style=\"color:#008000;background-color:#efefef;font-weight:bold;\">\" </span><span style=\"color:#0000ff;background-color:#efefef;font-weight:bold;\">title=</span><span style=\"color:#008000;background-color:#efefef;font-weight:bold;\">\"汇报\" </span></pre>\r\n<pre style=\"background-color:#FFFFFF;font-family:宋体;font-size:12pt;\"><span style=\"color:#0000ff;background-color:#efefef;font-weight:bold;\">report-data-id=</span><span style=\"color:#008000;background-color:#efefef;font-weight:bold;\">\"</span><span style=\"background-color:#f7faff;\">{{</span><span style=\"color:#660000;background-color:#f7faff;\">$item</span><span style=\"background-color:#f7faff;\">-&gt;</span><span style=\"color:#660e7a;background-color:#f7faff;font-weight:bold;\">id</span><span style=\"background-color:#f7faff;\">}}</span><span style=\"color:#008000;background-color:#efefef;font-weight:bold;\">\"</span><span style=\"background-color:#efefef;\">&gt;&lt;</span><span style=\"color:#000080;background-color:#efefef;font-weight:bold;\">i </span><span style=\"color:#0000ff;background-color:#efefef;font-weight:bold;\">class=</span><span style=\"color:#008000;background-color:#efefef;font-weight:bold;\">\"fa fa-external-link\"</span><span style=\"background-color:#efefef;\">&gt;</span> <span style=\"background-color:#efefef;\">&lt;/</span><span style=\"color:#000080;background-color:#efefef;font-weight:bold;\">i</span><span style=\"background-color:#efefef;\">&gt;</span> 汇报<span style=\"background-color:#efefef;\">&lt;/</span><span style=\"color:#000080;background-color:#efefef;font-weight:bold;\">a</span><span style=\"background-color:#efefef;\">&gt;</span></pre>\r\n<p>\r\n	&lt;script&gt;\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp;$(document).ready(function(){\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;// 上报\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;$(\".dogo-click-reported\").click(function(){\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;var reported_data_id = $(this).attr(\'reported-data-id\')\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;var data_title = $(this).attr(\'data-title\');\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;var url = \"{{route(\'admin.weekly.reported\')}}\";\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;layer.confirm(\'确定要上报【\'+data_title+\'】吗?\', {icon: 3, title:\'提示\'}, function(index){\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;$.ajax({\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;url:url,\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;type:\'post\',\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;data:{\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;reported_data_id:reported_data_id\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;},\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;dataType:\'json\',\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;beforeSend:function () {\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;layer.load(2);\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;},\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;headers: {\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\'X-CSRF-TOKEN\': $(\'meta[name=\"csrf-token\"]\').attr(\'content\')\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;},\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;success:function(response){\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;layer.closeAll(\'loading\');\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;layer.msg(response.msg);\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;if(response.status==\'s\'){\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;window.location.reload();\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;}else{\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;layer.msg(response.msg);\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;}\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;}\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;})\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;layer.close(index);\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;},function (index) {\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;layer.close(index);\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;});\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;})\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;//汇报\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;$(\".dogo-click-report\").click(function(){\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;var report_data_id = $(this).attr(\'report-data-id\')\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;var data_title = $(this).attr(\'data-title\');\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;var url = \"{{route(\'admin.weekly.report\')}}\";\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;layer.confirm(\'确定要汇报【\'+data_title+\'】吗?\', {icon: 3, title:\'提示\'}, function(index){\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;$.ajax({\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;url:url,\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;type:\'post\',\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;data:{\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;report_data_id:report_data_id\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;},\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;dataType:\'json\',\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;beforeSend:function () {\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;layer.load(2);\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;},\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;headers: {\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\'X-CSRF-TOKEN\': $(\'meta[name=\"csrf-token\"]\').attr(\'content\')\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;},\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;success:function(response){\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;layer.closeAll(\'loading\');\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;layer.msg(response.msg);\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;if(response.status==\'s\'){\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;window.location.reload();\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;}else{\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;layer.msg(response.msg);\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;}\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;}\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;})\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;layer.close(index);\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;},function (index) {\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;layer.close(index);\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;});\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;})\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp;})\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp;&lt;/script&gt;\r\n</p>\r\n<p>\r\n	控制器中上报方法：\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp;//上报\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp;public function reported(Request $request)\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp;{\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp;//初始化审批数据\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp;$reported_data_id = $request-&gt;get(\'reported_data_id\');\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp;$infos = WeeklyModel::where(\'id\',$reported_data_id)-&gt;first();\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp;$infos[\'submit_status\'] = 11;//上报状态\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp;$rs = $infos-&gt;save();\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp;if($rs){\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;$response = array(\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\'status\'=&gt;\'s\',\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\'code\'=&gt;\'1000\',\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\'msg\'=&gt;\'周报已上报\',\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;);\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp;}else{\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;$response = array(\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\'status\'=&gt;\'f\',\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\'code\'=&gt;\'4000\',\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\'msg\'=&gt;\'上报失败，请重新操作\'\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;);\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp;}\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp;return response()-&gt;json($response)-&gt;header(\'Content-Type\',\'text/html;charset=utf-8\');\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp;}\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n</span><span style=\"background-color:#efefef;\"></span></pre>\r\n<p>\r\n	<br />\r\n</p>', '', '', '1', '3', 'blog', '115', '1', '0', 'n', 'n', 'n', 'y', 'y', '', '', '0', '0,0');
INSERT INTO `emlog_blog` VALUES ('14', 'Mysql和MongoDb的优缺点', '1509330279', 'Mysql相比于MongoDB的优点：<br />\r\n1.保持数据的一致性较好,支持事务。<br />\r\n2.MySQL使用标准的SQL数据语言形式。<br />\r\n3.支持多种存储引擎。<br />\r\n4.全面支持SQL的group by和order by子句,支持聚合函数,可以在同一查询中混合来自不同数据库的表,可以进行join等复杂查询。<br />\r\n5.所有列都有缺省值。<br />\r\n6.通用化,技术成熟,维护起来比较容易。<br />\r\n<br />\r\nMysql相比于MongoDB的缺点：<br />\r\n1.数据读写必须经过sql解析,大量数据、高并发下读写性能不足。<br />\r\n2.对数据做读写,或修改数据结构时需要加锁,影响并发操作。<br />\r\n3.无法适应非结构化存储。<br />\r\n4.扩展困难。<br />\r\n<br />\r\nMongoDB相比于Mysql的优点：<br />\r\n1.面向文档的存储引擎,可以方便支持非结构化数据。<br />\r\n2.基本支持分布式,易于水平扩展,可伸缩。<br />\r\n3.高并发,大数据下读写能力较强。<br />\r\n4.第三方支持丰富。(这是与其他的NoSQL相比,MongoDB也具有的优势)<br />\r\n5.扩展非常容易(用MongoDB实现分表、读写分离、分布式存储非常容易，配置一下即可),Mysql的扩展也可以做到,但性能和维护成本比较高。<br />\r\n6.数据库本身支持的自动分片集群。<br />\r\n7.拥有灵活、高效的操作与数据模型。<br />\r\n8.内置GridFS,支持大容量的存储。<br />\r\n<br />\r\nMongoDB相比于Mysql的缺点：<br />\r\n1.MongoDB不支持事务操作,数据的一致性支持不如Mysql。<br />\r\n2.保存关系比较复杂的数据不太容易,不支持关系和联表操作,join等复杂操作能力较弱;相对数据一对多和多对多的关系,不如Mysql方便。<br />\r\n3.它不支持SQL语句,通常以key-value形式存储数据,没有表结构。<br />\r\n4.MongoDB占用空间比较大。<br />\r\n5.MongoDB没有如Mysql那样成熟的维护工具,维护起来相对于Mysql比较麻烦,通用性差。<br />', '', '', '1', '3', 'blog', '116', '0', '0', 'n', 'n', 'n', 'y', 'y', '', '', '0', '0,1');
INSERT INTO `emlog_blog` VALUES ('15', '用JS获取地址栏参数的方法', '1512551484', '<p>\r\n	function GetQueryString(name)\r\n{&nbsp;\r\n</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;var reg = new RegExp(\"(^|&amp;)\"+ name +\"=([^&amp;]*)(&amp;|$)\");&nbsp;\r\n</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;var r = window.location.search.substr(1).match(reg);&nbsp;\r\n</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if(r!=null)return  unescape(r[2]); return null;&nbsp;\r\n</p>\r\n<p>\r\n	}&nbsp;\r\n</p>\r\n<p>\r\n	// 调用方法\r\nalert(GetQueryString(\"参数名1\"));\r\n</p>', '', '', '1', '3', 'blog', '81', '0', '0', 'n', 'n', 'n', 'y', 'y', '', '', '0', '1,0');

-- ----------------------------
-- Table structure for emlog_comment
-- ----------------------------
DROP TABLE IF EXISTS `emlog_comment`;
CREATE TABLE `emlog_comment` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(10) unsigned NOT NULL DEFAULT '0',
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `date` bigint(20) NOT NULL,
  `poster` varchar(20) NOT NULL DEFAULT '',
  `comment` text NOT NULL,
  `mail` varchar(60) NOT NULL DEFAULT '',
  `url` varchar(75) NOT NULL DEFAULT '',
  `ip` varchar(128) NOT NULL DEFAULT '',
  `hide` enum('n','y') NOT NULL DEFAULT 'n',
  PRIMARY KEY (`cid`),
  KEY `gid` (`gid`),
  KEY `date` (`date`),
  KEY `hide` (`hide`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of emlog_comment
-- ----------------------------
INSERT INTO `emlog_comment` VALUES ('1', '2', '0', '1501224106', '小鱼儿', '0.0', 'yukejian8888@163.com', 'http://www.xxyuer.com/', '60.216.165.40', 'n');
INSERT INTO `emlog_comment` VALUES ('3', '2', '0', '1501575347', '小鱼儿', '[smile2]', 'yukejian8888@163.com', 'http://www.xxyuer.com/', '60.216.165.40', 'n');
INSERT INTO `emlog_comment` VALUES ('4', '2', '0', '1501832351', '123', '123aa啊', '321123321@qq.com', 'http://123', '111.207.7.150', 'n');
INSERT INTO `emlog_comment` VALUES ('5', '13', '0', '1509355788', 'aaa', '啊啊啊elcome guest\r\n<script>alert(\'attacked\')</script>\r\n<br>\r\n<a href=\'http://www.cnblogs.com/bangerlee/\'>Click to Download</a>', '', '', '106.38.228.221', 'n');

-- ----------------------------
-- Table structure for emlog_link
-- ----------------------------
DROP TABLE IF EXISTS `emlog_link`;
CREATE TABLE `emlog_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sitename` varchar(30) NOT NULL DEFAULT '',
  `siteurl` varchar(75) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `hide` enum('n','y') NOT NULL DEFAULT 'n',
  `taxis` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of emlog_link
-- ----------------------------
INSERT INTO `emlog_link` VALUES ('1', 'emlog', 'http://www.emlog.net', 'emlog官方主页', 'n', '0');
INSERT INTO `emlog_link` VALUES ('2', '百度', 'https://www.baidu.com', '百度的官方网站', 'n', '0');

-- ----------------------------
-- Table structure for emlog_navi
-- ----------------------------
DROP TABLE IF EXISTS `emlog_navi`;
CREATE TABLE `emlog_navi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `naviname` varchar(30) NOT NULL DEFAULT '',
  `url` varchar(75) NOT NULL DEFAULT '',
  `newtab` enum('n','y') NOT NULL DEFAULT 'n',
  `hide` enum('n','y') NOT NULL DEFAULT 'n',
  `taxis` int(10) unsigned NOT NULL DEFAULT '0',
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `isdefault` enum('n','y') NOT NULL DEFAULT 'n',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `type_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of emlog_navi
-- ----------------------------
INSERT INTO `emlog_navi` VALUES ('1', '首页', '', 'n', 'n', '1', '0', 'y', '1', '0');
INSERT INTO `emlog_navi` VALUES ('2', '微语', 't', 'n', 'y', '2', '0', 'y', '2', '0');
INSERT INTO `emlog_navi` VALUES ('3', '登录', 'admin', 'n', 'n', '3', '0', 'y', '3', '0');
INSERT INTO `emlog_navi` VALUES ('4', '个人心得', '', 'n', 'n', '1', '0', 'n', '4', '1');
INSERT INTO `emlog_navi` VALUES ('5', '技术资料', '', 'n', 'n', '1', '0', 'n', '4', '3');
INSERT INTO `emlog_navi` VALUES ('6', '随心所欲', '', 'n', 'n', '1', '0', 'n', '4', '4');

-- ----------------------------
-- Table structure for emlog_options
-- ----------------------------
DROP TABLE IF EXISTS `emlog_options`;
CREATE TABLE `emlog_options` (
  `option_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(255) NOT NULL,
  `option_value` longtext NOT NULL,
  PRIMARY KEY (`option_id`),
  KEY `option_name` (`option_name`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of emlog_options
-- ----------------------------
INSERT INTO `emlog_options` VALUES ('1', 'blogname', '那年花开');
INSERT INTO `emlog_options` VALUES ('2', 'bloginfo', '青春是打开了,就合不上的书。人生是踏上了，就回不了头的路，爱情是扔出了，就收不回的赌注...');
INSERT INTO `emlog_options` VALUES ('3', 'site_title', '');
INSERT INTO `emlog_options` VALUES ('4', 'site_description', '');
INSERT INTO `emlog_options` VALUES ('5', 'site_key', 'emlog');
INSERT INTO `emlog_options` VALUES ('6', 'log_title_style', '0');
INSERT INTO `emlog_options` VALUES ('7', 'blogurl', 'http://www.xxyuer.com/');
INSERT INTO `emlog_options` VALUES ('8', 'icp', '鲁ICP备17026630号-1');
INSERT INTO `emlog_options` VALUES ('9', 'footer_info', '<script type=\"text/javascript\">var cnzz_protocol = ((\"https:\" == document.location.protocol) ? \" https://\" : \" http://\");document.write(unescape(\"%3Cspan id=\'cnzz_stat_icon_1263252318\'%3E%3C/span%3E%3Cscript src=\'\" + cnzz_protocol + \"s13.cnzz.com/z_stat.php%3Fid%3D1263252318%26show%3Dpic\' type=\'text/javascript\'%3E%3C/script%3E\"));</script>');
INSERT INTO `emlog_options` VALUES ('10', 'admin_perpage_num', '15');
INSERT INTO `emlog_options` VALUES ('11', 'rss_output_num', '0');
INSERT INTO `emlog_options` VALUES ('12', 'rss_output_fulltext', 'y');
INSERT INTO `emlog_options` VALUES ('13', 'index_lognum', '10');
INSERT INTO `emlog_options` VALUES ('14', 'index_comnum', '10');
INSERT INTO `emlog_options` VALUES ('15', 'index_twnum', '10');
INSERT INTO `emlog_options` VALUES ('16', 'index_newtwnum', '5');
INSERT INTO `emlog_options` VALUES ('17', 'index_newlognum', '5');
INSERT INTO `emlog_options` VALUES ('18', 'index_randlognum', '5');
INSERT INTO `emlog_options` VALUES ('19', 'index_hotlognum', '5');
INSERT INTO `emlog_options` VALUES ('20', 'comment_subnum', '20');
INSERT INTO `emlog_options` VALUES ('21', 'nonce_templet', 'loper');
INSERT INTO `emlog_options` VALUES ('22', 'admin_style', 'green');
INSERT INTO `emlog_options` VALUES ('23', 'tpl_sidenum', '1');
INSERT INTO `emlog_options` VALUES ('24', 'comment_code', 'n');
INSERT INTO `emlog_options` VALUES ('25', 'comment_needchinese', 'y');
INSERT INTO `emlog_options` VALUES ('26', 'comment_interval', '60');
INSERT INTO `emlog_options` VALUES ('27', 'isgravatar', 'y');
INSERT INTO `emlog_options` VALUES ('28', 'isthumbnail', 'y');
INSERT INTO `emlog_options` VALUES ('29', 'att_maxsize', '20480');
INSERT INTO `emlog_options` VALUES ('30', 'att_type', 'rar,zip,gif,jpg,jpeg,png,txt,pdf,docx,doc,xls,xlsx');
INSERT INTO `emlog_options` VALUES ('31', 'att_imgmaxw', '420');
INSERT INTO `emlog_options` VALUES ('32', 'att_imgmaxh', '460');
INSERT INTO `emlog_options` VALUES ('33', 'comment_paging', 'y');
INSERT INTO `emlog_options` VALUES ('34', 'comment_pnum', '10');
INSERT INTO `emlog_options` VALUES ('35', 'comment_order', 'newer');
INSERT INTO `emlog_options` VALUES ('36', 'login_code', 'n');
INSERT INTO `emlog_options` VALUES ('37', 'reply_code', 'n');
INSERT INTO `emlog_options` VALUES ('38', 'iscomment', 'y');
INSERT INTO `emlog_options` VALUES ('39', 'ischkcomment', 'y');
INSERT INTO `emlog_options` VALUES ('40', 'ischkreply', 'n');
INSERT INTO `emlog_options` VALUES ('41', 'isurlrewrite', '0');
INSERT INTO `emlog_options` VALUES ('42', 'isalias', 'n');
INSERT INTO `emlog_options` VALUES ('43', 'isalias_html', 'n');
INSERT INTO `emlog_options` VALUES ('44', 'isgzipenable', 'n');
INSERT INTO `emlog_options` VALUES ('45', 'isxmlrpcenable', 'n');
INSERT INTO `emlog_options` VALUES ('46', 'ismobile', 'n');
INSERT INTO `emlog_options` VALUES ('47', 'isexcerpt', 'n');
INSERT INTO `emlog_options` VALUES ('48', 'excerpt_subnum', '300');
INSERT INTO `emlog_options` VALUES ('49', 'istwitter', 'y');
INSERT INTO `emlog_options` VALUES ('50', 'istreply', 'n');
INSERT INTO `emlog_options` VALUES ('51', 'topimg', '');
INSERT INTO `emlog_options` VALUES ('52', 'custom_topimgs', 'a:0:{}');
INSERT INTO `emlog_options` VALUES ('53', 'timezone', '8');
INSERT INTO `emlog_options` VALUES ('54', 'active_plugins', 'a:2:{i:0;s:13:\"tips/tips.php\";i:4;s:13:\"digg/digg.php\";}');
INSERT INTO `emlog_options` VALUES ('55', 'widget_title', 'a:13:{s:7:\"blogger\";s:12:\"个人资料\";s:8:\"calendar\";s:6:\"日历\";s:7:\"twitter\";s:12:\"最新微语\";s:3:\"tag\";s:6:\"标签\";s:4:\"sort\";s:6:\"分类\";s:7:\"archive\";s:6:\"存档\";s:7:\"newcomm\";s:12:\"最新评论\";s:6:\"newlog\";s:12:\"最新文章\";s:10:\"random_log\";s:12:\"随机文章\";s:6:\"hotlog\";s:12:\"热门文章\";s:4:\"link\";s:6:\"链接\";s:6:\"search\";s:6:\"搜索\";s:11:\"custom_text\";s:15:\"自定义组件\";}');
INSERT INTO `emlog_options` VALUES ('56', 'custom_widget', 'a:0:{}');
INSERT INTO `emlog_options` VALUES ('57', 'widgets1', 'a:5:{i:0;s:6:\"search\";i:1;s:6:\"newlog\";i:2;s:6:\"hotlog\";i:3;s:7:\"archive\";i:4;s:4:\"link\";}');
INSERT INTO `emlog_options` VALUES ('58', 'widgets2', '');
INSERT INTO `emlog_options` VALUES ('59', 'widgets3', '');
INSERT INTO `emlog_options` VALUES ('60', 'widgets4', '');

-- ----------------------------
-- Table structure for emlog_reply
-- ----------------------------
DROP TABLE IF EXISTS `emlog_reply`;
CREATE TABLE `emlog_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tid` int(10) unsigned NOT NULL DEFAULT '0',
  `date` bigint(20) NOT NULL,
  `name` varchar(20) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `hide` enum('n','y') NOT NULL DEFAULT 'n',
  `ip` varchar(128) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `gid` (`tid`),
  KEY `hide` (`hide`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of emlog_reply
-- ----------------------------
INSERT INTO `emlog_reply` VALUES ('1', '3', '1501576257', '小鱼儿', '[星星]', 'n', '');

-- ----------------------------
-- Table structure for emlog_sort
-- ----------------------------
DROP TABLE IF EXISTS `emlog_sort`;
CREATE TABLE `emlog_sort` (
  `sid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sortname` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(200) NOT NULL DEFAULT '',
  `taxis` int(10) unsigned NOT NULL DEFAULT '0',
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `template` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of emlog_sort
-- ----------------------------
INSERT INTO `emlog_sort` VALUES ('1', '个人心得', '', '0', '0', '这是个人心得分类。', '');
INSERT INTO `emlog_sort` VALUES ('3', '技术资料', '', '0', '0', '这是平时用到的技术资料。', '');
INSERT INTO `emlog_sort` VALUES ('4', '随心所欲', '', '0', '0', '这是随心所欲的地方。', '');

-- ----------------------------
-- Table structure for emlog_tag
-- ----------------------------
DROP TABLE IF EXISTS `emlog_tag`;
CREATE TABLE `emlog_tag` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tagname` varchar(60) NOT NULL DEFAULT '',
  `gid` text NOT NULL,
  PRIMARY KEY (`tid`),
  KEY `tagname` (`tagname`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of emlog_tag
-- ----------------------------
INSERT INTO `emlog_tag` VALUES ('1', '心得', ',2,');
INSERT INTO `emlog_tag` VALUES ('2', '正则表达式', ',11,');

-- ----------------------------
-- Table structure for emlog_twitter
-- ----------------------------
DROP TABLE IF EXISTS `emlog_twitter`;
CREATE TABLE `emlog_twitter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `img` varchar(200) DEFAULT NULL,
  `author` int(10) NOT NULL DEFAULT '1',
  `date` bigint(20) NOT NULL,
  `replynum` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `author` (`author`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of emlog_twitter
-- ----------------------------
INSERT INTO `emlog_twitter` VALUES ('1', '使用微语记录您身边的新鲜事', '', '1', '1501210451', '0');
INSERT INTO `emlog_twitter` VALUES ('3', '天天牙齿见太阳！', '', '1', '1501576216', '1');

-- ----------------------------
-- Table structure for emlog_user
-- ----------------------------
DROP TABLE IF EXISTS `emlog_user`;
CREATE TABLE `emlog_user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(64) NOT NULL DEFAULT '',
  `nickname` varchar(20) NOT NULL DEFAULT '',
  `role` varchar(60) NOT NULL DEFAULT '',
  `ischeck` enum('n','y') NOT NULL DEFAULT 'n',
  `photo` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(60) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`uid`),
  KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of emlog_user
-- ----------------------------
INSERT INTO `emlog_user` VALUES ('1', 'yukejian', '$P$B1nji9WSfo0qhZUwwsTOASDbQ/oT44/', '小鱼儿', 'admin', 'n', '../content/uploadfile/201707/thum-9c3c1501210839.jpg', 'yukejian8888@163.com', '');
