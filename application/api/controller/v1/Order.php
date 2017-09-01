<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/9/1
 * Time: 8:33
 */

namespace app\api\controller\v1;


use app\api\service\Order as OrderService;
use app\api\service\Token as TokenService;
use app\api\validate\IDMustBePositiveInt;
use app\api\validate\OrderPlace;
use app\api\validate\PagingParameter;
use app\api\model\Order as OrderModel;
use app\lib\exception\OrderException;

class Order extends BaseController {
    // 用户在选择商品后，向 API 提交包含它所选商品的相关信息
    // API 在接收到信息后，需要检查订单相关商品的库存量
    // 有库存，把订单的数据存入数据库中，下单成功了，返回客户端消息，告诉客户端可以支付
    // 调用支付接口，进行支付
    // 还需要再次进行库存量检测
    // 服务器这边可以调用微信的支付接口进行支付
    // 小程序根据服务器返回的结果拉起微信支付
    // 微信会返回我们一个支付的结果（异步）
    // 成功：也需要进行库存量的检查
    // 成功：进行库存量的扣除，失败：返回一个支付失败的结果

    protected $beforeActionList = [
        'checkExclusiveScope' => [
            'only' => 'placeOrder'
        ],
        'checkPrimaryScope' => [
            'only' => 'getSummaryByUser'
        ]
    ];

    public function getOrderDetail($id) {
        (new IDMustBePositiveInt())  -> goCheck();
        $orderDetail = OrderModel::get($id);
        if (!$orderDetail) {
            throw new OrderException();
        }
        return $orderDetail -> hidden(['prepay_id']);
    }

    public function placeOrder() {
        (new OrderPlace()) -> goCheck();
        $products = input('post.products/a');
        $uid = TokenService::getCurrentUid();

        $order = new OrderService();
        $status = $order -> place($uid, $products);
        return $status;
    }

    public function getSummaryByUser($page = 1, $size = 10) {
        (new PagingParameter()) -> goCheck();
        $uid = TokenService::getCurrentTokenVar('uid');
        $pagingOrders = OrderModel::getSummaryByUser($uid, $page, $size);
        $pagingOrdersArray = $pagingOrders -> toArray();
        // 删除 next_item 属性
        unset($pagingOrdersArray['next_item']);
        return $pagingOrdersArray;
    }
}