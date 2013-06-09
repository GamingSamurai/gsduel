<?php

include_once(dirname(dirname(dirname(__FILE__))) . '/lib/php/functions.php');
$u = $_POST['ruser'];
$p1 = $_POST['rpass'];
$p2 = $_POST['rpass2'];
$e = $_POST['remail'];

$successres = register($u, $p1, $p2, $e);
if($successres['success'] === true;) {
	$_SESSION['username'] = $u;
}
send_user_to('/',$successres,true);

