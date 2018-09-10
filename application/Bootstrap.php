<?php

/**
 * @Author: zuoliguang
 * @Date:   2018-09-07 13:17:33
 * @Last Modified by:   zuoliguang
 * @Last Modified time: 2018-09-10 12:40:51
 */
require APP_PATH . '/vendor/autoload.php'; // 加载自动加载类

use Illuminate\Database\Capsule\Manager as Capsule;

class Bootstrap extends Yaf_Bootstrap_Abstract {

	public $_config;

    public function _initConfig() 
    {
		//把配置保存起来
		$this->_config = Yaf_Application::app()->getConfig();

		Yaf_Registry::set('config', $this->_config);

		// Yaf_Dispatcher::getInstance()->autoRender(FALSE); // 全局 关闭自动加载模板
	}

	//载入数据库ORM
	public function _initDatabase()
	{
		$capsule = new Capsule;
		$capsule->addConnection($this->_config->database->toArray());
		$capsule->setAsGlobal();
		$capsule->bootEloquent();

	}

	public function _initPlugin(Yaf_Dispatcher $dispatcher) 
	{
		//注册一个插件
		$objSamplePlugin = new SamplePlugin();
		$dispatcher->registerPlugin($objSamplePlugin);
	}

	public function _initRoute(Yaf_Dispatcher $dispatcher) 
	{
		//在这里注册自己的路由协议,默认使用简单路由
	}
	
	public function _initView(Yaf_Dispatcher $dispatcher) 
	{
		//在这里注册自己的view控制器，例如smarty,firekylin
	}
}
