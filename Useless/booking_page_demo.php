<html>
<head>
    <title>Shift Your Tickets</title>
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
input[type=submit]:hover
{
    cursor: pointer;
}
</style>
<?php
  $host="localhost";
  $user="root";
  $password="";
  $db="railways_demo";
  $conn=mysqli_connect($host,$user,$password,$db);

  if(!empty($_POST["submit"]))
  {
      if(isset($_POST["from"]) && isset($_POST['to']) && isset($_POST['date']))
      {
          $from=$_POST["from"];
          $to=$_POST["to"];
          $date=$_POST["date"];
          echo "<script>localStorage.setItem('dj','$date');</script>";
          $query="SELECT * FROM trains_demo WHERE fromcity = \"$from\" and tocity = \"$to\" and dateofjourney = \"$date\" and tavailable='Y'";
          $res=mysqli_query($conn,$query);
          if (mysqli_num_rows($res))
          {
           
            echo "<style>body{background-image:url('img/Sky2.jpg');background-position:absolute;background-size:cover;margin:0;}td{text-align:center;}table,th,td {border: 1px solid black;border-collapse:collapse;font-family:Arial;margin: 50px 120px ;border-radius:15px;height:50px;}ul{list-style-type: none;margin: 0;padding: 0;overflow: hidden;background-color: #333;margin-top:0px;}li {float: left;}li a {display: block;color: white;text-align: center;padding: 14px 16px;text-decoration: none;}li a:hover:not(.active) {background-color: #111;}.active {background-color: #04AA6D;} input[type='submit']{background-color:#9CDDEC;} input[type='submit']:hover{cursor:pointer;}th{font-color:#7C4ED6;}</style>";
            echo "<body><form action='external.php' method='POST'>";
            echo "<ul><li><a href='booking1.html'>Home</a></li><li><a href='mybooking.html'>My bookings</a></li><li><a href='canceltickets.php'>Cancel Ticket</a></li><li><a href='shift_tickets.php'>Shift Tickets</a></li><li><a href='complaints.php'>Complaints</a></li><li><a href='login.html'>Logout</a></li><li><a href='about.html'>About</a></li></ul>";
            echo "<h1 style='color:white;margin-left: 150px;margin-top:30px;'>Available Trains</h1>";
            echo "<table style='background-color:#FFFFF0;'>";
            echo "<tr>";
                echo "<th>Train Num</th>";
                echo "<th>Train Name";
                echo "<th>From</th>";
                echo "<th>To</th>";
                echo "<th>Date Of Journey</th>";
                echo "<th>Tickets Available</th>";
                echo "<th>Ticket Fare</th>";
            echo "</tr>";
            $n=1;
            while($row=mysqli_fetch_array($res))
            { 
            echo "<tr>";
            
                echo "<td style='width: 100px;'><input type='hidden' name='trainid".htmlspecialchars($n)."' value=".$row["trainid"].">". $row["trainid"] . "</td>";
                echo "<td style='width: 150px;'><input type='hidden' name='tname".htmlspecialchars($n)."' value=".$row["tname"].">" . $row["tname"] . "</td>";
                echo "<td style='width: 150px;'><input type='hidden' name='fromcity".htmlspecialchars($n)."' value=".$row["fromcity"]." >" . $row["fromcity"] . "</td>";
                echo "<td style='width: 150px;'><input type='hidden' name='tocity".htmlspecialchars($n)."' value=".$row["tocity"].">" . $row["tocity"] . "</td>";
                echo "<td style='width: 150px;'><input type='hidden' name='".htmlspecialchars($n)."' value=".$row["dateofjourney"].">" . date("d-m-Y",strtotime($row['dateofjourney'])) . "</td>";
                if($row['nooftickets']>=0)
                {
                echo "<td style='width: 100px;'><input type='hidden' name='numb".htmlspecialchars($n)."' value=".$row["nooftickets"].">" . $row["nooftickets"] . "</td>";
                }
                else{
                    echo "<td style='width: 100px;'><input type='hidden' name='numb".htmlspecialchars($n)."' value=".$row["nooftickets"].">WL" . $row["nooftickets"] . "</td>";
                }
                echo "<td style='width: 100px;'><input type='hidden' name='rate".htmlspecialchars($n)."' value=".$row["rate"].">" . $row["rate"] . "</td>";
                echo "<td style='width: 100px;'><input type='submit' value='BOOK' name=".htmlspecialchars($n)."></td>";
            echo "</tr>";
            $n=$n+1;
          }
          echo "</table></form></body>";
    
      }
      else{
          echo "<div id='charan'></div>";
          echo " <script>document.getElementById('charan').innerHTML+=`<div class='hover_bkgr_fricc'><span class='helper'></span><div><div class='popupCloseButton'>&times;</div><h3 style='color:green;text-align:center;'>NO Trains Found.Please select Another Destination.<br><p><a href='booking1.html'>OK</a></p></h3></div></div>`; $('.hover_bkgr_fricc').show();
                  $('.hover_bkgr_fricc').click(function(){
                  window.location.href='booking1.html';
                  });
                  $('.popupCloseButton').click(function(){
                  window.location.href='booking1.html';
                  });</script>";
          
      }


    }
    else{
        echo "every field is required";
        include "booking1.html";
    }
  }
  else{
      echo "Submit button not set yet";
  }
?>


