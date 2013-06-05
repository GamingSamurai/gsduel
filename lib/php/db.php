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
    $dbP = $db_stuff['p'];

    $qres = array();

    try {

        $dbh = new PDO('mysql:host='.$host.';dbname='.$db, $dbu, $dbp);
        $sth = $dbh->prepare($prepd_sql);
        $sth->execute();
        $qres = $sth->fetchAll(PDO::FETCH_ASSOC);
        //print_r($qres);
        $dbh = null;

    } catch (PDOException $e) {

        print "Error!: " . $e->getMessage() . "<br/>";

        die();

    }

    return $qres;

}

