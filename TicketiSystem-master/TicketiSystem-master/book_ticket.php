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
				
                <li class="nav-item active ">
                  <a class="nav-link" href="book_ticket.php">Book Ticket</a>
                </li>
				
                <li class="nav-item ">
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
                echo '<a class="nav-link text-danger"> <b>'.$_SESSION["Username"].' </b></a>';
                  ?>
                </li>
			</ul>	
            </div>
          </nav>
		  
<?php 

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if(isset($_POST['submit']))
{ 
	$FromStation=test_input($_POST['FromStation']); 
	$ToStation=test_input($_POST['ToStation']); 

    $statement = $db->prepare("SELECT * FROM route WHERE FromStation=? AND ToStation=? ");
	$statement->execute(array($FromStation,$ToStation));

?>	

	 
			  <div class="col-md-12 forminput">
			  <br/><br/><br/>
			  <h1 class="mainheading">Available Trains</h1>
	           <hr/>

				<table  class="table table-bordered">
					<thead>
                                    <th>id</th>     
                                    <th>Train Name</th> 
									<th>From & To</th> 
									<th>Arrive & Depart Time</th> 
                                    <th>Business Fare</th>
                                    <th>Standard Fare</th>
									<th>Economical Fare</th>
                                    <th>View</th>
                               </thead>  
<?php 
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	foreach ($result as $row) { 

?>
					<tr>
						 
                                    <td><?php echo $row["id"]; ?></td>
                                    <td><?php echo $row["TrainName"]; ?></td> 
									<td><?php echo $row["FromStation"]; ?> to <?php echo $row["ToStation"]; ?>  </td>
                                    <td><?php echo $row["ArrivalTime"]; ?> to <?php echo $row["DepartureTime"]; ?>  </td>
									<td><?php echo $row["BusinessClassFare"]; ?></td> 
									<td><?php echo $row["StandardClassFare"]; ?></td> 
									<td><?php echo $row["EconomicalClassFare"]; ?></td> 
									<td><input type="button" name="view" value="View" id="<?php echo $row["id"]; ?>" class="btn btn-info view_data" /></td>
					</tr>
<?php } ?>			
				</table>
				 
				<div class="container" id="train_detail">  
						  </div>
		

		  
		
<?php 

}else {  
?>	
          <div id="mycarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img class="d-block img-fluid" src="7a.jpg" alt="pizza">
                </div> 
            </div>
          </div>
		 <br/><hr/>
		 <h1 class="mainheading">Search Train</h1>
          <hr/>
		  <aside class="mt-0" >
                <h4 style="text-align:left; padding: 0px 45px; ">Enter following details to search the required train:</h4>
          </aside>
	      	<br/>
			
			</table>
			</div>
			<div class="myDiv" >
				<form  class="form-horizontal forminput" action="" method="post">
				    <div class="form-group">
					  <label class="col-sm-3 control-label"  for="traintiming"><b>Travel From:</b></label>
					   <div class="text-center" >
					  <select class="form-control forminp" id="FromStation" name="FromStation" autofocus>
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
						<label class="col-sm-3 control-label"  for="traintiming"><b>Travel To:</b></label>
					   <div class="text-center" >
					  <select class="form-control forminp" id="ToStation" name="ToStation">
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
							
							<br></br>
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
	
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>

<script>
 $(document).ready(function(){

      $(document).on('click', '.view_data', function(){  
           var id = $(this).attr("id");  
           if(id != '')  
           {  
                $.ajax({  
                     url:"view_ticket.php",  
                     method:"POST",  
                     data:{id:id},  
                     success:function(data){  
                          $('#train_detail').html(data);  
                          
                     }  
                });  
           }            
      }); 

 
 }); 

 </script>
    </body>
</html>

<?php

if(isset($_SESSION['error']))
{
session_destroy();
}

?>