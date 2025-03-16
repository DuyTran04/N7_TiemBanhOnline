-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2025 at 06:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banbanh`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `remember_token` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(50) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT 'customer',
  `status` tinyint(1) DEFAULT 1 COMMENT '1 là ok, 0 bị khóa',
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `fname`, `lname`, `email`, `phone`, `password`, `remember_token`, `province`, `address`, `role`, `status`, `created_at`, `updated_at`) VALUES
(11, 'Duy', 'Tran', 'trandinhanhduy2004@gmail.com', '0868076408', '25f9e794323b453885f5181f1b624d0b', '', 'Gia Lai', '554 Cộng Hòa', 'admin', 1, '2025-03-07', '2025-03-07'),
(12, 'A', 'Nguyễn Văn', 'adchanneltv2004@gmail.com', '0123456789', 'e10adc3949ba59abbe56e057f20f883e', '', 'Hồ Chí Minh', '04 Cù Chính Lan', 'customer', 1, '2025-03-16', '2025-03-16');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `site` varchar(255) DEFAULT 'home',
  `description` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1 COMMENT '1 là hiển thị, 0 ẩn',
  `priority` tinyint(4) DEFAULT 1,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `name`, `image`, `site`, `description`, `status`, `priority`, `created_at`, `updated_at`) VALUES
(22, 'Home banner', 'bannerwtext-center.png', 'Home', 'Home banner', 1, 1, '2025-03-08', '2025-03-08'),
(23, 'Banner home 2', '360_F_952786811_oAEGJctfVOHBQy4KJE9v8xDcSn7ZoDWX.jpg', 'Home', 'home 2', 1, 1, '2025-03-08', '2025-03-08'),
(24, 'AboutBanner', 'wheatbg1.png', 'About', 'AboutBanner', 1, 1, '2025-03-08', '2025-03-08'),
(25, 'ProductBanner', 'banner-2.png', 'Product', 'PB', 1, 1, '2025-03-08', '2025-03-08'),
(26, 'DetailBanner', 'banner-3.png', 'Product Detail', 'DB', 1, 1, '2025-03-08', '2025-03-08'),
(27, 'ContactBanner', 'banner-4.png', 'Contact', '', 1, 1, '2025-03-08', '2025-03-08'),
(28, 'CartBanner', 'banner-6.png', 'Cart', '', 1, 1, '2025-03-08', '2025-03-08');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` tinyint(1) DEFAULT 1 COMMENT '1 là hiển thị, 0 ẩn',
  `priority` tinyint(4) DEFAULT 1,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `status`, `priority`, `created_at`, `updated_at`) VALUES
(22, 'Bánh Mì', 1, 1, '2025-03-08', '2025-03-08'),
(23, 'Bột mì làm bánh', 1, 1, '2025-03-08', '2025-03-08'),
(24, 'Pudding', 1, 1, '2025-03-08', '2025-03-08'),
(25, 'Bánh kem', 1, 1, '2025-03-08', '2025-03-08'),
(26, 'Cupcake', 1, 1, '2025-03-08', '2025-03-08');

-- --------------------------------------------------------

--
-- Table structure for table `chatbot_conversations`
--

