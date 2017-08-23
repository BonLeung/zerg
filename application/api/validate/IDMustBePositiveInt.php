<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/8/23
 * Time: 23:51
 */

namespace app\api\validate;


use think\Validate;

class IDMustBePositiveInt extends Validate {
    protected $rule = [
        'id' => 'require|isPositiveInteger'
    ];

    protected function isPositiveInteger($value, $rule = '', $data = '', $field = '') {
       if (is_numeric($value) && is_int($value + 0) && ($value + 0) > 0) {
           return true;
       } else {
           return $field . '必须是正整数';
       }
    }
}