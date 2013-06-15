<?php

// Convert to class /zeus
class core {

    public $dbh; // handle of the db connexion
    private static $instance;

    private function __construct()
    {
        include 'cfg.nfo.php';
        // building data source name from config
        $dsn = 'mysql:host=' . Config::read('db.host') .
              ';dbname='    . Config::read('db.basename');// .
        // getting DB user from config                
        $user = Config::read('db.user');
        // getting DB password from config                
        $password = Config::read('db.password');

        $this->dbh = new PDO($dsn, $user, $password);
    }

    public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            $object = __CLASS__;
            self::$instance = new $object;
        }
        return self::$instance;
    }

    // other, global functions
    
    public function getRes($prepd_sql) {
            $qres = array();
        
            try {
                $dcore = core::getInstance();
                $sth = $dcore->dbh->prepare($prepd_sql);
                $sth->bindParam(':id', $this->id, PDO::PARAM_INT);
                $sth->execute();
                $qres = $sth->fetchAll(PDO::FETCH_ASSOC);
                $dbh = null;
        
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        
            return $qres;
    }

}

