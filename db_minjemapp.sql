-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2020 at 06:27 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_minjemapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `idcar` int(11) NOT NULL,
  `img_car` varchar(128) DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `car_name` varchar(128) DEFAULT NULL,
  `merk` varchar(128) DEFAULT NULL,
  `description` text NOT NULL,
  `no_pol` varchar(15) DEFAULT NULL,
  `colour` varchar(6) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`idcar`, `img_car`, `city`, `car_name`, `merk`, `description`, `no_pol`, `colour`, `price`, `status`) VALUES
(2, 'Honda Brio 2020.png', 2, 'Brio 2020', 'Honda', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid iusto similique accusantium dolor beatae ex velit asperiores id inventore minus.', 'B 5674 QW', 'Kuning', 450000, 0),
(3, 'Honda Civic Type-R.jpg', 2, 'Civic Type-R', 'Honda', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita doloribus ipsa dolores reprehenderit repellendus enim quidem dolorum inventore, quae in nihil.', 'B 4215 AS', 'Merah', 800000, 0),
(4, 'Honda Jazz.jpg', 2, 'Jazz 2020', 'Honda', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem fugit rerum tempora, ipsam consequuntur tempore. Animi reiciendis voluptatem quis sunt expedita error omnis nisi doloremque deserunt rerum eum, dicta distinctio?', 'AD 6334 XW', 'Biru', 450000, 1),
(5, 'Wuling Cortez 1.5L.jpg', 1, 'Wuling Cortez', 'Wuling', '\r\nVoluptate dolore quasi modi facilis quia veniam nihil minus voluptatibus, unde, inventore rerum aut ad impedit cumque quaerat. Necessitatibus nobis illo eligendi, nam dignissimos reprehenderit omnis eius harum. Sit fugit, quas soluta iure non facere!', 'AD 9765 WE', 'Putih', 500000, 0),
(6, 'Honda Mobilio RS.jpg', 2, 'Mobilio RS', 'Honda', 'Eveniet soluta illo obcaecati molestias? Aut id necessitatibus aperiam facilis laboriosam, ipsam repellendus ab asperiores amet quas, obcaecati molestias sapiente ratione veritatis doloribus quisquam, perferendis deleniti odio earum maiores est deserunt placeat.', 'B 0812 QW', 'Kuning', 500000, 0),
(7, 'Honda Civic Hatchback.jpg', 2, 'Civic Hatchback', 'Honda', 'Odio earum maiores est deserunt placeat. Eveniet soluta illo obcaecati molestias? Aut id necessitatibus aperiam facilis asperiores amet quas, obcaecati molestias sapiente ratione veritatis doloribus quisquam, perferendis deleniti.', 'B 6476 HDA', 'Putih', 900000, 0),
(8, 'Wuling Confero 1.5.jpg', 3, 'Confero', 'Wuling', 'Eaque explicabo aperiam, beatae odio sed, ut culpa libero quisquam quas aliquam accusamus cum quod? Veniam ipsum adipisci necessitatibus facilis quam doloribus, eius sapiente.', 'AE 1234 EB', 'COKLAT', 550000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `id_province` int(11) NOT NULL,
  `location_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `id_province`, `location_name`) VALUES
(1, 1, 'Bandara Soekarno Hatta'),
(2, 1, 'Monas'),
(3, 1, 'Ancol'),
(4, 1, 'TMII'),
(5, 2, 'Tugu Muda'),
(6, 2, 'Stasiun Poncol'),
(7, 2, 'Bandara Ahmad Yani'),
(8, 3, 'Bandara Adi Sucipto'),
(9, 3, 'Manahan Solo'),
(10, 4, 'Bandara Juanda'),
(11, 4, 'Tugu Pahlawan'),
(12, 4, 'Stasiun Surabaya Kota'),
(13, 5, 'Bandara I Gusti Ngurah Rai'),
(14, 5, 'Seminyak');

-- --------------------------------------------------------

--
-- Table structure for table `order_transaction`
--

CREATE TABLE `order_transaction` (
  `id` int(11) NOT NULL,
  `email_user` varchar(128) NOT NULL,
  `idcar` int(11) NOT NULL,
  `car_name` varchar(128) NOT NULL,
  `city_id` int(11) NOT NULL,
  `city` varchar(128) NOT NULL,
  `location_pick` int(11) NOT NULL,
  `location_drop` int(11) NOT NULL,
  `datepick` varchar(20) NOT NULL,
  `datedrop` varchar(20) NOT NULL,
  `total_paying` int(11) NOT NULL,
  `status_pay` int(11) NOT NULL,
  `status_rent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_transaction`
--

INSERT INTO `order_transaction` (`id`, `email_user`, `idcar`, `car_name`, `city_id`, `city`, `location_pick`, `location_drop`, `datepick`, `datedrop`, `total_paying`, `status_pay`, `status_rent`) VALUES
(4, 'Deliverama123@gmail.com', 4, 'Jazz 2020', 2, 'Semarang', 7, 5, '06/21/2020', '06/23/2020', 900000, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `id` int(11) NOT NULL,
  `province_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id`, `province_name`) VALUES
(1, 'Jakarta'),
(2, 'Semarang'),
(3, 'Solo'),
(4, 'Surabaya'),
(5, 'Bali');

-- --------------------------------------------------------

--
-- Table structure for table `type_rent`
--

CREATE TABLE `type_rent` (
  `id` int(1) NOT NULL,
  `Nama` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_rent`
--

INSERT INTO `type_rent` (`id`, `Nama`) VALUES
(1, 'Mobil'),
(2, 'Motor');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `no_telp` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `no_telp`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(4, 'Fauzan Aji Prayoga', 'fauzanjr1@gmail.com', '+6289647664464', 'Orang2.png', '$2y$10$7KBJrKilaggf5G/26isWnePHg.uGWYu4EmOCJC1UwFGsXE6KGhfyC', 2, 1, 1592150047),
(6, 'Fauzan Dncc', '111201811330@mhs.dinus.ac.id', '+6289647664464', 'myprofile.jpg', '$2y$10$Rv2KJn93lBfE0xV0P0OL1.zV2itIHPH3ak1/KVkgsmUBmyIib0pHi', 2, 0, 1592194553),
(7, 'Admin Minjem', 'admin@gmail.com', '+6286485234896', 'myprofile.jpg', '$2y$10$7v7FpLhz/mbQBwyJsXBZuORukCFhE/jPGrEjcO.tBBE1ZrOdZJzQq', 1, 1, 1592724074),
(12, 'Amaliza Delivera', 'Deliverama123@gmail.com', '+6289786654123', 'Orang12.png', '$2y$10$hd5fRMjI8UyZfOJbrujEZOfBYMgVyBcCdFVjKd1JAloKVnnOBZ7xa', 2, 1, 1592752562);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`idcar`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_transaction`
--
ALTER TABLE `order_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_rent`
--
ALTER TABLE `type_rent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `idcar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_transaction`
--
ALTER TABLE `order_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
