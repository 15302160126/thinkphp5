<?php
namespace app\admin\controller;
use think\Controller;
use app\common\model\User;
class UserController extends Base
{
    public function index()
    {
    	$users=Model('User')->getAllUser();
        return $this->fetch('',['users'=>$users]);
    }
    public function delete(){
        $id=input('param.id');
        if($id==0||is_null($id)){$this->error('参数有误');}
        $user=model('User')->get($id);
        if(!is_null($user)){
            if($user->delete()){
                $this->success('删除成功','user/index');
            }
        }
            $this->error('删除失败');
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
