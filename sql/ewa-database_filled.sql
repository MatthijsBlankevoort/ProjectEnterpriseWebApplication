-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 04 okt 2017 om 13:24
-- Serverversie: 10.1.26-MariaDB
-- PHP-versie: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ewa`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `author_id` varchar(45) NOT NULL,
  `title` varchar(45) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_at` datetime DEFAULT NULL,
  `upvotes` int(11) NOT NULL DEFAULT '0',
  `downvotes` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `post_comment`
--

CREATE TABLE `post_comment` (
  `post_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reply_to` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `post_comment_vote`
--

CREATE TABLE `post_comment_vote` (
  `comment_id` int(11) NOT NULL,
  `user_id` varchar(45) NOT NULL,
  `vote` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `post_follow`
--

CREATE TABLE `post_follow` (
  `post_id` int(11) NOT NULL,
  `author_id` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `post_vote`
--

CREATE TABLE `post_vote` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vote` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `hash` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(50) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `username`, `hash`, `password`, `email`, `avatar`, `created_at`) VALUES
(1, 'Cedric', 'xD', 'xD', 'cedricthecookie@gmail.com', NULL, '2017-10-04 11:09:52'),
(2, 'Franny', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'fmidgely0@edublogs.org', NULL, '2017-10-04 11:20:27'),
(3, 'Viki', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'vredhead1@statcounter.com', NULL, '2017-10-04 11:20:28'),
(4, 'Alvie', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'agowan2@seesaa.net', 'https://robohash.org/voluptatemaccusantiumitaque.png?size=128x128&set=set1', '2017-10-04 11:20:28'),
(5, 'Wrennie', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'wburborough3@ameblo.jp', 'https://robohash.org/eumestsaepe.jpg?size=128x128&set=set1', '2017-10-04 11:20:28'),
(6, 'Dynah', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'dfills4@utexas.edu', 'https://robohash.org/autvoluptatemenim.bmp?size=128x128&set=set1', '2017-10-04 11:20:28'),
(7, 'Lorinda', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'lfranssen5@who.int', 'https://robohash.org/quiaquosquia.jpg?size=128x128&set=set1', '2017-10-04 11:20:28'),
(8, 'Natka', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'norae6@oaic.gov.au', 'https://robohash.org/quodvoluptasexercitationem.png?size=128x128&set=set1', '2017-10-04 11:20:28'),
(9, 'Rhodie', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'rdocharty7@is.gd', NULL, '2017-10-04 11:20:28'),
(10, 'Zena', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'zlongworth8@yandex.ru', 'https://robohash.org/voluptatumdoloresnecessitatibus.bmp?size=128x128&set=set1', '2017-10-04 11:20:28'),
(11, 'Aurelie', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'amedgwick9@marriott.com', 'https://robohash.org/idipsamvoluptate.jpg?size=128x128&set=set1', '2017-10-04 11:20:28'),
(12, 'Caprice', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'clamonta@ameblo.jp', 'https://robohash.org/possimusnullaut.jpg?size=128x128&set=set1', '2017-10-04 11:20:28'),
(13, 'Theresita', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'tyub@irs.gov', 'https://robohash.org/quoaliquamitaque.bmp?size=128x128&set=set1', '2017-10-04 11:20:28'),
(14, 'Hannis', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'hgastickec@paginegialle.it', 'https://robohash.org/possimuseaqui.jpg?size=128x128&set=set1', '2017-10-04 11:20:28'),
(15, 'Nikos', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'nwagnerd@storify.com', NULL, '2017-10-04 11:20:28'),
(16, 'Idaline', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'imcchesneye@slashdot.org', NULL, '2017-10-04 11:20:28'),
(17, 'Karlen', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'kstirlingf@deviantart.com', NULL, '2017-10-04 11:20:28'),
(18, 'Arleyne', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'amummeryg@google.de', NULL, '2017-10-04 11:20:28'),
(19, 'Paulo', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'pfaderh@shutterfly.com', 'https://robohash.org/quiteneturnostrum.bmp?size=128x128&set=set1', '2017-10-04 11:20:28'),
(20, 'Menard', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'mleheudei@tripod.com', NULL, '2017-10-04 11:20:28'),
(21, 'Dona', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'dadshedj@sciencedirect.com', NULL, '2017-10-04 11:20:28'),
(22, 'Alfie', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'arichtk@gravatar.com', 'https://robohash.org/vitaeearumenim.png?size=128x128&set=set1', '2017-10-04 11:20:28'),
(23, 'Carlota', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'cbaalhaml@opera.com', NULL, '2017-10-04 11:20:28'),
(24, 'Vivienne', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'vwebbenm@ibm.com', NULL, '2017-10-04 11:20:28'),
(25, 'Cyndia', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'cgopsalln@google.de', NULL, '2017-10-04 11:20:28'),
(26, 'Allie', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'acaseleyo@typepad.com', 'https://robohash.org/minimaautillo.jpg?size=128x128&set=set1', '2017-10-04 11:20:28'),
(27, 'Heath', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'hofogartyp@youku.com', 'https://robohash.org/voluptatemimpeditesse.png?size=128x128&set=set1', '2017-10-04 11:20:28'),
(28, 'Cello', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'clindseyq@baidu.com', 'https://robohash.org/corporiseumaut.jpg?size=128x128&set=set1', '2017-10-04 11:20:28'),
(29, 'Marybeth', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'messlemontr@goodreads.com', NULL, '2017-10-04 11:20:28'),
(30, 'Cody', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'crogeons@shop-pro.jp', NULL, '2017-10-04 11:20:28'),
(31, 'Niall', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'nskirlingt@sfgate.com', 'https://robohash.org/dolorumdoloremut.bmp?size=128x128&set=set1', '2017-10-04 11:20:28'),
(32, 'Ellsworth', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'espieru@umich.edu', 'https://robohash.org/sitvelconsectetur.jpg?size=128x128&set=set1', '2017-10-04 11:20:28'),
(33, 'Barney', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'bespinazov@home.pl', 'https://robohash.org/suntinciduntquia.png?size=128x128&set=set1', '2017-10-04 11:20:28'),
(34, 'Becca', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'bdonkew@nationalgeographic.com', NULL, '2017-10-04 11:20:28'),
(35, 'Kara-lynn', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'kabbayx@japanpost.jp', NULL, '2017-10-04 11:20:28'),
(36, 'Bartram', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'bshipy@bing.com', 'https://robohash.org/magnametprovident.bmp?size=128x128&set=set1', '2017-10-04 11:20:29'),
(37, 'Jaclyn', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'jkupperz@fotki.com', NULL, '2017-10-04 11:20:29'),
(38, 'Layla', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'lmcgriele10@t-online.de', 'https://robohash.org/voluptatemetsunt.jpg?size=128x128&set=set1', '2017-10-04 11:20:29'),
(39, 'Noellyn', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'nperrins11@blog.com', NULL, '2017-10-04 11:20:29'),
(40, 'Ozzie', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ocase12@disqus.com', 'https://robohash.org/sintaspernaturveniam.bmp?size=128x128&set=set1', '2017-10-04 11:20:29'),
(41, 'Kristina', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'kblondelle13@ca.gov', 'https://robohash.org/doloremassumendavoluptates.png?size=128x128&set=set1', '2017-10-04 11:20:29'),
(42, 'Kacy', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'kgrinnov14@hugedomains.com', 'https://robohash.org/laudantiumincommodi.jpg?size=128x128&set=set1', '2017-10-04 11:20:29'),
(43, 'Roselin', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'rbessell15@sfgate.com', 'https://robohash.org/harumenimlaborum.png?size=128x128&set=set1', '2017-10-04 11:20:29'),
(44, 'Parnell', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'pstclair16@pen.io', 'https://robohash.org/repellatrerumnemo.png?size=128x128&set=set1', '2017-10-04 11:20:29'),
(45, 'Del', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ddutt17@adobe.com', NULL, '2017-10-04 11:20:29'),
(46, 'Hyacinthie', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'hpitblado18@mapquest.com', 'https://robohash.org/animiveritatisarchitecto.jpg?size=128x128&set=set1', '2017-10-04 11:20:29'),
(47, 'L;urette', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'llangforth19@businessinsider.com', NULL, '2017-10-04 11:20:29'),
(48, 'Florrie', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'fbhatia1a@google.com.au', 'https://robohash.org/euminventorereiciendis.bmp?size=128x128&set=set1', '2017-10-04 11:20:29'),
(49, 'Matty', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'mbirchill1b@cisco.com', 'https://robohash.org/etadipisciconsequatur.jpg?size=128x128&set=set1', '2017-10-04 11:20:29'),
(50, 'Hercules', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'hhurl1c@gravatar.com', 'https://robohash.org/fugaquieos.jpg?size=128x128&set=set1', '2017-10-04 11:20:29'),
(51, 'Tito', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'tmcgowing1d@weibo.com', NULL, '2017-10-04 11:20:29'),
(52, 'Aurilia', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'aadnet1e@cnbc.com', 'https://robohash.org/beataefacilisquibusdam.jpg?size=128x128&set=set1', '2017-10-04 11:20:29'),
(53, 'Torrence', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'tsandercroft1f@google.nl', NULL, '2017-10-04 11:20:29'),
(54, 'Cora', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'cendon1g@hhs.gov', 'https://robohash.org/temporelaboremollitia.bmp?size=128x128&set=set1', '2017-10-04 11:20:29'),
(55, 'Trace', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'tphlippi1h@unesco.org', NULL, '2017-10-04 11:20:29'),
(56, 'Maribelle', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'mhasney1i@cnbc.com', NULL, '2017-10-04 11:20:29'),
(57, 'Willyt', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'woggers1j@toplist.cz', 'https://robohash.org/siteumquod.png?size=128x128&set=set1', '2017-10-04 11:20:29'),
(58, 'Quinton', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'qridpath1k@cloudflare.com', 'https://robohash.org/repellendussaepevoluptatibus.png?size=128x128&set=set1', '2017-10-04 11:20:29'),
(59, 'Harli', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'hbetser1l@bizjournals.com', 'https://robohash.org/porrosedquae.png?size=128x128&set=set1', '2017-10-04 11:20:29'),
(60, 'Haydon', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'hbowman1m@engadget.com', NULL, '2017-10-04 11:20:29'),
(61, 'Cammi', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ckinnen1n@time.com', 'https://robohash.org/doloreminporro.png?size=128x128&set=set1', '2017-10-04 11:20:29'),
(62, 'Maggy', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'msturges1o@bloglovin.com', NULL, '2017-10-04 11:20:29'),
(63, 'Lucias', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'lschankel1p@github.com', 'https://robohash.org/utautneque.bmp?size=128x128&set=set1', '2017-10-04 11:20:29'),
(64, 'Donnamarie', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'dkitto1q@slate.com', 'https://robohash.org/voluptatemquisveritatis.png?size=128x128&set=set1', '2017-10-04 11:20:29'),
(65, 'Balduin', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'bbatho1r@paginegialle.it', 'https://robohash.org/harumdistinctioet.bmp?size=128x128&set=set1', '2017-10-04 11:20:29'),
(66, 'Junette', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'jmattisson1s@desdev.cn', 'https://robohash.org/similiqueestsoluta.bmp?size=128x128&set=set1', '2017-10-04 11:20:29'),
(67, 'Thorn', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'tsedgebeer1t@cocolog-nifty.com', NULL, '2017-10-04 11:20:29'),
(68, 'Georgine', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'gcaven1u@vkontakte.ru', 'https://robohash.org/etautesse.jpg?size=128x128&set=set1', '2017-10-04 11:20:29'),
(69, 'Erda', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'epavinese1v@skype.com', 'https://robohash.org/velsaepedicta.bmp?size=128x128&set=set1', '2017-10-04 11:20:29'),
(70, 'Isabel', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ibeddon1w@senate.gov', 'https://robohash.org/namtemporamodi.bmp?size=128x128&set=set1', '2017-10-04 11:20:29'),
(71, 'Judas', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'jwort1x@rakuten.co.jp', NULL, '2017-10-04 11:20:29'),
(72, 'Towney', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'tledekker1y@twitter.com', NULL, '2017-10-04 11:20:29'),
(73, 'Kinsley', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'kgedge1z@wikia.com', 'https://robohash.org/quimollitiavelit.bmp?size=128x128&set=set1', '2017-10-04 11:20:29'),
(74, 'Roxine', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'rmackinder20@aol.com', 'https://robohash.org/impeditquasicommodi.png?size=128x128&set=set1', '2017-10-04 11:20:29'),
(75, 'Kellen', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'kcaron21@google.de', 'https://robohash.org/eaenimsit.png?size=128x128&set=set1', '2017-10-04 11:20:29'),
(76, 'Noby', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'nreese22@nsw.gov.au', 'https://robohash.org/providentadipisciet.jpg?size=128x128&set=set1', '2017-10-04 11:20:29'),
(77, 'Hervey', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'hlipprose23@mozilla.com', 'https://robohash.org/perferendisutvoluptatem.png?size=128x128&set=set1', '2017-10-04 11:20:29'),
(78, 'Kendra', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'kgandley24@squidoo.com', 'https://robohash.org/ettemporesimilique.bmp?size=128x128&set=set1', '2017-10-04 11:20:29'),
(79, 'Lizzie', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ldanzey25@netlog.com', NULL, '2017-10-04 11:20:29'),
(80, 'Clevie', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'csate26@sakura.ne.jp', NULL, '2017-10-04 11:20:29'),
(81, 'Dorolice', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'dthiese27@moonfruit.com', NULL, '2017-10-04 11:20:29'),
(82, 'Jeri', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'jgrishankov28@rakuten.co.jp', NULL, '2017-10-04 11:20:29'),
(83, 'Jean', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'jkohler29@weibo.com', NULL, '2017-10-04 11:20:29'),
(84, 'Chandler', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'cstitwell2a@indiegogo.com', 'https://robohash.org/explicaboliberovoluptatem.png?size=128x128&set=set1', '2017-10-04 11:20:29'),
(85, 'Francoise', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'fshreeve2b@nhs.uk', 'https://robohash.org/corruptiexplicabotenetur.png?size=128x128&set=set1', '2017-10-04 11:20:29'),
(86, 'Stanley', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'sbransden2c@weibo.com', 'https://robohash.org/etutet.bmp?size=128x128&set=set1', '2017-10-04 11:20:29'),
(87, 'Antonietta', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'apencost2d@netlog.com', 'https://robohash.org/doloremexdeserunt.jpg?size=128x128&set=set1', '2017-10-04 11:20:29'),
(88, 'Kerr', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'kmapletoft2e@shop-pro.jp', 'https://robohash.org/velitquosdolore.png?size=128x128&set=set1', '2017-10-04 11:20:29'),
(89, 'Heindrick', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'hfenwick2f@technorati.com', 'https://robohash.org/vitaesedquam.jpg?size=128x128&set=set1', '2017-10-04 11:20:29'),
(90, 'Willetta', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'wemblin2g@google.com.hk', 'https://robohash.org/magnametculpa.bmp?size=128x128&set=set1', '2017-10-04 11:20:29'),
(91, 'Sheryl', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'smcterry2h@skyrock.com', 'https://robohash.org/repudiandaeametsaepe.png?size=128x128&set=set1', '2017-10-04 11:20:29'),
(92, 'Sharron', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'smainland2i@csmonitor.com', NULL, '2017-10-04 11:20:29'),
(93, 'Alysa', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'astienton2j@trellian.com', 'https://robohash.org/odiooccaecatiquam.jpg?size=128x128&set=set1', '2017-10-04 11:20:29'),
(94, 'Griselda', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'gdommerque2k@nature.com', 'https://robohash.org/veritatispariaturest.bmp?size=128x128&set=set1', '2017-10-04 11:20:29'),
(95, 'Vito', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'vjakubovics2l@xrea.com', 'https://robohash.org/iureperferendismolestias.jpg?size=128x128&set=set1', '2017-10-04 11:20:29'),
(96, 'Florance', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'fricciardi2m@tripadvisor.com', 'https://robohash.org/placeatdolorumconsequatur.png?size=128x128&set=set1', '2017-10-04 11:20:29'),
(97, 'Anallese', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ashipston2n@liveinternet.ru', NULL, '2017-10-04 11:20:29'),
(98, 'Rex', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'rdoncom2o@twitter.com', 'https://robohash.org/magnicumqueplaceat.jpg?size=128x128&set=set1', '2017-10-04 11:20:29'),
(99, 'Shaylynn', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'scorbould2p@wunderground.com', NULL, '2017-10-04 11:20:29'),
(100, 'Marv', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'mdebeneditti2q@indiegogo.com', 'https://robohash.org/maioresautdebitis.bmp?size=128x128&set=set1', '2017-10-04 11:20:29'),
(101, 'Sigfried', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'smurname2r@wisc.edu', 'https://robohash.org/fugavoluptasa.jpg?size=128x128&set=set1', '2017-10-04 11:20:29'),
(102, 'Jo', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'jcassely2s@yahoo.com', NULL, '2017-10-04 11:20:29'),
(103, 'Bobby', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'bthrift2t@php.net', 'https://robohash.org/officiaaccusantiumsimilique.bmp?size=128x128&set=set1', '2017-10-04 11:20:29'),
(104, 'Raymund', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'rklamman2u@simplemachines.org', NULL, '2017-10-04 11:20:29'),
(105, 'Florence', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'fyurchenko2v@bing.com', 'https://robohash.org/quidoloremvoluptatem.png?size=128x128&set=set1', '2017-10-04 11:20:29'),
(106, 'Jodi', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'jstutely2w@tmall.com', 'https://robohash.org/eteteligendi.png?size=128x128&set=set1', '2017-10-04 11:20:29'),
(107, 'Francisco', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'fpillman2x@businesswire.com', 'https://robohash.org/utexquia.png?size=128x128&set=set1', '2017-10-04 11:20:29'),
(108, 'Robers', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'remer2y@dmoz.org', 'https://robohash.org/consequaturreiciendisfuga.png?size=128x128&set=set1', '2017-10-04 11:20:29'),
(109, 'Anthony', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'aseviour2z@mozilla.com', 'https://robohash.org/aspernaturlaborumexcepturi.jpg?size=128x128&set=set1', '2017-10-04 11:20:29'),
(110, 'Gerald', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'gmunro30@statcounter.com', 'https://robohash.org/beataequiaipsum.bmp?size=128x128&set=set1', '2017-10-04 11:20:29'),
(111, 'Kenon', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'kkhomishin31@sakura.ne.jp', NULL, '2017-10-04 11:20:29'),
(112, 'Ernie', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'emcguffog32@arizona.edu', 'https://robohash.org/dolorumveritatiseos.bmp?size=128x128&set=set1', '2017-10-04 11:20:29'),
(113, 'Gisela', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'gzumfelde33@sbwire.com', NULL, '2017-10-04 11:20:29'),
(114, 'Nonah', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'nwindless34@techcrunch.com', NULL, '2017-10-04 11:20:29'),
(115, 'Mirabella', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'mmaasz35@opensource.org', 'https://robohash.org/placeatperferendisqui.jpg?size=128x128&set=set1', '2017-10-04 11:20:29'),
(116, 'Shari', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'sperrott36@biblegatusery.com', NULL, '2017-10-04 11:20:29'),
(117, 'Annissa', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'aitzkin37@auda.org.au', 'https://robohash.org/maioresilloalias.bmp?size=128x128&set=set1', '2017-10-04 11:20:29'),
(118, 'Esta', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ejorczyk38@prweb.com', NULL, '2017-10-04 11:20:29'),
(119, 'Bartie', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'browledge39@craigslist.org', NULL, '2017-10-04 11:20:29'),
(121, 'Herb', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'htripcony3b@prlog.org', NULL, '2017-10-04 11:20:29'),
(171, 'Tito2', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'tmcgowing1d@weibo.com', NULL, '2017-10-04 11:21:30'),
(173, 'Franny2', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'fmidgely0@edublogs.org', NULL, '2017-10-04 11:21:45'),
(225, 'Viki2', 'ae4afed9c85a845649a36c913293d67f564a6138', 'ae4afed9c85a845649a36c913293d67f564a6138', 'vredhead1@statcounter.com', NULL, '2017-10-04 11:22:14');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user_slack`
--

CREATE TABLE `user_slack` (
  `user_id` int(11) NOT NULL,
  `slack_id` varchar(23) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `post_comment`
--
ALTER TABLE `post_comment`
  ADD PRIMARY KEY (`post_id`,`author_id`);

--
-- Indexen voor tabel `post_comment_vote`
--
ALTER TABLE `post_comment_vote`
  ADD PRIMARY KEY (`comment_id`,`user_id`);

--
-- Indexen voor tabel `post_follow`
--
ALTER TABLE `post_follow`
  ADD PRIMARY KEY (`post_id`,`author_id`);

--
-- Indexen voor tabel `post_vote`
--
ALTER TABLE `post_vote`
  ADD PRIMARY KEY (`post_id`,`user_id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- Indexen voor tabel `user_slack`
--
ALTER TABLE `user_slack`
  ADD PRIMARY KEY (`user_id`,`slack_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=275;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
