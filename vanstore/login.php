<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "id16900325_ooad";
$conn=mysqli_connect($host,$user,$password,$db);
if (isset($_POST['submit'])) 
{
    if (isset($_POST['email']) && isset($_POST['password'])) 
	{
		$email= $_POST['email'];
		$password = $_POST['password'];
		if($email=="vanstore@admin.com")
		{
			if(mysqli_num_rows(mysqli_query($conn,"select password from employee where email='$email'")))
				{

					header("Location:admin/index.php");
				}
				else
				{
					echo '<script>alert("Wrong Password")</script>';
					//echo "<h2 align='center' style='color: white;background-color: red;'>wrong password <a href=#about style='color:yellow'><u>try again</u></a><h2>";
					include 'index.html';
					//header("Location: index.html#about");
					echo "<script>window.scrollTo(0,1000);</script>";
				}
		}
		elseif(mysqli_num_rows(mysqli_query($conn,"select * from employee where email='$email'")))
		{
			if(mysqli_num_rows(mysqli_query($conn,"select * from employee where email='$email' AND password='$password'")))
				{
					header("Location:employee/index.php");
				}
				else
				{
					echo '<script>alert("Wrong Password")</script>';
					//echo "<h2 align='center' style='color: white;background-color: red;'>wrong password <a href=#about style='color:yellow'><u>try again</u></a><h2>";
					include 'index.html';
					//header("Location: index.html#about");
					echo "<script>window.scrollTo(0,1000);</script>";
				}
		}
		
		else
		{
			if(mysqli_num_rows(mysqli_query($conn,"select * from login where email='$email'")))
			{
				$res=mysqli_query($conn,"select * from login where email='$email' AND password='$password'");
				if(mysqli_num_rows($res))
				{
					//echo "<h2 align='center' style='color:yellow;background-color: green;'>Login Sucessful<h2>";
					$custid=mysqli_fetch_assoc($res)['custid'];
					echo "<script>
							localStorage.setItem('email','$email');
							localStorage.setItem('custid',$custid);
						  </script>";
					include "shop.php";
				}
				else
				{
					echo '<script>alert("Wrong Password")</script>';
					//echo "<h2 align='center' style='color: white;background-color: red;'>wrong password <a href=#about style='color:yellow'><u>try again</u></a><h2>";
					include 'index.html';
					//header("Location: index.html#about");
					echo "<script>window.scrollTo(0,1000);</script>";
				}   
			}
			else
			{
				echo "<h2 align='center' style='color: white;background-color: red;'>Not Registered<h2>";
				include 'registration.html';
			}
		}
	}
}
?>