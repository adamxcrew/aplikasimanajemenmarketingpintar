-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Okt 2020 pada 10.41
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `msmart`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_web`
--

CREATE TABLE `jenis_web` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` double(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_web`
--

INSERT INTO `jenis_web` (`id`, `nama`, `harga`) VALUES
(1, 'Company Profile', 12000000.00),
(2, 'Point Of Sales', 5000000.00),
(3, 'Super Web', 1000000000.00),
(5, 'eLearning', 5000000000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kabupaten` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kelurahan` varchar(255) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `email` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL,
  `id_marketing` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `alamat`, `provinsi`, `kabupaten`, `kecamatan`, `kelurahan`, `no_telepon`, `email`, `created_at`, `id_marketing`) VALUES
(32, 'Arief', 'komplek bsi', 'Jawa Barat', 'Kabupaten Bandung', 'Baleendah', 'Manggahang', '083822501666', 'ariefdm19@gmail.com', '2020-09-15 11:23:39', 7),
(33, 'Novia Indah Pertiwi', 'Pondok Indah Jaya', 'jawa barat', 'kabupaten bandung', 'baleendah', 'jelekong', '083822501657', 'novi@gmail.com', '2020-09-15 13:52:30', 7),
(34, 'Muhammad Bambang', 'Bandung', 'jawa barat', 'kota bandung', 'Bandung kulon', 'Andir', '94949494949', 'mail@bambang.com', '2020-10-25 20:07:51', 182),
(35, 'Sani Maftuh', 'Jakarta', 'DKI Jakarta', 'Jakarta', 'Pondok gede', 'Pondok aren', '08798657464', 'sani@mm.com', '2020-10-25 21:58:26', 164),
(36, 'Mahen Zain', 'Amerika', 'Jawa Barat', 'Bandung', 'Jamika', 'Andir', '123123123213', 'maher@mail.com', '2020-10-26 16:07:42', 164);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendapatan`
--

CREATE TABLE `pendapatan` (
  `id_pendapatan` int(11) NOT NULL,
  `id_marketer` int(11) NOT NULL,
  `id_termin` int(11) NOT NULL,
  `pendapatan_termin1` double(15,2) DEFAULT NULL,
  `pendapatan_termin2` double(15,2) DEFAULT NULL,
  `pendapatan_termin3` double(15,2) DEFAULT NULL,
  `total_pendapatan` double(15,2) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pendapatan`
--

INSERT INTO `pendapatan` (`id_pendapatan`, `id_marketer`, `id_termin`, `pendapatan_termin1`, `pendapatan_termin2`, `pendapatan_termin3`, `total_pendapatan`, `created_at`) VALUES
(45, 164, 78, 250000000.00, 150000000.00, 100000000.00, 500000000.00, '2020-10-26 16:36:32'),
(46, 164, 79, 600000.00, 0.00, 0.00, 600000.00, '2020-10-26 16:37:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `termin`
--

CREATE TABLE `termin` (
  `id_termin` int(11) NOT NULL,
  `id_supervisor` int(11) DEFAULT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_marketing` int(11) NOT NULL,
  `website` varchar(256) NOT NULL,
  `harga` double(15,2) NOT NULL,
  `termin1` double(15,2) NOT NULL,
  `termin2` double(15,2) NOT NULL,
  `termin3` double(15,2) NOT NULL,
  `termin1_created` datetime DEFAULT NULL,
  `termin2_created` datetime DEFAULT NULL,
  `termin3_created` datetime DEFAULT NULL,
  `bukti_termin1` varchar(256) DEFAULT NULL,
  `bukti_termin2` varchar(256) DEFAULT NULL,
  `bukti_termin3` varchar(256) DEFAULT NULL,
  `is_accept` int(1) NOT NULL,
  `is_done` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `termin`
--

INSERT INTO `termin` (`id_termin`, `id_supervisor`, `id_pelanggan`, `id_marketing`, `website`, `harga`, `termin1`, `termin2`, `termin3`, `termin1_created`, `termin2_created`, `termin3_created`, `bukti_termin1`, `bukti_termin2`, `bukti_termin3`, `is_accept`, `is_done`, `created_at`) VALUES
(78, 160, 35, 164, 'elearningutama.sch.id', 5000000000.00, 2500000000.00, 1500000000.00, 1000000000.00, '2020-10-26 16:38:47', '2020-10-26 16:38:54', '2020-10-26 16:39:00', 'bukti_termin_1603705127_56279.jpeg', 'bukti_termin_1603705134_43491.jpeg', 'bukti_termin_1603705140_98138.jpeg', 1, 1, '2020-10-26 16:36:32'),
(79, 160, 36, 164, 'kontraktorhandal.com', 12000000.00, 6000000.00, 3600000.00, 2400000.00, '2020-10-26 16:39:25', NULL, NULL, 'bukti_termin_1603705165_70084.jpeg', NULL, NULL, 1, 0, '2020-10-26 16:37:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `spv_id` int(11) DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `phone`, `email`, `image`, `password`, `role_id`, `is_active`, `spv_id`, `date_created`) VALUES
(5, 'Admin Master', '083822501659', 'admin@gmail.com', 'default.jpg', '$2y$10$jmSfi4L1taVV.yMAyw2hFuQmdzjyH9fzBcwR4l15QNJ6YLJUljRMW', 1, 1, NULL, 1597479213),
(6, 'Arief Supervisor', '083822501658', 'supervisor@gmail.com', 'default.jpg', '$2y$10$4v7lCK42Am8ekD7azyJW4OmFl4zsYpBT1zJmPMvPcto7bJqjk13Bq', 2, 1, NULL, 1597479239),
(7, 'Dwi Marketing', '083822501657', 'marketing@gmail.com', 'default.jpg', '$2y$10$pyUV8OHuJLlbu4qebxQrHeReQxa1.Mx1WqWeJOs5uKzqwqQMTl/Lu', 3, 1, 6, 1597479276),
(30, 'Ghea Sindi Aulia', '083822501631', 'gheasindi@gmail.com', 'default.jpg', '$2y$10$BHhliHDg2mG54IAPikiTJ.uCOIFY6QDnZmol1/.uEHVHuyBF1KqVK', 3, 1, 6, 1599792657),
(31, 'Dhea Shindi', '083822501610', 'dheashindi@gmail.com', 'default.jpg', '$2y$10$LDib6Rzhw5wRLbaYlSh8J.qy4EF.3e7LUOVaGOWBU5ndMxnvDcEL.', 3, 1, 6, 1599792813),
(32, 'Rifki Rinjani', '083822501613', 'rifki112@gmail.com', 'default.jpg', '$2y$10$41GpkMKuOYwm2mBM8tz2pOrkiSKy7Mx3AixGSzV5jwru2WHtZSiRW', 3, 1, 6, 1599792866),
(33, 'Citra Ayu Dewi', '083822501612', 'citraatu@gmail.com', 'default.jpg', '$2y$10$j74iXZkQ3TxoUR0w9pYdF.FkSNoQDjkf5djQS8TnAlPNF9.eEEiz6', 3, 1, 6, 1599792892),
(34, 'Suciana Dewi Sartika Anggoro', '083822501654', 'sucianadewi@gmail.com', 'default.jpg', '$2y$10$6zEcnFrTVlpVsmo.QdV9keLheuy9nZKB6IqrstvqZ4hmPXMf2177e', 3, 1, 6, 1599792935),
(35, 'Merlin apriliani indah', '08382250144', 'merlin@gmail.com', 'default.jpg', '$2y$10$iQqWZ1azwQ/Yk7utIHcVrekhGip6dMOsbJC4aSsjfdacAtG4JXn9O', 3, 1, 6, 1599792977),
(36, 'Rina erwina', '08382250211', 'rinaerwina1@gmail.com', 'default.jpg', '$2y$10$HJlb5YmK5jC2XHU2l36duOoBdYYxYAWhTQFYnyqp/7MN1A9XOnhp6', 3, 1, 6, 1599793078),
(37, 'Rapi dede somaliah', '083822501988', 'rapidede13@gmail.com', 'default.jpg', '$2y$10$QLVqSgxzv5xZeTSvgjAUuewxsaLEtJeBpArt9u.ZJ7MHDpjjcpDF2', 3, 1, 6, 1599793110),
(38, 'Dwi Feronica Pertiwi', '083822501000', 'dwiferonica@gmail.com', 'default.jpg', '$2y$10$DDdbjiQZFSFgXtTq3Ef0M./kTqi1ZPcgLDlZiDIObsEBhvQoVVZgu', 3, 1, 6, 1599793171),
(39, 'Nisa Indah pertiwi', '0838225016777', 'nisaindah@gmail.com', 'default.jpg', '$2y$10$pEbVAvnjnekM58.F0tr5oecrmrAfxMNEy7lOqWQO7SnUELPwuyXja', 3, 1, 6, 1599793216),
(40, 'Dwi indah nurlaila', '083822501639', 'dwinurlaila@gmail.com', 'default.jpg', '$2y$10$G7yodiYfyRiL6ADasLJwlO6IdAmKN5pg5v2tQD7i1NlhI3aeZYmxW', 3, 1, 6, 1599793246),
(41, 'angga ciptaya', '083822501622', 'anggaciptaya@gmail.com', 'default.jpg', '$2y$10$vUiDsSch.8JxstZL06iWS.sX38ixK9r1DBlIwSCtsh.YQOBPGfSri', 3, 1, 6, 1599793427),
(42, 'lina meliana', '083822501600', 'linameliana@gmail.com', 'default.jpg', '$2y$10$wAYf/EdO3j0RTsfG5lpJIuJHvRIjjMLGyibQj8QYpjSUH5rVTxfjy', 3, 1, 6, 1599793460),
(43, 'Intayana Herlina', '083822501611', 'intanaya@gmail.com', 'default.jpg', '$2y$10$RPtnscbbP11OIoqGw68idO9yFDbDYXA2C7Mprj7.cUjzam/GbhFdu', 3, 1, 6, 1599793484),
(44, 'Urlana angelia', '083822501123', 'urlana100@gmail.com', 'default.jpg', '$2y$10$nH6cGFMlV.g26y.yBWS1aeLwVHLfVZm06oax2arKAYFp2Hh.Q/pSy', 3, 1, 6, 1599793518),
(45, 'dwi sartika asih', '083822501123', 'dwisartikaasih@gmail.com', 'default.jpg', '$2y$10$L186bq1duwhClisHtI4EE.9i99m7eFot1yh4xQiATyRC4oXtcOWQG', 3, 1, 6, 1599793545),
(46, 'Mela angaleni', '083822501122', 'milaanggaleni@gmail.com', 'default.jpg', '$2y$10$2Nm5a4h9PCtB75CVJnglx.l/5mO7becZ8b5rM6QZ50SgrHI782pVy', 3, 1, 6, 1599793572),
(47, 'dina nurhayati', '083822501211', 'dininurhayati@gmail.com', 'default.jpg', '$2y$10$UfjMeFItPcRipVJmdAh6Z.ZVgsvj0co0eFaVsuh5Y8WtYpm006.JW', 3, 1, 6, 1599793611),
(48, 'Deva Falerido', '083822501678', 'devavalerio@gmail.com', 'default.jpg', '$2y$10$4a.KJ2NgwDePdXRy0rGqg.FsFbxy2ljRmAyU25DPvS0pvW1/ahUfO', 3, 1, 6, 1599793635),
(49, 'Rizal handoyo', '083822301622', 'rizalhandoyo@gmail.com', 'default.jpg', '$2y$10$/SUyeNKpF3sgi.WSlZisfOsHZpEklj737xyUndA9P8NAekoGPcSBS', 3, 1, 6, 1599793671),
(50, 'Intan ayu sucipta', '083822501611', 'intanayu12@gmail.com', 'default.jpg', '$2y$10$gPvFVLWQJXZzemH7c0qpt.z9ww.KXGWdZQN4f4jhIvz3ZIXmwaZGO', 3, 1, 6, 1599793764),
(51, 'Indri meliani afina', '083822501687', 'indrimeliani@gmail.com', 'default.jpg', '$2y$10$8KrTrPZRN012CB9IFQRfsuxx4FfFkcuNHdhqLGeoBOm21YjXO/Yuy', 3, 1, 6, 1599793796),
(52, 'Ikhsan zaenal', '083822501655', 'ikhsanzaenal@gmail.com', 'default.jpg', '$2y$10$SyxUlCNWoPYaW42aJoGBquH9uZ6unObe69z7bFXKfq5.BI6T/Vgxu', 3, 1, 6, 1599793832),
(53, 'shindi lulu afina', '083822501116', 'shindilulu20@gmail.com', 'default.jpg', '$2y$10$ikv7.BJNmGwoxEbS9vFWmeE6bq9a1nnizCgI3C.reIasWF1urp.EW', 3, 1, 6, 1599793873),
(55, 'Feby Supervisor', '08382250999', 'supervisor1@gmail.com', 'default.jpg', '$2y$10$7BuaSXxQJIYrRGsnuaHNI.rE0kRV9/EINPl6JB1Jcil6MLNxq0wSm', 2, 1, NULL, 1599794319),
(56, 'Arifan Agung Prabowo', '083822501777', 'aripanagung@gmail.com', 'default.jpg', '$2y$10$y8vJupdadNSmRG1rLDmfuuoU.bFSRNC9WodJnBe06Y8Vef/vowfT6', 3, 1, 55, 1599794840),
(57, 'Jajak Atep', '083822501765', 'jajak@gmail.com', 'default.jpg', '$2y$10$InVL5AbTc.6yYtSZQNpjvON.jnVdav7xxjf.z.ehjoo8n9jPB7COi', 3, 1, 55, 1599795115),
(58, 'Mila andraeni', '08382250122', 'milaandraeni@gmail.com', 'default.jpg', '$2y$10$9OmLqRE5U5PW6jFxb6MYSe2ZxkT4oxNp/fMe6j8qSRccinjVS22JK', 3, 1, 55, 1599795222),
(59, 'Azis Jamaludin', '083822501633', 'azisjamaludin@gmail.com', 'default.jpg', '$2y$10$3y0Rm4TZupVJLAo7pks1yeahf4qRBEqcyL1OUY7mcYcssWBniE0z.', 3, 1, 55, 1599795289),
(60, 'Dito sumanjaya', '083822501621', 'ditosumanjaya@gmail.com', 'default.jpg', '$2y$10$pPqa4lWbBKRaIzUd6iT7/.X8k9rCeQJokLVKT09TVr2UwDC597MzC', 3, 1, 55, 1599795353),
(61, 'Janjar Malaika', '083822501113', 'janjarmalaika@gmail.com', 'default.jpg', '$2y$10$TumCP94I3K63LVMTIja.t.IRZRH.wyZQlvQ17URKeLE5KQE7Rs3by', 3, 1, 55, 1599795619),
(62, 'Ari Sanjaya', '083822509754', 'arisanjaya@gmail.com', 'default.jpg', '$2y$10$nd94X163U9qa.q5RxPPd4eCHoOCmYVZR/VaxNuaWwfrh919aNIf1C', 3, 1, 55, 1599795690),
(63, 'Juli Apriliani', '08382250177', 'juliaprliani@gmail.com', 'default.jpg', '$2y$10$EYtO4ccE.GWkr5FY8dwCLuVIeyJmXS.3GSq2Qt6P6fqyGomwYx58O', 3, 1, 55, 1599796839),
(64, 'Anjar jaelani', '083822501625', 'anjarjaelani@gmail.com', 'default.jpg', '$2y$10$shj8/VCFctONeriLkDkIuezsUQ4Wg0MfRyqNLEjVlLWItp1oPiDgG', 3, 1, 55, 1599796870),
(66, 'handoko dwi hartono', '083822501633', 'handokodwi@gmail.com', 'default.jpg', '$2y$10$8Qo9uSjZIwA2lGF9bjDK/uuBmhiTn205hIV8aEtxeH.lYNCC516Qi', 3, 1, 55, 1599796948),
(67, 'kelia eka putri ', '083822501177', 'keliaekaputri@gmail.com', 'default.jpg', '$2y$10$KzCn28BrHbpMEmHqlwYPQ.zMQgQ/2egaBIck8T8Q5uIjpiuD8itTe', 3, 1, 55, 1599796982),
(68, 'eka aulia dwi', '083822501947', 'ekaauliadewi@gmail.com', 'default.jpg', '$2y$10$KH83VaQt7kQ5qdFKxss5GuKHPbslXF2meVIcgPXdfTfpA5TkRmQSS', 3, 1, 55, 1599797023),
(69, 'Indira dwi marketing', '083822501342', 'indiradwi@gmail.com', 'default.jpg', '$2y$10$j4OswGEb0y8tlFo8cBykJuz0NfM2t5G8BtHV1nvsVzNJa0jZVwPaC', 3, 1, 55, 1599799307),
(70, 'Rapi sukamenda', '083822501899', 'rapisukamenda@gmail.com', 'default.jpg', '$2y$10$EJRVKQHFejOMs37Xd7w.TedII9ii2KtdVYBfb.Iow3A8YqAj7uv4C', 3, 1, 55, 1599799526),
(71, 'herlina angelia', '083822501333', 'herlina@gmail.com', 'default.jpg', '$2y$10$IE2UsR1saWEHZpgLtIfxYepJeaOf7e.eG4vcshaZCRqCTbuvqi2Wm', 3, 1, 55, 1599799593),
(72, 'Fina Afina', '083822501765', 'finaafina20@gmail.com', 'default.jpg', '$2y$10$lYjuzUvbr97iUBrmW8bfHeeoOX3rYseB8oQmtQiiepr1xQSQSseKO', 3, 1, 55, 1599800719),
(73, 'Dwi Felio Afgan', '083822502387', 'dwifelioafgan@gmail.com', 'default.jpg', '$2y$10$Ou851eXbOyu9fQyFWOdMU.eolMo2WEYrCdQyqNyprf1nBcD9XjjTy', 3, 1, 55, 1599800870),
(74, 'Indra Muhammad', '083822501644', 'indramuhammad@gmail.com', 'default.jpg', '$2y$10$4a5iytmPLyLTc4zpHsKse.JoXcIdtK8yywt8V12bmPAvx6TLcwbMW', 3, 1, 55, 1599800914),
(75, 'udin saputra', '083822508746', 'udinsaputra@gmail.com', 'default.jpg', '$2y$10$6w9TJOTIucJ5POe7Eotp3u6brKLRzrN494p3jRutGtd6Vh6BwcsKi', 3, 1, 55, 1599801022),
(76, 'Putri cahya anggraeni', '083822503222', 'putricahya@gmail.com', 'default.jpg', '$2y$10$VCYRwR43lQJthEBgqq7gUeWCUYy4aPyG21w2sM4KotkwQmyUYtrYK', 3, 1, 55, 1599801070),
(77, 'mila anggraeni', '083822501761', 'milaanggraeni@gmail.com', 'default.jpg', '$2y$10$8YjSkKqeRfMrjabXHkWzT.RGJmH9xXzjBSULb3OTIb.cn0lnXTpBW', 3, 1, 55, 1599801159),
(78, 'fahmi yahyah', '083822501938', 'fahmiyahya@gmail.com', 'default.jpg', '$2y$10$kFbvi4Bt0QNgxV5Y0JRWvurdzSE3afNWks2b2t/qkVAJGRsGhXMjq', 3, 1, 55, 1599801181),
(79, 'devina salsabila', '083822501221', 'devinasalsabila@gmail.com', 'default.jpg', '$2y$10$otWcRv4mpfemjdVGLPJrNurQp5H4BMl90Rk2LvpIWFmsncE5Prao6', 3, 1, 55, 1599801219),
(80, 'kamal zaenudin', '083822501699', 'kamalzaenudin@gmail.com', 'default.jpg', '$2y$10$/czgJdkxwscmQgkW8GOsCevvhGfP4iyg9wx1Y2.eyEw0ooX2P3hIy', 3, 1, 55, 1599801249),
(81, 'luthfi zazakala', '08382250321', 'luthfizazakala@gmail.com', 'default.jpg', '$2y$10$ehijk.cLoWMaBODgORJbpegw8mRsXXxdOR07GPqZFsFx3V4Qy9xTG', 3, 1, 55, 1599801274),
(82, 'Dwi Supervisor', '083822501624', 'supervisor3@gmail.com', 'default.jpg', '$2y$10$B9fGcUUW6yCBBI.uHUptNeWYYx.gIni7vI4nD1FPgGUtjEa2Mipoq', 2, 1, NULL, 1599801984),
(83, 'Joko candra', '083822504574', 'jokocandra@gmail.com', 'default.jpg', '$2y$10$YoFnh8MOild621BF1dMaPuqVZQ1QnNiS8D1ORo3wVd/50iMWXG5KO', 3, 1, 82, 1599802082),
(84, 'handini cahya', '08382250321', 'handinicahya@gmail.com', 'default.jpg', '$2y$10$0NPeIDi5TH1BMDHFW1PLZe96biowXF7S0zhy6di7KwHkXaMAuY3mG', 3, 1, 82, 1599802138),
(85, 'jahja kamaliun', '083822501311', 'jahjakamaliun@gmail.com', 'default.jpg', '$2y$10$W6zkaSr.b43db8r79kbMRuQpqWgMoG5csyyZHFiqm1NXT5wWOqXKC', 3, 1, 82, 1599802228),
(86, 'indira dwi malaka', '083822506588', 'indiradwimalaka@gmail.com', 'default.jpg', '$2y$10$/Rx5Dv944leYsYmoNjK4guMFvZhMaZQ0PuJptNvZSE76rTvPzTNou', 3, 1, 82, 1599802656),
(87, 'jajat kamaliudin', '083822501321', 'jajatkamaliaudin@gmail.com', 'default.jpg', '$2y$10$luVBTM6PPLGRwV.u4h2hF.m345S7tDL6jHCeq448jAIz2XKRneia2', 3, 1, 82, 1599802691),
(88, 'michael apriliani', '083822501285', 'michael2017@gmail.com', 'default.jpg', '$2y$10$KJwhJykO5pBAe6ve6qEu2.mbtqo87V6SiyAEx06/uUr91Bm/qI8/y', 3, 1, 82, 1599802958),
(89, 'jejen yusuf', '083822501655', 'jejenyusuf@gmail.com', 'default.jpg', '$2y$10$1iiwKJK3Jn2KSymUIJbuH.isB/nmYH1qUMbIV8HmYz/DjiOYavKSW', 3, 1, 82, 1599803004),
(90, 'kalamalaka', '083822501965', 'kalamalaka@gmail.com', 'default.jpg', '$2y$10$5XnQ0H5dHfMGVTiVVKcMV.WCR.llnsV/Ih/4GrIegiD5Ud7QWiG.y', 3, 1, 82, 1599803025),
(91, 'Sudirman Khatulis', '083822563986', 'sudirman@gmail.com', 'default.jpg', '$2y$10$2r6JTgynOcTPBo2LmeIQgueHllVX16Jr2imBjQ2wvF9ARl1VhecgG', 3, 1, 82, 1599803092),
(92, 'Dewi Agustine', '083822501321', 'dewiagustine@gmail.com', 'default.jpg', '$2y$10$EiQXWrjeZ2KioSzREFFVwe7kLaBxuVSG.u4/RmXMMyaruA2Pe0jTy', 3, 1, 82, 1599803119),
(93, 'nanda khairulina', '083822502198', 'nanda28262@gmail.com', 'default.jpg', '$2y$10$1L5.dXgbqdHMmWrmmCvyr.lwqGFfr9THJfL.8XUfCuJvrvnFrookS', 3, 1, 82, 1599803151),
(94, 'helmi yahyahda', '083822505432', 'helmiyahya@gmail.com', 'default.jpg', '$2y$10$pH3dyOGbSgeNMNdiFETouu1KNzPlu5Us3EVan6wnPSG4qGUrbAAG.', 3, 1, 82, 1599803200),
(95, 'Tirta kamludin', '083822502865', 'tirtakamaludin@gmail.com', 'default.jpg', '$2y$10$u/XyB4LH.StnXW9nK.a4CuGhD8MI4YFkcxc6UmJciNDxVjfaOUPEi', 3, 1, 82, 1599803269),
(96, 'Julia palia', '083822501760', 'juliapalia@gmail.com', 'default.jpg', '$2y$10$5DxdspWpywe8/FYugWl6OOMQ489x99h7grpDisTsRJP6WeSS/Paya', 3, 1, 82, 1599803545),
(97, 'indira putri', '0838225012976', 'indira21@gmail.com', 'default.jpg', '$2y$10$zdovQmm3nqwOX4PYJOZpuucmR6xEJhRe0oB/FTUp.qESPqKtxRcMe', 3, 1, 82, 1599803626),
(98, 'tiara putri kalama', '083822501621', 'tiaraputri@gmail.com', 'default.jpg', '$2y$10$aIDg9aqsqbycRng65sW8BeBPXCY03OysVm9zYim3B.mjAf7gYhXqe', 3, 1, 82, 1599803665),
(99, 'salma nur fadilah', '0838225011967', 'salmanurfadilah@gmail.com', 'default.jpg', '$2y$10$BS5XG.wWZeDY7JNc592.EOjYe0O7k14BXf5lloXGD0K7.V9H.kDBu', 3, 1, 82, 1599803700),
(100, 'dena zella', '08382250976', 'denazella@gmail.com', 'default.jpg', '$2y$10$8VvitEUpJhGw0hH8yrBOFuMqNU6G8vx.mcKyOeCJf3fDJXIF034me', 3, 1, 82, 1599803756),
(101, 'dwi hartono kalamia', '083822501278', 'dwihartono2@gtmail.com', 'default.jpg', '$2y$10$t4vWrZS5nPMWiVellpoqfuDdiOI9mB8y8E4zSQE1/ht1bjfgXH2F6', 3, 1, 82, 1599803783),
(102, 'aprian sinaga', '083822501633', 'apriansinaga@gmail.com', 'default.jpg', '$2y$10$tcSI1bs1hV8B8PibkfeTOu4I928GzIWx/RP9RhhJDWXhAGbUxGqGK', 3, 1, 82, 1599803844),
(103, 'kamal zinadin', '083822502198', 'kamal21632@gmail.com', 'default.jpg', '$2y$10$Q8qLQ1arrQbSo9e78HGh8ubxHUQ6yC8IRkDx3fyfgLGnhXTFND7GW', 3, 1, 82, 1599803883),
(104, 'dika mahadika', '083822501799', 'dikamahadika@gmail.com', 'default.jpg', '$2y$10$12Dgqzs2gucCA6bURGgFyew0z0Zs8eo7X7sb7K4m4o8u8lL21exH2', 3, 1, 82, 1599803994),
(105, 'zazakala ilham', '083822501188', 'zazakalailham@gmail.com', 'default.jpg', '$2y$10$xwG1NUwtdkJZLgokqYYjtOx0aWnEXeTCpf.yy6hqtxzo2znuBDXYu', 3, 1, 82, 1599804016),
(106, 'belapati ahwan', '083822501760', 'belapatiahwan@gmail.com', 'default.jpg', '$2y$10$y4ebXzps3Un/4IqPQ2S0geR6SKnSdfcvlg8pSc.QeJvbfu7GcGoHK', 3, 1, 82, 1599804102),
(107, 'Landhita kamal', '08382251287', 'landithakamal@gmail.com', 'default.jpg', '$2y$10$2n3Fd3XGtpoBkR0HxJOY0u7s0qq8a2z9857bqvE1KA1bt7lD5GB5O', 3, 1, 82, 1599804140),
(108, 'Kaka Supervisor', '0838225016197', 'supervisor4@gmail.com', 'default.jpg', '$2y$10$xaLCx/IzH3fT3lzZjtUDke3pOOa8At2ckrJ3P1b57SM.bwHamy3uS', 2, 1, NULL, 1599893807),
(109, 'Mawati Putri Cantika', '083822508367', 'mawati@gmail.com', 'default.jpg', '$2y$10$LM.vaeDomsJRsxDKtRWjIehvVU8Df78dQcAMoMzaMfW2WaCFqqelq', 3, 1, 108, 1599893905),
(110, 'Susan anjani', '08382251836', 'susananjanui@gmail.com', 'default.jpg', '$2y$10$uSWiTFIB59VzRym465gQS.HiOgLMSHgBhs41nZUGQgRmxd1NkNxUO', 3, 1, 108, 1599893942),
(111, 'jesica febriyanti', '083822501367', 'jesscia2020@gmail.com', 'default.jpg', '$2y$10$BEg2lpQL.HlCHMUj2QaAvO.tM9ATngydrisQcVtd0XWljoxH2oR0e', 3, 1, 108, 1599893962),
(112, 'mardigu cahya', '08382251635', 'mardigulife234@gmail.com', 'default.jpg', '$2y$10$jjIRruWZZH75P/XCJzGcf.Fz/kKyD1Njq1mzCzU4.kBQMAJg5bTta', 3, 1, 108, 1599893992),
(113, 'Kirana dwi anjani', '083822501655', 'kiranadwi06@gmail.com', 'default.jpg', '$2y$10$4I53C1gYaaV8LH3roGyJfeak8DnYZU18JDPmHbJOm1PvI.y5/ggyS', 3, 1, 108, 1599894022),
(114, 'citra kirana andani', '083822501700', 'citra0264@gmail.com', 'default.jpg', '$2y$10$5qQQzaIepzrTCO.WU46v3eKuZXXnbUfTeYMduPoHciVW9KAr6rscW', 3, 1, 108, 1599894061),
(115, 'maha dewi artula', '08382252648', 'mahadewi076@gmail.com', 'default.jpg', '$2y$10$tv.ZgHoaL1c0t2IyutJImeNdbzrcOrfAysKjQaiz/dWOZZwvi/1Xy', 3, 1, 108, 1599894086),
(116, 'melisa dewi nurhayanti', '083822501644', 'melisadewi@gmail.com', 'default.jpg', '$2y$10$7tDGavEdZTsiVDx5iS26O.ykiDXlzjuSCrlnd49a6OjYcxmoUORla', 3, 1, 108, 1599894120),
(117, 'citra dwi mulyana', '08382256394', 'citradewi48@gmail.com', 'default.jpg', '$2y$10$QoHbI.7eXoWnmmRHIdDKXeS4CTIp1GsZZsOrAip74VoVDLZP3KSDu', 3, 1, 108, 1599894173),
(118, 'jessica anjani putri', '08382250363', 'jessica8464@gmail.com', 'default.jpg', '$2y$10$/.XAJsxS6AEKHjlvNjfc2OoriFUo0TDHMOraGzaSG54ICRILcdyoS', 3, 1, 108, 1599894197),
(119, 'yakuja apriliani', '08382283532', 'yakuja2422@gmail.com', 'default.jpg', '$2y$10$mpGZq3RAlF8K4eZce6NfGucdXxSUkox.b9cb.WD33aoEwmKlw1gl6', 3, 1, 108, 1599894242),
(120, 'helmi nurfakhrudin', '083822501524', 'helmi22@gmail.com', 'default.jpg', '$2y$10$eENGiAivZn4YiswOA1/E6uoeW/Bd0C/Gc.XA2BBs7DYAxpV9n/0KC', 3, 1, 108, 1599894272),
(121, 'helmi dwi cahyadi', '083822526589', 'dwihelmi568@gmail.com', 'default.jpg', '$2y$10$UqXD5RVslBeU8KTHtrmxou4SuDWZuyw2empHhOovk816icJNt6dxq', 3, 1, 108, 1599894305),
(122, 'Karin tresna angga', '08382250466', 'karindwi33@gmail.com', 'default.jpg', '$2y$10$SeGOxCtICcKBC9o2.JtVCOjrv/gJSe.n3yXyzNBE4VSevop4Cgro.', 3, 1, 108, 1599894347),
(123, 'arief muhammad', '083822503896', 'ariefmuhammad2765@gmail.com', 'default.jpg', '$2y$10$Wd4x2s5ixzY1goEtZkcBoOtiR.fO2VbvRxpjpRfKNVcF2P6qGaMMa', 3, 1, 108, 1599894393),
(124, 'Deva Salsa Bila', '083822638763', 'devasalsabila@gmail.com', 'default.jpg', '$2y$10$By3R1O.21MwyTu7dIbwYyOPNl70nJqnzREmP2Jw4i7i5DvZiz509W', 3, 1, 108, 1599894422),
(125, 'Salsa Kori Apriliani', '08382252543', 'salsakori286@gmail.com', 'default.jpg', '$2y$10$2QKOn8TOwW84rFisIhloQOPagZcwi88G9pAwCxWtQSKueLBK.T4/S', 3, 1, 108, 1599894443),
(126, 'Saeful Bahri', '083822508725', 'saefulbahri987@gmail.com', 'default.jpg', '$2y$10$TBZC.41sysP1WYORpmBrruOelYqY3CIxS.NGlZKA9zU57.cCf9PJK', 3, 1, 108, 1599894465),
(127, 'Febrian Faturahman Hidayat', '083822538365', 'febrianfaturahman@gmail.com', 'default.jpg', '$2y$10$KSBOxGDh74WvW1AEQWlNlOAevmSpMvjw7VcCIAbDO2HDiquxEkcti', 3, 1, 108, 1599894503),
(128, 'jayana dwi akhir', '083822554298', 'jayana3737@gmail.com', 'default.jpg', '$2y$10$h9.z4x4QjvpDsQvajzqwP.Be.XxwB.a9a.IHFPWN2To3sTlfxmKo6', 3, 1, 108, 1599894533),
(129, 'darmayati neng lati', '083822373693', 'darmayati283@gmail.com', 'default.jpg', '$2y$10$HHRTZezSpornjVgfnpJ7weI9VuuoO.7WHUkjRs18C144HN76vQyV.', 3, 1, 108, 1599894558),
(130, 'lati luniarti', '083822505298', 'latinurhayati@gmail.com', 'default.jpg', '$2y$10$pv3oyRb7H5k0KQ9vdGyPHun0zMV2vO7Jz/pIodJfYQ0zd0HnGuRim', 3, 1, 108, 1599894582),
(131, 'Sonya widiana', '083822501152', 'sonyawidiyana65@gmail.com', 'default.jpg', '$2y$10$4zeMZjlsiEpgBSPn0RkHM.In.e/CF0BxolYT5DcJNtAZ6Fm3iIphC', 3, 1, 108, 1599894606),
(132, 'Erlina queenisa', '083822572346', 'erlinaquenisa@gmail.com', 'default.jpg', '$2y$10$V2S.oSNuFFlxr4K81fV5Ce.b81B7d//8zmEz7PupwJD2PFQhVKqz.', 3, 1, 108, 1599894635),
(133, 'Karlina Eka Dwi', '08382568265', 'karlinaeka09@gmail.com', 'default.jpg', '$2y$10$jEwjniY.Yj0.dWOmxbymW.7TtVn61Ujgecwry17xjlSE3tQCcTMUm', 3, 1, 108, 1599894654),
(134, 'Leni Supervisor', '083822502839', 'supervisor5@gmail.com', 'default.jpg', '$2y$10$rGUDodWkrzrdrs/CsOYHB.Oww36m7B2wxxHul/6ngUdSvkMMJPxn6', 2, 1, NULL, 1599895615),
(135, 'intan pertiwi', '083822518765', 'intanpertiwi@gmail.com', 'default.jpg', '$2y$10$UvKbtYBbMZBmP0mMKits/u9KkyV1H9vHkNVBFVR487aLP6qkh7Hhi', 3, 1, 134, 1599895845),
(136, 'euis siti marwah', '083822507653', 'euissitimawawah@gmail.com', 'default.jpg', '$2y$10$YOyspoIWPd/j1y11ZoDXeOexSc/RQBudG11uX60hdAQ162GLyrbI.', 3, 1, 134, 1599895876),
(137, 'leni salsabila apriliyani', '083822502987', 'leni965@gmail.com', 'default.jpg', '$2y$10$XmYH6GkJB3pQQ46q6BK2TOeVBmv4K7ucHx5A3BCOK4PxXi2xsV2da', 3, 1, 134, 1599895901),
(138, 'sinya yulianti', '083822565432', 'sintayulianyi@gmail.com', 'default.jpg', '$2y$10$Sa3.QJ9J3WJk8Fz6.9j6TejDfKLgmg1poS8.5VQkvwEzH8178vGGK', 3, 1, 134, 1599895934),
(139, 'Jafar Laksono', '083822528709', 'jafarlaksono@gmail.com', 'default.jpg', '$2y$10$iQp.hv7DOjJ13jTVRZxYNer2xOUypdW1RzbU7a6hCActmsVuVGw4m', 3, 1, 134, 1599895986),
(140, 'Resa Halimud', '083822587654', 'resahalimud@gmail.com', 'default.jpg', '$2y$10$yZdEOt4eLds9pdbmB5ccn.uHTY49COylAuKZOSPcG70gXXiU85G2S', 3, 1, 134, 1599896050),
(141, 'fajar jamaludin', '083822508765', 'fajarjameludin@gmail.com', 'default.jpg', '$2y$10$PbTw5WL3uew03YJaRXgkmex0JmFNrc3T9x77XYlUwB5vJb6W7ufTK', 3, 1, 134, 1599896310),
(142, 'novi pertiwi saniama', '083822504327', 'novi865@gmail.com', 'default.jpg', '$2y$10$ta3wKFzzXXXun9/oxUbYDuHUb.xik2DepsWVSL/rg2l5YUG3OwO5a', 3, 1, 134, 1599896336),
(143, 'lina maryiamna', '083822565432', 'linamarliana87@gmail.com', 'default.jpg', '$2y$10$JqwFPbbOheG.1LhdQ6DAJOdXQDig6zalisu5VXJqnoEtEal825cAu', 3, 1, 134, 1599896426),
(144, 'Shizuka karlina', '083822576539', 'shizuka876@gmail.com', 'default.jpg', '$2y$10$5we861xq8MBUX925ulNxaOy04Y.56/g3BZmtv0XfHuF1vJUn1PnSG', 3, 1, 134, 1599896448),
(145, 'Jamaludin Anggoro', '083822502871', 'jamaludin234@gmail.com', 'default.jpg', '$2y$10$XxMfBe5c8xItVX9ngL5uquZJWi48uCSgmnDOCkFFC3D/0i.zzyYRm', 3, 1, 134, 1599896505),
(146, 'Ine agustine', '083822565498', 'ineagustine@gmail.com', 'default.jpg', '$2y$10$5SYALid8wl4S6tWlg8KqHuyn5nPCIXRR5nALiPbsqKi9.GzH/tj62', 3, 1, 134, 1599896540),
(147, 'anggita sanitia', '083822521986', 'anggitasanitia@gmail.com', 'default.jpg', '$2y$10$NSYa0jrpyL9/.uSIh3.QVOBU10Hc7yqSp./7sCRFtODB17.w5VWF6', 3, 1, 134, 1599896569),
(148, 'Anisa Indah artini', '083822509899', 'anisaindah@gmail.com', 'default.jpg', '$2y$10$aqcwdb67PRZp88obRH1KUO7HwXmNifWQ79mqVRubI5BDin1X1UTqK', 3, 1, 134, 1599896610),
(149, 'Jajak Kameludin', '08382254896', 'jajakkameludin@gmail.com', 'default.jpg', '$2y$10$WQcUs3//GeXepvoKxBZWP.BJF4DqhsHZkKK0iJk2WqJztgsCtBlkq', 3, 1, 134, 1599896640),
(150, 'mila rengganis dwi', '083822597654', 'melarengganis@gmail.com', 'default.jpg', '$2y$10$123KP5KzSy7Vj1CR8seho.gt8KDH9dSFBL8sk7j02NcZKdW0jbDnK', 3, 1, 134, 1599896668),
(151, 'ikhsan dwi muhidin', '08382287649', 'ikhsadwimuhidin@gmail.com', 'default.jpg', '$2y$10$lkLeF/k2g8MZNfH0jbN47.XEwITTWwDEVSret5W0lyggQ3iMh1rqe', 3, 1, 134, 1599896692),
(152, 'zenifer zahra', '083822501865', 'zeniferzahra66@gmail.com', 'default.jpg', '$2y$10$GhvUEtQb8Yu7zbfeoqiT5uGf8j0INsKfYv2U9IVdboChyFA70O7/C', 3, 1, 134, 1599896741),
(153, 'Dinda Zihan', '083822509321', 'dindazihan@gmail.com', 'default.jpg', '$2y$10$9JjGIL6svTviHtu2fpqYLu5jSw8FAA0JrDhq95eCFWD/49EpzCTvm', 3, 1, 134, 1599896766),
(154, 'rani anjani', '083822586246', 'ranianjani@gmail.com', 'default.jpg', '$2y$10$yOCci8lvF29LzGI3ljuBOeXPcNL9wmlEXkW8HrJuaXzjIOYDCHDY.', 3, 1, 134, 1599896795),
(155, 'roman pieces', '083822503276', 'romahpieces@gmail.com', 'default.jpg', '$2y$10$PomBBKLqnPAZAeoZ52UkNO4XER/agEBchFCFxyfigGgJjvhOdoj.K', 3, 1, 134, 1599896831),
(156, 'Anton agustina', '083822264788', 'antonagustina@gmail.com', 'default.jpg', '$2y$10$Y1u8Q3dRBaEQM13m3g.DBeg52X6k9MpcIcNPJcYs0EkJ5t9L.5DHa', 3, 1, 134, 1599896861),
(157, 'zamal kemal', '083822506373', 'zamaludinkemal@gmail.com', 'default.jpg', '$2y$10$c/TkkU9AFnVFaRTPgwJide8kGg//qkOSbhYQW9y/IrooqfNm/CqqG', 3, 1, 134, 1599896882),
(158, 'fina dwi sestia', '083822938654', 'finadewi@gmail.com', 'default.jpg', '$2y$10$l2w4Lu/n7VbeGP87MIu91.snvFItVzOaib/IbWoBrf5rKWbRIPiD6', 3, 1, 134, 1599896916),
(159, 'Dewi agustine karlina', '083826549876', 'dewiagustin@gmail.com', 'default.jpg', '$2y$10$Fb1c.XUE.Xmm0fzUw9PDwOmbF1NJQZiCOBpDe2.McbfXYxpUAjUB6', 3, 1, 134, 1599896936),
(160, 'Dena Supervisor', '083812345678', 'supervisor6@gmail.com', 'default.jpg', '$2y$10$wAojY2joEwKCjQv8OzufRO.rNDqf3k0jXlXPYWw/afVRxoXIqzgHy', 2, 1, NULL, 1599897756),
(161, 'audri wijaya', '083822324589', 'audriwijaya@gmail.com', 'default.jpg', '$2y$10$i5B.4Qa.pq49ILKiCF/dV.qWe0Cwx57It6SUMXTA8UOLSGKzhokES', 3, 1, 160, 1599897884),
(162, 'jaya kusuma widata', '083822835693', 'jayakusuma@gmail.com', 'default.jpg', '$2y$10$EnveP5BQ8Rlpg9sfEUoQbe2x.z1Kx1XkJiB2v3XN7S8Mj8P9k3T1e', 3, 1, 160, 1599897957),
(163, 'fauzy dwi hermandi', '083822598543', 'fauzydwihermani@gmail.com', 'default.jpg', '$2y$10$emYZvCR4RgYQ3m6ssTbf9utUzvaD.cfhzendDu.VNJnbmqGnZ9Osi', 3, 1, 160, 1599897979),
(164, 'Anisa salsa dwi', '083822501100', 'anisasalsa@gmail.com', 'default.jpg', '$2y$10$C/TVr8HUCYUK6dHidUtXk.32qRu1Ust5c.3aZ7.8zgG0n7fwlzqMq', 3, 1, 160, 1599898007),
(165, 'Hendar sudirman', '083822987654', 'hendarsudirman@gmail.com', 'default.jpg', '$2y$10$SiSbx75vtoZGRJ8fbpbH..qYx1m10bC/i7dekjjwPuyYOF/OC3hoW', 3, 1, 160, 1599898030),
(166, 'Dwi vespanita', '083822198765', 'dwivespanita@gmail.com', 'default.jpg', '$2y$10$7R3TAR78.3e3l51Oe1W9pOCECmhIPpt4ZaQ.07rf7CkPgJkAin0..', 3, 1, 160, 1599898052),
(167, 'anjar dwi andani', '083822501964', 'anjardwi@gmail.com', 'default.jpg', '$2y$10$aQvApawQBCB2Xx7GlRVz/us22jqw5TP9pWCFUwwnmrpTtT/pCHpcy', 3, 1, 160, 1599898097),
(168, 'Angel sinta dwi', '083822598012', 'angelsinta@gmail.com', 'default.jpg', '$2y$10$aVNUfsPrmE.nEEOpQW67sOnagKMP6tuTyZBFnMHJLXprVwUpgxx9C', 3, 1, 160, 1599898137),
(169, 'andika mahendra', '083822587629', 'andikamahendra@gmail.com', 'default.jpg', '$2y$10$bzPK5zOjTQmTrokzxskZcO0T4FFRhkpdcvLNRoeKcxImdjS3/XPlu', 3, 1, 160, 1599898254),
(170, 'santi yulianti', '0838225872633', 'santiyulia@gmail.com', 'default.jpg', '$2y$10$SKIWWe2MvszyC2n8f7U.xO4lCuW7fKyPKiRcj6/O3amefyzG6X59K', 3, 1, 160, 1599898279),
(171, 'dewi melisa cantika', '083822501286', 'dewimelisa@gmail.com', 'default.jpg', '$2y$10$rXYl2by8e4dtdQoKDQjMIerAWSbxnQ0KNGDGbOFQdJYv5BNFeIxMS', 3, 1, 160, 1599898315),
(172, 'jenifer dwi shani', '083822501234', 'jeniferdwi@gmail.com', 'default.jpg', '$2y$10$LwvmRajRbiEU5NtNTsWBFOapedNsg5bvD.Kv.p39pHjSNFYQmIXBa', 3, 1, 160, 1599898345),
(173, 'ikhsan dinda jihan', '083822986542', 'ikhsandindajihan@gmail.com', 'default.jpg', '$2y$10$l2fGmk4qEVw05MDe2GZ9.O1my12xsbFYxFaNlp3mhVcN2SILXEPxu', 3, 1, 160, 1599898378),
(174, 'anita salsabila dwi', '08382252736', 'anitasalsalbila@gmail.com', 'default.jpg', '$2y$10$hU3F5aL5r7XIURHg01E4E.xIJbgJeM88YmzccHlYbIhBMW.IULCqS', 3, 1, 160, 1599898400),
(175, 'herlan dwi angkas', '0838225073639', 'herlandwiangkas@gmail.com', 'default.jpg', '$2y$10$3KsF61YfJWet4IdC8Kx.Se2XagBlWuJ9e1822t6nSsjeNwR8KUp5K', 3, 1, 160, 1599898424),
(176, 'karlina dwi shani', '083822505432', 'karlinadwishani@gmail.com', 'default.jpg', '$2y$10$abYso439ABzk5dU8yVOTcut9U8f9m.D8CY7jiF/Td9QcE7ssPDoOC', 3, 1, 160, 1599898483),
(177, 'dadang suhendi', '083822507654', 'dadangsuhendi@gmail.com', 'default.jpg', '$2y$10$OUCoihk8qOgpjw0nsCh/KO.c/gDHhQLDQDRROm1VEAbtbhQdMtxJG', 3, 1, 160, 1599898499),
(178, 'kaka shanatia', '083822583736', 'kakashanatia@gmail.com', 'default.jpg', '$2y$10$ya62tr.orajg3UH/V4/l5u5Wrnpao0CI13x60MrckzBPBRXbHZWn2', 3, 1, 160, 1599898519),
(179, 'citra shanitia', '083822503655', 'citrashanitia@gmail.com', 'default.jpg', '$2y$10$P1EAsd8.nvHOL6jRRlEDHO3Vn/817Dd209Kaph1Q2/7WjGp4b7vCS', 3, 1, 160, 1599898540),
(180, 'jajaludin amanda', '083822503753', 'jajaludinanisa@gmail.com', 'default.jpg', '$2y$10$LZZzWh4xXIjYr2Hw1Df1R.xFgcLuC26/rnth8dG4n8yxTqlOX4C7e', 3, 1, 160, 1599898570),
(181, 'karin ikhsan dwi', '083822502532', 'ikhsandwi@gmail.com', 'default.jpg', '$2y$10$nnNEXIzMfvvyAFzaZ.E52OZHvIcJfHaUNo5FSngodNWIHWdBpeqMq', 3, 1, 160, 1599898710),
(182, 'Apriliani Dwi Suciana', '083822501652', 'aprilianidwisuciana@gmail.com', 'default.jpg', '$2y$10$x7SQqd5YtWTp3cE0shWzluj3Nu6CymHzCzTgZmxrtQjcXJTVJhdZy', 3, 1, 160, 1599898805),
(183, 'Melisa dwi shanitia suciana', '083822563534', 'melisadwisucianasuciana@gmail.com', 'default.jpg', '$2y$10$u89gMhZJ6El6TruBPtNCoOMVsZCbHWAPo4JUlx3eF3K4AcganK.ti', 3, 1, 160, 1599898827),
(184, 'kamaludin akhsan', '083822508365', 'kamaludinakhsan@gmail.com', 'default.jpg', '$2y$10$LhZyL1QAwyA/OgQOgmwkhue0K8jvig7mxCyUyjiOFE49SLTP9kxPu', 3, 1, 160, 1599898849),
(185, 'dina zella dwi', '083822508365', 'dinazelaharliana@gmail.com', 'default.jpg', '$2y$10$A/QDOh8vKwRed7bepkq7Ge.pgH3MDSFAIf5KVZYrN2yKqrQ.zNa1i', 3, 1, 160, 1599898872),
(186, 'Fina Supervisor', '0838225017755', 'supervisor7@gmail.com', 'default.jpg', '$2y$10$ap5m3cylIdoXna9CQVIv2elewLIHFsjgA2ziLX9ebzOEuB4aC2rpO', 2, 1, NULL, 1599898991);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Supervisor'),
(3, 'Marketing');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jenis_web`
--
ALTER TABLE `jenis_web`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pendapatan`
--
ALTER TABLE `pendapatan`
  ADD PRIMARY KEY (`id_pendapatan`);

--
-- Indeks untuk tabel `termin`
--
ALTER TABLE `termin`
  ADD PRIMARY KEY (`id_termin`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jenis_web`
--
ALTER TABLE `jenis_web`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `pendapatan`
--
ALTER TABLE `pendapatan`
  MODIFY `id_pendapatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `termin`
--
ALTER TABLE `termin`
  MODIFY `id_termin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
