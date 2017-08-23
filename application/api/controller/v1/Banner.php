<?php
/**
 * Created by PhpStorm.
 * User: liangweibang
 * Date: 2017/8/23
 * Time: 21:57
 */

namespace app\api\controller\v1;


use app\api\validate\IDMustBePositiveInt;
use app\api\validate\TestValidate;
use think\Validate;

class Banner {

    /**
     * @url /banner/:id
     * @http GET
     * @param $id banner的id号
     */
    public function getBanner($id) {

        $data = [
            'id' => $id
        ];

        $validate = new IDMustBePositiveInt();
        $result = $validate -> batch() -> check($data);
        if ($result) {
            echo $validate -> getError();
        }
    }
}