<?php
/**
 * Created by PhpStorm.
 * User: Trevor
 * Date: 2019/5/30
 * Time: 19:13
 */

namespace lib;

/**
 * Class App
 * @package lib
 */
class App
{

    function __construct()
    {

    }

    /**
     * 应用运行入口
     */
    static public function run()
    {
        $version='v1';
        $action='Index';
        if (isset($_SERVER['REQUEST_URI'])){
            $uri=preg_split('/\//',$_SERVER['REQUEST_URI']);
            if($_SERVER['REQUEST_URI']!='/' && count($uri)>=2){
                $version=$uri[1];
                $arr=preg_split('/\?/',$uri[2]);
                $action=ucfirst($arr[0]);

            }
        }
        try{

            $class="\\api\\".$version."\\".$action;
            $object=new $class();
            $object->exe();
        }catch (\Exception $e){
            print_r($e->getMessage(),$e->getCode());
        }
    }
}