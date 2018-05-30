<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';   // 表名
    protected $primaryKey = 'id';//  主键
    protected $guarded = ['id'];  //  保护 字段不被修改

    public $timestamps = false;
    protected $hidden = ['remember_token'];   // 隐藏字段不被显示'password',


    /*
       根据UID  查询 会员 先查询 内存缓存  在查询数据库
       返回 会员信息  或者 false
   */
    public static function get_uid($uid){
        if($uid<1)return false;
        if(Redis::exists('uid:'.$uid)){
            return unserialize(Redis::get('uid:'.$uid));
        }else{
            $user = parent::where('uid',$uid)->get()->toArray();
            if(!$user)return false;
            Redis::setex('uid:'.$uid,'10',serialize($user[0]));
            return $user[0];
        }

    }

    /*
        修改会员信息  且删除 Redis 缓存 以达到同步 效果
        $uid  会员UID
        $data 被修改信息 数组

    */
    public static function get_update($uid,$data){
        $up = parent::where('uid',$uid)->update($data);
        Redis::del('uid:'.$uid);
        return $up;
    }

    /*
        创建 插入一条 数据
        array  $data;
    */

    public static function get_page($name){
        $member = parent::orderBy('uid','desc');
        $member->where('superior',$name);

        return $member->paginate('10',['*'],'page');
    }
    public static function get_pages($key,$name){
        $member = parent::orderBy('uid','desc');//superior
        $member->where($key,$name);

        return $member->paginate('100',['*'],'page');
    }

    public static function get_xj_page(){


    }


    public function Memberadd($data){
        $this->fill($data)->save();
    }

    public static function Memberupdate($uid,$data){
        parent::where('uid',$uid)->update($data);
    }

    public static function Memberdelete($uid){
        return parent::find($uid)->delete();
    }

}
