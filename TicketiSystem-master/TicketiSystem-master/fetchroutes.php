<?php
include("connection.php");

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'GET')
{
	$data = array
	(
		':TrainName'   => "%" . $_GET['TrainName'] . "%",
		':FromStation'     => "%" . $_GET['FromStation'] . "%",
		':ToStation'    => "%" . $_GET['ToStation'] . "%",
		':BusinessClassFare'   => "%" . $_GET['BusinessClassFare'] . "%",
		':EconomicalClassFare'     => "%" . $_GET['EconomicalClassFare'] . "%",
		':StandardClassFare'    => "%" . $_GET['StandardClassFare'] . "%",
		':ArrivalTime'   => "%" . $_GET['ArrivalTime'] . "%",
		':DepartureTime'   => "%" . $_GET['DepartureTime'] . "%",
		':TotalDistance'   => "%" . $_GET['TotalDistance'] . "%"
	);
	$query = "SELECT * FROM route WHERE  TrainName LIKE :TrainName AND FromStation LIKE :FromStation AND ToStation LIKE :ToStation  AND BusinessClassFare LIKE :BusinessClassFare AND EconomicalClassFare LIKE :EconomicalClassFare AND StandardClassFare LIKE :StandardClassFare AND ArrivalTime LIKE :ArrivalTime AND DepartureTime LIKE :DepartureTime AND TotalDistance LIKE :TotalDistance ORDER BY id ASC";
	$statement = $connect->prepare($query);
	$statement->execute($data);
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output[] = array(
		'id'    => $row['id'],   
		'TrainName'   => $row['TrainName'],
		'FromStation'    => $row['FromStation'],
		'ToStation'   => $row['ToStation'], 
		'BusinessClassFare'  => $row['BusinessClassFare'],
		'EconomicalClassFare'   => $row['EconomicalClassFare'],
		'StandardClassFare'    => $row['StandardClassFare'],
		'ArrivalTime'    => $row['ArrivalTime'],
		'DepartureTime'    => $row['DepartureTime'],
		'TotalDistance'    => $row['TotalDistance']
		
		);
	}
	header("Content-Type: application/json");
	echo json_encode($output);
}


if($method == 'PUT')
{
	/*  gets the contents of the php://input stream, and parses it into an array (stored as $_PUT) */
	parse_str(file_get_contents("php://input"), $_PUT);
	$data = array(
	':id'   => $_PUT['id'],
	':TrainName' => $_PUT['TrainName'],
	':FromStation'   => $_PUT['FromStation'],
	':ToStation'  => $_PUT['ToStation'],
	':BusinessClassFare' => $_PUT['BusinessClassFare'],
	':EconomicalClassFare' => $_PUT['EconomicalClassFare'],
	':StandardClassFare'   => $_PUT['StandardClassFare'],
	':ArrivalTime'   => $_PUT['ArrivalTime'],
	':DepartureTime'   => $_PUT['DepartureTime'],
	':TotalDistance'   => $_PUT['TotalDistance']
	);
	$query = "UPDATE route  SET TrainName = :TrainName,  FromStation = :FromStation,  ToStation = :ToStation,  BusinessClassFare = :BusinessClassFare,  EconomicalClassFare = :EconomicalClassFare,  StandardClassFare = :StandardClassFare,ArrivalTime=:ArrivalTime,DepartureTime=:DepartureTime , TotalDistance = :TotalDistance WHERE id = :id";
	$statement = $connect->prepare($query);
	$statement->execute($data);
}

if($method == "DELETE")
{
	/*  gets the contents of the php://input stream, and parses it into an array (stored as $_DELETE) */
	parse_str(file_get_contents("php://input"), $_DELETE);
	$query = "DELETE FROM route WHERE id = '".$_DELETE["id"]."'";
	$statement = $connect->prepare($query);
	$statement->execute();
}

?>