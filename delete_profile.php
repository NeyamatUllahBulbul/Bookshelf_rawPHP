<?php 

session_start();
$uid= $_SESSION['user_id'];

include_once 'database_con.php';
$conn = connect();

$sql = "UPDATE `member` SET `Status` = 'Deactive' WHERE `member`. Member_ID = '$uid'";
$conn->query($sql);

include_once 'logout.php'; 


?>