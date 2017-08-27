<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/8/27
 * Time: 23:34
 */

namespace app\lib\exception;


class ProductException extends BaseException {
    public $code = 404;
    public $msg = '指定商品不存在，请检查参数';
    public $errorCode = 20000;
}