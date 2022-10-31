<html>
<head>
    <title>Cancel Your Tickets</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

	<script src="https://www.google.com/jsapi"></script>
</head>
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
/* Popup box BEGIN */

    body{
        background-image: url("img/Sky2.jpg");
        background-position: absolute;
        background-repeat: repeat;
        background-size: cover;
        }

    td{
        color: burlywood;
        padding-right: 10px;
        padding-left: 10px;
        padding-bottom: 10px;
        padding-top: 10px;
        text-align: center;
    }
    h1{
        color:darkgrey;
    }
    input[type=submit] 
    {

        background-color:black;
        color: cornsilk;
        margin-top: 5px;
        padding: 5px;

    }
    input[type=text]
    {
        padding-right: 10px;
        padding: 3px;
    }
    input[type=date]
    {   
        padding-right: 10px;
        padding:3px;
    }
    input[type=submit]:hover
    {
        cursor: pointer;
        background-color:cadetblue;
    }
    body{
         background-image:url("img/Sky2.jpg");
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
        padding:5px;
    }
    input[type=submit]:hover
    {
        background-color:azure;
        padding:7px;
        cursor: pointer;
    }
    #but{
        background-color:grey;
        cursor:pointer;
        
    }
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
  border:0;
  margin:0;
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
#conditions{
    border:1px solid black;
    background-color:#ADD8E6;
    position:fixed;
    bottom:0;
    width:1600px;
    text-align:left;
}
#fm{

}
</style>
<body>
<ul> 
    <li><a href="booking1.html">Home</a></li>
    <li><a href="mybookings.php">My Bookings</a><li>
    <li><a href="shift_tickets.php">Shift Tickets</a></li>
    <li><a class='active' href="#">Cancel Tickets</a></li>
    <li><a href="#Complaints">Complaints</a></li>
    <li><a href="login.html">Logout</a></li>
    <li><a href="about.html">About</a></li>
   
  </ul>
    <form id="fm" action="" method="POST">
        <p style='color:white;font-size:25px;margin-left:50px;'>To Cancel Your Tickets Please Enter Your Ticket Number In The Field Given Below</P>
        <table>
            <tr>
                <td><p style="color:cornsilk;font-size:25px;margin-top:10px;margin-left:50px;">Enter Ticket Number</p></td>
                <td><input type='text' name='ticketnumber' required style='margin-top:10px;'></td>
            </tr>
            <tr>
                <td><input type="submit" id='but' name="sub" value="Cancel Ticket" style='margin-left:50px;'></td>
            </tr>
        </table>
    </form>
    
</body>
</html>
<?php
$host="localhost";
$user="root";
$password="";
$db="railways_demo";

