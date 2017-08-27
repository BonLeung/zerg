<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/8/27
 * Time: 17:48
 */

namespace app\api\validate;


class IDCollection extends BaseValidate {

    protected $rule = [
        'ids' => 'require|checkIDs'
    ];

    protected $message = [
        'ids' => 'ids参数必须是以逗号分隔的正整数'
    ];

    // ids = id1, id2, id3...
    protected function checkIDs($value) {
        $ids = explode(',', $value);
        if (empty($ids)) {
            return false;
        }
        foreach ($ids as $id) {
            if (!$this->isPositiveInteger($id)) {
                return false;
            }
        }
        return true;
    }

}