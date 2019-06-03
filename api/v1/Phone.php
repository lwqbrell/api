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
class Phone implements ApiInterface
{
    private $url = "http://apis.juhe.cn/mobile/get";
    private $params = array(
    "key" => \conf\Config::PHONE_SCRECRT,  //应用APPKEY(应用详细页查询)
    );

    public function exe()
    {
        $phone=$_GET['phone'];
        $this->setPhone($phone);
        $this->queryAddress();
    }

    function setPhone($phone)
    {
        $this->params['phone']=$phone;
    }

    public function queryAddress(){
        $paramstring = http_build_query($this->params);
        $content = $this->juheCurl($this->url, $paramstring);
        $result = json_decode($content, true);
        if ($result) {
            $result['result']['province']=urlencode($result['result']['province']);
            $result['result']['city']=urlencode($result['result']['city']);
            $result['result']['company']=urlencode($result['result']['company']);
           echo urldecode(json_encode($result));
        } else {
            echo urldecode(json_encode(['msg'=>urlencode('请求失败,未知错误'),'code'=>'10001']));
        }
    }

   public function juheCurl($url, $params = false, $ispost = 0)
    {
        $httpInfo = array();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'JuheData');
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        if ($ispost) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            curl_setopt($ch, CURLOPT_URL, $url);
        } else {
            if ($params) {
                curl_setopt($ch, CURLOPT_URL, $url.'?'.$params);
            } else {
                curl_setopt($ch, CURLOPT_URL, $url);
            }
        }
        $response = curl_exec($ch);
        if ($response === FALSE) {
            //echo "cURL Error: " . curl_error($ch);
            return false;
        }
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $httpInfo = array_merge($httpInfo, curl_getinfo($ch));
        curl_close($ch);
        return $response;
    }

}