<?php
            $host = "localhost";
            $user = "id17109384_railways_user";
            $password ="Enterpassword@123";
            $db = "id17109384_railways";
            $conn=mysqli_connect($host,$user,$password,$db);
            $ticketsnewcount=$_POST['ticketsnewcount'];
            $fmail=$_POST['fmail'];
            
 
            $sql="SELECT * FROM passenger_details WHERE femail='$fmail' ORDER BY ticketno DESC LIMIT $ticketsnewcount";
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
                    elseif($row['jcompleted']=='Y'){
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