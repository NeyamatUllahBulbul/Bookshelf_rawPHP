<?php 

function connect(){
$host = 'localhost';
$user = 'root';
$pass = '';
$dbName = 'cproj';

$con = new mysqli($host,$user,$pass,$dbName);
return $con;

}


?>