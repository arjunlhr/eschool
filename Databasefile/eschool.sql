-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2020 at 06:40 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_db`
--

CREATE TABLE `admin_db` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `admin_pass` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `admin_db`
--

INSERT INTO `admin_db` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` text COLLATE utf8mb4_bin NOT NULL,
  `course_desc` text COLLATE utf8mb4_bin NOT NULL,
  `course_author` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `course_img` text COLLATE utf8mb4_bin NOT NULL,
  `course_duration` text COLLATE utf8mb4_bin NOT NULL,
  `course_price` int(11) NOT NULL,
  `course_original_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_desc`, `course_author`, `course_img`, `course_duration`, `course_price`, `course_original_price`) VALUES
(2, 'Html5 and CSS3', 'Build Responsive Real World Websites with HTML5 and CSS3', 'Arjun Lahare', '../img/courseimg/html5.png', '5 Days', 500, 5000),
(3, 'Javascript', 'Modern JavaScript from the beginning - all the way up to JS expert level! THE must-have JavaScript resource in 2020. (Beginner + Advance))', 'Prasad Lahare', '../img/courseimg/javascript.png', '10 days', 1000, 10000),
(4, 'Java Programming Masterclass for Software Developer', 'Learn Java In This Course And Become a Computer Programmer. Obtain valuable Core Java Skills And Java Certification', 'Shubham Lachure', '../img/courseimg/java.png', '7 Days', 700, 7000),
(5, 'Python (Learn Python from Zero to Hero)', 'his Python For Beginners Course Teaches You The Python Language Fast. Includes Python Online Training With Python 3', 'Yash Saxena', '../img/courseimg/python.jpg', '15 Days', 4000, 5000),
(6, 'Machine Learning A-Z', 'Learn how to use NumPy, Pandas, Seaborn , Matplotlib , Plotly , Scikit-Learn , Machine Learning, Tensorflow , and more!', 'Kedar Paropkari', '../img/courseimg/machinelearning.jpg', '20 Days', 20000, 40000),
(7, 'PHP', 'PHP for Beginners: learn everything you need to become a professional PHP developer with practical exercises & projects.', 'Kulkarni Sir ', '../img/courseimg/php.jpg', '25 Days', 1200, 4000);

-- --------------------------------------------------------

--
-- Table structure for table `courseorder`
--

