<?php 

$host = 'localhost';
$user = 'root';
$pass = '';
$dbName = 'cproj';

$con = new mysqli($host,$user,$pass);

$sql = "CREATE DATABASE $dbName";
$con->query($sql);

$con = new mysqli($host,$user,$pass,$dbName);


$sql= "CREATE TABLE `member` (
  `Member_ID` int(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Surname` varchar(30) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `User_Role` varchar(1) DEFAULT '0' COMMENT '1=Admin,0=User',
  `Status` varchar(20) NOT NULL DEFAULT 'Active'
  )ENGINE=InnoDB DEFAULT CHARSET=utf8;";
if($con->query($sql)){
	echo 'Table member created successfully<br>';
}
include_once 'database_con.php';
$conn = connect();

$sql = "SELECT * FROM member WHERE Username ='admin' ";
$output= $conn->query($sql);

if($output-> num_rows > 0){
	echo 'Admin already exists.<br>';
}else{
	$sql="INSERT INTO member (`First_Name`,`Username`,`Email`,`Password`,`User_Role`)
		  VALUES ('Admin','admin','admin@gmail.com','123','1')";
	$conn->query($sql);
		echo 'Admin created successfully.<br>
		Use username=admin and password=123 to login<br>';
}

$sql= "INSERT INTO `member` (`Member_ID`, `First_Name`, `Surname`, `Username`, `Email`, `Password`, `User_Role`, `Status`) VALUES
(2, 'Miraj', 'Hossain', 'MirajHosain', 'mirajho111@gmail.com', 'Aa12345678.', '0', 'Active'),
(3, 'Neyamat', 'Ullah', 'neyamat98', 'bbnemu98@gmail.com', 'Aa12345678.', '0', 'Active'),
(4, 'Mehedi', 'Hasan', 'Hasan98', 'mehedi@gmail.com', 'Aa12345678.', '0', 'Active'),
(5, 'Omar', 'Faruk', 'Faruk65', 'ofroman123@gmail.com', 'Aa12345678.', '0', 'Active'),
(6, 'Emu', 'Sarker', 'emu', 'emu@gmail.com', 'Aa12345678.', '0', 'Active')";
if($con->query($sql)){
	echo 'Data inserted into member successfully.<br>';
}

$sql="CREATE TABLE `free_books` (
  `Free_book_ID` int(10) NOT NULL,
  `Title` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Author` varchar(50) NOT NULL,
  `File` text NOT NULL,
  `Image` varchar(50) NOT NULL
   )ENGINE=InnoDB DEFAULT CHARSET=utf8";
if($con->query($sql)){
	echo 'Table free_books created successfully<br>';
}

$sql= "INSERT INTO `free_books` (`Free_book_ID`, `Title`, `Author`, `File`, `Image`) VALUES
(1, 'ছায়াসঙ্গী', 'Humayun Ahmed', 'fast.pdf', '1479783863.jpg'),
(2, 'কোথাও কেউ নেই', 'Humayun Ahmed', 'HSC board certificate PDF.PDF', '1482468698.jpg'),
(3, 'দেবী', 'Humayun Ahmed', 'JPEG 2.pdf', 'debi-by-humayun-ahmed-cover.jpg'),
(4, 'এবং হিমু', 'Humayun Ahmed', 'SQA-ICQ.pdf', 'ebong himu by Humayun Ahmed.jpg'),
(5, 'মিসির আলী অমনিবাস', 'Humayun Ahmed', 'HCI.pdf', 'misir-ali-omnibus-1by Humayun Ahemd.jpg'),
(6, 'হিমু এবং হার্ভার্ড', 'Humayun Ahmed', 'hack.pdf', 'ruhulamins-1447493861-3988666_xlarge.jpg')";
if($con->query($sql)){
	echo 'Data inserted into free_books successfully.<br>';
}

