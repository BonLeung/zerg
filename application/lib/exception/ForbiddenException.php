<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/9/1
 * Time: 8:23
 */

namespace app\lib\exception;


class ForbiddenException extends BaseException {
    public $code = 403;
    public $msg = '权限不足';
    public $errorCode = 10001;
}