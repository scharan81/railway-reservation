<html>
<head>
    <title>Cancel Your Tickets</title>
    
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

	<script src="https://www.google.com/jsapi"></script>
</head>
<script>
  window.onload=function(){
    var sp="-";
  today = new Date();
  var dd = today.getDate();
  var dk = today.getDate()+6;
  var mm = today.getMonth()+1; //As January is 0.
  var yyyy = today.getFullYear();
  
  if(dd<10) dd='0'+dd;
  if(dk<10) dk='0'+dk;
  if(mm<10) mm='0'+mm;
  
  document.getElementById('txtdate').value= yyyy+sp+mm+sp+dd;
  };
  </script>
<style>
.hover_bkgr_fricc{
    background:rgba(0,0,0,.4);
    cursor:pointer;
    display:none;
    height:100%;
    position:fixed;
    text-align:center;
    top:0;
    width:100%;
    z-index:10000;
}
.hover_bkgr_fricc .helper{
    display:inline-block;
    height:100%;
    vertical-align:middle;
}
.hover_bkgr_fricc > div {
    background-color: #fff;
    box-shadow: 10px 10px 60px #555;
    display: inline-block;
    height: auto;
    max-width: 551px;
    min-height: 100px;
    vertical-align: middle;
    width: 60%;
    position: relative;
    border-radius: 8px;
    padding: 15px 5%;
}
.popupCloseButton {
    background-color: #fff;
    border: 3px solid #999;
    border-radius: 50px;
    cursor: pointer;
    display: inline-block;
    font-family: arial;
    font-weight: bold;
    position: absolute;
    top: -20px;
    right: -20px;
    font-size: 25px;
    line-height: 30px;
    width: 30px;
    height: 30px;
    text-align: center;
}
.popupCloseButton:hover {
    background-color: #ccc;
}
.trigger_popup_fricc {
    cursor: pointer;
    font-size: 20px;
    margin: 20px;
    display: inline-block;
    font-weight: bold;
}
    body{
        background-image:url('img/Boat2.png');
         background-color:#F5F5F5;
         background-position:absolute;
         background-repeat:no-repeat;
         background-size:cover;
         border:0;
         margin:0;
    }
    input[type=text]
    {  
      height:30px;
      font-size:14pt;
      margin-top:30px;
    }
    input[type=submit]
    {
        margin-top:30px;
        margin-left:50px;
        padding:5px;
        background-color:brown;
        color:white;
    }
    input[type=submit]:hover
    {
        background-color:green;
        padding:7px;
        cursor: pointer;
    }
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
  border:0;
  margin:0;
  text:10px;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: grey;
}

.active {
  background-color: #04AA6D;
}
.box{
width:1000px;
height:300px;
border:3px solid white;
margin-left:230px;
border-radius:25px;
background-color:#BCD4E6;
text-align:center;
}

</style>
<body>
<ul> 
    <li><a href="booking1.html">Home</a></li>
    <li><a href="mybooking.html">My Bookings</a><li>
    <li><a href="shift_tickets.php">Shift Tickets</a></li>
    <li><a class='active' href="#">Cancel Tickets</a></li>
    <li><a href="complaints.php">Complaints</a></li>
    <li><a href="index.html">Logout</a></li>
    <li><a href="about.html">About</a></li>
   
  </ul>
    <form action="" method="POST">
    <p style="font-size:30px;text-align:center; ">Are you cancelling your tickets and losing money?? Now no need for that.....<br>Now you can shift your ticket to your required date...try it once....<a href="shift_tickets.php">shift ticket</a></p>
        <div class="box">
            <p style="font-size:40px">Enter your ticket number to cancel your ticket</p>
        <table>
            <tr>
                <td><p style="color:black;font-size:30px;margin:0 200px;">Enter Ticket Number</p></td>
                <td><input type='text' name='ticketnumber' style="margin:0 -150px;" pattern='[0-9]+' maxlength='7' size='7' required></td>
                <input type='hidden' name='txtdate' id='txtdate' value=''>
            </tr>
            <tr>
                <td><input type="submit" name="sub" style="margin:50px 200px"value="Cancel Ticket"></td>
            </tr>
        </table>
        </div>
        
       
    </form><br><br><br>
    
