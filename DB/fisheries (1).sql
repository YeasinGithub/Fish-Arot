-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2021 at 11:11 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fisheries`
--

-- --------------------------------------------------------

--
-- Table structure for table `chalans`
--

CREATE TABLE `chalans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chalan_bads`
--

CREATE TABLE `chalan_bads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `credit_debits`
--

CREATE TABLE `credit_debits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dadon_khatas`
--

CREATE TABLE `dadon_khatas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` double(8,2) NOT NULL,
  `paid` double(8,2) DEFAULT NULL,
  `last_total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dadon_khatas`
--

INSERT INTO `dadon_khatas` (`id`, `name`, `address`, `date`, `day`, `mobile`, `total_amount`, `paid`, `last_total`, `created_at`, `updated_at`) VALUES
(1, 'Yeasin', 'test', '2021-04-26 13:00:00', 'সোমবার', '01830860371', 552.50, 400.55, 151.95, '2021-04-26 01:00:29', '2021-04-26 01:00:29'),
(2, 'Habib', 'test', '2021-04-30 15:40:00', 'শুক্রবার', '01830860371', 500.00, 400.00, 100.00, '2021-04-30 03:41:24', '2021-04-30 03:41:24');

-- --------------------------------------------------------

--
-- Table structure for table `due_tables`
--

CREATE TABLE `due_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paiker_id` bigint(20) UNSIGNED NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `due_amount_today` double(8,2) NOT NULL,
  `hal` double(8,2) NOT NULL,
  `total` double(8,2) NOT NULL,
  `paid` double(8,2) NOT NULL,
  `total_due` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `due_tables`
--

