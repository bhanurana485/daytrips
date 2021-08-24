-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2016 at 06:16 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `d`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `delcty`(IN `ccod` INT)
    NO SQL
begin

delete from tbcty where ctycod=ccod;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delloc`(IN `lcod` INT)
    NO SQL
begin

delete from tbloc where loccod=lcod;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delreg`(IN `rcod` INT)
    NO SQL
begin

delete from tbreg where regcod=rcod;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deltrp`(IN `tcod` INT)
    NO SQL
begin


delete from tbtrp where trpcod=tcod;


end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deltrppic`(IN `tpcod` INT)
    NO SQL
begin


delete from tbtrppic where trppiccod=tpcod;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dispcty`()
    NO SQL
begin


select * from tbcty ;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `disploc`(IN `ccod` INT)
    NO SQL
begin


select * from tbloc where locctycod=ccod;


end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dispreg`()
    NO SQL
begin


select * from tbreg;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `disptrp`()
    NO SQL
begin

select * from tbtrp;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `disptrppic`(IN `tcod` INT)
    NO SQL
begin

select * from tbtrppic where trppictrpcod=tcod;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dspmytrp`(IN `rcod` INT)
    NO SQL
select trpcod,trpdat,trplik,locnam,ctynam,trpcst,trptit,
(select ifnull(trppicfil,' ') from tbtrppic where
trppiccod=a.trpmanpiccod)  pic,trpdsc from tbtrp a,
tbloc,tbcty where trploccod=loccod and
locctycod=ctycod and trpregcod=rcod
order by trpdat desc$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `findcty`(IN `ccod` INT)
    NO SQL
begin

select * from tbcty where ctycod=ccod;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `findloc`(IN `lcod` INT)
    NO SQL
begin


select * from tbloc where loccod=lcod;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `findreg`(IN `rcod` INT)
    NO SQL
begin

select * from tbreg where regcod=rcod;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `findtrp`(IN `tcod` INT)
    NO SQL
begin

select * from tbtrp where trpcod=tcod;


end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `findtrppic`(IN `tpcod` INT)
    NO SQL
begin
    
    
    select * from tbtrppic where trppiccod=tpcod;
    
    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `inscty`(IN `cnam` VARCHAR(100))
    NO SQL
begin

insert tbcty values(null,cnam);

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insloc`(IN `lnam` VARCHAR(100), IN `lccod` INT)
    NO SQL
begin

insert tbloc values(null,lnam,lccod);


end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insreg`(IN `reml` VARCHAR(50), IN `rpwd` VARCHAR(50), IN `rdat` DATETIME)
    NO SQL
begin

insert tbreg values(null,reml,rpwd,rdat);

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `instrp`(IN `tlcod` INT, IN `trcod` INT, IN `ttit` VARCHAR(100), IN `tdsc` VARCHAR(1000), IN `tcst` VARCHAR(100), IN `tdat` DATETIME, IN `tlik` INT, IN `tmpcod` INT)
    NO SQL
begin

insert tbtrp values(null,tlcod,trcod,ttit,tdsc,tcst,tdat,tlik,tmpcod);


end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `instrppic`(IN `tptcod` INT, IN `tpfil` VARCHAR(50), IN `tpdsc` VARCHAR(500))
    NO SQL
begin

insert tbtrppic values(null,tptcod,tpfil,tpdsc);


end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `logincheck`(IN `eml` VARCHAR(50), IN `pwd` VARCHAR(50), OUT `cod` INT)
    NO SQL
begin
declare actpwd varchar(50);
select regpwd from tbreg where regeml=eml into @actpwd;
if @actpwd=pwd then
select regcod from tbreg where regeml=eml into cod;
else
set cod=-1;
end if;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `srctrp`(IN `lcod` INT)
    NO SQL
select trpcod,trpdat,trplik,locnam,ctynam,trpcst,trptit,
(select ifnull(trppicfil,' ') from tbtrppic where
trppiccod=a.trpmanpiccod)  pic,trpdsc from tbtrp a,
tbloc,tbcty where trploccod=loccod and
locctycod=ctycod and trploccod=lcod
order by trpdat desc$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updcty`(IN `ccod` INT, IN `cnam` VARCHAR(50))
    NO SQL
