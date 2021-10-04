-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 30, 2021 lúc 01:02 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webdemo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `role_id`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1),
(13, 'nampham', 'e10adc3949ba59abbe56e057f20f883e', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `customer_id`, `order_status`) VALUES
(70, 1, 'processing'),
(71, 13, 'processing');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(15, 'mouse'),
(16, 'keyboard'),
(17, 'desktop');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `order_total` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_img` varchar(255) NOT NULL,
  `product_price` int(11) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`id`, `order_id`, `order_total`, `product_name`, `product_img`, `product_price`, `quantity`) VALUES
(102, 70, '30', 'BÀN PHÍM CƠ LOGITECH G PRO X RGB LIGHTSYNC GX CLICKY BLUE SWITCH', '49500_ban_phim_co_logitech_g_pro_x_rgb_lightsync_mechanical_gx_blue_switch_gaming_keyboard_0001_1.jpg', 30, '1'),
(103, 70, '200', 'Màn hình LG UltraGear 27 inch 27GL650F-B', '10047269-man-hinh-lg-ultragear-27-inch-27gl650f-b-1_igvd-jl.jpg', 200, '2'),
(124, 71, '200', 'Màn hình LG UltraGear 27 inch 27GL650F-B', '10047269-man-hinh-lg-ultragear-27-inch-27gl650f-b-1_igvd-jl.jpg', 200, '2'),
(125, 71, '30', 'BÀN PHÍM CƠ LOGITECH G PRO X RGB LIGHTSYNC GX CLICKY BLUE SWITCH', '49500_ban_phim_co_logitech_g_pro_x_rgb_lightsync_mechanical_gx_blue_switch_gaming_keyboard_0001_1.jpg', 30, '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `product_detail` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `product_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `product_name`, `price`, `product_detail`, `category_id`, `product_img`) VALUES
(26, 'BÀN PHÍM CƠ LOGITECH G PRO X RGB LIGHTSYNC GX CLICKY BLUE SWITCH', 30, 'Bàn phím cơ học chơi game Logitech G PRO làm tăng tốc độ và độ chính xác để chiến thắng đối thủ của bạn. Với các phím cơ học cấp độ chuyên nghiệp với độ chính xác cao và Cáp USB có thể tháo rời mang đến một bàn phím không dây vô cùng tiện lợi.', 16, '49500_ban_phim_co_logitech_g_pro_x_rgb_lightsync_mechanical_gx_blue_switch_gaming_keyboard_0001_1.jpg'),
(27, 'Màn hình LG UltraGear 27 inch 27GL650F-B', 200, '	Công nghệ AMD RADEON FreeSync cho khung hình ổn định Tích hợp chế độ tiết kiệm năng lượng thông minh, hữu dụng Trang bị chế độ Flicker Safe và đọc sách, bảo vệ mắt tối đa Công nghệ HDR10 giúp hình ảnh được sống động, sắc nét Tần số quét 144Hz cho khả năn', 17, '10047269-man-hinh-lg-ultragear-27-inch-27gl650f-b-1_igvd-jl.jpg'),
(28, 'Chuột có dây gaming Logitech G102 Gen 2 LIGHTSYNC RGB', 10, 'Được các game thủ trên thế giới yêu thích và là món đồ ưa chuộng của những người chơi thể thao điện tử chuyên nghiệp, là kiểu thiết kế quen thuộc cùng tối ưu hóa từ trong ra ngoài để đạt độ linh hoạt và sự thoải mái trong sử dụng hàng ngày.', 15, 'chuot-co-day-gaming-logitech-g102-lightsync-rgb.png'),
(29, 'Chuột Gaming Logitech G102 Gen 2 Lightsync', 15, 'Chuột gaming Logitech G102 Gen2 Lightsync có một thiết kế hiện đại, cao cấp. Sở hữu công nghệ LIGHTSYNC, cảm biến DPI cao và 6 nút tiện lợi giúp bạn dễ dàng sử dụng làm việc và chơi game hơn. Chuột gaming Logitech G102 Gen2 Lightsync Độ chính xác cao Được', 15, 'unnamed.webp'),
(30, 'Bàn phím cơ Rapoo Gaming V806', 150, 'Bàn phím cơ Rapoo Gaming V806 LED RGB được thiết kế và sản xuất bởi hãng Rapoo – công ty chuyên về thiết kế, phát triển và sản xuất các thiết bị ngoại vi như chuột, bàn phím, tai nghe chuyên dùng cho gaming đang được các game thủ Việt Nam ưa chuộng trong ', 16, 'unnamed (1).webp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `role_name`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `account` (`id`);

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `cart` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
