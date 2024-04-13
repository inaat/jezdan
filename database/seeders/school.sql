-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 12, 2024 at 02:36 PM
-- Server version: 10.6.17-MariaDB-cll-lve
-- PHP Version: 8.1.27
SET foreign_key_checks = 0;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sfscvjeo_school_jezdan`
--

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `system_settings_id`, `campus_id`, `default_campus_account`, `name`, `account_number`, `account_type_id`, `note`, `created_by`, `is_closed`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Fee Cash Drawer', '58666', 0, NULL, 1, 0, NULL, '2022-01-01 11:23:45', '2023-05-19 15:50:59'),
(2, 1, 1, 0, 'Other Fee Collection', '022', 0, NULL, 1, 0, NULL, '2023-01-18 08:36:45', '2023-05-22 22:33:21'),
(3, 1, 1, 0, 'Transport Cash Drawer', '0000', 0, NULL, 1, 0, NULL, '2023-01-19 07:24:50', '2023-05-19 15:50:36'),
(4, 1, 1, 0, 'Ubl', '2555', 0, NULL, 1, 1, NULL, '2023-01-31 07:14:07', '2023-05-19 15:41:01'),
(6, 1, 1, 0, 'Bank Khyber', '292', 0, 'Intial Balance', 1, 0, NULL, '2023-02-09 09:42:31', '2023-02-09 09:42:31'),
(7, 1, NULL, 0, 'Bank Alfalah', '0155', 0, NULL, 250, 0, NULL, '2023-05-19 15:49:39', '2023-05-19 15:49:39'),
(9, 1, NULL, 0, 'BASIT ALI KHAN', '02', 9, NULL, 545, 1, NULL, '2023-10-19 12:31:45', '2023-10-31 14:40:12'),
(10, 1, NULL, 0, 'IHSAN ULLAH KHAN', '01', 10, NULL, 533, 0, NULL, '2023-10-23 20:13:24', '2023-10-31 14:41:48'),
(11, 1, NULL, 0, 'BASIT ALI KHAN', '02', 10, NULL, 533, 0, NULL, '2023-10-31 14:46:18', '2023-10-31 14:46:18'),
(12, 1, NULL, 0, 'Student Chairs Small', '11', 6, NULL, 533, 0, NULL, '2023-10-31 14:47:50', '2023-10-31 14:47:50');

--
-- Dumping data for table `account_types`
--

INSERT INTO `account_types` (`id`, `name`, `parent_account_type_id`, `system_settings_id`, `created_at`, `updated_at`) VALUES
(5, 'Expense', NULL, 1, '2021-10-18 16:23:47', '2023-10-19 12:33:23'),
(6, 'Assets', NULL, 1, '2021-12-21 07:02:09', '2023-10-31 14:39:18'),
(7, 'Cash', 6, 1, '2021-12-21 07:02:28', '2021-12-21 07:02:28'),
(8, 'IHSAN ULLAH KHAN', 8, 1, '2023-10-23 20:11:15', '2023-10-31 14:40:19'),
(10, 'OWNER\'S EQUITY', NULL, 1, '2023-10-31 14:41:19', '2023-10-31 14:41:19');

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `class_id`, `campus_id`, `class_section_id`, `subject_id`, `teacher_id`, `name`, `instructions`, `due_date`, `points`, `resubmission`, `extra_days_for_resubmission`, `session_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 2, 162, NULL, 'hello', 'Hhhh', '2023-10-21 19:29:00', 2, 1, 0, 7, '2023-10-21 23:29:51', '2023-10-21 23:29:51', NULL),
(2, 1, 1, 2, 162, NULL, 'yggg', 'Gggg', '2023-10-21 23:35:00', 6, 1, 0, 7, '2023-10-22 03:35:56', '2023-10-22 03:35:56', NULL),
(3, 1, 1, 2, 162, NULL, 'tggg', 'Fhbffb', '2023-10-22 00:02:00', 66, 1, 0, 7, '2023-10-22 04:02:14', '2023-10-22 04:02:14', NULL),
(4, 1, 1, 2, 162, NULL, 'bhh', 'Hhhh', '2023-10-22 00:42:00', 3, 1, 0, 7, '2023-10-22 04:42:12', '2023-10-22 04:42:12', NULL),
(5, 12, 1, 20, 136, NULL, 'Test', 'You should  thoroughly prepare 1st ten questions of chapter No 1 for the test.', '2023-10-31 08:30:00', 10, 1, 0, 7, '2023-10-30 16:12:42', '2023-10-30 16:12:42', NULL);

--
-- Dumping data for table `barcodes`
--

INSERT INTO `barcodes` (`id`, `name`, `description`, `width`, `height`, `paper_width`, `paper_height`, `top_margin`, `left_margin`, `row_distance`, `col_distance`, `stickers_in_one_row`, `is_default`, `is_continuous`, `stickers_in_one_sheet`, `business_id`, `created_at`, `updated_at`) VALUES
(7, 'Gatsby', NULL, 31.0000, 24.0000, 70.6000, 28.0000, 0.0000, 1.0000, 0.0000, 5.0000, 2, 1, 0, 2147483647, 1, '2020-12-10 13:51:35', '2020-12-13 15:16:33');

--
-- Dumping data for table `campuses`
--

