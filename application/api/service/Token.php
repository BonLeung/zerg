<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/8/29
 * Time: 22:38
 */

namespace app\api\service;


class Token {

    public static function generateToken() {
        // 32个字符组成一组随机字符串
        $randChars = getRandChars(32);
        // 用三组字符串，进行 MD5 加密
        $timestamp = $_SERVER['REQUEST_TIME_FLOAT'];
        // salt 盐
        $salt = config('secure.token_salt');

        return md5($randChars . $timestamp . $salt);
    }
}