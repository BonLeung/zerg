<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/8/27
 * Time: 19:43
 */

namespace app\lib\exception;


class ThemeException extends BaseException {
    public $code = 404;
    public $msg = '指定主题不存在，请检查主题ID';
    public $errorCode = 30000;
}