INSERT INTO `campuses` (`id`, `campus_name`, `mobile`, `phone`, `email`, `address`, `registration_code`, `registration_date`, `system_settings_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Main/Girls Section', '03404099910', '03404099910', NULL, 'ppp', '58666', '2023-01-01', 1, 1, '2022-01-01 11:23:45', '2023-09-24 18:02:20');

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `description`, `system_settings_id`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Sibling', 'Sibling', 1, 1, NULL, '2022-01-19 10:02:37', '2023-09-24 17:58:59'),
(2, 'Free Orphan', 'Free Orphan', 1, 1, NULL, '2022-01-19 10:03:10', '2022-01-19 10:03:10'),
(3, 'Free (Teacher Child)', 'Free (Teacher Child)', 1, 1, NULL, '2022-01-19 10:03:34', '2023-09-24 17:58:30'),
(4, 'Normal Tuition Fee', 'Normal Tuition Fee', 1, 1, NULL, '2022-01-19 10:04:54', '2022-01-19 10:04:54'),
(5, 'Scholarship Student', 'FEE Variation', 1, 1, NULL, '2023-09-15 14:35:20', '2023-09-15 14:35:49');

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `country_id`, `province_id`, `district_id`, `system_settings_id`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Khwaza Khela', 91, 1, 1, 1, 1, NULL, '2021-10-23 19:20:48', '2021-10-23 19:37:07'),
(2, 'Matta', 91, 1, 1, 1, 1, NULL, '2021-10-23 19:22:29', '2021-10-23 19:22:29'),
(3, 'Mingora', 91, 1, 1, 1, 1, NULL, '2021-10-23 19:23:33', '2021-10-23 19:23:33'),
(4, '111', 91, 1, 1, 1, 1, NULL, NULL, NULL),
(5, 'Charbagh', 91, 1, 1, 1, 1, NULL, '2022-01-10 06:45:39', '2022-01-10 06:45:39'),
(6, 'Kabal', 91, 1, 1, 1, 1, NULL, '2023-01-31 06:25:07', '2023-01-31 06:25:07'),
(7, 'Abbottabad', 91, 1, 2, 1, 533, NULL, '2023-09-25 13:40:15', '2023-09-25 13:40:15'),
(8, 'Lahore', 91, 2, 3, 1, 533, NULL, '2023-10-04 14:39:19', '2023-10-04 14:39:19');

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `title`, `tuition_fee`, `admission_fee`, `transport_fee`, `security_fee`, `prospectus_fee`, `system_settings_id`, `campus_id`, `class_level_id`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1st', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 1, 1, 1, 1, NULL, '2024-02-02 18:47:35', '2024-02-02 18:47:35');

--
-- Dumping data for table `class_levels`
--

INSERT INTO `class_levels` (`id`, `title`, `description`, `system_settings_id`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Primary', NULL, 1, 1, NULL, '2024-02-02 18:46:50', '2024-02-02 18:46:50');

--
-- Dumping data for table `class_sections`
--

INSERT INTO `class_sections` (`id`, `section_name`, `class_id`, `system_settings_id`, `campus_id`, `teacher_id`, `whatsapp_group_name`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'A', 1, 1, 1, 1, NULL, 1, NULL, '2024-03-26 06:07:55', '2024-03-26 06:07:55');

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `country`, `currency`, `code`, `short_name`, `symbol`, `thousand_separator`, `decimal_separator`, `created_at`, `updated_at`) VALUES
(1, 'Albania', 'Leke', 'ALL', NULL, 'Lek', ',', '.', NULL, NULL),
(2, 'America', 'Dollars', 'USD', NULL, '$', ',', '.', NULL, NULL),
(3, 'Afghanistan', 'Afghanis', 'AF', NULL, '؋', ',', '.', NULL, NULL),
(4, 'Argentina', 'Pesos', 'ARS', NULL, '$', ',', '.', NULL, NULL),
(5, 'Aruba', 'Guilders', 'AWG', NULL, 'ƒ', ',', '.', NULL, NULL),
(6, 'Australia', 'Dollars', 'AUD', NULL, '$', ',', '.', NULL, NULL),
(7, 'Azerbaijan', 'New Manats', 'AZ', NULL, 'ман', ',', '.', NULL, NULL),
(8, 'Bahamas', 'Dollars', 'BSD', NULL, '$', ',', '.', NULL, NULL),
(9, 'Barbados', 'Dollars', 'BBD', NULL, '$', ',', '.', NULL, NULL),
(10, 'Belarus', 'Rubles', 'BYR', NULL, 'p.', ',', '.', NULL, NULL),
(11, 'Belgium', 'Euro', 'EUR', NULL, '€', ',', '.', NULL, NULL),
(12, 'Beliz', 'Dollars', 'BZD', NULL, 'BZ$', ',', '.', NULL, NULL),
(13, 'Bermuda', 'Dollars', 'BMD', NULL, '$', ',', '.', NULL, NULL),
(14, 'Bolivia', 'Bolivianos', 'BOB', NULL, '$b', ',', '.', NULL, NULL),
(15, 'Bosnia and Herzegovina', 'Convertible Marka', 'BAM', NULL, 'KM', ',', '.', NULL, NULL),
(16, 'Botswana', 'Pula\'s', 'BWP', NULL, 'P', ',', '.', NULL, NULL),
(17, 'Bulgaria', 'Leva', 'BG', NULL, 'лв', ',', '.', NULL, NULL),
(18, 'Brazil', 'Reais', 'BRL', NULL, 'R$', ',', '.', NULL, NULL),
(19, 'Britain [United Kingdom]', 'Pounds', 'GBP', NULL, '£', ',', '.', NULL, NULL),
(20, 'Brunei Darussalam', 'Dollars', 'BND', NULL, '$', ',', '.', NULL, NULL),
(21, 'Cambodia', 'Riels', 'KHR', NULL, '៛', ',', '.', NULL, NULL),
(22, 'Canada', 'Dollars', 'CAD', NULL, '$', ',', '.', NULL, NULL),
(23, 'Cayman Islands', 'Dollars', 'KYD', NULL, '$', ',', '.', NULL, NULL),
(24, 'Chile', 'Pesos', 'CLP', NULL, '$', ',', '.', NULL, NULL),
(25, 'China', 'Yuan Renminbi', 'CNY', NULL, '¥', ',', '.', NULL, NULL),
(26, 'Colombia', 'Pesos', 'COP', NULL, '$', ',', '.', NULL, NULL),
(27, 'Costa Rica', 'Colón', 'CRC', NULL, '₡', ',', '.', NULL, NULL),
(28, 'Croatia', 'Kuna', 'HRK', NULL, 'kn', ',', '.', NULL, NULL),
(29, 'Cuba', 'Pesos', 'CUP', NULL, '₱', ',', '.', NULL, NULL),
(30, 'Cyprus', 'Euro', 'EUR', NULL, '€', '.', ',', NULL, NULL),
(31, 'Czech Republic', 'Koruny', 'CZK', NULL, 'Kč', ',', '.', NULL, NULL),
(32, 'Denmark', 'Kroner', 'DKK', NULL, 'kr', ',', '.', NULL, NULL),
(33, 'Dominican Republic', 'Pesos', 'DOP ', NULL, 'RD$', ',', '.', NULL, NULL),
(34, 'East Caribbean', 'Dollars', 'XCD', NULL, '$', ',', '.', NULL, NULL),
(35, 'Egypt', 'Pounds', 'EGP', NULL, '£', ',', '.', NULL, NULL),
(36, 'El Salvador', 'Colones', 'SVC', NULL, '$', ',', '.', NULL, NULL),
(37, 'England [United Kingdom]', 'Pounds', 'GBP', NULL, '£', ',', '.', NULL, NULL),
(38, 'Euro', 'Euro', 'EUR', NULL, '€', '.', ',', NULL, NULL),
(39, 'Falkland Islands', 'Pounds', 'FKP', NULL, '£', ',', '.', NULL, NULL),
(40, 'Fiji', 'Dollars', 'FJD', NULL, '$', ',', '.', NULL, NULL),
(41, 'France', 'Euro', 'EUR', NULL, '€', '.', ',', NULL, NULL),
(42, 'Ghana', 'Cedis', 'GHS', NULL, '¢', ',', '.', NULL, NULL),
(43, 'Gibraltar', 'Pounds', 'GIP', NULL, '£', ',', '.', NULL, NULL),
(44, 'Greece', 'Euro', 'EUR', NULL, '€', '.', ',', NULL, NULL),
(45, 'Guatemala', 'Quetzales', 'GTQ', NULL, 'Q', ',', '.', NULL, NULL),
(46, 'Guernsey', 'Pounds', 'GGP', NULL, '£', ',', '.', NULL, NULL),
(47, 'Guyana', 'Dollars', 'GYD', NULL, '$', ',', '.', NULL, NULL),
(48, 'Holland [Netherlands]', 'Euro', 'EUR', NULL, '€', '.', ',', NULL, NULL),
(49, 'Honduras', 'Lempiras', 'HNL', NULL, 'L', ',', '.', NULL, NULL),
(50, 'Hong Kong', 'Dollars', 'HKD', NULL, '$', ',', '.', NULL, NULL),
(51, 'Hungary', 'Forint', 'HUF', NULL, 'Ft', ',', '.', NULL, NULL),
(52, 'Iceland', 'Kronur', 'ISK', NULL, 'kr', ',', '.', NULL, NULL),
(53, 'India', 'Rupees', 'INR', NULL, '₹', ',', '.', NULL, NULL),
(54, 'Indonesia', 'Rupiahs', 'IDR', NULL, 'Rp', ',', '.', NULL, NULL),
(55, 'Iran', 'Rials', 'IRR', NULL, '﷼', ',', '.', NULL, NULL),
(56, 'Ireland', 'Euro', 'EUR', NULL, '€', '.', ',', NULL, NULL),
(57, 'Isle of Man', 'Pounds', 'IMP', NULL, '£', ',', '.', NULL, NULL),
(58, 'Israel', 'New Shekels', 'ILS', NULL, '₪', ',', '.', NULL, NULL),
(59, 'Italy', 'Euro', 'EUR', NULL, '€', '.', ',', NULL, NULL),
(60, 'Jamaica', 'Dollars', 'JMD', NULL, 'J$', ',', '.', NULL, NULL),
(61, 'Japan', 'Yen', 'JPY', NULL, '¥', ',', '.', NULL, NULL),
(62, 'Jersey', 'Pounds', 'JEP', NULL, '£', ',', '.', NULL, NULL),
(63, 'Kazakhstan', 'Tenge', 'KZT', NULL, 'лв', ',', '.', NULL, NULL),
(64, 'Korea [North]', 'Won', 'KPW', NULL, '₩', ',', '.', NULL, NULL),
(65, 'Korea [South]', 'Won', 'KRW', NULL, '₩', ',', '.', NULL, NULL),
(66, 'Kyrgyzstan', 'Soms', 'KGS', NULL, 'лв', ',', '.', NULL, NULL),
(67, 'Laos', 'Kips', 'LAK', NULL, '₭', ',', '.', NULL, NULL),
(68, 'Latvia', 'Lati', 'LVL', NULL, 'Ls', ',', '.', NULL, NULL),
(69, 'Lebanon', 'Pounds', 'LBP', NULL, '£', ',', '.', NULL, NULL),
(70, 'Liberia', 'Dollars', 'LRD', NULL, '$', ',', '.', NULL, NULL),
(71, 'Liechtenstein', 'Switzerland Francs', 'CHF', NULL, 'CHF', ',', '.', NULL, NULL),
(72, 'Lithuania', 'Litai', 'LTL', NULL, 'Lt', ',', '.', NULL, NULL),
(73, 'Luxembourg', 'Euro', 'EUR', NULL, '€', '.', ',', NULL, NULL),
(74, 'Macedonia', 'Denars', 'MKD', NULL, 'ден', ',', '.', NULL, NULL),
(75, 'Malaysia', 'Ringgits', 'MYR', NULL, 'RM', ',', '.', NULL, NULL),
(76, 'Malta', 'Euro', 'EUR', NULL, '€', '.', ',', NULL, NULL),
(77, 'Mauritius', 'Rupees', 'MUR', NULL, '₨', ',', '.', NULL, NULL),
(78, 'Mexico', 'Pesos', 'MXN', NULL, '$', ',', '.', NULL, NULL),
(79, 'Mongolia', 'Tugriks', 'MNT', NULL, '₮', ',', '.', NULL, NULL),
(80, 'Mozambique', 'Meticais', 'MZ', NULL, 'MT', ',', '.', NULL, NULL),
(81, 'Namibia', 'Dollars', 'NAD', NULL, '$', ',', '.', NULL, NULL),
(82, 'Nepal', 'Rupees', 'NPR', NULL, '₨', ',', '.', NULL, NULL),
(83, 'Netherlands Antilles', 'Guilders', 'ANG', NULL, 'ƒ', ',', '.', NULL, NULL),
(84, 'Netherlands', 'Euro', 'EUR', NULL, '€', '.', ',', NULL, NULL),
(85, 'New Zealand', 'Dollars', 'NZD', NULL, '$', ',', '.', NULL, NULL),
(86, 'Nicaragua', 'Cordobas', 'NIO', NULL, 'C$', ',', '.', NULL, NULL),
(87, 'Nigeria', 'Nairas', 'NGN', NULL, '₦', ',', '.', NULL, NULL),
(88, 'North Korea', 'Won', 'KPW', NULL, '₩', ',', '.', NULL, NULL),
(89, 'Norway', 'Krone', 'NOK', NULL, 'kr', ',', '.', NULL, NULL),
(90, 'Oman', 'Rials', 'OMR', NULL, '﷼', ',', '.', NULL, NULL),
(91, 'Pakistan', 'Rupees', 'PKR', NULL, '₨', ',', '.', NULL, NULL),
(92, 'Panama', 'Balboa', 'PAB', NULL, 'B/.', ',', '.', NULL, NULL),
(93, 'Paraguay', 'Guarani', 'PYG', NULL, 'Gs', ',', '.', NULL, NULL),
(94, 'Peru', 'Nuevos Soles', 'PE', NULL, 'S/.', ',', '.', NULL, NULL),
(95, 'Philippines', 'Pesos', 'PHP', NULL, 'Php', ',', '.', NULL, NULL),
(96, 'Poland', 'Zlotych', 'PL', NULL, 'zł', ',', '.', NULL, NULL),
(97, 'Qatar', 'Rials', 'QAR', NULL, '﷼', ',', '.', NULL, NULL),
(98, 'Romania', 'New Lei', 'RO', NULL, 'lei', ',', '.', NULL, NULL),
(99, 'Russia', 'Rubles', 'RUB', NULL, 'руб', ',', '.', NULL, NULL),
(100, 'Saint Helena', 'Pounds', 'SHP', NULL, '£', ',', '.', NULL, NULL),
(101, 'Saudi Arabia', 'Riyals', 'SAR', NULL, '﷼', ',', '.', NULL, NULL),
(102, 'Serbia', 'Dinars', 'RSD', NULL, 'Дин.', ',', '.', NULL, NULL),
(103, 'Seychelles', 'Rupees', 'SCR', NULL, '₨', ',', '.', NULL, NULL),
(104, 'Singapore', 'Dollars', 'SGD', NULL, '$', ',', '.', NULL, NULL),
(105, 'Slovenia', 'Euro', 'EUR', NULL, '€', '.', ',', NULL, NULL),
(106, 'Solomon Islands', 'Dollars', 'SBD', NULL, '$', ',', '.', NULL, NULL),
(107, 'Somalia', 'Shillings', 'SOS', NULL, 'S', ',', '.', NULL, NULL),
(108, 'South Africa', 'Rand', 'ZAR', NULL, 'R', ',', '.', NULL, NULL),
(109, 'South Korea', 'Won', 'KRW', NULL, '₩', ',', '.', NULL, NULL),
(110, 'Spain', 'Euro', 'EUR', NULL, '€', '.', ',', NULL, NULL),
(111, 'Sri Lanka', 'Rupees', 'LKR', NULL, '₨', ',', '.', NULL, NULL),
(112, 'Sweden', 'Kronor', 'SEK', NULL, 'kr', ',', '.', NULL, NULL),
(113, 'Switzerland', 'Francs', 'CHF', NULL, 'CHF', ',', '.', NULL, NULL),
(114, 'Suriname', 'Dollars', 'SRD', NULL, '$', ',', '.', NULL, NULL),
(115, 'Syria', 'Pounds', 'SYP', NULL, '£', ',', '.', NULL, NULL),
(116, 'Taiwan', 'New Dollars', 'TWD', NULL, 'NT$', ',', '.', NULL, NULL),
(117, 'Thailand', 'Baht', 'THB', NULL, '฿', ',', '.', NULL, NULL),
(118, 'Trinidad and Tobago', 'Dollars', 'TTD', NULL, 'TT$', ',', '.', NULL, NULL),
(119, 'Turkey', 'Lira', 'TRY', NULL, 'TL', ',', '.', NULL, NULL),
(120, 'Turkey', 'Liras', 'TRL', NULL, '£', ',', '.', NULL, NULL),
(121, 'Tuvalu', 'Dollars', 'TVD', NULL, '$', ',', '.', NULL, NULL),
(122, 'Ukraine', 'Hryvnia', 'UAH', NULL, '₴', ',', '.', NULL, NULL),
(123, 'United Kingdom', 'Pounds', 'GBP', NULL, '£', ',', '.', NULL, NULL),
(124, 'United States of America', 'Dollars', 'USD', NULL, '$', ',', '.', NULL, NULL),
(125, 'Uruguay', 'Pesos', 'UYU', NULL, '$U', ',', '.', NULL, NULL),
(126, 'Uzbekistan', 'Sums', 'UZS', NULL, 'лв', ',', '.', NULL, NULL),
(127, 'Vatican City', 'Euro', 'EUR', NULL, '€', '.', ',', NULL, NULL),
(128, 'Venezuela', 'Bolivares Fuertes', 'VEF', NULL, 'Bs', ',', '.', NULL, NULL),
(129, 'Vietnam', 'Dong', 'VND', NULL, '₫', ',', '.', NULL, NULL),
(130, 'Yemen', 'Rials', 'YER', NULL, '﷼', ',', '.', NULL, NULL),
(131, 'Zimbabwe', 'Zimbabwe Dollars', 'ZWD', NULL, 'Z$', ',', '.', NULL, NULL),
(132, 'Iraq', 'Iraqi dinar', 'IQD', NULL, 'د.ع', ',', '.', NULL, NULL),
(133, 'Kenya', 'Kenyan shilling', 'KES', NULL, 'KSh', ',', '.', NULL, NULL),
(134, 'Bangladesh', 'Taka', 'BDT', NULL, '৳', ',', '.', NULL, NULL),
(135, 'Algerie', 'Algerian dinar', 'DZD', NULL, 'د.ج', ' ', '.', NULL, NULL),
(136, 'United Arab Emirates', 'United Arab Emirates dirham', 'AED', NULL, 'د.إ', ',', '.', NULL, NULL),
(137, 'Uganda', 'Uganda shillings', 'UGX', NULL, 'USh', ',', '.', NULL, NULL),
(138, 'Tanzania', 'Tanzanian shilling', 'TZS', NULL, 'TSh', ',', '.', NULL, NULL),
(139, 'Angola', 'Kwanza', 'AOA', NULL, 'Kz', ',', '.', NULL, NULL),
(140, 'Kuwait', 'Kuwaiti dinar', 'KWD', NULL, 'KD', ',', '.', NULL, NULL),
(141, 'Bahrain', 'Bahraini dinar', 'BHD', NULL, 'BD', ',', '.', NULL, NULL);

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `discount_name`, `system_settings_id`, `campus_id`, `discount_type`, `discount_amount`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '100% Dis', 1, 1, 'percentage', 100.0000, 1, NULL, '2022-01-19 10:06:50', '2022-01-19 10:16:48'),
(2, 'Rs 100', 1, 1, 'fixed', 100.0000, 1, NULL, '2022-01-19 10:16:04', '2022-01-19 10:16:04');

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `country_id`, `province_id`, `system_settings_id`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Swat', 91, 1, 1, 1, NULL, '2021-10-23 18:12:16', '2021-10-23 18:12:16'),
(2, 'Abbottabad', 91, 1, 1, 533, NULL, '2023-09-25 13:39:31', '2023-09-25 13:39:31'),
(3, 'Lahore', 91, 2, 1, 533, NULL, '2023-10-04 14:38:42', '2023-10-04 14:38:42');


--
-- Dumping data for table `fee_heads`
--

INSERT INTO `fee_heads` (`id`, `description`, `campus_id`, `class_id`, `amount`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Admission', NULL, NULL, 0.0000, NULL, NULL, NULL),
(2, 'Tuition', NULL, NULL, 0.0000, NULL, NULL, NULL),
(3, 'Transport', NULL, NULL, 0.0000, NULL, NULL, NULL),
(4, 'Prospectus', NULL, NULL, 0.0000, NULL, NULL, NULL),
(5, 'Security', NULL, NULL, 0.0000, NULL, NULL, NULL),
(6, 'Others', NULL, NULL, 0.0000, NULL, NULL, NULL),
(7, 'Tuition Fee', 1, 1, 3500.0000, NULL, '2023-01-31 06:53:37', '2023-09-24 18:58:25'),
(8, 'Fine', 1, 2, 0.0000, '2023-10-29 20:38:46', '2023-01-31 06:53:37', '2023-10-29 20:38:46'),
(9, 'Fine', 1, 3, 0.0000, '2023-10-29 20:39:32', '2023-01-31 06:53:37', '2023-10-29 20:39:32'),
(10, 'Fine', 1, 4, 0.0000, '2023-10-29 20:42:32', '2023-01-31 06:53:37', '2023-10-29 20:42:32'),
(11, 'Fine', 1, 5, 0.0000, '2023-10-29 20:43:05', '2023-01-31 06:53:37', '2023-10-29 20:43:05'),
(12, 'Fine', 1, 6, 300.0000, NULL, '2023-01-31 06:53:37', '2023-10-29 20:48:45'),
(13, 'Fine', 1, 7, 0.0000, '2023-10-29 20:48:57', '2023-01-31 06:53:37', '2023-10-29 20:48:57'),
(14, 'Fine', 1, 8, 0.0000, '2023-10-29 20:49:12', '2023-01-31 06:53:37', '2023-10-29 20:49:12'),
(15, 'Fine', 1, 9, 0.0000, '2023-10-29 20:49:17', '2023-01-31 06:53:37', '2023-10-29 20:49:17'),
(16, 'Fine', 1, 10, 0.0000, '2023-10-29 20:49:23', '2023-01-31 06:53:37', '2023-10-29 20:49:23'),
(18, 'Admission Fee', 1, 1, 7000.0000, NULL, '2023-02-27 18:11:45', '2023-09-24 18:58:55'),
(19, 'Re-Admission', 1, 2, 3000.0000, '2023-10-29 20:34:28', '2023-02-27 18:11:46', '2023-10-29 20:34:28'),
(20, 'Re-Admission', 1, 3, 3000.0000, '2023-10-29 20:39:28', '2023-02-27 18:11:46', '2023-10-29 20:39:28'),
(21, 'Re-Admission', 1, 4, 3000.0000, '2023-10-29 20:41:30', '2023-02-27 18:11:46', '2023-10-29 20:41:30'),
(22, 'Re-Admission', 1, 5, 3000.0000, '2023-10-29 20:43:09', '2023-02-27 18:11:46', '2023-10-29 20:43:09'),
(23, 'Re-Admission', 1, 6, 3000.0000, '2023-10-29 20:52:14', '2023-02-27 18:11:46', '2023-10-29 20:52:14'),
(24, 'Re-Admission', 1, 7, 3000.0000, '2023-10-29 20:52:21', '2023-02-27 18:11:46', '2023-10-29 20:52:21'),
(25, 'Re-Admission', 1, 8, 3000.0000, '2023-10-29 20:52:27', '2023-02-27 18:11:47', '2023-10-29 20:52:27'),
(26, 'Re-Admission', 1, 9, 3000.0000, '2023-10-29 20:52:33', '2023-02-27 18:11:47', '2023-10-29 20:52:33'),
(27, 'Re-Admission', 1, 10, 3000.0000, '2023-10-29 20:52:37', '2023-02-27 18:11:47', '2023-10-29 20:52:37'),
(29, 'Examination Fee', 1, 1, 2000.0000, NULL, '2023-09-19 16:50:43', '2023-10-29 20:40:41'),
(30, 'Examination Fee', 1, 2, 2000.0000, NULL, '2023-09-19 16:50:43', '2023-10-29 20:34:12'),
(31, 'Examination Fee', 1, 3, 2000.0000, NULL, '2023-09-19 16:50:43', '2023-10-29 20:39:47'),
(32, 'Examination Fee', 1, 4, 2000.0000, NULL, '2023-09-19 16:50:43', '2023-10-29 20:41:52'),
(33, 'Examination Fee', 1, 5, 2000.0000, NULL, '2023-09-19 16:50:43', '2023-10-29 20:43:20'),
(34, 'Examination Fee', 1, 6, 2000.0000, NULL, '2023-09-19 16:50:43', '2023-10-29 20:53:16'),
(35, 'Examination Fee', 1, 7, 2000.0000, NULL, '2023-09-19 16:50:43', '2023-10-29 20:53:23'),
(36, 'Examination Fee', 1, 8, 2000.0000, NULL, '2023-09-19 16:50:43', '2023-10-29 20:53:30'),
(37, 'Examination Fee', 1, 9, 2000.0000, NULL, '2023-09-19 16:50:43', '2023-10-29 20:53:36'),
(38, 'Examination Fee', 1, 10, 2000.0000, NULL, '2023-09-19 16:50:43', '2023-10-29 20:53:44'),
(39, 'Examination Fee', 1, 12, 3000.0000, NULL, '2023-09-19 16:50:43', '2023-10-29 20:54:01'),
(40, 'Registration Fee', 1, 1, 2000.0000, NULL, '2023-09-24 18:50:00', '2023-10-29 20:40:49'),
(41, 'Registration Fee', 1, 2, 2000.0000, NULL, '2023-09-24 18:50:00', '2023-10-29 20:40:23'),
(42, 'Registration Fee', 1, 3, 2000.0000, NULL, '2023-09-24 18:50:00', '2023-10-29 20:39:58'),
(43, 'Registration Fee', 1, 4, 2000.0000, NULL, '2023-09-24 18:50:00', '2023-10-29 20:41:59'),
(44, 'Registration Fee', 1, 5, 2000.0000, NULL, '2023-09-24 18:50:00', '2023-10-29 20:43:29'),
(45, 'Registration Fee', 1, 6, 2000.0000, NULL, '2023-09-24 18:50:00', '2023-10-29 20:51:00'),
(46, 'Registration Fee', 1, 7, 2000.0000, NULL, '2023-09-24 18:50:00', '2023-10-29 20:51:10'),
(47, 'Registration Fee', 1, 8, 2000.0000, NULL, '2023-09-24 18:50:00', '2023-10-29 20:51:17'),
(48, 'Registration Fee', 1, 9, 2000.0000, NULL, '2023-09-24 18:50:00', '2023-10-29 20:51:24'),
(49, 'Registration Fee', 1, 10, 2000.0000, NULL, '2023-09-24 18:50:00', '2023-10-29 20:51:31'),
(50, 'Registration Fee', 1, 12, 3000.0000, NULL, '2023-09-24 18:50:00', '2023-10-29 20:51:47'),
(51, 'Admission Fee', 1, 1, 7000.0000, '2023-09-24 19:00:20', '2023-09-24 18:59:43', '2023-09-24 19:00:20'),
(52, 'Admission Fee', 1, 2, 7000.0000, NULL, '2023-09-24 18:59:43', '2023-09-24 18:59:43'),
(53, 'Admission Fee', 1, 3, 7000.0000, NULL, '2023-09-24 18:59:43', '2023-09-24 18:59:43'),
(54, 'Admission Fee', 1, 4, 7000.0000, NULL, '2023-09-24 18:59:43', '2023-09-24 18:59:43'),
(55, 'Admission Fee', 1, 5, 7000.0000, NULL, '2023-09-24 18:59:43', '2023-09-24 18:59:43'),
(56, 'Admission Fee', 1, 6, 7000.0000, NULL, '2023-09-24 18:59:43', '2023-09-24 18:59:43'),
(57, 'Admission Fee', 1, 7, 7000.0000, NULL, '2023-09-24 18:59:43', '2023-09-24 18:59:43'),
(58, 'Admission Fee', 1, 8, 7000.0000, NULL, '2023-09-24 18:59:43', '2023-09-24 18:59:43'),
(59, 'Admission Fee', 1, 9, 7000.0000, NULL, '2023-09-24 18:59:43', '2023-09-24 18:59:43'),
(60, 'Admission Fee', 1, 10, 7000.0000, NULL, '2023-09-24 18:59:43', '2023-09-24 18:59:43'),
(61, 'Admission Fee', 1, 12, 7000.0000, NULL, '2023-09-24 18:59:43', '2023-09-24 18:59:43'),
(62, 'Transportation Fee', 1, 1, 0.0000, NULL, '2023-10-02 19:23:15', '2023-10-02 19:23:15'),
(63, 'Transportation Fee', 1, 2, 0.0000, NULL, '2023-10-02 19:23:15', '2023-10-02 19:23:15'),
(64, 'Transportation Fee', 1, 3, 0.0000, NULL, '2023-10-02 19:23:15', '2023-10-02 19:23:15'),
(65, 'Transportation Fee', 1, 4, 0.0000, NULL, '2023-10-02 19:23:15', '2023-10-02 19:23:15'),
(66, 'Transportation Fee', 1, 5, 0.0000, NULL, '2023-10-02 19:23:15', '2023-10-02 19:23:15'),
(67, 'Transportation Fee', 1, 6, 0.0000, NULL, '2023-10-02 19:23:15', '2023-10-02 19:23:15'),
(68, 'Transportation Fee', 1, 7, 0.0000, NULL, '2023-10-02 19:23:15', '2023-10-02 19:23:15'),
(69, 'Transportation Fee', 1, 8, 0.0000, NULL, '2023-10-02 19:23:15', '2023-10-02 19:23:15'),
(70, 'Transportation Fee', 1, 9, 0.0000, NULL, '2023-10-02 19:23:15', '2023-10-02 19:23:15'),
(71, 'Transportation Fee', 1, 10, 0.0000, NULL, '2023-10-02 19:23:15', '2023-10-02 19:23:15'),
(72, 'Transportation Fee', 1, 12, 0.0000, NULL, '2023-10-02 19:23:15', '2023-10-02 19:23:15'),
(73, 'Admission Fee', 1, 17, 7000.0000, NULL, '2023-10-05 13:14:22', '2023-10-05 13:14:22'),
(74, 'Transportation Fee', 1, 17, 0.0000, NULL, '2023-10-05 13:14:47', '2023-10-05 13:14:47'),
(75, 'Examination Fee', 1, 17, 2000.0000, NULL, '2023-10-05 13:15:05', '2023-10-29 20:53:51'),
(76, 'Registration Fee', 1, 17, 2000.0000, NULL, '2023-10-05 13:15:29', '2023-10-29 20:51:55'),
(77, 'Tuition Fee', 1, 17, 4500.0000, NULL, '2023-10-05 13:16:03', '2023-10-05 13:16:03'),
(78, 'Hostel Fee', 1, 1, 12000.0000, NULL, '2023-10-29 20:33:08', '2023-10-29 20:33:08'),
(79, 'Hostel Fee', 1, 2, 12000.0000, NULL, '2023-10-29 20:33:08', '2023-10-29 20:33:08'),
(80, 'Hostel Fee', 1, 3, 12000.0000, NULL, '2023-10-29 20:33:08', '2023-10-29 20:33:08'),
(81, 'Hostel Fee', 1, 4, 12000.0000, NULL, '2023-10-29 20:33:08', '2023-10-29 20:33:08'),
(82, 'Hostel Fee', 1, 5, 12000.0000, NULL, '2023-10-29 20:33:08', '2023-10-29 20:33:08'),
(83, 'Hostel Fee', 1, 6, 12000.0000, NULL, '2023-10-29 20:33:08', '2023-10-29 20:33:08'),
(84, 'Hostel Fee', 1, 7, 12000.0000, NULL, '2023-10-29 20:33:08', '2023-10-29 20:33:08'),
(85, 'Hostel Fee', 1, 8, 12000.0000, NULL, '2023-10-29 20:33:08', '2023-10-29 20:33:08'),
(86, 'Hostel Fee', 1, 9, 12000.0000, NULL, '2023-10-29 20:33:08', '2023-10-29 20:33:08'),
(87, 'Hostel Fee', 1, 10, 12000.0000, NULL, '2023-10-29 20:33:08', '2023-10-29 20:33:08'),
(88, 'Hostel Fee', 1, 12, 12000.0000, NULL, '2023-10-29 20:33:08', '2023-10-29 20:33:08'),
(89, 'Hostel Fee', 1, 17, 12000.0000, NULL, '2023-10-29 20:33:08', '2023-10-29 20:33:08'),
(90, 'Security Fee', 1, 1, 10000.0000, NULL, '2023-10-29 20:33:36', '2023-10-29 20:33:36'),
(91, 'Security Fee', 1, 2, 10000.0000, NULL, '2023-10-29 20:33:36', '2023-10-29 20:33:36'),
(92, 'Security Fee', 1, 3, 10000.0000, NULL, '2023-10-29 20:33:36', '2023-10-29 20:33:36'),
(93, 'Security Fee', 1, 4, 10000.0000, NULL, '2023-10-29 20:33:36', '2023-10-29 20:33:36'),
(94, 'Security Fee', 1, 5, 10000.0000, NULL, '2023-10-29 20:33:36', '2023-10-29 20:33:36'),
(95, 'Security Fee', 1, 6, 10000.0000, NULL, '2023-10-29 20:33:36', '2023-10-29 20:33:36'),
(96, 'Security Fee', 1, 7, 10000.0000, NULL, '2023-10-29 20:33:36', '2023-10-29 20:33:36'),
(97, 'Security Fee', 1, 8, 10000.0000, NULL, '2023-10-29 20:33:36', '2023-10-29 20:33:36'),
(98, 'Security Fee', 1, 9, 10000.0000, NULL, '2023-10-29 20:33:36', '2023-10-29 20:33:36'),
(99, 'Security Fee', 1, 10, 10000.0000, NULL, '2023-10-29 20:33:36', '2023-10-29 20:33:36'),
(100, 'Security Fee', 1, 12, 10000.0000, NULL, '2023-10-29 20:33:36', '2023-10-29 20:33:36'),
(101, 'Security Fee', 1, 17, 10000.0000, NULL, '2023-10-29 20:33:36', '2023-10-29 20:33:36'),
(102, 'Tuition Fee', 1, 1, 3600.0000, '2023-10-29 20:35:33', '2023-10-29 20:35:06', '2023-10-29 20:35:33'),
(103, 'Tuition Fee', 1, 2, 3600.0000, NULL, '2023-10-29 20:35:06', '2023-10-29 20:35:06'),
(104, 'Tuition Fee', 1, 3, 3700.0000, NULL, '2023-10-29 20:35:06', '2023-10-29 20:46:51'),
(105, 'Tuition Fee', 1, 4, 3800.0000, NULL, '2023-10-29 20:35:06', '2023-10-29 20:42:22'),
(106, 'Tuition Fee', 1, 5, 3900.0000, NULL, '2023-10-29 20:35:06', '2023-10-29 20:45:54'),
(107, 'Tuition Fee', 1, 6, 4000.0000, NULL, '2023-10-29 20:35:06', '2023-10-29 20:47:02'),
(108, 'Tuition Fee', 1, 7, 4100.0000, NULL, '2023-10-29 20:35:06', '2023-10-29 20:47:14'),
(109, 'Tuition Fee', 1, 8, 4200.0000, NULL, '2023-10-29 20:35:06', '2023-10-29 20:47:23'),
(110, 'Tuition Fee', 1, 9, 4300.0000, NULL, '2023-10-29 20:35:06', '2023-10-29 20:47:32'),
(111, 'Tuition Fee', 1, 10, 4400.0000, NULL, '2023-10-29 20:35:06', '2023-10-29 20:47:41'),
(112, 'Tuition Fee', 1, 12, 6000.0000, NULL, '2023-10-29 20:35:06', '2023-10-29 20:47:54'),
(113, 'Tuition Fee', 1, 17, 3600.0000, '2023-10-29 20:46:31', '2023-10-29 20:35:06', '2023-10-29 20:46:31'),
(114, 'Fine', 1, 1, 300.0000, NULL, '2023-10-29 20:38:18', '2023-10-29 20:38:31'),
(115, 'Fine', 1, 2, 300.0000, NULL, '2023-10-29 20:38:18', '2023-10-29 20:38:54'),
(116, 'Fine', 1, 3, 300.0000, NULL, '2023-10-29 20:38:18', '2023-10-29 20:39:17'),
(117, 'Fine', 1, 4, 300.0000, NULL, '2023-10-29 20:38:18', '2023-10-29 20:42:44'),
(118, 'Fine', 1, 5, 300.0000, NULL, '2023-10-29 20:38:18', '2023-10-29 20:48:35'),
(119, 'Fine', 1, 6, 500.0000, '2023-10-29 20:48:50', '2023-10-29 20:38:18', '2023-10-29 20:48:50'),
(120, 'Fine', 1, 7, 300.0000, NULL, '2023-10-29 20:38:18', '2023-10-29 20:49:06'),
(121, 'Fine', 1, 8, 300.0000, NULL, '2023-10-29 20:38:18', '2023-10-29 20:49:33'),
(122, 'Fine', 1, 9, 300.0000, NULL, '2023-10-29 20:38:18', '2023-10-29 20:49:49'),
(123, 'Fine', 1, 10, 300.0000, NULL, '2023-10-29 20:38:18', '2023-10-29 20:50:00'),
(124, 'Fine', 1, 12, 300.0000, NULL, '2023-10-29 20:38:18', '2023-10-29 20:50:12'),
(125, 'Fine', 1, 17, 300.0000, NULL, '2023-10-29 20:38:18', '2023-10-29 20:50:25'),
(126, 'Board Enrolment', 1, 12, 900.0000, NULL, '2023-11-27 13:42:34', '2023-11-27 13:42:34'),
(127, 'Uniform Fee', 1, 1, 0.0000, NULL, '2023-12-04 17:10:02', '2023-12-04 17:10:02'),
(128, 'Uniform Fee', 1, 2, 0.0000, NULL, '2023-12-04 17:10:02', '2023-12-04 17:10:02'),
(129, 'Uniform Fee', 1, 3, 0.0000, NULL, '2023-12-04 17:10:02', '2023-12-04 17:10:02'),
(130, 'Uniform Fee', 1, 4, 0.0000, NULL, '2023-12-04 17:10:02', '2023-12-04 17:10:02'),
(131, 'Uniform Fee', 1, 5, 0.0000, NULL, '2023-12-04 17:10:02', '2023-12-04 17:10:02'),
(132, 'Uniform Fee', 1, 6, 0.0000, NULL, '2023-12-04 17:10:02', '2023-12-04 17:10:02'),
(133, 'Uniform Fee', 1, 7, 0.0000, NULL, '2023-12-04 17:10:02', '2023-12-04 17:10:02'),
(134, 'Uniform Fee', 1, 8, 0.0000, NULL, '2023-12-04 17:10:02', '2023-12-04 17:10:02'),
(135, 'Uniform Fee', 1, 9, 0.0000, NULL, '2023-12-04 17:10:02', '2023-12-04 17:10:02'),
(136, 'Uniform Fee', 1, 10, 0.0000, NULL, '2023-12-04 17:10:02', '2023-12-04 17:10:02'),
(137, 'Uniform Fee', 1, 12, 0.0000, NULL, '2023-12-04 17:10:02', '2023-12-04 17:10:02'),
(138, 'Uniform Fee', 1, 17, 0.0000, NULL, '2023-12-04 17:10:02', '2023-12-04 17:10:02'),
(139, 'Books', 1, 1, 0.0000, NULL, '2023-12-04 17:10:32', '2023-12-04 17:10:32'),
(140, 'Books', 1, 2, 0.0000, NULL, '2023-12-04 17:10:32', '2023-12-04 17:10:32'),
(141, 'Books', 1, 3, 0.0000, NULL, '2023-12-04 17:10:32', '2023-12-04 17:10:32'),
(142, 'Books', 1, 4, 0.0000, NULL, '2023-12-04 17:10:32', '2023-12-04 17:10:32'),
(143, 'Books', 1, 5, 0.0000, NULL, '2023-12-04 17:10:32', '2023-12-04 17:10:32'),
(144, 'Books', 1, 6, 0.0000, NULL, '2023-12-04 17:10:32', '2023-12-04 17:10:32'),
(145, 'Books', 1, 7, 0.0000, NULL, '2023-12-04 17:10:32', '2023-12-04 17:10:32'),
(146, 'Books', 1, 8, 0.0000, NULL, '2023-12-04 17:10:32', '2023-12-04 17:10:32'),
(147, 'Books', 1, 9, 0.0000, NULL, '2023-12-04 17:10:32', '2023-12-04 17:10:32'),
(148, 'Books', 1, 10, 0.0000, NULL, '2023-12-04 17:10:32', '2023-12-04 17:10:32'),
(149, 'Books', 1, 12, 0.0000, NULL, '2023-12-04 17:10:32', '2023-12-04 17:10:32'),
(150, 'Books', 1, 17, 0.0000, NULL, '2023-12-04 17:10:32', '2023-12-04 17:10:32'),
(151, 'Coat', 1, 1, 0.0000, NULL, '2023-12-04 17:10:50', '2023-12-04 17:10:50'),
(152, 'Coat', 1, 2, 0.0000, NULL, '2023-12-04 17:10:50', '2023-12-04 17:10:50'),
(153, 'Coat', 1, 3, 0.0000, NULL, '2023-12-04 17:10:50', '2023-12-04 17:10:50'),
(154, 'Coat', 1, 4, 0.0000, NULL, '2023-12-04 17:10:50', '2023-12-04 17:10:50'),
(155, 'Coat', 1, 5, 0.0000, NULL, '2023-12-04 17:10:50', '2023-12-04 17:10:50'),
(156, 'Coat', 1, 6, 0.0000, NULL, '2023-12-04 17:10:50', '2023-12-04 17:10:50'),
(157, 'Coat', 1, 7, 0.0000, NULL, '2023-12-04 17:10:50', '2023-12-04 17:10:50'),
(158, 'Coat', 1, 8, 0.0000, NULL, '2023-12-04 17:10:50', '2023-12-04 17:10:50'),
(159, 'Coat', 1, 9, 0.0000, NULL, '2023-12-04 17:10:50', '2023-12-04 17:10:50'),
(160, 'Coat', 1, 10, 0.0000, NULL, '2023-12-04 17:10:50', '2023-12-04 17:10:50'),
(161, 'Coat', 1, 12, 0.0000, NULL, '2023-12-04 17:10:50', '2023-12-04 17:10:50'),
(162, 'Coat', 1, 17, 0.0000, NULL, '2023-12-04 17:10:50', '2023-12-04 17:10:50');

--
-- Dumping data for table `front_about_us`
--

INSERT INTO `front_about_us` (`id`, `slug`, `status`, `title`, `home_title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'vision-missionvision-mission', 'publish', 'VISION & MISSION', 'VISION & MISSION', '<div class=\"elementor-element elementor-element-90a4212 elementor-widget elementor-widget-text-editor\" data-id=\"90a4212\" data-element_type=\"widget\" data-settings=\"{\" data-widget_type=\"text-editor.default\">\r\n<div class=\"elementor-widget-container\">Atalya Schools &amp; Colleges is committed to excellence. It promotes multicultural environment and values derived from the glorious religion of Islam that binds Pakistan and Turkey together in Muslim brotherhood. Antalya aspires to become a leading institute which educates, enlightens and develops the new generation by instilling in them an innovation-driven vision and insight. This will enable them to become responsible, disciplined citizens of integrity.</div>\r\n<div class=\"elementor-widget-container\"><hr /></div>\r\n<div class=\"elementor-widget-container\" style=\"text-align: center;\">&nbsp;</div>\r\n</div>\r\n<div class=\"elementor-element elementor-element-b2778c8 elementor-widget-divider--view-line elementor-widget elementor-widget-divider\" data-id=\"b2778c8\" data-element_type=\"widget\" data-settings=\"{\" data-widget_type=\"divider.default\">\r\n<div class=\"elementor-widget-container\">\r\n<div class=\"elementor-divider\">\r\n<section class=\"elementor-section elementor-inner-section elementor-element elementor-element-2328fb0 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementskit-parallax-multi-container animated fadeIn\" data-id=\"2328fb0\" data-element_type=\"section\" data-settings=\"{\">\r\n<div class=\"elementor-container elementor-column-gap-no\">\r\n<div class=\"elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-710e417\" data-id=\"710e417\" data-element_type=\"column\">\r\n<div class=\"elementor-widget-wrap elementor-element-populated\">\r\n<div class=\"elementor-element elementor-element-013b100 elementor-widget elementor-widget-text-editor\" data-id=\"013b100\" data-element_type=\"widget\" data-settings=\"{\" data-widget_type=\"text-editor.default\">\r\n<div class=\"elementor-widget-container\"><strong>Bilgi, Sinirsiz Bir Denizdir (Knowledge is a limitless sea)</strong></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n<div id=\"Programs\" class=\"elementor-element elementor-element-8576537 elementor-widget elementor-widget-heading\" data-id=\"8576537\" data-element_type=\"widget\" data-settings=\"{\" data-widget_type=\"heading.default\">\r\n<div class=\"elementor-widget-container\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', '1692770186_vess.jpeg', '2023-01-10 13:08:34', '2023-08-23 05:56:26'),
(2, 'asadfdgf', 'publish', 'aSADFDGF', 'SADSFG', '<p>SDASFDG</p>', '1705869442_anth-slider5.jpg', '2024-01-21 20:37:22', '2024-01-21 20:37:22');

