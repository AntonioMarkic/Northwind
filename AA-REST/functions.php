<?php

function get_shippers($id=0)
{
	global $connection;
	$query="SELECT * FROM shippers";
	if($id != 0)
	{
		$query.=" WHERE ShipperID=".$id." LIMIT 100";
	}
	$response=array();
	$result=mysqli_query($connection, $query);
	while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
	{
		$response[]=$row;
	}
	header('Content-Type: application/json');
	echo json_encode($response);
}

function insert_shipper()
	{
		global $connection;

		$data = json_decode(file_get_contents('php://input'), true);
		$CompanyName	=$data["CompanyName"];
		$Phone      =$data["Phone"];
		
		
		echo $query="INSERT INTO shippers VALUES (NULL,'".$CompanyName."','".$Phone."')";
		if(mysqli_query($connection, $query))
		{
			$broj_redaka = mysqli_affected_rows($connection);
			$response=array(
				'status' => 1,
				'query' => $query,
				'broj_redaka' => $broj_redaka,
				'status_message' =>'Shipper Added Successfully.'
			);
		}
		else
		{
			$broj_redaka = mysqli_affected_rows($connection);
			$response=array(
				'status' => 0,
				'query' => $query,
				'broj_redaka' => $broj_redaka,
				'status_message' =>'Shipper Addition Failed.'
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
function update_shipper($id)
	{
		global $connection;
		$post_vars = json_decode(file_get_contents("php://input"),true);
		$CompanyName  =$post_vars["CompanyName"];
		$Phone		=$post_vars["Phone"];
		
		
		$query="UPDATE shippers SET CompanyName='".$CompanyName."', Phone='".$Phone."' WHERE ShipperID=".$id;
		
		$result=mysqli_query($connection, $query);
		$broj_redaka = mysqli_affected_rows($connection);;
		
		if($result)
		{
			$response=array(
				'status' => 1,
				'query' => $query,
				'broj_redaka' => $broj_redaka,
				'status_message' =>'Shipper Updated Successfully.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'query' => $query,
				'broj_redaka' => $broj_redaka,
				'status_message' =>'Shipper Updation Failed.'
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}

function delete_shipper($id)
{
	global $connection;
	$query="DELETE FROM shippers WHERE ShipperID=".$id;
	if($result = mysqli_query($connection, $query))
	{
		//$broj_redaka = mysqli_num_rows($result);
		$response=array(
			'status' => 1,
			//'brojredaka' => $broj_redaka,
			'status_message' =>'Shipper Deleted Successfully.'
		);
	}
	else
	{
		$response=array(
			'status' => 0,
			'status_message' =>'Shipper Deletion Failed.'
		);
	}
	header('Content-Type: application/json');
	echo json_encode($response);
}


?>
