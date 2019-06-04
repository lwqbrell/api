<?php
/**
 * Created by PhpStorm.
 * User: Trevor
 * Date: 2019/6/4
 * Time: 14:53
 */

namespace api\v1;


class Constellation extends Api implements ApiInterface
{
    private $url = "http://web.juhe.cn:8080/constellation/getAll";
    private $params = array(
    "key" => \conf\Config::CONSTELLATION_SCRECT,//应用APPKEY(应用详细页查询)
    "consName" => '', //星座名称，如:白羊座
    "type" => '',     //运势类型：today,tomorrow,week,nextweek,month,year
    );
    public function exe()
    {
        $constellation=$_GET['constellation'];
        $date=$_GET['date'];
        $this->setParams($constellation,$date);
        $this->query($this->params,$this->url);
    }

    public function setParams($constellation,$date){
        $this->params['consName']=$constellation;
        $this->params['type']=$date;
    }
}