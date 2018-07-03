<?php
namespace app\user\controller;
use think\Controller;
use app\common\model\User;
class UserController extends Base
{
    public function index()
    {
    	$users=Model('User')->getAllUser();
        return $this->fetch('',['users'=>$users]);
    }
    public function edit(){
        $courses=model('Course')->getAllCourse();
        $id=input('param.id');
        if($id==0||is_null($id)){$this->error('参数有误');}
        $user=model('User')->get($id);
        $this->assign('user',$user);
        return $this->fetch('',[
                'courses'=>$courses,
            ]);
    }
    public function update(){
        if(!request()->post()){
            $this->error('非法提交');
        }
        $id=input('param.id');
        if($id==0||is_null($id)){$this->error('参数有误');}
        $data=input('post.');
        $validate=validate('User');
        if(!validate()->scene('update')->check($data)){
            $this->error($validate->getError());
        }
        $userData=[
            'username'=>$data['username'],
            'realname'=>$data['realname'],
            'sex'=>$data['sex'],
            'password'=>md5($data['password']),
            'tel'=>$data['tel'],
            'email'=>$data['email'],
            'u_course'=>$data['u_course'],
        ];
        $userid=model('User')->save($userData,['id'=>intval($data['id'])]);
        if($userid){
            $this->redirect(url('user/index'));
        }else{
            $this->error('不成功');
        }
    }
    public function detail(){
        $id=input('param.id');
        if($id==0||is_null($id)){
            $this->error('参数有误');
        }
        $user=model('User')->get($id);
        $this->assign('user',$user);
        return $this->fetch('');
    }
}
?>
