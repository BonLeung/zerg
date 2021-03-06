<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/8/24
 * Time: 1:48
 */

namespace app\api\model;


class Banner extends BaseModel {

    protected $hidden = ['update_time', 'delete_time'];

    public function items() {
        return $this -> hasMany('BannerItem', 'banner_id', 'id');
    }

    public static function getBannerById($id) {
        $banner = self::with(['items', 'items.img']) -> find($id);
        return $banner;
    }
}