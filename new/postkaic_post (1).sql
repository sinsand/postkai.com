-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 16, 2024 at 09:16 AM
-- Server version: 10.4.30-MariaDB-cll-lve
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `postkaic_post`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `aID` int(11) NOT NULL,
  `aUsername` varchar(50) NOT NULL DEFAULT '',
  `aPassword` varchar(50) NOT NULL DEFAULT '',
  `aName` varchar(50) NOT NULL DEFAULT '',
  `aSurname` varchar(50) NOT NULL DEFAULT '',
  `aAdmin` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `bID` int(11) NOT NULL,
  `bTitle` varchar(250) NOT NULL,
  `bDetail` mediumtext NOT NULL,
  `bURL` varchar(250) NOT NULL,
  `bPic1` varchar(250) NOT NULL,
  `bPic2` varchar(200) NOT NULL,
  `bPic3` varchar(200) NOT NULL,
  `bPic4` varchar(200) NOT NULL,
  `bPic5` varchar(200) NOT NULL,
  `bAddress` mediumtext NOT NULL,
  `bProvince` varchar(200) NOT NULL,
  `bZipcode` varchar(100) NOT NULL,
  `bPosition` varchar(100) NOT NULL,
  `bMonth` int(11) NOT NULL,
  `bEmail` varchar(250) NOT NULL,
  `bTel` varchar(200) NOT NULL,
  `bStatus` int(11) NOT NULL,
  `bDate_Create` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `countriesid` int(11) NOT NULL,
  `phone_code` int(11) NOT NULL,
  `country_code` char(2) NOT NULL,
  `country_name` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `mID` int(11) NOT NULL,
  `mUsername` varchar(20) NOT NULL DEFAULT '',
  `mPassword` varchar(20) NOT NULL DEFAULT '',
  `mTitle` varchar(10) DEFAULT '',
  `mName` varchar(100) DEFAULT '',
  `mMname` varchar(100) DEFAULT '',
  `mLname` varchar(100) DEFAULT '',
  `mAddress` mediumtext DEFAULT NULL,
  `mPostalcode` varchar(20) DEFAULT '',
  `mTelephone` varchar(20) NOT NULL DEFAULT '',
  `mEmail` varchar(100) NOT NULL DEFAULT '',
  `mStatus` int(11) NOT NULL,
  `mDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `nID` int(11) NOT NULL,
  `nTitle` varchar(250) NOT NULL,
  `nDetail` mediumtext NOT NULL,
  `nPic` varchar(250) NOT NULL,
  `nStatus` int(11) NOT NULL,
  `nDate_Create` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `n_banner`
--

DROP TABLE IF EXISTS `n_banner`;
CREATE TABLE `n_banner` (
  `bid` int(11) NOT NULL COMMENT 'รหัสแบนเนอร์',
  `bname` varchar(255) NOT NULL COMMENT 'ชื่อแบนเนอร์',
  `bscript` longtext DEFAULT NULL COMMENT 'ข้อความ',
  `bphoto` longblob DEFAULT NULL COMMENT 'รูปแบนเนอร์',
  `blink` text DEFAULT NULL COMMENT 'ลิ้งแบนเนอร์',
  `bstr` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'วันที่เปิด',
  `bend` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'วันที่ปิด',
  `bcreatedate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'วันที่สร้าง'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `n_comment`
--

