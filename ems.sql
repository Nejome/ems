-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2018 at 05:46 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_reports`
--

CREATE TABLE `academic_reports` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `report_date` date NOT NULL,
  `r1` int(11) NOT NULL,
  `r2` int(11) NOT NULL,
  `r3` int(11) NOT NULL,
  `r4` int(11) NOT NULL,
  `r5` int(11) NOT NULL,
  `r6` int(11) NOT NULL,
  `r7` int(11) NOT NULL,
  `r8` int(11) NOT NULL,
  `r9` int(11) NOT NULL,
  `r10` int(11) NOT NULL,
  `recommendations` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `academic_reports`
--

INSERT INTO `academic_reports` (`id`, `employee_id`, `report_date`, `r1`, `r2`, `r3`, `r4`, `r5`, `r6`, `r7`, `r8`, `r9`, `r10`, `recommendations`) VALUES
(1, 4, '2018-08-15', 10, 5, 6, 7, 8, 9, 10, 2, 1, 3, 'اوصي بالتجديد لها '),
(2, 7, '2018-08-15', 10, 5, 7, 8, 9, 10, 3, 2, 1, 8, 'اوصي بالتجديد له'),
(3, 4, '2018-08-16', 10, 5, 8, 9, 3, 4, 5, 10, 8, 9, 'اوصي بالتجديد له');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `day` date NOT NULL,
  `status` int(11) NOT NULL,
  `attend_time` timestamp NULL DEFAULT NULL,
  `departure_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `employee_id`, `day`, `status`, `attend_time`, `departure_time`) VALUES
