<?php

/**
 * 错误控制器, 在发生未捕获的异常时刻被调用
 * @Author: zuoliguang
 * @Date:   2018-09-12 21:24:36
 * @Last Modified by:   zuoliguang
 * @Last Modified time: 2018-09-15 12:58:17
 */

class ErrorController extends Yaf_Controller_Abstract {

	//从2.1开始, errorAction支持直接通过参数获取异常
	public function errorAction($exception) {
		//1. assign to view engine
		$this->getView()->assign("exception", $exception);
		//5. render by Yaf 
	}
}
