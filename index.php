<?php
require_once(dirname(__FILE__) . '/boot.php');

if(isset($_SESSION['username'])) {
    include_once(dirname(__FILE__) . '/includes/php/prepare.php');
} else {
    include_once(dirname(__FILE__) . '/includes/php/login.php');
}
