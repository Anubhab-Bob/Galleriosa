-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2019 at 08:57 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `art`
--

CREATE TABLE `art` (
  `artid` int(11) NOT NULL,
  `artname` varchar(30) NOT NULL,
  `artdate` date NOT NULL,
  `style` varchar(20) NOT NULL,
  `artist` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `art`
--

INSERT INTO `art` (`artid`, `artname`, `artdate`, `style`, `artist`) VALUES
(1, ' Charles I IN Three Positions ', '1523-03-28', ' Earth Art ', ' Jasper Johns '),
(2, ' Las Meninas ', '1515-05-16', ' Art Noveau ', ' Jan Van Eyck '),
(3, ' Mr AND Mrs Robert Andrews ', '1333-03-19', ' Expressionism ', ' Roy Lichtenstein '),
(4, ' Napoleon Crossing The Alps ', '1282-06-11', ' Cubism ', ' Francisco De Goya '),
(5, ' Pilgrimage TO Cythera ', '1542-02-16', ' Impressionism ', ' Jacques '),
(6, ' Primavera ', '1721-08-29', ' Earth Art ', ' Piet Mondrian '),
(7, ' The Birth Of Venus ', '1543-09-25', ' Baroque ', ' Edward Hopper '),
(8, ' The Creation Of Adam ', '1372-08-23', ' Avant - garde ', ' Hans Memling '),
(9, ' The Gleaners ', '1034-06-17', ' Classicism ', ' Georges Seurat '),
(10, ' The Grand Odalisque ', '1212-12-12', ' Baroque ', ' Jan Vermeer '),
(11, ' The Gross Clinic ', '1111-11-11', ' Minimalism ', ' Hieronymus Bosch '),
(12, ' The LAST Supper ', '1288-02-15', ' Abstract ', ' Gustav Klimt '),
(13, ' The Ninth Wave ', '1432-05-16', ' Futurism ', ' Fernand Ler '),
(14, ' The Sleeping Gypsy ', '1737-12-11', ' Earth Art ', ' Hans Holbein The Younger '),
(15, ' The Triumph Of Galatea ', '1666-01-09', ' Avant - garde ', ' Michelangelo Buonarroti '),
(16, 'American Gothic', '1341-03-05', 'Post-Impressionism', 'Gentileschi, Artemisia'),
(17, 'Bacchus And Ariadne', '1500-03-08', 'Expressionism', 'Frederic Edwin Church'),
(18, 'Large Bathers', '1668-10-08', 'Cubism', 'Tommaso Masaccio'),
(19, 'Luncheon Of The Boating Party', '1390-05-09', 'Constructivism', 'John Constable'),
(20, 'Musicians', '1672-01-12', 'Performance Art', 'William Hogarth'),
(21, 'Olympia', '1409-02-13', 'Neo-Impressionalism', 'James Ensor'),
(22, 'Pollice Verso', '1327-10-20', 'Performance Art', 'Paul Canne'),
(23, 'St. George And The Dragon', '1009-08-07', 'Art Noveau', 'Georgia O Keefe '),
(24, 'Sunday Afternoon On The Island', '1034-02-22', 'Rococo', 'David Hockney'),
(25, 'The Liberty Leading The People', '1284-04-21', 'Suprematism', 'Jean'),
(26, 'The Sleepers', '1735-08-18', 'Earth Art', 'Giotto Di Bondone'),
(27, 'The Swing', '1370-02-27', 'Constructivism', 'Winslow Homer'),
(28, 'The Third Of May 1808', '1208-01-09', 'Expressionism', 'Simone Martini'),
(29, 'The Tower Of Babel', '1485-01-11', 'Classicism', 'El Greco'),
(30, 'The Wanderer Above The Sea Of ', '1127-04-23', 'Impressionism', 'Ouard Manet'),
(31, 'View Of Toledo', '1687-03-21', 'Avant-garde', 'Claude Lorrain');

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `name` varchar(30) NOT NULL,
  `birthplace` varchar(30) NOT NULL,
  `age` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`name`, `birthplace`, `age`) VALUES
