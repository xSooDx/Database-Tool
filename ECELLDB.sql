-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2016 at 03:34 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

# Privileges for `sood`@`localhost`

GRANT ALL PRIVILEGES ON *.* TO 'sood'@'localhost' IDENTIFIED BY PASSWORD '*A4B6157319038724E3560894F7F932C8886EBFCF' WITH GRANT OPTION;

GRANT ALL PRIVILEGES ON `mysql`.* TO 'sood'@'localhost' WITH GRANT OPTION;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecelldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigned_to_task`
--

CREATE TABLE IF NOT EXISTS `assigned_to_task` (
  `USN` varchar(16) DEFAULT NULL,
  `Task_ID` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assigned_to_task`
--

INSERT INTO `assigned_to_task` (`USN`, `Task_ID`) VALUES
('01FB14ECS215', 'DBMT-1'),
('01FB14ECS215', 'DBMT-2');

-- --------------------------------------------------------

--
-- Table structure for table `collaborators`
--

CREATE TABLE IF NOT EXISTS `collaborators` (
  `Name` varchar(64) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Email` varchar(64) NOT NULL,
  `P_ID` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collaborators`
--

INSERT INTO `collaborators` (`Name`, `Phone`, `Email`, `P_ID`) VALUES
('Rohan N Kanuri', '8970047065', 'hazard.rohan@gmail.com', '3'),
('Shreyaa Giridhar', '9449056064', 'findshryaagirigir@gmail.com', '10'),
('Hazard Uchiha', '9999999999', 'hazrdbeast.uchiha@gmail.com', '6'),
('Shrek Shetty', '9559669778', 'shrekshetty@gmail.com', '5'),
('Itachi Uchiha', '9779339449', 'itachib/osasuke@gmail.com', '3'),
('Konahamaru', '9886797054', 'chidori.naruto@gmail.com', '6'),
('Akarsh Bolar', '9556677345', 'wheere.man@gmail.com', '12');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `ID` varchar(16) NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`ID`, `Name`, `Description`) VALUES
('DEP-DD', 'Design & Development', 'In charge of design and development of different tools,websites,etc'),
('DEP-EV', 'Events', 'Responsible for event management'),
('DEP-MR', 'Marketing', 'Market different products '),
('DEP-PB', 'Publications', 'Spread awareness about startups,clubs,etc'),
('DEP-PR', 'Public Relations', 'In charge of public relations'),
('DEP-RS', 'Resources', 'Manage and maintain resources'),
('DEP-SP', 'Sponsorship', 'Find companies to sponsor for startups');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `ID` varchar(16) NOT NULL,
  `Title` varchar(45) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Dep_ID` varchar(16) DEFAULT NULL,
  `Venue` varchar(45) DEFAULT NULL,
  `Time` varchar(10) DEFAULT NULL,
  `Date` varchar(10) DEFAULT NULL,
  `Tag` varchar(45) DEFAULT NULL,
  `Status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`ID`, `Title`, `Description`, `Dep_ID`, `Venue`, `Time`, `Date`, `Tag`, `Status`) VALUES
