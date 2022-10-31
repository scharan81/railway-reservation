<?php
$host = "localhost";
$user = "id17109384_railways_user";
$password ="Enterpassword@123";
$db = "id17109384_railways";
$conn=mysqli_connect($host,$user,$password,$db);
date_default_timezone_set('Asia/Kolkata');
if (isset($_POST['submit'])) 
{
    if (isset($_POST['user']) && isset($_POST['pass'])) 
	{
		$email= $_POST['user'];
		$password = $_POST['pass'];
		if(mysqli_num_rows(mysqli_query($conn,"select * from registration where email='$email' OR username='$email'")))
		{
			if(mysqli_num_rows(mysqli_query($conn,"select * from registration where (email='$email' AND password='$password') 
			OR (username='$email' AND password='$password')")))
			{
				$row=mysqli_fetch_array(mysqli_query($conn,"select * from registration where (email='$email' AND password='$password')
				 OR (username='$email' AND password='$password')"));
				$emailr=$row['email'];
				echo "<script>localStorage.setItem('pemail','$emailr');</script>";
				$y=date("Y");
				$m=date("m");
				$d=date("d");
				$s=(string)($y.'-'.$m.'-'.$d);
				mysqli_query($conn,"UPDATE passenger_details SET jcompleted='Y' WHERE dateofjourney<'$s'");
				$res=mysqli_query($conn,"SELECT * FROM trains_demo WHERE dateofjourney<'$s'");
				$n=mysqli_num_rows($res);
				if($n)
				{
				$row1=mysqli_fetch_array($res);
				$id=$row1['train'];
				$n=$n/30;
				$i=1;
			 while($n>0){
				$k=(string)(7-$n);
				$NewDate=Date('y:m:d', strtotime('+'.$k.' days'));
				mysqli_query($conn,"UPDATE trains_demo SET dateofjourney='$NewDate' ,SLA=50,ACA=50,2AA=50,3AA=50  WHERE train<$id+(30*$i) 
				AND train>=$id+(30*($i-1))");
				$n=$n-1;
				$i=$i+1;
			 }
			}
				
				include "booking1.html";
			}
			else
			{
				echo "<script>alert('Wrong Password Try Again')</script>";	
				include 'index.html';
				
				
				
			}   
			}
			else
			{
				echo "<script>alert('Wrong User Name Try Again')</script>";
				include 'index.html';
				
			}   
		}
		else
		{
			include 'register.html';
			echo '<script>alert("Not Registered Yet.Please Register")</script>';
			
		}
	}
?>