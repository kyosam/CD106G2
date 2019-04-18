-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1:3306
-- 產生時間： 2019-04-16 03:50:15
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='管理員';

--
-- 資料表的匯出資料 `admins`
--

INSERT INTO `admins` (`admNo`, `admId`, `admPsw`, `admPer`, `admStatus`) VALUES
(1, 'cd106g2', 'cd106g2', '1', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='森存者位置';

--
-- 資料表的匯出資料 `adminslocation`
--

INSERT INTO `adminslocation` (`staffNo`, `admNo`, `admLoc`) VALUES
(1, 1, '10,10');

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

--
-- 資料表的匯出資料 `eveninplan`
--

INSERT INTO `eveninplan` (`ordNo`, `entNo`, `entUseStatus`) VALUES
(1, 1, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='活動';

--
-- 資料表的匯出資料 `event`
--

INSERT INTO `event` (`entNo`, `entName`, `entPhoto`, `entBrief`, `entDesc`, `entDate`, `entPrice`, `entStatus`, `entLoc`, `entComm`, `entSco`, `entScoTime`, `entSurVal`, `enyHanVal`, `entPcVal`) VALUES
(1, '捕魚術', 'catchFish.jpg', '學習捕魚工具的製作，捕魚技巧。', '魚類對於野味求生來說是一種很好的食物來源。所以學會了捕魚便能幫助你在野外生活下來。\r\n透過本課程你將學會捕魚工具的製作、捕魚陷阱的製作、利用礦泉水瓶或是藤條製作魚籠，學會製作魚叉，利用止血帶進行野外捕魚活動。\r\n', 2, 750, 1, '10,10', 10, 4, 1, 1, 2, 2),
(2, '吹箭術', 'blowingArr.jpg', '吹箭對於很多人是陌生的，它的結構非常簡單，一根中空的管子和幾支帶尾翼的箭頭，就是一套可以直接使用的吹箭，在古代，吹箭的發明是為了狩獵，你能想像這看似簡單又小小的吹箭，它的射程及威力居然能大到嚇人嗎?', ':吹箭時與普通的呼吸不同，必須用胸和肚子最瞬間性的強呼吸，這特有的呼吸法，使得氧、荷爾蒙、營養等被供給到身體的各個角落，活化了全身細胞。而且，由於用力帶動了內臟的運動，對便秘和食欲不振效果甚佳，據說吹箭20次便相當於步行5公里所消耗的卡路里，所以比起瑜伽等運動，他更容易吸引女生們，減肥效果相當不錯。', 1, 500, 1, '20,20', 0, 4, 2, 3, 2, 1),
(3, '搭建庇身所', 'shelter.jpg', '我的野外避風港\r\n', '在野外活動中，遇天候不佳、受傷、蛇蟲攻擊等因素，無法返回預定營地，活動會利用附近的地形或材料製成天然的營帳過夜，以達到遮風避雨或禦寒的效果，即為庇護所，讓您學會野外搭建庇身所的技能。\r\n', 3, 1000, 1, '30,30', 1, 4, 5, 3, 3, 0),
(4, '刀具製作', 'makeKnife', '製作的這把小頸刀可大有來頭,不只是一般刀的用途,還可以刮鎂棒點火,更可以當成燧石點火的火鐮。', '課程內容會先教導弓箭及刀具的歷史，再來就是刀柄木材的介紹，告訴你哪種木頭適合當成材料，接者開始使用在大自然尋找到的材料製作木柄上膠並纏線，並使用動物的皮革縫製刀鞘，最後教導簡易的磨刀技巧。', 3, 1000, 1, '50,50', 12, 4, 5, 2, 3, 2),
(5, '方位判定', 'direction.jpg', '方位判定', '在野外活動中，諸如地質考察、登山、徒步旅行、探險、旅遊等，為防止迷路，正確地判定所在位置和方向，必須掌握定位和側向方法。\r\n內文：在自然界，某些動物具有辨別方向的本能，如鴿子，人類的某些成員也具備這種能力，但絕大多數人不具備，或者只有這種潛能，因此野外確定方向主要依靠經驗和工具。指導員將介紹常見的方法與工具，使我們能夠清楚地辨別方向，並在野外獲得更高的生存概率。', 1, 500, 1, '10,10', 1, 5, 1, 3, 1, 2),
(6, '弓箭術', 'bowArr.jpg', '野地運用簡單的工具及容易取得的木材來製作，讓你體驗在原始森林中也能利用現地的物資來製作弓箭、木箭並且有射箭教學及實際練習\r\n', '弓箭是遠古人類打獵的利器,更是過去冷兵器時代作戰的武器,更是現代休閒誤樂的熱門項目,但想要擁有一張弓,只能用錢買,好的弓價格非常昂貴,便宜的弓,又像玩具一樣,沒有射箭的快感,若您想要有一張自己手作有質感而且真正能射的弓,那就來參加我們的課程吧!\r\n', 2, 750, 1, '20,20', 1, 5, 4, 3, 3, 1),
(7, '基本求生', 'basicSur.jpg', '這門課程主要教授野外求生的心理建設，有正確的心理建設和有求生意志才是讓人在野外活下去的要點。', '從事野外活動時的最佳良伴，藉由建立野外活動應具備的心理建設、認識野外求生的基本常識、學習野外求生基本知能、探討各種野外求生的要訣及實作練習等，期望能培養野外活動時的基本求生技能，進而達到預防與減少野外危機的發生。\r\n', 3, 1000, 1, '30,30', 1, 5, 10, 3, 1, 2),
(8, '急救術', 'firstAid.jpg', '從評估傷患與急救、求生技巧到如何實行急救與治療、CPR等。\r\n', '本活動會對基本的野外求生、野外醫學概念、基本生命支持（包括CPR）進行介紹，也會針對野外旅途/戶外活動中的常見的傷病處治進行講解和演練。適合平日喜愛休閒旅遊的旅行者（包括家庭）或戶外愛好者，作為親子活動的首選，家長可以陪同孩子學習，共同提高旅途及戶外活動中的安全技能。課程內容野外醫學基本概念介紹、病患評估系統（PAS）、基本生命維持（包括CPR）、雷擊、溺水、蛇咬、中暑、失溫、燒燙傷、脫水、止血、包紮、野外求救、肌肉骨骼包紮（包括脊椎固定技巧），傷口清理，過敏反應，常見病的野外判斷等。\r\n', 1, 500, 1, '10,10', 1, 3, 2, 2, 0, 3),
(9, '繩結術', 'rope.jpg', '一條細細的繩子，可以做出千變萬化的繩結，可以運用在日常生活，戶外活動，野外求生等，繩索及繩結的運用無所不再。\r\n', '這個活動利用繩結經過編織、纏繞、而形成用來觀賞、應用的結構，而產生繩結的動作則稱為結繩；鋼索、繩索、扁帶、線等都能用來作為繩結的材料，實用上因使用環境不同而選擇合適的材質。許多人對於繩結的刻板印象常停留在童軍運動中的一小項，忽略了生活中繩結的多樣性變化與應用價值。\r\n', 1, 500, 1, '40,40', 1, 3, 1, 1, 3, 3),
(10, ' 淨水術', 'cleanWater.jpg', '汙水變清湯\r\n', '在我們既定印象中，山泉水好像是純凈透明的，事實上裡面含有許多雜物，不小心盡到體內可能會帶來疾病影響健康。本活動會教您如何在野外提取飲用水，與製作天然手作濾水器且喝到乾淨的正港的山泉水。\r\n', 2, 750, 1, '40,40', 1, 3, 5, 2, 2, 2),
(11, '可食動植物', 'eatable', '可食動植物\r\n', '當在野外發生意外事件，面臨孤立無援或救援未到時，仍需要維持生命，因此饑餓時需要食物，這是人的基本需求之一 。\r\n內文：此活動將帶領我們認識野生環境中的可食動物及植物，在野外求生中考慮找尋食物時，可以先考慮以植物及真菌類為食物後，再考慮到以容易捕捉到的動物為食物。跟著指導員的腳步，在森存者營區內將認識並親眼看見這些動植物。\r\n', 2, 750, 1, '40,40', 3, 4, 5, 3, 0, 2),
(12, '器具術', 'appliance', '用純手工製成的食器享用餐食，你可以感恩土地無私的奉獻，亦能感受生活那得來不易的純粹。\r\n', '野地的呼喚、手作的溫度、安全健康又環保, 利用木材透過手作，保留原始木頭的紋理，不加以過度修飾，而是保留每一個木頭獨一無二的肌理呈現，只運用手上的一把小刀及自己生起來的火,來完成一件獨一無二的真實作品,不只是製作一件器皿，包含了木材樹種的認識、刀具安全使用刀工技法、食器的上天然漆保養保存方法,更特別的是運用火來製作食器,更讓您在大自然無壓力的環境中達到放鬆心情舒壓的效果。\r\n', 1, 500, 1, '10,10', 1, 3, 3, 1, 3, 3),
(13, '生火術', 'makeFire.jpg', '讓你在找不到點火器具的時候可以快速利用現場材料來生火', ' 生火的方式許多種類，燧石取火是古老的取火方式,比起鑽木取火更為快速方便,藉由燧石和鐡器敲打產生火花來點火,再利用一些易燃材料來接住這些微弱的火花，要如何掌握取火的技巧,就讓我們在活動中好好告訴你，若你學會了,就會愛上這種點火的方式，原始而優雅。\r\n', 1, 500, 1, '50,50', 1, 5, 3, 3, 3, 0),
(14, '陷阱製作', 'makeTrap.jpg', '設置陷阱是求生者必備的技能，它發揮的作用絕對不止於填飽肚子，甚至能保護人身安全，還可以振奮求生者的精神，給予求生成功的希望。', '這門課程主要會向大家介紹幾種捕食陷阱、技巧，但值得注意的是在陷阱上花費的精力總體上一定要小於得到的食物。\r\n成功的陷阱要具備如下三項原則： \r\n一是選擇適當的獵物種類，深入了解它們的習性； \r\n二是製作出簡單卻有效的陷阱，誘捕並殺死獵物； \r\n三是把它們設置在合適的地點，加以偽裝。\r\n', 2, 750, 1, '50,50', 5, 3, 3, 2, 2, 1),
(15, '野炊術', 'wildCook.jpg', ' 野外活動中利用地形地物建野炊灶是野外生活很重要的一種技能，是野炊的基礎和必備條件。各種爐灶還要根據所能尋找到的燃料修建。\r\n', '現今都市生活的人們漸漸喜愛到鄉下及深山體驗生活，野炊就是其中的一種；野外生火，以燒烤這種最原始的烹飪方式為主；可以先行準備一些食物，某些食材還可以在野外中尋獲，如此這般準備好之後，挑個好日子，就可以和好友出發了。\r\n', 3, 1000, 1, '20,20', 3, 5, 3, 2, 2, 3),
(16, '隱蔽偽裝術', 'hide.jpg', '完美隱身\r\n', '在野外叢林中就地取材，利用野外植物與泥巴，裝飾及塗抹在自己身上，讓自己與大自然背景融合在一起且毫無違和感，偽裝後可以躲避敵人的攻擊，讓您完美成為偽裝大師。', 2, 750, 1, '10,10', 4, 4, 3, 2, 1, 2),
(17, '植物編織', 'weave.jpg', '莖幹、樹皮、葉柄、葉片、果皮，甚至香蕉絲，都可以成為編織的原料，利用不同植物纖維的特性，編織成日常生活中的物品。\r\n', '我們日常生活所接觸的傳統編織素材，大都已是後製而成，大家很少能夠瞭解從栽植、選材製作至運用的過程，及纖維植物的多樣性與物理特性。本活動在指導員解說與教學下，理解植物編織的樂趣外，還能帶走自己創作的小背袋喔。\r\n', 3, 1000, 1, '40,40', 5, 4, 3, 1, 3, 3),
(18, '自我防衛術', 'selfDef', '學習遇到野生動物時的自救，及避開具有攻擊性動物及昆蟲的活動範圍。\r\n', '認識野生動物足跡，注意身處環境，避開進入有攻擊性動物（如熊、野豬、山貓等）之勢力範圍內，以免受到攻擊。如果在野外遇到野生動物及昆蟲的攻擊時該怎麼辦呢？比如說像熊、野豬、山貓，蜜蜂等這些具有攻擊性的動物昆蟲時，該如何應對？或者被一些野生動物咬傷了該這麼處理呢？可能你會說你一輩子都不會遇到，但是來學習一下應對的方法也是沒有壞處的，說不定哪一天就會幫到你大忙。\r\n', 2, 750, 1, '10,10', 5, 5, 5, 3, 0, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='活動評價';

--
-- 資料表的匯出資料 `eventevaluation`
--

INSERT INTO `eventevaluation` (`entEvalNo`, `entNo`, `memNo`, `entSco`, `entEvalContent`, `entEvalDate`) VALUES
(1, 1, 1, 5, '抓魚好好玩喔', '2019-04-30');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='會員';

--
-- 資料表的匯出資料 `member`
--

INSERT INTO `member` (`memNo`, `memId`, `memMail`, `memPsw`, `memImg`, `memStatus`, `memTotalPoint`) VALUES
(1, 'sam', 'sam@gmail.com', '111', '1.jpg', 1, 10000),
(2, 'lisa', 'lisa@gmail.com', '111', '2.jpg', 1, 10000);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `memberpoint`
--

INSERT INTO `memberpoint` (`pointNo`, `memNo`, `pointDate`, `pointType`, `pointGet`) VALUES
(1, 1, '2019-05-30', 1, 1000);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `order`
--

INSERT INTO `order` (`ordNo`, `memNo`, `ordStatus`, `ordDate`, `playDate`, `ordTotal`, `planNo`) VALUES
(1, 1, '1', '2019-04-30', 10, 2000, 1);

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
  UNIQUE KEY `tktNo` (`tktNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `orderdetaill`
--

INSERT INTO `orderdetaill` (`ordNo`, `tktNo`, `tktPrice`, `buyQuan`) VALUES
(1, 2, 1000, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `photo`
--

INSERT INTO `photo` (`photoNo`, `memNo`, `photoWForester`, `photoLikeCnt`) VALUES
(1, 1, 'Forester.jpg', 10);

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
  `planDefNo` int(5) DEFAULT NULL COMMENT 'fk',
  `planName` varchar(20) NOT NULL,
  `planPhoto` varchar(50) DEFAULT NULL,
  `planPrice` int(5) NOT NULL,
  `planStatus` tinyint(1) NOT NULL COMMENT '0:下架 1:上架',
  `planDesc` varchar(150) NOT NULL,
  `planList` varchar(150) NOT NULL,
  `noteName` varchar(20) DEFAULT NULL,
  `noteContent` varchar(150) DEFAULT NULL,
  `noteLikeTime` int(5) DEFAULT NULL,
  `noteMsgTime` int(5) DEFAULT NULL,
  `noteStatus` blob COMMENT '0:下架 1:上架',
  PRIMARY KEY (`planNo`),
  KEY `memNo` (`memNo`),
  KEY `planDefNo` (`planDefNo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='行程';

--
-- 資料表的匯出資料 `plan`
--

INSERT INTO `plan` (`planNo`, `memNo`, `planDefNo`, `planName`, `planPhoto`, `planPrice`, `planStatus`, `planDesc`, `planList`, `noteName`, `noteContent`, `noteLikeTime`, `noteMsgTime`, `noteStatus`) VALUES
(1, 1, 1, 'sam的行程', 'planPhoto.jpg', 2000, 1, '行程說明', '1,2,3,4', '我的手札', '我的手札我的手札我的手札', 10, 20, 0x31);

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

--
-- 資料表的匯出資料 `plandefaultphoto`
--

INSERT INTO `plandefaultphoto` (`planDefNo`, `planDefPhoto`) VALUES
(1, 'planDefPhoto-1.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `pointtype`
--

DROP TABLE IF EXISTS `pointtype`;
CREATE TABLE IF NOT EXISTS `pointtype` (
  `pointTypeNo` int(5) NOT NULL AUTO_INCREMENT COMMENT 'pk,Auto_increment',
  `ponitName` varchar(20) NOT NULL,
  PRIMARY KEY (`pointTypeNo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `pointtype`
--

INSERT INTO `pointtype` (`pointTypeNo`, `ponitName`) VALUES
(1, '玩遊戲獲得');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `robot`
--

INSERT INTO `robot` (`rbtNo`, `rbtName`, `rbtAns`, `rbtStatus`) VALUES
(1, '哈囉', '哈囉', 1),
(2, '早安', '你好!早安', 1),
(3, '幹', '我聽不懂您再說甚麼!!', 1),
(4, '服務', '這邊沒有服務唷', 1),
(5, '活動', '請參閱XXX', 1),
(6, '白癡', '請別這麼說!!', 1);

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
-- 資料表的匯出資料 `ticket`
--

INSERT INTO `ticket` (`tktNo`, `tktName`, `tktDesc`, `tktPrice`, `tktQuan`, `tktStatus`) VALUES
(1, '一般票', '一般人可以購買的票', 1000, 10, 1),
(2, '學生票', '學生可以購買的票', 800, 5, 1),
(3, '愛心票', '小孩老人可以購買的票', 500, 10, 1);

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
