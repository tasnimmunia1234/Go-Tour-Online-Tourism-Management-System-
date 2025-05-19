-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 01, 2024 at 06:17 PM
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
-- Database: `go_tour`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `full_name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `full_name`, `email`, `password`) VALUES
(9, 'munia', 'tasnimmunia1@gmail.com', '$2y$10$Ee2h2lu8lKwOOcSFoKrDWO5/57p6L3/2/.WHu0/gHCbeIX4YT.a2a'),
(13, 'Admin', 'admin@gmail.com', '$2y$10$bwC7h.O1cQrfyvU6o4so9eH43WBd5fywdBC5zzipdavBioPFrlF4e');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `BookingId` int(11) NOT NULL,
  `PackageId` int(11) DEFAULT NULL,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Phone` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `address` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `CancelledBy` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `msg` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `regDate` timestamp NULL DEFAULT current_timestamp(),
  `customer` int(255) NOT NULL,
  `confirmtime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`BookingId`, `PackageId`, `name`, `email`, `Phone`, `address`, `status`, `CancelledBy`, `msg`, `payment_method`, `regDate`, `customer`, `confirmtime`) VALUES
(108, 191, 'tasmin', 'tasnimmunia1@gmail.com', '01853432018', 'Dhaka', 1, NULL, 'I want best service ', 'Credit Card', '2024-10-23 16:39:25', 3, '2024-10-23 12:39:25'),
(112, 183, 'tasmin', 'tasnimmunia1@gmail.com', '01853432018', 'Dhaka', 1, NULL, 'I want best service ', 'Bkash', '2024-10-23 16:49:17', 2, '2024-10-23 12:57:31'),
(113, 168, 'tasmin', 'tasnimmunia1@gmail.com', '01853432018', 'sirajganj', 1, NULL, 'I want best service ', 'Bkash', '2024-10-24 08:54:40', 2, '2024-10-27 10:57:24'),
(114, 175, 'tasmin', 'tasnimmunia1@gmail.com', '01853432018', 'Dhaka', 1, NULL, 'I want best service ', 'Credit Card', '2024-10-24 10:16:50', 2, '2024-10-27 14:34:49'),
(115, 175, 'Aurna', 'aurna@gmail.com', '01853432018', 'Dhaka', 1, NULL, 'I want best service ', 'Bkash', '2024-10-25 20:14:15', 2, '2024-10-27 14:34:46'),
(116, 175, 'Aurna', 'aurna@gmail.com', '01853432018', 'Mowchak, 23 no house', 1, NULL, 'I want best service ', 'Credit Card', '2024-10-25 21:32:08', 2, '2024-10-27 14:34:43'),
(117, 188, 'tasmin', 'tasnimmunia1@gmail.com', '01853432018', 'Mowchak, 23 no house', 1, NULL, 'I want best service ', 'Bkash', '2024-10-27 15:50:01', 2, '2024-10-27 14:34:39'),
(118, 184, 'Tasmin', 'tasnimmunia1@gmail.com', '01853432018', 'Mowchak, 23 no house', 1, NULL, 'I want best service ', 'Bkash', '2024-11-22 13:35:07', 2, '2024-11-22 08:40:34'),
(119, 205, 'Tasmin', 'tasnimmunia1@gmail.com', '01853432018', 'sirajganj', 2, 'u', 'I want best service ', 'Bkash', '2024-11-23 09:55:07', 2, '2024-11-23 09:56:15'),
(120, 184, 'Tasmin', 'tasnimmunia1@gmail.com', '01853432018', 'sirajganj', 1, NULL, 'I want best service ', 'Bkash', '2024-11-23 19:37:28', 2, '2024-11-23 14:38:03'),
(121, 190, 'Tasmin', 'tasnimmunia1@gmail.com', '01853432013', 'Dhaka', 1, NULL, 'I want best service ', 'Rocket', '2024-11-23 19:38:54', 1, '2024-11-23 14:39:27'),
(122, 205, 'Tasmin', 'tasnimmunia1@gmail.com', '01853432018', 'Dhaka', 1, NULL, 'I want best service ', 'Rocket', '2024-11-23 19:59:39', 1, '2024-11-23 15:00:21'),
(123, 198, 'Tasmin', 'tasnimmunia1@gmail.com', '01853432018', 'sirajganj', 2, 'a', '', 'Bkash', '2024-11-27 14:23:17', 1, '2024-11-30 14:10:32'),
(124, 190, 'Tasmin', 'tasnimmunia1@gmail.com', '01853432018', 'Mowchak, 23 no house', 1, NULL, '', 'Credit Card', '2024-11-30 14:09:02', 1, '2024-11-30 09:10:37'),
(125, 197, 'Tasmin', 'tasnimmunia1@gmail.com', '01853432018', 'sirajganj', 0, NULL, 'I want best service ', 'Bkash', '2024-11-30 18:59:03', 1, '2024-11-30 18:59:03');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `name`, `image`) VALUES
(9, 'Dhaka', 'pic14.jpeg'),
(12, 'dhaka', 'pic1.png'),
(13, 'aaaaa', 'pic10.png'),
(14, 'Bandorban', 'pic6.png'),
(18, 'Bandorban', 'bandorban2.jpeg'),
(19, 'Kashmir', 'kasmir.png'),
(20, 'Kolkata', 'kalkata2.png'),
(21, 'Darjeeling', 'darjeling2.png'),
(22, 'Sylhet', 'pic9.png'),
(23, 'Sreemangal', 'sreemangal2.png'),
(24, 'Hawor', 'rony16.jpeg'),
(25, 'Tangua Haore', 'rony8.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `massage`
--

CREATE TABLE `massage` (
  `msg_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `masg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `massage`
--

INSERT INTO `massage` (`msg_id`, `name`, `email`, `masg`) VALUES
(59, 'tasmin', 'tasnimmunia1234@gmail.com', 'i am munia'),
(66, 'Tasmin', 'tasnimmunia1@gmail.com', 'i face some problem'),
(67, 'Tasmin', 'tasnimmunia1@gmail.com', 'i face some problem'),
(68, 'tasmin', 'tasnimmunia1@gmail.com', 'ss'),
(106, 'tasmin', 'tasnimmunia1@gmail.com', 'kim'),
(109, 'tasmin', 'tasnimmunia1@gmail.com', 'kim'),
(110, 'tasmin', 'tasnimmunia1@gmail.com', 'kim'),
(111, 'Aurna', 'aurna@gmail.com', 'slkskd'),
(112, 'tasmin', 'tasnimmunia1@gmail.com', 'sssss'),
(113, 'Tasmin', 'tasnimmunia1@gmail.com', 'muniasd');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `pak_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `offer_pac` mediumtext NOT NULL,
  `category` varchar(255) NOT NULL,
  `discount` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`pak_id`, `name`, `price`, `image`, `msg`, `img`, `offer_pac`, `category`, `discount`) VALUES