$sql="CREATE TABLE `portfolio` (
  `Portfolio_Id` int(20) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Image` VARCHAR(50) NOT NULL
   )ENGINE=InnoDB DEFAULT CHARSET=utf8";
if($con->query($sql)){
	echo 'Table portfolio created successfully<br>';
}

$sql= "INSERT INTO `portfolio` (`Portfolio_Id`, `Title`, `Image`) VALUES
(1, 'E-commerce Summit 2018', '2019-07-25_Bangladesh_2_400x267.jpg'),
(2, 'Book Fair 2019', 'back-20140228-rajibdhar41319_8220.jpg'),
(4, 'Book Fair 2019', 'ekushey_book_fair.jpg'),
(5, 'Bloggers meet 2018', 'kgfdk.jpg'),
(6, 'E-commerce Conference 2019', 'The-Advantages-of-Conferences.jpg')";
if($con->query($sql)){
	echo 'Data inserted into portfolio successfully.<br>';
}

$sql="CREATE TABLE `book` (
  `Book_Id` int(50) NOT NULL,
  `Book_Title` varchar(50) NOT NULL,
  `Author` varchar(40) NOT NULL,
  `Publisher` varchar(50) NOT NULL,
  `Price` int(5) NOT NULL,
  `Book_Type` varchar(20) NOT NULL,
  `Image` varchar(50) NOT NULL,
   `qty` VARCHAR(50) DEFAULT 'Available' NOT NULL,
  `Entry_Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	)ENGINE=InnoDB DEFAULT CHARSET=utf8";
if($con->query($sql)){
	echo 'Table book created successfully<br>';
}

