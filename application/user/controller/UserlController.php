<?php
namespace app\user\controller;
use think\Controller;
use app\common\model\User;
class UserlController extends Controller
{
    public function add(){
        return $this->fetch('');
    }
    public function save(){
        
        if(!request()->isPost()){
            $thin->error('提交错误');
        }
        $data=input('post.');
        $validate=validate('User');
        if(!$validate->scene('add')->check($data)){
            $this->error($validate->getError());
        }
        $userData=[
            'username'=>$data['username'],
            'realname'=>$data['realname'],
            'sex'=>$data['sex'],
            'password'=>md5($data['password']),
            'tel'=>$data['tel'],
            'email'=>$data['email'],
        ];
        $userid=model('User')->add($userData);
        if($userid){
            $this->redirect(url('login/index'));
        }else{
            $this->error('提交失败');
        }
    }
}
?>