('Andrea Mantegna', 'North Dartmouth', 58),
('Andy Warhol', 'Fairhaven', 70),
('Arshille Gorky', 'Fairhaven', 70),
('Caravaggio', 'North Oxford', 54),
('Claude Lorrain', 'Northhampton', 31),
('David Hockney', 'Amsterdam', 52),
('El Lissitzky', 'Leicester', 62),
('Eug?E Delacroix', 'North Attleboro', 28),
('Fernand Ler', 'Chicopee', 82),
('Fra Angelico', 'Danvers', 28),
('Francis Bacon', 'North Attleboro', 18),
('Francisco De Goya', 'Hanover', 42),
('Frans Hals', 'Walpole', 34),
('Franz Marc', 'Lunenburg', 85),
('Frida Kahlo', 'Brockton', 75),
('Gentileschi, Artemisia', 'North Reading', 84),
('Georges Braque', 'Auburn', 51),
('Georges De La Tour', 'Leicester', 31),
('Georges Seurat', 'Seekonk', 81),
('Gerhard Richter', 'Raynham', 26),
('Giorgio De Chirico', 'Northhampton', 59),
('Giotto Di Bondone', 'Plymouth', 45),
('Gustav Klimt', 'Auburn', 45),
('Gustave Courbet', 'Bellingham', 66),
('Hans Holbein The Younger', 'Albion', 60),
('Hans Memling', 'Chelmsford', 78),
('James Mcneill Whistler', 'Northborough', 53),
('Jan Van Eyck', 'Danvers', 77),
('Jan Vermeer', 'Hanover', 36),
('Jasper Johns', 'Amsterdam', 50),
('Jean', 'Abington', 42),
('Jean Franiis Millet', 'Seekonk', 58),
('Lucio Fontana', 'Halifax', 19),
('Marc Chagall', 'Leicester', 72),
('Marcel Duchamp', 'Orange', 82),
('Nicolas Poussin', 'Pittsfield', 48),
('Ouard Manet', 'Bellingham', 83),
('Pablo Picasso', 'Framingham', 53),
('Paolo Uccello', 'Northborough', 85),
('Paul Gauguin', 'Lunenburg', 46),
('Paul Klee', 'Seekonk', 67),
('Pierre', 'Albany', 48),
('Piet Mondrian', 'Brockton', 51),
('Rembrandt Van Rijn', 'Fairhaven', 82),
('Roy Lichtenstein', 'Framingham', 48),
('Simone Martini', 'North Oxford', 82),
('Tintoretto', 'Raynham', 74),
('Titian', 'Framingham', 77),
('William Hogarth', 'Fairhaven', 53),
('Winslow Homer', 'Tewksbury', 53);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(11) NOT NULL,
  `cname` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `cname`, `address`, `total`) VALUES
(1, 'Vikki Hill', '1180 Fall River Avenue, Seekonk MA 2771', 158056),
(2, 'Zola Gonzalez', '30 Memorial Drive, Avon MA 2322', 134350),
(3, 'Jeanetta Cook', '250 Hartford Avenue, Bellingham MA 2019', 217665),
(4, 'Soraya Carter', '295 Plymouth Street, Halifax MA 2338', 42323),
(5, 'Carmela Mitchell', '20 Soojian Dr, Leicester MA 1524', 265363),
(6, 'Lashunda Harris', '20 Soojian Dr, Leicester MA 1524', 144987),
(7, 'Audrea Clark', '830 Curran Memorial Hwy, North Adams MA 1247', 146710),
(8, 'Stanley Coleman', '506 State Road, North Dartmouth MA 2747', 68820),
(9, 'Malena Rogers', '591 Memorial Dr, Chicopee MA 1020', 186752),
(10, 'Sima Nelson', '3005 Cranberry Hwy Rt 6 28, Wareham MA 2538', 39154);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` int(11) NOT NULL,
  `artid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `artid`, `cid`, `date`, `amount`) VALUES
(1, 4, 9, '2018-08-08', 45506),
(2, 18, 8, '2019-11-21', 12278),
(3, 5, 3, '2018-07-07', 12695),
(4, 3, 8, '2018-07-05', 12014),
(5, 31, 3, '2018-02-16', 83340),
(6, 15, 5, '2019-04-26', 78913),
(7, 30, 7, '2019-07-11', 89700),
(8, 16, 10, '2019-05-26', 39154),
(9, 29, 2, '2019-01-25', 72366),
(10, 12, 2, '2018-09-15', 61984),
(11, 8, 8, '2019-12-01', 13218),
(12, 6, 6, '2019-05-15', 66587),
(13, 20, 9, '2019-02-17', 71054),
(14, 2, 3, '2018-11-26', 74030),
(15, 17, 4, '2018-02-18', 19848),
(16, 7, 5, '2018-11-21', 13222),
(17, 22, 5, '2018-06-09', 13878),
(18, 24, 6, '2018-08-03', 22046),
(19, 21, 5, '2018-04-09', 19599),
(20, 27, 6, '2019-01-23', 13815),
(21, 14, 7, '2019-03-28', 57010),
(22, 11, 9, '2018-09-23', 51839),
(23, 19, 1, '2019-06-25', 67564),
(24, 9, 4, '2018-08-03', 22475),
(25, 28, 9, '2018-05-03', 18353),
(26, 13, 5, '2019-09-25', 75064),
(27, 25, 1, '2019-09-13', 90492),
(28, 23, 6, '2019-11-26', 42539),
(29, 26, 8, '2019-09-18', 31310),
(30, 1, 5, '2019-07-12', 64687),
(31, 10, 3, '2019-10-23', 47600);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `art`
--
ALTER TABLE `art`
  ADD PRIMARY KEY (`artid`),
  ADD UNIQUE KEY `artid` (`artid`),
  ADD UNIQUE KEY `artname` (`artname`),
  ADD KEY `artist` (`artist`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `artname` (`artid`),
  ADD KEY `cid` (`cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `art`
--
ALTER TABLE `art`
  MODIFY `artid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`artid`) REFERENCES `art` (`artid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
