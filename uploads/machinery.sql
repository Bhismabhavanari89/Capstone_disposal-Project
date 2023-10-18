-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2023 at 04:23 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agriculture`
--

-- --------------------------------------------------------

--
-- Table structure for table `machinery`
--

CREATE TABLE `machinery` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `maintext` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `machinery`
--

INSERT INTO `machinery` (`id`, `name`, `maintext`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Rotavator ', 'Rotavator is mainly used to mix and crush the soil before planting and also helps to remove weeds. I', 'Rotavator is an agriculture machine designed for preparing land for planting seeds. It also provides the benefits of seed preparation and saves 30 to 35% time. In addition, it offers higher quality work and saves operational costs. The rotavator comes with wheels that operate with the blades behind. As we know the rotavator is a tractor mounted machine with a 3-point linkage system of tractor of 26 KW. Tractor Pto HP provides its power to the tilling unit. All rotavators performs almost the same function, but different models provide different capabilities. ', 'https://blogger.googleusercontent.com/img/a/AVvXsEjGdIdBxuiP_cshbmnww2cPFYm25cWL8mw0pCy7wlMwZbV1OUx7Z5gD48fGxU5XInkNZnIoJ8s4q05boo5PIBm9T4Ot5sibLfy3SHhwX61xgySarS1h8FyN6pHJJ0DJs31KMS97HUlwQ5uw1a9CEqhyfDE4s_T9SioCLvsqVYzKg5y0lk0VY-34R-_Z=s16000', '2023-02-14 15:05:36', '2023-02-14 15:05:36'),
(2, 'Cultivator ', 'Cultivators, a popular farm machinery invented in the mid 19th century, which the horses pulled.', 'Cultivator is a popular agricultural machinery with short, narrow, slightly curved, pointed steel pieces typical shovels. It also helps to dig into the soil in the same proportion. Its number of shovels used in a single mount depends on the soil types and crops. ', 'http://www.tataagrico.com/wp-content/uploads/2018/08/cultivator.jpg', '2023-02-14 15:11:30', '2023-02-14 15:11:30'),
(3, 'Digger', 'Digger is used to dig pits for plantation and farm fencing during land preparation. It can dig holes', 'Post hole digger is one of the farm tools and equipment that helps to dig the pits for plantation, land preparation and farm fencing purposes. It is ideal for small farms or orchards such as mango, coconut, pomegranate, lemon, etc. Digger is best suitable for all types of soils. ', 'http://5.imimg.com/data5/SELLER/Default/2022/10/MX/KD/VI/3224679/pole-erection-machine-500x500.jpeg', '2023-02-14 15:11:30', '2023-02-14 15:11:30'),
(4, 'Sprayer', 'Boom sprayer is the best sprayer farm machinery and most ideal for the same amount of spray over the', 'Sprayer is mainly used to apply fertilisers, herbicides and pesticides on the crops. It can be the tractor mounted, which is fixed onto the tractor. A farmer can use the hydraulic motor attached pump sprayer for the farms also.Sprayers are more effective and provide maximum work in minimum time.It offers many different variations in spraying to protect crops.', 'https://5.imimg.com/data5/CX/QA/MY-2599588/sprayer-machine-500x500.jpg', '2023-02-14 15:15:37', '2023-02-14 15:15:37'),
(5, 'Plough', 'Plough is used to turn and break the soil and help control weeds and remove the crop surplus. It is ', 'The main purpose of plough is to turn the uppermost soil and bring fresh nutrients to the surface at the time of sowing seeds. Plough is also used for cutting the trenches. Its main task is turning the soil from the upper 12 to 25 centimetres, where the plant roots grow.Plough helps to loosen the soil and improve air circulation. ', 'https://i.pinimg.com/originals/0f/a4/88/0fa4886199e5425fd92c3c564a4babe6.jpg', '2023-02-14 15:15:37', '2023-02-14 15:15:37'),
(6, 'Tractor Combine Harvester', 'Tractor Combine Harvester performs the harvesting, which includes reaping and threshing and helps to', 'The tractor combine harvester is a very popular farm machinery designed for efficient harvesting of huge quantities of grain. If you are planning to buy a modern combine harvester, you can cut more than 40 feet wide of a row of grass. Tractor combine harvesting comes from combining three major harvest functions such as reaping, threshing and winnowing.', 'https://www.balkarcombine.com/images/banner1.jpg', '2023-02-14 15:18:29', '2023-02-14 15:18:29'),
(7, ' Seed Cum Fertilizer Dril', 'Seed Cum Fertiliser Drill is specially used to sow the seeds. It is a tractor drawn attachment, whic', 'Seed Cum Fertiliser Drill keeps the seeds and fertilizer in separate portions. It works as an open furrow at uniform depths. In addition, we use it to deposit the fertilizer and seed in the furrows in a suitable and acceptable pattern. Seed Cum Fertiliser Drill supportable to cover the fertilizer and seed and compact the soil around the seed.', 'https://www.tractorjunction.com/assets/images/images/implementTractor/seed-cum-fertilizer-drill5.jpg', '2023-02-14 15:18:29', '2023-02-14 15:18:29'),
(8, 'Baler', 'Baler is a tractor drawn attachment, used to make the hay and flax straws from crops surplus. ', 'A hay baler or baler is a piece of agricultural machinery. We can use it to compress a cut and raked crop (such as flax straw cotton, hay, salt marsh hay, or silage) into compact Baler that are compatible with transporting and storing.Baler is helpful in lowering your waste costs.', 'https://www.shaktimanagro.com/wp-content/uploads/2020/05/square-baler-2-865x500.jpg', '2023-02-14 15:21:55', '2023-02-14 15:21:55'),
(9, ' Thresher', 'Thresher is an equipment which is mainly used to separate the seeds from chaff, husks and straws. ', 'A thresher or threshing machine is a piece of agricultural equipment that is helpful in Thresher grain. In addition, it removes the seeds from the husks and stalks. To do this beats the plant and drops the seed.Thresher is helpful in less physical labour and more efficiency (amount of grain thresher per amount of time).', 'https://www.paddythresher.com/wp-content/uploads/2022/06/Tokri-Multicrop-Thresher-Machine.png', '2023-02-14 15:21:55', '2023-02-14 15:21:55'),
(10, 'Disk harrow ', 'Disk harrow is a farming implement and tractor drawn attachment used to prepare the soil for plantin', 'A disc harrow is helpful in cutting edges. This harrow is a row of concave metal discs, which can be set at an oblique angle. It is a farm implement; you can use it till the soil where crops are to planted. Disk harrow is also usable in chopping up unwanted weeds or crop residue.Disk Harrow breaks up clumps in the soil and surface crust.It also improves surface uniformity and soil aeration.', 'https://www.farming-machine.com/wp-content/uploads/2020/04/1bzd-series-disc-harrow1.jpg', '2023-02-14 15:23:31', '2023-02-14 15:23:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `machinery`
--
ALTER TABLE `machinery`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `machinery`
--
ALTER TABLE `machinery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
