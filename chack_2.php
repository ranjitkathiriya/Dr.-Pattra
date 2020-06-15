<?php

$myfile = fopen("./all/exp.txt", "r") or die("Unable to open file!");
$my_data=fread($myfile,filesize("./all/exp.txt"));
fclose($myfile);
//echo $my_data;
$i=1;
if($i==1)
{
		$response["success"] = 1;
      	$response["message"] = "Perfect!";
	  	$response["data"]=$my_data;
		echo json_encode($response);
		$i=0;
}

if($i==0)
{
unlink('./all/exp.txt');
unlink('./all/image2.jpg');
unlink('./all/ima.jpg');
unlink('./all/1c_1.jpg');
}

?>