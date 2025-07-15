-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2025 at 07:48 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `protech`
--

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `course_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `title`, `course_id`, `description`, `created_at`) VALUES
(8, 'HTML', 1, ' lkfdlk   lek kfelkd lk slfkdsl fkdfl sk fdk kfl dfk fdl ldfks lfk sdlfk dslksd lkflkds fkdl skdflk dlfks fsd lkfdlk   lek kfelkd lk slfkdsl fkdfl sk fdk kfl dfk fdl ldfks lfk sdlfk dslksd lkflkds fkdl skdflk dlfks fsd', '2024-06-20 08:14:00'),
(9, 'CSS', 1, 'n smd mdsn sad sndms nmdnsa dnsam dnmas nasmnd asmnd msan mandsamna smdnams dna smdnadm,nas ,dmans d,', '2024-06-20 08:11:52'),
(10, 'Bootstrap', 1, ' iosudioas dui js ajd jiosdjaiodu aiud si udiu isoau diaus iau dasiou d adisua idu ioasudi oaudiasu dioasu das', '2024-06-20 08:12:03'),
(11, 'PHP', 2, ' fhsdjf hdjsfh jshf jdfhdsj hfdsjh fjdsh fjsdh fjsh jdfj hjf hs jfhj hdsf jhsdjfhd jfhsdj fhdsj hfjds hfjsdh fjsdh fjsd hfkjsd', '2024-06-20 08:12:12'),
(12, 'Microsoft Word', 3, ' osd doasd pa posdo aspa dpsao dpos pdoas podap oas pd od spdoasp daos pasod asdpo apdo apd padpa sdopa sodap sd', '2024-06-20 08:12:22'),
(13, 'Basic Photoshop Course', 1, ' kdfjnm n dnsm nsmns fnsd fsdnf sdnf sndf sdnf sdnf sdfn sdmnf sdmfnsmdf nsdmfn sdmfns fnsdmfnsdm f ndsmfnds mf ndsmfnds mf,nd', '2024-06-20 08:12:31'),
(14, 'Basic Java Script Course', 1, ' hfhwuehfwfuh wfh  weuhf wuhf whf whfuw hfuwehf wuehf uwhfu whf uwe hfweuhf weufh wuefh wuefhw ufhwe ufhweu fhw uihfweu fh uwhfuw hfu hw hwuehf wufh ', '2024-06-20 08:12:43'),
(16, 'Mirosoft Excel', 3, 'basic microsoft excel lessons basic microsoft excel lessons basic microsoft excel lessons basic microsoft excel lessons basic microsoft excel lessons ', '2024-06-20 07:32:28');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `type` varchar(100) NOT NULL,
  `fee` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `duration_year` int(11) NOT NULL,
  `duration_month` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `description`, `content`, `type`, `fee`, `image`, `duration_year`, `duration_month`, `subject_id`, `created_at`) VALUES
(1, 'Web Design Course', 'Design your first website from scratch!', 'Wanna build your own website but don’t know where to start? This beginner-friendly Web Design Course is the perfect way to learn how websites work — and how to design your own from zero! ?✨\r\n\r\nIn this course, you’ll learn the core tools of web design:\r\n? HTML (structure),\r\n? CSS (style),\r\n? and a little bit of JavaScript (interaction).\r\n\r\nWe’ll guide you through creating real web pages step-by-step — from planning and wireframing, to writing code, adding images, styling with CSS, and even making it mobile-friendly ??‍?\r\n\r\nYou’ll also learn the basics of UI/UX design, good layout practices, and how to keep your websites user-friendly and responsive. No prior coding experience needed — just bring your creativity!', 'video', 600000, 'Web-Designing-Courses-for-Beginners.jpg', 1, 0, 1, '2025-07-08 04:28:45'),
(2, 'Web Development Course', 'Build websites like a pro! ?✨', 'Ready to become a web developer? ? This course is your all-in-one starter guide to learning how websites are built — from frontend to backend. Perfect for beginners who want to code, create, and launch real websites from scratch!\r\n\r\nYou’ll start with the basics of how the web works, then learn to build websites using:\r\n\r\nHTML (structure)\r\n\r\nCSS (style)\r\n\r\nJavaScript (interactivity)\r\n\r\nand backend fundamentals (like PHP, MySQL or Node.js depending on your stack)\r\n\r\nThrough hands-on lessons and real-world projects, you\'ll understand both the frontend (what users see) and backend (what runs behind the scenes). We’ll also cover debugging, developer tools, and version control using Git & GitHub.', 'video', 600000, 'web-development.png', 2, 0, 1, '2025-07-08 04:31:48'),
(3, 'Computer Basic Course', 'Start your digital journey here! ?️✨', 'This beginner-friendly course is perfect for anyone who wants to start using a computer confidently. Whether you\'re a student, office worker, or complete beginner, this course teaches you everything you need to know — step by step, from zero! ?✨\r\n\r\nYou’ll learn how to use a mouse and keyboard, manage files and folders, explore basic software like Microsoft Word and Excel, and understand how to browse the internet safely. We\'ll also introduce you to emails, online forms, and basic troubleshooting skills.\r\n\r\nNo tech experience? No problem! Every lesson is designed with easy explanations, real-life practice, and clear visuals to help you follow along comfortably. By the end, you\'ll be able to use a computer for work, school, or daily life with confidence.', 'video', 0, '1.png', 0, 3, 1, '2025-07-08 04:25:10'),
(12, 'A+ Hardware Course', 'Learn computer hardware from zero! ??', 'This course is your first step into the world of IT! ? Whether you’re a total beginner, a student preparing for the CompTIA A+ exam, or just curious about how computers work — this course will guide you through all the basics of computer hardware.\r\n\r\nYou’ll explore everything from identifying components like CPU, RAM, and motherboard to building a computer from scratch. We’ll also cover hard drives, SSDs, ports, power supplies, and even common troubleshooting steps.\r\n\r\nEach module includes real-life examples, easy explanations, and hands-on tasks to help you truly understand how computers function. You don’t need any prior experience — just a curious mind and the drive to learn!', 'video', 100000, 'cpu-hardware-digital-art-computer-wallpaper-preview.jpg', 0, 3, 1, '2025-07-08 04:20:25'),
(19, 'LCCI Level 1', 'Master accounting principles & skills!', 'Ready to kickstart your career in accounting or finance? This Accounting LCCI Course is designed to give you a solid understanding of essential accounting principles and practices, fully aligned with the LCCI (London Chamber of Commerce and Industry) exam standards.\r\n\r\nYou’ll learn everything from bookkeeping basics, financial statements, and journals to more advanced topics like trial balance, ledger accounts, and final accounts preparation. The course also covers key concepts in cost accounting and financial management to prepare you for real-world business scenarios.\r\n\r\nWith clear explanations, practical examples, and exam-focused exercises, this course is perfect for students, professionals, and anyone aiming to pass the LCCI accounting exams and improve their finance skills.', 'video', 50000, 'images.jpg', 0, 3, 3, '2025-07-08 04:33:21'),
(21, 'Beginner English for Kids', 'A fun and easy English course for kids aged 4–8!', 'This beginner English course is specially designed for kids aged 4 to 8. With fun lessons, bright visuals, songs, and playful activities, children will learn basic English words, simple phrases, ABCs, numbers, colors, and more!\r\n\r\nEach lesson is short and easy to follow — perfect for young learners with short attention spans. The course focuses on helping kids build confidence in speaking and understanding English naturally, through repetition and fun!\r\n\r\nBy the end of this course, your child will be able to say simple sentences, introduce themselves, recognize key vocabulary, and enjoy using English every day. Whether you\'re a parent or a teacher, this course is a great first step to help your child start their English journey with joy and excitement! ???', 'Video', 150000, 'images.png', 0, 3, 2, '2025-07-08 04:59:30'),
(22, 'GED', 'Pass your GED and open new doors!', 'Want to earn your high school equivalency and unlock new opportunities? This GED Preparation Course is designed to help you pass the GED exam with confidence! Whether you left school early, changed paths, or just want a second chance — this course supports you every step of the way. ?✨', 'Video', 200000, 'Screenshot (102).png', 0, 6, 9, '2025-07-08 04:58:56'),
(23, 'Buddha’s Teachings for Young Hearts', 'Learn the path of peace, kindness, and wisdom', 'This Dhamma School Course is a gentle and inspiring introduction to the teachings of the Buddha, specially designed for children and young learners. Through stories, reflection, and simple practices, students will learn how to live with kindness, mindfulness, and wisdom. ??‍♀️?\r\n\r\nThe course covers the foundations of Buddhist values, moral conduct, and daily mindfulness in a way that is easy to understand and joyful to practice. Perfect for children ages 6–16, this course nurtures both the heart and mind through guided teachings, activities, chanting, and real-life examples.', 'video', 10000, '61.jpg', 0, 3, 10, '2025-07-08 06:00:14');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `course_id`, `feedback`, `created_at`) VALUES
(2, 33, 20, 'Bro Peter, What are you talking about ?', '2024-09-11 10:46:14'),
(3, 17, 20, 'Actually I was desperately curious how a chat system works behind. This course helped me to understand about websocket . Thanks a million, Sir.', '2024-09-11 10:47:42'),
(4, 30, 20, 'Good', '2024-11-25 09:44:26'),
(5, 21, 20, 'good way of teaching to understand code, But I want the instructor to remind about the client to server, server to client part not to repeat. He say it again and again. Except that, all of his teaching is the best.', '2024-12-17 04:39:09');

-- --------------------------------------------------------

--
-- Table structure for table `main_subjects`
--

CREATE TABLE `main_subjects` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `main_subjects`
--

INSERT INTO `main_subjects` (`id`, `subject_name`, `created_at`, `updated_at`) VALUES
(1, 'IT', '2024-08-15 04:39:24', '2024-08-15 04:39:24'),
(2, 'Language', '2024-08-15 04:39:24', '2024-08-15 04:39:24'),
(3, 'Accounting', '2024-08-15 04:39:24', '2024-08-15 04:39:24'),
(9, 'Education', '2025-07-08 04:46:03', '2025-07-08 04:46:03'),
(10, 'Dhamma School', '2025-07-08 05:56:08', '2025-07-08 05:56:08');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL,
  `request_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `accept_date` date NOT NULL,
  `expire_date` date DEFAULT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `request_date`, `user_id`, `course_id`, `accept_date`, `expire_date`, `status`) VALUES
