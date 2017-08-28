<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/8/28
 * Time: 23:29
 */

namespace app\api\service;


use app\lib\exception\WeChatException;
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
        } else {
            $loginFail = array_key_exists('errcode', $wxResult);
            if ($loginFail) {
                $this -> processLoginError($wxResult);
            } else {
                $this -> grantToken($wxResult);
            }
        }
    }

    private function grantToken($wxResult) {
        // 拿到 openid
        // 数据库里看一下，这个 openid 是否已经存在，如果 openid 存在，说明用户已存在，如果不存在，需要保存一条用户记录在数据库中
        // 生成令牌，准备缓存数据库，写入缓存
        // 把令牌返回到客户端去
        $openid = $wxResult['oppenid'];
    }

    private function processLoginError($wxResult) {
        throw new WeChatException([
            'msg' => $wxResult['errmsg'],
            'errorCode' => $wxResult['errcode']
        ]);
    }

}