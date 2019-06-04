<?php
/**
 * Created by PhpStorm.
 * User: Trevor
 * Date: 2019/6/3
 * Time: 16:27
 */

namespace api\v1;

class Idiom extends Api implements ApiInterface
{
    private $url = "http://v.juhe.cn/chengyu/query";
    private $params=array(
        "key" => \conf\Config::IDIOM_SCRECT,//应用APPKEY(应用详细页查询)
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