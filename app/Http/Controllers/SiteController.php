<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/21/021
 * Time: 17:16
 */

namespace App\Http\Controllers;


use App\WeChat;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(Request $request)
    {
        // TOKEN值
        define("TOKEN", "test_chukeey");

        $wechatObj = new WeChat();
        $wechatObj->valid();
    }
}