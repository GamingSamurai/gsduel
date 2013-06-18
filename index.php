<?php
require_once(dirname(__FILE__) . '/boot.php');

if(isset($_SESSION['username'])) {
    include_once(dirname(__FILE__) . '/includes/php/prepare.php');
} else {
    if(isset($_POST['register'])) {
    	$_SESSION['register'] = $_POST['register'];
    	include_once(dirname(__FILE__) . '/includes/php/register.php');
    } else {
        include_once(dirname(__FILE__) . '/includes/php/login.php');
    }
}
