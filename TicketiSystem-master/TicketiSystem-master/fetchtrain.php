<?php

//fetch.php
$connect = mysqli_connect("localhost", "root", "", "myrailway");
$output = '';
if (isset($_POST["query"])) {
    $search = mysqli_real_escape_string($connect, $_POST["query"]);
    $query = "
  SELECT * FROM route 
  WHERE TrainName LIKE '%" . $search . "%' OR
        FromStation LIKE '%" . $search . "%' OR
        ToStation LIKE '%" . $search . "%'
 ";
} else {
    $query = "
  SELECT * FROM route ORDER BY TrainName
 ";
}
$result = mysqli_query($connect, $query);
if (mysqli_num_rows($result) > 0) {
    $output .= '
  <div class="table-responsive">
   <table class="center" border="9" cellpadding="10" cellspacing="10">
    <thead>
     <th>Train Name</th>
     <th>From Station</th>
     <th>To Station</th>
     <th>Arrival Time</th>
     <th>Departure Time</th>
     <th>Business Class Fare</th>
     <th>Standard Class Fare</th>
     <th>Economical Class Fare</th>	
     <th>Book Ticket</th>	 
    </thead>
 ';
    while ($row = mysqli_fetch_array($result)) {
        $output .= '
   <tbody>
    <td>' . $row["TrainName"] . '</td>
    <td>' . $row["FromStation"] . '</td>
    <td>' . $row["ToStation"] . '</td>
    <td>' . $row["ArrivalTime"] . '</td>
	<td>' . $row["DepartureTime"] . '</td>
    <td>' . $row["BusinessClassFare"] . '</td>
    <td>' . $row["StandardClassFare"] . '</td>
    <td>' . $row["EconomicalClassFare"] . '</td>
	<td><input class="btn btn-primary"  onclick="showAlert()" value="Book Now"  type="button"/></td> 
   </tbody>
  ';
    }
    echo $output;
} else {
    echo 'Data Not Found';
}
?>

<script>
  function showAlert() {
    var myText = "You need to login to the system to book ticket!!!";
    alert (myText);
  }
  </script>