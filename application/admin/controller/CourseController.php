<?php
namespace app\admin\controller;
use think\Controller;
use app\common\model\Course;
class CourseController extends Base
{
    public function index()
    {
    	$courses=Model('Course')->getAllCourse();
        return $this->fetch('',['courses'=>$courses]);
    }
    public function delete(){
        $id=input('param.id');
        if($id==0||is_null($id)){$this->error('参数有误');}
        $course=model('Course')->get($id);
        if(!is_null($course)){
            if($course->delete()){
                $this->success('删除成功','course/index');
            }
        }
            $this->error('删除失败');
    }
    public function detail(){
        $id=input('param.id');
        if($id==0||is_null($id)){
            $this->error('参数有误');
        }
        $course=model('Course')->get($id);
        $this->assign('course',$course);
        return $this->fetch('');
    }
}
?>
