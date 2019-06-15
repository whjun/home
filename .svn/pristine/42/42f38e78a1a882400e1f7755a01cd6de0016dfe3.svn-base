<?php
/**
 * Created by PhpStorm.
 * User: wangjinzeng
 * Date: 2019/6/11
 * Time: 11:06
 */

namespace app\common\model;


class User extends BaseModel
{
    protected $name = 'user';

    public function getId()
    {
        return $this->id;
    }

    public function updateInfo($data,$id)
    {
        $res = $this->save($data,['id'=>$id]);
        if ($res){
            return $id;
        }
        return false;
    }

    public function addUserInfo($data)
    {
         $this->save($data);
         return $this->getId();
    }

    public function getUserInfo($id)
    {
        return $this::get($id);
    }


}

