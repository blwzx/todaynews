-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2018-09-04 16:00:00
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wzq`
--

-- --------------------------------------------------------

--
-- 表的结构 `news_category`
--

DROP TABLE IF EXISTS `feed`;
CREATE TABLE IF NOT EXISTS `feed` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
#    `user_id` int(12) NOT NULL,
   `user_name` varchar(255) NOT NULL,
  `user_avatar` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `img_urls` varchar(255) NOT NULL,
  `publish_time` varchar(255) NOT NULL,
  `publist_address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `feed` ( `user_name`,`user_avatar`, `content`,`img_urls`,`publish_time`,`publist_address` ) VALUES
( 'hello','https://ss0.bdstatic.com/70cFuHSh_Q1YnxGkpoWK1HF6hhy/it/u=3189821079,1620711983&fm=26&gp=0.jpg', 'sdfasfsfasf','https://ss0.bdstatic.com/70cFuHSh_Q1YnxGkpoWK1HF6hhy/it/u=3189821079,1620711983&fm=26&gp=0.jpg;https://ss3.bdstatic.com/70cFv8Sh_Q1YnxGkpoWK1HF6hhy/it/u=3349549551,511258560&fm=26&gp=0.jpg','2018.9.11 10:13','学府街平阳路'),
( 'hello','https://ss0.bdstatic.com/70cFuHSh_Q1YnxGkpoWK1HF6hhy/it/u=3189821079,1620711983&fm=26&gp=0.jpg', 'sdfasfsfasf','https://ss0.bdstatic.com/70cFuHSh_Q1YnxGkpoWK1HF6hhy/it/u=3189821079,1620711983&fm=26&gp=0.jpg;https://ss3.bdstatic.com/70cFv8Sh_Q1YnxGkpoWK1HF6hhy/it/u=3349549551,511258560&fm=26&gp=0.jpg','2018.9.11 10:13','学府街平阳路'),
( 'hello','https://ss0.bdstatic.com/70cFuHSh_Q1YnxGkpoWK1HF6hhy/it/u=3189821079,1620711983&fm=26&gp=0.jpg', 'sdfasfsfasf','https://ss0.bdstatic.com/70cFuHSh_Q1YnxGkpoWK1HF6hhy/it/u=3189821079,1620711983&fm=26&gp=0.jpg;https://ss3.bdstatic.com/70cFv8Sh_Q1YnxGkpoWK1HF6hhy/it/u=3349549551,511258560&fm=26&gp=0.jpg','2018.9.11 10:13','学府街平阳路');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
