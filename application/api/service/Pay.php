<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/9/1
 * Time: 14:59
 */

namespace app\api\service;


use app\lib\enum\OrderStatusEnum;
use app\lib\exception\OrderException;
use app\lib\exception\TokenException;
use think\Exception;
use app\api\service\Order as OrderService;
use app\api\model\Order as OrderModel;
use think\Loader;
use think\Log;

Loader::import('WxPay.WxPay', EXTEND_PATH, '.Api.php');

class Pay {

    private $orderID;
    private $orderNO;

    function __construct($orderID) {
        if (!$orderID) {
            throw new Exception('订单号不允许为NULL');
        }
        $this -> orderID = $orderID;
    }

    public function pay() {
        // 订单号可能根本不存在
        // 订单号确实是存在的，但是，订单号和当前用户是不匹配的
        // 订单有可能已经被支付了
        // 进行库存量检测
        $this -> checkOrderValid();
        $status = (new OrderService()) -> checkOrderStock($this -> orderID);
        if (!$status['pass']) {
            return $status;
        }
        return $this -> makeWxPreOrder($status['orderPrice']);
    }

    private function makeWxPreOrder($totalPrice) {
        // openid
        $openid = Token::getCurrentTokenVar('openid');
        if (!$openid) {
            throw new TokenException();
        }
        $wxOrderData = new \WxPayUnifiedOrder();
        $wxOrderData -> SetOut_trade_no($this -> orderNO);
        $wxOrderData -> SetTrade_type('JSAPI');
        $wxOrderData -> SetTotal_fee($totalPrice * 100);
        $wxOrderData -> SetBody('零食商贩');
        $wxOrderData -> SetOpenid($openid);
        $wxOrderData -> SetNotify_url('http://qq.com');

        return $this -> getPaySignature($wxOrderData);
    }

    private function getPaySignature($wxOrderData) {
        $wxOrder = \WxPayApi::unifiedOrder($wxOrderData);
        if ($wxOrder['return_code'] != 'SUCCESS' || $wxOrder['result_code'] != 'SUCCESS') {
            Log::record($wxOrder, 'error');
            Log::record('获取预支付订单失败', 'error');
        }
        return null;
    }

    private function checkOrderValid() {
        $order = OrderModel::where('id', '=', $this -> orderID) -> find();
        if (!$order) {
            throw new OrderException();
        }
        if (!Token::isValidOperate($order -> user_id)) {
            throw new TokenException([
                'msg' => '订单与用户不匹配',
                'errorCode' => 10003
            ]);
        }
        if ($order -> status != OrderStatusEnum::UNPAID) {
            throw new OrderException([
                'msg' => '订单已支付',
                'errorCode' => 80003,
                'code' => 400
            ]);
        }
        $this -> orderNO = $order -> order_no;
        return true;
    }

}