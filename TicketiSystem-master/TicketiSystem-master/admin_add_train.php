<?php
session_start();
$conn = mysqli_connect("localhost","root","","myrailway");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
if (isset($_POST['submit']))
{

$trainno=$_POST['trainno'];
$trainname=$_POST['trainname'];
$fromstation=$_POST['fromstation'];
$tostation=$_POST['tostation'];
$totaldistance=$_POST['totaldistance'];
$businessseats=$_POST['businessseats'];
$economicalseats=$_POST['economicalseats'];
$standardseats=$_POST['standardseats'];
$sql = "INSERT INTO trains (trainno, trainname,fromstation,tostation, totaldistance, businessseats, economicalseats, standardseats ) VALUES ('$trainno', '$trainname', '$fromstation','$tostation', '$totaldistance', '$businessseats',  '$economicalseats',  '$standardseats');";
	if(mysqli_query($conn, $sql))
{  
	$message = "You have been successfully registered";
}
else
{  
	$message = "Could not insert record"; 
}


	echo "<script type='text/javascript'>alert('$message');</script>";

}
?>

<!DOCTYPE html>
<meta charset="UTF-8">
<html>
<title>Railway Mangement System</title>
        
		
    <head>
        <title>Railway Management System</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
      <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
	  <link rel="stylesheet" href="styles.css">
	  <SCRIPT src="validationtrain.js"></SCRIPT>
	  
    <style>
* {
  box-sizing: border-box;
}

input[type=text] , input[type=number] , input[type=time]  ,select, textarea {

  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=file]  ,select, textarea {

  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}



label {
  padding: 20px 20px 20px 0;
  display: inline-block;

}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.icon {
  width: 0.5em;
  height: 0.5em;
  fill: red;
  vertical-align: top;
}


</style>
    </head>
    <body data-spy="scroll" data-target="#navbarNav" data-offset="50">
        <nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top" style="font-family:Comic Sans MS">
            <a class="navbar-brand" href="#">Railway Management System</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="admin_add_train.php">Add Train </a>
                </li>
				
                <li class="nav-item">
                  <a class="nav-link" href="admin_add_route.php">Add Route</a>
                </li>
				
                <li class="nav-item ">
                  <a class="nav-link " href="admin_all_trains.php" >View Trains <span class="sr-only">(current)</span></a>
                </li>
				
				<li class="nav-item">
                  <a class="nav-link" href="admin_all_routes.php">View Route</a>
                </li>
				
				<li class="nav-item">
                  <a class="nav-link" href="admin_booking_details.php">Booking Details</a>
                </li>
				
				<li class="nav-item">
                  <a class="nav-link" href="home.php">Logout</a>
                </li>
				
            </div>
          </nav>
		  
	<form action="admin_add_train.php" name="admin_add_train" method="post" style="border:1px solid #ccc " >
        <div class="container">
			<br/>
			<h1 class="mainheading">Add New Train</h1>
			<hr>

				<div class="row">
				<div class="col-25">
				  <label for="trainname"><b>Train Name </b> <svg class="icon" focusable="false"><use xlink:href="#required"></use></svg></label>
				</div>
				<div class="col-75">
				    <input class="form-control" type="text" id="trainname" name="trainname"  autofocus placeholder="-- Train Name Here --"  required>
				</div>
			    </div>
				
				<div class="row">
				<div class="col-25">
				  <label for="trainno"><b>Train No </b> <svg class="icon" focusable="false"><use xlink:href="#required"></use></svg></label>
				</div>
				<div class="col-75">
				    <input class="form-control" type="text" id="trainno" name="trainno" placeholder="-- Train No Here --" required>
				</div>
			    </div>

			  <div class="row">
				<div class="col-25">
				  <label for="city"><b>From(Source) </b> <svg class="icon" focusable="false"><use xlink:href="#required"></use></svg></label>
				</div>
				<div class="col-75">
				    <select  class="form-control" id="fromstation" name="fromstation">
					<option disabled selected>-- Select City --</option>
					<?php
						$records = mysqli_query($conn, "SELECT StationName From station");  // Use select query here 

						while($data = mysqli_fetch_array($records))
						{
							echo "<option value='". $data['StationName'] ."'>" .$data['StationName'] ."</option>";  // displaying data in option menu
						}	
					?>  
				    </select>
               </div>
			  </div>
			  
			  <div class="row">
				<div class="col-25">
				  <label for="City"><b>To(Destination) </b> <svg class="icon" focusable="false"><use xlink:href="#required"></use></svg></label>
				</div>
				<div class="col-75">
				  <select  class="form-control" id="tostation" name="tostation">
					<option disabled selected>-- Select City --</option>
					<?php
						$records = mysqli_query($conn, "SELECT StationName From station");  // Use select query here 

						while($data = mysqli_fetch_array($records))
						{
							echo "<option value='". $data['StationName'] ."'>" .$data['StationName'] ."</option>";  // displaying data in option menu
						}	
					?>  
				    </select>
				</div>
			  </div>
			  
			  <div class="row">
				<div class="col-25">
				  <label for="distance"><b>Total Distance </b> <svg class="icon" focusable="false"><use xlink:href="#required"></use></svg></label>
				</div>
				<div class="col-75">
				  <input class="form-control" type="number" id="totaldistance" name="totaldistance" placeholder="-- Total Distance in km/hr Here --" required>
				</div>
			  </div>
			  
			  <div class="row">
				<div class="col-25">
				  <label for="number"><b>Business Seats </b> <svg class="icon" focusable="false"><use xlink:href="#required"></use></svg></label>
				</div>
				<div class="col-75">
				  <input class="form-control" type="number" id="businessseats" name="businessseats"  placeholder="-- Total Business Seats Here --" required>
				</div>
			  </div>

			  <div class="row">
				<div class="col-25">
				  <label for="number"><b>Economical Seats </b> <svg class="icon" focusable="false"><use xlink:href="#required"></use></svg></label>
				</div>
				<div class="col-75">
				  <input class="form-control" type="number" id="economicalseats" name="economicalseats" placeholder="-- Total Economical Seats Here --" required>
				</div>
			  </div>

			  <div class="row">
				<div class="col-25">
				  <label for="number"><b>Standard Seats </b> <svg class="icon" focusable="false"><use xlink:href="#required"></use></svg></label>
				</div>
				<div class="col-75">
				  <input class="form-control" type="number" id="standardseats" name="standardseats" placeholder="-- Total Standard Seats Here --" required>
				</div>
			  </div>			  
			  
     
			  

			  
			  
				<div class="row">
				  <button style=" width:49.5%"  class="btn btn-warning " TYPE="Reset" value="Reset" id="reset">Reset</button>
				  <button  style=" width:49.5%" TYPE="Submit" value="Submit" name="submit" id="submit"  onclick="if(!this.form.tc.checked){alert('You must agree to the terms first.');return false}" class="btn btn-success ">  Add Train</button>
							
				</div>	
		</div>	
    </form>
    </body>
</html>

<?php

if(isset($_SESSION['error']))
{
session_destroy();
}

?>