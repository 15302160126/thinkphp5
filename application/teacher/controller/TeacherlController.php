<?php
namespace app\Teacher\controller;
use think\Controller;
use app\common\model\Teacher;
class TeacherlController extends Controller
{
    public function add(){
        return $this->fetch();
    }
    public function save(){
        if(!request()->isPost()){
            $thin->error('提交错误');
        }
        $data=input('post.');
        $validate=validate('Teacher');
        if(!$validate->scene('add')->check($data)){
            $this->error($validate->getError());
        }
        $teacherData=[
            'username'=>$data['username'],
            'realname'=>$data['realname'],
            'sex'=>$data['sex'],
            'password'=>md5($data['password']),
            'tel'=>$data['tel'],
            'email'=>$data['email'],
        ];
        $teacherid=model('Teacher')->add($teacherData);
        if($teacherid){
            $this->redirect(url('login/index'));
        }else{
            $this->error('提交失败');
        }
    }
}
?>