(168, 'bandorban', '8000', 'bandorban4.jpeg', '3 Days & 2 Night Bandorban Couple Package(Start at 1 January )', 'bandorbann7.jpeg', '3 Days & 2 Nights Bandarban Itinerary:  Day 1: Arrival in Bandarban, visit Nilachal and Meghla Tourist Complex, enjoy panoramic views of the hill town. Day 2: Trek to the stunning Nilgiri hills and explore Chimbuk Hill, visit Shoilo Propat Waterfall, and enjoy local cuisine. Day 3: Early morning boat ride on Sangu River, explore local markets, and departure with unforgettable memories.', 'Couple package', 8600),
(173, 'Kashmir', '30000', 'kashmir2.png', 'Srinagar 4 Nights (1 Night @ House Boat) + Pahalgam 2 Night(Start in 1 January )', 'kashmir4.png', 'Explore Kashmir in 6 Day\'s.Day 1: Arrival in Srinagar. Enjoy a Shikara ride on Dal Lake and stay overnight in a traditional Houseboat. Day 2: Explore Srinagar’s Mughal Gardens (Nishat Bagh, Shalimar Bagh), visit Shankaracharya Temple. Day 3: Full-day excursion to Gulmarg, enjoy the gondola ride and snow activities. Return to Srinagar. Day 4: Drive to Pahalgam. Visit Betaab Valley, Aru Valley, and stay overnight in Pahalgam. Day 5: Enjoy the scenic beauty of Pahalgam. Return to Srinagar for departure.', 'International', 33000),
(175, 'Vietnam & Cambodia', '60000', 'vietnam.png', '2 Nights Saigon + 3 Nights Phnom Penh  Start: 30th December   2024', 'vietnam2.png', 'Explore Vietnam & Cambodia in 5 Day\'s.  2 Nights in Saigon + 3 Nights in Phnom Penh Itinerary:  Day 1: Arrival in Saigon – Explore the vibrant city with visits to Ben Thanh Market and a scenic evening at the Saigon River.  Day 2: Discover Saigon – Visit the War Remnants Museum, Notre-Dame Cathedral, and take a traditional Vietnamese cooking class.  Day 3: Travel to Phnom Penh – Arrive in Phnom Penh, relax with a sunset cruise along the Mekong River.  Day 4: Phnom Penh City Tour – Explore the Royal Palace, Silver Pagoda, and the harrowing history at Tuol Sleng Genocide Museum.  Day 5: Mekong Island & Silk Weaving – Visit the local villages, learn about Cambodian silk weaving, and enjoy a cultural dinner.', 'Couple package', 64000),
(184, 'Bandorban', '3800', 'pic33.jpeg', '2 December 2 Days & 1 Night Bandorban Jum House', 'pic34.jpeg', 'This is an all-inclusive package 1 person for 2 days (if you want you can stay more days bill will be added). Meet our staff at Arambagh Bus Counter At 7.30 pm on your journey day. Start For Bandorba at 8.00 pm, Our staff will help you to board the bus. at Bandorban we stay Bottom Hill Palace Hotel.1st day we going for hill tacking and reach our destination jum house . We stay all night in jum house and eating their traditional food.After 1 night and 2 day stay their.', 'populer package', 3800),
(188, 'Kashmir', '20000', 'kashmir2.png', 'Explore Kashmir in 1 January to 3 January ', 'kasmir.png', ' Day 1: Arrive in Srinagar, explore the stunning Dal Lake with a Shikara ride, visit Mughal Gardens, and stroll through the vibrant local markets. Overnight stay on a houseboat or hotel.  Day 2: Head to Gulmarg for a scenic day of sightseeing or skiing (seasonal), take a Gondola ride for breathtaking mountain views, then return to Srinagar for departure.', 'International', 22000),
(190, 'Saint Martin', '5000', 'sent1.png', 'Explore Our Saint Martin in 1 Day\'s 25 December ', 'sent4.png', 'This is an all-inclusive package 1 person for 1 days (if you want you can stay more days bill will be added). Meet our staff at Arambagh Bus Counter At 7.30 pm on your journey day. Start For Teknaf at 8.00 pm, Our staff will help you to board the bus.Then 6 AM we board for set martin ship, at Saint Martin island staying at Bottom Hill Palace Hotel.', 'populer package', 5000),
(192, 'Sreemangal', '4000', 'sreemangal2.png', 'Explore Sreemangal in 2 Day\'s. (1 January to 3 January )', 'sreemangal3.png', 'Meet our staff at Arambagh Bus Counter At 7.30 pm on your journey day.Start For Sreemangal at 8.00 pm, Our staff will help you to board the bus. 1st day we explore sreemangal tea garden. 2nd day we going for tracking.', 'bangladeshi package', 4000),
(194, 'Kashmir ', '60000', 'kasmir.png', 'Couple Offer For Kashmir Tour in 26 December to 29 December ', 'kashmir3.png', 'Meet our staff at Airport At 7.30 pm on your journey day. After reaching Kashmir  Rejuvenate in the serene valleys of heavenly Kashmir on your tour. Visit beautiful attractions like Sonmarg and experience a thrilling Gondola ride. Tour the mesmerising Betab Valley and go sightseeing in Srinagar with your loved one.', 'Couple package', 60000),
(195, 'Tangua Haore', '6000', 'hawor4.jpeg', ' Explore Tangua Haore in 23 December to 26 December .', 'rony30.jpeg', 'Meet our staff at Arambagh Bus Counter At 7.30 pm on your journey day.Make your next trip memorable with the enchanting beauty of Tangua Haore! Float in the midst of nature in undisturbed peace by booking our houseboat. Enjoy spectacular sunset views over the vast waters of Haor, spend leisure time with loved ones, and bask in the starlit blue of the night.', 'populer package', 6000),
(197, 'Cox\'s Bazar', '6000', 'pic28.jpeg', 'Cox’s Bazar Tour Package 2 January to 4 January ', 'pic3.png', ' Embark on a captivating journey through the wonder of Cox\'s Bazar with the Cox’s Bazar Tour Package, spanning 3 days and 2 nights. On the first day, explore the underworld and its magnificent creatures with the large underwater aquarium Radiant Fish World, which is the first live fish aquarium in Bangladesh. After a comfortable night\'s stay, day two promises an entire day of nature retreat starting with the scenic beauty of Himchari on the longest Marine Drive road in the world with breathtaking views of sea and hills to finally ending the trip with the calming breeze of Teknaf Jetty. A relaxing long drive around Marine Drive makes the perfect day out . With reserved transportation ensuring seamless travel, this tour offers an ideal blend of adventure and relaxation, leaving you with unforgettable memories of the World\'s Longest sea beach and its surrounding natural beauty.', 'bangladeshi package', 6000),
(198, 'Sundarbans', '12000', 'sundrban2.png', 'Explore Sundarba in 26 December to 29 Decmber', 'sundrban.png', 'Embark on a captivating 3-day, 2-night journey into the mesmerizing beauty of the Sundarbans, the world\'s largest mangrove forest. Luxury vessel, MV The Crown, ensures both safety and indulgence as you explore this natural wonder. Encounter diverse wildlife, from the iconic Royal Bengal tigers to rare estuarine crocodiles and Ganges River dolphins. Sail through tidal waterways, visiting Herbaria, Kochikhali, Dimer Char, Katka, and Karamjal. Indulge in delicious full-board meals while immersing yourself in the Sundarbans\' allure. This is your gateway to a unique Bangladeshi treasure.', 'bangladeshi package', 13900),
(199, 'Rangamati', '8500', 'pic1.png', 'Explore The Royal Adventurer of Kaptai 2 Day\'s(10 December to 12 December)', 'rony12.jpeg', 'The Royal Adventurer is a newly built houseboat in Rangamati. This boat was completely built on the pattern of Kerala houseboats. One of the major attractions of Rangamati is the ', 'bangladeshi package', 9500),
(200, 'Rangamati', '9500', 'rony12.jpeg', 'Exclusive Offer For 25 December  Explore Rangamati in 3 Days', 'rony19.jpeg', 'The Royal Adventurer is a newly built houseboat in Rangamati. This boat was completely built on the pattern of Kerala houseboats. One of the major attractions of Rangamati is the ', 'bangladeshi package', 10500),
(201, 'Rangamati', '10000', 'pic1.png', 'Explore Rangamati Boating  Tour(29 December  to 31 December )', 'rony12.jpeg', 'The Royal Adventurer is a newly built houseboat in Rangamati. This boat was completely built on the pattern of Kerala houseboats. One of the major attractions of Rangamati is the ', 'Couple package', 10000),
(202, 'Sundarban', '15000', 'pic20.jpeg', 'Explore Sundarban in 4-day, 3-night,Start in 3 January ', 'sundrban2.png', ' Embark on a captivating 4-day, 3-night journey into the mesmerizing beauty of the Sundarbans, the world\'s largest mangrove forest. Luxury vessel, MV the river cruise, ensures both safety and indulgence as you explore this natural wonder. Encounter diverse wildlife, from the iconic Royal Bengal tigers to rare estuarine crocodiles and Ganges River dolphins. Sail through tidal waterways, visiting Herbaria, Kochikhali, Dimer Char, Katka, and Karamjal. Indulge in delicious full-board meals while immersing yourself in the Sundarbans\' allure. This is your gateway to a unique Bangladeshi treasure.', 'bangladeshi package', 17000),
(203, 'Sundarban', '15500', 'sundrban.png', 'Explore Sudarban in 4-day, 3-night(Start in 12 December )', 'pic19.jpeg', ' Embark on a captivating 4-day, 3-night journey into the mesmerizing beauty of the Sundarbans, the world\'s largest mangrove forest. Luxury vessel, MV the river cruise, ensures both safety and indulgence as you explore this natural wonder. Encounter diverse wildlife, from the iconic Royal Bengal tigers to rare estuarine crocodiles and Ganges River dolphins. Sail through tidal waterways, visiting Herbaria, Kochikhali, Dimer Char, Katka, and Karamjal. Indulge in delicious full-board meals while immersing yourself in the Sundarbans\' allure. This is your gateway to a unique Bangladeshi treasure.', 'populer package', 16000),
(204, 'Bandorban', '7000', 'bandorban1.jpeg', '  Explore Bandorban in 22 December to 25 December ', 'bandorban10.jpeg', ' Enjoy a day among the clouds with a tour through beautiful Bandarban. Witness the serene view from hilltops as this tour takes you through Nilgiri, Nilachol, Chimbuk, and Meghla. Enjoy the natural beauty of Shoilo Propat waterfall along your journey. Price will be the lowest for the maximum number of travelers', 'bangladeshi package', 7000),
(205, 'Bandorban', '4000', 'bandorban3.jpeg', 'Explore Bandorban in 1 January to 3 January ', 'bandorban1.jpeg', ' Enjoy a day among the clouds with a tour through beautiful Bandarban. Witness the serene view from hilltops as this tour takes you through Nilgiri, Nilachol, Chimbuk, and Meghla. Enjoy the natural beauty of Shoilo Propat waterfall along your journey. Price will be the lowest for the maximum number of travelers', 'populer package', 5000),
(206, 'Sreemangal', '10000', 'sreemangal3.png', 'Explore Sreemangal in 4 December to 6 December ', 'sreemangal.png', 'The town of Sreemangal can be found in the Moulvibazar district of the Sylhet division. Upazilas are administrative divisions, and Sreemangal is one of them. The tea garden is the main attraction. It rains here constantly. Green trees are nature\'s way of decorating sreemangal. The beauty of its natural landscape is undeniable. This helps the eyes relax. Explore that location : 1.Visit Lawachara National Park , 2.Experience Exciting Boat Ride on Baikka Beel , 3.Experience the Madhobpur Lake and Tea Estate, 4.Special Tea Picking experience in Monipuri style, 5.Monipuri Exotic lunch with culture and Lifestyle.', 'bangladeshi package', 14000),
(207, 'Kashmir', '30000', 'kashmir3.png', 'Explore Kashmir in 3 Days (11 December to 14 December )', 'kashmir2.png', 'Meet our staff at Airport At 7.30 pm on your journey day.... 1st day we explore full Kashmir city & local market .. 2nd day after break-fast we going Places to visit in Srinagar .. And stay hear 1 day to explore Dal Lake. Last day we visit Indira Gandhi Memorial Tulip Garden', 'Couple package', 33000),
(208, 'Shankaracharya Hill Trek Kashmir ', '24000', 'kashmir4.png', 'Explore Shankaracharya Hill Trek Kashmir  point in 11 December  to 14 December ', 'kashmir5.png', 'Meet our staff at Airport At 7.30 pm on your journey day. This trek is going to be an amazing experience for you as you climb up the hill and see the beautiful landscape and views of the entire Srinagar and Dal Lake. If you are planning for a short and easy 2-day trek in Kashmir, you can consider this one.', 'International', 26000),
(209, 'Bali , Indonesia', '23000', 'bali.png', 'Explore Bali Zoo and Seawalker tour in 3  Day\'s(10 December  to 13 December )', 'bali4.png', 'Meet our staff at Airport At 7.30 pm on your journey day.. 1st day Arrive at Ngurah Rai International Airport. Welcome by our representative and transfer to the hotel. Check-in and leisure time to recover from the journey. Explore the local area. The next day we are going Bali Zoo Park Tour  is a Bali Activities Tour to enjoy visiting private zoo own by Balinese with 130 staff and works together as a family, the zoo set in 12 acres lush tropical garden and flowers surrounded.  Very up market Bali Zoo Park with 100s quality build habitats including petting area for animals, walk through bird aviaries, Gibbon Islands, and Komodo Dragon cage and latest open range for african lions den. Day 3 we will Bali Seawalker Tour is a Bali Activities Tour Packages by allows everyone to enjoy marine life, with minimum equipment and minimum fuss! Seawalker is a soft dive system, which means you only use our unique Seawalker helmet design without the need for a dive tank.', 'International', 23000),
(210, 'Azerbaijan ', '70000', 'azarbaijan3.png', 'Baku City Breaks  in Azerbaijan 4 Days 3 Nights(5 December  to 9 December )', 'azarbaijan.png', 'Baku Tour will take you to the heart of beautiful European and Asian Country Azerbaijan: Meet our staff at Airport At 7.30 pm on your journey day.... Day-1.....Arrive at Heydar Aliyev International Airport. Welcome by our representative and transfer to the hotel. Check-in and leisure time to recover from the journey. Explore the local area.Day 2: Guided tour of the Old City, visit the Maiden Tower, and Shirvanshah’s Palace. Evening at leisure. Day 3: Day trip to Gobustan National Park to see ancient petroglyphs and mud volcanoes. Day 4: Free time for shopping, explore the modern architecture of Heydar Aliyev Center, and departure.', 'Couple package', 50000),
(211, 'Wonders Of Azerbaijan', '42000', 'azarbaijan3.png', 'Explore Wonders Of Azerbaijan 3 Day\'s (4 December  to 8 December )', 'baku.png', 'Baku Tour will take you to the heart of beautiful European and Asian Country Azerbaijan: Meet our staff at Airport At 7.30 pm on your journey day..Arrive at Heydar Aliyev International Airport. Welcome by our representative and transfer to the hotel.Day 1: Baku Exploration Discover the vibrant capital of Baku, from the historic Old City (Icherisheher) to the modern Flame Towers. Stroll along the Caspian Sea promenade and enjoy panoramic city views from Highland Park.  Day 2: Gobustan and Mud Volcanoes Visit Gobustan National Park, home to ancient petroglyphs and stunning landscapes. Experience the unique natural phenomenon of bubbling mud volcanoes nearby.  Day 3: Sheki and Lahij Villages Venture into the Caucasus Mountains, exploring the charming town of Sheki with its historic Sheki Khan\'s Palace. Stop by Lahij, a traditional craft village famous for copperware and cobblestone streets.', 'International', 45000),
(212, 'Jum House', '4000', 'pic18.jpeg', '2 December 2 Days & 1 Night Bandorban  Jum House BDT 4000  Package.  ', 'pic26.jpeg', 'This is an all-inclusive package 1 person for 2 days (if you want you can stay more days bill will be added). Meet our staff at Arambagh Bus Counter At 7.30 pm on your journey day. Start For Bandorba at 8.00 pm, Our staff will help you to board the bus. at Bandorban we stay Bottom Hill Palace Hotel.1st day we going for hill tacking and reach our destination jum house . We stay all night in jum house and eating their traditional food.After 1 night and 2 day stay their.', 'bangladeshi package', 4500);