begin
    
    
    
    update tbcty set ctynam=cnam where ctycod=ccod;
    
    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updlik`(IN `tcod` INT)
    NO SQL
begin
declare r int;
select trplik from tbtrp where trpcod=tcod into @r;
update tbtrp set trplik=@r+1 where trpcod=tcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updloc`(IN `lcod` INT, IN `lnam` VARCHAR(100), IN `lccod` INT)
    NO SQL
begin


update tbloc set locnam=lnam,locctycod=lccod where loccod=lcod;


end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updreg`(IN `rcod` INT, IN `reml` VARCHAR(50), IN `rpwd` VARCHAR(50), IN `rdat` DATETIME)
    NO SQL
begin


update tbreg set regeml=reml,regpwd=rpwd,regdat=rdat where regcod=rcod;


end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updtrp`(IN `tcod` INT, IN `tlcod` INT, IN `trcod` INT, IN `ttit` VARCHAR(100), IN `tdsc` VARCHAR(1000), IN `tcst` VARCHAR(100), IN `tdat` DATETIME, IN `tlik` INT, IN `tmpcod` INT)
    NO SQL
begin

update tbtrp set trploccod=tlcod,trpregcod=trcod,trptit=ttit,trpdsc=tdsc,trpcst=tcst,trpdat=tdat,trplik=tlik,trpmanpiccod=tmpcod where trpcod=tcod;



end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updtrpmanpic`(IN `tcod` INT, IN `pcod` INT)
    NO SQL
update tbtrp set trpmanpiccod=pcod where trpcod=tcod$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updtrppic`(IN `tpcod` INT, IN `tptcod` INT, IN `tpfil` VARCHAR(50), IN `tpdsc` VARCHAR(500))
    NO SQL
begin


update tbtrppic set trppictrpcod=tptcod,trppicfil=tpfil,trppicdsc=tpdsc where trppiccod=tpcod;

end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbcty`
--

CREATE TABLE IF NOT EXISTS `tbcty` (
  `ctycod` int(11) NOT NULL AUTO_INCREMENT,
  `ctynam` varchar(100) NOT NULL,
  PRIMARY KEY (`ctycod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbcty`
--

INSERT INTO `tbcty` (`ctycod`, `ctynam`) VALUES
(1, 'Chandigarh'),
(2, 'Pune'),
(3, 'Noida'),
(4, 'Gurgaon');

-- --------------------------------------------------------

--
-- Table structure for table `tbloc`
--

CREATE TABLE IF NOT EXISTS `tbloc` (
  `loccod` int(11) NOT NULL AUTO_INCREMENT,
  `locnam` varchar(100) NOT NULL,
  `locctycod` int(11) NOT NULL,
  PRIMARY KEY (`loccod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tbloc`
--

INSERT INTO `tbloc` (`loccod`, `locnam`, `locctycod`) VALUES
(1, 'Manimajara', 1),
(2, 'Sactor-22', 1),
(3, 'Sactor-17', 1),
(5, 'kayani Nagar', 2),
(6, 'Baner Road', 2),
(7, 'Haveli', 2),
(8, 'Ghorpuri', 2),
(9, 'Sactor-26', 3),
(10, 'Sactor-61', 3),
(11, 'Sactor-41', 3),
(12, 'Sactor-63', 3),
(13, 'Sushant Lok Phase-1', 4),
(14, 'Sardana', 4),
(15, 'Dhorka', 4),
(16, 'Meoka', 4),
(17, 'Old Faridabad', 5),
(18, 'Badshapur', 5),
(19, 'Lakewood City', 5),
(20, 'Ballabgarh', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbreg`
--

