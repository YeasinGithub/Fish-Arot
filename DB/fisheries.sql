-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2021 at 11:20 AM
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
  `mohajon_id` bigint(20) UNSIGNED NOT NULL,
  `mohajon_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `fish_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kg_gram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate_per_kg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_taka` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_kg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chalans`
--

INSERT INTO `chalans` (`id`, `mohajon_id`, `mohajon_address`, `date`, `fish_name`, `kg_gram`, `rate_per_kg`, `total_taka`, `total_kg`, `last_total`, `created_at`, `updated_at`) VALUES
(1, 1, 'মাগুরা', '2021-07-15 15:06:00', 'ঈলিশ', '20', '500', '10000', '28', '12400', '2021-07-14 03:09:33', '2021-07-14 03:09:33'),
(2, 1, 'মাগুরা', '2021-07-15 15:06:00', 'রুই', '8', '300', '2400', '28', '12400', '2021-07-14 03:09:33', '2021-07-14 03:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `chalan_bads`
--

CREATE TABLE `chalan_bads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mondir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `komition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `khajna` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nagad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `koheli` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `somity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gari_bara` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `line_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parking` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `haolat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kuli` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `baje_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tity_didy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amanot` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chalan_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `khoros_bad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chalan_bads`
--

INSERT INTO `chalan_bads` (`id`, `mondir`, `komition`, `khajna`, `nagad`, `koheli`, `somity`, `gari_bara`, `line_cost`, `parking`, `haolat`, `ice`, `kuli`, `baje_cost`, `tity_didy`, `amanot`, `duty`, `total`, `chalan_total`, `khoros_bad`, `created_at`, `updated_at`) VALUES
(1, '5', '5', '8', '8', '7', '7', '7', '7', '5', '5', '9', '9', '9', '9', '9', '9', '118', '12400', '12282', '2021-07-14 03:10:40', '2021-07-14 03:10:40'),
(2, '111', '333', '333', '33', '44', '44', '55', '55', '66', '6', '67', '77', '7', '7', '88', '99', '1425', '12400', '10975', '2021-07-14 03:13:06', '2021-07-14 03:13:06');

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
(1, 'রাফি', 'বুগুড়া', '2021-07-14 15:04:00', 'বুধবার', '0193599990', 500.00, 400.00, 100.00, '2021-07-14 03:04:51', '2021-07-14 03:04:51'),
(2, 'Habib', 'কবিরহাট', '2021-07-15 15:05:00', 'বৃহস্পতিবার', '01830860371', 552.50, 200.00, 352.50, '2021-07-14 03:06:08', '2021-07-14 03:06:08');

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
(1, 1, 'ঢাকা', 200.00, 840.50, 1040.50, 400.00, 640.50, '2021-07-14 03:00:27', '2021-07-14 03:00:27'),
(2, 2, 'মহাখালী', 100.00, 520.00, 620.00, 400.00, 220.00, '2021-07-14 03:00:47', '2021-07-14 03:00:47');

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
(1, 'Yeasin', '01712444733', '2021-07-14', 600.00, 32.00, 568.00, '2021-07-14 03:14:06', '2021-07-14 03:14:06'),
(2, 'Habib', '01712444733', '2021-07-15', 500.00, 777.00, 291.00, '2021-07-14 03:14:25', '2021-07-14 03:14:25');

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
(1, 'Azad', '01830260372', '2021-07-14', 600.00, 32.00, 568.00, '2021-07-14 03:14:56', '2021-07-14 03:14:56'),
(2, 'Yeasin', '01830260372', '2021-07-07', 500.00, NULL, 1068.00, '2021-07-14 03:15:10', '2021-07-14 03:15:10');

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
(52, '2021_01_03_062842_create_chalan_bads_table', 1),
(300, '2014_10_12_000000_create_users_table', 2),
(301, '2014_10_12_100000_create_password_resets_table', 2),
(302, '2019_08_19_000000_create_failed_jobs_table', 2),
(303, '2021_01_03_061030_create_sells_table', 2),
(304, '2021_01_03_061306_create_paikars_table', 2),
(305, '2021_01_03_061335_create_mohajons_table', 2),
(306, '2021_01_03_061507_create_due_tables_table', 2),
(307, '2021_01_03_062443_create_mohajon_chalans_table', 2),
(308, '2021_02_13_083126_create_dadon_khatas_table', 2),
(309, '2021_02_14_053919_create_credit_debits_table', 2),
(310, '2021_02_14_064425_create_total_cashes_table', 2),
(311, '2021_03_05_140300_create_nagadsells_table', 2),
(312, '2021_03_05_152057_create_sell_reports_table', 2),
(313, '2021_04_11_130921_create_loan_givens_table', 2),
(314, '2021_04_26_154923_create_chalans_table', 2),
(315, '2021_04_26_162346_create_chalan_bads_table', 2),
(316, '2021_04_29_083505_create_loan_takes_table', 2);

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
(1, 'সুজন', 'মাগুরা', 1, '2021-07-14 02:56:38', '2021-07-14 02:56:38'),
(2, 'সিকদার', 'রাজশাহী', 1, '2021-07-14 02:57:40', '2021-07-14 02:57:40');

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
(1, 1, 'মাগুরা', 1, 'ঢাকা', 10.00, 20.00, 200.00, 220.00, NULL, NULL);

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
(1, 'করিম', 'ঢাকা', 1, '2021-07-14 02:58:20', '2021-07-14 02:58:20'),
(2, 'মাসুম', 'মহাখালী', 1, '2021-07-14 02:59:05', '2021-07-14 02:59:05');

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
(1, 1, 'মাগুরা', 1, 'ঢাকা', 10.25, 80.00, 820.00, 840.50, '2021-07-14 02:59:27', '2021-07-14 02:59:27'),
(2, 2, 'রাজশাহী', 2, 'মহাখালী', 10.00, 50.00, 500.00, 520.00, '2021-07-14 03:00:10', '2021-07-14 03:00:10');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chalan_bads`
--
ALTER TABLE `chalan_bads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_givens`
--
ALTER TABLE `loan_givens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loan_takes`
--
ALTER TABLE `loan_takes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=317;

--
-- AUTO_INCREMENT for table `mohajons`
--
ALTER TABLE `mohajons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mohajon_chalans`
--
ALTER TABLE `mohajon_chalans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nagadsells`
--
ALTER TABLE `nagadsells`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
