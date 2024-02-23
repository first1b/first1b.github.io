<?php namespace Phpcmf\Controllers\Admin;
/* *
 *
 * 本Demo的语法参考： http://help.xunruicms.com/445.html
 *
 * */
class Ctime extends \Phpcmf\Table
{

    public function __construct()
    {
        parent::__construct();
        // 表单显示名称
        $this->name = dr_lang('定时静态任务');
        // 模板前缀(避免混淆)
        $this->tpl_prefix = 'ctime_';

        $mids = '共享栏目|share';
        $mods = \Phpcmf\Service::L('cache')->get('module-'.SITE_ID.'-content');
        if ($mods) {
            foreach ($mods as $t) {
                if (!$t['share']) {
                    $mids.= PHP_EOL.$t['name'].'（'.$t['dirname'].'）|'.$t['dirname'];
                }
            }
            $mids = trim($mids);
        }

        // 用于表储存的字段，后台可修改的表字段，设置字段类别参考：http://help.xunruicms.com/1138.html
        $field = array (

            'name' =>
                array (
                    'name' => '任务名称',
                    'fieldname' => 'name',
                    'ismain' => 1,
                    'ismember' => 1,
                    'fieldtype' => 'Text',
                    'setting' =>
                        array (
                            'validate' =>
                                array (
                                    'required' => '1',
                                ),
                        ),
                ),
            'mid' =>
                array (
                    'name' => '模块选择',
                    'fieldname' => 'mid',
                    'ismain' => 1,
                    'ismember' => 1,
                    'fieldtype' => 'Select',
                    'setting' =>
                        array (
                            'option' =>
                                array (
                                    'options' => $mids,
                                    'is_field_ld' => '0',
                                    'value' => '',
                                    'fieldtype' => '',
                                    'fieldlength' => '',
                                    'show_type' => '0',
                                    'css' => '',
                                ),
                            'validate' =>
                                array (
                                    'required' => '1',
                                    'pattern' => '',
                                    'errortips' => '',
                                    'check' => '',
                                    'filter' => '',
                                    'formattr' => '',
                                    'tips' => '',
                                ),
                        ),
                ),
            'where' =>
                array (
                    'name' => '指定栏目id',
                    'fieldname' => 'where',
                    'ismain' => 1,
                    'ismember' => 1,
                    'fieldtype' => 'Text',
                    'setting' =>
                    array (
                        'option' =>
                            array (
                                'value' => '',
                                'fieldtype' => '',
                                'fieldlength' => '',
                                'width' => '90%',
                                'height' => '',
                            ),
                        'validate' =>
                            array (
                                'required' => '0',
                                'pattern' => '',
                                'errortips' => '',
                                'check' => '',
                                'filter' => '',
                                'formattr' => ' data-role="tagsinput"',
                                'tips' => '不填写表示全部栏目',
                            ),
                    ),
                ),
            'param' =>
                array (
                    'name' => '生成间隔',
                    'fieldname' => 'param',
                    'ismain' => 1,
                    'ismember' => 1,
                    'fieldtype' => 'Text',
                    'setting' =>
                    array (
                        'option' =>
                            array (
                                'value' => '10',
                                'fieldtype' => '',
                                'fieldlength' => '',
                                'width' => '200',
                                'height' => '',
                            ),
                        'validate' =>
                            array (
                                'required' => '1',
                                'pattern' => '',
                                'errortips' => '',
                                'check' => '',
                                'filter' => '',
                                'formattr' => '',
                                'tips' => '单位天，例如填写10表示10天生成一次',
                            ),
                    ),
                ),
            'status' =>
                array (
                    'name' => '任务状态',
                    'fieldname' => 'status',
                    'ismain' => 1,
                    'ismember' => 1,
                    'fieldtype' => 'Radio',
                    'setting' =>
                        array (
                            'option' =>
                                array (
                                    'options' => '启用|1'.PHP_EOL.'停止|0',
                                    'is_field_ld' => '0',
                                    'value' => '1',
                                    'fieldtype' => '',
                                    'fieldlength' => '',
                                    'show_type' => '0',
                                    'css' => '',
                                ),
                            'validate' =>
                                array (
                                    'required' => '0',
                                    'pattern' => '',
                                    'errortips' => '',
                                    'check' => '',
                                    'filter' => '',
                                    'formattr' => '',
                                    'tips' => '',
                                ),
                        ),
                ),
        );

        // 用于列表显示的字段
        $list_field = array (
            'name' =>
                array (
                    'use' => '1',
                    'name' => '名称',
                    'width' => '200',
                    'func' => 'title',
                    'center' => '0',
                ),
            'mid' =>
                array (
                    'use' => '1',
                    'name' => '模块',
                    'width' => '150',
                    'func' => 'select_name',
                    'center' => '0',
                ),
            'status' =>
                array (
                    'use' => '1',
                    'name' => '状态',
                    'width' => '90',
                    'func' => 'save_select_value',
                    'center' => '1',
                ),
            'inputtime' =>
                array (
                    'use' => '1',
                    'name' => '创建时间',
                    'width' => '170',
                    'func' => 'datetime',
                    'center' => '0',
                ),
            'updatetime' =>
                array (
                    'use' => '1',
                    'name' => '最近生成',
                    'width' => '170',
                    'func' => 'datetime',
                    'center' => '0',
                ),
            'counts' =>
                array (
                    'use' => '1',
                    'name' => '生成情况',
                    'width' => '',
                    'func' => 'chtml_cat_counts',
                    'center' => '0',
                ),
        );
        /*
         *array (
                    'use' => '1', // 1是显示，0是不显示
                    'name' => '', //显示名称
                    'width' => '', // 显示宽度
                    'func' => '', // 回调函数见：http://help.xunruicms.com/463.html
                    'center' => '0', // 1是居中，0是默认
                )
         * */

        // 初始化数据表
        $this->_init([
            'table' => 'app_chtml_cat',  // （不带前缀的）表名字
            'field' => $field, // 可查询的字段
            'list_field' => $list_field,
            'order_by' => 'id desc', // 列表排序，默认的排序方式
            'where_list' => 'siteid='.SITE_ID,
        ]);

        // 把公共变量传入模板
        \Phpcmf\Service::V()->assign([
            // 搜索字段
            'field' => $field,
            'is_time_where' => $this->init['date_field'],
            // 后台的菜单
            'menu' => \Phpcmf\Service::M('auth')->_admin_menu(
                [
                    $this->name => [APP_DIR.'/'.\Phpcmf\Service::L('Router')->class.'/index', 'fa fa-code'],
                    '添加' => [APP_DIR.'/'.\Phpcmf\Service::L('Router')->class.'/add', 'fa fa-plus'],
                    '修改' => ['hide:'.APP_DIR.'/'.\Phpcmf\Service::L('Router')->class.'/edit', 'fa fa-edit'],
                    #'help' => [1159],
                ])
        ]);
    }

