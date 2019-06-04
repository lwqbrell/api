<?php
/**
 * Created by PhpStorm.
 * User: Trevor
 * Date: 2019/6/3
 * Time: 14:00
 */

namespace api\v1;

/**
 * Class Phone
 * @package api\v1
 */
class Phone extends Api implements ApiInterface
{
    private $url = "http://apis.juhe.cn/mobile/get";
    private $params = array(
    "key" => \conf\Config::PHONE_SCRECRT,  //应用APPKEY(应用详细页查询)
    );

    public function exe()
    {
        $phone=$_GET['phone'];
        $this->setParams($phone);
        $this->query($this->params,$this->url);
    }

    function setParams($phone)
    {
        $this->params['phone']=$phone;
    }

}