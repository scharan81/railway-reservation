<!DOCTYPE html>
<?php

 $connect = mysqli_connect("localhost", "root", "", "myrailway");  
 
 $query = "select * from route where route.FromStation='Lahore Junction' && route.ToStation='Islamabad'";  
 $result = mysqli_query($connect, $query) or die( mysqli_error($connect));
 
   
 ?>
<html>
<head>
    <title></title>
</head>
<body>
<div  id="train_table" >  
                          <table  class="table table-bordered">  
                               <thead>
                                    <th>id</th>     
                                    <th>Train Name</th> 
									<th>FromStation</th> 
									<th>ToStation</th> 
									<th>ArrivalTime</th> 
									<th>DepartureTime</th> 
                                    <th>Business Fare</th>
                                    <th>Standard Fare</th>
									<th>Economical Fare</th>
                                    <th>View</th>
                               </thead>  
                               <?php  
                               while($row = mysqli_fetch_array($result))  
                               {  
                               ?>  
                               <tbody>  
                                    <td><?php echo $row["id"]; ?></td>
                                    <td><?php echo $row["TrainName"]; ?></td> 
									<td><?php echo $row["FromStation"]; ?> </td>
									<td><?php echo $row["ToStation"]; ?> </td>
                                    <td><?php echo $row["ArrivalTime"]; ?> </td>
									<td><?php echo $row["DepartureTime"]; ?> </td>
									<td><?php echo $row["BusinessClassFare"]; ?></td> 
									<td><?php echo $row["StandardClassFare"]; ?></td> 
									<td><?php echo $row["EconomicalClassFare"]; ?></td> 
									<td><input type="button" name="view" value="View" id="<?php echo $row["id"]; ?>" class="btn btn-info view_data" /></td>
                               </tbody>  
                               <?php  
                               }  
                               ?>  
                          </table>  
						  <div class="container" id="train_detail">  
						  </div>
                </div>
</body>
</html>

<script type="text/javascript">
function FbotonOn() { 

    if(document.getElementById('checkBox').checked)
        document.getElementById('texto').innerHTML = "Thank you";
    else
        document.getElementById('texto').innerHTML = "Good Bye";
}