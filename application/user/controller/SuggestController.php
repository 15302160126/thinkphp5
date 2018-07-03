<?php
namespace app\user\controller;
use think\Controller;
use app\common\model\Suggest;
class SuggestController extends Base
{
    public function index()
    {
    	$suggests=Model('Suggest')->getAllSuggest();
        return $this->fetch('',['suggests'=>$suggests]);
    }
    public function add(){
        $courses=model('Course')->getAllCourse();
        $teachers=model('Teacher')->getAllTeacher();
        return $this->fetch('',[
                'courses'=>$courses,
                'teachers'=>$teachers,
            ]);
    }
    public function save(){
        if(!request()->isPost()){
            $thin->error('提交错误');
        }
        $data=input('post.');
        $validate=validate('Suggest');
        if(!$validate->scene('add')->check($data)){
            $this->error($validate->getError());
        }
        $suggestData=[
            'title'=>$data['title'],
            'couse_id'=>$data['couse_id'],
            'teacher_id'=>$data['teacher_id'],
            'suggest'=>$data['suggest'],
        ];
        $suggestid=model('Suggest')->add($suggestData);
        if($suggestid){
            $this->redirect(url('suggest/index'));
        }else{
            $this->error('提交失败');
        }
    }
    public function update(){
        if(!request()->post()){
            $this->error('非法提交');
        }
        $id=input('param.id');
        if($id==0||is_null($id)){$this->error('参数有误');}
        $data=input('post.');
        $validate=validate('Suggest');
        if(!validate()->scene('update')->check($data)){
            $this->error($validate->getError());
        }
        $suggestData=[
            'title'=>$data['title'],
            'couse_id'=>$data['couse_id'],
            'teacher_id'=>$data['teacher_id'],
            'suggest'=>$data['suggest'],
        ];
        $suggestid=model('Suggest')->save($suggestData,['id'=>intval($data['id'])]);
        if($suggestid){
            $this->redirect(url('suggest/index'));
        }else{
            $this->error('不成功');
        }
    }
    public function delete(){
        $id=input('param.id');
        if($id==0||is_null($id)){$this->error('参数有误');}
        $suggest=model('Suggest')->get($id);
        if(!is_null($suggest)){
            if($suggest->delete()){
                $this->success('删除成功','suggest/index');
            }
        }
            $this->error('删除失败');
    }
    public function detail(){
        $id=input('param.id');
        if($id==0||is_null($id)){
            $this->error('参数有误');
        }
        $suggest=model('Suggest')->get($id);
        $this->assign('suggest',$suggest);
        return $this->fetch('');
    }
}
?>
