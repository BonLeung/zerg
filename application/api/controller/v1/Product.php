<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/8/27
 * Time: 23:05
 */

namespace app\api\controller\v1;


use app\api\model\Product as ProductModel;
use app\api\validate\Count;
use app\api\validate\IDMustBePositiveInt;
use app\lib\exception\ProductException;

class Product {
    public function getRecent($count = 15) {
        (new Count())->goCheck();
        $products = ProductModel::getMostRecent($count);
        if ($products -> isEmpty()) {
            throw new ProductException();
        }
        $products = $products -> hidden(['summary']);
        return $products;
    }

    public function getAllInCategory($id) {
        (new IDMustBePositiveInt()) -> goCheck();
        $products = ProductModel::getProductsByCategoryId($id);
        if ($products -> isEmpty()) {
            throw new ProductException();
        }
        $products = $products -> hidden(['summary']);
        return $products;
    }
}