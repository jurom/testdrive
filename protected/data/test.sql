-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 15, 2013 at 06:43 PM
-- Server version: 5.5.34-0ubuntu0.13.10.1
-- PHP Version: 5.5.3-1ubuntu2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE IF NOT EXISTS `tbl_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(1000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`id`, `content`, `user_id`, `doctor_id`, `created`, `modified`) VALUES
(2, 'Test comment created on regular case.', 22, 1, '2013-11-08 16:07:01', '2013-11-08 16:07:01'),
(3, 'Left a comment here !', 22, 2, '2013-11-08 16:07:17', '2013-11-08 16:07:17'),
(4, 'Katke sa tento doktor velmi paci.', 25, 2, '2013-11-09 10:19:44', '2013-11-09 10:19:44'),
(5, 'Výborná lekárka !!', 26, 3, '2013-11-09 10:23:25', '2013-11-15 16:18:44'),
(9, 'another random comment..', 22, 1, '2013-11-09 13:07:16', '2013-11-09 13:07:16'),
(13, 'No najlepsia :)\r\n\r\nEdited by Admin\r\nEdited again by Juro.\r\n', 26, 3, '2013-11-09 14:42:49', '2013-11-14 10:56:54'),
(14, 'Niet co dodat', 26, 3, '2013-11-09 14:42:55', '2013-11-09 14:42:55'),
(18, 'Does \r\nit \r\nwork ? \\n', 22, 3, '2013-11-11 15:19:24', '2013-11-11 15:45:51'),
(19, 'Test comment', 22, 3, '2013-11-11 18:17:16', '2013-11-11 18:17:16'),
(20, 'Random comment\r\n\r\n\r\nEDITED\r\n\r\nRandom spaces', 22, 3, '2013-11-11 19:03:03', '2013-11-11 19:03:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctor`
--

CREATE TABLE IF NOT EXISTS `tbl_doctor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `area` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_doctor`
--

INSERT INTO `tbl_doctor` (`id`, `name`, `area`) VALUES
(1, 'John Doe', 'Random Locality'),
(3, 'MUDr. Dipl-Ing. Katarína Jakúbeková, PhD.', 'Bratislava, Slovakia');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_forumcomment`
--

CREATE TABLE IF NOT EXISTS `tbl_forumcomment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `thread_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_forumcomment`
--

