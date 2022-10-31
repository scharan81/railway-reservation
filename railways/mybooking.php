<?php 
    $host = "localhost";
    $user = "id17109384_railways_user";
    $password ="Enterpassword@123";
    $db = "id17109384_railways";
    $conn=mysqli_connect($host,$user,$password,$db);
?>

<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script>
        $("#comments").ready(function(){
            var ticketcount=2;
            $("button").click(function(){
                ticketcount = ticketcount + 2;
                $("#comments").load("load-tickets.php", {
                    ticketsnewcount: ticketcount,
                    fmail: window.localStorage.getItem('pemail')
                });
            })
        });

    </script>
    </head>

<body>
<ul><li><a href='booking1.html'>Home</a></li><li><a class='active' href='mybooking.php'>My bookings</a></li><li><a href='shift_tickets.php'>Shift Tickets</a></li><li><a href='canceltickets.php'>Cancel Ticket</a></li><li><a href='complaints.php'>Complaints</a></li><li><a href='index.html'>Logout</a></li><li><a href='about.html'>About</a></li></ul>
<style>body{background-image:url('img/Sky2.jpg');background-position:center;background-size:cover;margin:0;}div{background-color:snow;width:60em;margin-left:45px;padding-left:30px;}p{color:black;font-family: Georgia, 'Times New Roman', Times, serif;}ul{list-style-type: none;margin: 0;padding: 0;overflow: hidden;background-color: #333;margin-top:0px;}li {float: left;}li a {display: block;color: white;text-align: center;padding: 14px 16px;text-decoration: none;}li a:hover:not(.active) {background-color: #111;}.active {background-color: #04AA6D;} input[type='submit']{background-color:#9CDDEC;} input[type='submit']:hover{cursor:pointer;}th{font-color:#7C4ED6;}</style><body>
          
<h1 style='color:coral;margin-left:35px;'>Your Recent Bookings </h1>
<div id="comments">
        <?php
            $fmail=$_POST['fmail'];
            $sql="SELECT * FROM passenger_details WHERE femail='$fmail' ORDER BY ticketno DESC LIMIT 2";
            $result=mysqli_query($conn,$sql);
            
           
            if(mysqli_num_rows($result)>0){
                echo "<style>th,td{padding:10px;text-align:center;font-size:20px;padding-left:15px;}</style>";
                echo "<table>";
                while($row=mysqli_fetch_assoc($result))
                {
                    echo "<table cellspacing='10'><tr><th>Ticket Number</th><th>Train Number</th><th>Date Of Journey </th><th>Email</th>";
                    if($row['cancellation']=='Y'){
                    echo "<th><b style='color:red;border:1px solid red;'>Cancelled</b></th></tr>";
                    echo "<tr><td>".$row['ticketno']."</td><td>".$row['trainid']."</td><td>".$row['dateofjourney']."</td><td>".$row['email']."</td></tr></table>";
                    }
                    elseif($row['jcompleted']=='Y')
                    {
                        echo "<th><b style='color:black;border:1px solid black;'>Expired</b></th></tr>";
                    echo "<tr><td>".$row['ticketno']."</td><td>".$row['trainid']."</td><td>".$row['dateofjourney']."</td><td>".$row['email']."</td></tr></table>";
                    }
                    else{
                        echo "<tr><td>".$row['ticketno']."</td><td>".$row['trainid']."</td><td>".$row['dateofjourney']."</td><td>".$row['email']."</td>";
                        echo "</tr></table>";
                    }
                    echo "<table cellspacing='10'><tr><th>Passenger Name</th><th>Age</th><th>Gender</th><th>Phone</th><th>CLASS</th><th>Booking Status</th></tr>";
                    echo "<tr><td>".$row['pname']."</td><td>".$row['page']."</td><td>".$row['gender']."</td><td>".$row['phone']."</td><td>".$row['class']."</td><td>".$row['bstatus']."</td></tr><table>";
                    echo "----------------------------------------------------------------------------------------------------------------------------------------";
                }
                echo "</table>";
            }
            else{
                echo "There are no tickets";
            }
        ?>
</div>

<button style='margin-top:20px;margin-bottom:20px;size:50px;margin-left:50px;'>Show previous Tickets</button>
</body>
</html>