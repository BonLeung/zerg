<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/8/30
 * Time: 22:03
 */

namespace app\api\validate;


class AddressNew  extends BaseValidate {
    protected $rule = [
        'name' => 'require|isNotEmpty',
        'mobile' => 'require|isMobile',
        'province' => 'require|isNotEmpty',
        'city' => 'require|isNotEmpty',
        'country' => 'require|isNotEmpty',
        'detail' => 'require|isNotEmpty'
    ];
}