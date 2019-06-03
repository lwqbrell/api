<?php
/**
 * Created by PhpStorm.
 * User: Trevor
 * Date: 2019/5/30
 * Time: 15:48
 */

namespace lib;

/**
 * Class Register 注册器模式
 * @package lib
 */
class Register
{
    static protected $objects;

    /**
     * @param string $alias
     * @param object $object
     */
    static public function registerSet($alias,$object){
      self::$objects[$alias]=$object;
    }

    /**
     * @param string $alias
     */
    static public function registerUnset($alias){
      unset(self::$objects[$alias]);
    }

    /**
     * @param string $alias
     * @return mixed
     */
    static function getRegister($alias){
        return self::$objects[$alias];
    }

}