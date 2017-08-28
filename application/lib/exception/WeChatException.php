<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/8/29
 * Time: 0:27
 */

namespace app\lib\exception;


class WeChatException extends BaseException {
    public $code = 400;
    public $msg = '微信服务器接口调用失败';
    public $errorCode = 999;
}