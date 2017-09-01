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

    }
}