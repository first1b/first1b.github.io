<?php namespace Phpcmf\Controllers;

class {name} extends \Phpcmf\Common
{

    public function index() {

        $name = 'hello word';

        // 将变量传入模板
        \Phpcmf\Service::V()->assign([
            'testname' => $name,
        ]);

        // 选择输出模板 前台位于 /template/pc/default/home/应用目录/test.html  这个文件要自己手动创建
        \Phpcmf\Service::V()->display('test.html');
    }

}
