<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Accounts</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
  </head>

  <body id="reportsPage">
    <div class="" id="home" style="margin-bottom:50px">
     <nav class="navbar navbar-expand-xl">
        <div class="container h-100">
          <a class="navbar-brand" href="index.html">
            <h1 class="tm-site-title mb-0">Product Admin</h1>
          </a>
          <button
            class="navbar-toggler ml-auto mr-0"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <i class="fas fa-bars tm-nav-icon"></i>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto h-100">
              <li class="nav-item">
                <a class="nav-link" href="index.php">
                  <i class="fas fa-tachometer-alt"></i> Dashboard
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="far fa-file-alt"></i>
                  <span> Reports <i class="fas fa-angle-down"></i> </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="extra pages/daybook.html">Day book</a>
                  <a class="dropdown-item" href="extra pages/pandl.html">profit/loss</a>
                  <a class="dropdown-item" href="extra pages/stocksummary.html">Stock register</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="products.php">
                  <i class="fas fa-shopping-cart"></i> Products
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link active" href="accounts.php">
                  <i class="far fa-user"></i> Accounts
                </a>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="fas fa-cog"></i>
                  <span> Settings <i class="fas fa-angle-down"></i> </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="extra pages/Profile.html">Profile</a>
                  <a class="dropdown-item" href="extra pages/billing.html">Billing</a>
                  <a class="dropdown-item" href="extra pages/customize.html">Customize</a>
                </div>
              </li>
			  <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="far fa-file-alt"></i>
                  <span> Payment <i class="fas fa-angle-down"></i> </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="pendingpayment.php">Pending payment</a>
                  <a class="dropdown-item " href="acceptpayment.php">Accept payment</a>
                </div>
              </li>
			  <li class="nav-item">
                <a class="nav-link" href="purchase1.php">
                  <i class="fas fa-shopping-cart"></i> Purchase
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link d-block" href="http://localhost/vanstore/">
                  Admin, <b>Logout</b>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

		<form action="accounts1.php" method="POST" id="form">
      <div class="container mt-5">
        <div class="row tm-content-row">
          <div class="col-12 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
              <h2 class="tm-block-title">List of Accounts</h2>
              <p class="text-white">Accounts</p>
              <select class="custom-select" href="this.value" name="acc">
                <option value="0">Select account</option>
                <option value="1">Admin</option>
                <option value="2">Employee</option>
                <option value="3">Merchant</option>
                <option value="4">Customer</option>
                <option value="5">Sales register</option>
                <option value="6">Purchase register</option>
              </select>
            </div>
          </div>
        </div>
        <!-- row -->
        <div class="row tm-content-row">
          <div class="tm-block-col tm-col-avatar">
            <div class="tm-bg-primary-dark tm-block tm-block-avatar">
              <h2 class="tm-block-title">Change Avatar</h2>
              <div class="tm-avatar-container">
                <img
                  src="img/avatar.png"
                  alt="Avatar"
                  class="tm-avatar img-fluid mb-4"
                />
                <a href="#" class="tm-avatar-delete-link">
                  <i class="far fa-trash-alt tm-product-delete-icon"></i>
                </a>
              </div>
              <button class="btn btn-primary btn-block text-uppercase">
                Upload New Photo
              </button>
            </div>
          </div>
          <div class="tm-block-col tm-col-account-settings">
            <div class="tm-bg-primary-dark tm-block tm-block-settings">
              <h2 class="tm-block-title">Account Settings</h2>
              <form action="" class="tm-signup-form row">
                <div class="form-group col-lg-6">
                  <label for="name">Name</label>
                  <input
                    id="name"
                    name="name"
                    type="text"
                    class="form-control validate"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label for="email">Email</label>
                  <input
                    id="email"
                    name="email"
                    type="email"
                    class="form-control validate"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label for="password">Password</label>
                  <input
                    id="password"
                    name="password"
                    type="password"
                    class="form-control validate"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label for="password2">Re-enter Password</label>
                  <input
                    id="password2"
                    name="password2"
                    type="password"
                    class="form-control validate"
                  />
                </div>
				<div class="form-group col-lg-6">
					<label for="gender">Gender</label>
					<pre style="color: white;font-family: Roboto, Helvetica, Arial, sans-serif"><input id="male" name="gender" type="radio"  value="m"/>Male                    <input id="female" name="gender" type="radio"  value="f" />Female                    <input id="others" name="gender" type="radio"  value="o" />Others</pre>
                </div>
                <div class="form-group col-lg-6">
                  <label for="phone">Phone</label>
                  <input
                    id="phone"
                    name="phone"
                    type="tel"
                    class="form-control validate"
                  />
                </div>
				<div class="form-group col-lg-6">
                  <label for="address">Address</label><br>
				  <textarea name="address" id="address" cols="25" rows="10" style="width:inherit;background-color:#54657d;color:white;"></textarea>
                </div>
				<div class="form-group col-lg-6">
                  <label for="">Aadhar</label>
                  <input
                    id="aadhar"
                    name="aadhar"
                    type="text"
                    class="form-control validate"
                  />
                </div>
				<div class="form-group col-lg-6">
                  <label for="">Date of join</label>
                  <input
                    id="date"
                    name="date"
                    type="date"
                    class="form-control validate"
                  />
                </div>
				<div class="form-group col-lg-6">
                  <label for="">Salary</label>
                  <input
                    id="salary"
                    name="salary"
                    type="text"
                    class="form-control validate"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label class="tm-hide-sm">&nbsp;</label>
                  <button type="submit" name="submit" class="btn btn-primary btn-block text-uppercase" onclick="passwordvalidate()">Update Your Profile</button>
                  <script>
                    var password = document.getElementById("password"),confirm_password = document.getElementById("password2");
					function validatePassword(){
						if(password.value != confirm_password.value) {
						confirm_password.setCustomValidity("Passwords Don't Match");
					  	} else {
						confirm_password.setCustomValidity('');
					  	}
					}
					password.onchange = validatePassword;
					confirm_password.onkeyup = validatePassword;
                  </script>
                </div>
                <div class="col-12">
                  <button
                    type="button"
                    class="btn btn-primary btn-block text-uppercase">
                    Delete Your Account
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
	</form>
	<div style=";margin-left:50px;margin-right:50px;">
	<div style="margin:auto;">
      <table class="table">
		 <thead>
         	<tr style="color: white"><th>NAME</th><th>EMAIL</th><th>GENDER</th><th>PHONE</th><th>ADDRESS</th><th>AADHAR</th><th>DATE_OF_JOIN</th><th>SALARY</th></tr>
		 </thead>
         <?php
         $host = "localhost";
         $user = "root";
         $password = "";
         $db = "id16900325_ooad";
         $conn=mysqli_connect($host,$user,$password,$db);
         $res=mysqli_query($conn,"select * from employee where email<>'vanstore@admin.com'");
    	while($row=mysqli_fetch_assoc($res))
    	{
		?>						
		<tr>
			<td style="color:white;" ><?php echo $row['name'] ?></td>
			<td style="color:white;"><?=$row['email']?> </td>
			<td style="color:white;"><?=$row['gender']?> </td>
			<td style="color:white;"><?=$row['phone']?> </td>
			<td style="color:white;"><?=$row['address']?> </td>
			<td style="color:white;"><?=$row['aadhar']?> </td>
			<td style="color:white;"><?=date("d-m-Y",strtotime($row['date_of_join']))?> </td>
			<td style="color:white;"><?=$row['salary']?> </td>
		</tr>
		<?php
		}
        ?>
       </table> 
        </div>
	  </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
  </body>
</html>