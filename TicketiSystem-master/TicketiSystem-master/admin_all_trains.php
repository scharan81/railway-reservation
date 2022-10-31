<?php session_start(); ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
		<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous' />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.css" />
		<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
		<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.js"></script> 
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
		<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
		<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>

        <link rel="stylesheet" href="styles.css">
	  
	  
	  
        
		
	</head>



<?php
include('connection.php');
if(isset($_SESSION["type"]))
{
	
?>



    
        <nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top" style="font-family:Comic Sans MS">
            <a class="navbar-brand" href="#">Railway Management System</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                  <a class="nav-link" href="admin_add_train.php">Add Train </a>
                </li>
				
                <li class="nav-item ">
                  <a class="nav-link" href="admin_add_route.php">Add Route</a>
                </li>
				
                <li class="nav-item active">
                  <a class="nav-link " href="admin_all_trains.php" >View Trains <span class="sr-only">(current)</span></a>
                </li>
				
				<li class="nav-item ">
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
		  
		  
          <div id="mycarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img class="d-block img-fluid" src="1b.jpg"alt="pizza">
                </div> 
            </div>
          </div>
		 
		  
		







	 
		<br />
			<div class="table-responsive">  
			<br/>
			 <h1 class="mainheading">All Train Record</h1><br />
			<div id="grid_table">
			</div>
		</div>  
	</div>	


<script>

	$('#grid_table').jsGrid
	({
		width: "100%",
		height: "480px",
		filtering: true,
		editing: true,
		sorting: true,
		paging: true,
		autoload: true,
		pageSize: 8,
		pageButtonCount: 5,
		deleteConfirm: "Do you really want to delete data?",
		pagerFormat: "Pages:  {pages}",

		controller:
		{
			/* On window load and for filter */
			loadData: function(filter)
			{
				return $.ajax({
				type: "GET",
				url: "fetchtrainadmin.php",
				data: filter
				});
			},
			/* For insert  Details*/
			insertItem: function(item)
			{
				return $.ajax({
				type: "POST",
				url: "fetchtrainadmin.php",
				data:item
				});
			},
			/* For Update Details */
			updateItem: function(item)
			{
				return $.ajax({
				type: "PUT",
				url: "fetchtrainadmin.php",
				data: item
				});
			},
			/* For delete Details */
			deleteItem: function(item)
			{
				return $.ajax({
				type: "DELETE",
				url: "fetchtrainadmin.php",
				data: item
				});
			},
		},

		fields: 
		[
			/* hospital Id text field  */
			{
				name: "id",
				type: "hidden",
				width:40,
				css: 'hide'
			},
			
			{
				name: "TrainNo",
				width:100,
				type: "text",
				
				
				insertcss : "TrainNo_css",
				css: "search_TrainNo",
				validate: 
				{
					validator: "required",
					message: "Kindly enter train no"
				}    
			},
			/* hospital Name text field  */
			{
				name: "TrainName",
				width:100,
				type: "text", 
				
				insertcss : "TrainName_css",
				css: "search_TrainName",
				validate: 
				{
					validator: "required",
					message: "Kindly enter train name"
				}    
			},
			/* hospital Address text field  */
			{
				name: "FromStation", 
				width:100,
				type: "text",
				
				
				insertcss : "FromStation_css",
				css: "search_FromStation",
				validate: 
				{
					validator: "required",
					message: "Kindly enter FromStation"
				} 
			},
			
			{
				name: "ToStation", 
				width:100,
				type: "text", 
				
				insertcss : "ToStation_css",
				css: "search_ToSation",
				validate: 
				{
					validator: "required",
					message: "Kindly enter ToStation"
				} 
			},
			
			/* hospital Contact No. text field  */
			{
				name: "TotalDistance", 
				width:100,
				type: "text",
				
				insertcss : "TotalDistance_css",
				css: "search_TotalDistance", 
				validate: 
				{
					validator: "required",
					message: "Kindly enter TotalDistance"
				} 
			},
			{
				name: "BusinessSeats", 
				width:110,
				type: "text",
				
				insertcss : "BusinessSeats_css",
				css: "search_BusinessSeats",
				validate: 
				{
					validator: "required",
					message: "Kindly enter Business Seats"
				} 
			},
			{
				name: "EconomicalSeats", 
				width:110,
				type: "text", 
				
				insertcss : "EconomicalSeats_css",
				css: "search_EconomicalSeats",
				validate: 
				{
					validator: "required",
					message: "Kindly enter EconomicalSeats"
				} 
			},
			{
				name: "StandardSeats", 
				width:100,
				type: "text", 
				
				insertcss : "StandardSeats_css",
				css: "search_StandardSeats",
				validate: 
				{
					validator: "required",
					message: "Kindly enter StandardSeats"
				} 
			},
			{
				type: "control"
			}
		]
	});

	/* add Placeholder Values */
	$(".TrainNo_css input[type=text]").attr("placeholder", "Enter TrainNo");
	$(".TrainName_css input[type=text]").attr("placeholder", "Enter TrainName");
	$(".FromStation_css input[type=text]").attr("placeholder", "Enter FromStation");
	$(".ToStation_css input[type=text]").attr("placeholder", "Enter ToStation");
	$(".TotalDistance_css input[type=text]").attr("placeholder", "Enter TotalDistance");
	$(".BusinessSeats_css input[type=text]").attr("placeholder", "Enter BusinessSeats");
	$(".EconomicalSeats_css input[type=text]").attr("placeholder", "Enter EconomicalSeats");
	$(".StandardSeats_css input[type=text]").attr("placeholder", "Enter StandardSeats");
	
	$(".search_TrainNo input[type=text]").attr("placeholder", "Search By TrainNo");
	$(".search_TrainName input[type=text]").attr("placeholder", "Search By TrainName");
	$(".search_FromStation input[type=text]").attr("placeholder", "Search By FromStation");
	$(".search_ToSation input[type=text]").attr("placeholder", "Search By ToStation");
	$(".search_TotalDistance input[type=text]").attr("placeholder", "Search By TotalDistance");
	$(".search_BusinessSeats input[type=text]").attr("placeholder", "Search By BusinessSeats");
	$(".search_EconomicalSeats input[type=text]").attr("placeholder", "Search By EconomicalSeats");
	$(".search_StandardSeats input[type=text]").attr("placeholder", "Search By StandardSeats");
</script>
</body>
</html>
<?php
}
else
{
	echo "<script>window.location.href='index.php';</script>";
}
?>