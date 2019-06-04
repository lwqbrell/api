<?php
/**
 * Created by PhpStorm.
 * User: Trevor
 * Date: 2019/6/4
 * Time: 11:40
 */

namespace api\v1;
use \PHPQRCode\QRcode;

class Qr implements ApiInterface
{
    public function exe()
    {
        $content=$_GET['content'];
        $this->setQrcode($content);
        echo "<img src='/images/qrcode.png'>";
    }

    public function setQrcode($content){
      QRcode::png($content, "./images/qrcode.png", 'L', 4, 2);
    }

}