<?php
/**
 * Created by PhpStorm.
 * User: Trevor
 * Date: 2019/5/30
 * Time: 20:20
 */

namespace lib;
use \conf\Config;

/**
 * Class View
 * @package lib
 */
class View
{
    public $smarty;

    /**
     * View constructor.
     */
    function __construct()
    {
        $this->smarty=new \Smarty();
        //设置模板目录
        $this->smarty->setTemplateDir(BASEDIR .Config::TEMPLATEDIR);
        $this->smarty->setCompileDir(BASEDIR .Config::COMPILEDIR);
        $this->smarty->setCacheDir(BASEDIR .Config::CACHEDIR);
    }

}