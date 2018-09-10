<?php

/**
 * @Author: zuoliguang
 * @Date:   2018-09-07 13:17:33
 * @Last Modified by:   zuoliguang
 * @Last Modified time: 2018-09-10 10:57:48
 */
define('APP_PATH', dirname(__FILE__));

$app = new Yaf_Application( APP_PATH . "/conf/application.ini");

$app->bootstrap()->run();