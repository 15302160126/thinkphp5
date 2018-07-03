<?php
namespace app\index\controller;
use think\Controller;
use app\common\model\Course;
class CourseController extends Base
{
    public function index()
    {
    	$courses=Model('Course')->getAllCourse();
        return $this->fetch('',['courses'=>$courses]);
    }
}
?>
