-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 17, 2020 lúc 03:55 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `blog`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `level`, `name`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$fGR86W30LbXMsBTtfqVNOOXA2GPDzQjSD.FwZwEmtj8cq6h84VWjm', 0, 'Boss Admin', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `repost` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `content`, `user_id`, `post_id`, `repost`, `created_at`, `updated_at`) VALUES
(22, 'làm gì sai', 2, 9, 0, '2020-07-16 22:26:56', '2020-07-16 22:26:56'),
(23, 'vdsv', 2, 9, 1, '2020-07-16 22:29:06', '2020-07-16 23:28:22'),
(24, 'dsvdsv', 2, 9, 0, '2020-07-16 22:29:13', '2020-07-16 22:29:13'),
(25, 'dsvs', 2, 9, 0, '2020-07-16 22:29:20', '2020-07-16 22:29:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `imgpost`
--

CREATE TABLE `imgpost` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `link_img` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `imgpost`
--

INSERT INTO `imgpost` (`id`, `post_id`, `link_img`) VALUES
(31, 7, '7VcrF3faM1VLuYnSrpCGcyfBY4YToLH.jpg'),
(32, 7, '7LcNs7xUFHSuF5EpcUTgrwAW8z51LeH.jpg'),
(33, 7, '7MDgeGty7dNojssTNbG36IAawliIWum.jpg'),
(34, 7, '7e3jd63r4UMH6kCT3OALEYrcJZsHCJp.jpg'),
(35, 7, '7U29TYoPOYluO6k4aOMYFHpnEpgiZjC.jpg'),
(37, 9, '93APC9AvWgsRUn8StTpKUH1fRNCwIUh.jpg'),
(38, 9, '9rjQpJjTJ8drxPbdMWna8uKsTt77nd7.jpg'),
(39, 9, '9tzcYGhlsmJGpCDNwiYo1iUbiVTpSXG.jpg'),
(40, 9, '9ZVPriY5RBr9UoWLKPSOPyzf01AeNA2.jpg'),
(41, 9, '9UBuXam1rtbBfENqZie43Vjgfm5qU8J.jpg'),
(42, 9, '9X6P0Q2xsP6xO1c30jEveOkvoFIvvne.jpg'),
(43, 9, '9EYzoYjABDD9BjZIU9b22amM6hrXyWX.jpg'),
(44, 9, '9XzaNJLnxIwyjhKNsDlTPo94DUryb5z.jpg'),
(51, 10, '10SxhtMy11wHvJ7Gs7CMvu5QtCoS9W1z.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `info`
--

CREATE TABLE `info` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.jpg',
  `introduce` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `info`
--

INSERT INTO `info` (`id`, `name`, `avatar`, `introduce`, `user_id`) VALUES
(1, 'Trần Ngọc Trí', '1aEZ0n6sm3l95ricYC0jjDx2T2fivPS.png', 'ha ha', 1),
(2, 'Trần Ngọc Trí', '2IQ00E6rJ7LRvaK2bGClvWqDSG51reZ.jpg', '1234', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `likepost`
--

CREATE TABLE `likepost` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2020_06_22_013723_create_info_table', 1),
(12, '2020_06_24_110058_create_post_table', 1),
(13, '2020_06_24_125739_create_comment_table', 1),
(14, '2020_07_06_043525_create_imgpost_table', 1),
(15, '2020_07_11_163437_create_replycomment_table', 1),
(16, '2020_07_14_013845_create_likepost_table', 1),
(18, '2020_07_16_161510_create_admin_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `video` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`id`, `title`, `sub_title`, `author`, `content`, `view`, `video`, `created_at`, `updated_at`) VALUES
(7, 'Đà nẵng', 'Bà nà hills', 'Nguyen Thai Long', '<b>1. Nên đi du lịch Bà Nà Hills vào thời gian nào?</b><div>\r\nBạn hãy xem xét mình thích gì để chọn thời điểm tốt nhất cho chuyến du lịch Bà Nà Hills sắp tới.\r\n\r\nNếu bạn thích đông vui, náo nhiệt thì hãy đến đây vào khoảng tháng 4 đến tháng 8 vì khoảng thời gian này trùng với mùa du lịch dài ngày. Vì vậy, bạn tha hồ đi chơi từ sáng đến khuya mà không sợ bị “giảm nhiệt”. Còn nếu bạn thích không gian yên tĩnh thì hãy đi vào mùa xuân (tháng 1 – tháng 3), hoặc mùa đông (tháng 10-tháng 12). Những lúc này là mùa thấp điểm, thời tiết lại mát mẻ nên bạn sẽ có cơ hội ngắm đượ trọn vẹn vẻ đẹp của Bà Nà Hills.\r\n<b>2. Ở đâu tại Bà Nà Hills?</b></div><div>\r\nBạn có thể lưu trú ngay trên đỉnh Bà Nà Hills để tiện lợi vui chơi tại Khách sạn Mercure Bà Nà Hills French Village. Khách sạn 4 sao này sẽ mang đến cho bạn không gian tiện nghi và sang trọng theo phong cách Pháp Cổ. Giá cho một đêm nghỉ tại đây dao động từ 3.000.000 VND/ phòng đôi.Ngoài ra, bạn cũng có thể lưu trú tại các khách sạn Đà Nẵng rồi đi xe đến Bà Nà Hills. Tôi thì hay lựa chọn cách này vì thành phố Đà Nẵng dĩ nhiên là có nhiều khách sạn hơn cho bạn lựa chọn và bạn còn có thể tranh thủ khám phá thêm nhiều địa điểm thú vị nữa. Một số khách sạn tốt tại Đà Nẵng mà bạn có thể tham khảo như là Furama Resort, Holiday Beach Danang Hotel &amp; Resort, Diamond Sea Hotel, A La Carte Da Nang Beach, Melia Danang Resort…&nbsp;</div><div><b>3. Ăn gì tại Bà Nà Hills?</b></div><div>\r\nĐến với Bà Nà Hills, bạn có hai sự lựa chọn: tự đem theo đồ ăn hoặc ăn theo thực đơn tại các nhà hàng. Với lựa chọn đầu tiên, bạn sẽ tiết kiệm được khá nhiều chi phí. Tuy nhiên, vấn đề ở đây là mang vác lỉnh kỉnh cũng sẽ khiến bạn đau đầu, mất vui.\r\n\r\nLựa chọn thứ hai, ăn tại nhà hàng sẽ giúp bạn rảnh rang tay chân hơn. Nếu ví tiền rủng rỉnh thì chẳng dại gì mà không chọn phương án này cả, vừa khỏe người mà còn được thưởng thức thêm nhiều món ăn ngon. Lúc trước khi tới Bà Nà Hills, tôi đã có dịp khám phá ra nhà hàng Morin. Ở đây, bạn có thể thưởng thức bữa trưa tự chọn gồm 30 món khác nhau với giá chỉ 90.000 VND/ trẻ em và 180.000 VND/ người lớn. Đồ ăn ở đây khá tươi ngon và sạch sẽ, không gian nhà hàng lại rộng rãi, thoáng mát. Đây quả là một sự kết hợp tuyệt vời cho bữa trưa sau nửa ngày ngồi xe mệt mỏi.Ngoài ra, đối với những ai có ý định lưu trú tại Đà Nẵng và thuê xe một ngày đi Bà Nà Hills thì bạn cũng có thể ghé vào các quán ăn ở Đà Nẵng ăn lót dạ trước khi lên đường. Đây cũng là cách mà tôi thường làm mỗi khi đến đây.&nbsp;</div><div><b>4. Chơi Gì Ở Bà Nà Hills?</b></div><div>&nbsp;Ngoài khu giải trí Fantasy Park mà tôi đã đề cập ở trên, Bà Nà Hills vẫn còn khá nhiều địa điểm vui chơi tới bến cho bạn lựa chọn. Đầu tiên là làng Pháp – “Châu Âu” thu nhỏ giữa lòng Đà Nẵng. Bạn sẽ được trải nghiệm kiến trúc tuyệt đẹp của Châu Âu thời kì Phục Hưng ngay tại Việt Nam.</div>', 138, 'https://www.youtube.com/embed/Ggq5UVbKlPE', '2020-07-16 16:54:03', '2020-07-17 01:30:26'),
(9, 'Đà Nẵng', 'Vòng quay mặt trời Sun Wheel Đà Nẵng', 'Trần Ngọc Trí', '<p style=\"margin-right: 0px; margin-bottom: 7px; margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; color: rgb(51, 51, 51); font-family: &quot;Roboto Condensed&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px; text-align: justify;\"><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; color: rgb(80, 84, 88); font-family: Roboto, sans-serif; font-size: 24px;\">Giới thiệu về Sun Wheel Đà Nẵng</span><br style=\"display: block; margin: 5px 0px; content: &quot; &quot;;\"></p><p style=\"margin-right: 0px; margin-bottom: 7px; margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; color: rgb(51, 51, 51); font-family: &quot;Roboto Condensed&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px; text-align: justify;\">Sun Wheel Đà Nẵng là vòng quay mặt trời thuộc công trình giải trí của công viên Asia Park Đà Nẵng, do tập đoàn Sun Group đầu tư xây dựng. Cho đến nay, nó được công nhận là vòng xoay lớn thứ 2 ở Đông Nam Á và lọt vào top 10 vòng xoay lớn nhất thế giới.</p><p style=\"margin-right: 0px; margin-bottom: 7px; margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; color: rgb(51, 51, 51); font-family: &quot;Roboto Condensed&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px; text-align: justify;\">Với vốn đầu tư lên đến hàng ngàn tỷ đồng, vòng xoay Sun Wheel là một trong những&nbsp;<span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-weight: 700;\"><a href=\"https://bazantravel.com/dia-diem-du-lich-da-nang/\" target=\"_blank\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; color: rgb(26, 30, 178);\">địa điểm du lịch Đà Nẵng</a></span>&nbsp;nổi tiếng. Trải nghiệm trò chơi này, du khách cóthể nhìn thấy toàn bộ thành phố với những địa điểm đẹp nhất như: cầu Rồng, Sông Hàn, tượng Phật khổng lồ và những cung đường uốn lượn đẹp như tranh vẽ.</p><h3 id=\"sun-wheel-da-nang-o-dau\" style=\"margin-right: 0px; margin-bottom: 12px; margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-size: 1.5em; color: rgb(51, 51, 51); font-family: &quot;Roboto Condensed&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; text-align: justify;\">Sun Wheel Đà Nẵng ở đâu?</h3><ul style=\"margin: 5px 0px 10px 20px; padding: 0px; border: 0px; vertical-align: baseline; list-style-position: initial; list-style-image: initial; color: rgb(51, 51, 51); font-family: &quot;Roboto Condensed&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px; text-align: justify;\"><li style=\"margin: 0px 0px 5px; padding: 0px; border: 0px; vertical-align: baseline;\"><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-weight: 700;\">Địa chỉ:&nbsp;</span>1Phan Đăng Lưu, Hòa Cường Bắc, Hải Châu, Đà Nẵng</li></ul><p style=\"margin-right: 0px; margin-bottom: 7px; margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; color: rgb(51, 51, 51); font-family: &quot;Roboto Condensed&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px; text-align: justify;\">Nằm ngay trung tâm thành phố, đường đến vòng quay Sun Wheel khá dễ dàng. Nếu xuất phát từ sân bay Quốc tế Đà Nẵng, chạy theo đại lộ Nguyễn Văn Linh, sau đó rẽ vào đường Duy Tân và đi theo đường 2 Tháng 9 là sẽ tới nơi.</p><h3 id=\"gia-ve-gio-mo-cua-tai-sun-wheel-da-nang\" style=\"margin-right: 0px; margin-bottom: 12px; margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-size: 1.5em; color: rgb(51, 51, 51); font-family: &quot;Roboto Condensed&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; text-align: justify;\">Giá vé, giờ mở cửa tại Sun Wheel Đà Nẵng</h3><p style=\"margin-right: 0px; margin-bottom: 7px; margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; color: rgb(51, 51, 51); font-family: &quot;Roboto Condensed&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px; text-align: justify;\">Mặc dù được đầu tư với chi phí khổng lồ, thế nhưng giá vé tại đây khá rẻ. Theo&nbsp;<span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-weight: 700;\"><a href=\"https://bazantravel.com/du-lich-bui-da-nang-cam-nang-du-lich-can-biet/\" target=\"_blank\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; color: rgb(26, 30, 178);\">kinh nghiệm du lịch Đà Nẵng</a></span>, chỉ cần mua vé vào tham quan công viên Asia Park là đã bao gồm vé vòng quay mặt trời Sun Wheel và một số trò chơi khác trong khu vực.</p><ul style=\"margin: 5px 0px 10px 20px; padding: 0px; border: 0px; vertical-align: baseline; list-style-position: initial; list-style-image: initial; color: rgb(51, 51, 51); font-family: &quot;Roboto Condensed&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px; text-align: justify;\"><li style=\"margin: 0px 0px 5px; padding: 0px; border: 0px; vertical-align: baseline;\">Đối với người lớn, trẻ em cao trên 1.3 mét, khách ngoại tỉnh, và người nước ngoài giá vé là&nbsp;<span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-weight: 700;\">300.000đ/người.</span></li><li style=\"margin: 0px 0px 5px; padding: 0px; border: 0px; vertical-align: baseline;\">Đối với trẻ em cao từ 1 mét đến 1,3 mét giá vé là&nbsp;<span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-weight: 700;\">200.000đ/người.</span></li><li style=\"margin: 0px 0px 5px; padding: 0px; border: 0px; vertical-align: baseline;\">Đối với trẻ em dưới 1 mét:&nbsp;<span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-weight: 700;\">Được miễn phí vé.</span></li><li style=\"margin: 0px 0px 5px; padding: 0px; border: 0px; vertical-align: baseline;\"><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-weight: 700;\"><p style=\"margin-right: 0px; margin-bottom: 7px; margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-weight: 400;\">Vào mùa cao điểm, mỗi ngày Sun Wheel Đà Nẵng đón hàng ngàn lượt khách đến tham quan. Thời gian hoạt động của công viên như sau:<br style=\"display: block; margin: 5px 0px; content: &quot; &quot;;\"></p><ul style=\"margin: 5px 0px 10px 20px; padding: 0px; border: 0px; vertical-align: baseline; list-style: disc; font-weight: 400;\"><li style=\"margin: 0px 0px 5px; padding: 0px; border: 0px; vertical-align: baseline;\"><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-weight: 700;\">Giờ mở cửa:</span></li><ul style=\"margin: 5px 0px 10px 20px; padding: 0px; border: 0px; vertical-align: baseline; list-style: disc;\"><li style=\"margin: 0px 0px 5px; padding: 0px; border: 0px; vertical-align: baseline;\"><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-weight: 700;\">Từ thứ 2 đến thứ 6:&nbsp;</span>15h30 đến 22h30</li><li style=\"margin: 0px 0px 5px; padding: 0px; border: 0px; vertical-align: baseline;\"><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-weight: 700;\">Thứ 7 và chủ nhật:&nbsp;</span>9h30 đến 22h30.</li></ul></ul><p style=\"margin-right: 0px; margin-bottom: 7px; margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-weight: 400;\">Trong Asia Park có khá nhiều khu trò chơi giải trí trong nhà và ngoài trời, vì thế nếu đây vào mùa hè, bạn cũng không phải lo trước thời tiết nắng nóng của Đà Nẵng. Bạn cũng có thể tranh thủ đăng ký&nbsp;<span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-weight: 700;\"><a href=\"https://bazantravel.com/tour-du-lich-da-nang-3-ngay-2-dem/\" target=\"_blank\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; color: rgb(26, 30, 178);\">tour Đà Nẵng 3 ngày 2 đêm</a>&nbsp;</span>để thử sức với vòng quay hấp dẫn này trước khi về lại thành phố.&nbsp;</p></span></li><li style=\"margin: 0px 0px 5px; padding: 0px; border: 0px; vertical-align: baseline;\"><h3 id=\"sun-wheel-co-gi-choi-trai-nghiem-nhung-hoat-dong-thu-vi-nhat\" style=\"margin-right: 0px; margin-bottom: 12px; margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-size: 1.5em; color: rgb(51, 51, 51); font-family: &quot;Roboto Condensed&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">Sun Wheel có gì chơi? Trải nghiệm những hoạt động thú vị nhất</h3><p style=\"margin-right: 0px; margin-bottom: 7px; margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline;\">Khu Sun Wheel Đà Nẵng hay còn được gọi là Vòng Quay Mặt Trời có chiều cao lên đến 115 mét, gồm 54 bin có thể chứa đến 200 người một lúc. Mỗi vòng quay, nó chuyển động hết 15 phút và đưa du khách lên trên cao, từ đó có thể ngắm nhìn&nbsp;<span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-weight: 700;\"><a href=\"https://bazantravel.com/bien-da-nang/\" target=\"_blank\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; color: rgb(26, 30, 178);\">biển Đà Nẵng</a>&nbsp;</span>cùng những cảnh sắc tuyệt đẹp của thành phố. Đặc biệt, những cabin đều có khung cửa kính để bạn tiện chụp ảnh, check in làm kỷ niệm.</p></li><li style=\"margin: 0px 0px 5px; padding: 0px; border: 0px; vertical-align: baseline;\"><p style=\"margin-right: 0px; margin-bottom: 7px; margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline;\">Đặc biệt, vòng quay Sun Wheel thích hợp cho mọi độ tuổi người chơi, có tốc độ vừa phải giúp du khách thư giãn tuyệt vời trên không trung. Sẽ tuyệt vời hơn nữa nếu đi vào ban đêm, lúc này cả thành phố lung linh chìm trong ánh đèn xanh đỏ. Biển ngoài khơi xa không ngừng đánh sóng, mang đến cái mát lạnh vô cùng dễ chịu.<br></p></li><li style=\"margin: 0px 0px 5px; padding: 0px; border: 0px; vertical-align: baseline;\"><p style=\"margin-right: 0px; margin-bottom: 7px; margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline;\">Bên cạnh việc trải nghiệm ở vòng quay ở công viên Asia Park, bạn cũng có thể tham gia các trò chơi, hoạt động giải trí ở các khu vực khác như:</p><h4 id=\"check-in-tai-cong-thanh-va-cac-tieu-mo-hinh-dac-trung\" style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-size: 1.4em; color: rgb(51, 51, 51); font-family: &quot;Roboto Condensed&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">Check in tại cổng thành và các tiểu mô hình đặc trưng</h4><p style=\"margin-right: 0px; margin-bottom: 7px; margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline;\">Có thể nói rằng, công viên Châu Á như một thế giới thu nhỏ với những mô hình tượng trưng cho một số nước nổi tiếng ở châu Âu và châu Á. Nếu chưa có đủ thời gian và tài chính, nơi đây cũng sẽ làm bạn thoải mãn bởi những khung cảnh mô tả giống hệt Mĩ, Nhật, Hàn,...</p></li><li style=\"margin: 0px 0px 5px; padding: 0px; border: 0px; vertical-align: baseline;\"><p style=\"margin-right: 0px; margin-bottom: 7px; margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline;\">Ở mỗi tiểu mô hình, những nét đặc sắc của các quốc gia sẽ được lột tả qua những công trình, kiến trúc nổi bật nhất. Đặc biệt, cạnh bên cổng thành là Sun Weel Đà Nẵng, tiện lợi cho bạn khám phá, trải nghiệm vòng quay lọt vào top 10 của thế giới.<br></p></li><li style=\"margin: 0px 0px 5px; padding: 0px; border: 0px; vertical-align: baseline;\"><h4 id=\"he-thong-tau-dien-monorail\" style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-size: 1.4em; color: rgb(51, 51, 51); font-family: &quot;Roboto Condensed&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">Hệ thống tàu điện Monorail</h4><p style=\"margin-right: 0px; margin-bottom: 7px; margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline;\">Vì có diện tích khá rộng nên công viên cũng trang bị thêm hệ thống tàu điện Monorail, tiện cho du khách tham quan và đỡ vất vả hơn khi di chuyển đường dài. Những khoang tàu được trang bị nội thất sang trọng, chạy chầm chậm đưa bạn ngắm những khu vực đẹp nhất của Asia Park.</p></li><li style=\"margin: 0px 0px 5px; padding: 0px; border: 0px; vertical-align: baseline;\"><h4 id=\"khu-vui-choi-trong-nha\" style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-size: 1.4em; color: rgb(51, 51, 51); font-family: &quot;Roboto Condensed&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">Khu vui chơi trong nhà</h4><p style=\"margin-right: 0px; margin-bottom: 7px; margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline;\">Khu trò chơi liên hoàn FEC bao gồm những trò chơi cực kì thú vị, hiện đại như: bắn súng điện tử, tàu lượn siêu tốc, khu vườn cổ tích, trò chơi đom đóm,...&nbsp;</p></li><li style=\"margin: 0px 0px 5px; padding: 0px; border: 0px; vertical-align: baseline;\"><h4 id=\"cong-vien-van-hoa\" style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-size: 1.4em; color: rgb(51, 51, 51); font-family: &quot;Roboto Condensed&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">Công viên văn hóa</h4><p style=\"margin-right: 0px; margin-bottom: 7px; margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline;\">Đến Asia Park Đà Nẵng, không thể nào không ghé qua công viên văn hóa, nơi có các công trình được xây dựng công phu, đặc tả nét đẹp truyền thống văn hóa của dân tộc. Sun Wheel Đà Nẵng là một công trình thuộc công viên văn hóa, mang đến những trải nghiệm khá độc đáo.</p></li></ul>', 94, 'https://www.youtube.com/embed/75xrGx_ncvQ', '2020-07-16 22:04:44', '2020-07-17 01:36:14'),
(10, 'Quảng Ninh', 'Vịnh Hạ Long', 'Nguyen Thai Long', 'Tham quan vịnh Hạ Long nhất định không thể bỏ qua làng chài Cửa Vạn. Đây là một trong nhiều làng chài nổi tiếng lâu đời trên vịnh Hạ Long. Du khách không chỉ được đắm mình trong không gian êm ả, thanh bình, ngắm nhìn những ngôi nhà gỗ nhỏ trên mặt nước yên bình mà còn được tìm hiểu đời sống văn hoá của ngư dân, được học cách chèo thuyền, giăng lưới, thả câu bắt tôm cá… Bạn cũng có thể mua những đồ hải sản tươi ngon tại đây. Các làng chài hiện giờ đa phần người dân đã được di dời ổn định cuộc sống trên bờ nhưng vẫn còn các hoạt động nuôi trồng hải sản, dịch vụ chèo thuyền tham quan cho khách du lịch nên vẫn là điểm tham quan độc đáo trong hành trình thăm vịnh Hạ Long.\r\n\r\nĐi xa hơn một chút, có thể tham quan vịnh Bái tử Long, vịnh Hạ Lan, hay đến đảo Cát Bà. Để có thể trải nghiệm một cách tốt nhất, du khách nên thuê tàu ngủ đêm trên vịnh với tour 1 ngày, 2 ngày hoặc 3 ngày.\r\n\r\nNhững du thuyền chất lượng 5 sao được đánh giá cao: du thuyền Athena, du thuyền Huong Hai Sealife,  du thuyền Paradise Elegance, du thuyền Đông Dương (Indochina Junk), du thuyền Alisa hay du thuyền Âu Cơ…. Tại đây, bạn sẽ được hưởng những dịch vụ chất lượng tốt nhất, nghỉ đêm tại những phòng hạng sang. Cùng với đó là tham gia các hoạt động theo tour như chèo thuyền kayak, ngắm cảnh, thăm làng chài và thưởng thức hải sản… Tuy nhiên, để trải nghiệm các dịch vụ cao cấp này, bạn cần bỏ qua một khoản chi phí đáng kể. (> 2.500.000 VND/ người cho một hành trình 2 ngày 1 đêm trên du thuyền)\r\n\r\nVịnh Hạ Long thì mùa nào cũng đẹp, nhưng thời điểm thích hợp nhất là từ tháng 4 đến tháng 10 hàng năm. Thời điểm này tiết trời quang đãng thích hợp cho ngắm cảnh trên biển. Nếu ở xa, bạn nên lưu ý khi đến Hạ Long vào những tháng bão như tháng 7, tháng 8. Vào những ngày bão, tàu thuyền không được phép ra vịnh vì lí do an toàn.\r\n\r\nReview cho bạn: Mình đã đi du thuyền nhiều lần và thấy rằng đây thực sự là trải nghiệm tuyệt vời so với số tiền bạn bỏ ra, các du thuyền giống như khách sạn nổi trên mặt nước, rất tiện nghi và thoải mái, nếu đi cùng gia đình hoặc nhóm bạn thì thật là tuyệt vời. Có lưu ý là bữa ăn trên du thuyền được set up sẵn hoặc phục vụ dạng buffet nên nếu bạn kì vọng được nếm thử nhiều món ăn kiểu đường phố, ăn vặt thì phải chờ bên bờ nhé, à, nữa là đồ uống trên du thuyền khá đắt đấy nhé…', 12, 'https://www.youtube.com/embed/lTCsqTlcjvg', '2020-07-17 01:29:35', '2020-07-17 01:43:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `replycomment`
--

CREATE TABLE `replycomment` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `content` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `repost` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `replycomment`
--

INSERT INTO `replycomment` (`id`, `comment_id`, `user_id`, `content`, `repost`, `created_at`, `updated_at`) VALUES
(36, 24, 2, 'dsvdsvs', 0, '2020-07-16 22:29:31', '2020-07-16 22:29:31'),
(37, 23, 2, 'dsvsdv', 1, '2020-07-16 22:29:37', '2020-07-17 00:27:53'),
(38, 22, 2, 'vsdvsv', 0, '2020-07-16 22:29:41', '2020-07-16 22:29:41'),
(39, 22, 2, 'svsdvsd', 0, '2020-07-16 22:29:50', '2020-07-16 22:29:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ngoctriqntest@gmail.com', '$2y$10$h64cAEyVzAKuFFepaEqnDuiGOVwrb9lvmzi/..VUQ1pdZkAcDAGyi', NULL, '2020-07-13 20:30:24', '2020-07-16 20:23:53'),
(2, 'ngoctriglx@gmail.com', NULL, NULL, '2020-07-13 22:39:01', '2020-07-13 22:39:01');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_user_id_foreign` (`user_id`),
  ADD KEY `comment_post_id_foreign` (`post_id`);

--
-- Chỉ mục cho bảng `imgpost`
--
ALTER TABLE `imgpost`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imgpost_post_id_foreign` (`post_id`);

--
-- Chỉ mục cho bảng `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `info_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `likepost`
--
ALTER TABLE `likepost`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likepost_user_id_foreign` (`user_id`),
  ADD KEY `likepost_post_id_foreign` (`post_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `replycomment`
--
ALTER TABLE `replycomment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `replycomment_comment_id_foreign` (`comment_id`),
  ADD KEY `replycomment_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `imgpost`
--
ALTER TABLE `imgpost`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `info`
--
ALTER TABLE `info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `likepost`
--
ALTER TABLE `likepost`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `replycomment`
--
ALTER TABLE `replycomment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `imgpost`
--
ALTER TABLE `imgpost`
  ADD CONSTRAINT `imgpost_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `info`
--
ALTER TABLE `info`
  ADD CONSTRAINT `info_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `likepost`
--
ALTER TABLE `likepost`
  ADD CONSTRAINT `likepost_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likepost_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `replycomment`
--
ALTER TABLE `replycomment`
  ADD CONSTRAINT `replycomment_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comment` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `replycomment_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
