<?php
    $host = "localhost";
    $user = "id17109384_railways_user";
    $password ="Enterpassword@123";
    $db = "id17109384_railways";
    $conn=mysqli_connect($host,$user,$password,$db);
    if(!empty($_POST['submit']))
     {
        $count=$_POST['count'];
        $tot=$_POST['tot'];
        $pfrom=$_POST['pfrom'];
        $pto=$_POST['pto'];
        $pemail=$_POST['pemail'];
        $dj=$_POST['dj'];
        $tid=$_POST['tid'];
        $i=$_POST['i'];
        $n=$_POST['bts'];
        $ptc=$_POST['ptc'];
        $priceofticket=$_POST['priceofticket'];
        $pnamea =unserialize($_POST['pnamea']);
        $agea = unserialize($_POST['agea']);
        $ida =unserialize($_POST['ida']);
        $pgena =unserialize($_POST['pgena']);
        $pemaila =unserialize($_POST['pemaila']);
        $pphna =unserialize($_POST['pphna']);
        $res= mysqli_query($conn,"SELECT * FROM trains_demo WHERE trainid='$tid' AND dateofjourney='$dj'");
        $row=mysqli_fetch_array($res);
        if($ptc=='SL')
        {
            $tot=$row['SLA'];
        }
        elseif($ptc=='AC')
        {
            $tot=$row['ACA'];
        }
        elseif($ptc=='2A')
        {
            $tot=$row['2AA'];
        }
        else
        {
            $tot=$row['3AA'];
        }
        $f=0;
        while ($f<($i))
        {  
            $pname=$pnamea[$f];
            $age=$agea[$f];
            $id=$ida[$f];
            $pgen=$pgena[$f];
            $pemai=$pemaila[$f];
            $pphn=$pphna[$f];
                if($tot>0)
                {
                $sql_query = "INSERT INTO passenger_details VALUES (NULL,'$pemail' ,'$pname', '$age', '$id','$pgen','$pemai','$pphn','$tid','$dj','$pfrom','$pto','CON','$ptc','$priceofticket','N','N')";
                $tot=$tot-1;
                }
                else{
                $k='WL'.(string)($tot-1);
                $sql_query = "INSERT INTO passenger_details VALUES (NULL,'$pemail' ,'$pname', '$age', '$id','$pgen','$pemai','$pphn','$tid','$dj','$pfrom','$pto','CON',$ptc,'$priceofticket','N','N')";
                $tot=$tot-1;
                }
                if(mysqli_query($conn,$sql_query))
                {
                    $f=$f+1;
                }
                else
                {
                    $f=$f+1;
                }
                
         }
       
    
    if($f<=6)
    {
        if($ptc=='SL'){
        $nsql="UPDATE trains_demo SET SLA='$tot' WHERE trainid='$tid' AND dateofjourney='$dj' ";
        }
        elseif($ptc=='AC')
        {
            $nsql="UPDATE trains_demo SET ACA='$tot' WHERE trainid='$tid' AND dateofjourney='$dj' ";
        }
        elseif($ptc=='2A')
        {
            $nsql="UPDATE trains_demo SET 2AA='$tot' WHERE trainid='$tid' AND dateofjourney='$dj' ";
        }
        else
        {
            $nsql="UPDATE trains_demo SET 3AA='$tot' WHERE trainid='$tid' AND dateofjourney='$dj' ";
        }
        if(mysqli_query($conn,$nsql))
        {
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
                echo "<p style='font-size:20px;'>From:".$pfrom."&emsp;&emsp;To:".$pto."</p>";
                echo "<p style='font-size:20px;'>DateofJourney :".$row['dateofjourney']."&emsp;&emsp;Status:".$row['bstatus']."</p>";
                echo "<p style='margin-left:100px; font-size:20px;'>Happy Journey!!</p>";
                echo "<p>-------------------------------------------------------------<p>";
                echo "</div>";
                }
                echo "</body>";
                echo "<p><a style='font-size:15px;color:white;' href='booking1.html'>Go back to home page</a></p>";
             }
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