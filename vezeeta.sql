-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2025 at 05:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vezeeta`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(50) NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `doctor_id` int(50) NOT NULL,
  `clinic_location` varchar(1024) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `centers`
--

CREATE TABLE `centers` (
  `id` int(11) NOT NULL,
  `image` varchar(1024) NOT NULL,
  `center` varchar(40) NOT NULL,
  `number` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `logo` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `centers`
--

INSERT INTO `centers` (`id`, `image`, `center`, `number`, `location`, `logo`) VALUES
(1, 'photos/1.jpg', 'مصر الحديثة', '28 تخصص', 'الدقي والمهندسين', 'photos/l1.jpg'),
(2, 'photos/2.jpg', 'تكنو', '21 تخصص', 'الدقي والمهندسين', 'photos/l2.jpg'),
(3, 'photos/3.jpg', 'جولدن كير', '10 تخصصات', 'الشروق', 'photos/l3.jpg'),
(4, 'photos/4.jpeg', 'فيري التخصصية', '10 تخصصات', 'الشيخ زايد', 'photos/l4.jpg'),
(9, 'photos/5.jpg', 'دكتور كير', '13 تخصص', 'الشيخ زايد', 'photos/l5.jpg'),
(10, 'photos/6.jpg', 'جرانتي', 'تخصص واحد', 'مدينة نصر / الشيخ زايد', 'photos/l6.jpg'),
(11, 'photos/7.jpeg', 'ايف د \\ شيماء محمود', 'تخصص واحد', 'مدينة نصر', 'photos/l7.jpg'),
(12, 'photos/8.jpg', 'الكوثر كلينيك', '20 تخصص', 'ميدان الجيزة \\ الدقي', 'photos/l8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `speciality` varchar(200) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `speciality`, `image_url`, `description`) VALUES
(1, 'د. أحمد علي', 'أخصائي قلب', 'images/ahmed.jfif', 'خبرة أكثر من 10 سنوات في علاج أمراض القلب.'),
(2, 'د. سارة محمد', 'أخصائية جلدية', 'images/sara.jfif', 'متخصصة في علاج الأمراض الجلدية والتجميل.'),
(3, 'د. على سمير', 'أخصائي عيون', 'images/ali.jfif', 'خبرة واسعة في جراحات العيون والليزك.'),
(4, 'د. امير محسن', 'أخصائي أطفال', 'images/amir.jfif', 'متخصصة في طب الأطفال وحديثي الولادة.'),
(5, 'د. اسماء إبراهيم', 'أخصائية عظام', 'images/asmaa.jfif', 'خبرة في علاج إصابات العظام والمفاصل.'),
(6, 'د. هانى محمود', 'أخصائي نساء وتوليد', 'images/hany.jfif', 'متخصصة في الحمل والولادة والعقم.'),
(7, 'د. مها عبد الله', 'أخصائية مخ وأعصاب', 'images/maha.jfif', 'متخصص في أمراض المخ والجهاز العصبي.'),
(8, 'د. معاذ فؤاد', 'أخصائي أسنان', 'images/moaz.jfif', 'خبرة في تجميل وعلاج الأسنان.'),
(9, 'د. محمد كمال', 'أخصائي مسالك بولية', 'images/mohamed.jfif', 'خبرة في جراحات الكلى والمسالك.'),
(10, 'د. عمر علي', 'أخصائي تخسيس وتغذية', 'images/omar.jfif', 'تساعد في وضع برامج غذائية صحية.'),
(11, 'د. اسامة حسن', 'أخصائي أنف وأذن وحنجرة', 'images/osama.jfif', 'خبرة في جراحات الأنف والجيوب الأنفية.'),
(12, 'د. صلاح شريف', 'أخصائي نفسية', 'images/salah.jfif', 'متخصصة في العلاج النفسي والسلوكي.'),
(13, 'د. سمير جلال', 'أخصائي باطنة', 'images/sameer.jfif', 'خبرة في علاج أمراض الباطنة والجهاز الهضمي.'),
(14, 'د. شيماء عمر', 'أخصائية جلدية', 'images/shaima.jfif', 'متخصصة في علاج حب الشباب والتجميل.'),
(15, 'د. تسنيم عبد السلام', 'أخصائية عظام', 'images/tasneem.jfif', 'متخصص في جراحات العظام والكسور.');

-- --------------------------------------------------------

--
-- Table structure for table `doctors1`
--

CREATE TABLE `doctors1` (
  `id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `location` varchar(40) NOT NULL,
  `Specialization` varchar(40) NOT NULL,
  `img` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors1`
--

INSERT INTO `doctors1` (`id`, `name`, `location`, `Specialization`, `img`) VALUES
(20, 'د. أحمد عبدالعاطي', 'القاهرة', 'قلب وجراحة أوعية', 'photosDrs/up/1.jpg'),
(21, 'د. محمد صلاح', 'الإسكندرية', 'باطنة', 'photosDrs/up/2.jpg'),
(22, 'د. يوسف الشاذلي', 'الإسكندرية', 'عيون', 'photosDrs/up/3.jpg'),
(23, 'د. إبراهيم يوسف', 'الغربية', 'جراحة عامة', 'photosDrs/up/4.jpg'),
(24, 'د. كريم طاهر', 'المنيا', 'مسالك بولية', 'photosDrs/up/5.jpg'),
(25, 'د. علاء حامد', 'أسيوط', 'مخ وأعصاب', 'photosDrs/up/6.jpg'),
(26, 'د. سامح إبراهيم', 'الإسكندرية', 'عظام', 'photosDrs/up/7.jpg'),
(27, 'د. هشام مرسي', 'سوهاج', 'سمنة وتغذية', 'photosDrs/up/8.jpg'),
(28, 'د. كريم المنشاوي', 'بورسعيد', 'طب رياضي', 'photosDrs/up/9.jpg'),
(29, 'د. عمرو غانم', 'الفيوم', 'أمراض القلب للأطفال', 'photosDrs/up/10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `doctors2`
--

CREATE TABLE `doctors2` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `Specialization` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `img` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors2`
--

