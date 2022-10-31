<?php
    $host = "localhost";
    $user = "id17109384_railways_user";
    $password ="Enterpassword@123";
    $db = "id17109384_railways";
    $conn=mysqli_connect($host,$user,$password,$db);
    if(!empty($_POST['submit']))
    {
        if(isset($_POST['card']) && isset($_POST['months']) && isset($_POST['actnum']) && isset($_POST['cvv']) && isset($_POST['years']))
        {
            $n=$_POST['bts'];
            $f=$_POST['from'];$t=$_POST['to'];$nm=$_POST['name'];
            $n=(int)$n;
            $sql = "SELECT * FROM passenger_details ORDER BY ticketno DESC LIMIT $n ";
            $res=mysqli_query($conn,$sql);
            echo "<style>body{background-image:url('img/Sun1.jpg');background-position:center;background-size:cover;margin:0;}div{background-color:#b3b691;;width:30em;margin-left:45px;}p{color:black;font-family: Georgia, 'Times New Roman', Times, serif;}ul{list-style-type: none;margin: 0;padding: 0;overflow: hidden;background-color: #333;margin-top:0px;}li {float: left;}li a {display: block;color: white;text-align: center;padding: 14px 16px;text-decoration: none;}li a:hover:not(.active) {background-color: #111;}.active {background-color: #04AA6D;} input[type='submit']{background-color:#9CDDEC;} input[type='submit']:hover{cursor:pointer;}th{font-color:#7C4ED6;}</style><body>";
            echo "<h1 style='color:coral;margin-left:35px;'>Your Bookings </h1>";
            if(mysqli_num_rows($res))
            {
                
                while($row=mysqli_fetch_array($res)) 
                
                {
                echo "<div>";
                echo "<p style='margin-left:100px;font-size:20px;'>Ticket No: ".$row['ticketno']."</p>";
                echo "<p style='font-size:20px;'>Passenger Name : ".$row['pname']."&emsp;&emsp;Age:".$row['page']."</p>";
                echo "<p style='font-size:20px;'>passenger Id:".$row['pid']."</p>";
                echo "<p style='font-size:20px;'>From:".$f."&emsp;&emsp;To:".$t."</p>";
                echo "<p style='font-size:20px;'>DateofJourney :".$row['dateofjourney']."&emsp;&emsp;Status:".$row['bstatus']."</p>";
                echo "<p style='margin-left:100px; font-size:20px;'>Happy Journey!!</p>";
                echo "<p>-------------------------------------------------------------<p>";
                echo "</div>";
                }
                echo "</body>";
                echo "<p><a style='font-size:15px;color:white;' href='booking1.html'>Go back to home page</a></p>";
             }
            else
            {
                echo "sql failed";
            }

        }
        else
        {
            echo "all fields required";
            include 'payment.html';
        }
    }
    else
    {
        echo 'submit not set';
        echo 'okok';
    }
?>