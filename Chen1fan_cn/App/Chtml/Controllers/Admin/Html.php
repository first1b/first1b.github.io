<?php namespace Phpcmf\Controllers\Admin;

// 生成静态
class Html extends \Phpcmf\Common
{

    public function __construct(...$params) {
        parent::__construct(...$params);
        // 生成权限文件
        if (!dr_html_auth(1)) {
            $this->_admin_msg(0, dr_lang('/cache/html/ 无法写入文件'));
        }
    }

    // 生成静态
    public function index() {

        \Phpcmf\Service::V()->assign([
            'menu' => \Phpcmf\Service::M('auth')->_admin_menu(
                [
                    '生成静态' => [APP_DIR.'/'.\Phpcmf\Service::L('Router')->class.'/'.\Phpcmf\Service::L('Router')->method, 'fa fa-file-code-o'],
                    'help' => [417],
                ]
            ),
            'module' => \Phpcmf\Service::L('cache')->get('module-'.SITE_ID.'-content'),
            'pagesize' => 10,
        ]);
        \Phpcmf\Service::V()->display('html_index.html');
    }



    // 内容
    public function show_index() {

        $app = \Phpcmf\Service::L('input')->get('app');
        $ids = \Phpcmf\Service::L('input')->get('catids');
        if ($ids && is_array($ids)) {
            $ids = implode(',', $ids);
        }

        \Phpcmf\Service::V()->assign([
            'spage' => 1,
            'todo_url' => WEB_DIR.'index.php?'.($app ? 's='.$app.'&' : '').'c=html&m=show&catids='.$ids,
            'count_url' => \Phpcmf\Service::L('Router')->url(APP_DIR.'/'.'html/show_count_index', ['app' => $app, 'catids' => $ids, 'pagesize' => \Phpcmf\Service::L('input')->get('pagesize'), 'id_to' => \Phpcmf\Service::L('input')->get('id_to'), 'id_form' => \Phpcmf\Service::L('input')->get('id_form'), 'date_to' => \Phpcmf\Service::L('input')->get('date_to'), 'date_form' => \Phpcmf\Service::L('input')->get('date_form')]),
        ]);
        \Phpcmf\Service::V()->display('html_bfb.html');exit;
    }

    // 断点内容
    public function show_point_index() {

        $app = \Phpcmf\Service::L('input')->get('app');
        $ids = \Phpcmf\Service::L('input')->get('catids');
        if ($ids && is_array($ids)) {
            $ids = implode(',', $ids);
        }
        $name = 'show-'.$app.'-html-file';
        $page = \Phpcmf\Service::L('html', 'chtml')->get_auth_data($name.'-error'); // 设置断点
        if (!$page) {
            $this->_json(0, dr_lang('没有找到上次中断生成的记录'));
        }

        \Phpcmf\Service::V()->assign([
            'spage' => $page,
            'todo_url' => WEB_DIR.'index.php?'.($app ? 's='.$app.'&' : '').'c=html&m=show&catids='.$ids,
            'count_url' =>\Phpcmf\Service::L('Router')->url(APP_DIR.'/'.'html/show_point_count_index', ['app' => $app]),
        ]);
        \Phpcmf\Service::V()->display('html_bfb.html');exit;
    }
    // 断点内容的数量统计
    public function show_point_count_index() {

        $app = \Phpcmf\Service::L('input')->get('app');
        $name = 'show-'.$app.'-html-file';
        $page = \Phpcmf\Service::L('html', 'chtml')->get_auth_data($name.'-error'); // 设置断点
        if (!$page) {
            $this->_json(0, dr_lang('没有找到上次中断生成的记录'));
        } elseif (!\Phpcmf\Service::L('html', 'chtml')->get_auth_data($name)) {
            $this->_json(0, dr_lang('生成记录已过期，请重新开始生成'));
        } elseif (!\Phpcmf\Service::L('html', 'chtml')->get_auth_data($name.'-'.$page)) {
            $this->_json(0, dr_lang('生成记录已过期，请重新开始生成'));
        }

        $this->_json(1, 'ok');
    }

    // 内容数量统计
    public function show_count_index() {
        \Phpcmf\Service::M('html', APP_DIR)->get_show_data(\Phpcmf\Service::L('input')->get('app'), [
            'catids' => \Phpcmf\Service::L('input')->get('catids'),
            'date_to' => \Phpcmf\Service::L('input')->get('date_to'),
            'date_form' => \Phpcmf\Service::L('input')->get('date_form'),
            'id_to' => \Phpcmf\Service::L('input')->get('id_to'),
            'pagesize' => \Phpcmf\Service::L('input')->get('pagesize'),
            'id_form' => \Phpcmf\Service::L('input')->get('id_form')
        ]);
    }

}
