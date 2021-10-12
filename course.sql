

--
-- Database: `courses`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `cao_points` int(11) NOT NULL,
  `years` int(11) NOT NULL,
  `location` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `start_date` date NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `cao_points`, `years`, `location`, `name`, `start_date`, `course_code`, `image_id`) VALUES
(1, 314, 4, 'DCU', 'Computer Science', '2021-10-07', 'DC231', 1),
(2, 521, 4, 'Trinity College', 'Biomedical Science', '2021-10-30', 'TC243', 2);
(3, 321, 4, 'IADT', 'Film', '2021-10-22', 'DL352', 3);
(4, 321, 4, 'TUD', 'Business', '2021-10-28', 'TU242', 4);


-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `filename`) VALUES
(1, 'assets/img/compsci.jfif'),
(2, 'asssets/img/science.jpg');
(3, 'asssets/img/film.jpg');
(4, 'asssets/img/business.jpg');
--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_id` (`image_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `fk_image_id` FOREIGN KEY (`id`) REFERENCES `course` (`image_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
