<?php

require 'auth.php';

$auth = new PHP_API_AUTH(array(
	//'secret'=>'someVeryLongPassPhraseChangeMe',
	'authenticator'=>function($user,$pass){ if ($user=='admin' && $pass=='SunAdminminiPump') $_SESSION['user']=$user; }
));
$auth->executeCommand();

//echo "<br><br> ". ($auth->gettoken()) . "  ".$_SESSION['csrf']." ";

$url = "https://gas.kp-storeroom.com/api.php/";

$data = array('token' => $auth->gettoken() );

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

//var_dump($result);

$url = "https://gas.kp-storeroom.com/api.php/?csrf=".$_SESSION['csrf'];

$_SESSION['urltoken'] = "https://gas.kp-storeroom.com/api.php/?csrf=".$_SESSION['csrf'];

?>

<!--a href=" <?php echo $url;?> ">api</a-->

