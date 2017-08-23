<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/8/23
 * Time: 22:40
 */

namespace app\api\validate;


use think\Validate;

class TestValidate extends Validate {
    protected $rule = [
        'name' => 'require|max:10',
        'email' => 'email'
    ];
}