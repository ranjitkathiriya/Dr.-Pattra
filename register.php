<?php

	include("abc.php");
	//$con=mysqli_connect("localhost","root","","bloodbank_master");

     $b_bname = $_GET['b_name'];
     $contact =$_GET['contact_no'];
	$email =$_GET['email'];
	$password = $_GET['password'];

 
    


    $query = "INSERT INTO `quality_master`.`quality_master2` (`u_id`, `Name`, `Contact`, `Email`, `Password`) VALUES (NULL, '$b_bname', '$contact', '$email', '$password');";
	
	
	$result=$con->query($query);
    // check if row inserted or not
    if ($result) 
	{
	$query1 = "SELECT  `u_id` FROM  `quality_master2` where contact='$contact' ";
	$result=$con->query($query1);
	$row = mysqli_fetch_array($result);
	
		 $response["u_id"]=$row[0];
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "Blood Bank successfully inserted.";
	
    } 
	
	else
	{
        // failed to insert row
        $response["error"] = 0;
        $response["message"] = "Oops! An error occurred.";
    }
	   echo json_encode($response);
?>