-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2023 at 07:40 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment2`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `ID` int(15) NOT NULL,
  `Time` date NOT NULL,
  `Title` text NOT NULL,
  `Contents` text NOT NULL,
  `Tags` varchar(255) NOT NULL,
  `Picture` longblob NOT NULL,
  `userID` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`ID`, `Time`, `Title`, `Contents`, `Tags`, `Picture`, `userID`) VALUES
(3, '2023-07-04', 'Niagara Falls, Canada & USA', 'On the border between the United States and Canada, these great falls have been drawing explorers and travelers for centuries. Just over an hour from the city of Toronto, Niagara Falls is easy to get to, and the town is a fun place to spend a night or two.\r\nWalk up to the edge of the falls, stroll along the paved walk lining the gorge for different views, or take a boat tour for a close-up look at the water pouring over the lip of the gorge above you. For a bird\'s-eye view, head up the Skylon Tower to look out over the falls.\r\nAt night, see the falls lit in different colors. If you\'re visiting in winter, watch the huge plume of mist rising into the sky above the falls.\r\n', 'NORTH AMERICA', 0x75706c6f6164732f4e6961676172612d46616c6c732e6a7067, 4),
(4, '2023-07-21', 'South Island, New Zealand', 'From wildlife to wineries, glacial valleys to star-filled skies, the South Island offers adventure in all its forms. Choose to explore just one region, or road trip from Picton all the way down to Bluff. No matter which destinations you choose to explore on this long, mountainous island, you\'ll be constantly open-mouthed before the incredible scenery.', 'CONTINENT', 0x75706c6f6164732f736f7574682d69736c616e642e6a7067, 4),
(5, '2023-08-02', 'Chichen Itza, Mexico', 'The ancient Mayan ruins of Chichen Itza have been drawing curious tourists since they were first brought to light by a popular book by John Lloyd Stevens in 1843. Today the site, located near the center of the Yucatan Peninsula, is one of the top tourist attractions in Mexico and is a UNESCO World Heritage Site.\r\nThe 30-meter-high Pyramid of Kukulkán has been restored to its full glory along with many of the other significant buildings, including the Great Ball Court, the Temple of the Warriors, and the eerie Skull Platform.\r\nChichen Itza is located about 200 kilometers from Cancun and is easily accomplished in a day trip from Cancun, Playa del Carmen, and other areas of the Mayan Riviera either on your own or as part of a group.\r\n', 'NORTH AMERICA', 0x75706c6f6164732f6368696368656e2d69747a612d6d657869636f2e6a7067, 4),
(6, '2023-03-01', 'Great Barrier Reef, Australia', 'The Great Barrier Reef is the world\'s largest and longest coral reef group, located in the South Pacific Ocean off the northeastern coast of Australia, which runs through the Coral Sea off Queensland in northeastern Australia, from the Torres Strait in the north to south of the Tropic of Capricorn in the south, and extends a total of about 2,600 kilometers, with a width of 161 kilometers at its widest point. There are about 2,900 individual reefs and 900 islands of various sizes spread over an area of about 344,400 square kilometers, making the natural landscape very special.', 'CONTINENT', 0x75706c6f6164732f67726561742d626172726965722d726565662e6a7067, 4),
(7, '2021-12-01', 'The Colosseum, Rome', 'The most famous and largest structure still standing from the Roman Empire, the Colosseum is also the biggest attraction of modern-day Rome. It\'s been a bucket-list destination of travelers for generations. And it does not disappoint.\r\nSet in the heart of the city, the Colosseum is an easy place to visit. Direct flights from around the world land in Rome daily, making it a destination you can visit in a weekend if you choose. Wander through Rome\'s ancient streets, tour the colosseum, and if time allows, plan a trip to other areas of Italy.\r\n', 'EUROPE', 0x75706c6f6164732f636f6c6f737365756d2e6a7067, 4),
(8, '2022-11-11', 'The Acropolis, Athens', 'Perched above present day Athens, the Acropolis draws you up and in. Follow in the footsteps of ancients as you walk up the same steps that have been walked on since 438 BC - 2,500 years.\r\nViews out over the city are incredible as you walk between the meticulously restored ancient buildings. Near the end of the day, you\'ll want to linger and watch the sunset from the stairs near the entrance. This is a nightly ritual in Athens.\r\nThe site is also impressive looking up at it from the city below. Spend an evening dining on a rooftop patio to soak in the view of the hilltop ruins lit up at night.\r\n', 'europe', 0x75706c6f6164732f6163726f706f6c69732e6a7067, 4),
(9, '2022-08-31', 'Prague Castle, Czech Republic', 'Sitting atop a hill across the river from the center of the city, Prague Castle casts an imposing aura over its surroundings. The castle is an incredible collection of buildings constructed from the 9th to 14th century.\r\nStroll over the ornate 14th-century Charles Bridge spanning the Vltava River and head up the hill to wander the narrow, twisty streets in the castle complex. The castle is one of the largest in the world, and around almost every corner is a historical building, church, or open square.\r\n', 'europe', 0x75706c6f6164732f7072616775652d636173746c652e6a7067, 4),
(10, '2023-08-04', 'Great Wall, China', 'In a land of modern cities and towering skyscrapers, the Great Wall of China, built between the 14th and 17th centuries, is a stark contrast but a striking image that all visitors to China should see.\r\nA stroll along the top of the wall provides an incredible view of the structure snaking off into the distance. The wall stretches an astounding 21,196 kilometers, through some remote areas.\r\nMany travelers seeing the sights of China choose to visit the wall on easily organized tours from Beijing, a relatively short motorcoach ride away.\r\n', 'ASIA', 0x75706c6f6164732f67726561742d77616c6c2e6a7067, 4),
(11, '2023-08-01', 'Mount-Fuji, Japan', 'Mount Fuji is the most well-known and highest mountain in Japan. Often pictured snowcapped, this dormant volcano is both a spiritual site and one of the top tourist attractions in Japan. Soaring 3,776 meters high, Mount Fuji is one of three Holy Mountains, all of which are UNESCO World Heritage Sites.\r\nHiking to the top of the mountain is a popular thing to do in Japan. Each year, nearly 300,000 people follow one of four routes to the top. One of the most popular things to do is time your hike so that you reach the summit just before sunrise.\r\nMount Fuji is located 100 kilometers east of Tokyo and is easily accessible via public transit and tours.\r\n', 'ASIA', 0x75706c6f6164732f6d6f756e742d66756a692e6a7067, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(15) NOT NULL,
  `Name` varchar(150) NOT NULL,
  `Email` varchar(319) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Name`, `Email`, `Password`) VALUES
(4, 'Yuan', 'guo00093@algonquinlive.com', '$2y$10$aEFRRbJRJ04SunabDtZP4O916jz/RLcYTdnpFX1QIZHniAcIYYmHS'),
(5, 'Ian', '76545464@qq.com', '$2y$10$j7EwSmaOKSPH.AnUc2nIm.hKXuIoYT81Zdl1I0IVa6kpQWaIFdPNW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
