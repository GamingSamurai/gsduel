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
class Config
{
    static $confArray;

    public static function read($name)
    {
        return self::$confArray[$name];
    }

    public static function write($name, $value)
    {
        self::$confArray[$name] = $value;
    }

}

// db
Config::write('db.host', 'database_hostname');
Config::write('db.basename', 'database_name');
Config::write('db.user', 'user_name');
Config::write('db.password', 'pass_word!');