INSERT INTO `due_tables` (`id`, `paiker_id`, `address`, `due_amount_today`, `hal`, `total`, `paid`, `total_due`, `created_at`, `updated_at`) VALUES
(1, 1, 'lokkhipur.', 200.00, 840.50, 1040.50, 400.00, 640.50, '2021-04-26 00:54:31', '2021-04-26 00:54:31'),
(2, 1, 'lokkhipur.', 100.40, 840.50, 940.90, 400.55, 540.35, '2021-04-26 00:57:15', '2021-04-26 00:57:55'),
(3, 2, 'Chittagonj', 1000.00, 8020.00, 9020.00, 4000.00, 5020.00, '2021-04-30 03:40:28', '2021-04-30 03:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `loan_givens`
--

CREATE TABLE `loan_givens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `loan_amount` double(8,2) NOT NULL,
  `paid` double(8,2) DEFAULT NULL,
  `due` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loan_givens`
--

INSERT INTO `loan_givens` (`id`, `name`, `phone`, `date`, `loan_amount`, `paid`, `due`, `created_at`, `updated_at`) VALUES
(1, 'Yeasin', '01830860371', '2021-04-19', 600.00, NULL, 600.00, '2021-04-25 23:29:03', '2021-04-25 23:29:03'),
(2, 'Yeasin', '01712444733', '2021-04-27', 500.00, 800.00, -300.00, '2021-04-25 23:40:14', '2021-04-25 23:40:14'),
(3, 'Yeasin', '01830860371', '2021-04-27', 500.00, 800.00, 300.00, '2021-04-25 23:40:55', '2021-04-25 23:40:55'),
(4, 'Yeasin', '01830860371', '2021-04-21', 600.00, NULL, 900.00, '2021-04-26 02:23:46', '2021-04-26 02:23:46'),
(5, 'Yeasin', '01712444733', '2021-04-29', 600.00, 200.00, 100.00, '2021-04-29 04:06:49', '2021-04-29 04:06:49');

-- --------------------------------------------------------

--
-- Table structure for table `loan_takes`
--

CREATE TABLE `loan_takes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `loan_amount` double(8,2) NOT NULL,
  `paid` double(8,2) DEFAULT NULL,
  `due` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loan_takes`
--

INSERT INTO `loan_takes` (`id`, `name`, `phone`, `date`, `loan_amount`, `paid`, `due`, `created_at`, `updated_at`) VALUES
(1, 'Hasans', '01830260372', '2021-04-29', 600.00, 800.00, -200.00, '2021-04-29 02:51:56', '2021-04-29 02:51:56'),
(2, 'Habib', '012256665545', '2021-04-29', 600.00, 14.00, 586.00, '2021-04-29 02:54:05', '2021-04-29 02:54:05'),
(3, 'Yeasin', '01636', '2021-04-29', 500.00, 14.00, 486.00, '2021-04-29 03:05:16', '2021-04-29 03:05:16'),
(4, 'Azad Update', '01935972646', '2021-04-14', 6000.00, 800.00, 5200.00, '2021-04-29 04:02:47', '2021-04-29 04:02:47'),
(5, 'Yeasin', '01636', '2021-04-29', 600.00, 86.00, 1000.00, '2021-04-29 04:09:22', '2021-04-29 04:09:22');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(44, '2014_10_12_000000_create_users_table', 1),
(45, '2014_10_12_100000_create_password_resets_table', 1),
(46, '2019_08_19_000000_create_failed_jobs_table', 1),
(47, '2021_01_03_061030_create_sells_table', 1),
(48, '2021_01_03_061306_create_paikars_table', 1),
(49, '2021_01_03_061335_create_mohajons_table', 1),
(50, '2021_01_03_061507_create_due_tables_table', 1),
(51, '2021_01_03_062443_create_mohajon_chalans_table', 1),
(52, '2021_01_03_062842_create_chalan_bads_table', 1),
(53, '2021_02_13_083126_create_dadon_khatas_table', 1),
(54, '2021_02_14_053919_create_credit_debits_table', 1),
(55, '2021_02_14_064425_create_total_cashes_table', 1),
(56, '2021_03_05_140300_create_nagadsells_table', 1),
(57, '2021_03_05_152057_create_sell_reports_table', 1),
(58, '2021_04_11_130921_create_loan_givens_table', 1),
(59, '2021_04_26_154923_create_chalans_table', 2),
(60, '2021_04_26_162346_create_chalan_bads_table', 3),
(61, '2021_04_29_083505_create_loan_takes_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `mohajons`
--

CREATE TABLE `mohajons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mohajon_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mohajons`
--

INSERT INTO `mohajons` (`id`, `mohajon_name`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Yeasin Update', 'jatrabari', 1, '2021-04-26 00:47:24', '2021-04-26 00:47:39'),
(2, 'Azads', 'dolpur', 1, '2021-04-26 01:08:00', '2021-04-30 03:38:07'),
(3, 'Jamal', 'jamal pur', 1, '2021-04-29 03:58:45', '2021-04-29 03:58:45');

-- --------------------------------------------------------

--
-- Table structure for table `mohajon_chalans`
--

CREATE TABLE `mohajon_chalans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adrress` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fish_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` double(8,2) NOT NULL,
  `total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nagadsells`
--

CREATE TABLE `nagadsells` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mohajon_id` bigint(20) UNSIGNED NOT NULL,
  `mohajon_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `paikar_id` bigint(20) UNSIGNED NOT NULL,
  `paikar_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fish_weight` double(8,2) NOT NULL,
  `price_per_kg` double(8,2) NOT NULL,
  `total` double(8,2) NOT NULL,
  `arot_total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nagadsells`
--

INSERT INTO `nagadsells` (`id`, `mohajon_id`, `mohajon_address`, `paikar_id`, `paikar_address`, `fish_weight`, `price_per_kg`, `total`, `arot_total`, `created_at`, `updated_at`) VALUES
(1, 2, 'dolpur', 1, 'lokkhipur.', 11.00, 11.00, 121.00, 143.00, NULL, '2021-05-02 02:54:40'),
(2, 2, 'dolpur', 1, 'lokkhipur.', 10.00, 80.00, 800.00, 820.00, NULL, NULL),
(3, 2, 'dolpur', 1, 'lokkhipur.', 10.00, 80.00, 800.00, 820.00, NULL, NULL),
(4, 1, 'jatrabari', 1, 'lokkhipur.', 5.00, 20.00, 100.00, 110.00, NULL, NULL),
(5, 1, 'jatrabari', 1, 'lokkhipur.', 7.00, 6.00, 42.00, 56.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `paikars`
--

CREATE TABLE `paikars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paikar_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paikars`
--

INSERT INTO `paikars` (`id`, `paikar_name`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sojol', 'lokkhipur.', 1, '2021-04-26 00:48:16', '2021-04-26 00:48:25'),
(2, 'Alam', 'Chittagonj', 1, '2021-04-30 03:39:07', '2021-04-30 03:39:07');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sells`
--

CREATE TABLE `sells` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mohajon_id` bigint(20) UNSIGNED NOT NULL,
  `mohajon_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `paikar_id` bigint(20) UNSIGNED NOT NULL,
  `paikar_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fish_weight` double(8,2) NOT NULL,
  `price_per_kg` double(8,2) NOT NULL,
  `total` double(8,2) NOT NULL,
  `arot_total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sells`
--

INSERT INTO `sells` (`id`, `mohajon_id`, `mohajon_address`, `paikar_id`, `paikar_address`, `fish_weight`, `price_per_kg`, `total`, `arot_total`, `created_at`, `updated_at`) VALUES
(2, 3, 'jamal pur', 2, 'Chittagonj', 3.00, 5.00, 15.00, 21.00, '2021-04-30 03:39:59', '2021-05-02 02:52:13');

-- --------------------------------------------------------

--
-- Table structure for table `sell_reports`
--

CREATE TABLE `sell_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mohajon_id` bigint(20) UNSIGNED NOT NULL,
  `mohajon_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `paikar_id` bigint(20) UNSIGNED NOT NULL,
  `paikar_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fish_weight` double(8,2) NOT NULL,
  `price_per_kg` double(8,2) NOT NULL,
  `total` double(8,2) NOT NULL,
  `arot_total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `total_cashes`
--

CREATE TABLE `total_cashes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chalans`
--
ALTER TABLE `chalans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chalan_bads`
--
ALTER TABLE `chalan_bads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credit_debits`
--
ALTER TABLE `credit_debits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dadon_khatas`
--
ALTER TABLE `dadon_khatas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `due_tables`
--
ALTER TABLE `due_tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `loan_givens`
--
ALTER TABLE `loan_givens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_takes`
--
ALTER TABLE `loan_takes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mohajons`
--
ALTER TABLE `mohajons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mohajon_chalans`
--
ALTER TABLE `mohajon_chalans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nagadsells`
--
ALTER TABLE `nagadsells`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paikars`
--
ALTER TABLE `paikars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `sells`
--
ALTER TABLE `sells`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sell_reports`
--
ALTER TABLE `sell_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_cashes`
--
ALTER TABLE `total_cashes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chalans`
--
ALTER TABLE `chalans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chalan_bads`
--
ALTER TABLE `chalan_bads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `credit_debits`
--
ALTER TABLE `credit_debits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dadon_khatas`
--
ALTER TABLE `dadon_khatas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `due_tables`
--
ALTER TABLE `due_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_givens`
--
ALTER TABLE `loan_givens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `loan_takes`
--
ALTER TABLE `loan_takes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `mohajons`
--
ALTER TABLE `mohajons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mohajon_chalans`
--
ALTER TABLE `mohajon_chalans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nagadsells`
--
ALTER TABLE `nagadsells`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `paikars`
--
ALTER TABLE `paikars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sells`
--
ALTER TABLE `sells`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sell_reports`
--
ALTER TABLE `sell_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `total_cashes`
--
ALTER TABLE `total_cashes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
