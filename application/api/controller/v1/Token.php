<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/8/28
 * Time: 23:17
 */

namespace app\api\controller\v1;


use app\api\service\UserToken;
use app\api\validate\TokenGet;

class Token {

    public function getToken($code) {
        (new TokenGet()) -> goCheck();
        $userToken = new UserToken();
        $token = $userToken -> get();
        return $token;
    }
}