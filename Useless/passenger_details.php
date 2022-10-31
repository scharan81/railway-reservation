<?php
    $host = "localhost";
    $user = "id17109384_railways_user";
    $password ="Enterpassword@123";
    $db = "id17109384_railways";
    $conn=mysqli_connect($host,$user,$password,$db);
    if(!empty($_POST["sub"]))
    {   
        $count=$_POST['bts'];
        $tot=$_POST['totic'];
        $n=1;
        while ($n<7)
        {   
            if(isset($_POST['pname'.(string)$n]) && isset($_POST['age'.(string)$n]) && isset($_POST['id'.(string)$n]))
            {
                $pname=$_POST['pname'.(string)$n];
                $age=$_POST['age'.(string)$n];
                $id=$_POST['id'.(string)$n];
                $dj=$_POST['djy'];
                $tid=$_POST['tdy'];
                $pfrom=$_POST['pfrom'];
                $pto=$_POST['pto'];
                $pgen=$_POST['gen'.(string)$n];
                $pemaile=$_POST['email'.(string)$n];
                $pphn=$_POST['phn'.(string)$n];
                $pemail=$_POST['pemail'];
                if($tot>0)
                {
                $sql_q = "INSERT INTO passenger_details VALUES (NULL,'$pemail' ,'$pname', '$age', '$id','$pgen','$pemaile','$pphn','$tid','$dj','$pfrom','$pto','CON','N','N')";
                $tot=$tot-1;
                }
                else{
                $k='WL'.(string)($tot-1);
                $sql_q = "INSERT INTO passenger_details VALUES (NULL, '$pemail','$pname', '$age', '$id','$pgen','$pemaile','$pphn','$tid','$dj','$pfrom','$pto','$k','N','N')";
                $tot=$tot-1;
                }
                if(mysqli_query($conn,$sql_q))
                {
                    $n=$n+1;
                }
                else
                {
                    $n=$n+1;
                }
            }
            else
            {
                $n=$n+1;
            }
        }

    if($n<=7)
    {
        $nsql="UPDATE trains_demo SET nooftickets='$tot' WHERE trainid='$tid' AND dateofjourney='$dj' ";
        if(mysqli_query($conn,$nsql))
        {
         include "payment.html";
        }
        else
        {
            echo "Not working mowa bro";
        }
        

    }
    else
    {
        echo "Booking Failed";
        include "passenger_details.html";
    }
    }
    else{
        echo "Submit not set";
    }
    
?>
