SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET NAMES utf8mb4 */;

-- =========================
-- DATABASE: scr
-- =========================
-- Nếu bạn đã chọn DB scr trong phpMyAdmin rồi thì có thể bỏ dòng USE này
-- USE `scr`;

-- =========================
-- DROP TABLES (để import lại không lỗi)
-- =========================
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `tbl_datlich`;
DROP TABLE IF EXISTS `tbl_product`;
DROP TABLE IF EXISTS `tbl_brand`;
DROP TABLE IF EXISTS `tbl_category`;
DROP TABLE IF EXISTS `tbl_lienhe`;
DROP TABLE IF EXISTS `tbl_user`;

SET FOREIGN_KEY_CHECKS = 1;

-- --------------------------------------------------------
-- TABLE: tbl_category
-- --------------------------------------------------------
CREATE TABLE `tbl_category` (
  `category_id`   INT(11) NOT NULL AUTO_INCREMENT,
  `category_name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(19, 'Honda'),
(12, 'Yamaha'),
(11, 'Suzuki');

-- --------------------------------------------------------
-- TABLE: tbl_brand
-- --------------------------------------------------------
CREATE TABLE `tbl_brand` (
  `brand_id`    INT(11) NOT NULL AUTO_INCREMENT,
  `category_id` INT(11) NOT NULL,
  `brand_name`  VARCHAR(255) NOT NULL,
  PRIMARY KEY (`brand_id`),
  KEY `idx_brand_category` (`category_id`),
  CONSTRAINT `fk_brand_category`
    FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`category_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- TABLE: tbl_product
-- --------------------------------------------------------
CREATE TABLE `tbl_product` (
  `product_id`      INT(11) NOT NULL AUTO_INCREMENT,
  `product_name`    VARCHAR(255) NOT NULL,
  `category_id`     INT(11) NOT NULL,
  `brand_id`        INT(11) NOT NULL,
  `product_price`   VARCHAR(11) NOT NULL,      
  `product_time`    INT(11) NOT NULL,
  `product_phuTung` VARCHAR(255) NOT NULL,
  `product_img`     VARCHAR(255) NOT NULL,
  `product_imgad`   VARCHAR(255) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `idx_product_category` (`category_id`),
  KEY `idx_product_brand` (`brand_id`),
  CONSTRAINT `fk_product_category`
    FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`category_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_product_brand`
    FOREIGN KEY (`brand_id`) REFERENCES `tbl_brand` (`brand_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tbl_product`
(`product_id`,`product_name`,`category_id`,`brand_id`,`product_price`,`product_time`,`product_phuTung`,`product_img`,`product_imgad`) VALUES
(45, 'Thay nhông sên dĩa', 11, 26, '450.000', 50, 'Nhông sên dĩa Rector chính hãng', 'uploads/suzuki_gsx.jpg', 'uploads/suzuki_gsx.jpg'),
(46, 'Thay nhông sên dĩa', 11, 24, '440.000', 50, 'Nhông sên dĩa Rector chính hãng', 'uploads/suzuki_s150.png', 'uploads/suzuki_s150.png'),
(47, 'Thay nhông sên dĩa', 11, 25, '420.000', 50, 'Nhông sên dĩa Rector chính hãng', 'uploads/suzuki_raider.webp', 'uploads/suzuki_raider.webp'),
(48, 'Thay nhông sên dĩa', 11, 28, '400.000', 50, 'Nhông sên dĩa Rector chính hãng', 'uploads/suzuki_GD110.jpg', 'uploads/suzuki_GD110.jpg'),
(49, 'Thay ắc quy', 12, 11, '290.000', 20, 'Ắc quy GS chính hãng', 'uploads/yamaha_exciter.jpg', 'yamaha_exciter.jpg'),
(50, 'Thay ắc quy', 12, 21, '290.000', 20, 'Ắc quy GS chính hãng', 'uploads/yamaha_janus.png', 'uploads/yamaha_janus.png'),
(51, 'Thay ắc quy', 12, 22, '290.000', 20, 'Ắc quy GS chính hãng', 'uploads/yamaha_jupiter.jpg', 'uploads/yamaha_jupiter.jpg'),
(52, 'Thay ắc quy', 12, 23, '290.000', 20, 'Ắc quy GS chính hãng', 'uploads/yamaha_sirius.jpg', 'uploads/yamaha_sirius.jpg'),

(57, 'Thay nhông sên dĩa', 19, 12, '390.000', 50, 'Nhông sên dĩa Rector chính hãng', 'uploads/honda_wave.jpg', 'uploads/honda_wave.jpg'),
(58, 'Thay nhông sên dĩa', 19, 20, '390.000', 50, 'Nhông sên dĩa Rector chính hãng', 'uploads/honda_future.jpg', 'uploads/honda_future.jpg'),
(59, 'Thay nhông sên dĩa', 19, 19, '410.000', 50, 'Nhông sên dĩa Rector chính hãng', 'uploads/honda_winner.jpg', 'uploads/honda_winner.jpg'),
(60, 'Thay nhông sên dĩa', 19, 13, '410.000', 50, 'Nhông sên dĩa Rector chính hãng', 'uploads/honda_cup.png', 'uploads/honda_cup.png'),
(90, 'Thay ắc quy', 19, 12, '290.000', 20, 'Ắc quy GS chính hãng', 'uploads/honda_winner.jpg', 'uploads/honda_winner.jpg'),
(91, 'Thay ắc quy', 19, 20, '290.000', 20, 'Ắc quy GS chính hãng', 'uploads/honda_wave.jpg', 'uploads/honda_wave.jpg'),
(92, 'Thay ắc quy', 19, 19, '290.000', 20, 'Ắc quy GS chính hãng', 'uploads/honda_future.jpg', 'uploads/honda_future.jpg'),
(93, 'Thay ắc quy', 19, 18, '290.000', 20, 'Ắc quy GS chính hãng', 'uploads/honda_mode.jpg', 'uploads/honda_mode.jpg'),

(61, 'Thay nhớt', 19, 12, '150.000', 30, 'Nhớt Shell chính hãng', 'uploads/honda_winner.jpg', 'uploads/honda_winner.jpg'),
(62, 'Thay nhớt', 19, 20, '120.000', 30, 'Nhớt Shell chính hãng', 'uploads/honda_wave.jpg', 'uploads/honda_wave.jpg'),
(63, 'Thay nhông sên dĩa', 12, 11, '450.000', 50, 'Nhông sên dĩa Rector chính hãng', 'uploads/yamaha_exciter.jpg', 'uploads/yamaha_exciter.jpg'),
(64, 'Thay nhông sên dĩa', 12, 29, '410.000', 50, 'Nhông sên dĩa Rector chính hãng', 'uploads/yamaha_PG.jpg', 'uploads/yamaha_PG.jpg'),
(65, 'Thay nhông sên dĩa', 12, 22, '400.000', 50, 'Nhông sên dĩa Rector chính hãng', 'uploads/yamaha_jupiter.jpg', 'uploads/yamaha_jupiter.jpg'),
(66, 'Thay nhông sên dĩa', 12, 23, '400.000', 50, 'Nhông sên dĩa Rector chính hãng', 'uploads/yamaha_sirius.jpg', 'uploads/yamaha_sirius.jpg'),

(67, 'Thay ắc quy', 11, 24, '300.000', 20, 'Ắc quy GS chính hãng', 'uploads/suzuki_s150.png', 'uploads/suzuki_s150.png'),
(68, 'Thay ắc quy', 11, 25, '300.000', 20, 'Ắc quy GS chính hãng', 'uploads/suzuki_raider.webp', 'uploads/suzuki_raider.webp'),
(69, 'Thay ắc quy', 11, 26, '300.000', 20, 'Ắc quy GS chính hãng', 'uploads/suzuki_gsx.jpg', 'uploads/suzuki_gsx.jpg'),
(70, 'Thay ắc quy', 11, 28, '290.000', 20, 'Ắc quy GS chính hãng', 'uploads/suzuki_GD110.jpg', 'uploads/suzuki_GD110.jpg'),

(71, 'Thay nhớt', 19, 19, '120.000', 30, 'Nhớt Shell chính hãng', 'uploads/honda_future.jpg', 'uploads/honda_future.jpg'),
(73, 'Thay nhớt', 19, 18, '160.000', 30, 'Nhớt Shell chính hãng', 'uploads/honda_mode.jpg', 'uploads/honda_mode.jpg'),

(104, 'Thay nhớt', 11, 28, '130.000', 30, 'Nhớt Shell chính hãng', 'uploads/suzuki_GD110.jpg', 'imgad/suzuki_GD110.jpg'),
(105, 'Thay nhớt', 11, 24, '190.000', 30, 'Nhớt Shell chính hãng', 'uploads/suzuki_s150.png', 'imgad/suzuki_s150.png'),
(106, 'Thay nhớt', 11, 26, '190.000', 30, 'Nhớt Shell chính hãng', 'uploads/suzuki_gsx.jpg', 'imgad/suzuki_gsx.jpg'),
(107, 'Thay nhớt', 11, 25, '180.000', 30, 'Nhớt Shell chính hãng', 'uploads/suzuki_raider.webp', 'imgad/suzuki_raider.webp'),

(113, 'Thay nhớt', 12, 11, '170.000', 30, 'Nhớt Shell chính hãng', 'uploads/yamaha_exciter.jpg', 'imgad/yamaha_exciter.jpg'),
(114, 'Thay nhớt', 12, 21, '130.000', 30, 'Nhớt Shell chính hãng', 'uploads/yamaha_janus.png', 'imgad/yamaha_janus.png'),
(115, 'Thay nhớt', 12, 22, '120.000', 30, 'Nhớt Shell chính hãng', 'uploads/yamaha_jupiter.jpg', 'imgad/yamaha_jupiter.jpg'),
(116, 'Thay nhớt', 12, 23, '110.000', 30, 'Nhớt Shell chính hãng', 'uploads/yamaha_sirius.jpg', 'imgad/yamaha_sirius.jpg');

-- --------------------------------------------------------
-- TABLE: tbl_user
-- --------------------------------------------------------
CREATE TABLE `tbl_user` (
  `user_id`   INT(11) NOT NULL AUTO_INCREMENT,
  `ten`       VARCHAR(255) NOT NULL,
  `email`     VARCHAR(255) NOT NULL,
  `user_name` VARCHAR(255) NOT NULL,
  `matkhau`   VARCHAR(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tbl_user` (`user_id`, `ten`, `email`, `user_name`, `matkhau`) VALUES
(23, 'phat',    'tp05@gmail.com',  'phat',    'phat123'),
(24, 'tanphat', 'phat@gmail.com',  'tanphat', '123456');

-- --------------------------------------------------------
-- TABLE: tbl_lienhe
-- --------------------------------------------------------
CREATE TABLE `tbl_lienhe` (
  `lienhe_id` INT(11) NOT NULL AUTO_INCREMENT,
  `tenlh`     VARCHAR(255) NOT NULL,
  `emaillh`   VARCHAR(255) NOT NULL,
  `noidung`   VARCHAR(255) NOT NULL,
  PRIMARY KEY (`lienhe_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tbl_lienhe` (`lienhe_id`, `tenlh`, `emaillh`, `noidung`) VALUES
(4, 'Huỳnh Dương Tấn Phát', 'tp054@gmail.com', 'Tôi có thể thanh toán tất cả chi phí sau khi sửa chữa không?'),
(5, 'Huỳnh Dương Tấn Phát', 'tanphat@gmail.com', 'Tôi có thể mua riêng phụ tùng được không?'),
(6, 'Huỳnh Dương Tấn Phát', 'phat@gmail.com', 'Có thể tư vấn cho tôi một số dịch vụ không?');

-- --------------------------------------------------------
-- TABLE: tbl_datlich (giữ lịch sử, xóa danh mục/xe vẫn không mất đơn)
-- --------------------------------------------------------
CREATE TABLE `tbl_datlich` (
  `datlich_id`    INT(11) NOT NULL AUTO_INCREMENT,
  `user_id`       INT(11) DEFAULT NULL,
  `hoten`         VARCHAR(255) NOT NULL,
  `sdt`           VARCHAR(11) NOT NULL,
  `biensoxe`      VARCHAR(255) NOT NULL,
  `category_id`   INT(11) DEFAULT NULL,   -- ✅ cho phép NULL để SET NULL khi xóa
  `brand_id`      INT(11) DEFAULT NULL,   -- ✅
  `product_id`    INT(11) DEFAULT NULL,   -- ✅
  `ngaybd`        DATE NOT NULL,
  `product_price` INT(11) NOT NULL,       -- ✅ đổi từ varchar -> INT
  PRIMARY KEY (`datlich_id`),
  KEY `idx_dl_product` (`product_id`),
  KEY `idx_dl_cat_brand` (`category_id`,`brand_id`),

  CONSTRAINT `fk_dl_user`
    FOREIGN KEY (`user_id`) REFERENCES `tbl_user`(`user_id`)
    ON DELETE SET NULL ON UPDATE CASCADE,

  CONSTRAINT `fk_dl_category`
    FOREIGN KEY (`category_id`) REFERENCES `tbl_category`(`category_id`)
    ON DELETE SET NULL ON UPDATE CASCADE,

  CONSTRAINT `fk_dl_brand`
    FOREIGN KEY (`brand_id`) REFERENCES `tbl_brand`(`brand_id`)
    ON DELETE SET NULL ON UPDATE CASCADE,

  CONSTRAINT `fk_dl_product`
    FOREIGN KEY (`product_id`) REFERENCES `tbl_product`(`product_id`)
    ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tbl_datlich`
(`datlich_id`, `user_id`, `hoten`, `sdt`, `biensoxe`, `category_id`, `brand_id`, `product_id`, `ngaybd`, `product_price`) VALUES
(14, NULL, 'Huỳnh Dương Tấn Phát', '0394340411', '84K5-7788', 11, 28, 70, '2024-12-29', 150000),
(22, NULL, 'Huỳnh Dương Tấn Phát', '0394340411', '84K5-7788', 19, 12, 57, '2025-01-05', 400000),
(23, NULL, 'Huỳnh Dương Tấn Phát', '0394340411', '84K5-7788', 19, 18, 73, '2025-01-29', 150000);

COMMIT;
