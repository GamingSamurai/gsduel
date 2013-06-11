<?php

// The following include is a file that should NEVER be in your repo
// Sample file can be found and edited.
// Create a .gitignore file in your repo root (if not already present)
// and add this file name.
require_once(dirname(__FILE__) . '/cfg.nfo.php');

/* modified from original db connection script at http://www.php.net/manual/en/pdo.connections.php /zeus */

function get_connection($prepd_sql) {
    
    $db_stuff = get_db_creds();
    $dbhostaddress = $db_stuff['host']; 
    $db = $db_stuff['db'];
    $dbu = $db_stuff['u'];
    $dbp = $db_stuff['p'];

    $qres = array();

    try {

// mysql_connect($dbhostaddress, $dbu, $dbp) OR DIE ("Unable to connect to database! Please try again later.");
            //mysql_select_db('gsduel');

            //Fetching from your database table.
            //$query = "SELECT * FROM $usertable";
            //echo 'sql: '.$prepd_sql.'<br>';
            //$qres = mysql_query($prepd_sql);
            
        
        $dbh = new PDO('mysql:host='.$dbhostaddress.';dbname='.$db, $dbu, $dbp);
        $sth = $dbh->prepare($prepd_sql);
        //$sth->bindParam(':val', $val, PDO::PARAM_INT);
        $sth->execute();
        $qres = $sth->fetchAll(PDO::FETCH_ASSOC);
        $dbh = null;
        //$qres['lastid'] = $dbh->lastInsertId();
        echo '<br>sql : '.$prepd_sql.' : '.print_r($qres).'<br>';

    } catch (PDOException $e) {

        print "Error!: " . $e->getMessage() . "<br/>";

        die();

    }

    return $qres;

}

