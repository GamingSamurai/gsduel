<?php

/* ********************
*  This file should
*  NEVER NEVER NEVER
*  be checked into
*  your git repo!
********************* */

function get_db_creds() {
    $creds = array();
    $creds['host'] = 'duelsystem.db.5673319.hostedresource.com';
    $creds['db'] = 'duelsystem';
    $creds['u'] = 'user_name';
    $creds['p'] = 'pass_word';
    return $creds; 
}
