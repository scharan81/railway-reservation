<?php
session_start();
if (isset($_POST['submit']))
{
	$conn = mysqli_connect("localhost","root","","myrailway");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
$Username=$_POST['Username'];
$Passwords=$_POST['Passwords'];
$sql = "SELECT * FROM user_login WHERE Username = '$Username' AND Passwords = '$Passwords';";
$sql_result = mysqli_query ($conn, $sql) or die ('request "Could not execute SQL query" '.$sql);
		$user = mysqli_fetch_assoc($sql_result);
		if(!empty($user)){
			$_SESSION['user_info'] = $user['Username'];
			$message='Logged in successfully';
			header("location:passenger_home.php");
		}
		else{
			$message = 'Wrong email or password.';
		}
	echo "<script type='text/javascript'>alert('$message');</script>";
}

if (isset($_POST['done']))
{
	$conn = mysqli_connect("localhost","root","","myrailway");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
$AdminUsername=$_POST['AdminUsername'];
$Password=$_POST['Password'];
$sql = "SELECT * FROM admins WHERE AdminUsername = '$AdminUsername' AND Passwords = '$Password';";
$sql_result = mysqli_query ($conn, $sql) or die ('request "Could not execute SQL query" '.$sql);
$user = mysqli_fetch_assoc($sql_result);
		if(!empty($user)){
			$_SESSION['user_info'] = $user['AdminUsername'];
			$message='Admin logged in successfully';
			  
			header("location:admin_add_train.php");
		}
		else{
			$message = 'Wrong email or password.';
		}
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
		<SCRIPT src="validationlogin.js"></SCRIPT>
		<SCRIPT src="validationloginadmin.js"></SCRIPT>
<style>
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
                  <a class="nav-link" href="Home.php">Home <span class="sr-only">(current)</span></a>
                </li>
				<li class="nav-item ">
				<a class="nav-link" href="search_train.php">Search</a>
				</li>
                
                <li class="nav-item active">
                  <a class="nav-link " href="places.php" >
                    Famous Places
                  </a>
				  <li class="nav-item">
                  <a class="nav-link" href="registration_page.php">Register</a>
                </li>
                
                </li>
                <li class="nav-item">
                  <a class="nav-link " id="log_in" data-toggle="Modal" data-target="#loginmodal" href="#" aria-disabled="true">Login</a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="#process">Contact</a>
                </li>
				
				<li class="nav-item">
                  <a class="nav-link " id="log_in_admin" data-toggle="Modal" data-target="#loginmodaladmin" href="#" aria-disabled="true">Admin</a>
                </li>
              </ul>

            </div>
          </nav>

<!--
    Carousel
-->

<div id="loginModaladmin" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" role="content">
        <div class="modal-content">
            <div class="modal-header" id="clr2">
                <h4 class="modal-title" style="font-family:Didot, serif; font-size: 30px;" > 
                    Login
                </h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;

                </button>
            </div>
            <div class="modal-body" id="clr">
			    	
				<form id="clr1" action="Home.php"  method="post" name="login" onsubmit="return validateloginadmin()">
				<div class="mylogin">
				<div  ><label for="Username" class=" col-form-label"><b>Username :</b></label></div>
				<div ><input type="text" id="AdminUsername" size="30" maxlength="30" name="AdminUsername" autofocus placeholder="-- Username Here --" class=" form-control"/></div>
				<div >
					<label for="Password" class="col-form-label"><b>Password : </b></label>
				</div>
				<div >
					<input type="password" id="Password" size="30" maxlength="30" name="Password" placeholder="-- Password Here --" class=" form-control"/>
				</div>
				
				<br/>
				<div class="text-center">
				<button style=" width:40%" type="button" class="btn btn-danger " class="close" data-dismiss="modal"><a> Close </a> </button>
				<INPUT style=" width:40%" class="btn btn-success " TYPE="Submit" value="Login" name="done" id="done" class="button">
				</div>
				</div>
				</form>
					
                
            </div>
        </div>
    </div>
</div>


<div id="loginModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" role="content">
        <div class="modal-content">
            <div class="modal-header" id="clr2">
                <h4 class="modal-title" style="font-family:Didot, serif; font-size: 30px;" > 
                    Login
                </h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;

                </button>
            </div>
            <div class="modal-body" id="clr">
			    	
				<form id="clr1" action="places.php"  method="post" name="login" onsubmit="return validatelogin()">
				<div class="mylogin">
				<div  ><label for="Username" class=" col-form-label"><b>Username :</b></label></div>
				<div ><input type="text" id="Username" size="30" maxlength="30" name="Username" placeholder="-- Username Here --" class=" form-control"/></div>
				<div >
					<label for="Password" class="col-form-label"><b>Password : </b></label>
				</div>
				<div >
					<input type="password" id="Passwords" size="30" maxlength="30" name="Passwords" placeholder="-- Password Here --" class=" form-control"/>
				</div>
				
				<br/>
				<div class="text-center">
				<button style=" width:40%" type="button" class="btn btn-danger " class="close" data-dismiss="modal"><a> Close </a> </button>
				<INPUT style=" width:40%" class="btn btn-success " TYPE="Submit" value="Login" name="submit" id="submit" class="button">
				</div>
				</div>
				</form>
					
                
            </div>
        </div>
    </div>
</div>


          <div id="mycarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img class="d-block img-fluid" src="1j.jpg" alt="pizza">
                    <div class="carousel-caption d-none d-md-block">
					    <h2>Travel Quotes </h2>
                        <p>“TWENTY YEARS FROM NOW YOU WILL BE MORE DISAPPOINTED BY THE THINGS YOU DIDN’T DO THAN BY THE ONES YOU DID DO” </p>  
                        <h4><span class="badge badge-danger"> ~ H. JACKSON BROWN JR.</span>		</h4>
                        
                    </div>
                </div>
              
                <div class="carousel-item ">
                    <img class="d-block img-fluid" src="1f.jpg" alt="buffet">

                    <div class="carousel-caption d-none d-md-block">
                        <h2>Travel Quotes </h2>
                        <p>” THE REAL VOYAGE OF DISCOVERY CONSISTS NOT IN SEEKING NEW LANDSCAPES, BUT IN HAVING NEW EYES.” </p>    
                        <h4><span class="badge badge-danger">~ MARCEL PROUST</span></h4>
				   </div>
                </div>

                <div class="carousel-item">
                    <img class="d-block img-fluid" src="5a.jpg" alt="Alberto">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>Travel Quotes </h2>
                        <p>“I WOULD RATHER OWN A LITTLE AND SEE THE WORLD THAN OWN THE WORLD AND SEE A LITTLE OF IT.” </p>   
                        <h4><span class="badge badge-danger">~ ALEXANDER SATTLER</span></h4>
					</div>

                </div>

            </div>
            <ol class="carousel-indicators">
                <li data-target="#mycarousel" data-slide-to="0" class="active "></li>
                <li data-target="#mycarousel" data-slide-to="1"></li>
                <li data-target="#mycarousel" data-slide-to="2"></li>
            </ol>
            <a href="#mycarousel" class="carousel-control-prev" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span></a>
            <a href="#mycarousel" class="carousel-control-next" role="button" data-slide="next"><span class="carousel-control-next-icon"></span></a>
       
     
        <button class="btn btn-danger btn-sm " id="carouselButton">
            <span class="fa fa-pause"></span>
        </button>


          </div>
          
          <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card" style="width: 18rem; length:12rem;">
                        <img src="8.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">From Lahore to Karachi</h5>
                          <p class="card-text"><h6>Timings:</h6> 8:00am</p>
                          <p class="card-text"><h6>Timings:</h6> 12:00pm</p>
                          <p class="card-text"><h6>Timings:</h6> 4:00pm</p>
                          <a href="search_train.php" class="btn btn-primary">Check Details</a>
                    
                      </div>
                    </div>
                </div>
                    <div class="col-lg-4">
                      <div class=" card" style="width: 18rem; length:12rem;">
                        <img src="9.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">From Lahore to Islamabad</h5>
                          <p class="card-text"><h6>Timings:</h6> 6:00am</p>
                          <p class="card-text"><h6>Timings:</h6> 1:00pm</p>
                          <p class="card-text"><h6>Timings:</h6> 7:30pm</p>
                          <a href="search_train.php" class="btn btn-primary">Check Details</a>
                          
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="card" style="width: 18rem; length:12rem;">
                        <img src="10.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">From Karachi to Multan</h5>
                          <p class="card-text"><h6>Timings:</h6> 9:00am</p>
                          <p class="card-text"><h6>Timings:</h6> 11:00pm</p>
                          <p class="card-text"><h6>Timings:</h6> 2:25pm</p>
                          <a href="search_train.php" class="btn btn-primary">Check Details</a>
                          
                        </div>
                        </div>
                      </div>  
        
            </div>
          
          <br/>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card" style="width: 18rem;">
                        <img src="4.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">From Multan to Murree</h5>
                          <p class="card-text"><h6>Timings:</h6> 5:50am</p>
                          <p class="card-text"><h6>Timings:</h6> 2:30pm</p>
                          <p class="card-text"><h6>Timings:</h6> 9:00pm</p>
                          <a href="search_train.php" class="btn btn-primary">Check Details</a>
                    
                      </div>
                    </div>
                </div>
                    <div class="col-lg-4">
                      <div class=" card" style="width: 18rem;">
                        <img src="6.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">From Karachi to Kashmir</h5>
                          <p class="card-text"><h6>Timings:</h6> 10:00am</p>
                          <p class="card-text"><h6>Timings:</h6> 4:30pm</p>
                          <p class="card-text"><h6>Timings:</h6> 6:30pm</p>
                          <a href="search_train.php" class="btn btn-primary">Check Details</a>
                          
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="card" style="width: 18rem;">
                        <img src="1a.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">From Lahore to Faisalabad</h5>
                          <p class="card-text"><h6>Timings:</h6> 9:00am</p>
                          <p class="card-text"><h6>Timings:</h6> 11:00pm</p>
                          <p class="card-text"><h6>Timings:</h6> 2:25pm</p>
                          <a href="search_train.php" class="btn btn-primary">Check Details</a>
                          
                        </div>
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

	  <script>
		$(document).ready(function(){
			$('#mycarousel').carousel({interval : 2000});
			$('#carouselButton').click(function(){
				if($('#carouselButton').children("span").hasClass('fa-pause')){
					$('#mycarousel').carousel('pause');
					$('#carouselButton').children("span").removeClass('fa-pause');
					$("#carouselButton").children("span").addClass('fa-play');
				}
				else if($('#carouselButton').children("span").hasClass('fa-play')){
					$('#mycarousel').carousel('cycle');
					$('#carouselButton').children("span").removeClass('fa-play');
					$("#carouselButton").children("span").addClass('fa-pause');
				}

								});
		
		});
	</script>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

	<script>
		  $('#log_in').click(function(){
					$('#loginModal').modal();

				});
	</script>
	
	<script>
      $('#log_in_admin').click(function(){
                $('#loginModaladmin').modal();

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