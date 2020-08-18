<?php 
$connection = mysqli_connect("localhost" , "root" , "" , "claybrook_zoo");

if(!$connection) {
	die('unable to connect'. mysqli_error($connection));  // checking database connection // 
}; 

?>