$conn=mysqli_connect($host,$user,$password,$db);
 if(!empty($_POST["sub"]))
 {

        if(isset($_POST["ticketnumber"]))
        {
            $tno=$_POST["ticketnumber"];
            $sql="SELECT * FROM `passenger_details` WHERE ticketno=$tno";
            if($res=mysqli_query($conn,$sql))
            {
                $row=mysqli_fetch_array($res);
                if($row!=NULL){
                echo "<p style='font-size:20px;color:white;'>Ticket Details...</p>";
                echo "<p style='margin-left:100px;font-size:20px;color:white;'>Ticket No: ".$row['ticketno']."</p>";
                echo "<p style='font-size:20px;color:white;'>Passenger Name : ".$row['pname']."&emsp;&emsp;Age:".$row['page']."</p>";
                echo "<p style='font-size:20px;color:white;'>passenger Id:".$row['pid']."</p>";
                echo "<form action='' method='POST'><input type='hidden' name='tnoc' value=".$row['ticketno']."><input type='hidden' name='tdty' value=".$row['dateofjourney']."><input type='hidden' name='pn' value=".$row['pname']."><input type='hidden' name='pg' value=".$row['page']."><input type='hidden' name='pd' value=".$row['pid']."><input type='submit' id='but' name='consub' value='conform cancellation'></form>";
            }
            else{
                echo "<p style='color:white; font-size:25px;'>No such Bookings Present..<p>";
            }
        }
            else{
                echo "error in sql";
            }
        }
        else{
            echo "ticket number required";
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
                $res2=mysqli_query($conn,"SELECT * FROM passenger_details WHERE trainid='$td' AND dateofjourney='$dojy' AND bstatus LIKE 'WL%' ");
                if(mysqli_num_rows($res2))
                {
                    while($try=mysqli_fetch_array($res2))
                    {
                        $few=(int)substr($try['bstatus'],2,6);
                        if($few==-1)
                        {
                            mysqli_query($conn,"UPDATE passenger_details SET bstatus='CON' WHERE trainid='$td' AND dateofjourney='$dojy' AND bstatus LIKE 'WL-1' ");
                        }
                        else
                        {
                            $s=$try['bstatus'];
                            $few=$few+1;
                            $s1='WL'.(string)$few;
                            mysqli_query($conn,"UPDATE passenger_details SET bstatus='$s1' WHERE trainid='$td' AND dateofjourney='$dojy' AND bstatus='$s' ");
                        }
                    }
                    $query="DELETE FROM `passenger_details` WHERE ticketno=$tno";
                        if(mysqli_query($conn,$query))
                        {
                        echo "<p style='color:white; font-size:30px;'>Tickets Cancelled Successfully</P>";
                        echo "<p style='color:white; font-size:30px;'>Refund will be credited to your account within 30 working days...</p>";
                        echo "<p style='color:white; font-size:30px;'>Thank you !!!!</p>";
                        echo "<div id='charan'></div>";
                        echo " <script>document.getElementById('charan').innerHTML+=`<div class='hover_bkgr_fricc'><span class='helper'></span><div><div class='popupCloseButton'>&times;</div><h3 style='color:green;text-align:center;'>Your Tickets Cancelled Successfully<br>Refund will be credited to your account with in 30 working days</h3></div></div>`; $('.hover_bkgr_fricc').show();
                                $('.hover_bkgr_fricc').click(function(){
                                $('.hover_bkgr_fricc').hide();
                                });
                                $('.popupCloseButton').click(function(){
                                $('.hover_bkgr_fricc').hide();
                                });</script>";
                        }
                    
                }
                else
                {
                    $newsql="SELECT * FROM trains_demo WHERE trainid='$td' AND dateofjourney='$dojy' ";
                    
                    if($k1=mysqli_query($conn,$newsql))
                    {
                        $r1=mysqli_fetch_array($k1);
                        $tnt=$r1['nooftickets']+1;
                        mysqli_query($conn,"UPDATE trains_demo SET nooftickets='$tnt' WHERE trainid='$td' AND dateofjourney='$dojy'");
                        $query="DELETE FROM `passenger_details` WHERE ticketno=$tno";
                        if(mysqli_query($conn,$query))
                        {
                        echo "<p style='color:white; font-size:30px;'>Tickets Cancelled Successfully</P>";
                        echo "<p style='color:white; font-size:30px;'>Refund will be credited to your account within 30 working days...</p>";
                        echo "<p style='color:white; font-size:30px;'>Thank you !!!!</p>";
                        echo "<div id='charan'></div>";
                        echo " <script>document.getElementById('charan').innerHTML+=`<div class='hover_bkgr_fricc'><span class='helper'></span><div><div class='popupCloseButton'>&times;</div><h3 style='color:green;text-align:center;'>Your Tickets Cancelled Successfully<br>Refund will be credited to your account with in 30 working days</h3></div></div>`; $('.hover_bkgr_fricc').show();
                                $('.hover_bkgr_fricc').click(function(){
                                $('.hover_bkgr_fricc').hide();
                                });
                                $('.popupCloseButton').click(function(){
                                $('.hover_bkgr_fricc').hide();
                                });</script>";
                        }
                    }
                    else{
                    echo  "something in innner if";
                        }
                }
            }
            else{
                echo "<p style='color:white; font-size:30px;'>Check UR Ticket Number</P>";
            }
    }
    else{
                echo "something in outer if";
        } 
    }   
    
?>
<html>
<footer id='conditions'>
       <p style='text-align:center;font-size:17px;font-weight:bold;'> Terms And Conditions</p>
       <p style='margin-left:15px;'>Cancellation of the tickets should be possible only before the train departure from its origin</p>
       <P style='margin-left:15px;'>You will be refunded with some charges</p> 
        <p style='margin-left:15px;'>Refund amount will be credited to your acccount within next 30 working days</p> 
</footer>
</html>
