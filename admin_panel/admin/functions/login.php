<?php  

session_start();
require('db.php');

if (isset($_POST['email']) and isset($_POST['password']))
	{
		$email = $_POST['email'];
		$password = $_POST['password'];

		$query = "SELECT * FROM `admin` WHERE email='$email' and password='$password'";
 
		$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
		$count = mysqli_num_rows($result);
}
?>