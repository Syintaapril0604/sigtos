-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2024 at 11:26 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sigtos`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(5, 'Aksesoris'),
(6, 'Hasil Bumi'),
(3, 'Makanan'),
(4, 'Pakaian');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `platform` enum('Instagram','Facebook','Twitter') NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `name`) VALUES
(5, 'Citta'),
(10, 'Donri-Donri'),
(6, 'Ganra'),
(9, 'Lalabata'),
(4, 'Liliriaja'),
(7, 'Lilirilau'),
(3, 'Marioriawa'),
(1, 'Marioriwawo');

-- --------------------------------------------------------

--
-- Table structure for table `maps`
--

CREATE TABLE `maps` (
  `id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `PIRT` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock_status` enum('tersedia','habis') NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `PIRT`, `description`, `price`, `stock_status`, `image_url`, `store_id`) VALUES
(15, 'Nennu-nennu', 3, '73210000203460621', 'Lumeran gula merah', '30000.00', 'tersedia', '../uploads/WhatsApp Image 2024-11-20 at 11.39.53.jpeg', 3),
(16, 'Pipang', 3, '-', 'terbuat dari beras atau beras ketan yang dibalut gula merah', '13000.00', 'tersedia', '../uploads/WhatsApp Image 2024-11-20 at 11.39.54.jpeg', 3),
(17, 'Dadar Gulung', 3, '73110000820200922', 'berupa panekuk kelapa manis yang digulung. ', '30000.00', 'tersedia', '../uploads/WhatsApp Image 2024-11-20 at 11.39.55.jpeg', 3),
(19, 'Thai Alati', 3, '-', 'Kue ini adalah kue buatan saya dengan saya sendiri yang kasih nama', '25000.00', 'tersedia', '../uploads/WhatsApp Image 2024-11-20 at 11.39.55 (1).jpeg', 3),
(20, 'Bolu Cukke Intan', 3, '2057312010055-27', 'Bolu cukke artinya bolu yang dicungkil. Bolu cukke disini sangat recommended untuk kalian para pecinta bolu cukke', '30000.00', 'tersedia', '../uploads/bolcuk intan.png', 5),
(21, 'Pipang Bette', 3, '2117312010117-28', ' Pipang Bette atau Pipang yang digoreng adalah cemilan khas bugis yang selalu ngangenin, dijamin rasanya enak, Sekali coba pasti mau lagi', '15000.00', 'tersedia', '../uploads/pipang batas kotaa.jpeg', 4),
(22, 'Bolu Peca', 3, '--', 'Kuliner ini identik dengan rasanya yang manis dan lumer di mulut.', '30000.00', 'tersedia', '../uploads/bolupeca.jpg', 17),
(23, 'Bolu Cukke', 3, '2057312010061-28', 'Bolu cukke merupakan kue kering khas Bugis, Sulawesi Selatan (Sulsel). Kue ini berbahan dasar tepung beras dan gula pasir yang kental', '30000.00', 'tersedia', '../uploads/bolcuk gula pasir.jpeg', 4),
(24, 'Nennu-nennu', 3, '-', 'Harga terjangku dan yee makkalita e golla na', '13000.00', 'tersedia', '../uploads/nennu-nennu qirana.jpg', 14),
(25, 'Bolu Cukke', 3, '2067312010347-23', 'Kue tradisional bugis dengan gula merah yang sangat terasa serta pada toko kami memiliki pelayanan yang sangat baik', '25000.00', 'tersedia', '../uploads/IMG_20241211_110211.jpg', 19),
(26, 'Dadara Balanda', 3, '-', 'Kue ini memiliki kulit yang tipis dengan beraneka warna dan isian yang manis dan lembut. Rasanya perpaduan antara manisnya gula, gurihnya santan, dan aroma harum telur', '25000.00', 'tersedia', '../uploads/IMG_20241211_113710_001.jpg', 17),
(27, 'Sarabba', 3, '5137312010388-23', 'Minuman tradisional yang terbuat dari campuran jahe, gula merah, dan santan. Sarabba ini memiliki varian rasa diantaranya sarabba orisinil, sarabba telur yang ditambahkan kuning telur, dan sarabba susu yang ditambahkan susu', '35000.00', 'tersedia', '../uploads/IMG_20241211_113535_786.jpg', 17),
(28, 'Tenteng', 3, '-', 'Makanan khas bugis yang terbuat dari gula merah dan kacang tanah. Jajanan ini sering disebut Baje Canggoreng', '24000.00', 'tersedia', '../uploads/IMG_20241211_113529_272.jpg', 17),
(29, 'Kareppe', 3, '-', 'Jajanan khas bugis yang biasanya di sebut keripik', '15000.00', 'tersedia', '../uploads/IMG_20241211_113638_762.jpg', 17),
(30, 'Nennu-nennu Ogi', 3, '-', 'Kue tradisional bugis yang terbuat dari gula merah dengan tekstur krispy dan agak rapuh', '20000.00', 'tersedia', '../uploads/IMG_20241211_113435_205.jpg', 17),
(31, 'Bolu Cukke', 3, '-', 'Kue kering khas bugis yang berbahan dasar gula merah atau gula pasir dan tepung beras', '30000.00', 'tersedia', '../uploads/bumdes bolu.jpg', 17);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `review` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `email`, `review`, `created_at`) VALUES
(3, 'Raihan Fadillah', 'raihan@gmail.com', 'Web ini sangat membantu saya dalam menemukan toko oleh-oleh di Soppeng. Saya sangat senang berkunjung ke toko Oleh-oleh Intan karena produk yang di jual dengan kualitas baik, rasa yang enak dan lezat. Saya akan mencoba berbelanja di toko lain', '2024-12-04 19:16:59'),
(7, 'Anna Novita', 'anna@gmail.com', 'Web yang interaktif dan komunikatif. Saya suka berbelanja produk oleh-oleh di toko nennu-nennu fatimah. karena nennu-nennu yang dijual sangat berbeda rasanya dengan nennu-nennu toko lain. Rasanya lebih khas dan nikmat', '2024-12-04 19:49:41'),
(8, 'Arul', 'arulm@gmail.com', 'Sangat bagus, saya suka\r\n', '2024-12-04 20:01:45');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `description` text DEFAULT NULL,
  `whatsapp_number` varchar(15) DEFAULT NULL,
  `image_url` varchar(255) NOT NULL,
  `kecamatan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id`, `name`, `address`, `latitude`, `longitude`, `description`, `whatsapp_number`, `image_url`, `kecamatan_id`) VALUES
(3, 'Nennu-Nennu Fatimah', 'Laringgi', -4.12301, 119.863, 'Open at, 07.00 a.m - 10.00 p.m', '+6281343910194', 'toko tradisional.jfif', 3),
(4, 'Kedai Oleh-oleh Batas Kota', 'Dusun Kubba', -4.22496, 119.91, 'Open at, 07.00 a.m - 10.00 p.m', '+6285393604365', 'WhatsApp Image 2024-11-20 at 11.36.32.jpeg', 9),
(5, 'Toko Oleh-Oleh Intan', 'Rompegading', -4.32904, 119.91, 'Open at 6.00 am–10.00 pm', '+6285242734065', 'toko intan.jpg', 4),
(6, 'Cemilan Marasa Soppeng', 'Lemba', -4.23152, 119.877, 'Open at, 9.00 am–12.00 am', '+6282374603301', 'camilan marasa.jpg', 9),
(7, 'Toko IDOLA', 'Labessi', -4.4327, 119.946, 'Open at, 08.00 a.m - 10.00pm', '+6282346826003', 'toko idola.jpg', 1),
(8, 'Tape Bugis (Sibuh)', 'Timusu', -4.42495, 119.935, 'Open at, 6.30 am–8.00 pm', '+6285247883373', 'toko sibuh.jpg', 4),
(11, 'Bolu Cukke Anhal', 'Bila', -4.34688, 119.883, 'Komp. Perumahan SMK Muhammadiyah Watansoppeng', '+6281355334124', 'bolu cukke anhal.jpg', 9),
(13, 'Bolo Miscellaneous', 'Timusu', -4.4167, 119.916, 'Open at, 07.00 a.m - 09.00 p.m', '+6285342240733', 'bolu cukke timusu.jpg', 4),
(14, 'Nennu-Nennu Qirana', 'Batu-Batu', -4.14419, 119.895, 'Open 24 hours', '+6282192690883', 'nennu-nennu qirana.jpg', 3),
(17, 'BUMDesa Rompegading', 'Rompegading', -4.40231, 119.928, 'Open at, 07.05–23.00', '+6281243922852', 'BUMdes.jpg', 4),
(18, 'Usaha Rahmah', 'Jennae', -4.39006, 119.946, 'Open at, 06.00 – 23.00', '+6285299372976', 'usaha rahmah.jpg', 4),
(19, 'Toko Oleh-Oleh Hj.Suka', 'Lajoa', -4.40765, 119.945, 'Open at, 07.00 a.m - 11.30 p.m', '+6285299966430', 'IMG_20241211_112755.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('admin') DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `email`, `role`) VALUES
(3, 'admin2', 'admin2', 'admin2', 'syintaapri@gmail.com', 'admin'),
(8, 'syinta', 'syinta', 'Syinta Nur Aprilia', 'syintaapril@gmail.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `maps`
--
ALTER TABLE `maps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `products_ibfk_2` (`store_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kecamatan_id` (`kecamatan_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `maps`
--
ALTER TABLE `maps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `maps`
--
ALTER TABLE `maps`
  ADD CONSTRAINT `maps_ibfk_1` FOREIGN KEY (`store_id`) REFERENCES `toko` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`store_id`) REFERENCES `toko` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `toko`
--
ALTER TABLE `toko`
  ADD CONSTRAINT `toko_ibfk_1` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
