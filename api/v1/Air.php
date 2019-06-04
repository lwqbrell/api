<?php
/**
 * Created by PhpStorm.
 * User: Trevor
 * Date: 2019/6/4
 * Time: 14:05
 */

namespace api\v1;


class Air extends Api implements ApiInterface
{
   private $url = "http://web.juhe.cn:8080/environment/air/cityair";
   private $params = array(
    "city" => '',//城市名称的中文名称或拼音，如：上海 或 shanghai
    "key" => \conf\Config::AIR_SCRECT,//APP Key
    );
    public function exe()
    {
        $city=$_GET['city'];
        $this->setParams($city);
        $this->query($this->params,$this->url);
    }
    public function setParams($city){
        $this->params['city']=$city;
    }
}