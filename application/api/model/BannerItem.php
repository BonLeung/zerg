<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/8/26
 * Time: 2:01
 */

namespace app\api\model;


use think\Model;

class BannerItem extends Model {

    protected $hidden = ['id', 'img_id', 'banner_id', 'update_time', 'delete_time'];

    public function img() {
        return $this -> belongsTo('Image', 'img_id', 'id');
    }
}