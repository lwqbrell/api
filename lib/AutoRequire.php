<?php
/**
 * Created by PhpStorm.
 * User: Trevor
 * Date: 2019/5/30
 * Time: 13:16
 */

namespace lib;

/**
 * Class AutoRequire
 * @package lib
 */
class AutoRequire
{
    // 自动加载类，加载之前判断文件是否存在
    static public function autoloader($class){
        if(file_exists(BASEDIR.'\\..\\'.$class.'.php')){
            require BASEDIR.'\\..\\'.$class.'.php';
        }else{
            throw new \Exception('控制器不存在','10002');
        }

    }
}