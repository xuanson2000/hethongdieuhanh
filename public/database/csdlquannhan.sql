-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2020 at 08:55 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csdlquannhan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password_change_at` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`, `password_change_at`, `username`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$vADOLB4Ao4dGOiJB4uaRV.sIQPEaOYU07BMrp3amGKk6yOAwmlBPK', 1, 'admin', '2019-11-02 13:58:25', '2019-11-02 13:58:25');

-- --------------------------------------------------------

--
-- Table structure for table `bantin`
--

CREATE TABLE `bantin` (
  `id` int(11) NOT NULL,
  `tenBantin` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tenBanTinKhongDau` varchar(700) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tomTat` text COLLATE utf8_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `anh` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `idLoaitin` int(11) NOT NULL,
  `nguoiDang` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bantin`
--

INSERT INTO `bantin` (`id`, `tenBantin`, `tenBanTinKhongDau`, `tomTat`, `noidung`, `anh`, `idLoaitin`, `nguoiDang`, `created_at`, `updated_at`, `slug`) VALUES
(7, 'CMC TS tham gia liên minh CoMeet cung cấp giải pháp họp trực tuyến \"Made in Vietnam\"gdg', 'cmc-ts-tham-gia-lien-minh-comeet-cung-cap-giai-phap-hop-truc-tuyen-made-in-vietnam', '<p>Li&ecirc;n minh CoMeet gồm 5 th&agrave;nh vi&ecirc;n cho biết sẽ ra mắt ch&ugrave;m giải ph&aacute;p tư vấn, thiết kế, triển khai, t&iacute;ch hợp, hỗ trợ v&agrave; bảo tr&igrave; hệ thống video conference (họp trực tuyến) tr&ecirc;n nền tảng phần mềm nguồn mở Jitsi trong th&aacute;ng 4 n&agrave;y.</p>', '<p>Li&ecirc;n minh CoMeet ra đời đầu th&aacute;ng 4/2020 với mục đ&iacute;ch g&oacute;p phần đem đến c&aacute;c giải ph&aacute;p hiệu quả, an to&agrave;n, bảo mật, tự chủ c&ocirc;ng nghệ v&agrave; được thiết kế t&ugrave;y biến theo y&ecirc;u cầu ri&ecirc;ng của cơ quan, tổ chức, doanh nghiệp, trong bối cảnh nhiều đơn vị đ&atilde; v&agrave; đang chuyển sang m&ocirc; h&igrave;nh l&agrave;m việc online, trực tuyến từ xa.</p>\r\n\r\n<p>Năm th&agrave;nh vi&ecirc;n của CoMeet gồm CMC TS, NetNam, iWay, FDS v&agrave; DQN đều l&agrave; những hội vi&ecirc;n t&iacute;ch cực của C&acirc;u lạc bộ Phần mềm tự do nguồn mở Việt Nam (VFOSSA).</p>\r\n\r\n<p>Thời điểm hiện tại, c&aacute;c đơn vị trong li&ecirc;n minh đều đang gấp r&uacute;t ho&agrave;n thiện để sớm ch&iacute;nh thức c&ocirc;ng bố cung cấp giải ph&aacute;p tư vấn, thiết kế, triển khai, t&iacute;ch hợp, hỗ trợ v&agrave; bảo tr&igrave; hệ thống video conference (họp trực tuyến) tr&ecirc;n nền tảng phần mềm nguồn mở Jitsi cho đ&ocirc;ng đảo người d&ugrave;ng.</p>', 'hRvL_332.png', 1, 1, '2020-08-25 03:20:42', '2020-08-24 20:20:42', 'cmc-ts-tham-gia-lien-minh-comeet-cung-cap-giai-phap-hop-truc-tuyen-made-in-vietnam');

-- --------------------------------------------------------

--
-- Table structure for table `gioithieu`
--

CREATE TABLE `gioithieu` (
  `id` int(11) NOT NULL,
  `tieuDe` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `anh` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `gia` date NOT NULL,
  `giaKm` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gioithieu`
--

INSERT INTO `gioithieu` (`id`, `tieuDe`, `noidung`, `anh`, `gia`, `giaKm`) VALUES
(18, 'GIỚI THIỆU CHUNG', '<p>Năm 1986, ch&iacute;nh s&aacute;ch mới của Đại hội Đảng VI đ&atilde; gợi mở, khuyến kh&iacute;ch c&aacute;c th&agrave;nh phần kinh tế ph&aacute;t triển, giải ph&oacute;ng năng lực sản xuất của x&atilde; hội để mở đường cho ph&aacute;t triển sản xuất. DELTA l&agrave; một trong c&aacute;c doanh nghiệp tư nh&acirc;n đầu ti&ecirc;n của Việt nam ra đời từ chủ trương đổi mới n&agrave;y.<br />\r\nTh&aacute;ng 1 năm 1993, khi đang l&agrave;m gi&aacute;m đốc Trung t&acirc;m nghi&ecirc;n cứu ứng dụng kỹ thuật x&acirc;y dựng thuộc Trường Đại học x&acirc;y dựng, &ocirc;ng Trần Nhật Th&agrave;nh quyết định th&agrave;nh lập C&ocirc;ng ty TNHH x&acirc;y dựng d&acirc;n dụng v&agrave; c&ocirc;ng nghiệp DELTA.<br />\r\nDELTA đặc biệt bởi việc hội tụ những chuy&ecirc;n gia uy t&iacute;n trong ng&agrave;nh x&acirc;y dựng với mong muốn mang những kiến thức t&iacute;ch lũy được, những nghi&ecirc;n cứu l&yacute; thuyết v&agrave;o ứng dụng thực tiễn. Phương hướng của c&ocirc;ng ty l&agrave; đi v&agrave;o những lĩnh vực kh&oacute; đ&ograve;i hỏi lương t&acirc;m v&agrave; tri thức của đội ngũ nh&acirc;n lực tr&igrave;nh độ cao, &aacute;p dụng c&ocirc;ng nghệ x&acirc;y dựng m&ocirc;t c&aacute;ch tối đa.<br />\r\nTrải qua 25 năm x&acirc;y dựng v&agrave; ph&aacute;t triển, DELA đ&atilde; trở th&agrave;nh Tập đo&agrave;n X&acirc;y dựng lớn mạnh với 12 c&ocirc;ng ty th&agrave;nh vi&ecirc;n, 2516 c&aacute;n bộ kỹ sư, kiến tr&uacute;c sư v&agrave; hệ thống thiết bị m&aacute;y m&oacute;c đồng bộ, hiện đại hoạt động trong lĩnh vực x&acirc;y dựng. C&aacute;c c&ocirc;ng tr&igrave;nh ti&ecirc;u biểu trong rất nhiều c&aacute;c c&ocirc;ng tr&igrave;nh m&agrave; DELTA đ&atilde; thực hiện tr&ecirc;n khắp mọi miền đất nước l&agrave;: Bitexco Financial Tower, Dophin Tower, Keangnam Landmark, Sky City, Eden Center, Times City, Royal City, Goldmark City, Vinhome Center City, Vinpearl Ph&uacute; Quốc&hellip;.<br />\r\nTập đo&agrave;n DELTA được đ&aacute;nh gi&aacute; l&agrave; nh&agrave; thầu h&agrave;ng đầu trong thi c&ocirc;ng phần hầm c&ocirc;ng tr&igrave;nh v&agrave; l&agrave; một trong năm c&ocirc;ng ty x&acirc;y dựng h&agrave;ng đầu Việt Nam trong ng&agrave;nh x&acirc;y dựng d&acirc;n dụng v&agrave; c&ocirc;ng nghiệp.</p>', 'CIgE_photo1.png', '2015-02-12', '2016-02-13'),
(20, 'dfd', 'dfdf', 'fđ', '2012-02-12', '2020-02-12'),
(21, 'đ', '', '', '2011-02-12', '2020-02-12');

-- --------------------------------------------------------

--
-- Table structure for table `lienhe`
--

CREATE TABLE `lienhe` (
  `id` int(11) NOT NULL,
  `tenLienhe` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `anh` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loaitin`
--

CREATE TABLE `loaitin` (
  `id` int(11) NOT NULL,
  `tenLoaitin` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tenLoaTinKhongDau` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaitin`
--

INSERT INTO `loaitin` (`id`, `tenLoaitin`, `tenLoaTinKhongDau`) VALUES
(1, 'Tin tức công ty', NULL),
(3, 'Tin tức dự án', NULL),
(4, 'Tin trong ngành', NULL),
(6, 'Tin trong ngành mới', 'tin-trong-nganh-moi'),
(7, 'tin trong nước', NULL),
(8, 'tin trong nước', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `primesions`
--

CREATE TABLE `primesions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quannhanmattin`
--

CREATE TABLE `quannhanmattin` (
  `id` int(11) NOT NULL,
  `hoten` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quequan` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `ngaynhapngu` date DEFAULT NULL,
  `capbac` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chucvu` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `donvi` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `hotenme` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hotenbo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hotenvo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nguoithankhac` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoigiandiadiemmt` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `truonghopmt` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hosoluuluu` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `noilutru` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ketquaxacminh` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `donvixacminh` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ketquathuchienchinhsach` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaybaotu` date DEFAULT NULL,
  `sogiaybaotu` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quannhanmattin`
--

INSERT INTO `quannhanmattin` (`id`, `hoten`, `quequan`, `ngaysinh`, `ngaynhapngu`, `capbac`, `chucvu`, `donvi`, `hotenme`, `hotenbo`, `hotenvo`, `nguoithankhac`, `thoigiandiadiemmt`, `truonghopmt`, `hosoluuluu`, `noilutru`, `ketquaxacminh`, `donvixacminh`, `ketquathuchienchinhsach`, `ngaybaotu`, `sogiaybaotu`) VALUES
(13, 'Nguyễn Văn Kinh', 'Thôn 2 - Xóm ki Ade - xã Xín Mình - huyện Gia Lộc - tỉnh Điện Biên', '1982-12-02', '1995-12-02', 'Trung úy', 'Tiểu đội trưởng', 'Tiểu đội 2 Trung đoàn 4 -Bộ tư lệnh quân khu 4', NULL, 'Nguyễn Văn Kinh', 'sdsd', 'gdsdg', 'fgfd\r\n12/02/1995', 'Đi la,f nhiệm vụ', 'Số 12/ Cục chính sahcs', NULL, NULL, NULL, 'Đã công nhận liệt sỹ', '1992-12-02', 'dasd234234'),
(42, 'Nguyễn Xuân Hợi', 'Thôn 2 - Xóm ki Ade - xã Xín Mình - huyện Gia Lộc - tỉnh Điện Biên', '1982-12-02', '1995-12-02', 'Trung úy', 'Tiểu đội trưởng', 'Tiểu đội 2 Trung đoàn 4 -Bộ tư lệnh quân khu 4', 'Nguyễn Thị A', 'Nguyễn Văn Kinh', 'Nguyễn Thị C', 'Nguyễn Văn C', 'Mặt trận phía nam\n12/02/1995', 'Đang đi làm nhiệm vụ', 'Số 12/ Cục chính sahcs', NULL, 'Chưa có', NULL, 'Đã công nhận liệt sỹ', '1992-12-02', 'dasd234234 '),
(46, 'Nguyễn Xuân Hợi', 'Thôn 2 - Xóm ki Ade - xã Xín Mình - huyện Gia Lộc - tỉnh Điện Biên', NULL, '1995-12-02', 'Trung úy', 'Tiểu đội trưởng', 'Tiểu đội 2 Trung đoàn 4 -Bộ tư lệnh quân khu 4', 'Nguyễn Thị A', 'Nguyễn Văn Kinh', 'Nguyễn Thị C', 'Nguyễn Văn C', 'Mặt trận phía nam\n12/02/1995', 'Đang đi làm nhiệm vụ', 'Số 12/ Cục chính sahcs', NULL, 'Chưa có', NULL, 'Đã công nhận liệt sỹ', '1992-12-02', 'dasd234234 '),
(53, 'Nguyễn Xuân Hợi', 'Thôn 2 - Xóm ki Ade - xã Xín Mình - huyện Gia Lộc - tỉnh Điện Biên', '2018-02-12', '1995-12-02', 'Trung úy', 'Tiểu đội trưởng', 'Tiểu đội 2 Trung đoàn 4 -Bộ tư lệnh quân khu 4', 'Nguyễn Thị A', 'Nguyễn Văn Kinh', 'Nguyễn Thị C', 'Nguyễn Văn C', 'Mặt trận phía nam\n12/02/1995', 'Đang đi làm nhiệm vụ', 'Số 12/ Cục chính sahcs', NULL, 'Chưa có', NULL, 'Đã công nhận liệt sỹ', '1992-12-02', 'dasd234234 '),
(54, 'Nguyễn Xuân JHAF', 'Thôn 2 - Xóm ki Ade - xã Xín Mình - huyện Gia Lộc - tỉnh Điện Biên', '2018-02-12', '1995-12-02', 'Trung úy', 'Tiểu đội trưởng', 'Tiểu đội 2 Trung đoàn 4 -Bộ tư lệnh quân khu 4', 'Nguyễn Thị A', 'Nguyễn Văn Kinh', 'Nguyễn Thị C', 'Nguyễn Văn C', 'Mặt trận phía nam\n12/02/1995', 'Đang đi làm nhiệm vụ', 'Số 12/ Cục chính sahcs', NULL, 'Chưa có', NULL, 'Đã công nhận liệt sỹ', '1992-12-02', 'dasd234234 '),
(55, 'Nguyễn Xuân Qqng', 'Thôn 2 - Xóm ki Ade - xã Xín Mình - huyện Gia Lộc - tỉnh Điện Biên', '2018-02-12', '1995-12-02', 'Trung úy', 'Tiểu đội trưởng', 'Tiểu đội 2 Trung đoàn 4 -Bộ tư lệnh quân khu 4', 'Nguyễn Thị A', 'Nguyễn Văn Kinh', 'Nguyễn Thị C', 'Nguyễn Văn C', 'Mặt trận phía nam\n12/02/1995', 'Đang đi làm nhiệm vụ', 'Số 12/ Cục chính sahcs', NULL, 'Chưa có', NULL, 'Đã công nhận liệt sỹ', '1992-12-02', 'dasd234234 '),
(56, 'Nguyễn Xuân Qqng', 'Thôn 2 - Xóm ki Ade - xã Xín Mình - huyện Gia Lộc - tỉnh Điện Biên', '2018-02-12', '1995-12-02', 'Trung úy', 'Tiểu đội trưởng', 'Tiểu đội 2 Trung đoàn 4 -Bộ tư lệnh quân khu 4', 'Nguyễn Thị A', 'Nguyễn Văn Kinh', 'Nguyễn Thị C', 'Nguyễn Văn C', 'Mặt trận phía nam\n12/02/1995', 'Đang đi làm nhiệm vụ', 'Số 12/ Cục chính sahcs', NULL, 'Chưa có', NULL, 'Đã công nhận liệt sỹ', '1992-12-02', 'dasd234234 ');

-- --------------------------------------------------------

--
-- Table structure for table `quantri`
--

CREATE TABLE `quantri` (
  `id` int(11) NOT NULL,
  `username` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `namclass` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `truycap` int(11) DEFAULT NULL,
  `index` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `anh` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `phongBan` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quantri`
--

INSERT INTO `quantri` (`id`, `username`, `password`, `namclass`, `truycap`, `index`, `created_at`, `updated_at`, `anh`, `phongBan`) VALUES
(1, 'admin', '$2y$10$lLJ/x2649fTRGbOUr4WtjOn6C8a0SLpBVHSlg1utgHApCfc3VWxh2', 'NGUYỄN XUÂN SƠN', 1, 'p', '2020-04-27 13:12:54', '2019-10-20 15:27:39', 'tWy6_a2.jpg', ''),
(19, 'admin1', '$2y$10$6Ood3W7S/OFuV4C0bkQQie4yO6Ds2cM5ln0B/CCdQEcwGWyyGegBm', 'Nguyễn Xuân Sơn', 1, NULL, '2020-10-13 04:04:34', '2020-10-13 04:04:15', 'pYl2_a2.png', 'Phòng Chính sách'),
(20, 'chuyenvien', '$2y$10$SFOyiEQeevyyfe0I3.90M.RNhF17o/ThsSAzNqiNExYmblVOArnhu', 'CHuyên Viên', 1, NULL, '2020-10-13 04:08:57', '2020-10-13 04:08:10', 'eYPv_a2.png', 'Chính sách');

-- --------------------------------------------------------

--
-- Table structure for table `quantri_vaitro`
--

CREATE TABLE `quantri_vaitro` (
  `id` int(11) NOT NULL,
  `qt_id` int(11) NOT NULL,
  `vt_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quantri_vaitro`
--

INSERT INTO `quantri_vaitro` (`id`, `qt_id`, `vt_id`) VALUES
(1, 1, 1),
(11, 15, 5),
(12, 16, 5),
(13, 17, 1),
(14, 18, 5),
(15, 19, 9),
(16, 20, 10);

-- --------------------------------------------------------

--
-- Table structure for table `quyen`
--

CREATE TABLE `quyen` (
  `id` int(11) NOT NULL,
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quyen`
--

INSERT INTO `quyen` (`id`, `name`) VALUES
(32, 'xem-danh-sach-quan-nhan'),
(33, 'sua-quan-nhan'),
(34, 'xoa-quan-nhan'),
(35, 'them-quan-nhan'),
(36, 'jas');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles_primesion`
--

CREATE TABLE `roles_primesion` (
  `id` int(11) NOT NULL,
  `prime_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles_user`
--

CREATE TABLE `roles_user` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `tenSanpham` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tieuDe` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `anh` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `tenSanpham`, `tieuDe`, `noidung`, `anh`) VALUES
(5, 'Tư vấn thiết kế', 'Lĩnh vực tư vấn thiết kế được Delta phát triển độc lập ngay từ những ngày đầu thành lập Tập đoàn. Với đội ngũ lãnh đạo đều là những kiến trúc sư, kỹ sư kết cấu là giảng viên cao cấp được đào tạo chuyện sâu ở nước ngoài, những công trình Delta tham gia tư vấn thiết kế đều thể hiện tính thẩm mỹ và ứng dụng cao.', '<p>Lĩnh vực tư vấn thiết kế được Delta ph&aacute;t triển độc lập ngay từ những ng&agrave;y đầu th&agrave;nh lập Tập đo&agrave;n. Với đội ngũ l&atilde;nh đạo đều l&agrave; những kiến tr&uacute;c sư, kỹ sư kết cấu l&agrave; giảng vi&ecirc;n cao cấp được đ&agrave;o tạo chuyện s&acirc;u ở nước ngo&agrave;i, những c&ocirc;ng tr&igrave;nh Delta tham gia tư vấn thiết kế đều thể hiện t&iacute;nh thẩm mỹ v&agrave; ứng dụng cao.</p>\r\n\r\n<p>Việc th&agrave;nh lập li&ecirc;n doanh Sacidelta c&ugrave;ng với C&ocirc;ng ty kiến tr&uacute;c Sacieg Cộng h&ograve;a Ph&aacute;p v&agrave; th&agrave;nh lập C&ocirc;ng ty Tư vấn Kiến tr&uacute;c- X&acirc;y dựng TT-As (TT-Associates) l&agrave; những bước đi chiến lược của Delta trong việc đẩy mạnh ph&aacute;t triển lĩnh vực tư vấn thiết kế. Việc hợp t&aacute;c, li&ecirc;n danh c&ugrave;ng c&aacute;c c&ocirc;ng ty nước ngo&agrave;i tạo cơ hội cho đội ngũ kiến tr&uacute;c sư Delta li&ecirc;n tục được trao đổi, hợp t&aacute;c đ&agrave;o tạo, cập nhật những xu hướng ph&aacute;t triển hiện đại.</p>\r\n\r\n<p>Đội ngũ tư vấn, thiết kế hỗ trợ đắc lực cho c&aacute;c dự &aacute;n Detla đứng thầu ch&iacute;nh, tổng thầu&hellip;, lu&ocirc;n ch&uacute; trọng phối kết hợp với kh&ocirc;ng gian hay bối cảnh cụ thể của nơi đặt kiến tr&uacute;c đ&oacute;, nhằm tạo ra những c&ocirc;ng tr&igrave;nh mang t&iacute;nh thực dụng cao m&agrave; vẫn c&oacute; hồn. Triết l&yacute; s&aacute;ng tạo n&agrave;y phối hợp h&agrave;i h&ograve;a giữa lợi &iacute;ch của kh&aacute;ch h&agrave;ng nhưng vẫn đ&aacute;p ứng tốt nhất nhu cầu của con người: tiện dụng, hiệu quả, ứng dụng được kỹ thuật c&ocirc;ng nghệ, c&oacute; t&iacute;nh thẩm mỹ cao v&agrave; mang hơi thở của thời đại.</p>\r\n\r\n<p><img alt=\"\" src=\"https://deltacorp.vn/wp-content/uploads/2017/03/Tu-choi-cap-phep-xay-dung-phai-neu-ro-ly-do-1.jpg\" style=\"height:750px; width:1200px\" /><br />\r\nVới những kinh nghiệm được t&iacute;ch lũy trong hơn 20 năm th&agrave;nh lập, ph&aacute;t triển, hợp t&aacute;c, li&ecirc;n danh với c&aacute;c c&ocirc;ng ty nước ngo&agrave;i như: Ph&aacute;p, Đức, Nhật Bản, H&agrave;n Quốc, Singapore, Hoa Kỳ &hellip; c&ugrave;ng những giải thưởng đạt được, Delta tự tin v&agrave;o năng lực của m&igrave;nh trong tư vấn phương &aacute;n quy hoạch, giải ph&aacute;p kiến tr&uacute;c, thiết kế, cảnh quan, kết cấu, v.v&hellip;</p>', 'tBja_blurrys.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `anh` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `noiDung` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `tieuDe` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `anh`, `noiDung`, `tieuDe`, `created_at`, `updated_at`) VALUES
(2, 'bg_1.jpg', 'Education Needs Complete Solution', '', '2020-04-15 15:12:21', NULL),
(3, 'bg_2.jpg', 'University, College School Education', '', '2020-04-27 15:12:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gianiemyet` double NOT NULL,
  `gikhuyenmai` double NOT NULL,
  `ngay` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`, `gianiemyet`, `gikhuyenmai`, `ngay`) VALUES
(1, 'Máy giặt ', 2000000, 1500000, '2020-08-05'),
(2, 'Tủ lạnh', 5000000, 4900000, '2020-05-07'),
(3, 'Ti vi', 1500000, 1100000, '2020-07-15'),
(4, 'Lò vi sóng', 1500000, 1000000, '2020-06-18'),
(5, 'Điều hòa', 1500000, 1400000, '2020-09-01'),
(6, 'Máy lọc nước', 4500000, 4200000, '2020-06-24');

-- --------------------------------------------------------

--
-- Table structure for table `vaitro`
--

CREATE TABLE `vaitro` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vaitro`
--

INSERT INTO `vaitro` (`id`, `name`, `note`) VALUES
(9, 'administrator', NULL),
(10, 'review', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vaitro_quyen`
--

CREATE TABLE `vaitro_quyen` (
  `id` int(11) NOT NULL,
  `quyen_id` int(11) NOT NULL,
  `vt_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vaitro_quyen`
--

INSERT INTO `vaitro_quyen` (`id`, `quyen_id`, `vt_id`) VALUES
(22, 32, 9),
(23, 33, 9),
(24, 34, 9),
(25, 35, 9),
(26, 32, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bantin`
--
ALTER TABLE `bantin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gioithieu`
--
ALTER TABLE `gioithieu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loaitin`
--
ALTER TABLE `loaitin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `primesions`
--
ALTER TABLE `primesions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quannhanmattin`
--
ALTER TABLE `quannhanmattin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quantri`
--
ALTER TABLE `quantri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quantri_vaitro`
--
ALTER TABLE `quantri_vaitro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles_primesion`
--
ALTER TABLE `roles_primesion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles_user`
--
ALTER TABLE `roles_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vaitro`
--
ALTER TABLE `vaitro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vaitro_quyen`
--
ALTER TABLE `vaitro_quyen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bantin`
--
ALTER TABLE `bantin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gioithieu`
--
ALTER TABLE `gioithieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loaitin`
--
ALTER TABLE `loaitin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `primesions`
--
ALTER TABLE `primesions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quannhanmattin`
--
ALTER TABLE `quannhanmattin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `quantri`
--
ALTER TABLE `quantri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `quantri_vaitro`
--
ALTER TABLE `quantri_vaitro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `quyen`
--
ALTER TABLE `quyen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles_primesion`
--
ALTER TABLE `roles_primesion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles_user`
--
ALTER TABLE `roles_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vaitro`
--
ALTER TABLE `vaitro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vaitro_quyen`
--
ALTER TABLE `vaitro_quyen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