('1', 'Endeavour', 'Think of an idea, build it, pitch it, sell it.', 'DEP-RS', 'MRD Block, PES University', '10:30:00', '2016-04-30', 'Marketing, Prototyping, Sales Pitch', 'Inactive'),
('10', 'Meditation', 'Calm your nerves', 'DEP-PR', 'Mrd auditorium', '02:00:00', '2016-09-23', 'Marketing', 'Inactive'),
('1234567', 'qwerty', 'qwertyuiolkjhgfdsa', 'DEP-DD', 'LOL', '00:30', '2016-11-12', 'FASDKASDM', 'Active'),
('2', 'Comic con', 'The best place for all comic heads and movie maniacs to come together and party', 'DEP-EV', 'PES university', '13:12:08', '2016-04-07', 'Marketing,Sponsors', 'Active'),
('3', 'Year end party', 'Place to get together and enjoy', 'DEP-RS', 'Mrd auditorium', '07:28:14', '2016-06-22', 'Resources ', 'Inactive'),
('4', 'Anime fest', 'Anime fans get together', 'DEP-EV', 'pi r cube', '11:21:00', '2016-08-24', 'Resources,Marketing', 'Selectively Active'),
('5', 'PB ESOC meeting', 'A discussion for e society //like munsoc', 'DEP-PB', 'Mechanical Block', '03:08:00', '2016-05-06', 'Marketing,Publications,Events', 'Active'),
('6', 'fundraiser', 'Createawareness for ecell', 'DEP-MR', 'Student Lounge', '07:09:00', '2016-04-08', 'Event,Marketing', 'Complete'),
('7', 'Startup Mela', 'A place for all new startups to come together and show off their products', 'DEP-MR', 'OAT', '06:02:00', '2016-05-27', 'Marketing,PR', 'Selectively Active'),
('8', 'Market strategy seminar ', 'Lecture by IIT student Eden Hazard', 'DEP-EV', 'Mrd auditorium', '19:59:00', '2016-04-06', 'PB', 'Complete'),
('9', 'Recritment', 'Recruiting new interested members', 'DEP-MR', 'PES University', '14:00:00', '2016-08-15', 'Marketing,PR', 'Inactive'),
('EV-01', 'Test', 'This is a test', 'DEP-DD', 'LOL', '12:30', '12/4/2016', 'qweqwe', 'Active'),
('P-1', 'Party', 'PARTAAAAAAYYY!!!', 'DEP-DD', 'MRD', '12:30', '2016-04-21', 'LOL', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `heads`
--

CREATE TABLE IF NOT EXISTS `heads` (
  `USN` varchar(16) NOT NULL,
  `Dep_ID` varchar(16) DEFAULT NULL,
  `Head_Level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `heads`
--

INSERT INTO `heads` (`USN`, `Dep_ID`, `Head_Level`) VALUES
('01FB14EBT024', 'DEP-PR', 2),
('01FB14ECS074', 'DEP-MR', 1),
('01FB14ECS182', NULL, 1),
('01FB14ECS215', 'DEP-DD', 1),
('01FB14ECS247', 'DEP-PR', 1),
('01FB15ECS116', 'DEP-EV', 2),
('01FB15ECS187', 'DEP-DD', 2),
('01FB15ECS245', 'DEP-MR', 2),
('01FB15EME035', 'DEP-EV', 1),
('1PI13CS035', 'DEP-RS', 1),
('1PI14IS082', 'DEP-SP', 1),
('1PI14ME102', 'DEP-SP', 2);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `USN` varchar(16) NOT NULL,
  `F_Name` varchar(45) DEFAULT NULL,
  `L_Name` varchar(45) DEFAULT NULL,
  `Ph_No` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `Department` varchar(16) DEFAULT NULL,
  `Status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`USN`, `F_Name`, `L_Name`, `Ph_No`, `Email`, `password`, `Department`, `Status`) VALUES
('01FB14EBT024', 'Parthvi', 'Gyan', '9902535735', 'parthvigyan@gmail.com', '', 'DEP-PR', 'Active'),
('01FB14ECS042', 'Apoorva', 'Jarmale', '9611375566', 'apoorvajarmale@gmail.com', '', 'DEP-MR', 'Inactive'),
('01FB14ECS066', 'Naveen Reddy', 'Desanur', '8861631807', 'dnaveen356@gmail.com', '', 'DEP-MR', 'Active'),
('01FB14ECS074', 'Gautham', 'B', '7411714781', 'gautham1996@gmail.com', '', 'DEP-MR', 'Active'),
('01FB14ECS102', 'Kushal', 'Mehta', '9019757097', 'kushalmehta13@gmail.com', '', 'DEP-DD', 'Active'),
('01FB14ECS133', 'Nilisha', 'Maheshwari', '9480613950', 'nilishamaheshwari18@gmail.com', '', 'DEP-DD', 'Active'),
('01FB14ECS182', 'Rajath', 'Nandan', '7259137196', 'rjtnndn@gmail.com', 'qwer', 'DEP-RS', 'Active'),
('01FB14ECS203', 'Sai Neeraj', 'Kanuri', '8105687890', 'neerajkanuri@gmail.com', '', 'DEP-DD', 'Active'),
('01FB14ECS215', 'Saurabh', 'Sood', '8147531591', 'soodsaurabh95@gmail.com', 'qwer', 'DEP-DD', 'Active'),
('01FB14ECS230', 'Shreyank', 'Shetty', '9591309688', 'Shreyankshetty007@gmail.com', 'qwer', 'DEP-MR', 'Active'),
('01FB14ECS243', 'Smaran', 'Mahesh', '9742725674', 'smaran.mr@gmail.com', '', 'DEP-PR', 'Active'),
('01FB14ECS247', 'Sreedhar', 'Radhakrishnan', '7022260737', 'sreedhar1895@gmail.com', '', 'DEP-PR', 'Active'),
('01FB14EEE051', 'Nithisha', 'Venu', '9482011333', 'nithishavenu@gmail.com', '', 'DEP-DD', 'Active'),
('01FB14EME023', 'Amruth', 'Chinnappa', '9686246659', 'amruthchinnappa@gmail.com', '', 'DEP-MR', 'Active'),
('01FB14EME059', 'Goutham', 'T', '9845233376', 'goutham.thirumalesh@gmail.com', '', 'DEP-MR', 'Active'),
('01FB14EME081', 'Niranjan', 'M', '9066179191', 'niranjanm9191@gmail.com', '', 'DEP-MR', 'Active'),
('01FB14EME092', 'Mukunth', 'Sudarsanan', '7022364054', 'iammukunth@gmail.com', '', 'DEP-MR', 'Active'),
('01FB15EBT003', 'Akhila', 'Parthasarathy', '8861294373', 'akhilap19@gmail.com', '', 'DEP-PB', 'Active'),
('01FB15EBT024', 'Karishma', 'Mehta', '9663705500', 'karishma17mehta@gmail.com', '', 'DEP-EV', 'Active'),
('01FB15EBT025', 'Priyaa', 'Velayutham', '9739244408', 'velasan2010@gmail.com', '', 'DEP-PR', 'Active'),
('01FB15ECS005', 'Abhijay', 'Gupta', '8971203084', 'abhijayvgupta@gmail.com', '', 'DEP-DD', 'Active'),
('01FB15ECS057', 'Athul', 'Pai', '8951211546', 'athulpai@outlook.com', '', 'DEP-PB', 'Active'),
('01FB15ECS076', 'Chetna', 'Sureka', '8884746830', 'chetnasureka1501@gmail.com', '', 'DEP-SP', 'Active'),
('01FB15ECS082', 'Suhaas', 'Chitturi', '8897378787', 'suhaaschitturi@gmail.com', '', 'DEP-MR', 'Active'),
('01FB15ECS093', 'Devika', 'Mishra', '9741329988', 'mishra.devika23@gmail.com', '', 'DEP-DD', 'Active'),
('01FB15ECS116', 'Hardik', 'Surana', '9739620417', 'hardiksurana01@gmail.com', '', 'DEP-EV', 'Active'),
('01FB15ECS118', 'Harsh', 'Garg', '9108287414', 'harshagarwal76@gmail.com', '', 'DEP-EV', 'Active'),
('01FB15ECS122', 'Harshit', 'Sinha', '9686509397', 'harshitsinha123@gmail.com', '', 'DEP-PR', 'Active'),
('01FB15ECS123', 'Harshita', 'Singh', '9845633122', 'harshitasingh.selena13@gmail.com', '', 'DEP-EV', 'Active'),
('01FB15ECS141', 'Karthik', 'Nishant', '9444217876', 'Karthiknishant@yahoo.co.in', '', 'DEP-MR', 'Active'),
('01FB15ECS148', 'Khalandar Nawal', 'Sheikh', '9972998999', 'sunseema@gmail.com', '', 'DEP-DD', 'Active'),
('01FB15ECS170', 'Medha', 'Parigi', '9738089703', 'pmedhavi88@gmail.com', '', 'DEP-DD', 'Active'),
('01FB15ECS185', 'Niharika', 'Misra', '9900255220', 'niharika.misra97@gmail.com', '', 'DEP-DD', 'Active'),
('01FB15ECS187', 'Nikhil', 'Khatri', '9620577985', 'nikhilkhatri97@gmail.com', '', 'DEP-DD', 'Active'),
('01FB15ECS189', 'Nikhil', 'Singh', '9471717072', 'singhnikhil97@gmail.com', '', 'DEP-DD', 'Active'),
('01FB15ECS210', 'Pranit', 'Dutta', '7795322114', 'pranitdutta17@gmail.com', '', 'DEP-SP', 'Active'),
('01FB15ECS215', 'Priya', 'Bagaria', '8697089394', 'priyabagaria4@gmail.com', '', 'DEP-MR', 'Active'),
('01FB15ECS216', 'Priyank', 'Bhandia', '9945894746', 'priyankbhandia@hotmail.com', '', 'DEP-PR', 'Active'),
('01FB15ECS222', 'Rahul', 'Mohan', '9535440912', 'rahul.16.mohan@gmail.com', '', 'DEP-DD', 'Active'),
('01FB15ECS234', 'Ravi Shreyas', 'Anupindi', '8277136791', 'Shreyasanupindi356@gmail.com', '', 'DEP-PR', 'Active'),
('01FB15ECS235', 'Reshma', 'Bhat', '9481752578', 'rgbhat2060@gmail.com', '', 'DEP-PR', 'Active'),
('01FB15ECS245', 'Roopesh', 'S J', '9483964026', 'roopeshnravi@gmail.com', '', 'DEP-MR', 'Active'),
('01FB15ECS248', 'Ruthwik', 'Ganesh', '8722366444', 'ruthwikganesh@gmail.com', '', 'DEP-DD', 'Active'),
('01FB15ECS291', 'Siddharth', 'Suresh', '9985971997', 'sidd.suresh97@gmail.com', '', 'DEP-RS', 'Active'),
('01FB15ECS337', 'Varsha', 'R', '9035230972', 'varsha.ambu@gmail.com', '', 'DEP-PB', 'Active'),
('01FB15EEC024', 'Aman Anjan', 'Bhat', '8197955212', 'Amananjanbhat3@gmail.com', '', 'DEP-EV', 'Active'),
('01FB15EEC081', 'Gayatri', 'Aniruddha', '9741900252', 'Gayatri0397@gmail.com', '', 'DEP-MR', 'Active'),
('01FB15EEC082', 'Gowri', 'Joshi', '7676913126', 'gowrijoshi@gmail.com', '', 'DEP-PR', 'Active'),
('01FB15EEC091', 'Joyce', 'Avrel', '7760574400', 'joyceavrel@gmail.com', '', 'DEP-MR', 'Active'),
('01FB15EEC104', 'Lakshmi', 'Krishnan', '8884400172', 'uma.krishnaswamy@gmail.com', '', 'DEP-EV', 'Active'),
('01FB15EEC105', 'Lakshmi Nikita', 'Anand', '9741972170', 'lakshminikita@gmail.com', '', 'DEP-SP', 'Active'),
('01FB15EEC123', 'Asif', 'Kharadi', '9611559455', 'asifkharadi075@gmail.com', '', 'DEP-DD', 'Active'),
('01FB15EEC125', 'Mohan', 'R', '8792521942', 'mohan1bng@gmail.com', '', 'DEP-DD', 'Active'),
('01FB15EEC137', 'Neema', 'N', '8892423759', 'neemanayak6@gmail.com', '', 'DEP-PR', 'Active'),
('01FB15EEC161', 'Prateek', 'K', '9611919613', 'prateekkonduru2001@gmail.com', '', 'DEP-DD', 'Active'),
('01FB15EEC162', 'Pratik', 'R', '8892787870', 'pratiksiyal@gmail.com', '', 'DEP-PR', 'Active'),
('01FB15EEC190', 'Sagar', 'Belavadi', '8762733652', 'sagar28.05.1997@gmail.com', '', 'DEP-SP', 'Active'),
('01FB15EEC204', 'sanket', 'saxena', '9743119496', 'sanketsaxena33@gmail.com', '', 'DEP-MR', 'Active'),
('01FB15EEC236', 'Shreya', 'Suresh', '9591769942', 'shreya.suresh37@gmail.com', '', 'DEP-PR', 'Active'),
('01FB15EEC237', 'Shubham', '.', '9738641300', 'shubham250396@gmail.com', '', 'DEP-MR', 'Selectively Active'),
('01FB15EEC243', 'Smriti', '.', '7899011050', 'smriti12320@gmail.com', '', 'DEP-PR', 'Active'),
('01FB15EEC266', 'Tejaswi', 'Raj', '9663252327', 'Tejaswiraj.187@gmail.com', '', 'DEP-DD', 'Active'),
('01FB15EEE050', 'Nilesh', 'Pattanayak', '9738646330', 'pattanayaknilesh2015@gmail.com', '', 'DEP-DD', 'Active'),
('01FB15EME005', 'Abhigyan', 'Nath', '9502923892', 'nebula2035@gmail.com', '', 'DEP-DD', 'Active'),
('01FB15EME023', 'Anmol', 'Shekar', '8147620155', 'anmol_shek@rediffmail.com', '', 'DEP-PR', 'Active'),
('01FB15EME035', 'Chaithanya', 'Premkumar', '7760001404', 'chinthu97@live.com', '', 'DEP-EV', 'Active'),
('01FB15EME037', 'Charanpreet', 'Sandhu', '9066184077', 'sandhu.champ19@gmail.com', '', 'DEP-EV', 'Active'),
('01FB15EME047', 'Harish', 'Krishnan', '7795346116', 'harishfooty@gmail.com', '', 'DEP-EV', 'Active'),
('1PI13BT040', 'Sai Preethi', 'Nakkina', '9886492605', 'preethi.165@gmail.com', '', 'DEP-PB', 'Active'),
('1PI13BT046', 'Shraddha', 'Subramanian', '9663879290', 'shraddhasubramanian@gmail.com', '', 'DEP-PB', 'Active'),
('1PI13CS007', 'Abhishek', 'P', '9481908988', 'abhijnvb@gmail.com', '', 'DEP-PB', 'Active'),
('1PI13CS035', 'Areeb', 'Sanadi', '9535272420', 'areebsanadi@gmail.com', '', 'DEP-PR', 'Active'),
('1PI14CV035', 'Namrata', 'Tenjarla', '9964821203', 'namratakishan2013@gmail.com', '', 'DEP-MR', 'Active'),
('1PI14CV052', 'Rishika', 'Naik', '9880525034', 'rishikanaik@yahoo.in', '', 'DEP-MR', 'Active'),
('1PI14EC075', 'Tanmaya', 'Prakash', '9739122806', 'tanmayaprakash3@gmail.com', '', 'DEP-PB', 'Active'),
('1PI14IS052', 'Samarth', 'Bannur', '9538130611', 'samarth.bannur.96@gmail.com', '', 'DEP-RS', 'Inactive'),
('1PI14IS082', 'Varun', 'Kotak', '9739272969', 'varun11796@gmail.com', '', 'DEP-MR', 'Active'),
('1PI14ME100', 'Shubham', 'Sinha', '9901810875', 'Shubham290596@gmail.com', '', 'DEP-MR', 'Active'),
('1PI14ME102', 'Sravan Kumar M', 'Sindagi', '8105094546', 'sravanmsindagi@gmail.com', '', 'DEP-SP', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `ID` varchar(16) NOT NULL,
  `Dep_ID` varchar(16) DEFAULT NULL,
  `Title` varchar(45) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Leader_USN` varchar(16) DEFAULT NULL,
  `Status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`ID`, `Dep_ID`, `Title`, `Description`, `Leader_USN`, `Status`) VALUES
('1', 'DEP-DD', 'Database and Management Tool', 'A Database and a management tool to make E-Cell more efficient and coordinated.', '01FB14ECS215', 'Active'),
('10', 'DEP-DD', 'Cover design', 'Design cover page for e-mag the ecell magazine', '01FB14ECS102', 'Active'),
('11', 'DEP-EV', 'Managing upcoming events', NULL, '01FB15EEC123', 'Inactive'),
('12', 'DEP-DD', 'App design ', 'Create fully functional app for ecell', '01FB15ECS082', 'Active'),
('123', 'DEP-DD', 'qqew', 'asdxcdv dsf', '01FB14ECS215', 'Active'),
('2', 'DEP-PR', 'Summer Market Research Project', NULL, '01FB14ECS247', 'Active'),
('3', 'DEP-DD', 'Web design ', 'Creating a functional and sophisticated website for ecell', '01FB14ECS215', 'Active'),
('4', 'DEP-DD', 'Poster Design', 'Design posters for the upcoming events', '01FB14EBT024', 'Inactive'),
('5', 'DEP-PR', 'Investors for hitch-a-ride', 'Find suitable investors for the startup hitch-a-ride', '01FB14EME081', 'Selectively Active'),
('6', 'DEP-PB', 'Publications for endeavour', 'Publish papers for endeavour', '01FB15EME035', 'Active'),
('7', 'DEP-MR', 'Marketing for endeavour', 'Spread awareness for enedeavour', '01FB15ECS141', 'Inactive'),
('8', 'DEP-RS', 'Resource Tally', 'Keep in check the resources used', '01FB14ECS230', 'Inactive'),
('9', 'DEP-SP', 'Sponsors for byakugan', 'Get sponsors for the startup byakugan', '01FB14EBT024', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE IF NOT EXISTS `statuses` (
  `Status` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`Status`) VALUES
('Active'),
('Complete'),
('Inactive'),
('Selectively Active');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `ID` varchar(16) NOT NULL,
  `Title` varchar(45) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Deadline` date DEFAULT NULL,
  `Status` varchar(45) DEFAULT NULL,
  `P_ID` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`ID`, `Title`, `Description`, `Deadline`, `Status`, `P_ID`) VALUES
('DBMT-1', 'Build DB', 'Build the database.', '2016-04-18', 'Complete', '1'),
('DBMT-10', 'creating resource spending spredsheet', 'maintaing a spreadsheet of all the resourses used ', '2016-04-22', 'Selectively Active', '8'),
('DBMT-11', 'getting a tech company onboard', 'getting a sponsership from  tech company', '2016-04-30', 'Inactive', '9'),
('DBMT-12', 'making a blueprint ', 'creatinng a bluprint of the cover for the e-cell mag.', '2016-04-28', 'Selectively Active', '10'),
('DBMT-14', 'generate algorithm,', 'generate the algorithm', '2016-04-25', 'Selectively Active', '12'),
('DBMT-2', 'Build front end client for DB', 'Build a web based front end client for the database.', '2016-04-21', 'Active', '1'),
('DBMT-3', 'styling using css', 'using css to enhance the visuals of the website', '2016-04-29', 'Active', '3'),
('DBMT-4', 'creating javascripts ', 'using javascripts to add functionality to the site ', '2016-04-29', 'Active', '3'),
('DBMT-5', 'getting art material ', 'brinng the required materials to create the poster .', '2016-04-25', 'Inactive', '4'),
('DBMT-6', 'collecting investor details ', 'getting the details of all possible investors and storing it for future reference ', '2016-06-30', 'Selectively Active', '5'),
('DBMT-7', 'startup visists', 'getting information about startups and their investors ', '2016-05-12', 'Active', '5'),
('DBMT-8', 'setting up endevour team ', 'creating a sepcical publications team for endevour .', '2016-05-05', 'Complete', '6'),
('DBMT-9', 'entrepreneurship  quiz ', 'a open quiz on entrepreneurship, and startups .', '2016-04-26', 'Active', '7'),
('DMBT-13', 'distribute flyers ', 'distribute flyers with details of the event', '2016-04-23', 'Active', '11'),
('erwundefined', '123', 'qwead', '2100-01-01', 'Active', '1');

-- --------------------------------------------------------

--
-- Table structure for table `works_on_project`
--

CREATE TABLE IF NOT EXISTS `works_on_project` (
  `USN` varchar(16) DEFAULT NULL,
  `Project_ID` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `works_on_project`
--

INSERT INTO `works_on_project` (`USN`, `Project_ID`) VALUES
('01FB14ECS215', '1'),
('01FB14ECS215', '2'),
('01FB14ECS247', '2'),
('01FB14ECS215', '3'),
('01FB14EBT024', '9'),
('01FB14ECS230', '8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigned_to_task`
--
ALTER TABLE `assigned_to_task`
  ADD KEY `Task_idx` (`Task_ID`),
  ADD KEY `USN_idx` (`USN`);

--
-- Indexes for table `collaborators`
--
ALTER TABLE `collaborators`
  ADD KEY `P_ID` (`P_ID`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name_UNIQUE` (`Name`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Status` (`Status`),
  ADD KEY `events_ibfk_1` (`Dep_ID`);

--
-- Indexes for table `heads`
--
ALTER TABLE `heads`
  ADD PRIMARY KEY (`USN`),
  ADD KEY `heads_ibfk_2` (`Dep_ID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`USN`),
  ADD KEY `Status` (`Status`),
  ADD KEY `members_ibfk_1` (`Department`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Status` (`Status`),
  ADD KEY `projects_ibfk_1` (`Leader_USN`),
  ADD KEY `projects_ibfk_2` (`Dep_ID`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`Status`),
  ADD KEY `Status` (`Status`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Status` (`Status`),
  ADD KEY `tasks_ibfk_1` (`P_ID`);

--
-- Indexes for table `works_on_project`
--
ALTER TABLE `works_on_project`
  ADD KEY `USN_idx` (`USN`),
  ADD KEY `Project_ID_idx` (`Project_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigned_to_task`
--
ALTER TABLE `assigned_to_task`
  ADD CONSTRAINT `assigned_to_task_ibfk_1` FOREIGN KEY (`USN`) REFERENCES `members` (`USN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assigned_to_task_ibfk_2` FOREIGN KEY (`Task_ID`) REFERENCES `tasks` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `collaborators`
--
ALTER TABLE `collaborators`
  ADD CONSTRAINT `collaborators_fk_1` FOREIGN KEY (`P_ID`) REFERENCES `projects` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`Dep_ID`) REFERENCES `departments` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`Status`) REFERENCES `statuses` (`Status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `heads`
--
ALTER TABLE `heads`
  ADD CONSTRAINT `heads_ibfk_1` FOREIGN KEY (`USN`) REFERENCES `members` (`USN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `heads_ibfk_2` FOREIGN KEY (`Dep_ID`) REFERENCES `departments` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `member_ibfk_2` FOREIGN KEY (`Status`) REFERENCES `statuses` (`Status`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`Department`) REFERENCES `departments` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`Leader_USN`) REFERENCES `members` (`USN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projects_ibfk_2` FOREIGN KEY (`Dep_ID`) REFERENCES `departments` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projects_ibfk_3` FOREIGN KEY (`Status`) REFERENCES `statuses` (`Status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`P_ID`) REFERENCES `projects` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`Status`) REFERENCES `statuses` (`Status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `works_on_project`
--
ALTER TABLE `works_on_project`
  ADD CONSTRAINT `works_on_project_ibfk_1` FOREIGN KEY (`USN`) REFERENCES `members` (`USN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `works_on_project_ibfk_2` FOREIGN KEY (`Project_ID`) REFERENCES `projects` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
