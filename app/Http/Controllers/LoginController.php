<?php

namespace App\Http\Controllers;

use App\User;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class LoginController extends Controller
{
//    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function login(){
        return view('login',['err'=>'']);
    }
    public function register(){
        return view('register',['err'=>'']);
    }
    public function code(Request $request){
        $builder = new CaptchaBuilder;
        $builder->build(120,40);
        Session::set('yzm',$builder->getPhrase()); //存储验证码
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }
    public function post_login(Request $request){
        $post=$request->all();

        $username=$post['username'];
        $password=$post['password'];
        $yzm=$post['yzm'];
        $user=User::get_one_by_username($username);
        $scode=Session::get('yzm');

        $err='';
        if(!$username || !$user){
            $err="用户名不存在";
        }

        $pass=md5($username.$password.$user['salt']);

        if(!$password || $pass != $user['password']){
            $err="密码错误";
        }
        if(!$yzm || $yzm != $scode){
            $err="验证码不正确";
        }

        if($err){
            return view('login',['err'=>$err]);
        }else{
            Session::set('user',serialize($user));

            return redirect('/');
        }
    }
    public function post_reg(Request $request){
        $post=$request->all();

        $username=$post['username'];
        $password=$post['password'];
        $fpassword=$post['fpassword'];
        $tel=$post['tel'];
        $qq=$post['qq'];
        $yzm=$post['yzm'];
        $superior=$post['superior'];

        $scode=Session::get('yzm');
        $salt=rand(10000,99999);

        $err='';
        if(!$username || User::get_one_by_username($username)){
            $err="用户名已存在";
        }

        if(!$password || $password != $fpassword){
            $err="密码错误";
        }
        if(!$yzm || $yzm != $scode){
            $err="验证码不正确";
        }

        $superior_uid='';
        if($superior){
            $suser=User::get_one_by_username($superior);
            $superior_uid=$suser['uid'];
        }

        $data=array(
            'username'=>$post['username'],
            'password'=>md5($username.$password.$salt),
            'tel'=>$tel,
            'qq'=>$qq,
            'salt'=>$salt,
            'superior'=>$superior_uid,
            'regtime'=>date('Y-m-d H:i:s',time()),
            'regip'=>$request->getClientIp(),
        );

        if(DB::table('users')->insert($data)){
            return redirect('/login');
        }else{
           return view('register',['err'=>$err]);
        }
    }
}
