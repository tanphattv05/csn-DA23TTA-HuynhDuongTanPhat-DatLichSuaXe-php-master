SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- =========================
-- DATABASE: scr
-- =========================

-- --------------------------------------------------------
-- TABLE: tbl_brand
-- --------------------------------------------------------
CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `tbl_brand` (`brand_id`, `category_id`, `brand_name`) VALUES
(12, 19, 'Honda Winner X'),
(13, 19, 'Honda Supper Cub C125'),
(18, 19, 'Honda Sh Mode'),
(19, 19, 'Honda Future'),
(20, 19, 'Honda Wave'),
(11, 12, 'Yamaha Exciter'),
(21, 12, 'Yamaha Janus'),
(22, 12, 'Yamaha Jupiter'),
(23, 12, 'Yamaha Sirius'),
(29, 12, 'Yamaha PG-1'),
(24, 11, 'Suzuki S150'),
(25, 11, 'Suzuki Raider'),
(26, 11, 'Suzuki R150'),
(28, 11, 'Suzuki GD110');

-- --------------------------------------------------------
-- TABLE: tbl_category
-- --------------------------------------------------------
CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(19, 'Honda'),
(12, 'Yamaha'),
(11, 'Suzuki');

-- --------------------------------------------------------
-- TABLE: tbl_datlich  ✅ đổi product_price sang VARCHAR để lưu "150.000"
-- --------------------------------------------------------
CREATE TABLE `tbl_datlich` (
  `datlich_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `hoten` varchar(255) NOT NULL,
  `sdt` varchar(11) NOT NULL,
  `biensoxe` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `ngaybd` date NOT NULL,
  `product_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `tbl_datlich` (`datlich_id`, `user_id`, `hoten`, `sdt`, `biensoxe`, `category_id`, `brand_id`, `product_id`, `ngaybd`, `product_price`) VALUES
(14, NULL, 'Huỳnh Dương Tấn Phát', '0394340411', '84K5-7788', 11, 28, 70, '2024-12-29', '150.000'),
(22, NULL, 'Huỳnh Dương Tấn Phát', '0394340411', '84K5-7788', 19, 12, 57, '2025-01-05', '400.000'),
(23, NULL, 'Huỳnh Dương Tấn Phát', '0394340411', '84K5-7788', 19, 18, 73, '2025-01-29', '150.000');

-- --------------------------------------------------------
-- TABLE: tbl_lienhe
-- --------------------------------------------------------
CREATE TABLE `tbl_lienhe` (
  `lienhe_id` int(11) NOT NULL,
  `tenlh` varchar(255) NOT NULL,
  `emaillh` varchar(255) NOT NULL,
  `noidung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `tbl_lienhe` (`lienhe_id`, `tenlh`, `emaillh`, `noidung`) VALUES
(4, 'Huỳnh Dương Tấn Phát', 'tp054@gmail.com', 'Tôi có thể thanh toán tất cả chi phí sau khi sửa chữa không?\r\n'),
(5, 'Huỳnh Dương Tấn Phát', 'tanphat@gmail.com', 'Tôi có thể mua riêng phụ tùng được không?'),
(6, 'Huỳnh Dương Tấn Phát', 'phat@gmail.com', 'Có thể tư vấn cho tôi một số dịch vụ không?');

-- --------------------------------------------------------
-- TABLE: tbl_product ✅ giữ product_price là VARCHAR, dọn dữ liệu "390.0000" -> "390.000"
-- --------------------------------------------------------
CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_time` int(11) NOT NULL,
  `product_vatTu` varchar(255) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `product_imgad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `tbl_product` (`product_id`, `product_name`, `category_id`, `brand_id`, `product_price`, `product_time`, `product_vatTu`, `product_img`, `product_imgad`) VALUES
(45, 'Thay nhông sên dĩa', 11, 26, '400.000', 50, 'Nhông sên dĩa Rector chính hãng', 'uploads/suzuki_gsx.jpg', 'uploads/suzuki_gsx.jpg'),
(46, 'Thay nhông sên dĩa', 11, 24, '400.000', 50, 'Nhông sên dĩa Rector chính hãng', 'uploads/suzuki_s150.png', 'uploads/suzuki_s150.png'),
(47, 'Thay nhông sên dĩa', 11, 25, '400.000', 50, 'Nhông sên dĩa Rector chính hãng', 'uploads/suzuki_raider.webp', 'uploads/suzuki_raider.webp'),
(48, 'Thay nhông sên dĩa', 11, 28, '400.000', 50, 'Nhông sên dĩa Rector chính hãng', 'uploads/suzuki_GD110.jpg', 'uploads/suzuki_GD110.jpg'),
(49, 'Thay ắc quy', 12, 11, '250.000', 20, 'Ắc quy GS chính hãng', 'uploads/yamaha_exciter.jpg', 'yamaha_exciter.jpg'),
(50, 'Thay ắc quy', 12, 21, '250.000', 20, 'Ắc quy GS chính hãng', 'uploads/yamaha_janus.png', 'uploads/yamaha_janus.png'),
(51, 'Thay ắc quy', 12, 22, '250.000', 20, 'Ắc quy GS chính hãng', 'uploads/yamaha_jupiter.jpg', 'uploads/yamaha_jupiter.jpg'),
(52, 'Thay ắc quy', 12, 23, '250.000', 20, 'Ắc quy GS chính hãng', 'uploads/yamaha_sirius.jpg', 'uploads/yamaha_sirius.jpg'),

(57, 'Thay nhông sên dĩa', 19, 12, '390.000', 50, 'Nhông sên dĩa Rector chính hãng', 'uploads/honda_wave.jpg', 'uploads/honda_wave.jpg'),
(58, 'Thay nhông sên dĩa', 19, 20, '390.000', 50, 'Nhông sên dĩa Rector chính hãng', 'uploads/honda_future.jpg', 'uploads/honda_future.jpg'),
(59, 'Thay nhông sên dĩa', 19, 19, '390.000', 50, 'Nhông sên dĩa Rector chính hãng', 'uploads/honda_winner.jpg', 'uploads/honda_winner.jpg'),
(60, 'Thay nhông sên dĩa', 19, 13, '390.000', 50, 'Nhông sên dĩa Rector chính hãng', 'uploads/honda_cup.png', 'uploads/honda_cup.png'),
(90, 'Thay ắc quy', 19, 12, '250.000', 20, 'Ắc quy GS chính hãng', 'uploads/honda_winner.jpg', 'uploads/honda_winner.jpg'),
(91, 'Thay ắc quy', 19, 20, '250.000', 20, 'Ắc quy GS chính hãng', 'uploads/honda_wave.jpg', 'uploads/honda_wave.jpg'),
(92, 'Thay ắc quy', 19, 19, '250.000', 20, 'Ắc quy GS chính hãng', 'uploads/honda_future.jpg', 'uploads/honda_future.jpg'),
(93, 'Thay ắc quy', 19, 18, '250.000', 20, 'Ắc quy GS chính hãng', 'uploads/honda_mode.jpg', 'uploads/honda_mode.jpg'),

(61, 'Thay nhớt', 19, 12, '130.000', 20, 'Nhớt Shell chính hãng', 'uploads/honda_winner.jpg', 'uploads/honda_winner.jpg'),
(62, 'Thay nhớt', 19, 20, '110.000', 20, 'Nhớt Shell chính hãng', 'uploads/honda_wave.jpg', 'uploads/honda_wave.jpg'),
(63, 'Thay nhông sên dĩa', 12, 11, '250.000', 20, 'Nhông sên dĩa Rector chính hãng', 'uploads/yamaha_exciter.jpg', 'uploads/yamaha_exciter.jpg'),
(64, 'Thay nhông sên dĩa', 12, 29, '250.000', 20, 'Nhông sên dĩa Rector chính hãng', 'uploads/yamaha_PG.jpg', 'uploads/yamaha_PG.jpg'),
(65, 'Thay nhông sên dĩa', 12, 22, '250.000', 20, 'Nhông sên dĩa Rector chính hãng', 'uploads/yamaha_jupiter.jpg', 'uploads/yamaha_jupiter.jpg'),
(66, 'Thay nhông sên dĩa', 12, 23, '250.000', 20, 'Nhông sên dĩa Rector chính hãng', 'uploads/yamaha_sirius.jpg', 'uploads/yamaha_sirius.jpg'),

(67, 'Thay ắc quy', 11, 24, '250.000', 20, 'Ắc quy GS chính hãng', 'uploads/suzuki_s150.png', 'uploads/suzuki_s150.png'),
(68, 'Thay ắc quy', 11, 25, '250.000', 20, 'Ắc quy GS chính hãngi', 'uploads/suzuki_raider.webp', 'uploads/suzuki_raider.webp'),
(69, 'Thay ắc quy', 11, 26, '250.000', 20, 'Ắc quy GS chính hãng', 'uploads/suzuki_gsx.jpg', 'uploads/suzuki_gsx.jpg'),
(70, 'Thay ắc quy', 11, 28, '250.000', 20, 'Ắc quy GS chính hãng', 'uploads/suzuki_GD110.jpg', 'uploads/suzuki_GD110.jpg'),

(71, 'Thay nhớt', 19, 19, '120.000', 20, 'Nhớt Shell chính hãng', 'uploads/honda_future.jpg', 'uploads/honda_future.jpg'),
(73, 'Thay nhớt', 19, 18, '130.000', 20, 'Nhớt Shell chính hãng', 'uploads/honda_mode.jpg', 'uploads/honda_mode.jpg'),

(104, 'Thay nhớt', 11, 28, '150.000', 30, 'Nhớt Shell chính hãng', 'uploads/suzuki_GD110.jpg', 'imgad/suzuki_GD110.jpg'),
(105, 'Thay nhớt', 11, 24, '150.000', 30, 'Nhớt Shell chính hãng', 'uploads/suzuki_s150.png', 'imgad/suzuki_s150.png'),
(106, 'Thay nhớt', 11, 26, '150.000', 30, 'Nhớt Shell chính hãng', 'uploads/suzuki_gsx.jpg', 'imgad/suzuki_gsx.jpg'),
(107, 'Thay nhớt', 11, 25, '150.000', 30, 'Nhớt Shell chính hãng', 'uploads/suzuki_raider.webp', 'imgad/suzuki_raider.webp'),

(113, 'Thay nhớt', 12, 11, '130.000', 20, 'Nhớt Shell chính hãng', 'uploads/yamaha_exciter.jpg', 'imgad/yamaha_exciter.jpg'),
(114, 'Thay nhớt', 12, 21, '130.000', 20, 'Nhớt Shell chính hãng', 'uploads/yamaha_janus.png', 'imgad/yamaha_janus.png'),
(115, 'Thay nhớt', 12, 22, '110.000', 20, 'Nhớt Shell chính hãng', 'uploads/yamaha_jupiter.jpg', 'imgad/yamaha_jupiter.jpg'),
(116, 'Thay nhớt', 12, 23, '110.000', 20, 'Nhớt Shell chính hãng', 'uploads/yamaha_sirius.jpg', 'imgad/yamaha_sirius.jpg');

-- --------------------------------------------------------
-- TABLE: tbl_user
-- --------------------------------------------------------
CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `matkhau` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `tbl_user` (`user_id`, `ten`, `email`, `user_name`, `matkhau`) VALUES
(23, 'phat', 'tp05@gmail.com', 'phat', 'phat123'),
(24, 'tanphat', 'phat@gmail.com', 'tanphat', '123456');

-- =========================
-- INDEXES + AUTO_INCREMENT
-- =========================

ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`),
  ADD KEY `idx_brand_category` (`category_id`);

ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

ALTER TABLE `tbl_datlich`
  ADD PRIMARY KEY (`datlich_id`),
  ADD KEY `idx_dl_product` (`product_id`),
  ADD KEY `idx_dl_cat_brand` (`category_id`,`brand_id`);

ALTER TABLE `tbl_lienhe`
  ADD PRIMARY KEY (`lienhe_id`);

ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `idx_product_category` (`category_id`),
  ADD KEY `idx_product_brand` (`brand_id`);

ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

ALTER TABLE `tbl_datlich`
  MODIFY `datlich_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

ALTER TABLE `tbl_lienhe`
  MODIFY `lienhe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

-- =========================
-- FOREIGN KEYS
-- =========================

ALTER TABLE `tbl_brand`
  ADD CONSTRAINT `tbl_brand_ibfk_1`
  FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`category_id`);

ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1`
  FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`category_id`)
  ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_product_ibfk_2`
  FOREIGN KEY (`brand_id`) REFERENCES `tbl_brand` (`brand_id`)
  ON DELETE CASCADE ON UPDATE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
