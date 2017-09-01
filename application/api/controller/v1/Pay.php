<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/9/1
 * Time: 14:48
 */

namespace app\api\controller\v1;


use app\api\validate\IDMustBePositiveInt;
use app\api\service\Pay as PayService;

class Pay extends BaseController {
    protected $beforeActionList = [
        'checkExclusiveScope' => [
            'only' => 'getPreOrder'
        ]
    ];

    public function getPreOrder($id = '') {
        (new IDMustBePositiveInt()) -> goCheck();
        $pay = new PayService($id);
        return $pay -> pay();
    }

    public function receiveNotify() {
        // 1. 检测库存量，超卖
        // 2. 更新这个订单的status状态
        // 3. 减库存
        // 如果成功处理，我们返回微信成功处理的信息，否则，我们需要返回没有成功处理
    }
}