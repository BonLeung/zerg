<?php

namespace app\api\controller\v1;

use app\api\validate\IDCollection;
use app\api\model\Theme as ThemeModel;
use app\api\validate\IDMustBePositiveInt;
use app\lib\exception\ThemeException;
use think\Controller;

class Theme extends Controller {

    /**
     * @url /theme?ids=id1,id2,id3
     * @return json 一组theme模型
     * @throws ThemeException
     */
    public function getSimpleList($ids = '') {
        (new IDCollection())->goCheck();
        $ids = explode(',', $ids);
        $result = ThemeModel::with(['headImg', 'topicImg'])->select($ids);
        if ($result -> isEmpty()) {
            throw new ThemeException();
        }
        return $result;
    }

    /**
     * @url /theme/:id
     * @param $id
     * @return json
     * @throws ThemeException
     */
    public function getComplexOne($id) {
        (new IDMustBePositiveInt())->goCheck();
        $theme = ThemeModel::getThemeWidthProducts($id);
        if (!$theme) {
            throw new ThemeException();
        }
        return $theme;
    }
}
