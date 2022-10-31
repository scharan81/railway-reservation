<?php
$host = "localhost";
$user = "id17109384_railways_user";
$password ="Enterpassword@123";
$db = "id17109384_railways";
$conn=mysqli_connect($host,$user,$password,$db);
if (!empty($_POST["submit"])) 
{
    if (isset($_POST['name']) && isset($_POST['pass']) && isset($_POST['gender']) && isset($_POST['mail']) && isset($_POST['phone']) && isset($_POST['age'])) 
    {
        
        $username = $_POST['name'];
        $password = $_POST['pass'];
        $gender = $_POST['gender'];
        $email = $_POST['mail'];
        $phone = $_POST['phone'];
        $age=$_POST['age'];
        
        $Select = "SELECT email FROM registration WHERE email = \"$email\" LIMIT 1";
        $Insert = "INSERT INTO registration(username,password, gender, email,phone,age) values(\"$username\",\"$password\",\"$gender\",\"$email\",\"$phone\",\"$age\")";
        $res=mysqli_query($conn,$Select);
        if (mysqli_num_rows($res)) 
        {
            echo "<h2>Someone already registers using this email.</h2>";
        }
        else 
        {
            if(mysqli_query($conn,$Insert))
            {
                echo "<script>alert('User Registered Successfully')</script>" ;
                include 'index.html';
            }
            else 
            {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }
    else 
    {
        echo "<script>alert('All fields are required')</script>";
        include 'register.html';
    }
}
else 
{
    echo "<h2>Submit button is not set</h2>";
}
?>