<?php
/*********************
**** CPanel ******************
*********/

/* Following register will admin login credentials */

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db


$data = json_decode(file_get_contents("php://input"));

$get_email = ($data->email);
$get_field_1 = ($data->field_1);
$get_field_2 = ($data->field_2);
$get_field_3 = ($data->id);
date_default_timezone_set('Asia/Kolkata');

$get_field_4 = date('H:i:s');

$get_created_date =date('Y-m-d');

if( empty($get_field_1) || empty($get_field_2))
{
	$response["success"] = 2;
	echo json_encode($response);
}
else
{
	$result = mysqli_query($conn,"INSERT INTO work( email, field_1, field_2,field_3,field_4,created_date)
					VALUES(	'$get_email','$get_field_1', '$get_field_2', '$get_field_3', '$get_field_4','$get_created_date')");

	// check for empty result
	if($result)
	{
		// success
		$response["success"] = 1;		
		// echoing JSON response
		echo json_encode($response);
		
		
	}
	else 
	{
		// unsuccess
		$response["success"] = 0;		
		// echoing JSON response
		echo json_encode($response);
	}
}
?>