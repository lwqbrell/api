<?php
/**
 * Created by PhpStorm.
 * User: Trevor
 * Date: 2019/5/30
 * Time: 15:00
 */

namespace conf;

class Config
{
    // 数据库配置
    const USER='root';
    const PWD='root';
    const DNS='mysql:host=localhost;dbname=xiyanhui';

    // smarty配置
    const TEMPLATEDIR='/../view';
    const COMPILEDIR='/../tmp/templates_c/';
    const CACHEDIR='/../tmp/cache/';

    // 手机号码查询配置
    const PHONE_SCRECRT='31e24ed9204a185105e03a6c2491dabb';

    // 历史上的今天
    const HISTORY_SCRECT='6b3c6794507f3814e566acfb38e0628a';

    // 成语词典配置
    const IDIOM_SCRECT='9376f5ba8d3aa9e9bdeb1fb6612096df';
}