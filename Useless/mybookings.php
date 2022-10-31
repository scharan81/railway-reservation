<?php 
    $host="localhost";
    $user='root';
    $password="";
    $db="railways_demo";

    $conn=mysqli_connect($host,$user,$password,$db);

    $sql="SELECT * FROM passenger_details ORDER BY ticketno DESC ";

    if($res=mysqli_query($conn,$sql))
    {

            echo "<ul><li><a href='booking1.html'>Home</a></li><li><a class='active' href='mybookings.php'>My bookings</a></li><li><a href='shift_tickets.php'>Shift Tickets</a></li><li><a href='canceltickets.php'>Cancel Ticket</a></li><li><a href='complaints.php'>Complaints</a></li><li><a href='login.html'>Logout</a></li><li><a href='about.html'>About</a></li></ul>";
            echo "<style>body{background-image:url('img/Sky2.jpg');background-position:center;background-size:cover;margin:0;}div{background-color:#b3b691;;width:30em;margin-left:45px;}p{color:black;font-family: Georgia, 'Times New Roman', Times, serif;}ul{list-style-type: none;margin: 0;padding: 0;overflow: hidden;background-color: #333;margin-top:0px;}li {float: left;}li a {display: block;color: white;text-align: center;padding: 14px 16px;text-decoration: none;}li a:hover:not(.active) {background-color: #111;}.active {background-color: #04AA6D;} input[type='submit']{background-color:#9CDDEC;} input[type='submit']:hover{cursor:pointer;}th{font-color:#7C4ED6;}</style><body>";
            echo "<h1 style='color:coral;margin-left:35px;'>Your Recent Bookings </h1>";
            if(mysqli_num_rows($res))
            {
                
                while($row=mysqli_fetch_array($res)) 
                
                {
                echo "<div>";
                echo "<p style='margin-left:100px;font-size:20px;'>Ticket No: ".$row['ticketno']."</p>";
                echo "<p style='font-size:20px;'>Train No:&emsp;".$row['trainid']."</p>";
                echo "<p style='font-size:20px;'>Passenger Name : ".$row['pname']."&emsp;&emsp;Age:".$row['page']."</p>";
                echo "<p style='font-size:20px;'>passenger Id:".$row['pid']."</p>";
                echo "<p style='font-size:20px;'>From:&emsp; ".$row['pfrom']."&emsp;&emsp;To : ".$row['pto']."</p>";
                echo "<p style='font-size:20px;'>DateofJourney :".$row['dateofjourney']."&emsp;&emsp;Status:".$row['bstatus']."</p>";
                echo "<p style='margin-left:100px; font-size:20px;'>Happy Journey!!</p>";
                echo "<p>-------------------------------------------------------------<p>";
                echo "</div>";
                }
                echo "</body>";
                echo "<p><a href='booking1.html' style='font-size:15px; color:white;'>Go back to home page</a></p>";
             }
            else
            {
                echo "sql failed";
            }

        }
        else
        {
            echo "connection failed";
        }
    
    

?>