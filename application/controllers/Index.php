<?php

/**
 * @Author: zuoliguang
 * @Date:   2018-09-07 13:17:33
 * @Last Modified by:   zuoliguang
 * @Last Modified time: 2018-09-15 12:58:46
 */

class IndexController extends Yaf_Controller_Abstract {

	// 初始化使用 init
	public function init() {

		Yaf_Dispatcher::getInstance()->disableView(); // 控制器 关闭自动加载模板

		header('Content-Type: text/html; charset=utf-8');
	}

	public function indexAction() {

		// 1、输出变量;
		// $data = [
		// 	"a" => "testa",
		// 	"b" => "testb",
		// 	"c" => "testc"
		// ];
		// echo json_encode($data);
		
		

		// 2、获取当前路由信息
		// echo  __METHOD__ ;
		// 当前请求方法
		// echo $this->getRequest()->getMethod();
		// 原生php $_SERVER 的值
		// $server = $this->getRequest()->getServer();
		// echo json_encode($server);



		// 3、接收get参数
		// $test = $this->getRequest()->getQuery("test", "defaultValue");
		// $test = $this->getRequest()->Get('test','111');
		// echo $test;
		


		// 4、接收post参数
		// $test = $this->getRequest()->getPost("test", "defaultValue");
		// echo $test;



		// 5、判断get/post请求
		// if($this->getRequest()->isGet()){
		// 	echo "当前是get请求";
		// } elseif ($this->getRequest()->isPost()){
		// 	echo "当前是post请求";
		// } elseif ($file = $this->getRequest()->getFiles()) {
		// 	echo "文件上传";
		// }
		


		// 6、获取当前请求的url
		// echo $this->getRequest()->getRequestUri();
		


		// 7、Cookie
		// $name = $this->getRequest()->getCookie('name');
		


		// 8、Session
		// $seesion = Yaf_Session::getInstance();
		// $username = $seesion->set("username", "admin"); // 创建
		// var_dump($seesion->get("username")); // 获取
		// $seesion->del("username"); // 删除
		// var_dump($seesion->get("username")); // 获取



		// 9、模板渲染
		// 这里只需要添加模板的名
		// $this->getView()->assign("a", "Hello World1");
		// $this->getView()->assign("b", "Hello World2");
		// $this->getView()->assign("c", "Hello World3");
		// $this->display("index");
		// return false;



		// 10、跳转
		// $this->redirect("https://www.baidu.com/");
		// $this->redirect("/index/test");
		


		// 11、添加内部定义插件
		// 查看 application/plugins 下案例
		// 查看 application/Bootstrap.php 注册方式
		


		// 12、定义插件使用
		// 设置完上面 [11] 的操作后执行即可看到效果
		// echo "testhahaha <br/>\n ";



		// 13、 composer 添加插件
		// 注意：因为yaf框架里面未集成数据库的类故后面使用到的操作均使用 composer 单独集成
		// 因为国内环境比较慢，直接在想用的框架里的找到插件之后复制到插件的位置来
		// 这里我将 lavarel 中的 ORM 数据库操作类添加到该位置

		
		// 14、数据库
		// 查询
		// $member = new SampleModel();

		// 1、获取主键数据
		// $members = $member::find(1); 

		// 2、获取所有数据
		// $members = $member::all(); 

		// 3、获取条件数据
		// $members = $member::where('id', '>', 10)->get(); 

		// 4、分块结果 每次取出2个
		// echo "<pre>";
		// $member::chunk(2, function($members){ 
		// 	print_r($members->toArray());
		// 	echo '------------------<br/>';
		// });

		// 5、取回指定的数据
		// $members = $member::find([12, 13, 16]);

		// 6、添加
		// $new = new SampleModel();
		// $new->name 		= 'model-tets';
		// $new->age 		= 40;
		// $new->tel 		= '88888888';
		// $new->address 	= 'peking zhanghao dizhi';
		// $new->score 		= 99;
		// $new->class 		= '2-9';
		// $new->ext_info 	= 'model test info';
		// $new->save();

		// 7、更新
		// $member = $member::find(14);
		// $member->name = 'guncaode';
		// $member->save();

		// 8、批量更新
		// $member::where('id', 1)->update(['name'=>'test_update']);
		// $member::where('id', '>', 8)->where('id', '<=', 13)->update(['name'=>'hghghg']);

		// 9、删除
		// $member = $member::find(16);
		// $member->delete();

		// 10、批量删除
		// $member::destroy(1);
		// $member::destroy([1, 2, 3]);
		

		// var_dump($members);die();
		// var_dump($members->toArray());die();
		
		// 15、缓存工具


		echo "hello world!";

		
		//注意: render by Yaf, 如果这里返回 FALSE, Yaf将不会调用自动视图引擎Render模板
        // return false;
	}

	public function homeAction()
	{
		echo "index 默认主页！";
	}


	// 测试跳转使用
	public function testAction()
	{
		echo 'test';
		// return false;
	}
}
