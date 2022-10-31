<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Product Page</title>
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
  <nav class="navbar navbar-expand-xl">
        <div class="container h-100">
          <a class="navbar-brand" href="index.html">
            <h1 class="tm-site-title mb-0">Van Store</h1>
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

              <li class="nav-item">
                <a class="nav-link" href="products.php">
                  <i class="fas fa-shopping-cart"></i> Products
                </a>
              </li>

			  <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle active"
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
                  <a class="dropdown-item active" href="acceptpayment.php">Accept payment</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link d-block" href="http://localhost/vanstore/">
                  Employee<br> <b>Logout</b>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <br><br>
    <div style="margin-left: 50px;margin-right: 50px;">
          <div class="items" style="margin: auto;background-color:#435c70;">
              <table class="table" style="background-color: #3C4043;">
                <thead style="text-align: center;">
                <tr><th>ORDER_ID</th><th>CUSTOMERID</th><th>PHONE</th><th>ITEMS</th><th>ADDRESS</th><th>TOTALPAYMENT</th><th>Pay Type</th></tr>
                </thead>
                <tbody style="text-align: center;">
                  <?php
                  $host = "localhost";
                  $user = "root";
                  $password = "";
                  $db = "id16900325_ooad";
                  $conn=mysqli_connect($host,$user,$password,$db);
                  $res=mysqli_query($conn,"select * from sales where paystat='UPI' or paystat='Card'");
                  while($row=mysqli_fetch_assoc($res))
                  {
                  ?>
              <tr>
                <td ><?php echo $row['orderid'] ?></td>
                <td><?=$row['custid']?> </td>
                <td><?=$row['phone']?> </td>
                <td><?=$row['item']?> </td>
                <td><?=$row['address']?> </td>
                <td><?=$row['total_payment']?> </td>
                <td><?=$row['paystat']?> </td>
              </tr>
              <?php
              }
      ?>
                </tbody>
              </table>
          </div>
        </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
      $(function() {
        $(".tm-product-name").on("click", function() {
          window.location.href = "edit-product.html";
        });
      });
    </script>
  </body>
</html>