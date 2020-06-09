-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2019 at 07:31 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `userid` varchar(10) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userid`, `password`) VALUES
('151fa04070', 'Naveen#97.');

-- --------------------------------------------------------

--
-- Table structure for table `attempts`
--

CREATE TABLE `attempts` (
  `regid` int(11) NOT NULL,
  `qno` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `mark` int(11) NOT NULL,
  `answer` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attempts`
--

INSERT INTO `attempts` (`regid`, `qno`, `view`, `mark`, `answer`) VALUES
(53, 1, 1, 0, 'a'),
(53, 2, 1, 0, 'b'),
(53, 3, 1, 0, 'd'),
(53, 4, 1, 0, 'b'),
(53, 5, 1, 0, 'a'),
(53, 6, 1, 0, 'a'),
(53, 7, 1, 0, 'b'),
(53, 8, 1, 0, 'c'),
(53, 9, 1, 0, 'b'),
(53, 10, 1, 0, 'c'),
(54, 1, 1, 0, 'd'),
(54, 2, 0, 0, 'a'),
(54, 3, 1, 0, 'b'),
(54, 4, 0, 1, ''),
(54, 5, 0, 0, ''),
(54, 6, 1, 0, 'c'),
(54, 7, 0, 0, 'd'),
(54, 8, 1, 0, 'a'),
(54, 9, 1, 0, 'd'),
(54, 10, 0, 0, 'd'),
(55, 1, 1, 0, 'b'),
(55, 2, 1, 0, 'a'),
(55, 3, 1, 0, 'd'),
(55, 4, 0, 0, 'c'),
(55, 5, 1, 0, 'b'),
(55, 6, 1, 0, 'c'),
(55, 7, 0, 0, 'a'),
(55, 8, 0, 0, ''),
(55, 9, 0, 0, ''),
(55, 10, 0, 0, ''),
(56, 1, 1, 0, 'b'),
(56, 2, 1, 0, 'a'),
(56, 3, 1, 0, 'd'),
(56, 4, 1, 0, 'c'),
(56, 5, 1, 0, 'a'),
(56, 6, 1, 0, 'b'),
(56, 7, 1, 0, 'd'),
(56, 8, 1, 0, 'a'),
(56, 9, 1, 0, 'd'),
(56, 10, 0, 0, 'c'),
(57, 1, 1, 0, 'b'),
(57, 2, 1, 0, 'a'),
(57, 3, 1, 0, ''),
(57, 4, 1, 0, ''),
(57, 5, 1, 0, ''),
(57, 6, 1, 0, ''),
(57, 7, 1, 0, 'd'),
(57, 8, 1, 0, ''),
(57, 9, 1, 0, ''),
(57, 10, 1, 0, ''),
(58, 1, 1, 0, ''),
(58, 2, 1, 0, ''),
(58, 3, 0, 0, ''),
(58, 4, 0, 0, ''),
(58, 5, 0, 0, ''),
(58, 6, 0, 0, 'c'),
(58, 7, 1, 0, 'd'),
(58, 8, 1, 0, 'c'),
(58, 9, 1, 0, 'd'),
(58, 10, 0, 0, 'a'),
(59, 1, 1, 0, 'a'),
(59, 2, 1, 0, ''),
(59, 3, 1, 0, ''),
(59, 4, 1, 0, 'd'),
(59, 5, 1, 0, 'c'),
(59, 6, 1, 0, 'a'),
(59, 7, 1, 0, 'd'),
(59, 8, 1, 0, 'b'),
(59, 9, 1, 0, 'c'),
(59, 10, 0, 0, ''),
(60, 1, 0, 0, 'b'),
(60, 2, 0, 0, ''),
(60, 3, 0, 0, ''),
(60, 4, 0, 0, ''),
(60, 5, 0, 0, ''),
(60, 6, 0, 0, ''),
(60, 7, 0, 0, ''),
(60, 8, 0, 0, ''),
(60, 9, 0, 0, ''),
(60, 10, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `enrolls`
--

CREATE TABLE `enrolls` (
  `regid` int(11) NOT NULL,
  `rollno` varchar(10) NOT NULL,
  `tid` varchar(10) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrolls`
--

INSERT INTO `enrolls` (`regid`, `rollno`, `tid`, `status`) VALUES
(53, '151fa04070', 'C001', 3),
(54, '151fa04118', 'C001', 6),
(55, '151fa04170', 'C001', 4),
(56, '151fa04101', 'C001', 2),
(57, '151fa04261', 'C001', 2),
(58, '151fa04109', 'C001', 6),
(59, '151fa04297', 'C001', 3),
(60, '151fa04111', 'C001', 2);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `tid` varchar(10) NOT NULL,
  `qno` int(11) NOT NULL,
  `question` longtext NOT NULL,
  `opta` longtext NOT NULL,
  `optb` longtext NOT NULL,
  `optc` longtext NOT NULL,
  `optd` longtext NOT NULL,
  `answer` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`tid`, `qno`, `question`, `opta`, `optb`, `optc`, `optd`, `answer`) VALUES
('C001', 1, 'Suppose that in a C program snippet, followings statements are used.\r\n\r\ni) sizeof(int);\r\nii) sizeof(int*);\r\niii) sizeof(int**);\r\n\r\nAssuming size of pointer is 4 bytes and size of int is also 4 bytes, pick the most correct answer from the given options.', 'Only i) would compile successfully and it would return size as 4.', 'i), ii) and iii) would compile successfully and size of each would be same i.e. 4', 'i), ii) and iii) would compile successfully but the size of each would be different and would be decided at run time.', 'ii) and iii) would result in compile error but i) would compile and result in size as 4.', 'b'),
('C001', 2, 'Assume int is 4 bytes, char is 1 byte and float is 4 bytes. Also, assume that pointer size is 4 bytes (i.e. typical case)\r\nchar *pChar;\r\nint *pInt;\r\nfloat *pFloat;\r\n \r\nsizeof(pChar);\r\nsizeof(pInt);\r\nsizeof(pFloat);\r\nWhat’s the size returned for each of sizeof() operator?', '4 4 4', '1 4 4', '1 4 8', 'None of the above', 'a'),
('C001', 3, '#include "stdlib.h"\r\nint main()\r\n{\r\n int *pInt;\r\n int **ppInt1;\r\n int **ppInt2;\r\n \r\n pInt = (int*)malloc(sizeof(int));\r\n ppInt1 = (int**)malloc(10*sizeof(int*));\r\n ppInt2 = (int**)malloc(10*sizeof(int*));\r\n \r\n free(pInt);\r\n free(ppInt1);\r\n free(*ppInt2);\r\n return 0;\r\n}\r\nChoose the correct statement w.r.t. above C program.', 'malloc() for ppInt1 and ppInt2 isn’t correct. It’ll give compile time error.', 'free(*ppInt2) is not correct. It’ll give compile time error.', 'free(*ppInt2) is not correct. It’ll give run time error.', 'No issue with any of the malloc() and free() i.e. no compile/run time error.', 'd'),
('C001', 4, '#include "stdio.h" \r\nint main()\r\n{\r\n void *pVoid;\r\n pVoid = (void*)0;\r\n printf("%lu",sizeof(pVoid));\r\n return 0;\r\n}\r\nPick the best statement for the above C program snippet.', 'Assigning (void *)0 to pVoid isn’t correct because memory hasn’t been allocated. That’s why no compile error but it''ll result in run time error.', 'Assigning (void *)0 to pVoid isn’t correct because a hard coded value (here zero i.e. 0) can’t assigned to any pointer. That’s why it''ll result in compile error.', 'No compile issue and no run time issue. And the size of the void pointer i.e. pVoid would equal to size of int.', 'sizeof() operator isn’t defined for a pointer of void type.', 'c'),
('C001', 5, 'Consider the following variable declarations and definitions in C\r\ni) int var_9 = 1;\r\nii) int 9_var = 2;\r\niii) int _ = 3;\r\nChoose the correct statement w.r.t. above variables.', 'Both i) and iii) are valid.', 'Only i) is valid.', 'Both i) and ii) are valid.', 'All are valid.', 'a'),
('C001', 6, 'Let x be an integer which can take a value of 0 or 1. The statement if(x = =0) x = 1; else x = 0; is equivalent to which one of the following?', 'x=1+x; ', 'x=1—x; ', 'x=x—1; ', 'x=1%x; ', 'b'),
('C001', 7, 'A program attempts to generate as many permutations as possible of the string, ''abcd'' by pushing the characters a, b, c, d in the same order onto a stack, but it may pop off the top character at any time. Which one of the following strings CANNOT be generated using this program?', 'abcd', 'dcba', 'cbad', 'cabd', 'd'),
('C001', 8, 'Consider following two C - program :\r\nP1 :\r\nint main()\r\n{\r\n    int (*ptr)(int ) = fun;\r\n    (*ptr)(3);\r\n    return 0;\r\n}\r\n \r\nint fun(int n)\r\n{\r\n  for(;n > 0; n--)\r\n    printf("GeeksQuiz ");\r\n  return 0;\r\n}\r\nP2 :\r\nint main()\r\n{\r\n    void demo();\r\n    void (*fun)();\r\n    fun = demo;\r\n    (*fun)();\r\n    fun();\r\n    return 0;\r\n}\r\n \r\nvoid demo()\r\n{\r\n    printf("GeeksQuiz ");\r\n}\r\nWhich of the following option is correct?', 'P1 printed "GeeksQuiz GeeksQuiz" and P2 printed "GeeksQuiz GeeksQuiz"', 'P1 printed "GeeksQuiz GeeksQuiz" and P2 gives compiler error', 'P1 gives compiler error and P2 printed "GeeksQuiz GeeksQuiz"', 'None of the above', 'c'),
('C001', 9, 'Choose the best statement with respect to following three program snippets.\r\n/*Program Snippet 1 with for loop*/\r\nfor (i = 0; i < 10; i++)\r\n{\r\n   /*statement1*/\r\n   continue;\r\n   /*statement2*/\r\n}\r\n \r\n/*Program Snippet 2 with while loop*/\r\ni = 0;\r\nwhile (i < 10)\r\n{\r\n   /*statement1*/\r\n   continue;\r\n   /*statement2*/\r\n   i++;\r\n}\r\n \r\n/*Program Snippet 3 with do-while loop*/\r\ni = 0;\r\ndo\r\n{\r\n   /*statement1*/\r\n   continue;\r\n   /*statement2*/\r\n   i++;\r\n}while (i < 10);', 'All the loops are equivalent i.e. any of the three can be chosen and they all will perform exactly same.', 'continue can''t be used with all the three loops in C.', 'After hitting the continue; statement in all the loops, the next expression to be executed would be controlling expression (i.e. i < 10) in all the 3 loops. ', 'None of the above is correct.', 'd'),
('C001', 10, 'In the context of C data types, which of the followings is correct?', '“unsigned long long int” is a valid data type.', '“long long double” is a valid data type.', '“unsigned long double” is a valid data type', 'A), B) and C) all are valid data types.', 'a'),
('abc', 1, 'kwhebvkweh', 'jgj', 'khh', 'vjhv', 'kjb', 'c');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `rollno` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `mailid` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `gender` char(10) NOT NULL,
  `dept` char(5) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`rollno`, `name`, `mailid`, `phone`, `gender`, `dept`, `year`) VALUES
('151fa04070', 'Naveen', 'naveenbandarupally@gmail.com', '7799201931', 'male', 'CSE', 4),
('151fa04101', 'Naveen', 'naveenmupalla@gmail.com', '8975462301', 'male', 'CSE', 4),
('151fa04109', 'Preethiga', 'Preethiga.sevvel@gmail.com', '8796452310', 'male', 'CSE', 4),
('151fa04111', 'naveen', 'naveen@gmail.com', '7799203651', 'male', 'CSE', 4),
('151fa04118', 'Rajashekar', 'rajashekar@gmail.com', '9885562081', 'male', 'CSE', 4),
('151fa04170', 'Yaswanth', 'yaswanth@gmail.com', '7013327884', 'male', 'CSE', 4),
('151fa04261', 'Manoj Kumar Reddy', 'manojnani@gmail.com', '8947563120', 'male', 'CSE', 4),
('151fa04297', 'saiteja kotha', 'saitejachinna9666@gmail.com', '9666726061', 'male', 'CSE', 4);

-- --------------------------------------------------------

--
-- Stand-in structure for view `results`
--
CREATE TABLE `results` (
`regid` int(11)
,`cnt` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `submittime`
--

CREATE TABLE `submittime` (
  `regid` int(11) NOT NULL,
  `sh` int(11) NOT NULL,
  `sm` int(11) NOT NULL,
  `ss` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submittime`
--

INSERT INTO `submittime` (`regid`, `sh`, `sm`, `ss`) VALUES
(53, 0, 0, 24),
(54, 0, 2, 49),
(55, 0, 0, 0),
(56, 0, 4, 26),
(57, 0, 2, 51),
(58, 0, 2, 1),
(59, 0, 4, 5),
(60, 0, 3, 53);

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `tid` varchar(10) NOT NULL,
  `scode` varchar(16) NOT NULL,
  `noq` int(11) NOT NULL,
  `mh` int(11) NOT NULL,
  `mm` int(11) NOT NULL,
  `ms` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`tid`, `scode`, `noq`, `mh`, `mm`, `ms`) VALUES
('abc', '12345', 1, 0, 10, 0),
('C001', 'qwerty', 10, 0, 5, 0);

-- --------------------------------------------------------

--
-- Structure for view `results`
--
DROP TABLE IF EXISTS `results`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `results`  AS  select `p`.`regid` AS `regid`,count(`p`.`regid`) AS `cnt` from ((`attempts` `p` join `questions` `q`) join `submittime` `s`) where ((`p`.`qno` = `q`.`qno`) and (`p`.`answer` = `q`.`answer`) and (`p`.`regid` = `s`.`regid`) and (`q`.`tid` = 'C001')) group by `p`.`regid` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `attempts`
--
ALTER TABLE `attempts`
  ADD KEY `regid` (`regid`);

--
-- Indexes for table `enrolls`
--
ALTER TABLE `enrolls`
  ADD PRIMARY KEY (`regid`),
  ADD KEY `rollno` (`rollno`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD KEY `tid` (`tid`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`rollno`),
  ADD UNIQUE KEY `mailid` (`mailid`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `submittime`
--
ALTER TABLE `submittime`
  ADD KEY `regid` (`regid`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enrolls`
--
ALTER TABLE `enrolls`
  MODIFY `regid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `attempts`
--
ALTER TABLE `attempts`
  ADD CONSTRAINT `attempts_ibfk_1` FOREIGN KEY (`regid`) REFERENCES `enrolls` (`regid`);

--
-- Constraints for table `enrolls`
--
ALTER TABLE `enrolls`
  ADD CONSTRAINT `enrolls_ibfk_1` FOREIGN KEY (`rollno`) REFERENCES `registrations` (`rollno`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `tests` (`tid`);

--
-- Constraints for table `submittime`
--
ALTER TABLE `submittime`
  ADD CONSTRAINT `submittime_ibfk_1` FOREIGN KEY (`regid`) REFERENCES `enrolls` (`regid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
