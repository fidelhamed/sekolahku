-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Nov 2024 pada 10.53
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `angkets`
--

CREATE TABLE `angkets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pertanyaan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `angkets`
--

INSERT INTO `angkets` (`id`, `pertanyaan`, `created_at`, `updated_at`) VALUES
(1, 'Apakah harapan Bapak/Ibu terhadap pendidikan yang diterima anak di pesantren ini?', '2024-11-02 21:06:38', '2024-11-02 21:06:38'),
(2, 'Bagaimana pendapat Bapak/Ibu tentang kurikulum yang diterapkan di pesantren?', '2024-11-02 21:06:47', '2024-11-02 21:06:47'),
(3, 'Apakah Bapak/Ibu bersedia mendukung kegiatan pesantren, seperti penggalangan dana atau acara lainnya?', '2024-11-02 21:06:52', '2024-11-02 21:06:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `angket_answers`
--

CREATE TABLE `angket_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `angket_response_id` bigint(20) UNSIGNED NOT NULL,
  `angket_id` bigint(20) UNSIGNED NOT NULL,
  `jawaban` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `angket_answers`
--

INSERT INTO `angket_answers` (`id`, `angket_response_id`, `angket_id`, `jawaban`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Laudantium dolores', '2024-11-02 21:37:38', '2024-11-02 21:37:38'),
(2, 1, 2, 'Amet laborum Enim', '2024-11-02 21:37:38', '2024-11-02 21:37:38'),
(3, 1, 3, 'Ipsa veritatis aute', '2024-11-02 21:37:38', '2024-11-02 21:37:38'),
(4, 2, 1, 'Voluptas tenetur odi', '2024-11-02 22:28:44', '2024-11-02 22:28:44'),
(5, 2, 2, 'Dolore incidunt id', '2024-11-02 22:28:44', '2024-11-02 22:28:44'),
(6, 2, 3, 'Quis consequatur id', '2024-11-02 22:28:44', '2024-11-02 22:28:44'),
(7, 3, 1, 'Aspernatur voluptate', '2024-11-04 03:41:33', '2024-11-04 03:41:33'),
(8, 3, 2, 'Ad laboris minus dol', '2024-11-04 03:41:34', '2024-11-04 03:41:34'),
(9, 3, 3, 'Atque non eaque beat', '2024-11-04 03:41:34', '2024-11-04 03:41:34'),
(10, 4, 1, 'Harum molestiae fugi', '2024-11-04 04:50:03', '2024-11-04 04:50:03'),
(11, 4, 2, 'Qui irure aliquam di', '2024-11-04 04:50:03', '2024-11-04 04:50:03'),
(12, 4, 3, 'Voluptatum illum qu', '2024-11-04 04:50:03', '2024-11-04 04:50:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `angket_responses`
--

CREATE TABLE `angket_responses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `angket_responses`
--

INSERT INTO `angket_responses` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 12, '2024-11-02 21:37:38', '2024-11-02 21:37:38'),
(2, 15, '2024-11-02 22:28:44', '2024-11-02 22:28:44'),
(3, 10, '2024-11-04 03:41:33', '2024-11-04 03:41:33'),
(4, 20, '2024-11-04 04:50:03', '2024-11-04 04:50:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sandi_bank` varchar(20) NOT NULL,
  `nama_bank` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `banks`
--

INSERT INTO `banks` (`id`, `sandi_bank`, `nama_bank`) VALUES
(1, '002', 'Bank BRI'),
(2, '008', 'Bank Mandiri'),
(3, '009', 'Bank BNI'),
(4, '427', 'Bank Syariah Indonesia (Eks. BNI Syariah)'),
(5, '451', 'Bank Syariah Indonesia (Eks. Bank Syariah Mandiri, BSM)'),
(6, '422', 'Bank Syariah Indonesia (Eks. BRI Syariah)'),
(7, '200', 'Bank BTN'),
(8, '022', 'Bank CIMB'),
(9, '022', 'Bank CIMB Niaga Syariah'),
(10, '147', 'Bank Muamalat'),
(11, '213', 'Bank BTPN'),
(12, '547', 'Bank BTPN Syariah'),
(13, '213', 'Bank Jenius'),
(14, '013', 'Bank Permata'),
(15, '013', 'Bank Permata Syariah'),
(16, '046', 'Bank DBS Indonesia'),
(17, '046', 'Digibank'),
(18, '011', 'BANK DANAMON'),
(19, '016', 'BANK MAYBANK (BII)'),
(20, '426', 'BANK MEGA'),
(21, '153', 'BANK SINARMAS'),
(22, '950', 'BANK COMMONWEALTH'),
(23, '028', 'BANK OCBC NISP'),
(24, '441', 'BANK BUKOPIN'),
(25, '521', 'BANK BUKOPIN SYARIAH'),
(26, '536', 'BANK BCA SYARIAH'),
(27, '026', 'BANK LIPPO'),
(28, '031', 'CITIBANK'),
(29, '789', 'INDOSAT DOMPETKU'),
(30, '911', 'LINKAJA'),
(31, '023', 'Bank UOB Indonesia'),
(32, '023', 'TMRW by UOB Indonesia'),
(33, '542', 'Bank Jago (Bank Artos Indonesia)'),
(34, '490', 'Bank NEO Commerce (Akulaku)'),
(35, '110', 'BANK JABAR BJB (JAWA BARAT)'),
(36, '425', 'BANK JABAR BJB SYARIAH (JAWA BARAT)'),
(37, '111', 'BANK DKI JAKARTA'),
(38, '112', 'BPD DIY (YOGYAKARTA)'),
(39, '113', 'BANK JATENG (JAWA TENGAH)'),
(40, '114', 'BANK JATIM (JAWA TIMUR)'),
(41, '115', 'BANK JAMBI'),
(42, '116', 'BANK ACEH'),
(43, '116', 'BANK ACEH SYARIAH'),
(44, '117', 'BANK SUMUT'),
(45, '118', 'BANK NAGARI (BANK SUMBAR)'),
(46, '119', 'BANK RIAU KEPRI'),
(47, '120', 'BANK SUMSEL BABEL (SUMATERA SELATAN BANGKA BELITUNG)'),
(48, '121', 'BANK LAMPUNG'),
(49, '122', 'BANK KALSEL (BANK KALIMANTAN SELATAN)'),
(50, '123', 'BANK KALBAR (BANK KALIMANTAN BARAT)'),
(51, '124', 'BANK KALTIMTARA (BANK KALIMANTAN TIMUR DAN UTARA)'),
(52, '125', 'BANK KALTENG (BANK KALIMANTAN TENGAH)'),
(53, '126', 'BANK SULSELBAR (BANK SULAWESI SELATAN DAN BARAT)'),
(54, '127', 'BANK SULUTGO (BANK SULAWESI UTARA DAN GORONTALO)'),
(55, '128', 'BANK NTB'),
(56, '128', 'BANK NTB SYARIAH'),
(57, '129', 'BANK BPD BALI'),
(58, '130', 'BANK NTT'),
(59, '131', 'BANK MALUKU MALUT'),
(60, '132', 'BANK PAPUA'),
(61, '133', 'BANK BENGKULU'),
(62, '134', 'BANK SULTENG (BANK SULAWESI TENGAH)'),
(63, '135', 'BANK SULTRA (BANK SULAWESI TENGGARA)'),
(64, '137', 'BANK BANTEN'),
(65, '003', 'BANK EKSPOR INDONESIA'),
(66, '019', 'BANK PANIN'),
(67, '517', 'BANK PANIN DUBAI SYARIAH'),
(68, '020', 'BANK ARTA NIAGA KENCANA'),
(69, '030', 'AMERICAN EXPRESS BANK LTD'),
(70, '031', 'CITIBANK'),
(71, '032', 'JP. MORGAN CHASE BANK, N.A.'),
(72, '033', 'BANK OF AMERICA, N.A'),
(73, '034', 'ING INDONESIA BANK'),
(74, '036', 'BANK CCB INDONESIA'),
(75, '037', 'BANK ARTHA GRAHA INTERNASIONAL'),
(76, '039', 'BANK CREDIT AGRICOLE INDOSUEZ'),
(77, '040', 'THE BANGKOK BANK COMP. LTD'),
(78, '042', 'MUFG BANK'),
(79, '045', 'BANK SUMITOMO MITSUI INDONESIA'),
(80, '047', 'BANK RESONA PERDANIA'),
(81, '048', 'BANK MIZUHO INDONESIA'),
(82, '050', 'STANDARD CHARTERED BANK'),
(83, '052', 'BANK ABN AMRO'),
(84, '053', 'BANK KEPPEL TATLEE BUANA'),
(85, '054', 'BANK CAPITAL INDONESIA'),
(86, '057', 'BANK BNP PARIBAS INDONESIA'),
(87, '059', 'KOREA EXCHANGE BANK DANAMON'),
(88, '060', 'RABOBANK INTERNASIONAL INDONESIA'),
(89, '061', 'BANK ANZ INDONESIA'),
(90, '069', 'BANK OF CHINA'),
(91, '076', 'BANK BUMI ARTA'),
(92, '087', 'BANK HSBC INDONESIA'),
(93, '087', 'BANK EKONOMI (Lebur dengan Bank HSBC)'),
(94, '088', 'BANK ANTARDAERAH'),
(95, '089', 'BANK HAGA'),
(96, '093', 'BANK IFI'),
(97, '095', 'BANK J TRUST INDONESIA'),
(98, '097', 'BANK MAYAPADA'),
(99, '145', 'BANK NUSANTARA PARAHYANGAN'),
(100, '146', 'BANK SWADESI (BANK OF INDIA INDONESIA)'),
(101, '151', 'BANK MESTIKA'),
(102, '152', 'BANK SHINHAN INDONESIA (BANK METRO EXPRESS)'),
(103, '157', 'BANK MASPION INDONESIA'),
(104, '159', 'BANK HAGAKITA'),
(105, '161', 'BANK GANESHA'),
(106, '162', 'BANK WINDU KENTJANA'),
(107, '164', 'BANK ICBC INDONESIA (HALIM INDONESIA BANK)'),
(108, '166', 'BANK HARMONI INTERNATIONAL'),
(109, '167', 'BANK QNB INDONESIA'),
(110, '212', 'BANK WOORI SAUDARA'),
(111, '405', 'BANK VICTORIA SYARIAH'),
(112, '459', 'BANK BISNIS INTERNASIONAL'),
(113, '466', 'BANK SRI PARTHA'),
(114, '472', 'BANK JASA JAKARTA'),
(115, '484', 'BANK HANA (KEB HANA BANK)'),
(116, '485', 'BANK MNC'),
(117, '490', 'BANK YUDHA BHAKTI'),
(118, '491', 'BANK MITRANIAGA'),
(119, '494', 'BANK BRI AGRO'),
(120, '498', 'BANK SBI INDONESIA (BANK INDOMONEX)'),
(121, '501', 'BANK DIGITAL BCA (BCA DIGITAL)'),
(122, '503', 'BANK NATIONAL NOBU (BANK ALFINDO)'),
(123, '506', 'BANK MEGA SYARIAH'),
(124, '513', 'BANK INA PERDANA'),
(125, '517', 'BANK PANIN DUBAI SYARIAH'),
(126, '520', 'PRIMA MASTER BANK'),
(127, '521', 'BANK PERSYARIKATAN INDONESIA'),
(128, '525', 'BANK AKITA'),
(129, '526', 'BANK DINAR INDONESIA'),
(130, '531', 'ANGLOMAS INTERNASIONAL BANK'),
(131, '523', 'BANK SAHABAT SAMPEORNA (BANK DIPO INTERNATIONAL)'),
(132, '535', 'BANK KESEJAHTERAAN EKONOMI'),
(133, '548', 'BANK MULTIARTA SENTOSA'),
(134, '553', 'BANK MAYORA INDONESIA'),
(135, '555', 'BANK INDEX SELINDO'),
(136, '558', 'BANK EKSEKUTIF'),
(137, '559', 'CENTRATAMA NASIONAL BANK'),
(138, '562', 'BANK FAMA INTERNASIONAL'),
(139, '564', 'BANK MANDIRI TASPEN POS (BANK SINAR HARAPAN BALI)'),
(140, '566', 'BANK VICTORIA INTERNATIONAL'),
(141, '567', 'BANK HARDA INTERNASIONAL'),
(142, '945', 'IBK BANK INDONESIA'),
(143, '946', 'BANK MERINCORP'),
(144, '947', 'BANK MAYBANK INDOCORP'),
(145, '949', 'BANK CTBC INDONESIA (CHINA TRUST)'),
(146, '688', 'BPR KS (KARYAJATNIKA SEDAYA)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank_accounts`
--

CREATE TABLE `bank_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `account_number` bigint(20) UNSIGNED NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `is_primary` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bank_accounts`
--

INSERT INTO `bank_accounts` (`id`, `user_id`, `account_number`, `account_name`, `bank_name`, `is_primary`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 123456789, 'IBS Ash-Shiddiiqi Jambi', 'Bank Muamalat', 1, 1, '2024-11-02 20:09:07', '2024-11-02 20:09:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `beritas`
--

CREATE TABLE `beritas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas_murids`
--

CREATE TABLE `berkas_murids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `kartu_keluarga` varchar(255) DEFAULT NULL,
  `akte_kelahiran` varchar(255) DEFAULT NULL,
  `rapor` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `ijazah` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `berkas_murids`
--

INSERT INTO `berkas_murids` (`id`, `user_id`, `kartu_keluarga`, `akte_kelahiran`, `rapor`, `foto`, `ijazah`, `created_at`, `updated_at`) VALUES
(1, 12, '1730583399_404 Wallpaper 46659 1920x1200 px HDWallSourcecom.jpg', '1730583399_7Ci0mYz-mercedes-benz-slr-mclaren-wallpaper.jpg', '1730583399_Test.pdf', '1730583399_fidel.jpg', '1730583399_Surat lamaran - UNMER.pdf', '2024-11-02 21:36:01', '2024-11-02 21:36:39'),
(2, 14, '1730585861_404 Wallpaper 46659 1920x1200 px HDWallSourcecom.jpg', '1730585862_7Ci0mYz-mercedes-benz-slr-mclaren-wallpaper.jpg', NULL, '1730585862_PasFotoBlueBG.jpeg', NULL, '2024-11-02 22:17:13', '2024-11-02 22:17:42'),
(3, 15, '1730585933_Surat lamaran - UNMER.pdf', '1730585933_Surat_Lamaran_Fidel_Hamed.pdf', NULL, '1730585933_bart.jpg', NULL, '2024-11-02 22:18:27', '2024-11-02 22:18:53'),
(4, 10, '1730691608_Surat_Lamaran_Fidel_Hamed.pdf', '1730691608_Test.pdf', NULL, '1730691608_bart.jpg', NULL, '2024-11-04 03:34:12', '2024-11-04 03:40:08'),
(5, 20, '1730695702_7Ci0mYz-mercedes-benz-slr-mclaren-wallpaper.jpg', '1730695702_404 Wallpaper 46659 1920x1200 px HDWallSourcecom.jpg', '1730695702_7Ci0mYz-mercedes-benz-slr-mclaren-wallpaper.jpg', '1730695702_DSCF1266-removebg-preview.jpg', NULL, '2024-11-04 04:47:59', '2024-11-04 04:48:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_murids`
--

CREATE TABLE `data_murids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `noreg` varchar(255) DEFAULT NULL,
  `nis` bigint(20) DEFAULT NULL,
  `nisn` bigint(20) DEFAULT NULL,
  `jenjang` enum('TKTQ','TKTQ-2','SD-IT','SD-IT-2','SMP-IT','SMA-IT','MA') NOT NULL,
  `nama_panggilan` varchar(255) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `anak_ke` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `sakit` text DEFAULT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `asal_sekolah` varchar(255) DEFAULT NULL,
  `alamat_sekolah` text DEFAULT NULL,
  `prestasi` text DEFAULT NULL,
  `proses` enum('Pendaftaran','Berkas','Murid','Ditolak','Input Data','Perbaikan','Lulus Administrasi','Selesai') NOT NULL DEFAULT 'Pendaftaran',
  `approved_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_murids`
--

INSERT INTO `data_murids` (`id`, `user_id`, `noreg`, `nis`, `nisn`, `jenjang`, `nama_panggilan`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `anak_ke`, `alamat`, `sakit`, `telp`, `whatsapp`, `asal_sekolah`, `alamat_sekolah`, `prestasi`, `proses`, `approved_by`, `created_at`, `updated_at`) VALUES
(1, 10, '2024-MA-0001', 23456789, 87654567, 'MA', 'Laudantium ut proid', 'Laki-laki', 'Et qui omnis excepte', '2024-10-27', '90', 'Quas ipsum veniam', 'Explicabo Doloribus', '2345678900', '2345678900', 'Quos sunt quam sint', 'Atque sint et debit', 'Facere deleniti nece', 'Selesai', 3, '2024-11-02 21:08:47', '2024-11-04 03:47:34'),
(2, 11, '2024-SMA-IT-0001', NULL, NULL, 'SMA-IT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '64', 'Vel beatae dolor et', NULL, NULL, 'Pendaftaran', NULL, '2024-11-02 21:09:40', '2024-11-02 21:09:40'),
(3, 12, '2024-MA-0002', 27367, 63781, 'MA', 'Dignissimos non offi', 'Perempuan', 'Ipsum deserunt id ex', '2024-10-28', '46', 'Sed omnis Nam quisqu', 'Consequat Vitae inv', '68', '71', 'Tempora iusto laudan', 'Itaque architecto qu', 'Quas distinctio Eiu', 'Selesai', 3, '2024-11-02 21:22:28', '2024-11-02 21:42:41'),
(4, 13, '2024-SMA-IT-0002', NULL, NULL, 'SMA-IT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11', 'Nihil minima dolorem', NULL, NULL, 'Pendaftaran', NULL, '2024-11-02 21:22:52', '2024-11-02 21:22:52'),
(5, 14, '2024-TKTQ-0001', NULL, NULL, 'TKTQ', 'Amet doloribus porr', 'Perempuan', 'Necessitatibus in la', '2024-10-31', '86', 'Sed saepe velit nih', 'Nisi dolore blanditi', '59', '57', 'Molestiae vero et et', 'Exercitation sit qu', 'Non nesciunt ipsam', 'Lulus Administrasi', 9, '2024-11-03 09:03:19', '2024-11-02 22:19:20'),
(6, 15, '2024-TKTQ-2-0001', NULL, NULL, 'TKTQ-2', 'Ab ullamco expedita', 'Perempuan', 'Aut consequatur elig', '2024-10-29', '16', 'Fugiat dolor quae a', 'Sint unde qui esse', '34', '76', 'Ut error dolor labor', 'Est doloribus aliqua', 'Fugit ratione ea qu', 'Lulus Administrasi', 9, '2024-11-03 09:03:29', '2024-11-02 22:19:38'),
(7, 18, '2024-MA-0003', NULL, NULL, 'MA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3467687868', 'Sunt culpa sit esse', NULL, NULL, 'Pendaftaran', NULL, '2024-11-04 03:03:19', '2024-11-04 03:03:19'),
(8, 19, '2024-TKTQ-2-0002', NULL, NULL, 'TKTQ-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345678344', 'Ducimus culpa corru', NULL, NULL, 'Pendaftaran', NULL, '2024-11-04 04:04:19', '2024-11-04 04:04:19'),
(9, 20, '2024-MA-0004', NULL, NULL, 'MA', 'Aperiam est eius ali', 'Laki-laki', 'Doloribus officia et', '2024-10-31', '11', 'Harum quisquam illum', 'Ducimus quos labori', '6565657566', '6565657567', 'Veniam qui vel repe', 'Blanditiis velit ut', 'Accusamus ipsum lor', 'Selesai', 3, '2024-11-04 04:42:54', '2024-11-04 04:50:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_orang_tuas`
--

CREATE TABLE `data_orang_tuas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `nama_ayah` varchar(255) DEFAULT NULL,
  `pendidikan_ayah` enum('SD','SMP','SMA/SMK','S1','S2','S3') DEFAULT NULL,
  `telp_ayah` varchar(255) DEFAULT NULL,
  `pekerjaan_ayah` enum('Wiraswasta','Wirausaha','ASN','Buruh') DEFAULT NULL,
  `penghasilan_ayah` bigint(20) DEFAULT NULL,
  `alamat_ayah` varchar(255) DEFAULT NULL,
  `nama_ibu` varchar(255) DEFAULT NULL,
  `pendidikan_ibu` enum('SD','SMP','SMA/SMK','S1','S2','S3') DEFAULT NULL,
  `telp_ibu` varchar(255) DEFAULT NULL,
  `pekerjaan_ibu` enum('Ibu Rumah Tangga','Wiraswasta','Wirausaha','ASN','Buruh') DEFAULT NULL,
  `penghasilan_ibu` bigint(20) DEFAULT NULL,
  `alamat_ibu` varchar(255) DEFAULT NULL,
  `nama_wali` varchar(255) DEFAULT NULL,
  `telp_wali` varchar(255) DEFAULT NULL,
  `alamat_wali` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_orang_tuas`
--

INSERT INTO `data_orang_tuas` (`id`, `user_id`, `nama_ayah`, `pendidikan_ayah`, `telp_ayah`, `pekerjaan_ayah`, `penghasilan_ayah`, `alamat_ayah`, `nama_ibu`, `pendidikan_ibu`, `telp_ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `alamat_ibu`, `nama_wali`, `telp_wali`, `alamat_wali`, `created_at`, `updated_at`) VALUES
(1, 12, 'Esse sint eu culpa', 'SMA/SMK', '55', 'Wiraswasta', 89, 'Esse sint eu culpa', 'Aperiam omnis occaec', 'SD', '95', 'Wiraswasta', 40, 'Aperiam omnis occaec', 'Voluptatem explicab', '85', 'Amet quam assumenda', '2024-11-02 21:35:54', '2024-11-02 21:36:01'),
(2, 14, 'Blanditiis adipisci', 'SMP', '24', 'ASN', 87, 'Blanditiis adipisci', 'Odit itaque deserunt', 'SMA/SMK', '54', 'ASN', 44, 'Odit itaque deserunt', 'Voluptate occaecat u', '89', 'Deleniti ad id bland', '2024-11-02 22:17:04', '2024-11-02 22:17:13'),
(3, 15, 'Sunt incidunt labor', 'SMA/SMK', '19', 'Wiraswasta', 81, 'Sunt incidunt labor', 'Quaerat obcaecati ea', 'S1', '94', 'Wirausaha', 71, 'Quaerat obcaecati ea', 'Eveniet temporibus', '28', 'In minima fugiat re', '2024-11-02 22:18:20', '2024-11-02 22:18:27'),
(4, 10, 'Quis libero minus ea', 'SMA/SMK', '123456788999', 'Buruh', 29, 'Quis libero minus ea', 'Aut aut corporis tem', 'SMP', '98765432110', 'Buruh', 95, 'Aut aut corporis tem', NULL, NULL, NULL, '2024-11-04 03:29:56', '2024-11-04 03:34:12'),
(5, 20, 'Beatae velit nemo qu', 'SMA/SMK', '1435664432', 'Buruh', 15, 'Beatae velit nemo qu', 'Ut nihil dolore repe', 'SD', '3965436775', 'Buruh', 70, 'Ut nihil dolore repe', NULL, NULL, NULL, '2024-11-04 04:47:13', '2024-11-04 04:47:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `acara` datetime NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `footers`
--

CREATE TABLE `footers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `telp` varchar(255) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `image_sliders`
--

CREATE TABLE `image_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `urutan` int(11) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `info_daftar_ulang`
--

CREATE TABLE `info_daftar_ulang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenjang` enum('TKTQ','TKTQ-2','SD-IT','SD-IT-2','SMP-IT','SMA-IT','MA') DEFAULT NULL,
  `waktu_tgl` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_berakhir` time DEFAULT NULL,
  `lokasi_laki_laki` varchar(255) DEFAULT NULL,
  `lokasi_perempuan` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `info_daftar_ulang`
--

INSERT INTO `info_daftar_ulang` (`id`, `jenjang`, `waktu_tgl`, `jam_mulai`, `jam_berakhir`, `lokasi_laki_laki`, `lokasi_perempuan`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'TKTQ', NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-02 20:51:17', '2024-11-02 20:51:17'),
(2, 'TKTQ-2', NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-02 20:51:17', '2024-11-02 20:51:17'),
(3, 'SD-IT', NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-02 20:51:18', '2024-11-02 20:51:18'),
(4, 'SD-IT-2', NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-02 20:51:18', '2024-11-02 20:51:18'),
(5, 'SMP-IT', NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-02 20:51:18', '2024-11-02 20:51:18'),
(6, 'SMA-IT', NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-02 20:51:19', '2024-11-02 20:51:19'),
(7, 'MA', '2024-12-06', '03:55:00', '03:55:00', 'Gedung Laki-laki', 'Gedung Perempuan', 'Jangan lupa mencetak dan bawa surat kelulusan', '2024-11-02 20:51:19', '2024-11-02 20:56:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `info_tes_ujian`
--

CREATE TABLE `info_tes_ujian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenjang` enum('TKTQ','TKTQ-2','SD-IT','SD-IT-2','SMP-IT','SMA-IT','MA') DEFAULT NULL,
  `waktu_tgl` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_berakhir` time DEFAULT NULL,
  `lokasi_laki_laki` varchar(255) DEFAULT NULL,
  `lokasi_perempuan` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `info_tes_ujian`
--

INSERT INTO `info_tes_ujian` (`id`, `jenjang`, `waktu_tgl`, `jam_mulai`, `jam_berakhir`, `lokasi_laki_laki`, `lokasi_perempuan`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'TKTQ', '2024-12-07', '05:20:00', '05:20:00', 'Gedung Laki-laki', 'Gedung Perempuan', 'Tes', '2024-11-02 20:44:40', '2024-11-02 22:20:17'),
(2, 'TKTQ-2', '2024-12-07', '05:20:00', '05:20:00', 'Gedung Laki-laki', 'Gedung Perempuan', 'Tes', '2024-11-02 20:44:41', '2024-11-02 22:20:33'),
(3, 'SD-IT', NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-02 20:44:41', '2024-11-02 20:44:41'),
(4, 'SD-IT-2', NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-02 20:44:41', '2024-11-02 20:44:41'),
(5, 'SMP-IT', NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-02 20:44:42', '2024-11-02 20:44:42'),
(6, 'SMA-IT', NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-02 20:44:42', '2024-11-02 20:44:42'),
(7, 'MA', '2024-12-06', '03:53:00', '03:53:00', 'Gedung Laki-laki', 'Gedung Perempuan', 'Jangan lupa mencetak dan bawa kartu ujian', '2024-11-02 20:44:42', '2024-11-02 20:54:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_beritas`
--

CREATE TABLE `kategori_beritas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_08_08_100000_create_banks_tables', 1),
(6, '2022_03_23_040838_create_image_sliders_table', 1),
(7, '2022_03_23_052723_add_field_to_image_sliders_table', 1),
(8, '2022_03_23_065335_create_abouts_table', 1),
(9, '2022_03_23_074809_create_videos_table', 1),
(10, '2022_03_24_075737_create_kategori_beritas_table', 1),
(11, '2022_03_24_075900_create_beritas_table', 1),
(12, '2022_03_24_105758_create_events_table', 1),
(13, '2022_03_24_201826_add_field_to_events_table', 1),
(14, '2022_03_24_204322_create_footers_table', 1),
(15, '2022_03_25_102915_create_permission_tables', 1),
(16, '2022_03_27_074151_create_users_details_table', 1),
(17, '2022_03_27_094236_create_data_murids_table', 1),
(18, '2022_03_28_154339_create_profile_sekolahs_table', 1),
(19, '2022_03_28_161701_create_visimisis_table', 1),
(20, '2022_03_30_084531_create_data_orang_tuas_table', 1),
(21, '2022_03_30_172737_add_value_role_in_users_table', 1),
(22, '2022_03_30_194727_add_value_role_in_users_details_table', 1),
(23, '2022_04_01_190600_add_field_to_data_murids', 1),
(24, '2022_04_01_191038_create_berkas_murids_table', 1),
(25, '2022_07_16_094123_create_bank_accounts_table', 1),
(26, '2022_07_29_072220_add_column_account_name_in_bank_accounts_table', 1),
(27, '2022_08_01_080614_create_settings_table', 1),
(28, '2023_11_18_090206_add_field_jenjang_in_data_murid_table', 1),
(29, '2023_11_18_091359_create_payment_registrations_table', 1),
(30, '2023_11_20_081957_add_value_role_terverifikasi_in_users_table', 1),
(31, '2023_11_20_082430_add_value_role_terverifikasi_in_users_details_table', 1),
(32, '2023_11_22_085045_add_value_role_lulus_tidak_lulus_in_users_table', 1),
(33, '2023_11_22_085344_add_value_role_lulus_tidak_lulus_in_users_details_table', 1),
(34, '2023_12_10_162327_create_info_tes_ujian_table', 1),
(35, '2023_12_10_173505_create_info_daftar_ulang_table', 1),
(36, '2023_12_11_164117_create_periode_registrasi_table', 1),
(37, '2024_10_17_234408_create_angkets_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 11),
(3, 'App\\Models\\User', 13),
(3, 'App\\Models\\User', 18),
(3, 'App\\Models\\User', 19),
(4, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 7),
(4, 'App\\Models\\User', 8),
(4, 'App\\Models\\User', 9),
(5, 'App\\Models\\User', 14),
(5, 'App\\Models\\User', 15),
(6, 'App\\Models\\User', 10),
(6, 'App\\Models\\User', 12),
(7, 'App\\Models\\User', 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment_registrations`
--

CREATE TABLE `payment_registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `jenjang` varchar(255) NOT NULL,
  `sender` varchar(255) DEFAULT NULL,
  `destination_bank` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `approve_date` varchar(255) DEFAULT NULL,
  `approved_by` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` varchar(255) NOT NULL,
  `status` enum('Paid','Unpaid') NOT NULL DEFAULT 'Unpaid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `payment_registrations`
--

INSERT INTO `payment_registrations` (`id`, `user_id`, `jenjang`, `sender`, `destination_bank`, `file`, `approve_date`, `approved_by`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 10, 'MA', 'Duis doloremque exer', 'Bank Muamalat', '1730581751_bart.jpg', '2024-11-03 04:17:35', 3, '350000', 'Paid', '2024-11-02 21:08:47', '2024-11-02 21:17:35'),
(2, 11, 'SMA-IT', 'Ex fugit in sint eo', 'Bank Muamalat', '1730581797_404 Wallpaper 46659 1920x1200 px HDWallSourcecom.jpg', '2024-11-03 15:13:09', 7, '350000', 'Paid', '2024-11-02 21:09:40', '2024-11-03 08:13:09'),
(3, 12, 'MA', 'Omnis in consequatur', 'Bank Muamalat', '1730582641_7Ci0mYz-mercedes-benz-slr-mclaren-wallpaper.jpg', '2024-11-03 04:25:47', 3, '350000', 'Paid', '2024-11-02 21:22:28', '2024-11-02 21:25:47'),
(4, 13, 'SMA-IT', 'Provident amet ame', 'Bank Muamalat', '1730582592_404 Wallpaper 46659 1920x1200 px HDWallSourcecom.jpg', '2024-11-03 15:13:19', 7, '350000', 'Paid', '2024-11-02 21:22:52', '2024-11-03 08:13:19'),
(5, 14, 'TKTQ', 'Vel temporibus cupid', 'Bank Muamalat', '1730585580_7Ci0mYz-mercedes-benz-slr-mclaren-wallpaper.jpg', '2024-11-03 05:16:00', 9, '150000', 'Paid', '2024-11-03 09:03:19', '2024-11-02 22:16:00'),
(6, 15, 'TKTQ-2', 'Eu eveniet quo laud', 'Bank Muamalat', '1730585441_404 Wallpaper 46659 1920x1200 px HDWallSourcecom.jpg', '2024-11-03 05:16:29', 9, '150000', 'Paid', '2024-11-03 09:03:29', '2024-11-02 22:16:29'),
(7, 18, 'MA', NULL, NULL, NULL, NULL, NULL, '350000', 'Unpaid', '2024-11-04 03:03:19', '2024-11-04 03:03:19'),
(8, 19, 'TKTQ-2', NULL, NULL, NULL, NULL, NULL, '150000', 'Unpaid', '2024-11-04 04:04:19', '2024-11-04 04:04:19'),
(9, 20, 'MA', 'Zeus Gilbert', 'Bank Muamalat', '1730695418_carpixel.net-2021-porsche-911-gt3-103317-hd.jpg', '2024-11-04 11:46:04', 3, '350000', 'Paid', '2024-11-04 04:42:54', '2024-11-04 04:46:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `periode_registrasi`
--

CREATE TABLE `periode_registrasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenjang` enum('TKTQ','TKTQ-2','SD-IT','SD-IT-2','SMP-IT','SMA-IT','MA') DEFAULT NULL,
  `tgl_buka` date DEFAULT NULL,
  `tgl_tutup` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `periode_registrasi`
--

INSERT INTO `periode_registrasi` (`id`, `jenjang`, `tgl_buka`, `tgl_tutup`, `created_at`, `updated_at`) VALUES
(1, 'TKTQ', '2024-11-01', '2024-11-30', '2024-11-02 20:09:57', '2024-11-03 09:02:55'),
(2, 'TKTQ-2', '2024-11-01', '2024-11-30', '2024-11-02 20:09:57', '2024-11-03 09:03:02'),
(3, 'SD-IT', NULL, NULL, '2024-11-02 20:09:57', '2024-11-02 20:09:57'),
(4, 'SD-IT-2', NULL, NULL, '2024-11-02 20:09:58', '2024-11-02 20:09:58'),
(5, 'SMP-IT', NULL, NULL, '2024-11-02 20:09:58', '2024-11-02 20:09:58'),
(6, 'SMA-IT', '2024-11-01', '2024-11-30', '2024-11-02 20:09:58', '2024-11-02 20:22:44'),
(7, 'MA', '2024-11-01', '2024-11-30', '2024-11-02 20:09:58', '2024-11-02 20:24:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile_sekolahs`
--

CREATE TABLE `profile_sekolahs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2024-11-02 19:34:45', '2024-11-02 19:34:45'),
(2, 'Murid', 'web', '2024-11-02 19:34:45', '2024-11-02 19:34:45'),
(3, 'Guest', 'web', '2024-11-02 19:34:45', '2024-11-02 19:34:45'),
(4, 'PPDB', 'web', '2024-11-02 19:34:45', '2024-11-02 19:34:45'),
(5, 'Terverifikasi', 'web', '2024-11-02 19:34:46', '2024-11-02 19:34:46'),
(6, 'Lulus', 'web', '2024-11-02 19:34:46', '2024-11-02 19:34:46'),
(7, 'Tidak Lulus', 'web', '2024-11-02 19:34:46', '2024-11-02 19:34:46'),
(8, 'Bendahara', 'web', '2024-11-02 19:34:47', '2024-11-02 19:34:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `isEmail` tinyint(1) NOT NULL DEFAULT 0,
  `email` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`id`, `isEmail`, `email`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 0, NULL, 1, '2024-11-02 19:34:48', '2024-11-02 19:34:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('Admin','Murid','Guest','PPDB','Terverifikasi','Lulus','Tidak Lulus') DEFAULT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `foto_profile` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `role`, `status`, `foto_profile`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Superadmin', 'superadmin', 'superadmin@gmail.com', 'Admin', 'Aktif', NULL, NULL, '$2y$10$WErD6k5Ss7OY4MXrQL2FL.tS6I8KPBpf0fRqPBTmirGFfoRCiPYM.', NULL, '2024-11-02 19:34:46', '2024-11-02 19:34:46'),
(3, 'Guinevere Potts', 'guinevere4201', 'nady@mailinator.com', 'PPDB', 'Aktif', '1730577036_DSCF1266-removebg-preview.jpg', NULL, '$2y$10$GSilaEjGOTMH7V0PRsq.0unEV7/HI60XzUOYu6Yr5Z4eoxuBwwsuW', NULL, '2024-11-02 19:50:36', '2024-11-02 19:50:36'),
(7, 'Ferris Parks', 'ferris3554', 'gufeqygoqe@mailinator.com', 'PPDB', 'Aktif', '1730577658_fidel.jpg', NULL, '$2y$10$I09T.hxOUl7xmfk47H.N1O.V0qyFxPDjPUzTSU.a2XwLkD6tk1qHu', NULL, '2024-11-02 20:00:58', '2024-11-02 20:00:58'),
(8, 'Admin PPDB SD-IT', 'admin8426', 'ppdbsdit@gmail.com', 'PPDB', 'Aktif', '1730579267_DSCF1266-removebg-preview.jpg', NULL, '$2y$10$VVtm8riUCWz7YoJCfCK6RuP749oe7IYDdkk3zGaeAVfq/78IzbTJy', NULL, '2024-11-02 20:27:48', '2024-11-02 20:27:48'),
(9, 'Admin PPDB TKTQ', 'admin7016', 'ppdbtktq@gmail.com', 'PPDB', 'Aktif', '1730579294_fidel.jpg', NULL, '$2y$10$vVm2k5CKPhJgkZK2aNKPmef1.OIkkv0eIl7eLnxMGhx41Vsz06Sv2', NULL, '2024-11-02 20:28:14', '2024-11-02 20:28:14'),
(10, 'Pamela Francis', 'pamela6530', 'higygixol@mailinator.com', 'Lulus', 'Aktif', NULL, NULL, '$2y$10$ZPxk2bayhJSay1/AGP6mhO5lVbWPhzoeZf2tsLeW.exTxA9pkEH9m', NULL, '2024-11-02 21:08:47', '2024-11-04 03:47:12'),
(11, 'Blaze Romero', 'blaze857', 'senojefi@mailinator.com', 'Guest', 'Aktif', NULL, NULL, '$2y$10$yonJxAjzD88fPLoJUQUrhe8UZ.XUUiVJKpB1H5wCL0SxXYQ9pFo3a', NULL, '2024-11-02 21:09:40', '2024-11-02 21:09:40'),
(12, 'Ursula Reid', 'ursula2305', 'titisy@mailinator.com', 'Lulus', 'Aktif', NULL, NULL, '$2y$10$ROCkML2HliGzoMr4Vmgw1OrTr1Z2h1nRZkc4rpx9lsHOMPSk1lI9m', NULL, '2024-11-02 21:22:28', '2024-11-02 21:41:43'),
(13, 'Jelani Griffin', 'jelani6978', 'jawigiva@mailinator.com', 'Guest', 'Aktif', NULL, NULL, '$2y$10$57as9JkdS1YaSpXomB2eDuGRrJTUCBofWo2AxgJi9lTUE1fgcemLe', NULL, '2024-11-02 21:22:52', '2024-11-02 21:22:52'),
(14, 'Owen Glenn', 'owen520', 'pytucixox@mailinator.com', 'Terverifikasi', 'Aktif', NULL, NULL, '$2y$10$mRFCQIfHAFBx4QWMwTG1F.qQ..V52qHMnHIyCr4StST2f9/UcLVUu', NULL, '2024-11-03 09:03:19', '2024-11-02 22:19:20'),
(15, 'Karyn Workman', 'karyn3472', 'quxucejitu@mailinator.com', 'Terverifikasi', 'Aktif', NULL, NULL, '$2y$10$uMq0sWniCi0LI/QXjpIgqu/9Ql83QCPYWSVW7NckEnN3l8qC0qZCW', NULL, '2024-11-03 09:03:29', '2024-11-02 22:19:38'),
(18, 'Kiara Ochoa', 'kiara4809', 'mexaba@mailinator.com', 'Guest', 'Aktif', NULL, NULL, '$2y$10$NZT8qsqWVf88q59NYg8x5egCl1bbCZCHUegXYYaMethLEwzCypqBG', NULL, '2024-11-04 03:03:19', '2024-11-04 03:03:19'),
(19, 'Rahim Ruiz', 'rahim9842', 'mizenul@mailinator.com', 'Guest', 'Aktif', NULL, NULL, '$2y$10$RRTywQKZLgorSz8MglYLhuqbv19PnMYTSy3rIMsqNcDAlNnTyO82C', NULL, '2024-11-04 04:04:19', '2024-11-04 04:28:55'),
(20, 'Zeus Gilbert', 'zeus4846', 'tiby@mailinator.com', 'Tidak Lulus', 'Aktif', NULL, NULL, '$2y$10$4RX72qa0gYTac75eG5gbnO36zlkCZg4er8Hj82xs6snOy3.PvfTFK', NULL, '2024-11-04 04:42:53', '2024-11-04 04:50:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_details`
--

CREATE TABLE `users_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` enum('Admin','Murid','Guest','PPDB','Terverifikasi','Lulus','Tidak Lulus') DEFAULT NULL,
  `nip` bigint(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pj_jenjang` enum('TKTQ','SD-IT','SMP-IT','SMA-IT','MA') NOT NULL,
  `linkidln` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users_details`
--

INSERT INTO `users_details` (`id`, `user_id`, `role`, `nip`, `email`, `pj_jenjang`, `linkidln`, `instagram`, `twitter`, `facebook`, `youtube`, `website`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 3, 'PPDB', 39, 'nady@mailinator.com', 'MA', NULL, 'Tempore et consecte', 'Adipisicing sint ab', 'Ea rerum sint illo n', 'Id possimus tempore', 'https://www.cedesiboj.me', '0', '2024-11-02 19:50:36', '2024-11-02 22:38:38'),
(2, 7, 'PPDB', 18, 'gufeqygoqe@mailinator.com', 'SMA-IT', NULL, 'Esse elit in molli', 'Qui quia velit id te', 'Quis officia eum ver', 'Impedit dolore culp', 'https://www.dihyxe.mobi', '0', '2024-11-02 20:00:58', '2024-11-02 20:00:58'),
(3, 8, 'PPDB', 72818, 'ppdbsdit@gmail.com', 'SD-IT', NULL, 'IBS Ash-Shiddiiqi Jambi', 'IBS Ash-Shiddiiqi Jambi', 'IBS Ash-Shiddiiqi Jambi', 'IBS Ash-Shiddiiqi Jambi', NULL, '0', '2024-11-02 20:27:48', '2024-11-02 20:27:48'),
(4, 9, 'PPDB', 72818, 'ppdbtktq@gmail.com', 'TKTQ', NULL, 'IBS Ash-Shiddiiqi Jambi', 'IBS Ash-Shiddiiqi Jambi', 'IBS Ash-Shiddiiqi Jambi', 'IBS Ash-Shiddiiqi Jambi', NULL, '0', '2024-11-02 20:28:14', '2024-11-02 20:28:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `visimisis`
--

CREATE TABLE `visimisis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `angkets`
--
ALTER TABLE `angkets`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `angket_answers`
--
ALTER TABLE `angket_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `angket_answers_angket_response_id_foreign` (`angket_response_id`),
  ADD KEY `angket_answers_angket_id_foreign` (`angket_id`);

--
-- Indeks untuk tabel `angket_responses`
--
ALTER TABLE `angket_responses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `angket_responses_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_accounts_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `beritas_title_unique` (`title`);

--
-- Indeks untuk tabel `berkas_murids`
--
ALTER TABLE `berkas_murids`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_murids`
--
ALTER TABLE `data_murids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_murids_approved_by_foreign` (`approved_by`);

--
-- Indeks untuk tabel `data_orang_tuas`
--
ALTER TABLE `data_orang_tuas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `events_title_unique` (`title`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `footers`
--
ALTER TABLE `footers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `image_sliders`
--
ALTER TABLE `image_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `info_daftar_ulang`
--
ALTER TABLE `info_daftar_ulang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `info_tes_ujian`
--
ALTER TABLE `info_tes_ujian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_beritas`
--
ALTER TABLE `kategori_beritas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kategori_beritas_nama_unique` (`nama`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `payment_registrations`
--
ALTER TABLE `payment_registrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_registrations_approved_by_foreign` (`approved_by`);

--
-- Indeks untuk tabel `periode_registrasi`
--
ALTER TABLE `periode_registrasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `profile_sekolahs`
--
ALTER TABLE `profile_sekolahs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `settings_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `users_details`
--
ALTER TABLE `users_details`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `visimisis`
--
ALTER TABLE `visimisis`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `angkets`
--
ALTER TABLE `angkets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `angket_answers`
--
ALTER TABLE `angket_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `angket_responses`
--
ALTER TABLE `angket_responses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT untuk tabel `bank_accounts`
--
ALTER TABLE `bank_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `beritas`
--
ALTER TABLE `beritas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `berkas_murids`
--
ALTER TABLE `berkas_murids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `data_murids`
--
ALTER TABLE `data_murids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `data_orang_tuas`
--
ALTER TABLE `data_orang_tuas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `footers`
--
ALTER TABLE `footers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `image_sliders`
--
ALTER TABLE `image_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `info_daftar_ulang`
--
ALTER TABLE `info_daftar_ulang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `info_tes_ujian`
--
ALTER TABLE `info_tes_ujian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kategori_beritas`
--
ALTER TABLE `kategori_beritas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `payment_registrations`
--
ALTER TABLE `payment_registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `periode_registrasi`
--
ALTER TABLE `periode_registrasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `profile_sekolahs`
--
ALTER TABLE `profile_sekolahs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `users_details`
--
ALTER TABLE `users_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `visimisis`
--
ALTER TABLE `visimisis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `angket_answers`
--
ALTER TABLE `angket_answers`
  ADD CONSTRAINT `angket_answers_angket_id_foreign` FOREIGN KEY (`angket_id`) REFERENCES `angkets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `angket_answers_angket_response_id_foreign` FOREIGN KEY (`angket_response_id`) REFERENCES `angket_responses` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `angket_responses`
--
ALTER TABLE `angket_responses`
  ADD CONSTRAINT `angket_responses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD CONSTRAINT `bank_accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_murids`
--
ALTER TABLE `data_murids`
  ADD CONSTRAINT `data_murids_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `payment_registrations`
--
ALTER TABLE `payment_registrations`
  ADD CONSTRAINT `payment_registrations_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD CONSTRAINT `settings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
