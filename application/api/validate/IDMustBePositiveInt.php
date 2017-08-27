<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/8/23
 * Time: 23:51
 */

namespace app\api\validate;


class IDMustBePositiveInt extends BaseValidate {
    protected $rule = [
        'id' => 'require|isPositiveInteger'
    ];

    protected $message = [
        'id' => 'id必须是正整数'
    ];

}