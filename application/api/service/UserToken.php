<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/8/28
 * Time: 23:29
 */

namespace app\api\service;


use think\Exception;

class UserToken {

    protected $code;
    protected $wxAppID;
    protected $wxAppSecret;
    protected $wxLoginUrl;

    function __construct($code) {
        $this -> code = $code;
        $this -> wxAppID = config('wx.app_id');
        $this -> wxAppSecret = config('ex.app_secret');
        $this -> wxLoginUrl = sprintf('wx.login_url', $this -> wxAppID, $this -> wxAppSecret, $this -> code);
    }

    public function get() {
        $result = curl_get($this -> wxLoginUrl);
        $wxResult = json_decode($result, true);
        if (empty($wxResult)) {
            throw new Exception('获取 open_id 和 session_key 时异常，微信内部错误');
        }
    }

}