(36, '2024-08-16', 21, 3, '2024-08-16', '2024-11-16', 'yes'),
(37, '2025-04-30', 33, 1, '2025-04-30', '2026-04-30', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `request_users`
--

CREATE TABLE `request_users` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `payment_photo` varchar(255) NOT NULL,
  `payment_method` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2024-05-30 05:12:57', '2024-05-30 05:12:57'),
(2, 'user', '2024-05-30 05:13:19', '2024-05-30 05:13:19');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `updated_at`, `created_at`) VALUES
(4, 1, 15, '2024-05-30 08:51:16', '2024-05-30 08:51:16'),
(6, 2, 17, '2024-05-30 09:00:06', '2024-05-30 09:00:06'),
(10, 2, 21, '2024-05-30 10:13:46', '2024-05-30 10:13:46'),
(11, 1, 22, '2024-05-30 10:50:27', '2024-05-30 10:50:27'),
(14, 2, 25, '2024-07-03 18:24:22', '2024-07-03 18:24:22'),
(17, 2, 28, '2024-07-04 23:35:08', '2024-07-04 23:35:08'),
(18, 1, 29, '2024-09-10 09:28:29', '2024-09-10 09:28:29'),
(19, 1, 30, '2024-09-10 09:36:51', '2024-09-10 09:36:51'),
(22, 2, 33, '2024-09-11 09:12:41', '2024-09-11 09:12:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text DEFAULT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `password` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `created_at`, `updated_at`) VALUES
(17, 'Tommy', 'tommy@gmail.com', '$2y$10$.aUrGU4taSXzZfoi8tl9.u7Ak6DoE3URW5Edn7r9HJnDaKq9gO6OK', 'WIN_20210705_12_00_32_Pro.jpg', '2024-05-30 09:00:06', '2024-07-31 19:29:20'),
(21, 'Peter', 'peter@gmail.com', '$2y$10$r9SS0YvzYPiLqUnS3foFU.hbt9ZIXWUqF8797YuQ6u3Krh41BW7Iq', 'kaungkhant.jpg', '2024-05-30 10:13:46', '2024-07-31 19:11:27'),
(22, 'Administrator', 'admin@gmail.com', '$2y$10$OLcpsutAesNPfupssaKvN.Pi58Qw88H.rm6eVtMvNUtjh.DyRcLPG', '', '2024-05-30 10:50:27', '2024-05-29 19:13:06'),
(28, 'ThawHtooZin', 'thawhtoozin@gmail.com', '$2y$10$yqaDoiv.9OPsLflvM/yvbO4uYAWawGXOnLBPBLjp287pMGzIulccq', '', '2024-07-04 23:35:08', '2024-08-01 06:02:57'),
(30, 'Myat Thu', 'myatthu@gmail.com', '$2y$10$EfJLYxlwnWTqIQYZA7tHMeqEXIqqVkXwMAArQRp09CXpZ9Xl1xMUS', 'mt.jpg', '2024-09-10 09:36:51', '2024-09-10 09:36:51'),
(33, 'Hla Min Soe', 'hlaminsoe@gmail.com', '$2y$10$QuJ3tnELB3IBDsnbOmsknufddYZ7honoRIHJi0leoTfBdmcF0ds6m', 'Screen-Shot-2023-07-16-at-2.25-Photoroom.png', '2024-09-11 09:12:41', '2024-09-11 05:12:31');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video_order` int(11) DEFAULT 1,
  `video_url` text DEFAULT NULL,
  `course_id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `video_order`, `video_url`, `course_id`, `chapter_id`, `title`, `description`, `updated_at`, `created_at`) VALUES
(4, 1, '../videos/HTML Basic Tutorial/Lesson 1 HTML Basic Frame and Header.mkv', 1, 8, 'Lesson-1', 'jh hj hjs hjfh hf jdsh fjshf jds h', '2024-06-20 04:24:49', '2024-06-20 04:24:49'),
(5, 1, '../videos/test/WIN_20220926_15_22_22_Pro.mp4', 3, 12, 'Lesson-1', 'JSFjdsf jdlk jl jdlf JLFDS JS DJLDS JSDJ SLDFJ  sFJ F', '2024-06-20 07:36:30', '2024-06-20 07:36:30'),
(6, 2, '../videos/HTML Basic Tutorial/Lesson 2 customization tags.mkv', 1, 8, 'Lesson-2', ' kjds kdjf kfjdk sjfk jsfdk jfkl ', '2024-06-20 07:45:58', '2024-06-20 07:45:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_subjects`
--
ALTER TABLE `main_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_users`
--
ALTER TABLE `request_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `main_subjects`
--
ALTER TABLE `main_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `request_users`
--
ALTER TABLE `request_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
