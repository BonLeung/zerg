<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/8/29
 * Time: 22:56
 */

namespace app\lib\exception;


class TokenException extends BaseException {
    public $code = 401;
    public $msg = 'Token已过期或无效Token';
    public $errorCode = 10001;
}