-- --------------------------------------------------------

--
-- Table structure for table `pay`
--

CREATE TABLE `pay` (
  `payId` int(11) NOT NULL,
  `BookingId` int(11) DEFAULT NULL,
  `NameOnCard` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `CardNumber` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ExpMonth` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ExpYear` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `CVV` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `City` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `State1` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `BookingTime` timestamp NULL DEFAULT current_timestamp(),
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pay`
--

INSERT INTO `pay` (`payId`, `BookingId`, `NameOnCard`, `CardNumber`, `ExpMonth`, `ExpYear`, `CVV`, `City`, `State1`, `BookingTime`, `address`) VALUES
(112, 106, 'Munia', '0967765788876549', '9', '2025', '232', 'sirajgang', 'as', '2024-10-21 21:33:37', 'sirajganj'),
(113, 108, 'Muia', '9875829486729243', '5', '2026', '442', 'Dhaka', 'jd', '2024-10-23 16:34:04', 'Mowchak, 23 no house'),
(114, 116, 'munia', '2213344445553333', '2', '2025', '223', 'Dhaka', 'as', '2024-10-25 21:56:20', 'Mowchak, 23 no house'),
(115, 124, 'munia', '1221233334441111', '12', '2025', '987', 'sirajgang', 'as', '2024-11-30 14:09:57', 'Mowchak, 23 no house');

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `review_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `user_review` text NOT NULL,
  `datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `review_table`
--

INSERT INTO `review_table` (`review_id`, `user_name`, `user_rating`, `user_review`, `datetime`) VALUES
(9, 'Ami', 4, 'this good', 1726898433),
(10, 'Ami', 4, 'this good', 1726898458),
(11, 'Munia', 5, 'very good', 1727105347),
(12, 'Munia', 3, 'feddd', 1727171236),
(13, 'Munia', 4, 'This is nice package', 1727966713),
(14, 'Munia', 4, 'this is good', 1728061882),
(19, 'Munia', 3, 'kkss', 1729763941);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `RegDate`, `UpdationDate`) VALUES
(13, 'tasmin', 'tasnimmunia@gmail.com', 'm1111111', 'active', '2024-09-30 13:29:53', NULL),
(14, 'Tasmin', 'tasnimmunia1234@gmail.com', 'a1111111', 'active', '2024-09-30 19:18:20', NULL),
(16, 'Tasmin', 'tasnimmunia12@gmail.com', '$2y$10$ZWh9lambXL3tQjHmdnbig.t4d4UKSRvKBY3u7u19uI3oAuov9O7T.', 'active', '2024-09-30 20:00:37', NULL),
(17, 'Tasmin', 'tasnimmunia4@gmail.com', '$2y$10$eyNmM87nCVl9s2NRhkZYduwMB1Ug8lLf5ZKRRHS4TXzZP8.RRnEJ6', 'active', '2024-10-03 18:42:39', '2024-10-06 12:05:21'),
(18, 'Tasmin', 'tasnimmunia1@gmail.com', '$2y$10$UnBcE9v0fM4amPFk2hvDm.s1Yo1mVpY/e7hFs9IqMI6LrzA70UBW2', 'active', '2024-10-04 17:09:25', '2024-11-25 16:52:52'),
(19, 'Tasfia ', 'aurna@gmail.com', '$2y$10$8o76hzMG1HgMJKWhR1TgqOLQyuWlo6n3kL8kiPY.2UsrvgWlVJPX.', 'active', '2024-10-06 11:31:29', '2024-10-26 13:13:23'),
(20, 'Ruma', 'ruma1@gmail.com', '$2y$10$GdLnYG47zOy1v3ZUAzrVO.IqUcp20idtNBsfV9AHgHIKlgBDhe4tm', 'active', '2024-10-06 20:06:53', '2024-10-06 20:41:16'),
(21, 'Samin', 'samin@gmail.com', '$2y$10$5uBe9MWZqZHkMd3vWyrLc.efCEbB1xgfbblTJtGFkeDQqkWg10Ney', 'active', '2024-10-14 07:47:09', NULL),
(22, 'tasmin', 'tasnimmunia11@gmail.com', '$2y$10$WIiXl0KAX1tuwZYyipH5.O1JwMWHf.sjcKvYgGGhgRl7f9Z4GSK3S', 'active', '2024-10-17 10:48:41', NULL),
(28, 'Tasmin Ferdousy', 'tasnimferdousy1234@gmail.com', '$2y$10$lP30ZgJ1wMgsrg6YrERKd./d7Q/d6QU48x69DDdccaRI5q/SRXHVy', 'active', '2024-11-24 16:30:47', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`BookingId`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `massage`
--
ALTER TABLE `massage`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`pak_id`);

--
-- Indexes for table `pay`
--
ALTER TABLE `pay`
  ADD PRIMARY KEY (`payId`);

--
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `BookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `massage`
--
ALTER TABLE `massage`
  MODIFY `msg_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `pak_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT for table `pay`
--
ALTER TABLE `pay`
  MODIFY `payId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
