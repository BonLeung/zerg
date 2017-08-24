<?php
/**
 * Created by PhpStorm.
 * User: DIY
 * Date: 2017/8/24
 * Time: 11:28
 */

namespace app\lib\exception;


class BannerMissException extends BaseException {
    public $code = 404;
    public $msg = '请求的 banner 不存在';
    public $errorCode = 40000;
}