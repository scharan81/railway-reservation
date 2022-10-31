<?php
session_start();
if (isset($_SESSION["Username"]))
{
	$conn = mysqli_connect("localhost","root","","myrailway");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}


$sql = "SELECT * FROM customers WHERE username = '".$_SESSION["Username"]."'";
$sql_result = mysqli_query ($conn, $sql) or die ('request "Could not execute SQL query" '.$sql);
$user = mysqli_fetch_assoc($sql_result);
		if(!empty($user)){
			  $_SESSION["username"] = $user["username"];
			  $_SESSION["name"] = $user["name"];
			  $_SESSION["email"] = $user["email"];
			  $_SESSION["phoneno"] = $user["phoneno"];
			  $_SESSION["address"] = $user["address"];
			  $_SESSION["gender"] = $user["gender"];
			  $_SESSION["age"] = $user["age"];
		}
		else{
			$message = 'Not updated.';
		}		
}
?>
<?php

if (isset($_POST['changepw'])){
	$connect = mysqli_connect("localhost","root","","myrailway");
	if(!$connect){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
$Username=$_POST['Username'];
$opw=$_POST['opw'];
$npw=$_POST['npw'];

		$sql2 ="UPDATE user_login SET Passwords= '$npw' WHERE Username= '$Username' AND Passwords='$opw';";
		$query2 = mysqli_query ($connect, $sql2) or die ('request "Could not execute SQL query" '.$sql2);
		if(mysqli_query($query2))
		{  
			echo "<script type='text/javascript'>alert('Password changed successfully');</script>";
		}
		else
		{  
			echo "<script type='text/javascript'>alert('Password changed successfully');</script>"; 
		}  
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
* {
  box-sizing: border-box;
}

input[type=text] ,input[type=date],input[type=password], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

input[type=radio], select, textarea {
  width:8%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 10px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
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
                <li class="nav-item ">
                  <a class="nav-link" href="passenger_home.php">Home <span class="sr-only">(current)</span></a>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link" href="book_ticket.php">Book Ticket</a>
                </li>
				
                <li class="nav-item ">
                  <a class="nav-link " href="traintiming.php" >Train Schedule</a>
                </li>
				
				<li class="nav-item">
                  <a class="nav-link" href="All Booking Record.php">Records</a>
                </li>
				
				<li class="nav-item active" >
                  <a class="nav-link" href="profile.php">Profile</a>
                </li>
				
				<li class="nav-item">
                  <a class="nav-link" href="home.php">Logout</a>
                </li>
				
				<li class="nav-item">
                  <?php
                echo '<a class="nav-link text-danger"> <b>'.$_SESSION["Username"].' </b></a>';
                  ?>
                </li>
              </ul>

            </div>
          </nav>
		  <br/>
		  <br/>
		 
    
        <div class="container">
			<h1 class="mainheading">Profile </h1>
			<hr>
    <div class="text-right">
	<button  style="width:20%; align:center;  "type="button " class="btn btn-info "><a  style="color:#ffffff; text-decoration:none; " id="change" class="aside" data-toggle="Modal" data-target="#passwordmodal" aria-disabled="true">Change Password</a></button>
    </div> 
			  <div class="row">
				<div class="col-25">
				  <label for="name"><b>Full Name :</b></label>
				</div>
				<div class="col-75">
				  <?php
                
                echo '<label class= "masthead-brand text-danger"> <b>'.$_SESSION["name"].'</b></label>';
                  ?>

				</div>
			  </div>
			  
			  
			  <div class="row">
				<div class="col-25">
				  <label for="email"><b>Email:</b></label>
				</div>
				<div class="col-75">
				 <?php
                
                echo '<label class= "masthead-brand text-danger"> <b>'.$_SESSION["email"].'</b></label>';
                  ?>

				</div>
			  </div>
			  
			  <div class="row">
				<div class="col-25">
				  <label for="phoneno"><b>Phone No.:</b></label>
				</div>
				<div class="col-75">
				  <?php
                
                echo '<label class= "masthead-brand text-danger"> <b>'.$_SESSION["phoneno"].'</b></label>';
                  ?>

				</div>
			  </div>
			  
			  <div class="row">
				<div class="col-25">
				  <label for="address"><b>Address:</b></label>
				</div>
				<div class="col-75">
				  <?php
                
                echo '<label class= "masthead-brand text-danger"><b> '.$_SESSION["address"].'</b></label>';
                  ?>

				</div>
			  </div>
			  
			  <div class="row">
				<div class="col-25">
				  <label for="gender"><b>Gender:</b></label>
				</div>
				<div class="col-75">
				  <?php
                
                echo '<label class= "masthead-brand text-danger"> <b>'.$_SESSION["gender"].'</b></label>';
                  ?>

				</div>
			  </div>
			  
			  <div class="row">
				<div class="col-25">
				  <label for="age"><b>Age:</b></label>
				</div>
				<div class="col-75">
				  <?php
                
                echo '<label class= "masthead-brand text-danger"><b> '.$_SESSION["age"].'</b></label>';
                  ?>

				</div>
			  </div>

		</div>
	
		
  
       		
<div id="passwordmodal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" role="content">
        <div class="modal-content">
            <div class="modal-header" id="clr2">
                <h4 class="modal-title"> 
                    Change Password
                </h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;

                </button>
            </div>
            <div class="modal-body" id="clr">
                <form action="#passwordmodal" id="clr1" method="post">
				    <div class="form-group row">
                        <div class="col-sm-3 offset-sm-1">
                        <label for="Username" class=" col-form-label"><b>Username :</b></label>
                        </div>
						
                        <div class="col-sm-5">
                        <input type="text" name="Username"   class=" form-control" >
                        </div>
                    </div>
					
                    <div class="form-group row">
                        <div class="col-sm-3 offset-sm-1">
                        <label for="password" class=" col-form-label"><b>Old Password :</b></label>
                        </div>
						
                        <div class="col-sm-5">
                        <input type="password" name="opw"   class=" form-control" >
                        </div>
                    </div>
					
                    <div class="form-group row">
                        <div class="col-sm-3 offset-sm-1">
                            <label for="password" class="col-form-label"><b>New Password :</b></label>
                        </div>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" name="npw" >
                        </div>
                    </div>

                    
					
					
					<div  class="form-row">
		                  <button style="margin:5px; width:20%" type="button" class="btn btn-danger " class="close"><a> Close</a> </button>
						  <button  style="margin:5px; width:20%" type="submit" name="changepw" class="btn btn-success "> Change Password</button>
	                </div>
					
                </form>

            </div>
        </div>

    </div>

</div>
<footer class="mt-5" id="process">
	    <div class="container">
            <div class="row">
                <div class="col-lg-6">
				    <h1><span class="fa fa-question-circle"></span> Complain Section</h1>
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
                    <h1><span class="fa fa-user"></span> Contact Info</h1>
                    <p class="mt-5"><span><i class="fa fa-envelope" aria-hidden="true"></i>    Gmail : pakrailways@foster.com</span></p>
                    <p class="mt-3"><span ><i class="fa fa-phone" aria-hidden="true"></i>  Phone No :+92345-2984137</span></p>
                    <p class="mt-3"><span ><i class="fa fa-fax "></i>                      Telephone No :419037238</span></p>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>	
    <script>
          $('#change').click(function(){
                    $('#passwordmodal').modal();
    
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