<?php
 //include("abc.php");

	$img_src = '.\all\10b.jpg';
	$imgbinary = fread(fopen($img_src, "r"), filesize($img_src));
	//$img_str = base64_encode($imgbinary);
	
	set_time_limit(0);
	$timeout = 30; // sec
	//$output = '.\all\10b.jpg';

	$matlabExe = '"E:\MathLab\bin\matlab.exe"';
	$mFile = "'C:\wamp\www\AAA\CHACK\all\main.m'";
	$combine = '"run(' . $mFile . ');"';
	$command = $matlabExe . ' -nodisplay -nosplash -nodesktop -r ' . $combine;

try {
    if (! @unlink($imgbinary) && is_file($imgbinary))
        throw new Exception("Unable to remove old file");

    exec($command);

    $start = time();
    //while ( true ) {
        // Check if file is readable
        if (is_file($imgbinary) && is_readable($imgbinary)) {
            $img = @imagecreatefrompng($imgbinary);
            // Check if Math Lab is has finished writing to image
            if ($img !== false) {
                header('Content-type:image/png');
                imagepng($img);
				
				
                break;
           // }
        }
		
		

        // Check Timeout
        if ((time() - $start) > $timeout) {
            throw new Exception("Timeout Reached");
            break;
        }
		
		
    }
	
	
	 
} catch ( Exception $e ) {
    echo $e->getMessage();
}
	
?>
   