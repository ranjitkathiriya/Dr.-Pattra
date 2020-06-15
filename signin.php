<?php
include("abc.php");
//$con=mysqli_connect("localhost","root","","bloodbank_master");
$response = array();

    $username = $_GET['username'];
    $password =$_GET['password'];
    //$query = "SELECT name FROM bloodbank_master WHERE email='info@smc.com' and password='123456'";

    $result=mysqli_query($con,"SELECT * FROM  `quality_master2` WHERE  `Name` =  '$username' AND  `Password` =  '$password'");
    $row = mysqli_fetch_array($result);

   // $data = $row[0];
    if($row)
    {
      $response["success"] = 1;
      $response["message"] = "success";
	  $response["u_id"]=$row[0];
	  $response["name"]=$row[1];
	  $response["Contact"]=$row[2];
	  $response["email"]=$row[3];

    }
    else
    {
     $response["success"] = 0;
     $response["message"] = "Blood Bank Login Failed.";
	 $response["user"]="";
    }
	echo json_encode($response);
?>
