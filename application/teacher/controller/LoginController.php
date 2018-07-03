<?php
namespace app\teacher\controller;
use think\Controller;
use think\captcha;
class LoginController extends Controller
{
    public function index(){
        $teacher=session('my_teacher','','my');
        if($teacher&&$teacher->id){
            $this->redirect('teacher/index');
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
        $teacher=model('Teacher')->getTeacherByuserName($username);
        if(!$teacher){
            $this->error('错误');
        }//.$teacher->code
        if($teacher->password!=(md5($data['password']))){
            $this->error('密码输入错误');
        }
        session('my_teacher',$teacher,'my');
        $this->success('ok','teacher/index');
    }
    public function logout(){
        session(null,'my');
        $this->redirect('login/index');
    }
}
?>
