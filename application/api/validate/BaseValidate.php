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

    public function getDataByRule($array) {
        if (array_key_exists('user_id', $array) | array_key_exists('uid', $array)) {
            throw new ParameterException([
                'msg' => '参数中包含有非法的参数名user_id或uid'
            ]);
        }
        $newArray = [];
        foreach ($this -> rule as $key => $value) {
            $newArray[$key] = $array[$key];
        }
        return $newArray;
    }

    protected function isMobile($value) {
        $rule = '^1(3|4|5|7|8)[0-9]\d{8}$^';
        $result = preg_match($rule, $value);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}