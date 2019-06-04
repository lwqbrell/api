<?php
/**
 * Created by PhpStorm.
 * User: Trevor
 * Date: 2019/6/3
 * Time: 14:51
 */

namespace api\v1;


class Index implements ApiInterface
{
    public function exe()
    {
       $result = json_encode(['msg'=>urlencode('请求成功'),'code'=>'10000']);
       echo urldecode($result);
    }
}