<?php
  // Function to check if request origin server is same as targeted Server  	
function isOriginAllowed($incomingOrigin, $allowOrigin)
{
    
    $pattern1 = '/^https:\/\/([\w_-]+\.)*' . $allowOrigin . '$/';
    //echo $pattern1;
    $allow1 = preg_match($pattern1, $incomingOrigin);
	
	 $pattern2 = '/^http:\/\/([\w_-]+\.)*' . $allowOrigin . '$/';
    //echo $pattern2;
    $allow2 = preg_match($pattern2, $incomingOrigin);
    //if ($pattern === $incomingOrigin)
    if($allow1 || $allow2) {
        return true;
    } else {
        return false;
    }
}



?>