</body>
</html>
<?php
$host = "localhost";
$user = "id17109384_railways_user";
$password ="Enterpassword@123";
$db = "id17109384_railways";
$conn=mysqli_connect($host,$user,$password,$db);
 if(!empty($_POST["sub"]))
 {

        if(isset($_POST["ticketnumber"]))
        {
            $tno=$_POST["ticketnumber"];
            $djyrs=$_POST["txtdate"];
            $sql="SELECT * FROM `passenger_details` WHERE ticketno=$tno ";
            if($res=mysqli_query($conn,$sql))
            {
                $row=mysqli_fetch_array($res);
                if($row!=NULL)
                {
                    if($row['cancellation']=='Y')
                    {
                        echo "<p style='font-size:25px;'>These Tickets Are Already Cancelled</p>";
                        echo "<div id='charan'></div>";
                        echo " <script>document.getElementById('charan').innerHTML+=`<div class='hover_bkgr_fricc'><span class='helper'></span><div><div class='popupCloseButton'>&times;</div><h3 style='color:green;text-align:center;'>These Tickets Are Already Cancelled. </h3></div></div>`; $('.hover_bkgr_fricc').show();
                            $('.hover_bkgr_fricc').click(function(){
                            $('.hover_bkgr_fricc').hide();
                            });
                            $('.popupCloseButton').click(function(){
                            $('.hover_bkgr_fricc').hide();
                            });</script>";

                    }
                    elseif($row['jcompleted']=='Y')
                    {
                        echo "<p style='font-size:25px;'>These Tickets Are Already Expired.</p>";
                        echo "<div id='charan'></div>";
                        echo " <script>document.getElementById('charan').innerHTML+=`<div class='hover_bkgr_fricc'><span class='helper'></span><div><div class='popupCloseButton'>&times;</div><h3 style='color:green;text-align:center;'>These Tickets Are Already Expired  </h3></div></div>`; $('.hover_bkgr_fricc').show();
                            $('.hover_bkgr_fricc').click(function(){
                            $('.hover_bkgr_fricc').hide();
                            });
                            $('.popupCloseButton').click(function(){
                            $('.hover_bkgr_fricc').hide();
                            });</script>";
                    }
                else{
                    
                    echo "<h2 style='margin-left:150px;'>Conform Your Cancellation</h2>";
                    echo "<div style='font-size:20px;background-color:white;;width:450px;margin-top:0;margin-left:50px;padding-left:50px'>";
                    echo "<p style='font-size:30px;margin-left:50px;color:brown'>Ticket Details...</p>";
                    echo "<p style='margin-left:100px;font-size:20px;'>Ticket No: ".$row['ticketno']."</p>";
                    echo "<p style='font-size:20px;'>Passenger Name : ".$row['pname']."&emsp;&emsp;Age:".$row['page']."&emsp;&emsp;Class:".$row['class']."</p>";
                    echo "<p style='font-size:20px;'>passenger Id:".$row['pid']."&emsp;&emsp;DateofJrny:".date("d-m-Y",strtotime($row['dateofjourney']))."</p>";
                    echo "<p style='font-size:20px;'>From : ".$row['pfrom']."&emsp;&emsp;To:".$row['pto']."</p>";
                    echo "<form action='' method='POST'><input type='hidden' name='tnoc' value=".$row['ticketno']."><input type='hidden' name='tdty' value=".$row['dateofjourney']."><input type='hidden' name='pn' value=".$row['pname']."><input type='hidden' name='pg' value=".$row['page']."><input type='hidden' name='pd' value=".$row['pid']."><input type='submit' name='consub' value='conform cancellation'></form>";
                    echo "</div>";
                    }
                     
                }
                else{
                    echo "<p style='font-size:25px;'>No such bokkings Present</p>";
                        echo "<div id='charan'></div>";
                        echo " <script>document.getElementById('charan').innerHTML+=`<div class='hover_bkgr_fricc'><span class='helper'></span><div><div class='popupCloseButton'>&times;</div><h3 style='color:green;text-align:center;'>No such Bookings Present.  </h3></div></div>`; $('.hover_bkgr_fricc').show();
                            $('.hover_bkgr_fricc').click(function(){
                            $('.hover_bkgr_fricc').hide();
                            });
                            $('.popupCloseButton').click(function(){
                            $('.hover_bkgr_fricc').hide();
                            });</script>";
                    }
            }
          
        }

       
    }
    

    if(!empty($_POST["consub"]))
    {

        $tno=$_POST["tnoc"];
        $dojy=$_POST["tdty"];
        
        $q="SELECT * FROM passenger_details WHERE ticketno='$tno'";
            if($res=mysqli_query($conn,$q))
            {
                
            $row=mysqli_fetch_array($res);
            if($row!=NULL)
            {
                $td=$row['trainid'];
                $tclass=$row['class'];
                $res2=mysqli_query($conn,"SELECT * FROM passenger_details WHERE trainid='$td' AND dateofjourney='$dojy' AND class='$tclass' AND bstatus LIKE 'WL%' ");
                if(mysqli_num_rows($res2))
                {
                    while($try=mysqli_fetch_array($res2))
                    {
                        $few=(int)substr($try['bstatus'],2,6);
                        if($few==-1)
                        {
                            mysqli_query($conn,"UPDATE passenger_details SET bstatus='CON' WHERE trainid='$td' AND dateofjourney='$dojy'  AND class='$tclass' AND bstatus LIKE 'WL-1' ");
                        }
                        else
                        {
                            $s=$try['bstatus'];
                            $few=$few+1;
                            $s1='WL'.(string)$few;
                            mysqli_query($conn,"UPDATE passenger_details SET bstatus='$s1' WHERE trainid='$td' AND dateofjourney='$dojy' AND bstatus='$s' AND class='$tclass' ");
                        }
                    }
                    $query="UPDATE passenger_details SET cancellation='Y' WHERE ticketno=$tno";
                        if(mysqli_query($conn,$query))
                        {
                            echo "<div id='charan'></div>";
                            echo " <script>document.getElementById('charan').innerHTML+=`<div class='hover_bkgr_fricc'><span class='helper'></span><div><div class='popupCloseButton'>&times;</div><h3 style='color:green;text-align:center;'>Your Tickets Cancelled Successfully<br>Refund will be credited to your account with in 10 working days</h3></div></div>`; $('.hover_bkgr_fricc').show();
                                    $('.hover_bkgr_fricc').click(function(){
                                    $('.hover_bkgr_fricc').hide();
                                    });
                                    $('.popupCloseButton').click(function(){
                                    $('.hover_bkgr_fricc').hide();
                                    });</script>";
                        echo "<p style='font-size:30px;'>Tickets Cancelled Successfully</P>";
                        echo "<p style='font-size:30px;'>Refund will be credited to your account within 10 working days...</p>";
                        echo "<p style='font-size:30px;'>Thank you !!!!</p>";
                        }
                    
                }
                else
                {
                    $newsql="SELECT * FROM trains_demo WHERE trainid='$td' AND dateofjourney='$dojy' ";
                    
                    if($k1=mysqli_query($conn,$newsql))
                    {
                        $r1=mysqli_fetch_array($k1);
                        if($tclass=='SL')
                        {
                        $tnt=$r1['SLA']+1;
                        mysqli_query($conn,"UPDATE trains_demo SET SLA='$tnt' WHERE trainid='$td' AND dateofjourney='$dojy'");
                        }
                        elseif($tclass=='AC')
                        {
                        $tnt=$r1['ACA']+1;
                        mysqli_query($conn,"UPDATE trains_demo SET ACA='$tnt' WHERE trainid='$td' AND dateofjourney='$dojy'");
                        }
                        elseif($tclass=='2A')
                        {
                        $tnt=$r1['2AA']+1;
                        mysqli_query($conn,"UPDATE trains_demo SET 2AA='$tnt' WHERE trainid='$td' AND dateofjourney='$dojy'");
                        }
                        else
                        {
                        $tnt=$r1['3AA']+1;
                        mysqli_query($conn,"UPDATE trains_demo SET 3AA='$tnt' WHERE trainid='$td' AND dateofjourney='$dojy'");
                        }
                        $query="UPDATE passenger_details SET cancellation='Y' WHERE ticketno=$tno";
                        if(mysqli_query($conn,$query))
                        {
                            echo "<div id='charan'></div>";
                            echo " <script>document.getElementById('charan').innerHTML+=`<div class='hover_bkgr_fricc'><span class='helper'></span><div><div class='popupCloseButton'>&times;</div><h3 style='color:green;text-align:center;'>Your Tickets Cancelled Successfully<br>Refund will be credited to your account with in 10 working days</h3></div></div>`; $('.hover_bkgr_fricc').show();
                                    $('.hover_bkgr_fricc').click(function(){
                                    $('.hover_bkgr_fricc').hide();
                                    });
                                    $('.popupCloseButton').click(function(){
                                    $('.hover_bkgr_fricc').hide();
                                    });</script>";
                        echo "<p style=' font-size:30px;'>Tickets Cancelled Successfully</P>";
                        echo "<p style=' font-size:30px;'>Refund will be credited to your account within 10 working days...</p>";
                        echo "<p style='font-size:30px;'>Thank you !!!!</p>";
                        }
                    }
                    else{
                    echo  "something in innner if";
                        }
                }
            }
            else{
                echo "<p style='font-size:30px;'>Check UR Ticket Number</P>";
            }
    }
    else{
                echo "something in outer if";
        } 
    } 
    ?>
<html>  
    <h2 style="text-align:center; font-size:40px;">Refund charges</h2>

    <p style="font-size:20px;">a) If a confirmed ticket is cancelled more than 48 hours in advance of the scheduled departure of train, a minimum refund will be done as follows.<br>
          -> Rs.240+GST for AC first class or executive class<br>
          -> Rs.200+GST for AC 2-tier or first class<br>
          -> Rs.180+GST for AC 3-tier,AC chair car<br>
          -> Rs.120+GST for Sleeper class<br>
          -> Rs.60+GST for Second class.<br>
       b) If a confirmed ticket is cancelled in between 48 hours and 12 hours for the departure of train then refund will be 25% of the base fare subject to minimum flat cancellation charges.<br>
       c) If a confirmed ticket is cancelled in between 12 hours and 4 hours for the departure of train then refund will be 50% of the bare fare subject to minimum flat cancellation charges.<br>
       d) Refund will be credited within 2-3 days from cancellation date.<br></p>
</html>
