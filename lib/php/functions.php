<?php

require_once(dirname(__FILE__) . '/db.php');

function db_conn($prepd_sql) {
    return get_connection($prepd_sql);
}
