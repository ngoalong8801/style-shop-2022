-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th12 07, 2022 lúc 03:43 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop_ltw`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Shirt'),
(2, 'Pant'),
(3, 'Shoe'),
(4, 'Hat'),
(5, 'Glass'),
(6, 'Acccessories');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `note` varchar(500) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`id`, `note`, `user_id`, `product_id`, `created_at`, `updated_at`, `status`) VALUES
(56, '12', 50, 2, '2022-12-04 10:33:05', '2022-12-04 10:33:05', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `address` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `total_money` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `fullname`, `email`, `phone`, `user_id`, `status`, `deleted`, `address`, `created_at`, `total_money`) VALUES
(60, 'Nguyễn Minh Phú', 'phu.nguyen0808@hcmut.edu.vn', '0912752653', 50, 0, 0, 'Số 42 Khu Phước Trung', '2022-11-25 02:39:01', 760000),
(61, 'Nguyễn Minh Phú', 'ngoa@gmail.com', '0912752653', 50, 0, 0, 'Số 42 Khu Phước Trung', '2022-11-25 02:40:44', 760000),
(62, 'Nguyễn Minh Phú', 'user1@gmail.com', '0912752653', 50, 0, 0, 'Số 42 Khu Phước Trung', '2022-12-04 10:38:16', 640000);

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

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `price`, `num`, `total_money`) VALUES
(103, 61, 3, 380000, 1, 380000),
(104, 61, 4, 380000, 1, 380000),
(105, 62, 10, 320000, 2, 640000);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(350) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `photo` varchar(500) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `category_id`, `title`, `price`, `discount`, `photo`, `description`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 1, 'Áo Thun Wash Support Friends', 300000, 270000, 'https://product.hstatic.net/1000026602/product/dsc02413_12f68b68be2e47cbb090f08b97b470d3_master.jpg', 'Thun cotton lụa 4 chiều 100% dày mềm mịn, đường may đẹp, chắc chắn, đảm bảo k bông tróc', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(2, 1, 'Áo Thun Wash Air Balloon', 300000, 270000, 'https://product.hstatic.net/1000026602/product/dsc01629_8ca46e4f5a5c41caaa1044769854acc5_master.jpg', 'Thun cotton lụa 4 chiều 100% dày mềm mịn, đường may đẹp, chắc chắn, đảm bảo k bông tróc', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(3, 1, 'Áo Thun Face Art Black', 250000, 220000, 'https://product.hstatic.net/1000026602/product/dsc00202_873d475a509b485692c7d00f4cb21721_master.jpg', 'Thun cotton lụa 4 chiều 100% dày mềm mịn, đường may đẹp, chắc chắn, đảm bảo k bông tróc', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(4, 1, 'Set T-shirt Easy Wear Diagonal', 380000, 320000, 'https://product.hstatic.net/1000026602/product/dsc02779_ae1be413a0234f2e8510a2a8b142dc15_master.jpg', 'Thun cotton lụa 4 chiều 100% dày mềm mịn, đường may đẹp, chắc chắn, đảm bảo k bông tróc', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(5, 2, 'Quần Short Straight Red Details', 380000, 320000, 'https://product.hstatic.net/1000026602/product/dsc01217_8e642de669e545759dd9f9ebf330620f_master.jpg', 'Khả năng kháng khuẩn tốt, không hóa chất độc hại giúp bạn hoàn toàn thoải mái và dễ chịu khi mặc', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(6, 2, 'Quần Short Relaxed Linen BWG', 230000, 210000, 'https://product.hstatic.net/1000026602/product/img_2052_dbde9c6567c74817907a3e820fae0134_master.jpg', 'Khả năng kháng khuẩn tốt, không hóa chất độc hại giúp bạn hoàn toàn thoải mái và dễ chịu khi mặc', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(7, 2, 'Quần Short Basic String Series', 300000, 280000, 'https://product.hstatic.net/1000026602/product/dsc04123_00476e44839b44aeb535edb3175f330d_master.jpg', 'Khả năng kháng khuẩn tốt, không hóa chất độc hại giúp bạn hoàn toàn thoải mái và dễ chịu khi mặc', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(8, 2, 'Quần Short Straight Red Details', 380000, 320000, 'https://product.hstatic.net/1000026602/product/dsc01217_8e642de669e545759dd9f9ebf330620f_master.jpg', 'Khả năng kháng khuẩn tốt, không hóa chất độc hại giúp bạn hoàn toàn thoải mái và dễ chịu khi mặc', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(9, 3, 'Giày 33Y Trend Paint White', 780000, 690000, 'https://product.hstatic.net/1000026602/product/img_2827_0e14152f31e44f04acb56d0f631790ac_master.jpg', 'Thiết kế đẹp, chạy theo mốt, trọnglượng nhẹ, đế giày êm, chất vải bền và thoáng khí', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(10, 3, 'Dép Embossed Dots Black', 320000, 280000, 'https://product.hstatic.net/1000026602/product/dsc01217_8e642de669e545759dd9f9ebf330620f_master.jpg', 'Thiết kế đẹp, chạy theo mốt, trọnglượng nhẹ, đế giày êm, chất vải bền và thoáng khí', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(11, 3, 'Giày Creamy Grained Basic', 880000, 820000, 'https://product.hstatic.net/1000026602/product/aaaa_c2e22338710249fea1fdbb8b2cb00435_master.jpg', 'Thiết kế đẹp, chạy theo mốt, trọnglượng nhẹ, đế giày êm, chất vải bền và thoáng khí', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(12, 3, 'Giày BWO Air Line 3307', 800000, 780000, 'https://product.hstatic.net/1000026602/product/img_5162_6708f00b34d8453fbe73eabcea9fb58d_master.jpg', 'Thiết kế đẹp, chạy theo mốt, trọnglượng nhẹ, đế giày êm, chất vải bền và thoáng khí', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(13, 3, 'Giày 33Y Trend BYR Oni Art', 790000, 700000, 'https://product.hstatic.net/1000026602/product/img_2829_f418f984db5c4ad4b5bb2beb5d95a12b_master.jpg', 'Thiết kế đẹp, chạy theo mốt, trọnglượng nhẹ, đế giày êm, chất vải bền và thoáng khí', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(14, 3, 'Giày Cream Rubber Sole 7135', 850000, 830000, 'https://product.hstatic.net/1000026602/product/img_3573_1e1c304c6f5549ed9094d0335c63f579_master.jpg', 'Thiết kế đẹp, chạy theo mốt, trọnglượng nhẹ, đế giày êm, chất vải bền và thoáng khí', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(15, 4, 'Nón Basic Tattered Cap', 230000, 200000, 'https://product.hstatic.net/1000026602/product/dsc09780_d0e69dd11a224fea9b3171fbdf0d2b1d_master.jpg', 'Form mũ chuẩn đẹp, đường may vô cùng tỉ mỉ và chắc chắn hài lòng mọi khách hàng.', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(16, 4, 'Nón Jean Snapback Cap', 250000, 220000, 'https://product.hstatic.net/1000026602/product/dsc09166_af8ddf4942ed4107a835b131120ebdfb_master.jpg', 'Form mũ chuẩn đẹp, đường may vô cùng tỉ mỉ và chắc chắn hài lòng mọi khách hàng.', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(17, 4, 'Nón Trendy Beige Cap', 207000, 202000, 'https://product.hstatic.net/1000026602/product/dsc06120_22ea4b864d3d4d4f9fed4a6a8b8265da_master.jpg', 'Form mũ chuẩn đẹp, đường may vô cùng tỉ mỉ và chắc chắn hài lòng mọi khách hàng.', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(18, 4, 'Nón Bucket BB Mono Pattern', 240000, 220000, 'https://product.hstatic.net/1000026602/product/img_6860_159df8d6296c4ffab2f6a99fe78dd43e_master.jpg', 'Form mũ chuẩn đẹp, đường may vô cùng tỉ mỉ và chắc chắn hài lòng mọi khách hàng.', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(19, 4, 'Nón Gun Phối Dây', 120000, 100000, 'https://product.hstatic.net/1000026602/product/103517794_624437811759138_3377662712654889926_o_a5c37a8f860b4a82bdad4f1796348fdd_master.jpg', 'Form mũ chuẩn đẹp, đường may vô cùng tỉ mỉ và chắc chắn hài lòng mọi khách hàng.', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(20, 5, 'Kính Aviator Square Red', 350000, 320000, 'https://product.hstatic.net/1000026602/product/img_9137_6dc6668b400a4ce782954391e20fe01f_master.jpg', 'Sản xuất bởi những vật liệu cao cấp với gọng kính được bo tròn tinh tế và trang nhã.', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(21, 5, 'Kính Aviator Square Green', 330000, 300000, 'https://product.hstatic.net/1000026602/product/z3479084663661_6a7f7c16fe20ae341730e72812a412e3_41b8471c459c4373a99465c79e40041f_master.jpg', 'Sản xuất bởi những vật liệu cao cấp với gọng kính được bo tròn tinh tế và trang nhã.', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(22, 5, 'Kính Aviator Square Gold', 310000, 290000, 'https://product.hstatic.net/1000026602/product/img_9130_93f3d0ebdca54984ba9372a743f9bb45_master.jpg', 'Sản xuất bởi những vật liệu cao cấp với gọng kính được bo tròn tinh tế và trang nhã.', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(23, 5, 'Kính Alumagne Silver', 320000, 280000, 'https://product.hstatic.net/1000026602/product/9_12ec1e9c5c044accb3f4637d5685e894_master.jpg', 'Sản xuất bởi những vật liệu cao cấp với gọng kính được bo tròn tinh tế và trang nhã.', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(24, 6, 'Gift Box', 50000, 320000, 'https://product.hstatic.net/1000026602/product/z3845759687933_de9b0ee058a350c47c44858af5754b61_532c2376cf5e4265ab4367519504d553_master.jpg', 'Miễn phí giao hàng với đơn hàng trên 500.000₫', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(25, 6, 'Khăn Vuông Quotes Black', 70000, 50000, 'https://product.hstatic.net/1000026602/product/img_3918_aed5645f8e214950ab5a24a4bed7dc9d_master.jpg', 'Miễn phí giao hàng với đơn hàng trên 500.000₫', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(26, 6, 'Ví Monogram', 380000, 350000, 'https://product.hstatic.net/1000026602/product/img_0465_6d4934db448e4b3ea5d19020e6240300_master.jpg', 'Miễn phí giao hàng với đơn hàng trên 500.000₫', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0),
(27, 6, 'Ví Embossed Black', 350000, 330000, 'https://product.hstatic.net/1000026602/product/img_3155_0e816d17eb7b48cf9b77732381ec13ed_master.jpg', 'Miễn phí giao hàng với đơn hàng trên 500.000₫', '2022-11-08 07:38:15', '2022-11-08 07:38:15', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'User'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `deleted` int(11) NOT NULL,
  `avatar` varchar(255) DEFAULT 'https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png'
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

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