<?php
            $host="localhost";
            $user="root";
            $password="";
            $db="railways_demo";
            $conn=mysqli_connect($host,$user,$password,$db);
            $ticketsnewcount=$_POST['ticketsnewcount'];
            $fmail=$_POST['fmail'];
            
           
            $sql="SELECT * FROM passenger_details WHERE femail='$fmail' ORDER BY ticketno DESC LIMIT $ticketsnewcount";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
           
                while($row=mysqli_fetch_assoc($result))
                {
                
                    echo "<table cellspacing='10'><tr><th>Ticket Number</th><th>Train Number</th><th>Date Of Journey </th><th>Email</th></tr>";
                    echo "<tr><td>".$row['ticketno']."</td><td>".$row['trainid']."</td><td>".$row['dateofjourney']."</td><td>".$row['email']."</td>";
                    if($row['cancellation']=='Y'){
                    echo "<td><b style='color:red;border:1px solid red;'>Cancelled</b></td></tr></table>";
                    }
                    else{
                        echo "</tr></table>";
                    }
                    echo "<table cellspacing='10'><tr><th>Passenger Name</th><th>Age</th><th>Gender</th><th>Phone</th><th>Booking Status</th></tr>";
                    echo "<tr><td>".$row['pname']."</td><td>".$row['page']."</td><td>".$row['gender']."</td><td>".$row['phone']."</td><td>".$row['bstatus']."</td></tr><table>";
                    echo "<p>-------------------------------------------------------------------------------------------------------------------<p>";
            }

    
            }
            else{
                echo "There are no tickets";
            }
        ?>