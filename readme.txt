可以按照以下步骤来部署和运行程序:
1.请确保机器xiyou_zlg@DESKTOP-TIESFLI已经安装了Yaf框架, 并且已经加载入PHP;
2.把yafstudy目录Copy到Webserver的DocumentRoot目录下;
3.需要在php.ini里面启用如下配置，生产的代码才能正确运行：
	yaf.environ="product"
4.重启Webserver;
5.访问http://yourhost/yafstudy/,出现Hellow Word!, 表示运行成功,否则请查看php错误日志;

6、添加ORM拓展参考地址 https://fengqi.me/php/386.html/comment-page-1

		```
		Yaf 默认是不提供数据层处理功能的, 需要自行扩展.

		Eloquent ORM 是 Laravel 的内置 ORM 功能非常强大, 而且已经独立成组建, 任何项目都可以选择使用它.

		目前最新版是5.0.28, 主要版本是跟随 Laravel 更新的, 下一个版本是 5.1 LTS 版, 非常棒.

		在进行集成前, 需要开启 Yaf 的 namespace, 确保 php.ini 有如下配置:

		yaf.use_namespace=1

		为了方便管理, 建议使用 Composer 管理扩展, 以下示例均使用 Composer.

		安装 Eloquent ORM, 在项目根目录创建 composer.json, 内容如下:
		{
		    "require": {
		        "illuminate/database": "5.0.*",
		        "illuminate/events": "5.0.*",
		        "symfony/debug": "2.6.*",
		        "symfony/var-dumper": "2.6.*"
		    }
		}
		然后运行 composer update 下载代码, 并在 index.php 引入 vendor 目录下的 autoload.php 速度不理想可尝试我共享的镜像 http://composer.fengqi.me.

		<?php

		// 程序启动时间
		define('APP_START_TIME', microtime(true));

		// 程序跟目录
		define('ROOT_PATH', realpath(__DIR__.'/../'));

		// 加载 Composer
		require ROOT_PATH.'/vendor/autoload.php';

		// 启动程序
		$app  = new Yaf\Application(ROOT_PATH."/config/application.ini");
		$app->bootstrap()->run();
		配置数据库信息, application.ini 增加以下内容:
		; database
		database.driver     = mysql
		database.host       = 127.0.0.1
		database.database   = yaf
		database.username   = root
		database.password   = 123456
		database.port       = 3306
		database.charset    = utf8
		database.collation  = utf8_unicode_ci
		database.prefix     = ""
		这里使用 MySQL 作为示例, Eloquent 支持 MySQL, Postgres, SQL Server, SQLite.

		初始化 Eloquent ORM
		确保应用启动应用方式为 $app->bootstrap()->run(), 关键是 bootstrap() 部分.
		application 目录下添加 Bootstrap.php 文件, 内容如下:

		<?php

		use Yaf\Registry;
		use Yaf\Dispatcher;
		use Yaf\Application;
		use Yaf\Bootstrap_Abstract;
		use Illuminate\Events\Dispatcher as LDispatcher;
		use Illuminate\Container\Container as LContainer;
		use Illuminate\Database\Capsule\Manager as Capsule;

		class Bootstrap extends Bootstrap_Abstract
		{
		    public $config;

		    // 初始化配置
		    public function _initConfig(Dispatcher $dispatcher)
		    {
		        $this->config = Application::app()->getConfig();
		        Registry::set('config', $this->config);
		    }

		    // 初始化 Eloquent ORM
		    public function _initDefaultDbAdapter(Dispatcher $dispatcher)
		    {
		        $capsule = new Capsule();
		        $capsule->addConnection($this->config->database->toArray());
		        $capsule->setEventDispatcher(new LDispatcher(new LContainer));
		        $capsule->setAsGlobal();
		        $capsule->bootEloquent();
		    }
		}
		建立 model
		application 下新建 models 目录, 为了便于控制, 我们新增两个文件:
		基类 EloquentModel.php 便于以后统一控制一些东西

		<?php namespace App\Models;

		use Illuminate\Database\Eloquent\Model;

		class EloquentModel extends Model
		{
		    // todo
		}
		示例 model, User.php

		<?php namespace App\Models;

		use Illuminate\Database\Eloquent\SoftDeletes;

		class User extends EloquentModel
		{
		    // 软删除
		    use SoftDeletes;

		    // 表名
		    public $table = 'user';

		    // 此字段自动转换成 Carbon 实例
		    protected $dates = ['deleted_at'];

		    // 允许批量赋值的字段
		    protected $fillable = ['name', 'password', 'email'];
		}
		设置 model 自动加载
		在 composer.json 添加 psr-4, 最终内容如下:

		{
		    "require": {
		        "illuminate/database": "5.0.*",
		        "illuminate/events": "5.0.*",
		        "symfony/debug": "2.6.*",
		        "symfony/var-dumper": "2.6.*"
		    },
		    "autoload": {
		        "App\\Models\\": "application/models"
		    }
		}
		执行 composer dump-autoload 解析 psr-4.

		测试
		配置好喜欢的路由, 新建一个 user 表, 尝试调用 User 插入和获取数据

		<?php

		use App\Models\User;
		use Yaf\Controller_Abstract;

		class IndexController extends Controller_Abstract
		{
		    public function indexAction()
		    {
		        // 插入, 方式之一
		        User::create([
		            'name'      => 'eloquent',
		            'password'  => password_hash('password', PASSWORD_BCRYPT, ['cost' => 12]),
		            'email'     => 'test@example.com'
		        ]);

		        // 获取
		        $user = User::find(1);
		        dd($user->toArray()); // dd 放到
		    }
		}
		其它使用方式参考官方文档, 或国内爱好者翻译的中文 Eloquent ORM. 如果可能建议直接使用 Laravel.
		另外这里暂时不演示 Eloquent ORM 另外一个强大的组建 Scheme 的使用. 也没有考虑到 module, 有需要可自行变通.
		```
