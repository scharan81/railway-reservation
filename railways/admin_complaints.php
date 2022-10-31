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
     if($res=mysqli_query($conn,"SELECT * FROM complaints WHERE cstatus='W'"))
     {
        if(mysqli_num_rows($res))
        {
            echo "<h1 style='margin-left:150px;color:red;'>New Complaints:</h1>";
            echo "<style>body{background-image:url('img/Sky2.jpg');background-position:absolute;background-size:cover;margin:0;}td{text-align:center;padding:0 20px;}th,td{border:none;}table,th,td {border: 1px solid black;border-collapse:collapse;font-family:Arial;margin: 100px 120px ;height:50px;}ul{list-style-type: none;margin: 0;padding: 0;overflow: hidden;background-color: #333;margin-top:0px;}li {float: left;}li a {display: block;color: white;text-align: center;padding: 14px 16px;text-decoration: none;}li a:hover:not(.active) {background-color: #111;}.active {background-color: #04AA6D;} input[type='submit']{background-color:#9CDDEC;} input[type='submit']:hover{cursor:pointer;}th{font-color:#7C4ED6;}</style>";
            echo "<table style='background-color:#FFFFF0;margin-top:10px;'><form action='admin_complaints1.php' method='POST'>";
            echo "<tr><th>Train Id</th><th>From</th><th>Complaint Registerd Station</th><th>Complaint Type</th><th>Description</th></tr>";
            $n=0;

            while($row=mysqli_fetch_array($res))
            {
                $n=$n+1;
                echo "<tr>";
                echo "<input type='hidden' name='id".htmlspecialchars($n)."' value=".$row["id"].">";
                echo "<td style='width: 100px;'><input type='hidden' name='train".htmlspecialchars($n)."' value=".$row["trainid"].">". $row['trainid'] . "</td>";
                echo "<td style='width: 100px;'><input type='hidden' name='tick".htmlspecialchars($n)."' value=".$row["ticketno"].">". $row['ticketno'] . "</td>";
                echo "<td style='width: 100px;'><input type='hidden' name='stage".htmlspecialchars($n)."' value=".$row["comstation"].">". $row['comstation'] . "</td>";
                echo "<td style='width: 100px;'>".$row['comtype']."</td>";
                echo "<td style='width: 250px;text-align:left;'>".$row['comdiscb']."</td>";
                echo "<td style='width: 100px;'><input type='submit' name='".htmlspecialchars($n)."' value='Take Action'></td>";
                echo "</tr>";
            }
        }
        else{
            echo "<div id='charan'></div>";
            echo " <script>document.getElementById('charan').innerHTML+=`<div class='hover_bkgr_fricc'><span class='helper'></span><div><div class='popupCloseButton'>&times;</div><h3 style='color:green;text-align:center;'>NO MORE NEW COMPLAINTS.</h3></div></div>`; $('.hover_bkgr_fricc').show();
            $('.hover_bkgr_fricc').click(function(){
                $('.hover_bkgr_fricc').hide();
            });
            $('.popupCloseButton').click(function(){
                $('.hover_bkgr_fricc').hide();
            });</script>";
            echo "<h2 style='margin:70px 450px;color:orange;'>Previous Resolved Complaints</h2>";
           if( $res=mysqli_query($conn,"SELECT * FROM complaints "))
            {
             if(mysqli_num_rows($res))
            {
            echo "<style>body{background-image:url('img/Sky2.jpg');background-position:absolute;background-size:cover;margin:0;}td{text-align:center;padding:0 20px;} th,td{border:none;}table,th,td {border: 1px solid black;border-collapse:collapse;font-family:Arial;margin: 0px 180px ;height:50px;}ul{list-style-type: none;margin: 0;padding: 0;overflow: hidden;background-color: #333;margin-top:0px;}li {float: left;}li a {display: block;color: white;text-align: center;padding: 14px 16px;text-decoration: none;}li a:hover:not(.active) {background-color: #111;}.active {background-color: #04AA6D;} input[type='submit']{background-color:#9CDDEC;} input[type='submit']:hover{cursor:pointer;}th{font-color:#7C4ED6;}</style>";
            echo "<table style='background-color:#FFFFF0;'><form action='admin_complaints1.php' method='POST'>";
            echo "<tr><th>TrainNo</th><th>TicketNo</th><th>From</th><th>Complaint Registerd Station</th><th>Complaint Type</th><th>Description</th><th>Status</th></tr>";

            while($row=mysqli_fetch_array($res))
            {
                echo "<tr>";
                echo "<td style='width: 100px;'>". $row['trainid'] . "</td>";
                echo "<td style='width: 100px;'>". $row['ticketno'] . "</td>";
                echo "<td style='width: 100px;'>". $row['name'] . "</td>";
                echo "<td style='width: 100px;'>". $row['comstation'] . "</td>";
                echo "<td style='width: 100px;'>".$row['comtype']."</td>";
                echo "<td style='width: 250px;text-align:left;'>".$row['comdiscb']."</td>";
                if($row['cstatus']=='S')
                {
                    echo "<td style='width: 250px;'>Spam Complaint</td>";
                }
                else{
                    echo "<td style='width: 250px;'>Action Taken</td>";
                }
                echo "</tr>";
            }
            
        }
     
        
    }
    }
}
     
?>