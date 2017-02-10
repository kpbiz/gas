<form method="post" action="api.php/">
<input name="token" value=
<?php
require 'auth.php';

$auth = new PHP_API_AUTH(array(
	'secret'=>'someVeryLongPassPhraseChangeMe',
	'authenticator'=>function($user,$pass){ if ($user=='admin' && $pass=='SunAdminminiPump') $_SESSION['user']=$user; }
));
$auth->executeCommand();
?>/>
<input type="submit" value="ok">
</form>
