<?php 
		l2:

 if(isset($_POST["id"]))  
 {  
      $output = '';  
      $conn = mysqli_connect("localhost", "root", "", "myrailway");  
      $query = "SELECT * FROM route WHERE id = '".$_POST["id"]."'";  
      $result = mysqli_query($conn, $query);  
      
      $output .= ' <div class="row">';  
      while($row = mysqli_fetch_array($result))  
      {   
           $output .= ' 
                    <div class="col-lg-5">
						<img src="1a.jpg" alt="Train image"  height="400px" width="400px">
                    </div>	
					
		            <div class="col-lg-5">
						<h1>'.$row["TrainName"].'</h1>
						<h5>Travel:</h5>
						<p class="pp">'.$row["FromStation"].' to  '.$row["ToStation"].'</p> 
						 <h5>Arrival and Departure Time:</h5>
						<p class="pp">'.$row["ArrivalTime"].' to '.$row["DepartureTime"].'</p>
						<h5>Business Class Fare:</h5>
						<p class="pp">'.$row["BusinessClassFare"].' PKR</p>
						<h5>Standard Class Fare:</h5>
						<p class="pp">'.$row["StandardClassFare"].' PKR</p>
						<h5>Economical Class Fare:</h5>
						<p class="pp">'.$row["EconomicalClassFare"].' PKR</p>
                    </div>
				
				    	
           ';  
           $trainname= $row['TrainName'];
           $fromstation=$row['FromStation'];
		   $tostation=$row['ToStation'];
		   $arrivaltime=$row['ArrivalTime'];
		   $departuretime=$row['DepartureTime'];
           $totalfare=$row['BusinessClassFare'];
      } 
      
      $output .= ' </div>  ';  
      echo $output;  

        
      
 } 
session_start();

$conn = mysqli_connect("localhost","root","","myrailway");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
      die('Could not connect: '.mysqli_connect_error()); 
}

