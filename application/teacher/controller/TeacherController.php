<?php
namespace app\Teacher\controller;
use think\Controller;
use app\common\model\Teacher;
class TeacherController extends Base
{
    public function index()
    {
    	$teachers=Model('Teacher')->getAllTeacher();
        return $this->fetch('',['teachers'=>$teachers]);
    }
    public function detail(){
        $id=input('param.id');
        if($id==0||is_null($id)){
            $this->error('参数有误');
        }
        $teacher=model('Teacher')->get($id);
        $this->assign('teacher',$teacher);
        return $this->fetch('');
    }
    public function update(){
        if(!request()->post()){
            $this->error('非法提交');
        }
        $id=input('param.id');
        if($id==0||is_null($id)){$this->error('参数有误');}
        $data=input('post.');
        $validate=validate('Teacher');
        if(!validate()->scene('update')->check($data)){
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
        $teacherid=model('Teacher')->save($teacherData,['id'=>intval($data['id'])]);
        if($teacherid){
            $this->redirect(url('teacher/index'));
        }else{
            $this->error('不成功');
        }
    }
}
?>
