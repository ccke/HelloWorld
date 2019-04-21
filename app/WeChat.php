<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/21/021
 * Time: 17:38
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class WeChat extends Model
{
    public function valid()
    {
        $echoStr = $_GET["echostr"];
        if ($this->checkSignature()) {
            // 清空缓存区
            ob_clean();
            echo $echoStr;
            exit;
        }
    }

    private function checkSignature() {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);

        sort($tmpArr);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        return $tmpStr === $signature;
    }
}