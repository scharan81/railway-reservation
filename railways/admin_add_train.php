<html>
<head>
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
  var mm = today.getMonth()+1; //As January is 0.
  var yyyy = today.getFullYear();
  
  if(dd<10) dd='0'+dd;
 
  if(mm<10) mm='0'+mm;
  
  document.getElementById('date').setAttribute('min',yyyy+sp+mm+sp+dd);
  document.getElementById('date1').setAttribute('min',yyyy+sp+mm+sp+dd);
 
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
/* Popup box BEGIN */

    body{
        background-image: url("img/Sky2.jpg");
        background-position: absolute;
        background-repeat: repeat;
        background-size: cover;
        margin:0;
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
        margin-left:15px;
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
<body>
<ul> 
    <li><a href="admin_index.html">Home</a></li>
    <li><a href="adminlogin.html">Logout</a></li>
</ul>  
    <h1>Add Train </h1>
    <form action="admin_add_train.php" method="POST">
    <table style='margin: 2px;'>
        <tr>
            <td><p style='font-size: 20px;'>Train Number</p></td>
            <td><input name="tnum" type="text" pattern="[0-9]+"  maxlength='5'  required></td>
            <td><p style='font-size: 20px;'>Train Name</p></td>
            <td><input name="tname" type="text" required></td>
        </tr>
        <tr>
            <td><p style='font-size: 20px;'>From</p></td>
            <td><input name="from" type="text" required></td>
            <td><p style='font-size: 20px;'>To</p></td>
            <td><input name="to" type="text" required></td>
           
        </tr>
            
        
        <tr>
            <td><p style='font-size: 20px;'>Date of Journey</p></td>
            <td><input name="doj" type="date" id="date1" required></td>
        </tr>
        <tr>
        <td><p style='font-size: 20px;'>Number OF Tickets</p></td>
        <td><p>SL</p></td>
        <td><p>AC</p></td>
        <td><p>2A</p></td>
        <td><p>3A</p></td>
        </tr>
        <tr>
        <td></td>
        <td><input name="noticsl" type="text" pattern="[0-9]+" size='5' required></td>
        <td><input name="noticac" type="text" pattern="[0-9]+" size='5' required></td>
        <td><input name="notic2a" type="text" pattern="[0-9]+" size='5' required></td>
        <td><input name="notic3a" type="text" pattern="[0-9]+" size='5' required></td>
        </tr>
        <tr>
        <td><p style='font-size: 20px;'>Ticket Cost</p></td>
        <td><p>SL</p></td>
        <td><p>AC</p></td>
        <td><p>2A</p></td>
        <td><p>3A</p></td>
        </tr>
        <tr>
        <td></td>
        <td><input name="ratesl" type="text" pattern="[0-9]+" size='5' required></td>
        <td><input name="rateac" type="text" pattern="[0-9]+" size='5' required></td>
        <td><input name="rate2a" type="text" pattern="[0-9]+" size='5' required></td>
        <td><input name="rate3a" type="text" pattern="[0-9]+" size='5' required></td>
        </tr>
        <tr>
      <td><input type="submit" name="submit" value="  ADD Train  "></td>
        </tr>
    </table>
    </form> 
<?php 
    $host = "localhost";
    $user = "id17109384_railways_user";
    $password ="Enterpassword@123";
    $db = "id17109384_railways";
    $conn=mysqli_connect($host,$user,$password,$db);
    if(!empty($_POST["submit"]))
    {
        if(isset($_POST["tnum"]) && isset($_POST["tname"]) && isset($_POST["from"]) && isset($_POST["to"]) && isset($_POST["doj"]))
        {
            $tnum=$_POST["tnum"];
            $tname=$_POST["tname"];
            $from=$_POST["from"];
            $to=$_POST["to"];
            $doj=$_POST["doj"];
            $noticsl=$_POST["noticsl"];
            $noticac=$_POST["noticac"];
            $notic2a=$_POST["notic2a"];
            $notic3a=$_POST["notic3a"];
            $ratesl=$_POST['ratesl'];
            $rateac=$_POST['rateac'];
            $rate2a=$_POST['rate2a'];
            $rate3a=$_POST['rate3a'];
            if (mysqli_query($conn,"INSERT INTO trains_demo VALUES (NULL,'$tnum', '$tname', '$from', '$to', '$doj' ,'Y','$noticsl','$noticac','$notic2a','$notic3a','$ratesl','$rateac','$rate2a','$rate3a')"))
            {
                echo "<p style='color:white;font-size:25px;'>Train added successfully</p>";
                echo "<div id='charan'></div>";
                        echo " <script>document.getElementById('charan').innerHTML+=`<div class='hover_bkgr_fricc'><span class='helper'></span><div><div class='popupCloseButton'>&times;</div><h3 style='color:green;text-align:center;'>Train no:".$tnum."<br>Scheduled Successfully</h3></div></div>`; $('.hover_bkgr_fricc').show();
                        $('.hover_bkgr_fricc').click(function(){
                            $('.hover_bkgr_fricc').hide();
                        });
                        $('.popupCloseButton').click(function(){
                            $('.hover_bkgr_fricc').hide();
                        });</script>";
            }   
            else{
                echo "<p style='color:white;font-size:25px;'>Train Already Scheduled!</p>";
                echo "<div id='charan'></div>";
                        echo " <script>document.getElementById('charan').innerHTML+=`<div class='hover_bkgr_fricc'><span class='helper'></span><div><div class='popupCloseButton'>&times;</div><h3 style='color:green;'>Train no:".$tnum."<br>Already Scheduled</h3></div></div>`; $('.hover_bkgr_fricc').show();
                        $('.hover_bkgr_fricc').click(function(){
                            $('.hover_bkgr_fricc').hide();
                        });
                        $('.popupCloseButton').click(function(){
                            $('.hover_bkgr_fricc').hide();
                        });</script>";
            }
        }
        else{
            echo "all fields required";
        }
        
    }
?>
<h1>Cancel Train</h1>
    <form action="admin_add_train.php" method="POST">
        <table>
            <tr>
                <td><p style='font-size: 20px;'>Train Number</p></td>
                <td><p style='font-size: 20px;'>Train Name</p></td>
                <td><p style='font-size: 20px;'>Date of Journey</p></td>
            </tr>
            <tr>
                <td><input type="text" name="tnumb" pattern='[0-9]+' maxlength='5' ></td>
                <td><input type="text" name="tnm"></td>
                <td><input type="date" id='date' name="dor" required></td>
                <td><input type="submit" name="s" value=" Remove Train  "></td>
            </tr>
        </table>
    </form>
</body>
</html>
<?php
        if(!empty($_POST["s"]))
        {
            if(!empty($_POST["tnumb"]))
            {
                $tnumb=$_POST["tnumb"];
                $dty=$_POST["dor"];
                $sql = "UPDATE `trains_demo` SET tavailable='N' WHERE `trains_demo`.`trainid` = '$tnumb' AND dateofjourney='$dty'";
                if ($res=mysqli_query($conn,$sql))
                {
                     if(mysqli_affected_rows($conn))
                     {
                        echo "<p style='color:white;font-size:25px;'>Train Cancelled Successfully</p>";
                        echo "<div id='charan'></div>";
                        echo " <script>document.getElementById('charan').innerHTML+=`<div class='hover_bkgr_fricc'><span class='helper'></span><div><div class='popupCloseButton'>&times;</div><h3 style='color:green;'>Train no:".$tnumb."<br>Cancelled Sucessfully.</h3></div></div>`; $('.hover_bkgr_fricc').show();
                        $('.hover_bkgr_fricc').click(function(){
                            $('.hover_bkgr_fricc').hide();
                        });
                        $('.popupCloseButton').click(function(){
                            $('.hover_bkgr_fricc').hide();
                        });</script>";
                     }
                     else{
                         echo "<p style='color:white;font-size:25px;'>No such trains present</p>";
                         echo "<div id='charan'><div>";
                         echo " <script>document.getElementById('charan').innerHTML+=`<div class='hover_bkgr_fricc'><span class='helper'></span><div><div class='popupCloseButton'>&times;</div><h3 style='color:green;'>No trains Scheduled To Cancel</h3></div></div>`; $('.hover_bkgr_fricc').show();
                        $('.hover_bkgr_fricc').click(function(){
                            $('.hover_bkgr_fricc').hide();
                        });
                        $('.popupCloseButton').click(function(){
                            $('.hover_bkgr_fricc').hide();
                        });</script>";
                     }
                }
                    else{
                    echo "not deleted";
                    }
            }
        else{
                if (!empty($_POST["tnm"]))
                {   
                    $tn=$_POST["tnm"];
                    $dty=$_POST["dor"];
                    $sql = "UPDATE  `trains_demo` SET tavailable='N' WHERE `trains_demo`.`tname` = '$tn' AND dateofjourney='$dty' ";
                    if (mysqli_query($conn,$sql))
                    {
                    if(mysqli_affected_rows($conn))
                     {
                    echo "<p style='color:white;font-size:25px;'>Train Cancelled Successfully</p>";
                    echo "<div id='charan'></div>";
                        echo " <script>document.getElementById('charan').innerHTML+=`<div class='hover_bkgr_fricc'><span class='helper'></span><div><div class='popupCloseButton'>&times;</div><h3 style='color:green;text-align:center;'>Train name:".$tn."<br>Train Cancelled Sucessfully.</h3></div></div>`; $('.hover_bkgr_fricc').show();
                        $('.hover_bkgr_fricc').click(function(){
                            $('.hover_bkgr_fricc').hide();
                        });
                        $('.popupCloseButton').click(function(){
                            $('.hover_bkgr_fricc').hide();
                        });</script>";
                     }
                     else{
                         echo "<p style='color:white;font-size:25px;'>No such trains present</p>";
                         echo "<div id='charan'></div>";
                        echo " <script>document.getElementById('charan').innerHTML+=`<div class='hover_bkgr_fricc'><span class='helper'></span><div><div class='popupCloseButton'>&times;</div><h3 style='color:green;'>No Train Scheduled To Cancel</h3></div></div>`; $('.hover_bkgr_fricc').show();
                        $('.hover_bkgr_fricc').click(function(){
                            $('.hover_bkgr_fricc').hide();
                        });
                        $('.popupCloseButton').click(function(){
                            $('.hover_bkgr_fricc').hide();
                        });</script>";
                     }
                    }
                    else{
                        echo "tn query error";
                    } 
                }
                else{
                    echo "tn not set";
                }
            }
        }
    
    
?>