CREATE TABLE `courseorder` (
  `co_id` int(11) NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `stu_email` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `course_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `respmsg` text COLLATE utf8mb4_bin NOT NULL,
  `amount` int(11) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `courseorder`
--

INSERT INTO `courseorder` (`co_id`, `order_id`, `stu_email`, `course_id`, `status`, `respmsg`, `amount`, `order_date`) VALUES
(1, 'ORDS94371585', 'arjunlhr820@gmail.com', 5, 'Success', 'Txn_success', 4000, '2020-12-09');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(11) NOT NULL,
  `f_content` text COLLATE utf8mb4_bin NOT NULL,
  `stu_id` int(11) NOT NULL,
  `stu_name` text COLLATE utf8mb4_bin NOT NULL,
  `stu_img` text COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `f_content`, `stu_id`, `stu_name`, `stu_img`) VALUES
(6, 'This is very good website to learning new technologies. ', 15, 'Arjun Lahare', '');

-- --------------------------------------------------------

--
-- Table structure for table `lession`
--

CREATE TABLE `lession` (
  `lession_id` int(11) NOT NULL,
  `lession_name` text COLLATE utf8mb4_bin NOT NULL,
  `lession_desc` text COLLATE utf8mb4_bin NOT NULL,
  `lession_link` text COLLATE utf8mb4_bin NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_name` text COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `lession`
--

INSERT INTO `lession` (`lession_id`, `lession_name`, `lession_desc`, `lession_link`, `course_id`, `course_name`) VALUES
(2, 'Course Introduction', 'This is introduction video', '../lessionvid/', 2, 'Html5 and CSS3'),
(3, 'Drive Into HTML', 'What is HTML? Why used HTML?', '../lessionvid/', 2, 'Html5 and CSS3'),
(4, 'Formating with CSS3', 'Basics of CSS3', '../lessionvid/', 2, 'Html5 and CSS3'),
(5, 'Web Design Basics', 'Introduction to web design', '../lessionvid/', 2, 'Html5 and CSS3'),
(6, 'The Killer Website Project', 'Make a Website like a pro', '../lessionvid/', 2, 'Html5 and CSS3'),
(7, 'Introduction to Javascript', 'Introduction', '../lessionvid/', 3, 'Javascript'),
(8, 'Basics: Variable, Data types, Operators & Functions', 'Module Introduction', '../lessionvid/', 3, 'Javascript'),
(9, 'Efficient Development and Debugging', 'Module Introduction', '../lessionvid/', 3, 'Javascript'),
(10, 'Working with if else statments', 'using if else statements', '../lessionvid/', 3, 'Javascript'),
(11, 'Functions', 'Functions vs Methods, Functions are Objects!', '../lessionvid/', 3, 'Javascript'),
(12, 'Introduction to Java', 'What is Java?', '../lessionvid/', 4, 'Java Programming Masterclass for Software Developer'),
(13, 'Software tool setup', 'Biggest Tip to Succeed as a Java Programmer', '../lessionvid/', 4, 'Java Programming Masterclass for Software Developer'),
(14, 'Java Tutorial : Expressions, Statments, Code Blocks, Methods and more', 'Introduction', '../lessionvid/', 4, 'Java Programming Masterclass for Software Developer'),
(15, 'Control Flow Statments', 'Number of Month', '../lessionvid/', 4, 'Java Programming Masterclass for Software Developer'),
(16, 'Class, Construction and Inheritance', 'what is class? what is Constructor, and Inheritance', '../lessionvid/', 4, 'Java Programming Masterclass for Software Developer'),
(17, 'Course Introduction', 'This is introduction video', '../lessionvid/', 5, 'Python (Learn Python from Zero to Hero)'),
(18, 'Install and Setup', 'Python for Windows', '../lessionvid/', 5, 'Python (Learn Python from Zero to Hero)'),
(19, 'Steeping into world of python', 'Our First Program Python', '../lessionvid/', 5, 'Python (Learn Python from Zero to Hero)'),
(20, 'Program flow control in python', 'Introduction to Blocks and Statements', '../lessionvid/', 5, 'Python (Learn Python from Zero to Hero)'),
(21, 'List and Tuples', 'Introduction to Sequence Types', '../lessionvid/', 5, 'Python (Learn Python from Zero to Hero)'),
(22, 'Course Introduction', 'This is introduction video', '../lessionvid/', 6, 'Machine Learning A-Z'),
(23, 'Environment Set-up', 'Python Environment Setup', '../lessionvid/', 6, 'Machine Learning A-Z'),
(24, 'Python Cash Course', 'Welcome to the Python Crash Course Section!', '../lessionvid/', 6, 'Machine Learning A-Z'),
(25, 'Python Data Analysis Numpy Module', 'Introduction to Numpy', '../lessionvid/', 6, 'Machine Learning A-Z'),
(26, 'Python Data Analysis Pandas Module', 'Python Data Analysis Pandas Module', '../lessionvid/', 6, 'Machine Learning A-Z'),
(27, 'Python for Data Visulation', 'Introduction to Seaborn', '../lessionvid/', 6, 'Machine Learning A-Z'),
(28, 'Course Introduction', 'This is introduction video', '../lessionvid/', 7, 'PHP'),
(29, 'Data Types and More', 'Variable in PHp, Math, Arrays', '../lessionvid/', 7, 'PHP'),
(30, 'Control structure', 'if statment else etc.', '../lessionvid/', 7, 'PHP'),
(31, 'How to use form data in php', 'checking for form submission', '../lessionvid/', 7, 'PHP'),
(32, 'PHP Built in function', 'Math Function string function Array Function', '../lessionvid/', 7, 'PHP');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stu_id` int(11) NOT NULL,
  `stu_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `stu_email` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `stu_pass` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `stu_occ` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `stu_img` text COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stu_id`, `stu_name`, `stu_email`, `stu_pass`, `stu_occ`, `stu_img`) VALUES
(15, 'Arjun Lahare', 'arjunlhr820@gmail.com', 'arjunlahare', 'postgraduate', '../img/student/Arjun.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_db`
--
ALTER TABLE `admin_db`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `courseorder`
--
ALTER TABLE `courseorder`
  ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `lession`
--
ALTER TABLE `lession`
  ADD PRIMARY KEY (`lession_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_db`
--
ALTER TABLE `admin_db`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `courseorder`
--
ALTER TABLE `courseorder`
  MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lession`
--
ALTER TABLE `lession`
  MODIFY `lession_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
