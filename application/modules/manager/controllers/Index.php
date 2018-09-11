<?php

/**
 * @Author: zuoliguang
 * @Date:   2018-09-11 09:24:15
 * @Last Modified by:   zuoliguang
 * @Last Modified time: 2018-09-11 09:26:09
 */
class IndexController extends Yaf_Controller_Abstract {
	// 初始化使用 init
	public function init() {

		Yaf_Dispatcher::getInstance()->disableView(); // 控制器 关闭自动加载模板

		header('Content-Type: text/html; charset=utf-8');
	}

	public function homeAction()
	{
		echo "manager Home 页！";
	}
}