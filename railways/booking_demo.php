<html>
<head>
    <title>Book Your Tickets</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

	<script src="https://www.google.com/jsapi"></script>
</head>
<script>

function onlyOne(checkbox) {
    var checkboxes = document.getElementsByName('check')
    checkboxes.forEach((item) => {
        if (item !== checkbox) item.checked = false
    })
}
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
input[type=submit]:hover
{
    cursor: pointer;
}
</style>
<?php
  $host = "localhost";
  $user = "id17109384_railways_user";
  $password ="Enterpassword@123";
  $db = "id17109384_railways";
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
          $i=0;
          if (mysqli_num_rows($res))
          {
              $i=1;
           
            echo "<style>body{background-image:url('img/Sky2.jpg');background-position:absolute;background-size:cover;margin:0;}td{text-align:center;}table,th,td {border: 1px solid black;border-collapse:collapse;font-family:Arial;margin: 50px 120px ;border-radius:15px;height:50px;}ul{list-style-type: none;margin: 0;padding: 0;overflow: hidden;background-color: #333;margin-top:0px;}li {float: left;}li a {display: block;color: white;text-align: center;padding: 14px 16px;text-decoration: none;}li a:hover:not(.active) {background-color: #111;}.active {background-color: #04AA6D;} input[type='submit']{background-color:#9CDDEC;} input[type='submit']:hover{cursor:pointer;}th{font-color:#7C4ED6;}</style>";
            echo "<body><form action='external_demo.php' method='POST'>";
            echo "<ul><li><a href='booking1.html'>Home</a></li><li><a href='mybooking.html'>My bookings</a></li><li><a href='canceltickets.php'>Cancel Ticket</a></li><li><a href='shift_tickets.php'>Shift Tickets</a></li><li><a href='complaints.php'>Complaints</a></li><li><a href='index.html'>Logout</a></li><li><a href='about.html'>About</a></li></ul>";
            echo "<h1 style='color:white;margin-left: 150px;margin-top:30px;'>Available Trains</h1>";
            echo "<table style='background-color:#FFFFF0;'>";
            echo "<tr>";
                echo "<th style='width:100px;'>Train Num</th>";
                echo "<th style='width:150px;'>Train Name</th>";
                echo "<th style='width:150px;'>From</th>";
                echo "<th style='width:150px;'>To</th>";
                echo "<th style='width:100px;'>Date Of Journey</th>";
                echo "<th colspan='4'>Tickets Available</th>";
            echo "</tr>";
            $n=1;
            while($row=mysqli_fetch_array($res))
            { 
            echo "<tr>";
                
                echo "<td rowspan='2';style='width: 150px;'><input type='hidden' name='trainid".htmlspecialchars($n)."' value=".$row["trainid"].">". $row["trainid"] . "</td>";
                echo "<td rowspan='2';style='width: 200px;'><input type='hidden' name='tname".htmlspecialchars($n)."' value=".$row["tname"].">" . $row["tname"] . "</td>";
                echo "<td rowspan='2';style='width: 200px;'><input type='hidden' name='fromcity".htmlspecialchars($n)."' value=".$from." >" .$from. "</td>";
                echo "<td rowspan='2';style='width: 200px;'><input type='hidden' name='tocity".htmlspecialchars($n)."' value=".$to.">" . $to . "</td>";
                echo "<td rowspan='2';style='width: 200px;'><input type='hidden' name='".htmlspecialchars($n)."' value=".$row["dateofjourney"].">" . date("d-m-Y",strtotime($row['dateofjourney'])) . "</td>";
                echo "<th><input type='checkbox' id='SL' name='check' onclick='onlyOne(this)' value='SL,".$row['SL']."'><label for='SL'>SL<br>Rs.".$row["SL"]."</label></th><th><input type='checkbox' id='AC' name='check' onclick='onlyOne(this)' value='AC,".$row["AC"]."'><label for='AC'>AC<br>Rs.".$row["AC"]."</label></th><th><input type='checkbox' id='2A' name='check' onclick='onlyOne(this)' value='2A,".$row["2A"]."'><label for='2A'>2A<br>Rs.".$row["2A"]."</label></th><th><input type='checkbox' id='3A' name='check' onclick='onlyOne(this)' value='3A,".$row["3A"]."'><label for='3A'>3A<br>Rs.".$row["3A"]."</label></th>";
                echo "<tr>";
                if($row['SL']>=0)
                {
                echo "<td style='width: 100px;'><input type='hidden' name='numbs".htmlspecialchars($n)."' value=".$row["SLA"].">" . $row["SLA"] . "</td>";
                }
                else{
                    echo "<td style='width: 100px;'><input type='hidden' name='numbs".htmlspecialchars($n)."' value=".$row["SLA"].">WL" . $row["SLA"] . "</td>";
                }
                if($row['AC']>=0)
                {
                echo "<td style='width: 100px;'><input type='hidden' name='numba".htmlspecialchars($n)."' value=".$row["ACA"].">" . $row["ACA"] . "</td>";
                }
                else{
                    echo "<td style='width: 100px;'><input type='hidden' name='numba".htmlspecialchars($n)."' value=".$row["ACA"].">WL" . $row["ACA"] . "</td>";
                }
                if($row['2A']>=0)
                {
                echo "<td style='width: 100px;'><input type='hidden' name='numb2a".htmlspecialchars($n)."' value=".$row["2AA"].">" . $row["2AA"] . "</td>";
                }
                else{
                    echo "<td style='width: 100px;'><input type='hidden' name='numb2a".htmlspecialchars($n)."' value=".$row["2AA"].">WL" . $row["2AA"] . "</td>";
                }
                if($row['3A']>=0)
                {
                echo "<td style='width: 100px;'><input type='hidden' name='numb3a".htmlspecialchars($n)."' value=".$row["3AA"].">" . $row["3AA"] . "</td>";
                }
                else{
                    echo "<td style='width: 100px;'><input type='hidden' name='numb3a".htmlspecialchars($n)."' value=".$row["3AA"].">WL" . $row["3AA"] . "</td>";
                }
               
                echo "<td style='width: 100px;'><input type='submit' value='BOOK' name=".htmlspecialchars($n)."></td>";
            echo "</tr>";
            $n=$n+1;
          }
          echo "</table></form></body>";
    
      }
      elseif($i==0)
      {
        echo "<style>body{background-image:url('img/Sky2.jpg');background-position:absolute;background-size:cover;margin:0;}td{text-align:center;}table,th,td {border: 1px solid black;border-collapse:collapse;font-family:Arial;margin: 50px 120px ;border-radius:15px;height:50px;}ul{list-style-type: none;margin: 0;padding: 0;overflow: hidden;background-color: #333;margin-top:0px;}li {float: left;}li a {display: block;color: white;text-align: center;padding: 14px 16px;text-decoration: none;}li a:hover:not(.active) {background-color: #111;}.active {background-color: #04AA6D;} input[type='submit']{background-color:#9CDDEC;} input[type='submit']:hover{cursor:pointer;}th{font-color:#7C4ED6;}</style>";
        echo "<body><form action='external_demo.php' method='POST'>";
        echo "<ul><li><a href='booking1.html'>Home</a></li><li><a href='mybooking.html'>My bookings</a></li><li><a href='canceltickets.php'>Cancel Ticket</a></li><li><a href='shift_tickets.php'>Shift Tickets</a></li><li><a href='complaints.php'>Complaints</a></li><li><a href='index.html'>Logout</a></li><li><a href='about.html'>About</a></li></ul>";
        echo "<h1 style='color:white;margin-left: 150px;margin-top:30px;'>Available Trains</h1>";
        echo "<table style='background-color:#FFFFF0;'>";
        echo "<tr>";
            echo "<th style='width:100px;'>Train Num</th>";
            echo "<th style='width:150px;'>Train Name</th>";
            echo "<th style='width:150px;'>From</th>";
            echo "<th style='width:150px;'>To</th>";
            echo "<th style='width:150px;'>Date Of Journey</th>";
            echo "<th colspan='4'>Tickets Available</th>";
        echo "</tr>";
        $res1=mysqli_query($conn,"SELECT * FROM stations WHERE trainid IN (SELECT trainid FROM trains_demo WHERE tavailable='Y' AND dateofjourney='$date')");
        $n=1;
        while($row=mysqli_fetch_row($res1))
        {
            $tid=$row[1];
          for($ki=0;$ki<=8;$ki++)
          {
              for($kj=$ki+1;$kj<=9;$kj++)
              {
                 if($from==$row[$ki] && $to==$row[$kj])
                {
                    $i=1;
                    $res2=mysqli_query($conn,"SELECT * FROM trains_demo WHERE trainid='$tid' AND dateofjourney='$date'");
                    $row1=mysqli_fetch_array($res2);
                    $scost=(int)$row1['SL'];
                    $scost=(int)(($scost/6)*($kj-$ki));
                    $Acost=(int)$row1['AC'];
                    $Acost=(int)(($Acost/6)*($kj-$ki));
                    $A2cost=(int)$row1['2A'];
                    $A2cost=(int)(($A2cost/6)*($kj-$ki));
                    $A3cost=(int)$row1['3A'];
                    $A3cost=(int)(($A3cost/6)*($kj-$ki));
                    echo "<tr>";
                
                     echo "<td rowspan='2';style='width: 150px;'><input type='hidden' name='trainid".htmlspecialchars($n)."' value=".$row1["trainid"].">". $row1["trainid"] . "</td>";
                    echo "<td rowspan='2';style='width: 200px;'><input type='hidden' name='tname".htmlspecialchars($n)."' value=".$row1["tname"].">" . $row1["tname"] . "</td>";
                    echo "<td rowspan='2';style='width: 200px;'><input type='hidden' name='fromcity".htmlspecialchars($n)."' value=".$from." >" . $from . "</td>";
                 echo "<td rowspan='2';style='width: 200px;'><input type='hidden' name='tocity".htmlspecialchars($n)."' value=".$to.">" . $to. "</td>";
                echo "<td rowspan='2';style='width: 200px;'><input type='hidden' name='".htmlspecialchars($n)."' value=".$row1["dateofjourney"].">" . date("d-m-Y",strtotime($row1['dateofjourney'])) . "</td>";
                echo "<th><input type='checkbox' id='SL' name='check' onclick='onlyOne(this)' value='SL,".$scost."'><label for='SL'>SL<br>Rs.".$scost."</label></th><th><input type='checkbox' id='AC' name='check' onclick='onlyOne(this)' value='AC,".$Acost."'><label for='AC'>AC<br>Rs.".$Acost."</label></th><th><input type='checkbox' id='2A' name='check' onclick='onlyOne(this)' value='2A,".$A2cost."'><label for='2A'>2A<br>Rs.".$A2cost."</label></th><th><input type='checkbox' id='3A' name='check' onclick='onlyOne(this)' value='3A".$A3cost."'><label for='3A'>3A<br>Rs.".$A3cost."</label></th>";
                echo "<tr>";
                if($row1['SL']>=0)
                {
                echo "<td style='width: 100px;'><input type='hidden' name='numbs".htmlspecialchars($n)."' value=".$row1["SLA"].">" . $row1["SLA"] . "</td>";
                }
                else{
                    echo "<td style='width: 100px;'><input type='hidden' name='numbs".htmlspecialchars($n)."' value=".$row1["SLA"].">WL" . $row1["SLA"] . "</td>";
                }
                if($row1['AC']>=0)
                {
                echo "<td style='width: 100px;'><input type='hidden' name='numba".htmlspecialchars($n)."' value=".$row1["ACA"].">" . $row1["ACA"] . "</td>";
                }
                else{
                    echo "<td style='width: 100px;'><input type='hidden' name='numba".htmlspecialchars($n)."' value=".$row1["ACA"].">WL" . $row1["ACA"] . "</td>";
                }
                if($row1['2A']>=0)
                {
                echo "<td style='width: 100px;'><input type='hidden' name='numb2a".htmlspecialchars($n)."' value=".$row1["2AA"].">" . $row1["2AA"] . "</td>";
                }
                else{
                    echo "<td style='width: 100px;'><input type='hidden' name='numb2a".htmlspecialchars($n)."' value=".$row1["2AA"].">WL" . $row1["2AA"] . "</td>";
                }
                if($row1['3A']>=0)
                {
                echo "<td style='width: 100px;'><input type='hidden' name='numb3a".htmlspecialchars($n)."' value=".$row1["3AA"].">" . $row1["3AA"] . "</td>";
                }
                else{
                    echo "<td style='width: 100px;'><input type='hidden' name='numb3a".htmlspecialchars($n)."' value=".$row1["3AA"].">WL" . $row1["3AA"] . "</td>";
                }
               
                echo "<td style='width: 100px;border:None;'><input type='submit' value='BOOK' name=".htmlspecialchars($n)."></td>";
            echo "</tr>";
                     $n=$n+1;
            }
            

              }
          }
      }
      echo "</table></form></body>";
    }
    if($i==0)
      {
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

