<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/9/1
 * Time: 13:17
 */

namespace app\api\model;


class Order extends BaseModel {
    protected $hidden = ['user_id', 'delete_time', 'update_time'];

    protected $autoWriteTimestamp = true;

    protected function getSnapItemsAttr($value) {
        if (empty($value)) {
            return null;
        }
        return json_decode($value);
    }

    protected function getSnapAddressAttr($value) {
        if (empty($value)) {
            return null;
        }
        return json_decode($value);
    }

    public static function getSummaryByUser($uid, $page = 1, $size = 10) {
        $pagingData = self::where('user_id', '=', $uid)
            -> order('create_time desc')
            -> paginate($size, true, ['page' => $page])
            -> each(function ($item, $key) {
                $item -> hidden(['snap_items', 'snap_address', 'prepay_id']);
            });
        return $pagingData;
    }

}