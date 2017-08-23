<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/8/24
 * Time: 0:40
 */

namespace app\api\validate;


use think\Exception;
use think\Request;
use think\Validate;

class BaseValidate extends Validate {

    public function goCheck() {
        // 获取 http 传入的参数
        // 对这些参数进行校验
        $request = Request::instance();
        $params = $request -> param();

        $result = $this -> check($params);
        if (!$result) {
            $error = $this -> error;
            throw new Exception($error);
        }
        return true;
    }
}