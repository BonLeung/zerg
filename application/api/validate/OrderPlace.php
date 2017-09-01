<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/9/1
 * Time: 9:28
 */

namespace app\api\validate;


use app\lib\exception\ParameterException;

class OrderPlace extends BaseValidate {
    protected $rule = [
        'products' => 'checkProducts'
    ];

    protected $singleRule = [
        'product_id' => 'require|isPositiveInteger',
        'count' => 'require|isPositiveInteger'
    ];

    protected function checkProducts($products) {
        if (!is_array($products)) {
            throw new ParameterException([
                'msg' => '商品参数不正确'
            ]);
        }
        if (empty($products)) {
            throw new ParameterException([
                'msg' => '商品列表不能为空'
            ]);
        }

        foreach ($products as $product) {
           $this -> checkProduct($product);
        }
        return true;
    }

    protected function checkProduct($product) {
        $validate = new BaseValidate($this -> singleRule);
        $result = $validate -> check($product);
        if (!$result) {
            throw new ParameterException([
                'msg' => '商品列表参数错误'
            ]);
        }
    }
}