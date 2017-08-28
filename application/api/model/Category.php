<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/8/28
 * Time: 21:30
 */

namespace app\api\model;


class Category extends BaseModel {

    protected $hidden = ['update_time', 'delete_time', 'create_time'];

    public function img() {
        return $this -> belongsTo('Image', 'topic_img_id', 'id');
    }
}