<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/9/1
 * Time: 9:16
 */

namespace app\api\controller\v1;


use think\Controller;
use app\api\service\Token as TokenService;

class BaseController extends Controller {

    protected function checkPrimaryScope() {
        TokenService::needPrimaryScope();
    }

    protected function checkExclusiveScope() {
        TokenService::needExclusiveScope();
    }
}