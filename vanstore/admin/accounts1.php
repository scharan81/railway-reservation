<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Accounts</title>
</head>
<?php
	$host = "localhost";
	$user = "root";
	$password = "";
	$db = "id16900325_ooad";
	$conn=mysqli_connect($host,$user,$password,$db);
	if(isset($_POST['submit'])){	
	if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['gender']) && isset($_POST['phone']) && isset($_POST['address']) && isset($_POST['aadhar']) && isset($_POST['date']) && isset($_POST['salary']))
	{
		$name = $_POST['name'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
		$address=$_POST['address'];
		$aadhar=$_POST['aadhar'];
		$date_of_join=$_POST['date'];
		$salary=$_POST['salary'];
        if (mysqli_num_rows(mysqli_query($conn,"SELECT email FROM employee WHERE email = '$email' LIMIT 1")))
        {
			echo "<script>alert('Email already registered');</script>";
            //echo "<h2 align='center' style='color: yellow;background-color: red;'>Someone already registered using this email<br>try with another mail<h2>";
            include 'accounts.php';
        }
        else 
        {
            if(mysqli_query($conn,"INSERT INTO employee values(Null,'$name','$email','$password','$gender','$phone','$address','$aadhar','$date_of_join','$salary')"))
            {
                //echo "<h2 align='center' style='color:yellow;background-color: green;'>Registered sucessfully<a href='#about' style='color:white;'><u>click here</u></a><h2>";
                include 'accounts.php';
            }
            else 
            {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
	}
	else{
		echo "<script>alert('All fields required');</script>";
            //echo "<h2 align='center' style='color: yellow;background-color: red;'>Someone already registered using this email<br>try with another mail<h2>";
		include 'accounts.php';
	}
	}
?>
<body>
</body>
</html>