(1, 4, '2018-08-12', 1, '2018-08-12 06:10:00', '2018-08-12 00:00:00'),
(2, 7, '2018-08-12', 1, '2018-08-12 05:00:00', '2018-08-12 01:13:00'),
(3, 4, '2018-08-13', 0, NULL, NULL),
(4, 7, '2018-08-13', 1, '2018-08-13 05:00:00', '2018-08-13 01:00:00'),
(6, 4, '2018-08-14', 0, NULL, NULL),
(7, 7, '2018-08-14', 1, '2018-08-14 03:11:04', '2018-08-14 03:42:48'),
(8, 4, '2018-08-15', 1, '2018-08-15 07:31:06', NULL),
(9, 4, '2018-08-16', 1, '2018-08-16 03:59:15', '2018-08-16 03:59:48'),
(10, 7, '2018-08-16', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `collages`
--

CREATE TABLE `collages` (
  `collage_id` int(5) NOT NULL,
  `collage_name` varchar(50) NOT NULL,
  `collage_symbol` varchar(5) NOT NULL,
  `collage_manager` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `collages`
--

INSERT INTO `collages` (`collage_id`, `collage_name`, `collage_symbol`, `collage_manager`) VALUES
(1, 'كلية الطب', 'ك ط', 2),
(2, 'تقنية معلومات', 'ت م', 4),
(4, 'كلية علوم الحاسوب', 'ع ح', 11),
(5, 'الأسنان', 'س', 7);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `type` int(1) NOT NULL,
  `name` varchar(50) NOT NULL,
  `berth_day` date NOT NULL,
  `address` varchar(50) NOT NULL,
  `gender` int(1) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `email` varchar(30) NOT NULL,
  `branch_id` int(1) NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `hiring_date` date NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `file_number` varchar(30) DEFAULT NULL,
  `contract_type` varchar(10) NOT NULL,
  `main_salary` int(11) NOT NULL,
  `premiums` int(11) NOT NULL,
  `salary_total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `type`, `name`, `berth_day`, `address`, `gender`, `phone`, `email`, `branch_id`, `job_id`, `hiring_date`, `qualification`, `file_number`, `contract_type`, `main_salary`, `premiums`, `salary_total`) VALUES
(1, 1, 'فهد محمد', '1960-08-14', 'المنشية', 1, '0185236974', 'fahaed2015@gmail.com', 1, 1, '2015-08-06', 'ماجستير', 'ج ق س ش م/1', 'كلي', 3000, 1000, 4000),
(2, 2, 'عمر عبد الفتاح', '1966-08-12', 'الرياض', 1, '0974125896', 'omerabdoalfatah@gmail.com', 1, 4, '2016-08-19', 'ماجستير', 'ج ق س ك ط/2', 'كامل', 3000, 1000, 4000),
(3, 1, 'عوض الكريم', '1965-02-10', 'امدرمان', 1, '0974125896', 'awadalkarem2016@hotmail.com', 2, 3, '2017-01-01', 'بكلاريوس', 'ج ق س ش م/ 3', 'كامل', 3000, 1500, 4500),
(4, 2, 'هنادي محمد احمد', '1980-05-10', 'الصحافة', 2, '0912365485', 'hanadimohammed@hotmail.com', 1, 5, '2018-01-01', 'ماجستير', 'ج ق س ك ط/ 4', 'متعاون', 2000, 800, 2800),
(5, 1, 'محمد اسماعيل', '1990-01-05', 'الرياض', 1, '0974125896', 'mohammedismaeil@gmail.com', 2, 3, '2018-01-01', 'بكلاريوس', 'ج ق س م ح/ 5', 'كامل', 3000, 1500, 4500),
(6, 1, 'سميرة علي ', '1990-02-02', 'شمبات', 2, '0185236978', 'sameraali@hotmail.com', 1, 7, '2017-01-01', 'بكلاريوس', 'ج ق س ش م/ 6', 'كامل', 1500, 500, 2000),
(7, 2, 'علي عمر', '1970-05-02', 'بري', 1, '0185236945', 'aliomer2018@gmail.com', 1, 8, '2018-01-01', 'بكلاريوس', 'ج ق س ك ط/ 7', 'كامل', 3000, 1000, 4000),
(8, 1, 'علي كمال', '1970-02-01', 'المعمورة', 1, '0974125896', 'alikamal@gmail.com', 1, 1, '2018-01-01', 'بكلاريوس', 'ج ق س ش م/ 8', 'كامل', 3000, 1000, 4000),
(9, 1, 'احمد حمد المقدم', '1969-05-25', 'جبرة', 1, '0974125896', 'ahmed@hotmail.com', 4, 10, '2018-01-01', 'بكلاريوس', 'ج ق س ش م/ 9', 'كامل', 5000, 1000, 6000),
(10, 1, 'ريم محمد', '1990-01-05', 'الصحافة', 2, '0185236978', 'reem@gmail.com', 4, 11, '2018-01-01', 'بكلاريوس', 'ج ق س ش م/ 10', 'كامل', 2500, 1000, 3500),
(11, 2, 'احمد ياسين', '1970-01-05', 'المعمورة', 1, '0974125896', 'ahmedyaseen@gmail.com', 4, 15, '2018-01-01', 'دكتوراة', 'ج ق س ع/ 11', 'كامل', 3000, 1000, 4000),
(12, 2, 'خالد', '1999-01-01', 'الرياض', 1, '00249960871600', 'khalid@gmail.com', 3, 14, '2018-01-01', 'ماجستير', 'ج ق س ع/ 12', 'جزئي', 3000, 3000, 6000),
(13, 1, 'سمير محمد', '1980-02-05', 'جبرة', 1, '0974125896', 'samer@gmail.com', 1, 1, '2018-01-01', 'بكلاريوس', 'ج ق س ش م/ 13', 'كامل', 3000, 1000, 4000),
(14, 2, 'سمية عبد الرحيم', '1975-10-05', 'الصحافة', 2, '0974125896', 'somia@hotmail.com', 5, 18, '2017-01-01', 'ماجستير', 'ج ق س س/ 14', 'جزئي', 2000, 1000, 3000),
(15, 2, 'النجومي مبارك ', '1989-01-17', 'ابو ادم', 1, '0960871600', 'nejome@gmail.com', 5, 18, '2018-01-01', 'ماجستير', 'ج ق س ك ط/ 15', 'كامل', 2000, 1500, 3500);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `type` int(1) NOT NULL,
  `job_name` varchar(30) NOT NULL,
  `main_salary` int(11) NOT NULL,
  `leave_duration` int(11) NOT NULL,
  `branch_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `type`, `job_name`, `main_salary`, `leave_duration`, `branch_id`) VALUES
(1, 1, 'مدير شؤون الموظفين', 3000, 45, 1),
(2, 2, 'عميد كلية طب', 3000, 45, 2),
(3, 1, 'محاسب', 3000, 45, 2),
(4, 2, 'عميد كلية طب', 3000, 45, 1),
(5, 2, 'استاذ مشارك', 2000, 45, 1),
(6, 1, 'مدير الإدارة التقنية', 2500, 45, 3),
(7, 1, 'مدخل بيانات', 1500, 30, 1),
(8, 2, 'مسجل كلية طب', 3000, 45, 1),
(9, 2, 'استاذ مشارك', 2000, 30, 1),
(10, 1, 'مدير ضبط الجودة', 5000, 30, 4),
(11, 1, 'نائب مدير ضبط الجودة', 2500, 30, 4),
(13, 1, 'عام', 3000, 30, 1),
(14, 2, 'عام', 3000, 30, 3),
(15, 2, 'عميد كلية علوم الحاسوب', 3000, 30, 4),
(16, 1, 'ضابط الجودة التقنية', 5000, 30, 4),
(17, 1, 'مدير الإدارة الإحصائية', 3000, 30, 6),
(18, 2, 'مساعد تدريس', 2000, 30, 5),
(19, 1, 'مدير الخدمات الاجتماعية', 3000, 30, 7);

-- --------------------------------------------------------

--
-- Table structure for table `leaves_information`
--

CREATE TABLE `leaves_information` (
  `employee_id` int(11) NOT NULL,
  `leave_duration` int(11) NOT NULL,
  `available_days` int(11) NOT NULL,
  `last_leave` date DEFAULT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leaves_information`
--

INSERT INTO `leaves_information` (`employee_id`, `leave_duration`, `available_days`, `last_leave`, `last_update`) VALUES
(1, 45, 45, NULL, '2018-08-14'),
(2, 45, 45, NULL, '2018-08-15'),
(3, 45, 45, NULL, '2018-08-14'),
(4, 45, 19, '2018-08-11', '2018-08-27'),
(5, 45, 0, NULL, NULL),
(6, 45, 45, NULL, '2018-08-14'),
(7, 30, 0, NULL, NULL),
(8, 45, 0, NULL, NULL),
(9, 45, 0, NULL, NULL),
(10, 45, 0, NULL, NULL),
(11, 45, 0, NULL, NULL),
(12, 45, 0, NULL, NULL),
(13, 45, 0, NULL, NULL),
(14, 45, 45, NULL, '2018-08-15'),
(15, 45, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leaves_requests`
--

CREATE TABLE `leaves_requests` (
  `request_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `post_date` date NOT NULL,
  `type` int(1) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `notes` text,
  `manager_notes` text,
  `admin_notes` text,
  `position` int(1) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leaves_requests`
--

INSERT INTO `leaves_requests` (`request_id`, `employee_id`, `post_date`, `type`, `from_date`, `to_date`, `notes`, `manager_notes`, `admin_notes`, `position`, `status`) VALUES
(2, 4, '2018-08-09', 2, '2018-08-15', '2018-08-21', 'ارغب في الحصول علي هذه الاجازة للسفر لحضور زواج اختي', 'ساجعل القرار لموظف شؤون الافراد فقط', 'انا لا اوافق', 3, 0),
(3, 4, '2018-08-09', 2, '2018-08-09', '2018-08-11', 'ارغب في الحصول علي اجازتي لو سمحت ', 'لا يمكن', 'لا توجد', 3, 1),
(4, 2, '2018-08-12', 3, '2018-08-15', '2018-09-28', 'ارغب في الحصول علي الاجازة في اقرب وقت ممكن ', NULL, 'لا اقبل', 2, 2),
(5, 4, '2018-08-13', 2, '2018-09-20', '2018-09-30', 'لا توجد ملاحظات', 'اوافق', 'لا توجد', 3, 1),
(6, 4, '2018-08-15', 1, '2018-08-01', '2018-10-08', 'لا توجد ملاحظات', 'لا توجد', 'لا توجد', 3, 0),
(7, 2, '2018-08-16', 3, '2018-08-17', '2018-09-17', 'لا توجد ملاحظات', NULL, NULL, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `managements`
--

CREATE TABLE `managements` (
  `management_id` int(5) NOT NULL,
  `management_name` varchar(50) NOT NULL,
  `management_symbol` varchar(5) NOT NULL,
  `management_manager` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `managements`
--

INSERT INTO `managements` (`management_id`, `management_name`, `management_symbol`, `management_manager`) VALUES
(1, 'شؤون الموظفين', 'ش م', 1),
(2, 'المحاسبة', 'م ح', 3),
(3, 'الإدارة التقنية', 'إ ت ق', 5),
(4, 'الجودة', 'ج د', 9),
(5, 'العامة', 'ع', 1),
(6, 'الإحصائية', 'ح ص', 8),
(7, 'الخدمات الاجتماعية', 'خ ج', 10);

-- --------------------------------------------------------

--
-- Table structure for table `official_reports`
--

CREATE TABLE `official_reports` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `report_date` date NOT NULL,
  `r1` int(11) NOT NULL,
  `r2` int(11) NOT NULL,
  `recommendations` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `official_reports`
--

INSERT INTO `official_reports` (`id`, `employee_id`, `report_date`, `r1`, `r2`, `recommendations`) VALUES
(0, 10, '2018-08-15', 1, 8, '                     اوصي بالتجديد لها                ');

-- --------------------------------------------------------

--
-- Table structure for table `reports_requests`
--

CREATE TABLE `reports_requests` (
  `id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reports_requests`
--

INSERT INTO `reports_requests` (`id`, `manager_id`, `employee_id`, `type`, `branch_id`) VALUES
(5, 2, 7, 2, 1),
(6, 1, 6, 1, 1),
(7, 9, 10, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_emp_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `user_password` text NOT NULL,
  `last_seen` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_emp_id`, `user_type`, `user_password`, `last_seen`, `status`) VALUES
(1, 'fahad', 1, 1, '$2y$10$mmF4OR8sJchnQJ.xyHVYuufKfIyRCxgdqV2TEFKDkoqoCp82c5OX2', '2018-08-27 08:54:42', 0),
(2, 'awad', 3, 3, '$2y$10$LdDahKVRkF9u1YsV1RHDu.XCNZxEqs3Qa3MWPOGUczyDSNJV7eC5u', '2018-08-09 18:33:59', 0),
(3, 'omer123', 2, 2, '$2y$10$VCg011Efh2EHn34ONMOuzO0IjbUEsKhZcMJu3UfHCqL02Sn9eaZHm', '2018-08-26 05:34:14', 0),
(4, 'hanadi', 4, 4, '$2y$10$VCg011Efh2EHn34ONMOuzO0IjbUEsKhZcMJu3UfHCqL02Sn9eaZHm', '2018-08-16 04:11:36', 0),
(11, 'ali_omer', 7, 4, '$2y$10$.B9H5w5at.QTlXAll5BnwuHvSbWUJFlLfJZoHA943dsdZ1CyUzi9a', '2018-08-14 13:25:46', 0),
(14, 'ahmed', 9, 2, '$2y$10$gLGd2wRm79Z1hsigdKud8eEvpAFvNOy5TBu512HroF3Ec8mFHIkE2', '2018-08-16 13:12:42', 0),
(15, 'ahmed123', 11, 2, '$2y$10$HAr1JQB8ZAgKkpTKf5Vg5eb4XjLpOP4rvB8st0.WtsY.mvygTEpRi', '2018-08-16 03:49:49', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_reports`
--
ALTER TABLE `academic_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collages`
--
ALTER TABLE `collages`
  ADD PRIMARY KEY (`collage_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `leaves_requests`
--
ALTER TABLE `leaves_requests`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `managements`
--
ALTER TABLE `managements`
  ADD PRIMARY KEY (`management_id`);

--
-- Indexes for table `reports_requests`
--
ALTER TABLE `reports_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_reports`
--
ALTER TABLE `academic_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `collages`
--
ALTER TABLE `collages`
  MODIFY `collage_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `leaves_requests`
--
ALTER TABLE `leaves_requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `managements`
--
ALTER TABLE `managements`
  MODIFY `management_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reports_requests`
--
ALTER TABLE `reports_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
