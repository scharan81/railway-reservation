<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Purchase</title>
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
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  </head>

  <body id="reportsPage">
    <div class="" id="home">
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
                <a class="nav-link" href="accounts.php">
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
                <a class="nav-link active" href="purchase1.php">
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
      <div style="margin-left: 20px;margin-right: 20px;" >
        <form id="bills" style="margin-left: 200px;margin-right: 200px" action="purchase.php" method="POST">
          
       <br><br><label  style="margin-left: 800px; color:antiquewhite">Date:</label> <input type="date" name="date" placeholder="yyyy-mm-dd">
       <div style="margin: auto;">
		<table id="billtable" class="table" style="background-color: #3C4043;">
		</div>
         <style>
            th,td{
              vertical-align: middle;
              text-align: center;
              width: 300px;
              border: 2px solid black;
            }
            th{
              color: antiquewhite;
            }
            tr{
              height: 50px;
            }
            td input[type="text"]{
              height: 40px;
              width: 290px;
            }
         </style>
		   <thead>
         <tr><th>ITEM</th><th>QUANTITY</th><th>PRICE</th></tr>
			   </thead>
       </table> 
        <input type="hidden" name="items" id="items" value="ibycwe">
        <input type="hidden" name="quants" id="quants">
        <input type="hidden" name="prices" id="prices"><br>
        <div style="margin-left: 600px;">
		<label style="color: white;">Total: </label><input type="text" id="total" name="total" value="0" style=" padding: 3px 15px;">
        <input type="button" id="Add" onclick="add()" value="Add new item to bill">
        <input type="submit" name="submit" value="Submit" onclick="clicksubmit()" >
        <br>
        <br>
      </div>
      </form>
      </div>
		<div style="margin-left: 20px;margin-right: 20px;">
      <div style="margin: auto">
      <table class="table" style="background-color: #3C4043;">
         <thead>
         <tr><th>BILL_ID</th><th>BILL_DATE</th><th>ITEMS</th><th>QUANTITES</th><th>PRICES</th><th>TOTAL</th></tr></thead>
         <?php
         $host = "localhost";
         $user = "root";
         $password = "";
         $db = "id16900325_ooad";
         $conn=mysqli_connect($host,$user,$password,$db);
         $res=mysqli_query($conn,"select * from purchase_bills");
         $j=0;
    	while($row=mysqli_fetch_assoc($res))
    	{
			?>
								
								<tr>
									<td style="color:white;" ><?php echo $row['billno'] ?></td>
									<td style="color:white;"><?=date("d-m-Y",strtotime($row['bill_date']))?> </td>
                  <td style="color:white;"><?=$row['items']?> </td>
									<td style="color:white;"><?=$row['price']?> </td>
                  <td style="color:white;"><?=$row['quantity']?> </td>
                  <td style="color:white;"><?=$row['bill_payment']?> </td>
								</tr>
								<?php
								$j+=1;
								}
        ?>
       </table> 
        </div>
		</div>
		
      <script>  
        
            function add(){
                  $("#billtable").append(`<tr><td> <input type="text" name="item"></td>
                           <td><input type="text" name="qua"></td>
                          <td><input type="text" name="price" class="amount" onfocusin="chngtotal(this)" onChange="checktotal(this)"></td></tr>`);    
                  }
            function clicksubmit(){
                var it="";
                var qu="";
                var pr="";
                  var a=Array.from(document.getElementsByName('item'));
                          for(i=0;i<a.length;i++){
                            it=it+a[i].value;
                            it=it+",";
                          }
                          var a=Array.from(document.getElementsByName('qua'));
                          for(i=0;i<a.length;i++){
                            qu=qu+a[i].value;
                            qu=qu+",";
                          }
                          var a=Array.from(document.getElementsByName('price'));
                          for(i=0;i<a.length;i++){
                            pr=pr+a[i].value;
                          pr=pr+",";
                          }
                  document.getElementById("items").value=it;
                  document.getElementById("quants").value=qu;
                  document.getElementById("prices").value=pr;
            
            }
		  var total=0,temp;
      function chngtotal(s){
        console.log(s.value);
        temp=s.value;
        console.log(temp);
      }
		  function checktotal(s){
        if(temp==""){
          if(s.value!=""){
          console.log(s.value);
          total+=parseInt(s.value);
          //console.log(data,total)
          $("#total").val(total);
          }
          else{
            total-=parseInt(temp);
            $("#total").val(total);
          }
			   }
         else{
          if(s.value!=""){
          console.log(s.value);
          total+=parseInt(s.value);
          total-=parseInt(temp);
          $("#total").val(total);
          }
          else{
            total-=parseInt(temp);
            $("#total").val(total);
          }
         }
        }
      </script> 

      <!--<div class="container mt-5">
        <div class="row tm-content-row">
          <div class="col-12 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto"></div> -->
             
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
  </body>
</html>