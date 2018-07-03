<?php
namespace app\user\controller;
use think\Controller;
use think\captcha;
class LoginController extends Controller
{
    public function index(){
        $user=session('my_user','','my');
        if($user&&$user->id){
            $this->redirect('user/index');
        } 
        session(null,'my');
        return $this->fetch();
    }
    public function check(){
        if(!request()->isPost()){
            $this->error('错误');
        }
        $data=input('post.');

        $captcha=$data['captcha'];
        if(!captcha_check($captcha)){          
            $this->error('验证码错误');
        }

        $username=$data['username'];
        $user=model('User')->getUserByuserName($username);
        if(!$user){
            $this->error('错误');
        }//.$user->code
        if($user->password!=(md5($data['password']))){
            $this->error('密码输入错误');
        }
        session('my_user',$user,'my');
        $this->success('ok','user/index');
    }
    public function logout(){
        session(null,'my');
        $this->redirect('login/index');
    }
}
?>