if(isset($_POST["id"]))  
{
for($f=1; $f == 1; $f++)
{
$query = "SELECT * FROM route WHERE id = '".$_POST["id"]."'";  
$sql_result = mysqli_query($conn, $query); 
$TrainName = mysqli_fetch_assoc($sql_result);
if(!empty($TrainName)){
  $_SESSION['train_info'] = $TrainName['TrainName'];

  $_SESSION["TrainName"] = $TrainName["TrainName"];

  $TrainName=$_SESSION["TrainName"];

}
}

for($f=1; $f == 1; $f++)
{
$query = "SELECT * FROM route WHERE id = '".$_POST["id"]."'";  
$sql_result = mysqli_query($conn, $query); 
$FromStation = mysqli_fetch_assoc($sql_result);
if(!empty($FromStation)){
  $_SESSION['fstation_info'] = $FromStation['FromStation'];

  $_SESSION["FromStation"] = $FromStation["FromStation"];

  $FromStation=$_SESSION["FromStation"];

}
}

for($f=1; $f == 1; $f++)
{
$query = "SELECT * FROM route WHERE id = '".$_POST["id"]."'";  
$sql_result = mysqli_query($conn, $query); 
$ToStation = mysqli_fetch_assoc($sql_result);
if(!empty($ToStation)){
  $_SESSION['tstation_info'] = $ToStation['ToStation'];

  $_SESSION["ToStation"] = $ToStation["ToStation"];

  $ToStation=$_SESSION["ToStation"];

}
}

for($f=1; $f == 1; $f++)
{
$query = "SELECT * FROM route WHERE id = '".$_POST["id"]."'";  
$sql_result = mysqli_query($conn, $query); 
$BusinessClassFare = mysqli_fetch_assoc($sql_result);
if(!empty($BusinessClassFare)){
  $_SESSION['BusinessClassFare_info'] = $BusinessClassFare['BusinessClassFare'];

  $_SESSION["BusinessClassFare"] = $BusinessClassFare["BusinessClassFare"];

  $BusinessClassFare=$_SESSION["BusinessClassFare"];

}
}

for($f=1; $f == 1; $f++)
{
$query = "SELECT * FROM route WHERE id = '".$_POST["id"]."'";  
$sql_result = mysqli_query($conn, $query); 
$StandardClassFare = mysqli_fetch_assoc($sql_result);
if(!empty($StandardClassFare)){
  $_SESSION['StandardClassFare'] = $StandardClassFare['StandardClassFare'];

  $_SESSION["StandardClassFare"] = $StandardClassFare["StandardClassFare"];

  $StandardClassFare=$_SESSION["StandardClassFare"];

}
}

for($f=1; $f == 1; $f++)
{
$query = "SELECT * FROM route WHERE id = '".$_POST["id"]."'";  
$sql_result = mysqli_query($conn, $query); 
$EconomicalClassFare = mysqli_fetch_assoc($sql_result);
if(!empty($EconomicalClassFare)){
  $_SESSION['EconomicalClassFare'] = $EconomicalClassFare['EconomicalClassFare'];

  $_SESSION["EconomicalClassFare"] = $EconomicalClassFare["EconomicalClassFare"];

  $EconomicalClassFare=$_SESSION["EconomicalClassFare"];

}
}

for($f=1; $f == 1; $f++)
{
$query = "SELECT * FROM seatavailablility  WHERE TrainName='$TrainName';";  
$sql_result = mysqli_query($conn, $query); 
$EconomicalAvailableseats = mysqli_fetch_assoc($sql_result);
if(!empty($EconomicalAvailableseats)){
  $_SESSION['EconomicalAvailableseats'] = $EconomicalAvailableseats['EconomicalAvailableseats'];

  $_SESSION["EconomicalAvailableseats"] = $EconomicalAvailableseats["EconomicalAvailableseats"];

  $EconomicalAvailableseats=$_SESSION["EconomicalAvailableseats"];

}
}
for($f=1; $f == 1; $f++)
{
$query = "SELECT * FROM seatavailablility  WHERE TrainName='$TrainName';";  
$sql_result = mysqli_query($conn, $query); 
$BusinessAvailableseats = mysqli_fetch_assoc($sql_result);
if(!empty($BusinessAvailableseats)){
  $_SESSION['BusinessAvailableseats'] = $BusinessAvailableseats['BusinessAvailableseats'];

  $_SESSION["BusinessAvailableseats"] = $BusinessAvailableseats["BusinessAvailableseats"];

  $BusinessAvailableseats=$_SESSION["BusinessAvailableseats"];

}
}
for($f=1; $f == 1; $f++)
{
$query = "SELECT * FROM seatavailablility  WHERE TrainName='$TrainName';";  
$sql_result = mysqli_query($conn, $query); 
$StandardAvailableseats = mysqli_fetch_assoc($sql_result);
if(!empty($StandardAvailableseats)){
  $_SESSION['StandardAvailableseats'] = $StandardAvailableseats['StandardAvailableseats'];

  $_SESSION["StandardAvailableseats"] = $StandardAvailableseats["StandardAvailableseats"];

  $StandardAvailableseats=$_SESSION["StandardAvailableseats"];

}
}
}

