<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/8/24
 * Time: 0:40
 */

namespace app\api\validate;


use app\lib\exception\ParameterException;
use think\Request;
use think\Validate;

class BaseValidate extends Validate {

    public function goCheck() {
        // 获取 http 传入的参数
        $request = Request::instance();
        $params = $request -> param();

        // 对这些参数进行校验
        $result = $this -> batch() -> check($params);
        if (!$result) {
          throw new ParameterException([
              'msg' => $this -> error
          ]);
        }
        return true;
    }
}