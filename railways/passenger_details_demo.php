

<html>
<head>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

	<script src="https://www.google.com/jsapi"></script>
</head>
<script>
    window.onload= function()
    {
      var t1=parseInt(localStorage.getItem('nv'));
      document.getElementById('btnClickedValue').value = t1-1;
      var f=localStorage.getItem('tf');
      document.getElementById('from').value=f;
      var t=localStorage.getItem('tt');
      document.getElementById("to").value=t;
      var n=localStorage.getItem('tn');
      document.getElementById("name").value=n;
      var tpay=localStorage.getItem('tr');
      document.getElementById('priceofticket').value=tpay;
      tpay=tpay*(t1-1);
      console.log(t1);
      document.getElementById('totalpayment').innerHTML="<h2>Total Amount:"+tpay+"</h2>";
    };
    
</script>
<style>
*margin{
margin:0;
padding:0;
box-sizing:border-box;
}
/*body{
background-color:white;
}
 Style the buttons */
.btn {
  border: none;
  outline: none;
  padding: 10px 16px;
  background-color: #f1f1f1;
  cursor: pointer;
  font-size: 18px;
}

/* Style the active class, and buttons on mouse-over */
.active, .btn:hover {
  background-color: #666;
  color: white;
  cursor: pointer;
  margin-left: 15px;
}
body{
background-image: url('img/Sky2.jpg');
background-position: center;
background-repeat: no-repeat;
background-size: cover;
margin: 0px;
}
.container{
width:650px;
height:420px; 
border:1px solid;
background-color:lightsteelblue;
display:flex;
flex-direction:column;
padding:40px;
justify-content:space-around;
margin-left: 10px;

}
.container h2{
text-align:center;
}
.first-row{
display:flex;
}
.owner{
width:100%;

margin-right:40px;
}
.input-field{
border:1px solid #999;
}
.input-field input{
width:100%;
border:none;
outline:none;
padding:10px;
}
.selection{
display:flex;
justify-content:space-between;
align-items:center;
}
.selection select{
padding:10px 20px;
}
input[type=submit]{
background-color:blueviolet;
color:white;
text-align:center;
text-transform:uppercase;
text-decoration:none;
padding:10px;
font-size:18px;
transition:0.5s;
}
input[type=submit]:hover{
background-color:dodgerblue;
cursor: pointer;
}
.cards img
{
width:100px;
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
</style>
<body>
  <body>
		<ul> 
			<li><a href="booking1.html">Home</a></li>
      <li><a href="mybooking.html">My Bookings</a></li>
			<li><a href="shift_tickets.php">Shift Tickets</a></li>
			<li><a href="canceltickets.php">Cancel Tickets</a></li>
			<li><a href="complaints.php">Complaints</a></li>
			<li><a href="index.html">Logout</a></li>
			<li><a href="about.html">About</a></li>
		   
		 </ul>
<h1 style="margin-left: 100px; color: indianred;">Payment</h1>

  
<div id="myDIV">
  <button class="btn active">Credit/Debit Card</button>
  <button class="btn">Googlepay</button>
  <button class="btn">Phonepay</button>
  <button class="btn">Paytm</button>
  
</div><br><br><br>



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
        $count=$_POST['bts'];
        $tot=$_POST['totic'];
        $ptc=$_POST['ptc'];
        $n=1;
        $i=0;
        $pnamea=array();
        $agea=array();
        $ida=array();
        $pgena=array();
        $pemaila=array();
        $pphna=array();
        while ($n<7)
        {   
            if(isset($_POST['pname'.(string)$n]) && isset($_POST['age'.(string)$n]) && isset($_POST['id'.(string)$n]))
            {
                $pname=$_POST['pname'.(string)$n];
                array_push($pnamea,$pname);
                $age=$_POST['age'.(string)$n];
                array_push($agea,$age);
                $id=$_POST['id'.(string)$n];
                array_push($ida,$id);
                $dj=$_POST['djy'];

                $tid=$_POST['tdy'];
                $pfrom=$_POST['pfrom'];
                $pto=$_POST['pto'];
                $pgen=$_POST['gen'.(string)$n];
                array_push($pgena,$pgen);
                $pemaile=$_POST['email'.(string)$n];
                array_push($pemaila,$pemaile);
                $pphn=$_POST['phn'.(string)$n];
                array_push($pphna,$pphn);
                $pemail=$_POST['pemail'];
                $i=$i+1;
            }
            $n=$n+1;
        }
        $pnames=serialize($pnamea);
        $ages=serialize($agea);
        $ids=serialize($ida);
        $pgens=serialize($pgena);
        $pemails=serialize($pemaila);
        $pphns=serialize($pphna);
        echo <<<forming
        <div class="container">
        <form action="passenger_details_demo1.php" method="POST">
        <input type='hidden' id='btnClickedValue' name='bts' value= '' >
              <input type='hidden' id='from' name='from' value= '' >
              <input type='hidden' id='to' name='to' value=''>
              <input type='hidden' id='name' name='name' value=''>
        <h2>Confirm your payment</h2>
        <h2 id='totalpayment'></h2>
        <div class="first-row">
       <div class="owner">
       <h3>Name on card</h3>
       <div class="input-field">
       <input type="text" name="card" maxlength="25" size="25" required>
       </div>
       </div>
       <div class="cvv">
       <h3>CVV</h3>
       <div class="input-field">
       <input type="password" name="cvv" placeholder="XXX" maxlength="3" pattern="[0-9]+" required>
       </div>
       </div>
       </div>
       <div class="second-row">
       <div class="Card-number">
       <h3>Card number</h3>
       <div class="input-field">
       <input type="text" name="actnum" placeholder="XXXX XXXX XXXX" pattern="[0-9]+" maxlength="12" minlength="12" required>
       </div>
       </div>
       </div>
       <div class="third-row">
       <h3>Expire date</h3>
       <div class="selection">
       <div class="date">
       <select name="months" id="months">
       <option value="Jan">Jan</option>
       <option value="Feb">Feb</option>
       <option value="Mar">Mar</option>
       <option value="Apr">Apr</option>
       <option value="May">May</option>
       <option value="Jun">Jun</option>
       <option value="Jul">Jul</option>
       <option value="Aug">Aug</option>
       <option value="Sep">Sep</option>
       <option value="Oct">Oct</option>
       <option value="Nov">Nov</option>
       <option value="Dec">Dec</option>
       </select>
       <select name="years" id="years">
       <option value="2023">2023</option>
       <option value="2022">2022</option>
       <option value="2021">2021</option>
       <option value="2020">2020</option>
       </select>
       </div>
       <div class="cards">
       <img src="img/06cd1a3c_rupay-logo.png" alt="rupay">
       <img src="img/Visa_Inc._logo.svg.png" alt="visa">
       <img src="img/1200px-MasterCard_Logo.svg.png" alt="master card">
           </div>
       </div>
       </div>
       <div id='charan'></div>
       <input type='hidden' name='pnamea' value='$pnames'>
       <input type='hidden' name='agea' value='$ages'>
       <input type='hidden' name='ida' value='$ids'>
       <input type='hidden' name='pgena' value='$pgens'>
       <input type='hidden' name='pemaila' value='$pemails'>
       <input type='hidden' name='pphna' value='$pphns'>
       <input type='hidden' name='count' value='$count'>
       <input type='hidden' name='tot' value='$tot'>
       <input type='hidden' name='dj' value='$dj'>
       <input type='hidden' name='tid' value='$tid'>
       <input type='hidden' name='pfrom' value='$pfrom'>
       <input type='hidden' name='pto' value='$pto'>
       <input type='hidden' name='pemail' value='$pemail'>
       <input type='hidden' name='i' value='$i'>
       <input type='hidden' name='ptc' value='$ptc'>
        <input type='hidden' id='priceofticket' name='priceofticket' value=''>
       <input type="submit" name="submit" onclick="f()" value="Confirm">
       </form>
       </div>
   forming;
} 
     
    
    
?>