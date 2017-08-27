<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/8/27
 * Time: 23:08
 */

namespace app\api\validate;


class Count extends BaseValidate {
    protected $rule = [
        'count' => 'isPositiveInteger|between:1,15'
    ];

    protected $message = [
        'count' => 'count 必须是 1 到 15 的正整数'
    ];
}