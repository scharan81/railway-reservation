 <?php  
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
 
	if(!$conn){  
		echo "<script type='text/javascript'>alert('Database failed');</script>";
		  die('Could not connect: '.mysqli_connect_error()); 

		//   $bussavailable = mysqli_query($conn,"select BusinessAvailableseats from seatavailablility");
	  
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


		$username='rimsha12';
		$id= $trainname;
		$FromStation= $fromstation;
		$ToStation= $tostation;
		// $TrainName=$_POST['TrainName'];
		// $travel=$_POST['travel'];
		$fare=$totalfare;
		$tfare = $fare*$seat;
		// $bresult = mysqli_query($conn,"select BusinessAvailableseats from seatavailablility WHERE TrainName = 'trainname'");
		// $bussavailable = $bresult->fetch()['available_seats'];
		$sql = "INSERT INTO bookings (Username,NameOfPassenger,TrainName,FromStation,ToStation, Age,Gender,SeatClass,BookingDate,TravelingDate,TotalFare, TotalBookedSeats) VALUES ('$username','$name','$id','$FromStation', '$ToStation','$age', '$gender','$stype','$bdate','$tdate','$tfare','$seat');";
			if(mysqli_query($conn, $sql))
		{  
			$message = "You have been successfully registered";
		}
		else
		{  
			$message = "query issue"; 
		} 
		echo "<script type='text/javascript'>alert('$message');</script>";

	}
	else
	{
		{$message = "if m ni jaa raha"; }
		echo "<script type='text/javascript'>alert('$message');</script>";
		
	}

?>
 <!DOCTYPE html>
<meta charset="UTF-8">
 <html>
 <head>
 <title>Railway Management System</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
	    <link rel="stylesheet" href="styles.css">
	  </head>
 
<form  name="book_ticket" method="post" >
        <div class="myDiv">
            <h1 class="hh"><b>Add Passenger</b></h1>
                <div class="form-group">
                  <label for="Name"><b>Name :</b></label>
                  <input  type="text" id="name" name="name" class="form-control" id="name" placeholder="-- Enter Full Name --" >
                </div>
                <div class="form-group">
                  <label for="age"><b>Age :</b></label>
                  <input type="number" id="age" name="age" placeholder="-- Enter Age --" class="form-control" min="0">
                  
                </div>
                <div class="form-group">
                    <label for="gender"><b>Gender :</b></label>
					
                    <select name="gender" id="gender">
					 <option disabled selected>--Select Gender --</option>
					  <option value="male">Male</option>
					  <option value="female">Female</option>
					</select>
                </div>
				
                <div class="form-group">
                  <label for="booking date"><b>Booking Date :</b></label>
				<?php 

				$month = date('m');
				$day = date('d');
				$year = date('Y');

				$today = $year . '-' . $month . '-' . $day;
				?>
                  <input type="date" id="bdate" name="bdate"  value="<?php echo $today; ?>" class="form-control" >
                </div>

				<div class="form-group">
                    <label for="seatclass"><b>Ticket Class :</b></label>
					
                    <select name="stype" id="stype">
					<option disabled selected>--Select Class --</option>
					  <option value="Economical">Economical</option>
					  <option value="Standard">Standard</option>
					  <option value="Business">Business</option>
					</select>
                </div>

                <div class="form-group">
                  <label for="trvel date"><b>Traveling Date :</b></label>
                  <input type="date"id="tdate" name="tdate"  class="form-control" min="0">
                </div>
				
				<div class="form-group">
                  <label for="age"><b>No. of Seats :</b></label>
                  <input type="number" id="seat" name="seat" placeholder="-- Total Seats --" class="form-control" min="0">
                </div>

                <!-- <button  style=" width:49.5%" TYPE="Submit" value="Submit" name="submit" id="submit"  class="btn btn-success ">  Signup</button> -->
                 <button  style="margin:5px; width:20% " TYPE="submit" value="submit" name="submit" id="submit"  class="btn btn-success "> Donee </button>		 
                <!--<button  style="margin:5px; width:20% "type="submit"  class="btn btn-success"><a style="color:#ffffff; text-decoration:none; " id="submit" class="lin" data-toggle="Modal" data-target="#Ticketmodal" href="#" aria-disabled="true">Confirm Ticket</a></button> -->	
              
        </div>
		 </form> 

<!--Payment-->
<!-- <form action="view_ticket.php" name="view_ticket" method="post" style="border:1px solid #ccc;" onsubmit="return validate()">     -->
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
                <form method="post" id="clr1">
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
		                  <button style=" width:49.5%" type="button" class="btn btn-danger " class="close" data-dismiss="modal"><a> Close </a> </button>
                           <button  style="margin:5px; width:20% "type="submit"  value="Submit" name="submit" id="submit" class="btn btn-success"> <a style="color:#ffffff; text-decoration:none; "  id="ticke"  class="lin" data-toggle="Modal" data-target="#Ticketreceipt" href="#" aria-disabled="True">Make Payment</a> </button>
                          
	                </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div  id="Ticketreceipt" class="modal fade" role="dialog">
    <button type="button" class="close" data-dismiss="modal">
                    &times;

                </button>
    <div class="modal-dialog modal-lg" role="content">
	    <div   class="modal-content">
		    <div  id="block1"  >
				<div class="modal-header" id="clr2">
					<h4 class="modal-title"> Ticket Receipt </h4>
					
				</div>
				<div class="modal-body" id="clr">
					<div    class="container" style="background-color: #D6EAF8 ;border-radius: 10px;padding: 40px;">
						<div class="row">
							<div class="col-lg-6">
								<img src="5.jpg" alt="Train image"  height="250px" width="300px">
							</div>
							<div class="col-lg-6">
								<h3>Karachi Express</h3>
								<h5>Type: </h5>
								<p class="pp">Middle class</p>
								<h5>Travel:</h5>
								<p class="pp">Lahore to Karachi</p> 
								<h5>Fare:</h5>
								<p class="pp">Rs-/4000</p>
							
							</div>
						</div>
						<div style="text-align: right;">
								<label for="number"><b>Booking ID :</b></label>
								<td><?php echo '4'; ?></td>
						</div>
						<hr/>
						<div >
							<h3 style="text-align: center;">Passenger Detail</h3>
						</div>
						    <?php echo $name; ?>
                            <?php echo $age; ?>
                            <?php echo $gender; ?>
                            <?php echo $seat; ?>
                            <?php echo $tfare; ?>
						
					<br/>
                    <div style="text-align: right;">
								<label for="number"><b>Total Fare : </b></label>
                                <?php echo $tfare; ?>
                                <label for="number"><b> pkr</b></label>
						</div>					
					</div>
					
				</div>
			</div>
			<div class="modal-footer"  id="clr2">
                
				 <input  style="color:#ffffff; text-decoration:none; width:10%;"type="button" class="btn btn-danger " value="Print" onclick="printPage('block1');"></input>
            </div>
			
        </div>
    </div>
	
</div>
</html>
   <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script>
          $('#submit').click(function(){
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