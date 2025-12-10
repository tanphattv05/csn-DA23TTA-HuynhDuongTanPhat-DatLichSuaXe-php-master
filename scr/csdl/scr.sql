-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 11, 2025 lúc 02:45 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `scr`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `category_id`, `brand_name`) VALUES
(12, 19, 'Honda Winner X'),
(18, 19, 'Honda Sh Mode'),
(19, 19, 'Honda Future'),
(20, 19, 'Honda Wave'),
(11, 12, 'Yamaha Exciter'),
(21, 12, 'Yamaha Janus'),
(22, 12, 'Yamaha Jupiter'),
(23, 12, 'Yamaha Sirius'),
(24, 11, 'Suzuki S150'),
(25, 11, 'Suzuki Raider'),
(26, 11, 'Suzuki R150'),
(28, 11, 'Suzuki GD110');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(19, 'Honda'),
(12, 'Yamaha'),
(11, 'Suzuki');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_datlich`
--

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
  `product_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_datlich`
--

INSERT INTO `tbl_datlich` (`datlich_id`, `user_id`, `hoten`, `sdt`, `biensoxe`, `category_id`, `brand_id`, `product_id`, `ngaybd`, `product_price`) VALUES
(14, NULL, 'Huỳnh Dương Tấn Phát', '0394340411', '84K5-7788', 11, 28, 70, '2024-12-29', 150000),
(22, NULL, 'Huỳnh Dương Tấn Phát', '0394340411', '84K5-7788', 19, 12, 57, '2025-01-05', 400000),
(23, NULL, 'Huỳnh Dương Tấn Phát', '0394340411', '84K5-7788', 19, 18, 73, '2025-01-29', 150000);


-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_lienhe`
--

CREATE TABLE `tbl_lienhe` (
  `lienhe_id` int(11) NOT NULL,
  `tenlh` varchar(255) NOT NULL,
  `emaillh` varchar(255) NOT NULL,
  `noidung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_lienhe`
--

INSERT INTO `tbl_lienhe` (`lienhe_id`, `tenlh`, `emaillh`, `noidung`) VALUES
(4, 'Huỳnh Dương Tấn Phát', 'tp054@gmail.com', 'Tôi có thể thanh toán tất cả chi phí sau khi sửa chữa không?\r\n'),
(5, 'Huỳnh Dương Tấn Phát', 'tanphat@gmail.com', 'Tôi có thể mua riêng phụ tùng được không?'),
(6, 'Huỳnh Dương Tấn Phát', 'phat@gmail.com', 'Có thể tư vấn cho tôi một số dịch vụ không?');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_time` int(255) NOT NULL,
  `product_vatTu` varchar(255) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `product_imgad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `category_id`, `brand_id`, `product_price`, `product_time`, `product_vatTu`, `product_img`, `product_imgad`) VALUES
(104, 'Thay nước mát', 19, 28, '700000', 30, 'Nước làm mát chính hãng', 'uploads/suzuki_GD110.jpg', 'imgad/suzuki_GD110.jpg'),
(105, 'Thay nước mát', 19, 24, '700000', 40, 'Nước làm mát chính hãng', 'uploads/suzuki_s150.png', 'imgad/suzuki_s150.png'),
(106, 'Thay nước mát', 19, 26, '700000', 30, 'Nước làm mát chính hãng', 'uploads/suzuki_gsx.jpg', 'imgad/suzuki_gsx.jpg'),
(107, 'Thay nước mát', 19, 25, '700000', 30, 'Nước làm mát chính hãng', 'uploads/suzuki_raider.webp', 'imgad/suzuki_raider.webp'),
(113, 'Thay nước mát', 12, 11, '700000', 30, 'Nước làm mát chính hãng', 'uploads/yamaha_exciter.jpg', 'yamaha_exciter.jpg'),
(114, 'Thay nước mát', 12, 21, '700000', 30, 'Nước làm mát chính hãng', 'uploads/yamaha_janus.png', 'imgad/yamaha_janus.png'),
(115, 'Thay nước mát', 12, 22, '700000', 30, 'Nước làm mát chính hãng', 'uploads/yamaha_jupiter.jpg', 'imgad/yamaha_jupiter.jpg'),
(116, 'Thay nước mát', 12, 23, '700000', 30, 'Nước làm mát chính hãng', 'uploads/yamaha_sirius.jpg', 'imgad/yamaha_sirius.jpg'),
(117, 'Thay nước mát', 11, 12, '160000', 30, 'Nước làm mát chính hãng', 'uploads/honda_winner.jpg', 'imgad/honda_winner.jpg'),
(118, 'Thay nước mát', 11, 18, '160000', 30, 'Nước làm mát chính hãng', 'uploads/honda_mode.jpg', 'uploads/honda_mode.jpg'),
(119, 'Thay nước mát', 11, 19, '160000', 30, 'Nước làm mát chính hãng', 'uploads/honda_future.jpg', 'imgad/honda_future.jpg'),
(120, 'Thay nước mát', 11, 20, '160000', 30, 'Nước làm mát chính hãng', 'uploads/honda_wave.jpg', 'imgad/honda_wave.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `matkhau` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `ten`, `email`, `user_name`, `matkhau`) VALUES
(23, 'phat', 'tp05@gmail.com', 'phat', 'phat123'),
(24, 'tanphat', 'phat@gmail.com', 'tanphat', '123456');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `category_id_2` (`category_id`),
  ADD KEY `category_id_3` (`category_id`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_datlich`
--
ALTER TABLE `tbl_datlich`
  ADD PRIMARY KEY (`datlich_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `category_id` (`category_id`,`brand_id`);

--
-- Chỉ mục cho bảng `tbl_lienhe`
--
ALTER TABLE `tbl_lienhe`
  ADD PRIMARY KEY (`lienhe_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `category_id_2` (`category_id`,`brand_id`),
  ADD KEY `tbl_product_ibfk_2` (`brand_id`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `tbl_datlich`
--
ALTER TABLE `tbl_datlich`
  MODIFY `datlich_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `tbl_lienhe`
--
ALTER TABLE `tbl_lienhe`
  MODIFY `lienhe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD CONSTRAINT `tbl_brand_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`category_id`);

--
-- Các ràng buộc cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_product_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `tbl_brand` (`brand_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
