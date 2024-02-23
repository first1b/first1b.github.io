<?php namespace Phpcmf\Controllers\Admin;
/* *
 *
 * 本Demo的语法参考： http://help.xunruicms.com/445.html
 *
 * */
class Log extends \Phpcmf\Table
{

    public function __construct(...$params)
    {
        parent::__construct(...$params);
        // 表单显示名称
        $this->name = dr_lang('沟通记录');
        // 模板前缀(避免混淆)
        $this->tpl_prefix = 'table_';

        // 用于表储存的字段，后台可修改的表字段，设置字段类别参考：http://help.xunruicms.com/1138.html
        $field = array (
  'from_uid' => 
  array (
    'name' => '发送人uid',
    'fieldname' => 'from_uid',
    'ismain' => 1,
    'ismember' => 1,
    'fieldtype' => 'Text',
  ),
  'to_uid' => 
  array (
    'name' => '接收人uid',
    'fieldname' => 'to_uid',
    'ismain' => 1,
    'ismember' => 1,
    'fieldtype' => 'Text',
  ),
  'content' => 
  array (
    'name' => '消息内容',
    'fieldname' => 'content',
    'ismain' => 1,
    'ismember' => 1,
    'fieldtype' => 'Text',
  ),
  'is_read' => 
  array (
    'name' => '1已读0未读',
    'fieldname' => 'is_read',
    'ismain' => 1,
    'ismember' => 1,
    'fieldtype' => 'Text',
  ),
  'inputip' => 
  array (
    'name' => '客户端ip',
    'fieldname' => 'inputip',
    'ismain' => 1,
    'ismember' => 1,
    'fieldtype' => 'Text',
  ),
  'inputtime' => 
  array (
    'name' => '写入时间',
    'fieldname' => 'inputtime',
    'ismain' => 1,
    'ismember' => 1,
    'fieldtype' => 'Text',
  ),
);

        // 用于列表显示的字段
        $list_field = array (
  'from_uid' => 
  array (
    'use' => '1',
    'name' => '发送人uid',
    'width' => '200',
    'func' => 'uid',
    'center' => '0',
  ),
  'to_uid' => 
  array (
    'use' => '1',
    'name' => '接收人uid',
    'width' => '',
    'func' => 'uid',
    'center' => '0',
  ),
  'content' => 
  array (
    'use' => '1',
    'name' => '消息内容',
    'width' => '',
    'func' => '',
    'center' => '0',
  ),
  'is_read' => 
  array (
    'use' => '1',
    'name' => '1已读0未读',
    'width' => '',
    'func' => '',
    'center' => '0',
  ),
  'inputip' => 
  array (
    'use' => '1',
    'name' => '客户端ip',
    'width' => '',
    'func' => '',
    'center' => '0',
  ),
  'inputtime' => 
  array (
    'use' => '1',
    'name' => '写入时间',
    'width' => '',
    'func' => 'datetime',
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
            'table' => 'app_sms_content',  // （不带前缀的）表名字
            'field' => $field, // 可查询的字段
            'list_field' => $list_field,
            'order_by' => 'id desc', // 列表排序，默认的排序方式
            'date_field' => '', // 按时间段搜索字段，没有时间字段留空
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
                ])
        ]);
    }

    // 查看列表
    public function index() {
        list($tpl) = $this->_List();
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
            //$data[1]['inputtime'] = SYS_TIME;
        }
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