INSERT INTO `doctors2` (`id`, `name`, `Specialization`, `location`, `img`) VALUES
(1, 'د. محمود حسن', 'قلب', 'القاهرة', 'photosDrs/down/1.jpg'),
(2, 'د. خالد فؤاد', 'باطنة', 'الجيزة', 'photosDrs/down/2.jpg'),
(3, 'د. عمر الجمل', 'جراحة عامة', 'الإسكندرية', 'photosDrs/down/3.jpg'),
(4, 'د. طارق عبدالسلام', 'جلدية', 'القاهرة', 'photosDrs/down/4.jpg'),
(5, 'د. أحمد الجوهري', 'أنف وأذن وحنجرة', 'قنا', 'photosDrs/down/5.jpg'),
(6, 'د. مصطفى عادل', 'أورام', 'السويس', 'photosDrs/down/6.jpg'),
(7, 'د. حازم مجدي', 'أطفال', 'الدقهلية', 'photosDrs/down/7.jpg'),
(8, 'د. أيمن ربيع', 'تخدير', 'الجيزة', 'photosDrs/down/8.jpg'),
(9, 'د. هيثم فوزي', 'مسالك بولية', 'كفر الشيخ', 'photosDrs/down/9.jpg'),
(10, 'د. علاء عبدالسلام', 'مخ وأعصاب', 'أسوان', 'photosDrs/down/10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `ID` int(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`ID`, `first_name`, `last_name`, `email`, `number`, `password`, `gender`, `birthdate`) VALUES
(1, 'سامر', 'ابراهيم', 'samermohamed123@yahoo.com', 1228273237, '123456', 'male', '0025-02-25'),
(2, 'سامر', 'ابراهيم', 'samermohamed123@yahoo.com', 1228273237, '2222', 'female', '2525-02-25'),
(3, 'سامر', 'ابراهيم', 'samermohamed123@yahoo.com', 1228273237, '2222', 'female', '2525-02-25'),
(4, 'سامر', 'ابراهيم', 'samermohamed123@yahoo.com', 1228273237, '2222', 'female', '2525-02-25'),
(5, 'سامر', 'ابراهيم', 'samermohamed123@yahoo.com', 1228273237, '1111111111', 'female', '2004-05-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `centers`
--
ALTER TABLE `centers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors1`
--
ALTER TABLE `doctors1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors2`
--
ALTER TABLE `doctors2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `centers`
--
ALTER TABLE `centers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `doctors1`
--
ALTER TABLE `doctors1`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `doctors2`
--
ALTER TABLE `doctors2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
