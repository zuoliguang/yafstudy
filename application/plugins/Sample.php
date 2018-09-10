<?php

/**
 * @Author: zuoliguang
 * @Date:   2018-09-07 13:17:33
 * @Last Modified by:   zuoliguang
 * @Last Modified time: 2018-09-07 16:39:01
 */

class SamplePlugin extends Yaf_Plugin_Abstract {

	public function routerStartup(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response) 
	{
		// echo "Plugin Sample::routerStartup 在路由触发之前 <br/>\n";
	}

	public function routerShutdown(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response) 
	{
		// echo "Plugin Sample::routerShutdown 路由结束之后 <br/>\n";
	}

	public function dispatchLoopStartup(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response) 
	{
		// echo "Plugin Sample::dispatchLoopStartup 分发循环开始之前 <br/>\n";
	}

	public function preDispatch(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response) 
	{
		// echo "Plugin Sample::preDispatch 分发之前 <br/>\n";
	}

	public function postDispatch(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response) 
	{
		// echo "Plugin Sample::postDispatch 分发结束之后 <br/>\n";
	}

	public function dispatchLoopShutdown(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response) 
	{
		// echo "Plugin Sample::dispatchLoopShutdown 分发循环结束之后 <br/>\n";
	}
}
