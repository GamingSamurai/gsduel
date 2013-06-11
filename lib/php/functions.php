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
    
    echo '<br>relpath: '.$relpath.' / uArgs: '.print_r($url_args).' / has_sess: '.$has_session;
    //header('Location: '.$rel_path,true,303);//,$has_session,303);
    //header("location:http://gsduel.gamingsamurai.com/",true,303);
	//http_redirect($relpath, $url_args, $has_session, 302);
}

function register($u, $p1, $p2, $e) {
	$ret = array();
	$ret['error'] = '';
	if(IsNullOrEmptyString($u)) {
		$ret['error'] = $ret['error'].'<li>Username cannot be empty.<br>';
	}
	if(IsNullOrEmptyString($p1)) {
		$ret['error'] = $ret['error'].'<li>Password cannot be empty.<br>';
	} else {
	    $p1 = hash('sha256', $p1);
	}
	if(IsNullOrEmptyString($p2)) {
		$ret['error'] = $ret['error'].'<li>Password confirmation cannot be empty.<br>';
	} else {
	    $p2 = hash('sha256', $p2);
	}
	if(IsNullOrEmptyString($e)) {
		$ret['error'] = $ret['error'].'<li>Email cannot be empty.<br>';
	}
	if(!($p1 == $p2)) {
		$ret['error'] = $ret['error'].'<li>Your passwords do not match.<br>';
	}
	
	if(!($ret['error'] === '')) {
		$ret['success'] = false;
	} else {
		
		$register_sql = 'select id from user where name = "'.$u.'" or email = "'.$e.'"';
		$reg_ret = db_conn($register_sql);
		if(!empty($reg_ret)) {
		    $ret['success'] = false;
		    $ret['error'] = '<li>Username or Email already exists!';
		} else {
			//insert new user
			$insert_sql = 'insert into user(name, email) values("'.$u.'", "'.$e.'")';
			$reg_u_ret = db_conn($insert_sql);
			$uid = db_conn('select id from user where name="'.$u.'"');
			//insert new password
			$insert_sql = 'insert into password(pass) values("'.$p1.'")';
			$reg_p_ret = db_conn($insert_sql);
			$pid = db_conn('select id from password where pass = "'.$p1.'"'); //db_conn('SELECT LAST_INSERT_ID()');//$reg_p_ret['lastid'];
			//join those shizzles
			$insert_sql = 'insert into up_join(uid, pid) values("'.$uid[0]['id'].'", "'.$pid[0]['id'].'")';
			$reg_j_ret = db_conn($insert_sql);
			
			
			
			$ret['ures'] = $reg_u_ret;
			$ret['pres'] = $reg_p_ret;
			$ret['success'] = true;
		}
	}
	
	return $ret;
}