CREATE TABLE IF NOT EXISTS `tbreg` (
  `regcod` int(11) NOT NULL AUTO_INCREMENT,
  `regeml` varchar(50) NOT NULL,
  `regpwd` varchar(50) NOT NULL,
  `regdat` datetime NOT NULL,
  PRIMARY KEY (`regcod`),
  UNIQUE KEY `regeml` (`regeml`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbreg`
--

INSERT INTO `tbreg` (`regcod`, `regeml`, `regpwd`, `regdat`) VALUES
(1, 'abc@gmail.com', 'abc123#', '2016-07-08 00:00:00'),
(2, 'ankush@gmail.com', 'ankush', '2016-07-16 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbtrp`
--

CREATE TABLE IF NOT EXISTS `tbtrp` (
  `trpcod` int(11) NOT NULL AUTO_INCREMENT,
  `trploccod` int(11) NOT NULL,
  `trpregcod` int(11) NOT NULL,
  `trptit` varchar(100) NOT NULL,
  `trpdsc` varchar(1000) NOT NULL,
  `trpcst` varchar(100) NOT NULL,
  `trpdat` datetime NOT NULL,
  `trplik` int(11) NOT NULL,
  `trpmanpiccod` int(11) NOT NULL,
  PRIMARY KEY (`trpcod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `tbtrp`
--

INSERT INTO `tbtrp` (`trpcod`, `trploccod`, `trpregcod`, `trptit`, `trpdsc`, `trpcst`, `trpdat`, `trplik`, `trpmanpiccod`) VALUES
(3, 1, 1, 'Dt-Mall', 'Everyone loves watching movies, and a good movie is best enjoyed at DT City Centre: Chandigarh. The theatre, which has become the hub for cinemagoers in Chandigarh, is the place to check out all the hottest new releases. Whether you want to watch Great Grand Masti - Hindi or	Sultan - Hindi etc, just make your way to DLF Infocity, Rajiv Gandhi Technology Park, Chandigarh, Chandigarh 160017, India.Then sit back, relax and enjoy a stellar cinematic experience!', '1500', '2016-07-15 00:00:00', 0, 21),
(4, 2, 1, 'Aroma', '8.8 km from Chandigarh Railway Station, 8.8 km from Airport, Meeting and banquet facilities, 2 Multi-cuisine restaurants, Cafeteria and pastry shop Hotel Aroma Complex offers comfortable accommodation at reasonable rates. Along with railway station and airport, many popular commercial and shopping hubs, such as Picaddily Square, Shastri Market and Sector-17, are located within easy reach from the hotel. It features well-designed rooms that are available in three categories, namely Deluxe, Royal and Luxury Rooms. Every room features all the basic amenities like television and telephone. At Aroma Complex, there is a banquet hall, conference hall and exhibition centre for organising meetings and party events. The hotel offers facilities like a business centre, florist, medical assistance and functional travel desk, which make it suitable for corporate as well as leisure travellers. Grapewine Bar and Restaurant at the hotel serves a wide range of delicacies and refreshing drinks. The Casca', '3000', '2016-07-15 00:00:00', 0, 17),
(5, 3, 1, 'Neelam Theatre', '+(91)-172-2703600  Sector 17e, Chandigarh - 160017, Backside Bus Stand (Map)  Cinema Halls	, Great Grand Masti (Hindi Movie)', '300', '2016-07-15 00:00:00', 1, 14),
(6, 5, 1, 'Aga Khan Palace', 'The Aga Khan Palace was built by Sultan Muhammed Shah Aga Khan III in Pune, India. Built in 1892, it is one of the biggest landmarks in Indian history. The palace was an act of charity by the Sultan who wanted to help the poor in the neighbouring areas of Pune, who were drastically hit by famine', '2000', '2016-07-15 00:00:00', 0, 8),
(7, 6, 1, 'Raja Dinkar Kelkar Museum', 'The Raja Dinkar Kelkar Museum is in Pune, Maharashtra, India.[1] It contains the collection of Dr. Dinkar G. Kelkar (1896–1990), dedicated to the memory of his only son, Raja.[2] The three-storey building houses various sculptures dating back to the 14th century.[citation needed] There are also ornaments made of ivory, silver and gold, musical instruments (a particularly fine collection)[citation needed], war weapons and vessels.\r\n\r\nThe collection was started around 1920 and by 1960 it contained around 15,000 objects. In 1962, Dr. Kelkar handed his collection to the Department of Archaeology within the Government of Maharashtra.', '2000', '2016-07-15 00:00:00', 3, 22),
(8, 7, 1, 'Mulshi Dam', 'Mulshi is the name of a major dam on the Mula river in India.[1] It is located in the Mulshi taluka administrative division of the Pune district of Maharashtra State.\r\nWater from the dam is used for irrigation as well as for producing electricity at the Bhira hydroelectric power plant, operated by Tata Power. The station operates six 25MW Pelton turbines established in 1927 and one 150MW Pumped Storage Unit. Water from this reservoir located in Krishna river basin is diverted to the Bhira power house for generating Hydro electricity.', '1000', '2016-07-15 00:00:00', 0, 18),
(9, 8, 1, 'Lohagad', 'Lohagad (Marathi: &#2354;&#2379;&#2361;&#2327;&#2337;, iron fort) is one of the many hill forts of Maharashtra state in India. Situated close to the hill station Lonavala and 52 km (32 mi) northwest of Pune, Lohagad rises to an elevation of 1,033 m (3,389 ft) above sea level. The fort is connected to the neighboring Visapur fort by a small range. The fort was under the Maratha empire for the majority of time, with a short period of 5 years under the Mughal empire.', '2500', '2016-07-15 00:00:00', 0, 15),
(10, 9, 1, 'Atta Market', 'This is the place of large variety of shopping and any category of buyers can purchase, Atta is meant for Low to medium income group For Upper income Sec18 & near malls', '2000', '2016-07-15 00:00:00', 0, 9),
(11, 10, 1, 'Spice World Mall', 'Excellent Movie Hall Seats and good inexpensive eating. Parking not a problem. Nice shops to browse around. Excellent glass lifts conveniently located.', '1000', '2016-07-15 00:00:00', 0, 23),
(12, 11, 1, 'Logix City Centre Mall', 'A very nice mall bang opp Noida city metro station... great location... visited the mall just after lunch for a stroll... mall is huge and all outlets are not yet open... Food', '1000', '2016-07-15 00:00:00', 0, 19),
(13, 12, 1, 'Rashtriya Dalit Prerna Sthal and Green Garden', 'The place is awesome but there should be more gardens and plantation of the trees. It should look close to nature rather than concrete park.', '1200', '2016-07-15 00:00:00', 0, 12),
(14, 13, 1, 'Kingdom Of Dreams ', 'Kingdom of Dreams is located in sector 29 of Gurgaon near Leisure Valley Park and is easily accessible by the available means of transport. The nearest metro station is IFFCO Chowk metro station.', '1500', '2016-07-15 00:00:00', 0, 10),
(15, 14, 1, 'shri mata sheetla devi temple', 'To reach this place, you can hire a cab or an auto-rickshaw or take the metro till Guru Dronacharya Metro Station.', '3000', '2016-07-15 00:00:00', 0, 20),
(16, 15, 1, 'Farrukh Nagar Fort', 'The town is located about 21 km from the district headquarters, to the north-west near the border of the Rohtak district.', '1500', '2016-07-15 00:00:00', 0, 16),
(17, 15, 1, 'Sohna', 'From NH 8 take the Badshapur/Sohna road/SH 13 and make your way to Maharaja Aggarsain .', '1000', '2016-07-15 00:00:00', 0, 13),
(18, 16, 1, 'Leisure Valley Park', 'Located in Sector 29, half a kilometer away from the IFFCO chowk metro station the place is well connected by metro service. You can also reach here by your private vehicle without any inconvenience.', '1200', '2016-07-15 00:00:00', 0, 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbtrppic`
--

CREATE TABLE IF NOT EXISTS `tbtrppic` (
  `trppiccod` int(11) NOT NULL AUTO_INCREMENT,
  `trppictrpcod` int(11) NOT NULL,
  `trppicfil` varchar(50) NOT NULL,
  `trppicdsc` varchar(500) NOT NULL,
  PRIMARY KEY (`trppiccod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `tbtrppic`
--

INSERT INTO `tbtrppic` (`trppiccod`, `trppictrpcod`, `trppicfil`, `trppicdsc`) VALUES
(8, 6, '1.jpg', 'The Aga Khan Palace was built by Sultan Muhammed Shah Aga Khan III in Pune, India. Built in 1892, it is one of the biggest landmarks in Indian history.'),
(9, 10, '2.jpg', 'Atta Market, Noida: See 85 reviews, articles, and 5 photos of Atta Market, ranked No.6 on TripAdvisor among 25 attractions in Noida.'),
(10, 14, '3.jpg', 'The Best entertainment place in India which brings live entertainment shows with bollywood style musical at one place.'),
(11, 18, '4.jpg', 'Leisure Valley Park, Gurgaon: See 305 reviews, articles, and 73 photos of Leisure Valley Park, ranked No.6 on TripAdvisor among 56 attractions in Gurgaon.'),
(12, 13, '5.jpg', 'The Rashtriya Dalit Prerna Sthal and Green Garden is a memorial in Noida, Uttar Pradesh, India. It was commissioned by Chief Minister of Uttar Pradesh '),
(13, 17, '6.jpg', 'Set amidst 37 acres of lush greenery and located only 45 minutes from Gurgaon and 60 minutes from the International Airport.'),
(14, 5, '7.jpg', 'Get Show Timings & Movie Tickets For a Theatre Near You. Check Now!\r\nReserve now pay later* · 100% safe & secure · 24/7 customer care'),
(15, 9, '8.jpg', 'Lohagad (Marathi: &#2354;&#2379;&#2361;&#2327;&#2337;, iron fort) is one of the many hill forts of Maharashtra state in India. Situated close to the hill station Lonavala and 52 km '),
(16, 16, '9.jpg', 'See farrukh nagar fort location, address and where farrukh nagar fort is situated in gurgaon on a map.'),
(17, 4, '10.jpg', 'Aroma definition, an odor arising from spices, plants, cooking, etc., especially an agreeable odor; fragrance.'),
(18, 8, '12.jpg', 'Mulshi is the name of a major dam on the Mula river in India. It is located in the Mulshi taluka administrative division of the Pune district of Maharashtra State.'),
(19, 12, '13.jpg', ']Logix City Center is one of the first mixed use commercial projects in the heart of Noida city. Logix City Center shall have over 7 lac sq ft of retail'),
(20, 15, '14.jpg', 'Shitala (Sheetala), also called Sitala (&#2358;&#2368;&#2340;&#2354;&#2366; &#347;&#299;tal&#257;), is a folk deity, worshiped by many faiths ... Some of them are shri shitla mata chalisa, Shitala Maa ki Arti, Shri Shitala mata ... Shitala Mata Mandir,Nizambad, Azamgarh, Uttar Pradesh; Sheetala Mata Mandir,Village- Kanana,City- Balotra, Barmer, Rajasthan; Shitala Devi '),
(21, 3, '15.jpg', 'Exclusive Premiere of Joy at DT Star Cinemas, Vasant Kunj on 21/01/2016. Date: 21/01/2016. DT Cinemas hosted an xclusive premiere of Joy. Joy is a 2015 '),
(22, 7, '16.jpg', 'The Raja Dinkar Kelkar Museum is in Pune, Maharashtra, India. It contains the collection of Dr. Dinkar G. Kelkar (1896–1990), dedicated to the memory'),
(23, 11, '17.jpg', 'Mall Directory. UB/LB · Ground Floor · 1st Floor · 2nd Floor · 3rd - 5th Floors. Mall Directory. DTS TELESHOPPING. Home > Media Center > Ground Floor. '),
(24, 8, '7.jpg', 'kjkjkjjkjj'),
(25, 0, 'secure-safe-img.png', 'dfbjsd duif iuhdf sh\r\n'),
(26, 4, 'secure-bg.jpg', 'fuyfghfghfghc');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
