<?php
require_once(dirname(__FILE__) . '/lib/php/functions.php');
session_save_path($_SERVER['DOCUMENT_ROOT'] . '/gsduel/s/d');

require_once(dirname(__FILE__) . '/lib/php/core.php');
require_once(dirname(__FILE__) . '/lib/php/weapon.php');

//print_r($_SESSION);
if (!isset($_SESSION)) {
        session_start();
}

 function start_page($title, $heading) {
     echo '<html><head>';
	echo '<meta http-equiv="content-type" content="text/html; charset=utf-8">';
     echo '<title>'.$title.'</title>';
	echo '<link rel="stylesheet" type="text/css" href="includes/css/style.css">';
     echo '</head>';
     echo '<body>';
     echo '<div id="content">';
	echo '<h1>'.$heading.'</h1>';
 }
 
 function end_page() {
     echo '</div></body></html>';
 }
 
 function get_data($ps) {
     return db_conn($prepd_sql);
 }
 
 function do_battle($w, $b, $e) {
	return battle_sim($w, $b, $e);
}

function get_db_results($psql) {
    return db_conn($psql);
}
