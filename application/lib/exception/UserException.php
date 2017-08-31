<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/8/31
 * Time: 21:24
 */

namespace app\lib\exception;


class UserException extends BaseException {
    public $code = 404;
    public $msg = '用户不存在';
    public $errorCode = 60000;
}