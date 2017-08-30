<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/8/30
 * Time: 20:48
 */

namespace app\api\model;


class ProductProperty extends BaseModel {
    protected $hidden = ['product_id', 'delete_time', 'update_time' , 'id'];
}