<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/8/23
 * Time: 21:57
 */

namespace app\api\controller\v1;


use app\api\model\Banner as BannerModel;
use app\api\validate\IDMustBePositiveInt;
use app\lib\exception\BannerMissException;

class Banner {

    /**
     * @url /banner/:id
     * @http GET
     * @param $id int banner的id号
     * @return BannerModel
     * @throws BannerMissException
     */

    public function getBanner($id) {
        // AOP 面向切面编程
        (new IDMustBePositiveInt())->goCheck();

        $banner = BannerModel::getBannerById($id);
        if (!$banner) {
            throw new BannerMissException();
        }
        return json($banner);
    }
}