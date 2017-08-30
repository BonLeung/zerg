<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/8/30
 * Time: 20:44
 */

namespace app\api\model;


class ProductImage extends BaseModel {
    protected $hidden = ['img_id', 'delete_time', 'rpoduct_id'];

    public function imgUrl() {
        return $this -> belongsTo('Image', 'img_id', 'id');
    }
}