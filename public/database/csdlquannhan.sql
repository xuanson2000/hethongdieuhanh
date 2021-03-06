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
(7, 'CMC TS tham gia li??n minh CoMeet cung c???p gi???i ph??p h???p tr???c tuy???n \"Made in Vietnam\"gdg', 'cmc-ts-tham-gia-lien-minh-comeet-cung-cap-giai-phap-hop-truc-tuyen-made-in-vietnam', '<p>Li&ecirc;n minh CoMeet g???m 5 th&agrave;nh vi&ecirc;n cho bi???t s??? ra m???t ch&ugrave;m gi???i ph&aacute;p t?? v???n, thi???t k???, tri???n khai, t&iacute;ch h???p, h??? tr??? v&agrave; b???o tr&igrave; h??? th???ng video conference (h???p tr???c tuy???n) tr&ecirc;n n???n t???ng ph???n m???m ngu???n m??? Jitsi trong th&aacute;ng 4 n&agrave;y.</p>', '<p>Li&ecirc;n minh CoMeet ra ?????i ?????u th&aacute;ng 4/2020 v???i m???c ??&iacute;ch g&oacute;p ph???n ??em ?????n c&aacute;c gi???i ph&aacute;p hi???u qu???, an to&agrave;n, b???o m???t, t??? ch??? c&ocirc;ng ngh??? v&agrave; ???????c thi???t k??? t&ugrave;y bi???n theo y&ecirc;u c???u ri&ecirc;ng c???a c?? quan, t??? ch???c, doanh nghi???p, trong b???i c???nh nhi???u ????n v??? ??&atilde; v&agrave; ??ang chuy???n sang m&ocirc; h&igrave;nh l&agrave;m vi???c online, tr???c tuy???n t??? xa.</p>\r\n\r\n<p>N??m th&agrave;nh vi&ecirc;n c???a CoMeet g???m CMC TS, NetNam, iWay, FDS v&agrave; DQN ?????u l&agrave; nh???ng h???i vi&ecirc;n t&iacute;ch c???c c???a C&acirc;u l???c b??? Ph???n m???m t??? do ngu???n m??? Vi???t Nam (VFOSSA).</p>\r\n\r\n<p>Th???i ??i???m hi???n t???i, c&aacute;c ????n v??? trong li&ecirc;n minh ?????u ??ang g???p r&uacute;t ho&agrave;n thi???n ????? s???m ch&iacute;nh th???c c&ocirc;ng b??? cung c???p gi???i ph&aacute;p t?? v???n, thi???t k???, tri???n khai, t&iacute;ch h???p, h??? tr??? v&agrave; b???o tr&igrave; h??? th???ng video conference (h???p tr???c tuy???n) tr&ecirc;n n???n t???ng ph???n m???m ngu???n m??? Jitsi cho ??&ocirc;ng ?????o ng?????i d&ugrave;ng.</p>', 'hRvL_332.png', 1, 1, '2020-08-25 03:20:42', '2020-08-24 20:20:42', 'cmc-ts-tham-gia-lien-minh-comeet-cung-cap-giai-phap-hop-truc-tuyen-made-in-vietnam');

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
(18, 'GI???I THI???U CHUNG', '<p>N??m 1986, ch&iacute;nh s&aacute;ch m???i c???a ?????i h???i ?????ng VI ??&atilde; g???i m???, khuy???n kh&iacute;ch c&aacute;c th&agrave;nh ph???n kinh t??? ph&aacute;t tri???n, gi???i ph&oacute;ng n??ng l???c s???n xu???t c???a x&atilde; h???i ????? m??? ???????ng cho ph&aacute;t tri???n s???n xu???t. DELTA l&agrave; m???t trong c&aacute;c doanh nghi???p t?? nh&acirc;n ?????u ti&ecirc;n c???a Vi???t nam ra ?????i t??? ch??? tr????ng ?????i m???i n&agrave;y.<br />\r\nTh&aacute;ng 1 n??m 1993, khi ??ang l&agrave;m gi&aacute;m ?????c Trung t&acirc;m nghi&ecirc;n c???u ???ng d???ng k??? thu???t x&acirc;y d???ng thu???c Tr?????ng ?????i h???c x&acirc;y d???ng, &ocirc;ng Tr???n Nh???t Th&agrave;nh quy???t ?????nh th&agrave;nh l???p C&ocirc;ng ty TNHH x&acirc;y d???ng d&acirc;n d???ng v&agrave; c&ocirc;ng nghi???p DELTA.<br />\r\nDELTA ?????c bi???t b???i vi???c h???i t??? nh???ng chuy&ecirc;n gia uy t&iacute;n trong ng&agrave;nh x&acirc;y d???ng v???i mong mu???n mang nh???ng ki???n th???c t&iacute;ch l??y ???????c, nh???ng nghi&ecirc;n c???u l&yacute; thuy???t v&agrave;o ???ng d???ng th???c ti???n. Ph????ng h?????ng c???a c&ocirc;ng ty l&agrave; ??i v&agrave;o nh???ng l??nh v???c kh&oacute; ??&ograve;i h???i l????ng t&acirc;m v&agrave; tri th???c c???a ?????i ng?? nh&acirc;n l???c tr&igrave;nh ????? cao, &aacute;p d???ng c&ocirc;ng ngh??? x&acirc;y d???ng m&ocirc;t c&aacute;ch t???i ??a.<br />\r\nTr???i qua 25 n??m x&acirc;y d???ng v&agrave; ph&aacute;t tri???n, DELA ??&atilde; tr??? th&agrave;nh T???p ??o&agrave;n X&acirc;y d???ng l???n m???nh v???i 12 c&ocirc;ng ty th&agrave;nh vi&ecirc;n, 2516 c&aacute;n b??? k??? s??, ki???n tr&uacute;c s?? v&agrave; h??? th???ng thi???t b??? m&aacute;y m&oacute;c ?????ng b???, hi???n ?????i ho???t ?????ng trong l??nh v???c x&acirc;y d???ng. C&aacute;c c&ocirc;ng tr&igrave;nh ti&ecirc;u bi???u trong r???t nhi???u c&aacute;c c&ocirc;ng tr&igrave;nh m&agrave; DELTA ??&atilde; th???c hi???n tr&ecirc;n kh???p m???i mi???n ?????t n?????c l&agrave;: Bitexco Financial Tower, Dophin Tower, Keangnam Landmark, Sky City, Eden Center, Times City, Royal City, Goldmark City, Vinhome Center City, Vinpearl Ph&uacute; Qu???c&hellip;.<br />\r\nT???p ??o&agrave;n DELTA ???????c ??&aacute;nh gi&aacute; l&agrave; nh&agrave; th???u h&agrave;ng ?????u trong thi c&ocirc;ng ph???n h???m c&ocirc;ng tr&igrave;nh v&agrave; l&agrave; m???t trong n??m c&ocirc;ng ty x&acirc;y d???ng h&agrave;ng ?????u Vi???t Nam trong ng&agrave;nh x&acirc;y d???ng d&acirc;n d???ng v&agrave; c&ocirc;ng nghi???p.</p>', 'CIgE_photo1.png', '2015-02-12', '2016-02-13'),
(20, 'dfd', 'dfdf', 'f??', '2012-02-12', '2020-02-12'),
(21, '??', '', '', '2011-02-12', '2020-02-12');

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
(1, 'Tin t???c c??ng ty', NULL),
(3, 'Tin t???c d??? ??n', NULL),
(4, 'Tin trong ng??nh', NULL),
(6, 'Tin trong ng??nh m???i', 'tin-trong-nganh-moi'),
(7, 'tin trong n?????c', NULL),
(8, 'tin trong n?????c', NULL);

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
(13, 'Nguy???n V??n Kinh', 'Th??n 2 - X??m ki Ade - x?? X??n M??nh - huy???n Gia L???c - t???nh ??i???n Bi??n', '1982-12-02', '1995-12-02', 'Trung ??y', 'Ti???u ?????i tr?????ng', 'Ti???u ?????i 2 Trung ??o??n 4 -B??? t?? l???nh qu??n khu 4', NULL, 'Nguy???n V??n Kinh', 'sdsd', 'gdsdg', 'fgfd\r\n12/02/1995', '??i la,f nhi???m v???', 'S??? 12/ C???c ch??nh sahcs', NULL, NULL, NULL, '???? c??ng nh???n li???t s???', '1992-12-02', 'dasd234234'),
(42, 'Nguy???n Xu??n H???i', 'Th??n 2 - X??m ki Ade - x?? X??n M??nh - huy???n Gia L???c - t???nh ??i???n Bi??n', '1982-12-02', '1995-12-02', 'Trung ??y', 'Ti???u ?????i tr?????ng', 'Ti???u ?????i 2 Trung ??o??n 4 -B??? t?? l???nh qu??n khu 4', 'Nguy???n Th??? A', 'Nguy???n V??n Kinh', 'Nguy???n Th??? C', 'Nguy???n V??n C', 'M???t tr???n ph??a nam\n12/02/1995', '??ang ??i l??m nhi???m v???', 'S??? 12/ C???c ch??nh sahcs', NULL, 'Ch??a c??', NULL, '???? c??ng nh???n li???t s???', '1992-12-02', 'dasd234234 '),
(46, 'Nguy???n Xu??n H???i', 'Th??n 2 - X??m ki Ade - x?? X??n M??nh - huy???n Gia L???c - t???nh ??i???n Bi??n', NULL, '1995-12-02', 'Trung ??y', 'Ti???u ?????i tr?????ng', 'Ti???u ?????i 2 Trung ??o??n 4 -B??? t?? l???nh qu??n khu 4', 'Nguy???n Th??? A', 'Nguy???n V??n Kinh', 'Nguy???n Th??? C', 'Nguy???n V??n C', 'M???t tr???n ph??a nam\n12/02/1995', '??ang ??i l??m nhi???m v???', 'S??? 12/ C???c ch??nh sahcs', NULL, 'Ch??a c??', NULL, '???? c??ng nh???n li???t s???', '1992-12-02', 'dasd234234 '),
(53, 'Nguy???n Xu??n H???i', 'Th??n 2 - X??m ki Ade - x?? X??n M??nh - huy???n Gia L???c - t???nh ??i???n Bi??n', '2018-02-12', '1995-12-02', 'Trung ??y', 'Ti???u ?????i tr?????ng', 'Ti???u ?????i 2 Trung ??o??n 4 -B??? t?? l???nh qu??n khu 4', 'Nguy???n Th??? A', 'Nguy???n V??n Kinh', 'Nguy???n Th??? C', 'Nguy???n V??n C', 'M???t tr???n ph??a nam\n12/02/1995', '??ang ??i l??m nhi???m v???', 'S??? 12/ C???c ch??nh sahcs', NULL, 'Ch??a c??', NULL, '???? c??ng nh???n li???t s???', '1992-12-02', 'dasd234234 '),
(54, 'Nguy???n Xu??n JHAF', 'Th??n 2 - X??m ki Ade - x?? X??n M??nh - huy???n Gia L???c - t???nh ??i???n Bi??n', '2018-02-12', '1995-12-02', 'Trung ??y', 'Ti???u ?????i tr?????ng', 'Ti???u ?????i 2 Trung ??o??n 4 -B??? t?? l???nh qu??n khu 4', 'Nguy???n Th??? A', 'Nguy???n V??n Kinh', 'Nguy???n Th??? C', 'Nguy???n V??n C', 'M???t tr???n ph??a nam\n12/02/1995', '??ang ??i l??m nhi???m v???', 'S??? 12/ C???c ch??nh sahcs', NULL, 'Ch??a c??', NULL, '???? c??ng nh???n li???t s???', '1992-12-02', 'dasd234234 '),
(55, 'Nguy???n Xu??n Qqng', 'Th??n 2 - X??m ki Ade - x?? X??n M??nh - huy???n Gia L???c - t???nh ??i???n Bi??n', '2018-02-12', '1995-12-02', 'Trung ??y', 'Ti???u ?????i tr?????ng', 'Ti???u ?????i 2 Trung ??o??n 4 -B??? t?? l???nh qu??n khu 4', 'Nguy???n Th??? A', 'Nguy???n V??n Kinh', 'Nguy???n Th??? C', 'Nguy???n V??n C', 'M???t tr???n ph??a nam\n12/02/1995', '??ang ??i l??m nhi???m v???', 'S??? 12/ C???c ch??nh sahcs', NULL, 'Ch??a c??', NULL, '???? c??ng nh???n li???t s???', '1992-12-02', 'dasd234234 '),
(56, 'Nguy???n Xu??n Qqng', 'Th??n 2 - X??m ki Ade - x?? X??n M??nh - huy???n Gia L???c - t???nh ??i???n Bi??n', '2018-02-12', '1995-12-02', 'Trung ??y', 'Ti???u ?????i tr?????ng', 'Ti???u ?????i 2 Trung ??o??n 4 -B??? t?? l???nh qu??n khu 4', 'Nguy???n Th??? A', 'Nguy???n V??n Kinh', 'Nguy???n Th??? C', 'Nguy???n V??n C', 'M???t tr???n ph??a nam\n12/02/1995', '??ang ??i l??m nhi???m v???', 'S??? 12/ C???c ch??nh sahcs', NULL, 'Ch??a c??', NULL, '???? c??ng nh???n li???t s???', '1992-12-02', 'dasd234234 ');

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
(1, 'admin', '$2y$10$lLJ/x2649fTRGbOUr4WtjOn6C8a0SLpBVHSlg1utgHApCfc3VWxh2', 'NGUY???N XU??N S??N', 1, 'p', '2020-04-27 13:12:54', '2019-10-20 15:27:39', 'tWy6_a2.jpg', ''),
(19, 'admin1', '$2y$10$6Ood3W7S/OFuV4C0bkQQie4yO6Ds2cM5ln0B/CCdQEcwGWyyGegBm', 'Nguy???n Xu??n S??n', 1, NULL, '2020-10-13 04:04:34', '2020-10-13 04:04:15', 'pYl2_a2.png', 'Ph??ng Ch??nh s??ch'),
(20, 'chuyenvien', '$2y$10$SFOyiEQeevyyfe0I3.90M.RNhF17o/ThsSAzNqiNExYmblVOArnhu', 'CHuy??n Vi??n', 1, NULL, '2020-10-13 04:08:57', '2020-10-13 04:08:10', 'eYPv_a2.png', 'Ch??nh s??ch');

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
(5, 'T?? v???n thi???t k???', 'L??nh v???c t?? v???n thi???t k??? ???????c Delta ph??t tri???n ?????c l???p ngay t??? nh???ng ng??y ?????u th??nh l???p T???p ??o??n. V???i ?????i ng?? l??nh ?????o ?????u l?? nh???ng ki???n tr??c s??, k??? s?? k???t c???u l?? gi???ng vi??n cao c???p ???????c ????o t???o chuy???n s??u ??? n?????c ngo??i, nh???ng c??ng tr??nh Delta tham gia t?? v???n thi???t k??? ?????u th??? hi???n t??nh th???m m??? v?? ???ng d???ng cao.', '<p>L??nh v???c t?? v???n thi???t k??? ???????c Delta ph&aacute;t tri???n ?????c l???p ngay t??? nh???ng ng&agrave;y ?????u th&agrave;nh l???p T???p ??o&agrave;n. V???i ?????i ng?? l&atilde;nh ?????o ?????u l&agrave; nh???ng ki???n tr&uacute;c s??, k??? s?? k???t c???u l&agrave; gi???ng vi&ecirc;n cao c???p ???????c ??&agrave;o t???o chuy???n s&acirc;u ??? n?????c ngo&agrave;i, nh???ng c&ocirc;ng tr&igrave;nh Delta tham gia t?? v???n thi???t k??? ?????u th??? hi???n t&iacute;nh th???m m??? v&agrave; ???ng d???ng cao.</p>\r\n\r\n<p>Vi???c th&agrave;nh l???p li&ecirc;n doanh Sacidelta c&ugrave;ng v???i C&ocirc;ng ty ki???n tr&uacute;c Sacieg C???ng h&ograve;a Ph&aacute;p v&agrave; th&agrave;nh l???p C&ocirc;ng ty T?? v???n Ki???n tr&uacute;c- X&acirc;y d???ng TT-As (TT-Associates) l&agrave; nh???ng b?????c ??i chi???n l?????c c???a Delta trong vi???c ?????y m???nh ph&aacute;t tri???n l??nh v???c t?? v???n thi???t k???. Vi???c h???p t&aacute;c, li&ecirc;n danh c&ugrave;ng c&aacute;c c&ocirc;ng ty n?????c ngo&agrave;i t???o c?? h???i cho ?????i ng?? ki???n tr&uacute;c s?? Delta li&ecirc;n t???c ???????c trao ?????i, h???p t&aacute;c ??&agrave;o t???o, c???p nh???t nh???ng xu h?????ng ph&aacute;t tri???n hi???n ?????i.</p>\r\n\r\n<p>?????i ng?? t?? v???n, thi???t k??? h??? tr??? ?????c l???c cho c&aacute;c d??? &aacute;n Detla ?????ng th???u ch&iacute;nh, t???ng th???u&hellip;, lu&ocirc;n ch&uacute; tr???ng ph???i k???t h???p v???i kh&ocirc;ng gian hay b???i c???nh c??? th??? c???a n??i ?????t ki???n tr&uacute;c ??&oacute;, nh???m t???o ra nh???ng c&ocirc;ng tr&igrave;nh mang t&iacute;nh th???c d???ng cao m&agrave; v???n c&oacute; h???n. Tri???t l&yacute; s&aacute;ng t???o n&agrave;y ph???i h???p h&agrave;i h&ograve;a gi???a l???i &iacute;ch c???a kh&aacute;ch h&agrave;ng nh??ng v???n ??&aacute;p ???ng t???t nh???t nhu c???u c???a con ng?????i: ti???n d???ng, hi???u qu???, ???ng d???ng ???????c k??? thu???t c&ocirc;ng ngh???, c&oacute; t&iacute;nh th???m m??? cao v&agrave; mang h??i th??? c???a th???i ?????i.</p>\r\n\r\n<p><img alt=\"\" src=\"https://deltacorp.vn/wp-content/uploads/2017/03/Tu-choi-cap-phep-xay-dung-phai-neu-ro-ly-do-1.jpg\" style=\"height:750px; width:1200px\" /><br />\r\nV???i nh???ng kinh nghi???m ???????c t&iacute;ch l??y trong h??n 20 n??m th&agrave;nh l???p, ph&aacute;t tri???n, h???p t&aacute;c, li&ecirc;n danh v???i c&aacute;c c&ocirc;ng ty n?????c ngo&agrave;i nh??: Ph&aacute;p, ?????c, Nh???t B???n, H&agrave;n Qu???c, Singapore, Hoa K??? &hellip; c&ugrave;ng nh???ng gi???i th?????ng ?????t ???????c, Delta t??? tin v&agrave;o n??ng l???c c???a m&igrave;nh trong t?? v???n ph????ng &aacute;n quy ho???ch, gi???i ph&aacute;p ki???n tr&uacute;c, thi???t k???, c???nh quan, k???t c???u, v.v&hellip;</p>', 'tBja_blurrys.jpeg');

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
(1, 'M??y gi???t ', 2000000, 1500000, '2020-08-05'),
(2, 'T??? l???nh', 5000000, 4900000, '2020-05-07'),
(3, 'Ti vi', 1500000, 1100000, '2020-07-15'),
(4, 'L?? vi s??ng', 1500000, 1000000, '2020-06-18'),
(5, '??i???u h??a', 1500000, 1400000, '2020-09-01'),
(6, 'M??y l???c n?????c', 4500000, 4200000, '2020-06-24');

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
