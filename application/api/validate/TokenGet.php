<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/8/28
 * Time: 23:20
 */

namespace app\api\validate;


class TokenGet extends BaseValidate {
    protected $rule = [
        'code' => 'require|isNotEmpty'
    ];

    protected $message = [
        'code' => 'code 不能为空'
    ];
}