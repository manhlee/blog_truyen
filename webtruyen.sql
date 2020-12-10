-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 10, 2020 lúc 04:10 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webtruyen`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `noidung` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_truyen` bigint(20) UNSIGNED NOT NULL,
  `id_chuong` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuong`
--

CREATE TABLE `chuong` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenkhongdau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_truyen` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chuong`
--

INSERT INTO `chuong` (`id`, `ten`, `tenkhongdau`, `noidung`, `id_truyen`, `created_at`, `updated_at`) VALUES
(2, 'chương 1', 'chuong-1', 'dfsdfdfafdsafasdfasdfdsf', 4, NULL, NULL),
(3, 'Chương 1: Gặp nhau bên bụi chuối', 'Chuong-1:-Gap-nhau-ben-bui-chuoi', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 2, '2020-12-10 06:37:26', '2020-12-10 07:58:29'),
(6, 'What is Lorem Ipsum?', 'What-is-Lorem-Ipsum?', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 2, '2020-12-11 03:40:46', '2020-12-11 03:40:46'),
(7, 'Why do we use it?', 'Why-do-we-use-it?', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 2, '2020-12-11 03:41:04', '2020-12-11 03:41:04'),
(8, 'Where can I get some?', 'Where-can-I-get-some?', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 2, '2020-12-11 03:41:26', '2020-12-11 03:41:26'),
(9, 'Where does it come from?', 'Where-does-it-come-from?', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 2, '2020-12-11 03:41:43', '2020-12-11 03:41:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `daxem`
--

CREATE TABLE `daxem` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_truyen` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_resets_table', 1),
(13, '2019_08_19_000000_create_failed_jobs_table', 1),
(14, '2020_11_23_082314_create_theloai', 1),
(15, '2020_11_23_083655_create_theloaitruyen', 1),
(16, '2020_11_23_111742_create_tacgia', 1),
(17, '2020_11_23_111743_create_truyen', 1),
(18, '2020_11_23_111744_create_chuong', 1),
(19, '2020_11_23_120810_create_daxem', 1),
(20, '2020_11_23_121125_create_binhluan', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tacgia`
--

CREATE TABLE `tacgia` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenkhongdau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioithieu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tacgia`
--

INSERT INTO `tacgia` (`id`, `ten`, `tenkhongdau`, `gioithieu`, `created_at`, `updated_at`) VALUES
(5, 'Hoàng Phủ Ngọc Tường', 'Hoang-Phu-Ngoc-Tuong', '<p><strong>Ho&agrave;ng Phủ Ngọc Tường</strong> l<em>&agrave; một t&aacute;c giả đi đầu trong thời k&igrave; văn mẫu. <strong>&Ocirc;ng l&agrave; một t&aacute;c giả c&oacute; kinh nghiệm trong lĩnh vực n&agrave;y</strong></em></p>', '2020-12-02 23:14:52', '2020-12-02 23:32:35'),
(6, 'Nam Cao', 'Nam-Cao', NULL, '2020-12-03 00:01:47', '2020-12-03 00:01:47'),
(7, 'Văn Cao', 'Van-Cao', NULL, '2020-12-03 00:01:52', '2020-12-03 00:01:52'),
(8, 'Tố Hữu', 'To-Huu', NULL, '2020-12-03 00:01:57', '2020-12-03 00:01:57'),
(9, 'Hồ Chí Minh', 'Ho-Chi-Minh', NULL, '2020-12-03 00:02:05', '2020-12-03 00:02:05'),
(10, 'Lê Sỹ Đức Mạnh', 'Le-Sy-Duc-Manh', NULL, '2020-12-03 00:02:16', '2020-12-03 00:02:16'),
(11, 'Manh lê', 'Manh-le', NULL, '2020-12-03 00:02:21', '2020-12-03 00:02:21'),
(12, 'Nguyễn Du', 'Nguyen-Du', NULL, '2020-12-03 00:02:44', '2020-12-03 00:02:44'),
(13, 'Nguyễn Huệ', 'Nguyen-Hue', NULL, '2020-12-03 00:02:50', '2020-12-03 00:02:50'),
(14, 'Nguyễn Khuyến', 'Nguyen-Khuyen', NULL, '2020-12-03 00:02:59', '2020-12-03 00:02:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tentheloai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenkhongdau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`id`, `tentheloai`, `tenkhongdau`, `created_at`, `updated_at`) VALUES
(1, 'Văn học Việt Nam', 'Van-hoc-Viet-Nam', '2020-11-25 12:12:30', '2020-11-27 05:06:01'),
(21, 'Văn học nước ngoài', 'Van-hoc-nuoc-ngoai', '2020-11-27 06:32:26', '2020-11-27 06:32:26'),
(34, 'Truyện ngụ ngôn', 'Truyen-ngu-ngon', '2020-12-02 04:49:21', '2020-12-02 04:49:21'),
(35, 'Truyện kinh dị', 'Truyen-kinh-di', '2020-12-02 04:49:29', '2020-12-02 04:49:29'),
(36, 'Truyện hóm hỉnh', 'Truyen-hom-hinh', '2020-12-02 04:49:37', '2020-12-02 04:49:37'),
(37, 'Truyện cười', 'Truyen-cuoi', '2020-12-02 04:49:46', '2020-12-02 04:49:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloaitruyen`
--

CREATE TABLE `theloaitruyen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tentheloai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenkhongdau` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theloaicha` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `theloaitruyen`
--

INSERT INTO `theloaitruyen` (`id`, `tentheloai`, `tenkhongdau`, `theloaicha`, `created_at`, `updated_at`) VALUES
(1, 'Truyện cười', 'Truyen-cuoi', 21, '2020-11-30 19:20:41', '2020-11-30 19:20:41'),
(2, 'Bút ký', 'But-ky', 21, '2020-11-30 19:33:06', '2020-11-30 19:33:06'),
(6, 'Truyện ma làng quê', 'Truyen-ma-lang-que', 35, '2020-12-02 08:18:10', '2020-12-02 08:18:10'),
(7, 'Truyện ma tây phương', 'Truyen-ma-tay-phuong', NULL, '2020-12-02 08:18:23', '2020-12-05 00:20:38'),
(8, 'Truyện ma dân gian', 'Truyen-ma-dan-gian', 35, '2020-12-02 08:18:35', '2020-12-02 08:18:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `truyen`
--

CREATE TABLE `truyen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tentruyen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenkhongdau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioithieu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trangthai` tinyint(4) NOT NULL DEFAULT 1,
  `hinhanh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `id_theloaitruyen` bigint(20) UNSIGNED NOT NULL,
  `id_tacgia` bigint(20) UNSIGNED NOT NULL,
  `luotxem` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `truyen`
--

INSERT INTO `truyen` (`id`, `tentruyen`, `tenkhongdau`, `gioithieu`, `trangthai`, `hinhanh`, `user_id`, `id_theloaitruyen`, `id_tacgia`, `luotxem`, `created_at`, `updated_at`) VALUES
(2, 'Đôi lứa xứng đôi', 'Doi-lua-xung-doi', 'Chí Phèo là tên thật là Nam Cao', 1, '7r11w2yv0i1tjsd8wygg.jpg', 1, 1, 6, 0, '2020-12-04 06:25:38', '2020-12-04 23:39:03'),
(3, 'Tắt đèn', 'Tat-den', NULL, 1, 'rjkb4pi8tg58k13skqzb.JPG', 1, 6, 8, 0, '2020-12-06 17:41:38', '2020-12-06 17:41:38'),
(4, 'Số đỏ', 'So-do', NULL, 1, 'qrxlb9kd8g1mrrkw51oy.jpg', 1, 2, 10, 0, '2020-12-06 17:43:54', '2020-12-06 17:43:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'manhdzzd98@gmail.com', NULL, '$2y$10$NjBhNNEH8YprkR33gjsf.uHxG1bnzCAFhw/pLkUya4AnBlII9HE42', 2, NULL, NULL, '2020-12-09 06:32:21'),
(2, 'admin2', 'manh73879@st.vimaru.edu.vn', NULL, '$2y$10$NjBhNNEH8YprkR33gjsf.uHxG1bnzCAFhw/pLkUya4AnBlII9HE42', 3, NULL, NULL, NULL),
(3, 'manh98', 'manh123@gmail.com', NULL, '$2y$10$NjBhNNEH8YprkR33gjsf.uHxG1bnzCAFhw/pLkUya4AnBlII9HE42', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `view_truyen`
-- (See below for the actual view)
--
CREATE TABLE `view_truyen` (
`tenkhongdau` varchar(255)
,`id` bigint(20) unsigned
,`tentruyen` varchar(255)
,`trangthai` tinyint(4)
,`user_id` bigint(20) unsigned
,`name` varchar(255)
,`id_theloaitruyen` bigint(20) unsigned
,`tentheloai` varchar(255)
,`id_tacgia` bigint(20) unsigned
,`tentacgia` varchar(255)
,`sochuong` bigint(21)
);

-- --------------------------------------------------------

--
-- Cấu trúc cho view `view_truyen`
--
DROP TABLE IF EXISTS `view_truyen`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_truyen`  AS SELECT `truyen`.`tenkhongdau` AS `tenkhongdau`, `truyen`.`id` AS `id`, `truyen`.`tentruyen` AS `tentruyen`, `truyen`.`trangthai` AS `trangthai`, `truyen`.`user_id` AS `user_id`, `users`.`name` AS `name`, `truyen`.`id_theloaitruyen` AS `id_theloaitruyen`, `theloaitruyen`.`tentheloai` AS `tentheloai`, `truyen`.`id_tacgia` AS `id_tacgia`, `tacgia`.`ten` AS `tentacgia`, count(`chuong`.`id`) AS `sochuong` FROM ((((`truyen` join `theloaitruyen` on(`theloaitruyen`.`id` = `truyen`.`id_theloaitruyen`)) join `users` on(`users`.`id` = `truyen`.`user_id`)) join `tacgia` on(`tacgia`.`id` = `truyen`.`id_tacgia`)) left join `chuong` on(`chuong`.`id_truyen` = `truyen`.`id`)) GROUP BY `truyen`.`id`, `truyen`.`tentruyen` ;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `binhluan_id_chuong_foreign` (`id_chuong`),
  ADD KEY `binhluan_id_truyen_foreign` (`id_truyen`),
  ADD KEY `binhluan_id_user_foreign` (`id_user`);

--
-- Chỉ mục cho bảng `chuong`
--
ALTER TABLE `chuong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chuong_id_truyen_foreign` (`id_truyen`);

--
-- Chỉ mục cho bảng `daxem`
--
ALTER TABLE `daxem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `daxem_id_truyen_foreign` (`id_truyen`),
  ADD KEY `daxem_id_user_foreign` (`id_user`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `tacgia`
--
ALTER TABLE `tacgia`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tacgia_ten_unique` (`ten`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `theloai_tentheloai_unique` (`tentheloai`);

--
-- Chỉ mục cho bảng `theloaitruyen`
--
ALTER TABLE `theloaitruyen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `theloaitruyen_tentheloai_unique` (`tentheloai`),
  ADD KEY `theloaitruyen_theloaicha_foreign` (`theloaicha`);

--
-- Chỉ mục cho bảng `truyen`
--
ALTER TABLE `truyen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `truyen_id_tacgia_foreign` (`id_tacgia`),
  ADD KEY `truyen_id_theloaitruyen_foreign` (`id_theloaitruyen`),
  ADD KEY `truyen_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chuong`
--
ALTER TABLE `chuong`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `daxem`
--
ALTER TABLE `daxem`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `tacgia`
--
ALTER TABLE `tacgia`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `theloaitruyen`
--
ALTER TABLE `theloaitruyen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `truyen`
--
ALTER TABLE `truyen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_id_chuong_foreign` FOREIGN KEY (`id_chuong`) REFERENCES `chuong` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `binhluan_id_truyen_foreign` FOREIGN KEY (`id_truyen`) REFERENCES `truyen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `binhluan_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chuong`
--
ALTER TABLE `chuong`
  ADD CONSTRAINT `chuong_id_truyen_foreign` FOREIGN KEY (`id_truyen`) REFERENCES `truyen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `daxem`
--
ALTER TABLE `daxem`
  ADD CONSTRAINT `daxem_id_truyen_foreign` FOREIGN KEY (`id_truyen`) REFERENCES `truyen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `daxem_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `theloaitruyen`
--
ALTER TABLE `theloaitruyen`
  ADD CONSTRAINT `theloaitruyen_theloaicha_foreign` FOREIGN KEY (`theloaicha`) REFERENCES `theloai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `truyen`
--
ALTER TABLE `truyen`
  ADD CONSTRAINT `truyen_id_tacgia_foreign` FOREIGN KEY (`id_tacgia`) REFERENCES `tacgia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `truyen_id_theloaitruyen_foreign` FOREIGN KEY (`id_theloaitruyen`) REFERENCES `theloaitruyen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `truyen_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
