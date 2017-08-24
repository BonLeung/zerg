<?php
/**
 * Created by PhpStorm.
 * User: DIY
 * Date: 2017/8/24
 * Time: 15:14
 */

namespace app\lib\exception;


class ParameterException extends BaseException {
    public $code = 400;
    public $msg = '参数错误';
    public $errorCode = 10000;
}