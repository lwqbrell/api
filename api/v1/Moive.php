<?php
/**
 * Created by PhpStorm.
 * User: Trevor
 * Date: 2019/6/4
 * Time: 15:03
 */

namespace api\v1;


class Moive extends Api implements ApiInterface
{
   private $url = "http://v.juhe.cn/movie/index";
   private $params = array(
    "title" => '',//需要检索的影片标题,utf8编码的urlencode
    "smode" => "",//<font color=red>是否精确查找，精确:1 模糊:0  默认1</font>
    "pagesize" => "",//<font color=red>每次返回条数，默认20,最大50</font>
    "offset" => "",//<font color=red>偏移量，默认0,最大760</font>
    "key" => \conf\Config::MOIVE_SCRECT,//应用APPKEY(应用详细页查询)
    "dtype" => "",//返回数据的格式,xml/json，默认json
    );
    public function exe()
    {
       $title=$_GET['title'];
       $this->setParams($title);
       $this->query($this->params,$this->url);
    }
    public function setParams($title){
        $this->params['title']=$title;
    }
}