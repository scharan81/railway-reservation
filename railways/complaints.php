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
    background-size:cover;
    background-repeat:no-repeat;
    background-color:#FFFF;
    font-size:20px;
    margin:0;
}
form{
    position:relative;
    margin-left:240px;
    border:1px solid black;
    border-radius:15px;
    background-color:whitesmoke;
    padding-left:15px;
    margin-top:20px;
    width:800px;
}
input[type=text]
{
    padding:3px;
    width:200px;
    margin-left:10px;
}
select{
    padding:5px;
    width:200px;
}
td{
    text-align:center;
}
input[type=submit]:hover
{
    cursor:pointer;
    background-color:grey;
    color:white;
}
input[type=submit]
{
    background-color:lightblue;
    margin-bottom:5px;
    padding:5px;
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
  padding: 10px 12px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: grey;
}

.active {
  background-color: #04AA6D;
}

</style>
<script>
    window.onload=function()
    {
        document.getElementById('pemail').value=localStorage.getItem('pemail');
    }
</script>
<body>
<ul> 
    <li><a href="booking1.html">Home</a></li>
    <li><a href="mybooking.html">My Bookings</a><li>
    <li><a href="shift_tickets.php">Shift Tickets</a></li>
    <li><a href="canceltickets.php">Cancel Tickets</a></li>
    <li><a class='active' href="#">Complaints</a></li>
    <li><a href="index.html">Logout</a></li>
    <li><a href="about.html">About</a></li>
   
  </ul>
  
    <form action='complaints.php' method="POST">
        <input type='hidden' id='pemail' name='pemail' value="">
        <h1 style='text-align:center;'>Complaint Form</h1>
        <h4>Enter the below Required Details</h4>
        <table>
            <tr>
                <td><h3 >Ticket Number</h3></td>
                <td><input type='text' name='ticketno' pattern='[0-9]+'></td>
            </tr>
            <tr>
                <td><h3>Name</h3></td>
                <td><input type='text' name='name' required></td>
            </tr>
            <tr>
                <td><h3 >Present Station</h3></td>
                <td> <input type='text' name='station' required></td>
            </tr>
            <tr>
                <td><h3>Train Number</h3></td>
                <td><input type='text' name='train' pattern='[0-9]+' maxlength='5' size='5' required></td>
                </tr>
        </table>
         
        
       
        <h3>Type of complaint</h3>
        <select name="ComplaintType" id="com">
            <option  value="Medical Emergency">Medical Emergency</option>
            <option  value="Theft">Theft</option>
            <option   value="Murder">Murder</option>
            <option  value="Reservation">Reservation</option>
            <option  value="Other">Other</option>
          </select>

        <h3>Describe Your Complaint</h3>
        <textarea id="w3review" name="complaint" rows="15" cols="100"></textarea><br>
        <input type='submit' name='submit' value='Place Complaint' style='margin-top:15px;'>
    </form>
    <p style='position:absolute;position: absolute;top: 150px;right: 40px;padding-left: 2px;color:white;text-decoration:none'>You can get status of Your Previous Complaints<p>
    <a href='mycomplaints.html' style='position:absolute;position: absolute;top: 190px;right: 200px;padding-left: 2px;text-decoration:none'>Here</a>
    
</body>
</html>

<?php 
    $host = "localhost";
    $user = "id17109384_railways_user";
    $password ="Enterpassword@123";
    $db = "id17109384_railways";
    $conn=mysqli_connect($host,$user,$password,$db);
    if(!empty($_POST['submit']))
    {
        $tickno=$_POST['ticketno'];
        $trainid=$_POST['train'];
        $name=$_POST['name'];
        $value=$_POST['ComplaintType'];
        $text=$_POST['complaint'];
        $station=$_POST['station'];
        $fmail=$_POST['pemail'];
        if(mysqli_query($conn,"INSERT INTO complaints VALUES (NULL,'$fmail','$trainid','$tickno','$name','$value','$station','$text','W' ) "))
        {
            echo "<div id='charan'></div>";
            echo " <script>document.getElementById('charan').innerHTML+=`<div class='hover_bkgr_fricc'><span class='helper'></span><div><div class='popupCloseButton'>&times;</div><h3 style='color:green;text-align:center;'>Complaint Registered Successfully.<br>Respective authorities will be informed immediately</h3></div></div>`; $('.hover_bkgr_fricc').show();
                                    $('.hover_bkgr_fricc').click(function(){
                                    window.location.href='complaints.php';
                                    });
                                    $('.popupCloseButton').click(function(){
                                    window.location.href='complaints.php';
                                    });</script>";
        }
        else{
            echo "Sql query error";
        }
    }

?>