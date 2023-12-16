-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 16, 2023 lúc 05:54 AM
-- Phiên bản máy phục vụ: 8.0.31
-- Phiên bản PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cinema`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `film_id` int NOT NULL,
  `amount` int NOT NULL DEFAULT '0',
  `sum_price` double(10,2) NOT NULL DEFAULT '0.00',
  `film_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_giohang_sanpham` (`film_id`),
  KEY `fk_giohang_donhang` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=176 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `order_id`, `film_id`, `amount`, `sum_price`, `film_name`, `img`) VALUES
(161, 185, 41, 2, 80.00, 'the last', '../uploads/s-l1600.jpg'),
(162, 185, 40, 1, 100.00, 'star war', '../uploads/product-1.jpg'),
(163, 185, 44, 1, 120.00, 'batman', '../uploads/carousel-2.jpg'),
(174, 191, 43, 1, 100.00, 'nam 1917 ', '../uploads/56.jpg'),
(175, 192, 44, 1, 120.00, 'batman', '../uploads/carousel-2.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cate_id` int NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`cate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`) VALUES
(29, 'Hanh Dong'),
(30, 'Tinh Cam'),
(31, 'Hoat Hinh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `film`
--

DROP TABLE IF EXISTS `film`;
CREATE TABLE IF NOT EXISTS `film` (
  `film_id` int NOT NULL AUTO_INCREMENT,
  `film_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` int NOT NULL DEFAULT '0',
  `old_price` double(10,0) NOT NULL DEFAULT '0',
  `price` double(10,0) NOT NULL,
  `cate_id` int NOT NULL,
  `trailer` text COLLATE utf8mb4_unicode_ci,
  `detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`film_id`),
  KEY `fk_sanpham_danhmuc` (`cate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `film`
--

INSERT INTO `film` (`film_id`, `film_name`, `img`, `view`, `old_price`, `price`, `cate_id`, `trailer`, `detail`) VALUES
(40, 'star war', '../uploads/product-1.jpg', 10, 0, 100, 29, NULL, NULL),
(41, 'the last', '../uploads/s-l1600.jpg', 1, 0, 80, 29, NULL, NULL),
(42, 'thor', '../uploads/thor-the-dark-world-crowded-691x1024.jpg', 8, 0, 60, 29, NULL, NULL),
(43, 'nam 1917 ', '../uploads/56.jpg', 13, 0, 100, 29, NULL, NULL),
(44, 'batman', '../uploads/carousel-2.jpg', 15, 0, 120, 30, NULL, NULL),
(47, 'hidden strike', '../uploads/carousel-4.jpg', 5, 0, 80, 29, NULL, NULL),
(49, 'bui doi cho lon', '../uploads/1362820103-poster-4.jpg', 15, 0, 0, 30, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/b9pw1sdwyYs?si=EIBpWE5vqN9RPLzn\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 'Phim xoay quanh mối quan hệ phức tạp giữa 4 nhân vật chính là Hùng Chợ Lớn, Tài Nhớt,  Phong Bụi và Lâm. Lâm là em trai Hùng, vì quá si mê Hương - người tình của Tài Nhớt nên đã đắc tội với gã đối thủ máu lạnh. Vốn đã có âm mưu chiếm lấy Chợ Lớn nên nhân cơ hội này Tài Nhớt buộc Hùng phải đối đầu với mình. Để tăng thêm phần thắng, hắn đã tìm mọi cách khiến cho Phong Bụi - một cao thủ ẩn mình mà y luôn xem như anh em phải quay trở lại giúp y đánh bại Hùng. Và cuộc chiến đã nổ ra giữa 2 nhóm Tài Nhớt - Hùng Chợ Lớn với những trận đấu sinh tử một mất một còn...'),
(50, 'joker', '../uploads/thejoker-action-batman-movie.jpg', 1, 156, 13, 30, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` double(10,2) NOT NULL DEFAULT '0.00',
  `pttt` tinyint(1) NOT NULL DEFAULT '1',
  `date` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int NOT NULL,
  `user_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_donhang_taikhoan` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `code`, `total`, `pttt`, `date`, `user_id`, `user_name`, `address`, `email`, `tel`) VALUES
(185, 'aba663610', 380.00, 1, '2023/12/09', 0, '', '', '', ''),
(191, 'aba129151', 100.00, 1, '2023/11/10', 2, '', '', '', ''),
(192, 'aba811103', 120.00, 1, '2023/1/10', 2, '', '', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `email`, `user`, `pass`, `role`) VALUES
(0, 'khachhang', NULL, NULL, '', '', 0),
(1, 'dang khoa', 'phu my, q7', 'khoa@gmail.com', 'admin', '123', 1),
(2, 'khoa23', 'tan phu dong, sa dec', 'nguoianhhung@gmail.com', 'hotb', '456', 0);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_giohang_donhang` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_giohang_sanpham` FOREIGN KEY (`film_id`) REFERENCES `film` (`film_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `fk_sanpham_danhmuc` FOREIGN KEY (`cate_id`) REFERENCES `category` (`cate_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_donhang_taikhoan` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
