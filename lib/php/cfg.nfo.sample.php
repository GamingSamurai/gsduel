<?php

/* ********************
*  This file should
*  NEVER NEVER NEVER
*  be checked into
*  your git repo!
********************* */

// this is a sample file 
// for helping to create 
// the credentials function 
// for DB interaction

// replace all array assignments with the proper values.
// if you change the array key you will have to also
// change the appropriate referrences in the code.
//  in other words, change the values, not the keys, please

// zeus

function get_db_creds() {
    $creds = array();
    $creds['host'] = 'database_hostname';
    $creds['db'] = 'database_name';
    $creds['u'] = 'user_name';
    $creds['p'] = 'pass_word';
    return $creds; 
}
