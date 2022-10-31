<?php
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
				
                <li class="nav-item ">
                  <a class="nav-link" href="book_ticket.php">Book Ticket</a>
                </li>
				
                <li class="nav-item active">
                  <a class="nav-link " href="traintiming.php" >Train Schedule</a>
                </li>
				
				<li class="nav-item">
                  <a class="nav-link" href="All Booking Record.php">Records</a>
                </li>
				
				<li class="nav-item">
                  <a class="nav-link" href="profile.php">Profile</a>
                </li>
				
				<li class="nav-item">
                  <a class="nav-link" href="Home.php">Logout</a>
                </li>
				<li class="nav-item">
                  <?php
                session_start();
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
		 <br/><hr/>
		 <h1 class="mainheading">Train Schedule</h1>

<?php 

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if(isset($_POST['submit']))
{ 
	$TrainName=test_input($_POST['TrainName']); 


    $statement = $db->prepare("SELECT * FROM trains WHERE TrainName= ?");
	$statement->execute(array($TrainName));

?>	
			 
			  <div class="col-md-12 forminput">
			  <br/>
				<table  class="center" border="9" cellpadding="10"  width="90%">
					<tr>
						<th>TrainNo</th>
						<th>TrainName</th>
						<th>FromStation</th>
						<th>ToStation</th>
						<th>TotalDistance</th>
						<th>BusinessSeats </th>
						<th>EconomicalSeats</th>
						<th>StandardSeats</th>
						
						
					</tr>
<?php 
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	foreach ($result as $row) { 

?>
					<tr>
						<td><?php echo $row['TrainNo'] ?> </td>
						<td><?php echo $row['TrainName'] ?> </td>
						<td><?php echo $row['FromStation']?></td>
						<td><?php echo $row['ToStation']?></td>
						<td><?php echo $row['TotalDistance']?></td>
						<td><?php echo $row['BusinessSeats']?></td>
						<td><?php echo $row['EconomicalSeats']?></td>
						<td><?php echo $row['StandardSeats']?></td>
					</tr>
<?php } ?>			
				</table>
	<div>
	<br/>
	<br/>
	<h1 class="mainheading">Train Route Timming</h1>
				<table  class="center" border="9" cellpadding="10"  width="90%">
				  
					<tr>
						<th>TrainName</th>
						<th>RouteID</th>
						<th>FromStation</th>
						<th>ToStation</th>
						<th>ArrivalTime</th>
						<th>DepartureTime</th>
						<th>BusinessClassFare</th>
						<th>EconomicalClassFare</th>
						<th>StandardClassFare</th>
					</tr>
<?php 
	$statement = $db->prepare("SELECT * FROM route WHERE TrainName= ?");
	$statement->execute(array($TrainName));
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	foreach ($result as $row) { 

?>
					<tr>
						<td><?php echo $row['TrainName'] ?>  </td>
						<td><?php echo $row['id'] ?> </td>
						<td><?php echo $row['FromStation'] ?> </td>
						<td><?php echo $row['ToStation'] ?> </td>
						<td><?php echo $row['ArrivalTime'] ?>  </td>
						<td><?php echo $row['DepartureTime'] ?>  </td>
						<td><?php echo $row['BusinessClassFare'] ?> </td>
						<td><?php echo $row['EconomicalClassFare'] ?>  </td>
						<td><?php echo $row['StandardClassFare'] ?>  </td>
					</tr>
				
			
<?php 
} ?>
</table>
</div>
<?php
}else {  
?>		
			
			<div class="myDiv" >
				<form  class="form-horizontal forminput" action="" method="post">
				    <div class="form-group">

					  <label class="col-sm-3 control-label"  for="traintiming"><b>Select Train Name:</b></label>
					   <div   class="text-center">
					   <select  class="form-control forminp" id="sel1" autofocus name="TrainName">
					    <option value="">-- Select Train --</option>
					  
					  <?php

						$statement = $db->prepare("SELECT * FROM  trains");
						$statement->execute(array());
						$result = $statement->fetchAll(PDO::FETCH_ASSOC);
							foreach ($result as $row) {
						?>
							<option value="<?php echo $row['TrainName']; ?>"><?php echo $row['TrainName'];?></option>
						<?php
								}

						?>
						</select>
						</div>
					</div>
				
					<div class="form-group">
						<div class="text-center">
						  <button style=" width:39%"  class="btn btn-warning " TYPE="Reset" value="Reset" id="reset">Reset</button>
						  <input style="margin:5px; width:39%"  class="btn btn-danger " type="submit" value="Submit" name="submit" />
						</div>
					</div>
				</form>
			</div>
				

                
		<?php } ?>
			  </div>

    </body>
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
</html>

<?php

if(isset($_SESSION['error']))
{
session_destroy();
}

?>