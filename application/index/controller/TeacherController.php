<?php
namespace app\index\controller;
use think\Controller;
use app\common\model\Teacher;
class TeacherController extends Base
{
    public function index()
    {
    	$teachers=Model('Teacher')->getAllTeacher();
        return $this->fetch('',['teachers'=>$teachers]);
    }
}
?>
