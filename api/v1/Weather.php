<?php
/**
 * Created by PhpStorm.
 * User: Trevor
 * Date: 2019/6/4
 * Time: 13:55
 */

namespace api\v1;


class Weather extends Api implements ApiInterface
{
   private $url = "http://op.juhe.cn/onebox/weather/query";
   private $params = array(
    "cityname" =>'',//要查询的城市，如：温州、上海、北京
    "key" => \conf\Config::WEATHER_SCRECT,//应用APPKEY(应用详细页查询)
    "dtype" => "",//返回数据的格式,xml或json，默认json
    );
    public function exe()
    {
        $city=$_GET['city'];
        $this->setParams($city);
        $this->query($this->params,$this->url);
    }
    public function setParams($city){
        $this->params['cityname']=$city;
    }
}