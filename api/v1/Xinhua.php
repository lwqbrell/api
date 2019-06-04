<?php
/**
 * Created by PhpStorm.
 * User: Trevor
 * Date: 2019/6/4
 * Time: 13:44
 */

namespace api\v1;


class Xinhua extends Api implements ApiInterface
{
    private $url = "http://v.juhe.cn/xhzd/query";
    private $params = array(
    "word" =>'',//填写需要查询的汉字，UTF8 urlencode编码
    "key" => \conf\Config::NEW_IDIOM_SCRECT,//应用APPKEY(应用详细页查询)
    "dtype" => "",//返回数据的格式,xml或json，默认json
    );
    public function exe()
    {
        $word=$_GET['word'];
        $this->setParams($word);
        $this->query($this->params,$this->url);
    }
    public function setParams($word){
        $this->params['word']=$word;
    }
}