CREATE TABLE `chatbot_conversations` (
  `id` int(11) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `user_message` text NOT NULL,
  `bot_response` text NOT NULL,
  `context` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chatbot_conversations`
--

INSERT INTO `chatbot_conversations` (`id`, `session_id`, `user_message`, `bot_response`, `context`, `created_at`) VALUES
(1, 'chat_67d6d2014c0da7.57998369', 'sản phẩm mới nhất', 'Tiệm Bánh có nhiều loại bánh như bánh mì, bánh ngọt, bánh kem, cupcake và nhiều loại khác. Bạn có thể xem toàn bộ sản phẩm tại mục Sản phẩm.', '', '2025-03-16 20:28:33'),
(2, 'chat_67d6d2014c0da7.57998369', 'gợi ý bánh cho tôi', 'Đây là các sản phẩm mới nhất của chúng tôi:\n1. Bột lúa mì - $0.01\n2. Bột lúa mạch đen - $0.01\n3. Bánh mì nướng kiểu Pháp - $2.00\n4. Blueberry cake - $5.00\n5. Matcha cupcake - $0.01\n\nBạn có thể xem chi tiết các sản phẩm trong mục Sản phẩm.', '', '2025-03-16 20:28:36'),
(3, 'chat_67d6d2014c0da7.57998369', 'gợi ý bánh cho tôi', 'Đây là các sản phẩm mới nhất của chúng tôi:\n1. Bột lúa mì - $0.01\n2. Bột lúa mạch đen - $0.01\n3. Bánh mì nướng kiểu Pháp - $2.00\n4. Blueberry cake - $5.00\n5. Matcha cupcake - $0.01\n\nBạn có thể xem chi tiết các sản phẩm trong mục Sản phẩm.', '', '2025-03-16 20:28:42'),
(4, 'chat_67d6d2014c0da7.57998369', 'tìm bánh kem', 'Bạn muốn tìm loại bánh nào? Hãy cho tôi biết tên hoặc loại bánh bạn đang tìm.', 'search_products_context', '2025-03-16 20:29:07'),
(5, 'chat_67d6d2014c0da7.57998369', 'blueberry', 'Xin lỗi, tôi không hiểu câu hỏi của bạn. Bạn có thể hỏi về sản phẩm, giao hàng, thanh toán hoặc địa chỉ cửa hàng.', '', '2025-03-16 20:29:32'),
(6, 'chat_67d6d2014c0da7.57998369', 'thanh toán', 'Tiệm Bánh chấp nhận thanh toán bằng tiền mặt, chuyển khoản ngân hàng và các ví điện tử phổ biến.', '', '2025-03-16 20:34:32'),
(7, 'chat_67d6d2014c0da7.57998369', 'địa chỉ', 'Tiệm Bánh tọa lạc tại Vincom Mall. Bạn có thể dễ dàng tìm thấy chúng tôi tại tầng trệt, khu vực ẩm thực.', '', '2025-03-16 20:34:39'),
(8, 'chat_67d6d2014c0da7.57998369', 'tên cửa hàng', 'Tiệm Bánh tọa lạc tại Vincom Mall. Bạn có thể dễ dàng tìm thấy chúng tôi tại tầng trệt, khu vực ẩm thực.', '', '2025-03-16 20:34:47'),
(9, 'chat_67d6d2014c0da7.57998369', 'địa chỉ số bao nhiêu', 'Chào bạn! Tiệm Bánh có thể giúp gì cho bạn hôm nay?', '', '2025-03-16 20:35:00'),
(10, 'chat_67d6d2014c0da7.57998369', 'tìm bánh kem', 'Bạn muốn tìm loại bánh nào? Hãy cho tôi biết tên hoặc loại bánh bạn đang tìm.', 'search_products_context', '2025-03-16 21:06:57'),
(11, 'chat_67d6d2014c0da7.57998369', 'tìm bánh kem', 'Bạn muốn tìm loại bánh nào? Hãy cho tôi biết tên hoặc loại bánh bạn đang tìm.', 'search_products_context', '2025-03-16 21:09:23'),
(12, 'chat_67d6d2014c0da7.57998369', 'tìm bánh kem', 'Bạn muốn tìm loại bánh nào? Hãy cho tôi biết tên hoặc loại bánh bạn đang tìm.', 'search_products_context', '2025-03-16 21:13:10'),
(13, 'chat_67d6d2014c0da7.57998369', 'blueberry', 'Kết quả tìm kiếm cho \'blueberry\':\n1. Blueberry cake - $5.00\n\nBạn có thể nhấp vào tên sản phẩm để xem chi tiết hoặc hỏi tôi thêm thông tin về sản phẩm.', '', '2025-03-16 21:13:14'),
(14, 'chat_67d6d2014c0da7.57998369', 'địa chỉ', 'Tiệm Bánh tọa lạc tại Vincom Mall. Bạn có thể dễ dàng tìm thấy chúng tôi tại tầng trệt, khu vực ẩm thực.', '', '2025-03-16 21:13:23'),
(15, 'chat_67d6d2014c0da7.57998369', 'dfsdf', 'Xin lỗi, tôi không hiểu câu hỏi của bạn. Bạn có thể hỏi về sản phẩm, giao hàng, thanh toán hoặc địa chỉ cửa hàng.', '', '2025-03-16 21:13:28'),
(16, 'chat_67d6d2014c0da7.57998369', 'yêu em', 'Xin lỗi, tôi không hiểu câu hỏi của bạn. Bạn có thể hỏi về sản phẩm, giao hàng, thanh toán hoặc địa chỉ cửa hàng.', '', '2025-03-16 21:13:33'),
(17, 'chat_67d6d2014c0da7.57998369', 'tôi yêu bạn hiền', 'Xin chào! Tôi là bot hỗ trợ của Tiệm Bánh. Tôi có thể giúp gì cho bạn?', '', '2025-03-16 21:13:42'),
(18, 'chat_67d6d2014c0da7.57998369', 'đăng nhập', 'Xin lỗi, tôi không hiểu câu hỏi của bạn. Bạn có thể hỏi về sản phẩm, giao hàng, thanh toán hoặc địa chỉ cửa hàng.', '', '2025-03-16 21:13:49'),
(19, 'chat_67d6d2014c0da7.57998369', 'tìm kiếm', 'Bạn muốn tìm loại bánh nào? Hãy cho tôi biết tên hoặc loại bánh bạn đang tìm.', 'search_products_context', '2025-03-16 21:22:33'),
(20, 'chat_67d6d2014c0da7.57998369', 'bánh pudding', 'Kết quả tìm kiếm cho \'bánh pudding\':\n1. Bánh Cà phê - $0.01\n2. Bánh mì nướng kiểu Pháp - $2.00\n\nBạn có thể nhấp vào tên sản phẩm để xem chi tiết hoặc hỏi tôi thêm thông tin về sản phẩm.', '', '2025-03-16 21:22:39'),
(21, 'chat_67d6d2014c0da7.57998369', 'bánh cà phê', 'Xin lỗi, tôi không hiểu câu hỏi của bạn. Bạn có thể hỏi về sản phẩm, giao hàng, thanh toán hoặc địa chỉ cửa hàng.', '', '2025-03-16 21:22:52'),
(22, 'chat_67d6d2014c0da7.57998369', 'tìm kiếm', 'Bạn muốn tìm loại bánh nào? Hãy cho tôi biết tên hoặc loại bánh bạn đang tìm.', 'search_products_context', '2025-03-16 21:22:57'),
(23, 'chat_67d6d2014c0da7.57998369', 'bánh cà phê', 'Kết quả tìm kiếm cho \'bánh cà phê\':\n1. Bánh Cà phê - $0.01\n\nBạn có thể nhấp vào tên sản phẩm để xem chi tiết hoặc hỏi tôi thêm thông tin về sản phẩm.', '', '2025-03-16 21:23:02'),
(24, 'chat_67d6d2014c0da7.57998369', 'em yêu', 'Xin lỗi, tôi không hiểu câu hỏi của bạn. Bạn có thể hỏi về sản phẩm, giao hàng, thanh toán hoặc địa chỉ cửa hàng.', '', '2025-03-16 21:26:45'),
(25, 'chat_67d6d2014c0da7.57998369', 'yêu', 'có', 'dfg', '2025-03-16 21:26:47'),
(26, 'chat_67d6d2014c0da7.57998369', 'yêu anh không', 'Xin lỗi, tôi không hiểu câu hỏi của bạn. Bạn có thể hỏi về sản phẩm, giao hàng, thanh toán hoặc địa chỉ cửa hàng.', '', '2025-03-16 21:26:53'),
(27, 'chat_67d6d2014c0da7.57998369', 'yêu', 'có', 'dfg', '2025-03-16 21:26:56'),
(28, 'chat_67d6d2014c0da7.57998369', 'tình trạng đơn hàng', 'Đây là thông tin về 3 đơn hàng gần đây của bạn:\n- Đơn hàng #41 (2025-03-08): Đang xử lý - $2.01\n- Đơn hàng #40 (2025-03-08): Đang xử lý - $2.01\n- Đơn hàng #39 (2025-03-08): Đang xử lý - $2.01\n\nBạn có thể xem chi tiết đơn hàng trong mục Lịch sử đặt hàng.', '', '2025-03-16 21:29:10'),
(29, 'chat_67d6d2014c0da7.57998369', 'tìm bánh kem', 'Bạn muốn tìm loại bánh nào? Hãy cho tôi biết tên hoặc loại bánh bạn đang tìm.', 'search_products_context', '2025-03-16 21:29:54'),
(30, 'chat_67d6d2014c0da7.57998369', 'blueberry', 'Kết quả tìm kiếm cho \'blueberry\':\n1. Blueberry cake - $5.00\n\nBạn có thể nhấp vào tên sản phẩm để xem chi tiết hoặc hỏi tôi thêm thông tin về sản phẩm.', '', '2025-03-16 21:30:01'),
(31, 'chat_67d6d2014c0da7.57998369', 'tìm bánh kem', 'Bạn muốn tìm loại bánh nào? Hãy cho tôi biết tên hoặc loại bánh bạn đang tìm.', 'search_products_context', '2025-03-16 21:32:05'),
(32, 'chat_67d6d2014c0da7.57998369', 'blueberry', 'Kết quả tìm kiếm cho \'blueberry\':\n1. Blueberry cake - $5.00\n\nBạn có thể nhấp vào tên sản phẩm để xem chi tiết hoặc hỏi tôi thêm thông tin về sản phẩm.', '', '2025-03-16 21:32:11'),
(33, 'chat_67d6d2014c0da7.57998369', 'tìm bánh kem', 'Bạn muốn tìm loại bánh nào? Hãy cho tôi biết tên hoặc loại bánh bạn đang tìm.', 'search_products_context', '2025-03-16 21:55:50'),
(34, 'chat_67d6d2014c0da7.57998369', 'blueberry', 'Kết quả tìm kiếm cho \'blueberry\':\n1. Blueberry cake - $5.00\n\nBạn có thể nhấp vào tên sản phẩm để xem chi tiết hoặc hỏi tôi thêm thông tin về sản phẩm.', '', '2025-03-16 21:55:56'),
(35, 'chat_67d6d2014c0da7.57998369', 'tìm bánh kem', 'Bạn muốn tìm loại bánh nào? Hãy cho tôi biết tên hoặc loại bánh bạn đang tìm.', 'search_products_context', '2025-03-16 22:32:49'),
(36, 'chat_67d6d2014c0da7.57998369', 'matcha', 'Kết quả tìm kiếm cho \'matcha\':\n1. Matcha cupcake - $0.01\n\nBạn có thể nhấp vào tên sản phẩm để xem chi tiết hoặc hỏi tôi thêm thông tin về sản phẩm.', '', '2025-03-16 22:32:54'),
(37, 'chat_67d6d2014c0da7.57998369', 'tìm bánh kem', 'Bạn muốn tìm loại bánh nào? Hãy cho tôi biết tên hoặc loại bánh bạn đang tìm.', 'search_products_context', '2025-03-16 22:33:19'),
(38, 'chat_67d6d2014c0da7.57998369', 'tìm bánh kem', 'Bạn muốn tìm loại bánh nào? Hãy cho tôi biết tên hoặc loại bánh bạn đang tìm.', 'search_products_context', '2025-03-16 22:33:25'),
(39, 'chat_67d6d2014c0da7.57998369', 'match', 'Kết quả tìm kiếm cho \'match\':\n1. Matcha cupcake - $0.01\n\nBạn có thể nhấp vào tên sản phẩm để xem chi tiết hoặc hỏi tôi thêm thông tin về sản phẩm.', '', '2025-03-16 22:33:28'),
(40, 'chat_67d6d2014c0da7.57998369', 'tìm bánh kem', 'Bạn muốn tìm loại bánh nào? Hãy cho tôi biết tên hoặc loại bánh bạn đang tìm.', 'search_products_context', '2025-03-17 00:19:16'),
(41, 'chat_67d6d2014c0da7.57998369', 'cà phê', 'Kết quả tìm kiếm cho \'cà phê\':\n1. Bánh Cà phê - $0.01\n\nBạn có thể nhấp vào tên sản phẩm để xem chi tiết hoặc hỏi tôi thêm thông tin về sản phẩm.', '', '2025-03-17 00:19:22');

-- --------------------------------------------------------

--
-- Table structure for table `chatbot_dynamic_functions`
--

CREATE TABLE `chatbot_dynamic_functions` (
  `id` int(11) NOT NULL,
  `tag` varchar(100) NOT NULL,
  `function_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chatbot_dynamic_functions`
--

INSERT INTO `chatbot_dynamic_functions` (`id`, `tag`, `function_name`, `description`) VALUES
(1, 'get_products', 'getRecentProducts', 'Hiển thị sản phẩm mới nhất'),
(2, 'search_products', 'searchProducts', 'Tìm kiếm sản phẩm theo từ khóa'),
(3, 'get_order_status', 'getOrderStatus', 'Kiểm tra trạng thái đơn hàng'),
(4, 'recommend_products', 'recommendProducts', 'Gợi ý sản phẩm dựa trên lịch sử');

-- --------------------------------------------------------

--
-- Table structure for table `chatbot_intents`
--

CREATE TABLE `chatbot_intents` (
  `id` int(11) NOT NULL,
  `tag` varchar(100) NOT NULL,
  `patterns` text NOT NULL,
  `responses` text NOT NULL,
  `context_required` varchar(100) DEFAULT NULL,
  `context_set` varchar(100) DEFAULT NULL,
  `is_dynamic` tinyint(1) DEFAULT 0,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chatbot_intents`
--

INSERT INTO `chatbot_intents` (`id`, `tag`, `patterns`, `responses`, `context_required`, `context_set`, `is_dynamic`, `created_at`, `updated_at`) VALUES
(1, 'greeting', 'xin chào,chào,hello,hi,hey,hola', 'Xin chào! Tôi là bot hỗ trợ của Tiệm Bánh. Tôi có thể giúp gì cho bạn?|Chào bạn! Tiệm Bánh có thể giúp gì cho bạn hôm nay?', NULL, NULL, 0, '2025-03-16', '2025-03-16'),
(2, 'goodbye', 'tạm biệt,bye,goodbye,see you,hẹn gặp lại', 'Tạm biệt! Rất vui được hỗ trợ bạn.|Cảm ơn đã ghé thăm Tiệm Bánh. Hẹn gặp lại!', NULL, NULL, 0, '2025-03-16', '2025-03-16'),
(3, 'opening_hours', 'giờ mở cửa,mở cửa khi nào,giờ làm việc,thời gian mở cửa', 'Tiệm Bánh mở cửa từ 7h sáng đến 21h tối tất cả các ngày trong tuần.|Chúng tôi mở cửa hàng ngày từ 7h sáng đến 21h tối.', NULL, NULL, 0, '2025-03-16', '2025-03-16'),
(4, 'products', 'sản phẩm,các loại bánh,bánh gì,có những bánh nào', 'Tiệm Bánh có nhiều loại bánh như bánh mì, bánh ngọt, bánh kem, cupcake và nhiều loại khác. Bạn có thể xem toàn bộ sản phẩm tại mục Sản phẩm.', NULL, NULL, 0, '2025-03-16', '2025-03-16'),
(5, 'delivery', 'giao hàng,ship,vận chuyển,giao bánh', 'Chúng tôi có dịch vụ giao hàng cho đơn hàng từ 100.000đ. Thời gian giao hàng từ 30-60 phút tùy khu vực.', NULL, NULL, 0, '2025-03-16', '2025-03-16'),
(6, 'payment', 'thanh toán,trả tiền,phương thức thanh toán,tiền mặt,chuyển khoản', 'Tiệm Bánh chấp nhận thanh toán bằng tiền mặt, chuyển khoản ngân hàng và các ví điện tử phổ biến.', NULL, NULL, 0, '2025-03-16', '2025-03-16'),
(7, 'order', 'đặt hàng,đặt bánh,mua bánh,order', 'Bạn có thể đặt hàng trực tiếp trên website bằng cách thêm sản phẩm vào giỏ hàng và tiến hành thanh toán. Hoặc gọi số 012.3456.7897 để đặt hàng qua điện thoại.', NULL, NULL, 0, '2025-03-16', '2025-03-16'),
(8, 'address', 'địa chỉ,cửa hàng ở đâu,vị trí,location', 'Tiệm Bánh tọa lạc tại Vincom Mall. Bạn có thể dễ dàng tìm thấy chúng tôi tại tầng trệt, khu vực ẩm thực.', NULL, NULL, 0, '2025-03-16', '2025-03-16'),
(9, 'help', 'giúp,trợ giúp,hỗ trợ,help', 'Tôi có thể giúp bạn với thông tin về sản phẩm, đặt hàng, thanh toán, giao hàng và nhiều vấn đề khác. Hãy cho tôi biết bạn cần hỗ trợ gì?', NULL, NULL, 0, '2025-03-16', '2025-03-16'),
(10, 'greeting', 'xin chào,chào,hello,hi,hey,hola', 'Xin chào! Tôi là AI Assistant của Tiệm Bánh. Tôi có thể giúp bạn tìm kiếm sản phẩm, kiểm tra đơn hàng, hoặc trả lời các câu hỏi về cửa hàng.|Chào bạn! Tôi là trợ lý ảo của Tiệm Bánh. Tôi có thể giúp gì cho bạn hôm nay?', NULL, NULL, 0, '2025-03-16', '2025-03-16'),
(11, 'goodbye', 'tạm biệt,bye,goodbye,see you,hẹn gặp lại', 'Tạm biệt! Rất vui được hỗ trợ bạn.|Cảm ơn đã ghé thăm Tiệm Bánh. Hẹn gặp lại!', NULL, NULL, 0, '2025-03-16', '2025-03-16'),
(12, 'thanks', 'cảm ơn,thanks,thank you,cám ơn', 'Không có gì! Rất vui được giúp bạn.|Luôn sẵn sàng phục vụ bạn!|Rất vui khi có thể giúp đỡ bạn!', NULL, NULL, 0, '2025-03-16', '2025-03-16'),
(13, 'opening_hours', 'giờ mở cửa,mở cửa khi nào,giờ làm việc,thời gian mở cửa', 'Tiệm Bánh mở cửa từ 7h sáng đến 21h tối tất cả các ngày trong tuần.|Chúng tôi mở cửa hàng ngày từ 7h sáng đến 21h tối.', NULL, NULL, 0, '2025-03-16', '2025-03-16'),
(14, 'products', 'sản phẩm,các loại bánh,bánh gì,có những bánh nào,sản phẩm mới,bánh mới', 'Tiệm Bánh có nhiều loại bánh như bánh mì, bánh ngọt, bánh kem, cupcake và nhiều loại khác. Bạn muốn xem các sản phẩm mới nhất không?', NULL, 'ask_view_products', 0, '2025-03-16', '2025-03-16'),
(16, 'no_view_products', 'không,no,thôi,đừng,để sau,không cần', 'Không sao! Nếu bạn cần tìm hiểu về sản phẩm, cứ cho tôi biết nhé.', 'ask_view_products', NULL, 0, '2025-03-16', '2025-03-16'),
(17, 'delivery', 'giao hàng,ship,vận chuyển,giao bánh', 'Chúng tôi có dịch vụ giao hàng cho đơn hàng từ 100.000đ. Thời gian giao hàng từ 30-60 phút tùy khu vực.', NULL, NULL, 0, '2025-03-16', '2025-03-16'),
(18, 'payment', 'thanh toán,trả tiền,phương thức thanh toán,tiền mặt,chuyển khoản', 'Tiệm Bánh chấp nhận thanh toán bằng tiền mặt, chuyển khoản ngân hàng và các ví điện tử phổ biến.', NULL, NULL, 0, '2025-03-16', '2025-03-16'),
(19, 'order', 'đặt hàng,đặt bánh,mua bánh,order,làm sao để mua', 'Bạn có thể đặt hàng trực tiếp trên website bằng cách thêm sản phẩm vào giỏ hàng và tiến hành thanh toán. Hoặc gọi số 012.3456.7897 để đặt hàng qua điện thoại.', NULL, NULL, 0, '2025-03-16', '2025-03-16'),
(20, 'address', 'địa chỉ,cửa hàng ở đâu,vị trí,location', 'Tiệm Bánh tọa lạc tại Vincom Mall. Bạn có thể dễ dàng tìm thấy chúng tôi tại tầng trệt, khu vực ẩm thực.', NULL, NULL, 0, '2025-03-16', '2025-03-16'),
(21, 'search_products_intent', 'tìm bánh,tìm sản phẩm,tìm kiếm,search,kiếm bánh,tìm loại bánh', 'Bạn muốn tìm loại bánh nào? Hãy cho tôi biết tên hoặc loại bánh bạn đang tìm.', NULL, 'search_products_context', 0, '2025-03-16', '2025-03-16'),
(22, 'search_query', '', '', 'search_products_context', NULL, 1, '2025-03-16', '2025-03-16'),
(23, 'order_status', 'tình trạng đơn hàng,đơn hàng của tôi,kiểm tra đơn hàng,trạng thái đơn hàng,theo dõi đơn hàng', '', NULL, NULL, 1, '2025-03-16', '2025-03-16'),
(24, 'product_recommendation', 'gợi ý,đề xuất,bánh ngon,bánh phổ biến,bánh cho tôi,gợi ý bánh', '', NULL, NULL, 1, '2025-03-16', '2025-03-16'),
(25, 'help', 'giúp,trợ giúp,hỗ trợ,help,bạn biết làm gì,bạn có thể làm gì', 'Tôi có thể giúp bạn với nhiều thông tin như:\n- Tìm kiếm và gợi ý sản phẩm\n- Kiểm tra trạng thái đơn hàng\n- Thông tin về giao hàng và thanh toán\n- Thông tin về cửa hàng và giờ mở cửa\n\nBạn cần hỗ trợ gì?', NULL, NULL, 0, '2025-03-16', '2025-03-16'),
(26, 'blueberry_cake', 'blueberry,việt quất,bánh việt quất,blueberry cake,bánh blueberry', 'Bánh Blueberry Cake của chúng tôi được làm từ việt quất tươi ngon, giá $5.00. Bạn có muốn xem thêm thông tin chi tiết về sản phẩm này không?', NULL, 'ask_blueberry_detail', 0, '2025-03-16', '2025-03-16'),
(27, 'yes_blueberry_detail', 'có,yes,muốn,ok,được', 'Bánh Blueberry Cake là một trong những sản phẩm nổi bật của chúng tôi. Bánh được làm từ việt quất tươi, bột mì chất lượng cao và kem tươi. Bánh có vị ngọt thanh, hương thơm của việt quất và hơi chua nhẹ, rất phù hợp để thưởng thức cùng trà hoặc cà phê. Bạn có thể đặt hàng ngay trên website hoặc gọi điện cho chúng tôi.', 'ask_blueberry_detail', NULL, 0, '2025-03-16', '2025-03-16'),
(28, 'Em yêu', 'yêu anh không', 'có', 'yes', 'dfg', 0, '2025-03-16', '2025-03-16');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `message` text DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `message`, `name`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(3, 'sdfsdfs', 'Duy Tran', 'trandinhanhduy2004@gmail.com', '0868076408', '2025-03-08', '2025-03-08'),
(4, 'fgfg', 'Duy Tran', 'trandinhanhduy2004@gmail.com', '0868076408', '2025-03-08', '2025-03-08');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` varchar(100) NOT NULL,
  `coupon_value` float(9,3) NOT NULL DEFAULT 0.000,
  `used_times` mediumint(8) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 is active, 0 is expired',
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `province` varchar(100) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `delivery` varchar(100) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `status` tinyint(1) DEFAULT 1 COMMENT '1 là pending, 0 delivered,2 la delivering, 3 la canceled',
  `account_id` int(11) NOT NULL,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date DEFAULT current_timestamp(),
  `coupon` float(9,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `fname`, `lname`, `email`, `phone`, `province`, `address`, `note`, `delivery`, `payment`, `status`, `account_id`, `created_at`, `updated_at`, `coupon`) VALUES
(39, 'Duy', 'Tran', 'trandinhanhduy2004@gmail.com', '0868076408', 'Hà Nội', '554 Cộng Hòa', '', 'Giaohangtietkiem', 'Mastercard', 1, 11, '2025-03-08', '2025-03-08', 0.000),
(40, 'Duy', 'Tran', 'trandinhanhduy2004@gmail.com', '0868076408', 'Hà Nội', '554 Cộng Hòa', '', 'Giaohangtietkiem', 'Cash on delivery', 0, 11, '2025-03-08', '2025-03-16', 0.000),
(41, 'Duy', 'Tran', 'trandinhanhduy2004@gmail.com', '0868076408', 'Hà Nội', '554 Cộng Hòa', '', 'Giaohangtietkiem', 'Cash on delivery', 3, 11, '2025-03-08', '2025-03-16', 0.000);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `product_id`, `quantity`, `price`) VALUES
(39, 12, 1, 0.01),
(40, 12, 1, 0.01),
(41, 12, 1, 0.01);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` float(9,3) NOT NULL,
  `sale_price` float(9,3) DEFAULT 0.000,
  `description` text DEFAULT NULL,
  `origin` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `status` tinyint(1) DEFAULT 1 COMMENT '1 là hiển thị, 0 ẩn',
  `category_id` int(11) NOT NULL,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `price`, `sale_price`, `description`, `origin`, `quantity`, `status`, `category_id`, `created_at`, `updated_at`) VALUES
