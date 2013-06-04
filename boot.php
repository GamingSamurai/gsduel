<?php
 require_once(dirname(__FILE__) . '/lib/php/functions.php');
 
 function start_page() {
     echo '<html><head>';
     echo '<title>DuelSystemGO! by GamingSamurai</title>';
     echo '</head>';
     echo '<body>';
 }
 
 function end_page() {
     echo '</body></html>';
 }
 
 function get_data($ps) {
     return db_conn($prepd_sql);
 }
