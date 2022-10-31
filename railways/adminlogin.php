<?php
$host = "localhost";
$user = "id17109384_railways_user";
$password ="Enterpassword@123";
$db = "id17109384_railways";
$conn=mysqli_connect($host,$user,$password,$db);
if (isset($_POST['submit'])) 
{
    if (isset($_POST['user']) && isset($_POST['pass'])) 
	{
		$email= $_POST['user'];
		$password = $_POST['pass'];
		if(mysqli_num_rows(mysqli_query($conn,"select * from adminlogin where email='$email'")))
		{
			if(mysqli_num_rows(mysqli_query($conn,"select * from adminlogin where email='$email' AND password='$password'")))
			{   
                include 'admin_index.html';
		    }
			else
			{
				echo "<script>alert('wrong Password');</script>";
				include 'adminlogin.html';
			}   
		}
		else
		{
            echo "<script>alert('No user found...')</script>";
            include 'adminlogin.html';
			
		}
	}
}
?>