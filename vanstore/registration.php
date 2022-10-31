<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "id16900325_ooad";
$conn=mysqli_connect($host,$user,$password,$db);
if (isset($_POST['submit'])) 
{
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['gender']) && isset($_POST['email']) && isset($_POST['phone'])) 
    {
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        if (mysqli_num_rows(mysqli_query($conn,"SELECT email FROM login WHERE email = '$email' LIMIT 1")))
        {
            echo "<h2 align='center' style='color: yellow;background-color: red;'>Someone already registered using this email<br>try with another mail<h2>";
            include 'registration.html';
        }
        else 
        {
            if(mysqli_query($conn,"INSERT INTO login(username, password, gender, email,phone) values('$username','$password','$gender','$email','$phone')"))
            {
                //echo "<h2 align='center' style='color:yellow;background-color: green;'>Registered sucessfully<a href='#about' style='color:white;'><u>click here</u></a><h2>";
                include 'index.html';
                echo "<script>window.scrollTo(0,1000);</script>";
            }
            else 
            {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }
    else 
    {
        echo "<h2 align='center' style='color: yellow;background-color: red;'>All fields are required<h2>";
        include 'registration.html';
    }
}
else 
{
    echo "Submit button is not set";
}
?>