<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/8/24
 * Time: 1:48
 */

namespace app\api\model;


use think\Db;
use think\Model;

class Banner extends Model {

    public function items() {
        return $this -> hasMany('BannerItem', 'banner_id', 'id');
    }

    public static function getBannerById($id) {
//        $result = Db::query('SELECT * FROM banner_item WHERE banner_id=?', [$id]);
        $result = Db::table('banner_item') -> where('banner_id', '=', $id) -> find();
        return $result;
    }
}