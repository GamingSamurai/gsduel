<?php

//require_once(dirname(__FILE__) . '/db.php');
require_once(dirname(__FILE__) . '/core.php');
require_once(dirname(__FILE__) . '/qbuilder.php');


// Function for basic field validation (present and neither empty nor only white space)
function IsNullOrEmptyString($v){
    return (!isset($v) || trim($v)==='');
}

function db_conn($prepd_sql) {
    $dbx = core::getInstance();
    return $dbx->getRes($prepd_sql);
}


function login($u, $p)
{
    $ret = array();
    $ret['error'] = '';
	if(IsNullOrEmptyString($u)) {
		$ret['error'] = $ret['error'].'<li>Username cannot be empty.</li>';
	}
	if(IsNullOrEmptyString($p)) {
		$ret['error'] = $ret['error'].'<li>Password cannot be empty.</li>';
	}
	//does this username exist?
	//verify user
	$vu_sql = 'SELECT id FROM user WHERE name = "'.$u.'"';
	$ret_vu = db_conn($vu_sql);
	if(!isset($ret_vu[0]['id'])) { $ret['error'] = $ret['error'].'<li>Username does not exist</li>'; }
	if(IsNullOrEmptyString($ret['error'])) {
	    $pup = hash('sha256',$p);
	    $ulogin_sql = 'SELECT u.name "user", p.pass "password" '.
	                    'from user u, up_join j, password p '.
	                    'where u.name = "'.$u.'" '.
	                    'and u.id = j.uid '.
	                    'and p.id = j.pid';
	    $ret['try'] = db_conn($ulogin_sql);
	    if($ret['try'][0]['password'] == $pup) {
	        $ret['loggedin'] = true;
	    } else {
	        $ret['loggedin'] = false;
	        $ret['error'] = $ret['error'].'<li>Password incorrect. <span style="font-size:6px;">SUCKAH!</span></li>';
	    }
	}
	
	return $ret;
    
}

function register($u, $p1, $p2, $e) {
	$ret = array();
	$ret['error'] = '';
	if(IsNullOrEmptyString($u)) {
		$ret['error'] = $ret['error'].'<li>Username cannot be empty.</li>';
	}
	if(IsNullOrEmptyString($p1)) {
		$ret['error'] = $ret['error'].'<li>Password cannot be empty.</li>';
	} else {
	    $p1 = hash('sha256', $p1);
	}
	if(IsNullOrEmptyString($p2)) {
		$ret['error'] = $ret['error'].'<li>Password confirmation cannot be empty.</li>';
	} else {
	    $p2 = hash('sha256', $p2);
	}
	if(IsNullOrEmptyString($e)) {
		$ret['error'] = $ret['error'].'<li>Email cannot be empty.</li>';
	}
	if(!($p1 == $p2)) {
		$ret['error'] = $ret['error'].'<li>Your passwords do not match.</li>';
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
			$pid = db_conn('select id from password where pass = "'.$p1.'"');
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
