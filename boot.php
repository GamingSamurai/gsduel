<?php
 require_once(dirname(__FILE__) . '/lib/php/functions.php');
 session_start();
 function start_page() {
     echo '<html><head>';
	echo '<meta http-equiv="content-type" content="text/html; charset=utf-8">';
     echo '<title>.'$title.'</title>';
	echo '<link rel="stylesheet" type="text/css" href="css/styles.css">';
     echo '</head>';
     echo '<body>';
	echo '<h1>'.$heading.'</h1>';
 }
 
 function end_page() {
     echo '</body></html>';
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