$sql= "INSERT INTO `book` (`Book_Id`, `Book_Title`, `Author`, `Publisher`, `Price`, `Book_Type`, `Image`, `Entry_Time`) VALUES
(1, 'Victor Hugo: A Biography', 'Graham Robb', 'W.W. Norton & Company', 235, 'Biography', '81kwYqKJR4L.jpg', '2019-09-25 16:59:56'),
(2, 'অন্তহীনের অন্তর্যামী', 'Parthosarthi Mukhopaddhay', 'Robert Kenijel', 185, 'Biography', '1386.jpg', '2019-09-25 17:04:27'),
(3, 'Alexander Hamilton:Biography', 'Ron Chernow', 'Penguin Group', 380, 'Biography', '9168wNMBk1L.jpg', '2019-09-25 17:36:06'),
(4, 'ব্যোমকেশ সমগ্র', 'Shorodindu Bondopadday', 'Ananda Publishers', 150, 'Biography', '2426848.jpg', '2019-09-25 17:12:28'),
(5, 'Bertolt Brecht', 'Stephen Parker', 'Bloomsbury', 470, 'Biography', '9781474240000.jpg', '2019-09-25 17:16:03'),
(6, 'ইন্দিরা গান্ধীঃবায়োগ্রাফী', 'Pupul Jaykar', 'Penguin Random House India Private Limited', 200, 'Biography', 'images.jpeg', '2019-09-25 17:18:36'),
(7, 'My Best Friend', 'Pat Hutchins', 'Rainbow Publications', 180, 'Children book', 'mybestfriend.jpg', '2019-09-25 17:25:15'),
(8, 'আবোল তাবোল', 'Sukumar Ray', 'সেবা প্রকাশনী', 80, 'Children book', 'abol-tabol-original-imad8de3fuumdkhy.jpeg', '2019-09-25 17:27:12'),
(9, 'Three Best Friends Of Mice Ville', 'Jody Wilber', 'Rainbow Publications', 150, 'Children book', 'biblio_friends_urdu_sample_cover.png', '2019-09-25 17:36:52'),
(10, 'ছড়াসংগ্রহ', 'Subash Mukhopaddhay', 'সেবা প্রকাশনী', 220, 'Children book', 'charasamagra-original-imae2gh2zyfyz3cq.jpeg', '2019-09-25 17:30:34'),
(11, 'শেয়াল-দেবতা রহস্য', 'Shattojit Roy', 'সেবা প্রকাশনী', 90, 'Children book', 'sheyaldebotarahasyaoriginalimaehh6hdh99fbfa.jpeg', '2019-09-25 17:34:54'),
(12, 'Camping Out', 'Heather Amery & Stephen Cartwright', 'Rainbow Publications', 220, 'Children book', 'HTB1lTZZJXXXXXbZXpXXq6xXFXXX5.jpg.jpg', '2019-09-25 17:33:09'),
(13, 'জৈব রষায়ন(মৌলিক নীতি', 'I.R Finar', 'Pearson Publication', 205, 'Educational book', '41PdyxbMVbL._SX366_BO1,204,203,200_.jpg', '2019-09-25 17:43:58'),
(14, 'The Girl With All The Gifts', 'M.R. Carey', 'Pearson Publications', 500, 'Educational book', 'best-books-to-learn-english11.jpg', '2019-09-25 17:45:50'),
(15, 'Nine Lives To Die', 'Rita Mae Brown', 'Penguin Group', 450, 'Educational book', 'best-books-to-learn-english17.jpg', '2019-09-25 17:47:31'),
(16, 'The Wright Brothers', 'David McCullough', 'Rainbow Publications', 550, 'Educational book', 'best-books-to-learn-english20.jpg', '2019-09-25 17:48:57'),
(17, 'র‍্যাপিডেকস ইংলিস ', 'V&S Publishers', 'V&S Publishers', 100, 'Educational book', 'rapid.jpeg', '2019-09-25 17:54:20'),
(18, 'সরল জ্যোতিষ', 'Joti Bashpoti', 'Penguin Random House India Private Limited', 175, 'Educational book', 'main-qimg-3b443cdaf618c7326e9d5b795477d2cd.jpg', '2019-09-25 17:53:23'),
(19, 'শীবগামীর উত্থান', 'Ananda Nilkanton', 'Shibani Prokashani', 200, 'Fiction', '51ow3ZZYXNL._SX323_BO1,204,203,200_.jpg', '2019-09-25 18:26:37'),
(20, 'Modern Fantasy', 'David Pringle', 'Word Publishers', 550, 'Fiction', '976471.jpg', '2019-09-25 18:28:04'),
(21, 'The Ocean At The End', 'Neil Gaiman', 'Word Publishers', 650, 'Fiction', 'best-books-to-learn-english12.jpg', '2019-09-25 18:29:24'),
(22, 'The Atlantis Gene', 'A.G. Riddle', 'Pearson Publications', 890, 'Fiction', 'best-books-to-learn-english14.jpg', '2019-09-25 18:30:40'),
(23, 'গুপ্তধণের গুজব', 'Suchitra Vattacharjo', 'Shibani Prokashani', 250, 'Fiction', 'guptadhaner-gujab-original-imadg5dhb8rh6h5m.jpeg', '2019-09-25 18:31:50'),
(24, 'সেইসময়', 'Sunil Gangopadday', 'Shibani Prokashani', 200, 'Fiction', 'sei-samay-1-2-original-imad6pagrfb7zyp9.jpeg', '2019-09-25 18:32:45'),
(25, 'The Lady Form The Black Lagoon', 'Mallory Omeara', 'Rainbow Publications', 580, 'Non-fiction', 'black.jpg', '2019-09-25 18:40:37'),
(26, 'ভয়ের গল্প ৫১', 'Onish Deb', 'সেবা প্রকাশনী', 150, 'Non-fiction', 'bhayer-galpo-51-original-imadhmhkepnw8zhx.jpeg', '2019-09-25 18:42:10'),
(27, 'Hollywood Eve', 'Lili Anolik', 'Penguin Group', 250, 'Non-fiction', 'hollywood.jpg', '2019-09-25 18:44:07'),
(28, 'Go Set A Watchman', 'Herper Lee', 'W.W. Norton & Company', 500, 'Non-fiction', 'harper_lee_go_set_a_watchman_cover_p_2015.jpg', '2019-09-25 18:45:10'),
(29, 'শরদিন্দু অমনিবাস', 'Sharatchandra Chattopadday', 'Shibani Prokashani', 180, 'Non-fiction', 'sharadindu.jpeg', '2019-09-25 18:47:16'),
(30, 'ভয়ংকর সুন্দর', 'Sunil Gangopadday', 'সেবা প্রকাশনী', 250, 'Non-fiction', 'vayankar.jpeg', '2019-09-25 18:49:10'),
(31, 'Stranger In A Strange Land', 'Robert Heinlein', 'Rainbow Publications', 650, 'Novel', 'stranger.jpeg', '2019-09-25 18:56:14'),
(32, 'The Alchemist', 'Panlo Coelho', 'Pearson Publications', 580, 'Novel', '410llGwMZGL._SX328_BO1,204,203,200_.jpg', '2019-09-25 18:53:39'),
(33, 'Harry Potter & The Deathly Hallows', 'J.K. Rowling', 'Scholastic Publication', 1000, 'Novel', 'harry.jpg', '2019-09-25 18:55:38'),
(34, 'হিমু রিমান্ডে', 'Humayun Ahmed', 'Ananna Publication', 180, 'Novel', 'Himu Remand-E by Humayun Ahmed PDF.jpg', '2019-09-25 18:57:48'),
(35, 'হিমুর আছে জল', 'Humayun Ahmed', 'বিশ্বসাহিত্য কেন্?', 180, 'Novel', 'Himur Ache Jol By Humayun Ahmed.jpg', '2019-09-25 18:58:55'),
(36, 'শ্রেষ্ঠ উপন্যাস', 'Humayun Ahmed', 'অনন্যা প্রকাশনী', 250, 'Novel', 'IMG_0120.JPG', '2019-09-25 19:00:37'),
(37, 'শঙখনীল  কারাগার', 'Humayun Ahmed', 'বিশ্বসাহিত্য কেন্?', 235, 'Novel', 'main-qimg-e119317e7751f394e7b46ae941339c14.jpg', '2019-09-25 19:02:25'),
(38, 'The Moon Is A Harsh Mistress', 'Robert Heinlein', 'Rainbow Publications', 650, 'Science-fiction', '3d8bf1ab09a61081c37abcc740a19254.jpg', '2019-09-25 19:03:50'),
(39, 'গুপি গাইন ও বাঘা বাইন', 'Upendrakishor Ray ', 'অনন্যা প্রকাশনী', 150, 'Science-fiction', '51xR9Vg4-GL._AC_UL436_.jpg', '2019-09-25 19:05:17'),
(40, 'নক্ষত্রলোকের দেবতা', 'Narayan Sanel', 'বিশ্বসাহিত্য কেন্?', 180, 'Science-fiction', '71GE0q166FL.jpg', '2019-09-25 19:06:08'),
(41, 'পৃথিবীর কোর এ', 'Upendrakishor Ray ', 'সেবা প্রকাশনী', 250, 'Science-fiction', '71RllitbhIL._AC_UL436_.jpg', '2019-09-25 19:07:35'),
(42, 'The Dark Forest', 'Joel Martinsen', 'Pearson Publications', 450, 'Science-fiction', 'ae4e799cd381d364c164cc83ad66a3a9.jpg', '2019-09-25 19:08:29'),
(43, 'Kingdom Of Copper', 'S.A. Chakroborty', 'Penguin Random House India Private Limited', 350, 'Science-fiction', 'y648.jpg', '2019-09-25 19:09:26')";
if($con->query($sql)){
	echo 'Data inserted into book successfully.<br>';
}

