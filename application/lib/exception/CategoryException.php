<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/8/28
 * Time: 21:44
 */

namespace app\lib\exception;


class CategoryException extends BaseException {
    public $code = 404;
    public $msg = '指定类目没有找到，请检查参数';
    public $errorCode = 50000;
}