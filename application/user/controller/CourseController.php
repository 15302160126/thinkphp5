<?php
namespace app\user\controller;
use think\Controller;
use app\common\model\Course;
class CourseController extends Base
{
    public function index()
    {
    	$courses=Model('Course')->getAllCourse();
        return $this->fetch('',['courses'=>$courses]);
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
