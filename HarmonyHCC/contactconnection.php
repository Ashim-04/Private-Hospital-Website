<?php
$server_name="localhost";
$username="root";
$password="";
$database_name="contactform";

$conn=mysqli_connect($server_name,$username,$password,$database_name);

if (!$conn)
{
	die("Connection Failed:" . mysqli_connect_error());
}

if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$msg = $_POST['message'];

	$sql_query = "INSERT INTO messages (name,email,message) VALUES ('$name','$email','$msg')";

	if (mysqli_query($conn, $sql_query)) 
	{
		echo "Your Message has been submitted!";
	}
	else
	{
		echo "Error: " . $sql . "" . mysql_error($conn);
	}
	mysqli_close($conn);
}
?>