$sql="CREATE TABLE `blog` (
  `Blog_Id` int(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `Blog_Title` varchar(50) NOT NULL,
  `Writer_Name` varchar(50) NOT NULL,
  `Blog_Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Blog` varchar(1000) NOT NULL,
  `Blog_Image` varchar(50) NOT NULL,
  `Blog_Approval` varchar(10) NOT NULL DEFAULT 'Pending',
  `Member_ID` int(10) NOT NULL
	)ENGINE=InnoDB DEFAULT CHARSET=utf8";
if($con->query($sql)){
	echo 'Table blog created successfully<br>';
}

$sql= "INSERT INTO `blog` (`Blog_Id`, `Blog_Title`, `Writer_Name`, `Blog_Time`, `Blog`, `Blog_Image`, `Blog_Approval`, `Member_ID`) VALUES
(1, 'The 19 Best Book to Read in 2019', 'Sachin Shindler', '2019-09-28 08:23:28', 'If you are anything like us, then your passion for reading and writing does not end with the novels on your shelf or the scrawls in your notebookÃ¢â‚¬â€you are always interested in what is going on in the literary world, from the latest publishing news to interviews with authors and writing advice columns. ', 'Best-Book-Blogs_720x370.jpg', 'Approved', 2),
(2, 'Which fun book should we read in September?', 'Sam Jordison', '2019-09-28 08:45:09', 'This month on the reading group weÃ¢â‚¬â„¢re going to have fun. The holiday season is drawing to a close, schools and colleges are starting again and the world is on fire. IÃ¢â‚¬â„¢m not suggesting we hide from reality, but it might be useful to have something to offset the pain for a while. Think of it as a literary restorative.', '4256 (1).jpg', 'Approved', 3),
(3, 'Tips, links and suggestions: what are you reading ', 'Sam Jordison', '2019-09-28 09:03:48', 'It was amazing, and is the first novel in a long time that has stayed with me. I had read that she was a mix of Faulkner, Gabriel - Marquez and others, and she did not disappoint. I donÃ¢â‚¬â„¢t know what her later works are like, but I have one on order from the library.', '1491.jpg', 'Approved', 3)";
if($con->query($sql)){
	echo 'Data inserted into blog successfully.<br>';
}

