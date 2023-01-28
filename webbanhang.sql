-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 03, 2022 lúc 11:16 AM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webbanhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `deleted`) VALUES
(14, 'JACKETS', 0),
(15, 'TROUSERS', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`id`, `firstname`, `lastname`, `email`, `phone`, `subject_name`, `note`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Nguyễn Thanh', 'Hải', 'hainguyen@gmail.com', '0392136898', 'Chủ đề 1', 'Không có', '2021-11-09 15:13:03', '2021-11-09 17:14:47', 1),
(2, 'Hoàng Ngọc', 'Đại', 'ngocdai@gmail.com', '0944863136', 'Chủ đề 2', 'Không có', '2021-11-09 21:14:50', '2021-11-09 15:33:11', 1),
(3, 'Phạm Văn', 'Cương', 'phamcuong@gmail.com', '0969688924', 'chủ đề 3', 'Không có', '2021-11-09 21:14:50', '2021-11-09 21:14:50', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `galery`
--

CREATE TABLE `galery` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `img` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fullname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `total_money` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fullname`, `email`, `phone`, `address`, `note`, `order_date`, `status`, `total_money`) VALUES
(1, 6, 'Nguyễn Thanh Hải', 'hainguyen@gmail.com', '0392136898', 'Nghệ An', 'Không có', '2021-11-09 20:58:33', 1, 1000000),
(2, 7, 'Hoàng Ngọc Đại', 'ngocdai@gmail.com', '0944863136', 'Thanh Hóa', 'Không có', '2021-11-09 20:58:33', 2, 600000);

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
(1, 1, 29, 500000, 1, 500000),
(2, 1, 30, 500000, 1, 500000),
(3, 2, 28, 600000, 1, 600000);

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
  `thumbnail` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `category_id`, `title`, `price`, `discount`, `thumbnail`, `description`, `created_at`, `updated_at`, `deleted`) VALUES
(26, 14, 'Linen Granddad Shirt', 400000, 200000, 'assets/image/ao1.jpg', '<p>cotton</p>', '2021-11-09 03:23:12', '2021-11-09 03:23:12', 0),
(27, 15, 'Tropical Worsted Proper Trouser', 500000, 300000, 'assets/image/quan1.jpg', '<p>cotton</p>', '2021-11-09 03:46:12', '2021-11-09 03:46:12', 0),
(28, 14, 'Cotton Canvas Work', 600000, 450000, 'assets/image/ao2.jpg', '<p>cotton</p>', '2021-11-09 03:07:13', '2021-11-09 03:07:13', 0),
(29, 14, 'Aiwe Granddad Jacket', 500000, 300000, 'assets/image/ao4.jpg', '<p>cotton</p>', '2021-11-09 03:42:13', '2021-11-09 03:42:13', 0),
(30, 15, 'Cotton Airweave Proper Trouser', 300000, 200000, 'assets/image/quan2.jpg', '<p>cotton</p>', '2021-11-09 03:07:14', '2021-11-09 03:07:14', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tokens`
--

CREATE TABLE `tokens` (
  `USER_id` int(11) NOT NULL,
  `token` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tokens`
--

INSERT INTO `tokens` (`USER_id`, `token`, `created_at`) VALUES
(3, '0a48e892a8de75a07118bbaf59f46924', '2021-11-02 13:50:22'),
(3, '4fe938c9ca00f4b9213d08c6b6dace3b', '2021-11-02 10:52:36'),
(3, '5274a3ed7ca4bc9db8aa111e08d64d81', '2021-11-02 13:42:56'),
(3, '8e442800e1454ce41d1d0b49ea6cc9ab', '2021-11-02 11:00:17'),
(7, '1d197ef0a7befe7ffbe58d764401e16d', '2021-11-10 10:23:41'),
(7, '7139b849976dee248ea979e63c8e873c', '2021-11-07 15:21:15'),
(7, '7fd9c8cc59497d538b66aee7949d732f', '2021-11-02 15:38:03'),
(7, 'a5e4b8fbaf4f50e2afb38bad92f4bba1', '2021-11-02 15:38:35'),
(7, 'a94193c962f9f62c079d3dfa637267fc', '2021-11-02 15:35:13'),
(7, 'b7cd0992bdf9e7d28cb2744c9a47e775', '2021-11-07 15:34:10'),
(7, 'e8187abab7971347749a51774bb574b4', '2021-11-07 15:19:47'),
(9, 'd7e3260c1ad330ff94279d59d31b3d0d', '2021-11-07 15:34:50'),
(10, '5ab051c578959ec2997c8ce44e20c81a', '2021-11-07 16:11:35'),
(11, '13b190b15aac7e60590cb2a08695d289', '2021-11-10 10:25:38');

-- --------------------------------------------------------

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
  `deleted` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `fullname`, `email`, `phone`, `address`, `password`, `role_id`, `deleted`, `created_at`, `updated_at`) VALUES
(3, 'Nguyễn Đức Anh Cường', 'cuong2k1@gmail.com', NULL, NULL, 'aa7ce63a53e2b74e37bf83731625cd6d', 2, 1, '2021-11-02 03:11:33', '2021-11-09 15:30:39'),
(4, 'Cường Nguyễn', 'cuong@gmail.com', NULL, NULL, 'aa7ce63a53e2b74e37bf83731625cd6d', 2, 0, '2021-11-02 03:11:47', '2021-11-02 03:11:47'),
(5, 'Cường Nguyễn', 'cuong22@gmail.com', NULL, NULL, '0cc7281b1f8467c4ede8219d7ae27c51', 2, 1, '2021-11-02 04:55:42', '2021-11-02 16:07:06'),
(6, 'Ngọc Đại', 'Dai@gmail.com', NULL, NULL, '1166703d1a56c6b4d1d4a9f91a54d665', 2, 0, '2021-11-02 10:02:26', '2021-11-02 10:02:26'),
(7, 'Cương', 'pc0147258@gmail.com', '01647048824', 'Ứng Hòa', 'aa7ce63a53e2b74e37bf83731625cd6d', 1, 0, '2021-11-02 15:35:04', '2021-11-02 15:43:14'),
(9, 'a', 'abcde@gmail.com', NULL, NULL, 'aa7ce63a53e2b74e37bf83731625cd6d', 2, 0, '2021-11-07 15:34:43', '2021-11-07 15:34:43'),
(10, 'ad', 'ad@gmail.com', NULL, NULL, 'e264d10704a2e0c3f2ae39eb945acafe', 2, 0, '2021-11-07 16:11:25', '2021-11-07 16:11:25'),
(11, 'Hải Nguyễn', 'hainguyen@gmail.com', NULL, NULL, 'aa7ce63a53e2b74e37bf83731625cd6d', 2, 0, '2021-11-10 10:25:30', '2021-11-10 10:25:30');

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
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `galery`
--
ALTER TABLE `galery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

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
-- Chỉ mục cho bảng `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`USER_id`,`token`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `galery`
--
ALTER TABLE `galery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `galery`
--
ALTER TABLE `galery`
  ADD CONSTRAINT `galery_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

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
