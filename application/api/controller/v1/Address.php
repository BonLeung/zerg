<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/8/30
 * Time: 21:43
 */

namespace app\api\controller\v1;


use app\api\validate\AddressNew;

class Address {

    public function createOrUpdateAddress() {
        (new AddressNew()) -> goCheck();
        // 根据Token来获取uid
        // 根据uid来查找用户数据，判断用户是否存在，如果不存在抛出异常
        // 获取用户从客户端提交来的地址信息
        // 根据用户地址信息是否存在，从而判断是添加地址还是更新地址

    }

}