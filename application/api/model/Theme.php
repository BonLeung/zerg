<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/8/27
 * Time: 17:12
 */

namespace app\api\model;


class Theme extends BaseModel {

    protected $hidden = ['update_time', 'delete_time', 'head_img_id', 'topic_img_id'];

    public function topicImg() {
        return $this -> belongsTo('Image', 'topic_img_id', 'id');
    }

    public function headImg() {
        return $this -> belongsTo('Image', 'head_img_id', 'id');
    }

    public function products() {
        return $this -> belongsToMany('Product', 'theme_product', 'product_id', 'theme_id');
    }

    public static function getThemeWidthProducts($id) {
        $theme = self::with(['products', 'topicImg', 'headImg']) -> find($id);
        return $theme;
    }
}