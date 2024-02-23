<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 系统配置文件
 */

return [

	'SYS_DEBUG'                     => 1, //调试器开关
	'SYS_ADMIN_CODE'                => 0, //后台登录验证码开关
	'SYS_ADMIN_LOG'                 => 0, //后台操作日志开关
	'SYS_AUTO_FORM'                 => 0, //自动存储表单数据
	'SYS_ADMIN_PAGESIZE'            => 10, //后台数据分页显示数量
	'SYS_CRON_AUTH'                 => 0, //自动任务权限IP地址
	'SYS_SMS_IMG_CODE'              => 0, //发送短信验证码双重图形验证开关
	'SYS_GO_404'                    => 0, //404页面跳转开关
	'SYS_301'                       => 1, //内容地址唯一模式
	'SYS_URL_PREG'                  => 0, //地址匹配规则
	'SYS_KEY'                       => 'PHPCMF3d1471405c6227bc7868df3383061f59', //安全密匙
	'SYS_CSRF'                      => 1, //开启跨站验证
	'SYS_HTTPS'                     => 1, //https模式
	'SYS_NOT_ADMIN_CACHE'           => 0, //禁用后台tab切换效果
	'SYS_ADMIN_MODE'                => 0, //禁用后台登录进行模式选择
	'SYS_ADMIN_LOGINS'              => 0, //登录失败N次后，系统将锁定登录
	'SYS_ADMIN_LOGIN_TIME'          => 0, //登录失败锁定后在x分钟内禁止登录
	'SYS_ADMIN_OAUTH'               => 0, //后台启用快捷登录
	'SYS_ATTACHMENT_DB'             => 1, //附件归属开启模式
	'SYS_ATTACHMENT_GUEST'          => 0, //游客是否附件上传
	'SYS_ATTACHMENT_CF'             => '', //重复上传控制
	'SYS_ATTACHMENT_SAFE'           => 0, //附件上传安全模式
	'SYS_ATTACHMENT_PATH'           => '', //附件上传路径
	'SYS_ATTACHMENT_SAVE_TYPE'      => 0, //附件存储方式
	'SYS_ATTACHMENT_SAVE_DIR'       => '', //附件存储目录
	'SYS_ATTACHMENT_SAVE_ID'        => 0, //附件存储全局策略
	'SYS_ATTACHMENT_URL'            => '', //附件访问地址
	'SYS_AVATAR_PATH'               => '', //头像上传路径
	'SYS_AVATAR_URL'                => '', //头像访问地址
	'SYS_API_CODE'                  => 0, //API请求时验证码开关
	'SYS_THEME_ROOT'                => 0, //风格目录引用作用域
	'SYS_NOT_UPDATE'                => 0, //禁止自动检测版本

];