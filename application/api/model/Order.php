<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/9/1
 * Time: 13:17
 */

namespace app\api\model;


class Order extends BaseModel {
    protected $hidden = ['user_id', 'delete_time', 'update_time'];

    protected $autoWriteTimestamp = true;

}