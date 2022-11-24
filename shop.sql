-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 12, 2022 lúc 09:41 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `sphone`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--
drop DATABASE shop;
CREATE DATABASE IF NOT EXISTS `shop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `shop`;


CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Áo'),
(2, 'Quần'),
(3, 'Giày-Dép'),
(4, 'Nón'),
(5, 'Mắt Kính'),
(6, 'Phụ kiện khác');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `note` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

-- INSERT INTO `feedback` (`id`, `note`, `user_id`, `product_id`, `created_at`, `updated_at`, `status`) VALUES
-- (52, 'Rất tốt', 50, 4, '2022-06-17 11:30:08', '2022-06-17 11:30:08', 0),
-- (53, 'Sản phẩm tuyệt vời', 50, 1, '2022-06-18 06:02:08', '2022-06-18 06:02:08', 0),
-- (54, 'Giá thành cạnh tranh nha', 51, 1, '2022-06-18 06:03:52', '2022-06-18 11:28:45', 1),
-- (55, 'Tôi rất thích', 51, 1, '2022-06-19 02:50:21', '2022-06-19 02:50:21', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `total_money` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

-- INSERT INTO `orders` (`id`, `fullname`, `email`, `phone`, `user_id`, `status`, `deleted`, `address`, `created_at`, `total_money`) VALUES
-- (58, 'User1', 'user1@gmail.com', '+84388542487', 50, 3, 0, 'Vĩnh Long', '2022-11-12 15:15:38', 25989999),
-- (59, 'User2', 'user2@gmail.com', '+84388542487', 51, 3, 0, 'Vĩnh Long', '2022-11-12 15:18:05', 25990000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `total_money` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

-- INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `price`, `num`, `total_money`) VALUES
-- (101, 58, 61, 25990000, 1, 25990000),
-- (102, 59, 61, 25990000, 1, 25990000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `money` float NOT NULL COMMENT 'số tiền thanh toán',
  `note` varchar(255) DEFAULT NULL COMMENT 'ghi chú thanh toán'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `payments`
--

-- INSERT INTO `payments` (`id`, `order_id`, `user_id`, `money`, `note`) VALUES
-- (11, 2147483647, 51, 25990000, 'Noi dung thanh toan');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(350) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `photo` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `category_id`, `title`, `price`, `discount`, `photo`, `description`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 1, 'Áo Thun Wash Support Friends', 300000, 270000, 'https://product.hstatic.net/1000026602/product/dsc02413_12f68b68be2e47cbb090f08b97b470d3_master.jpg', 'Ao sieu dinh', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(2, 1, 'Áo Thun Wash Air Balloon', 300000, 270000, 'https://product.hstatic.net/1000026602/product/dsc01629_8ca46e4f5a5c41caaa1044769854acc5_master.jpg', 'Ao sieu dinh', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(3, 1, 'Quần Short Straight Red Details', 380000, 320000, 'https://product.hstatic.net/1000026602/product/dsc01217_8e642de669e545759dd9f9ebf330620f_master.jpg', 'Ao sieu dinh', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(4, 1, 'Quần Short Straight Red Details', 380000, 320000, 'https://product.hstatic.net/1000026602/product/dsc01217_8e642de669e545759dd9f9ebf330620f_master.jpg', 'Ao sieu dinh', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(5, 2, 'Quần Short Straight Red Details', 380000, 320000, 'https://product.hstatic.net/1000026602/product/dsc01217_8e642de669e545759dd9f9ebf330620f_master.jpg', 'Ao sieu dinh', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(6, 2, 'Quần Short Straight Red Details', 380000, 320000, 'https://product.hstatic.net/1000026602/product/dsc01217_8e642de669e545759dd9f9ebf330620f_master.jpg', 'Ao sieu dinh', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(7, 2, 'Quần Short Straight Red Details', 380000, 320000, 'https://product.hstatic.net/1000026602/product/dsc01217_8e642de669e545759dd9f9ebf330620f_master.jpg', 'Ao sieu dinh', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(8, 2, 'Quần Short Straight Red Details', 380000, 320000, 'https://product.hstatic.net/1000026602/product/dsc01217_8e642de669e545759dd9f9ebf330620f_master.jpg', 'Ao sieu dinh', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(9, 3, 'Quần Short Straight Red Details', 380000, 320000, 'https://product.hstatic.net/1000026602/product/dsc01217_8e642de669e545759dd9f9ebf330620f_master.jpg', 'Ao sieu dinh', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(10, 3, 'Quần Short Straight Red Details', 380000, 320000, 'https://product.hstatic.net/1000026602/product/dsc01217_8e642de669e545759dd9f9ebf330620f_master.jpg', 'Ao sieu dinh', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(11, 3, 'Quần Short Straight Red Details', 380000, 320000, 'https://product.hstatic.net/1000026602/product/dsc01217_8e642de669e545759dd9f9ebf330620f_master.jpg', 'Ao sieu dinh', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(12, 3, 'Quần Short Straight Red Details', 380000, 320000, 'https://product.hstatic.net/1000026602/product/dsc01217_8e642de669e545759dd9f9ebf330620f_master.jpg', 'Ao sieu dinh', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(13, 3, 'Quần Short Straight Red Details', 380000, 320000, 'https://product.hstatic.net/1000026602/product/dsc01217_8e642de669e545759dd9f9ebf330620f_master.jpg', 'Ao sieu dinh', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(14, 3, 'Quần Short Straight Red Details', 380000, 320000, 'https://product.hstatic.net/1000026602/product/dsc01217_8e642de669e545759dd9f9ebf330620f_master.jpg', 'Ao sieu dinh', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(15, 4, 'Quần Short Straight Red Details', 380000, 320000, 'https://product.hstatic.net/1000026602/product/dsc01217_8e642de669e545759dd9f9ebf330620f_master.jpg', 'Ao sieu dinh', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(16, 4, 'Quần Short Straight Red Details', 380000, 320000, 'https://product.hstatic.net/1000026602/product/dsc01217_8e642de669e545759dd9f9ebf330620f_master.jpg', 'Ao sieu dinh', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(17, 4, 'Quần Short Straight Red Details', 380000, 320000, 'https://product.hstatic.net/1000026602/product/dsc01217_8e642de669e545759dd9f9ebf330620f_master.jpg', 'Ao sieu dinh', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(18, 4, 'Quần Short Straight Red Details', 380000, 320000, 'https://product.hstatic.net/1000026602/product/dsc01217_8e642de669e545759dd9f9ebf330620f_master.jpg', 'Ao sieu dinh', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(19, 4, 'Quần Short Straight Red Details', 380000, 320000, 'https://product.hstatic.net/1000026602/product/dsc01217_8e642de669e545759dd9f9ebf330620f_master.jpg', 'Ao sieu dinh', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(20, 5, 'Quần Short Straight Red Details', 380000, 320000, 'https://product.hstatic.net/1000026602/product/dsc01217_8e642de669e545759dd9f9ebf330620f_master.jpg', 'Ao sieu dinh', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(21, 5, 'Quần Short Straight Red Details', 380000, 320000, 'https://product.hstatic.net/1000026602/product/dsc01217_8e642de669e545759dd9f9ebf330620f_master.jpg', 'Ao sieu dinh', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(22, 5, 'Quần Short Straight Red Details', 380000, 320000, 'https://product.hstatic.net/1000026602/product/dsc01217_8e642de669e545759dd9f9ebf330620f_master.jpg', 'Ao sieu dinh', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(23, 5, 'Quần Short Straight Red Details', 380000, 320000, 'https://product.hstatic.net/1000026602/product/dsc01217_8e642de669e545759dd9f9ebf330620f_master.jpg', 'Ao sieu dinh', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(24, 6, 'Quần Short Straight Red Details', 380000, 320000, 'https://product.hstatic.net/1000026602/product/dsc01217_8e642de669e545759dd9f9ebf330620f_master.jpg', 'Ao sieu dinh', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(25, 6, 'Quần Short Straight Red Details', 380000, 320000, 'https://product.hstatic.net/1000026602/product/dsc01217_8e642de669e545759dd9f9ebf330620f_master.jpg', 'Ao sieu dinh', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(26, 6, 'Quần Short Straight Red Details', 380000, 320000, 'https://product.hstatic.net/1000026602/product/dsc01217_8e642de669e545759dd9f9ebf330620f_master.jpg', 'Ao sieu dinh', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(27, 6, 'Quần Short Straight Red Details', 380000, 320000, 'https://product.hstatic.net/1000026602/product/dsc01217_8e642de669e545759dd9f9ebf330620f_master.jpg', 'Ao sieu dinh', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0);
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'User'),
(2, 'Admin');


--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `deleted` int(11) NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `fullname`, `email`, `phone`, `address`, `password`, `role_id`, `deleted`, `avatar`) VALUES
(46, 'admin', 'admin@gmail.com', '0388542487', 'Cao Bang', '123456', 2, 0, 'https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png'),
(50, 'User 1', 'user1@gmail.com', '0388542487', 'An giang', '123456', 1, 0, 'https://cdn1.iconfinder.com/data/icons/people-avatars-23/24/people_avatar_head_spiderman_marvel_spider_man-512.png'),
(51, 'User 2', 'user2@gmail.com', '0388542487', 'Lang Son', '123456', 1, 0, 'https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userreview` (`user_id`),
  ADD KEY `productreview` (`product_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orderSuccess` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `a` (`order_id`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paymentUserid` (`user_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);


--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `productreview` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `userreview` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orderSuccess` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `a` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `paymentUserid` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
