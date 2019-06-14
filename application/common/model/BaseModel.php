<?php
namespace app\common\model;

use think\Model;

class BaseModel extends Model{

    protected $autoWriteTimestamp = 'datetime';

    /**
     * 单例实例
     */
    protected static $_instance = [];


    public static function instance()
    {
        $classFullName = get_called_class();
        if (!isset($_instance[$classFullName])) {
            $instance = new static();
            static::$_instance[$classFullName] = $instance;
        }else{
            $instance = static::$_instance[$classFullName];
        }
        return $instance;
    }

    public function getTableName()
    {
        return $this->table;
    }
}