--
-- Dumping data for table `front_counters`
--

INSERT INTO `front_counters` (`id`, `title`, `slug`, `number`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Average Class Size', 'sdfghjbn', 50, NULL, 'publish', NULL, NULL),
(3, 'Faculty', 'faculty', 75, NULL, 'publish', '2024-01-23 18:41:13', '2024-01-23 18:41:13');

--
-- Dumping data for table `front_custom_pages`
--

INSERT INTO `front_custom_pages` (`id`, `title`, `front_page_navbar_id`, `slug`, `description`, `elements`, `created_at`, `updated_at`) VALUES
(7, 'Fee Structure', 3, 'fee-structure', '<p>Fee Struc</p>', '{\"1\":{\"image\":\"1707036728_HRprefernces (1).pdf\",\"type\":\"3\",\"video_url\":null,\"date\":\"2024-02-04 13:52:08\"}}', '2024-02-04 08:51:50', '2024-02-04 08:52:08'),
(8, 'Book List', 3, 'book-list', NULL, NULL, '2024-02-04 08:53:05', '2024-02-04 08:53:05');

--
-- Dumping data for table `front_custom_page_navbars`
--

INSERT INTO `front_custom_page_navbars` (`id`, `title`, `slug`, `type`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Acedemic', 'acedemic', 'download_and_blink', 'publish', '2024-02-04 08:51:19', '2024-02-04 08:51:19');

--
-- Dumping data for table `front_events`
--

INSERT INTO `front_events` (`id`, `title`, `slug`, `description`, `status`, `images`, `from`, `to`, `created_at`, `updated_at`) VALUES
(2, 'Eid Milad Un Nabi (12th Rabi-ul-Awawal 1445 A.H', 'eid-milad-un-nabi-saw', '<p>Prophet Muhammad, also known as Muhammad ibn Abdullah or Muhammad (peace be upon him), is the central figure in Islam and the last prophet of Islam. Here is a short biography of Prophet Muhammad (SAW):</p>\r\n<p><strong>Birth and Early Life:</strong></p>\r\n<ul>\r\n<li>Prophet Muhammad was born in the city of Mecca in present-day Saudi Arabia in the year 570 CE. His full name was Muhammad ibn Abdullah.</li>\r\n<li>He was born into the influential and respected Quraysh tribe, specifically into the Hashim clan.</li>\r\n<li>Muhammad\'s father, Abdullah, passed away before his birth, and his mother, Amina, died when he was only six years old. He was subsequently raised by his grandfather, Abdul-Muttalib, and later by his uncle, Abu Talib.</li>\r\n</ul>\r\n<p><strong>Prophethood and Revelation:</strong></p>\r\n<ul>\r\n<li>At the age of 40, while meditating in the Cave of Hira near Mecca, Muhammad received his first revelation from Allah&nbsp; through the Angel Gabriel (Jibril in Arabic). This event marked the beginning of his prophethood.</li>\r\n<li>These revelations continued over a period of 23 years and were compiled into the holy book of Islam, the Quran.</li>\r\n</ul>\r\n<p><strong>Mission and Challenges:</strong></p>\r\n<ul>\r\n<li>Muhammad\'s mission was to convey the message of monotheism and the worship of one God, Allah, to the Arabian Peninsula, which was characterized by polytheism and idol worship.</li>\r\n<li>He faced opposition and persecution from the leaders of Mecca, who resisted his message and saw it as a threat to their economic and social status.</li>\r\n<li>Despite the hardships, Muhammad continued to preach the message of Islam, emphasizing compassion, justice, and moral conduct.</li>\r\n</ul>\r\n<p><strong>Migration to Medina:</strong></p>\r\n<ul>\r\n<li>In 622 CE, due to escalating persecution and threats to his life, Muhammad and his followers migrated to the city of Medina, where he was welcomed as a leader.</li>\r\n<li>In Medina, he established a diverse and inclusive community based on the principles of justice and equality.</li>\r\n</ul>\r\n<p><strong>Return to Mecca and Final Years:</strong></p>\r\n<ul>\r\n<li>After years of struggle, Muhammad and his followers eventually returned to Mecca in 630 CE. Mecca peacefully surrendered to the Muslims, and Muhammad forgave those who had opposed him.</li>\r\n<li>In the years following the conquest of Mecca, Muhammad continued to preach and consolidate the Islamic state.</li>\r\n</ul>\r\n<p><strong>Passing Away:</strong></p>\r\n<ul>\r\n<li>Prophet Muhammad passed away on June 8, 632 CE, in Medina, at the age of 63. His passing marked the end of his prophethood.</li>\r\n<li>His final sermon, delivered during his last pilgrimage to Mecca, emphasized the importance of unity, justice, and the equality of all believers.</li>\r\n</ul>\r\n<p>Prophet Muhammad\'s life and teachings continue to serve as a source of guidance, inspiration, and mercy&nbsp; over the world. His legacy includes not only the Quran but also the Hadith (recorded sayings and actions), which provide comprehensive guidance on various aspects of life, faith, and morality.</p>', 'publish', '1696062226_fd960d48-0499-43f3-b79f-015e13ff0df5.jpg', '2023-09-28', '2023-10-01', '2023-09-30 17:13:54', '2023-09-30 17:23:46');

--
-- Dumping data for table `front_gallery_categories`
--

INSERT INTO `front_gallery_categories` (`id`, `slug`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Photo', 'Photo', '2023-01-11 15:30:13', '2023-01-11 15:30:13');

--
-- Dumping data for table `front_gallery_contents`
--

INSERT INTO `front_gallery_contents` (`id`, `slug`, `thumb_image`, `category_id`, `title`, `description`, `status`, `elements`, `created_at`, `updated_at`) VALUES
(9, 'birthday-celebration-party', '1696058231_1db0874b-8ad2-420a-a342-9073596d17e1.jpg', 1, 'Birthday Celebration Party', 'Celebrating Birthday one of our students at testschool', 'publish', '{\"1\":{\"image\":\"1696233415_IMG-20230927-WA0013.jpg\",\"type\":\"1\",\"date\":\"2023-10-02 12:56:55\",\"video_url\":null},\"2\":{\"image\":\"1696233836_IMG-20230927-WA0014.jpg\",\"type\":\"1\",\"date\":\"2023-10-02 13:03:56\",\"video_url\":null},\"3\":{\"image\":\"1706030451_favicon.png\",\"type\":\"2\",\"video_url\":\"https:\\/\\/www.youtube.com\\/watch?v=Fw5ybNwwSbg&ab_channel=DavidBombal\",\"date\":\"2024-01-23 22:20:51\"}}', '2023-09-30 16:17:11', '2024-01-23 17:20:51');

--
-- Dumping data for table `front_news`
--

INSERT INTO `front_news` (`id`, `status`, `date`, `title`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(3, 'publish', '2023-09-30', '12th Rabi-ul-Awwal 1445 A.H', '12th-rabi-ul-awwal-1445-ah', '<p>It is inform you that Antalya School &amp; College Swat Campus will remain <span style=\"color: #236fa1;\"><strong>Closed on 29th September, 2023</strong></span></p>\r\n<p><span style=\"color: #236fa1;\">(<strong>Friday)</strong> <span style=\"color: #000000;\">on the occasion of&nbsp; </span><strong>Eid Milad-un-Nabi(12th Rabi-ul-Awwal 1445 A.H)</strong></span></p>', '2023-09-30 17:38:20', '2023-09-30 17:38:20');

--
-- Dumping data for table `front_notices`
--

INSERT INTO `front_notices` (`id`, `title`, `slug`, `description`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admission Open 2023', 'admission-open-2023', '<p>It is inform you that Antalya School &amp; College Swat Campus will remain <span style=\"color: #236fa1;\"><strong>Closed on 29th September, 2023</strong></span></p>\r\n<p><span style=\"color: #236fa1;\">(<strong>Friday)</strong> <span style=\"color: #000000;\">on the occasion of&nbsp; </span><strong>Eid Milad-un-Nabi(12th Rabi-ul-Awwal 1445 A.H)</strong></span></p>', 'http://127.0.0.1:8000/online-apply', 'publish', '2023-09-30 17:35:51', '2024-02-03 07:49:41');

--
-- Dumping data for table `front_settings`
--

INSERT INTO `front_settings` (`id`, `logo_image`, `school_name`, `address`, `reg_no`, `email`, `phone_no`, `linear_gradient`, `main_color`, `hover_color`, `map_url`, `facebook`, `youTube`, `instagram`, `linkedin`, `twitter`, `skype`, `facebook_embed`, `admission_open`, `admission_banner`, `page_banner`, `created_at`, `updated_at`) VALUES
(1, '1705864618_kigi-removebg-preview.png', 'Test school', 'Near', 'SW1256 / 200405017623', 'info@sirms.edu.pk', '(0946) 885133', 'linear-gradient(80deg, #85c131, #8c5f7a);', '#85c131', '#8c5f7a', 'https://maps.google.com/maps?width=700&height=440&hl=en&q=Antalya%20School%20%26%20College%20Swat%20Campus%2C%20WCVM%2BF7C%2C%20Bagh%20Deri%20Road%2C%20Sambat%20Cham%2C%20Swat%2C%20Khyber%20Pakhtunkhwa+(Title)&ie=UTF8&t=&z=10&iwloc=B&output=embed', 'https://web.facebook.com/enayat.ullah.180072', 'https://web.facebook.com/enayat.ullah.180072', 'https://web.facebook.com/enayat.ullah.180072', 'https://web.facebook.com/enayat.ullah.180072', 'https://web.facebook.com/enayat.ullah.180072', 'https://web.facebook.com/enayat.ullah.180072', '<iframe\r\n                                     name=\"f1c4ab42898d67\" width=\"1000px\" height=\"435px\"\r\n                                     data-testid=\"fb:page Facebook Social Plugin\" title=\"fb:page Facebook Social Plugin\"\r\n                                     frameborder=\"0\" allowtransparency=\"true\" allowfullscreen=\"true\" scrolling=\"no\"\r\n                                     allow=\"encrypted-media\"\r\n                                     src=\"https://web.facebook.com/v9.0/plugins/page.php?adapt_container_width=true&app_id=&channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df36e105e1db41%26domain%3Dincollege.edu.pk%26is_canvas%3Dfalse%26origin%3Dhttp%253A%252F%252Fincollege.edu.pk%252Ffb68cb4c9c4eec%26relation%3Dparent.parent&container_width=338&height=435&hide_cover=false&href=https%3A%2F%2Fwww.facebook.com%2Fsirms.edu.pk&locale=en_US&sdk=joey&show_facepile=true&small_header=false&tabs=timeline&width=\"\r\n                                     style=\"border: none; visibility: visible; width: 338px; height: 435px;\"\r\n                                     class=\"\"></iframe>', 'yes', '1707003702_424563884_777255701087713_132914646492591129_n.jpg', '1706027756_page-banner-7.jpg', NULL, '2024-02-04 08:54:02');

--
-- Dumping data for table `front_sliders`
--

INSERT INTO `front_sliders` (`id`, `status`, `title`, `description`, `slider_image`, `btn_name`, `btn_url`, `created_at`, `updated_at`) VALUES
(5, 'publish', 'Welcome', '--', '1705866257_anth-slider4.jpg', 'Antalya', NULL, '2023-02-03 04:33:37', '2024-01-21 20:14:50'),
(6, 'publish', '---', '---', '1705866524_1.jpg', NULL, NULL, '2024-01-21 19:48:44', '2024-01-21 19:48:44');

--
-- Dumping data for table `guardians`
--

INSERT INTO `guardians` (`id`, `guardian_name`, `guardian_relation`, `guardian_occupation`, `guardian_phone`, `guardian_cnic`, `guardian_email`, `guardian_address`, `guardian_image`, `created_at`, `updated_at`) VALUES
(1, 'AFTAB ALI', 'Father', '666666666', '66666666666', NULL, NULL, '666666666', NULL, '2024-03-26 06:10:33', '2024-03-26 06:10:33');

--
-- Dumping data for table `hrm_departments`
--

INSERT INTO `hrm_departments` (`id`, `department`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Teaching', 1, NULL, '2023-09-06 17:30:09', '2023-09-06 17:30:09'),
(2, 'Administration', 1, NULL, '2023-09-06 17:30:32', '2023-09-06 17:30:32'),
(3, 'Transport', 1, NULL, '2023-09-06 17:30:43', '2023-09-06 17:30:43');

--
-- Dumping data for table `hrm_designations`
--

INSERT INTO `hrm_designations` (`id`, `designation`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(21, 'Teacher', 1, NULL, '2022-01-03 04:38:29', '2022-01-03 04:38:29'),
(22, 'Watch-man', 1, NULL, '2022-01-03 04:38:29', '2022-01-03 04:38:29'),
(23, 'NAIB QASID', 1, NULL, '2022-01-03 04:38:29', '2022-01-29 08:03:08'),
(24, 'PET', 1, NULL, '2022-01-03 04:38:29', '2023-09-22 14:09:38'),
(25, 'Finance Officer', 1, NULL, '2022-01-03 04:38:29', '2023-09-22 14:10:12'),
(26, 'Director General', 1, NULL, '2022-01-03 04:38:29', '2023-09-14 16:40:25'),
(27, 'Vice Princpal', 1, NULL, '2022-01-03 04:38:29', '2022-01-03 04:38:29'),
(28, 'Principal', 1, NULL, '2022-01-03 04:38:29', '2022-01-03 04:38:29'),
(29, 'Driver', 1, NULL, '2022-01-03 04:38:29', '2022-01-03 04:38:29'),
(30, 'Deriver', 1, '2023-09-22 14:09:15', '2022-01-03 04:38:29', '2023-09-22 14:09:15'),
(31, 'Chief Proctor', 1, NULL, '2022-11-26 05:42:39', '2022-11-26 05:42:39'),
(32, 'Khala', 1, NULL, '2023-01-17 18:09:04', '2023-09-14 16:40:46'),
(33, 'Exam Resource', 189, '2023-07-24 15:35:51', '2023-07-24 15:27:20', '2023-07-24 15:35:51'),
(34, 'Section Head', 1, NULL, '2023-09-06 17:26:07', '2023-09-06 17:26:07'),
(35, 'Computer Operator', 1, NULL, '2023-09-14 16:39:25', '2023-09-14 16:39:25'),
(36, 'Office Boy', 1, NULL, '2023-09-14 16:39:47', '2023-09-14 16:39:47'),
(37, 'Frond Desk Officer', 1, NULL, '2023-09-16 16:09:03', '2023-09-16 16:16:51');

--
-- Dumping data for table `hrm_education`
--

INSERT INTO `hrm_education` (`id`, `education`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'M.Sc Botony', 1, NULL, '2022-12-19 03:53:33', '2022-12-19 03:53:33'),
(2, 'M.Sc Physics', 1, NULL, '2022-12-19 03:53:46', '2022-12-19 03:53:46'),
(3, 'M.Sc Chemistry', 1, NULL, '2022-12-19 03:54:02', '2022-12-19 03:54:02'),
(4, 'M.Sc Economics', 1, NULL, '2022-12-19 03:54:15', '2022-12-19 03:54:15'),
(5, 'M.Sc Pak Studies', 1, NULL, '2022-12-19 03:54:36', '2022-12-19 03:54:36'),
(6, 'M.A (ISLAMYAT)', 1, NULL, '2022-12-19 03:54:56', '2022-12-19 03:54:56'),
(7, 'M.A (URDU)', 1, NULL, '2022-12-19 03:55:11', '2022-12-19 03:55:11'),
(8, 'M.A (ENGLISH)', 1, NULL, '2022-12-19 03:55:32', '2022-12-19 03:55:32'),
(9, 'BS Information Technology (IT)', 1, NULL, '2023-09-06 17:33:58', '2023-09-22 14:12:38'),
(10, 'Matric', 1, NULL, '2023-09-22 14:11:41', '2023-09-22 14:11:41'),
(11, 'BS Economics', 1, NULL, '2023-09-22 14:11:56', '2023-09-22 14:11:56'),
(12, 'MBA Finance', 1, NULL, '2023-09-22 14:12:06', '2023-09-22 14:12:06'),
(13, 'F.Sc', 1, NULL, '2023-09-22 14:12:23', '2023-09-22 14:12:23'),
(14, 'Bachelor of Arts (B.A)', 533, NULL, '2023-09-24 19:12:08', '2023-09-24 19:12:08'),
(15, 'BS Zoology', 533, NULL, '2023-09-24 19:26:17', '2023-09-24 19:26:17'),
(16, 'B.Sc', 533, NULL, '2023-09-24 19:40:14', '2023-09-24 19:40:14'),
(17, 'B.Com', 533, NULL, '2023-09-25 13:46:01', '2023-09-25 13:46:01'),
(18, 'Uneducated', 533, NULL, '2023-09-25 20:48:04', '2023-09-25 20:48:04'),
(19, 'BS Urdu', 533, NULL, '2023-10-04 14:23:55', '2023-10-04 14:23:55'),
(20, 'BS English', 533, NULL, '2023-10-04 14:36:38', '2023-10-04 14:36:38'),
(21, 'BS Botony', 533, NULL, '2023-10-04 14:59:01', '2023-10-04 14:59:01'),
(22, 'BS Physics', 533, NULL, '2023-10-04 15:21:34', '2023-10-04 15:21:34'),
(23, 'DVM', 533, NULL, '2023-10-05 19:06:35', '2023-10-05 19:06:35'),
(24, 'Retired Army', 533, NULL, '2023-10-05 19:23:59', '2023-10-05 19:23:59'),
(25, 'MS Mathematics', 533, NULL, '2023-10-05 19:24:12', '2023-10-05 19:24:12'),
(26, 'BS Chemistry', 533, NULL, '2023-10-16 20:39:44', '2023-10-16 20:39:44');

--
-- Dumping data for table `hrm_employees`
--

INSERT INTO `hrm_employees` (`id`, `user_id`, `campus_id`, `employeeID`, `old_EmpID`, `first_name`, `last_name`, `email`, `password`, `gender`, `father_name`, `mobile_no`, `basic_salary`, `default_allowance`, `default_deduction`, `pay_period`, `pay_cycle`, `birth_date`, `department_id`, `designation_id`, `education_id`, `education_ids`, `joining_date`, `employee_image`, `country_id`, `province_id`, `district_id`, `city_id`, `region_id`, `current_address`, `permanent_address`, `nationality`, `mother_tongue`, `annual_leave`, `status`, `religion`, `cnic_no`, `blood_group`, `bank_details`, `resign_remark`, `remark`, `M_Status`, `last_login`, `remember_token`, `exit_date`, `reset_code`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Em-001', NULL, 'inayat', 'ullah', 'inayatullahkks@gmail.com', '$2y$10$uEdAp6rZdelZsJWlwGUBT.BFVFKVyolQ54.c9Bs.BKKUSzsKxcESK', 'male', 'MUHAMMAD HUSSAIN', '+923428927305', 0.0000, 0.0000, 0.0000, 'month', NULL, '2024-01-26', 1, 21, NULL, '[\"1\"]', '2024-01-26', 'storage/tenantsaadschool/employee_image/Em-0055.png', 91, 1, 1, 1, 2, 'Swat Khwaza Khela Pakistan', NULL, 'Pakistani', NULL, 0, 'active', 'Islam', NULL, NULL, '{\"account_name\":\"superadmin@gmail.com\",\"account_number\":null,\"bank\":null,\"bin\":null,\"branch\":null,\"tax_payer_id\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-26 18:09:30', '2024-03-26 05:24:59');

--
-- Dumping data for table `hrm_notification_templates`
--

INSERT INTO `hrm_notification_templates` (`id`, `template_for`, `email_body`, `sms_body`, `whatsapp_text`, `subject`, `cc`, `bcc`, `auto_send`, `auto_send_sms`, `auto_send_wa_notif`, `created_at`, `updated_at`) VALUES
(1, 'attendance_check_in', NULL, 'ASSALAMU ALAIKUM\r\nGood Morning And  Welcome To AIS Sir {employee_name}  /n    \r\nArrival Timing: {clock_in_time}', NULL, 'Thank you from {business_name}', NULL, NULL, 0, 1, 0, '2021-11-27 02:45:44', '2021-11-27 02:45:44'),
(2, 'attendance_check_out', NULL, '\nAllah Hafiz Sir {employee_name}  /n \nDeparture Timing: {clock_out_time}', NULL, 'Thank you from {business_name}', NULL, NULL, 0, 1, 0, '2021-11-26 21:45:44', '2021-11-26 21:45:44'),
(3, 'student_attendance_check_in', NULL, 'ASSALAMU ALAIKUM\r\nGood Morning And  Welcome To AIS Mr {student_name}  /n\r\nArrival Timing: {clock_in_time}', NULL, 'Thank you from {business_name}', NULL, NULL, 0, 1, 0, '2021-11-26 21:45:44', '2021-11-26 21:45:44'),
(4, 'student_attendance_check_out', NULL, 'Allah Hafiz Mr/Miss {student_name}  /n    \n    Departure Timing: {clock_out_time}', NULL, 'Thank you from {business_name}', NULL, NULL, 0, 1, 0, '2021-11-26 16:45:44', '2021-11-26 16:45:44'),
(5, 'shift_is_not_over', NULL, '  {org_name}/nshift_is_not_over ', NULL, 'Thank you from {business_name}', NULL, NULL, 0, 1, 0, '2021-11-26 21:45:44', '2021-11-26 21:45:44'),
(6, 'student_vacation', NULL, 'Dear Parents, /nDue to winter vacation  Swat Collegiate will remain closed from /n14-01-2022 until 26-01-2022/n (Both Days Included )/nIn Sha ALLAH School will reopen on thursday/n27th january 2022/nRegards/nPrincipal/nSwat Collegiate School/nKhwaza Khela\n', NULL, 'Thank you from {business_name}', NULL, NULL, 0, 1, 0, '2021-11-26 21:45:44', '2021-11-26 21:45:44'),
(7, 'owner_payment_received', NULL, 'Student Name : {student_name}\r\nClass : {current_class}\r\nAmount Paid: {paid_amount}\r\nDate & Time :{paid_on}\r\nOutstanding Fee: {total_due}\r\n', NULL, 'Thank you from {business_name}', NULL, NULL, 0, 1, 0, '2021-11-26 16:45:44', '2021-11-26 16:45:44'),
(8, 'fee_due_sms', NULL, 'Name: {student_name}\r\nClass: {current_class}\r\n\r\nDear parents, \r\nKindly pay the Pending  / Outstanding \r\nFee Rs: {total_due}\r\nto avoid inconvenience .\r\nThanks\r\nSchool Administration: \r\n   AIS', NULL, 'Thank you from {business_name}', NULL, NULL, 0, 1, 0, '2021-11-26 11:45:44', '2021-11-26 11:45:44'),
(9, 'student_attendance_absent_sms', NULL, 'Dear Parrents\r\nMr/Miss {student_name}  Class\r\n{current_class} is absent from school today\r\nDate: {clock_in_time}.\r\n\r\nPrincipal\r\n      AIS  \r\n', NULL, 'Thank you from {business_name}', NULL, NULL, 0, 1, 0, '2021-11-26 21:45:44', '2021-11-26 21:45:44');

--
-- Dumping data for table `hrm_shifts`
--

INSERT INTO `hrm_shifts` (`id`, `name`, `type`, `created_by`, `start_time`, `end_time`, `holidays`, `created_at`, `updated_at`) VALUES
(1, 'Morning duty', 'fixed_shift', 1, '06:00:00', '17:00:00', '[\"sunday\"]', '2022-01-05 17:03:31', '2023-01-16 07:04:15'),
(2, 'School Shift', 'fixed_shift', 1, '09:57:00', '11:00:00', '[\"sunday\"]', '2022-02-12 04:57:35', '2022-09-29 08:40:07');


-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES

(1, 'App\\Models\\User', 1);

--
-- Dumping data for table `password_resets`
--

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'session.view', 'web', '2021-10-15 00:33:35', NULL),
(2, 'session.create', 'web', '2021-10-15 00:33:35', NULL),
(3, 'session.update', 'web', '2021-10-15 00:33:35', NULL),
(4, 'session.delete', 'web', '2021-10-15 00:33:35', NULL),
(5, 'chapter.view', 'web', '2022-12-08 07:04:40', '2022-12-08 07:04:40'),
(6, 'chapter.create', 'web', '2022-12-08 07:04:40', '2022-12-08 07:04:40'),
(7, 'chapter.update', 'web', '2022-12-08 07:04:40', '2022-12-08 07:04:40'),
(8, 'chapter.delete', 'web', '2022-12-08 07:04:40', '2022-12-08 07:04:40'),
(9, 'lesson.view', 'web', '2022-12-08 07:04:40', '2022-12-08 07:04:40'),
(10, 'lesson.create', 'web', '2022-12-08 07:04:40', '2022-12-08 07:04:40'),
(11, 'lesson.update', 'web', '2022-12-08 07:04:40', '2022-12-08 07:04:40'),
(12, 'lesson.delete', 'web', '2022-12-08 07:04:40', '2022-12-08 07:04:40'),
(13, 'lesson_progress.view', 'web', '2022-12-08 07:04:40', '2022-12-08 07:04:40'),
(14, 'lesson_progress.create', 'web', '2022-12-08 07:04:40', '2022-12-08 07:04:40'),
(15, 'lesson_progress.update', 'web', '2022-12-08 07:04:40', '2022-12-08 07:04:40'),
(16, 'lesson_progress.delete', 'web', '2022-12-08 07:04:40', '2022-12-08 07:04:40'),
(17, 'question_bank.view', 'web', '2022-12-08 07:04:40', '2022-12-08 07:04:40'),
(18, 'question_bank.create', 'web', '2022-12-08 07:04:40', '2022-12-08 07:04:40'),
(19, 'question_bank.update', 'web', '2022-12-08 07:04:40', '2022-12-08 07:04:40'),
(20, 'question_bank.delete', 'web', '2022-12-08 07:04:40', '2022-12-08 07:04:40'),
(21, 'exam_mark_entry.create', 'web', '2022-12-08 07:04:41', '2022-12-08 07:04:41'),
(22, 'mark_entry_print.print', 'web', '2022-12-08 07:04:41', '2022-12-08 07:04:41'),
(23, 'employee.profile', 'web', '2022-12-21 05:56:39', '2022-12-21 05:56:39'),
(24, 'backup.view', 'web', '2023-02-25 09:34:23', '2023-02-25 09:34:23'),
(25, 'campus.view', 'web', '2023-02-25 09:34:23', '2023-02-25 09:34:23'),
(26, 'leave_applications_for_student.view', 'web', '2023-02-25 09:36:32', '2023-02-25 09:36:32'),
(27, 'roles.view', 'web', '2023-03-07 01:15:30', '2023-03-07 01:15:30'),
(28, 'roles.create', 'web', '2023-03-07 01:15:30', '2023-03-07 01:15:30'),
(29, 'backup.create', 'web', '2023-03-07 01:15:30', '2023-03-07 01:15:30'),
(30, 'campus.create', 'web', '2023-03-07 01:15:30', '2023-03-07 01:15:30'),
(31, 'class_level.view', 'web', '2023-03-07 01:15:30', '2023-03-07 01:15:30'),
(32, 'class_level.create', 'web', '2023-03-07 01:15:30', '2023-03-07 01:15:30'),
(33, 'class_level.update', 'web', '2023-03-07 01:15:30', '2023-03-07 01:15:30'),
(34, 'province.view', 'web', '2023-03-07 01:15:30', '2023-03-07 01:15:30'),
(35, 'province.create', 'web', '2023-03-07 01:15:30', '2023-03-07 01:15:30'),
(36, 'province.update', 'web', '2023-03-07 01:15:30', '2023-03-07 01:15:30'),
(37, 'district.view', 'web', '2023-03-07 01:15:30', '2023-03-07 01:15:30'),
(38, 'district.create', 'web', '2023-03-07 01:15:30', '2023-03-07 01:15:30'),
(39, 'district.update', 'web', '2023-03-07 01:15:30', '2023-03-07 01:15:30'),
(40, 'city.view', 'web', '2023-03-07 01:15:30', '2023-03-07 01:15:30'),
(41, 'city.create', 'web', '2023-03-07 01:15:30', '2023-03-07 01:15:30'),
(42, 'city.update', 'web', '2023-03-07 01:15:31', '2023-03-07 01:15:31'),
(43, 'region.view', 'web', '2023-03-07 01:15:31', '2023-03-07 01:15:31'),
(44, 'region.create', 'web', '2023-03-07 01:15:31', '2023-03-07 01:15:31'),
(45, 'region.update', 'web', '2023-03-07 01:15:31', '2023-03-07 01:15:31'),
(46, 'general_settings.view', 'web', '2023-03-07 01:15:31', '2023-03-07 01:15:31'),
(47, 'award.view', 'web', '2023-03-07 01:15:31', '2023-03-07 01:15:31'),
(48, 'award.create', 'web', '2023-03-07 01:15:31', '2023-03-07 01:15:31'),
(49, 'student.view', 'web', '2023-03-07 01:15:31', '2023-03-07 01:15:31'),
(50, 'student.create', 'web', '2023-03-07 01:15:31', '2023-03-07 01:15:31'),
(51, 'student.profile', 'web', '2023-03-07 01:15:31', '2023-03-07 01:15:31'),
(52, 'print.admission_form', 'web', '2023-03-07 01:15:31', '2023-03-07 01:15:31'),
(53, 'print.challan_print', 'web', '2023-03-07 01:15:31', '2023-03-07 01:15:31'),
(54, 'print.student_attendance_print', 'web', '2023-03-07 01:15:31', '2023-03-07 01:15:31'),
(55, 'print.employee_attendance_print', 'web', '2023-03-07 01:15:31', '2023-03-07 01:15:31'),
(56, 'print.student_card_print', 'web', '2023-03-07 01:15:31', '2023-03-07 01:15:31'),
(57, 'print.employee_card_print', 'web', '2023-03-07 01:15:31', '2023-03-07 01:15:31'),
(58, 'print.student_particular', 'web', '2023-03-07 01:15:31', '2023-03-07 01:15:31'),
(59, 'print.certificate', 'web', '2023-03-07 01:15:31', '2023-03-07 01:15:31'),
(60, 'student_category.view', 'web', '2023-03-07 01:15:31', '2023-03-07 01:15:31'),
(61, 'student_category.create', 'web', '2023-03-07 01:15:31', '2023-03-07 01:15:31'),
(62, 'withdrawal.view', 'web', '2023-03-07 01:15:31', '2023-03-07 01:15:31'),
(63, 'withdrawal.create', 'web', '2023-03-07 01:15:31', '2023-03-07 01:15:31'),
(64, 'withdrawal.print_withdrawal', 'web', '2023-03-07 01:15:31', '2023-03-07 01:15:31'),
(65, 'student_attendance.view', 'web', '2023-03-07 01:15:31', '2023-03-07 01:15:31'),
(66, 'student_attendance.create', 'web', '2023-03-07 01:15:31', '2023-03-07 01:15:31'),
(67, 'employee_attendance.view', 'web', '2023-03-07 01:15:31', '2023-03-07 01:15:31'),
(68, 'employee_attendance.create', 'web', '2023-03-07 01:15:31', '2023-03-07 01:15:31'),
(69, 'fee.fee_transaction_view', 'web', '2023-03-07 01:15:31', '2023-03-07 01:15:31'),
(70, 'fee_head.view', 'web', '2023-03-07 01:15:31', '2023-03-07 01:15:31'),
(71, 'fee_head.create', 'web', '2023-03-07 01:15:31', '2023-03-07 01:15:31'),
(72, 'class.view', 'web', '2023-03-07 01:15:31', '2023-03-07 01:15:31'),
(73, 'class.create', 'web', '2023-03-07 01:15:31', '2023-03-07 01:15:31'),
(74, 'section.view', 'web', '2023-03-07 01:15:31', '2023-03-07 01:15:31'),
(75, 'section.create', 'web', '2023-03-07 01:15:31', '2023-03-07 01:15:31'),
(76, 'subject.view', 'web', '2023-03-07 01:15:31', '2023-03-07 01:15:31'),
(77, 'subject.create', 'web', '2023-03-07 01:15:31', '2023-03-07 01:15:31'),
(78, 'assign_subject.view', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(79, 'assign_subject.create', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(80, 'syllabus.view', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(81, 'syllabus.create', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(82, 'study_period.view', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(83, 'study_period.create', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(84, 'class_routine.view', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(85, 'class_routine.create', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(86, 'manual_paper.view', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(87, 'manual_paper.create', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(88, 'roll_no_slip.print', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(89, 'exam_award_list_attendance.print', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(90, 'exam_result.print', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(91, 'certificate.issue', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(92, 'certificate.print', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(93, 'employee.view', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(94, 'employee.create', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(95, 'employee.print', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(96, 'shift.view', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(97, 'shift.create', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(98, 'department.view', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(99, 'department.create', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(100, 'designation.view', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(101, 'designation.create', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(102, 'education.view', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(103, 'education.create', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(104, 'allowance.view', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(105, 'allowance.create', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(106, 'deduction.view', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(107, 'deduction.create', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(108, 'payroll.view', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(109, 'payroll.create', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(110, 'payroll.print', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(111, 'hrm_payment.view', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(112, 'expense.view', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(113, 'expense.create', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(114, 'expense_category.view', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(115, 'expense_category.create', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(116, 'income_report.view', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(117, 'class_report.view', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(118, 'strength_report.view', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(119, 'vehicle.view', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(120, 'vehicle.create', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(121, 'note_books_status.view', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(122, 'dashboard.view', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(123, 'leave_applications_for_employee.view', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(124, 'leave_applications_for_employee.create', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(125, 'leave_applications_for_student.create', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(126, 'employee_document.view', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(127, 'employee_document.create', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(128, 'employee_document.download', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(129, 'student_document.view', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(130, 'student_document.create', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(131, 'student_document.download', 'web', '2023-03-07 01:17:58', '2023-03-07 01:17:58'),
(132, 'english.multiple_campus_access', 'web', '2023-03-07 01:37:41', '2023-03-07 01:37:41'),
(133, 'subject.update', 'web', '2023-05-21 00:40:27', '2023-05-21 00:40:27'),
(134, 'subject.delete', 'web', '2023-05-21 00:40:27', '2023-05-21 00:40:27'),
(135, 'syllabus.update', 'web', '2023-05-21 00:40:27', '2023-05-21 00:40:27'),
(136, 'syllabus.delete', 'web', '2023-05-21 00:40:27', '2023-05-21 00:40:27'),
(137, 'assign_subject.update', 'web', '2023-05-21 00:40:27', '2023-05-21 00:40:27'),
(138, 'assign_subject.delete', 'web', '2023-05-21 00:40:27', '2023-05-21 00:40:27'),
(139, 'study_period.update', 'web', '2023-05-21 00:40:27', '2023-05-21 00:40:27'),
(140, 'study_period.delete', 'web', '2023-05-21 00:40:27', '2023-05-21 00:40:27'),
(141, 'class_routine.update', 'web', '2023-05-21 00:40:27', '2023-05-21 00:40:27'),
(142, 'class_routine.delete', 'web', '2023-05-21 00:40:27', '2023-05-21 00:40:27'),
(143, 'manual_paper.update', 'web', '2023-05-21 00:40:27', '2023-05-21 00:40:27'),
(144, 'manual_paper.delete', 'web', '2023-05-21 00:40:27', '2023-05-21 00:40:27'),
(145, 'student_attendance.mark_absent_today', 'web', '2023-05-22 15:57:02', '2023-05-22 15:57:02'),
(146, 'student_attendance.qr_code_attendance', 'web', '2023-05-22 15:57:02', '2023-05-22 15:57:02'),
(147, 'student_attendance.mapping', 'web', '2023-05-22 15:57:02', '2023-05-22 15:57:02'),
(148, 'employee_attendance.mark_absent_today', 'web', '2023-05-22 15:57:02', '2023-05-22 15:57:02'),
(149, 'employee_attendance.qr_code_attendance', 'web', '2023-05-22 15:57:02', '2023-05-22 15:57:02'),
(150, 'employee_attendance.mapping', 'web', '2023-05-22 15:57:02', '2023-05-22 15:57:02'),
(151, 'fee.add_fee_payment', 'web', '2023-05-22 15:57:02', '2023-05-22 15:57:02'),
(152, 'fee.fee_transaction_create', 'web', '2023-05-22 15:57:02', '2023-05-22 15:57:02'),
(153, 'fee.fee_transaction_delete', 'web', '2023-05-22 15:57:02', '2023-05-22 15:57:02'),
(154, 'fee.fee_payment_view', 'web', '2023-05-22 15:57:02', '2023-05-22 15:57:02'),
(155, 'fee.fee_payment_delete', 'web', '2023-05-22 15:57:02', '2023-05-22 15:57:02'),
(156, 'fee_head.update', 'web', '2023-05-22 15:57:02', '2023-05-22 15:57:02'),
(157, 'fee_head.delete', 'web', '2023-05-22 15:57:02', '2023-05-22 15:57:02'),
(158, 'fee.increment_decrement', 'web', '2023-05-22 15:57:02', '2023-05-22 15:57:02'),
(159, 'class.update', 'web', '2023-05-22 15:57:02', '2023-05-22 15:57:02'),
(160, 'class.delete', 'web', '2023-05-22 15:57:02', '2023-05-22 15:57:02'),
(161, 'section.update', 'web', '2023-05-22 15:57:02', '2023-05-22 15:57:02'),
(162, 'section.delete', 'web', '2023-05-22 15:57:02', '2023-05-22 15:57:02'),
(163, 'grade.view', 'web', '2023-05-22 15:57:02', '2023-05-22 15:57:02'),
(164, 'exam_setup.view', 'web', '2023-05-22 15:57:02', '2023-05-22 15:57:02'),
(165, 'exam_term.view', 'web', '2023-05-22 15:57:02', '2023-05-22 15:57:02'),
(166, 'exam_date_sheet.view', 'web', '2023-05-22 15:57:02', '2023-05-22 15:57:02'),
(167, 'result_card_setting.view', 'web', '2023-05-22 15:57:02', '2023-05-22 15:57:02'),
(168, 'promotion.with_exam', 'web', '2023-05-22 15:57:02', '2023-05-22 15:57:02'),
(169, 'promotion.without_exam', 'web', '2023-05-22 15:57:02', '2023-05-22 15:57:02'),
(170, 'promotion.pass_out', 'web', '2023-05-22 15:57:02', '2023-05-22 15:57:02'),
(171, 'employee.update', 'web', '2023-05-22 15:57:02', '2023-05-22 15:57:02'),
(172, 'employee.delete', 'web', '2023-05-22 15:57:02', '2023-05-22 15:57:02'),
(173, 'employee.status', 'web', '2023-05-22 15:57:02', '2023-05-22 15:57:02'),
(174, 'shift.update', 'web', '2023-05-22 15:57:02', '2023-05-22 15:57:02'),
(175, 'shift.delete', 'web', '2023-05-22 15:57:02', '2023-05-22 15:57:02'),
(176, 'department.update', 'web', '2023-05-22 15:57:02', '2023-05-22 15:57:02'),
(177, 'department.delete', 'web', '2023-05-22 15:57:03', '2023-05-22 15:57:03'),
(178, 'designation.update', 'web', '2023-05-22 15:57:03', '2023-05-22 15:57:03'),
(179, 'designation.delete', 'web', '2023-05-22 15:57:03', '2023-05-22 15:57:03'),
(180, 'education.update', 'web', '2023-05-22 15:57:03', '2023-05-22 15:57:03'),
(181, 'education.delete', 'web', '2023-05-22 15:57:03', '2023-05-22 15:57:03'),
(182, 'allowance.update', 'web', '2023-05-22 15:57:03', '2023-05-22 15:57:03'),
(183, 'allowance.delete', 'web', '2023-05-22 15:57:03', '2023-05-22 15:57:03'),
(184, 'deduction.update', 'web', '2023-05-22 15:57:03', '2023-05-22 15:57:03'),
(185, 'deduction.delete', 'web', '2023-05-22 15:57:03', '2023-05-22 15:57:03'),
(186, 'payroll.update', 'web', '2023-05-22 15:57:03', '2023-05-22 15:57:03'),
(187, 'payroll.delete', 'web', '2023-05-22 15:57:03', '2023-05-22 15:57:03'),
(188, 'hrm_payment.create', 'web', '2023-05-22 15:57:03', '2023-05-22 15:57:03'),
(189, 'roles.update', 'web', '2023-09-19 21:07:18', '2023-09-19 21:07:18'),
(190, 'roles.delete', 'web', '2023-09-19 21:07:18', '2023-09-19 21:07:18'),
(191, 'backup.download', 'web', '2023-09-19 21:07:18', '2023-09-19 21:07:18'),
(192, 'backup.delete', 'web', '2023-09-19 21:07:18', '2023-09-19 21:07:18'),
(193, 'campus.update', 'web', '2023-09-19 21:07:18', '2023-09-19 21:07:18'),
(194, 'campus.delete', 'web', '2023-09-19 21:07:18', '2023-09-19 21:07:18'),
(195, 'class_level.delete', 'web', '2023-09-19 21:07:18', '2023-09-19 21:07:18'),
(196, 'province.delete', 'web', '2023-09-19 21:07:18', '2023-09-19 21:07:18'),
(197, 'district.delete', 'web', '2023-09-19 21:07:18', '2023-09-19 21:07:18'),
(198, 'city.delete', 'web', '2023-09-19 21:07:18', '2023-09-19 21:07:18'),
(199, 'region.delete', 'web', '2023-09-19 21:07:18', '2023-09-19 21:07:18'),
(200, 'general_settings.update', 'web', '2023-09-19 21:07:18', '2023-09-19 21:07:18'),
(201, 'award.update', 'web', '2023-09-19 21:07:18', '2023-09-19 21:07:18'),
(202, 'award.delete', 'web', '2023-09-19 21:07:19', '2023-09-19 21:07:19'),
(203, 'student.update', 'web', '2023-09-19 21:07:19', '2023-09-19 21:07:19'),
(204, 'student.delete', 'web', '2023-09-19 21:07:19', '2023-09-19 21:07:19'),
(205, 'student.status', 'web', '2023-09-19 21:07:19', '2023-09-19 21:07:19'),
(206, 'student_category.update', 'web', '2023-09-19 21:07:19', '2023-09-19 21:07:19'),
(207, 'student_category.delete', 'web', '2023-09-19 21:07:19', '2023-09-19 21:07:19'),
(208, 'withdrawal.update', 'web', '2023-09-19 21:07:19', '2023-09-19 21:07:19'),
(209, 'hrm_payment.update', 'web', '2023-09-19 21:07:19', '2023-09-19 21:07:19'),
(210, 'hrm_payment.delete', 'web', '2023-09-19 21:07:19', '2023-09-19 21:07:19'),
(211, 'expense.update', 'web', '2023-09-19 21:07:19', '2023-09-19 21:07:19'),
(212, 'expense.delete', 'web', '2023-09-19 21:07:19', '2023-09-19 21:07:19'),
(213, 'expense.payment', 'web', '2023-09-19 21:07:19', '2023-09-19 21:07:19'),
(214, 'expense_category.update', 'web', '2023-09-19 21:07:19', '2023-09-19 21:07:19'),
(215, 'expense_category.delete', 'web', '2023-09-19 21:07:19', '2023-09-19 21:07:19'),
(216, 'vehicle.update', 'web', '2023-09-19 21:07:19', '2023-09-19 21:07:19'),
(217, 'vehicle.delete', 'web', '2023-09-19 21:07:19', '2023-09-19 21:07:19'),
(218, 'account.access', 'web', '2023-09-19 21:07:19', '2023-09-19 21:07:19'),
(219, 'notification.weekend_and_holiday', 'web', '2023-09-19 21:07:19', '2023-09-19 21:07:19'),
(220, 'notification.lesson_send_to_students', 'web', '2023-09-19 21:07:19', '2023-09-19 21:07:19'),
(221, 'leave_applications_for_employee.update_status', 'web', '2023-09-19 21:07:19', '2023-09-19 21:07:19'),
(222, 'leave_applications_for_student.update_status', 'web', '2023-09-19 21:07:20', '2023-09-19 21:07:20'),
(223, 'employee_document.delete', 'web', '2023-09-19 21:07:20', '2023-09-19 21:07:20'),
(224, 'student_document.delete', 'web', '2023-09-19 21:07:20', '2023-09-19 21:07:20');

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `country_id`, `system_settings_id`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'KPK', 91, 1, 1, NULL, '2021-10-23 11:31:33', '2021-10-23 13:53:34'),
(2, 'Punjab', 91, 1, 1, NULL, '2021-10-23 12:29:04', '2021-10-23 12:29:04'),
(3, 'Balochistan', 91, 1, 533, NULL, '2023-09-24 17:52:38', '2023-09-24 17:52:38');

--
-- Dumping data for table `reference_counts`
--

INSERT INTO `reference_counts` (`id`, `ref_type`, `ref_count`, `session_id`, `session_close`, `system_settings_id`, `created_at`, `updated_at`) VALUES
(1, 'roll_no', 1, 1, 'open', 1, '2022-01-01 12:47:58', '2024-03-26 06:10:34'),
(2, 'admission_no', 1, NULL, NULL, 1, '2022-01-01 12:48:20', '2024-03-26 06:10:34'),
(4, 'opening_balance', 0, NULL, NULL, 1, '2022-01-01 17:31:22', '2023-10-07 16:35:40'),
(5, 'employee_no', 1, NULL, NULL, 1, '2022-01-02 17:33:01', '2024-01-26 18:09:30'),
(6, 'challan', 0, NULL, NULL, 1, '2022-01-04 12:10:49', '2024-03-26 06:12:41'),
(7, 'fee_payment', 0, NULL, NULL, 1, '2022-01-20 06:15:23', '2024-01-13 20:06:36'),
(8, 'student_advance_payment', 0, NULL, NULL, 1, '2022-02-03 15:15:15', '2022-02-03 15:15:15'),
(9, 'payroll', 0, NULL, NULL, 1, '2022-03-02 06:46:47', '2024-01-02 18:12:33'),
(10, 'pay_roll_payment', 0, NULL, NULL, 1, '2022-03-02 08:12:04', '2024-01-02 18:29:34'),
(11, 'slc_no', 0, NULL, NULL, 1, '2022-05-09 09:03:15', '2023-06-27 13:32:17'),
(12, 'certificate_no', 0, NULL, NULL, 1, '2022-05-09 09:05:39', '2023-07-18 16:03:41'),
(13, 'expense', 0, NULL, NULL, 1, '2022-09-20 08:50:51', '2024-01-12 16:47:43'),
(14, 'expense_payment', 0, NULL, NULL, 1, '2022-10-01 05:45:24', '2023-12-11 15:27:34'),
(15, 'online_applicant_no', 0, NULL, NULL, 1, '2024-01-26 13:38:59', '2024-02-02 18:54:07');

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name`, `transport_fee`, `country_id`, `province_id`, `district_id`, `city_id`, `system_settings_id`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Bar Kalay', 2500.0000, 91, 1, 1, 1, 1, 1, NULL, '2021-10-23 20:22:55', '2023-09-19 18:43:52'),
(2, 'Koz Kalay', 2500.0000, 91, 1, 1, 1, 1, 1, NULL, '2022-01-03 10:02:52', '2023-09-19 18:44:13'),
(3, 'Bandai', 2500.0000, 91, 1, 1, 1, 1, 1, NULL, '2022-01-03 10:03:22', '2023-09-19 18:44:32'),
(4, 'Landikas', 2000.0000, 91, 1, 1, 1, 1, 1, NULL, '2022-01-03 10:04:03', '2023-09-19 18:44:47'),
(5, 'Bowrai', 4000.0000, 91, 1, 1, 1, 1, 1, NULL, '2022-01-03 10:04:34', '2023-09-19 18:45:18'),
(6, 'Babo', 3500.0000, 91, 1, 1, 1, 1, 1, NULL, '2022-01-03 10:05:18', '2023-10-12 18:02:52'),
(7, 'Chamtalai', 4000.0000, 91, 1, 1, 1, 1, 1, NULL, '2022-01-03 10:06:21', '2023-09-19 18:45:59'),
(8, 'Langar', 3000.0000, 91, 1, 1, 1, 1, 1, NULL, '2022-01-03 10:06:41', '2023-10-12 18:03:11'),
(9, 'Asala bala', 3000.0000, 91, 1, 1, 1, 1, 1, NULL, '2022-01-03 10:07:07', '2023-09-19 18:46:48'),
(10, 'Shalpin', 4500.0000, 91, 1, 1, 1, 1, 1, NULL, '2022-01-03 10:07:44', '2023-09-19 18:47:00'),
(11, 'Bamakhela', 2200.0000, 91, 1, 1, 2, 1, 1, NULL, '2022-01-04 07:25:34', '2023-09-19 18:48:02'),
(12, 'Chalyar', 3000.0000, 91, 1, 1, 1, 1, 1, NULL, '2022-01-10 06:38:20', '2023-09-19 18:48:25'),
(13, 'Main Road Charbagh', 2000.0000, 91, 1, 1, 5, 1, 1, '2023-09-19 18:48:37', '2022-01-10 06:46:15', '2023-09-19 18:48:37'),
(14, 'Jano', 0.0000, 91, 1, 1, 1, 1, 1, '2022-01-19 09:53:49', '2022-01-19 09:39:41', '2022-01-19 09:53:49'),
(15, 'Kachigram', 0.0000, 91, 1, 1, 1, 1, 1, '2023-09-19 18:48:45', '2022-01-19 09:40:10', '2023-09-19 18:48:45'),
(16, 'Shalpin', 2200.0000, 91, 1, 1, 1, 1, 1, '2023-09-19 18:48:54', '2022-01-19 09:40:33', '2023-09-19 18:48:54'),
(17, 'Alaabad', 0.0000, 91, 1, 1, 5, 1, 1, '2023-09-19 18:49:04', '2022-01-19 09:41:05', '2023-09-19 18:49:04'),
(18, 'Guli bagh', 2000.0000, 91, 1, 1, 5, 1, 1, '2023-09-19 19:01:04', '2022-01-19 09:41:46', '2023-09-19 19:01:04'),
(19, 'Alamganj', 1800.0000, 91, 1, 1, 5, 1, 1, '2023-09-19 19:01:09', '2022-01-19 09:42:11', '2023-09-19 19:01:09'),
(20, 'Karam Dherai', 0.0000, 91, 1, 1, 5, 1, 1, '2023-09-19 19:01:15', '2022-01-19 09:42:49', '2023-09-19 19:01:15'),
(21, 'Gashkor', 1800.0000, 91, 1, 1, 1, 1, 1, '2023-09-19 19:01:23', '2022-01-19 09:45:26', '2023-09-19 19:01:23'),
(22, 'Ghar Shin', 4000.0000, 91, 1, 1, 1, 1, 1, NULL, '2022-01-19 09:46:04', '2023-09-19 19:00:38'),
(23, 'Nalai Qala', 2200.0000, 91, 1, 1, 1, 1, 1, '2023-09-19 19:04:55', '2022-01-19 09:46:41', '2023-09-19 19:04:55'),
(24, 'Bagh Dherai', 4500.0000, 91, 1, 1, 1, 1, 1, NULL, '2022-01-19 09:47:10', '2023-10-12 18:18:19'),
(25, 'Nawakalay Bagh Dherai', 4500.0000, 91, 1, 1, 1, 1, 1, NULL, '2022-01-19 09:47:59', '2023-10-12 18:18:29'),
(26, 'Fathepur', 4500.0000, 91, 1, 1, 1, 1, 1, '2023-10-20 13:55:55', '2022-01-19 09:48:22', '2023-10-20 13:55:55'),
(27, 'Fatehpur Tehsil', 4500.0000, 91, 1, 1, 1, 1, 1, NULL, '2022-01-19 09:48:56', '2023-09-19 19:00:04'),
(28, 'Shin', 4000.0000, 91, 1, 1, 1, 1, 1, NULL, '2022-01-19 09:49:20', '2023-09-19 18:59:14'),
(29, 'Gul Dherai', 0.0000, 91, 1, 1, 1, 1, 1, '2023-09-19 19:01:37', '2022-01-19 09:49:41', '2023-09-19 19:01:37'),
(30, 'Farhat Abad', 0.0000, 91, 1, 1, 1, 1, 1, '2023-09-19 19:01:43', '2022-01-19 09:50:18', '2023-09-19 19:01:43'),
(31, 'Kotanai', 2500.0000, 91, 1, 1, 1, 1, 1, NULL, '2022-01-19 09:50:44', '2023-10-12 18:04:21'),
(32, 'Koza Asala', 3000.0000, 91, 1, 1, 1, 1, 1, NULL, '2022-01-19 09:51:09', '2023-09-19 18:58:44'),
(33, 'Wach Khwar', 0.0000, 91, 1, 1, 1, 1, 1, '2023-09-19 19:02:06', '2022-01-19 09:51:33', '2023-09-19 19:02:06'),
(34, 'Doop', 1800.0000, 91, 1, 1, 1, 1, 1, '2023-09-19 19:02:12', '2022-01-19 09:51:58', '2023-09-19 19:02:12'),
(35, 'Tetabat', 2000.0000, 91, 1, 1, 1, 1, 1, NULL, '2022-01-19 09:52:19', '2023-09-19 19:02:44'),
(36, 'Tikdarai', 2000.0000, 91, 1, 1, 1, 1, 1, NULL, '2022-01-19 09:52:41', '2023-09-19 19:02:55'),
(37, 'Qala K.Khela', 1800.0000, 91, 1, 1, 1, 1, 1, '2023-09-19 19:03:03', '2022-01-19 09:53:04', '2023-09-19 19:03:03'),
(38, 'Jano', 3000.0000, 91, 1, 1, 1, 1, 1, NULL, '2022-01-19 09:53:22', '2023-09-19 19:03:14'),
(39, 'Mashkomai', 2200.0000, 91, 1, 1, 1, 1, 1, '2023-09-19 19:03:19', '2022-01-19 09:54:11', '2023-09-19 19:03:19'),
(40, 'Chinkolai', 0.0000, 91, 1, 1, 1, 1, 1, '2023-09-19 19:03:23', '2022-01-19 12:11:58', '2023-09-19 19:03:23'),
(41, 'Baidara', 1750.0000, 91, 1, 1, 2, 1, 1, NULL, '2022-01-19 12:28:57', '2023-10-12 18:04:59'),
(42, 'Topsin', 0.0000, 91, 1, 1, 1, 1, 1, '2023-09-19 19:04:11', '2022-01-19 13:16:53', '2023-09-19 19:04:11'),
(43, 'Alamganj', 0.0000, 91, 1, 1, 5, 1, 1, '2022-10-05 07:31:10', '2022-01-19 14:47:30', '2022-10-05 07:31:10'),
(44, 'Chinarbaba', 0.0000, 91, 1, 1, 1, 1, 1, '2023-09-19 19:05:20', '2022-01-23 12:12:56', '2023-09-19 19:05:20'),
(45, 'Manpetai', 0.0000, 91, 1, 1, 1, 1, 1, '2023-09-19 19:04:37', '2022-01-24 07:46:10', '2023-09-19 19:04:37'),
(46, 'Sambat Cham', 1500.0000, 91, 1, 1, 2, 1, 1, NULL, '2022-02-03 16:34:03', '2023-10-12 18:06:27'),
(47, 'Sambat Kalay', 1500.0000, 91, 1, 1, 2, 1, 1, NULL, '2022-02-15 12:11:27', '2023-09-19 19:06:58'),
(48, 'Gulbahar', 0.0000, 91, 1, 1, 1, 1, 1, '2023-09-19 19:07:07', '2022-10-03 07:35:31', '2023-09-19 19:07:07'),
(49, 'Kabal', 0.0000, 91, 1, 1, 6, 1, 1, '2023-09-19 19:07:12', '2023-01-31 06:25:37', '2023-09-19 19:07:12'),
(50, 'Gurra', 2250.0000, 91, 1, 1, 2, 1, 1, NULL, '2023-09-09 15:35:53', '2023-10-12 18:07:17'),
(51, 'Pir Kalay', 2000.0000, 91, 1, 1, 2, 1, 1, NULL, '2023-09-09 15:36:44', '2023-09-19 19:08:12'),
(52, 'Maatta', 1500.0000, 91, 1, 1, 2, 1, 1, '2023-09-19 14:31:23', '2023-09-19 14:30:25', '2023-09-19 14:31:23'),
(53, 'Matta Bazar', 1600.0000, 91, 1, 1, 2, 1, 1, NULL, '2023-09-19 14:31:46', '2023-10-12 18:08:22'),
(54, 'College Chowk', 1600.0000, 91, 1, 1, 2, 1, 1, NULL, '2023-09-19 14:44:01', '2023-10-12 18:08:56'),
(55, 'Bodigram', 2250.0000, 91, 1, 1, 2, 1, 1, NULL, '2023-09-19 14:44:41', '2023-10-12 18:09:25'),
(56, 'Kharerai', 2000.0000, 91, 1, 1, 2, 1, 1, NULL, '2023-09-19 14:45:24', '2023-09-19 14:45:24'),
(57, 'Sinpora', 2500.0000, 91, 1, 1, 2, 1, 1, NULL, '2023-09-19 14:45:56', '2023-10-12 18:10:04'),
(58, 'Gwary', 2000.0000, 91, 1, 1, 2, 1, 1, '2023-09-19 19:09:07', '2023-09-19 14:46:27', '2023-09-19 19:09:07'),
(59, 'Chuprial', 3000.0000, 91, 1, 1, 2, 1, 1, NULL, '2023-09-19 14:46:55', '2023-09-19 14:46:55'),
(60, 'Madinah Colony', 1500.0000, 91, 1, 1, 2, 1, 1, NULL, '2023-09-19 14:47:26', '2023-10-12 18:10:53'),
(61, 'Tootkay', 1750.0000, 91, 1, 1, 2, 1, 1, NULL, '2023-09-19 14:47:54', '2023-10-12 18:02:07'),
(62, 'Bar Sherpalam', 2250.0000, 91, 1, 1, 2, 1, 1, NULL, '2023-09-19 14:48:25', '2023-10-12 18:11:46'),
(63, 'Shakardara', 3000.0000, 91, 1, 1, 2, 1, 1, NULL, '2023-09-19 14:49:15', '2023-09-19 19:11:32'),
(64, 'Baz Khela', 3000.0000, 91, 1, 1, 2, 1, 1, NULL, '2023-09-19 16:37:17', '2023-09-19 19:12:06'),
(65, 'Sijbanr', 3000.0000, 91, 1, 1, 2, 1, 1, NULL, '2023-09-19 18:22:08', '2023-09-19 18:22:08'),
(66, 'Chuprail', 3000.0000, 91, 1, 1, 2, 1, 1, NULL, '2023-09-19 18:23:01', '2023-09-19 18:23:01'),
(67, 'Shakardara', 3000.0000, 91, 1, 1, 2, 1, 1, '2023-10-12 18:12:18', '2023-09-19 18:25:34', '2023-10-12 18:12:18'),
(68, 'Darmai', 4500.0000, 91, 1, 1, 2, 1, 1, NULL, '2023-09-19 18:27:21', '2023-09-19 19:43:09'),
(69, 'Bara Drushkhela', 3000.0000, 91, 1, 1, 2, 1, 1, NULL, '2023-09-19 18:28:49', '2023-09-19 18:28:49'),
(70, 'Koz Sherpalam', 2500.0000, 91, 1, 1, 2, 1, 1, NULL, '2023-09-19 18:31:14', '2023-09-19 19:42:11'),
(71, 'Fatehpur', 5000.0000, 91, 1, 1, 1, 1, 1, '2023-09-19 19:42:44', '2023-09-19 18:31:59', '2023-09-19 19:42:44'),
(72, 'Khwaza Khela', 2000.0000, 91, 1, 1, 1, 1, 1, NULL, '2023-09-19 18:32:40', '2023-09-19 18:32:40'),
(73, 'Shalpin', 4000.0000, 91, 1, 1, 1, 1, 1, '2023-10-23 14:34:05', '2023-09-19 18:33:22', '2023-10-23 14:34:05'),
(74, 'Ronyal', 3000.0000, 91, 1, 1, 2, 1, 1, NULL, '2023-09-19 18:35:06', '2023-09-19 19:43:30'),
(75, 'DITPANAI', 2250.0000, 91, 1, 1, 2, 1, 1, NULL, '2023-09-22 12:43:09', '2023-10-12 18:13:13'),
(76, 'Asharay', 4000.0000, 91, 1, 1, 2, 1, 533, NULL, '2023-09-22 15:06:09', '2023-09-22 15:06:09'),
(77, 'Asharay Jalala', 4000.0000, 91, 1, 1, 2, 1, 533, NULL, '2023-09-22 15:08:10', '2023-09-22 15:08:10'),
(78, 'Miandam', 5000.0000, 91, 1, 1, 1, 1, 533, NULL, '2023-09-23 15:05:29', '2023-09-23 15:05:29'),
(79, 'Koza Drushkhela', 2500.0000, 91, 1, 1, 2, 1, 533, NULL, '2023-09-24 19:09:47', '2023-10-12 18:14:30'),
(80, 'Chinar Baba', 2000.0000, 91, 1, 1, 1, 1, 533, NULL, '2023-09-24 19:38:33', '2023-09-24 19:38:33'),
(81, 'Supply', 5000.0000, 91, 1, 2, 7, 1, 533, NULL, '2023-09-25 13:42:07', '2023-09-25 13:42:07'),
(82, 'Shawar', 5000.0000, 91, 1, 1, 2, 1, 1, NULL, '2023-09-25 15:21:13', '2023-10-12 18:15:18'),
(83, 'Koz Sherpalam', 2500.0000, 91, 1, 1, 2, 1, 533, NULL, '2023-09-25 20:05:10', '2023-09-25 20:05:10'),
(84, 'Baghdherai', 4500.0000, 91, 1, 1, 2, 1, 533, '2023-10-12 18:18:08', '2023-09-26 17:14:32', '2023-10-12 18:18:08'),
(85, 'Nazar Abad', 2500.0000, 91, 1, 1, 2, 1, 533, NULL, '2023-10-02 20:56:26', '2023-10-02 20:56:26'),
(86, 'Sambat Rahimabad', 1500.0000, 91, 1, 1, 2, 1, 533, NULL, '2023-10-03 13:31:59', '2023-10-03 13:31:59'),
(87, 'Shakardara- Shaidala', 3000.0000, 91, 1, 1, 2, 1, 533, NULL, '2023-10-03 15:05:34', '2023-10-03 15:05:34'),
(88, 'Shahdara', 5000.0000, 91, 2, 3, 8, 1, 533, NULL, '2023-10-04 14:40:16', '2023-10-04 14:40:16'),
(89, 'Masoom Shaheed Colony', 1750.0000, 91, 1, 1, 2, 1, 533, NULL, '2023-10-04 14:57:26', '2023-10-12 18:16:16'),
(90, 'Koray', 2500.0000, 91, 1, 1, 2, 1, 533, NULL, '2023-10-04 20:27:30', '2023-10-04 20:27:30'),
(91, 'Rahat Kot', 4500.0000, 91, 1, 1, 2, 1, 533, NULL, '2023-10-06 13:20:22', '2023-10-06 13:20:22'),
(92, 'KOZ SHAWAR', 5000.0000, 91, 1, 1, 2, 1, 533, NULL, '2023-10-07 20:35:13', '2023-10-07 20:35:13'),
(93, 'BAR SHAWAR', 5000.0000, 91, 1, 1, 2, 1, 533, NULL, '2023-10-07 20:36:26', '2023-10-07 20:36:26'),
(94, 'Roringar', 5000.0000, 91, 1, 1, 2, 1, 533, NULL, '2023-10-07 20:41:24', '2023-10-07 20:41:24'),
(95, 'Wainai', 4500.0000, 91, 1, 1, 2, 1, 533, NULL, '2023-10-07 20:52:27', '2023-10-07 20:52:27'),
(96, 'Qala', 2500.0000, 91, 1, 1, 1, 1, 533, NULL, '2023-10-09 15:41:22', '2023-10-09 15:41:22'),
(97, 'Tekdari', 2000.0000, 91, 1, 1, 1, 1, 533, '2023-10-14 18:10:12', '2023-10-14 18:09:53', '2023-10-14 18:10:12'),
(98, 'Fatehpur', 4500.0000, 91, 1, 1, 1, 1, 545, NULL, '2023-10-20 13:55:37', '2023-10-20 13:55:37'),
(99, 'Sambat Kandaray', 1700.0000, 91, 1, 1, 2, 1, 533, NULL, '2023-10-26 13:11:34', '2023-10-26 13:11:34');

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `system_settings_id`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'Admin#1', 'web', 1, 1, '2021-10-15 01:33:46', '2021-10-15 01:33:46'),
(2, 'Teacher#1', 'web', 1, 0, '2022-12-07 19:24:03', '2022-12-07 19:24:03'),
(3, 'Student#1', 'web', 1, 0, '2022-12-10 09:16:53', '2022-12-10 09:16:53'),
(4, 'Staff#1', 'web', 1, 0, '2022-12-10 09:26:01', '2022-12-10 09:26:01'),
(5, 'Guardian#1', 'web', 1, 0, '2022-12-15 07:19:53', '2022-12-15 07:19:53'),
(6, 'Accountant#1', 'web', 1, 0, '2023-02-25 09:34:22', '2023-02-25 09:34:22'),
(7, 'Administrator#1', 'web', 1, 0, '2023-02-25 09:35:01', '2023-02-25 09:35:01'),
(8, 'Director#1', 'web', 1, 0, '2023-02-25 09:35:49', '2023-02-25 09:35:49'),
(9, 'Owner#1', 'web', 1, 0, '2023-03-07 01:15:30', '2023-03-07 01:15:30'),
(11, 'Controller Exam#1', 'web', 1, 0, '2023-07-24 15:34:40', '2023-07-24 15:34:40'),
(12, 'Principal#1', 'web', 1, 0, '2023-09-19 21:07:18', '2023-09-19 21:07:18');

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 6),
(1, 7),
(1, 12),
(2, 12),
(3, 12),
(4, 12),
(5, 2),
(5, 5),
(5, 7),
(5, 11),
(5, 12),
(6, 2),
(6, 5),
(6, 7),
(6, 11),
(6, 12),
(7, 2),
(7, 5),
(7, 7),
(7, 11),
(7, 12),
(8, 2),
(8, 11),
(8, 12),
(9, 2),
(9, 5),
(9, 7),
(9, 11),
(9, 12),
(10, 2),
(10, 5),
(10, 7),
(10, 11),
(10, 12),
(11, 2),
(11, 5),
(11, 7),
(11, 11),
(11, 12),
(12, 2),
(12, 7),
(12, 11),
(12, 12),
(13, 2),
(13, 5),
(13, 7),
(13, 11),
(13, 12),
(14, 2),
(14, 5),
(14, 7),
(14, 11),
(14, 12),
(15, 2),
(15, 5),
(15, 7),
(15, 11),
(15, 12),
(16, 2),
(16, 7),
(16, 11),
(16, 12),
(17, 2),
(17, 5),
(17, 7),
(17, 11),
(17, 12),
(18, 2),
(18, 5),
(18, 7),
(18, 11),
(18, 12),
(19, 2),
(19, 7),
(19, 11),
(19, 12),
(20, 2),
(20, 7),
(20, 11),
(20, 12),
(21, 2),
(21, 5),
(21, 7),
(21, 12),
(22, 2),
(22, 5),
(22, 7),
(22, 9),
(22, 12),
(23, 2),
(23, 3),
(23, 5),
(23, 9),
(23, 12),
(24, 6),
(24, 7),
(24, 8),
(24, 12),
(25, 5),
(25, 6),
(25, 12),
(26, 4),
(26, 5),
(26, 12),
(27, 12),
(28, 12),
(29, 12),
(30, 12),
(31, 12),
(32, 12),
(33, 12),
(34, 12),
(35, 12),
(36, 12),
(37, 12),
(38, 12),
(39, 12),
(40, 12),
(41, 12),
(42, 12),
(43, 12),
(44, 12),
(45, 12),
(46, 12),
(47, 12),
(48, 12),
(49, 5),
(49, 12),
(50, 12),
(51, 5),
(51, 9),
(51, 12),
(52, 5),
(52, 12),
(53, 5),
(53, 12),
(54, 5),
(54, 9),
(54, 12),
(55, 9),
(55, 12),
(56, 5),
(56, 9),
(56, 12),
(57, 9),
(57, 12),
(58, 5),
(58, 9),
(58, 12),
(59, 9),
(59, 12),
(60, 12),
(61, 12),
(62, 7),
(62, 12),
(63, 7),
(63, 12),
(64, 7),
(64, 9),
(64, 12),
(65, 5),
(65, 7),
(65, 9),
(65, 12),
(66, 5),
(66, 7),
(66, 9),
(66, 12),
(67, 5),
(67, 7),
(67, 9),
(67, 12),
(68, 7),
(68, 12),
(69, 7),
(69, 9),
(69, 12),
(70, 7),
(70, 12),
(71, 7),
(71, 12),
(72, 5),
(72, 7),
(72, 11),
(72, 12),
(73, 7),
(73, 11),
(73, 12),
(74, 5),
(74, 7),
(74, 11),
(74, 12),
(75, 7),
(75, 11),
(75, 12),
(76, 5),
(76, 7),
(76, 11),
(76, 12),
(77, 5),
(77, 7),
(77, 11),
(77, 12),
(78, 5),
(78, 7),
(78, 12),
(79, 5),
(79, 7),
(79, 12),
(80, 5),
(80, 7),
(80, 9),
(80, 12),
(81, 5),
(81, 7),
(81, 12),
(82, 5),
(82, 7),
(82, 12),
(83, 7),
(83, 12),
(84, 5),
(84, 7),
(84, 9),
(84, 12),
(85, 7),
(85, 12),
(86, 5),
(86, 7),
(86, 12),
(87, 7),
(87, 12),
(88, 5),
(88, 7),
(88, 9),
(88, 12),
(89, 5),
(89, 7),
(89, 9),
(89, 12),
(90, 5),
(90, 7),
(90, 9),
(90, 12),
(91, 7),
(91, 12),
(92, 7),
(92, 12),
(93, 7),
(93, 9),
(93, 12),
(94, 7),
(94, 12),
(95, 5),
(95, 7),
(95, 9),
(95, 12),
(96, 7),
(96, 9),
(96, 12),
(97, 7),
(97, 12),
(98, 7),
(98, 12),
(99, 7),
(99, 12),
(100, 7),
(100, 12),
(101, 7),
(101, 12),
(102, 7),
(102, 12),
(103, 7),
(103, 12),
(104, 7),
(104, 12),
(105, 7),
(105, 12),
(106, 7),
(106, 12),
(107, 12),
(108, 7),
(108, 9),
(108, 12),
(109, 7),
(109, 12),
(110, 7),
(110, 9),
(110, 12),
(111, 9),
(111, 12),
(112, 7),
(112, 9),
(112, 12),
(113, 7),
(113, 12),
(114, 9),
(114, 12),
(115, 12),
(116, 9),
(116, 12),
(117, 9),
(117, 12),
(118, 9),
(118, 12),
(119, 9),
(119, 12),
(120, 9),
(120, 12),
(121, 9),
(121, 12),
(122, 9),
(122, 12),
(123, 12),
(124, 12),
(125, 7),
(125, 12),
(126, 7),
(126, 12),
(127, 7),
(127, 12),
(128, 12),
(129, 5),
(129, 7),
(129, 12),
(130, 7),
(130, 12),
(131, 12),
(132, 9),
(132, 12),
(133, 5),
(133, 7),
(133, 11),
(133, 12),
(134, 7),
(134, 11),
(134, 12),
(135, 5),
(135, 7),
(135, 12),
(136, 7),
(136, 12),
(137, 5),
(137, 7),
(137, 12),
(138, 7),
(138, 12),
(139, 7),
(139, 12),
(140, 7),
(140, 12),
(141, 7),
(141, 12),
(142, 7),
(142, 12),
(143, 7),
(143, 12),
(144, 7),
(144, 12),
(145, 5),
(145, 7),
(145, 12),
(146, 7),
(146, 12),
(147, 7),
(147, 12),
(148, 7),
(148, 12),
(149, 7),
(149, 12),
(150, 7),
(150, 12),
(151, 7),
(151, 12),
(152, 7),
(152, 12),
(153, 7),
(153, 12),
(154, 7),
(154, 12),
(155, 7),
(155, 12),
(156, 7),
(156, 12),
(157, 7),
(157, 12),
(158, 7),
(158, 12),
(159, 7),
(159, 11),
(159, 12),
(160, 7),
(160, 11),
(160, 12),
(161, 7),
(161, 11),
(161, 12),
(162, 7),
(162, 11),
(162, 12),
(163, 7),
(163, 12),
(164, 7),
(164, 12),
(165, 7),
(165, 12),
(166, 5),
(166, 7),
(166, 12),
(167, 7),
(167, 12),
(168, 7),
(168, 12),
(169, 7),
(169, 12),
(170, 7),
(170, 12),
(171, 7),
(171, 12),
(172, 7),
(172, 12),
(173, 7),
(173, 12),
(174, 7),
(174, 12),
(175, 7),
(175, 12),
(176, 7),
(176, 12),
(177, 7),
(177, 12),
(178, 7),
(178, 12),
(179, 7),
(179, 12),
(180, 7),
(180, 12),
(181, 7),
(181, 12),
(182, 7),
(182, 12),
(183, 7),
(183, 12),
(184, 7),
(184, 12),
(185, 7),
(185, 12),
(186, 7),
(186, 12),
(187, 7),
(187, 12),
(188, 7),
(188, 12),
(189, 12),
(190, 12),
(191, 12),
(192, 12),
(193, 12),
(194, 12),
(195, 12),
(196, 12),
(197, 12),
(198, 12),
(199, 12),
(200, 12),
(201, 12),
(202, 12),
(203, 12),
(204, 12),
(205, 5),
(205, 12),
(206, 12),
(207, 12),
(208, 12),
(209, 12),
(210, 12),
(211, 12),
(212, 12),
(213, 12),
(214, 12),
(215, 12),
(216, 12),
(217, 12),
(218, 12),
(219, 12),
(220, 12),
(221, 12),
(222, 12),
(223, 12),
(224, 12);

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `title`, `prefix`, `status`, `start_date`, `end_date`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '2024-2025', 'F24', 'ACTIVE', '2024-02-02', NULL, NULL, '2024-02-02 18:46:05', '2024-02-02 18:46:09');

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `org_name`, `org_short_name`, `org_address`, `org_contact_number`, `org_email`, `org_website`, `org_logo`, `tag_line`, `page_header_logo`, `id_card_logo`, `org_favicon`, `currency_id`, `currency_symbol_placement`, `start_date`, `date_format`, `time_format`, `time_zone`, `start_month`, `transaction_edit_days`, `email_settings`, `sms_settings`, `ref_no_prefixes`, `enable_tooltip`, `theme_color`, `common_settings`, `created_at`, `updated_at`, `pdf`) VALUES
(1, 'testschool', 'ASC', 'dfasdf', '03404099910', NULL, NULL, 'null', 'Turkish Standard Education', NULL, NULL, 'null', 91, 'before', '2023-01-01', 'd-m-Y', '12', 'Asia/Karachi', '', 30, '{\"mail_driver\":\"smtp\",\"mail_host\":\"sirms.edu.pk\",\"mail_port\":\"465\",\"mail_username\":\"info@sirms.edu.pk\",\"mail_password\":\"sirms.edu.pk\",\"mail_encryption\":\"ssl\",\"mail_from_address\":\"info@sirms.edu.pk\",\"mail_from_name\":\"info@sirms.edu.pk\"}', '{\"sms_service\":\"other\",\"nexmo_key\":null,\"nexmo_secret\":null,\"nexmo_from\":null,\"twilio_sid\":null,\"twilio_token\":null,\"twilio_from\":null,\"url\":\"http:\\/\\/localhost\\/django-admin\\/api\\/sms\",\"send_to_param_name\":\"to\",\"msg_param_name\":\"text\",\"request_method\":\"post\",\"header_1\":null,\"header_val_1\":null,\"header_2\":null,\"header_val_2\":null,\"header_3\":null,\"header_val_3\":null,\"param_1\":null,\"param_val_1\":null,\"param_2\":null,\"param_val_2\":null,\"param_3\":null,\"param_val_3\":null,\"param_4\":null,\"param_val_4\":null,\"param_5\":null,\"param_val_5\":null,\"param_6\":null,\"param_val_6\":null,\"param_7\":null,\"param_val_7\":null,\"param_8\":null,\"param_val_8\":null,\"param_9\":null,\"param_val_9\":null,\"param_10\":null,\"param_val_10\":null}', '{\"student\":\"std1\",\"employee\":\"Em\",\"fee_payment\":\"FeeP\",\"expenses_payment\":\"FeeP\",\"admission\":\"Adm\"}', 1, 'blue', '{\"default_datatable_page_entries\":\"25\",\"active_students\":\"1\",\"inactive_students\":\"1\",\"pass_out_students\":\"1\",\"struck_up_students\":\"1\",\"took_slc_students\":\"1\",\"active_employees\":\"1\",\"resign_employees\":\"1\"}', '2021-10-26 17:55:27', '2024-03-26 06:02:25', NULL);

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `surname`, `user_type`, `hook_id`, `fcm_id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `system_settings_id`, `campus_id`, `image`, `language`, `created_at`, `updated_at`) VALUES
(1, '', 'admin', 1, 'e9BErPR5Q6qnrUSepCPak0:APA91bFh3RGEggJNhJdh3Jx1svPZNvuI-VYVj3Glu1jA9HitbsTqv_oJFbk9SX3Km-HIYaMseABzoRuuzQ-NlGxq7fmWea5yEzv85Kxhvjhtt3h2f67ko_WM4DjQiKZYBwq3tOtW6_YL', 'inayat', 'ullah', 'test@gmail.com', NULL, '$2y$12$pgI6.Jk/Qrabw4zESWaVHuFUdlmkl5Bnyy1gSACeLBuJiL0ekyVJ6', 'J93QcYQDbjun0mMkscsXUjJKr2eulFQUZ55ftiBvZ9z1lCvjLauNUOuc4pcW', 1, 1, 'storage/tenantsaadschool/employee_image/Em-0055.png', 'en', '2023-09-09 12:33:55', '2024-03-26 05:24:59');

--
-- Dumping data for table `wa_device`
--

INSERT INTO `wa_device` (`id`, `number`, `name`, `description`, `delay_time`, `status`, `multidevice`, `sms_status`, `created_at`, `updated_at`) VALUES
(7, '034588', 'inayat', '', '60', 'connected', 'YES', 'sms_on', '2024-01-30 08:42:50', '2024-02-04 13:58:00');


COMMIT;

SET foreign_key_checks = 1;
