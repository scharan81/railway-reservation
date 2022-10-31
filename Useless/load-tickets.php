<?php
            include 'mybooking1.php';
            $ticketsnewcount=$_POST['ticketsnewcount'];
            
            $sql="SELECT * FROM passenger_details LIMIT $ticketsnewcount";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result))
                {
                    echo "<p>";
                    echo $row['pname'];
                    echo "<br>";
                    echo $row['page'];
                    echo "</p>";
                }
            }
            else{
                echo "There are no tickets";
            }
        ?>