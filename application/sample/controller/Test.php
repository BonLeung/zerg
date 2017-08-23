<?php
/**
 * Created by PhpStorm.
 * User: DIY
 * Date: 2017/8/23
 * Time: 14:25
 */

namespace app\sample\controller;


use think\Request;

class Test {
    public function hello() {

        $all = Request::instance() -> param();
        $id = Request::instance() -> param('id');
        $name = Request::instance() -> param('name');
        $age = Request::instance() -> param('age');

        var_dump($all);
        echo $id;
        echo $name;
        echo $age;
        return 'hello bangge';
    }
}