INSERT INTO `tbl_forumcomment` (`id`, `content`, `user_id`, `thread_id`, `created`, `modified`) VALUES
(2, 'Maybe your laptop is just old?\r\n\r\nEdit: No offense, but the laptops nowadays don''t last long...', 22, 4, '2013-11-15 16:14:48', '2013-11-15 16:34:32'),
(3, 'It''s only 2 years old, so that''s not that much...\r\nAnd it wouldn''t bother me so much if the computer went down to 5% and then just shut down even after one hour from 100%, but this is just weird.', 26, 4, '2013-11-15 16:38:12', '2013-11-15 16:38:12'),
(4, 'Hi Josh,\r\n\r\nOk, you don''t really need anything else as far as the air resistance is ignored. You can simply use the formula for uniformly accelerated movement, that is:\r\n\r\ns = 1/2 * a*t^2\r\nand as a = g and s = h in our case, we can just express the ''t'' and get the solution: \r\n\r\nt = sqrt(2*s/g)\r\n\r\nwhere sqrt is square root.\r\n\r\nBest Regards,\r\nAdmin', 22, 9, '2013-11-15 17:09:26', '2013-11-15 17:09:57'),
(5, 'Oh, perfect !\r\n\r\nNow it kind of makes sense, thanks.', 29, 9, '2013-11-15 17:10:38', '2013-11-15 17:10:38'),
(6, 'Well, if you like Maths, you can always go study IT, there''s a lot of math there, but it''s used in programming (sometimes). Most of the subjects there are mathematical, so you might like it.', 26, 10, '2013-11-15 17:21:21', '2013-11-15 17:21:21'),
(7, 'Are you serious?', 1, 5, '2013-11-15 17:23:38', '2013-11-15 17:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_micropost`
--

CREATE TABLE IF NOT EXISTS `tbl_micropost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `tbl_micropost`
--

INSERT INTO `tbl_micropost` (`id`, `name`, `content`, `created`, `modified`) VALUES
(1, 'test1', 'Content test.2gfg', '0000-00-00 00:00:00', '2013-11-06 18:14:12'),
(2, 'test1', 'Random post.. create please O:)\r\nMODIFIED !!', '2013-11-05 21:51:34', '2013-11-06 18:14:38'),
(3, 'test1', 'ttt', '2013-11-06 17:54:22', '2013-11-06 17:54:22'),
(4, 'test1', 'testtt', '2013-11-06 18:13:57', '2013-11-06 18:13:57'),
(5, 'test1', 'wtf', '2013-11-06 18:27:19', '2013-11-06 18:27:19'),
(6, 'test1', 'test222', '2013-11-06 18:31:01', '2013-11-06 18:31:01'),
(9, 'test1', 'It works !', '2013-11-06 18:40:16', '2013-11-06 18:40:16'),
(10, 'test1', 'It works !', '2013-11-06 18:40:34', '2013-11-06 18:40:34'),
(11, 'test1', 'Now it''s gonna work..', '2013-11-06 18:41:04', '2013-11-06 18:41:04'),
(12, 'test1', 'test 2', '2013-11-06 18:50:09', '2013-11-06 18:50:09'),
(13, 'test1', 'random post !\r\n\r\nEdit: It''s not random anymore ;) .', '2013-11-06 18:53:55', '2013-11-06 19:10:08'),
(14, 'admin', 'hey, what''s going on here !', '2013-11-06 19:11:54', '2013-11-06 19:11:54'),
(15, 'admin', 'Looks like the user recognition works..', '2013-11-06 19:12:16', '2013-11-06 19:12:16'),
(16, 'user1', 'Oh hey !', '2013-11-06 19:13:11', '2013-11-06 19:13:11'),
(17, 'user1', 'It really DOES work !', '2013-11-06 19:13:21', '2013-11-06 19:13:21'),
(18, 'admin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris id eros dui. Sed accumsan dictum diam, vel rhoncus purus tincidunt vel. Nullam sit amet consequat leo, eget malesuada dolor. Duis suscipit, felis sed pretium viverra, Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris id eros dui. Sed accumsan dictum diam, vel rhoncus purus tincidunt vel. Nullam sit amet consequat leo, eget malesuada dolor. Duis suscipit, felis sed pretium viverra, velit diam pellentesque arcu, ac tristique lorem urna tristique mauris. Fusce viverra arcu ac nulla gravida, eget pulvinar tellus tempor. Integer non augue ut sapien ultrices aliquet a eu enim. Pellentesque lobortis, odio in elementum malesuada, lectus lorem ultrices nunc, quis viverra nulla mi sit amet nibh.', '2013-11-06 19:32:19', '2013-11-06 19:35:05'),
(19, 'admin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris id eros dui. Sed accumsan dictum diam, vel rhoncus purus tincidunt vel. Nullam sit amet consequat leo, eget malesuada dolor. Duis suscipit, felis sed pretium viverra, velit diam pellentesque arcu, ac tristique lorem urna tristique mauris. Fusce viverra arcu ac nulla gravida, eget pulvinar tellus tempor. Integer non augue ut sapien ultrices aliquet a eu enim. Pellentesque lobortis, odio in elementum malesuada, lectus lorem ultrices nunc, quis viverra nulla mi sit amet nibh.', '2013-11-06 19:34:54', '2013-11-06 19:34:54'),
(20, 'Guest', 'random', '2013-11-07 17:28:23', '2013-11-07 17:28:23'),
(21, 'Guest', 'wtf', '2013-11-07 17:28:31', '2013-11-07 17:28:31'),
(22, 'admin', 'tset', '2013-11-07 18:00:23', '2013-11-07 18:00:23'),
(23, 'admin', 'aa', '2013-11-07 18:01:25', '2013-11-07 18:01:25'),
(24, 'admin', 'c''mon !', '2013-11-07 18:04:54', '2013-11-07 18:04:54'),
(25, 'admin', 'aaaaa', '2013-11-07 18:05:33', '2013-11-07 18:05:33'),
(26, 'admin', 'ac', '2013-11-07 18:06:24', '2013-11-07 18:06:24'),
(27, 'admin', 'Now it should work', '2013-11-07 18:07:21', '2013-11-07 18:07:21'),
(28, 'test2', 'test this !', '2013-11-07 22:17:29', '2013-11-07 22:17:29'),
(29, 'admin', 'cmon !', '2013-11-07 22:17:41', '2013-11-07 22:17:41'),
(30, 'admin', 'test', '2013-11-08 14:20:43', '2013-11-08 14:20:43'),
(31, 'katka', 'komentar\r\n', '2013-11-09 10:18:29', '2013-11-09 10:18:29'),
(32, 'juro', 'New comment', '2013-11-11 18:08:37', '2013-11-11 18:08:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_thread`
--

CREATE TABLE IF NOT EXISTS `tbl_thread` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `topic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_thread`
--

INSERT INTO `tbl_thread` (`id`, `title`, `description`, `created`, `modified`, `topic_id`, `user_id`) VALUES
(4, 'My computer powers off at 40%?', 'Hi, I''m John Doe and I have a problem with my laptop. When I unplug the battery charger, it says the battery is charged to 100% and that there is approximately 1:30 hrs of uptime remaining. As it comes down to 50%, there''s still something around 40 minutes remaining, that''d still be good, but when it reaches something below 40% it suddenly powers off. It doesn''t shut down or anything, it just ..dies..\r\n\r\nAny help would be appreciated,\r\nThanks,\r\nJohn Doe', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 26),
(5, 'Question about woodchucks..', 'Hi,\r\nI''m Josh and I''ve been very curious lately. There are many questions that bothered me, especially: "How much wood would woodchuck chuck if woodchuck would chuck wood?"\r\nI really have no idea what''s the answer.. any suggestions guys?\r\n\r\nThanks in advance,\r\nJosh', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 8, 22),
(9, 'Can anyone help me with this simple problem?', 'I have an assignment and I''m totally lost..\r\nThere''s given a ball that is falling from height 10m and we have to calculate when (from the release time) is it going to reach the ground level. Air resistance is ignored.\r\nAnd I have no idea what to do, they have given us no weight or size of the ball or anything else, this is it ...\r\n\r\nAny help?\r\nThanks,\r\nJosh', '2013-11-15 17:03:44', '2013-11-15 17:03:44', 4, 29),
(10, 'Where to go on a college?', 'Hi,\r\n\r\nI''m in the school-leaving year on high school and I have to finally decide, what to study.\r\nI''m pretty decent in Math, but I don''t think that studying pure math would be of any use after I finish my studies at the college.\r\nI fancy Physics too, but I guess rather the high school level..\r\n\r\nBasically, I''d like to study Math, but just not pure.. any suggestions?\r\n\r\nThanks,\r\nJosh', '2013-11-15 17:18:21', '2013-11-15 17:18:35', 1, 29);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_topic`
--

CREATE TABLE IF NOT EXISTS `tbl_topic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  `description` varchar(128) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `is_primary` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_topic`
--

INSERT INTO `tbl_topic` (`id`, `title`, `description`, `topic_id`, `is_primary`) VALUES
(1, 'Technical Discussion', 'Talk about anything related to technology here', -1, 1),
(3, 'Computers', 'Feelin'' geeky? Make a thread here and share your obsession !', 1, 0),
(4, 'Physics', 'Any good/wannabe Physicist is welcome here', 1, 0),
(5, 'Biophysics', 'For those who are interested in these subjects related together, feel free to express !', 1, 0),
(6, 'News', 'Got any fresh news? Don''t hesitate to share !', -1, 1),
(7, 'General Discussion', 'You can talk about anything here', -1, 1),
(8, 'Anything', 'Create any type of threads here', 7, 0),
(9, 'Politics', 'Feeling like you want to share your political opinions?', 7, 0),
(10, 'Health Care', 'Do you have any health issues? Ask our doctors here', 7, 0),
(11, 'General Discussion', 'Talk about anything related to computers here !', 3, 0),
(12, 'Gaming', 'Bought a new computer and wand to share your gaming experience?', 3, 0),
(13, 'Building my computer', 'If you are about to build a computer yourself and need some guidance, this is the right place to ask.', 3, 0),
(14, 'Comparison', 'Do you want to compete in performance with others?\r\nCome here and show off !', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `email`) VALUES
(1, 'test1', 'a722c63db8ec8625af6cf71cb8c2d939', 'test1@example.com'),
(2, 'test2', 'c1572d05424d0ecb2a65ec6a82aeacbf', 'test2@example.com'),
(3, 'test3', '3afc79b597f88a72528e864cf81856d2', 'test3@example.com'),
(4, 'test4', 'fc2921d9057ac44e549efaf0048b2512', 'test4@example.com'),
(6, 'test6', 'e9568c9ea43ab05188410a7cf85f9f5e', 'test6@example.com'),
(7, 'test7', '8c96c3884a827355aed2c0f744594a52', 'test7@example.com'),
(8, 'test8', 'ccd3cd18225730c5edfc69f964b9d7b3', 'test8@example.com'),
(9, 'test9', 'c28cce9cbd2daf76f10eb54478bb0454', 'test9@example.com'),
(10, 'test10', 'a3224611fd03510682690769d0195d66', 'test10@example.com'),
(11, 'test11', '0102812fbd5f73aa18aa0bae2cd8f79f', 'test11@example.com'),
(12, 'test12', '0bd0fe6372c64e09c4ae81e056a9dbda', 'test12@example.com'),
(13, 'test13', 'c868bff94e54b8eddbdbce22159c0299', 'test13@example.com'),
(14, 'test14', 'd1f38b569c772ebb8fa464e1a90c5a00', 'test14@example.com'),
(15, 'test15', 'b279786ec5a7ed00dbe4d3fe1516c121', 'test15@example.com'),
(16, 'test16', '66c99bf933f5e6bf3bf2052d66577ca8', 'test16@example.com'),
(17, 'test17', '6c2a5c9ead1d7d6ba86c8764d5cad395', 'test17@example.com'),
(18, 'test18', '64152ab7368fc7ca6b3ef6b71e330b86', 'test18@example.com'),
(19, 'test19', '1f61b744f2c9e8f49ae4c4965f39963f', 'test19@example.com'),
(20, 'test20', '90bfa11df19a9b9d429ccfa6997104df', 'test20@example.com'),
(21, 'test21', '5cddd1f7857fd4ab8095f676fcf88835', 'test21@example.com'),
(22, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@test.com'),
(23, 'user1', '7c6a180b36896a0a8c02787eeafb0e4c', 'user1@psw.com'),
(24, 'myacc', 'a029d0df84eb5549c641e04a9ef389e5', 'myacc@mypass.pw'),
(25, 'katka', '82e29a1c096bf9783cd41d0d1f20b7d1', 'katka555@szm.sk'),
(26, 'juro', '5f4dcc3b5aa765d61d8327deb882cf99', 'juro@gmail.com'),
(27, 'testmd5', '696d29e0940a4957748fe3fc9efd22a3', 'md5pw@mail.com'),
(28, 'newuser', 'e6053eb8d35e02ae40beeeacef203c1a', 'noemail@mail.com'),
(29, 'Josh', 'aed8476a6fa6988499bc28d983fbbfea', 'josh@email.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