DROP TABLE IF EXISTS `n_comment`;
CREATE TABLE `n_comment` (
  `cid` int(11) NOT NULL COMMENT 'รหัสคอมเม้นใหม่',
  `jID` int(11) NOT NULL COMMENT 'รหัสโพส',
  `cname` varchar(255) NOT NULL COMMENT 'ชื่อผู้คอมเม้น',
  `cemail` varchar(255) NOT NULL COMMENT 'อีเมลผู้คอมเม้น',
  `ccomment` longtext NOT NULL COMMENT 'รายละเอียดคอมเม้น',
  `ccreatedate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'วันที่คอมเม้น',
  `mid` int(11) NOT NULL COMMENT 'รหัสสมาชิก'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `n_member`
--

DROP TABLE IF EXISTS `n_member`;
CREATE TABLE `n_member` (
  `mid` int(11) NOT NULL COMMENT 'รหัสสมาชิก',
  `uid` varchar(255) NOT NULL COMMENT 'รหัสอ้างอิง',
  `mfullname` varchar(255) NOT NULL COMMENT 'ชื่อสมาชิก',
  `mphone` varchar(50) NOT NULL COMMENT 'เบอร์มือถือ',
  `mcode` varchar(10) NOT NULL COMMENT 'รหัสประเทศ',
  `mpass` text NOT NULL COMMENT 'รหัสผ่าน',
  `mstatus` int(11) NOT NULL COMMENT 'สถานะสมาชิก',
  `mcreatedate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'วันที่สมัครสมาชิก'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `n_notify`
--

DROP TABLE IF EXISTS `n_notify`;
CREATE TABLE `n_notify` (
  `nid` int(11) NOT NULL COMMENT 'รหัสแจ้ง',
  `jID` int(11) NOT NULL COMMENT 'รหัสโพส',
  `tid` int(11) NOT NULL COMMENT 'รหัสประเภท',
  `ncomment` text DEFAULT NULL COMMENT 'รายละเอียดการแจ้ง',
  `ncreatedate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'วันที่แจ้ง',
  `nemail` varchar(255) NOT NULL COMMENT 'อีเมลผู้แจ้ง',
  `nphone` varchar(255) NOT NULL COMMENT 'เบอร์ติดต่อผู้แจ้ง'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `n_slide`
--

DROP TABLE IF EXISTS `n_slide`;
CREATE TABLE `n_slide` (
  `sid` int(11) NOT NULL COMMENT 'รหัสสไลด์',
  `sname` varchar(255) NOT NULL COMMENT 'ชื่อสไลด์',
  `sphoto` longblob NOT NULL COMMENT 'รูปสไลด์',
  `slink` text NOT NULL COMMENT 'ลิ้งสไลด์',
  `sstr` date NOT NULL DEFAULT '0000-00-00' COMMENT 'วันที่เริ่ม',
  `send` date NOT NULL DEFAULT '0000-00-00' COMMENT 'วันที่สิ้นสุด',
  `sstatus` int(11) NOT NULL COMMENT 'สถานะสไลด์',
  `screatedate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'วันที่สร้าง'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `n_type`
--

DROP TABLE IF EXISTS `n_type`;
CREATE TABLE `n_type` (
  `tid` int(11) NOT NULL COMMENT 'รหัสประเภท',
  `tname` varchar(255) NOT NULL COMMENT 'ชื่อประเภท',
  `tname_eng` varchar(150) DEFAULT NULL COMMENT 'ชื่อประเภทอังกฤษ'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `p_category`
--

DROP TABLE IF EXISTS `p_category`;
CREATE TABLE `p_category` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(255) NOT NULL,
  `name_category_eng` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `p_comment`
--

DROP TABLE IF EXISTS `p_comment`;
CREATE TABLE `p_comment` (
  `cid_comment` int(11) NOT NULL COMMENT 'รหัสคอมเม้น',
  `jID` int(11) NOT NULL COMMENT 'รหัสอ้างอิง',
  `c_name` text NOT NULL COMMENT 'ชื่อผู้คอมเม้น',
  `c_email` text NOT NULL COMMENT 'อีเมลผู้คอมเม้น',
  `c_detail` text NOT NULL COMMENT 'รายละเอียดคอมเม้น',
  `c_create_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'วันที่คอมเม้น'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `p_province`
--

DROP TABLE IF EXISTS `p_province`;
CREATE TABLE `p_province` (
  `PROVINCE_ID` int(11) NOT NULL,
  `PROVINCE_CODE` varchar(2) NOT NULL,
  `PROVINCE_NAME` varchar(150) NOT NULL,
  `GEO_ID` int(11) NOT NULL DEFAULT 0,
  `PROVINCE_NAME_ENG` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `p_type`
--

DROP TABLE IF EXISTS `p_type`;
CREATE TABLE `p_type` (
  `id_Type` int(11) NOT NULL,
  `name_Type` varchar(255) NOT NULL,
  `name_Type_eng` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rejob`
--

DROP TABLE IF EXISTS `rejob`;
CREATE TABLE `rejob` (
  `rID` int(11) NOT NULL,
  `rName` varchar(200) NOT NULL,
  `rDetail` mediumtext NOT NULL,
  `rEmail` varchar(100) NOT NULL,
  `wID` int(11) NOT NULL,
  `rDate_Create` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sb_job`
--

DROP TABLE IF EXISTS `sb_job`;
CREATE TABLE `sb_job` (
  `jID` int(11) NOT NULL COMMENT 'รหัสลงประกาศ',
  `IDJOB` int(11) NOT NULL COMMENT 'รหัสประกาศ',
  `jTitle` varchar(200) NOT NULL COMMENT 'หัวข้อประกาศ',
  `jDetail` mediumtext NOT NULL COMMENT 'รายละเอียด',
  `jDesc` longtext NOT NULL COMMENT 'รายละเอียดแบบเต็ม',
  `jPrice` varchar(100) NOT NULL COMMENT 'ราคา',
  `jaType` int(11) NOT NULL COMMENT 'ประเภทประกาศ',
  `jType` int(11) NOT NULL COMMENT 'หมวดหมู่ประกาศ',
  `jProvince` varchar(200) NOT NULL COMMENT 'จังหวัดประกาศ',
  `jPic1` varchar(200) NOT NULL COMMENT 'รูปที่ 1 ',
  `jPic2` varchar(200) NOT NULL COMMENT 'รูปที่ 2',
  `jPic3` varchar(200) NOT NULL COMMENT 'รูปที่ 3',
  `jPic4` varchar(200) NOT NULL COMMENT 'รูปที่ 4',
  `jPic5` varchar(200) NOT NULL COMMENT 'รูปที่ 5',
  `jc_Title` varchar(200) NOT NULL COMMENT 'คำนำหน้าชื่อ',
  `jc_Name` varchar(200) NOT NULL COMMENT 'ชื่อผู้ประกาศ',
  `jc_Address` text NOT NULL COMMENT 'ที่อยู่ผู้ประกาศ',
  `jc_Province` int(11) NOT NULL COMMENT 'จังหวัดผู้ลงประกาศ',
  `jc_Telephone` varchar(100) NOT NULL COMMENT 'เบอร์ติดต่อ',
  `jc_Email` varchar(200) NOT NULL COMMENT 'อีมลผู้ประกาศ',
  `jRead` int(11) NOT NULL COMMENT 'จำนวนการเข้าชม',
  `jDate_Create` datetime NOT NULL COMMENT 'วันที่ลงประกาศ',
  `jStatus` int(11) NOT NULL COMMENT 'สถานะประกาศ',
  `mID` int(11) NOT NULL COMMENT 'รหัสสมาชิก',
  `jComment` int(11) NOT NULL COMMENT 'สถานะคอมเม้น',
  `jTypeProduct` int(11) NOT NULL COMMENT 'ประเภทสินค้าที่ลงประกาศ',
  `jPostDay` varchar(5) NOT NULL COMMENT 'จำนวนวันที่ลงประกาศ',
  `jLINEID` varchar(200) NOT NULL COMMENT 'ไอดีไลน์',
  `jEditor` varchar(50) NOT NULL COMMENT 'รหัสสำหรับแก้ไข'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `webboard`
--

DROP TABLE IF EXISTS `webboard`;
CREATE TABLE `webboard` (
  `wID` int(11) NOT NULL,
  `ID_NO` int(11) NOT NULL,
  `wTitle` varchar(200) NOT NULL,
  `wDetail` mediumtext NOT NULL,
  `wType` int(11) NOT NULL,
  `wPic1` varchar(200) NOT NULL,
  `wEmail` varchar(200) NOT NULL,
  `wRead` int(11) NOT NULL,
  `wDate_Create` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `wStatus` int(11) NOT NULL,
  `mID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `web_link`
--

DROP TABLE IF EXISTS `web_link`;
CREATE TABLE `web_link` (
  `wID` int(11) NOT NULL,
  `wPic` varchar(255) NOT NULL,
  `wDetail` mediumtext NOT NULL,
  `wURL` varchar(200) NOT NULL,
  `wURLPic` varchar(200) NOT NULL,
  `wStatus` int(11) NOT NULL,
  `wDate_Create` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aID`) USING BTREE;

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`bID`) USING BTREE;

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`countriesid`) USING BTREE;

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mID`) USING BTREE;

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`nID`) USING BTREE;

--
-- Indexes for table `n_banner`
--
ALTER TABLE `n_banner`
  ADD PRIMARY KEY (`bid`) USING BTREE;

--
-- Indexes for table `n_comment`
--
ALTER TABLE `n_comment`
  ADD PRIMARY KEY (`cid`) USING BTREE,
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `n_member`
--
ALTER TABLE `n_member`
  ADD PRIMARY KEY (`mid`) USING BTREE,
  ADD KEY `mid` (`mid`) USING BTREE;

--
-- Indexes for table `n_notify`
--
ALTER TABLE `n_notify`
  ADD PRIMARY KEY (`nid`) USING BTREE,
  ADD KEY `nid` (`nid`);

--
-- Indexes for table `n_slide`
--
ALTER TABLE `n_slide`
  ADD PRIMARY KEY (`sid`) USING BTREE,
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `n_type`
--
ALTER TABLE `n_type`
  ADD PRIMARY KEY (`tid`) USING BTREE,
  ADD KEY `tid` (`tid`);

--
-- Indexes for table `p_category`
--
ALTER TABLE `p_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `p_comment`
--
ALTER TABLE `p_comment`
  ADD PRIMARY KEY (`cid_comment`) USING BTREE,
  ADD KEY `cid_comment` (`cid_comment`);

--
-- Indexes for table `p_province`
--
ALTER TABLE `p_province`
  ADD PRIMARY KEY (`PROVINCE_ID`),
  ADD KEY `PROVINCE_ID` (`PROVINCE_ID`);

--
-- Indexes for table `p_type`
--
ALTER TABLE `p_type`
  ADD PRIMARY KEY (`id_Type`) USING BTREE,
  ADD KEY `id_Type` (`id_Type`);

--
-- Indexes for table `rejob`
--
ALTER TABLE `rejob`
  ADD PRIMARY KEY (`rID`) USING BTREE,
  ADD KEY `rID` (`rID`);

--
-- Indexes for table `sb_job`
--
ALTER TABLE `sb_job`
  ADD PRIMARY KEY (`jID`) USING BTREE,
  ADD KEY `jID` (`jID`);

--
-- Indexes for table `webboard`
--
ALTER TABLE `webboard`
  ADD PRIMARY KEY (`wID`) USING BTREE,
  ADD KEY `wID` (`wID`);

--
-- Indexes for table `web_link`
--
ALTER TABLE `web_link`
  ADD PRIMARY KEY (`wID`) USING BTREE,
  ADD KEY `wID` (`wID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `bID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `countriesid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `mID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `nID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `n_banner`
--
ALTER TABLE `n_banner`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสแบนเนอร์';

--
-- AUTO_INCREMENT for table `n_comment`
--
ALTER TABLE `n_comment`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสคอมเม้นใหม่';

--
-- AUTO_INCREMENT for table `n_member`
--
ALTER TABLE `n_member`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสมาชิก';

--
-- AUTO_INCREMENT for table `n_notify`
--
ALTER TABLE `n_notify`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสแจ้ง';

--
-- AUTO_INCREMENT for table `n_slide`
--
ALTER TABLE `n_slide`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสไลด์';

--
-- AUTO_INCREMENT for table `n_type`
--
ALTER TABLE `n_type`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสประเภท';

--
-- AUTO_INCREMENT for table `p_category`
--
ALTER TABLE `p_category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p_comment`
--
ALTER TABLE `p_comment`
  MODIFY `cid_comment` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสคอมเม้น';

--
-- AUTO_INCREMENT for table `p_type`
--
ALTER TABLE `p_type`
  MODIFY `id_Type` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rejob`
--
ALTER TABLE `rejob`
  MODIFY `rID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sb_job`
--
ALTER TABLE `sb_job`
  MODIFY `jID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสลงประกาศ';

--
-- AUTO_INCREMENT for table `webboard`
--
ALTER TABLE `webboard`
  MODIFY `wID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `web_link`
--
ALTER TABLE `web_link`
  MODIFY `wID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
