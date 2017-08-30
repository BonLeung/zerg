<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/8/27
 * Time: 17:12
 */

namespace app\api\model;


class Product extends BaseModel {
    protected $hidden = ['create_time', 'update_time', 'delete_time', 'category_id', 'pivot', 'from'];

    public function getMainImgUrlAttr($value, $data) {
        return $this -> prefixImageUrl($value, $data);
    }

    public function imgs() {
        return $this -> hasMany('ProductImage', 'product_id', 'id');
    }

    public function properties() {
        return $this -> hasMany('ProductProperty', 'product_id', 'id');
    }

    public static function getMostRecent($count) {
        $products = self::limit($count)
            -> order('create_time desc')
            -> select();
        return $products;
    }

    public static function getProductsByCategoryId($categoryId) {
        $products = self::where('category_id', '=', $categoryId)
            -> select();
        return $products;
    }

    public static function getProductDetail($id) {
        $product = self::with([
            'imgs' => function($query) {
                $query -> with(['imgUrl']) -> order('order', 'asc');
            }
        ])
            -> with(['properties'])
            -> find($id);
        return $product;
    }
}