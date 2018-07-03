<?php
namespace app\admin\controller;
use think\Controller;
use app\common\model\Teacher;
class TeacherController extends Base
{
    public function index()
    {
    	$teachers=Model('Teacher')->getAllTeacher();
        return $this->fetch('',['teachers'=>$teachers]);
    }
    public function delete(){
        $id=input('param.id');
        if($id==0||is_null($id)){$this->error('参数有误');}
        $teacher=model('Teacher')->get($id);
        if(!is_null($teacher)){
            if($teacher->delete()){
                $this->success('删除成功','teacher/index');
            }
        }
            $this->error('删除失败');
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
}
?>
