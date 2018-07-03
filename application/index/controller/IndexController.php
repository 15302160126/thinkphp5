<?php
namespace app\index\controller;
use think\Controller;

class IndexController extends Controller
{
    public function index()
    {
    	$teachers=Model('Teacher')->getAllTeacher();
    	$courses=Model('Course')->getAllCourse();
    	$users=Model('User')->getAllUser();
    	$suggests=Model('Suggest')->getAllSuggest();
        return $this->fetch('',['teachers'=>$teachers,
        						'courses'=>$courses,
        						'users'=>$users,
        						'suggests'=>$suggests,
        	]);
    }
}
?>
