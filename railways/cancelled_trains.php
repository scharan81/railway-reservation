<html>
<head>

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
body{
         background-image:url('img/Boat2.png');
         
         background-position:absolute;
         background-repeat:no-repeat;
         background-size:cover;
         border:0;
         margin:0;
    }
    input[type=submit]:hover{
        cursor:pointer;
    }
    ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
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
  background-color: #111;
}

.active {
  background-color: #04AA6D;
}
</style>
<ul> 
    <li><a href="admin_index.html">Home</a></li>
    <li><a href="adminlogin.html">Logout</a></li>
</ul>    
</html>


<?php 
     $host = "localhost";
     $user = "id17109384_railways_user";
     $password ="Enterpassword@123";
     $db = "id17109384_railways";
     $conn=mysqli_connect($host,$user,$password,$db);
    if($res=mysqli_query($conn,"SELECT * FROM trains_demo WHERE tavailable='N'"))
    {
    if(mysqli_num_rows($res))
    {
      echo "<style>td{text-align:center;border:hidden;} .our {border: 1px solid black; height:50px;}ul{list-style-type: none;margin: 0;padding: 0;overflow: hidden;background-color: #333;margin-top:0px;}li {float: left;}li a {display: block;color: white;text-align: center;padding: 14px 16px;text-decoration: none;}li a:hover:not(.active) {background-color: #111;}.active {background-color: #04AA6D;}</style>";
      echo "<body><form action='cancelled_trains1.php' method='POST'>";
      echo "<h1 style='color:white;margin-left: 150px;'>Cancelled Trains</h1>";
      echo "<div style='margin-left:50px;'>";
      echo "<table class='our' style='align:center; background-color:white;'>";
      echo "<tr class='our'>";
          echo "<th class='our' style='width:100px;'>Train Num</th>";
          echo "<th class='our' style='width:150px;'>Train Name";
          echo "<th class='our' style='width:150px;'>From</th>";
          echo "<th class='our' style='width:150px;'>To</th>";
          echo "<th class='our' style='width:150px;'>Date Of Journey</th>";
          echo "<th class='our' colspan='4'>Tickets Available</th>";
      echo "</tr>";
        $n=1;
        while($row=mysqli_fetch_array($res)){
          echo "<tr class='our'>";
                
          echo "<td class='our' rowspan='2';style='width: 150px;'><input type='hidden' name='trainid".htmlspecialchars($n)."' value=".$row["trainid"].">". $row["trainid"] . "</td>";
          echo "<td class='our' rowspan='2';style='width: 200px;'><input type='hidden' name='tname".htmlspecialchars($n)."' value=".$row["tname"].">" . $row["tname"] . "</td>";
          echo "<td class='our' rowspan='2';style='width: 200px;'><input type='hidden' name='fromcity".htmlspecialchars($n)."' value=".$row['fromcity']." >" .$row['fromcity']. "</td>";
          echo "<td class='our' rowspan='2';style='width: 200px;'><input type='hidden' name='tocity".htmlspecialchars($n)."' value=".$row['tocity'].">" . $row['tocity'] . "</td>";
          echo "<td class='our'  rowspan='2';style='width: 200px;'><input type='hidden' name='dt".htmlspecialchars($n)."' value=".$row["dateofjourney"].">" . date("d-m-Y",strtotime($row['dateofjourney'])) . "</td>";
        echo "<th class='our' ><label for='SL'>SL<br>Rs.".$row["SL"]."</label></th><th class='our'><label for='AC'>AC<br>Rs.".$row["AC"]."</label></th><th class='our'><label for='2A'>2A<br>Rs.".$row["2A"]."</label></th><th class='our'><label for='3A'>3A<br>Rs.".$row["3A"]."</label></th>";
                  echo "<tr class='our'>";
                  if($row['SL']>=0)
                  {
                  echo "<td class='our'style='width: 100px;'><input type='hidden' name='numbs".htmlspecialchars($n)."' value=".$row["SLA"].">" . $row["SLA"] . "</td>";
                  }
                  else{
                      echo "<td class='our' style='width: 100px;'><input type='hidden' name='numbs".htmlspecialchars($n)."' value=".$row["SLA"].">WL" . $row["SLA"] . "</td>";
                  }
                  if($row['AC']>=0)
                  {
                  echo "<td class='our' style='width: 100px;'><input type='hidden' name='numba".htmlspecialchars($n)."' value=".$row["ACA"].">" . $row["ACA"] . "</td>";
                  }
                  else{
                      echo "<td class='our' style='width: 100px;'><input type='hidden' name='numba".htmlspecialchars($n)."' value=".$row["ACA"].">WL" . $row["ACA"] . "</td>";
                  }
                  if($row['2A']>=0)
                  {
                  echo "<td  class='our' style='width: 100px;'><input type='hidden' name='numb2a".htmlspecialchars($n)."' value=".$row["2AA"].">" . $row["2AA"] . "</td>";
                  }
                  else{
                      echo "<td class='our' style='width: 100px;'><input type='hidden' name='numb2a".htmlspecialchars($n)."' value=".$row["2AA"].">WL" . $row["2AA"] . "</td>";
                  }
                  if($row['3A']>=0)
                  {
                  echo "<td class='our' style='width: 100px;'><input type='hidden' name='numb3a".htmlspecialchars($n)."' value=".$row["3AA"].">" . $row["3AA"] . "</td>";
                  }
                  else{
                      echo "<td class='our' style='width: 100px;'><input type='hidden' name='numb3a".htmlspecialchars($n)."' value=".$row["3AA"].">WL" . $row["3AA"] . "</td>";
                  }
        echo "<td id='our' style='width: 100px;'><input type='submit' value='Reshedule' name=".htmlspecialchars($n)."></td>";
        echo "<tr>";
        $n=$n+1;
        }
        echo "</div></table></form></body>";

    }

    else
    {
       echo "<div id='charan'></div>";
       echo " <script>document.getElementById('charan').innerHTML+=`<div class='hover_bkgr_fricc'><span class='helper'></span><div><div class='popupCloseButton'>&times;</div><h3 style='color:green;text-align:center;'>NO Trains Are Cancelled.All Trains Are Running As Per Schedule </h3></div></div>`; $('.hover_bkgr_fricc').show();
       $('.hover_bkgr_fricc').click(function(){
        window.location.href='admin_index.html';
        });
        $('.popupCloseButton').click(function(){
        window.location.href='admin_index.html';
        });</script>";
      }
    }
    else
    {
       echo "<div id='charan'></div>";
       echo " <script>document.getElementById('charan').innerHTML+=`<div class='hover_bkgr_fricc'><span class='helper'></span><div><div class='popupCloseButton'>&times;</div><h3 style='color:green;text-align:center;'>NO Trains Are Cancelled.All Trains Are Running As Per Schedule </h3></div></div>`; $('.hover_bkgr_fricc').show();
       $('.hover_bkgr_fricc').click(function(){
        window.location.href='admin_index.html';
        });
        $('.popupCloseButton').click(function(){
        window.location.href='admin_index.html';
        });</script>";
      }

      

?>