<?php
/**
 * @name SampleModel
 * @desc sample数据获取类, 可以访问数据库，文件，其它系统等
 * @author xiyou_zlg
 */
use Illuminate\Database\Eloquent\Model;

class SampleModel extends Model 
{
	/**
	 * 与模型关联的数据表
	 * @var string
	 */
    protected $table = 'member';

    /**
     * 该模型是否被自动维护时间戳
     * @var boolean
     */
    public $timestamps = false;

    

}
