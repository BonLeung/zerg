<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/8/28
 * Time: 23:28
 */

namespace app\api\model;


class User extends BaseModel {

    public function address() {
        return $this -> hasOne('UserAddress', 'user_id', 'id');
    }

    public static function getByOpenID($openid) {
        $user = self::where('openid', '=', $openid) -> find();
        return $user;
    }
}