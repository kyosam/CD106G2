-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1:3306
-- 產生時間： 2019-04-10 11:23:08
-- 伺服器版本: 5.7.23
-- PHP 版本： 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `cd106g2`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `admNo` int(5) NOT NULL AUTO_INCREMENT,
  `admId` varchar(15) NOT NULL,
  `admPsw` varchar(15) NOT NULL,
  `admPer` char(1) NOT NULL COMMENT '0'': 一般權限, ''1'': 最高權限',
  `admStatus` tinyint(1) NOT NULL COMMENT '0:停權 1:正常',
  PRIMARY KEY (`admNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='管理員';

-- --------------------------------------------------------

--
-- 資料表結構 `adminslocation`
--

DROP TABLE IF EXISTS `adminslocation`;
CREATE TABLE IF NOT EXISTS `adminslocation` (
  `staffNo` int(5) NOT NULL AUTO_INCREMENT COMMENT 'pk,Auto_increment',
  `admNo` int(5) NOT NULL COMMENT 'fk',
  `admLoc` varchar(20) NOT NULL,
  PRIMARY KEY (`staffNo`),
  KEY `admNo` (`admNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='森存者位置';

-- --------------------------------------------------------

--
-- 資料表結構 `eveninplan`
--

DROP TABLE IF EXISTS `eveninplan`;
CREATE TABLE IF NOT EXISTS `eveninplan` (
  `ordNo` int(5) NOT NULL COMMENT 'pk,fk,not_null',
  `entNo` int(5) NOT NULL COMMENT 'pk,fk,not_null',
  `entUseStatus` tinyint(1) NOT NULL COMMENT '0:已使用 1:可使用',
  PRIMARY KEY (`ordNo`,`entNo`),
  KEY `entNo` (`entNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `entNo` int(5) NOT NULL AUTO_INCREMENT COMMENT 'pk,Auto_increment',
  `entName` varchar(20) NOT NULL,
  `entPhoto` varchar(50) NOT NULL,
  `entBrief` varchar(255) NOT NULL,
  `entDesc` varchar(255) NOT NULL,
  `entDate` int(3) NOT NULL,
  `entPrice` int(5) NOT NULL,
  `entStatus` tinyint(1) NOT NULL COMMENT '0:下架 1:上架',
  `entLoc` varchar(20) NOT NULL,
  `entComm` int(5) NOT NULL,
  `entSco` int(5) NOT NULL,
  `entScoTime` int(5) NOT NULL,
  `entSurVal` int(1) NOT NULL COMMENT '0~3分',
  `enyHanVal` int(1) NOT NULL COMMENT '0~3分',
  `entPcVal` int(1) NOT NULL COMMENT '0~3分',
  PRIMARY KEY (`entNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='活動';

-- --------------------------------------------------------

--
-- 資料表結構 `eventevaluation`
--

DROP TABLE IF EXISTS `eventevaluation`;
CREATE TABLE IF NOT EXISTS `eventevaluation` (
  `entEvalNo` int(5) NOT NULL AUTO_INCREMENT COMMENT 'pk,Auto_increment',
  `entNo` int(5) NOT NULL COMMENT 'fk',
  `memNo` int(5) NOT NULL COMMENT 'fk',
  `entSco` int(3) NOT NULL,
  `entEvalContent` varchar(150) NOT NULL,
  `entEvalDate` date NOT NULL,
  PRIMARY KEY (`entEvalNo`),
  KEY `entNo` (`entNo`),
  KEY `memNo` (`memNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='活動評價';

-- --------------------------------------------------------

--
-- 資料表結構 `eventevaluationreport`
--

DROP TABLE IF EXISTS `eventevaluationreport`;
CREATE TABLE IF NOT EXISTS `eventevaluationreport` (
  `entEvalRepNo` int(5) NOT NULL AUTO_INCREMENT COMMENT 'pk,Auto_increment',
  `entEvalNo` int(5) NOT NULL COMMENT 'fk',
  `entEvalContent` varchar(150) NOT NULL,
  `entEvalRepReason` varchar(150) NOT NULL,
  `entEvalRepStatus` char(1) NOT NULL COMMENT '0'': 未處理, ''1'': 已處理',
  PRIMARY KEY (`entEvalRepNo`),
  KEY `entEvalNo` (`entEvalNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='活動評價檢舉';

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `memNo` int(5) NOT NULL AUTO_INCREMENT COMMENT 'pk,Auto_increment',
  `memId` varchar(15) NOT NULL,
  `memMail` varchar(30) NOT NULL,
  `memPsw` varchar(15) NOT NULL,
  `memImg` varchar(50) NOT NULL,
  `memStatus` tinyint(1) NOT NULL COMMENT '0:停權 1:正常',
  `memTotalPoint` int(5) NOT NULL,
  PRIMARY KEY (`memNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='會員';

-- --------------------------------------------------------

--
-- 資料表結構 `memberpoint`
--

DROP TABLE IF EXISTS `memberpoint`;
CREATE TABLE IF NOT EXISTS `memberpoint` (
  `pointNo` int(5) NOT NULL AUTO_INCREMENT COMMENT 'pk,Auto_increment',
  `memNo` int(5) NOT NULL,
  `pointDate` date NOT NULL,
  `pointType` int(5) NOT NULL COMMENT 'fk',
  `pointGet` int(5) NOT NULL,
  PRIMARY KEY (`pointNo`),
  KEY `pointType` (`pointType`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `notecomment`
--

DROP TABLE IF EXISTS `notecomment`;
CREATE TABLE IF NOT EXISTS `notecomment` (
  `noteCommNo` int(5) NOT NULL AUTO_INCREMENT COMMENT 'pk,Auto_increment',
  `memNo` int(5) NOT NULL COMMENT 'fk',
  `planNo` int(5) NOT NULL COMMENT 'fk',
  `noteCommTit` varchar(255) NOT NULL,
  `noteCommContent` varchar(255) NOT NULL,
  `noteCommDate` date NOT NULL,
  `noteCommStatus` tinyint(1) NOT NULL COMMENT '0:下架 1:上架',
  PRIMARY KEY (`noteCommNo`),
  KEY `memNo` (`memNo`),
  KEY `planNo` (`planNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='手札留言';

-- --------------------------------------------------------

--
-- 資料表結構 `notecommentreport`
--

DROP TABLE IF EXISTS `notecommentreport`;
CREATE TABLE IF NOT EXISTS `notecommentreport` (
  `noteCommRepNo` int(5) NOT NULL AUTO_INCREMENT COMMENT 'pk,Auto_increment',
  `noteCommNo` int(5) NOT NULL COMMENT 'fk',
  `noteCommRepReson` varchar(150) NOT NULL,
  `noteCommRepstatus` char(1) NOT NULL COMMENT '0'': 未處理, ''1'': 已處理',
  PRIMARY KEY (`noteCommRepNo`),
  KEY `noteCommNo` (`noteCommNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `ordNo` int(5) NOT NULL AUTO_INCREMENT COMMENT 'pk,Auto_increment',
  `memNo` int(5) NOT NULL COMMENT 'fk',
  `ordStatus` char(1) NOT NULL COMMENT '0'': 未使用 ''1'': 已使用 ''2'': 已過期',
  `ordDate` date NOT NULL,
  `playDate` int(3) NOT NULL,
  `ordTotal` int(10) NOT NULL,
  `planNo` int(5) NOT NULL COMMENT 'fk',
  PRIMARY KEY (`ordNo`),
  KEY `memNo` (`memNo`),
  KEY `planNo` (`planNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `orderdetaill`
--

DROP TABLE IF EXISTS `orderdetaill`;
CREATE TABLE IF NOT EXISTS `orderdetaill` (
  `ordNo` int(5) NOT NULL COMMENT 'pk,fk,not_null',
  `tktNo` int(5) NOT NULL COMMENT 'pk,fk,not_null',
  `tktPrice` int(5) NOT NULL,
  `buyQuan` int(5) NOT NULL,
  PRIMARY KEY (`ordNo`,`tktNo`),
  KEY `tktNo` (`tktNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `photo`
--

DROP TABLE IF EXISTS `photo`;
CREATE TABLE IF NOT EXISTS `photo` (
  `photoNo` int(5) NOT NULL AUTO_INCREMENT COMMENT 'pk,Auto_increment',
  `memNo` int(5) NOT NULL COMMENT 'fk',
  `photoWForester` varchar(50) NOT NULL,
  `photoLikeCnt` int(5) NOT NULL,
  PRIMARY KEY (`photoNo`),
  KEY `memNo` (`memNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `photoreport`
--

DROP TABLE IF EXISTS `photoreport`;
CREATE TABLE IF NOT EXISTS `photoreport` (
  `photoRepNo` int(5) NOT NULL AUTO_INCREMENT COMMENT 'pk,Auto_increment',
  `photoNo` int(5) NOT NULL COMMENT 'fk',
  `photoReprReason` varchar(150) NOT NULL,
  `photoWForester` varchar(50) NOT NULL,
  `photoRepStatus` char(1) NOT NULL COMMENT '0'': 未處理 ''1'': 已處裡',
  PRIMARY KEY (`photoRepNo`),
  KEY `photoNo` (`photoNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `plan`
--

DROP TABLE IF EXISTS `plan`;
CREATE TABLE IF NOT EXISTS `plan` (
  `planNo` int(5) NOT NULL AUTO_INCREMENT COMMENT 'pk,Auto_increment',
  `memNo` int(5) NOT NULL COMMENT 'fk',
  `planDefNo` int(5) NOT NULL COMMENT 'fk',
  `planName` varchar(20) NOT NULL,
  `planPhoto` varchar(50) NOT NULL,
  `planPrice` int(5) NOT NULL,
  `planStatus` tinyint(1) NOT NULL COMMENT '0:下架 1:上架',
  `planDesc` varchar(150) NOT NULL,
  `planList` varchar(150) NOT NULL,
  `noteName` varchar(20) NOT NULL,
  `noteContent` varchar(150) NOT NULL,
  `noteLikeTime` int(5) NOT NULL,
  `noteMsgTime` int(5) NOT NULL,
  `noteStatus` tinyint(1) NOT NULL COMMENT '0:下架 1:上架',
  PRIMARY KEY (`planNo`),
  KEY `memNo` (`memNo`),
  KEY `planDefNo` (`planDefNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='行程';

-- --------------------------------------------------------

--
-- 資料表結構 `plandefaultphoto`
--

DROP TABLE IF EXISTS `plandefaultphoto`;
CREATE TABLE IF NOT EXISTS `plandefaultphoto` (
  `planDefNo` int(5) NOT NULL COMMENT 'pk',
  `planDefPhoto` varchar(50) NOT NULL,
  PRIMARY KEY (`planDefNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `pointtype`
--

DROP TABLE IF EXISTS `pointtype`;
CREATE TABLE IF NOT EXISTS `pointtype` (
  `pointTypeNo` int(5) NOT NULL AUTO_INCREMENT COMMENT 'pk,Auto_increment',
  `ponitName` varchar(20) NOT NULL,
  PRIMARY KEY (`pointTypeNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `robot`
--

DROP TABLE IF EXISTS `robot`;
CREATE TABLE IF NOT EXISTS `robot` (
  `rbtNo` int(5) NOT NULL AUTO_INCREMENT COMMENT 'pk,Auto_increment',
  `rbtName` varchar(20) NOT NULL,
  `rbtAns` varchar(255) NOT NULL,
  `rbtStatus` tinyint(1) NOT NULL COMMENT '0:下架 1:上架',
  PRIMARY KEY (`rbtNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `tktNo` int(5) NOT NULL COMMENT 'pk,fk',
  `tktName` varchar(20) NOT NULL,
  `tktDesc` varchar(255) NOT NULL,
  `tktPrice` int(5) NOT NULL,
  `tktQuan` int(5) NOT NULL,
  `tktStatus` tinyint(1) NOT NULL COMMENT '0:下架 1:上架',
  PRIMARY KEY (`tktNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `adminslocation`
--
ALTER TABLE `adminslocation`
  ADD CONSTRAINT `adminslocation_ibfk_1` FOREIGN KEY (`admNo`) REFERENCES `admins` (`admNo`);

--
-- 資料表的 Constraints `eveninplan`
--
ALTER TABLE `eveninplan`
  ADD CONSTRAINT `eveninplan_ibfk_1` FOREIGN KEY (`entNo`) REFERENCES `event` (`entNo`),
  ADD CONSTRAINT `eveninplan_ibfk_2` FOREIGN KEY (`ordNo`) REFERENCES `order` (`ordNo`);

--
-- 資料表的 Constraints `eventevaluation`
--
ALTER TABLE `eventevaluation`
  ADD CONSTRAINT `eventevaluation_ibfk_1` FOREIGN KEY (`entNo`) REFERENCES `event` (`entNo`),
  ADD CONSTRAINT `eventevaluation_ibfk_2` FOREIGN KEY (`memNo`) REFERENCES `member` (`memNo`);

--
-- 資料表的 Constraints `eventevaluationreport`
--
ALTER TABLE `eventevaluationreport`
  ADD CONSTRAINT `eventevaluationreport_ibfk_1` FOREIGN KEY (`entEvalNo`) REFERENCES `eventevaluation` (`entEvalNo`);

--
-- 資料表的 Constraints `memberpoint`
--
ALTER TABLE `memberpoint`
  ADD CONSTRAINT `memberpoint_ibfk_1` FOREIGN KEY (`pointType`) REFERENCES `pointtype` (`pointTypeNo`);

--
-- 資料表的 Constraints `notecomment`
--
ALTER TABLE `notecomment`
  ADD CONSTRAINT `notecomment_ibfk_1` FOREIGN KEY (`memNo`) REFERENCES `member` (`memNo`),
  ADD CONSTRAINT `notecomment_ibfk_2` FOREIGN KEY (`planNo`) REFERENCES `plan` (`planNo`);

--
-- 資料表的 Constraints `notecommentreport`
--
ALTER TABLE `notecommentreport`
  ADD CONSTRAINT `notecommentreport_ibfk_1` FOREIGN KEY (`noteCommNo`) REFERENCES `notecomment` (`noteCommNo`);

--
-- 資料表的 Constraints `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`memNo`) REFERENCES `member` (`memNo`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`planNo`) REFERENCES `plan` (`planNo`);

--
-- 資料表的 Constraints `orderdetaill`
--
ALTER TABLE `orderdetaill`
  ADD CONSTRAINT `orderdetaill_ibfk_1` FOREIGN KEY (`ordNo`) REFERENCES `order` (`ordNo`),
  ADD CONSTRAINT `orderdetaill_ibfk_2` FOREIGN KEY (`tktNo`) REFERENCES `ticket` (`tktNo`);

--
-- 資料表的 Constraints `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`memNo`) REFERENCES `member` (`memNo`);

--
-- 資料表的 Constraints `photoreport`
--
ALTER TABLE `photoreport`
  ADD CONSTRAINT `photoreport_ibfk_1` FOREIGN KEY (`photoNo`) REFERENCES `photo` (`photoNo`);

--
-- 資料表的 Constraints `plan`
--
ALTER TABLE `plan`
  ADD CONSTRAINT `plan_ibfk_1` FOREIGN KEY (`memNo`) REFERENCES `member` (`memNo`),
  ADD CONSTRAINT `plan_ibfk_2` FOREIGN KEY (`planDefNo`) REFERENCES `plandefaultphoto` (`planDefNo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