    // 查看列表
    public function index() {
        list($tpl) = $this->_List();
        $run_time = '';
        if (is_file(WRITEPATH.'config/run_time.php')) {
            $run_time = file_get_contents(WRITEPATH.'config/run_time.php');
        }
        \Phpcmf\Service::V()->assign([
            'run_time' => $run_time,
        ]);
        \Phpcmf\Service::V()->display($tpl);
    }

    // 添加内容
    public function add() {
        list($tpl) = $this->_Post(0);
        \Phpcmf\Service::V()->display($tpl);
    }

    // 修改内容
    public function edit() {
        list($tpl) = $this->_Post(intval(\Phpcmf\Service::L('input')->get('id')));
        \Phpcmf\Service::V()->display($tpl);
    }

    // 删除内容
    public function del() {
        $this->_Del(
            \Phpcmf\Service::L('Input')->get_post_ids(),
            function($rows) {
                // 删除前的验证
                return dr_return_data(1, 'ok', $rows);
            },
            function($rows) {
                // 删除后的处理
                return dr_return_data(1, 'ok');
            },
            \Phpcmf\Service::M()->dbprefix($this->init['table'])
        );
    }

    // 执行测试
    public function test_index() {

        $is_test = 'ctime';
        require APPPATH.'Config/Cron.php';
        $this->_json(1, '执行提交任务完毕');
    }

    /**
     * 获取内容
     * $id      内容id,新增为0
     * */
    protected function _Data($id = 0) {
        $row = parent::_Data($id);
        // 这里可以对内容进行格式化显示操处理
        return $row;
    }

    // 格式化保存数据
    protected function _Format_Data($id, $data, $old) {
        if (!$id) {
            // 当提交新数据时，把当前时间插入进去
            $data[1]['siteid'] = SITE_ID;
            $data[1]['updatetime'] = 0;
            $data[1]['inputtime'] = SYS_TIME;
        }
        $data[1]['error'] = '';
        return $data;
    }


    // 保存内容
    protected function _Save($id = 0, $data = [], $old = [], $func = null, $func2 = null) {
        return parent::_Save($id, $data, $old, function($id, $data, $old){
            // 验证数据
            /*
            if (!$data[1]['title']) {
                return dr_return_data(0, '标题不能为空！', ['field' => 'title']);
            }*/
            // 保存之前执行的函数，并返回新的数据
            if (!$id) {
                // 当提交新数据时，把当前时间插入进去
                //$data[1]['inputtime'] = SYS_TIME;
            }
            return dr_return_data(1, null, $data);
        }, function ($id, $data, $old) {
            // 保存之后执行的动作
        });
    }

}