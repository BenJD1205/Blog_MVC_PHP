-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 25, 2021 lúc 04:57 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `pdo_blog`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'ben', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_post`
--

CREATE TABLE `category_post` (
  `id_category_post` int(11) UNSIGNED NOT NULL,
  `title_category_post` varchar(100) NOT NULL,
  `desc_category_post` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category_post`
--

INSERT INTO `category_post` (`id_category_post`, `title_category_post`, `desc_category_post`) VALUES
(1, 'Kinh tế trong nước ', 'Kinh tế suy giảm vì dịch bệnh'),
(2, 'Tin trong nước', 'Kinh tế suy giảm vì dịch bệnh'),
(3, 'Tin ngoài nước', 'Kinh tế suy giảm vì dịch bệnh trầm trọng'),
(5, 'Kinh tế ngoài nước', 'Kinh tế ngoài nước chật vật đang tìm cơ hồi thoát khỏi khó khăn'),
(6, 'Công nghệ tương lai', 'Cập nhật công nghệ mới nhất ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_product`
--

CREATE TABLE `category_product` (
  `id_category_product` int(11) UNSIGNED NOT NULL,
  `title_category_product` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category_product`
--

INSERT INTO `category_product` (`id_category_product`, `title_category_product`, `description`) VALUES
(24, 'Macbook', 'Siêu rẻ siêu xịn '),
(25, 'Điện thoại', 'Các hãng điện thoại nổi tiếng siêu bền'),
(26, 'Phụ kiện điện tử', 'Phụ kiện siêu xịn siêu rẻ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `custom`
--

CREATE TABLE `custom` (
  `custom_id` int(11) NOT NULL,
  `custom_name` varchar(255) NOT NULL,
  `custom_phone` varchar(100) NOT NULL,
  `custom_email` varchar(200) NOT NULL,
  `custom_password` varchar(100) NOT NULL,
  `custom_address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `custom`
--

INSERT INTO `custom` (`custom_id`, `custom_name`, `custom_phone`, `custom_email`, `custom_password`, `custom_address`) VALUES
(1, 'Quốc Anh', '0937713404', '123@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'phạm hùng'),
(2, 'Phúc', '09301293123', 'phuc@gmail.com', '886d057a091559e2f5dff95d1d01360b', 'Lũy Bán Bích');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `order_details_id` int(11) NOT NULL,
  `order_code` varchar(100) NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `sdt` varchar(200) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `noidung` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`order_details_id`, `order_code`, `product_id`, `product_quantity`, `name`, `sdt`, `diachi`, `email`, `noidung`) VALUES
(6, '2307', 8, 1, 'Sầm Quốc Anh', '0937713404', 'Phạm Hùng', '123@gmail.com', 'aaaaa'),
(7, '4029', 7, 2, 'Triệu Nhiệt Thanh', '0323190321', '132 Lũy Bán Bích', 'thanhtrang@gmail.com', 'thanh ơi'),
(8, '4029', 11, 1, 'Triệu Nhiệt Thanh', '0323190321', '132 Lũy Bán Bích', 'thanhtrang@gmail.com', 'thanh ơi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `id_post` int(11) NOT NULL,
  `title_post` varchar(100) NOT NULL,
  `content_post` text NOT NULL,
  `image_post` varchar(200) NOT NULL,
  `id_category_post` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`id_post`, `title_post`, `content_post`, `image_post`, `id_category_post`) VALUES
(1, 'Singapore - Hình mẫu mở cửa của châu Á', 'Nguyên nhân dẫn đến hố sâu vaccine quá lớn như vậy được cho là bắt nguồn ngay từ định hướng đầu tiên trong phát triển và phân phối vaccine. Các quan chức, chủ yếu đến từ Mỹ và châu Âu, thừa nhận rằng họ chưa bao giờ nghĩ đến bài toán vaccine toàn cầu, mà chủ yếu tập trung phát triển vaccine cho nhu cầu trong nước.', 'simg1626835839.jpg', 3),
(2, 'TP HCM yêu cầu lập khu cách ly F0 không triệu chứng', 'Trường hợp áp dụng là các F0 (có kết quả xét nghiệm nhanh kháng nguyên hoặc xét nghiệm PCR dương tính) và không có triệu chứng lâm sàng; không bệnh lý nền hoặc có bệnh lý nền nhưng đã được điều trị ổn định, không béo phì.', 'tphcm1626846381.jpg', 2),
(4, 'Người dân TP HCM đi tiêm vaccine đợt 5', 'Sáng 22/7, trời mưa lớn nhưng ông Hồng Minh Hải, 72 tuổi, vẫn chạy xe máy hơn 7 km từ phường Bình An, TP Thủ Đức, đến Bệnh viện Lê Văn Thịnh ở phường Bình Trưng Tây lúc 8h để kịp giờ tiêm đã hẹn. Tối qua, ông được cán bộ khu phố gọi điện thông báo tiêm vaccine sau một tuần đăng ký.', 'oke1626944846.jpg', 2),
(5, 'CDC Hà Nội: \'Mầm bệnh vẫn lẩn khuất bên ngoài các ổ dịch’', 'Ông Khổng Minh Tuấn, Phó giám đốc Trung tâm Kiểm soát bệnh tật Hà Nội, nhận định số người ho sốt chưa rõ nguyên nhân đăng ký xét nghiệm Covid-19 trong hai ngày qua còn ít, mầm bệnh vẫn lẩn khuất cộng đồng.', 'hehe1626944923.jpg', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id_product` int(11) UNSIGNED NOT NULL,
  `title_product` varchar(255) NOT NULL,
  `price_product` varchar(100) NOT NULL,
  `desc_product` text NOT NULL,
  `quantity_product` int(11) NOT NULL,
  `image_product` varchar(100) NOT NULL,
  `id_category_product` int(11) UNSIGNED NOT NULL,
  `product_hot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id_product`, `title_product`, `price_product`, `desc_product`, `quantity_product`, `image_product`, `id_category_product`, `product_hot`) VALUES
(3, 'Iphone', '200000', 'Iphone giá rẻ', 1, 'ss1626693916.jpg', 20, 0),
(4, 'Macbook Air 12', '30000000', 'Siêu đẹp siêu mỏng', 5, 'Mac1626795899.png', 18, 0),
(5, 'Iphone 11 ', '1400000', '6.1\", Liquid Retina HD, IPS LCD, 828 x 1792 Pixel\r\n\r\n12.0 MP + 12.0 MP\r\n\r\n12.0 MP\r\n\r\nA13 Bionic\r\n\r\n64 GB', 1, 'iphone1626829406.jpg', 23, 0),
(6, 'Đồng hồ thông minh smart watch', '2000000', 'Siêu thông minh siêu đẹp', 1, 'watch1626919294.png', 26, 0),
(7, 'Macbook', '34000000', 'Siêu mỏng điền viền tràn màn hình ', 1, 'Mac1626920751.png', 24, 1),
(8, 'Iphone 12', '20000000', 'Mới ra mắt điền viền tràn màn hình', 1, 'iphone1626920817.jpg', 25, 1),
(9, 'Sam sung A7 ', '12000000', 'Sam sun với đường viền cực đỉnh và camera với độ phân giải cao', 1, 'ss1626936463.jpg', 25, 0),
(10, 'Oppo Reno 5 ', '9000000', 'Camera siêu xịn xò ', 1, 'oppo1626936555.png', 25, 1),
(11, 'Macbook Pro', '54000000', '\r\n13.3\", 2560 x 1600 Pixel, IPS, IPS LCD LED Backlit, True Tone\r\n\r\nIntel Core i5-10th-gen\r\n\r\n16 GB, LPDDR4X, 3733 MHz\r\n\r\nSSD 1 TB\r\n\r\nIntel Iris Plus Graphics', 1, 'macpro1626998379.png', 24, 1),
(12, 'Tai nghe', '5000000', 'Trong thế giới phụ kiện âm thanh nói chung và tai nghe nói riêng, Sony luôn là một trong những thương hiệu dẫn đầu. Nếu năm 2018, hãng cho ra mắt chiếc Sony WH-1000XM3 được đông đảo người dùng đón nhận. Thì năm nay 2020, Sony WH-1000XM4 phụ kiện tai nghe rất đáng để trải nghiệm', 1, 'tainghe1627001334.png', 26, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `order_code` varchar(100) NOT NULL,
  `order_date` varchar(100) NOT NULL,
  `order_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `order_code`, `order_date`, `order_status`) VALUES
(7, '8212', '23/08/2021 09:38:48pm', 0),
(8, '8306', '23/08/2021 09:39:20pm', 0),
(9, '2307', '23/08/2021 09:40:57pm', 0),
(10, '4029', '23/08/2021 09:44:24pm', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `category_post`
--
ALTER TABLE `category_post`
  ADD PRIMARY KEY (`id_category_post`);

--
-- Chỉ mục cho bảng `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id_category_product`);

--
-- Chỉ mục cho bảng `custom`
--
ALTER TABLE `custom`
  ADD PRIMARY KEY (`custom_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_category_post` (`id_category_post`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_category_product` (`id_category_product`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `category_post`
--
ALTER TABLE `category_post`
  MODIFY `id_category_post` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id_category_product` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `custom`
--
ALTER TABLE `custom`
  MODIFY `custom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `category_product`
--
ALTER TABLE `category_product`
  ADD CONSTRAINT `category_product_ibfk_1` FOREIGN KEY (`id_category_product`) REFERENCES `product` (`id_category_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id_product`);

--
-- Các ràng buộc cho bảng `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`id_category_post`) REFERENCES `category_post` (`id_category_post`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
