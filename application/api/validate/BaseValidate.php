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
        $params = $request->param();

        // 对这些参数进行校验
        $result = $this->batch()->check($params);
        if (!$result) {
            throw new ParameterException([
                'msg' => $this->error
            ]);
        }
        return true;
    }

    protected function isPositiveInteger($value, $rule = '', $data = '', $field = '') {
        if (is_numeric($value) && is_int($value + 0) && ($value + 0) > 0) {
            return true;
        } else {
            return false;
        }
    }

    protected function isNotEmpty($value, $rule = '', $data = '', $field = '') {
        if (empty($value)) {
            return false;
        } else {
            return true;
        }
    }
}