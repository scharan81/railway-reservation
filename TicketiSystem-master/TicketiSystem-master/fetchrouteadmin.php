
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
  SELECT * FROM route ORDER BY id
 ";
}
$result = mysqli_query($connect, $query);
if (mysqli_num_rows($result) > 0) {
    $output .= '
  <div class="table-responsive">
   <table class="center" border="9" cellpadding="10" cellspacing="10">
    <tr>
        		<th>   Route ID   </th>	
        		<th>   Train Name   </th>
				<th>   Route  </th>
				<th>   Arrival Time   </th>
				<th>   Departure Time   </th>
				<th>   Business Class Fare  </th>
				<th>   Economical Class Fare   </th>
				<th>   Standard Class Fare   </th>
				<th>   Distance   </th>
				<th>   Delete </th>
        	</tr>
 ';
    while ($row = mysqli_fetch_array($result)) {
        $output .= '   
   <tbody>
   <td>' . $row["id"] . '</td>
    <td>' . $row["TrainName"] . '</td>
    <td>' . $row["FromStation"] . ' to ' . $row["ToStation"] . '</td>
    <td>' . $row["ArrivalTime"] . '</td>
	<td>' . $row["DepartureTime"] . '</td>
    <td>' . $row["BusinessClassFare"] . ' pkr</td>
    <td>' . $row["StandardClassFare"] . ' pkr</td>
    <td>' . $row["EconomicalClassFare"] . ' pkr</td>
	<td>' . $row["TotalDistance"] . ' km/hr</td>
	<td ><input class="btn btn-danger " type="submit" value="Delete" name="submit" /></td>
	 </tbody>
		
		
		
  ';
    }
    echo $output;
} else {
    echo 'Data Not Found';
}
?>
</form>


