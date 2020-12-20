-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2020 at 02:37 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`, `admin_name`) VALUES
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `bill_id` int(10) UNSIGNED NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'tổng tiền',
  `payment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tinhtrang` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`bill_id`, `id_customer`, `date_order`, `total`, `payment`, `note`, `tinhtrang`) VALUES
(14, 14, '2017-03-23', 150000, 'COD', 'k', 0),
(13, 13, '2017-03-21', 400000, 'ATM', 'Vui lòng giao hàng trước 5h', 0),
(12, 12, '2017-03-21', 420000, 'COD', 'Vui lòng chuyển đúng hạn', 0),
(11, 11, '2017-03-21', 400000, 'COD', 'không chú', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'số lượng',
  `unit_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `id_bill`, `id_product`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(17, 14, 1, 1, 150000, '2020-12-20 01:08:21', '2017-03-23 04:46:05'),
(16, 13, 60, 1, 200000, '2017-03-21 07:29:31', '2017-03-21 07:29:31'),
(15, 13, 59, 1, 200000, '2017-03-21 07:29:31', '2017-03-21 07:29:31'),
(14, 12, 60, 2, 200000, '2017-03-21 07:20:07', '2017-03-21 07:20:07'),
(13, 12, 65, 1, 20000, '2020-12-20 01:13:03', '2017-03-21 07:20:07'),
(12, 11, 61, 1, 120000, '2017-03-21 07:16:09', '2017-03-21 07:16:09'),
(11, 11, 58, 2, 200000, '2020-12-20 01:11:26', '2017-03-21 07:16:09');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `gender`, `email`, `address`, `phone_number`, `note`, `created_at`, `updated_at`) VALUES
(15, 'Lan', 'Nữ', 'huongnguyen@gmail.com', 'e', 'e', 'e', '2020-12-19 03:51:27', '2017-03-24 07:14:32'),
(14, 'Tài', 'nam', 'huongnguyen@gmail.com', 'Lê thị riêng', '1234567890', 'k', '2020-12-19 04:22:58', '2017-03-23 04:46:05'),
(13, 'Hương Hương', 'Nữ', 'huongnguyenak96@gmail.com', 'Lê Thị Riêng, Quận 1', '23456789', 'Vui lòng giao hàng trước 5h', '2017-03-21 07:29:31', '2017-03-21 07:29:31'),
(12, 'Khoa phạm', 'Nam', 'khoapham@gmail.com', 'Lê thị riêng', '1234567890', 'Vui lòng chuyển đúng hạn', '2017-03-21 07:20:07', '2017-03-21 07:20:07'),
(11, 'Hương Hương', 'Nữ', 'huongnguyenak96@gmail.com', 'Lê Thị Riêng, Quận 1', '234567890-', 'không chú', '2017-03-21 07:16:09', '2017-03-21 07:16:09');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_type` int(10) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `id_type`, `description`, `unit_price`, `image`, `new`) VALUES
(1, 'Bánh Crepe Sầu riêng', 5, 'Bánh crepe sầu riêng nhà làm', 150000, '1430967449-pancake-sau-rieng-6.jpg', 1),
(3, 'Bánh Crepe Sầu riêng - Chuối', 5, '', 150000, 'crepe-chuoi.jpg', 0),
(4, 'Bánh Crepe Đào', 5, '', 160000, 'crepe-dao.jpg', 0),
(5, 'Bánh Crepe Dâu', 5, '', 160000, 'crepedau.jpg', 0),
(6, 'Bánh Crepe Pháp', 5, '', 200000, 'crepe-phap.jpg', 0),
(7, 'Bánh Crepe Táo', 5, '', 160000, 'crepe-tao.jpg', 1),
(8, 'Bánh Crepe Trà xanh', 5, '', 160000, 'crepe-traxanh.jpg', 0),
(9, 'Bánh Crepe Sầu riêng và Dứa', 5, '', 160000, 'saurieng-dua.jpg', 0),
(11, 'Bánh Gato Trái cây Việt Quất', 3, '', 250000, '544bc48782741.png', 0),
(12, 'Bánh rau câu trái cây', 3, '', 200000, '210215-banh-sinh-nhat-rau-cau-body- (6).jpg', 0),
(13, 'Bánh kem Chocolate Dâu', 3, '', 300000, 'banh kem sinh nhat.jpg', 1),
(14, 'Bánh kem Dâu III', 3, '', 300000, 'Banh-kem (6).jpg', 0),
(15, 'Bánh kem Dâu I', 3, '', 350000, 'banhkem-dau.jpg', 1),
(16, 'Bánh trái cây II', 3, '', 150000, 'banhtraicay.jpg', 0),
(17, 'Apple Cake', 3, '', 250000, 'Fruit-Cake_7979.jpg', 0),
(18, 'Bánh ngọt nhân cream táo', 2, '', 180000, '20131108144733.jpg', 0),
(19, 'Bánh Chocolate Trái cây', 2, '', 150000, 'Fruit-Cake_7976.jpg', 1),
(20, 'Bánh Chocolate Trái cây II', 2, '', 150000, 'Fruit-Cake_7981.jpg', 0),
(21, 'Peach Cake', 2, '', 160000, 'Peach-Cake_3294.jpg', 0),
(22, 'Bánh bông lan trứng muối I', 1, '', 160000, 'banhbonglantrung.jpg', 1),
(23, 'Bánh bông lan trứng muối II', 1, '', 180000, 'banhbonglantrungmuoi.jpg', 0),
(24, 'Bánh French', 1, '', 180000, 'banh-man-thu-vi-nhat-1.jpg', 0),
(25, 'Bánh mì Australia', 1, '', 80000, 'dung-khoai-tay-lam-banh-gato-man-cuc-ngon.jpg', 0),
(26, 'Bánh mặn thập cẩm', 1, '', 50000, 'Fruit-Cake.png', 0),
(27, 'Bánh Muffins trứng', 1, '', 100000, 'maxresdefault.jpg', 0),
(28, 'Bánh Scone Peach Cake', 1, '', 120000, 'Peach-Cake_3300.jpg', 1),
(29, 'Bánh mì Loaf I', 1, '', 100000, 'sli12.jpg', 0),
(30, 'Bánh kem Chocolate I', 4, '', 380000, '111.jpg', 0),
(31, 'Bánh kem Trái cây I', 4, '', 380000, 'Fruit-Cake.jpg', 0),
(32, 'Bánh kem Trái cây II', 4, '', 380000, 'Fruit-Cake_7971.jpg', 0),
(33, 'Bánh kem Doraemon', 4, '', 280000, 'p1392962167_banh74.jpg', 1),
(34, 'Bánh kem Caramen Pudding', 4, '', 280000, 'Caramen-pudding636099031482099583.jpg', 1),
(35, 'Bánh kem Chocolate Fruit', 4, '', 320000, 'chocolate-fruit636098975917921990.jpg', 1),
(36, 'Bánh kem Coffee Chocolate', 4, '', 320000, 'COFFE-CHOCOLATE636098977566220885.jpg', 0),
(37, 'Bánh kem Mango Mouse', 4, '', 320000, 'mango-mousse-cake.jpg', 1),
(38, 'Bánh kem Matcha Mouse', 4, '', 350000, 'MATCHA-MOUSSE.jpg', 0),
(39, 'Bánh kem Flower Fruit', 4, '', 350000, 'flower-fruits636102461981788938.jpg', 0),
(40, 'Bánh kem Strawberry Delight', 4, '', 350000, 'strawberry-delight636102445035635173.jpg', 0),
(41, 'Bánh kem Raspberry Delight', 4, '', 350000, 'raspberry.jpg', 0),
(58, 'Bánh Macaron Pháp', 2, 'Thưởng thức macaron, người ta có thể tìm thấy từ những hương vị truyền thống như mâm xôi, chocolate, cho đến những hương vị mới như nấm và trà xanh. Macaron với vị giòn tan của vỏ bánh, béo ngậy ngọt ngào của phần nhân, với vẻ ngoài đáng yêu và nhiều màu sắc đẹp mắt, đây là món bạn không nên bỏ qua khi khám phá nền ẩm thực Pháp.', 200000, 'Macaron9.jpg', 0),
(59, 'Bánh Tiramisu - Italia', 2, 'Chỉ cần cắn một miếng, bạn sẽ cảm nhận được tất cả các hương vị đó hòa quyện cùng một chính vì thế người ta còn ví món bánh này là Thiên đường trong miệng của bạn', 200000, '234.jpg', 0),
(60, 'Bánh Táo - Mỹ', 2, 'Bánh táo Mỹ với phần vỏ bánh mỏng, giòn mềm, ẩn chứa phần nhân táo thơm ngọt, điểm chút vị chua dịu của trái cây quả sẽ là một lựa chọn hoàn hảo cho những tín đồ bánh ngọt trên toàn thế giới.', 200000, '1234.jpg', 0),
(65, 'Pepsi', 6, '', 20000, '71GTXhmoc6L._SL1500_.jpg', 0),
(66, 'Coca cola', 6, '', 20000, 'd8d4a36f436bc147eb74a7965f97bd36.jpg', 0),
(67, 'Nước suối', 6, '', 10000, 'THÙNG-NƯỚC-AQUAFINA-500ML_Queanhwater.png', 0),
(68, 'Cafe đen', 6, '', 15000, 'cafe-da-3.jpg', 0),
(69, 'Socola M&M', 7, '', 50000, 'd3826afd04e5678241b176c8719aa579.jpg', 0),
(70, 'Gum doublemint', 7, '', 25000, 'ff787905019c4d9d23bc09f803169387.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `type_products`
--

CREATE TABLE `type_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_products`
--

INSERT INTO `type_products` (`id`, `type_name`) VALUES
(1, 'Bánh mặn'),
(2, 'Bánh ngọt'),
(3, 'Bánh trái cây'),
(4, 'Bánh kem'),
(5, 'Bánh crepe'),
(6, 'Thức uống'),
(7, 'Kẹo'),
(8, 'Snack');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `bills_ibfk_1` (`id_customer`);

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_detail_ibfk_2` (`id_product`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `products_id_type_foreign` (`id_type`);

--
-- Indexes for table `type_products`
--
ALTER TABLE `type_products`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `bill_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