$sql="CREATE TABLE `comments` (
  `Comment_Id` int(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `Comment` varchar(200) NOT NULL,
  `Member_ID` int(10) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Blog_Id` int(10) NOT NULL
	)ENGINE=InnoDB DEFAULT CHARSET=utf8";
if($con->query($sql)){
	echo 'Table comments created successfully<br>';
}

$sql= "INSERT INTO `comments` (`Comment_Id`, `Comment`, `Member_ID`, `UserName`, `Blog_Id`) VALUES
(1, 'Thank You', 2, 'Miraj', 1),
(2, 'Always welcome', 1, 'Admin', 1),
(3, 'Chikon pin er charger hbe??', 4, 'Mehedi', 1),
(4, 'Thank you for the suggestion', 2, 'Miraj', 2),
(5, 'Thank you admin for approving this blog... I find this very useful.\r\n', 4, 'Mehedi', 2),
(6, 'You are very very much welcome  Mehedi.', 1, 'Admin', 2)";
if($con->query($sql)){
	echo 'Data inserted into portfolio successfully.<br>';
}

$sql="CREATE TABLE `contact_us` (
  `Msg_Id` int(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Message` varchar(1000) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
	)ENGINE=InnoDB DEFAULT CHARSET=utf8";
if($con->query($sql)){
	echo 'Table contact_us created successfully<br>';
}

$sql="CREATE TABLE `pre_order` (
  `Pre_Order_Id` int(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `Book_Title` varchar(50) NOT NULL,
  `Author` varchar(50) NOT NULL,
  `Publisher` varchar(100) NOT NULL DEFAULT 'N/A',
  `Country` varchar(50) NOT NULL DEFAULT 'N/A',
  `Language` varchar(30) NOT NULL,
  `Edition` varchar(20) NOT NULL DEFAULT 'N/A',
  `Customer_Name` varchar(50) NOT NULL,
  `Customer_Email` varchar(30) NOT NULL,
  `Customer_Phone` varchar(15) NOT NULL,
  `Customer_Address` varchar(60) NOT NULL,
  `Member_ID` int(10) NOT NULL
	)ENGINE=InnoDB DEFAULT CHARSET=utf8";
if($con->query($sql)){
	echo 'Table pre_order created successfully<br>';
}

$sql= "INSERT INTO `pre_order` (`Pre_Order_Id`, `Book_Title`, `Author`, `Publisher`, `Country`, `Language`, `Edition`, `Customer_Name`, `Customer_Email`, `Customer_Phone`, `Customer_Address`, `Member_ID`) VALUES
(1, 'Bohubrihi', 'Humayun Ahmed', 'Sheba', 'BD', 'Bengali', '', 'Neyamat Ullah', 'bbnemu98@gmail.com', '01814786751', '74/C', 3)";
if($con->query($sql)){
	echo 'Data inserted into pre_order successfully.<br>';
}

$sql="CREATE TABLE `cart` (
  `Cart_Id` int(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `Book_Id` int(30) NOT NULL,
  `Book_Quantity` int(5) NOT NULL,
  `Session_Id` varchar(200) NOT NULL,
  `Order_Id` varchar(10) NOT NULL DEFAULT 'N/A'
	)ENGINE=InnoDB DEFAULT CHARSET=utf8";
if($con->query($sql)){
	echo 'Table cart created successfully<br>';
}

$sql= "INSERT INTO `cart` (`Cart_Id`, `Book_Id`, `Book_Quantity`, `Session_Id`, `Order_Id`) VALUES
(1, 6, 1, 'dv8e0am7vgsfrh5i2g44cr2j11', 'O929495'),
(2, 8, 15, 'dv8e0am7vgsfrh5i2g44cr2j11', 'O929495'),
(3, 5, 1, 'ki9h0ptim16uk04gooli9k71kj', 'O914901'),
(4, 14, 2, 'ki9h0ptim16uk04gooli9k71kj', 'O914901')";
if($con->query($sql)){
	echo 'Data inserted into cart successfully.<br>';
}

$sql="CREATE TABLE `order_details` (
  `Order_Details_Id` int(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `Order_Id` varchar(10) NOT NULL,
  `Customer_Name` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Contact_Number` varchar(15) NOT NULL,
  `Zip_Code` varchar(10) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Order_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Payable_Amount` varchar(10) NOT NULL
	)ENGINE=InnoDB DEFAULT CHARSET=utf8";
if($con->query($sql)){
	echo 'Table order_details created successfully<br>';
}

$sql= "INSERT INTO `order_details` (`Order_Details_Id`, `Order_Id`, `Customer_Name`, `Address`, `Contact_Number`, `Zip_Code`, `City`, `Order_Date`, `Payable_Amount`) VALUES
(1, 'O929495', 'Bulbul', '74/C,Kollyanpur', '01814786751', '1702', 'Dhaka', '2019-10-23 16:03:01', '1400'),
(2, 'O914901', 'Noman', '74/C,Kollyanpur', '01884612019', '1702', 'Dhaka', '2019-10-23 17:17:06', '1470')";
if($con->query($sql)){
	echo 'Data inserted into order_details successfully.<br>';
}