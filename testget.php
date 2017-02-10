<?php

//$url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."/api.php/?csrf=".$_GET['csrf'];
//$url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."/api.php/?csrf=".$_SESSION['csrf'];

$url = "https://gas.kp-storeroom.com/testpost.php/";

$data = array('user' => 'admin' , 'pass'=> 'SunAdminminiPump');

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) { /* Handle error */ }

include ("testpost.php"); 
//include("api.php"); 
echo $_SESSION['urltoken']."<br>"; 

// to use "api.php/".$parameter."?csrf=".$_SESSION['csrf'];
$parameter = "";
echo "api.php/".$parameter."?csrf=".$_SESSION['csrf'];


?>