(12, 'Bánh Cà phê', 'offer.png', 10.030, 0.010, 'Bùng nổ vòm miệng với mùi cà phê thơm ngát và hương vị bùng nổ', 'vn', 1, 1, 22, '2025-03-08', '2025-03-16'),
(13, 'Matcha cupcake', 'cupcake3.png', 1.000, 0.010, 'Chiếc bánh cupcake này có đầy đủ hương vị matcha!! Sẵn sàng để bị nuốt chửng.', 'vn', 5, 1, 26, '2025-03-08', '2025-03-08'),
(14, 'Blueberry cake', 'blueberrycake.jpg', 5.000, 0.000, 'Bánh nhân việt quất hảo hạng được bao phủ bởi kem bơ phủ kem.', 'vn', 1, 1, 25, '2025-03-08', '2025-03-08'),
(15, 'Bánh mì nướng kiểu Pháp', '7016-french-toast-i-ddmfs-beauty-4x3-b77fcd549a18443da3cf488687eae64f.jpg', 2.000, 0.000, 'Vỏ bánh giòn – người bạn đồng hành', 'vn', 5, 1, 22, '2025-03-08', '2025-03-08'),
(16, 'Bột lúa mạch đen', 'Pumpernickel1667-C0M.webp', 1.000, 0.010, 'Thỏa thích vị giác của bạn với kết cấu và hương vị độc đáo.', 'vn', 10, 1, 23, '2025-03-08', '2025-03-08'),
(17, 'Bột lúa mì', 'Wheat-Flour.webp', 1.000, 0.010, 'Bột mì là một loại bột thực vật được làm bằng cách nghiền ngũ cốc thô, rễ, đậu, quả hạch hoặc hạt giống', 'vn', 10, 1, 23, '2025-03-08', '2025-03-16');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `rating` tinyint(4) DEFAULT 5,
  `content` text DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `rating`, `content`, `product_id`, `account_id`, `created_at`, `updated_at`) VALUES
(32, 5, 'sdfsdfd', 13, 11, '2025-03-08', '2025-03-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `chatbot_conversations`
--
ALTER TABLE `chatbot_conversations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `session_id` (`session_id`);

--
-- Indexes for table `chatbot_dynamic_functions`
--
ALTER TABLE `chatbot_dynamic_functions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chatbot_intents`
--
ALTER TABLE `chatbot_intents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `review_ibfk_2` (`account_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `chatbot_conversations`
--
ALTER TABLE `chatbot_conversations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `chatbot_dynamic_functions`
--
ALTER TABLE `chatbot_dynamic_functions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chatbot_intents`
--
ALTER TABLE `chatbot_intents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
