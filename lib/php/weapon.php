<?php

interface iWeapon
{
/*
    public function getId();
    public function getName();
    public function getDie();
    public function getAttackSpeed();
    public function getBlockPoints();
    public function getIsOneHanded();
    public function getCritMod();
    public function getTurnVar();
    public function getDieMultiplier();
*/
}

class weapon implements iWeapon
{
    public static $instance;
    public $id;
    public $name;
    public $die;
    public $attack_speed;
    public $block_points;
    public $is_one_handed;
    public $crit_mod;
    public $turn_variance;
    public $die_multiplier;
/*
    function __construct($name)
    {
        include_once(dirname(__FILE__) . '/core.php');
        include_once(dirname(__FILE__) . '/qbuilder.php');

        $args = array();
        $args['name'] = '"'.$name.'"';
        $s = get_select_stm('*', 'weapons', $args);
        echo 'S: '.$s;
        $c = core::getCRes($s, 'weapon');
        print 'C: ';
        print_r($c);
        print '<br>';
        return $c;
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
/*
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
*/
    public function getWeapon($name)
    {
       include_once(dirname(__FILE__) . '/qbuilder.php');

        $args = array();
        $args['name'] = $name;
        $s = get_select_stm('*', 'weapons', $args);
        $c = core::getInstance();
        $res = $c->getCRes($s);
        return $res;
    }

}

class player_weapon extends weapon {

    public $id;
    public $name;
    public $die;
    public $attack_speed;
    public $block_points; //private static $bp; why was i wanting a static bp? /zeus
    public $is_one_handed;
    public $crit_mod;
    public $turn_variance;
    public $die_multiplier;

        function getPlayerWeapon($name)
    {
        include_once(dirname(__FILE__) . '/core.php');
        include_once(dirname(__FILE__) . '/qbuilder.php');

        $args = array();
        $args['name'] = '"'.$name.'"';
        $s = get_select_stm('*', 'weapons', $args);
        $c = core::getCRes($s, 'player_weapon');
        foreach($c as $k => $v) { $this->$k = $v; }
        return $this;
    }

    public function setRaceModifier($mod)
    {
        setBlockPoints(getBlockPoints() + $mod);
    }

    public function setClassModifier($mod)
    {
        setBlockPoints(getBlockPoints() + $mod);
    }

}

class enemy_weapon extends weapon {

    public $id;
    public $name;
    public $die;
    public $attack_speed;
    public $block_points; //private static $bp; why was i wanting a static bp? /zeus
    public $is_one_handed;
    public $crit_mod;
    public $turn_variance;
    public $die_multiplier;

        function getEnemyWeapon($name)
    {
        include_once(dirname(__FILE__) . '/core.php');
        include_once(dirname(__FILE__) . '/qbuilder.php');

        $args = array();
        $args['name'] = '"'.$name.'"';
        $s = get_select_stm('*', 'weapons', $args);
        $c = core::getCRes($s, 'player_weapon');
        foreach($c as $k => $v) { $this->$k = $v; }
        return $this;
    }

    public function setRaceModifier($mod)
    {
        setBlockPoints(getBlockPoints() + $mod);
    }

    public function setClassModifier($mod)
    {
        setBlockPoints(getBlockPoints() + $mod);
    }

}
