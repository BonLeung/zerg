<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/9/1
 * Time: 10:34
 */

namespace app\lib\exception;


class OrderException extends BaseException {
    public $code = 404;
    public $msg = '订单不存在，请检查ID';
    public $errorCode = 80000;
}