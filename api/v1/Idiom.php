<?php
/**
 * Created by PhpStorm.
 * User: Trevor
 * Date: 2019/6/3
 * Time: 16:27
 */

namespace api\v1;


class Idiom implements ApiInterface
{
    private $params=array(
        "key" => \conf\Config::IDIOM_SCRECT,//应用APPKEY(应用详细页查询)
        "dtype" => "",//返回数据的格式,xml或json，默认json
    );
    public function exe()
    {
        $word=$_GET['word'];
        $this->params['word']=$word;
        $this->getIdiom();

    }
    public function getIdiom(){
        $url = "http://v.juhe.cn/chengyu/query";
        $paramstring = http_build_query($this->params);
        $content = $this->juhecurl($url,$paramstring);
        echo $content;
    }
    /**
     * 请求接口返回内容
     * @param  string $url [请求的URL地址]
     * @param  string $params [请求的参数]
     * @param  int $ipost [是否采用POST形式]
     * @return  string
     */
    function juhecurl($url,$params=false,$ispost=0){
        $httpInfo = array();
        $ch = curl_init();

        curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
        curl_setopt( $ch, CURLOPT_USERAGENT , 'JuheData' );
        curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT , 60 );
        curl_setopt( $ch, CURLOPT_TIMEOUT , 60);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER , true );
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        if( $ispost )
        {
            curl_setopt( $ch , CURLOPT_POST , true );
            curl_setopt( $ch , CURLOPT_POSTFIELDS , $params );
            curl_setopt( $ch , CURLOPT_URL , $url );
        }
        else
        {
            if($params){
                curl_setopt( $ch , CURLOPT_URL , $url.'?'.$params );
            }else{
                curl_setopt( $ch , CURLOPT_URL , $url);
            }
        }
        $response = curl_exec( $ch );
        if ($response === FALSE) {
            //echo "cURL Error: " . curl_error($ch);
            return false;
        }
        $httpCode = curl_getinfo( $ch , CURLINFO_HTTP_CODE );
        $httpInfo = array_merge( $httpInfo , curl_getinfo( $ch ) );
        curl_close( $ch );
        return $response;
    }
}