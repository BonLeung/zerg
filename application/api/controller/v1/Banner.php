<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/8/23
 * Time: 21:57
 */

namespace app\api\controller\v1;


use app\api\validate\IDMustBePositiveInt;
use app\api\model\Banner as BannerModel;

class Banner {

    /**
     * @url /banner/:id
     * @http GET
     * @param $id banner的id号
     * @return string
     */
    public function getBanner($id) {
        (new IDMustBePositiveInt()) -> goCheck();
        $banner = BannerModel::getBannerById($id);
        return $banner;
    }
}