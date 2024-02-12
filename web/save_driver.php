<?php
/*********************

**** CPanel ******************
*********/

/* Following code will match user login credentials */

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db


$data = json_decode(file_get_contents("php://input"));

$get_email = ($data->email);
$get_admin_id = ($data->password);
$get_fname = ($data->name);
$get_mobile = ($data->mobile);

$get_cus_id = ($data->cus_id);
$get_field_1 = ($data->field_1);
$get_field_2 = ($data->field_2);
$get_field_3 = ($data->field_3);

if(empty($get_admin_id) || empty($get_fname) || empty($get_mobile))
{
	$response["success"] = 2;
	echo json_encode($response);
}
else
{
	// get customer 
	$result = mysqli_query($conn,"UPDATE login SET email='$get_email',name='$get_fname', mobile='$get_mobile' , password='$get_admin_id',field_1='$get_field_1',
	field_2='$get_field_2',field_3='$get_field_3' 	WHERE user_id = '$get_cus_id'");

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