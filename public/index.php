<?php
// 入口目录
define('BASEDIR',__DIR__);
// composer的自动加载文件
//require BASEDIR.'/../vendor/autoload.php';
// 本框架的自动加载类
require BASEDIR.'/../lib/AutoRequire.php';
spl_autoload_register('\\lib\\AutoRequire::autoloader');

// 运行框架
 \lib\App::run();
