<?php
/**
 * Created by PhpStorm.
 * User: Trevor
 * Date: 2019/5/30
 * Time: 14:57
 */

namespace lib;

/**
 * Class Factory 工厂模式
 * @package lib
 */
class Factory
{
    /**
     * @return Database|\PDO
     */
    static function createDatabase(){
        $db=Database::getInstance();
        Register::registerSet('mysql',$db);
        return $db;
    }

    /**
     * @return \Smarty
     */
    static function createSmarty(){
        $view=new View();
        Register::registerSet('smarty',$view->smarty);
        return $view->smarty;
    }
}