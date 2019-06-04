<?php
/**
 * Created by PhpStorm.
 * User: Trevor
 * Date: 2019/6/3
 * Time: 15:59
 */

namespace api\v1;

/**
 * Class History
 * @package api\v1
 */
class History extends Api implements ApiInterface
{
    private  $url = "http://api.juheapi.com/japi/toh";
    private $params = array(
        "key" =>\conf\Config::HISTORY_SCRECT, //应用APPKEY(应用详细页查询)
        "v" => "1.0",                         //版本，当前：1.0
    );

    public function exe()
    {
        $month=$_GET['month'];
        $day=$_GET['day'];
        $this->params['day']=$day;
        $this->params['month']=$month;
        $this->query($this->params,$this->url);
    }

    public function setParams($day,$month){
        $this->params['day']=$day;
        $this->params['month']=$month;
    }

}