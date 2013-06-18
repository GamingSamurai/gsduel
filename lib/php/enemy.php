<?php

class enemy {

    private static $instance;

require_once(dirname(__FILE__) . '/qbuilder.php');

/*
    private function __construct()
    {
        
    }
*/


    public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            $object = __CLASS__;
            self::$instance = new $object;
        }
        return self::$instance;
    }

    public function getEnemy($name)
    {
        $args = array();
        $args['name'] = $name;
        $s = get_select_stm('*', 'enemy', $args);
        $c = core::getInstance();
        $res = $c->getRes($s);
        
        return $res;
    }

}

