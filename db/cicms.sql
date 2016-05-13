-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 27, 2016 at 04:42 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cicms`
--

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(300) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `link` varchar(500) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '-1',
  `order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Is_active` tinyint(1) NOT NULL,
  `description` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `image`, `Is_active`, `description`) VALUES
(2, 'Website Title  ', '', 0, 'Phaka Money'),
(3, 'Meta Keywords', '', 0, 'sdasfdc dxfdsfsdfc dfgvfddfdsfedfdutyirdtguhn kdljfgojdgoij djgfdjco'),
(4, 'Meta Description', '', 0, 'etfsdf dsfds sdfdsf dsgtgu'),
(5, 'Logo', '144040874720150824.png', 0, ''),
(16, 'Email Verification', '', 0, 'Yes'),
(17, 'Email', '', 0, 'info@admin.com'),
(18, 'Footer Text', '', 0, 'rtret');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE IF NOT EXISTS `tbl_login` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salt` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `email` (`email`(191)),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`user_id`, `firstname`, `lastname`, `password`, `salt`, `email`, `date_created`) VALUES
(2, 'Pawnesh', 'Test', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'pawnesh.k.rai@gmail.com', '2016-04-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pages`
--

CREATE TABLE IF NOT EXISTS `tbl_pages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `page_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=active, 0=deactive',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`(191)),
  KEY `status` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_pages`
--

INSERT INTO `tbl_pages` (`id`, `page_title`, `slug`, `short_content`, `content`, `meta_keyword`, `meta_description`, `status`, `created_on`, `updated_on`) VALUES
(2, 'Contact Us', 'contact-us', 'this is contact us page', 'contact us page here will be all data and records', 'asdfhasjkd', 'asdfkadjs', 1, '2016-01-29 17:39:28', '2016-01-29 17:39:28'),
(4, 'The One People’s Public Trust.', 'the-one-peoples-public-trust', 'asasdf', '<p>On December 25, 2012, three public trustees  							disclosed groundbreaking legal documents filed on  							behalf of THE ONE PEOPLE. From this moment, a  							grassroots movement was born as the documents swept  							across the globe like wildfire.<br><br>Since these  							filings, hundreds of thousands of people across the  							world have been inspired to act on a common goal:  							Freedom from the old enslavement system and a choice  							to live their lives according to their own free will  							and free will choices.<br><br>Using a common legal  							process, current systems such as governments and  							banking have been lawfully and legally foreclosed  							upon, bringing an end to their corporate rampage of  							fraud and deceit.<br><br>The One People’s Public  							Trust documents opened the door so people could free  							themselves from the failed systems and co-create a  							new system, according to the desires and free will  							choice of each, acting in the highest good of all.<br> 							<br><br><br>A Timeline of The One People’s Public  							Trust <br>(For a more detailed timeline, see below.)<br> 							<br>It all started in 2009, when three colleagues,  							including Heather Tucci-Jarraf, a banking, trade and  							finance executive, along with others, conducted an  							investigation into loan fraud at the World Bank.  							Their report became known as Treasury Finance AG:  							Final Bullet Report &ndash; Paradigm - A Report On Bank,  							Judicial and Government Corruption.<br><br>It  							established the fact that no actual loans were ever  							made and that although there may be lawful money,  							there was no such thing as lawful current ‘funds’.  							Instead there was actually a private slavery system  							relying on peoples’ ignorance of contracts they had  							unwittingly become bound by.<br><br>An excerpt from  							the Report says:<br><br>“The  							private-money-for-public-use banking system is the  							constant forum, denominator, and prime of all crimes  							against humanity, sovereigns, contract, and  							commerce, including but not limited to breach of  							peace, trespass, and involuntary servitude, through  							illegal fraud, coercion, force, theft and deceptive  							practices and acts…through careful selection and  							placement of the private bank system’s agents, the  							government of the UNITED STATES OF AMERICA is and  							has been serving the private banking system to the  							detriment and harm the people of America and the  							people of the world; The private banking system has  							illegally forced principles on a global scale.”<br> 							<br>See the full report here.<br><br>The  							investigators concluded that this system could not  							be saved, so why bother continuing to put any energy  							into saving it. The One People’s Public Trust or  							OPPT was formed by three of those investigators, the  							trustees being Heather, along with Caleb Skinner and  							Randall Hollis, when they decided to disclose the  							report and other findings to the public.<br><br> 							Using a series of legal actions and Uniform  							Commercial Code registrations the trustees served  							notices on the banks and corporate governments  							stating all unlawful and illegal claims of ownership  							and actions of management and control by their  							principals, agents and beneficiaries were lawfully  							and legally duly cancelled and foreclosed upon by  							their own free will choice not to remedy the damage  							they had caused.<br><br>The documents further  							determined that these entities had absolutely no  							legal standing or authority between individuals and  							their Creator. None of the filings have been  							rebutted, as doing so would have revealed the intent  							and deceptions by these ex-entities.<br><br>From  							these foreclosures the OPPT was able to guard,  							protect and preserve all beings on the planet,  							inclusive of gold and silver previously misused and  							abused by the banking system. The one people of this  							planet, individually and equally, became the only  							lawful and legal issuers of any legitimate  							REPRESENTATION of value, especially currency.<br> 							<br>The alleged main stream banking system no longer  							had any asset backing. The trustees returned and  							allocated a significant amount of value to each  							human, a value that can pay the debt of the average  							person many, many times over, if debt as we knew it  							still existed.<br><br>All debt was eliminated by the  							very fact that the banks chose not to provide any  							verifiable documentation that a loan had ever been  							made, as a matter of law, as a matter of fact, and  							as a matter of public policy, and the banks  							therefore chose by their free will choice to  							foreclose on themselves.<br><br>And it was done!<br> 							<br><br><br>The Global Validity of the UCC Rulings<br> 							<br>The big question we need to be clear on is: If  							the Uniform Commercial Code (UCC) originated in the  							USA, how and why are the OPPT and I-UV rulings valid  							and applicable in every single nation and therefore  							every single person of this world?<br><br>A bit of  							history… The Uniform Commercial Code (UCC) was first  							published in 1952 to harmonize the law of sales and  							other commercial transactions across the USA, as  							well as actively discourage the use of legal  							formalities in making business contracts, to allow  							business to move forward without the intervention of  							lawyers or the preparation of elaborate documents.<br> 							<br>However, it is important to know that ALL  							nations and states of this world somehow became  							legally registered corporations with the USA  							Securities and Exchange Commission (SEC). This means  							that ALL UCC Rulings are legally applicable to ALL  							nations’ corporate entities and that every nations’  							‘employees’ (citizens) are also recognized and  							treated as legal corporations and are registered as  							commercial ‘vessels’, whose ‘value’ can be traded an  							sold as chattel.<br><br>You can simply go to  							http://www.sec.gov/edgar/searchedgar/companysearch.html  							and search either SIC 8888 (for ‘Foreign  							Governments’) or SIC 8880 (for ‘American Receipt  							Depository’) and see for yourself if your ‘country’  							is listed as a corporate entity on the USA stock  							exchange. If your country is, you are. You will also  							see the Annual Reports your ‘country’ files each  							year with SEC, as part of it’s legal, corporate  							obligation.<br><br>Where to next?<br><br>One of the  							many significant changes that have come about since  							the original OPPT rulings is that we now live in a  							world of unlimited responsibility and liability and  							this incredible paradigm shift is beginning to  							unfold right now.<br><br>So why is day to day life  							still the same? Though the old system is still in  							denial and although there are negotiations going on  							continuously at the highest level, the news of the  							existence of the Trust has been kept out of the  							mainstream media by the ex-corporate system to  							deliberately deceive the one people of this planet  							and to keep them from learning the truth.<br><br>You  							are now part of the paradigm shift. You are THE ONE  							PEOPLE.<br><br>Use of the OPPT documents lawfully  							and legally challenges some individuals who are  							still acting in ignorance of the new system or  							knowingly, willingly, and intentionally attempting  							to usurp, violate, invade, abrogate, subjugate, or  							insubordinate any BE’ing on this planet. It is also  							an invitation to participate transparently, with  							integrity, in the greatest period of change ever  							seen on this planet.<br><br>In the months to come  							our world is going to change beyond recognition. Our  							true history will be revealed along with the truth  							of the system we have been living under. Much  							technology that has been withheld from us will be  							released including power production, health and  							transport. War, disease and pollution will be a  							thing of the past.<br><br>Each of us needs to do our  							own research. Patience is required while we develop  							our own understanding of what is occurring and  							choose what we do with this information only as it  							resonates within each of us.<br>!</p>', 'asdf', 'asdf', 1, '2016-01-29 19:12:14', '2016-01-29 19:12:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(300) NOT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `stret_no` varchar(50) DEFAULT NULL,
  `building_name` varchar(100) DEFAULT NULL,
  `street` varchar(200) DEFAULT NULL,
  `suburb` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `image` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `is_manager` tinyint(4) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `contact` (`contact`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
