<?php
namespace app\teacher\controller;
use think\Controller;
use app\common\model\Course;
class CourseController extends Base
{
    public function index()
    {
    	$courses=Model('Course')->getAllCourse();
        return $this->fetch('',['courses'=>$courses]);
    }
    public function add(){
        return $this->fetch();
    }
    public function save(){
        if(!request()->isPost()){
            $thin->error('提交错误');
        }
        $data=input('post.');
        $validate=validate('Course');
        if(!$validate->scene('add')->check($data)){
            $this->error($validate->getError());
        }
        $courseData=[
            'coursename'=>$data['coursename'],
            'coursetime'=>$data['coursetime'],
            'cteacher'=>$data['cteacher'],
        ];
        $courseid=model('Course')->add($courseData);
        if($courseid){
            $this->redirect(url('course/index'));
        }else{
            $this->error('提交失败');
        }
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
    public function edit(){
        $id=input('param.id');
        if($id==0||is_null($id)){$this->error('参数有误');}
        $course=model('Course')->get($id);
        $this->assign('course',$course);
        return $this->fetch('');
    }
    public function update(){
        if(!request()->post()){
            $this->error('非法提交');
        }
        $id=input('param.id');
        if($id==0||is_null($id)){$this->error('参数有误');}
        $data=input('post.');
        $validate=validate('Course');
        if(!validate()->scene('update')->check($data)){
            $this->error($validate->getError());
        }
        $courseData=[
            'coursename'=>$data['coursename'],
            'coursetime'=>$data['coursetime'],
            'cteacher'=>$data['cteacher'],
        ];
        $courseid=model('Course')->save($courseData,['id'=>intval($data['id'])]);
        if($courseid){
            $this->redirect(url('course/index'));
        }else{
            $this->error('不成功');
        }
    }
}
?>
