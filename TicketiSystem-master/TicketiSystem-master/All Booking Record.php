<?php
$conn = mysqli_connect("localhost","root","","myrailway");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}

$dbhost = 'localhost';
$dbname = 'myrailway';
$dbuser = 'root';
$dbpass = '';

try {
	$db = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch(PDOException $e) {
	echo "Connection error: ".$e->getMessage();
}
?>

<?php
session_start();
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
		
				
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
		

		<!--Scripts -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/ GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
		
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
</style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top" style="font-family:Comic Sans MS">
            <a class="navbar-brand" href="#">Railway Management System</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                  <a class="nav-link" href="passenger_home.php">Home <span class="sr-only">(current)</span></a>
                </li>
				
                <li class="nav-item">
                  <a class="nav-link" href="book_ticket.php">Book Ticket</a>
                </li>
				
                <li class="nav-item ">
                  <a class="nav-link " href="traintiming.php" >Train Schedule</a>
                </li>
				
				<li class="nav-item active">
                  <a class="nav-link" href="all booking record.php">Records </a>
                </li>
				
				<li class="nav-item">
                  <a class="nav-link" href="profile.php">Profile</a>
                </li>
				
				<li class="nav-item">
                  <a class="nav-link" href="Home.php">Logout</a>
                </li>
				
				<li class="nav-item">
                  <?php
                echo '<a class="nav-link text-danger"> <b>'.$_SESSION["Username"].' </b></a>';
                  ?>
                </li>
				</ul>
            </div>
          </nav>
		  
		  
          <div id="mycarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img class="d-block img-fluid" src="7a.jpg" alt="pizza">
                </div> 
            </div>
          </div>
		  <hr/>
<?php 

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
$username= $_SESSION["Username"];
    $statement = $db->prepare("SELECT BookingID,NameOfPassenger,Gender,Age,TrainName,SeatClass,TotalBookedSeats,FromStation,ToStation,TravelingDate,TotalFare FROM bookings WHERE Username = '$username';");
$statement->execute(array($username));
?>			  
		  <h1 class="mainheading">All Booking History</h1>
	      <hr/><br/>
		  
		  <table  class="center" border="9" cellpadding="10"  width="90%">
        	<tr>
        		<th>   Booking Id   </th>	
        		<th>   Passenger Name   </th>
				<th>   Gender   </th>
				<th>   Age  </th>
				<th>   Train Name   </th>
				<th>   Travel Class   </th>
				<th>   Total Seats   </th>
				<th>   Travel   </th>
				<th>   Travel Date   </th>
				<th>   Total Fare   </th>
				
        	</tr>
<?php 
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	foreach ($result as $row) { 

?>
					<tr>
						 
                                    <td><?php echo $row["BookingID"]; ?></td>
                                    <td><?php echo $row["NameOfPassenger"]; ?></td> 
									<td><?php echo $row["Gender"]; ?></td>
                                    <td><?php echo $row["Age"]; ?> </td>
									<td><?php echo $row["TrainName"]; ?></td> 
									<td><?php echo $row["SeatClass"]; ?></td> 
									<td><?php echo $row["TotalBookedSeats"]; ?></td> 
									<td><?php echo $row["FromStation"]; ?> to <?php echo $row["ToStation"]; ?>  </td>
									<td><?php echo $row["TravelingDate"]; ?></td> 
									<td><?php echo $row["TotalFare"]; ?></td> 
					</tr>   
<?php
} ?>			
				</table>



    </body>

	
</html>

 <footer class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h1>Complain Section</h1>
                    <form>
                        <div class="form-group">
                          <label for="exampleFormControlInput1">Email address</label>
                          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Your Complain</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            <button type="button" class="btn btn-danger mt-3">Submit Complain</button>
                        </div>
                        </form>
                </div>
                <div class="col-lg-6 ">
                    <h1><span class="fa fa-address-card"></span>Contact Info</h1>
                    <p class="mt-5"><span>Gmail:pakrailways@foster.com</span></p>
                    <p class="mt-3"><span ><i class="fa fa-phone"></i>Phone No:</span><span>+92345-2984137</span></p>
                    <p class="mt-3"><span ><i class="fa fa-fax "></i>Telephone No:</span> <span>419037238</span></p>
                </div>
            </div>
        </div>
    </footer>




<?php

if(isset($_SESSION['error']))
{
session_destroy();
}

?>