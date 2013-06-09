<?php

require_once(dirname(__FILE__) . '/db.php');

// Function for basic field validation (present and neither empty nor only white space
function IsNullOrEmptyString($v){
    return (!isset($v) || trim($v)==='');
}

function db_conn($prepd_sql) {
    return get_connection($prepd_sql);
}

function send_user_to($relpath, $url_args, $has_session) {
	http_redirect($relpath, $url_args, $has_session, 302);
}

function register($u, $p1, $p2, $e) {
	$p1 = hash('rsa256', $p1);
	$p2 = hash('rsa256', $p2);
	$ret = array();
	$ret['error'] = '';
	if(!IsNullOrEmptyString($u)) {
		$ret['error'] = $ret['error'].'Username cannot be empty.<br>';
	}
	if(!IsNullOrEmptyString($p1)) {
		$ret['error'] = $ret['error'].'Password cannot be empty.<br>';
	}
	if(!IsNullOrEmptyString($p2)) {
		$ret['error'] = $ret['error'].'Password confirmation cannot be empty.<br>';
	}
	if(!IsNullOrEmptyString($e)) {
		$ret['error'] = $ret['error'].'Email cannot be empty.<br>';
	}
	if(!($p1 == $p2)) {
		$ret['error'] = $ret['error'].'Your passwords do not match.<br>';
	}
	
	if(!($ret['error'] === '')) {
		$ret['success' = false];
	} else {
		
		$register_sql = 'select id from user where name = '.$u.' or email = '.$e;
		$reg_ret = db_conn($register_sql);
		if(empty($reg_ret)) {
		    $ret['success'] = false;
		    $ret['error'] = 'Username or Email already exists!';
		} else {
			//insert new user
			$insert_sql = 'insert into user(name, email) values('.$u.', '.$e.')';
			$reg_u_ret = db_conn($insert_sql);
			$uid = db_conn('SELECT LAST_INSERT_ID()');
			//insert new password
			$insert_sql = 'insert into password(pass) values('.$p1.')';
			$reg_p_ret = db_conn($insert_sql);
			$pid = db_conn('SELECT LAST_INSERT_ID()');
			//join those shizzles
			$insert_sql = 'insert into up_join(uid, pid) values('.$uid.', '.$pid.')';
			$reg_j_ret = db_conn($insert_sql);
			
			
			
			
			$ret['success' = true];
		}
	}
	
	return $ret;
}