if (isset($_POST['submit']))
{
    
$name=$_POST['name'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$stype=$_POST['stype'];
$seat=$_POST['seat'];
$bdate=$_POST['bdate'];
$tdate=$_POST['tdate'];
$last_id = 1;
$TrainName = $_SESSION["TrainName"];

$username= $_SESSION["Username"];

$FromStation=$_SESSION["FromStation"];
$ToStation=$_SESSION["ToStation"];
$BusinessAvailableseats=$_SESSION["BusinessAvailableseats"];
$StandardAvailableseats=$_SESSION["StandardAvailableseats"];
$EconomicalAvailableseats=$_SESSION["EconomicalAvailableseats"];
$seatable = 'Available seats';
if($stype == 'Business')
{
    $fare=$_SESSION["BusinessClassFare"];
    $seatable = $BusinessAvailableseats;
}
elseif($stype == 'Economical')
{
    $fare = $_SESSION["EconomicalClassFare"];
    $seatable = $EconomicalAvailableseats;
}
else{
    $fare = $_SESSION["StandardClassFare"];
    $seatable = $StandardAvailableseats;
}
if($seatable > $seat)
{
$sql = "INSERT INTO bookings (Username,NameOfPassenger,TrainName,FromStation,ToStation, Age,Gender,SeatClass, TotalBookedSeats,TotalFare,BookingDate,TravelingDate) VALUES ('$username','$name','$TrainName','$FromStation', '$ToStation','$age', '$gender','$stype',$seat,$fare*$seat,'$bdate','$tdate');";
    if(mysqli_query($conn, $sql))
{ 
    $last_id = $conn->insert_id;
    $message = "Thank You! For Booking your Ticket in $TrainName and ur id = $last_id"; 
    echo "<script type='text/javascript'>alert('$message');</script>";
}
else
{  
    $message = "Sorry!!! Your seats cannot be Booked.  Please try again."; 
    echo "<script type='text/javascript'>alert('$message');</script>";
} 

$a = true;
if($stype == 'Business')
{
    if($BusinessAvailableseats > $seat)
    {
     $sql1 = "UPDATE seatavailablility SET BusinessAvailableseats = BusinessAvailableseats-'$seat' , BusinessBookedseats=BusinessBookedseats+'$seat' WHERE TrainName='$TrainName'; ";
	    if(mysqli_query($conn, $sql1))
        { 
            $message = "Your Bussiness Class Seats have been booked";
            echo "<script type='text/javascript'>alert('$message');</script>";
             goto l1;
 
        }
        else
        {  
            $message = "Sorry!!!!! Bussinuss Class seat are not booked"; 
            echo "<script type='text/javascript'>alert('$message');</script>"; 

        }
    }else
    {
        $message = "Sorry!!!!! Bussinuss Class seat are not available"; 
            echo "<script type='text/javascript'>alert('$message');</script>"; 
    }

}
elseif($stype == 'Economical')
{
    if($EconomicalAvailableseats > $seat)
    {
        $sql1 = "UPDATE seatavailablility SET EconomicalAvailableseats = EconomicalAvailableseats-'$seat' , EconomicalBookedseats=EconomicalBookedseats+'$seat' WHERE  TrainName='$TrainName';";
        if(mysqli_query($conn, $sql1))
        {  
            $message = "Your Economical Class Seats have been booked";
            echo "<script type='text/javascript'>alert('$message');</script>";
            goto l1;
        }
        else
        {  
            $message = "Sorry!!!!! Economical Class seat are not booked"; 
            echo "<script type='text/javascript'>alert('$message');</script>"; 
        }
    }else
    {
        $message = "Sorry!!!!! Economical Class seat are not available"; 
            echo "<script type='text/javascript'>alert('$message');</script>"; 
    }

}
else
{
    if($StandardAvailableseats > $seat)
    {
        $sql1 = "UPDATE seatavailablility SET StandardAvailableseats = StandardAvailableseats-'$seat' , StandardBookedseats=StandardBookedseats+'$seat' WHERE  TrainName='$TrainName';";
        if(mysqli_query($conn, $sql1))
        {     
            $message = "Your Standard Class Seats have been booked";
            echo "<script type='text/javascript'>alert('$message');</script>";
            goto l1;
        }
        else
        {  
            $message = "Sorry!!!!! Standard Class seat are not booked"; 
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }else
    {
        $message = "Sorry!!!!! Standard Class seat are not available /n Please booking Again."; 
            echo "<script type='text/javascript'>alert('$message');</script>"; 
    }

}
echo "<script type='text/javascript'>alert('$message');</script>"; 


}
else
{
    $message = "Sorry!!!!! $seat $stype Class seat of $TrainName are not available anymore.  Please try to booking Again with other class or less seats of $stype class."; 
    echo "<script type='text/javascript'>alert('$message');</script>"; 
}
}


?>






<!DOCTYPE html>
<html>
    <head>
        <title>Railway Management System</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
	    <link rel="stylesheet" href="styles.css">
<style>
  
table.center {
  margin-left: auto;
  margin-right: auto;
}

input[type=text],input[type=date], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.icon {
  width: 0.5em;
  height: 0.5em;
  fill: red;
  vertical-align: top;
}
</style>
    </head>
    <body>
       
<br/>
<svg id="definition" version="1.1" xmlns="http://www.w3.org/2000/svg"><defs><symbol id="required" viewbox="0 0 128 128"><g><path d="M110.1,16.4L75.8,56.8l0.3,1l50.6-10.2v32.2l-50.9-8.9l-0.3,1l34.7,39.1l-28.3,16.5L63.7,78.2L63,78.5   l-18.5,49L17.2,111l34.1-39.8v-0.6l-50,9.2V47.6l49.3,9.9l0.3-0.6L17.2,16.7L45.5,0.5l17.8,48.7H64L82.1,0.5L110.1,16.4z"></path></g></symbol></defs></svg>
	  
        <div class="myDiv">
            <h1 class="hh"><b>Add Passenger</b></h1>
            <form action="view_ticket.php" name="view_ticket" method="post"  onsubmit="return validate()">
                <div class="form-group">
                  <label for="Name"><b>Name </b> <svg class="icon" focusable="false"><use xlink:href="#required"></use></svg></label>
                  <input  type="text" id="name" name="name" class="form-control" id="name" autofocus placeholder="-- Enter Full Name --" >
                </div>
                <div class="form-group">
                  <label for="age"><b>Age </b> <svg class="icon" focusable="false"><use xlink:href="#required"></use></svg></label>
                  <input type="number" id="age" name="age" placeholder="-- Enter Age --" class="form-control" min="0">
                  
                </div>
                <div class="form-group">
                    <label for="gender"><b>Gender </b><svg class="icon" focusable="false"><use xlink:href="#required"></use></svg></label>
					
                    <select class=" form-control" name="gender" id="gender">
					 <option disabled selected>--Select Gender --</option>
					  <option value="male">Male</option>
					  <option value="female">Female</option>
					</select>
                </div>
				
                <div class="form-group">
                  <label for="booking date"><b>Booking Date </b> <svg class="icon" focusable="false"><use xlink:href="#required"></use></svg></label>
<?php 

$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;
?>
                  <input type="date" id="bdate" name="bdate"  value="<?php echo $today; ?>" class="form-control" >
                </div>

				<div class="form-group">
                    <label for="seatclass"><b>Ticket Class </b> <svg class="icon" focusable="false"><use xlink:href="#required"></use></svg></label>
					
                    <select class=" form-control" name="stype" id="stype">
					<option disabled selected>--Select Class --</option>
					  <option value="Economical">Economical</option>
					  <option value="Standard">Standard</option>
					  <option value="Business">Business</option>
					</select>
                </div>

                <div class="form-group">
                  <label for="trvel date"><b>Traveling Date </b> <svg class="icon" focusable="false"><use xlink:href="#required"></use></svg></label>
                  <input  type="date"id="tdate" name="tdate"  class="form-control" min="0">
                </div>
				
				<div class="form-group">
                  <label for="age"><b>No. of Seats </b> <svg class="icon" focusable="false"><use xlink:href="#required"></use></svg></label>
                  <input type="number" id="seat" name="seat" placeholder="-- Total Seats --" class="form-control" min="0">
                </div>
 

                <button  style="margin:5px; width:20% " TYPE="Submit" value="Submit" name="submit" id="submit"  class="btn btn-success "> Confirm Ticket </button>			
               

        </div>

<!--Payment-->

<div id="TicketModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" role="content">
        <div class="modal-content">
            <div class="modal-header" id="clr2">
                <h4 class="modal-title"> 
                    Payment-Enter Your Credit Details
                </h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;

                </button>
            </div>
            <div class="modal-body" id="clr">
                <form action="" id="clr1">
                    <div class="form-group row">
                        <div class="col-sm-3 offset-sm-1">
                        <label for="number" class=" col-form-label"><b>Credit Card No. :</b></label>
                        </div>
						
                        <div class="col-sm-5">
                        <input type="number" name="number" id="number" placeholder="xxxx xxxx xxxx xxxx" class=" form-control" >
                        </div>
                    </div>
					
                    <div class="form-group row">
                        <div class="col-sm-3 offset-sm-1">
                            <label for="username" class="col-form-label"><b>Username :</b></label>
                        </div>
                        <div class="col-sm-5">
						 
                            <input type="data" class="form-control" name="username" id="usename" placeholder="-- Enter username --">
							
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3 offset-sm-1">
                            <label for="pin" class="col-form-label"><b>Pin Code :</b></label>
                        </div>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" name="pin" id="pin" placeholder="xxxx">
                        </div>
                    </div>
					
					<div class="form-group row"> 
					    <div class="col-sm-3 offset-sm-1">
                            <label for="pin" class="col-form-label"><b>Expiry Month & Year:</b></label>
                        </div>
                        <div class="col-sm-5">
						    <input type="month" id="month" name="month" placeholder="-- Expiry Month --"> 
                        </div>
                    </div>
					

					
					<div  class="form-row">
		                  <button style="margin:5px; width:20%" type="button" class="btn btn-danger "><a> Close</a> </button>
                          <div class="modal-footer"  id="clr2">
                
				             <input  style="color:#ffffff; text-decoration:none; width:10%;"type="button" class="btn btn-danger " value="Confirm" onclick="inserting();"></input>
                         </div>
                           <button  style="margin:5px; width:20% " TYPE="Submit" value="done" name="done" id="done"  class="btn btn-success "> Donee </button>
                          
                          
	                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</form>


<!--Ticket Receipt  -->
<?php
l1:
?>
<div  id="Ticketreceipt" class="modal fade" role="dialog">
    

    <div class="modal-dialog modal-lg" role="content">
	    <div   class="modal-content">
		    <div  id="block1"  >
				<div class="modal-header" id="clr2">
					<h4 style="color:black;text-align: center;font-size: 30px;font-weight: bold"> Ticket Receipt </h4>
					
				</div>
                
				<div class="modal-body" id="clr">
					<div    class="container" style="background-color: #D6EAF8 ;border-radius: 10px;padding: 40px;">
						<div class="row">
							<div class="col-lg-6">
								<img src="5.jpg" alt="Train image"  height="250px" width="300px">
							</div>
							<div class="col-lg-6" style="color:black;font-size: 25px;font-weight: bold">
                            <td ><?php echo $TrainName; ?></td>
                            </div>
                            <div class="col-lg-6"  style="font-size: 20px" >
								<h5>Type: </h5>
								<td ><?php echo $stype ;echo '  Class' ?></td>
								<h5>Travel:</h5>
								<td ><?php echo $FromStation ;echo '  To  '; echo $ToStation?></td>
								<h5>Fare:</h5>
								<td><?php echo $fare; ?></td>
							
							</div>
						</div>
						<div style="text-align: right;">
								<label for="number"><b>Booking ID :</b></label>
								<td><?php echo $last_id ?></td>
						</div>
						<hr/>
						<div >
							<h3 style="text-align: center;">Passenger Detail</h3>
						</div>
						<table  class="center" border="9" cellpadding="10" cellspacing="20" width="100%">
						<tr>
							<th>   Sr. No   </th>	
							<th>   Name  </th>
							<th>   Age  </th>
							<th>   Gender  </th>
							<th>   Booked Seats  </th>
							<th>   Total Fare   </th>
							
						</tr>
						<tr>
							<th> 1 </th>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $age; ?></td>
                            <td><?php echo $gender; ?></td>
                            <td><?php echo $seat; ?></td>
                            <td><?php echo $fare*$seat; ?></td>
                            
							
						</tr>
						
					</table>
					<br/>
                    <div style="text-align: right;">
								<label for="number"><b>Total Fare : </b></label>
                                <td><?php echo $fare*$seat; ?></td>
                                <label for="number"><b> pkr</b></label>
						</div>					
					</div>
					
				</div>
			</div>
			<div class="modal-footer"  id="clr2">
            <button   style="background-color:FF0033 ; width:49.5%;height:5%;font-size: 15px;font-weight: bold" TYPE="button" class="btn btn-warning ">  <a  href="passenger_home.php" > Close </a> </button>
				 <input  style="background-color:00CC00;color:white; text-decoration:none;width:49.5%;height:5%;font-size: 15px;font-weight: bold"type="button" class="btn btn-danger " value="Print" onclick="printPage('block1');"></input>
            </div>
			
        </div>
    </div>
	
</div>

    <!-- jQuery and JS bundle w/ Popper.js -->
   
    <script>
          $('#ticket').click(function(){
                    $('#TicketModal').modal();
    
                });
            </script>
			<script>
          $('#ticke').click(function(){
                    $('#Ticketreceipt').modal();
    
                });
    </script>
	
	<script>

	function printPage(id)
	{
	   var html="<html>";
	   html+= document.getElementById(id).innerHTML;
	   html+="</html>";

	   var printWin = window.open();
	  
	   printWin.document.write(html);
	   printWin.document.close();
	   printWin.focus();
	   printWin.print();
	   printWin.close();
      
	}
	</script>
    </body>
</html>

<?php

if(isset($_SESSION['error']))
{
session_destroy();
}

?>