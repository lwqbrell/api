<?php
/**
 * Created by PhpStorm.
 * User: Trevor
 * Date: 2019/5/30
 * Time: 14:57
 */

namespace lib;
use \conf\Config;

/**
 * Class Database
 * @package lib
 */
class Database
{
    static private $_db;

    /**
     * Database constructor. 单例模式
     */
    private function __construct()
    {
        self::$_db=new \PDO(Config::DNS,Config::USER,Config::PWD);
    }

    /**
     * @return Database|\PDO
     */
    static public function getInstance(){
        if (self::$_db){
            return self::$_db;
        }else{
           return self::$_db=new self();
        }
    }

    /**
     * @param $sql
     */
    static function query($sql){

    }
    static function queryOne(){

    }
    static function queryAll(){

    }
    static function queryLimit(){

    }

}