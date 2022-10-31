<?php
include("connection.php");

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'GET')
{
	$data = array
	(
		':TrainNo'   => "%" . $_GET['TrainNo'] . "%",
		':TrainName'   => "%" . $_GET['TrainName'] . "%",
		':FromStation'     => "%" . $_GET['FromStation'] . "%",
		':ToStation'    => "%" . $_GET['ToStation'] . "%",
		':TotalDistance'   => "%" . $_GET['TotalDistance'] . "%",
		':BusinessSeats'   => "%" . $_GET['BusinessSeats'] . "%",
		':EconomicalSeats'     => "%" . $_GET['EconomicalSeats'] . "%",
		':StandardSeats'    => "%" . $_GET['StandardSeats'] . "%"
	);
	$query = "SELECT * FROM trains WHERE TrainNo LIKE :TrainNo AND TrainName LIKE :TrainName AND FromStation LIKE :FromStation AND ToStation LIKE :ToStation AND TotalDistance LIKE :TotalDistance AND BusinessSeats LIKE :BusinessSeats AND EconomicalSeats LIKE :EconomicalSeats AND StandardSeats LIKE :StandardSeats ORDER BY id ASC";
	$statement = $connect->prepare($query);
	$statement->execute($data);
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output[] = array(
		'id'    => $row['id'],   
		'TrainNo'  => $row['TrainNo'],
		'TrainName'   => $row['TrainName'],
		'FromStation'    => $row['FromStation'],
		'ToStation'   => $row['ToStation'],
		'TotalDistance'    => $row['TotalDistance'],   
		'BusinessSeats'  => $row['BusinessSeats'],
		'EconomicalSeats'   => $row['EconomicalSeats'],
		'StandardSeats'    => $row['StandardSeats']
		
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
	':TrainNo' => $_PUT['TrainNo'],
	':TrainName' => $_PUT['TrainName'],
	':FromStation'   => $_PUT['FromStation'],
	':ToStation'  => $_PUT['ToStation'],
	':TotalDistance'   => $_PUT['TotalDistance'],
	':BusinessSeats' => $_PUT['BusinessSeats'],
	':EconomicalSeats' => $_PUT['EconomicalSeats'],
	':StandardSeats'   => $_PUT['StandardSeats']
	);
	$query = "UPDATE trains  SET TrainNo = :TrainNo,  TrainName = :TrainName,  FromStation = :FromStation,  ToStation = :ToStation, TotalDistance = :TotalDistance,  BusinessSeats = :BusinessSeats,  EconomicalSeats = :EconomicalSeats,  StandardSeats = :StandardSeats WHERE id = :id";
	$statement = $connect->prepare($query);
	$statement->execute($data);
}

if($method == "DELETE")
{
	/*  gets the contents of the php://input stream, and parses it into an array (stored as $_DELETE) */
	parse_str(file_get_contents("php://input"), $_DELETE);
	$query = "DELETE FROM trains WHERE id = '".$_DELETE["id"]."'";
	$statement = $connect->prepare($query);
	$statement->execute();
}

?>